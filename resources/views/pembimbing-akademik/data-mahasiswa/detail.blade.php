@extends('layouts/main')
@section('title','Detail Mahasiswa')

@section('main-content')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-success">Data Mahasiswa</h6>
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
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Peminatan</th>
                            <th scope="col">Email</th>
                            <th scope="col">No. Telepon</th>
                            <th scope="col">Pembimbing Lapangan</th>
                            <th scope="col">Perusahaan</th>
                            <th scope="col">Unit Kerja</th>
                            <th scope="col">Tanggal Mulai</th>
                            <th scope="col">Tanggal Berakhir</th>
                            <th scope="col">Target</th>
                            <th scope="col">Program Kegiatan</th>
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
                            <td scope="row">{{ $kp->mahasiswa->nim }}</td>
                            <td scope="row">{{ $kp->mahasiswa->nama }}</td>
                            <td scope="row">{{ $kp->mahasiswa->kelas->nama_kelas }}</td>
                            <td scope="row">{{ $kp->mahasiswa->peminatan->nama }}</td>
                            <td scope="row">{{ $kp->mahasiswa->email }}</td>
                            <td scope="row">{{ $kp->mahasiswa->no_telepon }}</td>
                            <td scope="row">{{ $kp->pembimbingLapangan->nama }}</td>
                            <td scope="row">{{ $kp->pembimbingLapangan->nama_perusahaan }}</td>
                            <td scope="row">{{ $kp->unit_kerja }}</td>
                            <td scope="row">{{ $kp->tanggal_mulai }}</td>
                            <td scope="row">{{ $kp->tanggal_berakhir }}</td>
                            <td scope="row">{{ $kp->target }}</td>
                            <td scope="row">{{ $kp->program_kegiatan }}</td>
                            <td scope="row"><a href="" data-bs-toggle="modal" data-bs-target="#modalTampilData{{ $kp->id }}">Detail</a></td>
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
@endsection