@extends('layout.app')

@section('title', 'Data Instansi')

@section('content')
    <div class="page-heading">
        <h3>Data Instansi</h3>
    </div>
    @if (session('temporary_password'))
        <div class="alert alert-warning rounded-0">
            <h6 class="mb-2">Password Sementara Instansi</h6>

            <p class="mb-1">
                Instansi: <strong>{{ session('temporary_password_for') }}</strong>
            </p>

            <div class="input-group">
                <input type="text" class="form-control rounded-0" value="{{ session('temporary_password') }}" readonly>
                <button type="button" class="btn btn-outline-secondary rounded-0"
                    onclick="navigator.clipboard.writeText(this.previousElementSibling.value)">
                    Salin
                </button>
            </div>

            <small class="d-block mt-2">
                Simpan password ini dan sampaikan kepada pengguna.
                Password hanya ditampilkan satu kali. Pengguna wajib menggantinya saat login.
            </small>
        </div>
    @endif
    <div class="page-content">
        <section class="pb-5">
            <div class="card rounded-0">
                <div class="card-content">
                    <div class="card-body border-bottom pb-0">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-md-8 mb-4">
                                <a href="{{ url('satgas/instansi/create') }}" class="btn btn-primary rounded-0">
                                    Tambah Instansi
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
                                    <th>Nama Instansi</th>
                                    <th>Penanggung Jawab</th>
                                    <th>Status</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>

                                        <td class="text-center align-top">{{ $loop->iteration }}</td>

                                        <td class="align-top">{{ $user->nama_instansi }}</td>

                                        <td class="align-top">{{ $user->nama }}</td>

                                        <td class="align-top">
                                            @if ($user->is_active)
                                                <span class="badge bg-success rounded-0">Aktif</span>
                                            @else
                                                <span class="badge bg-secondary rounded-0">Nonaktif</span>
                                            @endif
                                        </td>

                                        <td class="align-top">
                                            <a href="{{ url('satgas/instansi/' . $user->id . '/edit') }}"
                                                class="btn btn-outline-info btn-sm rounded-0">
                                                Edit
                                            </a>

                                            {{-- Tombol untuk membuka modal konfirmasi --}}
                                            <button type="button"
                                                class="btn btn-sm {{ $user->is_active ? 'btn-danger' : 'btn-success' }} rounded-0"
                                                data-bs-toggle="modal" data-bs-target="#modal-status-{{ $user->id }}">
                                                {{ $user->is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                                            </button>

                                            {{-- Modal konfirmasi perubahan status --}}
                                            <div class="modal fade" id="modal-status-{{ $user->id }}" tabindex="-1"
                                                aria-labelledby="modal-status-label-{{ $user->id }}"
                                                aria-hidden="true">

                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content rounded-0">

                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="modal-status-label-{{ $user->id }}">
                                                                Konfirmasi
                                                                {{ $user->is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                                                                Instansi
                                                            </h5>

                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close">
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">
                                                            Apakah Anda yakin ingin
                                                            <strong>{{ $user->is_active ? 'menonaktifkan' : 'mengaktifkan' }}</strong>
                                                            Instansi <strong>{{ $user->nama_instansi }}</strong>?
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary rounded-0"
                                                                data-bs-dismiss="modal">
                                                                Batal
                                                            </button>

                                                            <form action="{{ route('instansi.update-status', $user->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PATCH')

                                                                <input type="hidden" name="is_active"
                                                                    value="{{ $user->is_active ? 0 : 1 }}">

                                                                <button type="submit"
                                                                    class="btn {{ $user->is_active ? 'btn-danger' : 'btn-success' }} rounded-0">
                                                                    Ya, {{ $user->is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                                                                </button>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

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
