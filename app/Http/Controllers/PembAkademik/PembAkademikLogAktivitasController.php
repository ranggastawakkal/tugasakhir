<?php

namespace App\Http\Controllers\PembAkademik;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\LogAktivitas;


class PembAkademikLogAktivitasController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $log_aktivitas = LogAktivitas::where('id_pemb_akd',  $id)->get();

        return view('pembimbing-akademik/log-aktivitas', compact('log_aktivitas'));
    }
}
