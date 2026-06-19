@extends('layout.app')

@section('title', 'Lihat Laporan')

@section('content')
    <div class="page-heading mb-4">
        <h3>
            <a href="{{ url('instansi/laporan') }}"
                class="btn btn-secondary rounded-0 d-inline-flex align-items-center justify-content-center me-2"
                style="width: 40px; height: 38px;">
                <i class="bi bi-arrow-left"></i>
            </a>
            Lihat Laporan
        </h3>
    </div>
    <div class="page-content">
        <section class="pb-5">
            <div class="card rounded-0 mb-4">
                <div class="card-content">
                    <div class="card-header border-bottom pb-3 d-flex justify-content-between align-items-center">
                        <h4>Detail Laporan</h4>
                        @if ($laporan->status == 'dikirim')
                            <span class="badge bg-primary rounded-0">Dikirim</span>
                        @elseif ($laporan->status == 'diverifikasi')
                            <span class="badge bg-info rounded-0">Diverifikasi</span>
                        @elseif ($laporan->status == 'ditolak')
                            <span class="badge bg-danger rounded-0">Ditolak</span>
                        @elseif ($laporan->status == 'selesai')
                            <span class="badge bg-success rounded-0">Selesai</span>
                        @endif
                    </div>
                    <div class="card-body py-3">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <strong>Instansi</strong>
                                    <br>
                                    {{ $laporan->user->nama_instansi }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <strong>Penanggung Jawab</strong>
                                    <br>
                                    {{ $laporan->user->nama }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <strong>No. Telepon</strong>
                                    <br>
                                    {{ $laporan->user->telp }}
                                </div>
                            </div>
                            @if ($laporan->status == 'dikirim')
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <strong>Tanggal Laporan</strong>
                                        <br>
                                        {{ Carbon\Carbon::parse($laporan->tanggal_laporan)->translatedFormat('d F Y') }}
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="card-body border-top py-3">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <strong>Nama Mahasiswa</strong>
                                    <br>
                                    {{ $laporan->nama_mahasiswa }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <strong>Prodi</strong>
                                    <br>
                                    {{ $laporan->prodi->nama }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <strong>Jenis Kelamin</strong>
                                    <br>
                                    @if ($laporan->gender == 'L')
                                        Laki-laki
                                    @else
                                        Perempuan
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <strong>Usia</strong>
                                    <br>
                                    {{ $laporan->usia }} Tahun
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
                                    {{ Carbon\Carbon::parse($laporan->tanggal_kejadian)->translatedFormat('d F Y') }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <strong>Jam Kejadian</strong>
                                    <br>
                                    {{ Carbon\Carbon::parse($laporan->jam_kejadian)->format('H:i') }} WIB
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <strong>Lokasi Kejadian</strong>
                                    <br>
                                    {{ $laporan->lokasi_kejadian }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <strong>Tingkat Keparahan</strong>
                                    <br>
                                    @if ($laporan->tingkat_keparahan == 1)
                                        Rendah
                                    @elseif ($laporan->tingkat_keparahan == 2)
                                        Sedang
                                    @elseif ($laporan->tingkat_keparahan == 3)
                                        Tinggi
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <strong>Jenis Insiden</strong>
                                    <br>
                                    {{ $laporan->jenis_insiden }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body border-top py-3">
                        <div class="mb-2">
                            <strong>Kronologi Kejadian</strong>
                            <br>
                            {!! nl2br(e($laporan->kronologi)) !!}
                        </div>
                        <div class="mb-2">
                            <strong>Dampak / Cedera Yang Dialami</strong>
                            <br>
                            {!! nl2br(e($laporan->kronologi)) !!}
                        </div>
                    </div>
                    <div class="card-body border-top py-3">
                        <div class="mb-2">
                            <strong>Tindakan Yang Dilakukan Setelah Insiden</strong>
                            <br>
                            {!! nl2br(e($laporan->tindakan)) !!}
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
                                    @if ($laporan->kejadian_serupa)
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
            @if ($laporan->status != 'dikirim')
                <div class="card rounded-0 mb-4">
                    <div class="card-content">
                        <div class="card-header border-bottom pb-3">
                            <h4>Tindak Lanjut</h4>
                        </div>
                        <div class="card-body py-3">
                            <div class="mb-2">
                                <strong>Catatan Verifikasi</strong>
                                <br>
                                {!! nl2br(e($laporan->catatan_verifikasi)) !!}
                            </div>
                        </div>
                        <div class="card-body border-top py-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <strong>Tanggal Laporan</strong>
                                        <br>
                                        {{ Carbon\Carbon::parse($laporan->tanggal_laporan)->translatedFormat('d F Y') }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <strong>Tanggal Verifikasi</strong>
                                        <br>
                                        {{ Carbon\Carbon::parse($laporan->tanggal_verifikasi)->translatedFormat('d F Y') }}
                                    </div>
                                </div>
                                @if ($laporan->status == 'selesai')
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <strong>Tanggal Selesai</strong>
                                            <br>
                                            {{ Carbon\Carbon::parse($laporan->tanggal_selesai)->translatedFormat('d F Y') }}
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif
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
