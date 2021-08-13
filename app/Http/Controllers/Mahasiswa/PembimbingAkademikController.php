<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\KerjaPraktek;
use App\Models\Mahasiswa;
use App\Models\PembimbingAkademik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PembimbingAkademikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $dosen = PembimbingAkademik::all();
        $dataKerjaPraktek = KerjaPraktek::where(['id_mahasiswa' => $user->id])->first();

       
        return view('mahasiswa.pembimbing.akademik.index', compact('dosen', 'dataKerjaPraktek'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $dataKerjaPraktek = KerjaPraktek::where(['id_mahasiswa' => $user->id])->first();

        $validator = Validator::make(
            $request->all(), 
            [
            'selectAkademik' => ['required'],
            ],
            [
                'selectAkademik.required' => 'Dosen Pembimbing Akademik tidak boleh kosong!'
            ]
        );

        if ($validator->fails()) {
            return redirect()->route('mahasiswa.pembimbing.akademik.index')->withErrors($validator);
        }

        
        if (!$dataKerjaPraktek) {
            $kp = new KerjaPraktek();
            $kp->id_mahasiswa = $user->id;
            $kp->id_pemb_akd = $request->selectAkademik;
            $kp->save();
        } else {
            $dataKerjaPraktek->id_pemb_akd = $request->selectAkademik;
            $dataKerjaPraktek->save();
        }

        return redirect()->route('mahasiswa.pembimbing.akademik.index');
    }

    public function edit()
    {
        $user = Auth::user();
        $akademik = PembimbingAkademik::all();
       
        return view('mahasiswa.pembimbing.akademik.edit', compact('akademik'));
    }

}
