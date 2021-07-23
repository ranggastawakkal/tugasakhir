<?php

namespace App\Http\Controllers\PembAkademik;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PembAkademikLaporanKPController extends Controller
{
    public function index()
    {
        $mahasiswa = DB::table('mahasiswa')
            ->join('kelas', 'mahasiswa.id_kelas', '=', 'kelas.id')
            ->leftJoin('kerja_praktek', 'mahasiswa.nim', '=', 'kerja_praktek.nim')
            ->select('mahasiswa.nim', 'mahasiswa.nama', 'kelas.nama_kelas')
            ->whereNull('kerja_praktek.nim')
            ->get();


        $mahasiswakp = DB::table('mahasiswa')
            ->join('kerja_praktek', 'mahasiswa.nim', '=', 'kerja_praktek.nim')
            ->join('kelas', 'mahasiswa.id_kelas', '=', 'kelas.id')
            ->select('mahasiswa.*', 'kerja_praktek.*', 'kelas.*')
            ->where('kerja_praktek.nip_pemb_akd', '=', '2007829193')
            ->get();


        return view('pembimbing-akademik/laporan-kp', compact('mahasiswa', 'mahasiswakp'));
    }
}
