@extends('layouts/main')
@section('title','Dashboard')

@section('main-content')

    <!-- DataTales Example -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Kerja Praktek</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                class="fas fa-edit fa-sm text-white-50"></i> Edit Profile</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-2">
      
        </div>
        <div class="card-body">
            <p class="mb-0">Data kerja praktek belum tersedia, silahkan tambahkan</p>
            <a href="{{ route('mahasiswa.pembimbing.lapangan.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm mt-2"><i
                class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
        </div>
    </div>
@endsection