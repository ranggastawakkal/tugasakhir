@extends('layouts/main')
@section('title','Data Peminatan')

@section('main-content')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-success">Data Peminatan</h6>
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
                            <th scope="col">Nama Peminatan</th>
                            <th scope="col">Kelompok Keahlian</th>
                            <th scope="col">Program Studi</th>
                            <th scope="col">Dibuat</th>
                            <th scope="col">Diperbarui</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($peminatan as $minat)
                        <tr>
                            <td scope="row" class="text-center">{{ $i }}</td>
                            <td scope="row">{{ $minat->id }}</td>
                            <td scope="row">{{ $minat->nama }}</td>
                            <td scope="row">{{ $minat->kelompokKeahlian->nama_kk }}</td>
                            <td scope="row">{{ $minat->prodi->nama_prodi }}</td>
                            <td scope="row">{{ $minat->created_at }}</td>
                            <td scope="row">{{ $minat->updated_at }}</td>
                            <td scope="row">
                                <abbr title="Lihat Detail"><a href="" data-bs-toggle="modal" data-bs-target="#modalTampilData{{ $minat->id }}" class="text-primary"><i class="fas fa-sm fa-info"></i></a></abbr> |
                                <abbr title="Edit data"><a href="" data-bs-toggle="modal" data-bs-target="#modalEditData{{ $minat->id }}" class="text-warning"><i class="fas fa-sm fa-edit"></i></a></abbr> |
                                <abbr title="Hapus data"><a href="" data-bs-toggle="modal" data-bs-target="#modalHapusData{{ $minat->id }}" class="text-danger"><i class="fas fa-sm fa-trash-alt"></i></a></abbr>
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
                <h5 class="modal-title" id="modalTambahDataLabel">Tambah Data Peminatan</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.data.peminatan.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="col-form-label">Nama Peminatan:</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="id_kk" class="col-form-label">Kelompok Keahlian:</label>
                        <select class="form-control" name="id_kk" id="id_kk" required>
                            <option selected disabled>--- Pilih ---</option>
                            @foreach ($kelompok_keahlian as $kk)
                            <option value="{{ $kk->id }}">{{ $kk->nama_kk }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="id_prodi" class="col-form-label">Program Studi:</label>
                        <select class="form-control" name="id_prodi" id="id_prodi" required>
                            <option selected disabled>--- Pilih ---</option>
                            @foreach ($program_studi as $prodi)
                            <option value="{{ $prodi->id }}">{{ $prodi->nama_prodi }}</option>
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
@foreach ($peminatan as $minat)

<div class="modal fade" id="modalTampilData{{ $minat->id }}" tabindex="-1" aria-labelledby="modalTampilDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTampilDataLabel">Detail Data Peminatan</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.data.peminatan.update', $minat->id) }}">
                    @csrf
                    <div class="mb-3">
                        <label for="id" class="col-form-label">ID:</label>
                        <input type="text" class="form-control" id="id" name="id" value="{{ $minat->id }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="col-form-label">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $minat->nama }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="id_kk" class="col-form-label">Kelompok Keahlian:</label>
                        <input type="text" class="form-control" id="id_kk" name="id_kk" value="{{ $minat->kelompokKeahlian->nama_kk }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="id_prodi" class="col-form-label">Program Studi:</label>
                        <input type="text" class="form-control" id="id_prodi" name="id_prodi" value="{{ $minat->prodi->nama_prodi }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="created_at" class="col-form-label">Waktu Dibuat:</label>
                        <input type="text" class="form-control" id="created_at" name="created_at" value="{{ $minat->created_at }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="updated_at" class="col-form-label">Waktu Diperbarui:</label>
                        <input type="text" class="form-control" id="updated_at" name="updated_at" value="{{ $minat->updated_at }}" disabled>
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
@foreach ($peminatan as $minat)

<div class="modal fade" id="modalEditData{{ $minat->id }}" tabindex="-1" aria-labelledby="modalEditDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditDataLabel">Edit Data Peminatan</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.data.peminatan.update', $minat->id) }}">
                    @csrf
                    <input hidden type="text" class="form-control" id="id" name="id" value="{{ $minat->id }}" required>
                    <div class="mb-3">
                        <label for="nama" class="col-form-label">Nama Peminatan:</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $minat->nama }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="id_kk" class="col-form-label">Kelompok Keahlian:</label>
                        <select class="form-control" name="id_kk" id="id_kk" required>
                            <option disabled>--- Pilih ---</option>
                            <option value="{{ $minat->kelompokKeahlian->id }}" selected hidden>{{ $minat->kelompokKeahlian->nama_kk }}</option>
                            @foreach ($kelompok_keahlian as $kk)
                            <option value="{{ $kk->id }}">{{ $kk->nama_kk }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="id_prodi" class="col-form-label">Kelompok Keahlian:</label>
                        <select class="form-control" name="id_prodi" id="id_prodi" required>
                            <option disabled>--- Pilih ---</option>
                            <option value="{{ $minat->prodi->id }}" selected hidden>{{ $minat->prodi->nama_prodi }}</option>
                            @foreach ($program_studi as $prodi)
                            <option value="{{ $prodi->id }}">{{ $prodi->nama_prodi }}</option>
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
@foreach ($peminatan as $minat)
<div class="modal fade" id="modalHapusData{{ $minat->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data Peminatan</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <h6>Anda yakin ingin menghapus data peminatan ini?</h6>
                <ul>
                    <li>ID : {{ $minat->id }}</li>
                    <li>Nama : {{ $minat->nama }}</li>
                    <li>Kelompok Keahlian : {{ $minat->kelompokKeahlian->nama_kk }}</li>
                    <li>Program Studi: {{ $minat->prodi->nama_prodi }}</li>
                </ul>
            </div>
            <div class="modal-footer">
                <form action="{{ route('admin.data.peminatan.destroy', $minat->id ) }}" method="GET">
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