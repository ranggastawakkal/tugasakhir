@extends('layouts/main')
@section('title','Daftar Pengajuan SP')

@section('main-content')
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Daftar Pengajuan Surat Pengantar</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered display nowrap" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>Tanggal</th>
                            <th>Tujuan Surat</th>
                            <th>Perusahaan</th>
                            <th>Kota</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($suratPengantar as $surat)
                        <tr>
                            <td>{{ $surat->tanggal }}</td>
                            <td>{{ $surat->tujuan_surat }}</td>
                            <td>{{ $surat->nama_instansi }}</td>
                            <td>{{ $surat->kota_instansi }}</td>
                            @if ($surat->status === "Diterima")
                                <td class="text-success font-weight-bold" scope="row">{{ $surat->status }}</td>
                            @elseif($surat->status === "Ditolak")
                                <td class="text-danger font-weight-bold" scope="row">{{ $surat->status }}</td>
                            @else
                                <td scope="row">{{ $surat->status }}</td>
                            @endif
                            @if ($surat->file === "-")
                                <td scope="row">{{ $surat->file }}</td>
                            @else
                                <td class="text-center"><a href="{{ route('mahasiswa.daftar-pengajuan.get',$surat->file) }}" class="btn btn-sm btn-success"><i class="fas fa-sm fa-download"></i> Unduh</a></td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection