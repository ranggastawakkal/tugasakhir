<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Clo;
use App\Models\Plo;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CloController extends Controller
{
    public function index()
    {
        $clo = Clo::all();
        $plo = Plo::all();
        return view('admin/learning-outcomes/clo', compact('clo', 'plo'));
    }

    public function store(Request $request)
    {
        // buat validasi utk semua field yang diinput
        $rules = [
            'kode_clo'            => 'required',
            'deskripsi'              => 'required',
            'id_plo'              => 'required',
        ];

        $messages = [
            'kode_clo.required'          => 'Kode CLO wajib diisi.',
            'deskripsi.required'          => 'Deskripsi wajib diisi.',
            'id_plo.required'          => 'Kode PLO wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        // insert setiap request dari form ke database via model
        $clo = new Clo;
        $clo->kode_clo = $request->kode_clo;
        $clo->deskripsi = $request->deskripsi;
        $clo->id_plo = $request->id_plo;

        $simpan = $clo->save();

        if ($simpan) {
            Session::flash('success', 'Data berhasil ditambahkan.');
            return redirect()->route('learning-outcomes.clo');
        } else {
            Session::flash('errors', 'Data gagal ditambahkan.');
            return redirect()->route('learning-outcomes.clo');
        }
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'kode_clo'            => 'required',
            'deskripsi'           => 'required',
            'id_plo'              => 'required',
        ];

        $messages = [
            'kode_clo.required'          => 'Kode CLO wajib diisi.',
            'deskripsi.required'          => 'Deskripsi wajib diisi.',
            'id_plo.required'          => 'Kode PLO wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $simpan = Clo::find($id)->update($request->all());

        if ($simpan) {
            Session::flash('success', 'Data berhasil diubah.');
            return redirect()->route('learning-outcomes.clo');
        } else {
            Session::flash('errors', 'Data gagal diubah.');
            return redirect()->route('learning-outcomes.clo');
        }
    }

    public function destroy($id)
    {
        Clo::where('id', $id)->delete();

        return redirect()->route('learning-outcomes.clo')->with('success', 'Data berhasil dihapus.');
    }
}
