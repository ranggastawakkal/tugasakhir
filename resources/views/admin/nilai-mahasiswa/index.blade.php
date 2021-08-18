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
                <table class="table table-striped table-responsive-xl table-bordered display" id="dataTableTanpaScroll">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Peminatan</th>
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
                            <td scope="row">{{ Str::limit($kp->mahasiswa->peminatan->nama,50) }}</td>
                            <td scope="row"><a href="{{ route('admin.nilai-mahasiswa.show', $kp->mahasiswa->id) }}">Lihat Nilai</a></td>
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