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
                <table class="table table-striped table-bordered table-responsive-xl display nowrap" id="dataTableTanpaScroll">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">File Laporan KP</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($laporan_kp as $laporan)
                        <tr>
                            <td scope="row" class="text-center">{{ $i }}</td>
                            <td scope="row">{{ $laporan->nim }}</td>
                            <td scope="row">{{ $laporan->nama }}</td>
                            <td scope="row">{{ $laporan->nama_kelas }}</td>
                            @if ($laporan->laporan === "-")
                                <td scope="row">{{ Str::limit($laporan->laporan, 50) }}</td>
                            @else
                                <td scope="row"><a href="{{ route('pembimbing-lapangan.laporan-kp.get',$laporan->laporan) }}">{{ Str::limit($laporan->laporan, 50) }}</a></td>
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