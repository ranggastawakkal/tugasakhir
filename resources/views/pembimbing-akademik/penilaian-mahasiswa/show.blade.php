@extends('layouts/main')
@section('title','Nilai Mahasiswa')

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
                <h6 class="m-0 font-weight-bold text-success">Mahasiswa</h6>
            </div>
            <div class="card-body">
                <table class="table table-borderless table-responsive">
                    @foreach ($kerja_praktek as $kp)
                    <tr>
                        <th>Nama</th>
                        <td>:</td>
                        <td>{{ $kp->mahasiswa->nama }}</td>
                    </tr>
                    <tr>
                        <th>Perusahaan</th>
                        <td>:</td>
                        @if ($kp->id_pemb_lap != null)
                        <td>{{ $kp->pembimbingLapangan->nama_perusahaan }}</td>
                        @else
                        <td>-</td>
                        @endif
                    </tr>
                    <tr>
                        <th>Unit Kerja</th>
                        <td>:</td>
                        <td>{{ $kp->unit_kerja }}</td>
                    </tr>
                    <tr>
                        <th>Waktu Kerja</th>
                        <td>:</td>
                        <td>{{ $kp->tanggal_mulai }} - {{ $kp->tanggal_berakhir }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    {{-- Nilai Pemb lap --}}
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-success">Form Penilaian Mahasiswa (Pembimbing Lapangan)</h6>
            </div>
            <div class="card-body">
                @if ($nilai_pemb_lap->count() < 1)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <p>Nilai Mahasiswa belum diinputkan</p>
                </div>
                @else
                <table class="table table-striped table-responsive-xl table-bordered display nowrap" id="dataTableTanpaScroll">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Indikator Penilaian</th>
                            <th scope="col">Bobot</th>
                            <th scope="col">Nilai Angka</th>
                            <th scope="col">Bobot x Nilai Angka</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($nilai_pemb_lap as $nilai)
                        <tr>
                            <td scope="row" class="text-center">{{ $i }}</td>
                            <td scope="row">{{ $nilai->bobotPembLap->subClo->deskripsi }}</td>
                            <td scope="row">{{ $nilai->bobotPembLap->bobot }}%</td>
                            <td scope="row">{{ $nilai->nilai_angka }}</td>
                            <td scope="row">{{ $nilai->nilai }}</td>
                        </tr>
                        @php
                        $i++;
                        @endphp
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="4">Nilai Pembimbing Lapangan</th>
                            <th>{{ $total_nilai_pemb_lap }}</th>
                        </tr>
                    </tfoot>
                </table>
                @endif
            </div>
        </div>
    </div>
    {{-- End of Nilai Pemb lap --}}

    {{-- Nilai pemb akd --}}
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-success">Form Penilaian Mahasiswa (Pembimbing Akademik)</h6>
            </div>
            <div class="card-body">
                @if ($nilai_pemb_akd->count() < 1)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <p>Nilai Mahasiswa belum diinputkan</p>
                </div>
                <div>
                    <p class="text-danger">*Nilai Angka diisi dengan mengacu pada <b>Panduan Penilaian Kerja Praktek Fakultas Rekayasa Industri</b>**</p>
                    <p class="text-danger">**File <b>Panduan Penilaian Kerja Praktek Fakultas Rekayasa Industri</b> dapat diunduh melalui menu "Dokumen KP"</p>
                </div>
                <button type="button" class="btn btn-success mb-3 mx-3" data-bs-toggle="modal" data-bs-target="#modalTambahData" {{ ($nilai_pemb_lap->count() < 1) ? 'disabled' : '' }}>
                    <i class="fas fa-plus"></i> Input Nilai Mahasiswa
                </button>
                @else
                <button type="button" class="btn btn-warning mb-3 mx-3" data-bs-toggle="modal" data-bs-target="#modalEditData">
                    <i class="fas fa-edit"></i> Edit Nilai
                </button>
                <table class="table table-striped table-responsive-xl table-bordered display nowrap" id="dataTableTanpaScroll2">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Indikator Penilaian</th>
                            <th scope="col">Bobot</th>
                            <th scope="col">Nilai Angka</th>
                            <th scope="col">Bobot x Nilai Angka</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($nilai_pemb_akd as $nilai)
                        <tr>
                            <td scope="row" class="text-center">{{ $i }}</td>
                            <td scope="row">{{ $nilai->bobotPembAkd->subClo->deskripsi }}</td>
                            <td scope="row">{{ $nilai->bobotPembAkd->bobot }}%</td>
                            <td scope="row">{{ $nilai->nilai_angka }}</td>
                            <td scope="row">{{ $nilai->nilai }}</td>
                        </tr>
                        @php
                        $i++;
                        @endphp
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="4">Nilai Pembimbing Akademik</th>
                            <th>{{ $total_nilai_pemb_akd }}</th>
                        </tr>
                        <tr>
                            <th colspan="4">Nilai Pembimbing Lapangan</th>
                            <th>{{ $total_nilai_pemb_lap }}</th>
                        </tr>
                        <tr>
                            <th colspan="4">Nilai Total (Nilai Pembimbing Akademik + Nilai Pembimbing Lapangan)</th>
                            <th>{{ $total_nilai }}</th>
                        </tr>
                    </tfoot>
                </table>
                <div class="col-xl-12 col-lg-12 mt-4">
                    <div>
                        <p class="text-danger">*Nilai Angka diisi dengan mengacu pada <b>Panduan Penilaian Kerja Praktek Fakultas Rekayasa Industri</b>**</p>
                        <p class="text-danger">**File <b>Panduan Penilaian Kerja Praktek Fakultas Rekayasa Industri</b> dapat diunduh melalui menu "Dokumen KP"</p>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    {{-- End of Nilai pemb akd --}}

</div>

{{-- modal tambah data --}}
<div class="modal fade" id="modalTambahData" tabindex="-1" aria-labelledby="modalTambahDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahDataLabel">Input Nilai Mahasiswa</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('pembimbing-akademik.penilaian-mahasiswa.store') }}">
                    @csrf
                    @foreach ($kerja_praktek as $kp)
                    <table class="table table-striped table-bordered display nowrap">
                        <thead class="text-center">
                            <tr>
                                <th>No.</th>
                                <th hidden>ID Mahasiswa</th>
                                <th hidden>ID</th>
                                <th hidden>Bobot</th>
                                <th>Indikator Penilaian</th>
                                <th>Nilai Angka*</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @foreach ($bobot_pemb as $indikator)
                            <tr>
                                <td class="text-center">{{ $i }}</td>
                                <td hidden><input id="id_mahasiswa" name="id_mahasiswa[]" value="{{ $kp->mahasiswa->id }}" readonly hidden></td>
                                <td hidden><input id="id_bobot" name="id_bobot[]" value="{{ $indikator->id }}" readonly></td>
                                <td hidden><input id="bobot" name="bobot[]" value="{{ $indikator->bobot }}" readonly></td>
                                <td>{{ $indikator->subClo->deskripsi }}</td>
                                <td><input type="number" class="form-control" id="nilai_angka" name="nilai_angka[]" min="0" max="100" required></td>
                            </tr>
                            @php
                            $i++;
                            @endphp
                            @endforeach
                            @endforeach
                        </tbody>
                    </table>
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

{{-- modal edit data --}}
<div class="modal fade" id="modalEditData" tabindex="-1" aria-labelledby="modalEditDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditDataLabel">Edit Nilai Mahasiswa</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                    <form method="POST" action="{{ route('pembimbing-akademik.penilaian-mahasiswa.update') }}">
                    @csrf
                    <table class="table table-striped table-bordered display nowrap">
                        <thead class="text-center">
                            <tr>
                                <th>No.</th>
                                <th hidden>ID</th>
                                <th hidden>Bobot</th>
                                <th>Indikator Penilaian</th>
                                <th>Nilai Angka*</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @foreach ($nilai_pemb_akd as $nilai)
                            <tr>
                                <td class="text-center">{{ $i }}</td>
                                <td hidden><input id="id" name="id[]" value="{{ $nilai->id }}" readonly></td>
                                <td hidden><input id="bobot" name="bobot[]" value="{{ $nilai->bobotPembAkd->bobot }}" readonly></td>
                                <td>{{ $nilai->bobotPembAkd->subClo->deskripsi }}</td>
                                <td><input type="number" class="form-control" id="nilai_angka" name="nilai_angka[]" min="0" max="100" value="{{ $nilai->nilai_angka }}" required></td>
                            </tr>
                            @php
                            $i++;
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
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
@endsection