@extends('layouts/main')
@section('title','Dokumen KP Pembimbing Lapangan')

@section('main-content')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-success">Dokumen KP Pembimbing Lapangan</h6>
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
                <table class="table table-striped table-bordered display" id="dataTableTanpaScroll">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama File</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">File</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($dokumen_kp as $dok)
                        <tr>
                            <td scope="row" class="text-center">{{ $i }}</td>
                            <td scope="row">{{ $dok->nama }}</td>
                            <td scope="row">{{ Str::limit($dok->deskripsi, 50) }}</td>
                            <td scope="row" class="text-center"><a class="btn btn-success btn-sm" href="{{ route('pembimbing-lapangan.dokumen-kp.get',$dok->file) }}"><i class="fas fa-sm fa-download"></i> Unduh</a></td>
                            <td scope="row" class="text-center"><a class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalTampilData{{ $dok->id }}" href=""><i class="fas fa-sm fa-info"></i> Detail</a></td>
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
@foreach ($dokumen_kp as $dok)

<div class="modal fade" id="modalTampilData{{ $dok->id }}" tabindex="-1" aria-labelledby="modalTampilDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTampilDataLabel">Detail Dokumen KP</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.dokumen-kp.update', $dok->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="col-form-label font-weight-bold">Nama File:</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $dok->nama }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="col-form-label font-weight-bold">Deskripsi:</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control" disabled>{{ $dok->deskripsi }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="file_template" class="col-form-label font-weight-bold">File:</label><br>
                        <a href="{{ route('admin.dokumen-kp.get',$dok->file) }}" class="form-control border-0">{{ $dok->file }}</a>
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

@endsection