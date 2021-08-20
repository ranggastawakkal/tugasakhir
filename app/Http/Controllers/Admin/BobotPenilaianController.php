<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BobotPembAkd;
use App\Models\BobotPembLap;
use App\Models\IndikatorPenilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BobotPenilaianController extends Controller
{
    public function index()
    {
        $bobot_pemb_akd = BobotPembAkd::all();
        $bobot_pemb_lap = BobotPembLap::all();
        $indikator_penilaian = IndikatorPenilaian::all();
        $total_bobot_pemb_akd = $bobot_pemb_akd->sum('bobot');
        $total_bobot_pemb_lap = $bobot_pemb_lap->sum('bobot');
        $total_bobot = $total_bobot_pemb_lap + $total_bobot_pemb_akd;
        return view('admin/learning-outcomes/bobot-penilaian', compact('bobot_pemb_akd', 'bobot_pemb_lap', 'indikator_penilaian', 'total_bobot_pemb_akd', 'total_bobot_pemb_lap', 'total_bobot'));
    }

    // Bobot Pembimbing Akademik

    public function storePembAkd(Request $request)
    {
        // buat validasi utk semua field yang diinput
        $rules = [
            'id_indikator'         => 'required|unique:bobot_pemb_akd,id_indikator',
            'bobot'              => 'required',
        ];

        $messages = [
            'id_indikator.required'     => 'Indikator Penilaian wajib diisi.',
            'id_indikator.unique'       => 'Indikator Penilaian sudah terdaftar.',
            'bobot.required'          => 'Bobot wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $bobot_pemb_akd = BobotPembAkd::all();
        $bobot_pemb_lap = BobotPembLap::all();
        $total_bobot_pemb_akd = $bobot_pemb_akd->sum('bobot');
        $total_bobot_pemb_lap = $bobot_pemb_lap->sum('bobot');
        $total_bobot = $total_bobot_pemb_lap + $total_bobot_pemb_akd + $request->bobot;

        if ($total_bobot > 100) {
            return redirect()->back()->withErrors('Jumlah bobot penilaian melebihi batas maksimal 100%.');
        } else {
            $bobot_pemb = new BobotPembAkd;
            $bobot_pemb->id_indikator = $request->id_indikator;
            $bobot_pemb->bobot = $request->bobot;

            $bobot_pemb->save();

            Session::flash('success', 'Data berhasil ditambahkan.');
            return redirect()->route('bobot-penilaian');
        }
    }

    public function updatePembAkd(Request $request, $id)
    {
        $rules = [
            'id_indikator'         => 'required|unique:bobot_pemb_akd,id_indikator,' . $request->id,
            'bobot'              => 'required',
        ];

        $messages = [
            'id_indikator.required'     => 'Indikator Penilaian wajib diisi.',
            'id_indikator.unique'       => 'Indikator Penilaian sudah terdaftar.',
            'bobot.required'          => 'Bobot wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
        $bobot_pemb_akd = BobotPembAkd::all();
        $bobot_pemb_lap = BobotPembLap::all();
        $bobot = BobotPembAkd::find($id)->first();
        $total_bobot_pemb_akd = $bobot_pemb_akd->sum('bobot');
        $total_bobot_pemb_lap = $bobot_pemb_lap->sum('bobot');
        $total_bobot = $total_bobot_pemb_lap + $total_bobot_pemb_akd - $bobot->bobot + $request->bobot;

        if ($total_bobot > 100) {
            return redirect()->back()->withErrors('Jumlah bobot penilaian melebihi batas maksimal 100%.');
        } else {
            BobotPembAkd::find($id)->update($request->all());
            Session::flash('success', 'Data berhasil diubah.');
            return redirect()->route('bobot-penilaian');
        }
    }

    public function destroyPembAkd($id)
    {
        BobotPembAkd::where('id', $id)->delete();

        return redirect()->route('bobot-penilaian')->with('success', 'Data berhasil dihapus.');
    }

    // End of Bobot Pembimbing Akademik

    // Bobot Pembimbing Lapangan

    public function storePembLap(Request $request)
    {
        // buat validasi utk semua field yang diinput
        $rules = [
            'id_indikator'         => 'required|unique:bobot_pemb_lap,id_indikator',
            'bobot'              => 'required',
        ];

        $messages = [
            'id_indikator.required'     => 'Indikator Penilaian wajib diisi.',
            'id_indikator.unique'       => 'Indikator Penilaian sudah terdaftar.',
            'bobot.required'          => 'Bobot wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $bobot_pemb_akd = BobotPembAkd::all();
        $bobot_pemb_lap = BobotPembLap::all();
        $total_bobot_pemb_akd = $bobot_pemb_akd->sum('bobot');
        $total_bobot_pemb_lap = $bobot_pemb_lap->sum('bobot');
        $total_bobot = $total_bobot_pemb_lap + $total_bobot_pemb_akd + $request->bobot;

        if ($total_bobot > 100) {
            return redirect()->back()->withErrors('Jumlah bobot penilaian melebihi batas maksimal 100%.');
        } else {
            $bobot_pemb = new BobotPembLap;
            $bobot_pemb->id_indikator = $request->id_indikator;
            $bobot_pemb->bobot = $request->bobot;

            $bobot_pemb->save();

            Session::flash('success', 'Data berhasil ditambahkan.');
            return redirect()->route('bobot-penilaian');
        }
    }

    public function updatePembLap(Request $request, $id)
    {
        $rules = [
            'id_indikator'         => 'required|unique:bobot_pemb_lap,id_indikator,' . $request->id,
            'bobot'              => 'required',
        ];

        $messages = [
            'id_indikator.required'     => 'Indikator Penilaian wajib diisi.',
            'id_indikator.unique'       => 'Indikator Penilaian sudah terdaftar.',
            'bobot.required'          => 'Bobot wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
        $bobot_pemb_akd = BobotPembAkd::all();
        $bobot_pemb_lap = BobotPembLap::all();
        $bobot = BobotPembLap::find($id)->first();
        $total_bobot_pemb_akd = $bobot_pemb_akd->sum('bobot');
        $total_bobot_pemb_lap = $bobot_pemb_lap->sum('bobot');
        $total_bobot = $total_bobot_pemb_lap + $total_bobot_pemb_akd - $bobot->bobot + $request->bobot;

        if ($total_bobot > 100) {
            return redirect()->back()->withErrors('Jumlah bobot penilaian melebihi batas maksimal 100%.');
        } else {
            BobotPembLap::find($id)->update($request->all());
            Session::flash('success', 'Data berhasil diubah.');
            return redirect()->route('bobot-penilaian');
        }
    }

    public function destroyPembLap($id)
    {
        BobotPembLap::where('id', $id)->delete();

        return redirect()->route('bobot-penilaian')->with('success', 'Data berhasil dihapus.');
    }

    // End of Bobot Pembimbing Lapangan
}
