<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        return view('mahasiswa.profil.index', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();

        return view('mahasiswa.profil.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make(
            $request->all(), 
            [
            'tempatLahir' => ['required'],
            'tanggalLahir' => ['required'],
            'noTelp' => ['required'],
            'email' => ['required', 'email'],
            'alamat' => ['required'],
            ]
        );

        if ($validator->fails()) {
            return redirect()->route('mahasiswa.ubah-password.index')->withErrors($validator);
        }

        $user = Auth::user();

        $model = Mahasiswa::find($user->nim);
        $model->tempat_lahir = $request->tempatLahir;
        $model->tanggal_lahir = $request->tanggalLahir;
        $model->no_telepon = $request->noTelp;
        $model->email = $request->email;
        $model->alamat = $request->alamat;
        $model->save();

        return redirect()->route('mahasiswa.profil.index');
    }
}
