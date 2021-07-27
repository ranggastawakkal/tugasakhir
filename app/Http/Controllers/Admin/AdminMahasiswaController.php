<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\Peminatan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AdminMahasiswaController extends Controller
{
    public function index()
    {
        // menampilkan data seluruh mhs
        $mahasiswa = Mahasiswa::all();
        $peminatan = Peminatan::all();
        $kelas = Kelas::all();

        return view('admin/data/mahasiswa', compact('mahasiswa', 'peminatan', 'kelas'));
    }

    public function store(Request $request)
    {
        // buat validasi utk semua field yang diinput
        $rules = [
            'nim'                   => 'required|unique:mahasiswa,nim',
            'nama'                  => 'required',
            'id_kelas'              => 'required',
            'id_peminatan'          => 'required',
            'email'                 => 'required|email|unique:mahasiswa,email',
        ];

        $messages = [
            'nim.required'          => 'NIM wajib diisi.',
            'nim.unique'            => 'NIM sudah terdaftar.',
            'nama.required'         => 'nama wajib diisi',
            'id_kelas.required'     => 'Kelas wajib diisi',
            'id_peminatan.required' => 'Peminatan wajib diisi',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'email.unique'          => 'Email sudah terdaftar',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        // insert setiap request dari form ke database via model
        $mhs = new Mahasiswa;
        $mhs->nim = $request->nim;
        $mhs->nama = $request->nama;
        $mhs->id_kelas = $request->id_kelas;
        $mhs->id_peminatan = $request->id_peminatan;
        $mhs->email = $request->email;
        $mhs->no_telepon = $request->no_telepon;
        $mhs->alamat = $request->alamat;
        $mhs->jenis_kelamin = $request->jenis_kelamin;
        $mhs->tempat_lahir = $request->tempat_lahir;
        $mhs->tanggal_lahir = $request->tanggal_lahir;
        $mhs->password = Hash::make($request->nim);

        $simpan = $mhs->save();

        if ($simpan) {
            Session::flash('success', 'Data berhasil ditambahkan.');
            return redirect()->route('admin.data.mahasiswa');
        } else {
            Session::flash('errors', 'Data gagal ditambahkan.');
            return redirect()->route('admin.data.mahasiswa');
        }
    }

    public function show(Mahasiswa $mahasiswa)
    {
        // dengan menggunakan resource, maka kita bisa memanfaatkan model sebagai parameter berdasarkan id yang dipilih
        // dengan href="{{ route('admin.data.mahasiswa.show',$mahasiswa->id) }}
        return view('admin.data.mahasiswa.show', compact('mahasiswa'));
    }

    public function update(Request $request)
    {
        // buat validasi utk semua field yang diinput
        $rules = [
            'nim'                   => 'required|unique:mahasiswa,nim',
            'nama'                  => 'required',
            'id_kelas'              => 'required',
            'id_peminatan'          => 'required',
            'email'                 => 'required|email|unique:mahasiswa,email',
        ];

        $messages = [
            'nim.required'          => 'NIM wajib diisi.',
            'nim.unique'            => 'NIM sudah terdaftar.',
            'nama.required'         => 'nama wajib diisi',
            'id_kelas.required'     => 'Kelas wajib diisi',
            'id_peminatan.required' => 'Peminatan wajib diisi',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'email.unique'          => 'Email sudah terdaftar',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        // insert setiap request dari form ke database via model
        $data = array(
            'nim' => $request->nim,
            'nama' => $request->nama,
            'nama' => $request->nama,
            'id_kelas' => $request->id_kelas,
            'id_peminatan' => $request->id_peminatan,
            'email' => $request->email,
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'password' => $request->password
        );

        $simpan = DB::table('mahasiswa')->where('id', $request->id)->update($data);

        if ($simpan) {
            Session::flash('success', 'Data berhasil diubah.');
            return redirect()->route('admin.data.mahasiswa');
        } else {
            Session::flash('errors', 'Data gagal diubah.');
            return redirect()->route('admin.data.mahasiswa');
        }
    }

    public function destroy($id)
    {
        DB::table('mahasiswa')->where('id', $id)->delete();

        return redirect()->route('admin.data.mahasiswa')->with('success', 'Data berhasil dihapus.');
    }
}
