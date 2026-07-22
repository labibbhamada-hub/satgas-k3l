@extends('layout.app')

@section('title', 'Laporan Kecelakaan Area Kampus')

@section('content')
    <div class="page-heading">
        <h3>Laporan Kecelakaan Area Kampus</h3>
    </div>
    <div class="page-content">
        <section class="pb-5">
            <div class="card rounded-0">
                <div class="card-content">
                    <!-- Table with no outer spacing -->
                    <div class="table-responsive">
                        <table class="table mb-0 table-lg">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Pelapor</th>
                                    <th>Korban</th>
                                    <th>Kejadian</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($laporans as $laporan)
                                    <tr>
                                        <td class="text-center align-top">{{ $loop->iteration }}</td>
                                        <td class="align-top">
                                            {{ $laporan->pelapor_nama }}
                                            <hr class="my-1">
                                            {{ $laporan->pelapor_bagian }}
                                        </td>
                                        <td class="align-top">
                                            {{ $laporan->korban_nama }}
                                            <hr class="my-1">
                                            {{ $laporan->korban_bagian }}
                                        </td>
                                        <td class="align-top">
                                            {{ $laporan->kejadian_jenis }}
                                            <hr class="my-1">
                                            {{ $laporan->kejadian_lokasi }}
                                        </td>
                                        <td class="align-top">
                                            <a href="{{ url('satgas/laporan-area-kampus/' . $laporan->id) }}"
                                                class="btn btn-outline-info btn-sm rounded-0">
                                                Lihat
                                            </a>
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
