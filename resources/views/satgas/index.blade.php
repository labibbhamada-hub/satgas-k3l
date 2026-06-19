@extends('layout.app')

@section('title', 'Dashboard')

@section('content')
    <div class="page-heading">
        <h3>Dashboard</h3>
    </div>
    <div class="page-content">
        <section class="pb-5">
            <div class="alert alert-light rounded-0 mb-3">
                <h4 class="alert-heading">Selamat Datang 👋</h4>
                <p>
                    Selamat datang di
                    <strong>Sistem Satgas K3L Universitas Bhamada Slawi</strong>.
                    <br>
                    Mari bersama menjaga keamanan dan keselamatan dengan memantau serta menindaklanjuti setiap laporan yang
                    masuk.
                </p>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="card rounded-0 mb-3">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="stats-icon orange rounded-0 me-3">
                                    <i class="iconly-boldTime-Circle"></i>
                                </div>
                                <div>
                                    <h6 class="text-muted font-semibold mb-1">Laporan Menunggu</h6>
                                    <h6 class="font-extrabold mb-0">{{ $laporan_menunggu }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card rounded-0 mb-3">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="stats-icon purple rounded-0 me-3">
                                    <i class="iconly-boldActivity"></i>
                                </div>
                                <div>
                                    <h6 class="text-muted font-semibold mb-1">Laporan Proses</h6>
                                    <h6 class="font-extrabold mb-0">{{ $laporan_proses }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card rounded-0 mb-3">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="stats-icon green rounded-0 me-3">
                                    <i class="iconly-boldTick-Square"></i>
                                </div>
                                <div>
                                    <h6 class="text-muted font-semibold mb-1">Laporan Selesai</h6>
                                    <h6 class="font-extrabold mb-0">{{ $laporan_selesai }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
