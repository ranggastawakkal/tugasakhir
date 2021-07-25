@extends('layouts/main')
@section('title','Data Kelas')

@section('main-content')
    <h1 class="h3 mb-4 text-gray-800">Data Kelas</h1>
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
                            <th scope="col">ID Kelas</th>
                            <th scope="col">Nama Kelas</th>
                            <th scope="col">Program Studi</th>
                            <th scope="col">Jumlah Mahasiswa</th>
                            <th scope="col">Dibuat</th>
                            <th scope="col">Diperbarui</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php 
                        $i = 1;
                        @endphp
                        @foreach ($kelas as $kls)
                        <tr>
                            <td scope="row" class="text-center">{{ $i }}</td>
                            <td scope="row">{{ $kls->id }}</td>
                            <td scope="row">{{ $kls->nama_kelas }}</td>
                            <td scope="row">{{ $kls->prodi->nama_prodi }}</td>
                            <td scope="row">{{ $kls->mahasiswa->where('id_kelas','=',$kls->id)->count() }}</td>
                            <td scope="row">{{ $kls->created_at }}</td>
                            <td scope="row">{{ $kls->updated_at }}</td>
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