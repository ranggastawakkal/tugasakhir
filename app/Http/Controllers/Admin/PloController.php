<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Periode;
use App\Models\Plo;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class PloController extends Controller
{
    public function index()
    {
        $plo = Plo::all();
        $periodes = Periode::all();
        $program_studi = ProgramStudi::all();
        return view('admin/learning-outcomes/plo', compact('plo', 'periodes', 'program_studi'));
    }

    public function store(Request $request)
    {
        // buat validasi utk semua field yang diinput
        $rules = [
            'kode_plo'            => 'required',
            'deskripsi'              => 'required',
            'id_periode'              => 'required',
            'id_prodi'              => 'required',
        ];

        $messages = [
            'kode_plo.required'          => 'Kode PLO wajib diisi.',
            'deskripsi.required'          => 'Deskripsi wajib diisi.',
            'id_periode.required'          => 'Periode wajib diisi.',
            'id_prodi.required'          => 'Program Studi wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        // insert setiap request dari form ke database via model
        $plo = new Plo;
        $plo->kode_plo = $request->kode_plo;
        $plo->deskripsi = $request->deskripsi;
        $plo->id_periode = $request->id_periode;
        $plo->id_prodi = $request->id_prodi;

        $simpan = $plo->save();

        if ($simpan) {
            Session::flash('success', 'Data berhasil ditambahkan.');
            return redirect()->route('learning-outcomes.plo');
        } else {
            Session::flash('errors', 'Data gagal ditambahkan.');
            return redirect()->route('learning-outcomes.plo');
        }
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'kode_plo'            => 'required',
            'deskripsi'              => 'required',
            'id_periode'              => 'required',
            'id_prodi'              => 'required',
        ];

        $messages = [
            'kode_plo.required'          => 'Kode PLO wajib diisi.',
            'deskripsi.required'          => 'Deskripsi wajib diisi.',
            'id_periode.required'          => 'Periode wajib diisi.',
            'id_prodi.required'          => 'Program Studi wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $simpan = Plo::find($id)->update($request->all());

        if ($simpan) {
            Session::flash('success', 'Data berhasil diubah.');
            return redirect()->route('learning-outcomes.plo');
        } else {
            Session::flash('errors', 'Data gagal diubah.');
            return redirect()->route('learning-outcomes.plo');
        }
    }

    public function destroy($id)
    {
        Plo::where('id', $id)->delete();

        return redirect()->route('learning-outcomes.plo')->with('success', 'Data berhasil dihapus.');
    }
}
