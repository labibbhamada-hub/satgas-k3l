@extends('layout.app')

@section('title', 'Perbarui Profile')

@section('content')
    <div class="page-heading">
        <h3>Perbarui Profile</h3>
    </div>
    <div class="page-content">
        <section>
            <div class="card rounded-0">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-vertical" action="{{ url('perbarui-profile') }}" method="POST"
                            autocomplete="off">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="nama_instansi">Nama Instansi</label>
                                            <input type="text" id="nama_instansi"
                                                class="form-control rounded-0 @error('nama_instansi') is-invalid @enderror"
                                                name="nama_instansi"
                                                value="{{ old('nama_instansi', $user->nama_instansi) }}">
                                            @error('nama_instansi')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="nama">Nama Penanggung Jawab</label>
                                            <input type="text" id="nama"
                                                class="form-control rounded-0 @error('nama') is-invalid @enderror"
                                                name="nama" value="{{ old('nama', $user->nama) }}">
                                            @error('nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="telp">
                                                No. Telepon
                                                <small class="text-muted">(08xxxxxxxxxx)</small>
                                            </label>
                                            <input type="tel" id="telp"
                                                class="form-control rounded-0 @error('telp') is-invalid @enderror"
                                                name="telp" value="{{ old('telp', $user->telp) }}">
                                            @error('telp')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end mt-4">
                                        <button type="submit" class="btn btn-primary rounded-0">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
