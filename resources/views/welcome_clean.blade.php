<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiDesa - Sistem Informasi Desa Cibeureum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            overflow-x: hidden;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Navigation */
        nav {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 2px 25px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
        }

        .logo {
            font-weight: 700;
            font-size: 1.8rem;
            color: #2c3e50;
            text-decoration: none;
            display: flex;
            align-items: center;
            letter-spacing: -0.5px;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 2rem;
            margin: 0;
        }

        .nav-links a {
            color: #2c3e50;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            transition: all 0.3s ease;
            font-weight: 500;
            position: relative;
            overflow: hidden;
        }

        .nav-links a:hover {
            background: rgba(52, 152, 219, 0.1);
            color: #3498db;
        }

        .nav-buttons {
            display: flex;
            gap: 1rem;
        }

        .btn {
            padding: 0.6rem 1.5rem;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
        }

        .btn-outline {
            border: 2px solid #3498db;
            color: #3498db;
            background: transparent;
        }

        .btn-outline:hover {
            background: #3498db;
            color: white;
        }

        .btn-primary {
            background: linear-gradient(135deg, #3498db, #2980b9);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(52, 152, 219, 0.3);
        }

        .btn-white {
            background: white;
            color: #3498db;
            border: 2px solid white;
        }

        .btn-white:hover {
            background: transparent;
            color: white;
        }

        /* Dropdown Styles */
        .dropdown {
            position: relative;
        }

        .dropdown-content {
            position: absolute;
            top: 100%;
            left: 0;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(15px);
            min-width: 220px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            border-radius: 12px;
            padding: 0.5rem;
            margin-top: 0.5rem;
            border: 1px solid rgba(52, 152, 219, 0.1);
            transform: translateY(-10px);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 1001;
        }

        .dropdown:hover .dropdown-content {
            transform: translateY(0);
            opacity: 1;
            visibility: visible;
        }

        .dropdown-content a {
            color: #2c3e50;
            padding: 0.75rem 1.25rem;
            text-decoration: none;
            display: block;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.3s ease;
            border-radius: 8px;
            margin: 0.1rem 0.5rem;
        }

        .dropdown-content a:hover {
            background-color: rgba(52, 152, 219, 0.08);
            color: #3498db;
            transform: translateX(5px);
        }

        .dropdown-content a i {
            margin-right: 0.5rem;
            width: 16px;
            text-align: center;
            color: #3498db;
            font-size: 0.9rem;
        }

        .dropdown-toggle {
            display: flex;
            align-items: center;
            gap: 0.3rem;
            cursor: pointer;
        }

        .dropdown-toggle i {
            font-size: 0.8rem;
            transition: transform 0.3s ease;
        }

        .dropdown:hover .dropdown-toggle i {
            transform: rotate(180deg);
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('/images/hero-pattern.svg') no-repeat center center;
            background-size: cover;
            opacity: 0.1;
        }

        .hero-content {
            text-align: center;
            color: white;
            z-index: 2;
            position: relative;
        }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        .hero p {
            font-size: 1.3rem;
            margin-bottom: 2.5rem;
            opacity: 0.9;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        /* Section Styles */
        section {
            padding: 5rem 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 3rem;
        }

        .section-title h2 {
            font-size: 2.5rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 1rem;
        }

        .section-title p {
            font-size: 1.1rem;
            color: #7f8c8d;
            max-width: 600px;
            margin: 0 auto;
        }

        /* Struktur Perangkat Desa */
        .struktur-perangkat {
            background: #f8f9fa;
        }

        .struktur-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .perangkat-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border: 1px solid rgba(52, 152, 219, 0.1);
            text-align: center;
        }

        .perangkat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        .perangkat-card.kepala-desa {
            grid-column: 1 / -1;
            max-width: 600px;
            margin: 0 auto;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .perangkat-photo {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin: 0 auto 1.5rem;
            position: relative;
            overflow: hidden;
            border: 4px solid rgba(52, 152, 219, 0.2);
        }

        .kepala-desa .perangkat-photo {
            border-color: rgba(255, 255, 255, 0.3);
        }

        .perangkat-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .perangkat-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(52, 152, 219, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: all 0.3s ease;
        }

        .perangkat-card:hover .perangkat-overlay {
            opacity: 1;
        }

        .perangkat-badge {
            background: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #3498db;
        }

        .perangkat-info h3 {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #2c3e50;
        }

        .kepala-desa .perangkat-info h3 {
            color: white;
        }

        .jabatan {
            color: #3498db;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .kepala-desa .jabatan {
            color: rgba(255, 255, 255, 0.9);
        }

        .periode {
            color: #7f8c8d;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .kepala-desa .periode {
            color: rgba(255, 255, 255, 0.8);
        }

        .perangkat-contact {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .perangkat-contact span {
            font-size: 0.9rem;
            color: #7f8c8d;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .kepala-desa .perangkat-contact span {
            color: rgba(255, 255, 255, 0.9);
        }

        .perangkat-contact i {
            color: #3498db;
        }

        .kepala-desa .perangkat-contact i {
            color: white;
        }

        /* Features Section */
        .features {
            background: white;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .feature-card {
            background: white;
            padding: 2.5rem 2rem;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border: 1px solid rgba(52, 152, 219, 0.1);
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        .feature-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #3498db, #2980b9);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: white;
            font-size: 1.8rem;
        }

        .feature-card h3 {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #2c3e50;
        }

        .feature-card p {
            color: #7f8c8d;
            line-height: 1.6;
        }

        /* Testimonials */
        .testimonials {
            background: #f8f9fa;
        }

        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .testimonial-card {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border: 1px solid rgba(52, 152, 219, 0.1);
        }

        .testimonial-card:hover {
            transform: translateY(-5px);
        }

        .testimonial-header {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .testimonial-info h4 {
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 0.2rem;
        }

        .testimonial-info p {
            color: #7f8c8d;
            font-size: 0.9rem;
        }

        .testimonial-text {
            color: #555;
            line-height: 1.6;
        }

        /* CTA Section */
        .cta {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-align: center;
        }

        .cta h2 {
            font-size: 2.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .cta p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .cta-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        /* Footer */
        footer {
            background: #2c3e50;
            color: white;
            padding: 3rem 0 1rem;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .footer-section h3 {
            font-weight: 600;
            margin-bottom: 1rem;
            color: #3498db;
        }

        .footer-section p {
            color: #bdc3c7;
            line-height: 1.6;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 0.5rem;
        }

        .footer-links a {
            color: #bdc3c7;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: #3498db;
        }

        .footer-bottom {
            border-top: 1px solid #34495e;
            padding-top: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .social-links {
            display: flex;
            gap: 1rem;
        }

        .social-links a {
            width: 40px;
            height: 40px;
            background: #34495e;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #bdc3c7;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background: #3498db;
            color: white;
            transform: translateY(-2px);
        }

        /* Mobile Styles */
        .menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: #2c3e50;
        }

        .mobile-menu {
            display: none;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .nav-buttons {
                display: none;
            }

            .menu-toggle {
                display: block;
            }

            .hero h1 {
                font-size: 2.5rem;
            }

            .hero p {
                font-size: 1.1rem;
            }

            .hero-buttons {
                flex-direction: column;
                align-items: center;
            }

            .struktur-grid {
                grid-template-columns: 1fr;
            }

            .perangkat-card.kepala-desa {
                grid-column: 1;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }

            .testimonials-grid {
                grid-template-columns: 1fr;
            }

            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }

            .footer-bottom {
                flex-direction: column;
                gap: 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav>
        <div class="container">
            <div class="nav-container">
                <a href="#" class="logo">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo SiDesa" style="height: 40px; width: auto; margin-right: 0.5rem;">
                    CERDAS
                </a>
                <ul class="nav-links">
                    <li><a href="#home">Beranda</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle">
                            Tentang Desa
                            <i class="fas fa-chevron-down"></i>
                        </a>
                        <div class="dropdown-content">
                            <a href="/tentang">
                                <i class="fas fa-info-circle"></i>
                                Profil Desa
                            </a>
                            <a href="#struktur">
                                <i class="fas fa-users"></i>
                                Perangkat Desa
                            </a>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle">
                            Publikasi
                            <i class="fas fa-chevron-down"></i>
                        </a>
                        <div class="dropdown-content">
                            <a href="/berita">
                                <i class="fas fa-newspaper"></i>
                                Berita & Pengumuman
                            </a>
                            <a href="/agenda">
                                <i class="fas fa-calendar-alt"></i>
                                Agenda
                            </a>
                            <a href="/kontak">
                                <i class="fas fa-phone"></i>
                                Kontak
                            </a>
                        </div>
                    </li>
                    <li><a href="/layanan/detail">Layanan</a></li>
                </ul>
                <div class="nav-buttons">
                    <a href="{{ route('login') }}" class="btn btn-outline">Masuk</a>
                    <a href="{{ route('register') }}" class="btn btn-primary">Daftar</a>
                </div>
                <button class="menu-toggle">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="container">
            <div class="hero-content">
                <h1>Sistem Informasi Desa Cibeureum</h1>
                <p>Portal resmi Desa Cibeureum yang menyediakan informasi lengkap, layanan administrasi online, dan kemudahan akses untuk seluruh masyarakat desa.</p>
                <div class="hero-buttons">
                    <a href="{{ route('register') }}" class="btn btn-white">
                        Mulai Layanan
                        <i class="fas fa-arrow-right"></i>
                    </a>
                    <a href="#services" class="btn btn-outline">
                        Jelajahi Layanan
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Struktur Perangkat Desa Section -->
    <section class="struktur-perangkat" id="struktur">
        <div class="container">
            <div class="section-title">
                <h2>Struktur Perangkat Desa</h2>
                <p>Berkenalan dengan perangkat desa yang siap melayani masyarakat Desa Cibeureum dengan penuh dedikasi.</p>
            </div>
            
            <div class="struktur-grid">
                <!-- Kepala Desa -->
                <div class="perangkat-card kepala-desa">
                    <div class="perangkat-photo">
                        <img src="{{ asset('images/pakkuwu.png') }}" alt="Kepala Desa">
                        <div class="perangkat-overlay">
                            <div class="perangkat-badge">
                                <i class="fas fa-crown"></i>
                            </div>
                        </div>
                    </div>
                    <div class="perangkat-info">
                        <h3>Agus Sopar Sodik. S.IP</h3>
                        <p class="jabatan">Kepala Desa</p>
                        <p class="periode">Periode 2019-2025</p>
                        <div class="perangkat-contact">
                            <span><i class="fas fa-phone"></i> 0812-3456-7890</span>
                            <span><i class="fas fa-envelope"></i> kepala.desa@cibeureum.id</span>
                        </div>
                    </div>
                </div>

                <!-- Sekretaris Desa -->
                <div class="perangkat-card">
                    <div class="perangkat-photo">
                        <img src="{{ asset('images/sekdes.png') }}" alt="Sekretaris Desa">
                        <div class="perangkat-overlay">
                            <div class="perangkat-badge">
                                <i class="fas fa-user-tie"></i>
                            </div>
                        </div>
                    </div>
                    <div class="perangkat-info">
                        <h3>Arif Hidayat. M.Pd</h3>
                        <p class="jabatan">Sekretaris Desa</p>
                        <div class="perangkat-contact">
                            <span><i class="fas fa-phone"></i> 0813-4567-8901</span>
                            <span><i class="fas fa-envelope"></i> sekdes@cibeureum.id</span>
                        </div>
                    </div>
                </div>

                <!-- Kaur Keuangan -->
                <div class="perangkat-card">
                    <div class="perangkat-photo">
                        <img src="{{ asset('images/kaur-keuangan.jpg') }}" alt="Kaur Keuangan">
                        <div class="perangkat-overlay">
                            <div class="perangkat-badge">
                                <i class="fas fa-calculator"></i>
                            </div>
                        </div>
                    </div>
                    <div class="perangkat-info">
                        <h3>Dedi Kurniawan, S.E</h3>
                        <p class="jabatan">Kaur Keuangan</p>
                        <div class="perangkat-contact">
                            <span><i class="fas fa-phone"></i> 0814-5678-9012</span>
                            <span><i class="fas fa-envelope"></i> keuangan@cibeureum.id</span>
                        </div>
                    </div>
                </div>

                <!-- Kaur Umum -->
                <div class="perangkat-card">
                    <div class="perangkat-photo">
                        <img src="{{ asset('images/kaur-umum.jpg') }}" alt="Kaur Umum">
                        <div class="perangkat-overlay">
                            <div class="perangkat-badge">
                                <i class="fas fa-file-alt"></i>
                            </div>
                        </div>
                    </div>
                    <div class="perangkat-info">
                        <h3>Siti Nurhayati</h3>
                        <p class="jabatan">Kaur Umum</p>
                        <div class="perangkat-contact">
                            <span><i class="fas fa-phone"></i> 0815-6789-0123</span>
                            <span><i class="fas fa-envelope"></i> umum@cibeureum.id</span>
                        </div>
                    </div>
                </div>

                <!-- Kasi Pemerintahan -->
                <div class="perangkat-card">
                    <div class="perangkat-photo">
                        <img src="{{ asset('images/kasi-pemerintahan.jpg') }}" alt="Kasi Pemerintahan">
                        <div class="perangkat-overlay">
                            <div class="perangkat-badge">
                                <i class="fas fa-building"></i>
                            </div>
                        </div>
                    </div>
                    <div class="perangkat-info">
                        <h3>Asep Saepudin</h3>
                        <p class="jabatan">Kasi Pemerintahan</p>
                        <div class="perangkat-contact">
                            <span><i class="fas fa-phone"></i> 0816-7890-1234</span>
                            <span><i class="fas fa-envelope"></i> pemerintahan@cibeureum.id</span>
                        </div>
                    </div>
                </div>

                <!-- Kasi Kesejahteraan -->
                <div class="perangkat-card">
                    <div class="perangkat-photo">
                        <img src="{{ asset('images/kasi-kesejahteraan.jpg') }}" alt="Kasi Kesejahteraan">
                        <div class="perangkat-overlay">
                            <div class="perangkat-badge">
                                <i class="fas fa-heart"></i>
                            </div>
                        </div>
                    </div>
                    <div class="perangkat-info">
                        <h3>Wati Sukaesih</h3>
                        <p class="jabatan">Kasi Kesejahteraan</p>
                        <div class="perangkat-contact">
                            <span><i class="fas fa-phone"></i> 0817-8901-2345</span>
                            <span><i class="fas fa-envelope"></i> kesejahteraan@cibeureum.id</span>
                        </div>
                    </div>
                </div>

                <!-- Kasi Pelayanan -->
                <div class="perangkat-card">
                    <div class="perangkat-photo">
                        <img src="{{ asset('images/kasi-pelayanan.jpg') }}" alt="Kasi Pelayanan">
                        <div class="perangkat-overlay">
                            <div class="perangkat-badge">
                                <i class="fas fa-handshake"></i>
                            </div>
                        </div>
                    </div>
                    <div class="perangkat-info">
                        <h3>Rudi Hermawan</h3>
                        <p class="jabatan">Kasi Pelayanan</p>
                        <div class="perangkat-contact">
                            <span><i class="fas fa-phone"></i> 0818-9012-3456</span>
                            <span><i class="fas fa-envelope"></i> pelayanan@cibeureum.id</span>
                        </div>
                    </div>
                </div>

                <!-- Operator Desa -->
                <div class="perangkat-card">
                    <div class="perangkat-photo">
                        <img src="{{ asset('images/operator.jpg') }}" alt="Operator Desa">
                        <div class="perangkat-overlay">
                            <div class="perangkat-badge">
                                <i class="fas fa-laptop"></i>
                            </div>
                        </div>
                    </div>
                    <div class="perangkat-info">
                        <h3>Agus Pratama</h3>
                        <p class="jabatan">Operator Desa</p>
                        <div class="perangkat-contact">
                            <span><i class="fas fa-phone"></i> 0819-0123-4567</span>
                            <span><i class="fas fa-envelope"></i> operator@cibeureum.id</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="features" id="services">
        <div class="container">
            <div class="section-title">
                <h2>Layanan Desa Cibeureum</h2>
                <p>Berbagai layanan dan fasilitas yang disediakan untuk memudahkan masyarakat dalam mengakses informasi dan pelayanan desa.</p>
            </div>
            
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <h3>Pelayanan Administrasi</h3>
                    <p>Layanan pembuatan surat-surat administrasi desa secara daring dan luring untuk memudahkan masyarakat.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-bullhorn"></i>
                    </div>
                    <h3>Informasi & Pengumuman</h3>
                    <p>Dapatkan informasi terbaru mengenai kegiatan, program, dan pengumuman penting dari pemerintah desa.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>Data Kependudukan</h3>
                    <p>Akses informasi data kependudukan dan statistik desa untuk keperluan perencanaan pembangunan.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-map-marked-alt"></i>
                    </div>
                    <h3>Profil Wilayah</h3>
                    <p>Informasi lengkap tentang geografis, demografi, dan potensi wilayah Desa Cibeureum.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <h3>Agenda Kegiatan</h3>
                    <p>Jadwal dan agenda kegiatan desa, rapat, dan acara penting yang akan dilaksanakan.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <h3>Kontak & Layanan</h3>
                    <p>Hubungi perangkat desa dan akses layanan bantuan untuk berbagai keperluan masyarakat.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="testimonials" id="process">
        <div class="container">
            <div class="section-title">
                <h2>Cara Menggunakan Sistem</h2>
                <p>Panduan mudah untuk mengakses dan menggunakan berbagai layanan Sistem Informasi Desa Cibeureum.</p>
            </div>
            
            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="testimonial-header">
                        <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #3498db, #2980b9); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 1rem;">
                            <i class="fas fa-user-plus" style="color: white; font-size: 1.5rem;"></i>
                        </div>
                        <div class="testimonial-info">
                            <h4>1. Daftar Akun</h4>
                            <p>Langkah Pertama</p>
                        </div>
                    </div>
                    <div class="testimonial-text">
                        Buat akun baru dengan mengisi formulir pendaftaran menggunakan data diri yang valid. Pastikan email dan nomor telepon yang digunakan aktif untuk proses verifikasi.
                    </div>
                </div>
                
                <div class="testimonial-card">
                    <div class="testimonial-header">
                        <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #27ae60, #2ecc71); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 1rem;">
                            <i class="fas fa-sign-in-alt" style="color: white; font-size: 1.5rem;"></i>
                        </div>
                        <div class="testimonial-info">
                            <h4>2. Login Sistem</h4>
                            <p>Akses Masuk</p>
                        </div>
                    </div>
                    <div class="testimonial-text">
                        Masuk ke sistem menggunakan email dan password yang telah didaftarkan. Sistem akan mengverifikasi identitas Anda untuk keamanan data dan privasi.
                    </div>
                </div>
                
                <div class="testimonial-card">
                    <div class="testimonial-header">
                        <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #f39c12, #e67e22); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 1rem;">
                            <i class="fas fa-file-alt" style="color: white; font-size: 1.5rem;"></i>
                        </div>
                        <div class="testimonial-info">
                            <h4>3. Pilih Layanan</h4>
                            <p>Jenis Pelayanan</p>
                        </div>
                    </div>
                    <div class="testimonial-text">
                        Pilih jenis surat atau layanan yang dibutuhkan dari menu yang tersedia. Setiap layanan memiliki persyaratan dan proses yang berbeda sesuai kebutuhan.
                    </div>
                </div>
                
                <div class="testimonial-card">
                    <div class="testimonial-header">
                        <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #e74c3c, #c0392b); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 1rem;">
                            <i class="fas fa-upload" style="color: white; font-size: 1.5rem;"></i>
                        </div>
                        <div class="testimonial-info">
                            <h4>4. Upload Dokumen</h4>
                            <p>Lampiran Berkas</p>
                        </div>
                    </div>
                    <div class="testimonial-text">
                        Unggah dokumen pendukung yang diperlukan sesuai dengan jenis layanan yang dipilih. Pastikan file dalam format yang didukung dan ukuran tidak melebihi batas.
                    </div>
                </div>
                
                <div class="testimonial-card">
                    <div class="testimonial-header">
                        <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #9b59b6, #8e44ad); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 1rem;">
                            <i class="fas fa-clock" style="color: white; font-size: 1.5rem;"></i>
                        </div>
                        <div class="testimonial-info">
                            <h4>5. Tunggu Proses</h4>
                            <p>Verifikasi Admin</p>
                        </div>
                    </div>
                    <div class="testimonial-text">
                        Tunggu proses verifikasi dan pembuatan surat oleh petugas desa. Anda akan mendapat notifikasi melalui email dan dapat memantau status pengajuan di dashboard.
                    </div>
                </div>
                
                <div class="testimonial-card">
                    <div class="testimonial-header">
                        <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #1abc9c, #16a085); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 1rem;">
                            <i class="fas fa-download" style="color: white; font-size: 1.5rem;"></i>
                        </div>
                        <div class="testimonial-info">
                            <h4>6. Download Surat</h4>
                            <p>Hasil Akhir</p>
                        </div>
                    </div>
                    <div class="testimonial-text">
                        Setelah surat selesai diproses, Anda dapat mengunduh file surat dalam format PDF atau mengambilnya langsung di kantor desa sesuai pilihan yang dipilih.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta">
        <div class="container">
            <h2>Bergabunglah dengan Sistem Informasi Desa!</h2>
            <p>Dapatkan akses mudah ke berbagai layanan dan informasi Desa Cibeureum. Mulai akses sekarang juga!</p>
            <div class="cta-buttons">
                <a href="{{ route('register') }}" class="btn btn-white">
                    Daftar Sekarang
                    <i class="fas fa-user-plus"></i>
                </a>
                <a href="/kontak" class="btn btn-outline">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>SiDesa - Sistem Informasi Desa</h3>
                    <p>Portal resmi Desa Cibeureum yang menyediakan informasi lengkap, layanan digital, dan kemudahan akses untuk seluruh masyarakat desa.</p>
                </div>
                
                <div class="footer-section">
                    <h3>Layanan Utama</h3>
                    <ul class="footer-links">
                        <li><a href="#services">Layanan Administrasi</a></li>
                        <li><a href="#services">Informasi Desa</a></li>
                        <li><a href="#struktur">Perangkat Desa</a></li>
                        <li><a href="/agenda">Agenda Kegiatan</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h3>Halaman Lainnya</h3>
                    <ul class="footer-links">
                        <li><a href="/tentang">Tentang Desa</a></li>
                        <li><a href="/berita">Berita & Pengumuman</a></li>
                        <li><a href="/agenda">Agenda</a></li>
                        <li><a href="#process">Cara Menggunakan</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h3>Hubungi Kami</h3>
                    <div style="display: flex; align-items: center; margin-bottom: 0.5rem;">
                        <i class="fas fa-map-marker-alt" style="margin-right: 0.5rem; color: #3498db;"></i>
                        <span>Jl. Desa Cibeureum, Talaga, Majalengka</span>
                    </div>
                    <div style="display: flex; align-items: center; margin-bottom: 0.5rem;">
                        <i class="fas fa-phone-alt" style="margin-right: 0.5rem; color: #3498db;"></i>
                        <span>(0233) 123-456</span>
                    </div>
                    <div style="display: flex; align-items: center;">
                        <i class="fas fa-envelope" style="margin-right: 0.5rem; color: #3498db;"></i>
                        <span>info@cibeureum.desa.id</span>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2025 SiDesa - Desa Cibeureum. Semua hak cipta dilindungi.</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Prevent dropdown toggle from navigating
        document.querySelectorAll('.dropdown-toggle').forEach(toggle => {
            toggle.addEventListener('click', function(e) {
                e.preventDefault();
            });
        });

        // Smooth scrolling untuk link anchor
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const targetId = this.getAttribute('href').substring(1);
                const targetElement = document.getElementById(targetId);
                
                if (targetElement) {
                    const offsetTop = targetElement.offsetTop - 80;
                    
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Efek scroll navbar
        window.addEventListener('scroll', function() {
            const nav = document.querySelector('nav');
            if (window.scrollY > 50) {
                nav.style.background = 'rgba(255, 255, 255, 0.98)';
                nav.style.boxShadow = '0 2px 25px rgba(0, 0, 0, 0.15)';
            } else {
                nav.style.background = 'rgba(255, 255, 255, 0.95)';
                nav.style.boxShadow = '0 2px 25px rgba(0, 0, 0, 0.08)';
            }
        });
    </script>
</body>
</html>
