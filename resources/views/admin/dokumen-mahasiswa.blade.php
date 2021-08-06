@extends('layouts/main')
@section('title','Dokumen Kerja Praktek')

@section('main-content')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-success">Dokumen KP Mahasiswa</h6>
            </div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <p>{{ $message }}</p>
                </div>
                @endif
                @if(session('errors'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Ada kesalahan:
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                    <table class="table table-striped table-bordered display nowrap" id="dataTableAdmin">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">ID</th>
                                <th scope="col">NIM</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Surat Diterima</th>
                                <th scope="col">Laporan KP</th>
                                <th scope="col">Surat Selesai</th>
                                <th scope="col">KRS</th>
                                <th scope="col">Dibuat</th>
                                <th scope="col">Diperbarui</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @foreach ($dokumen as $dok)
                            <tr>
                                <td scope="row" class="text-center">{{ $i }}</td>
                                <td scope="row">{{ $dok->id }}</td>
                                <td scope="row">{{ $dok->mahasiswa->nim }}</td>
                                <td scope="row">{{ $dok->mahasiswa->nama }}</td>
                                @if ($dok->surat_diterima === "-")
                                    <td scope="row">{{ Str::limit($dok->surat_diterima, 50) }}</td>
                                @else
                                    <td scope="row"><a href="{{ route('admin.dokumen-mahasiswa.get',$dok->surat_diterima) }}">{{ Str::limit($dok->surat_diterima, 50) }}</a></td>
                                @endif
                                @if ($dok->laporan === "-")
                                    <td scope="row">{{ Str::limit($dok->laporan, 50) }}</td>
                                @else
                                    <td scope="row"><a href="{{ route('admin.dokumen-mahasiswa.get',$dok->laporan) }}">{{ Str::limit($dok->laporan, 50) }}</a></td>
                                @endif
                                @if ($dok->surat_selesai === "-")
                                    <td scope="row">{{ Str::limit($dok->surat_selesai, 50) }}</td>
                                @else
                                    <td scope="row"><a href="{{ route('admin.dokumen-mahasiswa.get',$dok->surat_selesai) }}">{{ Str::limit($dok->surat_selesai, 50) }}</a></td>
                                @endif
                                @if ($dok->krs === "-")
                                    <td scope="row">{{ Str::limit($dok->krs, 50) }}</td>
                                @else
                                    <td scope="row"><a href="{{ route('admin.dokumen-mahasiswa.get',$dok->krs) }}">{{ Str::limit($dok->krs, 50) }}</a></td>
                                @endif
                                <td scope="row">{{ $dok->created_at }}</td>
                                <td scope="row">{{ $dok->updated_at }}</td>
                                <td scope="row">
                                    <abbr title="Lihat Detail"><a href="" data-bs-toggle="modal" data-bs-target="#modalTampilData{{ $dok->id }}" class="text-primary"><i class="fas fa-sm fa-info"></i></a></abbr> |
                                    <abbr title="Hapus data"><a href="" data-bs-toggle="modal" data-bs-target="#modalHapusData{{ $dok->id }}" class="text-danger"><i class="fas fa-sm fa-trash-alt"></i></a></abbr>
                                </td>
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