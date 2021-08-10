@extends('layouts/main')
@section('title','Dashboard')

@section('main-content')
    
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Biodata Mahasiswa</h1>
    </div>

    <div class="card shadow mb-4">
    <div class="card-header py-2">
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('mahasiswa.profil.update') }}">
            @csrf
            <div class="form-group row">
                <label for="tempatLahir" class="col-md-2 col-form-label text-md-left ml-2">Tempat Lahir</label>

                <div class="col-md-9">
                    <input id="tempatLahir" type="text" class="form-control @error('tempatLahir') is-invalid @enderror" name="tempatLahir" value="{{ $user->tempat_lahir ?? old('tempatLahir') }}" required autocomplete="tempatLahir" autofocus>

                    @error('tempatLahir')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="tanggalLahir" class="col-md-2 col-form-label text-md-left ml-2">Tanggal Lahir</label>

                <div class="col-md-9">
                    <input id="tanggalLahir" type="date" class="form-control @error('tanggalLahir') is-invalid @enderror" name="tanggalLahir" value="{{ date_format(date_create($user->tanggal_lahir), 'Y-m-d') ?? old('tanggalLahir') }}" required autocomplete="tanggalLahir" autofocus>

                    @error('tanggalLahir')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="noTelp" class="col-md-2 col-form-label text-md-left ml-2">No Telp</label>

                <div class="col-md-9">
                    <input id="noTelp" type="text" class="form-control @error('noTelp') is-invalid @enderror" name="noTelp" value="{{ $user->no_telepon ?? old('noTelp') }}" required autocomplete="noTelp" autofocus>

                    @error('noTelp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-md-2 col-form-label text-md-left ml-2">Email</label>

                <div class="col-md-9">
                    <input id="email" type="email" class="form-control @error('noTelp') is-invalid @enderror" name="email" value="{{ $user->email ?? old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat" class="col-md-2 col-form-label text-md-left ml-2">Alamat</label>

                <div class="col-md-9">
                    <textarea id="alamat" class="form-control @error('alamat') is-invalid @enderror" name="alamat" required autocomplete="alamat" autofocus>{{ $user->alamat ?? old('alamat') }}</textarea>

                    @error('alamat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="text-center">
                <button class="btn btn-success col-md-2">Save</button>
            </div>
        </form>
    </div>
 
@endsection