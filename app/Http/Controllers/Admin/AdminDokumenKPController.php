<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DokumenKp;
use App\Models\TemplateLaporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AdminDokumenKpController extends Controller
{
    public function index()
    {
        $dokumen_kp = DokumenKp::all();
        return view('admin/dokumen-kp', compact('dokumen_kp'));
    }

    public function store(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'deskripsi' => 'required',
            'aktor' => 'required',
            'file' => 'max:50000',
        ];

        $messages = [
            'nama.required' => 'Nama file harus diisi',
            'deskripsi.required' => 'Deskripsi file harus diisi',
            'aktor.required' => 'Aktor tujuan harus dipilih',
            'file.max' => 'Ukuran file maksimal adalah 50MB.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $fileName = $request->file->getClientOriginalName();
        $request->file('file')->storeAs('public/dokumen-kp', $fileName);

        $dokumen_kp = new DokumenKp;
        $dokumen_kp->nama = $request->nama;
        $dokumen_kp->deskripsi = $request->deskripsi;
        $dokumen_kp->aktor = $request->aktor;
        $dokumen_kp->file = $fileName;

        $simpan = $dokumen_kp->save();

        if ($simpan) {
            Session::flash('success', 'Dokumen KP berhasil diunggah.');
            return redirect()->route('admin.dokumen-kp');
        } else {
            Session::flash('errors', 'Dokumen KP gagal diunggah.');
            return redirect()->route('admin.dokumen-kp');
        }
    }

    public function getFile(Request $request)
    {
        if (Storage::disk('public')->exists("dokumen-kp/$request->file")) {
            $path = Storage::disk('public')->path("dokumen-kp/$request->file");
            $content = file_get_contents($path);
            return response($content)->withHeaders([
                'Content-Type' => mime_content_type($path)
            ]);
        }
        return redirect()->route('admin.dokumen-kp')->with('errors', 'Gagal mengunduh file.');
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

        $dokumen_kp = DokumenKp::whereId($id)->first();
        if (File::exists('storage/dokumen-kp/' . $dokumen_kp->file)) {
            File::delete('storage/dokumen-kp/' . $dokumen_kp->file);
        }

        $fileName = $request->file->getClientOriginalName();
        $request->file('file')->storeAs('public/dokumen-kp', $fileName);

        $simpan = $dokumen_kp->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'aktor' => $request->aktor,
            'file' => $fileName,
        ]);

        if ($simpan) {
            Session::flash('success', 'Dokumen KP berhasil diperbarui.');
            return redirect()->route('admin.dokumen-kp');
        } else {
            Session::flash('errors', 'Dokumen KP gagal diperbarui.');
            return redirect()->route('admin.dokumen-kp');
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
        $dokumen_kp = DokumenKp::where('id', $id)->first();
        File::delete('storage/dokumen-kp/' . $dokumen_kp->file);

        // hapus data di tabel database
        DokumenKp::where('id', $id)->delete();

        return redirect()->route('admin.dokumen-kp')->with('success', 'Data berhasil dihapus.');
    }
}
