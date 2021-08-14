<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Alert;

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

        $validator = Validator::make(
            $request->all(), 
            [
            'currentPassword' => ['required'],
            'password' => ['required','confirmed','min:8']
            ]
        );

        if ($validator->fails()) {
            return redirect()->route('mahasiswa.ubah-password.index')->withErrors($validator);
        }

        if (!Hash::check($request->currentPassword, Auth::user()->password)) {
            Alert::warning('', 'Password lama tidak sama!');
            return redirect()->route('mahasiswa.ubah-password.index');
        }

        $user = Auth::user();

        $userData = Mahasiswa::find($user->id);
        $userData->password = bcrypt($request->password);
        $userData->save();

        Alert::success('Password berhasil diubah!');
        return redirect()->route('mahasiswa.ubah-password.index');
    }
}
