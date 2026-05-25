@extends('layout.app')

@section('title', 'Data Laporan')

@section('content')
    <div class="page-heading">
        <h3>Data Laporan</h3>
    </div>
    <div class="page-content">
        <section class="pb-5">
            <div class="card rounded-0">
                <div class="card-header pb-2">
                    <h4 class="card-title">Form Laporan</h4>
                </div>
                <div class="card-body pt-3 border-top">
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
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <button class="btn btn-primary rounded-0">
                        Buat Laporan
                    </button>
                </div>
            </div>
        </section>
    </div>
@endsection
