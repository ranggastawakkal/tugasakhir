@extends('layouts/main')
@section('title','Data Pembimbing Akademik')

@section('main-content')
    <h1 class="h3 mb-4 text-gray-800">Data Pembimbing Akademik</h1>
    @foreach ($pembimbing_akademik as $pemb_akd)
        <li>{{ $pemb_akd->nama }}</li>
    @endforeach
@endsection