<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PembimbingLapangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class AdminPembimbingLapanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembimbing_lapangan = PembimbingLapangan::all();
        return view('admin/data/pembimbing-lapangan', compact('pembimbing_lapangan'));
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
            'nip'                   => 'required|unique:pembimbing_akademik,nip',
            'email'                 => 'required|email|unique:pembimbing_akademik,email',
        ];

        $messages = [
            'nip.required'          => 'NIP wajib diisi.',
            'nip.unique'            => 'NIP sudah terdaftar.',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'email.unique'          => 'Email sudah terdaftar',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        // insert setiap request dari form ke database via model
        $pemb_lap = new PembimbingLapangan;
        $pemb_lap->nip = $request->nip;
        $pemb_lap->nama = $request->nama;
        $pemb_lap->email = $request->email;
        $pemb_lap->no_telepon = $request->no_telepon;
        $pemb_lap->jabatan = $request->jabatan;
        $pemb_lap->nama_perusahaan = $request->nama_perusahaan;
        $pemb_lap->alamat_perusahaan = $request->alamat_perusahaan;
        $pemb_lap->kota_perusahaan = $request->kota_perusahaan;
        $pemb_lap->email_perusahaan = $request->email_perusahaan;
        $pemb_lap->no_telepon_perusahaan = $request->no_telepon_perusahaan;
        $pemb_lap->password = Hash::make($request->nip);

        $simpan = $pemb_lap->save();

        if ($simpan) {
            Session::flash('success', 'Data berhasil ditambahkan.');
            return redirect()->route('admin.data.pembimbing-lapangan');
        } else {
            Session::flash('errors', 'Data gagal ditambahkan.');
            return redirect()->route('admin.data.pembimbing-lapangan');
        }
    }

    public function update(Request $request, $id)
    {
        // buat validasi utk semua field yang diinput
        $rules = [
            'nip'                   => 'required|unique:pembimbing_lapangan,nip,' . $request->id,
            'email'                 => 'required|email|unique:pembimbing_lapangan,email,' . $request->id,
        ];

        $messages = [
            'nip.required'          => 'NIP wajib diisi.',
            'nip.unique'            => 'NIP sudah terdaftar.',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'email.unique'          => 'Email sudah terdaftar',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $simpan = PembimbingLapangan::find($id)->update($request->all());

        if ($simpan) {
            Session::flash('success', 'Data berhasil diubah.');
            return redirect()->route('admin.data.pembimbing-lapangan');
        } else {
            Session::flash('errors', 'Data gagal diubah.');
            return redirect()->route('admin.data.pembimbing-lapangan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PembimbingLapangan  $pembimbingLapangan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('pembimbing_lapangan')->where('id', $id)->delete();

        return redirect()->route('admin.data.pembimbing-lapangan')->with('success', 'Data berhasil dihapus.');
    }
}
