@extends('layouts/main')
@section('title','Dashboard')

@section('main-content')
<div class="row">
    @if ($kerja_praktek->count() > 0)
        <!-- card mahasiswa -->
        @foreach ($kerja_praktek as $kp)
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 pt-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-uppercase mb-1">
                                <a class="text-success" href="{{ route('pembimbing-lapangan.data-mahasiswa.show', $kp->id) }}">{{ $kp->mahasiswa->nama }}</a>
                            </div>
                            <div class="text-xs mb-1 text-secondary">
                                {{ $kp->unit_kerja }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-graduate fa-4x text-gray-300"></i>
                        </div>
                    </div>
                    <a class="btn btn-sm my-1 mx-1 btn-outline-info" href="{{ route('pembimbing-lapangan.log-aktivitas.show', $kp->mahasiswa->id) }}"><i class="fas fa-fw fa-file-alt"></i> Log Aktivitas</a>
                    @if (!isset($kp->mahasiswa->dokumenMahasiswa->laporan) || $kp->mahasiswa->dokumenMahasiswa->laporan === "-" || $kp->mahasiswa->dokumenMahasiswa->laporan === "")
                        <a class="btn btn-outline-secondary disabled btn-sm my-1 mx-1" href=""><i class="fas fa-fw fa-envelope-open-text"></i> Laporan KP</a>
                    @else
                        <a class="btn btn-sm my-1 mx-1 btn-outline-danger" href="{{ route('pembimbing-lapangan.laporan-kp.get',$kp->mahasiswa->dokumenMahasiswa->laporan) }}"><i class="fas fa-fw fa-envelope-open-text"></i> Laporan KP</a>
                    @endif
                    @if (!isset($kp->mahasiswa->nilaiPembLap->nilai_angka))
                        <a class="btn btn-sm my-1 mx-1 btn-outline-warning" href="{{ route('pembimbing-lapangan.penilaian-mahasiswa.show', $kp->mahasiswa->id) }}"><i class="fas fa-fw fa-file-signature"></i> Beri Nilai</a>
                    @else
                        <a class="btn btn-sm my-1 mx-1 btn-outline-warning" href="{{ route('pembimbing-lapangan.penilaian-mahasiswa.show', $kp->mahasiswa->id) }}"><i class="fas fa-fw fa-file-alt"></i> Lihat Nilai</a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    @else
        <div class="alert col-xl-12 alert-info alert-dismissible fade show">
            Tidak ada data.
        </div>
    @endif
</div>
@endsection