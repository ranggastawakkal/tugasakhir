<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\ProgramStudi;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class AdminKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::all();
        $program_studi = ProgramStudi::all();
        return view('admin/data/kelas', compact('kelas', 'program_studi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // buat validasi utk semua field yang diinput
        $rules = [
            'nama_kelas'            => 'required|unique:kelas,nama_kelas',
            'id_prodi'              => 'required'
        ];

        $messages = [
            'nama_kelas.required'          => 'Nama Kelas wajib diisi.',
            'nama_kelas.unique'            => 'Kelas sudah terdaftar.',
            'id_prodi.required'            => 'Program studi wajib diisi.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        // insert setiap request dari form ke database via model
        $kelas = new Kelas;
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->id_prodi = $request->id_prodi;

        $simpan = $kelas->save();

        if ($simpan) {
            Session::flash('success', 'Data berhasil ditambahkan.');
            return redirect()->route('admin.data.kelas');
        } else {
            Session::flash('errors', 'Data gagal ditambahkan.');
            return redirect()->route('admin.data.kelas');
        }
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'nama_kelas'            => 'required|unique:kelas,nama_kelas,' . $request->id,
            'id_prodi'              => 'required',
        ];

        $messages = [
            'nama_kelas.required'          => 'Nama kelas wajib diisi.',
            'nama_kelas.unique'            => 'Nama kelas sudah terdaftar.',
            'id_prodi.required'            => 'Program studi wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $simpan = Kelas::find($id)->update($request->all());

        if ($simpan) {
            Session::flash('success', 'Data berhasil diubah.');
            return redirect()->route('admin.data.kelas');
        } else {
            Session::flash('errors', 'Data gagal diubah.');
            return redirect()->route('admin.data.kelas');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kelas::where('id', $id)->delete();

        return redirect()->route('admin.data.kelas')->with('success', 'Data berhasil dihapus.');
    }
}
