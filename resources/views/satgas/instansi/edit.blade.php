@extends('layout.app')

@section('title', 'Perbarui Instansi')

@section('content')
    <div class="page-heading mb-4">
        <h3>
            <a href="{{ url('satgas/instansi') }}"
                class="btn btn-secondary rounded-0 d-inline-flex align-items-center justify-content-center me-2"
                style="width: 40px; height: 38px;">
                <i class="bi bi-arrow-left"></i>
            </a>
            Perbarui Instansi
        </h3>
    </div>
    <div class="page-content">
        <section class="pb-5">
            <form action="{{ url('satgas/instansi/' . $user->id) }}" method="POST" autocomplete="off" id="form-submit">
                @csrf
                @method('PUT')
                <div class="card rounded-0">
                    <div class="card-body">
                        <div class="form-group mb-2">
                            <label for="nama_instansi">Nama Instansi *</label>
                            <input type="text"
                                class="form-control rounded-0 @error('nama_instansi') is-invalid @enderror"
                                name="nama_instansi" id="nama_instansi"
                                value="{{ old('nama_instansi', $user->nama_instansi) }}">
                            @error('nama_instansi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="nama">Penanggung Jawab *</label>
                            <input type="text" class="form-control rounded-0 @error('nama') is-invalid @enderror"
                                name="nama" id="nama" value="{{ old('nama', $user->nama) }}">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="telp">
                                No. Telepon *
                                <small class="text-muted">(08xxxxxxxxxx)</small>
                            </label>
                            <input type="text" class="form-control rounded-0 @error('telp') is-invalid @enderror"
                                name="telp" id="telp" value="{{ old('telp', $user->telp) }}">
                            @error('telp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <button type="button" class="btn btn-warning rounded-0" data-bs-toggle="modal"
                            data-bs-target="#modal-reset-password">
                            Reset Password
                        </button>
                        <button type="button" class="btn btn-primary rounded-0" id="btn-submit" onclick="form_submit()">
                            <span id="btn-submit-text">
                                Simpan
                            </span>
                            <span id="btn-submit-load" style="display: none;">
                                <span class="d-inline-flex align-items-center">
                                    <span class="spinner-border spinner-border-sm me-2"></span>
                                    Memproses...
                                </span>
                            </span>
                        </button>
                    </div>
                </div>
            </form>
        </section>
    </div>
    <div class="modal fade text-left" id="modal-reset-password" tabindex="-1" role="dialog"
        aria-labelledby="Reset Password" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="Reset Password">Reset Password</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        Yakin reset password untuk instansi
                        <strong>{{ $user->nama_instansi }}</strong>?
                    </p>
                    <div class="mt-4">
                        * Password default
                        <strong>bhamada</strong>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn rounded-0" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <form action="{{ url('satgas/instansi/reset-password/' . $user->id) }}" method="GET" id="form-reset">
                        <button type="button" class="btn btn-warning rounded-0" id="btn-reset" onclick="form_reset()">
                            <span id="btn-reset-text">
                                Reset
                            </span>
                            <span id="btn-reset-load" style="display: none;">
                                <span class="d-inline-flex align-items-center">
                                    <span class="spinner-border spinner-border-sm me-2"></span>
                                    Memproses...
                                </span>
                            </span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function form_reset() {
            $('#btn-reset').prop('disabled', true);
            $('#btn-reset-text').hide();
            $('#btn-reset-load').show();
            $('#form-reset').submit();
        }

        function form_submit() {
            $('#btn-submit').prop('disabled', true);
            $('#btn-submit-text').hide();
            $('#btn-submit-load').show();
            $('#form-submit').submit();
        }
    </script>
@endsection
