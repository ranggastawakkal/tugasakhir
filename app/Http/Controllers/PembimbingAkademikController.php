<?php

namespace App\Http\Controllers;

use App\Models\PembimbingAkademik;
use Illuminate\Http\Request;

class PembimbingAkademikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pembimbing-akademik/index');
    }

    public function dataMahasiswa()
    {
        return view('pembimbing-akademik/data-mahasiswa');
    }

    public function logKegiatan()
    {
        return view('pembimbing-akademik/log-kegiatan');
    } 

    public function penilaian()
    {
        return view('pembimbing-akademik/penilaian');
    }

    public function laporanKP()
    {
        return view('pembimbing-akademik/laporan-kp');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PembimbingAkademik  $pembimbingAkademik
     * @return \Illuminate\Http\Response
     */
    public function show(PembimbingAkademik $pembimbingAkademik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PembimbingAkademik  $pembimbingAkademik
     * @return \Illuminate\Http\Response
     */
    public function edit(PembimbingAkademik $pembimbingAkademik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PembimbingAkademik  $pembimbingAkademik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PembimbingAkademik $pembimbingAkademik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PembimbingAkademik  $pembimbingAkademik
     * @return \Illuminate\Http\Response
     */
    public function destroy(PembimbingAkademik $pembimbingAkademik)
    {
        //
    }
}
