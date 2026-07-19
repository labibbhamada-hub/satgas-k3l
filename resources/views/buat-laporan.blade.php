<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Kategori Laporan</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('mazer/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('mazer/assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('mazer/assets/css/app.css') }}">
</head>

<body>
    <nav class="navbar navbar-light mb-3">
        <div class="container d-block">
            <a href="{{ url('/') }}"
                class="btn icon btn-secondary btn-sm d-inline-flex align-items-center rounded-0">
                <i class="bi bi-chevron-left me-2"></i>
                Kembali
            </a>
        </div>
    </nav>

    <div class="container">
        <div class="text-center pb-3">
            <h3>Pilih Kategori Laporan</h3>
            <p class="text-subtitle text-muted">
                Pilih kategori laporan yang sesuai dengan jenis insiden atau kecelakaan yang Anda alami untuk memudahkan
                proses penanganan dan tindak lanjut.
            </p>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card rounded-0 mb-3">
                    <div class="card-content">
                        <img src="{{ asset('storage/asset/laporan-nsi.png') }}" class="img-fluid" alt="NSI">
                        <div class="card-body">
                            <h5 class="card-title">Laporan Needle Stick Injury (NSI)</h5>
                            <p class="card-text">
                                Digunakan untuk melaporkan insiden tertusuk jarum suntik atau benda tajam selama
                                kegiatan praktik, pelayanan, maupun pekerjaan.
                            </p>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <a href="{{ url('buat-laporan/nsi') }}" class="btn btn-light-primary rounded-0">Buat Laporan</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card rounded-0 mb-3">
                    <div class="card-content">
                        <img src="{{ asset('storage/asset/laporan-kampus.png') }}" class="img-fluid" alt="NSI">
                        <div class="card-body">
                            <h5 class="card-title">Laporan Kecelakaan Area Kampus</h5>
                            <p class="card-text">
                                Digunakan untuk melaporkan kecelakaan yang terjadi di lingkungan kampus dan memerlukan
                                penanganan maupun tindak lanjut.
                            </p>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <a href="{{ url('buat-laporan/area-kampus') }}" class="btn btn-light-primary rounded-0">
                            Buat Laporan
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card rounded-0 mb-3">
                    <div class="card-content">
                        <img src="{{ asset('storage/asset/laporan-pkl.png') }}" class="img-fluid" alt="NSI">
                        <div class="card-body">
                            <h5 class="card-title">Laporan Kecelakaan Lahan Praktik Lainnya</h5>
                            <p class="card-text">
                                Digunakan untuk melaporkan insiden atau kecelakaan yang dialami selama menjalani
                                kegiatan praktik di luar lingkungan kampus.
                            </p>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <a href="{{ url('buat-laporan/praktik-lainnya') }}" class="btn btn-light-primary rounded-0">
                            Buat Laporan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
