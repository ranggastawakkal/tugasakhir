<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProgramStudi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminProgramStudiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $program_studi = ProgramStudi::all();
        return view('admin/data/program-studi', compact('program_studi'));
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
            'nama_prodi'            => 'required|unique:program_studi,nama_prodi',
        ];

        $messages = [
            'nama_prodi.required'          => 'Program Studi wajib diisi.',
            'nama_prodi.unique'            => 'Program Studi sudah terdaftar.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        // insert setiap request dari form ke database via model
        $prodi = new ProgramStudi;
        $prodi->nama_prodi = $request->nama_prodi;

        $simpan = $prodi->save();

        if ($simpan) {
            Session::flash('success', 'Data berhasil ditambahkan.');
            return redirect()->route('admin.data.program-studi');
        } else {
            Session::flash('errors', 'Data gagal ditambahkan.');
            return redirect()->route('admin.data.program-studi');
        }
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'nama_prodi'            => 'required|unique:program_studi,nama_prodi,' . $request->id,
        ];

        $messages = [
            'nama_prodi.required'          => 'Nama prodi wajib diisi.',
            'nama_prodi.unique'            => 'Nama prodi sudah terdaftar.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $simpan = ProgramStudi::find($id)->update($request->all());

        if ($simpan) {
            Session::flash('success', 'Data berhasil diubah.');
            return redirect()->route('admin.data.program-studi');
        } else {
            Session::flash('errors', 'Data gagal diubah.');
            return redirect()->route('admin.data.program-studi');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProgramStudi  $programStudi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('program_studi')->where('id', $id)->delete();

        return redirect()->route('admin.data.program-studi')->with('success', 'Data berhasil dihapus.');
    }
}
