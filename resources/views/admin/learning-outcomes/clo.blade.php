@extends('layouts/main')
@section('title','CLO')

@section('main-content')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-success">Data CLO (<i>Course Learning Outcomes</i>)</h6>
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
                <table class="table table-striped table-bordered display nowrap" id="dataTableAdmin">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">ID</th>
                            <th scope="col">Kode CLO</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Kode PLO</th>
                            <th scope="col">Dibuat</th>
                            <th scope="col">Diperbarui</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($clo as $lo)
                        <tr>
                            <td scope="row" class="text-center">{{ $i }}</td>
                            <td scope="row">{{ $lo->id }}</td>
                            <td scope="row">{{ $lo->kode_clo }}</td>
                            <td scope="row">{{ Str::limit($lo->deskripsi, 50) }}</td>
                            <td scope="row">{{ $lo->plo->kode_plo }}</td>
                            <td scope="row">{{ $lo->created_at }}</td>
                            <td scope="row">{{ $lo->updated_at }}</td>
                            <td scope="row">
                                <abbr title="Lihat Detail"><a href="" data-bs-toggle="modal" data-bs-target="#modalTampilData{{ $lo->id }}" class="text-primary"><i class="fas fa-sm fa-info"></i></a></abbr> |
                                <abbr title="Edit data"><a href="" data-bs-toggle="modal" data-bs-target="#modalEditData{{ $lo->id }}" class="text-warning"><i class="fas fa-sm fa-edit"></i></a></abbr> |
                                <abbr title="Hapus data"><a href="" data-bs-toggle="modal" data-bs-target="#modalHapusData{{ $lo->id }}" class="text-danger"><i class="fas fa-sm fa-trash-alt"></i></a></abbr>
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
                <h5 class="modal-title" id="modalTambahDataLabel">Tambah Data CLO</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('learning-outcomes.clo.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="kode_clo" class="col-form-label font-weight-bold">Kode CLO:</label>
                        <input type="text" class="form-control" id="kode_clo" name="kode_clo" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="col-form-label font-weight-bold">Deskripsi:</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="id_plo" class="col-form-label font-weight-bold">Kode PLO:</label>
                        <select class="form-control" name="id_plo" id="id_plo" required>
                            <option selected disabled>--- Pilih ---</option>
                            @foreach ($plo as $lo)
                            <option value="{{ $lo->id }}">{{ $lo->kode_plo }}</option>
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
@foreach ($clo as $lo)

<div class="modal fade" id="modalTampilData{{ $lo->id }}" tabindex="-1" aria-labelledby="modalTampilDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTampilDataLabel">Detail Data CLO</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="">
                    @csrf
                    <div class="mb-3">
                        <label for="id" class="col-form-label font-weight-bold">ID:</label>
                        <input type="text" class="form-control" id="id" name="id" value="{{ $lo->id }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="col-form-label font-weight-bold">Kode CLO:</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $lo->kode_clo }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="col-form-label font-weight-bold">Deskripsi:</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" disabled>{{ $lo->deskripsi }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="id_prodi" class="col-form-label font-weight-bold">Kode PLO:</label>
                        <input type="text" class="form-control" id="id_prodi" name="id_prodi" value="{{ $lo->plo->kode_plo }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="created_at" class="col-form-label font-weight-bold">Waktu Dibuat:</label>
                        <input type="text" class="form-control" id="created_at" name="created_at" value="{{ $lo->created_at }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="updated_at" class="col-form-label font-weight-bold">Waktu Diperbarui:</label>
                        <input type="text" class="form-control" id="updated_at" name="updated_at" value="{{ $lo->updated_at }}" disabled>
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
@foreach ($clo as $lo)

<div class="modal fade" id="modalEditData{{ $lo->id }}" tabindex="-1" aria-labelledby="modalEditDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditDataLabel">Edit Data CLO</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('learning-outcomes.clo.update', $lo->id) }}">
                    @csrf
                    <input hidden type="text" class="form-control" id="id" name="id" value="{{ $lo->id }}" required>
                    <div class="mb-3">
                        <label for="kode_clo" class="col-form-label font-weight-bold">Kode CLO:</label>
                        <input type="text" class="form-control" id="kode_clo" name="kode_clo" value="{{ $lo->kode_clo }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="col-form-label font-weight-bold">Deskripsi:</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" required>{{ $lo->deskripsi }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="id_plo" class="col-form-label font-weight-bold">Kode PLO:</label>
                        <select class="form-control" name="id_plo" id="id_plo" required>
                            <option disabled>--- Pilih ---</option>
                            <option value="{{ $lo->plo->id }}" selected hidden>{{ $lo->plo->kode_plo }}</option>
                            @foreach ($plo as $lo)
                            <option value="{{ $lo->id }}">{{ $lo->kode_plo }}</option>
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
@foreach ($clo as $lo)
<div class="modal fade" id="modalHapusData{{ $lo->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data CLO</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <h6>Anda yakin ingin menghapus data CLO ini?</h6>
                <table class="table table-borderless table-responsive">
                    <tr>
                        <th>ID</th>
                        <td>:</td>
                        <td>{{ $lo->id }}</td>
                    </tr>
                    <tr>
                        <th>Kode CLO</th>
                        <td>:</td>
                        <td>{{ $lo->kode_clo }}</td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>:</td>
                        <td>{{ $lo->deskripsi }}</td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <form action="{{ route('learning-outcomes.clo.destroy', $lo->id ) }}" method="GET">
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