<?php

namespace App\Http\Controllers\PembAkademik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class ProfilController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('pembimbing-akademik/profil', compact('user'));
    }

    public function update(Request $request)
    {
        $rules = [
            'nip'                   => 'required|unique:pembimbing_akademik,nip,' . $request->id,
            'email'                 => 'required|email|unique:pembimbing_akademik,email,' . $request->id,
            'kode_dosen'                 => 'required|unique:pembimbing_akademik,kode_dosen,' . $request->id,
        ];

        $messages = [
            'nip.required'          => 'NIP wajib diisi.',
            'nip.unique'            => 'NIP sudah terdaftar.',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'email.unique'          => 'Email sudah terdaftar',
            'kode_dosen.required'          => 'Kode Dosen wajib diisi.',
            'kode_dosen.unique'            => 'Kode Dosen sudah terdaftar.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $simpan = $request->user()->update($request->all());

        if ($simpan) {
            Session::flash('success', 'Profil berhasil diubah.');
            return redirect()->back();
        } else {
            Session::flash('errors', 'Profil gagal diubah.');
            return redirect()->back();
        }
    }
}
