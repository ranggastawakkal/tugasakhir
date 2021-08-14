<?php

namespace App\Http\Controllers\PembAkademik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UbahPasswordController extends Controller
{
    public function index()
    {
        return view('pembimbing-akademik/ubah-password');
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
}
