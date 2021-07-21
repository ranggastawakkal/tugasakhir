@extends('layouts/main')
@section('title','Dashboard')

@section('main-content')
    <h1 class="h3 mb-4 text-gray-800">Data Mahasiswa</h1>

<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Mahasiswa</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('pembimbing-akademik.data-mahasiswa.cari') }}" class="form-inline ml-md-0 my-2 my-md-2 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" name="cari" value="{{ old('cari') }}" class="form-control bg-light border-0 small" placeholder="Cari mahasiswa.." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <table class="table table-striped table-bordered table-responsive-md">
                    <thead class="text-center">
                        <tr>
                            <th>No.</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Program Studi</th>
                            <th>Kelas</th>
                            <th>Angkatan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php 
                        $i = 1;
                        @endphp
                        @foreach ($mahasiswa as $mhs)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $mhs->nim }}</td>
                            <td>{{ $mhs->nama }}</td>
                            <td>{{ $mhs->nama_prodi }}</td>
                            <td>{{ $mhs->nama_kelas }}</td>
                            <td>{{ $mhs->tahun_angkatan }}</td>
                            <td><button type="button" class="btn btn-secondary">Delete</button>                          <button type="button" class="btn btn-secondary">Add</button></td>
                        @php 
                        $i++;
                        @endphp
                        @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection