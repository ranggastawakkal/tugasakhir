@extends('layouts/main')
@section('title','Data Pembimbing Akademik')

@section('main-content')
    <h1 class="h3 mb-4 text-gray-800">Data Pembimbing Akademik</h1>
    <div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-success">Data Pembimbing Akademik</h6>
            </div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success text-center">
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
                <table class="table table-striped table-bordered display nowrap" id="dataTable">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">ID</th>
                            <th scope="col">NIP</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kode Dosen</th>
                            <th scope="col">Email</th>
                            <th scope="col">No. Telepon</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">TTL</th>
                            <th scope="col">Dibuat</th>
                            <th scope="col">Diperbarui</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php 
                        $i = 1;
                        @endphp
                        @foreach ($pembimbing_akademik as $pemb_akd)
                        <tr>
                            <td class="text-center" scope="row">{{ $i }}</td>
                            <td scope="row">{{ $pemb_akd->id }}</td>
                            <td scope="row">{{ $pemb_akd->nip }}</td>
                            <td scope="row">{{ $pemb_akd->nama }}</td>
                            <td scope="row">{{ $pemb_akd->kode_dosen }}</td>
                            <td scope="row">{{ $pemb_akd->email }}</td>
                            <td scope="row">{{ $pemb_akd->no_telepon }}</td>
                            <td scope="row">{{ Str::limit($pemb_akd->alamat,50) }}</td>
                            <td scope="row">{{ $pemb_akd->jenis_kelamin }}</td>
                            <td scope="row">{{ $pemb_akd->tempat_lahir }}, {{ $pemb_akd->tanggal_lahir }}</td>
                            <td scope="row">{{ $pemb_akd->created_at }}</td>
                            <td scope="row">{{ $pemb_akd->updated_at }}</td>
                            <td scope="row">
                                <abbr title="Lihat Detail"><a href="" data-bs-toggle="modal" data-bs-target="#modalTampilData{{ $pemb_akd->id }}" class="text-primary"><i class="fas fa-sm fa-info"></i></a></abbr>    |  
                                <abbr title="Edit data"><a href="" data-bs-toggle="modal" data-bs-target="#modalEditData{{ $pemb_akd->id }}" class="text-warning"><i class="fas fa-sm fa-edit"></i></a></abbr>  |  
                                <abbr title="Hapus data"><a href="" data-bs-toggle="modal" data-bs-target="#modalHapusData{{ $pemb_akd->id }}" class="text-danger"><i class="fas fa-sm fa-trash-alt"></i></a></abbr>
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
                <h5 class="modal-title" id="modalTambahDataLabel">Tambah Data Pembimbing Akademik</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.data.pembimbing-akademik.store') }}">
                @csrf
                    <div class="mb-3">
                        <label for="nip" class="col-form-label">NIP:</label>
                        <input type="text" class="form-control" id="nip" name="nip" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="col-form-label">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="kode_dosen" class="col-form-label">Kode Dosen:</label>
                        <input type="text" class="form-control" id="kode_dosen" name="kode_dosen" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="col-form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_telepon" class="col-form-label">No. Telepon:</label>
                        <input type="text" class="form-control" id="no_telepon" name="no_telepon" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="col-form-label">Alamat:</label>
                        <textarea class="form-control" id="alamat" name="alamat" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="col-form-label">Jenis Kelamin:</label>
                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="" selected disabled>--- Pilih ---</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tempat_lahir" class="col-form-label">Tempat Lahir:</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="col-form-label">Tanggal Lahir:</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="tanggal_lahir" required>
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
@foreach ($pembimbing_akademik as $pemb_akd)
    
<div class="modal fade" id="modalTampilData{{ $pemb_akd->id }}" tabindex="-1" aria-labelledby="modalTampilDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTampilDataLabel">Detail Data Pembimbing Akademik</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.data.pembimbing-akademik.update', $pemb_akd->id) }}">
                @csrf
                    <div class="mb-3">
                        <label for="id" class="col-form-label">ID:</label>
                        <input type="text" class="form-control" id="id" name="id" value="{{ $pemb_akd->id }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="nip" class="col-form-label">NIP:</label>
                        <input type="text" class="form-control" id="nip" name="nip" value="{{ $pemb_akd->nip }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="col-form-label">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $pemb_akd->nama }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="kode_dosen" class="col-form-label">Kode Dosen:</label>
                        <input type="text" class="form-control" id="kode_dosen" name="kode_dosen" value="{{ $pemb_akd->kode_dosen }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="col-form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $pemb_akd->email }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="no_telepon" class="col-form-label">No. Telepon:</label>
                        <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="{{ $pemb_akd->no_telepon }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="col-form-label">Alamat:</label>
                        <textarea class="form-control" id="alamat" name="alamat" disabled>{{ $pemb_akd->alamat }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="col-form-label">Jenis Kelamin:</label>
                        <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="{{ $pemb_akd->no_telepon }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="tempat_lahir" class="col-form-label">Tempat Lahir:</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ $pemb_akd->tempat_lahir }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="col-form-label">Tanggal Lahir:</label>
                        <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $pemb_akd->tanggal_lahir }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="created_at" class="col-form-label">Waktu Dibuat:</label>
                        <input type="text" class="form-control" id="created_at" name="created_at" value="{{ $pemb_akd->created_at }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="updated_at" class="col-form-label">Waktu Diperbarui:</label>
                        <input type="text" class="form-control" id="updated_at" name="updated_at" value="{{ $pemb_akd->updated_at }}" disabled>
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
@foreach ($pembimbing_akademik as $pemb_akd)
    
<div class="modal fade" id="modalEditData{{ $pemb_akd->id }}" tabindex="-1" aria-labelledby="modalEditDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditDataLabel">Edit Data Pembimbing Akademik</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.data.pembimbing-akademik.update', $pemb_akd->id) }}">
                @csrf
                    <input hidden type="text" class="form-control" id="id" name="id" value="{{ $pemb_akd->id }}" required>
                    <div class="mb-3">
                        <label for="nip" class="col-form-label">NIP:</label>
                        <input type="text" class="form-control" id="nip" name="nip" value="{{ $pemb_akd->nip }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="col-form-label">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $pemb_akd->nama }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="kode_dosen" class="col-form-label">Kode Dosen:</label>
                        <input type="text" class="form-control" id="kode_dosen" name="kode_dosen" value="{{ $pemb_akd->kode_dosen }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="col-form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $pemb_akd->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_telepon" class="col-form-label">No. Telepon:</label>
                        <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="{{ $pemb_akd->no_telepon }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="col-form-label">Alamat:</label>
                        <textarea class="form-control" id="alamat" name="alamat" required>{{ $pemb_akd->alamat }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="col-form-label">Jenis Kelamin:</label>
                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" name="jenis_kelamin" value="{{ $pemb_akd->jenis_kelamin }}" required>
                            <option value="" disabled>--- Pilih ---</option>
                            <option value="{{ $pemb_akd->jenis_kelamin }}" selected hidden>{{ $pemb_akd->jenis_kelamin }}</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tempat_lahir" class="col-form-label">Tempat Lahir:</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ $pemb_akd->tempat_lahir }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="col-form-label">Tanggal Lahir:</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $pemb_akd->tanggal_lahir }}" required>
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
@foreach ($pembimbing_akademik as $pemb_akd)
<div class="modal fade" id="modalHapusData{{ $pemb_akd->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data Pembimbing Akademik</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <h6>Anda yakin ingin menghapus data pembimbing akademik ini?</h6>
                <ul>
                    <li>NIP : {{ $pemb_akd->nip }}</li>
                    <li>Nama : {{ $pemb_akd->nama }}</li>
                    <li>Kode Dosen : {{ $pemb_akd->kode_dosen }}</li>
                </ul>
            </div>
            <div class="modal-footer">
                <form action="{{ route('admin.data.pembimbing-akademik.destroy', $pemb_akd->id ) }}" method="GET">
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