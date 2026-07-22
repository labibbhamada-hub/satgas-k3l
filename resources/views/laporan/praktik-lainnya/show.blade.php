<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Kecelakaan Area Kampus</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('mazer/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('mazer/assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('mazer/assets/css/app.css') }}">

    <link rel="shortcut icon" href="{{ asset('storage/asset/logo-bhamada-sm.png') }}" type="image/x-icon">
</head>

<body>
    <div class="container p-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card rounded-0 mb-3">
                    <div class="card-content">
                        <div class="card-body text-center">
                            <h5 class="card-title">Terima Kasih Atas Laporan Anda</h5>
                            <p class="card-text">
                                Laporan yang Anda sampaikan merupakan bagian penting dalam upaya meningkatkan
                                keselamatan dan kesehatan selama kegiatan praktik. Tim Satgas K3L akan segera melakukan
                                verifikasi serta berkoordinasi dengan instansi terkait untuk proses penanganan lebih
                                lanjut.
                            </p>
                        </div>
                        <img src="{{ asset('storage/asset/laporan-pkl-success.png') }}" class="img-fluid"
                            alt="Laporan Kampus Success">
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <a href="{{ url('/') }}"
                            class="btn icon btn-secondary btn-sm d-inline-flex align-items-center rounded-0">
                            <i class="bi bi-house-door-fill me-2"></i>
                            Kembali ke Dashboard
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
