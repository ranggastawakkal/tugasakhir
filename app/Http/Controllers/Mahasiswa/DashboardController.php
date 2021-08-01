<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\KerjaPraktek;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
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

        return view('mahasiswa.dashboard.index', compact('dataKerjaPraktek'));
    }
}
