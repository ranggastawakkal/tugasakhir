<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peminatan;
use App\Models\KelompokKeahlian;
use App\Models\ProgramStudi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminPeminatanController extends Controller
{
    public function index()
    {
        $peminatan = Peminatan::all();
        $kelompok_keahlian = KelompokKeahlian::all();
        $program_studi = ProgramStudi::all();
        return view('admin/data/peminatan', compact('peminatan', 'kelompok_keahlian', 'program_studi'));
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
        $peminatan = new Peminatan;
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

    public function update(Request $request, $id)
    {
        $rules = [
            'nama'            => 'required|unique:peminatan,nama,' . $request->id,
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

        $simpan = Peminatan::find($id)->update($request->all());

        if ($simpan) {
            Session::flash('success', 'Data berhasil diubah.');
            return redirect()->route('admin.data.peminatan');
        } else {
            Session::flash('errors', 'Data gagal diubah.');
            return redirect()->route('admin.data.peminatan');
        }
    }

    public function destroy($id)
    {
        DB::table('peminatan')->where('id', $id)->delete();

        return redirect()->route('admin.data.peminatan')->with('success', 'Data berhasil dihapus.');
    }
}
