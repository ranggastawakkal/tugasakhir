<?php

namespace App\Http\Controllers\PembLapangan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\KerjaPraktek;
use App\Models\NilaiPembLap;
use App\Models\Mahasiswa;
use App\Models\BobotPembLap;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class PenilaianMahasiswaController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $kerja_praktek = KerjaPraktek::where('id_pemb_lap',  $id)->get();

        return view('pembimbing-lapangan/penilaian-mahasiswa/index', compact('kerja_praktek'));
    }

    public function show($id)
    {
        $id_pemb_lap = Auth::user()->id;
        $nilai_pemb_lap = NilaiPembLap::where('id_mahasiswa', $id)->get();
        $nilai_total = $nilai_pemb_lap->sum('nilai');
        $kerja_praktek = KerjaPraktek::where('id_mahasiswa',  $id)->where('id_pemb_lap', $id_pemb_lap)->get();
        $mahasiswa = Mahasiswa::where('id', $id)->get();
        $bobot_pemb = BobotPembLap::all();

        if ($kerja_praktek) {
            return view('pembimbing-lapangan/penilaian-mahasiswa/show', compact('nilai_pemb_lap', 'kerja_praktek', 'bobot_pemb', 'nilai_total'));
        } else {
            return abort(404);
        }
    }

    public function store(Request $request)
    {
        // buat validasi utk semua field yang diinput
        $rules = [
            'id_mahasiswa'            => 'required',
            'id_bobot'            => 'required',
            'nilai_angka'            => 'required|min:0|max:100',
        ];

        $messages = [
            'id_mahasiswa.required'          => 'ID Mahasiswa wajib diisi.',
            'id_bobot.required'          => 'ID Bobot wajib diisi.',
            'nilai_angka.required'          => 'Nilai Angka wajib diisi.',
            'nilai_angka.min'          => 'Nilai Angka minimal 0.',
            'nilai_angka.max'          => 'Nilai Angka maksimal 100.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $id_mahasiswas = $request->id_mahasiswa;
        $nilai_pemb_lap = [];
        for ($i = 0; $i < count($id_mahasiswas); $i++) {
            $nilai_pemb_lap = new NilaiPembLap();
            $nilai_pemb_lap->id_mahasiswa = $request->id_mahasiswa[$i];
            $nilai_pemb_lap->id_bobot = $request->id_bobot[$i];
            $nilai_pemb_lap->nilai_angka = $request->nilai_angka[$i];
            $nilai_pemb_lap->nilai = ($request->nilai_angka[$i] * $request->bobot[$i]) / 100;
            $simpan = $nilai_pemb_lap->save();
            if (!$simpan) {
                Session::flash('errors', 'Data gagal ditambahkan.');
                return back();
            }
        }

        if ($simpan) {
            Session::flash('success', 'Data berhasil ditambahkan.');
            return back();
        }
    }

    public function update(Request $request)
    {
        // buat validasi utk semua field yang diinput
        $rules = [
            'nilai_angka'            => 'required|min:0|max:100',
        ];

        $messages = [
            'nilai_angka.required'     => 'Nilai Angka wajib diisi.',
            'nilai_angka.min'          => 'Nilai Angka minimal 0.',
            'nilai_angka.max'          => 'Nilai Angka maksimal 100.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $ids = $request->id;
        $nilai_pemb_lap = [];
        for ($i = 0; $i < count($ids); $i++) {
            $nilai_pemb_lap = DB::table('nilai_pemb_lap')->where('id', $request->id[$i])->update([
                'nilai_angka' => $request->nilai_angka[$i],
                'nilai' => ($request->nilai_angka[$i] * $request->bobot[$i]) / 100,
                'updated_at' => now()
            ]);
            if (!$nilai_pemb_lap) {
                Session::flash('errors', 'Data gagal ditambahkan.');
                return back();
            }
        }

        if ($nilai_pemb_lap) {
            Session::flash('success', 'Berhasil edit nilai mahasiswa.');
            return back();
        }
    }
}
