@extends('layouts/main')
@section('title','Data Mahasiswa')

@section('main-content')
<h1 class="h3 mb-4 text-gray-800">Data Mahasiswa</h1>

<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-success">Data Mahasiswa</h6>
            </div>
            <div class="card-body">
                {{-- <form action="{{ route('admin.data.mahasiswa.cari') }}" class="form-inline ml-md-0 my-2 my-md-2 mw-100 navbar-search"><div class="input-group"><input type="search" class="'+b.sFilterInput+' form-control bg-light border-0 small" placeholder="Cari.."/><div class="input-group-append"><button class="btn btn-success" type="submit"><i class="fas fa-search fa-sm"></i></button></div></div></form> --}}
                {{-- <form class="form-inline ml-md-0 my-2 my-md-2 mw-100 navbar-search"><div class="input-group"><input type="search" class="'+classes.sFilterInput+' form-control bg-light border-0 small" placeholder="Cari.."/><div class="input-group-append"><button class="btn btn-success" type="submit"><i class="fas fa-search fa-sm"></i></button></div></div></form> --}}
                <table class="table table-striped table-bordered display nowrap" id="dataTable">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Program Studi</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Angkatan</th>
                            <th scope="col">Email</th>
                            <th scope="col">No. Telepon</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">TTL</th>
                            <th scope="col">Dibuat</th>
                            <th scope="col">Diperbarui</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php 
                        $i = 1;
                        @endphp
                        @foreach ($mahasiswa as $mhs)
                        <tr>
                            <td scope="row" class="text-center">{{ $i }}</td>
                            <td scope="row">{{ $mhs->nim }}</td>
                            <td scope="row">{{ $mhs->nama }}</td>
                            <td scope="row">{{ $mhs->kelas->prodi->nama_prodi }}</td>
                            <td scope="row">{{ $mhs->kelas->nama_kelas }}</td>
                            <td scope="row">{{ $mhs->tahun_angkatan }}</td>
                            <td scope="row">{{ $mhs->email }}</td>
                            <td scope="row">{{ $mhs->no_telepon }}</td>
                            <td scope="row">{{ $mhs->alamat }}</td>
                            <td scope="row">{{ $mhs->jenis_kelamin }}</td>
                            <td scope="row">{{ $mhs->tempat_lahir }}, {{ $mhs->tanggal_lahir }}</td>
                            <td scope="row">{{ $mhs->created_at }}</td>
                            <td scope="row">{{ $mhs->updated_at }}</td>
                        </tr>
                        @php 
                        $i++;
                        @endphp
                        @endforeach
                    </tbody>
                    {{-- <tfoot class="text-center">
                        <tr>
                            <td>No.</td>
                            <td>NIM</td>
                            <td>Nama</td>
                            <td>Program Studi</td>
                            <td>Kelas</td>
                            <td>Angkatan</td>
                            <td>Email</td>
                            <td>No. Telepon</td>
                            <td>Alamat</td>
                            <td>Jenis Kelamin</td>
                            <td>Dibuat</td>
                            <td>Diperbarui</td>
                        </tr>
                    </tfoot> --}}
                </table>
            </div>
        </div>
    </div>
</div>

@endsection