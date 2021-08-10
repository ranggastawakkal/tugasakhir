<?php

namespace App\Http\Controllers\PembLapangan;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\PembimbingLapangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class PembLapanganUbahPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pembimbing-lapangan/ubah-password');
    }

    public function update(Request $request)
    {
        request()->validate([
            'old_password' => 'required',
            'password' => ['required', 'confirmed'],
        ]);

        $current_password = auth()->user()->password;
        $old_password = request('old_password');

        if (Hash::check($old_password, $current_password)) {
            auth()->user()->update([
                'password' => bcrypt(request('password'))
            ]);

            return back()->with('success', 'Password berhasil diubah');
        } else {
            return back()->withErrors(['old_password' => 'Password saat ini salah']);
        }
    }




    // public function update(Request $request)
    // {
    //     $rules = [
    //         'old_password'             => 'required',
    //         'password'                 => 'required|confirmed',
    //     ];

    //     $messages = [
    //         'old_password.required'          => 'Password Saat Ini wajib diisi.',
    //         'password.required'            => 'Password Baru wajib diisi.',
    //         'password.confirmed'            => 'Password Baru tidak sesuai.',
    //     ];

    //     $current_password = auth()->user()->password;
    //     $old_password = request('old_password');

    //     if (Hash::check($old_password, $current_password)) {
    //         $request->user()->update([
    //             'password' => bcrypt(request('password'))
    //         ]);

    //         Session::flash('success', 'Password berhasil diubah.');
    //         return redirect()->back();
    //     } else {
    //         Session::flash('errors', 'Password saat ini salah.');
    //         return redirect()->back();
    //     }

    //     $validator = Validator::make($request->all(), $rules, $messages);

    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors($validator)->withInput($request->all);
    //     }
    // }
}
