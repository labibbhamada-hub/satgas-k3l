@extends('layout.app')

@section('title', 'Data Prodi')

@section('content')
    <div class="page-heading">
        <h3>Data Prodi</h3>
    </div>
    <div class="page-content">
        <section class="pb-5">
            <div class="card rounded-0">
                <div class="card-content">
                    <div class="card-body border-bottom pb-0">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-md-8 mb-4">
                                <a href="{{ url('instansi/laporan/create') }}" class="btn btn-primary rounded-0">
                                    Buat Prodi
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
                                    <th class="text-center">No</th>
                                    <th>Nama Prodi</th>
                                    <th>Fakultas</th>
                                    <th>Status</th>
                                    <th class="text-center">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($prodis as $prodi)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $prodi->nama }}</td>
                                        <td>{{ strtoupper($prodi->fakultas) }}</td>
                                        <td>
                                            @if ($prodi->is_active)
                                                <span class="badge bg-primary rounded-0">Aktif</span>
                                            @else
                                                <span class="badge bg-secondary rounded-0">Non Aktif</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-outline-warning btn-sm rounded-0">
                                                Edit
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
