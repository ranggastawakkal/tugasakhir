@extends('layouts/main')
@section('title','Pembimbing Akademik')

@section('main-content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        @if(isset($dataKerjaPraktek->id_pemb_akd))
        <a href="{{ route('mahasiswa.pembimbing.akademik.edit') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                class="fas fa-edit fa-sm text-white-50"></i> Ubah Pembimbing</a>
        @endif
    </div>

    @if(!isset($dataKerjaPraktek->id_pemb_akd))
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Pembimbing Akademik</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('mahasiswa.pembimbing.akademik.store') }}">
                @csrf
                <div class="form-group">
                    <label class=" font-weight-bold" for="selectAkademik">Pilih Pembimbing Akademik</label>
                    <select class="form-control @error('selectAkademik') is-invalid @enderror" id="selectAkademik" name="selectAkademik">
                        <option value="" data-id="">- Pilih Pembimbing Akademik-</option>
                        @foreach($dosen as $data)
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
                            <th style="width: 20%;">Nama Pembimbing</th>
                            <td>:</td>
                            <td style="width: 80%;" id="nama_pembimbing">P</td>
                        </tr>
                        <tr>
                            <th>NIP</th>
                            <td>:</td>
                            <td id="nip"></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>:</td>
                            <td id="email"></td>
                        </tr>
                        <tr>
                            <th>Kode Dosen</th>
                            <td>:</td>
                            <td id="kode_dosen"></td>
                        </tr>
                        <tr>
                            <th>No. Telepon</th>
                            <td>:</td>
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
            <h6 class="m-0 font-weight-bold text-success">Pembimbing Akademik</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderless" width="100%" cellspacing="0">
                    <tbody>
                        <tr>
                            <th style="width: 20%;">Nama Pembimbing</th>
                            <td>:</td>
                            <td style="width: 80%;">{{ $dataKerjaPraktek->pembimbingAkademik->nama }}</td>
                        </tr>
                        <tr>
                            <th>NIP</th>
                            <td>:</td>
                            <td>{{ $dataKerjaPraktek->pembimbingAkademik->nip }}</td>
                        </tr>
                        <tr>
                            <th>Kode Dosen</th>
                            <td>:</td>
                            <td>{{ $dataKerjaPraktek->pembimbingAkademik->kode_dosen }}</td>
                        </tr>
                        <tr>
                            <th>No. Telepon</th>
                            <td>:</td>
                            <td>{{ $dataKerjaPraktek->pembimbingAkademik->no_telepon }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>:</td>
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