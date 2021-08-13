@extends('layouts/main')
@section('title','Dashboard')

@section('main-content')

    <!-- DataTales Example -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Kerja Praktek</h1>
        
    </div>

@if(!isset($dataKerjaPraktek->tanggal_mulai))
    <div class="card shadow mb-4">
        <div class="card-header py-2">
      
        </div>
        <div class="card-body">
            <p class="mb-0">Data kerja praktek belum tersedia, silahkan tambahkan</p>
            @if(isset($dataKerjaPraktek->pembimbingAkademik) && isset($dataKerjaPraktek->pembimbingLapangan))
            <a href="{{ route('mahasiswa.kerja-praktek.data.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm mt-2"><i
                class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
            @else
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm mt-2" data-toggle="modal" data-target="#modalAlert"><i
                class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
            @endif
        </div>
    </div>
@else
<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Contact Information</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderless" width="100%" cellspacing="0">
                    <tbody>
                        <tr>
                            <td style="width: 20%;">Nama Pembimbing Akademik</td>
                            <td style="width: 80%;">{{ $dataKerjaPraktek->pembimbingAkademik->nama }}</td>
                        </tr>
                        <tr>
                            <td>Nama Pembimbing Lapangan</td>
                            <td>{{ $dataKerjaPraktek->pembimbingLapangan->nama }}</td>
                        </tr>
                        <tr>
                            <td>Perusahaan</td>
                            <td>{{ $dataKerjaPraktek->pembimbingLapangan->nama_perusahaan }}</td>
                        </tr>
                        <tr>
                            <td>Unit Kerja / Divisi</td>
                            <td>{{ $dataKerjaPraktek->unit_kerja }}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Mulai</td>
                            <td>{{ $dataKerjaPraktek->tanggal_mulai }}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Berakhir</td>
                            <td>{{ $dataKerjaPraktek->tanggal_berakhir }}</td>
                        </tr>
                        <tr>
                            <td>Target</td>
                            <td>{{ $dataKerjaPraktek->target }}</td>
                        </tr>
                        <tr>
                            <td>Program Kegiatan</td>
                            <td>{{ $dataKerjaPraktek->program_kegiatan }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif

    <div class="modal fade" id="modalAlert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data belum tersedia</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Data pembimbing akademik dan pembimbing lapangan belum tersedia</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection