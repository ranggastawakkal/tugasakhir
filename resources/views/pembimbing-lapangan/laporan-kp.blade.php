@extends('layouts/main')
@section('title','Laporan KP')

@section('main-content')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-success">Laporan KP Mahasiswa</h6>
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
                <table class="table table-striped table-bordered table-responsive-xl display" id="dataTableTanpaScroll">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Unit Kerja</th>
                            <th scope="col">Program Kegiatan</th>
                            <th scope="col">File Laporan KP</th>
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
                            <td scope="row">{{ $kp->unit_kerja }}</td>
                            <td scope="row">{{ $kp->program_kegiatan }}</td>
                            @if (!isset($kp->mahasiswa->dokumenMahasiswa->laporan) || $kp->mahasiswa->dokumenMahasiswa->laporan === "-" || $kp->mahasiswa->dokumenMahasiswa->laporan === "")
                                <td scope="row" class="text-center"><a class="btn btn-danger disabled btn-sm" href="">Belum Diunggah</a></td>
                            @else
                                <td scope="row" class="text-center"><a class="btn btn-success btn-sm" href="{{ route('pembimbing-lapangan.laporan-kp.get',$kp->mahasiswa->dokumenMahasiswa->laporan) }}"><i class="fas fa-sm fa-download"></i> Unduh</a></td>
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
@endsection