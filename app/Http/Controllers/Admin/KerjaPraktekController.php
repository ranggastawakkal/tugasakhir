<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KerjaPraktek;
use App\Models\PembimbingAkademik;
use App\Models\PembimbingLapangan;
use Illuminate\Http\Request;

class KerjaPraktekController extends Controller
{
    public function index()
    {
        $kerja_praktek = KerjaPraktek::all();
        $pembimbing_akademik = PembimbingAkademik::all();
        $pembimbing_lapangan = PembimbingLapangan::all();
        return view('admin/kerja-praktek', compact('kerja_praktek', 'pembimbing_akademik', 'pembimbing_lapangan'));
    }
}
