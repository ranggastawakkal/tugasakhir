<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\DokumenKp;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DokumenMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dokumenKp = DokumenKp::where('aktor', 'Mahasiswa')->get();
        return view('mahasiswa.template-laporan.index', compact('dokumenKp'));
    }

    public function download($namaFile)
    {
        if (Storage::disk('public')->exists("dokumen-kp/$namaFile")) {
            $path = Storage::disk('public')->path("dokumen-kp/$namaFile");
            $content = file_get_contents($path);
            return response($content)->withHeaders([
                'Content-Type' => mime_content_type($path)
            ]);
        }

        return redirect()->route('mahasiswa.template-laporan.index')->with('errors', 'Gagal mengunduh file.');
    }
}
