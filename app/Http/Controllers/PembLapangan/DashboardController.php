<?php

namespace App\Http\Controllers\PembLapangan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Auth;
use App\Models\KerjaPraktek;

class DashboardController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $kerja_praktek = KerjaPraktek::where('id_pemb_lap',  $id)->get();

        return view('pembimbing-lapangan/index', compact('kerja_praktek'));
    }
}
