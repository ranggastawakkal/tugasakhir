@extends('layouts/main')
@section('title','Bobot Nilai')

@section('main-content')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <p>{{ $message }}</p>
        </div>
        @endif
        @if(session('errors'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Ada kesalahan:
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-success">Bobot Nilai Pembimbing Akademik</h6>
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-success mb-3 mx-3" data-bs-toggle="modal" data-bs-target="#modalTambahData">
                    <i class="fas fa-plus"></i> Tambah Data
                </button>
                <table class="table table-striped table-bordered display nowrap" id="dataTableAdmin">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">ID</th>
                            <th scope="col">Indikator Penilaian</th>
                            <th scope="col">Bobot</th>
                            <th scope="col">Dibuat</th>
                            <th scope="col">Diperbarui</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($bobot_pemb_akd as $bobot)
                        <tr>
                            <td scope="row" class="text-center">{{ $i }}</td>
                            <td scope="row">{{ $bobot->id }}</td>
                            <td scope="row">{{ Str::limit($bobot->subClo->deskripsi, 50) }}</td>
                            <td scope="row">{{ $bobot->bobot }}%</td>
                            <td scope="row">{{ $bobot->created_at }}</td>
                            <td scope="row">{{ $bobot->updated_at }}</td>
                            <td scope="row">
                                <abbr title="Lihat Detail"><a href="" data-bs-toggle="modal" data-bs-target="#modalTampilData{{ $bobot->id }}" class="text-primary"><i class="fas fa-sm fa-info"></i></a></abbr> |
                                <abbr title="Edit data"><a href="" data-bs-toggle="modal" data-bs-target="#modalEditData{{ $bobot->id }}" class="text-warning"><i class="fas fa-sm fa-edit"></i></a></abbr> |
                                <abbr title="Hapus data"><a href="" data-bs-toggle="modal" data-bs-target="#modalHapusData{{ $bobot->id }}" class="text-danger"><i class="fas fa-sm fa-trash-alt"></i></a></abbr>
                            </td>
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
    
    {{-- bobot pemb lap --}}
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-success">Bobot Nilai Pembimbing Lapangan</h6>
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-success mb-3 mx-3" data-bs-toggle="modal" data-bs-target="#modalTambahDataPembLap">
                    <i class="fas fa-plus"></i> Tambah Data
                </button>
                <table class="table table-striped table-bordered display nowrap" id="dataTableAdmin2">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">ID</th>
                            <th scope="col">Indikator Penilaian</th>
                            <th scope="col">Bobot</th>
                            <th scope="col">Dibuat</th>
                            <th scope="col">Diperbarui</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($bobot_pemb_lap as $bobot)
                        <tr>
                            <td scope="row" class="text-center">{{ $i }}</td>
                            <td scope="row">{{ $bobot->id }}</td>
                            <td scope="row">{{ Str::limit($bobot->subClo->deskripsi, 50) }}</td>
                            <td scope="row">{{ $bobot->bobot }}%</td>
                            <td scope="row">{{ $bobot->created_at }}</td>
                            <td scope="row">{{ $bobot->updated_at }}</td>
                            <td scope="row">
                                <abbr title="Lihat Detail"><a href="" data-bs-toggle="modal" data-bs-target="#modalTampilDataPembLap{{ $bobot->id }}" class="text-primary"><i class="fas fa-sm fa-info"></i></a></abbr> |
                                <abbr title="Edit data"><a href="" data-bs-toggle="modal" data-bs-target="#modalEditDataPembLap{{ $bobot->id }}" class="text-warning"><i class="fas fa-sm fa-edit"></i></a></abbr> |
                                <abbr title="Hapus data"><a href="" data-bs-toggle="modal" data-bs-target="#modalHapusDataPembLap{{ $bobot->id }}" class="text-danger"><i class="fas fa-sm fa-trash-alt"></i></a></abbr>
                            </td>
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

{{-- Modal pemb akd --}}

{{-- modal tambah data --}}
<div class="modal fade" id="modalTambahData" tabindex="-1" aria-labelledby="modalTambahDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahDataLabel">Tambah Bobot Nilai Pembimbing Akademik</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('learning-outcomes.bobot-nilai.pembimbing-akademik.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="id_sub_clo" class="col-form-label">Indikator Penilaian:</label>
                        <select class="form-control" name="id_sub_clo" id="id_sub_clo" required>
                            <option selected disabled>--- Pilih ---</option>
                            @foreach ($sub_clo as $lo)
                            <option value="{{ $lo->id }}">{{ $lo->id }} - {{ $lo->deskripsi }}</option>
                            @endforeach
                        </select>
                    </div>
                    <label for="bobot" class="col-form-label">Bobot:</label>
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" id="bobot" name="bobot" min="0" required>
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">%</span>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="reset" class="btn btn-warning">Reset</button>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

{{-- modal tampil data --}}
@foreach ($bobot_pemb_akd as $bobot)

<div class="modal fade" id="modalTampilData{{ $bobot->id }}" tabindex="-1" aria-labelledby="modalTampilDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTampilDataLabel">Detail Data Bobot Nilai Pembimbing Akademik</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="">
                    @csrf
                    <div class="mb-3">
                        <label for="id" class="col-form-label">ID:</label>
                        <input type="text" class="form-control" id="id" name="id" value="{{ $bobot->id }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="col-form-label">Indikator Penilaian:</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" disabled>{{ $bobot->subClo->deskripsi }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="id_prodi" class="col-form-label">Bobot:</label>
                        <input type="text" class="form-control" id="id_prodi" name="id_prodi" value="{{ $bobot->bobot }}%" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="created_at" class="col-form-label">Waktu Dibuat:</label>
                        <input type="text" class="form-control" id="created_at" name="created_at" value="{{ $bobot->created_at }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="updated_at" class="col-form-label">Waktu Diperbarui:</label>
                        <input type="text" class="form-control" id="updated_at" name="updated_at" value="{{ $bobot->updated_at }}" disabled>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">OK</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endforeach

{{-- modal edit data --}}
@foreach ($bobot_pemb_akd as $bobot)

<div class="modal fade" id="modalEditData{{ $bobot->id }}" tabindex="-1" aria-labelledby="modalEditDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditDataLabel">Edit Data Bobot Nilai Pembimbing Akademik</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('learning-outcomes.bobot-nilai.pembimbing-akademik.update', $bobot->id) }}">
                    @csrf
                    <input hidden type="text" class="form-control" id="id" name="id" value="{{ $bobot->id }}" required>
                    <div class="mb-3">
                        <label for="id_sub_clo" class="col-form-label">Indikator Penilaian:</label>
                        <select class="form-control" name="id_sub_clo" id="id_sub_clo" required>
                            <option disabled>--- Pilih ---</option>
                            <option value="{{ $bobot->subClo->id }}" selected hidden>{{ $bobot->subClo->deskripsi }}</option>
                            @foreach ($sub_clo as $lo)
                            <option value="{{ $lo->id }}">{{ $lo->id }} - {{ $lo->deskripsi }}</option>
                            @endforeach
                        </select>
                    </div>
                    <label for="bobot" class="col-form-label">Bobot:</label>
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" id="bobot" name="bobot" min="0" value="{{ $bobot->bobot }}" required>
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">%</span>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="reset" class="btn btn-warning">Reset</button>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endforeach

{{-- modal hapus data --}}
@foreach ($bobot_pemb_akd as $bobot)
<div class="modal fade" id="modalHapusData{{ $bobot->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data Bobot Nilai Pembimbing Akademik</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <h6>Anda yakin ingin menghapus data Bobot Nilai Pembimbing Akademik ini?</h6>
                <ul>
                    <li>ID: {{ $bobot->id }}</li>
                    <li>Indikator Penilaian: {{ $bobot->subClo->deskripsi }}</li>
                    <li>Bobot: {{ $bobot->bobot }}%</li>
                </ul>
            </div>
            <div class="modal-footer">
                <form action="{{ route('learning-outcomes.bobot-nilai.pembimbing-akademik.destroy', $bobot->id ) }}" method="GET">
                    @csrf
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

{{-- End of modal pemb akd --}}

{{-- Modal pemb lap --}}

{{-- modal tambah data --}}
<div class="modal fade" id="modalTambahDataPembLap" tabindex="-1" aria-labelledby="modalTambahDataPembLapLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahDataPembLapLabel">Tambah Bobot Nilai Pembimbing Lapangan</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('learning-outcomes.bobot-nilai.pembimbing-lapangan.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="id_sub_clo" class="col-form-label">Indikator Penilaian:</label>
                        <select class="form-control" name="id_sub_clo" id="id_sub_clo" required>
                            <option selected disabled>--- Pilih ---</option>
                            @foreach ($sub_clo as $lo)
                            <option value="{{ $lo->id }}">{{ $lo->id }} - {{ $lo->deskripsi }}</option>
                            @endforeach
                        </select>
                    </div>
                    <label for="bobot" class="col-form-label">Bobot:</label>
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" id="bobot" name="bobot" min="0" required>
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">%</span>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="reset" class="btn btn-warning">Reset</button>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

{{-- modal tampil data --}}
@foreach ($bobot_pemb_lap as $bobot)

<div class="modal fade" id="modalTampilDataPembLap{{ $bobot->id }}" tabindex="-1" aria-labelledby="modalTampilDataPembLapLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTampilDataPembLapLabel">Detail Data Bobot Nilai Pembimbing Lapangan</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="">
                    @csrf
                    <div class="mb-3">
                        <label for="id" class="col-form-label">ID:</label>
                        <input type="text" class="form-control" id="id" name="id" value="{{ $bobot->id }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="col-form-label">Indikator Penilaian:</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" disabled>{{ $bobot->subClo->deskripsi }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="id_prodi" class="col-form-label">Bobot:</label>
                        <input type="text" class="form-control" id="id_prodi" name="id_prodi" value="{{ $bobot->bobot }}%" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="created_at" class="col-form-label">Waktu Dibuat:</label>
                        <input type="text" class="form-control" id="created_at" name="created_at" value="{{ $bobot->created_at }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="updated_at" class="col-form-label">Waktu Diperbarui:</label>
                        <input type="text" class="form-control" id="updated_at" name="updated_at" value="{{ $bobot->updated_at }}" disabled>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">OK</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endforeach

{{-- modal edit data --}}
@foreach ($bobot_pemb_lap as $bobot)

<div class="modal fade" id="modalEditDataPembLap{{ $bobot->id }}" tabindex="-1" aria-labelledby="modalEditDataPembLapLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditDataPembLapLabel">Edit Data Bobot Nilai Pembimbing Lapangan</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('learning-outcomes.bobot-nilai.pembimbing-lapangan.update', $bobot->id) }}">
                    @csrf
                    <input hidden type="text" class="form-control" id="id" name="id" value="{{ $bobot->id }}" required>
                    <div class="mb-3">
                        <label for="id_sub_clo" class="col-form-label">Indikator Penilaian:</label>
                        <select class="form-control" name="id_sub_clo" id="id_sub_clo" required>
                            <option disabled>--- Pilih ---</option>
                            <option value="{{ $bobot->subClo->id }}" selected hidden>{{ $bobot->subClo->deskripsi }}</option>
                            @foreach ($sub_clo as $lo)
                            <option value="{{ $lo->id }}">{{ $lo->id }} - {{ $lo->deskripsi }}</option>
                            @endforeach
                        </select>
                    </div>
                    <label for="bobot" class="col-form-label">Bobot:</label>
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" id="bobot" name="bobot" min="0" value="{{ $bobot->bobot }}" required>
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">%</span>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="reset" class="btn btn-warning">Reset</button>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endforeach

{{-- modal hapus data --}}
@foreach ($bobot_pemb_lap as $bobot)
<div class="modal fade" id="modalHapusDataPembLap{{ $bobot->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data Bobot Nilai Pembimbing Lapangan</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <h6>Anda yakin ingin menghapus data Bobot Nilai Pembimbing Lapangan ini?</h6>
                <ul>
                    <li>ID: {{ $bobot->id }}</li>
                    <li>Indikator Penilaian: {{ $bobot->subClo->deskripsi }}</li>
                    <li>Bobot: {{ $bobot->bobot }}%</li>
                </ul>
            </div>
            <div class="modal-footer">
                <form action="{{ route('learning-outcomes.bobot-nilai.pembimbing-lapangan.destroy', $bobot->id ) }}" method="GET">
                    @csrf
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

{{-- End of modal pemb lap --}}

@endsection