@extends('layout.app')

@section('title', 'Data Laporan')

@section('content')
    <div class="page-heading">
        <h3>Form Laporan Insiden Kecelakaan Kerja</h3>
    </div>
    <div class="page-content">
        <section class="pb-5">
            <div class="card rounded-0">
                <div class="card-header pb-3">
                    <h4 class="card-title">Data Mahasiswa</h4>
                </div>
                <div class="card-body pt-3 border-top">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="nama_mahasiswa">Nama Mahasiswa</label>
                                <input type="text" class="form-control rounded-0" name="nama_mahasiswa"
                                    id="nama_mahasiswa">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label for="usia">Usia</label>
                                <input type="number" class="form-control rounded-0" name="usia" id="usia">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label for="usia">Jenis Kelamin</label>
                                <fieldset class="form-group">
                                    <select class="form-select rounded-0" id="gender" name="gender">
                                        <option value="">- Pilih -</option>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="usia">Program Studi</label>
                                <fieldset class="form-group">
                                    <select class="form-select rounded-0" id="gender" name="gender">
                                        <option value="">- Pilih -</option>
                                        <option value="L">Profesi Ners</option>
                                        <option value="P">S1 Ilmu Keperawatan</option>
                                    </select>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="tempat">Tempat Praktik</label>
                                <input type="text" class="form-control rounded-0" name="tempat" id="tempat">
                            </div>
                        </div>
                    </div>

                    <!-- DETAIL KEJADIAN -->
                    <div class="mb-4">
                        <h5 class="border-bottom pb-2">
                            B. Detail Kejadian
                        </h5>

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Tanggal Kejadian *
                                </label>

                                <input type="datetime-local" class="form-control rounded-0" name="tanggal_kejadian">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Tanggal Laporan *
                                </label>

                                <input type="date" class="form-control rounded-0" name="tanggal_laporan">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Lokasi / Ruangan Kejadian *
                                </label>

                                <input type="text" class="form-control rounded-0" name="lokasi_kejadian">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Tingkat Keparahan *
                                </label>

                                <select class="form-select rounded-0" name="tingkat_keparahan">

                                    <option value="">
                                        -- Pilih --
                                    </option>

                                    <option value="Ringan">
                                        Ringan
                                    </option>

                                    <option value="Sedang">
                                        Sedang
                                    </option>

                                    <option value="Berat">
                                        Berat
                                    </option>

                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Jenis Insiden *
                                </label>

                                <select class="form-select rounded-0" name="jenis_insiden">

                                    <option value="">
                                        -- Pilih --
                                    </option>

                                    <option>
                                        Terkena benda tajam
                                    </option>

                                    <option>
                                        Paparan radiasi / toksik
                                    </option>

                                    <option>
                                        Tumpahan / paparan B3
                                    </option>

                                    <option>
                                        Tersengat listrik
                                    </option>

                                    <option>
                                        Terpleset / terjatuh
                                    </option>

                                    <option>
                                        Cedera akibat alat kerja
                                    </option>

                                    <option>
                                        Lainnya
                                    </option>

                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Insiden Terjadi Pada *
                                </label>

                                <select class="form-select rounded-0" name="insiden_pada">

                                    <option value="">
                                        -- Pilih --
                                    </option>

                                    <option>
                                        Mahasiswa Praktik
                                    </option>

                                    <option>
                                        Petugas
                                    </option>

                                    <option>
                                        Pasien
                                    </option>

                                    <option>
                                        Pengunjung
                                    </option>

                                </select>
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label">
                                    Kronologi Kejadian *
                                </label>

                                <textarea class="form-control rounded-0" rows="5" name="kronologi"
                                    placeholder="Jelaskan kronologi kejadian secara lengkap..."></textarea>
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label">
                                    Dampak / Cedera Yang Dialami
                                </label>

                                <textarea class="form-control rounded-0" rows="3" name="dampak"></textarea>
                            </div>

                        </div>
                    </div>

                    <!-- TINDAKAN -->
                    <div class="mb-4">
                        <h5 class="border-bottom pb-2">
                            C. Penanganan Awal
                        </h5>

                        <div class="row">

                            <div class="col-12 mb-3">
                                <label class="form-label">
                                    Tindakan Yang Dilakukan Setelah Insiden *
                                </label>

                                <textarea class="form-control rounded-0" rows="4" name="tindakan"></textarea>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Penanganan Dilakukan Oleh *
                                </label>

                                <input type="text" class="form-control rounded-0" name="penanganan_oleh">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Apakah Kejadian Serupa Pernah Terjadi?
                                </label>

                                <select class="form-select rounded-0" name="kejadian_serupa">

                                    <option value="">
                                        -- Pilih --
                                    </option>

                                    <option value="Ya">
                                        Ya
                                    </option>

                                    <option value="Tidak">
                                        Tidak
                                    </option>

                                </select>
                            </div>

                        </div>
                    </div>

                    <!-- PELAPOR -->
                    <div class="mb-4">
                        <h5 class="border-bottom pb-2">
                            D. Data Pelapor
                        </h5>

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Nama Pelapor *
                                </label>

                                <input type="text" class="form-control rounded-0" name="nama_pelapor">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Jabatan / Profesi *
                                </label>

                                <input type="text" class="form-control rounded-0" name="jabatan">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    No. Telepon *
                                </label>

                                <input type="text" class="form-control rounded-0" name="telp">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Upload Dokumentasi
                                </label>

                                <input type="file" class="form-control rounded-0" name="dokumentasi">
                            </div>

                        </div>
                    </div>

                    <!-- BUTTON -->
                    <div class="text-end">

                        <button type="submit" class="btn btn-primary rounded-0">

                            <i class="bi bi-send me-1"></i>

                            Kirim Laporan

                        </button>

                    </div>

                </div>
                {{-- <div class="card-body pt-3 border-top">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" class="form-control rounded-0" name="nama" id="nama">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="usia">Usia</label>
                                <input type="text" class="form-control rounded-0" name="usia" id="usia">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="usia">Jenis Kelamin</label>
                                <fieldset class="form-group">
                                    <select class="form-select rounded-0" id="gender" name="gender">
                                        <option value="">- Pilih -</option>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="tanggal_laporan">Tanggal Laporan</label>
                                <input type="date" class="form-control rounded-0" name="tanggal_laporan"
                                    id="tanggal_laporan">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="usia">Program Studi</label>
                                <fieldset class="form-group">
                                    <select class="form-select rounded-0" id="gender" name="gender">
                                        <option value="">- Pilih -</option>
                                        <option value="L">Profesi Ners</option>
                                        <option value="P">S1 Ilmu Keperawatan</option>
                                    </select>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="tempat">Tempat Praktik</label>
                                <input type="text" class="form-control rounded-0" name="tempat" id="tempat">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-3 border-top">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="tanggal_insiden">Tanggal Insiden</label>
                                <input type="date" class="form-control rounded-0" name="tanggal_insiden"
                                    id="tanggal_insiden">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="waktu_insiden">Waktu Insiden</label>
                                <input type="time" class="form-control rounded-0" name="waktu_insiden"
                                    id="waktu_insiden">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="waktu_insiden">Kronologi Insiden</label>
                        <textarea class="form-control rounded-0" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                </div> --}}
                <div class="card-footer d-flex justify-content-end">
                    <button class="btn btn-primary rounded-0">
                        Buat Laporan
                    </button>
                </div>
            </div>
        </section>
    </div>
@endsection
