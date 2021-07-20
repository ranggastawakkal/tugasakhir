@extends('layouts/main')
@section('title','Data Kelas')

@section('main-content')
    <h1 class="h3 mb-4 text-gray-800">Data Kelas</h1>
    @foreach ($kelas as $kls)
        <li>{{ $kls->nama_kelas }}</li>
    @endforeach
@endsection