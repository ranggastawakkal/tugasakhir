@extends('layouts/main')
@section('title','Dashboard')

@section('main-content')
<h1 class="h3 mb-2 text-gray-800">History</h1>
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-2">
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Tujuan Surat</th>
                            <th>Perusahaan</th>
                            <th>Kota</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($suratPengantar as $surat)
                        <tr>
                            <td>{{ $surat->tanggal }}</td>
                            <td>{{ $surat->tujuan_surat }}</td>
                            <td>{{ $surat->nama_instansi }}</td>
                            <td>{{ $surat->kota_instansi }}</td>
                            <td>{{ $surat->status }}</td>
                            <td><a href="{{ route('mahasiswa.daftar-pengajuan.get', $surat->file) }}">{{ $surat->file }}</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection