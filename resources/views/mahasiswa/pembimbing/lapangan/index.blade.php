@extends('layouts/main')
@section('title','Dashboard')

@section('main-content')
    
    <!-- Page Heading -->
    <!-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2>Biodata Mahasiswa</h2>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <button class="btn btn-success">Edit profile</button>
        </div>
    </div>
    </div> -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Biodata Pembimbing Lapangan</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                class="fas fa-edit fa-sm text-white-50"></i> Edit Profile</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-2">
      
        </div>
        <div class="card-body">
            <p class="mb-0">Dosen pembimbing belum tersedia, silahkan tambahkan</p>
            <a href="{{ route('mahasiswa.pembimbing.lapangan.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm mt-2"><i
                class="fas fa-plus fa-sm text-white-50"></i> Tambah Biodata</a>
        </div>
    </div>
@endsection