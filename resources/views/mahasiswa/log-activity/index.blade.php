@extends('layouts/main')
@section('title','Log Aktivitas')

@section('main-content')
    
<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a id="addLog" href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#modalLog"><i
                class="fas fa-edit fa-sm text-white-50"></i> Tambah Log Aktivitas</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Log Aktivitas</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="dataTableLog" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>Nomor</th>
                            <th>Tanggal</th>
                            <th>Jam datang</th>
                            <th>Jam pulang</th>
                            <th>Aktivitas</th>
                            <th>Status</th>
                            <th>Evaluasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    @foreach($logs as $key => $log)          
                        <tr>
                            <td class="text-center">{{ $key+1 }}</td>
                            <td>{{ $log->tanggal }}</td>
                            <td>{{ $log->jam_datang }}</td>
                            <td>{{ $log->jam_pulang }}</td>
                            <td>{{ Str::limit($log->aktivitas, 50) }}</td>
                            @if ($log->evaluasi === '-' || $log->evaluasi === '')
                                <td class="text-danger font-weight-bold" scope="row">Belum Dievaluasi</td>
                            @else
                                <td class="text-success font-weight-bold" scope="row">Sudah Dievaluasi</td>
                            @endif
                            <td>{{ Str::limit($log->evaluasi,50) }}</td>
                            @if ($log->evaluasi === '-' || $log->evaluasi === '')
                                <td scope="row" class="text-center"><a id="editModal" class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#modalLog" data-id="{{ $log->id }}" class="text-warning"><i class="fas fa-sm fa-edit"></i> Edit</a></td>
                            @else
                                <td scope="row" class="text-center"><a class="btn btn-danger btn-sm disabled" href="#" class="text-warning"><i class="fas fa-sm fa-edit"></i> Edit</a></td>
                            @endif
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Log Aktivitas</h5>
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

        $('#tanggal').val(data[1]);
        $('#jamdatang').val(data[2]);
        $('#jampulang').val(data[3]);
        $('textarea#aktivitas').val(data[4]);
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