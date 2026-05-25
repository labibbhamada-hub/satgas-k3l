<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Satgas K3L Bhamada Slawi | Keamanan, Keselamatan, Kesehatan, Lingkungan</title>
    <!-- Bootstrap 5 CSS + Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Custom CSS -->
    <style>
        :root {
            --k3l-blue: #0d6efd;
            --k3l-green: #198754;
            --k3l-soft-blue: #e7f1ff;
            --k3l-soft-green: #e8f5e9;
            --k3l-white: #ffffff;
        }

        body {
            font-family: system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;
            scroll-padding-top: 70px;
        }

        /* Navbar */
        .navbar {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .navbar-brand {
            font-weight: 600;
            color: var(--k3l-blue) !important;
        }

        .nav-link {
            font-weight: 500;
            transition: color 0.2s;
        }

        .nav-link:hover {
            color: var(--k3l-green) !important;
        }

        /* Hero */
        .hero-section {
            background: linear-gradient(135deg, #f8fbff 0%, #eef4fa 100%);
            padding: 4rem 0;
        }

        /* Cards & Hover */
        .card-fungsi,
        .card-edukasi {
            transition: all 0.3s ease;
            border: none;
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.02);
            background: white;
            height: 100%;
        }

        .card-fungsi:hover,
        .card-edukasi:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 30px rgba(13, 110, 253, 0.08);
            border-left: 4px solid var(--k3l-green);
        }

        .icon-circle {
            width: 64px;
            height: 64px;
            background: var(--k3l-soft-blue);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            color: var(--k3l-blue);
            font-size: 2rem;
            transition: 0.2s;
        }

        .card-fungsi:hover .icon-circle {
            background: var(--k3l-green);
            color: white;
        }

        /* Layanan Utama */
        .layanan-item {
            padding: 1.5rem 1rem;
            background: var(--k3l-soft-green);
            border-radius: 24px;
            transition: background 0.2s;
        }

        .layanan-item:hover {
            background: #d4edda;
        }

        .layanan-item i {
            font-size: 2.5rem;
            color: var(--k3l-green);
            margin-bottom: 1rem;
        }

        /* Statistik */
        .stat-card {
            background: white;
            border-radius: 20px;
            padding: 2rem 1rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.02);
            border: 1px solid rgba(13, 110, 253, 0.1);
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 700;
            color: var(--k3l-blue);
            line-height: 1.2;
        }

        /* CTA Section */
        .cta-section {
            background: linear-gradient(105deg, var(--k3l-blue) 0%, #0b5ed7 100%);
            border-radius: 32px;
            margin: 2rem 0;
            color: white;
            padding: 3rem 2rem;
        }

        /* Footer */
        .footer {
            background: #0a1c2f;
            color: #e0e9f0;
        }

        .footer a {
            color: #b3cef0;
            text-decoration: none;
        }

        .footer a:hover {
            color: white;
            text-decoration: underline;
        }

        /* Button custom */
        .btn-k3l-primary {
            background: var(--k3l-green);
            color: white;
            border: none;
            padding: 0.75rem 2rem;
            font-weight: 600;
            border-radius: 40px;
            transition: 0.2s;
        }

        .btn-k3l-primary:hover {
            background: #146c43;
            color: white;
        }

        .btn-outline-k3l {
            border: 2px solid var(--k3l-blue);
            color: var(--k3l-blue);
            border-radius: 40px;
            padding: 0.75rem 2rem;
            font-weight: 600;
        }

        .btn-outline-k3l:hover {
            background: var(--k3l-blue);
            color: white;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .hero-section {
                text-align: center;
                padding: 2rem 0;
            }

            .navbar .btn-danger {
                margin-top: 8px;
            }
        }

        /* Placeholder image styling */
        .img-placeholder {
            background-color: #d9e6f2;
            border-radius: 24px;
            object-fit: cover;
            width: 100%;
        }

        .bg-soft-blue {
            background-color: var(--k3l-soft-blue);
        }

        .text-k3l-blue {
            color: var(--k3l-blue);
        }

        .border-green-hover:hover {
            border-color: var(--k3l-green) !important;
        }
    </style>
</head>

<body>

    <!-- ==================== NAVBAR ==================== -->
    <nav class="navbar navbar-expand-lg bg-white py-3 sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="bi bi-shield-shaded fs-3 me-2" style="color: var(--k3l-blue);"></i>
                <span class="fw-bold">Satgas K3L</span> <span style="font-weight: 400; color: #2c3e50;">Bhamada
                    Slawi</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain"
                aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 fw-medium">
                    <li class="nav-item"><a class="nav-link active text-k3l-blue" aria-current="page"
                            href="#">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Edukasi</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Kontak</a></li>
                </ul>
                <a href="#" class="btn btn-danger px-4 py-2 rounded-pill fw-semibold shadow-sm">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>Laporkan Insiden
                </a>
            </div>
        </div>
    </nav>

    <!-- ==================== HERO SECTION ==================== -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold mb-4" style="color: #0b2b4a;">
                        Mewujudkan Lingkungan Kampus yang <span style="color: var(--k3l-green);">Aman dan Sehat</span>
                    </h1>
                    <p class="lead mb-4 text-secondary">
                        Satgas K3L Bhamada Slawi hadir untuk menjamin keamanan, keselamatan, kesehatan, dan kelestarian
                        lingkungan bagi seluruh sivitas akademika.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="#" class="btn btn-danger btn-lg rounded-pill px-4 py-3 fw-semibold shadow">
                            <i class="bi bi-send-fill me-2"></i>Laporkan Insiden
                        </a>
                        <a href="#" class="btn btn-outline-primary btn-lg rounded-pill px-4 py-3 fw-semibold">
                            Pelajari Lebih Lanjut <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <!-- Ilustrasi placeholder -->
                    <img src="https://picsum.photos/id/1043/600/400" alt="Ilustrasi Kampus Aman"
                        class="img-fluid img-placeholder shadow-lg" style="max-height: 380px; width: 100%;">
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== TENTANG SATGAS K3L ==================== -->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-md-6">
                    <span
                        class="badge bg-success bg-opacity-10 text-success px-3 py-2 mb-3 rounded-pill fw-semibold">Tentang
                        Kami</span>
                    <h2 class="fw-bold mb-4">Satgas <span style="color: var(--k3l-blue);">Keamanan, Keselamatan,
                            Kesehatan, dan Lingkungan</span></h2>
                    <p class="text-secondary mb-3">
                        Satgas K3L Bhamada Slawi adalah unit garda terdepan yang bertugas mengawal standar keselamatan,
                        kesehatan kerja, keamanan, serta pelestarian lingkungan di seluruh area kampus. Kami berkomitmen
                        menciptakan ekosistem pendidikan yang zero accident dan berkelanjutan.
                    </p>
                    <p class="text-secondary">
                        Melalui program preventif, edukatif, dan respons cepat, Satgas K3L melibatkan partisipasi aktif
                        mahasiswa, dosen, dan staf untuk bersama-sama menjaga kampus yang aman dan sehat.
                    </p>
                    <a href="#" class="btn btn-outline-success rounded-pill px-4 mt-3 fw-medium">
                        <i class="bi bi-people-fill me-2"></i>Kenali Tim Kami
                    </a>
                </div>
                <div class="col-md-6">
                    <img src="https://picsum.photos/id/20/600/400" alt="Tim Satgas K3L"
                        class="img-fluid rounded-4 shadow" style="border: 4px solid white;">
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== FUNGSI UTAMA (4 CARD) ==================== -->
    <section class="py-5 bg-soft-blue">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Fungsi Utama Satgas K3L</h2>
                <p class="text-secondary">Pilar pelayanan kami untuk kampus yang lebih baik</p>
            </div>
            <div class="row g-4">
                <!-- Preventif -->
                <div class="col-md-6 col-lg-3">
                    <div class="card card-fungsi p-4">
                        <div class="icon-circle">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h4 class="fw-bold">Preventif</h4>
                        <p class="text-secondary">Inspeksi rutin, identifikasi bahaya, dan pengendalian risiko sejak
                            dini untuk mencegah insiden.</p>
                    </div>
                </div>
                <!-- Edukasi -->
                <div class="col-md-6 col-lg-3">
                    <div class="card card-fungsi p-4">
                        <div class="icon-circle">
                            <i class="bi bi-mortarboard"></i>
                        </div>
                        <h4 class="fw-bold">Edukasi</h4>
                        <p class="text-secondary">Pelatihan K3, seminar keselamatan, dan kampanye budaya aman bagi
                            seluruh warga kampus.</p>
                    </div>
                </div>
                <!-- Respons Darurat -->
                <div class="col-md-6 col-lg-3">
                    <div class="card card-fungsi p-4">
                        <div class="icon-circle">
                            <i class="bi bi-lightning-charge"></i>
                        </div>
                        <h4 class="fw-bold">Respons Darurat</h4>
                        <p class="text-secondary">Tim siaga 24/7 untuk penanganan cepat insiden, kebakaran, dan
                            evakuasi medis.</p>
                    </div>
                </div>
                <!-- Kepatuhan -->
                <div class="col-md-6 col-lg-3">
                    <div class="card card-fungsi p-4">
                        <div class="icon-circle">
                            <i class="bi bi-clipboard-check"></i>
                        </div>
                        <h4 class="fw-bold">Kepatuhan</h4>
                        <p class="text-secondary">Memastikan kepatuhan terhadap regulasi K3 dan standar lingkungan yang
                            berlaku.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== LAYANAN UTAMA ==================== -->
    <section class="py-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-6 mx-auto text-center">
                    <h2 class="fw-bold">Layanan Utama Kami</h2>
                    <p class="text-secondary">Solusi lengkap untuk mendukung keselamatan dan kesehatan di lingkungan
                        kampus</p>
                </div>
            </div>
            <div class="row g-4 text-center">
                <div class="col-6 col-md-3">
                    <div class="layanan-item h-100">
                        <i class="bi bi-megaphone"></i>
                        <h5 class="fw-semibold">Pelaporan Insiden</h5>
                        <p class="small text-secondary mb-0">Laporkan potensi bahaya atau kejadian secara real-time.
                        </p>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="layanan-item h-100">
                        <i class="bi bi-graph-up-arrow"></i>
                        <h5 class="fw-semibold">Manajemen Risiko</h5>
                        <p class="small text-secondary mb-0">Analisis dan mitigasi risiko di setiap area kampus.</p>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="layanan-item h-100">
                        <i class="bi bi-person-workspace"></i>
                        <h5 class="fw-semibold">Pelatihan K3</h5>
                        <p class="small text-secondary mb-0">Sertifikasi dan workshop keselamatan kerja.</p>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="layanan-item h-100">
                        <i class="bi bi-cone-striped"></i>
                        <h5 class="fw-semibold">Simulasi Darurat</h5>
                        <p class="small text-secondary mb-0">Latihan evakuasi dan tanggap bencana berkala.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== STATISTIK SINGKAT ==================== -->
    <section class="py-5 bg-white">
        <div class="container">
            <div class="row g-4 text-center">
                <div class="col-md-4">
                    <div class="stat-card">
                        <div class="stat-number">120+</div>
                        <div class="text-secondary fw-medium">Laporan ditangani</div>
                        <small class="text-success">sejak 2024</small>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-card">
                        <div class="stat-number">30+</div>
                        <div class="text-secondary fw-medium">Pelatihan dilakukan</div>
                        <small class="text-success">tiap semester</small>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-card">
                        <div class="stat-number">95%</div>
                        <div class="text-secondary fw-medium">Tingkat penyelesaian</div>
                        <small class="text-success">insiden tuntas</small>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== EDUKASI / ARTIKEL ==================== -->
    <section class="py-5 bg-soft-blue">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold">Edukasi & Artikel K3L</h2>
                <a href="#" class="text-decoration-none fw-semibold" style="color: var(--k3l-blue);">Lihat
                    semua <i class="bi bi-chevron-right"></i></a>
            </div>
            <div class="row g-4">
                <!-- Artikel 1 -->
                <div class="col-md-4">
                    <div class="card card-edukasi border-0 h-100">
                        <img src="https://picsum.photos/id/20/400/220" class="card-img-top rounded-4" alt="artikel 1"
                            style="height: 200px; object-fit: cover;">
                        <div class="card-body px-0 pt-3">
                            <span class="badge bg-info bg-opacity-10 text-info mb-2">Keselamatan Kerja</span>
                            <h5 class="fw-bold">5 Langkah Cegah Kebakaran di Laboratorium</h5>
                            <p class="text-secondary small">Panduan praktis untuk mahasiswa dan peneliti agar selalu
                                waspada terhadap potensi bahaya.</p>
                            <a href="#" class="btn btn-link px-0 text-decoration-none fw-semibold"
                                style="color: var(--k3l-green);">Baca Selengkapnya <i
                                    class="bi bi-arrow-right-short"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Artikel 2 -->
                <div class="col-md-4">
                    <div class="card card-edukasi border-0 h-100">
                        <img src="https://picsum.photos/id/42/400/220" class="card-img-top rounded-4" alt="artikel 2"
                            style="height: 200px; object-fit: cover;">
                        <div class="card-body px-0 pt-3">
                            <span class="badge bg-success bg-opacity-10 text-success mb-2">Lingkungan</span>
                            <h5 class="fw-bold">Pengelolaan Limbah B3 di Area Kampus</h5>
                            <p class="text-secondary small">Kebijakan baru dan prosedur penanganan limbah berbahaya
                                sesuai standar.</p>
                            <a href="#" class="btn btn-link px-0 text-decoration-none fw-semibold"
                                style="color: var(--k3l-green);">Baca Selengkapnya <i
                                    class="bi bi-arrow-right-short"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Artikel 3 -->
                <div class="col-md-4">
                    <div class="card card-edukasi border-0 h-100">
                        <img src="https://picsum.photos/id/26/400/220" class="card-img-top rounded-4" alt="artikel 3"
                            style="height: 200px; object-fit: cover;">
                        <div class="card-body px-0 pt-3">
                            <span class="badge bg-primary bg-opacity-10 text-primary mb-2">Kesehatan</span>
                            <h5 class="fw-bold">Ergonomi Belajar: Cegah Nyeri Punggung</h5>
                            <p class="text-secondary small">Tips mengatur posisi duduk dan peralatan belajar agar tetap
                                sehat selama kuliah.</p>
                            <a href="#" class="btn btn-link px-0 text-decoration-none fw-semibold"
                                style="color: var(--k3l-green);">Baca Selengkapnya <i
                                    class="bi bi-arrow-right-short"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== CALL TO ACTION ==================== -->
    <section class="py-4">
        <div class="container">
            <div class="cta-section text-center">
                <h3 class="display-6 fw-bold mb-3">Laporkan potensi bahaya di sekitarmu sekarang!</h3>
                <p class="lead mb-4 opacity-90">Setiap laporan Anda sangat berarti untuk mencegah insiden dan
                    menyelamatkan nyawa.</p>
                <a href="#" class="btn btn-light btn-lg rounded-pill px-5 py-3 fw-bold shadow"
                    style="color: var(--k3l-blue);">
                    <i class="bi bi-exclamation-octagon-fill me-2"></i>Laporkan Sekarang
                </a>
            </div>
        </div>
    </section>

    <!-- ==================== FOOTER ==================== -->
    <footer class="footer pt-5 pb-4">
        <div class="container">
            <div class="row gy-4">
                <div class="col-md-5">
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-shield-shaded fs-1 me-3" style="color: #7aa9e6;"></i>
                        <span class="fs-4 fw-semibold text-white">Satgas K3L Bhamada Slawi</span>
                    </div>
                    <p class="text-secondary-emphasis" style="color: #b0c7e0 !important;">
                        Mewujudkan budaya K3L yang unggul di lingkungan akademik. Keamanan, Keselamatan, Kesehatan, dan
                        Lingkungan adalah prioritas.
                    </p>
                    <p><i class="bi bi-geo-alt-fill me-2" style="color: #7aa9e6;"></i>Jl. Pendidikan No. 12, Slawi,
                        Kabupaten Tegal, Jawa Tengah</p>
                </div>
                <div class="col-md-3">
                    <h5 class="text-white mb-3">Kontak Darurat</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="bi bi-telephone-fill me-2" style="color: #7aa9e6;"></i> (0283)
                            491132</li>
                        <li class="mb-2"><i class="bi bi-whatsapp me-2" style="color: #7aa9e6;"></i> +62
                            812-3456-7890</li>
                        <li class="mb-2"><i class="bi bi-envelope-fill me-2" style="color: #7aa9e6;"></i>
                            satgask3l@bhamadaslawi.ac.id</li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5 class="text-white mb-3">Ikuti Kami</h5>
                    <div class="d-flex gap-3 mb-4">
                        <a href="#" class="fs-3" style="color: #b3cef0;"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="fs-3" style="color: #b3cef0;"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="fs-3" style="color: #b3cef0;"><i class="bi bi-twitter-x"></i></a>
                        <a href="#" class="fs-3" style="color: #b3cef0;"><i class="bi bi-youtube"></i></a>
                    </div>
                    <p class="small" style="color: #b0c7e0;">
                        <i class="bi bi-calendar-event me-1"></i> Layanan 24 jam untuk situasi darurat.
                    </p>
                </div>
            </div>
            <hr class="my-4" style="border-color: #2c4b6e;">
            <div class="row">
                <div class="col-md-6 small" style="color: #9bb3d0;">
                    &copy; 2025 Satgas K3L Bhamada Slawi. Seluruh hak cipta dilindungi.
                </div>
                <div class="col-md-6 text-md-end small">
                    <a href="#" class="me-3 text-decoration-none" style="color: #b3cef0;">Kebijakan Privasi</a>
                    <a href="#" class="text-decoration-none" style="color: #b3cef0;">Syarat Layanan</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Optional: smooth scroll for anchor links (just in case) -->
    <script>
        // Aktifkan tooltip jika diperlukan, atau biarkan kosong.
        // Efek kecil: navbar active bisa diatur manual (saat ini beranda saja)
    </script>
</body>

</html>
