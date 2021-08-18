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
                        <th>Nama Mahasiswa:</th>
                        <td>:</td>
                        <td>{{ $kp->mahasiswa->nama }}</td>
                    </tr>
                    <tr>
                        <th>Perusahaan</th>
                        <td>:</td>
                        @if ($kp->id_pemb_lap != null)
                            <td>{{ $kp->pembimbingLapangan->nama_perusahaan }}</td>
                        @else
                            <td>-</td>
                        @endif
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
                <table class="table table-striped table-bordered display nowrap" id="dataTableAdmin">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Jam Datang</th>
                            <th scope="col">Jam Pulang</th>
                            <th scope="col">Aktivitas</th>
                            <th scope="col">Status</th>
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
                            <td scope="row"><a href="" data-bs-toggle="modal" data-bs-target="#modalTampilData{{ $log->id }}">Lihat Detail</a></td>
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
                        <label for="id" class="col-form-label">Tanggal:</label>
                        <input type="text" class="form-control" id="id" name="id" value="{{ $log->tanggal }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="col-form-label">Jam Datang:</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $log->jam_datang }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="id_prodi" class="col-form-label">Jam Pulang:</label>
                        <input type="text" class="form-control" id="id_prodi" name="id_prodi" value="{{ $log->jam_pulang }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="id_prodi" class="col-form-label">Aktivitas:</label>
                        <textarea name="" id="" class="form-control" disabled>{{ $log->aktivitas }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="id_prodi" class="col-form-label">Evaluasi Pembimbing Lapangan:</label>
                        <textarea name="" id="" class="form-control" disabled>{{ $log->evaluasi }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="created_at" class="col-form-label">Waktu Dibuat:</label>
                        <input type="text" class="form-control" id="created_at" name="created_at" value="{{ $log->created_at }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="updated_at" class="col-form-label">Waktu Diperbarui:</label>
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
@endsection