@extends('layouts/main')
@section('title','Ubah Password')

@section('main-content')
<div class="row">
    <div class="col-xl-6 col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-success">Ubah Password</h6>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        {{ session('success') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('pembimbing-akademik.ubah-password.update') }}">
                    @csrf
                    <input hidden type="text" class="form-control" id="id" name="id">
                    <div class="mb-3">
                        <label for="old_password" class="col-form-label">Password Saat Ini:</label>
                        <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Password saat ini">
                        @error('old_password')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="col-form-label">Password Baru:</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password baru">
                        @error('password')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="col-form-label">Konfirmasi Password Baru:</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Ketik ulang password baru">
                        @error('password_confirmation')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-success" value="Ubah Password">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection