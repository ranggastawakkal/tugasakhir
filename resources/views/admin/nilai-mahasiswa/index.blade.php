@extends('layouts/main')
@section('title','Nilai Mahasiswa')

@section('main-content')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-success">Nilai Mahasiswa</h6>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered display nowrap" id="dataTableAdmin">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Pembimbing Akademik</th>
                            <th scope="col">Lokasi KP</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama Mahasiswa</th>
                            <th scope="col">Program Studi</th>
                            @foreach($bobot_pemb_akd as $akd)
                                <th scope="col">{{ $loop->iteration }}. {{ $akd->indikatorPenilaian->deskripsi }}</th>
                            @endforeach
                            <th scope="col">Nilai Pembimbing Akademik</th>
                            @foreach($bobot_pemb_lap as $lap)
                                <th scope="col">{{ $loop->iteration }}. {{ $lap->indikatorPenilaian->deskripsi }}</th>
                            @endforeach
                            <th scope="col">Nilai Pembimbing Lapangan</th>
                            <th scope="col">Total Nilai</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $bobot_pemb_akd_length = $bobot_pemb_akd->count();
                        $bobot_pemb_lap_length = $bobot_pemb_lap->count();
                        @endphp
                        @foreach ($mahasiswas as $mhs)
                        <tr>
                            <td scope="row" class="text-center">{{ $loop->iteration }}</td>
                            <td scope="row">{{ $mhs->kerjaPraktek->pembimbingAkademik->nama }}</td>
                            <td scope="row">{{ $mhs->kerjaPraktek->pembimbingLapangan->nama_perusahaan }}</td>
                            <td scope="row">{{ $mhs->nim }}</td>
                            <td scope="row">{{ $mhs->nama }}</td>
                            <td scope="row">{{ $mhs->kelas->prodi->nama_prodi }}</td>

                            @if($mhs->nilaiPembAkd->count() !== 0)
                                @foreach($mhs->nilaiPembAkd as $nilai)
                                    <td scope="row" class="text-center">{{ $nilai->nilai_angka }}</td>
                                @endforeach
                                <td scope="row" class="text-center font-weight-bold">{{ $total_nilai_pemb_akd }}</td>
                            @else
                                @for($i = 0; $i < $bobot_pemb_akd_length; $i++)
                                    <td scope="row" class="text-center bg-danger text-white">0</td>
                                @endfor
                                <td scope="row" class="text-center bg-danger text-white">0</td>
                            @endif
                            @if($mhs->nilaiPembLap->count() !== 0)
                                @foreach($mhs->nilaiPembLap as $nilai)
                                    <td scope="row" class="text-center">{{ $nilai->nilai_angka }}</td>
                                @endforeach
                                <td scope="row" class="text-center font-weight-bold">{{ $total_nilai_pemb_lap }}</td>
                            @else
                                @for($i = 0; $i < $bobot_pemb_lap_length; $i++)
                                    <td scope="row" class="text-center bg-danger text-white">0</td>
                                @endfor
                                <td scope="row" class="text-center bg-danger text-white">0</td>
                            @endif
                            @if($mhs->nilaiPembLap->count() !== 0)
                                <td scope="row" class="text-center font-weight-bold">{{ $total_nilai }}</td>
                            @else
                                <td scope="row" class="text-center bg-danger text-white">0</td>
                            @endif
                            <td scope="row"><a href="{{ route('admin.nilai-mahasiswa.show', $mhs->id) }}">Lihat Nilai</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- <div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-success">Nilai Mahasiswa</h6>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered display nowrap" id="dataTableAdmin">
                    <thead class="text-center">
                        <tr>
                            <th scope="col" rowspan="2">No.</th>
                            <th scope="col" rowspan="2">NIM</th>
                            <th scope="col" rowspan="2">Nama</th>
                            <th colspan="{{ $bobot_pemb_akd->count() }}">Nilai Pembimbing Akademik</th>
                            <th colspan="{{ $bobot_pemb_lap->count() }}">Nilai Pembimbing Lapangan</th>
                            <th scope="col" rowspan="2">Aksi</th>
                        </tr>
                        <tr>
                            @foreach ($bobot_pemb_akd as $bobot)
                                <th scope="col">{{ $loop->iteration }}. {{ $bobot->subClo->deskripsi }}</th>
                            @endforeach
                            @foreach ($bobot_pemb_lap as $bobot)
                                <th scope="col">{{ $loop->iteration }}. {{ $bobot->subClo->deskripsi }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>1202170029</td>
                            <td>Rangga</td>
                            @foreach ($nilai_pemb_akd as $nilai)
                                <td>{{ $nilai->nilai_angka }}</td>
                            @endforeach
                            @foreach ($nilai_pemb_lap as $nilai)
                                <td>{{ $nilai->nilai_angka }}</td>
                            @endforeach
                            <td>aksi</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> --}}