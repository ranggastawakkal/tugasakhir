@extends('layouts/main')
@section('title','Dashboard')

@section('main-content')
    
    <!-- Page Heading -->
    <!-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2>Biodata Mahasiswa</h2>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <button class="btn btn-success">Edit profile</button>
        </div>
    </div>
    </div> -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Biodata Mahasiswa</h1>
        <a href="{{ route('mahasiswa.profil.edit') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                class="fas fa-edit fa-sm text-white-50"></i> Edit Profile</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Contact Information</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderless" width="100%" cellspacing="0">
                    <tbody>
                        <tr>
                            <td style="width: 20%;">Nama Mahasiswa</td>
                            <td style="width: 80%;">{{ $user->nama }}</td>
                        </tr>
                        <tr>
                            <td>NIM</td>
                            <td>{{ $user->nim }}</td>
                        </tr>
                        <tr>
                            <td>Program Studi</td>
                            <td>{{ $user->kelas->prodi->nama_prodi }}</td>
                        </tr>
                        <tr>
                            <td>Tempat Lahir</td>
                            <td>{{ $user->tempat_lahir}}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td>{{ $user->tanggal_lahir}}</td>
                        </tr>
                        <tr>
                            <td>No Telp</td>
                            <td>{{ $user->no_telepon}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $user->email}}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>{{ $user->alamat}}</td>
                        </tr>
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
@endsection