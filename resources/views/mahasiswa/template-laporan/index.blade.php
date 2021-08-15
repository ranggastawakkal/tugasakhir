@extends('layouts/main')
@section('title','Dokumen KP')

@section('main-content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Dokumen KP</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama File</th>
                            <th>Deskripsi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dokumenKp as $dokumen)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dokumen->nama }}</td>
                            <td>{{ $dokumen->deskripsi }}</td>
                            <td><a href="{{ route('mahasiswa.template-laporan.download', $dokumen->file) }}" class="btn btn-sm btn-success">Download</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection