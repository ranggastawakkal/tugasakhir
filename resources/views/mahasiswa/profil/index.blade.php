@extends('layouts/main')
@section('title','Profil')

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
        <a href="{{ route('mahasiswa.profil.edit') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                class="fas fa-edit fa-sm text-white-50"></i> Edit Profile</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Profil</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderless" width="100%" cellspacing="0">
                    <tbody>
                        <tr>
                            <th style="width: 20%;">Nama Mahasiswa</th>
                            <td>:</td>
                            <td style="width: 80%;">{{ $user->nama }}</td>
                        </tr>
                        <tr>
                            <th>NIM</th>
                            <td>:</td>
                            <td>{{ $user->nim }}</td>
                        </tr>
                        <tr>
                            <th>Program Studi</th>
                            <td>:</td>
                            <td>{{ $user->kelas->prodi->nama_prodi }}</td>
                        </tr>
                        <tr>
                            <th>Kelas</th>
                            <td>:</td>
                            <td>{{ $user->kelas->nama_kelas }}</td>
                        </tr>
                        <tr>
                            <th>Tempat Lahir</th>
                            <td>:</td>
                            <td>{{ $user->tempat_lahir}}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Lahir</th>
                            <td>:</td>
                            <td>{{ $user->tanggal_lahir}}</td>
                        </tr>
                        <tr>
                            <th>No. Telepon</th>
                            <td>:</td>
                            <td>{{ $user->no_telepon}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>:</td>
                            <td>{{ $user->email}}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>:</td>
                            <td>{{ $user->alamat}}</td>
                        </tr>
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
@endsection