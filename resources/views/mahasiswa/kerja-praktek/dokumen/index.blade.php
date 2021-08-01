@extends('layouts/main')
@section('title','Dashboard')

@section('main-content')
<h1 class="h3 mb-2 text-gray-800">Dokumen Upload</h1>

    <div class="row">

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-success border-bottom-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-s font-weight-bold text-secondary text-uppercase mb-1">
                        Upload bukti KRS</div>
                        <div class="mb-0 mt-3 font-weight-bold text-gray-800">
                            <form>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            </form>
                            <div class="text-left">
                                <button class="btn btn-success mt-3 col-md-2 btn-sm">Save</button>
                            </div>
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
                        <form>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            </form>
                            <div class="text-left">
                                <button class="btn btn-success mt-3 col-md-2 btn-sm">Save</button>
                            </div>
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
                            <form>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            </form>
                            <div class="text-left">
                                <button class="btn btn-success mt-3 col-md-2 btn-sm">Save</button>
                            </div>
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
                        Bukti telah menjalani KP</div>
                        <div class="mb-0 mt-3 font-weight-bold text-gray-800">
                        <form>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            </form>
                            <div class="text-left">
                                <button class="btn btn-success mt-3 col-md-2 btn-sm">Save</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- DataTales Example -->
    <!-- <div class="card shadow mb-4">
        <div class="card-header py-2">
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr>
                            <td>1</td>
                            <td>Upload bukti KRS</td>
                            <td>
                                <form>
                                    <div class="form-group">
                                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                    </div>
                                </form>
                            </td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td>Bukti telah diterima KP</td>
                            <td>
                                <form>
                                    <div class="form-group">
                                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                    </div>
                                </form>
                            </td>
                        </tr>

                        <tr>
                            <td>3</td>
                            <td>Laporan KP</td>
                            <td>
                                <form>
                                    <div class="form-group">
                                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                    </div>
                                </form>
                            </td>
                        </tr>
                       
                        <tr>
                            <td>4</td>
                            <td>Bukti telah menjalani KP</td>
                            <td>
                                <form>
                                    <div class="form-group">
                                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                    </div>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div> -->
@endsection