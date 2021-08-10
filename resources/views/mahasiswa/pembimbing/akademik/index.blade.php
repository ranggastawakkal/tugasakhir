@extends('layouts/main')
@section('title','Dashboard')

@section('main-content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Biodata Dosen Pembimbing Akademik</h1>
    </div>

    @if(!isset($dataKerjaPraktek->id_pemb_akd))
    <div class="card shadow mb-4">
        <div class="card-header py-2">
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('mahasiswa.pembimbing.akademik.store') }}">
                @csrf
                <div class="form-group">
                    <label for="selectAkademik">Pilih Dosen Pembimbing Akademik</label>
                    <select class="form-control @error('selectAkademik') is-invalid @enderror" id="selectAkademik" name="selectAkademik">
                        <option value="">- Pilih Dosen Pembimbing -</option>
                        @foreach($dosen as $data)
                        <option value="{{ $data->id }}">{{ $data->nama }}</option>
                        @endforeach
                    </select>

                    @error('selectAkademik')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success shadow-sm mt-2"> Save</button>
            </form>
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
                            <td style="width: 80%;">{{ $dataKerjaPraktek->pembAkd->nama }}</td>
                        </tr>
                        <tr>
                            <td>NIP</td>
                            <td>{{ $dataKerjaPraktek->pembAkd->nip }}</td>
                        </tr>
                        <tr>
                            <td>Kode Dosen</td>
                            <td>{{ $dataKerjaPraktek->pembAkd->kode_dosen }}</td>
                        </tr>
                        <tr>
                            <td>No Telp</td>
                            <td>{{ $dataKerjaPraktek->pembAkd->no_telepon }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $dataKerjaPraktek->pembAkd->email }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
@endsection