<?php

namespace App\Http\Controllers\PembLapangan;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\PembimbingLapangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class PembLapanganProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        return view('pembimbing-lapangan/profil', compact('user'));
    }

    public function update(Request $request)
    {
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
