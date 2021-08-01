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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    public function update(Request $request, $id)
    {
        // buat validasi utk semua field yang diinput
        $rules = [
            'nip'                   => 'required|unique:pembimbing_akademik,nip,' . $request->id,
            'nama'                  => 'required',
            'kode_dosen'            => 'required|unique:pembimbing_akademik,kode_dosen,' . $request->id,
            'email'                 => 'required|email|unique:pembimbing_akademik,email,' . $request->id,
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

        $simpan = PembimbingAkademik::find($id)->update($request->all());

        if ($simpan) {
            Session::flash('success', 'Data berhasil diubah.');
            return redirect()->route('admin.data.pembimbing-akademik');
        } else {
            Session::flash('errors', 'Data gagal diubah.');
            return redirect()->route('admin.data.pembimbing-akademik');
        }
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
