@extends('layouts/main')
@section('title','Indikator Penilaian')

@section('main-content')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-success">Data Indikator Penilaian</h6>
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
                @if ($message = Session::get('errors'))
                <div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    {{ $message }}
                </div>
                @endif
                @if(session('errors') > 1)
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
                <table class="table table-striped table-bordered display nowrap" id="dataTableAdmin">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">ID</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Kode CLO</th>
                            <th scope="col">Dibuat</th>
                            <th scope="col">Diperbarui</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($indikator_penilaian as $indikator)
                        <tr>
                            <td scope="row" class="text-center">{{ $i }}</td>
                            <td scope="row">{{ $indikator->id }}</td>
                            <td scope="row">{{ Str::limit($indikator->deskripsi, 50) }}</td>
                            <td scope="row">{{ $indikator->clo->kode_clo }}</td>
                            <td scope="row">{{ $indikator->created_at }}</td>
                            <td scope="row">{{ $indikator->updated_at }}</td>
                            <td scope="row">
                                <abbr title="Lihat Detail"><a href="" data-bs-toggle="modal" data-bs-target="#modalTampilData{{ $indikator->id }}" class="text-primary"><i class="fas fa-sm fa-info"></i></a></abbr> |
                                <abbr title="Edit data"><a href="" data-bs-toggle="modal" data-bs-target="#modalEditData{{ $indikator->id }}" class="text-warning"><i class="fas fa-sm fa-edit"></i></a></abbr> |
                                <abbr title="Hapus data"><a href="" data-bs-toggle="modal" data-bs-target="#modalHapusData{{ $indikator->id }}" class="text-danger"><i class="fas fa-sm fa-trash-alt"></i></a></abbr>
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
                <h5 class="modal-title" id="modalTambahDataLabel">Tambah Data Indikator Penilaian</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('learning-outcomes.indikator-penilaian.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="deskripsi" class="col-form-label font-weight-bold">Deskripsi:</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="id_clo" class="col-form-label font-weight-bold">Kode CLO:</label>
                        <select class="form-control" name="id_clo" id="id_clo" required>
                            <option selected disabled>--- Pilih ---</option>
                            @foreach ($clo as $indikator)
                            <option value="{{ $indikator->id }}">{{ $indikator->kode_clo }}</option>
                            @endforeach
                        </select>
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
@foreach ($indikator_penilaian as $indikator)

<div class="modal fade" id="modalTampilData{{ $indikator->id }}" tabindex="-1" aria-labelledby="modalTampilDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTampilDataLabel">Detail Data Indikator Penilaian</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="">
                    @csrf
                    <div class="mb-3">
                        <label for="id" class="col-form-label font-weight-bold">ID:</label>
                        <input type="text" class="form-control" id="id" name="id" value="{{ $indikator->id }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="col-form-label font-weight-bold">Deskripsi:</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" disabled>{{ $indikator->deskripsi }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="id_prodi" class="col-form-label font-weight-bold">Kode CLO:</label>
                        <input type="text" class="form-control" id="id_prodi" name="id_prodi" value="{{ $indikator->clo->kode_clo }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="created_at" class="col-form-label font-weight-bold">Waktu Dibuat:</label>
                        <input type="text" class="form-control" id="created_at" name="created_at" value="{{ $indikator->created_at }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="updated_at" class="col-form-label font-weight-bold">Waktu Diperbarui:</label>
                        <input type="text" class="form-control" id="updated_at" name="updated_at" value="{{ $indikator->updated_at }}" disabled>
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
@foreach ($indikator_penilaian as $indikator)

<div class="modal fade" id="modalEditData{{ $indikator->id }}" tabindex="-1" aria-labelledby="modalEditDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditDataLabel">Edit Data Indikator Penilaian</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('learning-outcomes.indikator-penilaian.update', $indikator->id) }}">
                    @csrf
                    <input hidden type="text" class="form-control" id="id" name="id" value="{{ $indikator->id }}" required>
                    <div class="mb-3">
                        <label for="deskripsi" class="col-form-label font-weight-bold">Deskripsi:</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" required>{{ $indikator->deskripsi }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="id_clo" class="col-form-label font-weight-bold">Kode CLO:</label>
                        <select class="form-control" name="id_clo" id="id_clo" required>
                            <option disabled>--- Pilih ---</option>
                            <option value="{{ $indikator->clo->id }}" selected hidden>{{ $indikator->clo->kode_clo }}</option>
                            @foreach ($clo as $indikator)
                            <option value="{{ $indikator->id }}">{{ $indikator->kode_clo }}</option>
                            @endforeach
                        </select>
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
@foreach ($indikator_penilaian as $indikator)
<div class="modal fade" id="modalHapusData{{ $indikator->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data Indikator Penilaian</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <h6>Anda yakin ingin menghapus data Indikator Penilaian ini?</h6>
                <table class="table table-borderless table-responsive">
                    <tr>
                        <th>ID</th>
                        <td>:</td>
                        <td>{{ $indikator->id }}</td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>:</td>
                        <td>{{ $indikator->deskripsi }}</td>
                    </tr>
                    <tr>
                        <th>Kode CLO</th>
                        <td>:</td>
                        <td>{{ $indikator->clo->kode_clo }}</td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <form action="{{ route('learning-outcomes.indikator-penilaian.destroy', $indikator->id ) }}" method="GET">
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