@extends('layouts/main')
@section('title','Surat Pengantar')

@section('main-content')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-success">Data Surat Pengantar</h6>
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
                @if(session()->has('errors'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Ada kesalahan:
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <ul>
                        {{session('errors')}}
                    </ul>
                </div>
                @endif
                <table class="table table-striped table-bordered display nowrap" id="dataTableAdmin">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">ID</th>
                            <th scope="col">Nama</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Prodi</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Tujuan Surat</th>
                            <th scope="col">Nama Instansi</th>
                            <th scope="col">Alamat Instansi</th>
                            <th scope="col">Kota</th>
                            <th scope="col">Kontak Instansi</th>
                            <th scope="col">Bidang Minat</th>
                            <th scope="col">Dibuat</th>
                            <th scope="col">Diperbarui</th>
                            <th scope="col">Status</th>
                            <th scope="col">File</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($surat_pengantar as $sp)
                        <tr>
                            <td scope="row" class="text-center">{{ $i }}</td>
                            <td scope="row">{{ $sp->id }}</td>
                            <td scope="row">{{ $sp->mahasiswa->nama }}</td>
                            <td scope="row">{{ $sp->mahasiswa->nim }}</td>
                            <td scope="row">{{ $sp->mahasiswa->kelas->prodi->nama_prodi }}</td>
                            <td scope="row">{{ $sp->tanggal }}</td>
                            <td scope="row">{{ $sp->tujuan_surat }}</td>
                            <td scope="row">{{ $sp->nama_instansi }}</td>
                            <td scope="row">{{ $sp->alamat_instansi }}</td>
                            <td scope="row">{{ $sp->kota_instansi }}</td>
                            <td scope="row">{{ $sp->kontak_instansi }}</td>
                            <td scope="row">{{ $sp->mahasiswa->peminatan->nama }}</td>
                            <td scope="row">{{ $sp->created_at }}</td>
                            <td scope="row">{{ $sp->updated_at }}</td>
                            @if ($sp->status === "Diterima")
                                <td class="text-success font-weight-bold" scope="row">{{ $sp->status }}</td>
                            @elseif($sp->status === "Ditolak")
                                <td class="text-danger font-weight-bold" scope="row">{{ $sp->status }}</td>
                            @else
                                <td scope="row">{{ $sp->file }}</td>
                            @endif
                            @if ($sp->file === "-")
                                <td scope="row">{{ $sp->file }}</td>
                            @else
                                <td scope="row"><a href="{{ route('admin.surat-pengantar.get',$sp->file) }}">{{ Str::limit($sp->file, 50) }}</a></td>
                            @endif

                            <td scope="row">
                                <abbr title="Lihat Detail"><a href="" data-bs-toggle="modal" data-bs-target="#modalTampilData{{ $sp->id }}" class="text-primary"><i class="fas fa-sm fa-info"></i></a></abbr> |
                                <abbr title="Hapus data"><a href="" data-bs-toggle="modal" data-bs-target="#modalHapusData{{ $sp->id }}" class="text-danger"><i class="fas fa-sm fa-trash-alt"></i></a></abbr>
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

{{-- modal tampil data --}}
@foreach ($surat_pengantar as $sp)

<div class="modal fade" id="modalTampilData{{ $sp->id }}" tabindex="-1" aria-labelledby="modalTampilDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTampilDataLabel">Detail Data Surat Pengantar</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.surat-pengantar.update', $sp->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="id" class="col-form-label">ID:</label>
                        <input type="text" class="form-control" id="id" name="id" value="{{ $sp->id }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="col-form-label">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $sp->mahasiswa->nama }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="col-form-label">Tanggal:</label>
                        <input type="text" class="form-control" id="tanggal" name="tanggal" value="{{ $sp->tanggal }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="nim" class="col-form-label">NIM:</label>
                        <input type="text" class="form-control" id="nim" name="nim" value="{{ $sp->mahasiswa->nim }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="program_studi" class="col-form-label">Program Studi:</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $sp->mahasiswa->kelas->prodi->nama_prodi }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="tujuan_surat" class="col-form-label">Tujuan Surat:</label>
                        <input type="text" class="form-control" id="tujuan_surat" name="tujuan_surat" value="{{ $sp->tujuan_surat }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="nama_instansi" class="col-form-label">Nama Instansi:</label>
                        <input type="text" class="form-control" id="nama_instansi" name="nama_instansi" value="{{ $sp->nama_instansi }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="alamat_instansi" class="col-form-label">Alamat Instansi:</label>
                        <textarea class="form-control" id="alamat_instansi" name="alamat_instansi" disabled>{{ $sp->alamat_instansi }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="kota_instansi" class="col-form-label">Kota Instansi:</label>
                        <input type="text" class="form-control" id="kota_instansi" name="kota_instansi" value="{{ $sp->kota_instansi }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="kontak_instansi" class="col-form-label">Kontak Instansi:</label>
                        <input type="text" class="form-control" id="kontak_instansi" name="kontak_instansi" value="{{ $sp->kontak_instansi }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="bidang_minat" class="col-form-label">Bidang Minat:</label>
                        <input type="text" class="form-control" id="bidang_minat" name="bidang_minat" value="{{ $sp->bidang_minat }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="created_at" class="col-form-label">Waktu Dibuat:</label>
                        <input type="text" class="form-control" id="created_at" name="created_at" value="{{ $sp->created_at }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="updated_at" class="col-form-label">Waktu Diperbarui:</label>
                        <input type="text" class="form-control" id="updated_at" name="updated_at" value="{{ $sp->updated_at }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="col-form-label">Status:</label>
                        @if ($sp->status === "Diterima")
                            <input type="text" class="text-success font-weight-bold form-control" value="{{ $sp->status }}" disabled>
                        @else
                            <input type="text" class="text-danger font-weight-bold form-control" value="{{ $sp->status }}" disabled>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">File Surat Pengantar:</label><br>
                        <textarea class="form-control" disabled>{{ $sp->file }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="col-form-label">Ubah Status:</label>
                        <select class="form-control" name="status" id="status" required>
                            <option value="" selected disabled>--- Pilih ---</option>
                            <option class="text-success font-weight-bold" value="Diterima">Diterima</option>
                            <option class="text-danger font-weight-bold" value="Ditolak">Ditolak</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="file" class="col-form-label">Ubah File Surat Pengantar:</label>
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
@foreach ($surat_pengantar as $sp)
<div class="modal fade" id="modalHapusData{{ $sp->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data Surat Pengantar</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <h6>Anda yakin ingin menghapus data surat pengantar ini?</h6>
                <ul>
                    <li>ID : {{ $sp->id }}</li>
                    <li>Nama : {{ $sp->mahasiswa->nama }}</li>
                    <li>Program Studi : {{ $sp->mahasiswa->kelas->prodi->nama_prodi }}</li>
                    <li>Tujuan Instansi : {{ $sp->nama_instansi }}</li>
                    <li>Bidang Minat : {{ $sp->bidang_minat }}</li>
                </ul>
            </div>
            <div class="modal-footer">
                <form action="{{ route('admin.surat-pengantar.destroy', $sp->id ) }}" method="GET">
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