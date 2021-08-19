<?php

namespace App\Http\Controllers\PembLapangan;

use App\Http\Controllers\Controller;
use App\Models\DokumenKp;
use App\Models\Kelas;
use App\Models\KerjaPraktek;
use App\Models\Mahasiswa;
use App\Models\DokumenMahasiswa;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Storage;
>>>>>>> dev-rangga

class PembLapanganLaporanKpController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
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
=======
        $id = Auth::user()->id;

        $laporan_kp = DB::table('dokumen_mahasiswa')
            ->join('kerja_praktek', 'dokumen_mahasiswa.id_mahasiswa', '=', 'kerja_praktek.id_mahasiswa')
            ->join('mahasiswa', 'dokumen_mahasiswa.id_mahasiswa', '=', 'mahasiswa.id')
            ->join('kelas', 'mahasiswa.id_kelas', '=', 'kelas.id')
            ->join('peminatan', 'mahasiswa.id_peminatan', '=', 'peminatan.id')
            ->select('dokumen_mahasiswa.*', 'kerja_praktek.*', 'mahasiswa.*', 'kelas.*')
            ->where('kerja_praktek.id_pemb_lap', '=', $id)
>>>>>>> dev-rangga
            ->get();

        // $kerja_praktek = KerjaPraktek::where('id_pemb_lap',  $id)->get();
        // $laporan_kp = DokumenMahasiswa::where('id_mahasiswa', $kerja_praktek->mahasiswa->id)->get();

        return view('pembimbing-lapangan/laporan-kp', compact('laporan_kp'));
    }

    public function getFile(Request $request)
    {
        if (Storage::disk('public')->exists("dokumen-mahasiswa/laporan/$request->file")) {
            $path = Storage::disk('public')->path("dokumen-mahasiswa/laporan/$request->file");
            $content = file_get_contents($path);
            return response($content)->withHeaders([
                'Content-Type' => mime_content_type($path)
            ]);
        }
        return redirect()->route('pembimbing-lapangan.laporan-kp')->with('errors', 'Gagal mengunduh file.');
    }
}
