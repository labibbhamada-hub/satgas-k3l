<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Kecelakaan Area Kampus</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('mazer/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('mazer/assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('mazer/assets/css/app.css') }}">
</head>

<body>
    <nav class="navbar navbar-light mb-3">
        <div class="container d-block">
            <a href="{{ url('buat-laporan') }}"
                class="btn icon btn-secondary btn-sm d-inline-flex align-items-center rounded-0">
                <i class="bi bi-chevron-left me-2"></i>
                Kembali
            </a>
        </div>
    </nav>

    <div class="container pb-5">
        <div class="text-center pb-3">
            <h3>Laporan Kecelakaan Area Kampus</h3>
        </div>
        <form action="{{ url('buat-laporan/area-kampus') }}" method="POST" autocomplete="off" id="form-submit">
            @csrf
            <!-- Pelapor -->
            <div class="card rounded-0">
                <div class="card-header pb-3">
                    <h4 class="card-title">Data Pelapor</h4>
                </div>
                <div class="card-body pt-3 border-top">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="pelapor_nama">Nama Pelapor *</label>
                                <input type="text"
                                    class="form-control rounded-0 @error('pelapor_nama') is-invalid @enderror"
                                    name="pelapor_nama" id="pelapor_nama" value="{{ old('pelapor_nama') }}">
                                @error('pelapor_nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="pelapor_bagian">Unit / Program Studi *</label>
                                <input type="text"
                                    class="form-control rounded-0 @error('pelapor_bagian') is-invalid @enderror"
                                    name="pelapor_bagian" id="pelapor_bagian" value="{{ old('pelapor_bagian') }}">
                                @error('pelapor_bagian')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- MAHASISWA -->
            <div class="card rounded-0">
                <div class="card-header pb-3">
                    <h4 class="card-title">Data Korban</h4>
                </div>
                <div class="card-body pt-3 border-top">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="korban_nama">Nama Korban *</label>
                                <input type="text"
                                    class="form-control rounded-0 @error('korban_nama') is-invalid @enderror"
                                    name="korban_nama" id="korban_nama" value="{{ old('korban_nama') }}">
                                @error('korban_nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="korban_bagian">Unit / Program Studi *</label>
                                <input type="text"
                                    class="form-control rounded-0 @error('korban_bagian') is-invalid @enderror"
                                    name="korban_bagian" id="korban_bagian" value="{{ old('korban_bagian') }}">
                                @error('korban_bagian')
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
                                <label for="kejadian_serupa">
                                    Apakah Kejadian Serupa Pernah Terjadi? *
                                    <small class="text-muted">(Dalam Sebulan Terakhir)</small>
                                </label>
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
    </div>
</body>

</html>
