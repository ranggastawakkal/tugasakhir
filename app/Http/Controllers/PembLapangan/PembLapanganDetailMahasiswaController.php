<?php

namespace App\Http\Controllers\PembLapangan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PembLapanganDetailMahasiswaController extends Controller
{
    public function index()
    {
        return view('pembimbing-lapangan/detail-mahasiswa');
    }
}
