@extends('layouts/main')
@section('title','Penilaian Mahasiswa')

@section('main-content')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-success">Penilaian Mahasiswa</h6>
            </div>
            <div class="card-body">
                <table class="table table-striped table-responsive-xl table-bordered display nowrap" id="dataTableTanpaScroll">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Unit Kerja</th>
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
                            <td scope="row">{{ $kp->unit_kerja }}</td>
                            <td scope="row">{{ Str::limit($kp->program_kegiatan, 50) }}</td>
                            <td scope="row"><a href="{{ route('pembimbing-akademik.penilaian-mahasiswa.show', $kp->mahasiswa->id) }}">Lihat Nilai</a></td>
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