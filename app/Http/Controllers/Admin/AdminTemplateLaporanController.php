<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TemplateLaporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AdminTemplateLaporanController extends Controller
{
    public function index()
    {
        $template_laporan = TemplateLaporan::all();
        $template_laporan_count = DB::table('template_laporan')->count();
        return view('admin/template-laporan', compact('template_laporan', 'template_laporan_count'));
    }

    public function store(Request $request)
    {
        $rules = [
            'file' => 'max:50000',
        ];

        $messages = [
            'file.max' => 'Ukuran file maksimal adalah 50MB.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $fileName = $request->file->getClientOriginalName();
        $request->file('file')->storeAs('public/template-laporan', $fileName);

        $template_laporan = new TemplateLaporan;
        $template_laporan->file = $fileName;

        $simpan = $template_laporan->save();

        if ($simpan) {
            Session::flash('success', 'Template Laporan berhasil diunggah.');
            return redirect()->route('admin.template-laporan');
        } else {
            Session::flash('errors', 'Template Laporan gagal diunggah.');
            return redirect()->route('admin.template-laporan');
        }
    }

    public function getFile(Request $request)
    {
        if (Storage::disk('public')->exists("template-laporan/$request->file")); {
            $path = Storage::disk('public')->path("template-laporan/$request->file");
            $content = file_get_contents($path);
            return response($content)->withHeaders([
                'Content-Type' => mime_content_type($path)
            ]);
        }
        return redirect()->route('admin.template-laporan')->with('errors', 'Gagal mengunduh file.');
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'file' => 'max:50000',
        ];

        $messages = [
            'file.max' => 'Ukuran file maksimal adalah 50MB.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $template_laporan = TemplateLaporan::whereId($id)->first();
        if (File::exists('storage/template-laporan/' . $template_laporan->file)) {
            File::delete('storage/template-laporan/' . $template_laporan->file);
        }

        $fileName = $request->file->getClientOriginalName();
        $request->file('file')->storeAs('public/template-laporan', $fileName);

        $simpan = $template_laporan->update([
            'file' => $fileName,
        ]);

        if ($simpan) {
            Session::flash('success', 'Template Laporan berhasil diperbarui.');
            return redirect()->route('admin.template-laporan');
        } else {
            Session::flash('errors', 'Template Laporan gagal diperbarui.');
            return redirect()->route('admin.template-laporan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SuratPengantar  $suratPengantar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // hapus file
        $template_laporan = TemplateLaporan::where('id', $id)->first();
        File::delete('storage/template-laporan/' . $template_laporan->file);

        // hapus data di tabel database
        TemplateLaporan::where('id', $id)->delete();

        return redirect()->route('admin.template-laporan')->with('success', 'Data berhasil dihapus.');
    }
}
