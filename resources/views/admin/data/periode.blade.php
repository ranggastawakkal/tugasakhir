@extends('layouts/main')
@section('title','Data Periode')

@section('main-content')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-success">Data Periode</h6>
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
                <button type="button" class="btn btn-success mb-3 mx-3" data-bs-toggle="modal" data-bs-target="#modalTambahData">
                    <i class="fas fa-plus"></i> Tambah Data
                </button>
                <table class="table table-striped table-responsive-xl table-bordered display" id="dataTableTanpaScroll">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">ID</th>
                            <th scope="col">Semester</th>
                            <th scope="col">Tahun Ajaran</th>
                            <th scope="col">Dibuat</th>
                            <th scope="col">Diperbarui</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($periode as $p)
                        <tr>
                            <td scope="row" class="text-center">{{ $i }}</td>
                            <td scope="row">{{ $p->id }}</td>
                            <td scope="row">{{ $p->semester }}</td>
                            <td scope="row">{{ $p->tahun_ajaran }}</td>
                            <td scope="row">{{ $p->created_at }}</td>
                            <td scope="row">{{ $p->updated_at }}</td>
                            <td scope="row">
                                <abbr title="Lihat Detail"><a href="" data-bs-toggle="modal" data-bs-target="#modalTampilData{{ $p->id }}" class="text-primary"><i class="fas fa-sm fa-info"></i></a></abbr> |
                                <abbr title="Edit data"><a href="" data-bs-toggle="modal" data-bs-target="#modalEditData{{ $p->id }}" class="text-warning"><i class="fas fa-sm fa-edit"></i></a></abbr> |
                                <abbr title="Hapus data"><a href="" data-bs-toggle="modal" data-bs-target="#modalHapusData{{ $p->id }}" class="text-danger"><i class="fas fa-sm fa-trash-alt"></i></a></abbr>
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

{{-- modal tambah data --}}
<div class="modal fade" id="modalTambahData" tabindex="-1" aria-labelledby="modalTambahDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahDataLabel">Tambah Data Periode</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.data.periode.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="semester" class="col-form-label font-weight-bold">Semester:</label>
                        <select class="form-control" name="semester" id="semester" required>
                            <option selected disabled>--- Pilih ---</option>
                            <option value="GANJIL">GANJIL</option>
                            <option value="GENAP">GENAP</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tahun_ajaran" class="col-form-label font-weight-bold">Tahun Ajaran:</label>
                        <input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran" required>
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
@foreach ($periode as $p)

<div class="modal fade" id="modalTampilData{{ $p->id }}" tabindex="-1" aria-labelledby="modalTampilDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTampilDataLabel">Detail Data Periode</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.data.periode.update', $p->id) }}">
                    @csrf
                    <div class="mb-3">
                        <label for="id" class="col-form-label font-weight-bold">ID:</label>
                        <input type="text" class="form-control" id="id" name="id" value="{{ $p->id }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="semester" class="col-form-label font-weight-bold">Semester:</label>
                        <input type="text" class="form-control" id="semester" name="semester" value="{{ $p->semester }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="tahun_ajaran" class="col-form-label font-weight-bold">Tahun Ajaran:</label>
                        <input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran" value="{{ $p->tahun_ajaran }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="created_at" class="col-form-label font-weight-bold">Waktu Dibuat:</label>
                        <input type="text" class="form-control" id="created_at" name="created_at" value="{{ $p->created_at }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="updated_at" class="col-form-label font-weight-bold">Waktu Diperbarui:</label>
                        <input type="text" class="form-control" id="updated_at" name="updated_at" value="{{ $p->updated_at }}" disabled>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">OK</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endforeach

{{-- modal edit data --}}
@foreach ($periode as $p)

<div class="modal fade" id="modalEditData{{ $p->id }}" tabindex="-1" aria-labelledby="modalEditDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditDataLabel">Edit Data Periode</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.data.periode.update', $p->id) }}">
                    @csrf
                    <input hidden type="text" class="form-control" id="id" name="id" value="{{ $p->id }}" required>
                    <div class="mb-3">
                        <label for="semester" class="col-form-label font-weight-bold">Semester:</label>
                        <select class="form-control" name="semester" id="semester" required>
                            <option selected disabled>--- Pilih ---</option>
                            <option value="{{ $p->semester }}" selected hidden>{{ $p->semester }}</option>
                            <option value="GANJIL">GANJIL</option>
                            <option value="GENAP">GENAP</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tahun_ajaran" class="col-form-label font-weight-bold">Tahun Ajaran:</label>
                        <input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran" value="{{ $p->tahun_ajaran }}" required>
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
@endforeach

{{-- modal hapus data --}}
@foreach ($periode as $p)
<div class="modal fade" id="modalHapusData{{ $p->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data Periode</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <h6>Anda yakin ingin menghapus data Periode ini?</h6>
                <table class="table table-borderless table-responsive">
                    <tr>
                        <th>ID</th>
                        <td>:</td>
                        <td>{{ $p->id }}</td>
                    </tr>
                    <tr>
                        <th>Semester</th>
                        <td>:</td>
                        <td>{{ $p->semester }}</td>
                    </tr>
                    <tr>
                        <th>Tahun Ajaran</th>
                        <td>:</td>
                        <td>{{ $p->tahun_ajaran }}</td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <form action="{{ route('admin.data.periode.destroy', $p->id ) }}" method="GET">
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