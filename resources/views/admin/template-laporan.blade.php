@extends('layouts/main')
@section('title','Template Laporan')

@section('main-content')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-success">Data Template Laporan</h6>
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
                @if ($template_laporan_count < 1)
                    <button type="button" class="btn btn-success mb-3 mx-3" data-bs-toggle="modal" data-bs-target="#modalTambahData">
                        <i class="fas fa-plus"></i> Unggah Template Laporan KP
                    </button>
                @else
                    <table class="table table-striped table-bordered display nowrap" id="dataTableAdmin">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">ID</th>
                                <th scope="col">Dibuat</th>
                                <th scope="col">Diperbarui</th>
                                <th scope="col">File</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @foreach ($template_laporan as $tl)
                            <tr>
                                <td scope="row" class="text-center">{{ $i }}</td>
                                <td scope="row">{{ $tl->id }}</td>
                                <td scope="row">{{ $tl->created_at }}</td>
                                <td scope="row">{{ $tl->updated_at }}</td>
                                <td scope="row"><a href="{{ route('admin.template-laporan.get',$tl->file) }}">{{ Str::limit($tl->file, 50) }}</a></td>
                                <td scope="row">
                                    <abbr title="Lihat Detail"><a href="" data-bs-toggle="modal" data-bs-target="#modalTampilData{{ $tl->id }}" class="text-primary"><i class="fas fa-sm fa-info"></i></a></abbr> |
                                    <abbr title="Hapus data"><a href="" data-bs-toggle="modal" data-bs-target="#modalHapusData{{ $tl->id }}" class="text-danger"><i class="fas fa-sm fa-trash-alt"></i></a></abbr>
                                </td>
                            </tr>
                            @php
                            $i++;
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</div>

{{-- modal tambah data --}}
<div class="modal fade" id="modalTambahData" tabindex="-1" aria-labelledby="modalTambahDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahDataLabel">Unggah Template Laporan</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.template-laporan.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="file" class="col-form-label">File Template Laporan:</label>
                        <input type="file" class="form-control-file" id="file" name="file" accept="application/pdf" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="reset" class="btn btn-warning">Reset</button>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

{{-- modal tampil data --}}
@foreach ($template_laporan as $tl)

<div class="modal fade" id="modalTampilData{{ $tl->id }}" tabindex="-1" aria-labelledby="modalTampilDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTampilDataLabel">Detail Data Template Laporan</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.template-laporan.update', $tl->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="id" class="col-form-label">ID:</label>
                        <input type="text" class="form-control" id="id" name="id" value="{{ $tl->id }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="created_at" class="col-form-label">Waktu Dibuat:</label>
                        <input type="text" class="form-control" id="created_at" name="created_at" value="{{ $tl->created_at }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="updated_at" class="col-form-label">Waktu Diperbarui:</label>
                        <input type="text" class="form-control" id="updated_at" name="updated_at" value="{{ $tl->updated_at }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="file_template" class="col-form-label">File Template Laporan:</label><br>
                        <a href="{{ route('admin.template-laporan.get',$tl->file) }}" class="form-control">{{ $tl->file }}</a>
                    </div>
                    <div class="mb-3">
                        <label for="file" class="col-form-label">Ubah File Template Laporan:</label>
                        <input type="file" class="form-control-file" id="file" name="file" accept="application/pdf">
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endforeach

{{-- modal hapus data --}}
@foreach ($template_laporan as $tl)
<div class="modal fade" id="modalHapusData{{ $tl->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data Template Laporan</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <h6>Anda yakin ingin menghapus data dan file template laporan ini?</h6>
                <ul>
                    <li>ID : {{ $tl->id }}</li>
                    <li>Nama File : {{ $tl->file }}</li>
                </ul>
            </div>
            <div class="modal-footer">
                <form action="{{ route('admin.template-laporan.destroy', $tl->id ) }}" method="GET">
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