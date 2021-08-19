<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\SuratPengantar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BuatPengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('mahasiswa.surat-pengantar.buat-pengajuan.index', compact('user'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
            'tujuan_surat' => ['required'],
            'nama_instansi' => ['required'],
            'alamat_instansi' => ['required'],
            'kota_instansi' => ['required'],
            'kontak_instansi' => ['required']
            ]
        );

        if ($validator->fails()) {
            return redirect()->route('mahasiswa.buat-pengajuan.index')->withInput()->withErrors($validator);
        }

        $user = Auth::user();

        $suratPengantar = new SuratPengantar();
        $suratPengantar->id_mahasiswa = $user->id;
        $suratPengantar->bidang_minat = $user->peminatan->nama;
        $suratPengantar->fill($request->all());
        $suratPengantar->save();

        return redirect()->route('mahasiswa.daftar-pengajuan.index');
    }

}
