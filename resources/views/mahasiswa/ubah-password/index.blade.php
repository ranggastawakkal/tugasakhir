@extends('layouts/main')
@section('title','Ubah Password')

@section('main-content')
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success">Ubah Password</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('mahasiswa.ubah-password.update') }}" method="post">
        @csrf
            
            <div class="form-group row">
                <label for="currentPassword" class="col-md-2 col-form-label text-md-left ml-2">Current Password</label>

                <div class="col-md-9">
                    <input id="currentPassword" type="password" class="form-control @error('currentPassword') is-invalid @enderror" name="currentPassword" required>

                    @error('currentPassword')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-md-2 col-form-label text-md-left ml-2">New Password</label>

                <div class="col-md-9">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="password_confirmation" class="col-md-2 col-form-label text-md-left ml-2">Repeat New Password</label>

                <div class="col-md-9">
                    <input id="password_confirmation" type="password" class="form-control @error('email') is-invalid @enderror" name="password_confirmation" required>

                    @error('password_confirmation')
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