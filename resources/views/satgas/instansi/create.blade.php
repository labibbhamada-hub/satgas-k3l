@extends('layout.app')

@section('title', 'Tambah Instansi')

@section('content')
    <div class="page-heading mb-4">
        <h3>
            <a href="{{ url('satgas/instansi') }}"
                class="btn btn-secondary rounded-0 d-inline-flex align-items-center justify-content-center me-2"
                style="width: 40px; height: 38px;">
                <i class="bi bi-arrow-left"></i>
            </a>
            Tambah Instansi
        </h3>
    </div>
    <div class="page-content">
        <section class="pb-5">
            <form action="{{ url('satgas/instansi') }}" method="POST" autocomplete="off" id="form-submit">
                @csrf
                <div class="card rounded-0">
                    <div class="card-body">
                        <div class="form-group mb-2">
                            <label for="nama_instansi">Nama Instansi</label>
                            <input type="text"
                                class="form-control rounded-0 @error('nama_instansi') is-invalid @enderror"
                                name="nama_instansi" id="nama_instansi" value="{{ old('nama_instansi') }}">
                            @error('nama_instansi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="nama">Penanggung Jawab</label>
                            <input type="text" class="form-control rounded-0 @error('nama') is-invalid @enderror"
                                name="nama" id="nama" value="{{ old('nama') }}">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="telp">No. Telepon</label>
                            <input type="text" class="form-control rounded-0 @error('telp') is-invalid @enderror"
                                name="telp" id="telp" value="{{ old('telp') }}">
                            @error('telp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mt-4">
                            * Password default
                            <strong>bhamada</strong>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-end">
                            <button type="button" class="btn btn-primary rounded-0" id="btn-submit"
                                onclick="form_submit()">
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
                </div>
            </form>
        </section>
    </div>
@endsection

@section('script')
    <script>
        function form_submit() {
            $('#btn-submit').prop('disabled', true);
            $('#btn-submit-text').hide();
            $('#btn-submit-load').show();
            $('#form-submit').submit();
        }
    </script>
@endsection
