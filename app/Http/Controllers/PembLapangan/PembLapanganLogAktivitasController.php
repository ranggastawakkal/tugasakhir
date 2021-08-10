<?php

namespace App\Http\Controllers\PembLapangan;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\LogAktivitas;
use App\Models\KerjaPraktek;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PembLapanganLogAktivitasController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $kerja_praktek = KerjaPraktek::where('id_pemb_lap',  $id)->get();

        return view('pembimbing-lapangan/log-aktivitas/index', compact('kerja_praktek'));
    }

    public function show($id)
    {
        $id_pemb_lap = Auth::user()->id;
        $log_aktivitas = LogAktivitas::where('id_mahasiswa', $id)->where('id_pemb_lap', $id_pemb_lap)->get();
        $kerja_praktek = KerjaPraktek::where('id_mahasiswa',  $id)->where('id_pemb_lap', $id_pemb_lap)->get();

        if ($log_aktivitas && $kerja_praktek) {
            return view('pembimbing-lapangan/log-aktivitas/show', compact('log_aktivitas', 'kerja_praktek'));
        } else {
            return abort(404);
        }
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'evaluasi'            => 'required',
        ];

        $messages = [
            'evaluasi.required'          => 'Evaluasi wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $simpan = LogAktivitas::find($id)->update($request->all());

        if ($simpan) {
            Session::flash('success', 'Data berhasil diubah.');
            return redirect()->back();
        } else {
            Session::flash('errors', 'Data gagal diubah.');
            return redirect()->back();
        }
    }
}
