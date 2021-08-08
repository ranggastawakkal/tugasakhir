@extends('layouts/main')
@section('title','Dashboard')

@section('main-content')
<h1 class="h3 mb-2 text-gray-800">Dokumen Mahasiswa</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-2">
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dokumenKp as $dokumen)
                        <tr>
                            <td>{{ $dokumen->id }}</td>
                            <td>{{ $dokumen->nama }}</td>
                            <td><a href="{{ route('mahasiswa.template-laporan.download', $dokumen->file) }}" class="btn btn-sm btn-success">Download</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection