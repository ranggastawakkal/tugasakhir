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

<<<<<<< HEAD
        $nip = Auth::user()->nip;
        $mahasiswakp = DB::table('mahasiswa')
            ->join('kerja_praktek', 'mahasiswa.nim', '=', 'kerja_praktek.nim')
            ->join('kelas', 'mahasiswa.id_kelas', '=', 'kelas.id')
            ->select('mahasiswa.*', 'kerja_praktek.*', 'kelas.*')
            ->where('kerja_praktek.nip_pemb_lap', '=', $nip)
            ->get();
=======
        $kerja_praktek = KerjaPraktek::where('id_pemb_lap',  $id)->get();
>>>>>>> dev-rangga

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
