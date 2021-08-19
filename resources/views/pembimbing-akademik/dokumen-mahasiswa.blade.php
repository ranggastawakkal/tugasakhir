@extends('layouts/main')
@section('title','Dokumen KP')

@section('main-content')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-success">Dokumen KP Mahasiswa</h6>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered display nowrap" id="dataTableAdmin">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Surat Diterima</th>
                            <th scope="col">Laporan KP</th>
                            <th scope="col">Surat Selesai</th>
                            <th scope="col">KRS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($dokumen as $dok)
                        <tr>
                            <td scope="row" class="text-center">{{ $i }}</td>
                            <td scope="row">{{ $dok->nim }}</td>
                            <td scope="row">{{ $dok->nama }}</td>
                            <td scope="row">{{ $dok->nama_kelas }}</td>
                            @if ($dok->surat_diterima === "-")
                                <td scope="row">{{ $dok->surat_diterima }}</td>
                            @else
                                <td scope="row"><a href="{{ route('pembimbing-akademik.dokumen-mahasiswa.get',$dok->surat_diterima) }}">{{ Str::limit($dok->surat_diterima, 50) }}</a></td>
                            @endif
                            @if ($dok->laporan === "-")
                                <td scope="row">{{ $dok->laporan }}</td>
                            @else
                                <td scope="row"><a href="{{ route('pembimbing-akademik.dokumen-mahasiswa.get',$dok->laporan) }}">{{ Str::limit($dok->laporan, 50) }}</a></td>
                            @endif
                            @if ($dok->surat_selesai === "-")
                                <td scope="row">{{ $dok->surat_selesai }}</td>
                            @else
                                <td scope="row"><a href="{{ route('pembimbing-akademik.dokumen-mahasiswa.get',$dok->surat_selesai) }}">{{ Str::limit($dok->surat_selesai, 50) }}</a></td>
                            @endif
                            @if ($dok->krs === "-")
                                <td scope="row">{{ $dok->krs }}</td>
                            @else
                                <td scope="row"><a href="{{ route('pembimbing-akademik.dokumen-mahasiswa.get',$dok->krs) }}">{{ Str::limit($dok->krs, 50) }}</a></td>
                            @endif
                        </tr>
                        @php
                        $i++;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection