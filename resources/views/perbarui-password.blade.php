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
                        <form class="form form-vertical" action="{{ url('perbarui-password') }}" method="POST"
                            autocomplete="off" id="form-submit">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="password">Password Baru *</label>
                                            <div class="input-group">
                                                <input type="password" id="password"
                                                    class="form-control rounded-0 @error('password') is-invalid @enderror"
                                                    name="password" value="{{ old('password') }}">
                                                <span class="input-group-text rounded-0" id="toggle_password"
                                                    style="cursor: pointer;">
                                                    <i class="bi bi-eye" id="icon_password"></i>
                                                </span>
                                                @error('password')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="password_confirmation">Konfirmasi Password Baru *</label>
                                            <div class="input-group">
                                                <input type="password" id="password_confirmation"
                                                    class="form-control rounded-0 @error('password_confirmation') is-invalid @enderror"
                                                    name="password_confirmation" value="{{ old('password_confirmation') }}">
                                                <span class="input-group-text rounded-0" id="toggle_password_confirmation"
                                                    style="cursor: pointer;">
                                                    <i class="bi bi-eye" id="icon_password_confirmation"></i>
                                                </span>
                                                @error('password_confirmation')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
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
        const toggle_password = document.getElementById('toggle_password');
        const password = document.getElementById('password');
        const icon_password = document.getElementById('icon_password');

        toggle_password.addEventListener('click', function() {
            if (password.type === 'password') {
                password.type = 'text';
                icon_password.classList.remove('bi-eye');
                icon_password.classList.add('bi-eye-slash');
            } else {
                password.type = 'password';
                icon_password.classList.remove('bi-eye-slash');
                icon_password.classList.add('bi-eye');
            }
        });
    </script>
    <script>
        const toggle_password_confirmation = document.getElementById('toggle_password_confirmation');
        const password_confirmation = document.getElementById('password_confirmation');
        const icon_password_confirmation = document.getElementById('icon_password_confirmation');

        toggle_password_confirmation.addEventListener('click', function() {
            if (password_confirmation.type === 'password') {
                password_confirmation.type = 'text';
                icon_password_confirmation.classList.remove('bi-eye');
                icon_password_confirmation.classList.add('bi-eye-slash');
            } else {
                password_confirmation.type = 'password';
                icon_password_confirmation.classList.remove('bi-eye-slash');
                icon_password_confirmation.classList.add('bi-eye');
            }
        });
    </script>
    <script>
        function form_submit() {
            $('#btn-submit').prop('disabled', true);
            $('#btn-submit-text').hide();
            $('#btn-submit-load').show();
            $('#form-submit').submit();
        }
    </script>
@endsection
