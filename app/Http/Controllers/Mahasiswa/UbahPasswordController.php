<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UbahPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mahasiswa.ubah-password.index');
    }

    public function update(Request $request)
    {
        // $validator = $request->validate([
        //     'oldPassword' => ['required'],
        //     'password' => ['required','confirmed','min:8'],
        // ]);

        $validator = Validator::make(
            $request->all(), 
            [
            'oldPassword' => ['required'],
            'password' => ['required','confirmed','min:8']
            ]
        );

        if ($validator->fails()) {
            return redirect()->route('mahasiswa.ubah-password.index')->withErrors($validator);
        }

        // if ( !Hash::check($request->oldPassword, Auth::user()->password) ) {
        //    $flasher->addError('Password salah!');
        // }

        $user = Auth::user();

        $userData = Mahasiswa::find($user->nim);
        $userData->password = bcrypt($request->password);
        $userData->save();

        return redirect()->route('mahasiswa.profil.index');
    }
}
