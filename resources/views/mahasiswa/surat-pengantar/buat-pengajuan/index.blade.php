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
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark"> Data Perusahaan</h6>
    </div>
    <div class="card-body">
        <div class="form-group row">
            <label for="purposeLetter" class="col-md-2 col-form-label text-md-left ml-2">Tujuan Surat</label>

            <div class="col-md-9">
                <input id="purposeLetter" type="text" class="form-control @error('purposeLetter') is-invalid @enderror" name="purposeLetter" value="{{ $purposeLetter ?? old('purposeLetter') }}" required autocomplete="purposeLetter" autofocus>

                @error('purposeLetter')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-md-2 col-form-label text-md-left ml-2">Nama Instansi / Perusahaan</label>

            <div class="col-md-9">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-md-2 col-form-label text-md-left ml-2">Alamat Instansi / Perusahaan</label>

            <div class="col-md-9">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-md-2 col-form-label text-md-left ml-2">Kota Instansi / Perusahaan</label>

            <div class="col-md-9">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-md-2 col-form-label text-md-left ml-2">Kontak Instansi / Perusahaan</label>

            <div class="col-md-9">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                @error('email')
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
            <label for="email" class="col-md-2 col-form-label text-md-left ml-2">Bidang yang diminati</label>

            <div class="col-md-9">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        
        <div class="text-center">
            <button class="btn btn-success col-md-2">Save</button>
        </div>
    </div>
</div>
@endsection