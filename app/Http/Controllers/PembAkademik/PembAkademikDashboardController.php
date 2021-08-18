<?php

namespace App\Http\Controllers\PembAkademik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\KerjaPraktek;

class PembAkademikDashboardController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $kerja_praktek = KerjaPraktek::where('id_pemb_akd',  $id)->get();

        return view('pembimbing-akademik/index', compact('kerja_praktek'));
    }
}
