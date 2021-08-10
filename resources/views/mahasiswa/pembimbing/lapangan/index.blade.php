@extends('layouts/main')
@section('title','Dashboard')

@section('main-content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Biodata Pembimbing Lapangan</h1>
        @if(isset($dataKerjaPraktek->id_pemb_lap))
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
                        <option value="">- Pilih Pembimbing Lapangan-</option>
                        @foreach($lapangan as $data)
                        <option value="{{ $data->id }}">{{ $data->nama }}</option>
                        @endforeach
                    </select>
                    
                    @error('selectLapangan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
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
                            <td style="width: 20%;">Nama Dosen</td>
                            <td style="width: 80%;">{{ $dataKerjaPraktek->pembLap->nama }}</td>
                        </tr>
                        <tr>
                            <td>NIP</td>
                            <td>{{ $dataKerjaPraktek->pembLap->nip }}</td>
                        </tr>
                        <tr>
                            <td>Jabatan</td>
                            <td>{{ $dataKerjaPraktek->pembLap->jabatan }}</td>
                        </tr>
                        <tr>
                            <td>No Telp</td>
                            <td>{{ $dataKerjaPraktek->pembLap->no_telepon }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $dataKerjaPraktek->pembLap->email }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
@endsection

