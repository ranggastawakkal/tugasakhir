@extends('layouts/main')
@section('title','Data Pembimbing Lapangan')

@section('main-content')
    <h1 class="h3 mb-4 text-gray-800">Data Pembimbing Lapangan</h1>
    @foreach ($pembimbing_lapangan as $pemb_lap)
        <li>{{ $pemb_lap->nama }}</li>
    @endforeach
@endsection