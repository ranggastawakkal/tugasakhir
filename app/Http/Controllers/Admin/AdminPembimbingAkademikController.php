<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PembimbingAkademik;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class AdminPembimbingAkademikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembimbing_akademik = PembimbingAkademik::all();
        return view('admin/data/pembimbing-akademik', compact('pembimbing_akademik'));
    }

    public function store(Request $request)
    {
        // buat validasi utk semua field yang diinput
        $rules = [
            'nip'                   => 'required|unique:pembimbing_akademik,nip',
            'nama'                  => 'required',
            'kode_dosen'            => 'required|unique:pembimbing_akademik,kode_dosen',
            'email'                 => 'required|email|unique:pembimbing_akademik,email',
        ];

        $messages = [
            'nip.required'          => 'NIP wajib diisi.',
            'nip.unique'            => 'NIP sudah terdaftar.',
            'nama.required'         => 'Nama wajib diisi',
            'kode_dosen.required'   => 'Kode Dosen wajib diisi',
            'kode_dosen.unique'     => 'Kode Dosen sudah terdaftar',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'email.unique'          => 'Email sudah terdaftar',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        // insert setiap request dari form ke database via model
        $pemb_akd = new PembimbingAkademik;
        $pemb_akd->nip = $request->nip;
        $pemb_akd->nama = $request->nama;
        $pemb_akd->kode_dosen = $request->kode_dosen;
        $pemb_akd->email = $request->email;
        $pemb_akd->no_telepon = $request->no_telepon;
        $pemb_akd->alamat = $request->alamat;
        $pemb_akd->jenis_kelamin = $request->jenis_kelamin;
        $pemb_akd->tempat_lahir = $request->tempat_lahir;
        $pemb_akd->tanggal_lahir = $request->tanggal_lahir;
        $pemb_akd->password = Hash::make($request->nip);

        $simpan = $pemb_akd->save();

        if ($simpan) {
            Session::flash('success', 'Data berhasil ditambahkan.');
            return redirect()->route('admin.data.pembimbing-akademik');
        } else {
            Session::flash('errors', 'Data gagal ditambahkan.');
            return redirect()->route('admin.data.pembimbing-akademik');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PembimbingAkademik  $pembimbingAkademik
     * @return \Illuminate\Http\Response
     */
    public function show(PembimbingAkademik $pembimbingAkademik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PembimbingAkademik  $pembimbingAkademik
     * @return \Illuminate\Http\Response
     */
    public function edit(PembimbingAkademik $pembimbingAkademik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PembimbingAkademik  $pembimbingAkademik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PembimbingAkademik $pembimbingAkademik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PembimbingAkademik  $pembimbingAkademik
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('pembimbing_akademik')->where('id', $id)->delete();

        return redirect()->route('admin.data.pembimbing-akademik')->with('success', 'Data berhasil dihapus.');
    }
}
