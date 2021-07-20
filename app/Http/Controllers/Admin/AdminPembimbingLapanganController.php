<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PembimbingLapangan;
use Illuminate\Http\Request;

class AdminPembimbingLapanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembimbing_lapangan = PembimbingLapangan::all();
        return view('admin/data/pembimbing-lapangan', compact('pembimbing_lapangan'));
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
     * @param  \App\Models\PembimbingLapangan  $pembimbingLapangan
     * @return \Illuminate\Http\Response
     */
    public function show(PembimbingLapangan $pembimbingLapangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PembimbingLapangan  $pembimbingLapangan
     * @return \Illuminate\Http\Response
     */
    public function edit(PembimbingLapangan $pembimbingLapangan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PembimbingLapangan  $pembimbingLapangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PembimbingLapangan $pembimbingLapangan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PembimbingLapangan  $pembimbingLapangan
     * @return \Illuminate\Http\Response
     */
    public function destroy(PembimbingLapangan $pembimbingLapangan)
    {
        //
    }
}
