@extends('layouts/main')
@section('title','Kerja Praktek')

@section('main-content')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-success">Data Kerja Praktek Mahasiswa</h6>
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
                <table class="table table-striped table-bordered display nowrap" id="dataTableAdmin">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">ID</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Peminatan</th>
                            <th scope="col">Pembimbing Akademik</th>
                            <th scope="col">Pembimbing Lapangan</th>
                            <th scope="col">Perusahaan</th>
                            <th scope="col">Tanggal Mulai</th>
                            <th scope="col">Tanggal Berakhir</th>
                            <th scope="col">Dibuat</th>
                            <th scope="col">Diperbarui</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($kerja_praktek as $kp)
                        <tr>
                            <td scope="row" class="text-center">{{ $i }}</td>
                            <td scope="row">{{ $kp->id }}</td>
                            <td scope="row">{{ $kp->mahasiswa->nim }}</td>
                            <td scope="row">{{ $kp->mahasiswa->nama }}</td>
                            <td scope="row">{{ $kp->mahasiswa->kelas->nama_kelas }}</td>
                            <td scope="row">{{ $kp->mahasiswa->peminatan->nama }}</td>
                            @if ($kp->id_pemb_akd != null)
                                <td scope="row">{{ $kp->pembimbingAkademik->nama }}</td>
                            @else
                                <td scope="row">-</td>
                            @endif
                            @if ($kp->id_pemb_lap != null)
                                <td scope="row">{{ $kp->pembimbingLapangan->nama }}</td>
                                <td scope="row">{{ $kp->pembimbingLapangan->nama_perusahaan }}</td>
                            @else
                                <td scope="row">-</td>
                                <td scope="row">-</td>
                            @endif
                            <td scope="row">{{ $kp->tanggal_mulai }}</td>
                            <td scope="row">{{ $kp->tanggal_berakhir }}</td>
                            <td scope="row">{{ $kp->created_at }}</td>
                            <td scope="row">{{ $kp->updated_at }}</td>
                            <td scope="row"><a href="{{ route('kerja-praktek.show', $kp->id) }}">Lihat Detail</a></td>
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
{{-- <div class="modal fade" id="modalTambahData" tabindex="-1" aria-labelledby="modalTambahDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahDataLabel">Tambah Data PLO</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('learning-outcomes.plo.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="kode_plo" class="col-form-label">Kode PLO:</label>
                        <input type="text" class="form-control" id="kode_plo" name="kode_plo" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="col-form-label">Deskripsi:</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="id_periode" class="col-form-label">Periode:</label>
                        <select class="form-control" name="id_periode" id="id_periode" required>
                            <option selected disabled>--- Pilih ---</option>
                            @foreach ($periodes as $periode)
                            <option value="{{ $periode->id }}">{{ $periode->semester }} | {{ $periode->tahun_ajaran }}</option>
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
</div> --}}

{{-- modal tampil data --}}
{{-- @foreach ($kerja_praktek as $kp)

<div class="modal fade" id="modalTampilData{{ $kp->id }}" tabindex="-1" aria-labelledby="modalTampilDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTampilDataLabel">Detail Data PLO</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="">
                    @csrf
                    <div class="mb-3">
                        <label for="id" class="col-form-label">ID:</label>
                        <input type="text" class="form-control" id="id" name="id" value="{{ $kp->id }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="col-form-label">Kode PLO:</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $kp->kode_plo }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="col-form-label">Deskripsi:</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $kp->deskripsi }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="id_prodi" class="col-form-label">Periode:</label>
                        <input type="text" class="form-control" id="id_prodi" name="id_prodi" value="{{ $kp->periode->semester }} | {{ $kp->periode->tahun_ajaran }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="id_prodi" class="col-form-label">Program Studi:</label>
                        <input type="text" class="form-control" id="id_prodi" name="id_prodi" value="{{ $kp->prodi->nama_prodi }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="created_at" class="col-form-label">Waktu Dibuat:</label>
                        <input type="text" class="form-control" id="created_at" name="created_at" value="{{ $kp->created_at }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="updated_at" class="col-form-label">Waktu Diperbarui:</label>
                        <input type="text" class="form-control" id="updated_at" name="updated_at" value="{{ $kp->updated_at }}" disabled>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">OK</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endforeach --}}

{{-- modal edit data --}}
{{-- @foreach ($kerja_praktek as $kp)

<div class="modal fade" id="modalEditData{{ $kp->id }}" tabindex="-1" aria-labelledby="modalEditDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditDataLabel">Edit Data PLO</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('learning-outcomes.plo.update', $kp->id) }}">
                    @csrf
                    <input hidden type="text" class="form-control" id="id" name="id" value="{{ $kp->id }}" required>
                    <div class="mb-3">
                        <label for="kode_plo" class="col-form-label">Kode PLO:</label>
                        <input type="text" class="form-control" id="kode_plo" name="kode_plo" value="{{ $kp->kode_plo }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="col-form-label">Deskripsi:</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" required>{{ $kp->deskripsi }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="id_periode" class="col-form-label">Periode:</label>
                        <select class="form-control" name="id_periode" id="id_periode" required>
                            <option disabled>--- Pilih ---</option>
                            <option value="{{ $kp->periode->id }}" selected hidden>{{ $kp->periode->semester }} | {{ $kp->periode->tahun_ajaran }}</option>
                            @foreach ($periodes as $periode)
                            <option value="{{ $periode->id }}">{{ $periode->semester }} | {{ $periode->tahun_ajaran }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="id_prodi" class="col-form-label">Program Studi:</label>
                        <select class="form-control" name="id_prodi" id="id_prodi" required>
                            <option disabled>--- Pilih ---</option>
                            <option value="{{ $kp->prodi->id }}" selected hidden>{{ $kp->prodi->nama_prodi }}</option>
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
@endforeach --}}

{{-- modal hapus data --}}
{{-- @foreach ($kerja_praktek as $kp)
<div class="modal fade" id="modalHapusData{{ $kp->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data PLO</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <h6>Anda yakin ingin menghapus data PLO ini?</h6>
                <ul>
                    <li>ID: {{ $kp->id }}</li>
                    <li>Kode PLO: {{ $kp->kode_plo }}</li>
                    <li>Periode: {{ $kp->periode->semester }} | {{ $kp->periode->tahun_ajaran }}</li>
                    <li>Program Studi: {{ $kp->prodi->nama_prodi }}</li>
                </ul>
            </div>
            <div class="modal-footer">
                <form action="{{ route('learning-outcomes.plo.destroy', $kp->id ) }}" method="GET">
                    @csrf
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach --}}

@endsection