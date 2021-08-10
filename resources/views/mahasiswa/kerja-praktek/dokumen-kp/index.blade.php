@extends('layouts/main')
@section('title','Dashboard')

@section('main-content')
<h1 class="h3 mb-2 text-gray-800">Upload Dokumen</h1>

    <div class="row">
    
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-success border-bottom-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-s font-weight-bold text-secondary text-uppercase mb-1">
                        Upload bukti KRS</div>
                        <div class="mb-0 mt-3 font-weight-bold text-gray-800">
                            @if (isset($dokumenMahasiswa->krs))
                            <span><i class="fa fa-file mr-2 mb-3"></i>{{ $dokumenMahasiswa->krs }}</span>
                            @endif
                            <form method="POST" action="{{ route('mahasiswa.kerja-praktek.dokumen-kp.storeKrs') }}" enctype="multipart/form-data">
                                @csrf
                            <div class="custom-file">
                                <input type="file" class="form-control custom-file-input @error('buktiKrs') is-invalid @enderror" id="customFile" name="buktiKrs">
                                <!-- <input type="file" class="form-control @error('buktiKrs') is-invalid @enderror" name="buktiKrs"> -->
                                @error('buktiKrs')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            <div class="text-left">
                                <button class="btn btn-success mt-3 col-md-2 btn-sm" type="submit">Save</button>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-success border-bottom-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-s font-weight-bold text-secondary text-uppercase mb-1">
                        Laporan KP</div>
                        <div class="mb-0 mt-3 font-weight-bold text-gray-800">
                        @if (isset($dokumenMahasiswa->laporan))
                            <span><i class="fa fa-file mr-2 mb-3"></i>{{ $dokumenMahasiswa->laporan }}</span>
                            @endif
                        <form method="POST" action="{{ route('mahasiswa.kerja-praktek.dokumen-kp.storeLaporan') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="laporan">
                                @error('laporan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            
                            <div class="text-left">
                                <button class="btn btn-success mt-3 col-md-2 btn-sm" type="submit">Save</button>
                            </div>
                        </form>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-success border-bottom-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-s font-weight-bold text-secondary text-uppercase mb-1">
                        Bukti telah diterima KP</div>
                        <div class="mb-0 mt-3 font-weight-bold text-gray-800">
                        @if (isset($dokumenMahasiswa->surat_diterima))
                            <span><i class="fa fa-file mr-2 mb-3"></i>{{ $dokumenMahasiswa->surat_diterima }}</span>
                            @endif
                            <form method="POST" action="{{ route('mahasiswa.kerja-praktek.dokumen-kp.storeDiterima') }}" enctype="multipart/form-data">
                                @csrf
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="surat_diterima">
                                @error('surat_diterima')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            
                            <div class="text-left">
                                <button class="btn btn-success mt-3 col-md-2 btn-sm" type="submit">Save</button>
                            </div>
                        </form>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-success border-bottom-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-s font-weight-bold text-secondary text-uppercase mb-1">
                        Bukti telah selesai KP</div>
                        <div class="mb-0 mt-3 font-weight-bold text-gray-800">
                        @if (isset($dokumenMahasiswa->surat_selesai))
                            <span><i class="fa fa-file mr-2 mb-3"></i>{{ $dokumenMahasiswa->surat_selesai }}</span>
                            @endif
                        <form method="POST" action="{{ route('mahasiswa.kerja-praktek.dokumen-kp.storeSelesai') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="surat_selesai">
                                @error('surat_selesai')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                           
                            <div class="text-left">
                                <button class="btn btn-success mt-3 col-md-2 btn-sm" type="submit">Save</button>
                            </div>
                        </form>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
<script>
    $('document').ready(function () {
        var filename = $('input[type=file]').val().split('\\').pop();
        console.log(filename);
    });
</script>
@endsection