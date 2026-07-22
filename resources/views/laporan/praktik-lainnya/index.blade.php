<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Kecelakaan Lahan Praktik Lainnya</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('mazer/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('mazer/assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('mazer/assets/css/app.css') }}">

    <link rel="shortcut icon" href="{{ asset('storage/asset/logo-bhamada-sm.png') }}" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('mazer/assets/vendors/toastify/toastify.css') }}">
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
            <h3>Laporan Kecelakaan Lahan Praktik Lainnya</h3>
        </div>
        <form action="{{ url('buat-laporan/praktik-lainnya') }}" method="POST" autocomplete="off" id="form-submit">
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
                                <label for="kejadian_tanggal">Tanggal Kejadian *</label>
                                <input type="date"
                                    class="form-control rounded-0 @error('kejadian_tanggal') is-invalid @enderror"
                                    name="kejadian_tanggal" id="kejadian_tanggal"
                                    value="{{ old('kejadian_tanggal') }}">
                                @error('kejadian_tanggal')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="kejadian_jam">Jam Kejadian *</label>
                                <input type="time"
                                    class="form-control rounded-0 @error('kejadian_jam') is-invalid @enderror"
                                    name="kejadian_jam" id="kejadian_jam" value="{{ old('kejadian_jam') }}">
                                @error('kejadian_jam')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="kejadian_tempat">Tempat Praktik *</label>
                                <input type="text"
                                    class="form-control rounded-0 @error('kejadian_tempat') is-invalid @enderror"
                                    name="kejadian_tempat" id="kejadian_tempat"
                                    value="{{ old('kejadian_tempat') }}">
                                @error('kejadian_tempat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="kejadian_lokasi">Lokasi / Ruangan Kejadian *</label>
                                <input type="text"
                                    class="form-control rounded-0 @error('kejadian_lokasi') is-invalid @enderror"
                                    name="kejadian_lokasi" id="kejadian_lokasi"
                                    value="{{ old('kejadian_lokasi') }}">
                                @error('kejadian_lokasi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="kejadian_jenis">Jenis Insiden *</label>
                                <fieldset class="form-group">
                                    <select class="form-select rounded-0 @error('kejadian_jenis') is-invalid @enderror"
                                        name="kejadian_jenis" id="kejadian_jenis">
                                        <option value="">- Pilih -</option>
                                        <option value="Terkena benda tajam"
                                            {{ old('kejadian_jenis') == 'Terkena benda tajam' ? 'selected' : '' }}>
                                            Terkena benda tajam
                                        </option>
                                        <option value="Paparan radiasi / toksik"
                                            {{ old('kejadian_jenis') == 'Paparan radiasi / toksik' ? 'selected' : '' }}>
                                            Paparan radiasi / toksik
                                        </option>
                                        <option value="Tumpahan / paparan B3"
                                            {{ old('kejadian_jenis') == 'Tumpahan / paparan B3' ? 'selected' : '' }}>
                                            Tumpahan / paparan B3
                                        </option>
                                        <option value="Tersengat listrik"
                                            {{ old('kejadian_jenis') == 'Tersengat listrik' ? 'selected' : '' }}>
                                            Tersengat listrik
                                        </option>
                                        <option value="Terpleset / terjatuh"
                                            {{ old('kejadian_jenis') == 'Terpleset / terjatuh' ? 'selected' : '' }}>
                                            Terpleset / terjatuh
                                        </option>
                                        <option value="Cedera akibat alat kerja"
                                            {{ old('kejadian_jenis') == 'Cedera akibat alat kerja' ? 'selected' : '' }}>
                                            Cedera akibat alat kerja
                                        </option>
                                        <option value="Lainnya"
                                            {{ old('kejadian_jenis') == 'Lainnya' ? 'selected' : '' }}>
                                            Lainnya
                                        </option>
                                    </select>
                                    @error('kejadian_jenis')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="form-group mb-2" id="layout-kejadian_jenis_lainnya" style="display: none;">
                                <input type="text"
                                    class="form-control rounded-0 @error('kejadian_jenis_lainnya') is-invalid @enderror"
                                    name="kejadian_jenis_lainnya" id="kejadian_jenis_lainnya"
                                    value="{{ old('kejadian_jenis_lainnya') }}">
                                @error('kejadian_jenis_lainnya')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group mb-2">
                                <label for="kejadian_kronologi">Kronologi Kejadian *</label>
                                <textarea class="form-control rounded-0 @error('kejadian_kronologi') is-invalid @enderror" rows="5"
                                    name="kejadian_kronologi" id="kejadian_kronologi">{{ old('kejadian_kronologi') }}</textarea>
                                @error('kejadian_kronologi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group mb-2">
                                <label for="kejadian_dampak">Dampak / Cedera Yang Dialami *</label>
                                <textarea class="form-control rounded-0 @error('kejadian_dampak') is-invalid @enderror" rows="3"
                                    name="kejadian_dampak" id="kejadian_dampak">{{ old('kejadian_dampak') }}</textarea>
                                @error('kejadian_dampak')
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
                                <label for="penanganan_tindakan">Tindakan Yang Dilakukan Setelah Insiden *</label>
                                <textarea class="form-control rounded-0 @error('penanganan_tindakan') is-invalid @enderror" rows="4"
                                    name="penanganan_tindakan" id="penanganan_tindakan">{{ old('penanganan_tindakan') }}</textarea>
                                @error('penanganan_tindakan')
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
                                <label for="is_pernah">
                                    Apakah Kejadian Serupa Pernah Terjadi? *
                                    <small class="text-muted">(Dalam Sebulan Terakhir)</small>
                                </label>
                                <fieldset class="form-group">
                                    <select class="form-select rounded-0 @error('is_pernah') is-invalid @enderror"
                                        name="is_pernah" id="is_pernah">
                                        <option value="">- Pilih -</option>
                                        <option value="1" {{ old('is_pernah') == '1' ? 'selected' : '' }}>
                                            Ya
                                        </option>
                                        <option value="0" {{ old('is_pernah') == '0' ? 'selected' : '' }}>
                                            Tidak
                                        </option>
                                    </select>
                                    @error('is_pernah')
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

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="{{ asset('mazer/assets/vendors/toastify/toastify.js') }}"></script>
    <script src="{{ asset('mazer/assets/js/extensions/toastify.js') }}"></script>

    @include('alert.toastify')

    <script>
        $(function() {
            function toggle_jenis_lainnya() {
                if ($('#kejadian_jenis').val() === 'Lainnya') {
                    $('#layout-kejadian_jenis_lainnya').show();
                } else {
                    $('#layout-kejadian_jenis_lainnya').hide();
                    $('#kejadian_jenis_lainnya').val('');
                }
            }

            toggle_jenis_lainnya();

            $('#kejadian_jenis').on('change', function() {
                toggle_jenis_lainnya();
            });
        });

        function form_submit() {
            $('#btn-submit').prop('disabled', true);
            $('#btn-submit-text').hide();
            $('#btn-submit-load').show();
            $('#form-submit').submit();
        }
    </script>
</body>

</html>
