@extends('layouts/main')
@section('title','Dashboard')

@section('main-content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dasboard</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-2">
      
        </div>
        <div class="card-body">
            <p class="mb-0">Topik Kerja Praktek</p>
            <p class="mt-0">-</p>
            <p class="mb-0">Status</p>
            <a style="font-size:x-large" href="#">Anda belum memilih topik</a>
        </div>
    </div>
    
    <div class="container-fluid row">
    <div class="card shadow mb-4 col-md-5">
    <div class="card-header py-2">
    </div>

        <div class="card-body">
            <p class="mb-0">Dosen Pembimbing Akademik</p>
            <p class="mt-0">-</p>
        </div>
    </div>

    <div class="card shadow mb-4 col-md-5">
    <div class="card-header py-2">
    </div>
        <div class="card-body">
            <p class="mb-0">Pembimbing Lapangan</p>
            <p class="mt-0">-</p>
        </div>
    </div>
    </div>
@endsection