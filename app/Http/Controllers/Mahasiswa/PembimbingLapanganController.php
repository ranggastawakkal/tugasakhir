<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\KerjaPraktek;
use App\Models\Mahasiswa;
use App\Models\PembimbingLapangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Alert;

class PembimbingLapanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $lapangan = PembimbingLapangan::all();
        $dataKerjaPraktek = KerjaPraktek::where(['id_mahasiswa' => $user->id])->first();
        return view('mahasiswa.pembimbing.lapangan.index', compact('lapangan', 'dataKerjaPraktek'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $dataKerjaPraktek = KerjaPraktek::where(['id_mahasiswa' => $user->id])->first();

        if (!isset($dataKerjaPraktek->pembimbingAkademik)) {
            Alert::warning('', 'Silahkan isi pembimbing akademik terlebih dahulu');
            return redirect()->route('mahasiswa.pembimbing.lapangan.index');
        }

        $validator = Validator::make(
            $request->all(), 
            [
            'selectLapangan' => ['required'],
            ],
            [
                'selectLapangan.required' => 'Pembimbing Lapangan tidak boleh kosong!'
            ]
        );

        if ($validator->fails()) {
            return redirect()->route('mahasiswa.pembimbing.lapangan.index')->withErrors($validator);
        }
        
        if (!$dataKerjaPraktek) {
            $kp = new KerjaPraktek();
            $kp->id_mahasiswa = $user->id;
            $kp->id_pemb_lap = $request->selectLapangan;
            $kp->save();
        } else {
            $dataKerjaPraktek->id_pemb_lap = $request->selectLapangan;
            $dataKerjaPraktek->save();
        }

        return redirect()->route('mahasiswa.pembimbing.lapangan.index');
    }

    public function storeNew(Request $request)
    {
        $validator = Validator::make(
            $request->all(), 
            [
            'nama' => ['required'],
            'nip' => ['required', 'unique:pembimbing_lapangan'],
            'phone' => ['required'],
            'email' => ['required', 'email', 'unique:pembimbing_lapangan'],
            'namaperusahaan' => ['required'],
            'alamatperusahaan' => ['required'],
            'kotaperusahaan' => ['required'],
            'email_perusahaan' => ['required', 'unique:pembimbing_lapangan'],
            'phoneperusahaan' => ['required'],
            'jabatan' => ['required'],
            ]
        );

        if ($validator->fails()) {
            return redirect()->route('mahasiswa.pembimbing.lapangan.create')->withErrors($validator);
        }
        
        $pembLap = new PembimbingLapangan();
        $pembLap->nama = $request->nama;
        $pembLap->nip = $request->nip;
        $pembLap->email = $request->email;
        $pembLap->no_telepon = $request->phone;
        $pembLap->nama_perusahaan = $request->namaperusahaan;
        $pembLap->alamat_perusahaan = $request->alamatperusahaan;
        $pembLap->kota_perusahaan = $request->kotaperusahaan;
        $pembLap->email_perusahaan = $request->email_perusahaan;
        $pembLap->no_telepon_perusahaan = $request->phoneperusahaan;
        $pembLap->jabatan = $request->jabatan;
        $pembLap->password = bcrypt('password');
        $pembLap->save();

        $user = Auth::user();
        $dataKerjaPraktek = KerjaPraktek::where(['id_mahasiswa' => $user->id])->first();
        
        if (!$dataKerjaPraktek) {
            $kp = new KerjaPraktek();
            $kp->id_mahasiswa = $user->id;
            $kp->id_pemb_lap = $pembLap->id;
            $kp->save();
        } else {
            $dataKerjaPraktek->id_pemb_lap = $pembLap->id;
            $dataKerjaPraktek->save();
        }

        return redirect()->route('mahasiswa.pembimbing.lapangan.index');
    }

    public function create()
    {
        return view('mahasiswa.pembimbing.lapangan.create');
    }

    public function edit()
    {
        $user = Auth::user();
        $lapangan = PembimbingLapangan::all();
       
        return view('mahasiswa.pembimbing.lapangan.edit', compact('lapangan'));
    }

    public function update()
    {
        $user = Auth::user();
        $lapangan = PembimbingLapangan::all();
       
        return view('mahasiswa.pembimbing.lapangan.edit', compact('lapangan'));
    }

}
