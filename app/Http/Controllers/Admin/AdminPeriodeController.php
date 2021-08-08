<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Periode;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminPeriodeController extends Controller
{
    public function index()
    {
        $periode = Periode::all();
        return view('admin/data/periode', compact('periode'));
    }

    public function store(Request $request)
    {
        // buat validasi utk semua field yang diinput
        $rules = [
            'semester'            => 'required',
            'tahun_ajaran'            => 'required',
        ];

        $messages = [
            'semester.required'          => 'Semester wajib diisi.',
            'tahun_ajaran.required'          => 'Tahun ajaran wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        // insert setiap request dari form ke database via model
        $periode = new Periode;
        $periode->semester = $request->semester;
        $periode->tahun_ajaran = $request->tahun_ajaran;

        $simpan = $periode->save();

        if ($simpan) {
            Session::flash('success', 'Data berhasil ditambahkan.');
            return redirect()->route('admin.data.periode');
        } else {
            Session::flash('errors', 'Data gagal ditambahkan.');
            return redirect()->route('admin.data.periode');
        }
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'semester'            => 'required',
            'tahun_ajaran'            => 'required',
        ];

        $messages = [
            'semester.required'          => 'Semester wajib diisi.',
            'tahun_ajaran.required'          => 'Tahun ajaran wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $simpan = Periode::find($id)->update($request->all());

        if ($simpan) {
            Session::flash('success', 'Data berhasil diubah.');
            return redirect()->route('admin.data.periode');
        } else {
            Session::flash('errors', 'Data gagal diubah.');
            return redirect()->route('admin.data.periode');
        }
    }

    public function destroy($id)
    {
        DB::table('periode')->where('id', $id)->delete();

        return redirect()->route('admin.data.periode')->with('success', 'Data berhasil dihapus.');
    }
}
