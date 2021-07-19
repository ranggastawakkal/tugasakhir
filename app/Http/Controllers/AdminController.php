<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin/index');
    }

    public function suratPengantar()
    {
        return view('admin/surat-pengantar');
    }

    public function dataMahasiswa()
    {
        return view('admin/data/mahasiswa');
    }

    public function dataPembimbingAkademik()
    {
        return view('admin/data/pembimbing-akademik');
    }

    public function dataPembimbingLapangan()
    {
        return view('admin/data/pembimbing-lapangan');
    }

    public function dataProgramStudi()
    {
        return view('admin/data/program-studi');
    }

    public function dataKelas()
    {
        return view('admin/data/kelas');
    }

    public function templateLaporan()
    {
        return view('admin/template-laporan');
    }

    public function dokumenKP()
    {
        return view('admin/dokumen-kp');
    }
}
