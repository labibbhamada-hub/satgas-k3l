<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem K3L | Universitas Modern Indonesia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300..700&family=Plus+Jakarta+Sans:wght@400..800&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('storage/asset/logo-bhamada-sm.png') }}" type="image/x-icon">
    <style>
        :root {
            --primary-green: #0D6B5D;
            --primary-green-light: #0F7B6C;
            --primary-blue: #1A3B6E;
            --primary-blue-light: #1E4D8C;
            --secondary-green: #10B981;
            --light-green: #ECFDF5;
            --light-blue: #EFF6FF;
            --dark-text: #1F2937;
            --gray-text: #4B5563;
            --gray-light: #F3F4F6;
            --warning: #D97706;
            --danger: #DC2626;
            --danger-light: #FEF2F2;
            --white: #FFFFFF;
            --font-heading: 'Plus Jakarta Sans', sans-serif;
            --font-body: 'Inter', sans-serif;
            --border-radius: 16px;
            --card-shadow: 0 1px 3px rgba(0, 0, 0, 0.04), 0 1px 2px rgba(0, 0, 0, 0.03);
            --card-shadow-hover: 0 10px 20px rgba(0, 0, 0, 0.06), 0 4px 8px rgba(0, 0, 0, 0.03);
            --transition: all 0.25s ease;
            --section-padding-y: 50px;
            --container-padding-x: 16px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--font-body);
            color: var(--dark-text);
            background-color: var(--white);
            overflow-x: hidden;
            line-height: 1.6;
            padding-top: 70px;
            -webkit-font-smoothing: antialiased;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: var(--font-heading);
            font-weight: 700;
            line-height: 1.3;
        }

        h1 {
            font-size: clamp(2rem, 5vw, 3.5rem);
        }

        h2 {
            font-size: clamp(1.6rem, 4vw, 2.5rem);
        }

        h3 {
            font-size: clamp(1.2rem, 3vw, 1.8rem);
        }

        h4 {
            font-size: clamp(1rem, 2.5vw, 1.4rem);
        }

        h5 {
            font-size: clamp(0.9rem, 2vw, 1.1rem);
        }

        h6 {
            font-size: clamp(0.8rem, 1.8vw, 1rem);
        }

        .section-padding {
            padding: var(--section-padding-y) 0;
        }

        .btn {
            font-weight: 600;
            border-radius: 50px;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-height: 48px;
            padding: 0.625rem 1.5rem;
            white-space: nowrap;
        }

        .btn-primary-green {
            background-color: var(--primary-green);
            border: none;
            color: white;
        }

        .btn-primary-green:hover {
            background-color: var(--primary-green-light);
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(13, 107, 93, 0.2);
            color: white;
        }

        .btn-outline-blue {
            background: transparent;
            border: 2px solid var(--primary-blue);
            color: var(--primary-blue);
        }

        .btn-outline-blue:hover {
            background: var(--primary-blue);
            color: white;
        }

        .btn-danger {
            background-color: var(--danger);
            border: none;
            color: white;
        }

        .btn-danger:hover {
            background-color: #b91c1c;
            box-shadow: 0 8px 15px rgba(220, 38, 38, 0.25);
            color: white;
        }

        .btn-lg {
            min-height: 54px;
            padding: 0.75rem 2rem;
        }

        .container {
            padding-left: var(--container-padding-x);
            padding-right: var(--container-padding-x);
        }

        /* Navbar */
        .navbar {
            background: rgba(255, 255, 255, 0.97);
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
            padding: 8px 0;
            min-height: 70px;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            color: var(--dark-text);
            flex-wrap: wrap;
            max-width: 75%;
        }

        .brand-logos {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .brand-logos img {
            height: 28px;
            width: auto;
            object-fit: contain;
            border-radius: 6px;
        }

        .brand-text {
            display: flex;
            flex-direction: column;
            line-height: 1.2;
        }

        .brand-text .univ-name {
            font-weight: 600;
            font-size: 0.7rem;
            color: var(--gray-text);
            white-space: nowrap;
        }

        .brand-text .system-name {
            font-weight: 800;
            font-size: 0.9rem;
            color: var(--primary-green);
            white-space: nowrap;
        }

        .navbar-toggler {
            border: none;
            padding: 8px;
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }

        .navbar-collapse {
            background: white;
            padding: 16px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            margin-top: 8px;
        }

        .nav-link {
            font-weight: 500;
            color: var(--dark-text) !important;
            padding: 12px 16px !important;
            border-radius: 8px;
            margin-bottom: 4px;
            transition: var(--transition);
            font-size: 1rem;
        }

        .nav-link:hover,
        .nav-link.active {
            background: var(--light-green);
            color: var(--primary-green) !important;
        }

        .navbar-actions {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-top: 12px;
            padding-top: 12px;
            border-top: 1px solid #E5E7EB;
        }

        .navbar-actions .btn {
            width: 100%;
            justify-content: center;
        }

        /* Hero */
        .hero-section {
            background: linear-gradient(105deg, #F0FDF9 0%, #FFFFFF 60%, #EFF6FF 100%);
            padding: 40px 0;
        }

        .hero-content {
            text-align: center;
            margin-bottom: 30px;
        }

        .hero-content .badge {
            display: inline-block;
            background: white;
            color: var(--dark-text);
            padding: 6px 16px;
            border-radius: 50px;
            font-size: 0.8rem;
            border: 1px solid #E5E7EB;
            margin-bottom: 16px;
        }

        .hero-content .highlight {
            color: var(--primary-green);
        }

        .hero-content p.lead {
            color: var(--gray-text);
            font-size: 1rem;
            margin: 16px 0 24px;
        }

        .hero-buttons {
            display: flex;
            flex-direction: column;
            gap: 12px;
            align-items: center;
        }

        .hero-buttons .btn {
            min-width: 220px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .hero-image-wrapper {
            position: relative;
            margin: 0 auto;
            max-width: 100%;
        }

        .hero-image-wrapper img {
            width: 100%;
            height: auto;
            border-radius: 16px;
            box-shadow: var(--card-shadow);
            object-fit: cover;
            max-height: 300px;
        }

        .hero-float-badge {
            position: absolute;
            bottom: -10px;
            left: -5px;
            background: white;
            border-radius: 10px;
            padding: 10px 14px;
            box-shadow: var(--card-shadow-hover);
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
            font-size: 0.8rem;
            z-index: 2;
        }

        /* Quick Access */
        .quick-access-section {
            background: white;
            padding: 30px 0;
            margin-top: -20px;
            position: relative;
            z-index: 10;
        }

        .quick-card {
            background: white;
            border: 1px solid #E5E7EB;
            border-radius: 0px;
            padding: 18px 12px;
            text-align: center;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            box-shadow: var(--card-shadow);
            transition: var(--transition);
            cursor: pointer;
        }

        .quick-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--card-shadow-hover);
            border-color: var(--primary-green);
        }

        .quick-card .qc-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            margin-bottom: 10px;
        }

        .quick-card h5 {
            font-size: 0.85rem;
            font-weight: 700;
            margin-bottom: 2px;
        }

        .quick-card p {
            font-size: 0.75rem;
            color: var(--gray-text);
            margin: 0;
        }

        /* Statistik */
        .stat-card {
            background: white;
            border-radius: 0px;
            padding: 20px;
            text-align: center;
            box-shadow: var(--card-shadow);
            height: 100%;
            border: 1px solid #F3F4F6;
        }

        .stat-card i {
            font-size: 2rem;
            margin-bottom: 8px;
        }

        .stat-card .stat-number {
            font-weight: 800;
            font-size: 2rem;
            margin-bottom: 4px;
        }

        .stat-card .stat-label {
            font-size: 0.8rem;
            color: var(--gray-text);
        }

        /* Alur Pelaporan - tanpa garis */
        .workflow-section {
            background: #F8FAFC;
        }

        .timeline {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 24px;
        }

        .timeline-step {
            display: flex;
            align-items: center;
            gap: 16px;
            width: 100%;
        }

        .step-circle {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: white;
            border: 3px solid #E5E7EB;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1.1rem;
            color: var(--gray-text);
            flex-shrink: 0;
        }

        .timeline-step.active .step-circle {
            background: var(--primary-green);
            border-color: var(--primary-green);
            color: white;
        }

        .step-content h5 {
            font-size: 1rem;
            margin-bottom: 4px;
        }

        .step-content p {
            font-size: 0.85rem;
            color: var(--gray-text);
            margin: 0;
        }

        /* Komitmen */
        .commitment-section {
            background: linear-gradient(135deg, #0D6B5D 0%, #1A3B6E 100%);
            color: white;
        }

        .commitment-card {
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(6px);
            /* border-radius: var(--border-radius); */
            border-radius: 0px;
            padding: 24px;
            height: 100%;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: var(--transition);
            text-align: center;
        }

        .commitment-card:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-4px);
        }

        .commitment-card i {
            font-size: 2rem;
            margin-bottom: 12px;
        }

        .commitment-card h4 {
            color: white;
            margin-bottom: 8px;
        }

        .commitment-card p {
            color: rgba(255, 255, 255, 0.85);
            font-size: 0.9rem;
            margin: 0;
        }

        /* Kontak Darurat */
        .emergency-card {
            background: #FFF5F5;
            border: 1px solid #FEE2E2;
            /* border-radius: var(--border-radius); */
            border-radius: 0px;
            padding: 20px 12px;
            text-align: center;
            height: 100%;
            box-shadow: var(--card-shadow);
            transition: var(--transition);
        }

        .emergency-card:hover {
            background: #FEF2F2;
            transform: translateY(-3px);
            box-shadow: var(--card-shadow-hover);
        }

        .emergency-card .em-icon {
            width: 56px;
            height: 56px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 12px;
            font-size: 1.5rem;
            color: var(--danger);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.04);
        }

        .emergency-card h5 {
            font-weight: 700;
            margin-bottom: 4px;
            font-size: 0.9rem;
        }

        .emergency-card .phone {
            font-weight: 800;
            font-size: 1rem;
            color: var(--danger);
        }

        /* Footer */
        .footer {
            background: #0F172A;
            color: #CBD5E1;
            padding-top: 50px;
        }

        .footer h5 {
            color: white;
            margin-bottom: 16px;
        }

        .footer a {
            color: #94A3B8;
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.2s;
            display: inline-block;
        }

        .footer a:hover {
            color: white;
        }

        .footer .social-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #1E293B;
            margin-right: 8px;
            margin-bottom: 8px;
            transition: var(--transition);
            color: #CBD5E1;
        }

        .footer .social-icon:hover {
            background: var(--primary-green);
            color: white;
            transform: translateY(-2px);
        }

        .footer-map {
            position: relative;
            border-radius: 0;
            overflow: hidden;
            height: 200px;
            background: #1E293B;
        }

        .footer-map iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0;
        }

        .footer-bottom {
            border-top: 1px solid #1E293B;
            margin-top: 40px;
            padding: 16px 0;
            font-size: 0.8rem;
            color: #64748B;
            text-align: center;
        }

        /* Responsive */
        @media (min-width: 425px) {
            :root {
                --section-padding-y: 55px;
                --container-padding-x: 20px;
            }

            .brand-logos img {
                height: 30px;
            }

            .brand-text .univ-name {
                font-size: 0.75rem;
            }

            .brand-text .system-name {
                font-size: 1rem;
            }
        }

        @media (min-width: 576px) {
            :root {
                --section-padding-y: 60px;
                --container-padding-x: 24px;
            }

            .hero-buttons {
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
            }

            .hero-buttons .btn {
                width: auto;
            }

            .timeline {
                flex-direction: row;
                align-items: flex-start;
                justify-content: space-between;
                gap: 12px;
            }

            .timeline-step {
                flex-direction: column;
                align-items: center;
                text-align: center;
                width: auto;
                flex: 1;
            }

            .step-circle {
                margin-bottom: 8px;
            }
        }

        @media (min-width: 768px) {
            :root {
                --section-padding-y: 70px;
                --container-padding-x: 32px;
            }

            body {
                padding-top: 76px;
            }

            .navbar {
                padding: 10px 0;
                min-height: 76px;
            }

            .navbar-collapse {
                background: transparent;
                box-shadow: none;
                padding: 0;
                margin-top: 0;
                border-radius: 0;
            }

            .navbar-nav {
                gap: 8px;
            }

            .navbar-nav .nav-link {
                padding: 8px 16px !important;
            }

            .navbar-actions {
                flex-direction: row;
                border-top: none;
                margin-top: 0;
                padding-top: 0;
                gap: 12px;
            }

            .navbar-actions .btn {
                width: auto;
            }

            .hero-section {
                padding: 60px 0;
            }

            .hero-content {
                text-align: left;
                margin-bottom: 0;
            }

            .hero-buttons {
                justify-content: flex-start;
            }

            .quick-card {
                padding: 24px 16px;
            }
        }

        @media (min-width: 992px) {
            :root {
                --section-padding-y: 80px;
                --container-padding-x: 40px;
            }

            .hero-section {
                padding: 80px 0;
            }

            .commitment-card {
                padding: 32px;
            }
        }

        @media (min-width: 1200px) {
            :root {
                --section-padding-y: 100px;
                --container-padding-x: 48px;
            }

            .hero-section {
                padding: 100px 0;
            }
        }

        img,
        svg,
        iframe,
        video {
            max-width: 100%;
            height: auto;
        }

        .row {
            margin-left: 0;
            margin-right: 0;
        }

        .bg-k3l {
            background: #DCFCE7 !important;
            color: #15803D !important;
        }

        .bg-clinic {
            background: #DBEAFE !important;
            color: #1D4ED8 !important;
        }

        .bg-security {
            background: #EDE9FE !important;
            color: #7C3AED !important;
        }

        .bg-fire {
            background: #FEE2E2 !important;
            color: #DC2626 !important;
        }

        .bg-ambulance {
            background: #FFEDD5 !important;
            color: #EA580C !important;
        }

        .bg-call {
            background: #E5E7EB !important;
            color: #374151 !important;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-md fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <div class="brand-logos">
                    <img src="{{ asset('storage/asset/logo-bhamada-sm.png') }}" alt="Logo Universitas" loading="lazy">
                    <img src="{{ asset('storage/asset/logo-bhamada-sm.png') }}" alt="Logo K3L" loading="lazy">
                </div>
                <div class="brand-text">
                    <span class="univ-name">Universitas Bhamada Slawi</span>
                    <span class="system-name">Sistem K3L</span>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse rounded-0" id="navbarMain">
                <ul class="navbar-nav mx-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link rounded-0 active" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link rounded-0" href="#tentang">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link rounded-0" href="#edukasi">Edukasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link rounded-0" href="#kegiatan">Kegiatan</a>
                    </li>
                </ul>
                <div class="navbar-actions">
                    <a href="{{ url('login') }}" class="btn btn-outline-blue">
                        @if (auth()->check())
                            {{ auth()->user()->nama_instansi }}
                        @else
                            Login
                        @endif
                    </a>
                    {{-- <a href="#" class="btn btn-danger"><i class="fas fa-clipboard-list"></i> Buat Laporan</a> --}}
                </div>
            </div>
        </div>
    </nav>

    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6" data-aos="fade-up">
                    <div class="hero-content">
                        <span class="badge"><i class="fas fa-shield-alt text-success me-2"></i>Portal Resmi K3L
                            Universitas</span>
                        <h1>Mewujudkan Kampus <span class="highlight">Aman, Sehat, dan Berkelanjutan</span></h1>
                        <p class="lead">Sistem terintegrasi pelaporan insiden, edukasi keselamatan, dan pemantauan K3L
                            untuk seluruh civitas akademika.</p>
                        <div class="hero-buttons">
                            <a href="#" class="btn btn-danger">
                                <i class="fas fa-clipboard-list"></i>
                                Buat Laporan
                            </a>
                            <a href="#" class="btn btn-outline-blue">
                                <i class="fas fa-search"></i>
                                Cek Status Laporan
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="hero-image-wrapper">
                        <img src="{{ asset('storage/asset/img-1.png') }}" alt="Foto Satgas K3L 1" loading="lazy">
                        <div class="hero-float-badge">
                            <i class="fas fa-check-circle text-success fs-5"></i>
                            <div>
                                <strong>Terverifikasi</strong>
                                <br>
                                <small class="text-muted">ISO 45001:2018</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="quick-access-section">
        <div class="container">
            <div class="row g-3 justify-content-center">
                <div class="col-6 col-sm-4 col-md-2" data-aos="zoom-in">
                    <div class="quick-card">
                        <div class="qc-icon" style="background:#DBEAFE; color:#1D4ED8;">
                            <i class="fas fa-inbox"></i>
                        </div>
                        <h4>1,234</h4>
                        <p>Laporan Masuk</p>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-md-2" data-aos="zoom-in">
                    <div class="quick-card">
                        <div class="qc-icon" style="background:#FEF3C7; color:#D97706;">
                            <i class="fas fa-spinner"></i>
                        </div>
                        <h4>567</h4>
                        <p>Laporan Proses</p>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-md-2" data-aos="zoom-in">
                    <div class="quick-card">
                        <div class="qc-icon" style="background:#DCFCE7; color:#15803D;">
                            <i class="fas fa-circle-check"></i>
                        </div>
                        <h4>567</h4>
                        <p>Laporan Selesai</p>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-md-2" data-aos="zoom-in">
                    <div class="quick-card">
                        <div class="qc-icon" style="background:#E0F2FE; color:#0369A1;">
                            <i class="fas fa-book-open"></i>
                        </div>
                        <h5>SOP K3L</h5>
                        <p>Panduan Lengkap</p>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-md-2" data-aos="zoom-in">
                    <div class="quick-card">
                        <div class="qc-icon" style="background:#FFF7ED; color:#C2410C;">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <h5>Edukasi</h5>
                        <p>Materi & Video</p>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-md-2" data-aos="zoom-in">
                    <div class="quick-card">
                        <div class="qc-icon" style="background:#F5F3FF; color:#6D28D9;">
                            <i class="fas fa-calendar-days"></i>
                        </div>
                        <h5>Kegiatan</h5>
                        <p>Agenda K3L</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding workflow-section">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2>Alur Pelaporan Insiden</h2>
                <p class="text-muted">Proses transparan dan akuntabel dari pelaporan hingga penyelesaian</p>
            </div>
            <div class="timeline" data-aos="fade-up">
                <div class="timeline-step">
                    <div class="step-circle">1</div>
                    <div class="step-content">
                        <h5>Buat Laporan</h5>
                        <p>Isi formulir online</p>
                    </div>
                </div>
                <div class="timeline-step">
                    <div class="step-circle">2</div>
                    <div class="step-content">
                        <h5>Verifikasi</h5>
                        <p>Pemeriksaan laporan</p>
                    </div>
                </div>
                <div class="timeline-step">
                    <div class="step-circle">3</div>
                    <div class="step-content">
                        <h5>Tindak Lanjut</h5>
                        <p>Investigasi dan penanganan</p>
                    </div>
                </div>
                <div class="timeline-step">
                    <div class="step-circle">4</div>
                    <div class="step-content">
                        <h5>Penyelesaian</h5>
                        <p>Perbaikan dan tindakan korektif</p>
                    </div>
                </div>
                <div class="timeline-step">
                    <div class="step-circle">5</div>
                    <div class="step-content">
                        <h5>Laporan Selesai</h5>
                        <p>Kasus ditutup dan didokumentasikan</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding commitment-section">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="text-white">Komitmen Kami</h2>
                <p class="text-white-50">Universitas bertekad menciptakan lingkungan yang aman dan sehat</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up">
                    <div class="commitment-card"><i class="fas fa-shield-heart"></i>
                        <h4>Keselamatan Prioritas</h4>
                        <p>Setiap aktivitas didasarkan pada prinsip keselamatan sebagai nilai utama.</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up">
                    <div class="commitment-card"><i class="fas fa-hand-holding-heart"></i>
                        <h4>Perlindungan Civitas</h4>
                        <p>Mahasiswa, dosen, dan tenaga kependidikan berhak atas perlindungan optimal.</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up">
                    <div class="commitment-card"><i class="fas fa-leaf"></i>
                        <h4>Peduli Lingkungan</h4>
                        <p>Menerapkan praktik ramah lingkungan dan pengelolaan limbah sesuai regulasi.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding" id="darurat">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2>Kontak Darurat</h2>
                <p class="text-muted">Layanan siaga 24 jam untuk situasi darurat di lingkungan kampus</p>
            </div>
            <div class="row g-3">
                <div class="col-6 col-sm-4 col-lg-2">
                    <div class="emergency-card">
                        <div class="em-icon bg-k3l">
                            <i class="fas fa-helmet-safety"></i>
                        </div>
                        <h5>Satgas K3L</h5>
                        <div class="phone">0812-3456-7890</div>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-lg-2">
                    <div class="emergency-card">
                        <div class="em-icon bg-clinic">
                            <i class="fas fa-kit-medical"></i>
                        </div>
                        <h5>Klinik Kampus</h5>
                        <div class="phone">(021) 1234-567</div>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-lg-2">
                    <div class="emergency-card">
                        <div class="em-icon bg-security">
                            <i class="fas fa-user-shield"></i>
                        </div>
                        <h5>Security</h5>
                        <div class="phone">(021) 1234-568</div>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-lg-2">
                    <div class="emergency-card">
                        <div class="em-icon bg-fire">
                            <i class="fas fa-fire-extinguisher"></i>
                        </div>
                        <h5>Pemadam</h5>
                        <div class="phone">113</div>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-lg-2">
                    <div class="emergency-card">
                        <div class="em-icon bg-ambulance">
                            <i class="fas fa-truck-medical"></i>
                        </div>
                        <h5>Ambulans</h5>
                        <div class="phone">119</div>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-lg-2">
                    <div class="emergency-card">
                        <div class="em-icon bg-call">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h5>Call Center</h5>
                        <div class="phone">1500-123</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer" id="kontak">
        <div class="container">
            <div class="row g-4">
                <div class="col-12 col-lg-5">
                    <h5>
                        Satgas K3L
                        <br>
                        Universitas Bhamada Slawi
                    </h5>
                    <ul class="list-unstyled">
                        <li>
                            <i class="fas fa-map-marker-alt me-2 text-success"></i>
                            Jl. Cut Nyak Dhien No.16, Desa Kalisapu, Kecamatan Slawi, Kabupaten Tegal 52416
                        </li>
                        <li>
                            <i class="fas fa-envelope me-2 text-success"></i>
                            satgas-k3l@bhamada.ac.id
                        </li>
                        <li>
                            <i class="fas fa-phone me-2 text-success"></i>
                            (0283) 6197570
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-lg-2">
                    <h5>Media Sosial</h5>
                    <div>
                        <a href="https://www.facebook.com/" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://www.instagram.com/" class="social-icon">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.youtube.com/" class="social-icon">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <h5>Lokasi</h5>
                    <div class="footer-map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.1515726547022!2d109.1206352!3d-6.991421899999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fbef42471658d%3A0x883656d1325ef066!2sUniversitas%20Bhamada%20Slawi!5e0!3m2!1sid!2sid!4v1781663926929!5m2!1sid!2sid"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p class="mb-0">
                    &copy; {{ date('Y') }}
                    <a href="https://it.bhamada.ac.id/">IT BHAMADA</a>
                    Universitas Bhamada Slawi
                </p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            offset: 60,
            duration: 600
        });
    </script>
</body>

</html>
