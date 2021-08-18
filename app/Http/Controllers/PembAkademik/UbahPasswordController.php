<?php

namespace App\Http\Controllers\PembAkademik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UbahPasswordController extends Controller
{
    public function index()
    {
        return view('pembimbing-akademik/ubah-password');
    }

    public function update(Request $request)
    {
        $rules = [
            'password'                   => 'required',
            'password_baru'                  => 'required|confirmed|min:8|different:password',
            'password_baru_confirmation'                   => 'required',
        ];

        $messages = [
            'password.required'          => 'Pasword saat ini wajib diisi.',
            'password_baru.required'            => 'Password baru wajib diisi.',
            'password_baru.confirmed'         => 'Konfirmasi password baru tidak sesuai.',
            'password_baru.min'         => 'Password baru minimal 8 karakter.',
            'password_baru.different'         => 'Password baru tidak boleh sama dengan password lama.',
            'password_baru_confirmation.required'            => 'Konfirmasi password baru wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        if (!Hash::check($request->password, Auth::user()->password)) {
            return back()->with('error', 'Password salah.');
        }

        Auth::user()->update([
            'password' => bcrypt(request('password_baru'))
        ]);

        return back()->with('success', 'Password berhasil diubah.');
    }
}
