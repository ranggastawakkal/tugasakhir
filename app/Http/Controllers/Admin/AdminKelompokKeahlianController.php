<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KelompokKeahlian;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminKelompokKeahlianController extends Controller
{
    public function index()
    {
        $kelompok_keahlian = KelompokKeahlian::all();
        return view('admin/data/kelompok-keahlian', compact('kelompok_keahlian'));
    }

    public function store(Request $request)
    {
        // buat validasi utk semua field yang diinput
        $rules = [
            'nama_kk'            => 'required|unique:kelompok_keahlian,nama_kk',
        ];

        $messages = [
            'nama_kk.required'          => 'Kelompok keahlian wajib diisi.',
            'nama_kk.unique'            => 'Kelompok keahlian sudah terdaftar.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        // insert setiap request dari form ke database via model
        $kk = new KelompokKeahlian;
        $kk->nama_kk = $request->nama_kk;

        $simpan = $kk->save();

        if ($simpan) {
            Session::flash('success', 'Data berhasil ditambahkan.');
            return redirect()->route('admin.data.kelompok-keahlian');
        } else {
            Session::flash('errors', 'Data gagal ditambahkan.');
            return redirect()->route('admin.data.kelompok-keahlian');
        }
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'nama_kk'            => 'required|unique:kelompok_keahlian,nama_kk,' . $request->id,
        ];

        $messages = [
            'nama_kk.required'          => 'Nama kelompok keahlian wajib diisi.',
            'nama_kk.unique'            => 'Nama kelompok keahlian sudah terdaftar.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $simpan = KelompokKeahlian::find($id)->update($request->all());

        if ($simpan) {
            Session::flash('success', 'Data berhasil diubah.');
            return redirect()->route('admin.data.kelompok-keahlian');
        } else {
            Session::flash('errors', 'Data gagal diubah.');
            return redirect()->route('admin.data.kelompok-keahlian');
        }
    }

    public function destroy($id)
    {
        DB::table('kelompok_keahlian')->where('id', $id)->delete();

        return redirect()->route('admin.data.kelompok-keahlian')->with('success', 'Data berhasil dihapus.');
    }
}
