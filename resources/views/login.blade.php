<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN - SATGAS K3L</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('mazer/assets/css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('mazer/assets/vendors/toastify/toastify.css') }}">

    <link rel="stylesheet" href="{{ asset('mazer/assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('mazer/assets/css/app.css') }}">

    <link rel="stylesheet" href="{{ asset('mazer/assets/css/pages/auth.css') }}">

    <link rel="shortcut icon" href="{{ asset('storage/asset/logo-bhamada-sm.png') }}" type="image/x-icon">
</head>

<body>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <h1 class="auth-title mb-5">SATGAS K3L</h1>
                    <p class="auth-subtitle mb-5">Silakan login menggunakan akun yang telah diberikan oleh admin.
                    </p>
                    <form action="{{ url('login') }}" method="POST" autocomplete="off" id="form-submit">
                        @csrf
                        <div class="form-group mb-3">
                            <input type="text" class="form-control rounded-0 @error('telp') is-invalid @enderror"
                                name="telp" id="telp" value="{{ old('telp') }}" placeholder="No. Telepon">
                            @error('telp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-5">
                            <div class="input-group">
                                <input type="password"
                                    class="form-control rounded-0 @error('password') is-invalid @enderror"
                                    name="password" id="password" value="{{ old('password') }}" placeholder="Password">
                                <span class="input-group-text rounded-0" id="toggle_password" style="cursor: pointer;">
                                    <i class="bi bi-eye" id="icon_password"></i>
                                </span>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block rounded-0 mb-2" id="btn-submit"
                            onclick="form_submit()">
                            <span id="btn-submit-text">
                                Login
                            </span>
                            <span id="btn-submit-load" style="display: none;">
                                <span class="d-inline-flex align-items-center">
                                    <span class="spinner-border spinner-border-sm me-2"></span>
                                    Memproses...
                                </span>
                            </span>
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="{{ asset('mazer/assets/vendors/toastify/toastify.js') }}"></script>
    <script src="{{ asset('mazer/assets/js/extensions/toastify.js') }}"></script>

    <script>
        @if ($errors->has('telp') || $errors->has('password'))
            Toastify({
                text: "No. Telepon atau Password salah!",
                duration: 3000,
                gravity: "top",
                position: "right",
                close: true,
                backgroundColor: "#dc3545",
            }).showToast();
        @endif

        @if (session('error'))
            Toastify({
                text: "{{ session('error') }}",
                duration: 3000,
                gravity: "top",
                position: "right",
                close: true,
                backgroundColor: "#dc3545",
            }).showToast();
        @endif
    </script>
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
        function form_submit() {
            $('#btn-submit').prop('disabled', true);
            $('#btn-submit-text').hide();
            $('#btn-submit-load').show();
            $('#form-submit').submit();
        }
    </script>
</body>

</html>
