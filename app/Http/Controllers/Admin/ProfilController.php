<?php

namespace App\Http\Controllers\Admin;

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

        return view('admin/profil', compact('user'));
    }

    public function update(Request $request)
    {
        $rules = [
            'nama'                   => 'required',
            'email'                 => 'required|email|unique:admin,email,' . $request->id,
        ];

        $messages = [
            'nama.required'          => 'Nama wajib diisi.',
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
