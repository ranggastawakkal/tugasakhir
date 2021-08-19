@extends('layouts/main')
@section('title','Dashboard')

@section('main-content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ganti Dosen Pembimbing Akademik</h1>
    </div>

    @if(!isset($dataKerjaPraktek->id_pemb_akd))
    <div class="card shadow mb-4">
        <div class="card-header py-2">
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('mahasiswa.pembimbing.akademik.store') }}">
                @csrf
                <div class="form-group">
                    <label for="selectAkademik">Pilih Dosen Pembimbing Akademik</label>
                    <select class="form-control @error('selectAkademik') is-invalid @enderror" id="selectAkademik" name="selectAkademik">
                        <option value="" data-id="">- Pilih Dosen Pembimbing -</option>
                        @foreach($akademik as $data)
                        <option value="{{ $data->id }}" data-id="{{ $data }}">{{ $data->nama }}</option>
                        @endforeach
                      
                    </select>

                    @error('selectAkademik')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="table-responsive" style="display: none;" id="dataPembimbingAkademik">
                <table class="table table-borderless" width="100%" cellspacing="0">
                    <tbody>
                        <tr>
                            <td style="width: 20%;">Nama Pembimbing</td>
                            <td style="width: 80%;" id="nama_pembimbing">P</td>
                        </tr>
                        <tr>
                            <td>NIP</td>
                            <td id="nip"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td id="email"></td>
                        </tr>
                        <tr>
                            <td>Kode Dosen</td>
                            <td id="kode_dosen"></td>
                        </tr>
                        <tr>
                            <td>Nomor Telepon</td>
                            <td id="no_telepon"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
                <button type="submit" class="btn btn-success shadow-sm mt-2"> Save</button>
            </form>
        </div>
    </div>
    @else
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Contact Information</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderless" width="100%" cellspacing="0">
                    <tbody>
                        <tr>
                            <td style="width: 20%;">Nama Dosen</td>
                            <td style="width: 80%;">p</td>
                        </tr>
                        <tr>
                            <td>NIP</td>
                            <td>{{ $dataKerjaPraktek->pembimbingAkademik->nip }}</td>
                        </tr>
                        <tr>
                            <td>Kode Dosen</td>
                            <td>{{ $dataKerjaPraktek->pembimbingAkademik->kode_dosen }}</td>
                        </tr>
                        <tr>
                            <td>No Telp</td>
                            <td>{{ $dataKerjaPraktek->pembimbingAkademik->no_telepon }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $dataKerjaPraktek->pembimbingAkademik->email }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
@endsection

@section('page-script')
<script>
    $('document').ready(function() {
        $('#dataPembimbingAkademik').hide();
    });

    $('#selectAkademik').change(function() {
        var dataSelected = $('#selectAkademik').find(":selected").attr('data-id');
        console.log(dataSelected);
        if (dataSelected != "") {
            $('#dataPembimbingAkademik').show();
            var data = JSON.parse(dataSelected);
            $('#nama_pembimbing').html(data.nama);
            $('#nip').html(data.nip);
            $('#kode_dosen').html(data.kode_dosen);
            $('#email').html(data.email);
            $('#no_telepon').html(data.no_telepon);
        } else {
            $('#dataPembimbingAkademik').hide();
        }
    });
</script>
@endsection