<form id="formLog" method="POST" action="{{ route('mahasiswa.log-activity.store') }}">
    @csrf
    <input id="logID" name="id" type="hidden">
    <div class="modal-body">
    <div class="form-group row">
        <label for="tanggal" class="col-md-2 col-form-label text-md-left ml-2">Tanggal</label>

        <div class="col-md-9">
            <input id="tanggal" type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" value="{{ old('tanggal') }}" required autocomplete="tanggal" autofocus>

            @error('tanggal')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="jamdatang" class="col-md-2 col-form-label text-md-left ml-2">Jam Datang</label>

        <div class="col-md-9">
            <input id="jamdatang" type="time" class="form-control @error('jamdatang') is-invalid @enderror" name="jamdatang" value="{{ old('jamdatang') }}" required autocomplete="jamdatang" autofocus>

            @error('jamdatang')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="jampulang" class="col-md-2 col-form-label text-md-left ml-2">Jam Pulang</label>

        <div class="col-md-9">
            <input id="jampulang" type="time" class="form-control @error('jampulang') is-invalid @enderror" name="jampulang" value="{{ $jampulang ?? old('jampulang') }}" required autocomplete="jampulang" autofocus>

            @error('jampulang')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="aktivitas" class="col-md-2 col-form-label text-md-left ml-2">Aktivitas</label>

        <div class="col-md-9">
            <textarea id="aktivitas" class="form-control @error('aktivitas') is-invalid @enderror" name="aktivitas" value="{{ $log->aktivitas ?? old('aktivitas') }}" required autocomplete="aktivitas" autofocus></textarea>

            @error('aktivitas')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    </div>
    <div class="modal-footer">
        <button id="btnCancel" class="btn btn-secondary" type="reset" data-dismiss="modal">Cancel</button>
        <button id="btnAdd" class="btn btn-success" type="submit"><span id="btnAddText">Add</span></button>
    </div>
</form>