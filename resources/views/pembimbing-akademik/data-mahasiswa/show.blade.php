@extends('layouts/main')
@section('title','Detail Mahasiswa')

@section('main-content')
<div class="row">
    <div class="col-xl-6 col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-success">Data Mahasiswa</h6>
            </div>
            <div class="card-body">
                <table class="table table-borderless table-responsive">
                        <tr>
                            <th>NIM</th>
                            <td>:</td>
                            <td>{{ $kerja_praktek->mahasiswa->nim }}</td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td>:</td>
                            <td>{{ $kerja_praktek->mahasiswa->nama }}</td>
                        </tr>
                        <tr>
                            <th>Program Studi</th>
                            <td>:</td>
                            <td>{{ $kerja_praktek->mahasiswa->kelas->prodi->nama_prodi }}</td>
                        </tr>
                        <tr>
                            <th>Kelas</th>
                            <td>:</td>
                            <td>{{ $kerja_praktek->mahasiswa->kelas->nama_kelas }}</td>
                        </tr>
                        <tr>
                            <th>Peminatan</th>
                            <td>:</td>
                            <td>{{ $kerja_praktek->mahasiswa->peminatan->nama }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>:</td>
                            <td>{{ $kerja_praktek->mahasiswa->email }}</td>
                        </tr>
                        <tr>
                            <th>No. Telepon</th>
                            <td>:</td>
                            <td>{{ $kerja_praktek->mahasiswa->no_telepon }}</td>
                        </tr>
                </table>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-success">Data Pembimbing Lapangan</h6>
            </div>
            <div class="card-body">
                <table class="table table-borderless table-responsive">
                    <tr>
                        <th>NIP</th>
                        <td>:</td>
                        <td>{{ $kerja_praktek->pembimbingLapangan->nip }}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>:</td>
                        <td>{{ $kerja_praktek->pembimbingLapangan->nama }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>:</td>
                        <td>{{ $kerja_praktek->pembimbingLapangan->email }}</td>
                    </tr>
                    <tr>
                        <th>No. Telepon</th>
                        <td>:</td>
                        <td>{{ $kerja_praktek->pembimbingLapangan->no_telepon }}</td>
                    </tr>
                    <tr>
                        <th>Jabatan</th>
                        <td>:</td>
                        <td>{{ $kerja_praktek->pembimbingLapangan->jabatan }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    {{-- data Kerja Praktek --}}
    <div class="col-xl-6 col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-success">Data Kerja Praktek</h6>
            </div>
            <div class="card-body">
                <table class="table table-borderless table-responsive">
                    <tr>
                        <th>Perusahaan</th>
                        <td>:</td>
                        <td>{{ $kerja_praktek->pembimbingLapangan->nama_perusahaan }}</td>
                    </tr>
                    <tr>
                        <th>Alamat Perusahaan</th>
                        <td>:</td>
                        <td>{{ $kerja_praktek->pembimbingLapangan->alamat_perusahaan }}</td>
                    </tr>
                    <tr>
                        <th>Kota Perusahaan</th>
                        <td>:</td>
                        <td>{{ $kerja_praktek->pembimbingLapangan->kota_perusahaan }}</td>
                    </tr>
                    <tr>
                        <th>Email Perusahaan</th>
                        <td>:</td>
                        <td>{{ $kerja_praktek->pembimbingLapangan->email_perusahaan }}</td>
                    </tr>
                    <tr>
                        <th>No. Telepon Perusahaan</th>
                        <td>:</td>
                        <td>{{ $kerja_praktek->pembimbingLapangan->no_telepon_perusahaan }}</td>
                    </tr>
                    <tr>
                        <th>Unit Kerja</th>
                        <td>:</td>
                        <td>{{ $kerja_praktek->unit_kerja }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Mulai</th>
                        <td>:</td>
                        <td>{{ $kerja_praktek->tanggal_mulai }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Berakhir</th>
                        <td>:</td>
                        <td>{{ $kerja_praktek->tanggal_berakhir }}</td>
                    </tr>
                    <tr>
                        <th>Target</th>
                        <td>:</td>
                        <td>{{ $kerja_praktek->target }}</td>
                    </tr>
                    <tr>
                        <th>Program Kegiatan</th>
                        <td>:</td>
                        <td>{{ $kerja_praktek->program_kegiatan }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection