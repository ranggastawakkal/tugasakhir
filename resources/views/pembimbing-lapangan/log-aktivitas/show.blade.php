@extends('layouts/main')
@section('title','Detail Log Aktivitas')

@section('main-content')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-success">Mahasiswa</h6>
            </div>
            <div class="card-body">
                <table class="table table-borderless table-responsive">
                    @foreach ($kerja_praktek as $kp)
                    <tr>
                        <th>Nama</th>
                        <td>:</td>
                        <td>{{ $kp->mahasiswa->nama }}</td>
                    </tr>
                    <tr>
                        <th>Perusahaan</th>
                        <td>:</td>
                        <td>{{ $kp->pembimbingLapangan->nama_perusahaan }}</td>
                    </tr>
                    <tr>
                        <th>Unit Kerja</th>
                        <td>:</td>
                        <td>{{ $kp->unit_kerja }}</td>
                    </tr>
                    <tr>
                        <th>Waktu Kerja</th>
                        <td>:</td>
                        <td>{{ $kp->tanggal_mulai }} - {{ $kp->tanggal_berakhir }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-success">Log Aktivitas Mahasiswa</h6>
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
                            <th scope="col">Tanggal</th>
                            <th scope="col">Jam Datang</th>
                            <th scope="col">Jam Pulang</th>
                            <th scope="col">Aktivitas</th>
                            <th scope="col">Evaluasi</th>
                            <th scope="col">Evaluasi</th>
                            <th scope="col">Dibuat</th>
                            <th scope="col">Diperbarui</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($log_aktivitas as $log)
                        <tr>
                            <td scope="row" class="text-center">{{ $i }}</td>
                            <td scope="row"><a href="" data-bs-toggle="modal" data-bs-target="#modalTampilData{{ $log->id }}">{{ $log->tanggal }}</a></td>
                            <td scope="row">{{ $log->jam_datang }}</td>
                            <td scope="row">{{ $log->jam_pulang }}</td>
                            <td scope="row">{{ Str::limit($log->aktivitas, 50) }}</td>
                            @if ($log->evaluasi === '-' || $log->evaluasi === '')
                                <td class="text-danger font-weight-bold" scope="row">Belum Dievaluasi</td>
                            @else
                                <td class="text-success font-weight-bold" scope="row">Sudah Dievaluasi</td>
                            @endif
                            <td scope="row">{{ Str::limit($log->evaluasi, 50) }}</td>
                            <td scope="row">{{ $log->created_at }}</td>
                            <td scope="row">{{ $log->updated_at }}</td>
                            @if ($log->evaluasi === '-' || $log->evaluasi === '')
                                <td scope="row" class="text-center"><a class="btn btn-danger btn-sm" href="" data-bs-toggle="modal" data-bs-target="#modalEditData{{ $log->id }}" class="text-warning"><i class="fas fa-sm fa-edit"></i> Beri Evaluasi</a></td>
                            @else
                                <td scope="row" class="text-center">
                                    <a class="btn btn-success btn-sm" href="" data-bs-toggle="modal" data-bs-target="#modalTampilData{{ $log->id }}"><i class="fas fa-sm fa-info"></i> Detail</a>
                                    <a class="btn btn-warning btn-sm" href="" data-bs-toggle="modal" data-bs-target="#modalEditData{{ $log->id }}"><i class="fas fa-sm fa-edit"></i> Edit</a>
                                </td>
                            @endif
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
@foreach ($log_aktivitas as $log)

<div class="modal fade" id="modalTampilData{{ $log->id }}" tabindex="-1" aria-labelledby="modalTampilDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTampilDataLabel">Detail Log Aktivitas</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="">
                    @csrf
                    <div class="mb-3">
                        <label for="id" class="col-form-label font-weight-bold">Tanggal:</label>
                        <input type="text" class="form-control" id="id" name="id" value="{{ $log->tanggal }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="col-form-label font-weight-bold">Jam Datang:</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $log->jam_datang }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="id_prodi" class="col-form-label font-weight-bold">Jam Pulang:</label>
                        <input type="text" class="form-control" id="id_prodi" name="id_prodi" value="{{ $log->jam_pulang }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="id_prodi" class="col-form-label font-weight-bold">Aktivitas:</label>
                        <textarea name="" id="" class="form-control" disabled>{{ $log->aktivitas }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="id_prodi" class="col-form-label font-weight-bold">Evaluasi Pembimbing Lapangan:</label>
                        <textarea name="" id="" class="form-control" disabled>{{ $log->evaluasi }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="created_at" class="col-form-label font-weight-bold">Waktu Dibuat:</label>
                        <input type="text" class="form-control" id="created_at" name="created_at" value="{{ $log->created_at }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="updated_at" class="col-form-label font-weight-bold">Waktu Diperbarui:</label>
                        <input type="text" class="form-control" id="updated_at" name="updated_at" value="{{ $log->updated_at }}" disabled>
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
@foreach ($log_aktivitas as $log)

<div class="modal fade" id="modalEditData{{ $log->id }}" tabindex="-1" aria-labelledby="modalEditDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditDataLabel">Edit Log Aktivitas</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('pembimbing-lapangan.log-aktivitas.update', $log->id) }}">
                    @csrf
                    <div class="mb-3">
                        <label for="id" class="col-form-label font-weight-bold">Tanggal:</label>
                        <input type="text" class="form-control" id="id" name="id" value="{{ $log->tanggal }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="col-form-label font-weight-bold">Jam Datang:</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $log->jam_datang }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="id_prodi" class="col-form-label font-weight-bold">Jam Pulang:</label>
                        <input type="text" class="form-control" id="id_prodi" name="id_prodi" value="{{ $log->jam_pulang }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="id_prodi" class="col-form-label font-weight-bold">Aktivitas:</label>
                        <textarea name="" id="" class="form-control" disabled>{{ $log->aktivitas }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="evaluasi" class="col-form-label font-weight-bold">Evaluasi Pembimbing Lapangan:</label>
                        <textarea name="evaluasi" id="evaluasi" class="form-control" required>{{ $log->evaluasi }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="created_at" class="col-form-label font-weight-bold">Waktu Dibuat:</label>
                        <input type="text" class="form-control" id="created_at" name="created_at" value="{{ $log->created_at }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="updated_at" class="col-form-label font-weight-bold">Waktu Diperbarui:</label>
                        <input type="text" class="form-control" id="updated_at" name="updated_at" value="{{ $log->updated_at }}" disabled>
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
@endsection