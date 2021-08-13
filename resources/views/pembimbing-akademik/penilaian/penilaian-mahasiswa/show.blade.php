@extends('layouts/main')
@section('title','Nilai Mahasiswa')

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
                <h6 class="m-0 font-weight-bold text-success">Nilai Mahasiswa</h6>
            </div>
            <div class="card-body">
                
                @if ($nilai_pemb_akd->count() < 1)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Nilai Mahasiswa belum diinputkan
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <button type="button" class="btn btn-success mb-3 mx-3" data-bs-toggle="modal" data-bs-target="#modalTambahData">
                    <i class="fas fa-plus"></i> Input Nilai Mahasiswa
                </button>
                @else
                <table class="table table-striped table-bordered display nowrap" id="dataTableAdmin">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Indikator Penilaian</th>
                            <th scope="col">Bobot</th>
                            <th scope="col">Nilai Angka</th>
                            <th scope="col">Bobot x Nilai Angka</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($nilai_pemb_akd as $nilai)
                        <tr>
                            <td scope="row" class="text-center">{{ $i }}</td>
                            <td scope="row">{{ $nilai->bobotPembAkd->subClo->deskripsi }}</td>
                            <td scope="row">{{ $nilai->bobotPembAkd->bobot }}%</td>
                            <td scope="row">{{ $nilai->nilai_angka }}</td>
                            <td scope="row">{{ $nilai->nilai }}</td>
                        </tr>
                        @php
                        $i++;
                        @endphp
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="4">Nilai Pembimbing Akademik</th>
                            <th>{{ $total_nilai_pemb_akd }}</th>
                        </tr>
                        <tr>
                            <th colspan="4">Nilai Pembimbing Lapangan</th>
                            <th>{{ $total_nilai_pemb_lap }}</th>
                        </tr>
                        <tr>
                            <th colspan="4">Nilai Total (Nilai Pembimbing Akademik + Nilai Pembimbing Lapangan)</th>
                            <th>{{ $total_nilai }}</th>
                        </tr>
                    </tfoot>
                </table>
                @endif
            </div>
        </div>
    </div>
</div>

{{-- modal tambah data --}}
<div class="modal fade" id="modalTambahData" tabindex="-1" aria-labelledby="modalTambahDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahDataLabel">Input Nilai Mahasiswa</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('pembimbing-lapangan.penilaian.penilaian-mahasiswa.store') }}">
                    @csrf
                    <table class="table table-striped table-responsive table-bordered display nowrap">
                        <thead class="text-center">
                            <tr>
                                <th>No.</th>
                                <th hidden>ID</th>
                                <th>Indikator Penilaian</th>
                                <th>Nilai Angka</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @foreach ($bobot_pemb as $indikator)
                            <tr>
                                <td class="text-center">{{ $i }}</td>
                                <td hidden>{{ $indikator->subClo->id }}</td>
                                <td>{{ $indikator->subClo->deskripsi }}</td>
                                <td><input type="number" class="form-control" id="{{ $indikator->subClo->deskripsi }}" name="nilai_angka" required></td>
                            </tr>
                            @php
                            $i++;
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
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
@endsection