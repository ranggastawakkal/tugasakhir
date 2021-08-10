<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\KerjaPraktek;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class KerjaPraktekDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $dataKerjaPraktek = KerjaPraktek::where(['id_mahasiswa' => $user->id])->first();

        return view('mahasiswa.kerja-praktek.data.index', compact('dataKerjaPraktek'));
    }

    public function create()
    {
        $user = Auth::user();
        $dataKerjaPraktek = KerjaPraktek::where(['id_mahasiswa' => $user->id])->first();

        return view('mahasiswa.kerja-praktek.data.create', compact('dataKerjaPraktek'));
    }
    public function store(Request $request)
    {
        $user = Auth::user();
        $dataKerjaPraktek = KerjaPraktek::where(['id_mahasiswa' => $user->id])->first();

        $validator = Validator::make(
            $request->all(),
            [
            'unitkerja' => ['required'],
            'tanggalmulai' => ['required'],
            'tanggalberakhir' => ['required'],
            'target' => ['required'],
            'programkegiatan' => ['required'],
            ]
        );

        if ($validator->fails()) {
            return redirect()->route('mahasiswa.kerja-praktek.data.create')->withInput()->withErrors($validator);
        }

        $dataKerjaPraktek->unit_kerja = $request->unitkerja;
        $dataKerjaPraktek->tanggal_mulai = $request->tanggalmulai;
        $dataKerjaPraktek->tanggal_berakhir = $request->tanggalberakhir;
        $dataKerjaPraktek->target = $request->target;
        $dataKerjaPraktek->program_kegiatan = $request->programkegiatan;
        $dataKerjaPraktek->save();

        return view('mahasiswa.kerja-praktek.data.index', compact('dataKerjaPraktek'));
    }
}
