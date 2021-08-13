<?php

namespace App\Http\Controllers\PembLapangan;

use App\Http\Controllers\Controller;
use App\Models\BobotPembLap;
use App\Models\Kelas;
use App\Models\KerjaPraktek;
use App\Models\Mahasiswa;
use App\Models\NilaiPembLap;
use App\Models\SubClo;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PembLapanganPenilaianMahasiswaController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $kerja_praktek = KerjaPraktek::where('id_pemb_lap',  $id)->get();

        return view('pembimbing-lapangan/penilaian/penilaian-mahasiswa/index', compact('kerja_praktek'));
    }

    public function show($id)
    {
        $id_pemb_lap = Auth::user()->id;
        $nilai_pemb_lap = NilaiPembLap::where('id_mahasiswa', $id)->get();
        $kerja_praktek = KerjaPraktek::where('id_mahasiswa',  $id)->where('id_pemb_lap', $id_pemb_lap)->get();
        $mahasiswa = Mahasiswa::where('id', $id)->get();
        // $id_bobot = BobotPembLap::where('id', $mahasiswa->periode->plo->clo->subClo->id)->get();
        // ->join('sub_clo', 'bobot_pemb_lap.id_sub_clo', '=', 'sub_clo.id')
        // ->join('clo', 'sub_clo.id_clo', '=', 'clo.id')
        // ->join('plo', 'clo.id_plo', '=', 'plo.id')
        // ->join('periode', 'plo.id_periode', '=', 'periode.id')
        // ->join('program_studi', 'plo.id_prodi', '=', 'program_studi.id')
        // ->join('mahasiswa', 'plo.id_periode', '=', 'mahasiswa.id_periode')
        // ->select('bobot_pemb_lap.id')


        $bobot_pemb = BobotPembLap::all();

        if ($kerja_praktek) {
            return view('pembimbing-lapangan/penilaian/penilaian-mahasiswa/show', compact('nilai_pemb_lap', 'kerja_praktek', 'bobot_pemb'));
        } else {
            return abort(404);
        }
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
