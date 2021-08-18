<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\DokumenKp;
use App\Models\DokumenMahasiswa;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Alert;

class KerjaPraktekDokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $dokumenMahasiswa = DokumenMahasiswa::where(['id_mahasiswa' => $user->id])->first();

        return view('mahasiswa.kerja-praktek.dokumen-kp.index', compact('dokumenMahasiswa'));
    }

    public function storeKrs(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'buktiKrs' => ['required', 'mimes:docx,pdf,doc'],
            ]
        );

        if ($validator->fails()) {
            return redirect()->route('mahasiswa.kerja-praktek.dokumen-kp.index')->withInput()->withErrors($validator);
        }

        if ($request->hasFile('buktiKrs')) {
            $filename = Auth::user()->nim . '_KRS.' . $request->file('buktiKrs')->getClientOriginalExtension();
            Storage::putFileAs('public/dokumen-mahasiswa/krs', $request->file('buktiKrs'), $filename);
        }

        $user = Auth::user();
        $dokumenMahasiswa = DokumenMahasiswa::where(['id_mahasiswa' => $user->id])->first();

        if (!$dokumenMahasiswa) {
            $dokumenMahasiswa = new DokumenMahasiswa();
            $dokumenMahasiswa->id_mahasiswa = $user->id;
        }

        $dokumenMahasiswa->krs = $filename;
        $dokumenMahasiswa->save();

        return redirect()->route('mahasiswa.kerja-praktek.dokumen-kp.index');
    }

    public function storeLaporan(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'laporan' => ['required'],
            ]
        );

        if ($validator->fails()) {
            return redirect()->route('mahasiswa.kerja-praktek.dokumen-kp.index')->withInput()->withErrors($validator);
        }

        if ($request->hasFile('laporan')) {
            $filename = Auth::user()->nim . '_Laporan KP.' . $request->file('laporan')->getClientOriginalExtension();
            Storage::putFileAs('public/dokumen-mahasiswa/laporan', $request->file('laporan'), $filename);
        }

        $user = Auth::user();
        $dokumenMahasiswa = DokumenMahasiswa::where(['id_mahasiswa' => $user->id])->first();

        if ($dokumenMahasiswa->buktiKrs == "-" || $dokumenMahasiswa->surat_diterima == "-") {
            Alert::warning('', 'Dokumen KRS/surat diterima belum upload');
            return redirect()->route('mahasiswa.kerja-praktek.dokumen-kp.index');
        }

        if (!$dokumenMahasiswa) {
            $dokumenMahasiswa = new DokumenMahasiswa();
            $dokumenMahasiswa->id_mahasiswa = $user->id;
        }

        $dokumenMahasiswa->laporan = $filename;
        $dokumenMahasiswa->save();

        return redirect()->route('mahasiswa.kerja-praktek.dokumen-kp.index');
    }

    public function storeDiterima(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'surat_diterima' => ['required'],
            ]
        );

        if ($validator->fails()) {
            return redirect()->route('mahasiswa.kerja-praktek.dokumen-kp.index')->withInput()->withErrors($validator);
        }
        if ($request->hasFile('surat_diterima')) {
            $filename = Auth::user()->nim . '_Surat Diterima.' . $request->file('surat_diterima')->getClientOriginalExtension();
            Storage::putFileAs('public/dokumen-mahasiswa/surat-diterima', $request->file('surat_diterima'), $filename);
        }

        $user = Auth::user();
        $dokumenMahasiswa = DokumenMahasiswa::where(['id_mahasiswa' => $user->id])->first();

        if (!$dokumenMahasiswa) {
            $dokumenMahasiswa = new DokumenMahasiswa();
            $dokumenMahasiswa->id_mahasiswa = $user->id;
        }

        $dokumenMahasiswa->surat_diterima = $filename;
        $dokumenMahasiswa->save();

        return redirect()->route('mahasiswa.kerja-praktek.dokumen-kp.index');
    }

    public function storeSelesai(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'surat_selesai' => ['required'],
            ]
        );

        if ($validator->fails()) {
            return redirect()->route('mahasiswa.kerja-praktek.dokumen-kp.index')->withInput()->withErrors($validator);
        }

        if ($request->hasFile('surat_selesai')) {
            $filename = Auth::user()->nim . '_Surat Selesai.' . $request->file('surat_selesai')->getClientOriginalExtension();
            Storage::putFileAs('public/dokumen-mahasiswa/surat-selesai', $request->file('surat_selesai'), $filename);
        }

        $user = Auth::user();
        $dokumenMahasiswa = DokumenMahasiswa::where(['id_mahasiswa' => $user->id])->first();

        if ($dokumenMahasiswa->buktiKrs == "-" || $dokumenMahasiswa->surat_diterima == "-") {
            Alert::warning('', 'Dokumen KRS/surat diterima belum upload');
            return redirect()->route('mahasiswa.kerja-praktek.dokumen-kp.index');
        }

        if (!$dokumenMahasiswa) {
            $dokumenMahasiswa = new DokumenMahasiswa();
            $dokumenMahasiswa->id_mahasiswa = $user->id;
        }

        $dokumenMahasiswa->surat_selesai = $filename;
        $dokumenMahasiswa->save();

        return redirect()->route('mahasiswa.kerja-praktek.dokumen-kp.index');
    }
}
