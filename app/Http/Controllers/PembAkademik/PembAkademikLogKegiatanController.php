<?php

namespace App\Http\Controllers\PembAkademik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PembAkademikLogKegiatanController extends Controller
{
    public function index()
    {
        return view('pembimbing-akademik/log-kegiatan');
    }
}
