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
        $path = Storage::disk('public/dokumen-kp')->download($namaFile);

        return $path;
    }
}
