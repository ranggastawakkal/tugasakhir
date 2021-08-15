<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KerjaPraktek;
use App\Models\NilaiPembAkd;
use App\Models\NilaiPembLap;
use App\Models\BobotPembAkd;

class NilaiMahasiswaController extends Controller
{
    public function index()
    {
        $kerja_praktek = KerjaPraktek::all();

        return view('admin/nilai-mahasiswa/index', compact('kerja_praktek'));
    }

    public function show($id)
    {
        $nilai_pemb_lap = NilaiPembLap::where('id_mahasiswa', $id)->get();
        $nilai_pemb_akd = NilaiPembAkd::where('id_mahasiswa', $id)->get();
        $kerja_praktek = KerjaPraktek::where('id_mahasiswa',  $id)->get();
        $total_nilai_pemb_lap = $nilai_pemb_lap->sum('nilai');
        $total_nilai_pemb_akd = $nilai_pemb_akd->sum('nilai');
        $total_nilai = $total_nilai_pemb_lap + $total_nilai_pemb_akd;

        if ($kerja_praktek) {
            return view(
                'admin/nilai-mahasiswa/show',
                compact('nilai_pemb_lap', 'nilai_pemb_akd', 'kerja_praktek', 'total_nilai_pemb_lap', 'total_nilai_pemb_akd', 'total_nilai')
            );
        } else {
            return abort(404);
        }
    }
}
