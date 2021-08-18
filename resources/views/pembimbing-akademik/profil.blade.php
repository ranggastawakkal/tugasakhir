@extends('layouts/main')
@section('title','Profil')

@section('main-content')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-success">Profil</h6>
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
                <table class="table table-borderless table-responsive">
                    <tr>
                        <th>NIP</th>
                        <td>:</td>
                        <td>{{ $user->nip }}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>:</td>
                        <td>{{ $user->nama }}</td>
                    </tr>
                    <tr>
                        <th>Kode Dosen</th>
                        <td>:</td>
                        <td>{{ $user->kode_dosen }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>:</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th>No. Telepon</th>
                        <td>:</td>
                        <td>{{ $user->no_telepon }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>:</td>
                        <td>{{ $user->alamat }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>:</td>
                        <td>{{ $user->jenis_kelamin }}</td>
                    </tr>
                    <tr>
                        <th>TTL</th>
                        <td>:</td>
                        <td>{{ $user->tempat_lahir }}, {{ $user->tanggal_lahir }}</td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditData">
                    <i class="fas fa-edit"></i> Edit Profil
                </button>
            </div>
        </div>
    </div>
</div>

{{-- modal edit data --}}
<div class="modal fade" id="modalEditData" tabindex="-1" aria-labelledby="modalEditDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditDataLabel">Edit Profil</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('pembimbing-akademik.profil.update') }}">
                    @csrf
                    <input hidden type="text" class="form-control" id="id" name="id" value="{{ $user->id }}" required>
                    <div class="mb-3">
                        <label for="nip" class="col-form-label">NIP:</label>
                        <input type="text" class="form-control" id="nip" name="nip" value="{{ $user->nip }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="col-form-label">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $user->nama }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="kode_dosen" class="col-form-label">Kode Dosen:</label>
                        <input type="text" class="form-control" id="kode_dosen" name="kode_dosen" value="{{ $user->kode_dosen }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="col-form-label">Email:</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_telepon" class="col-form-label">No. Telepon:</label>
                        <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="{{ $user->no_telepon }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="col-form-label">Alamat:</label>
                        <textarea class="form-control" id="alamat" name="alamat" required>{{ $user->alamat }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="col-form-label">Jenis Kelamin:</label>
                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" name="jenis_kelamin" value="{{ $user->jenis_kelamin }}" required>
                            <option value="" disabled>--- Pilih ---</option>
                            <option value="{{ $user->jenis_kelamin }}" selected hidden>{{ $user->jenis_kelamin }}</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tempat_lahir" class="col-form-label">Tempat Lahir:</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ $user->tempat_lahir }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="col-form-label">Tanggal Lahir:</label>
                        <input type="date" class="form-control" max="{{ date("Y-m-d") }}" id="tanggal_lahir" name="tanggal_lahir" value="{{ $user->tanggal_lahir }}" required>
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
@endsection