@extends('layouts/main')
@section('title','Data Pembimbing Akademik')

@section('main-content')
    <h1 class="h3 mb-4 text-gray-800">Data Pembimbing Akademik</h1>
    <div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-success">Data Pembimbing Akademik</h6>
            </div>
            <div class="card-body">
                {{-- <form action="{{ route('admin.data.mahasiswa.cari') }}" class="form-inline ml-md-0 my-2 my-md-2 mw-100 navbar-search"><div class="input-group"><input type="search" class="'+b.sFilterInput+' form-control bg-light border-0 small" placeholder="Cari.."/><div class="input-group-append"><button class="btn btn-success" type="submit"><i class="fas fa-search fa-sm"></i></button></div></div></form> --}}
                {{-- <form class="form-inline ml-md-0 my-2 my-md-2 mw-100 navbar-search"><div class="input-group"><input type="search" class="'+classes.sFilterInput+' form-control bg-light border-0 small" placeholder="Cari.."/><div class="input-group-append"><button class="btn btn-success" type="submit"><i class="fas fa-search fa-sm"></i></button></div></div></form> --}}
                <table class="table table-striped table-bordered display nowrap" id="dataTable">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">NIP</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kode Dosen</th>
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
                        @foreach ($pembimbing_akademik as $pemb_akd)
                        <tr>
                            <td class="text-center" scope="row">{{ $i }}</td>
                            <td scope="row">{{ $pemb_akd->nip }}</td>
                            <td scope="row">{{ $pemb_akd->nama }}</td>
                            <td scope="row">{{ $pemb_akd->kode_dosen }}</td>
                            <td scope="row">{{ $pemb_akd->email }}</td>
                            <td scope="row">{{ $pemb_akd->no_telepon }}</td>
                            <td scope="row">{{ Str::limit($pemb_akd->alamat,50) }}</td>
                            <td scope="row">{{ $pemb_akd->jenis_kelamin }}</td>
                            <td scope="row">{{ $pemb_akd->tempat_lahir }}, {{ $pemb_akd->tanggal_lahir }}</td>
                            <td scope="row">{{ $pemb_akd->created_at }}</td>
                            <td scope="row">{{ $pemb_akd->updated_at }}</td>
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