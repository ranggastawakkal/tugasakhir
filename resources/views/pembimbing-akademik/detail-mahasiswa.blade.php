@extends('layouts/main')
@section('title','Dashboard')

@section('main-content')
    <h1 class="h3 mb-4 text-gray-800">Profil</h1>
    
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Biodata</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                class="fas fa-edit fa-sm text-white-50"></i> Edit Profile</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Contact Information</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @foreach ($detailmahasiswakp as $mkp)
                <table class="table table-borderless" width="100%" cellspacing="0">
                    <tbody>
                        <tr>
                            <td style="width: 20%;">Nama</td>
                            <td style="width: 80%;">{{ $mkp-> nama }}</td>
                        </tr>
                        <tr>
                            <td>NIM</td>
                            <td>{{ $mkp-> nim }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $mkp-> email}}</td>
                        </tr>
                        <tr>
                            <td>Tempat Lahir</td>
                            <td>{{ $mkp-> tempat_lahir}}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td>{{ $mkp-> tanggal_lahir}}</td>
                        </tr>
                        <tr>
                            <td>No Telp</td>
                            <td>{{ $mkp-> no_telepon}}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>{{ $mkp-> alamat}}</td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>{{ $mkp-> jenis_kelamin}}</td>
                        </tr>
                    </tbody>
                </table>
                @endforeach     
            </div>
        </div>
    </div>
@endsection