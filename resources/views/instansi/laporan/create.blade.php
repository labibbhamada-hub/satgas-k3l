@extends('layout.app')

@section('title', 'Data Laporan')

@section('content')
    <div class="page-heading">
        <h3>Form Laporan Insiden Kecelakaan Kerja</h3>
    </div>
    <div class="page-content">
        <section class="pb-5">
            <form action="{{ url('instansi/laporan') }}" method="POST" autocomplete="off" enctype="multipart/form-data"
                id="form-submit">
                @csrf
                <!-- MAHASISWA -->
                <div class="card rounded-0">
                    <div class="card-header pb-3">
                        <h4 class="card-title">Data Mahasiswa</h4>
                    </div>
                    <div class="card-body pt-3 border-top">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="nama_mahasiswa">Nama Mahasiswa</label>
                                    <input type="text"
                                        class="form-control rounded-0 @error('nama_mahasiswa') is-invalid @enderror"
                                        name="nama_mahasiswa" id="nama_mahasiswa" value="{{ old('nama_mahasiswa') }}">
                                    @error('nama_mahasiswa')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="prodi_id">Program Studi</label>
                                    <fieldset class="form-group">
                                        <select class="form-select rounded-0 @error('prodi_id') is-invalid @enderror"
                                            id="prodi_id" name="prodi_id">
                                            <option value="">- Pilih -</option>
                                            @foreach ($prodis as $prodi)
                                                <option value="{{ $prodi->id }}"
                                                    {{ old('prodi_id') == $prodi->id ? 'selected' : '' }}>
                                                    {{ $prodi->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('prodi_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="gender">Jenis Kelamin</label>
                                    <fieldset class="form-group">
                                        <select class="form-select rounded-0 @error('gender') is-invalid @enderror"
                                            id="gender" name="gender">
                                            <option value="">- Pilih -</option>
                                            <option value="L" {{ old('gender') == 'L' ? 'selected' : '' }}>Laki-laki
                                            </option>
                                            <option value="P" {{ old('gender') == 'P' ? 'selected' : '' }}>Perempuan
                                            </option>
                                        </select>
                                        @error('gender')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="usia">Usia</label>
                                    <input type="number" class="form-control rounded-0 @error('usia') is-invalid @enderror"
                                        name="usia" id="usia" value="{{ old('usia') }}">
                                    @error('usia')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- KEJADIAN -->
                <div class="card rounded-0">
                    <div class="card-header pb-3">
                        <h4 class="card-title">Detail Kejadian</h4>
                    </div>
                    <div class="card-body pt-3 border-top">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="tanggal_kejadian">Tanggal Kejadian *</label>
                                    <input type="date"
                                        class="form-control rounded-0 @error('tanggal_kejadian') is-invalid @enderror"
                                        name="tanggal_kejadian" id="tanggal_kejadian"
                                        value="{{ old('tanggal_kejadian') }}">
                                    @error('tanggal_kejadian')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="jam_kejadian">Jam Kejadian *</label>
                                    <input type="time"
                                        class="form-control rounded-0 @error('jam_kejadian') is-invalid @enderror"
                                        name="jam_kejadian" id="jam_kejadian" value="{{ old('jam_kejadian') }}">
                                    @error('jam_kejadian')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="lokasi_kejadian">Lokasi / Ruangan Kejadian *</label>
                                    <input type="text"
                                        class="form-control rounded-0 @error('lokasi_kejadian') is-invalid @enderror"
                                        name="lokasi_kejadian" id="lokasi_kejadian" value="{{ old('lokasi_kejadian') }}">
                                    @error('lokasi_kejadian')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="tingkat_keparahan">Tingkat Keparahan *</label>
                                    <fieldset class="form-group">
                                        <select
                                            class="form-select rounded-0 @error('tingkat_keparahan') is-invalid @enderror"
                                            name="tingkat_keparahan" id="tingkat_keparahan">
                                            <option value="">- Pilih -</option>
                                            <option value="1" {{ old('tingkat_keparahan') == '1' ? 'selected' : '' }}>
                                                Ringan
                                            </option>
                                            <option value="2" {{ old('tingkat_keparahan') == '2' ? 'selected' : '' }}>
                                                Sedang
                                            </option>
                                            <option value="3" {{ old('tingkat_keparahan') == '3' ? 'selected' : '' }}>
                                                Berat
                                            </option>
                                        </select>
                                        @error('tingkat_keparahan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="jenis_insiden">Jenis Insiden *</label>
                                    <fieldset class="form-group">
                                        <select class="form-select rounded-0 @error('jenis_insiden') is-invalid @enderror"
                                            name="jenis_insiden" id="jenis_insiden">
                                            <option value="">- Pilih -</option>
                                            <option value="Terkena benda tajam"
                                                {{ old('jenis_insiden') == 'Terkena benda tajam' ? 'selected' : '' }}>
                                                Terkena benda tajam
                                            </option>
                                            <option value="Paparan radiasi / toksik"
                                                {{ old('jenis_insiden') == 'Paparan radiasi / toksik' ? 'selected' : '' }}>
                                                Paparan radiasi / toksik
                                            </option>
                                            <option value="Tumpahan / paparan B3"
                                                {{ old('jenis_insiden') == 'Tumpahan / paparan B3' ? 'selected' : '' }}>
                                                Tumpahan / paparan B3
                                            </option>
                                            <option value="Tersengat listrik"
                                                {{ old('jenis_insiden') == 'Tersengat listrik' ? 'selected' : '' }}>
                                                Tersengat listrik
                                            </option>
                                            <option value="Terpleset / terjatuh"
                                                {{ old('jenis_insiden') == 'Terpleset / terjatuh' ? 'selected' : '' }}>
                                                Terpleset / terjatuh
                                            </option>
                                            <option value="Cedera akibat alat kerja"
                                                {{ old('jenis_insiden') == 'Cedera akibat alat kerja' ? 'selected' : '' }}>
                                                Cedera akibat alat kerja
                                            </option>
                                            <option value="Lainnya"
                                                {{ old('jenis_insiden') == 'Lainnya' ? 'selected' : '' }}>
                                                Lainnya
                                            </option>
                                        </select>
                                        @error('jenis_insiden')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mb-2">
                                    <label for="kronologi">Kronologi Kejadian *</label>
                                    <textarea class="form-control rounded-0 @error('kronologi') is-invalid @enderror" rows="5" name="kronologi"
                                        id="kronologi">{{ old('kronologi') }}</textarea>
                                    @error('kronologi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mb-2">
                                    <label for="dampak">Dampak / Cedera Yang Dialami</label>
                                    <textarea class="form-control rounded-0 @error('dampak') is-invalid @enderror" rows="3" name="dampak"
                                        id="dampak">{{ old('dampak') }}</textarea>
                                    @error('dampak')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- TINDAKAN -->
                <div class="card rounded-0">
                    <div class="card-header pb-3">
                        <h4 class="card-title">Penanganan Awal</h4>
                    </div>
                    <div class="card-body pt-3 border-top">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-2">
                                    <label for="tindakan">Tindakan Yang Dilakukan Setelah Insiden *</label>
                                    <textarea class="form-control rounded-0 @error('tindakan') is-invalid @enderror" rows="4" name="tindakan"
                                        id="tindakan">{{ old('tindakan') }}</textarea>
                                    @error('tindakan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="penanganan_oleh">Penanganan Dilakukan Oleh *</label>
                                    <input type="text"
                                        class="form-control rounded-0 @error('penanganan_oleh') is-invalid @enderror"
                                        name="penanganan_oleh" id="penanganan_oleh"
                                        value="{{ old('penanganan_oleh') }}">
                                    @error('penanganan_oleh')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="kejadian_serupa">Apakah Kejadian Serupa Pernah Terjadi?</label>
                                    <fieldset class="form-group">
                                        <select
                                            class="form-select rounded-0 @error('kejadian_serupa') is-invalid @enderror"
                                            name="kejadian_serupa" id="kejadian_serupa">
                                            <option value="">- Pilih -</option>
                                            <option value="1" {{ old('kejadian_serupa') == '1' ? 'selected' : '' }}>
                                                Ya
                                            </option>
                                            <option value="0" {{ old('kejadian_serupa') == '0' ? 'selected' : '' }}>
                                                Tidak
                                            </option>
                                        </select>
                                        @error('kejadian_serupa')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- BUTTON -->
                <div class="text-end">
                    <button type="button" class="btn btn-primary rounded-0" id="btn-submit" onclick="form_submit()">
                        <span id="btn-submit-text">
                            <i class="bi bi-send me-1"></i>
                            Kirim Laporan
                        </span>
                        <span id="btn-submit-load" style="display: none;">
                            <span class="d-inline-flex align-items-center">
                                <span class="spinner-border spinner-border-sm me-2"></span>
                                Memproses...
                            </span>
                        </span>
                    </button>
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
