@extends('layout.app')

@section('title', 'Dashboard')

@section('content')
    <div class="page-heading">
        <h3>Dashboard</h3>
    </div>
    <div class="page-content">
        <section>
            <div class="alert alert-light rounded-0">
                <h4 class="alert-heading">Selamat Datang 👋</h4>
                <p>
                    Selamat datang di
                    <strong>Sistem Satgas K3L Universitas Bhamada Slawi</strong>.
                    <br>
                    Terima kasih telah berpartisipasi dalam mendukung keselamatan mahasiswa praktik melalui pelaporan
                    insiden secara cepat dan tepat.
                </p>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="card rounded-0">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue rounded-0">
                                        <i class="iconly-boldDocument"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Data Laporan</h6>
                                    <h6 class="font-extrabold mb-0">12</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card rounded-0">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple rounded-0">
                                        <i class="iconly-boldPaper"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Data Berita</h6>
                                    <h6 class="font-extrabold mb-0">20</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card rounded-0">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon green rounded-0">
                                        <i class="iconly-boldPlay"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Data Pelatihan</h6>
                                    <h6 class="font-extrabold mb-0">8</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card rounded-0">
                        <div class="card-header">
                            <h4>Statistik Kunjungan</h4>
                        </div>
                        <div class="card-body">
                            <div id="chart-profile-visit"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
