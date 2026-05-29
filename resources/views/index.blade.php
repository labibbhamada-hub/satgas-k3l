<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem K3L - Keselamatan, Kesehatan Kerja & Lingkungan</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        :root {
            --primary-green: #0D9488;
            --primary-green-dark: #0F766E;
            --primary-blue: #1E40AF;
            --primary-blue-dark: #1E3A8A;
            --secondary-green: #10B981;
            --light-green: #ECFDF5;
            --light-blue: #EFF6FF;
            --dark-text: #1F2937;
            --gray-text: #6B7280;
            --warning-orange: #F59E0B;
            --danger-red: #EF4444;
            --danger-red-dark: #DC2626;
            --white: #FFFFFF;
            --font-heading: 'Plus Jakarta Sans', sans-serif;
            --font-body: 'Inter', sans-serif;
            --border-radius: 16px;
            --card-shadow: 0 1px 3px rgba(0, 0, 0, 0.06), 0 1px 2px rgba(0, 0, 0, 0.04);
            --card-shadow-hover: 0 20px 40px rgba(0, 0, 0, 0.08), 0 8px 16px rgba(0, 0, 0, 0.04);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
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
            line-height: 1.7;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: var(--font-heading);
            font-weight: 700;
            color: var(--dark-text);
        }

        .section-title {
            position: relative;
            display: inline-block;
            margin-bottom: 1rem;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 60px;
            height: 4px;
            background: var(--primary-green);
            border-radius: 2px;
        }

        .text-center .section-title::after {
            left: 50%;
            transform: translateX(-50%);
        }

        .section-subtitle {
            color: var(--gray-text);
            font-size: 1.1rem;
        }

        /* ============ NAVBAR ============ */
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.06);
            padding: 12px 0;
            transition: var(--transition);
        }

        .navbar.scrolled {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .navbar-brand {
            font-family: var(--font-heading);
            font-weight: 700;
            font-size: 1.35rem;
            color: var(--primary-blue) !important;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .navbar-brand .logo-icon {
            width: 42px;
            height: 42px;
            background: linear-gradient(135deg, var(--primary-green), var(--primary-blue));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.3rem;
        }

        .nav-link {
            font-weight: 500;
            color: var(--dark-text) !important;
            margin: 0 4px;
            padding: 8px 14px !important;
            border-radius: 8px;
            transition: var(--transition);
            position: relative;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 2px;
            left: 50%;
            transform: translateX(-50%) scaleX(0);
            width: 60%;
            height: 2px;
            background: var(--primary-green);
            transition: transform 0.3s ease;
            border-radius: 1px;
        }

        .nav-link:hover::after,
        .nav-link.active::after {
            transform: translateX(-50%) scaleX(1);
        }

        .nav-link:hover {
            color: var(--primary-green) !important;
            background: var(--light-green);
        }

        .btn-report {
            background: var(--danger-red);
            color: white !important;
            border: none;
            padding: 10px 22px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: var(--transition);
            box-shadow: 0 4px 14px rgba(239, 68, 68, 0.35);
            white-space: nowrap;
        }

        .btn-report:hover {
            background: var(--danger-red-dark);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(239, 68, 68, 0.45);
            color: white;
        }

        .btn-login {
            background: transparent;
            color: var(--primary-blue) !important;
            border: 2px solid var(--primary-blue);
            padding: 8px 20px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: var(--transition);
            white-space: nowrap;
        }

        .btn-login:hover {
            background: var(--primary-blue);
            color: white !important;
            transform: translateY(-2px);
        }

        /* ============ HERO ============ */
        .hero-section {
            background: linear-gradient(170deg, #F0FDF9 0%, #FFFFFF 40%, #EFF6FF 100%);
            padding: 140px 0 100px;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: -200px;
            right: -200px;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(13, 148, 136, 0.06) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        .hero-section::after {
            content: '';
            position: absolute;
            bottom: -100px;
            left: -100px;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(30, 64, 175, 0.04) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: white;
            border: 1px solid #E5E7EB;
            padding: 8px 18px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--primary-green);
            margin-bottom: 24px;
            box-shadow: var(--card-shadow);
        }

        .hero-badge .badge-dot {
            width: 10px;
            height: 10px;
            background: var(--secondary-green);
            border-radius: 50%;
            animation: pulse-dot 2s infinite;
        }

        @keyframes pulse-dot {

            0%,
            100% {
                opacity: 1;
                transform: scale(1);
            }

            50% {
                opacity: 0.5;
                transform: scale(1.5);
            }
        }

        .hero-title {
            font-family: var(--font-heading);
            font-weight: 800;
            font-size: 3.5rem;
            line-height: 1.2;
            color: var(--dark-text);
            margin-bottom: 20px;
        }

        .hero-title .highlight {
            background: linear-gradient(135deg, var(--primary-green), var(--primary-blue));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-desc {
            font-size: 1.15rem;
            color: var(--gray-text);
            margin-bottom: 32px;
            max-width: 500px;
            line-height: 1.8;
        }

        .hero-buttons {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
        }

        .btn-hero-primary {
            background: var(--danger-red);
            color: white;
            border: none;
            padding: 14px 32px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1rem;
            transition: var(--transition);
            box-shadow: 0 6px 20px rgba(239, 68, 68, 0.4);
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .btn-hero-primary:hover {
            background: var(--danger-red-dark);
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(239, 68, 68, 0.5);
            color: white;
        }

        .btn-hero-secondary {
            background: white;
            color: var(--primary-blue);
            border: 2px solid #E5E7EB;
            padding: 14px 32px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1rem;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .btn-hero-secondary:hover {
            border-color: var(--primary-blue);
            background: var(--light-blue);
            transform: translateY(-3px);
            color: var(--primary-blue);
        }

        .hero-illustration {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-illustration img {
            max-width: 100%;
            height: auto;
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .hero-floating-card {
            position: absolute;
            background: white;
            border-radius: 16px;
            padding: 16px 20px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 600;
            font-size: 0.9rem;
            animation: float-card 4s ease-in-out infinite;
        }

        .hero-floating-card.card-1 {
            top: 10%;
            right: -20px;
            animation-delay: 0s;
        }

        .hero-floating-card.card-2 {
            bottom: 15%;
            left: -10px;
            animation-delay: 1.5s;
        }

        @keyframes float-card {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .hero-floating-card .fc-icon {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
        }

        .fc-icon.green {
            background: var(--light-green);
            color: var(--primary-green);
        }

        .fc-icon.blue {
            background: var(--light-blue);
            color: var(--primary-blue);
        }

        /* ============ STATISTIK ============ */
        .stats-section {
            padding: 60px 0;
            margin-top: -50px;
            position: relative;
            z-index: 10;
        }

        .stat-card {
            background: white;
            border-radius: var(--border-radius);
            padding: 30px 24px;
            text-align: center;
            box-shadow: var(--card-shadow);
            transition: var(--transition);
            border: 1px solid #F3F4F6;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-green), var(--secondary-green));
            border-radius: 0 0 4px 4px;
        }

        .stat-card:nth-child(2)::before {
            background: linear-gradient(90deg, var(--primary-blue), #6366F1);
        }

        .stat-card:nth-child(3)::before {
            background: linear-gradient(90deg, var(--warning-orange), #FBBF24);
        }

        .stat-card:nth-child(4)::before {
            background: linear-gradient(90deg, var(--secondary-green), #34D399);
        }

        .stat-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--card-shadow-hover);
        }

        .stat-icon {
            width: 56px;
            height: 56px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            font-size: 1.5rem;
        }

        .stat-icon.green {
            background: var(--light-green);
            color: var(--primary-green);
        }

        .stat-icon.blue {
            background: var(--light-blue);
            color: var(--primary-blue);
        }

        .stat-icon.orange {
            background: #FFFBEB;
            color: var(--warning-orange);
        }

        .stat-icon.emerald {
            background: #ECFDF5;
            color: var(--secondary-green);
        }

        .stat-number {
            font-family: var(--font-heading);
            font-weight: 800;
            font-size: 2.5rem;
            color: var(--dark-text);
            margin-bottom: 4px;
        }

        .stat-label {
            color: var(--gray-text);
            font-size: 0.9rem;
            font-weight: 500;
        }

        /* ============ TENTANG ============ */
        .about-section {
            padding: 100px 0;
            background: var(--white);
        }

        .about-image-wrapper {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .about-image-wrapper img {
            max-width: 100%;
            border-radius: 20px;
        }

        .about-image-wrapper .about-badge {
            position: absolute;
            bottom: -20px;
            right: -20px;
            background: var(--primary-green);
            color: white;
            padding: 20px 24px;
            border-radius: 16px;
            text-align: center;
            box-shadow: 0 20px 40px rgba(13, 148, 136, 0.3);
        }

        .about-badge .badge-number {
            font-family: var(--font-heading);
            font-weight: 800;
            font-size: 2rem;
            display: block;
        }

        .value-card {
            background: white;
            border: 1px solid #F3F4F6;
            border-radius: 12px;
            padding: 16px 20px;
            display: flex;
            align-items: center;
            gap: 14px;
            transition: var(--transition);
            margin-bottom: 12px;
        }

        .value-card:hover {
            border-color: var(--primary-green);
            box-shadow: var(--card-shadow);
            transform: translateX(5px);
        }

        .value-icon {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            flex-shrink: 0;
        }

        .value-icon.safety {
            background: #FFF1F2;
            color: #E11D48;
        }

        .value-icon.collab {
            background: #EFF6FF;
            color: #1E40AF;
        }

        .value-icon.sustain {
            background: #ECFDF5;
            color: #0D9488;
        }

        /* ============ LAYANAN ============ */
        .services-section {
            padding: 100px 0;
            background: #F8FAFC;
        }

        .service-card {
            background: white;
            border-radius: var(--border-radius);
            padding: 32px 24px;
            text-align: center;
            box-shadow: var(--card-shadow);
            transition: var(--transition);
            border: 2px solid transparent;
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        .service-card:hover {
            border-color: var(--primary-green);
            box-shadow: var(--card-shadow-hover);
            transform: translateY(-6px);
        }

        .service-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%) scaleX(0);
            width: 80%;
            height: 3px;
            background: var(--primary-green);
            border-radius: 3px;
            transition: transform 0.4s ease;
        }

        .service-card:hover::after {
            transform: translateX(-50%) scaleX(1);
        }

        .service-icon-circle {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 1.8rem;
            transition: var(--transition);
        }

        .service-icon-circle.green {
            background: var(--light-green);
            color: var(--primary-green);
        }

        .service-icon-circle.blue {
            background: var(--light-blue);
            color: var(--primary-blue);
        }

        .service-icon-circle.orange {
            background: #FFFBEB;
            color: var(--warning-orange);
        }

        .service-icon-circle.purple {
            background: #F5F3FF;
            color: #7C3AED;
        }

        .service-icon-circle.red {
            background: #FFF1F2;
            color: #E11D48;
        }

        .service-card h4 {
            font-size: 1.15rem;
            margin-bottom: 8px;
        }

        .service-card p {
            color: var(--gray-text);
            font-size: 0.9rem;
            margin: 0;
        }

        /* ============ EDUKASI ============ */
        .education-section {
            padding: 100px 0;
            background: var(--white);
        }

        .nav-pills .nav-link {
            color: var(--gray-text);
            border-radius: 50px;
            padding: 10px 24px;
            font-weight: 500;
            transition: var(--transition);
            margin: 0 4px;
        }

        .nav-pills .nav-link.active {
            background: var(--primary-green);
            color: white;
            box-shadow: 0 4px 14px rgba(13, 148, 136, 0.35);
        }

        .nav-pills .nav-link:hover:not(.active) {
            background: var(--light-green);
            color: var(--primary-green);
        }

        .edu-card {
            background: white;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--card-shadow);
            transition: var(--transition);
            border: 1px solid #F3F4F6;
            height: 100%;
        }

        .edu-card:hover {
            box-shadow: var(--card-shadow-hover);
            transform: translateY(-4px);
        }

        .edu-card-img {
            height: 180px;
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .edu-card-badge {
            position: absolute;
            top: 12px;
            left: 12px;
            background: var(--primary-green);
            color: white;
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .edu-card-body {
            padding: 20px;
        }

        .edu-card-body h5 {
            font-size: 1rem;
            margin-bottom: 6px;
        }

        .edu-card-body .edu-date {
            font-size: 0.8rem;
            color: var(--gray-text);
        }

        .edu-card-body .edu-link {
            color: var(--primary-green);
            font-weight: 600;
            font-size: 0.85rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            transition: var(--transition);
        }

        .edu-card-body .edu-link:hover {
            gap: 8px;
            color: var(--primary-green-dark);
        }

        .poster-card {
            background: white;
            border-radius: var(--border-radius);
            padding: 24px;
            text-align: center;
            box-shadow: var(--card-shadow);
            transition: var(--transition);
            border: 2px dashed #E5E7EB;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .poster-card:hover {
            border-color: var(--primary-green);
            box-shadow: var(--card-shadow-hover);
        }

        .poster-card .poster-icon {
            font-size: 3rem;
            margin-bottom: 12px;
        }

        .tips-list {
            list-style: none;
            padding: 0;
        }

        .tips-list li {
            padding: 16px 20px;
            background: white;
            border-radius: 12px;
            margin-bottom: 12px;
            box-shadow: var(--card-shadow);
            display: flex;
            align-items: flex-start;
            gap: 14px;
            transition: var(--transition);
            border-left: 4px solid transparent;
        }

        .tips-list li:hover {
            border-left-color: var(--primary-green);
            box-shadow: var(--card-shadow-hover);
        }

        .tips-list li .tip-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--light-green);
            color: var(--primary-green);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 1rem;
        }

        /* ============ KEGIATAN ============ */
        .activities-section {
            padding: 100px 0;
            background: #F8FAFC;
        }

        .activity-card {
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--card-shadow);
            transition: var(--transition);
            background: white;
            height: 100%;
            cursor: pointer;
        }

        .activity-card:hover {
            box-shadow: var(--card-shadow-hover);
            transform: translateY(-4px);
        }

        .activity-card-img {
            height: 200px;
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .activity-card-tag {
            position: absolute;
            top: 12px;
            left: 12px;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 6px 14px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
            backdrop-filter: blur(4px);
        }

        .activity-card-body {
            padding: 20px;
        }

        /* ============ PENGUMUMAN ============ */
        .news-section {
            padding: 100px 0;
            background: var(--white);
        }

        .news-list-item {
            display: flex;
            gap: 20px;
            padding: 20px;
            background: white;
            border-radius: 12px;
            margin-bottom: 16px;
            transition: var(--transition);
            border: 1px solid #F3F4F6;
            cursor: pointer;
        }

        .news-list-item:hover {
            box-shadow: var(--card-shadow-hover);
            border-color: #E5E7EB;
            transform: translateX(4px);
        }

        .news-list-item .news-thumb {
            width: 100px;
            height: 80px;
            border-radius: 10px;
            background-size: cover;
            background-position: center;
            flex-shrink: 0;
        }

        .news-list-item .news-badge {
            display: inline-block;
            background: #FEF3C7;
            color: #92400E;
            padding: 3px 10px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-bottom: 6px;
        }

        .agenda-card {
            background: var(--light-blue);
            border-radius: var(--border-radius);
            padding: 28px;
            border: 1px solid #DBEAFE;
        }

        .agenda-item {
            display: flex;
            gap: 16px;
            padding: 14px 0;
            border-bottom: 1px solid #DBEAFE;
        }

        .agenda-item:last-child {
            border-bottom: none;
        }

        .agenda-date {
            width: 56px;
            height: 56px;
            background: white;
            border-radius: 12px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            box-shadow: var(--card-shadow);
        }

        .agenda-date .date-day {
            font-family: var(--font-heading);
            font-weight: 700;
            font-size: 1.3rem;
            color: var(--primary-blue);
            line-height: 1;
        }

        .agenda-date .date-month {
            font-size: 0.7rem;
            color: var(--gray-text);
            text-transform: uppercase;
        }

        /* ============ CTA ============ */
        .cta-section {
            padding: 100px 0;
            background: linear-gradient(135deg, #0D9488 0%, #1E40AF 100%);
            position: relative;
            overflow: hidden;
        }

        .cta-section::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            opacity: 0.4;
        }

        .cta-content {
            position: relative;
            z-index: 1;
            text-align: center;
            color: white;
        }

        .cta-content h2 {
            color: white;
            font-weight: 800;
            font-size: 2.5rem;
            margin-bottom: 16px;
        }

        .cta-content p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.15rem;
            margin-bottom: 32px;
        }

        .btn-cta {
            background: white;
            color: var(--primary-green);
            border: none;
            padding: 16px 40px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 1.05rem;
            transition: var(--transition);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .btn-cta:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.3);
            color: var(--primary-green-dark);
        }

        /* ============ FOOTER ============ */
        .footer {
            background: #111827;
            color: #D1D5DB;
            padding: 70px 0 0;
        }

        .footer h5 {
            color: white;
            font-family: var(--font-heading);
            font-weight: 700;
            margin-bottom: 20px;
            font-size: 1.05rem;
        }

        .footer a {
            color: #9CA3AF;
            text-decoration: none;
            transition: var(--transition);
            display: block;
            padding: 4px 0;
            font-size: 0.9rem;
        }

        .footer a:hover {
            color: white;
            padding-left: 4px;
        }

        .footer .social-icons {
            display: flex;
            gap: 12px;
        }

        .footer .social-icons a {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: #1F2937;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
            color: #D1D5DB;
            font-size: 1.1rem;
        }

        .footer .social-icons a:hover {
            background: var(--primary-green);
            color: white;
            padding-left: 0;
            transform: translateY(-3px);
        }

        .footer .contact-info li {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 14px;
            font-size: 0.9rem;
        }

        .footer .contact-info li i {
            color: var(--primary-green);
            margin-top: 4px;
            flex-shrink: 0;
        }

        .footer-map {
            border-radius: 12px;
            overflow: hidden;
            height: 160px;
            background: #1F2937;
        }

        .footer-bottom {
            border-top: 1px solid #1F2937;
            padding: 20px 0;
            margin-top: 50px;
            text-align: center;
            font-size: 0.85rem;
            color: #6B7280;
        }

        /* ============ RESPONSIVE ============ */
        @media (max-width: 991px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .hero-section {
                padding: 120px 0 60px;
                text-align: center;
            }

            .hero-desc {
                margin: 0 auto 32px;
            }

            .hero-buttons {
                justify-content: center;
            }

            .hero-illustration {
                margin-top: 40px;
            }

            .hero-floating-card.card-1 {
                right: 0;
                top: 0;
            }

            .hero-floating-card.card-2 {
                left: 0;
                bottom: 0;
            }

            .about-image-wrapper {
                margin-bottom: 40px;
            }

            .stat-card {
                margin-bottom: 20px;
            }
        }

        @media (max-width: 767px) {
            .hero-title {
                font-size: 2rem;
            }

            .section-title {
                font-size: 1.5rem;
            }

            .stat-number {
                font-size: 1.8rem;
            }

            .cta-content h2 {
                font-size: 1.8rem;
            }

            .navbar-brand {
                font-size: 1.1rem;
            }

            .navbar-brand .logo-icon {
                width: 34px;
                height: 34px;
                font-size: 1rem;
            }

            .hero-floating-card {
                display: none;
            }

            .about-image-wrapper .about-badge {
                bottom: -10px;
                right: -10px;
                padding: 14px 18px;
            }

            .about-badge .badge-number {
                font-size: 1.5rem;
            }

            .btn-report,
            .btn-login {
                padding: 8px 16px;
                font-size: 0.8rem;
            }

            .news-list-item {
                flex-direction: column;
            }

            .news-list-item .news-thumb {
                width: 100%;
                height: 140px;
            }
        }

        /* Scroll to top */
        .scroll-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 48px;
            height: 48px;
            background: var(--primary-green);
            color: white;
            border: none;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: var(--transition);
            box-shadow: 0 4px 20px rgba(13, 148, 136, 0.4);
            z-index: 999;
        }

        .scroll-top.visible {
            opacity: 1;
            visibility: visible;
        }

        .scroll-top:hover {
            background: var(--primary-green-dark);
            transform: translateY(-4px);
        }
    </style>
</head>

<body>

    <!-- ==================== NAVBAR ==================== -->
    <nav class="navbar navbar-expand-lg fixed-top" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                <div class="logo-icon">
                    <i class="fa-solid fa-shield-halved"></i>
                </div>
                Sistem <span style="color: var(--primary-green);">K3L</span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" href="#home">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tentang">Tentang K3L</a></li>
                    <li class="nav-item"><a class="nav-link" href="#edukasi">Edukasi</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kegiatan">Kegiatan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#pengumuman">Pengumuman</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
                </ul>
                <div class="d-flex align-items-center gap-2">
                    <a href="#" class="btn btn-login">Login</a>
                    <a href="#" class="btn btn-report">
                        <i class="fa-solid fa-clipboard-list"></i> Buat Laporan
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- ==================== HERO SECTION ==================== -->
    <section class="hero-section" id="home">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right" data-aos-duration="800">
                    <div class="hero-badge">
                        <span class="badge-dot"></span>
                        Sistem Manajemen K3L Terintegrasi
                    </div>
                    <h1 class="hero-title">
                        Keselamatan Kerja,<br>
                        <span class="highlight">Tanggung Jawab Bersama</span>
                    </h1>
                    <p class="hero-desc">
                        Sistem K3L hadir untuk mendukung pengelolaan Keselamatan, Kesehatan Kerja, dan Lingkungan di
                        lingkungan perguruan tinggi. Laporkan insiden, akses edukasi, dan wujudkan budaya keselamatan.
                    </p>
                    <div class="hero-buttons">
                        <a href="#" class="btn btn-hero-primary">
                            <i class="fa-solid fa-triangle-exclamation"></i> Laporkan Insiden
                        </a>
                        <a href="#tentang" class="btn btn-hero-secondary">
                            <i class="fa-solid fa-circle-info"></i> Pelajari Lebih Lanjut
                        </a>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left" data-aos-duration="800" data-aos-delay="200">
                    <div class="hero-illustration">
                        <!-- Ilustrasi SVG modern keselamatan kerja -->
                        <svg viewBox="0 0 500 400" xmlns="http://www.w3.org/2000/svg"
                            style="max-width: 100%; height: auto;">
                            <!-- Latar belakang -->
                            <rect width="500" height="400" fill="transparent" />
                            <!-- Perisai utama -->
                            <path
                                d="M250 30 L380 60 L380 180 C380 280 310 350 250 370 C190 350 120 280 120 180 L120 60 Z"
                                fill="#EFF6FF" stroke="#1E40AF" stroke-width="3" />
                            <path
                                d="M250 50 L360 75 L360 180 C360 265 300 330 250 348 C200 330 140 265 140 180 L140 75 Z"
                                fill="white" stroke="#1E40AF" stroke-width="2" stroke-dasharray="8,4" />
                            <!-- Tanda centang -->
                            <path d="M210 190 L240 220 L295 150" fill="none" stroke="#0D9488" stroke-width="6"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <!-- Figur orang -->
                            <circle cx="250" cy="140" r="25" fill="#1E40AF" opacity="0.9" />
                            <rect x="230" y="175" width="40" height="55" rx="10" fill="#1E40AF"
                                opacity="0.9" />
                            <!-- Helm -->
                            <path d="M218 135 C218 115 282 115 282 135 L290 140 L210 140 Z" fill="#F59E0B" />
                            <!-- Daun -->
                            <path d="M370 100 C360 70 330 60 320 80 C330 70 360 80 370 100Z" fill="#0D9488" />
                            <path d="M370 100 C380 70 410 60 420 80 C410 70 380 80 370 100Z" fill="#10B981" />
                            <!-- Elemen dekoratif -->
                            <circle cx="130" cy="300" r="8" fill="#0D9488" opacity="0.5" />
                            <circle cx="380" cy="250" r="6" fill="#1E40AF" opacity="0.4" />
                            <circle cx="340" cy="320" r="10" fill="#10B981" opacity="0.3" />
                        </svg>
                        <!-- Floating cards -->
                        <div class="hero-floating-card card-1">
                            <div class="fc-icon green"><i class="fa-solid fa-shield-check"></i></div>
                            <div><small style="color:#6B7280;">Status Sistem</small><br><strong
                                    style="color:#0D9488;">Aman Terkendali</strong></div>
                        </div>
                        <div class="hero-floating-card card-2">
                            <div class="fc-icon blue"><i class="fa-solid fa-users"></i></div>
                            <div><small style="color:#6B7280;">Civitas Aktif</small><br><strong
                                    style="color:#1E40AF;">12,000+ Pengguna</strong></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== STATISTIK ==================== -->
    <section class="stats-section">
        <div class="container">
            <div class="row g-4">
                <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-duration="600" data-aos-delay="0">
                    <div class="stat-card">
                        <div class="stat-icon green"><i class="fa-solid fa-file-pen"></i></div>
                        <div class="stat-number" data-count="1245">1,245</div>
                        <div class="stat-label">Laporan Masuk</div>
                    </div>
                </div>
                <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-duration="600" data-aos-delay="100">
                    <div class="stat-card">
                        <div class="stat-icon blue"><i class="fa-solid fa-circle-check"></i></div>
                        <div class="stat-number" data-count="987">987</div>
                        <div class="stat-label">Laporan Selesai</div>
                    </div>
                </div>
                <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-duration="600" data-aos-delay="200">
                    <div class="stat-card">
                        <div class="stat-icon orange"><i class="fa-solid fa-calendar-check"></i></div>
                        <div class="stat-number" data-count="156">156</div>
                        <div class="stat-label">Kegiatan K3L</div>
                    </div>
                </div>
                <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-duration="600" data-aos-delay="300">
                    <div class="stat-card">
                        <div class="stat-icon emerald"><i class="fa-solid fa-graduation-cap"></i></div>
                        <div class="stat-number" data-count="4320">4,320</div>
                        <div class="stat-label">Peserta Pelatihan</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== TENTANG K3L ==================== -->
    <section class="about-section" id="tentang">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 mb-4 mb-lg-0" data-aos="fade-right" data-aos-duration="800">
                    <div class="about-image-wrapper">
                        <svg viewBox="0 0 400 350" xmlns="http://www.w3.org/2000/svg" style="max-width: 100%;">
                            <!-- Background circle -->
                            <circle cx="200" cy="175" r="160" fill="#ECFDF5" />
                            <!-- Dokumen -->
                            <rect x="100" y="50" width="140" height="180" rx="12" fill="white"
                                stroke="#0D9488" stroke-width="2.5" />
                            <line x1="120" y1="80" x2="220" y2="80" stroke="#D1D5DB"
                                stroke-width="3" stroke-linecap="round" />
                            <line x1="120" y1="100" x2="200" y2="100" stroke="#D1D5DB"
                                stroke-width="3" stroke-linecap="round" />
                            <line x1="120" y1="120" x2="180" y2="120" stroke="#D1D5DB"
                                stroke-width="3" stroke-linecap="round" />
                            <rect x="120" y="145" width="100" height="16" rx="8" fill="#ECFDF5" />
                            <rect x="120" y="170" width="80" height="16" rx="8" fill="#ECFDF5" />
                            <!-- Clipboard dengan centang -->
                            <rect x="260" y="90" width="100" height="120" rx="10" fill="white"
                                stroke="#1E40AF" stroke-width="2.5" transform="rotate(10, 310, 150)" />
                            <path d="M280 140 L300 160 L330 120" fill="none" stroke="#0D9488" stroke-width="5"
                                stroke-linecap="round" stroke-linejoin="round" transform="rotate(10, 310, 150)" />
                            <!-- Figur kecil -->
                            <circle cx="200" cy="300" r="18" fill="#1E40AF" opacity="0.8" />
                            <path d="M175 320 C175 305 225 305 225 320 L230 350 L170 350 Z" fill="#1E40AF"
                                opacity="0.8" />
                            <path d="M170 308 C170 292 230 292 230 308 L236 314 L164 314 Z" fill="#F59E0B" />
                        </svg>
                        <div class="about-badge">
                            <span class="badge-number">10+</span>
                            Tahun Melayani
                        </div>
                    </div>
                </div>
                <div class="col-lg-7" data-aos="fade-left" data-aos-duration="800">
                    <span class="section-title">Tentang Sistem K3L</span>
                    <h2 style="font-weight: 800; font-size: 2rem; margin-bottom: 20px;">
                        Membangun Budaya Keselamatan di Lingkungan Kampus
                    </h2>
                    <p style="color: #6B7280; margin-bottom: 24px;">
                        Sistem K3L adalah platform terintegrasi yang dirancang untuk mendukung pengelolaan Keselamatan,
                        Kesehatan Kerja, dan Lingkungan di lingkungan perguruan tinggi. Sistem ini memfasilitasi
                        pelaporan insiden, pemantauan tindak lanjut, edukasi keselamatan, dan penyebaran informasi
                        terkait program K3L kepada seluruh civitas akademika.
                    </p>
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <div class="value-card">
                                <div class="value-icon safety"><i class="fa-solid fa-bullseye"></i></div>
                                <div>
                                    <strong>Visi</strong>
                                    <p style="font-size:0.85rem;color:#6B7280;margin:0;">Menjadi kampus yang unggul
                                        dalam budaya keselamatan dan kesehatan kerja.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="value-card">
                                <div class="value-icon collab"><i class="fa-solid fa-flag-checkered"></i></div>
                                <div>
                                    <strong>Misi</strong>
                                    <p style="font-size:0.85rem;color:#6B7280;margin:0;">Mencegah kecelakaan kerja dan
                                        menciptakan lingkungan kampus yang aman.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h5 style="font-weight: 700; margin-bottom: 16px;">Nilai-Nilai Keselamatan Kerja</h5>
                    <div class="d-flex flex-wrap gap-3">
                        <div class="value-card" style="flex:1;min-width:140px;">
                            <div class="value-icon safety"><i class="fa-solid fa-shield-heart"></i></div>
                            <strong>Safety First</strong>
                        </div>
                        <div class="value-card" style="flex:1;min-width:140px;">
                            <div class="value-icon collab"><i class="fa-solid fa-handshake"></i></div>
                            <strong>Kolaboratif</strong>
                        </div>
                        <div class="value-card" style="flex:1;min-width:140px;">
                            <div class="value-icon sustain"><i class="fa-solid fa-seedling"></i></div>
                            <strong>Berkelanjutan</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== LAYANAN UTAMA ==================== -->
    <section class="services-section" id="layanan">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="section-title">Layanan Utama</span>
                <h2 style="font-weight: 800; font-size: 2rem;">Fasilitas K3L untuk Civitas Akademika</h2>
                <p class="section-subtitle">Berbagai layanan yang mendukung keselamatan dan kesehatan di lingkungan
                    kampus</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="0">
                    <div class="service-card">
                        <div class="service-icon-circle red">
                            <i class="fa-solid fa-clipboard-list"></i>
                        </div>
                        <h4>Pelaporan Insiden</h4>
                        <p>Laporkan kecelakaan kerja, potensi bahaya, atau insiden lingkungan secara cepat dan
                            terstruktur.</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-card">
                        <div class="service-icon-circle blue">
                            <i class="fa-solid fa-chart-line"></i>
                        </div>
                        <h4>Monitoring Laporan</h4>
                        <p>Pantau status dan tindak lanjut laporan yang telah diajukan secara transparan.</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-card">
                        <div class="service-icon-circle green">
                            <i class="fa-solid fa-book-open"></i>
                        </div>
                        <h4>Edukasi Keselamatan</h4>
                        <p>Akses materi edukasi, artikel, video, dan poster tentang keselamatan kerja.</p>
                    </div>
                </div>
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-card">
                        <div class="service-icon-circle purple">
                            <i class="fa-solid fa-file-lines"></i>
                        </div>
                        <h4>SOP & Panduan</h4>
                        <p>Unduh standar operasional prosedur dan panduan keselamatan kerja di laboratorium dan area
                            praktik.</p>
                    </div>
                </div>
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-card">
                        <div class="service-icon-circle orange">
                            <i class="fa-solid fa-headset"></i>
                        </div>
                        <h4>Konsultasi K3L</h4>
                        <p>Dapatkan konsultasi dan bimbingan dari tim ahli K3L kampus secara langsung atau daring.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== EDUKASI KESELAMATAN ==================== -->
    <section class="education-section" id="edukasi">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="section-title">Edukasi Keselamatan</span>
                <h2 style="font-weight: 800; font-size: 2rem;">Materi & Sumber Belajar K3L</h2>
                <p class="section-subtitle">Tingkatkan pengetahuan keselamatan kerja melalui berbagai media edukasi</p>
            </div>

            <!-- Tab Navigasi -->
            <ul class="nav nav-pills justify-content-center mb-5" id="eduTabs" role="tablist" data-aos="fade-up">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="article-tab" data-bs-toggle="pill"
                        data-bs-target="#article-pane" type="button" role="tab">
                        <i class="fa-solid fa-newspaper me-1"></i> Artikel
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="video-tab" data-bs-toggle="pill" data-bs-target="#video-pane"
                        type="button" role="tab">
                        <i class="fa-solid fa-play me-1"></i> Video
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="poster-tab" data-bs-toggle="pill" data-bs-target="#poster-pane"
                        type="button" role="tab">
                        <i class="fa-solid fa-image me-1"></i> Poster
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="tips-tab" data-bs-toggle="pill" data-bs-target="#tips-pane"
                        type="button" role="tab">
                        <i class="fa-solid fa-lightbulb me-1"></i> Tips
                    </button>
                </li>
            </ul>

            <!-- Konten Tab -->
            <div class="tab-content" id="eduTabsContent">
                <!-- Artikel -->
                <div class="tab-pane fade show active" id="article-pane" role="tabpanel">
                    <div class="row g-4">
                        <div class="col-md-4" data-aos="fade-up" data-aos-delay="0">
                            <div class="edu-card">
                                <div class="edu-card-img"
                                    style="background: linear-gradient(135deg, #0D9488, #10B981); display: flex; align-items: center; justify-content: center;">
                                    <i class="fa-solid fa-fire-extinguisher"
                                        style="font-size: 3rem; color: rgba(255,255,255,0.5);"></i>
                                </div>
                                <div class="edu-card-body">
                                    <span class="edu-card-badge">Keselamatan</span>
                                    <h5>Prosedur Penggunaan APAR yang Benar</h5>
                                    <p class="edu-date"><i class="fa-regular fa-calendar"></i> 12 Mei 2026</p>
                                    <a href="#" class="edu-link">Baca Selengkapnya <i
                                            class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                            <div class="edu-card">
                                <div class="edu-card-img"
                                    style="background: linear-gradient(135deg, #1E40AF, #6366F1); display: flex; align-items: center; justify-content: center;">
                                    <i class="fa-solid fa-flask"
                                        style="font-size: 3rem; color: rgba(255,255,255,0.5);"></i>
                                </div>
                                <div class="edu-card-body">
                                    <span class="edu-card-badge">Laboratorium</span>
                                    <h5>Keamanan Bekerja di Laboratorium Kimia</h5>
                                    <p class="edu-date"><i class="fa-regular fa-calendar"></i> 8 Mei 2026</p>
                                    <a href="#" class="edu-link">Baca Selengkapnya <i
                                            class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                            <div class="edu-card">
                                <div class="edu-card-img"
                                    style="background: linear-gradient(135deg, #F59E0B, #FBBF24); display: flex; align-items: center; justify-content: center;">
                                    <i class="fa-solid fa-leaf"
                                        style="font-size: 3rem; color: rgba(255,255,255,0.5);"></i>
                                </div>
                                <div class="edu-card-body">
                                    <span class="edu-card-badge">Lingkungan</span>
                                    <h5>Pengelolaan Limbah B3 di Area Kampus</h5>
                                    <p class="edu-date"><i class="fa-regular fa-calendar"></i> 3 Mei 2026</p>
                                    <a href="#" class="edu-link">Baca Selengkapnya <i
                                            class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <a href="#" class="btn btn-hero-secondary">Lihat Semua Artikel <i
                                class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>

                <!-- Video -->
                <div class="tab-pane fade" id="video-pane" role="tabpanel">
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="edu-card">
                                <div class="edu-card-img"
                                    style="background: #1F2937; display: flex; align-items: center; justify-content: center;">
                                    <i class="fa-solid fa-circle-play" style="font-size: 3rem; color: white;"></i>
                                </div>
                                <div class="edu-card-body">
                                    <span class="edu-card-badge">Video</span>
                                    <h5>Simulasi Evakuasi Kebakaran</h5>
                                    <p class="edu-date">Durasi: 15:30</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="edu-card">
                                <div class="edu-card-img"
                                    style="background: #1F2937; display: flex; align-items: center; justify-content: center;">
                                    <i class="fa-solid fa-circle-play" style="font-size: 3rem; color: white;"></i>
                                </div>
                                <div class="edu-card-body">
                                    <span class="edu-card-badge">Video</span>
                                    <h5>Penggunaan APD yang Tepat</h5>
                                    <p class="edu-date">Durasi: 10:45</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="edu-card">
                                <div class="edu-card-img"
                                    style="background: #1F2937; display: flex; align-items: center; justify-content: center;">
                                    <i class="fa-solid fa-circle-play" style="font-size: 3rem; color: white;"></i>
                                </div>
                                <div class="edu-card-body">
                                    <span class="edu-card-badge">Video</span>
                                    <h5>Pertolongan Pertama pada Kecelakaan</h5>
                                    <p class="edu-date">Durasi: 20:15</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Poster -->
                <div class="tab-pane fade" id="poster-pane" role="tabpanel">
                    <div class="row g-4">
                        <div class="col-md-3 col-6">
                            <div class="poster-card">
                                <div class="poster-icon">🛡️</div>
                                <h6>Budaya 5R</h6>
                                <small style="color:#6B7280;">Ringkas, Rapi, Resik, Rawat, Rajin</small>
                                <a href="#" class="btn btn-sm mt-2" style="color:var(--primary-green);">Unduh
                                    PDF</a>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="poster-card">
                                <div class="poster-icon">🧯</div>
                                <h6>Gunakan APAR</h6>
                                <small style="color:#6B7280;">Panduan penggunaan alat pemadam</small>
                                <a href="#" class="btn btn-sm mt-2" style="color:var(--primary-green);">Unduh
                                    PDF</a>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="poster-card">
                                <div class="poster-icon">⚠️</div>
                                <h6>Rambu K3</h6>
                                <small style="color:#6B7280;">Kenali rambu keselamatan</small>
                                <a href="#" class="btn btn-sm mt-2" style="color:var(--primary-green);">Unduh
                                    PDF</a>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="poster-card">
                                <div class="poster-icon">🧤</div>
                                <h6>APD Lengkap</h6>
                                <small style="color:#6B7280;">Alat Pelindung Diri wajib</small>
                                <a href="#" class="btn btn-sm mt-2" style="color:var(--primary-green);">Unduh
                                    PDF</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tips -->
                <div class="tab-pane fade" id="tips-pane" role="tabpanel">
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <ul class="tips-list">
                                <li>
                                    <div class="tip-icon"><i class="fa-solid fa-check"></i></div>
                                    <div>
                                        <strong>Selalu gunakan APD lengkap</strong>
                                        <p style="color:#6B7280;margin:0;font-size:0.9rem;">Pastikan helm, kacamata
                                            safety, sarung tangan, dan sepatu keselamatan digunakan sebelum memasuki
                                            area praktik.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="tip-icon"><i class="fa-solid fa-check"></i></div>
                                    <div>
                                        <strong>Kenali jalur evakuasi</strong>
                                        <p style="color:#6B7280;margin:0;font-size:0.9rem;">Hafalkan titik kumpul dan
                                            jalur evakuasi terdekat di gedung tempat Anda beraktivitas.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="tip-icon"><i class="fa-solid fa-check"></i></div>
                                    <div>
                                        <strong>Laporkan potensi bahaya segera</strong>
                                        <p style="color:#6B7280;margin:0;font-size:0.9rem;">Jangan menunda pelaporan
                                            jika menemukan kondisi yang berpotensi membahayakan.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="tip-icon"><i class="fa-solid fa-check"></i></div>
                                    <div>
                                        <strong>Ikuti pelatihan K3 secara berkala</strong>
                                        <p style="color:#6B7280;margin:0;font-size:0.9rem;">Tingkatkan kompetensi
                                            keselamatan Anda melalui program pelatihan yang disediakan.</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== KEGIATAN & PROGRAM ==================== -->
    <section class="activities-section" id="kegiatan">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="section-title">Kegiatan & Program</span>
                <h2 style="font-weight: 800; font-size: 2rem;">Program Unggulan K3L Kampus</h2>
                <p class="section-subtitle">Berbagai kegiatan untuk meningkatkan kesadaran keselamatan kerja</p>
            </div>
            <div class="row g-4">
                <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="0">
                    <div class="activity-card">
                        <div class="activity-card-img"
                            style="background: linear-gradient(135deg, #0D9488, #34D399); display: flex; align-items: center; justify-content: center;">
                            <i class="fa-solid fa-chalkboard-user"
                                style="font-size: 3rem; color: rgba(255,255,255,0.5);"></i>
                            <span class="activity-card-tag">Rutin</span>
                        </div>
                        <div class="activity-card-body">
                            <h5>Pelatihan K3 Dasar</h5>
                            <p style="font-size:0.85rem;color:#6B7280;">Pelatihan wajib bagi mahasiswa baru dan laboran
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="activity-card">
                        <div class="activity-card-img"
                            style="background: linear-gradient(135deg, #1E40AF, #818CF8); display: flex; align-items: center; justify-content: center;">
                            <i class="fa-solid fa-bullhorn"
                                style="font-size: 3rem; color: rgba(255,255,255,0.5);"></i>
                            <span class="activity-card-tag">Bulanan</span>
                        </div>
                        <div class="activity-card-body">
                            <h5>Sosialisasi K3L</h5>
                            <p style="font-size:0.85rem;color:#6B7280;">Sosialisasi program keselamatan ke seluruh unit
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="activity-card">
                        <div class="activity-card-img"
                            style="background: linear-gradient(135deg, #F59E0B, #FCD34D); display: flex; align-items: center; justify-content: center;">
                            <i class="fa-solid fa-person-running"
                                style="font-size: 3rem; color: rgba(255,255,255,0.5);"></i>
                            <span class="activity-card-tag">Triwulan</span>
                        </div>
                        <div class="activity-card-body">
                            <h5>Simulasi Darurat</h5>
                            <p style="font-size:0.85rem;color:#6B7280;">Simulasi evakuasi kebakaran dan gempa</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="activity-card">
                        <div class="activity-card-img"
                            style="background: linear-gradient(135deg, #7C3AED, #C084FC); display: flex; align-items: center; justify-content: center;">
                            <i class="fa-solid fa-camera-retro"
                                style="font-size: 3rem; color: rgba(255,255,255,0.5);"></i>
                            <span class="activity-card-tag">Dokumentasi</span>
                        </div>
                        <div class="activity-card-body">
                            <h5>Dokumentasi Kegiatan</h5>
                            <p style="font-size:0.85rem;color:#6B7280;">Galeri foto dan video kegiatan K3L</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== PENGUMUMAN & BERITA ==================== -->
    <section class="news-section" id="pengumuman">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="section-title">Pengumuman & Berita</span>
                <h2 style="font-weight: 800; font-size: 2rem;">Informasi Terkini K3L</h2>
                <p class="section-subtitle">Berita, pengumuman, dan agenda kegiatan mendatang</p>
            </div>
            <div class="row">
                <div class="col-lg-7 mb-4 mb-lg-0" data-aos="fade-right">
                    <h4 style="font-weight: 700; margin-bottom: 20px;">Berita Terbaru</h4>
                    <div class="news-list-item">
                        <div class="news-thumb"
                            style="background: linear-gradient(135deg, #0D9488, #10B981); display: flex; align-items: center; justify-content: center;">
                            <i class="fa-solid fa-award" style="font-size: 1.5rem; color: white;"></i>
                        </div>
                        <div>
                            <span class="news-badge">Prestasi</span>
                            <h6 style="font-weight: 700;">Kampus Raih Penghargaan K3 Nasional 2026</h6>
                            <p style="font-size:0.85rem;color:#6B7280;margin:0;">Kampus berhasil meraih penghargaan
                                atas implementasi sistem K3L terbaik...</p>
                            <small style="color:#9CA3AF;">28 Mei 2026</small>
                        </div>
                    </div>
                    <div class="news-list-item">
                        <div class="news-thumb"
                            style="background: linear-gradient(135deg, #1E40AF, #6366F1); display: flex; align-items: center; justify-content: center;">
                            <i class="fa-solid fa-calendar-plus" style="font-size: 1.5rem; color: white;"></i>
                        </div>
                        <div>
                            <span class="news-badge">Agenda</span>
                            <h6 style="font-weight: 700;">Jadwal Pelatihan K3 Semester Genap 2026</h6>
                            <p style="font-size:0.85rem;color:#6B7280;margin:0;">Pelatihan akan dilaksanakan pada 12-15
                                Juni 2026 di Gedung Pelatihan...</p>
                            <small style="color:#9CA3AF;">25 Mei 2026</small>
                        </div>
                    </div>
                    <div class="news-list-item">
                        <div class="news-thumb"
                            style="background: linear-gradient(135deg, #F59E0B, #FBBF24); display: flex; align-items: center; justify-content: center;">
                            <i class="fa-solid fa-triangle-exclamation" style="font-size: 1.5rem; color: white;"></i>
                        </div>
                        <div>
                            <span class="news-badge" style="background:#FEE2E2;color:#991B1B;">Penting</span>
                            <h6 style="font-weight: 700;">Pengumuman Inspeksi K3L Rutin</h6>
                            <p style="font-size:0.85rem;color:#6B7280;margin:0;">Tim K3L akan melakukan inspeksi rutin
                                di seluruh laboratorium dan bengkel...</p>
                            <small style="color:#9CA3AF;">20 Mei 2026</small>
                        </div>
                    </div>
                    <a href="#" class="btn btn-hero-secondary mt-3">Lihat Semua Berita <i
                            class="fa-solid fa-arrow-right"></i></a>
                </div>
                <div class="col-lg-5" data-aos="fade-left">
                    <h4 style="font-weight: 700; margin-bottom: 20px;">Agenda Mendatang</h4>
                    <div class="agenda-card">
                        <div class="agenda-item">
                            <div class="agenda-date">
                                <span class="date-day">12</span>
                                <span class="date-month">Jun</span>
                            </div>
                            <div>
                                <strong>Pelatihan K3 Dasar</strong>
                                <p style="font-size:0.85rem;color:#6B7280;margin:0;">Gedung Pelatihan, 08.00-16.00 WIB
                                </p>
                            </div>
                        </div>
                        <div class="agenda-item">
                            <div class="agenda-date">
                                <span class="date-day">20</span>
                                <span class="date-month">Jun</span>
                            </div>
                            <div>
                                <strong>Simulasi Evakuasi Kebakaran</strong>
                                <p style="font-size:0.85rem;color:#6B7280;margin:0;">Gedung Utama, 09.00-11.00 WIB</p>
                            </div>
                        </div>
                        <div class="agenda-item">
                            <div class="agenda-date">
                                <span class="date-day">5</span>
                                <span class="date-month">Jul</span>
                            </div>
                            <div>
                                <strong>Sosialisasi K3L Unit Baru</strong>
                                <p style="font-size:0.85rem;color:#6B7280;margin:0;">Ruang Seminar, 13.00-15.00 WIB</p>
                            </div>
                        </div>
                        <div class="agenda-item">
                            <div class="agenda-date">
                                <span class="date-day">15</span>
                                <span class="date-month">Jul</span>
                            </div>
                            <div>
                                <strong>Rapat Koordinasi Tim K3L</strong>
                                <p style="font-size:0.85rem;color:#6B7280;margin:0;">Ruang Rapat Utama, 10.00 WIB</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== CALL TO ACTION ==================== -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content" data-aos="zoom-in" data-aos-duration="800">
                <h2>🛡️ Mari Bersama Budayakan Keselamatan Kerja</h2>
                <p>Laporkan potensi bahaya di lingkungan kampus dan berkontribusi dalam menciptakan lingkungan yang aman
                    bagi seluruh civitas akademika.</p>
                <a href="#" class="btn btn-cta">
                    <i class="fa-solid fa-pen-to-square"></i> Buat Laporan Sekarang
                </a>
            </div>
        </div>
    </section>

    <!-- ==================== FOOTER ==================== -->
    <footer class="footer" id="kontak">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <h5><i class="fa-solid fa-shield-halved me-2" style="color: var(--primary-green);"></i>Sistem K3L
                    </h5>
                    <p style="font-size:0.9rem;margin-bottom:20px;">Portal resmi Keselamatan, Kesehatan Kerja, dan
                        Lingkungan untuk civitas akademika.</p>
                    <ul class="contact-info list-unstyled">
                        <li>
                            <i class="fa-solid fa-location-dot"></i>
                            <span>Gedung Rektorat Lt. 2, Jl. Kampus Merdeka No. 1, Jakarta</span>
                        </li>
                        <li>
                            <i class="fa-solid fa-envelope"></i>
                            <span>k3l@kampus.ac.id</span>
                        </li>
                        <li>
                            <i class="fa-solid fa-phone"></i>
                            <span>(021) 1234-5678</span>
                        </li>
                        <li>
                            <i class="fa-solid fa-clock"></i>
                            <span>Senin - Jumat, 08.00 - 16.00 WIB</span>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6">
                    <h5>Link Penting</h5>
                    <a href="#home">Beranda</a>
                    <a href="#tentang">Tentang K3L</a>
                    <a href="#edukasi">Edukasi</a>
                    <a href="#kegiatan">Kegiatan</a>
                    <a href="#pengumuman">Pengumuman</a>
                    <a href="#">SOP & Panduan</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5>Media Sosial</h5>
                    <div class="social-icons mb-3">
                        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#"><i class="fa-brands fa-youtube"></i></a>
                        <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                        <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
                    </div>
                    <h5 class="mt-3">Layanan Darurat</h5>
                    <a href="#" style="color:#EF4444;"><i class="fa-solid fa-phone-volume"></i> Call Center
                        Darurat: 112</a>
                    <a href="#"><i class="fa-solid fa-truck-medical"></i> Ambulans Kampus</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5>Lokasi Kantor</h5>
                    <div class="footer-map"
                        style="display: flex; align-items: center; justify-content: center; background: #1F2937;">
                        <i class="fa-solid fa-map-location-dot" style="font-size: 2rem; color: #4B5563;"></i>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p style="margin:0;">&copy; 2026 Sistem K3L - Keselamatan, Kesehatan Kerja & Lingkungan. Hak Cipta
                    Dilindungi.</p>
            </div>
        </div>
    </footer>

    <!-- ==================== SCROLL TO TOP ==================== -->
    <button class="scroll-top" id="scrollTopBtn">
        <i class="fa-solid fa-chevron-up"></i>
    </button>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS Animation -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        // Inisialisasi AOS
        AOS.init({
            once: true,
            offset: 50,
        });

        // Navbar scroll effect
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Scroll to top button
        const scrollTopBtn = document.getElementById('scrollTopBtn');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 600) {
                scrollTopBtn.classList.add('visible');
            } else {
                scrollTopBtn.classList.remove('visible');
            }
        });

        scrollTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Smooth scroll untuk semua anchor link
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href !== '#') {
                    e.preventDefault();
                    const target = document.querySelector(href);
                    if (target) {
                        const offset = 80;
                        const position = target.getBoundingClientRect().top + window.pageYOffset - offset;
                        window.scrollTo({
                            top: position,
                            behavior: 'smooth'
                        });
                    }
                }
            });
        });

        // Animasi counter statistik (sederhana)
        const animateCounter = (el, target) => {
            let current = 0;
            const increment = target / 60;
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    el.textContent = target.toLocaleString();
                    clearInterval(timer);
                } else {
                    el.textContent = Math.floor(current).toLocaleString();
                }
            }, 16);
        };

        // Intersection Observer untuk statistik
        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const statNumbers = entry.target.querySelectorAll('.stat-number');
                    statNumbers.forEach(el => {
                        const target = parseInt(el.getAttribute('data-count'));
                        if (target && !el.dataset.animated) {
                            el.dataset.animated = 'true';
                            animateCounter(el, target);
                        }
                    });
                    statsObserver.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.3
        });

        const statsSection = document.querySelector('.stats-section');
        if (statsSection) {
            statsObserver.observe(statsSection);
        }
    </script>
</body>

</html>
