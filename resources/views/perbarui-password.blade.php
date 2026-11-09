@extends('layout.app')

@section('title', 'Perbarui Password')

@section('content')
    <div class="page-heading">
        <h3>Perbarui Password</h3>
    </div>

    <div class="page-content">
        <section>
            <div class="card rounded-0">
                <div class="card-content">
                    <div class="card-body">

                        @if (session('warning'))
                            <div class="alert alert-warning rounded-0">
                                {{ session('warning') }}
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success rounded-0">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (auth()->user()->must_change_password)
                            <div class="alert alert-info rounded-0">
                                Anda menggunakan password sementara.
                                Silakan buat password baru sebelum melanjutkan menggunakan aplikasi.
                            </div>
                        @endif

                        <form class="form form-vertical" action="{{ route('password.update') }}" method="POST"
                            autocomplete="off" id="form-submit">
                            @csrf

                            <div class="form-body">
                                <div class="row">

                                    @if (!auth()->user()->must_change_password)
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="current_password">
                                                    Password Saat Ini *
                                                </label>

                                                <div class="input-group">
                                                    <input type="password" id="current_password" name="current_password"
                                                        class="form-control rounded-0 @error('current_password') is-invalid @enderror"
                                                        autocomplete="current-password" required>

                                                    <span class="input-group-text rounded-0 toggle-password"
                                                        data-target="current_password" style="cursor: pointer;">
                                                        <i class="bi bi-eye"></i>
                                                    </span>

                                                    @error('current_password')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="password">
                                                Password Baru *
                                            </label>

                                            <div class="input-group">
                                                <input type="password" id="password" name="password"
                                                    class="form-control rounded-0 @error('password') is-invalid @enderror"
                                                    minlength="6" autocomplete="new-password" required>

                                                <span class="input-group-text rounded-0 toggle-password"
                                                    data-target="password" style="cursor: pointer;">
                                                    <i class="bi bi-eye"></i>
                                                </span>

                                                @error('password')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <small class="text-muted">
                                                Password minimal 12 karakter.
                                            </small>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="password_confirmation">
                                                Konfirmasi Password Baru *
                                            </label>

                                            <div class="input-group">
                                                <input type="password" id="password_confirmation"
                                                    name="password_confirmation" class="form-control rounded-0"
                                                    minlength="12" autocomplete="new-password" required>

                                                <span class="input-group-text rounded-0 toggle-password"
                                                    data-target="password_confirmation" style="cursor: pointer;">
                                                    <i class="bi bi-eye"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 d-flex justify-content-end mt-4">
                                        <button type="button" class="btn btn-primary rounded-0" id="btn-submit"
                                            onclick="form_submit()">
                                            <span id="btn-submit-text">
                                                Simpan
                                            </span>

                                            <span id="btn-submit-load" style="display: none;">
                                                <span class="d-inline-flex align-items-center">
                                                    <span class="spinner-border spinner-border-sm me-2"></span>
                                                    Memproses...
                                                </span>
                                            </span>
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script>
        document.querySelectorAll('.toggle-password').forEach(function(button) {
            button.addEventListener('click', function() {
                const target = document.getElementById(this.dataset.target);
                const icon = this.querySelector('i');

                if (target.type === 'password') {
                    target.type = 'text';
                    icon.classList.remove('bi-eye');
                    icon.classList.add('bi-eye-slash');
                } else {
                    target.type = 'password';
                    icon.classList.remove('bi-eye-slash');
                    icon.classList.add('bi-eye');
                }
            });
        });

        function form_submit() {
            const button = document.getElementById('btn-submit');

            button.disabled = true;
            document.getElementById('btn-submit-text').style.display = 'none';
            document.getElementById('btn-submit-load').style.display = 'inline';

            document.getElementById('form-submit').submit();
        }
    </script>
@endsection
