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

    {{-- Nilai Pemb lap --}}
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-success">Form Penilaian Mahasiswa (Pembimbing Lapangan)</h6>
            </div>
            <div class="card-body">
                @if ($nilai_pemb_lap->count() < 1)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <p>Nilai Mahasiswa belum diinputkan</p>
                </div>
                @else
                <table class="table table-striped table-responsive-xl table-bordered display" id="dataTableTanpaScroll">
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
                        @foreach ($nilai_pemb_lap as $nilai)
                        <tr>
                            <td scope="row" class="text-center">{{ $i }}</td>
                            <td scope="row">{{ $nilai->bobotPembLap->indikatorPenilaian->deskripsi }}</td>
                            <td scope="row">{{ $nilai->bobotPembLap->bobot }}%</td>
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
                            <th colspan="4">Nilai Pembimbing Lapangan</th>
                            <th>{{ $total_nilai_pemb_lap }}</th>
                        </tr>
                    </tfoot>
                </table>
                @endif
            </div>
        </div>
    </div>
    {{-- End of Nilai Pemb lap --}}

    {{-- Nilai pemb akd --}}
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-success">Form Penilaian Mahasiswa (Pembimbing Akademik)</h6>
            </div>
            <div class="card-body">
                @if ($nilai_pemb_akd->count() < 1)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <p>Nilai Mahasiswa belum diinputkan</p>
                </div>
                @else
                <table class="table table-striped table-responsive-xl table-bordered display" id="dataTableTanpaScroll2">
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
                            <td scope="row">{{ $nilai->bobotPembAkd->indikatorPenilaian->deskripsi }}</td>
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
    {{-- End of Nilai pemb akd --}}

</div>

@endsection