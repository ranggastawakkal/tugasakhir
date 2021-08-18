@extends('layouts/main')
@section('title','Dokumen KP')

@section('main-content')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-success">Dokumen KP Mahasiswa</h6>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered display" id="dataTableTanpaScroll">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Surat Diterima</th>
                            <th scope="col">Laporan KP</th>
                            <th scope="col">Surat Selesai</th>
                            <th scope="col">KRS</th>
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
                            @if (!isset($kp->mahasiswa->dokumenMahasiswa->surat_diterima) || $kp->mahasiswa->dokumenMahasiswa->surat_diterima === "-" || $kp->mahasiswa->dokumenMahasiswa->surat_diterima === "")
                                <td scope="row" class="text-center"><a class="btn btn-danger disabled btn-sm" href="">Belum Diunggah</a></td>
                            @else
                                <td scope="row" class="text-center"><a class="btn btn-success btn-sm" href="{{ route('pembimbing-akademik.dokumen-mahasiswa.get',$kp->mahasiswa->dokumenMahasiswa->surat_diterima) }}"><i class="fas fa-sm fa-download"></i> Unduh</a></td>
                            @endif
                            @if (!isset($kp->mahasiswa->dokumenMahasiswa->laporan) || $kp->mahasiswa->dokumenMahasiswa->laporan === "-" || $kp->mahasiswa->dokumenMahasiswa->laporan === "")
                                <td scope="row" class="text-center"><a class="btn btn-danger disabled btn-sm" href="">Belum Diunggah</a></td>
                            @else
                                <td scope="row" class="text-center"><a class="btn btn-success btn-sm" href="{{ route('pembimbing-akademik.dokumen-mahasiswa.get',$kp->mahasiswa->dokumenMahasiswa->laporan) }}"><i class="fas fa-sm fa-download"></i> Unduh</a></td>
                            @endif
                            @if (!isset($kp->mahasiswa->dokumenMahasiswa->surat_selesai) || $kp->mahasiswa->dokumenMahasiswa->surat_selesai === "-" || $kp->mahasiswa->dokumenMahasiswa->surat_selesai === "")
                                <td scope="row" class="text-center"><a class="btn btn-danger disabled btn-sm" href="">Belum Diunggah</a></td>
                            @else
                                <td scope="row" class="text-center"><a class="btn btn-success btn-sm" href="{{ route('pembimbing-akademik.dokumen-mahasiswa.get',$kp->mahasiswa->dokumenMahasiswa->surat_selesai) }}"><i class="fas fa-sm fa-download"></i> Unduh</a></td>
                            @endif
                            @if (!isset($kp->mahasiswa->dokumenMahasiswa->krs) || $kp->mahasiswa->dokumenMahasiswa->krs === "-" || $kp->mahasiswa->dokumenMahasiswa->krs === "")
                                <td scope="row" class="text-center"><a class="btn btn-danger disabled btn-sm" href="">Belum Diunggah</a></td>
                            @else
                                <td scope="row" class="text-center"><a class="btn btn-success btn-sm" href="{{ route('pembimbing-akademik.dokumen-mahasiswa.get',$kp->mahasiswa->dokumenMahasiswa->krs) }}"><i class="fas fa-sm fa-download"></i> Unduh</a></td>
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