@extends('layouts/main')
@section('title','Dashboard')

@section('main-content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dasboard Mahasiswa</h1>
    </div>
    
    <div class="row">

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                        Pembimbing Akademik</div>
                        <a href="{{ route ('mahasiswa.pembimbing.akademik.index') }}">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ isset($dataKerjaPraktek->pembimbingAkademik->nama) ? $dataKerjaPraktek->pembimbingAkademik->nama : "-"}}</div>
                        </a>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                        Pembimbing Lapangan</div>
                        <a href="{{ route ('mahasiswa.pembimbing.lapangan.index') }}">
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ isset($dataKerjaPraktek->pembimbingLapangan->nama) ? $dataKerjaPraktek->pembimbingLapangan->nama : "-"}}</div>
                        </a>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection