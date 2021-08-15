@extends('layouts/main')
@section('title','Dashboard')

@section('main-content')
    
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success">Ubah Data Kerja Praktek</h6>
    </div>
    <div class="card-body">
        
        <form method=POST action="{{ route('mahasiswa.kerja-praktek.data.store') }}">
            @csrf
            <div class="form-group row">
                <label for="namaakd" class="col-md-2 col-form-label text-md-left ml-2">Nama Pembimbing Akademik</label>

                <div class="col-md-9">
                    <input id="namaakd" type="text" class="form-control @error('namaakd') is-invalid @enderror" name="namaakd" value="{{ $dataKerjaPraktek->pembimbingAkademik->nama }}" disabled autocomplete="namaakd" autofocus>

                    @error('namaakd')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="namalap" class="col-md-2 col-form-label text-md-left ml-2">Nama Pembimbing Lapangan</label>

                <div class="col-md-9">
                    <input id="namalap" type="text" class="form-control @error('namalap') is-invalid @enderror" name="namalap" value="{{ $dataKerjaPraktek->pembimbingLapangan->nama }}" disabled autocomplete="namalap" autofocus>

                    @error('namalap')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="perusahaan" class="col-md-2 col-form-label text-md-left ml-2">Perusahaan</label>

                <div class="col-md-9">
                    <input id="perusahaan" type="perusahaan" class="form-control @error('perusahaan') is-invalid @enderror" name="perusahaan" value="{{ $dataKerjaPraktek->pembimbingLapangan->nama_perusahaan }}" disabled autofocus>

                    @error('perusahaan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="unitkerja" class="col-md-2 col-form-label text-md-left ml-2">Unit Kerja / Divisi</label>

                <div class="col-md-9">
                    <input id="unitkerja" type="text" class="form-control @error('unitkerja') is-invalid @enderror" name="unitkerja" value="{{ $unitkerja ?? old('unitkerja') }}" required autocomplete="unitkerja" autofocus>

                    @error('unitkerja')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="tanggalmulai" class="col-md-2 col-form-label text-md-left ml-2">Tanggal Mulai</label>

                <div class="col-md-9">
                    <input id="tanggalmulai" type="date" class="form-control @error('tanggalmulai') is-invalid @enderror" name="tanggalmulai" value="{{ $tanggalmulai ?? old('tanggalmulai') }}" required autocomplete="tanggalmulai" autofocus>

                    @error('tanggalmulai')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="tanggalberakhir" class="col-md-2 col-form-label text-md-left ml-2">Tanggal Berakhir</label>

                <div class="col-md-9">
                    <input id="tanggalberakhir" type="date" class="form-control @error('tanggalberakhir') is-invalid @enderror" name="tanggalberakhir" value="{{ $tanggalberakhir ?? old('tanggalberakhir') }}" required autocomplete="tanggalberakhir" autofocus>

                    @error('tanggalberakhir')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="target" class="col-md-2 col-form-label text-md-left ml-2">Target</label>

                <div class="col-md-9">
                    <input id="target" type="text" class="form-control @error('target') is-invalid @enderror" name="target" value="{{ $target ?? old('target') }}" required autocomplete="target" autofocus>

                    @error('target')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="programkegiatan" class="col-md-2 col-form-label text-md-left ml-2">Program Kegiatan</label>

                <div class="col-md-9">
                    <input id="programkegiatan" type="text" class="form-control @error('programkegiatan') is-invalid @enderror" name="programkegiatan" value="{{ $programkegiatan ?? old('programkegiatan') }}" required autocomplete="programkegiatan" autofocus>

                    @error('programkegiatan')
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