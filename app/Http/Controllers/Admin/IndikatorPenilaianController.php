<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\IndikatorPenilaian;
use App\Models\Clo;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class IndikatorPenilaianController extends Controller
{
    public function index()
    {
        $indikator_penilaian = IndikatorPenilaian::all();
        $clo = Clo::all();
        return view('admin/learning-outcomes/indikator-penilaian', compact('indikator_penilaian', 'clo'));
    }

    public function store(Request $request)
    {
        // buat validasi utk semua field yang diinput
        $rules = [
            'deskripsi'              => 'required',
            'id_clo'              => 'required',
        ];

        $messages = [
            'deskripsi.required'          => 'Deskripsi wajib diisi.',
            'id_clo.required'          => 'Kode CLO wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        // insert setiap request dari form ke database via model
        $indikator_penilaian = new IndikatorPenilaian;
        $indikator_penilaian->deskripsi = $request->deskripsi;
        $indikator_penilaian->id_clo = $request->id_clo;

        $simpan = $indikator_penilaian->save();

        if ($simpan) {
            Session::flash('success', 'Data berhasil ditambahkan.');
            return redirect()->route('learning-outcomes.indikator-penilaian');
        } else {
            Session::flash('errors', 'Data gagal ditambahkan.');
            return redirect()->route('learning-outcomes.indikator-penilaian');
        }
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'deskripsi'           => 'required',
            'id_clo'              => 'required',
        ];

        $messages = [
            'deskripsi.required'          => 'Deskripsi wajib diisi.',
            'id_clo.required'          => 'Kode PLO wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $simpan = IndikatorPenilaian::find($id)->update($request->all());

        if ($simpan) {
            Session::flash('success', 'Data berhasil diubah.');
            return redirect()->route('learning-outcomes.indikator-penilaian');
        } else {
            Session::flash('errors', 'Data gagal diubah.');
            return redirect()->route('learning-outcomes.indikator-penilaian');
        }
    }

    public function destroy($id)
    {
        IndikatorPenilaian::where('id', $id)->delete();

        return redirect()->route('learning-outcomes.indikator-penilaian')->with('success', 'Data berhasil dihapus.');
    }
}
