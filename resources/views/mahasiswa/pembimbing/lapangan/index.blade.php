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
        <h1 class="h3 mb-0 text-gray-800">Biodata Pembimbing Lapangan</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
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
                            <td style="width: 20%;">Nama</td>
                            <td style="width: 80%;">Ranggas</td>
                        </tr>
                        <tr>
                            <td>NIP</td>
                            <td>54321</td>
                        </tr>
                        <tr>
                            <td>No Telp</td>
                            <td>08123456</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>ranggas@gmail.com</td>
                        </tr>
                        <tr>
                            <td>Perusahaan</td>
                            <td>Telkom</td>
                        </tr>
                        <tr>
                            <td>Posisi</td>
                            <td>IT Manager</td>
                        </tr>
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
@endsection