<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BobotPembAkd;
use App\Models\BobotPembLap;
use App\Models\SubClo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BobotNilaiController extends Controller
{
    public function index()
    {
        $bobot_pemb_akd = BobotPembAkd::all();
        $bobot_pemb_lap = BobotPembLap::all();
        $sub_clo = SubClo::all();
        return view('admin/learning-outcomes/bobot-nilai', compact('bobot_pemb_akd', 'bobot_pemb_lap', 'sub_clo'));
    }

    // Bobot Pembimbing Akademik

    public function storePembAkd(Request $request)
    {
        // buat validasi utk semua field yang diinput
        $rules = [
            'id_sub_clo'         => 'required|unique:bobot_pemb_lap,id_sub_clo',
            'bobot'              => 'required',
        ];

        $messages = [
            'id_sub_clo.required'     => 'Indikator Penilaian wajib diisi.',
            'id_sub_clo.unique'       => 'Indikator Penilaian sudah terdaftar.',
            'bobot.required'          => 'Bobot wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        // insert setiap request dari form ke database via model
        $bobot_pemb_akd = new BobotPembAkd;
        $bobot_pemb_akd->id_sub_clo = $request->id_sub_clo;
        $bobot_pemb_akd->bobot = $request->bobot;

        $simpan = $bobot_pemb_akd->save();

        if ($simpan) {
            Session::flash('success', 'Data berhasil ditambahkan.');
            return redirect()->route('learning-outcomes.bobot-nilai');
        } else {
            abort(404);
        }
    }

    public function updatePembAkd(Request $request, $id)
    {
        $rules = [
            'id_sub_clo'         => 'required|unique:bobot_pemb_akd,id_sub_clo,' . $request->id,
            'bobot'              => 'required',
        ];

        $messages = [
            'id_sub_clo.required'     => 'Indikator Penilaian wajib diisi.',
            'id_sub_clo.unique'       => 'Indikator Penilaian sudah terdaftar.',
            'bobot.required'          => 'Bobot wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $simpan = BobotPembAkd::find($id)->update($request->all());

        if ($simpan) {
            Session::flash('success', 'Data berhasil diubah.');
            return redirect()->route('learning-outcomes.bobot-nilai');
        } else {
            Session::flash('errors', 'Data gagal diubah.');
            return redirect()->route('learning-outcomes.bobot-nilai');
        }
    }

    public function destroyPembAkd($id)
    {
        BobotPembAkd::where('id', $id)->delete();

        return redirect()->route('learning-outcomes.bobot-nilai')->with('success', 'Data berhasil dihapus.');
    }

    // End of Bobot Pembimbing Akademik

    // Bobot Pembimbing Lapangan



    // End of Bobot Pembimbing Lapangan
}
