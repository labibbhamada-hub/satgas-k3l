@extends('layout.app')

@section('title', 'Data Laporan')

@section('content')
    <div class="page-heading">
        <h3>Data Laporan</h3>
    </div>
    <div class="page-content">
        <section class="pb-5">
            <div class="card rounded-0">
                <div class="card-content">
                    <div class="card-body border-bottom pb-2">
                        <div class="row justify-content-end">
                            <div class="col-md-4">
                                <div class="input-group mb-3">
                                    <input type="search" class="form-control rounded-0" placeholder="Cari Instansi"
                                        aria-label="Cari Instansi" aria-describedby="keyword">
                                    <button
                                        class="btn btn-outline-secondary rounded-0 d-flex align-items-center justify-content-center"
                                        type="button" id="keyword" name="keyword">
                                        <i class="bi bi-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Table with no outer spacing -->
                    <div class="table-responsive">
                        <table class="table mb-0 table-lg">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Mahasiswa</th>
                                    <th>Kejadian</th>
                                    <th>Status</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($laporans as $laporan)
                                    <tr>
                                        <td class="text-center align-top">{{ $loop->iteration }}</td>
                                        <td class="align-top">
                                            {{ $laporan->nama_mahasiswa }}
                                            <br>
                                            {{ $laporan->prodi->nama }}
                                        </td>
                                        <td class="align-top">
                                            {{ $laporan->jenis_insiden }}
                                            <hr class="my-1">
                                            {{ $laporan->lokasi_kejadian }}
                                        </td>
                                        <td class="align-top">
                                            @if ($laporan->status == 'dikirim')
                                                <span class="badge bg-primary rounded-0">Dikirim</span>
                                            @elseif ($laporan->status == 'diverifikasi')
                                                <span class="badge bg-info rounded-0">Diverifikasi</span>
                                            @elseif ($laporan->status == 'ditolak')
                                                <span class="badge bg-danger rounded-0">Ditolak</span>
                                            @elseif ($laporan->status == 'selesai')
                                                <span class="badge bg-success rounded-0">Selesai</span>
                                            @endif
                                        </td>
                                        <td class="align-top">
                                            @if ($laporan->status == 'dikirim')
                                                <a href="{{ url('satgas/laporan/' . $laporan->id) }}"
                                                    class="btn btn-outline-warning btn-sm rounded-0">
                                                    Verifikasi
                                                </a>
                                            @else
                                                <a href="{{ url('satgas/laporan/' . $laporan->id) }}"
                                                    class="btn btn-outline-info btn-sm rounded-0">
                                                    Lihat
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
