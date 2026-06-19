@extends('layout.app')

@section('title', 'Data Laporan')

@section('content')
    <div class="page-heading">
        <h3>Form Laporan Insiden Kecelakaan Kerja</h3>
    </div>
    <div class="page-content">
        <section class="pb-5">
            <form action="{{ url('instansi/laporan') }}" method="POST" enctype="multipart/form-data">
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
                                    <label for="gender">Jenis Kelamin</label>
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
                                    <label for="prodi_id">Program Studi</label>
                                    <select class="form-select rounded-0" id="prodi_id" name="prodi_id">
                                        <option value="">- Pilih -</option>
                                        <option value="L">Profesi Ners</option>
                                        <option value="P">S1 Ilmu Keperawatan</option>
                                    </select>
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
                    {{-- <div class="card-footer d-flex justify-content-end">
                        <button class="btn btn-primary rounded-0">
                            Buat Laporan
                        </button>
                    </div> --}}
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
                                    <input type="datetime-local" class="form-control rounded-0" name="tanggal_kejadian"
                                        id="tanggal_kejadian">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="tanggal_laporan">Tanggal Laporan *</label>
                                    <input type="datetime-local" class="form-control rounded-0" name="tanggal_laporan"
                                        id="tanggal_laporan">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="lokasi_kejadian">Lokasi / Ruangan Kejadian *</label>
                                    <input type="text" class="form-control rounded-0" name="lokasi_kejadian"
                                        id="lokasi_kejadian">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="tingkat_keparahan">Tingkat Keparahan *</label>
                                    <select class="form-select rounded-0" name="tingkat_keparahan" id="tingkat_keparahan">
                                        <option value="">- Pilih -</option>
                                        <option value="1">Ringan</option>
                                        <option value="2">Sedang</option>
                                        <option value="3">Berat</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="jenis_insiden">Jenis Insiden *</label>
                                    <select class="form-select rounded-0" name="jenis_insiden" id="jenis_insiden">
                                        <option value="">- Pilih -</option>
                                        <option>Terkena benda tajam</option>
                                        <option>Paparan radiasi / toksik</option>
                                        <option>Tumpahan / paparan B3</option>
                                        <option>Tersengat listrik</option>
                                        <option>Terpleset / terjatuh</option>
                                        <option>Cedera akibat alat kerja</option>
                                        <option>Lainnya</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="insiden_pada">Insiden Terjadi Pada *</label>
                                    <select class="form-select rounded-0" name="insiden_pada" id="insiden_pada">
                                        <option value="">- Pilih -</option>
                                        <option>Mahasiswa Praktik</option>
                                        <option>Petugas</option>
                                        <option>Pasien</option>
                                        <option>Pengunjung</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mb-2">
                                    <label for="kronologi">Kronologi Kejadian *</label>
                                    <textarea class="form-control rounded-0" rows="5" name="kronologi" id="kronologi"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mb-2">
                                    <label for="dampak">Dampak / Cedera Yang Dialami</label>
                                    <textarea class="form-control rounded-0" rows="3" name="dampak" id="dampak"></textarea>
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
                                    <textarea class="form-control rounded-0" rows="4" name="tindakan" id="tindakan"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="penanganan_oleh">Penanganan Dilakukan Oleh *</label>
                                    <input type="text" class="form-control rounded-0" name="penanganan_oleh"
                                        id="penanganan_oleh">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="kejadian_serupa">Apakah Kejadian Serupa Pernah Terjadi?</label>
                                    <select class="form-select rounded-0" name="kejadian_serupa" id="kejadian_serupa">
                                        <option value="">- Pilih -</option>
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- PELAPOR -->
                <div class="card rounded-0">
                    <div class="card-header pb-3">
                        <h4 class="card-title">Data Pelapor</h4>
                    </div>
                    <div class="card-body pt-3 border-top">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="nama_pelapor">Nama Pelapor *</label>
                                    <input type="text" class="form-control rounded-0" name="nama_pelapor"
                                        id="nama_pelapor">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="jabatan">Jabatan / Profesi *</label>
                                    <input type="text" class="form-control rounded-0" name="jabatan" id="jabatan">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="telp">No. Telepon *</label>
                                    <input type="text" class="form-control rounded-0" name="telp" id="telp">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="dokumentasi">Upload Dokumentasi</label>
                                    <input type="file" class="form-control rounded-0" name="dokumentasi"
                                        id="dokumentasi">
                                </div>
                            </div>
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
            </form>
        </section>
    </div>
@endsection
