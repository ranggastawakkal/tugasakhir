<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dokumen;
use App\Models\DokumenMahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
}
