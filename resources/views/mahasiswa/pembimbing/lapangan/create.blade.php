@extends('layouts/main')
@section('title','Dashboard')

@section('main-content')
    
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark"> Data Pembimbing Lapangan</h6>
    </div>
    <div class="card-body">
    <form method="POST" action="{{ route('mahasiswa.pembimbing.lapangan.store.new') }}">
            @csrf
        <div class="form-group row">
            <label for="nama" class="col-md-2 col-form-label text-md-left ml-2">Nama</label>

            <div class="col-md-9">
                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ $nama ?? old('nama') }}" required autocomplete="nama" autofocus>

                @error('nama')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="nip" class="col-md-2 col-form-label text-md-left ml-2">NIP</label>

            <div class="col-md-9">
                <input id="nip" type="text" class="form-control @error('nip') is-invalid @enderror" name="nip" value="{{ $nip ?? old('nip') }}" required autocomplete="nip" autofocus>

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
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="phone" class="col-md-2 col-form-label text-md-left ml-2">Nomor Telepon</label>

            <div class="col-md-9">
                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $phone ?? old('phone') }}" required autocomplete="phone" autofocus>

                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="jabatan" class="col-md-2 col-form-label text-md-left ml-2">Jabatan</label>

            <div class="col-md-9">
                <input id="jabatan" type="text" class="form-control @error('jabatan') is-invalid @enderror" name="jabatan" value="{{ $jabatan ?? old('jabatan') }}" required autocomplete="jabatan" autofocus>

                @error('jabatan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="namaperusahaan" class="col-md-2 col-form-label text-md-left ml-2">Nama Perusahaan</label>

            <div class="col-md-9">
                <input id="namaperusahaan" type="text" class="form-control @error('namaperusahaan') is-invalid @enderror" name="namaperusahaan" value="{{ $namaperusahaan ?? old('namaperusahaan') }}" required autocomplete="namaperusahaan" autofocus>

                @error('namaperusahaan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="alamatperusahaan" class="col-md-2 col-form-label text-md-left ml-2">Alamat Perusahaan</label>

            <div class="col-md-9">
                <input id="alamatperusahaan" type="text" class="form-control @error('alamatperusahaan') is-invalid @enderror" name="alamatperusahaan" value="{{ $alamatperusahaan ?? old('alamatperusahaan') }}" required autocomplete="alamatperusahaan" autofocus>

                @error('alamatperusahaan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="kotaperusahaan" class="col-md-2 col-form-label text-md-left ml-2">Kota Perusahaan</label>

            <div class="col-md-9">
                <input id="kotaperusahaan" type="text" class="form-control @error('kotaperusahaan') is-invalid @enderror" name="kotaperusahaan" value="{{ $kotaperusahaan ?? old('kotaperusahaan') }}" required autocomplete="kotaperusahaan" autofocus>

                @error('kotaperusahaan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="email_perusahaan" class="col-md-2 col-form-label text-md-left ml-2">Email Perusahaan</label>

            <div class="col-md-9">
                <input id="email_perusahaan" type="email" class="form-control @error('email_perusahaan') is-invalid @enderror" name="email_perusahaan" value="{{ $email_perusahaan ?? old('email_perusahaan') }}" required autocomplete="email_perusahaan" autofocus>

                @error('email_perusahaan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="phoneperusahaan" class="col-md-2 col-form-label text-md-left ml-2">Nomor Telepon Perusahaan</label>

            <div class="col-md-9">
                <input id="phoneperusahaan" type="text" class="form-control @error('phoneperusahaan') is-invalid @enderror" name="phoneperusahaan" value="{{ $phoneperusahaan ?? old('phoneperusahaan') }}" required autocomplete="phoneperusahaan" autofocus>

                @error('phoneperusahaan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        
    
        <div class="text-center">
            <button class="btn btn-success col-md-2" type="submit">Save</button>
        </div>
        </form>
    </div>
</div>
@endsection