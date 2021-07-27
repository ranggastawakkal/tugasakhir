<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class KerjaPraktekDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mahasiswa.kerja-praktek.data.index');
    }

    public function create()
    {
        return view('mahasiswa.kerja-praktek.data.create');
    }
}
