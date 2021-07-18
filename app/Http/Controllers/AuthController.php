<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use app\Models\Admin;

class AuthController extends Controller
{
    public function formLogin()
    {
        // cek apakah ada session yang berjalan atau tidak?
        if (Str::length(Auth::guard('admin')->user()) > 0) {
            return redirect('admin/');
        } elseif (Str::length(Auth::guard('mahasiswa')->user()) > 0) {
            return redirect('mahasiswa/');
        } elseif (Str::length(Auth::guard('pembimbing-akademik')->user()) > 0) {
            return redirect('pembimbing-akademik/');
        } elseif (Str::length(Auth::guard('pembimbing-lapangan')->user()) > 0) {
            return redirect('pembimbing-lapangan/');
        }
        return view('auth/login');
    }

    public function login(Request $request)
    {
        $rules = [
            'email'                 => 'required|email',
            'password'              => 'required'
        ];

        $messages = [
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'password.required'     => 'Password wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        // dd($request->all());
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('admin/');
        } elseif (Auth::guard('mahasiswa')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('mahasiswa/');
        } elseif (Auth::guard('pembimbing-akademik')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('pembimbing-akademik/');
        } elseif (Auth::guard('pembimbing-lapangan')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('pembimbing-lapangan/');
        } else {
            Session::flash('error', 'Email atau password salah');
        }
        return redirect('/');
    }

    public function logout()
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        } elseif (Auth::guard('mahasiswa')->check()) {
            Auth::guard('mahasiswa')->logout();
        } elseif (Auth::guard('pembimbing-akademik')->check()) {
            Auth::guard('pembimbing-akademik')->logout();
        } elseif (Auth::guard('pembimbing-lapangan')->check()) {
            Auth::guard('pembimbing-lapangan')->logout();
        }
        return redirect('/');
    }
}
