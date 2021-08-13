<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubClo;
use App\Models\Clo;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SubCloController extends Controller
{
    public function index()
    {
        $sub_clo = SubClo::all();
        $clo = Clo::all();
        return view('admin/learning-outcomes/sub-clo', compact('sub_clo', 'clo'));
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
        $sub_clo = new SubClo;
        $sub_clo->deskripsi = $request->deskripsi;
        $sub_clo->id_clo = $request->id_clo;

        $simpan = $sub_clo->save();

        if ($simpan) {
            Session::flash('success', 'Data berhasil ditambahkan.');
            return redirect()->route('learning-outcomes.sub-clo');
        } else {
            Session::flash('errors', 'Data gagal ditambahkan.');
            return redirect()->route('learning-outcomes.sub-clo');
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

        $simpan = SubClo::find($id)->update($request->all());

        if ($simpan) {
            Session::flash('success', 'Data berhasil diubah.');
            return redirect()->route('learning-outcomes.sub-clo');
        } else {
            Session::flash('errors', 'Data gagal diubah.');
            return redirect()->route('learning-outcomes.sub-clo');
        }
    }

    public function destroy($id)
    {
        SubClo::where('id', $id)->delete();

        return redirect()->route('learning-outcomes.sub-clo')->with('success', 'Data berhasil dihapus.');
    }
}
