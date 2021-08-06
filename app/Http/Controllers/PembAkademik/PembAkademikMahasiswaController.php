<?php

namespace App\Http\Controllers\PembAkademik;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\KerjaPraktek;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembAkademikMahasiswaController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        // $mahasiswakp = DB::table('mahasiswa')
        //     ->join('kerja_praktek', 'mahasiswa.id', '=', 'kerja_praktek.id_mahasiswa')
        //     ->join('kelas', 'mahasiswa.id_kelas', '=', 'kelas.id')
        //     ->join('peminatan', 'mahasiswa.id_peminatan', '=', 'peminatan.id')
        //     ->select('mahasiswa.*', 'kerja_praktek.*', 'kelas.*', 'peminatan.*')
        //     ->where('kerja_praktek.id_pemb_akd', '=', $id)
        //     ->get();


        $kerja_praktek = KerjaPraktek::where('id_pemb_akd',  $id)->get();

        return view('pembimbing-akademik/data-mahasiswa', compact('kerja_praktek'));
    }
}
