@extends('layout.app')

@section('title', 'Data Instansi')

@section('content')
    <div class="page-heading">
        <h3>Data Instansi</h3>
    </div>
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
                                            <a href="{{ url('satgas/instansi/' . $user->id . '/edit') }}"
                                                class="btn btn-outline-info btn-sm rounded-0">
                                                Edit
                                            </a>
                                            <button type="button" class="btn btn-outline-danger btn-sm rounded-0"
                                                data-bs-toggle="modal" data-bs-target="#modal-hapus-{{ $user->id }}">
                                                Hapus
                                            </button>
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
    @foreach ($users as $user)
        <div class="modal fade text-left" id="modal-hapus-{{ $user->id }}" tabindex="-1" role="dialog"
            aria-labelledby="Hapus Instansi" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="Hapus Instansi">Hapus Instansi</h5>
                        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>
                            Yakin hapus instansi
                            <strong>{{ $user->nama_instansi }}</strong>?
                        </p>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <button type="button" class="btn rounded-0" data-bs-dismiss="modal">
                            Batal
                        </button>
                        <form action="{{ url('satgas/instansi/' . $user->id) }}" method="POST"
                            id="form-hapus-{{ $user->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger rounded-0" id="btn-hapus-{{ $user->id }}"
                                onclick="form_hapus({{ $user->id }})">
                                <span id="btn-hapus-text-{{ $user->id }}">
                                    Hapus
                                </span>
                                <span id="btn-hapus-load-{{ $user->id }}" style="display: none;">
                                    <span class="d-inline-flex align-items-center">
                                        <span class="spinner-border spinner-border-sm me-2"></span>
                                        Memproses...
                                    </span>
                                </span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('script')
    <script>
        function form_hapus(id) {
            $('#btn-hapus-' + id).prop('disabled', true);
            $('#btn-hapus-text-' + id).hide();
            $('#btn-hapus-load-' + id).show();
            $('#form-hapus-' + id).submit();
        }
    </script>
@endsection
