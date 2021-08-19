@extends('layouts/main')
@section('title','Dashboard')

@section('main-content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Biodata Pembimbing Lapangan</h1>
        @if(isset($dataKerjaPraktek->id_pemb_lap))
        <a href="{{ route ('mahasiswa.pembimbing.lapangan.edit') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                class="fas fa-edit fa-sm text-white-50"></i> Ganti Pembimbing</a>
        @endif
    </div>

@if(!isset($dataKerjaPraktek->id_pemb_lap))
<div class="card shadow mb-4">
        <div class="card-header py-2">
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('mahasiswa.pembimbing.lapangan.store') }}">
                @csrf
                <div class="form-group">
                    <label for="selectLapangan">Pilih Pembimbing Lapangan</label>
                    <select class="form-control @error('selectLapangan') is-invalid @enderror" id="selectLapangan" name="selectLapangan">
                        <option value="" data-id="">- Pilih Pembimbing Lapangan-</option>
                        @foreach($lapangan as $data)
                        <option value="{{ $data->id }}" data-id="{{ $data }}">{{ $data->nama }}</option>
                        @endforeach
                    </select>
                    
                    @error('selectLapangan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="table-responsive" style="display: none;" id="dataPembimbingLapangan">
                <table class="table table-borderless" width="100%" cellspacing="0">
                    <tbody>
                        <tr>
                            <td style="width: 20%;">Nama Pembimbing</td>
                            <td style="width: 80%;" id="nama_pembimbing">P</td>
                        </tr>
                        <tr>
                            <td>NIP</td>
                            <td id="nip"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td id="email"></td>
                        </tr>
                        <tr>
                            <td>Nomor Telepon</td>
                            <td id="no_telepon"></td>
                        </tr>
                        <tr>
                            <td>Jabatan</td>
                            <td id="jabatan"></td>
                        </tr>
                        <tr>
                            <td>Nama Perusahaan</td>
                            <td id="nama_perusahaan"></td>
                        </tr>
                        <tr>
                            <td>Alamat Perusahaan</td>
                            <td id="alamat_perusahaan"></td>
                        </tr>
                        <tr>
                            <td>Kota Perusahaan</td>
                            <td id="kota_perusahaan"></td>
                        </tr>
                        <tr>
                            <td>Email Perusahaan</td>
                            <td id="email_perusahaan"></td>
                        </tr>
                        <tr>
                            <td>Nomor Telepon Perusahaan</td>
                            <td id="no_telepon_perusahaan"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
                <button id="btnSave" type="submit" class="btn btn-success shadow-sm mt-2"> Save</button>
            </form>
        </div>
    </div>    

    <div class="card shadow mb-4">
        <div class="card-header py-2">
      
        </div>
        <div class="card-body">
            <p class="mb-0">Apabila pembimbing lapangan belum tersedia, silahkan tambahkan</p>
            <a href="{{ route('mahasiswa.pembimbing.lapangan.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm mt-2"><i
                class="fas fa-plus fa-sm text-white-50"></i> Tambah Biodata</a>
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
                            <td style="width: 20%;">Nama Pembimbing</td>
                            <td style="width: 80%;">{{ $dataKerjaPraktek->pembimbingLapangan->nama }}</td>
                        </tr>
                        <tr>
                            <td>NIP</td>
                            <td>{{ $dataKerjaPraktek->pembimbingLapangan->nip }}</td>
                        </tr>
                        <tr>
                            <td>Jabatan</td>
                            <td>{{ $dataKerjaPraktek->pembimbingLapangan->jabatan }}</td>
                        </tr>
                        <tr>
                            <td>No Telp</td>
                            <td>{{ $dataKerjaPraktek->pembimbingLapangan->no_telepon }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $dataKerjaPraktek->pembimbingLapangan->email }}</td>
                        </tr>
                        <tr>
                            <td>Email Perusahaan</td>
                            <td>{{ $dataKerjaPraktek->pembimbingLapangan->email_perusahaan }}</td>
                        </tr>
                        <tr>
                            <td>Alamat Perusahaan</td>
                            <td>{{ $dataKerjaPraktek->pembimbingLapangan->alamat_perusahaan }}</td>
                        </tr>
                        <tr>
                            <td>Kota Perusahaan</td>
                            <td>{{ $dataKerjaPraktek->pembimbingLapangan->kota_perusahaan }}</td>
                        </tr>
                        <tr>
                            <td>Nama Perusahaan</td>
                            <td>{{ $dataKerjaPraktek->pembimbingLapangan->nama_perusahaan }}</td>
                        </tr>
                        <tr>
                            <td>Nomor Telepon Perusahaan</td>
                            <td>{{ $dataKerjaPraktek->pembimbingLapangan->no_telepon_perusahaan }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
@endsection

@section('page-script')
<script>
    $('document').ready(function() {
        $('#dataPembimbingLapangan').hide();
    });

    $('#selectLapangan').change(function() {
        var dataSelected = $('#selectLapangan').find(":selected").attr('data-id');
        if (dataSelected != "") {
            $('#dataPembimbingLapangan').show();
            var data = JSON.parse(dataSelected);
            $('#nama_pembimbing').html(data.nama);
            $('#nip').html(data.nip);
            $('#email').html(data.email);
            $('#no_telepon').html(data.no_telepon);
            $('#email_perusahaan').html(data.email_perusahaan);
            $('#alamat_perusahaan').html(data.alamat_perusahaan);
            $('#jabatan').html(data.jabatan);
            $('#kota_perusahaan').html(data.kota_perusahaan);
            $('#nama_perusahaan').html(data.nama_perusahaan);
            $('#no_telepon_perusahaan').html(data.no_telepon_perusahaan);
        } else {
            $('#dataPembimbingLapangan').hide();
        }
    });
</script>
@endsection

