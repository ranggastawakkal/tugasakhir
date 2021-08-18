<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dokumen;
use App\Models\DokumenMahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class AdminDokumenMahasiswaController extends Controller
{
    public function index()
    {
        $dokumen = DokumenMahasiswa::all();
        return view('admin/dokumen-mahasiswa', compact('dokumen'));
    }

    public function getFile(Request $request)
    {
        if (Storage::disk('public')->exists("dokumen-mahasiswa/surat-diterima/$request->file")) {
            $path = Storage::disk('public')->path("dokumen-mahasiswa/surat-diterima/$request->file");
        } elseif (Storage::disk('public')->exists("dokumen-mahasiswa/laporan/$request->file")) {
            $path = Storage::disk('public')->path("dokumen-mahasiswa/laporan/$request->file");
        } elseif (Storage::disk('public')->exists("dokumen-mahasiswa/surat-selesai/$request->file")) {
            $path = Storage::disk('public')->path("dokumen-mahasiswa/surat-selesai/$request->file");
        } else {
            $path = Storage::disk('public')->path("dokumen-mahasiswa/krs/$request->file");
        }

        $content = file_get_contents($path);
        return response($content)->withHeaders([
            'Content-Type' => mime_content_type($path)
        ]);
        return redirect()->route('admin.dokumen-mahasiswa')->with('errors', 'Gagal mengunduh file.');
    }

    public function destroy($id)
    {
        // hapus file
        $dokumen_mahasiswa = DokumenMahasiswa::where('id', $id)->first();
        if (File::exists('storage/dokumen-mahasiswa/surat-diterima/' . $dokumen_mahasiswa->surat_diterima)) {
            File::delete('storage/dokumen-mahasiswa/surat-diterima/' . $dokumen_mahasiswa->surat_diterima);
        }
        if (File::exists('storage/dokumen-mahasiswa/laporan/' . $dokumen_mahasiswa->laporan)) {
            File::delete('storage/dokumen-mahasiswa/laporan/' . $dokumen_mahasiswa->laporan);
        }
        if (File::exists('storage/dokumen-mahasiswa/surat-selesai/' . $dokumen_mahasiswa->surat_selesai)) {
            File::delete('storage/dokumen-mahasiswa/surat-selesai/' . $dokumen_mahasiswa->surat_selesai);
        }
        if (File::exists('storage/dokumen-mahasiswa/krs/' . $dokumen_mahasiswa->krs)) {
            File::delete('storage/dokumen-mahasiswa/krs/' . $dokumen_mahasiswa->krs);
        }

        // hapus data di tabel database
        DokumenMahasiswa::where('id', $id)->delete();

        return redirect()->route('admin.dokumen-mahasiswa')->with('success', 'Data berhasil dihapus.');
    }
}
