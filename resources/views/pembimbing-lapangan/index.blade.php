@extends('layouts/main')
@section('title','Dashboard')

@section('main-content')
<div class="row">
    <!-- card mahasiswa -->
    <div class="col-xl-4 col-md-6 mb-4 mx-auto">
        <div class="card border-left-primary shadow h-100 pt-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Mahasiswa Bimbingan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $kerja_praktek->count() }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                    </div>
                </div>
                <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                        <small class=" text-gray-400">Diperbarui {{ $kp_latest }}</small>
                    </div>
                </div>
                <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                        <a href="{{ route('pembimbing-lapangan.data-mahasiswa') }}">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- card log aktivitas -->
    <div class="col-xl-4 col-md-6 mb-4 mx-auto">
        <div class="card border-left-primary shadow h-100 pt-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Log Aktivitas</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $kerja_praktek->count() }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                    </div>
                </div>
                <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                        <small class=" text-gray-400">Diperbarui {{ $kp_latest }}</small>
                    </div>
                </div>
                <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                        <a href="{{ route('pembimbing-lapangan.data-mahasiswa') }}">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection