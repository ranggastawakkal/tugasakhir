@extends('layouts/main')
@section('title','Dashboard')

@section('main-content')
    <!-- Content Row -->
    <div class="row">

        <!-- card mahasiswa -->
        <div class="col-xl-4 col-md-6 mb-4 mx-auto">
            <div class="card border-left-primary shadow h-100 pt-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Mahasiswa</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $mahasiswa->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <small class=" text-gray-400">Diperbarui {{ $mhs_latest }}</small>
                        </div>
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <a href="{{ route('admin.data.mahasiswa') }}">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- card pemb akd -->
        <div class="col-xl-4 col-md-6 mb-4 mx-auto">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Pembimbing Akademik</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pembimbing_akademik->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <small class=" text-gray-400">Diperbarui {{ $pemb_akd_latest }}</small>
                        </div>
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <a href="{{ route('admin.data.pembimbing-akademik') }}">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- card pemb lap -->
        <div class="col-xl-4 col-md-6 mb-4 mx-auto">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Pembimbing Lapangan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pembimbing_lapangan->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <small class=" text-gray-400">Diperbarui {{ $pemb_lap_latest }}</small>
                        </div>
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <a href="{{ route('admin.data.pembimbing-lapangan') }}">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- card prodi -->
        <div class="col-xl-4 col-md-6 mb-4 mx-auto">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Program Studi
                                </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $program_studi->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-school fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <small class=" text-gray-400">Diperbarui {{ $prodi_latest }}</small>
                        </div>
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <a href="{{ route('admin.data.program-studi') }}">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- card Kelas -->
        <div class="col-xl-4 col-md-6 mb-4 mx-auto">
            <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                Kelas
                                </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $kelas->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chalkboard fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <small class=" text-gray-400">Diperbarui {{ $kelas_latest }}</small>
                        </div>
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <a href="{{ route('admin.data.kelas') }}">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- card surat pengantar -->
        <div class="col-xl-4 col-md-6 mb-4 mx-auto">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Surat Pengantar
                                </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $surat_pengantar->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-envelope-open-text fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <small class=" text-gray-400">Diperbarui {{ $sp_latest }}</small>
                        </div>
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <a href="{{ route('admin.surat-pengantar') }}">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection