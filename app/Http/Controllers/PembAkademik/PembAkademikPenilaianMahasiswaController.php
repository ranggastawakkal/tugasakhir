<?php

namespace App\Http\Controllers\PembAkademik;

use App\Http\Controllers\Controller;
use App\Models\BobotPembLap;
use App\Models\Kelas;
use App\Models\KerjaPraktek;
use App\Models\Mahasiswa;
use App\Models\NilaiPembAkd;
use App\Models\NilaiPembLap;
use App\Models\SubClo;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PembAkademikPenilaianMahasiswaController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $kerja_praktek = KerjaPraktek::where('id_pemb_akd',  $id)->get();

        return view('pembimbing-akademik/penilaian/penilaian-mahasiswa/index', compact('kerja_praktek'));
    }

    public function show($id)
    {
        $nilai_pemb_lap = NilaiPembLap::where('id_mahasiswa', $id)->get();
        $nilai_pemb_akd = NilaiPembAkd::where('id_mahasiswa', $id)->get();
        $kerja_praktek = KerjaPraktek::where('id_mahasiswa',  $id)->get();
        $total_nilai_pemb_lap = $nilai_pemb_lap->sum('nilai');
        $total_nilai_pemb_akd = $nilai_pemb_akd->sum('nilai');
        $total_nilai = $total_nilai_pemb_lap + $total_nilai_pemb_akd;

        // $nilai_pembimbing = NilaiPembLap::join('bobot_pemb_lap', 'nilai_pemb_lap.id_bobot', '=', 'bobot_pemb_lap.id')
        //     ->join('sub_clo', 'bobot_pemb_lap.id_sub_clo', '=', 'sub_clo.id')
        //     ->join('bobot_pemb_akd', 'sub_clo.id', '=', 'bobot_pemb_akd.id_sub_clo')
        //     ->join('nilai_pemb_akd', 'bobot_pemb_akd.id', '=', 'nilai_pemb_akd.id_bobot')
        //     ->select('nilai_pemb_akd.*', 'nilai_pemb_lap.*')
        //     ->where('id_mahasiswa', $id)
        //     ->get();

        // $bobot_pemb_akd = BobotPembLap::join('sub_clo', 'bobot_pemb_akd.id_sub_clo', '=', 'sub_clo.id')
        //     ->join('clo', 'sub_clo.id_clo', '=', 'clo.id')
        //     ->join('plo', 'clo.id_plo', '=', 'plo.id')
        //     ->join('periode', 'plo.id_periode', '=', 'periode.id')
        //     ->join('program_studi', 'plo.id_prodi', '=', 'program_studi.id')
        //     ->join('mahasiswa', 'plo.id_periode', '=', 'mahasiswa.id_periode')
        //     ->join('kelas', 'mahasiswa.id_kelas', '=', 'kelas.id')
        //     ->join('nilai_pemb_akd', 'bobot_pemb_akd.id', '=', 'nilai_pemb_akd.id_bobot')
        //     ->select('bobot_pemb_akd.id')
        //     ->where('mahasiswa.id', '=', $id)
        // ->where('mahasiswa.id_periode', '=', 'periode.id')
        // ->where('mahasiswa.id_kelas', '=', 'kelas.id')
        // ->where('kelas.id_prodi', '=', 'program_studi.id')
        // ->where('plo.id_prodi', '=', 'program_studi.id')
        // ->where('plo.id_periode', '=', 'periode.id')
        // ->where('clo.id_plo', '=', 'plo.id')
        // ->where('sub_clo.id_clo', '=', 'clo.id')
        // ->where('bobot_pemb_akd.id_sub_clo', '=', 'sub_clo.id')
        // ->get();

        $bobot_pemb = BobotPembLap::all();

        // $id_sub_clo = DB::table('bobot_pemb_akd')
        //     ->join('sub_clo', 'bobot_pemb_akd.id_sub_clo', '=', 'sub_clo.id')
        //     ->join('clo', 'sub_clo.id_clo', '=', 'clo.id')
        //     ->join('plo', 'clo.id_plo', '=', 'plo.id')
        //     ->join('periode', 'plo.id_periode', '=', 'periode.id')
        //     ->join('mahasiswa', 'periode.id', '=', 'mahasiswa.id_periode')
        //     ->join('kelas', 'mahasiswa.id_kelas', '=', 'kelas.id')
        //     ->join('program_studi', 'kelas.id_prodi', '=', 'program_studi.id')
        //     ->select('sub_clo.id')
        //     ->where('mahasiswa.id_periode', '=', 'periode.id')
        //     ->where('mahasiswa.id_kelas', '=', 'kelas.id')
        //     ->where('mahasiswa.id_kelas', '=', $id)
        //     ->where('kelas.id_prodi', '=', 'program_studi.id')
        //     ->get();
        // $sub_clo = BobotPembLap::where('id_sub_clo',  $id_sub_clo)->get();

        return view(
            'pembimbing-akademik/penilaian/penilaian-mahasiswa/show',
            compact('nilai_pemb_lap', 'nilai_pemb_akd', 'kerja_praktek', 'bobot_pemb', 'total_nilai_pemb_lap', 'total_nilai_pemb_akd', 'total_nilai')
        );
    }

    public function store(Request $request)
    {
        // buat validasi utk semua field yang diinput
        $rules = [
            'nama'            => 'required|unique:peminatan,nama',
            'id_kk'            => 'required',
            'id_prodi'            => 'required',
        ];

        $messages = [
            'nama.required'          => 'Peminatan wajib diisi.',
            'nama.unique'            => 'Peminatan sudah terdaftar.',
            'id_kk.required'          => 'Kelompok keahlian wajib diisi.',
            'id_prodi.required'          => 'Program studi wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        // insert setiap request dari form ke database via model
        $peminatan = new NilaiPembLap();
        $peminatan->nama = $request->nama;
        $peminatan->id_kk = $request->id_kk;
        $peminatan->id_prodi = $request->id_prodi;

        $simpan = $peminatan->save();

        if ($simpan) {
            Session::flash('success', 'Data berhasil ditambahkan.');
            return redirect()->route('admin.data.peminatan');
        } else {
            Session::flash('errors', 'Data gagal ditambahkan.');
            return redirect()->route('admin.data.peminatan');
        }
    }
}
