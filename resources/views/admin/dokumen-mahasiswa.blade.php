@extends('layouts/main')
@section('title','Dokumen Mahasiswa')

@section('main-content')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-success">Dokumen Mahasiswa</h6>
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
                                @if ($dok->surat_diterima === "-" || $dok->surat_diterima === "")
                                    <td scope="row" class="text-center"><a class="btn btn-danger disabled btn-sm" href="">Belum Diunggah</a></td>
                                @else
                                    <td scope="row" class="text-center"><a class="btn btn-success btn-sm" href="{{ route('admin.dokumen-mahasiswa.get',$dok->surat_diterima) }}"><i class="fas fa-sm fa-download"></i> Unduh</a></td>
                                @endif
                                @if ($dok->laporan === "-" || $dok->laporan === "")
                                    <td scope="row" class="text-center"><a class="btn btn-danger disabled btn-sm" href="">Belum Diunggah</a></td>
                                @else
                                    <td scope="row" class="text-center"><a class="btn btn-success btn-sm" href="{{ route('admin.dokumen-mahasiswa.get',$dok->laporan) }}"><i class="fas fa-sm fa-download"></i> Unduh</a></td>
                                @endif
                                @if ($dok->surat_selesai === "-" || $dok->surat_selesai === "")
                                    <td scope="row" class="text-center"><a class="btn btn-danger disabled btn-sm" href="">Belum Diunggah</a></td>
                                @else
                                    <td scope="row" class="text-center"><a class="btn btn-success btn-sm" href="{{ route('admin.dokumen-mahasiswa.get',$dok->surat_selesai) }}"><i class="fas fa-sm fa-download"></i> Unduh</a></td>
                                @endif
                                @if ($dok->krs === "-" || $dok->krs === "")
                                    <td scope="row" class="text-center"><a class="btn btn-danger disabled btn-sm" href="">Belum Diunggah</a></td>
                                @else
                                    <td scope="row" class="text-center"><a class="btn btn-success btn-sm" href="{{ route('admin.dokumen-mahasiswa.get',$dok->krs) }}"><i class="fas fa-sm fa-download"></i> Unduh</a></td>
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

{{-- modal tampil data --}}
@foreach ($dokumen as $dok)

<div class="modal fade" id="modalTampilData{{ $dok->id }}" tabindex="-1" aria-labelledby="modalTampilDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTampilDataLabel">Detail Dokumen Mahasiswa</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.dokumen-kp.update', $dok->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="id" class="col-form-label font-weight-bold">ID:</label>
                        <input type="text" class="form-control" id="id" name="id" value="{{ $dok->id }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="nim" class="col-form-label font-weight-bold">NIM:</label>
                        <input type="text" class="form-control" id="nim" name="nim" value="{{ $dok->mahasiswa->nim }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="col-form-label font-weight-bold">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $dok->mahasiswa->nama }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="surat_diterima" class="col-form-label font-weight-bold">File Surat Diterima:</label><br>
                        @if ($dok->surat_diterima === "-" || $dok->surat_diterima === "")
                            <a class="btn btn-danger disabled btn-sm" id="surat_diterima" href="">Belum Diunggah</a>
                        @else
                            <a href="{{ route('admin.dokumen-mahasiswa.get',$dok->surat_diterima) }}" class="form-control border-0">{{ $dok->surat_diterima }}</a>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="file_template" class="col-form-label font-weight-bold">File Laporan KP:</label><br>
                        @if ($dok->laporan === "-" || $dok->laporan === "")
                            <a class="btn btn-danger disabled btn-sm" href="">Belum Diunggah</a>
                        @else
                            <a href="{{ route('admin.dokumen-mahasiswa.get',$dok->laporan) }}" class="form-control border-0">{{ $dok->laporan }}</a>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="file_template" class="col-form-label font-weight-bold">File Surat Selesai:</label><br>
                        @if ($dok->surat_selesai === "-" || $dok->surat_selesai === "")
                            <a class="btn btn-danger disabled btn-sm" href="">Belum Diunggah</a>
                        @else
                            <a href="{{ route('admin.dokumen-mahasiswa.get',$dok->surat_selesai) }}" class="form-control border-0">{{ $dok->surat_selesai }}</a>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="file_template" class="col-form-label font-weight-bold">File Surat Selesai:</label><br>
                        @if ($dok->krs === "-" || $dok->krs === "")
                            <a class="btn btn-danger disabled btn-sm" href="">Belum Diunggah</a>
                        @else
                            <a href="{{ route('admin.dokumen-mahasiswa.get',$dok->krs) }}" class="form-control border-0">{{ $dok->krs }}</a>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="created_at" class="col-form-label font-weight-bold">Waktu Dibuat:</label>
                        <input type="text" class="form-control" id="created_at" name="created_at" value="{{ $dok->created_at }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="updated_at" class="col-form-label font-weight-bold">Waktu Diperbarui:</label>
                        <input type="text" class="form-control" id="updated_at" name="updated_at" value="{{ $dok->updated_at }}" disabled>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" type="button" data-bs-dismiss="modal">OK</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endforeach

{{-- modal hapus data --}}
@foreach ($dokumen as $dok)
<div class="modal fade" id="modalHapusData{{ $dok->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data Dokumen Mahasiswa</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <h6>Anda yakin ingin menghapus data dan file Dokumen Mahasiswa ini?</h6>
                <table class="table table-borderless table-responsive">
                    <tr>
                        <th>NIM</th>
                        <td>:</td>
                        <td>{{ $dok->mahasiswa->nim }}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>:</td>
                        <td>{{ $dok->mahasiswa->nama }}</td>
                    </tr>
                    <tr>
                        <th>File Surat Diterima</th>
                        <td>:</td>
                        <td>{{ $dok->surat_diterima }}</td>
                    </tr>
                    <tr>
                        <th>File Laporan KP</th>
                        <td>:</td>
                        <td>{{ $dok->laporan }}</td>
                    </tr>
                    <tr>
                        <th>File Surat Selesai</th>
                        <td>:</td>
                        <td>{{ $dok->surat_selesai }}</td>
                    </tr>
                    <tr>
                        <th>File KRS</th>
                        <td>:</td>
                        <td>{{ $dok->krs }}</td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <form action="{{ route('admin.dokumen-mahasiswa.destroy', $dok->id ) }}" method="GET">
                    @csrf
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection