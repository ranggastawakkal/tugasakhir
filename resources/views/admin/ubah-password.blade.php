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
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        {{ session('error') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('admin.ubah-password.update') }}">
                    @csrf
                    <input hidden type="text" class="form-control" id="id" name="id">
                    <div class="mb-3">
                        <label for="password" class="col-form-label font-weight-bold">Password Saat Ini:</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                        @error('password')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password_baru" class="col-form-label font-weight-bold">Password Baru:</label>
                        <input type="password" class="form-control @error('password_baru') is-invalid @enderror" id="password_baru" name="password_baru">
                        @error('password_baru')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password_baru_confirmation" class="col-form-label font-weight-bold">Konfirmasi Password Baru:</label>
                        <input type="password" class="form-control @error('password_baru_confirmation') is-invalid @enderror" id="password_baru_confirmation" name="password_baru_confirmation">
                        @error('password_baru_confirmation')
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