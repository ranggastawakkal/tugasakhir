@extends('layouts/main')
@section('title','Dashboard')

@section('main-content')
    
<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Log Activity</h1>
       
        <a id="addLog" href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#modalLog"><i
                class="fas fa-edit fa-sm text-white-50"></i>Tambah Activity</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-2">
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTableLog" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Hari dan Tanggal</th>
                            <th>Jam datang</th>
                            <th>Jam pulang</th>
                            <th>Aktivitas</th>
                            <th>Evaluasi dan Paraf</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    @foreach($logs as $log)          
                        <tr>
                            <td>{{ $log->tanggal }}</td>
                            <td>{{ $log->jam_datang }}</td>
                            <td>{{ $log->jam_pulang }}</td>
                            <td>{{ $log->aktivitas }}</td>
                            <td>{{ $log->evaluasi }}</td>
                            <td><a id="editModal" href="#" data-toggle="modal" data-target="#modalLog" data-id="{{ $log->id }}"><i class="fa fa-edit"></i></a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalLog" tabindex="-1" role="dialog" aria-labelledby="modalLog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Aktivitas</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                @include('mahasiswa.log-activity.form-modal')
            </div>
        </div>
    </div>
@endsection

@section('page-script')
<script>
    var table = $("#dataTableLog").DataTable();

    table.on('click', '#editModal', function() {
        $tr = $(this).closest('tr');
        var data = table.row($tr).data();
        var log = $(this).data('id');

        $('#tanggal').val(data[0]);
        $('#jamdatang').val(data[1]);
        $('#jampulang').val(data[2]);
        $('textarea#aktivitas').val(data[3]);
        $('#logID').val(log);

        $('#btnAddText').text('Edit');
        $('#formLog').attr('action', "{{ route('mahasiswa.log-activity.update') }}");
    });
    $('#addLog').on('click', function() {
        $('#tanggal').val('');
        $('#jamdatang').val('');
        $('#jampulang').val('');
        $('textarea#aktivitas').val('');

        $('#btnAddText').text('Add');
        $('#formLog').attr('action', "{{ route('mahasiswa.log-activity.store') }}");
    });
</script>
@endsection

