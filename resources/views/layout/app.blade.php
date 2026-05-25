<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('mazer/assets/css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('mazer/assets/vendors/iconly/bold.css') }}">

    <link rel="stylesheet" href="{{ asset('mazer/assets/vendors/toastify/toastify.css') }}">

    <link rel="stylesheet" href="{{ asset('mazer/assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('mazer/assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('mazer/assets/css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('mazer/assets/images/favicon.svg') }}" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block">
                                <i class="bi bi-x bi-middle"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    @if (auth()->user()->isDev())
                        @include('layout.menu.dev')
                    @endif
                    @if (auth()->user()->isSatgas())
                        @include('layout.menu.satgas')
                    @endif
                    @if (auth()->user()->isInstansi())
                        @include('layout.menu.instansi')
                    @endif
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main" class="layout-navbar">
            <header class="mb-3">
                <nav class="navbar navbar-expand navbar-light">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item dropdown me-3">
                                    <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class='bi bi-bell bi-sub fs-4 text-gray-600'></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end rounded-0"
                                        aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <h6 class="dropdown-header">Notifications</h6>
                                        </li>
                                        <li>
                                            <a class="dropdown-item">No notification available</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600">{{ auth()->user()->nama_instansi }}</h6>
                                            <p class="mb-0 text-sm text-gray-600">{{ strtoupper(auth()->user()->role) }}
                                            </p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="{{ asset('storage/asset/logo-bhamada-sm.png') }}">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end rounded-0"
                                    aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <h6 class="dropdown-header">{{ auth()->user()->nama }}</h6>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ url('perbarui-profile') }}">
                                            <i class="icon-mid bi bi-person-circle me-2"></i>
                                            Perbarui Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ url('perbarui-password') }}">
                                            <i class="icon-mid bi bi-key me-2"></i>
                                            Perbarui Password
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                            data-bs-target="#modal-logout">
                                            <i class="icon-mid bi bi-box-arrow-left me-2"></i>
                                            Logout
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>

            <div id="main-content">
                @yield('content')

                <footer>
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-start">
                            <p>Version 1.0.0</p>
                        </div>
                        <div class="float-end">
                            <p>
                                Copyright &copy; {{ date('Y') }}, Designed & Developed by
                                <a href="https://it.bhamada.ac.id/">IT Bhamada</a>
                            </p>
                        </div>
                    </div>
                </footer>
            </div>

        </div>
    </div>

    <div class="modal fade text-left" id="modal-logout" tabindex="-1" role="dialog" aria-labelledby="modal-logout"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-logout">Logout</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        Yakin keluar sistem
                        <strong>SATGAS K3L</strong>?
                    </p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-light rounded-0" data-bs-dismiss="modal">
                        <span>Batal</span>
                    </button>
                    <form action="{{ url('logout') }}" method="POST" id="form-logout">
                        @csrf
                        <button type="button" class="btn btn-danger rounded-0" id="btn-logout"
                            onclick="form_logout()">
                            <span id="btn-logout-text">Keluar</span>
                            <span id="btn-logout-load" style="display: none;">
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

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="{{ asset('mazer/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('mazer/assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('mazer/assets/vendors/toastify/toastify.js') }}"></script>
    <script src="{{ asset('mazer/assets/js/extensions/toastify.js') }}"></script>

    <script>
        function form_logout() {
            $('#btn-logout').prop('disabled', true);
            $('#btn-logout-text').hide();
            $('#btn-logout-load').show();
            $('#form-logout').submit();
        }
    </script>

    @include('alert.toastify')

    <script src="{{ asset('mazer/assets/js/main.js') }}"></script>

    @yield('script')
</body>

</html>
