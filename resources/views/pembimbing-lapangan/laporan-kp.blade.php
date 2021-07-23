@extends('layouts/main')
@section('title','Dashboard')

@section('main-content')
    <h1 class="h3 mb-4 text-gray-800">Laporan KP</h1>
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-success">Data Mahasiswa</h6>
                </div>
            <div class=" card-columns">
                @foreach ($mahasiswakp as $mkp)
                <div class="card-body">
                    <div class="card" style="width: 12rem;">
                        <img src="{{ asset('img/'.$mkp->image) }}" class="card-img-top" width="100%" height="100%" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">{{ $mkp->nama }}</h5>
                          <p class="card-text">{{ $mkp->nama_kelas }}</p>
                          <a href="#" class="btn btn-primary">Laporan KP</a>
                        </div>
                      </div>
                </div>
                @endforeach

            </div>
            </div>
        </div>
    </div>
@endsection