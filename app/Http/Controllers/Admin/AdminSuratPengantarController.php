<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SuratPengantar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminSuratPengantarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surat_pengantar = SuratPengantar::all();

        return view('admin/surat-pengantar', compact('surat_pengantar'));
    }

    public function getFile(Request $request)
    {
        if (Storage::disk('public')->exists("surat-pengantar/$request->file")) {
            $path = Storage::disk('public')->path("surat-pengantar/$request->file");
            $content = file_get_contents($path);
            return response($content)->withHeaders([
                'Content-Type' => mime_content_type($path)
            ]);
        }
        return redirect()->route('admin.surat-pengantar')->with('errors', 'Gagal mengunduh file.');
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'file' => 'max:2048',
        ];

        $messages = [
            'file.max' => 'Ukuran file maksimal adalah 2MB.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $surat_pengantar = SuratPengantar::whereId($id)->first();
        if (File::exists('storage/surat-pengantar/' . $surat_pengantar->file)) {
            File::delete('storage/surat-pengantar/' . $surat_pengantar->file);
        }

        if (($request->status === "Diterima") && ($request->file == null)) {
            return redirect()->route('admin.surat-pengantar')->with('errors', 'File surat pengantar belum dipilih.');
        } elseif ($request->status === "Diterima") {
            $fileName = $request->nim . '_Surat Pengantar.' . $request->file->getClientOriginalExtension();
            $request->file('file')->storeAs('public/surat-pengantar', $fileName);
        } else {
            $fileName = "-";
        }

        $simpan = $surat_pengantar->update([
            'status' => $request->status,
            'file' => $fileName,
        ]);

        if ($simpan) {
            Session::flash('success', 'Surat pengantar berhasil diperbarui.');
            return redirect()->route('admin.surat-pengantar');
        } else {
            Session::flash('errors', 'Surat pengantar gagal diperbarui.');
            return redirect()->route('admin.surat-pengantar');
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
        $surat_pengantar = SuratPengantar::where('id', $id)->first();
        File::delete('storage/surat-pengantar/' . $surat_pengantar->file);

        // hapus data di tabel database
        DB::table('surat_pengantar')->where('id', $id)->delete();

        return redirect()->route('admin.surat-pengantar')->with('success', 'Data berhasil dihapus.');
    }
}
