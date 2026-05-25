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
                    <div class="card-body border-bottom pb-0">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-md-8 mb-4">
                                <a href="{{ url('instansi/laporan/create') }}" class="btn btn-primary rounded-0">
                                    Buat Laporan
                                </a>
                            </div>
                            <div class="col-md-4 mb-4 text-end">
                                <div class="input-group">
                                    <input type="search" class="form-control rounded-0" placeholder="Cari Instansi"
                                        aria-label="Cari Instansi" aria-describedby="keyword">
                                    <button class="btn btn-outline-secondary rounded-0" type="button" id="keyword"
                                        name="keyword">
                                        Cari
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
                                    <th>Instansi</th>
                                    <th>Mahasiswa</th>
                                    <th>Kejadian</th>
                                    <th>Status</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-bold-500">RSUD Kardinah</td>
                                    <td>Fitria Della</td>
                                    <td class="text-bold-500">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, eligendi.
                                    </td>
                                    <td>
                                        <span class="badge bg-success rounded-0">Selesai</span>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-outline-info btn-sm rounded-0">
                                            Lihat
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
