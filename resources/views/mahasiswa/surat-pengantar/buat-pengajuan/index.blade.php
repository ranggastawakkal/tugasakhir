@extends('layouts/main')
@section('title','Dashboard')

@section('main-content')
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark"> Formulir Pengajuan Surat Pengantar Permintaan Data untuk Tugas Kuliah</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-borderless" width="100%" cellspacing="0">
                <tbody>
                    <tr>
                        <td style="width: 20%;">Nama Mahasiswa</td>
                        <td style="width: 80%;">{{ $user->nama }}</td>
                    </tr>
                    <tr>
                        <td>NIM</td>
                        <td>{{ $user->nim }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<form method="POST" action="{{ route('mahasiswa.surat-pengantar.store') }}">
    @csrf    
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark"> Data Perusahaan</h6>
    </div>
    <div class="card-body">
        <div class="form-group row">
            <label for="tujuan_surat" class="col-md-2 col-form-label text-md-left ml-2">Tujuan Surat</label>

            <div class="col-md-9">
                <input id="tujuan_surat" type="text" class="form-control @error('tujuan_surat') is-invalid @enderror" name="tujuan_surat" value="{{ $tujuan_surat ?? old('tujuan_surat') }}" required autocomplete="tujuan_surat" autofocus>

                @error('tujuan_surat')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="nama_instansi" class="col-md-2 col-form-label text-md-left ml-2">Nama Instansi / Perusahaan</label>

            <div class="col-md-9">
                <input id="nama_instansi" type="text" class="form-control @error('nama_instansi') is-invalid @enderror" name="nama_instansi" value="{{ $nama_instansi ?? old('nama_instansi') }}" required autocomplete="nama_instansi" autofocus>

                @error('nama_instansi')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="alamat_instansi" class="col-md-2 col-form-label text-md-left ml-2">Alamat Instansi / Perusahaan</label>

            <div class="col-md-9">
                <input id="alamat_instansi" type="text" class="form-control @error('alamat_instansi') is-invalid @enderror" name="alamat_instansi" value="{{ $alamat_instansi ?? old('alamat_instansi') }}" required autocomplete="alamat_instansi" autofocus>

                @error('alamat_instansi')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="kota_instansi" class="col-md-2 col-form-label text-md-left ml-2">Kota Instansi / instansi</label>

            <div class="col-md-9">
                <input id="kota_instansi" type="text" class="form-control @error('kota_instansi') is-invalid @enderror" name="kota_instansi" value="{{ $kota_instansi ?? old('kota_instansi') }}" required autocomplete="kota_instansi" autofocus>

                @error('kota_instansi')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="kontak_instansi" class="col-md-2 col-form-label text-md-left ml-2">Kontak Instansi / Perusahaan</label>

            <div class="col-md-9">
                <input id="kontak_instansi" type="text" class="form-control @error('kontak_instansi') is-invalid @enderror" name="kontak_instansi" value="{{ $kontak_instansi ?? old('kontak_instansi') }}" required autocomplete="kontak_instansi" autofocus>

                @error('kontak_instansi')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">Bidang yang diminati</h6>
    </div>
    <div class="card-body">
        <div class="form-group row">
            <label for="bidang_minat" class="col-md-2 col-form-label text-md-left ml-2">Bidang yang diminati</label>

            <div class="col-md-9">
                <input id="bidang_minat" type="text" class="form-control @error('bidang_minat') is-invalid @enderror" name="bidang_minat" value="{{ $user->peminatan->nama ?? old('bidang_minat') }}" required disabled autofocus>

                @error('bidang_minat')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        
        <div class="text-center">
            <button type="submit" class="btn btn-success col-md-2">Save</button>
        </div>
    </div>
</div>
</form>
@endsection