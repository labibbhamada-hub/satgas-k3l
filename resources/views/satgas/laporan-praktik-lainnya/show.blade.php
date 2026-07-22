@extends('layout.app')

@section('title', 'Lihat Laporan')

@section('content')
    <div class="page-heading mb-4">
        <h3>
            <a href="{{ url('satgas/laporan-praktik-lainnya') }}"
                class="btn btn-secondary rounded-0 d-inline-flex align-items-center justify-content-center me-2"
                style="width: 40px; height: 38px;">
                <i class="bi bi-arrow-left"></i>
            </a>
            Lihat Laporan
        </h3>
    </div>
    <div class="page-content">
        <section class="pb-5">
            <div class="text-end mb-4">
                <a href="{{ url('satgas/laporan-praktik-lainnya/print/' . $laporan->id) }}"
                    class="btn btn-outline-dark rounded-0 d-inline-flex align-items-center justify-content-center"
                    style="width: 38px; height: 38px;" target="_blank">
                    <i class="bi bi-printer"></i>
                </a>
            </div>
            <div class="card rounded-0 mb-4">
                <div class="card-content">
                    <div class="card-header">
                        <h4>Detail Laporan</h4>
                    </div>
                    <div class="card-body py-3">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <strong>Nama Pelapor</strong>
                                    <br>
                                    {{ $laporan->pelapor_nama }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <strong>Unit / Program Studi</strong>
                                    <br>
                                    {{ $laporan->pelapor_bagian }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body border-top py-3">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <strong>Nama Korban</strong>
                                    <br>
                                    {{ $laporan->korban_nama }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <strong>Unit / Program Studi</strong>
                                    <br>
                                    {{ $laporan->korban_bagian }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body border-top py-3">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <strong>Tanggal Kejadian</strong>
                                    <br>
                                    {{ Carbon\Carbon::parse($laporan->kejadian_tanggal)->translatedFormat('d F Y') }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <strong>Jam Kejadian</strong>
                                    <br>
                                    {{ Carbon\Carbon::parse($laporan->kejadian_jam)->format('H:i') }} WIB
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <strong>Tempat Praktik</strong>
                                    <br>
                                    {{ $laporan->kejadian_tempat }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <strong>Lokasi Kejadian</strong>
                                    <br>
                                    {{ $laporan->kejadian_lokasi }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <strong>Jenis Insiden</strong>
                                    <br>
                                    {{ $laporan->kejadian_jenis }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body border-top py-3">
                        <div class="mb-2">
                            <strong>Kronologi Kejadian</strong>
                            <br>
                            {!! nl2br(e($laporan->kejadian_kronologi)) !!}
                        </div>
                        <div class="mb-2">
                            <strong>Dampak / Cedera Yang Dialami</strong>
                            <br>
                            {!! nl2br(e($laporan->kejadian_dampak)) !!}
                        </div>
                    </div>
                    <div class="card-body border-top py-3">
                        <div class="mb-2">
                            <strong>Tindakan Yang Dilakukan Setelah Insiden</strong>
                            <br>
                            {!! nl2br(e($laporan->penanganan_tindakan)) !!}
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <strong>Penanganan Dilakukan Oleh</strong>
                                    <br>
                                    {{ $laporan->penanganan_oleh }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <strong>Apakah Kejadian Serupa Pernah Terjadi?</strong>
                                    <br>
                                    @if ($laporan->is_pernah)
                                        Ya
                                    @else
                                        Tidak
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
