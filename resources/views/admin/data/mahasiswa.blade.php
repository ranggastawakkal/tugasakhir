@extends('layouts/main')
@section('title','Data Mahasiswa')

@section('main-content')
<h1 class="h3 mb-4 text-gray-800">Data Mahasiswa</h1>

<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-success">Data Mahasiswa</h6>
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
                        Something it's wrong:
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
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Program Studi</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Peminatan</th>
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
                        @foreach ($mahasiswa as $mhs)
                        <tr>
                            <td scope="row" class="text-center">{{ $i }}</td>
                            <td scope="row">{{ $mhs->nim }}</td>
                            <td scope="row">{{ $mhs->nama }}</td>
                            <td scope="row">{{ $mhs->kelas->prodi->nama_prodi }}</td>
                            <td scope="row">{{ $mhs->kelas->nama_kelas }}</td>
                            <td scope="row">{{ $mhs->peminatan->nama }}</td>
                            <td scope="row">{{ $mhs->email }}</td>
                            <td scope="row">{{ $mhs->no_telepon }}</td>
                            <td scope="row">{{ Str::limit($mhs->alamat,50) }}</td>
                            <td scope="row">{{ $mhs->jenis_kelamin }}</td>
                            <td scope="row">{{ $mhs->tempat_lahir }}, {{ $mhs->tanggal_lahir }}</td>
                            <td scope="row">{{ $mhs->created_at->format('d-m-Y H:i:s') }}</td>
                            <td scope="row">{{ $mhs->updated_at->format('d-m-Y H:i:s') }}</td>
                            <td scope="row">
                                {{-- <button type="button" onclick="location.href='{{ route('admin.data.pembimbing-akademik') }}'" class="btn btn-success mb-3 mx-3"> --}}
                                    <abbr title="Edit data"><a href="" data-bs-toggle="modal" data-bs-target="#modalEditData{{ $mhs->id }}" class="text-warning"><i class="fas fa-sm fa-edit"></i></a></abbr>  |  
                                    <abbr title="Hapus data"><a href="" class="text-danger"><i class="fas fa-sm fa-trash-alt"></i></a></abbr>
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
                <h5 class="modal-title" id="modalTambahDataLabel">Tambah Data Mahasiswa</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.data.mahasiswa.store') }}">
                @csrf
                    <div class="mb-3">
                        <label for="nim" class="col-form-label">NIM:</label>
                        <input type="text" class="form-control" id="nim" name="nim" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="col-form-label">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="kelas" class="col-form-label">Kelas:</label>
                        <select class="form-control" name="id_kelas" id="id_kelas" required>
                            <option selected disabled>--- Pilih ---</option>
                            @foreach ($kelas as $kls)
                                <option value="{{ $kls->id }}">{{ $kls->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="peminatan" class="col-form-label">Peminatan:</label>
                        <select class="form-control" name="id_peminatan" id="id_peminatan" required>
                            <option selected disabled>--- Pilih ---</option>
                            @foreach ($peminatan as $minat)
                                <option value="{{ $minat->id }}">{{ $minat->nama }}</option>
                            @endforeach
                        </select>
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
                <button type="submit" class="btn btn-success">Save</button>
            </div>
                </form>
        </div>
    </div>
</div>

{{-- modal edit data --}}
@foreach ($mahasiswa as $mhs)
    
<div class="modal fade" id="modalEditData{{ $mhs->id }}" tabindex="-1" aria-labelledby="modalEditDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditDataLabel">Edit Data Mahasiswa</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.data.mahasiswa.store') }}">
                @csrf
                    <input hidden type="text" class="form-control" id="id" name="id" value="{{ $mhs->id }}" required>
                    <div class="mb-3">
                        <label for="nim" class="col-form-label">NIM:</label>
                        <input type="text" class="form-control" id="nim" name="nim" value="{{ $mhs->nim }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="col-form-label">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $mhs->nama }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="kelas" class="col-form-label">Kelas:</label>
                        <select class="form-control" name="id_kelas" id="id_kelas" required>
                            <option disabled>--- Pilih ---</option>
                            <option value="" selected hidden>{{ $mhs->kelas->nama_kelas }}</option>
                            @foreach ($kelas as $kls)
                                <option value="{{ $kls->id }}">{{ $kls->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="peminatan" class="col-form-label">Peminatan:</label>
                        <select class="form-control" name="id_peminatan" id="id_peminatan" required>
                            <option selected disabled>--- Pilih ---</option>
                            <option value="" selected hidden>{{ $mhs->peminatan->nama }}</option>
                            @foreach ($peminatan as $minat)
                                <option value="{{ $minat->id }}">{{ $minat->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="col-form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $mhs->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_telepon" class="col-form-label">No. Telepon:</label>
                        <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="{{ $mhs->no_telepon }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="col-form-label">Alamat:</label>
                        <textarea class="form-control" id="alamat" name="alamat" required>{{ $mhs->alamat }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="col-form-label">Jenis Kelamin:</label>
                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" name="jenis_kelamin" value="{{ $mhs->jenis_kelamin }}" required>
                            <option value="" disabled>--- Pilih ---</option>
                            <option value="" selected hidden>{{ $mhs->jenis_kelamin }}</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tempat_lahir" class="col-form-label"">Tempat Lahir:</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ $mhs->tempat_lahir }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="col-form-label">Tanggal Lahir:</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $mhs->tanggal_lahir }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="col-form-label">Password:</label>
                        <input type="text" class="form-control" id="password" name="password" value="{{ $mhs->password }}" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
                </form>
        </div>
    </div>
</div>
@endforeach

@endsection