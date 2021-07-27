@extends('layouts/main')
@section('title','Dashboard')

@section('main-content')
    
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark"> Data Kerja Praktek</h6>
    </div>
    <div class="card-body">
        <div class="form-group row">
            <label for="nipakd" class="col-md-2 col-form-label text-md-left ml-2">NIP Pembimbing Akademik</label>

            <div class="col-md-9">
                <input id="nipakd" type="text" class="form-control @error('name') is-invalid @enderror" name="nipakd" value="{{ $nipakd ?? old('nipakd') }}" required autocomplete="nipakd" autofocus>

                @error('nipakd')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="nip" class="col-md-2 col-form-label text-md-left ml-2">NIP</label>

            <div class="col-md-9">
                <input id="nip" type="text" class="form-control @error('name') is-invalid @enderror" name="nip" value="{{ $nip ?? old('nip') }}" required autocomplete="nip" autofocus>

                @error('nip')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-md-2 col-form-label text-md-left ml-2">Email</label>

            <div class="col-md-9">
                <input id="email" type="email" class="form-control @error('name') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="nomorHp" class="col-md-2 col-form-label text-md-left ml-2">Nomor HP</label>

            <div class="col-md-9">
                <input id="nomorHp" type="text" class="form-control @error('name') is-invalid @enderror" name="nomorHp" value="{{ $nomorHp ?? old('nomorHp') }}" required autocomplete="nomorHp" autofocus>

                @error('nomorHp')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="perusahaan" class="col-md-2 col-form-label text-md-left ml-2">Perusahaan</label>

            <div class="col-md-9">
                <input id="perusahaan" type="text" class="form-control @error('name') is-invalid @enderror" name="perusahaan" value="{{ $perusahaan ?? old('perusahaan') }}" required autocomplete="perusahaan" autofocus>

                @error('perusahaan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="posisi" class="col-md-2 col-form-label text-md-left ml-2">Posisi</label>

            <div class="col-md-9">
                <input id="posisi" type="text" class="form-control @error('name') is-invalid @enderror" name="posisi" value="{{ $posisi ?? old('posisi') }}" required autocomplete="posisi" autofocus>

                @error('posisi')
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