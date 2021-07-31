<?php

namespace App\Http\Controllers\PembLapangan;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembLapanganLogKegiatanController extends Controller
{
    public function index()
    {
        $mahasiswa = DB::table('mahasiswa')
            ->join('kelas', 'mahasiswa.id_kelas', '=', 'kelas.id')
            ->leftJoin('kerja_praktek', 'mahasiswa.nim', '=', 'kerja_praktek.nim')
            ->select('mahasiswa.nim', 'mahasiswa.nama', 'kelas.nama_kelas')
            ->whereNull('kerja_praktek.nim')
            ->get();

        $nip = Auth::user()->nip;
        $mahasiswakp = DB::table('mahasiswa')
            ->join('kerja_praktek', 'mahasiswa.nim', '=', 'kerja_praktek.nim')
            ->join('kelas', 'mahasiswa.id_kelas', '=', 'kelas.id')
            ->select('mahasiswa.*', 'kerja_praktek.*', 'kelas.*')
            ->where('kerja_praktek.nip_pemb_lap', '=', $nip)
            ->get();

        return view('pembimbing-lapangan/log-kegiatan', compact('mahasiswa', 'mahasiswakp'));
    }
}
