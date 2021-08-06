<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\PembimbingAkademik;
use App\Models\PembimbingLapangan;
use App\Models\ProgramStudi;
use App\Models\SuratPengantar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        $mhs_latest = Mahasiswa::latest('updated_at')->first()->updated_at;
        $pembimbing_akademik = PembimbingAkademik::all();
        $pemb_akd_latest = PembimbingAkademik::latest('updated_at')->first()->updated_at;
        $pembimbing_lapangan = PembimbingLapangan::all();
        $pemb_lap_latest = PembimbingLapangan::latest('updated_at')->first()->updated_at;
        $program_studi = ProgramStudi::all();
        $prodi_latest = ProgramStudi::latest('updated_at')->first()->updated_at;
        $kelas = Kelas::all();
        $kelas_latest = Kelas::latest('updated_at')->first()->updated_at;
        $surat_pengantar = SuratPengantar::all();
        $sp_latest = SuratPengantar::latest('updated_at')->first()->updated_at;

        return view('admin/index', compact(
            'mahasiswa',
            'mhs_latest',
            'pembimbing_akademik',
            'pemb_akd_latest',
            'pembimbing_lapangan',
            'pemb_lap_latest',
            'program_studi',
            'prodi_latest',
            'kelas',
            'kelas_latest',
            'surat_pengantar',
            'sp_latest',
        ));
    }
}
