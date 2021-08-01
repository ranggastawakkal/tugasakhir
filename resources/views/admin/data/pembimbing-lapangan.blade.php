@extends('layouts/main')
@section('title','Data Pembimbing Lapangan')

@section('main-content')
    <h1 class="h3 mb-4 text-gray-800">Data Pembimbing Lapangan</h1>
    <div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-success">Data Pembimbing Lapangan</h6>
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
                <table class="table table-striped table-bordered display nowrap" id="dataTableAdmin">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">ID</th>
                            <th scope="col">NIP</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">No. Telepon</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">Perusahaan</th>
                            <th scope="col">Alamat Perusahaan</th>
                            <th scope="col">Kota Perusahaan</th>
                            <th scope="col">Email Perusahaan</th>
                            <th scope="col">No. Telepon Perusahaan</th>
                            <th scope="col">Dibuat</th>
                            <th scope="col">Diperbarui</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php 
                        $i = 1;
                        @endphp
                        @foreach ($pembimbing_lapangan as $pemb_lap)
                        <tr>
                            <td class="text-center" scope="row">{{ $i }}</td>
                            <td scope="row">{{ $pemb_lap->id }}</td>
                            <td scope="row">{{ $pemb_lap->nip }}</td>
                            <td scope="row">{{ $pemb_lap->nama }}</td>
                            <td scope="row">{{ $pemb_lap->email }}</td>
                            <td scope="row">{{ $pemb_lap->no_telepon }}</td>
                            <td scope="row">{{ $pemb_lap->jabatan }}</td>
                            <td scope="row">{{ $pemb_lap->nama_perusahaan }}</td>
                            <td scope="row">{{ Str::limit($pemb_lap->alamat_perusahaan, 50) }}</td>
                            <td scope="row">{{ $pemb_lap->kota_perusahaan }}</td>
                            <td scope="row">{{ $pemb_lap->email_perusahaan }}</td>
                            <td scope="row">{{ $pemb_lap->no_telepon_perusahaan }}</td>
                            <td scope="row">{{ $pemb_lap->created_at }}</td>
                            <td scope="row">{{ $pemb_lap->updated_at }}</td>
                            <td scope="row">
                                <abbr title="Lihat Detail"><a href="" data-bs-toggle="modal" data-bs-target="#modalTampilData{{ $pemb_lap->id }}" class="text-primary"><i class="fas fa-sm fa-info"></i></a></abbr>    |  
                                <abbr title="Edit data"><a href="" data-bs-toggle="modal" data-bs-target="#modalEditData{{ $pemb_lap->id }}" class="text-warning"><i class="fas fa-sm fa-edit"></i></a></abbr>  |  
                                <abbr title="Hapus data"><a href="" data-bs-toggle="modal" data-bs-target="#modalHapusData{{ $pemb_lap->id }}" class="text-danger"><i class="fas fa-sm fa-trash-alt"></i></a></abbr>
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
                <h5 class="modal-title" id="modalTambahDataLabel">Tambah Data Pembimbing Lapangan</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.data.pembimbing-lapangan.store') }}">
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
                        <label for="email" class="col-form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_telepon" class="col-form-label">No. Telepon:</label>
                        <input type="text" class="form-control" id="no_telepon" name="no_telepon" required>
                    </div>
                    <div class="mb-3">
                        <label for="jabatan" class="col-form-label">Jabatan:</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_perusahaan" class="col-form-label">Perusahaan:</label>
                        <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat_perusahaan" class="col-form-label">Alamat Perusahaan:</label>
                        <textarea class="form-control" id="alamat_perusahaan" name="alamat_perusahaan" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="kota_perusahaan" class="col-form-label">Kota Perusahaan:</label>
                        <input type="text" class="form-control" id="kota_perusahaan" name="kota_perusahaan" required>
                    </div>
                    <div class="mb-3">
                        <label for="email_perusahaan" class="col-form-label">Email Perusahaan:</label>
                        <input type="email_perusahaan" class="form-control" id="email_perusahaan" name="email_perusahaan" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_telepon_perusahaan" class="col-form-label">No. Telepon Perusahaan:</label>
                        <input type="text" class="form-control" id="no_telepon_perusahaan" name="no_telepon_perusahaan" required>
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
@foreach ($pembimbing_lapangan as $pemb_lap)
    
<div class="modal fade" id="modalTampilData{{ $pemb_lap->id }}" tabindex="-1" aria-labelledby="modalTampilDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTampilDataLabel">Detail Data Pembimbing Lapangan</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.data.pembimbing-lapangan.update', $pemb_lap->id) }}">
                @csrf
                    <div class="mb-3">
                        <label for="id" class="col-form-label">ID:</label>
                        <input type="text" class="form-control" id="id" name="id" value="{{ $pemb_lap->id }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="nip" class="col-form-label">NIP:</label>
                        <input type="text" class="form-control" id="nip" name="nip" value="{{ $pemb_lap->nip }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="col-form-label">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $pemb_lap->nama }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="col-form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $pemb_lap->email }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="no_telepon" class="col-form-label">No. Telepon:</label>
                        <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="{{ $pemb_lap->no_telepon }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="jabatan" class="col-form-label">Jabatan:</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ $pemb_lap->jabatan }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="nama_perusahaan" class="col-form-label">Nama Perusahan:</label>
                        <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" value="{{ $pemb_lap->nama_perusahaan }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="alamat_perusahaan" class="col-form-label">Alamat Perusahaan:</label>
                        <textarea class="form-control" id="alamat_perusahaan" name="alamat_perusahaan" disabled>{{ $pemb_lap->alamat_perusahaan }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="kota_perusahaan" class="col-form-label">Kota Perusahaan:</label>
                        <input type="text" class="form-control" id="kota_perusahaan" name="kota_perusahaan" value="{{ $pemb_lap->kota_perusahaan }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="email_perusahaan" class="col-form-label">Email Perusahaan:</label>
                        <input type="text" class="form-control" id="email_perusahaan" name="email_perusahaan" value="{{ $pemb_lap->email_perusahaan }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="no_telepon_perusahaan" class="col-form-label">No. Telepon Perusahaan:</label>
                        <input type="text" class="form-control" id="no_telepon_perusahaan" name="no_telepon_perusahaan" value="{{ $pemb_lap->no_telepon_perusahaan }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="created_at" class="col-form-label">Waktu Dibuat:</label>
                        <input type="text" class="form-control" id="created_at" name="created_at" value="{{ $pemb_lap->created_at }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="updated_at" class="col-form-label">Waktu Diperbarui:</label>
                        <input type="text" class="form-control" id="updated_at" name="updated_at" value="{{ $pemb_lap->updated_at }}" disabled>
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
@foreach ($pembimbing_lapangan as $pemb_lap)
    
<div class="modal fade" id="modalEditData{{ $pemb_lap->id }}" tabindex="-1" aria-labelledby="modalEditDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditDataLabel">Edit Data Pembimbing Lapangan</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.data.pembimbing-lapangan.update', $pemb_lap->id) }}">
                @csrf
                    <input hidden type="text" class="form-control" id="id" name="id" value="{{ $pemb_lap->id }}" required>
                    <div class="mb-3">
                        <label for="nip" class="col-form-label">NIP:</label>
                        <input type="text" class="form-control" id="nip" name="nip" value="{{ $pemb_lap->nip }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="col-form-label">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $pemb_lap->nama }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="col-form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $pemb_lap->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_telepon" class="col-form-label">No. Telepon:</label>
                        <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="{{ $pemb_lap->no_telepon }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="jabatan" class="col-form-label">Jabatan:</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ $pemb_lap->jabatan }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_perusahaan" class="col-form-label">Perusahaan:</label>
                        <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" value="{{ $pemb_lap->nama_perusahaan }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat_perusahaan" class="col-form-label">Alamat Perusahaan:</label>
                        <textarea class="form-control" id="alamat_perusahaan" name="alamat_perusahaan" required>{{ $pemb_lap->alamat_perusahaan }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="kota_perusahaan" class="col-form-label">Kota Perusahaan:</label>
                        <input type="text" class="form-control" id="kota_perusahaan" name="kota_perusahaan" value="{{ $pemb_lap->kota_perusahaan }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email_perusahaan" class="col-form-label">Email Perusahaan:</label>
                        <input type="email" class="form-control" id="email_perusahaan" name="email_perusahaan" value="{{ $pemb_lap->email_perusahaan }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_telepon_perusahaan" class="col-form-label">No. Telepon Perusahaan:</label>
                        <input type="text" class="form-control" id="no_telepon_perusahaan" name="no_telepon_perusahaan" value="{{ $pemb_lap->no_telepon_perusahaan }}" required>
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
@foreach ($pembimbing_lapangan as $pemb_lap)
<div class="modal fade" id="modalHapusData{{ $pemb_lap->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data Pembimbing Lapangan</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <h6>Anda yakin ingin menghapus data pembimbing lapangan ini?</h6>
                <ul>
                    <li>NIP : {{ $pemb_lap->nip }}</li>
                    <li>Nama : {{ $pemb_lap->nama }}</li>
                    <li>Perusahaan : {{ $pemb_lap->nama_perusahaan }}</li>
                </ul>
            </div>
            <div class="modal-footer">
                <form action="{{ route('admin.data.pembimbing-lapangan.destroy', $pemb_lap->id ) }}" method="GET">
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