@extends('layouts/main')
@section('title','Dashboard')

@section('main-content')
    <h1 class="h3 mb-4 text-gray-800">Data Mahasiswa</h1>
    <div class="row">
        <table class="table table-striped table-bordered display nowrap" id="dataTableAdmin">
            <thead class="text-center">
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">ID</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Program Studi</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Peminatan</th>
                    <th scope="col">Email</th>
                    <th scope="col">No. Telepon</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">TTL</th>
                    <th scope="col">Dibuat</th>
                    <th scope="col">Diperbarui</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                $i = 1;
                @endphp
                @foreach ($mahasiswakp as $mkp)
                <tr>
                    <td scope="row" class="text-center">{{ $i }}</td>
                    <td scope="row">{{ $mkp->nim }}</td>
                    <td scope="row">{{ $mkp->nama }}</td>
                    <td scope="row">{{ $mkp->kelas->prodi->nama_prodi }}</td>
                    <td scope="row">{{ $mkp->kelas->nama_kelas }}</td>
                    <td scope="row">{{ $mkp->peminatan->nama }}</td>
                    <td scope="row">{{ $mkp->email }}</td>
                    <td scope="row">{{ $mkp->no_telepon }}</td>
                    <td scope="row">{{ Str::limit($mkp->alamat,50) }}</td>
                    <td scope="row">{{ $mkp->jenis_kelamin }}</td>
                    <td scope="row">{{ $mkp->tempat_lahir }}, {{ $mkp->tanggal_lahir }}</td>
                    <td scope="row">{{ $mkp->created_at->format('d-m-Y H:i:s') }}</td>
                    <td scope="row">{{ $mkp->updated_at->format('d-m-Y H:i:s') }}</td>
                    <td scope="row">
                            <abbr title="Lihat Detail"><a href="" data-bs-toggle="modal" data-bs-target="#modalTampilData{{ $mhs->id }}" class="text-primary"><i class="fas fa-sm fa-info"></i></a></abbr> 
                    </td>
                </tr>
                @php
                $i++;
                @endphp
                @endforeach
            </tbody>
        </table>
    </div>
@endsection