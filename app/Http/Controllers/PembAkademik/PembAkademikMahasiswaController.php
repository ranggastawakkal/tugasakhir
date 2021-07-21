<?php

namespace App\Http\Controllers\PembAkademik;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PembAkademikMahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = DB::table('mahasiswa')
            ->join('kelas', 'mahasiswa.id_kelas', "=", 'kelas.id')
            ->join('program_studi', 'kelas.id_prodi', "=", 'program_studi.id')
            ->select('mahasiswa.*', 'kelas.nama_kelas', 'program_studi.nama_prodi')
            ->paginate(25);
        // $mahasiswa = Mahasiswa::all()->paginate(1);
        return view('pembimbing-akademik/data-mahasiswa', compact('mahasiswa'));
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;

        $mahasiswa = DB::table('mahasiswa')
            ->join('kelas', 'mahasiswa.id_kelas', "=", 'kelas.id')
            ->join('program_studi', 'kelas.id_prodi', "=", 'program_studi.id')
            ->select('mahasiswa.*', 'kelas.nama_kelas', 'program_studi.nama_prodi')
            ->where('nim', 'like', "%" . $cari . "%")
            ->paginate(25);

        return view('pembimbing-akademik/data-mahasiswa', compact('mahasiswa'));
    }
}
