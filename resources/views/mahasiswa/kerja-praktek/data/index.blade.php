@extends('layouts/main')
@section('title','Data Kerja Praktek')

@section('main-content')

@if(!isset($dataKerjaPraktek->tanggal_mulai))
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Tambah Data Kerja Praktek</h6>
        </div>
        <div class="card-body">
            <p class="mb-0 font-weight-bold">Data kerja praktek belum tersedia, silahkan tambahkan</p>
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
<!-- DataTales Example -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="{{ route('mahasiswa.kerja-praktek.data.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                class="fas fa-edit fa-sm text-white-50"></i> Ubah Data Kerja Praktek</a>
        
    </div>

<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Data Kerja Praktek</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderless" width="100%" cellspacing="0">
                    <tbody>
                        <tr>
                            <th style="width: 20%;">Nama Pembimbing Akademik</th>
                            <td>:</td>
                            <td style="width: 80%;">{{ $dataKerjaPraktek->pembimbingAkademik->nama }}</td>
                        </tr>
                        <tr>
                            <th>Nama Pembimbing Lapangan</th>
                            <td>:</td>
                            <td>{{ $dataKerjaPraktek->pembimbingLapangan->nama }}</td>
                        </tr>
                        <tr>
                            <th>Perusahaan</th>
                            <td>:</td>
                            <td>{{ $dataKerjaPraktek->pembimbingLapangan->nama_perusahaan }}</td>
                        </tr>
                        <tr>
                            <th>Unit Kerja / Divisi</th>
                            <td>:</td>
                            <td id="divisi">{{ $dataKerjaPraktek->unit_kerja }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Mulai</th>
                            <td>:</td>
                            <td id="tanggal_mulai">{{ $dataKerjaPraktek->tanggal_mulai }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Berakhir</th>
                            <td>:</td>
                            <td id="tanggal_berakhir">{{ $dataKerjaPraktek->tanggal_berakhir }}</td>
                        </tr>
                        <tr>
                            <th>Target</th>
                            <td>:</td>
                            <td id="target">{{ $dataKerjaPraktek->target }}</td>
                        </tr>
                        <tr>
                            <th>Program Kegiatan</th>
                            <td>:</td>
                            <td id="program_kegiatan">{{ $dataKerjaPraktek->program_kegiatan }}</td>
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
            <div class="modal-body">Data pembimbing akademik dan pembimbing lapangan belum tersedia.
                <br><br>
                Silahkan tambahkan data pembimbing akademik, dan pembimbing lapangan terlebih dahulu.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-script')
<script>
    $('data').ready(function() {
        $('#dataKerjaPraktek').hide();
    });

    $('#selectDataKerjaPraktek').change(function() {
        var dataSelected = $('#selectDataKerjaPraktek').find(":selected").attr('data-id');
        console.log(dataSelected);
        if (dataSelected != "") {
            $('#dataKerjaPraktek').show();
            var data = JSON.parse(dataSelected);
            $('#divisi').html(data.divisi);
            $('#tanggal_mulai').html(data.tanggal_mulai);
            $('#tanggal_berakhir').html(data.tanggal_berakhir);
            $('#target').html(data.target);
            $('#program_kegiatan').html(data.program_kegiatan);
        } else {
            $('#dataKerjaPraktek').hide();
        }
    });
</script>
@endsection