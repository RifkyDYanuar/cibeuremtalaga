<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiDesa - Sistem Informasi Desa Cibeureum</title>
    <meta name="description" content="Sistem informasi pelayanan desa digital untuk memudahkan warga dalam pengurusan surat dan layanan administrasi desa.">
    <meta name="keywords" content="desa cibeureum, layanan desa, surat desa, administrasi desa, e-government">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: #2c3e50;
            background-color: #f8f9fa;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* Navigasi */
        nav {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(15px);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 2px 25px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border-bottom: 1px solid rgba(52, 152, 219, 0.1);
        }
        
        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
        }
        
        .logo {
            display: flex;
            align-items: center;
            font-size: 1.5rem;
            font-weight: 600;
            color: #3498db;
            text-decoration: none;
            transition: all 0.3s ease;
            letter-spacing: 0.5px;
        }

        .logo:hover {
            color: #2980b9;
            transform: scale(1.02);
        }
        
        .logo img {
            height: 35px;
            width: auto;
            margin-right: 0.75rem;
            object-fit: contain;
            transition: transform 0.3s ease;
        }

        .logo:hover img {
            transform: rotate(3deg);
        }
        
        .nav-links {
            display: flex;
            list-style: none;
            gap: 1rem;
            margin: 0;
            padding: 0;
            align-items: center;
        }
        
        .nav-links li {
            position: relative;
        }
        
        .nav-links a {
            text-decoration: none;
            color: #2c3e50;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            position: relative;
            padding: 0.75rem 1.25rem;
            border-radius: 8px;
            display: block;
            letter-spacing: 0.3px;
        }
        
        .nav-links a:hover {
            color: #3498db;
            background: rgba(52, 152, 219, 0.08);
            transform: translateY(-1px);
        }
        
        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 2px;
            background: #3498db;
            transition: width 0.3s ease;
            border-radius: 1px;
        }
        
        .nav-links a:hover::after {
            width: 70%;
        }
        
        .nav-buttons {
            display: flex;
            gap: 1rem;
            align-items: center;
        }
        
        .btn {
            padding: 0.6rem 1.5rem;
            border: none;
            border-radius: 8px;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
            cursor: pointer;
            font-size: 0.85rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            white-space: nowrap;
            position: relative;
            overflow: hidden;
            letter-spacing: 0.3px;
        }
        
        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }
        
        .btn:hover::before {
            left: 100%;
        }
        
        .btn-outline {
            background: transparent;
            color: #3498db;
            border: 2px solid #3498db;
            position: relative;
            overflow: hidden;
        }

        .btn-outline::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(52, 152, 219, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .btn-outline:hover::before {
            left: 100%;
        }
        
        .btn-outline:hover {
            background: #3498db;
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(52, 152, 219, 0.25);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #3498db, #2980b9);
            color: white;
            border: none;
            position: relative;
            overflow: hidden;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .btn-primary:hover::before {
            left: 100%;
        }
        
        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(52, 152, 219, 0.3);
        }

        .menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: #2c3e50;
            padding: 0.5rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .menu-toggle:hover {
            background: rgba(52, 152, 219, 0.1);
            color: #3498db;
        }
        
        /* Bagian Hero */
        .hero {
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.4) 0%, rgba(0, 0, 0, 0.6) 100%), url('{{ asset('images/cibeureum.jpg') }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            align-items: center;
            color: white;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.2);
            z-index: 1;
        }
        
        .hero-content {
            position: relative;
            z-index: 3;
        }
        
        .hero h1 {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            animation: slideInUp 0.8s ease-out;
        }
        
        .hero p {
            font-size: 1.3rem;
            margin-bottom: 2rem;
            opacity: 0.9;
            animation: slideInUp 0.8s ease-out 0.2s both;
        }
        
        .hero-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            animation: slideInUp 0.8s ease-out 0.4s both;
        }
        
        /* Bagian Layanan */
        .features {
            padding: 5rem 0;
            background: white;
        }

        /* Profil Desa Section */
        .profil-desa {
            padding: 5rem 0;
            background: #f8f9fa;
        }

        .profil-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: flex-start;
        }

        .section-title.text-left {
            text-align: left;
        }

        .section-title.text-left h2 {
            margin-bottom: 1rem;
        }

        .profil-details {
            margin: 2rem 0;
        }

        .profil-item {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
            padding: 1rem;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }

        .profil-item:hover {
            transform: translateX(10px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .profil-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #3498db, #2980b9);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            color: white;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .profil-info h4 {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.3rem;
            color: #2c3e50;
        }

        .profil-info p {
            color: #6c757d;
            font-size: 0.95rem;
            margin: 0;
            line-height: 1.4;
        }

        .profil-visi-misi {
            margin-top: 2.5rem;
        }

        .visi, .misi {
            margin-bottom: 1.5rem;
            padding: 1.5rem;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        .profil-map {
            margin-top: 2rem;
            padding: 2rem;
            background: white;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(52, 152, 219, 0.1);
        }

        .profil-map h4 {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: #2c3e50;
            display: flex;
            align-items: center;
            gap: 0.8rem;
            text-align: center;
            justify-content: center;
        }

        .profil-map h4 i {
            color: #3498db;
            font-size: 1.4rem;
        }

        .map-container {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
            margin-bottom: 2rem;
            position: relative;
        }

        .map-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #3498db, #2980b9);
            z-index: 1;
        }

        .map-container iframe {
            width: 100%;
            height: 350px;
            border: none;
        }

        .map-info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }

        .map-item {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            padding: 1.5rem;
            background: #f8f9fa;
            border-radius: 12px;
            border: 1px solid #e9ecef;
            transition: all 0.3s ease;
        }

        .map-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border-color: #3498db;
        }

        .map-icon {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, #3498db, #2980b9);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .map-text h5 {
            color: #2c3e50;
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .map-text p {
            color: #6c757d;
            font-size: 0.9rem;
            line-height: 1.5;
            margin: 0;
        }

        .visi h4, .misi h4 {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #2c3e50;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .visi h4 i {
            color: #3498db;
        }

        .misi h4 i {
            color: #e74c3c;
        }

        .visi p {
            color: #6c757d;
            line-height: 1.7;
            font-style: italic;
            text-align: justify;
            font-size: 1rem;
        }

        .misi ul {
            list-style: none;
            padding: 0;
        }

        .misi li {
            color: #6c757d;
            margin-bottom: 1rem;
            padding-left: 1.5rem;
            position: relative;
            line-height: 1.7;
            text-align: justify;
        }

        .misi li::before {
            content: '✓';
            position: absolute;
            left: 0;
            color: #27ae60;
            font-weight: bold;
        }

        .profil-visual {
            position: relative;
        }

        .profil-image {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            margin-bottom: 1.5rem;
        }

        .profil-image img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .profil-image:hover img {
            transform: scale(1.05);
        }

        .profil-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(52, 152, 219, 0.8), rgba(155, 89, 182, 0.8));
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .profil-image:hover .profil-overlay {
            opacity: 1;
        }

        .profil-badge {
            background: rgba(255, 255, 255, 0.9);
            padding: 1rem 2rem;
            border-radius: 50px;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 600;
            color: #2c3e50;
            transform: translateY(20px);
            transition: transform 0.3s ease;
        }

        .profil-image:hover .profil-badge {
            transform: translateY(0);
        }

        .profil-badge i {
            color: #f39c12;
        }

        .profil-stats {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            display: flex;
            align-items: center;
            gap: 1rem;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .stat-content h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #2c3e50;
            margin: 0;
        }

        .stat-content p {
            color: #6c757d;
            font-size: 0.9rem;
            margin: 0;
        }

        /* Struktur Perangkat Desa Section */
        .struktur-perangkat {
            padding: 5rem 0;
            background: #f8f9fa;
        }

        .struktur-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }

        .perangkat-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            overflow: hidden;
            border: 1px solid #e9ecef;
            position: relative;
        }

        .perangkat-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }

        .perangkat-card.kepala-desa {
            grid-column: 1 / -1;
            display: flex;
            align-items: center;
            padding: 2.5rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            margin-bottom: 1rem;
        }

        .perangkat-card.kepala-desa:hover {
            transform: translateY(-5px);
        }

        .perangkat-photo {
            position: relative;
            width: 100%;
            height: 220px;
            overflow: hidden;
        }

        .kepala-desa .perangkat-photo {
            width: 180px;
            height: 180px;
            border-radius: 50%;
            margin-right: 2.5rem;
            flex-shrink: 0;
            border: 4px solid rgba(255, 255, 255, 0.3);
        }

        .perangkat-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .perangkat-card:hover .perangkat-photo img {
            transform: scale(1.05);
        }

        .perangkat-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(52, 152, 219, 0.8), rgba(155, 89, 182, 0.8));
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .perangkat-card:hover .perangkat-overlay {
            opacity: 1;
        }

        .perangkat-badge {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #3498db;
            font-size: 1.3rem;
            transform: translateY(15px);
            transition: transform 0.3s ease;
        }

        .perangkat-card:hover .perangkat-badge {
            transform: translateY(0);
        }

        .perangkat-info {
            padding: 1.5rem;
            text-align: center;
        }

        .kepala-desa .perangkat-info {
            padding: 0;
            text-align: left;
        }

        .perangkat-info h3 {
            font-size: 1.2rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 0.5rem;
            line-height: 1.3;
        }

        .kepala-desa .perangkat-info h3 {
            font-size: 1.8rem;
            margin-bottom: 0.8rem;
            color: white;
        }

        .perangkat-info .jabatan {
            color: #3498db;
            font-weight: 600;
            font-size: 0.95rem;
            margin-bottom: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .kepala-desa .perangkat-info .jabatan {
            font-size: 1.1rem;
            margin-bottom: 1rem;
            color: rgba(255, 255, 255, 0.9);
        }

        .perangkat-info .periode {
            color: #7f8c8d;
            font-size: 0.85rem;
            margin-bottom: 1rem;
            font-style: italic;
        }

        .kepala-desa .perangkat-info .periode {
            color: rgba(255, 255, 255, 0.8);
        }

        .perangkat-contact {
            display: flex;
            flex-direction: column;
            gap: 0.4rem;
            margin-top: 1rem;
        }

        .perangkat-contact span {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            font-size: 0.85rem;
            color: #6c757d;
        }

        .kepala-desa .perangkat-contact span {
            justify-content: flex-start;
            color: rgba(255, 255, 255, 0.9);
        }

        .perangkat-contact i {
            color: #3498db;
            width: 14px;
            font-size: 0.9rem;
        }

        .kepala-desa .perangkat-contact i {
            color: rgba(255, 255, 255, 0.9);
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 3rem;
        }
        
        .section-title h2 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 1rem;
        }
        
        .section-title p {
            font-size: 1.1rem;
            color: #7f8c8d;
            max-width: 600px;
            margin: 0 auto;
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }
        
        .feature-card {
            background: white;
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #3498db, #2980b9);
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        .feature-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #3498db, #2980b9);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2rem;
            color: white;
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
        
        /* Bagian Statistik */
        .stats {
            background: linear-gradient(135deg, #2c3e50, #34495e);
            padding: 4rem 0;
            color: white;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            text-align: center;
        }
        
        .stat-item h3 {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
        }
        
        .stat-item p {
            font-size: 1.1rem;
            opacity: 0.9;
        }
        
        /* Bagian Cara Kerja */
        .testimonials {
            padding: 5rem 0;
            background: #f8f9fa;
        }

        /* Pengumuman Section */
        .pengumuman {
            padding: 5rem 0;
            background: white;
        }

        .pengumuman-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .pengumuman-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: all 0.3s ease;
            border: 1px solid #e9ecef;
        }

        .pengumuman-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }

        .pengumuman-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 1.5rem;
            background: #f8f9fa;
            border-bottom: 1px solid #e9ecef;
        }

        .pengumuman-kategori {
            padding: 0.3rem 1rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .pengumuman-kategori-umum {
            background: #e3f2fd;
            color: #1976d2;
        }

        .pengumuman-kategori-penting {
            background: #ffebee;
            color: #d32f2f;
        }

        .pengumuman-kategori-kegiatan {
            background: #e8f5e8;
            color: #388e3c;
        }

        .pengumuman-kategori-pembangunan {
            background: #fff3e0;
            color: #f57c00;
        }

        .pengumuman-kategori-kesehatan {
            background: #f3e5f5;
            color: #7b1fa2;
        }

        .pengumuman-kategori-pendidikan {
            background: #e0f2f1;
            color: #00695c;
        }

        .pengumuman-prioritas {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
        }

        .pengumuman-prioritas-tinggi {
            background: #ffebee;
            color: #d32f2f;
        }

        .pengumuman-prioritas-sedang {
            background: #fff3e0;
            color: #f57c00;
        }

        .pengumuman-prioritas-rendah {
            background: #e8f5e8;
            color: #388e3c;
        }

        .pengumuman-image {
            width: 100%;
            height: 200px;
            overflow: hidden;
        }

        .pengumuman-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .pengumuman-card:hover .pengumuman-image img {
            transform: scale(1.05);
        }

        .pengumuman-content {
            padding: 1.5rem;
        }

        .pengumuman-content h3 {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #2c3e50;
            line-height: 1.4;
        }

        .pengumuman-content p {
            color: #6c757d;
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .pengumuman-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1rem;
            border-top: 1px solid #e9ecef;
            font-size: 0.85rem;
            color: #6c757d;
        }

        .pengumuman-meta span {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .pengumuman-meta i {
            color: #3498db;
        }

        .pengumuman-empty {
            grid-column: 1 / -1;
            text-align: center;
            padding: 4rem 2rem;
            color: #6c757d;
        }

        .pengumuman-empty i {
            font-size: 4rem;
            color: #dee2e6;
            margin-bottom: 1rem;
        }

        .pengumuman-empty h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: #495057;
        }

        .pengumuman-actions {
            text-align: center;
            margin-top: 3rem;
        }

        .pengumuman-actions .btn {
            padding: 1rem 2rem;
            font-size: 1rem;
        }

        /* Agenda Kegiatan Section */
        .agenda-kegiatan {
            padding: 5rem 0;
            background: #f8f9fa;
        }

        .agenda-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .agenda-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: all 0.3s ease;
            border: 1px solid #e9ecef;
        }

        .agenda-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }

        .agenda-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 1.5rem;
            background: #f8f9fa;
            border-bottom: 1px solid #e9ecef;
        }

        .agenda-kategori {
            padding: 0.3rem 1rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .agenda-kategori-rapat {
            background: #e3f2fd;
            color: #1976d2;
        }

        .agenda-kategori-acara {
            background: #f3e5f5;
            color: #7b1fa2;
        }

        .agenda-kategori-kegiatan {
            background: #e8f5e8;
            color: #388e3c;
        }

        .agenda-kategori-musyawarah {
            background: #fff3e0;
            color: #f57c00;
        }

        .agenda-kategori-pelatihan {
            background: #ffebee;
            color: #d32f2f;
        }

        .agenda-kategori-lainnya {
            background: #e0f2f1;
            color: #00695c;
        }

        .agenda-tanggal {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.85rem;
            color: #6c757d;
            font-weight: 600;
        }

        .agenda-tanggal i {
            color: #3498db;
        }

        .agenda-image {
            width: 100%;
            height: 200px;
            overflow: hidden;
        }

        .agenda-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .agenda-card:hover .agenda-image img {
            transform: scale(1.05);
        }

        .agenda-content {
            padding: 1.5rem;
        }

        .agenda-content h3 {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #2c3e50;
            line-height: 1.4;
        }

        .agenda-content p {
            color: #6c757d;
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .agenda-info {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .agenda-info-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
            color: #6c757d;
        }

        .agenda-info-item i {
            color: #3498db;
            width: 16px;
            font-size: 0.9rem;
        }

        .agenda-empty {
            grid-column: 1 / -1;
            text-align: center;
            padding: 4rem 2rem;
            color: #6c757d;
        }

        .agenda-empty i {
            font-size: 4rem;
            color: #dee2e6;
            margin-bottom: 1rem;
        }

        .agenda-empty h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: #495057;
        }

        .agenda-actions {
            text-align: center;
            margin-top: 3rem;
        }

        .agenda-actions .btn {
            padding: 1rem 2rem;
            font-size: 1rem;
        }
        
        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }
        
        .testimonial-card {
            background: white;
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        
        .testimonial-card::before {
            content: '"';
            position: absolute;
            top: -10px;
            left: 20px;
            font-size: 4rem;
            color: #3498db;
            opacity: 0.3;
        }
        
        .testimonial-header {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }
        
        .testimonial-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            margin-right: 1rem;
        }
        
        .testimonial-info h4 {
            font-weight: 600;
            margin-bottom: 0.2rem;
        }
        
        .testimonial-info p {
            color: #7f8c8d;
            font-size: 0.9rem;
        }
        
        .testimonial-text {
            color: #555;
            line-height: 1.6;
            margin-bottom: 1rem;
        }
        
        .stars {
            color: #f39c12;
        }
        
        /* Bagian Ajakan */
        .cta {
            background: linear-gradient(135deg, #3498db, #2980b9);
            padding: 4rem 0;
            text-align: center;
            color: white;
        }
        
        .cta h2 {
            font-size: 2.5rem;
            font-weight: 700;
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
        }
        
        .btn-white {
            background: white;
            color: #3498db;
        }
        
        .btn-white:hover {
            background: #f8f9fa;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(255, 255, 255, 0.3);
        }
        
        /* Bagian Footer */
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
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 1rem;
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
            padding-top: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
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
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .social-links a:hover {
            background: #3498db;
            transform: translateY(-2px);
        }
        
        /* Animasi */
        @keyframes slideInUp {
            from {
                transform: translateY(30px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        
        /* Dropdown Styles */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: rgba(255, 255, 255, 0.98);
            min-width: 200px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            backdrop-filter: blur(15px);
            border-radius: 12px;
            z-index: 1001;
            top: 100%;
            left: 0;
            padding: 0.5rem 0;
            border: 1px solid rgba(52, 152, 219, 0.1);
            transform: translateY(-10px);
            opacity: 0;
            transition: all 0.3s ease;
            visibility: hidden;
        }

        .dropdown:hover .dropdown-content {
            display: block;
            transform: translateY(0);
            opacity: 1;
            visibility: visible;
        }

        .dropdown-content::before {
            content: '';
            position: absolute;
            top: -8px;
            left: 20px;
            width: 0;
            height: 0;
            border-left: 8px solid transparent;
            border-right: 8px solid transparent;
            border-bottom: 8px solid rgba(255, 255, 255, 0.98);
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
            position: relative;
            overflow: hidden;
        }

        .dropdown-content a::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(52, 152, 219, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .dropdown-content a:hover::before {
            left: 100%;
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

        .dropdown-toggle:hover {
            background: rgba(52, 152, 219, 0.1);
            color: #3498db;
        }

        .dropdown-toggle i {
            font-size: 0.8rem;
            transition: transform 0.3s ease;
            margin-left: 0.3rem;
        }

        .dropdown:hover .dropdown-toggle i {
            transform: rotate(180deg);
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

        /* Navigasi Mobile */
        .mobile-menu {
            display: none;
            flex-direction: column;
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(15px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            border-radius: 0 0 15px 15px;
            padding: 1.5rem;
            gap: 0.5rem;
            transform: translateY(-10px);
            opacity: 0;
            transition: all 0.3s ease;
            border-top: 1px solid rgba(52, 152, 219, 0.1);
            z-index: 1001;
        }
        
        .mobile-menu.active {
            display: flex;
            transform: translateY(0);
            opacity: 1;
        }
        
        .mobile-menu a {
            padding: 0.75rem 1.25rem;
            border-radius: 6px;
            text-decoration: none;
            color: #2c3e50;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            border: 1px solid transparent;
            position: relative;
            overflow: hidden;
            letter-spacing: 0.2px;
        }

        .mobile-menu a::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(52, 152, 219, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .mobile-menu a:hover::before {
            left: 100%;
        }

        .mobile-menu a:hover {
            background: rgba(52, 152, 219, 0.08);
            color: #3498db;
            border-color: rgba(52, 152, 219, 0.15);
            transform: translateX(5px);
        }

        .mobile-menu .btn {
            margin-top: 1rem;
            text-align: center;
        }

        .mobile-menu .btn-outline {
            background: transparent;
            border: 2px solid #3498db;
            color: #3498db;
        }

        .mobile-menu .btn-primary {
            background: linear-gradient(135deg, #3498db, #2980b9);
            color: white;
            border: none;
        }

        /* Mobile Dropdown Styles */
        .mobile-dropdown {
            background: rgba(52, 152, 219, 0.05);
            border-radius: 8px;
            margin: 0.2rem 0;
            padding: 0.5rem 0;
        }

        .mobile-dropdown-toggle {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.75rem 1.25rem;
            cursor: pointer;
            border-radius: 6px;
            transition: all 0.3s ease;
            color: #2c3e50;
            font-weight: 500;
        }

        .mobile-dropdown-toggle:hover {
            background: rgba(52, 152, 219, 0.1);
            color: #3498db;
        }

        .mobile-dropdown-toggle i {
            transition: transform 0.3s ease;
        }

        .mobile-dropdown-content {
            display: none;
            padding-left: 1rem;
            border-left: 2px solid rgba(52, 152, 219, 0.2);
            margin-left: 1rem;
            margin-top: 0.5rem;
            max-height: 0;
            overflow: hidden;
            opacity: 0;
            transition: all 0.3s ease;
        }

        .mobile-dropdown-content.active {
            display: block;
            max-height: 250px;
            opacity: 1;
        }

        .mobile-dropdown-content a {
            padding: 0.5rem 1rem;
            font-size: 0.85rem;
            color: #6c757d;
            margin: 0.1rem 0;
        }

        .mobile-dropdown-content a:hover {
            color: #3498db;
            background: rgba(52, 152, 219, 0.08);
        }
        
        .menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: #2c3e50;
            padding: 0.5rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .menu-toggle:hover {
            background: rgba(52, 152, 219, 0.1);
            color: #3498db;
        }
        
        /* Desain Responsif */
        @media (max-width: 1024px) {
            .nav-container {
                padding: 1rem 1.5rem;
            }
            
            .nav-links {
                gap: 1.5rem;
            }
            
            .nav-links a {
                font-size: 0.9rem;
                padding: 0.4rem 0.8rem;
            }
            
            .btn {
                padding: 0.7rem 1.2rem;
                font-size: 0.85rem;
            }
            
            .dropdown-content {
                min-width: 180px;
                left: auto;
                right: 0;
            }
            
            .dropdown-content a {
                padding: 0.65rem 1rem;
                font-size: 0.85rem;
            }
            
            .dropdown-content::before {
                left: auto;
                right: 20px;
            }
        }
        
        @media (max-width: 768px) {
            .nav-container {
                padding: 1rem 1rem;
            }
            
            .logo {
                font-size: 1.5rem;
            }
            
            .logo img {
                height: 35px;
            }
            
            .nav-links {
                display: none;
            }

            .nav-buttons {
                display: none;
            }
            
            .menu-toggle {
                display: block;
            }
            
            .mobile-menu {
                left: 1rem;
                right: 1rem;
                width: auto;
                border-radius: 15px;
            }
            
            .mobile-dropdown {
                margin: 0.2rem -0.5rem;
            }
            
            .mobile-dropdown-content a {
                padding: 0.6rem 1rem;
                font-size: 0.9rem;
            }
            
            .hero {
                background-attachment: scroll;
                padding-top: 80px;
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
            
            .profil-content {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
            
            .profil-visual {
                order: -1;
            }
            
            .profil-image {
                margin-bottom: 1rem;
            }
            
            .profil-image img {
                height: 250px;
            }
            
            .profil-stats {
                grid-template-columns: 1fr;
                margin-bottom: 2rem;
            }
            
            .stat-card {
                padding: 1rem;
            }
            
            .profil-map {
                margin-top: 1.5rem;
                padding: 1.5rem;
            }
            
            .profil-map h4 {
                font-size: 1.2rem;
                margin-bottom: 1rem;
            }
            
            .map-container iframe {
                height: 280px;
            }
            
            .map-info-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }
            
            .map-item {
                padding: 1rem;
            }
            
            .map-icon {
                width: 40px;
                height: 40px;
                font-size: 1.1rem;
            }
            
            .map-text h5 {
                font-size: 0.95rem;
            }
            
            .map-text p {
                font-size: 0.85rem;
            }
            
            .features-grid {
                grid-template-columns: 1fr;
            }
            
            .struktur-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
                margin-top: 2rem;
            }
            
            .perangkat-card.kepala-desa {
                grid-column: 1;
                flex-direction: column;
                text-align: center;
                padding: 2rem;
            }
            
            .kepala-desa .perangkat-photo {
                width: 120px;
                height: 120px;
                margin: 0 auto 1.5rem;
            }
            
            .kepala-desa .perangkat-info {
                text-align: center;
            }
            
            .kepala-desa .perangkat-info h3 {
                font-size: 1.5rem;
            }
            
            .kepala-desa .perangkat-info .jabatan {
                font-size: 1rem;
            }
            
            .kepala-desa .perangkat-contact span {
                justify-content: center;
            }
            
            .perangkat-photo {
                height: 200px;
            }
            
            .perangkat-info h3 {
                font-size: 1.1rem;
            }
            
            .perangkat-info .jabatan {
                font-size: 0.9rem;
            }
            
            .perangkat-contact span {
                font-size: 0.8rem;
            }
            
            .pengumuman-grid {
                grid-template-columns: 1fr;
            }
            
            .pengumuman-card {
                margin-bottom: 1rem;
            }
            
            .pengumuman-meta {
                flex-direction: column;
                gap: 0.5rem;
                align-items: flex-start;
            }
            
            .agenda-grid {
                grid-template-columns: 1fr;
            }
            
            .agenda-card {
                margin-bottom: 1rem;
            }
            
            .agenda-header {
                flex-direction: column;
                gap: 0.5rem;
                align-items: flex-start;
            }
            
            .agenda-info {
                gap: 0.3rem;
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
<<body>
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
                <button class="menu-toggle" onclick="toggleMobileMenu()">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <div class="mobile-menu" id="mobile-menu">
                <a href="#home">Beranda</a>
                <div class="mobile-dropdown">
                    <div class="mobile-dropdown-toggle" onclick="toggleMobileDropdown('tentang')">
                        <span>Tentang Desa</span>
                        <i class="fas fa-chevron-down" id="mobile-dropdown-icon-tentang"></i>
                    </div>
                    <div class="mobile-dropdown-content" id="mobile-dropdown-content-tentang">
                        <a href="/tentang">
                            <i class="fas fa-info-circle"></i>
                            Profil Desa
                        </a>
                        <a href="#struktur">
                            <i class="fas fa-users"></i>
                            Perangkat Desa
                        </a>
                    </div>
                </div>
                <div class="mobile-dropdown">
                    <div class="mobile-dropdown-toggle" onclick="toggleMobileDropdown('publikasi')">
                        <span>Publikasi</span>
                        <i class="fas fa-chevron-down" id="mobile-dropdown-icon-publikasi"></i>
                    </div>
                    <div class="mobile-dropdown-content" id="mobile-dropdown-content-publikasi">
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
                </div>
                <a href="/layanan/detail">Layanan</a>
                <a href="{{ route('login') }}" class="btn btn-outline">Masuk</a>
                <a href="{{ route('register') }}" class="btn btn-primary">Daftar</a>
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
                        <i class="fas fa-arrow-right" style="margin-left: 0.5rem;"></i>
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
                        
                        <div class="profil-item">
                            <div class="profil-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="profil-info">
                                <h4>Jumlah Penduduk</h4>
                                <p>3.245 jiwa dengan 1.156 Kepala Keluarga</p>
                            </div>
                        </div>
                        
                        <div class="profil-item">
                            <div class="profil-icon">
                                <i class="fas fa-chart-area"></i>
                            </div>
                            <div class="profil-info">
                                <h4>Luas Wilayah</h4>
                                <p>245.8 hektar dengan 8 RW dan 24 RT</p>
                            </div>
                        </div>
                        
                        <div class="profil-item">
                            <div class="profil-icon">
                                <i class="fas fa-seedling"></i>
                            </div>
                            <div class="profil-info">
                                <h4>Mata Pencaharian</h4>
                                <p>Pertanian, perdagangan, dan industri kecil menengah</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="profil-visi-misi">
                        <div class="visi">
                            <h4><i class="fas fa-eye"></i> Visi</h4>
                            <p>"Mewujudkan Desa Cibeureum “MANTAP “ (Mandiri, Aman, Nyaman, Tertib, Agamis Dan Produktif)."</p>
                        </div>
                        
                        <div class="misi">
                            <h4><i class="fas fa-bullseye"></i> Misi</h4>
                            <ul>
                                <li>Mewujudkan birokrasi pemerintahan desa yang dinamis, tata kelola pemerintahan desa yang baik (Good  Village Government) serta kepemimpinan yang konstruktif dan kolaboratif </li>
                                <li>Mewujudkan Desa Cibeureum yang aman, sehat, cerdas  dan sejahtera dengan meningkatkan peranserta dan kesadaran warga akan pentingnya menjaga kesehatan, keamanan, ketertiban, kebersihan dan memperoleh pelayanan dasar yang baik</li>
                                <li>Memberikan ruang kreativitas kepada masyarakat dalam mengembangkan potensi yang ada dengan didukung pengadaan modal usaha dan pelatihan wirausaha</li>
                                <li>Meningkatakan kesejahtraan mayarakat dalam rangka pencapaian mayarakat yang adil dan makmur</li>
                                <li>Mewujudkan pembangunan yang berkelanjutan dan berwawasan lingkungan</li>
                                <li>Mewujudkan Desa Cibeureum yang agamis, toleran, dan harmonis</li>
                                <li>Menumbuhkembangkan  nilai-nilai religiusitas dalam diri warga masyarakat</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="profil-visual">
                    <div class="profil-image">
                        <img src="{{ asset('images/cibeureum.jpg') }}" alt="Kantor Desa Cibeureum">
                        <div class="profil-overlay">
                            <div class="profil-badge">
                                <i class="fas fa-building"></i>
                                <span>Kantor Desa Cibeureum</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="profil-stats">
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="fas fa-home"></i>
                            </div>
                            <div class="stat-content">
                                <h3>1.156</h3>
                                <p>Kepala Keluarga</p>
                            </div>
                        </div>
                        
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="fas fa-school"></i>
                            </div>
                            <div class="stat-content">
                                <h3>5</h3>
                                <p>Sekolah</p>
                            </div>
                        </div>
                        
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="fas fa-clinic-medical"></i>
                            </div>
                            <div class="stat-content">
                                <h3>3</h3>
                                <p>Fasilitas Kesehatan</p>
                            </div>
                        </div>
                        
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="fas fa-mosque"></i>
                            </div>
                            <div class="stat-content">
                                <h3>8</h3>
                                <p>Tempat Ibadah</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="profil-map">
                        <h4><i class="fas fa-map"></i> Peta Lokasi Desa Cibeureum</h4>
                        <div class="map-container">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15832.234567891!2d108.2234567!3d-6.8345678!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f1234567890ab%3A0xabcdef1234567890!2sCibeureum%2C%20Talaga%2C%20Majalengka%20Regency%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1642123456789!5m2!1sen!2sid"
                                width="100%"
                                height="350"
                                style="border:0;"
                                allowfullscreen=""
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                        <div class="map-info">
                            <div class="map-info-grid">
                                <div class="map-item">
                                    <div class="map-icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <div class="map-text">
                                        <h5>Alamat Lengkap</h5>
                                        <p>Desa Cibeureum, Kecamatan Talaga, Kabupaten Majalengka, Jawa Barat</p>
                                    </div>
                                </div>
                                <div class="map-item">
                                    <div class="map-icon">
                                        <i class="fas fa-route"></i>
                                    </div>
                                    <div class="map-text">
                                        <h5>Akses Transportasi</h5>
                                        <p>Dapat diakses melalui jalan kabupaten dari arah Majalengka atau Kuningan</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                    <i class="fas fa-user-plus" style="margin-left: 0.5rem;"></i>
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
        // Toggle mobile dropdown
        function toggleMobileDropdown(type) {
            const dropdownContent = document.getElementById(`mobile-dropdown-content-${type}`);
            const dropdownIcon = document.getElementById(`mobile-dropdown-icon-${type}`);
            
            // Close other dropdowns
            const allDropdowns = document.querySelectorAll('.mobile-dropdown-content');
            const allIcons = document.querySelectorAll('[id^="mobile-dropdown-icon-"]');
            
            allDropdowns.forEach(dropdown => {
                if (dropdown !== dropdownContent) {
                    dropdown.classList.remove('active');
                }
            });
            
            allIcons.forEach(icon => {
                if (icon !== dropdownIcon) {
                    icon.style.transform = 'rotate(0deg)';
                }
            });
            
            // Toggle current dropdown
            dropdownContent.classList.toggle('active');
            
            if (dropdownContent.classList.contains('active')) {
                dropdownIcon.style.transform = 'rotate(180deg)';
            } else {
                dropdownIcon.style.transform = 'rotate(0deg)';
            }
        }

        // Toggle mobile menu dengan animasi yang halus
        function toggleMobileMenu() {
            const mobileMenu = document.getElementById('mobile-menu');
            const menuToggle = document.querySelector('.menu-toggle');
            
            mobileMenu.classList.toggle('active');
            
            // Animasi ikon hamburger
            if (mobileMenu.classList.contains('active')) {
                menuToggle.innerHTML = '<i class="fas fa-times"></i>';
                menuToggle.style.transform = 'rotate(90deg)';
            } else {
                menuToggle.innerHTML = '<i class="fas fa-bars"></i>';
                menuToggle.style.transform = 'rotate(0deg)';
                
                // Reset all dropdowns saat menu ditutup
                const allDropdowns = document.querySelectorAll('.mobile-dropdown-content');
                const allIcons = document.querySelectorAll('[id^="mobile-dropdown-icon-"]');
                
                allDropdowns.forEach(dropdown => {
                    dropdown.classList.remove('active');
                });
                
                allIcons.forEach(icon => {
                    icon.style.transform = 'rotate(0deg)';
                });
            }
        }

        // Tutup mobile menu ketika mengklik di luar
        document.addEventListener('click', function(event) {
            const mobileMenu = document.getElementById('mobile-menu');
            const menuToggle = document.querySelector('.menu-toggle');
            const navContainer = document.querySelector('.nav-container');
            
            if (!navContainer.contains(event.target) && mobileMenu.classList.contains('active')) {
                mobileMenu.classList.remove('active');
                menuToggle.innerHTML = '<i class="fas fa-bars"></i>';
                menuToggle.style.transform = 'rotate(0deg)';
                
                // Reset all dropdowns saat menu ditutup
                const allDropdowns = document.querySelectorAll('.mobile-dropdown-content');
                const allIcons = document.querySelectorAll('[id^="mobile-dropdown-icon-"]');
                
                allDropdowns.forEach(dropdown => {
                    dropdown.classList.remove('active');
                });
                
                allIcons.forEach(icon => {
                    icon.style.transform = 'rotate(0deg)';
                });
            }
        });

        // Tutup mobile menu ketika mengklik link
        document.querySelectorAll('.mobile-menu a').forEach(link => {
            link.addEventListener('click', function() {
                const mobileMenu = document.getElementById('mobile-menu');
                const menuToggle = document.querySelector('.menu-toggle');
                
                mobileMenu.classList.remove('active');
                menuToggle.innerHTML = '<i class="fas fa-bars"></i>';
                menuToggle.style.transform = 'rotate(0deg)';
                
                // Reset all dropdowns saat menu ditutup
                const allDropdowns = document.querySelectorAll('.mobile-dropdown-content');
                const allIcons = document.querySelectorAll('[id^="mobile-dropdown-icon-"]');
                
                allDropdowns.forEach(dropdown => {
                    dropdown.classList.remove('active');
                });
                
                allIcons.forEach(icon => {
                    icon.style.transform = 'rotate(0deg)';
                });
            });
        });

        // Tutup dropdown mobile ketika mengklik sub-menu
        document.querySelectorAll('.mobile-dropdown-content a').forEach(link => {
            link.addEventListener('click', function() {
                const mobileMenu = document.getElementById('mobile-menu');
                const menuToggle = document.querySelector('.menu-toggle');
                
                mobileMenu.classList.remove('active');
                menuToggle.innerHTML = '<i class="fas fa-bars"></i>';
                menuToggle.style.transform = 'rotate(0deg)';
                
                // Reset all dropdowns
                const allDropdowns = document.querySelectorAll('.mobile-dropdown-content');
                const allIcons = document.querySelectorAll('[id^="mobile-dropdown-icon-"]');
                
                allDropdowns.forEach(dropdown => {
                    dropdown.classList.remove('active');
                });
                
                allIcons.forEach(icon => {
                    icon.style.transform = 'rotate(0deg)';
                });
            });
        });

        // Smooth scrolling untuk link anchor
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const targetId = this.getAttribute('href').substring(1);
                const targetElement = document.getElementById(targetId);
                
                if (targetElement) {
                    const offsetTop = targetElement.offsetTop - 80; // Offset untuk navbar
                    
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Prevent dropdown toggle from navigating
        document.querySelectorAll('.dropdown-toggle').forEach(toggle => {
            toggle.addEventListener('click', function(e) {
                e.preventDefault();
            });
        });

        // Efek scroll navbar yang lebih halus
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

        // Animasi kartu layanan saat di-scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animation = 'slideInUp 0.6s ease-out';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.feature-card, .testimonial-card, .pengumuman-card, .profil-item, .stat-card').forEach(card => {
            observer.observe(card);
        });
    </script>
</body>
</html>