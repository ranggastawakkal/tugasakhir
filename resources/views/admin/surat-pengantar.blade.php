@extends('layouts/main')
@section('title','Surat Pengantar')

@section('main-content')
<h1 class="h3 mb-4 text-gray-800">Surat Pengantar</h1>
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-success">Data Surat Pengantar</h6>
            </div>
            <div class="card-body">
                {{-- <form action="{{ route('admin.data.mahasiswa.cari') }}" class="form-inline ml-md-0 my-2 my-md-2 mw-100 navbar-search"><div class="input-group"><input type="search" class="'+b.sFilterInput+' form-control bg-light border-0 small" placeholder="Cari.."/><div class="input-group-append"><button class="btn btn-success" type="submit"><i class="fas fa-search fa-sm"></i></button></div></div></form> --}}
                {{-- <form class="form-inline ml-md-0 my-2 my-md-2 mw-100 navbar-search"><div class="input-group"><input type="search" class="'+classes.sFilterInput+' form-control bg-light border-0 small" placeholder="Cari.."/><div class="input-group-append"><button class="btn btn-success" type="submit"><i class="fas fa-search fa-sm"></i></button></div></div></form> --}}
                <table class="table table-striped table-bordered display nowrap" id="dataTable">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Tujuan Surat</th>
                            <th scope="col">Nama Instansi</th>
                            <th scope="col">Alamat Instansi</th>
                            <th scope="col">Kota</th>
                            <th scope="col">Kontak Instansi</th>
                            <th scope="col">Bidang Minat</th>
                            <th scope="col">Diperbarui</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php 
                        $i = 1;
                        @endphp
                        @foreach ($suratPengantar as $sp)
                        <tr>
                            <td scope="row" class="text-center">{{ $i }}</td>
                            <td scope="row">{{ $sp->nim }}</td>
                            <td scope="row">{{ $sp->tanggal }}</td>
                            <td scope="row">{{ $sp->tujuan_surat }}</td>
                            <td scope="row">{{ $sp->nama_instansi }}</td>
                            <td scope="row">{{ $sp->alamat_instansi }}</td>
                            <td scope="row">{{ $sp->kota_instansi }}</td>
                            <td scope="row">{{ $sp->kontak_instansi }}</td>
                            <td scope="row">{{ $sp->bidang_minat }}</td>
                            <td scope="row">{{ $sp->updated_at }}</td>
                            <td scope="row">{{ $sp->file }}</td>
                        </tr>
                        @php 
                        $i++;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection