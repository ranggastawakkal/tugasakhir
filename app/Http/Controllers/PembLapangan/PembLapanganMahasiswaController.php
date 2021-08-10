<?php

namespace App\Http\Controllers\PembLapangan;

use App\Http\Controllers\Controller;
use App\Models\KerjaPraktek;
use Illuminate\Support\Facades\Auth;

class PembLapanganMahasiswaController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;

        $kerja_praktek = KerjaPraktek::where('id_pemb_lap',  $id)->get();

        return view('pembimbing-lapangan/data-mahasiswa/index', compact('kerja_praktek'));
    }

    public function show($id)
    {
        $id_pemb_lap = Auth::user()->id;
        $kerja_praktek = KerjaPraktek::where('id_pemb_lap', $id_pemb_lap)->find($id);

        if ($kerja_praktek) {
            return view('pembimbing-lapangan/data-mahasiswa/show', compact('kerja_praktek'));
        } else {
            return abort(404);
        }
    }
}
