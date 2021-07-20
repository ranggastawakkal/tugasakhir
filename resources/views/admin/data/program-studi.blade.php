@extends('layouts/main')
@section('title','Data Program Studi')

@section('main-content')
    <h1 class="h3 mb-4 text-gray-800">Data Program Studi</h1>
    @foreach ($program_studi as $prodi)
        <li>{{ $prodi->nama_prodi }}</li>
    @endforeach
@endsection