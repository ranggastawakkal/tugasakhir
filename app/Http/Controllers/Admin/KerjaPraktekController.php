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
        return view('admin/kerja-praktek/index', compact('kerja_praktek'));
    }

    public function show($id)
    {
        $kerja_praktek = KerjaPraktek::find($id);
        return view('admin/kerja-praktek/show', compact('kerja_praktek'));
    }
}
