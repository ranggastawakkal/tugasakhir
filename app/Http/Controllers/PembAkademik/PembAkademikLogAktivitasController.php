<?php

namespace App\Http\Controllers\PembAkademik;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\LogAktivitas;
use App\Models\KerjaPraktek;
use App\Models\Mahasiswa;

class PembAkademikLogAktivitasController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $kerja_praktek = KerjaPraktek::where('id_pemb_akd',  $id)->get();

        return view('pembimbing-akademik/log-aktivitas/index', compact('kerja_praktek'));
    }

    public function show($id)
    {
        $log_aktivitas = LogAktivitas::where('id_mahasiswa', $id)->get();
        $kerja_praktek = KerjaPraktek::where('id_mahasiswa',  $id)->get();

        return view('pembimbing-akademik/log-aktivitas/show', compact('log_aktivitas', 'kerja_praktek'));
    }
}
