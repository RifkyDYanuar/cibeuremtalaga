<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $agenda->judul }} - SiDesa Cibeureum</title>
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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }

        /* Navbar Styles - Same as agenda-public */
        .navbar {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1.5rem;
            position: relative;
        }

        .navbar-brand {
            color: white;
            font-size: 1.2rem;
            font-weight: 600;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .navbar-brand:hover {
            color: rgba(255, 255, 255, 0.9);
        }

        .navbar-menu {
            display: flex;
            align-items: center;
        }

        .navbar-nav {
            display: flex;
            list-style: none;
            gap: 2rem;
            margin: 0;
            padding: 0;
        }

        .navbar-nav a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            position: relative;
        }

        .navbar-nav a:hover,
        .navbar-nav a.active {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }

        .navbar-toggle {
            display: none;
            background: rgba(255, 255, 255, 0.2);
            border: 2px solid rgba(255, 255, 255, 0.3);
            color: white;
            font-size: 1.1rem;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            width: 42px;
            height: 42px;
            align-items: center;
            justify-content: center;
            z-index: 99999;
        }

        .navbar-toggle:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: scale(1.05);
        }

        .navbar-toggle:focus {
            outline: 2px solid rgba(255, 255, 255, 0.5);
            outline-offset: 2px;
        }

        /* Mobile Navbar */
        @media (max-width: 768px) {
            .navbar-toggle {
                display: flex !important;
            }

            .navbar-menu {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: rgba(255, 255, 255, 0.98);
                backdrop-filter: blur(20px);
                border-radius: 0 0 15px 15px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
                z-index: 9999;
                transform: translateY(-10px);
                opacity: 0;
                transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            }

            .navbar-menu.open {
                display: block !important;
                transform: translateY(0);
                opacity: 1;
            }

            .navbar-nav {
                flex-direction: column;
                width: 100%;
                margin: 0;
                padding: 1rem 0;
                gap: 0;
            }

            .navbar-nav li {
                width: 100%;
            }

            .navbar-nav a {
                color: #2c3e50 !important;
                padding: 1rem 1.5rem;
                width: 100%;
                text-align: left;
                display: block;
                border-bottom: 1px solid rgba(0, 0, 0, 0.05);
                border-radius: 0 !important;
                transition: all 0.3s ease;
            }

            .navbar-nav a:hover,
            .navbar-nav a.active {
                background: rgba(102, 126, 234, 0.1) !important;
                color: #667eea !important;
                transform: none !important;
                padding-left: 2rem;
            }

            .navbar-nav li:last-child a {
                border-bottom: none;
            }
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 2rem 0;
            color: white;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: white;
            text-decoration: none;
            padding: 0.8rem 1.5rem;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 30px;
            font-weight: 500;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            margin-bottom: 2rem;
        }

        .back-link:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        .main-content {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 3rem;
            padding: 3rem 0;
        }

        .content-wrapper {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .agenda-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem 2rem;
            background: #f8f9fa;
            border-bottom: 1px solid #e9ecef;
        }

        .agenda-kategori {
            padding: 0.5rem 1.2rem;
            border-radius: 20px;
            font-size: 0.85rem;
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

        .agenda-date {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
            color: #6c757d;
            font-weight: 600;
        }

        .agenda-date i {
            color: #3498db;
        }

        .agenda-image {
            width: 100%;
            height: 400px;
            overflow: hidden;
        }

        .agenda-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .agenda-content {
            padding: 2rem;
        }

        .agenda-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: #2c3e50;
            line-height: 1.3;
        }

        .agenda-meta {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
            padding: 1.5rem;
            background: #f8f9fa;
            border-radius: 12px;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .agenda-actions {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }

        .btn {
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 25px;
            font-size: 0.9rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            justify-content: center;
        }

        .btn-primary {
            background: #667eea;
            color: white;
        }

        .btn-primary:hover {
            background: #5a6fd8;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .btn-outline {
            background: transparent;
            color: #667eea;
            border: 2px solid #667eea;
        }

        .btn-outline:hover {
            background: #667eea;
            color: white;
        }

        .btn-calendar {
            position: relative;
        }

        .btn-calendar:hover {
            animation: pulse 0.6s;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        .meta-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #3498db, #2980b9);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.1rem;
        }

        .meta-text h4 {
            font-size: 0.9rem;
            color: #6c757d;
            margin-bottom: 0.2rem;
        }

        .meta-text p {
            font-size: 1rem;
            font-weight: 600;
            color: #2c3e50;
        }

        .agenda-description {
            color: #6c757d;
            line-height: 1.8;
            font-size: 1.1rem;
        }

        .agenda-description h3,
        .agenda-description h4 {
            color: #2c3e50;
            margin: 1.5rem 0 1rem 0;
        }

        .agenda-description ul,
        .agenda-description ol {
            margin-left: 2rem;
            margin-bottom: 1rem;
        }

        .agenda-description li {
            margin-bottom: 0.5rem;
        }

        .sidebar {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .sidebar-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .sidebar-header {
            padding: 1.5rem;
            background: linear-gradient(135deg, #3498db, #2980b9);
            color: white;
        }

        .sidebar-header h3 {
            font-size: 1.2rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .sidebar-content {
            padding: 1.5rem;
        }

        .share-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .share-btn {
            flex: 1;
            padding: 0.8rem 1rem;
            border: none;
            border-radius: 8px;
            color: white;
            text-decoration: none;
            font-weight: 500;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
            font-size: 0.9rem;
        }

        .share-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .share-facebook {
            background: #1877f2;
        }

        .share-twitter {
            background: #1da1f2;
        }

        .share-whatsapp {
            background: #25d366;
        }

        .share-telegram {
            background: #0088cc;
        }

        .related-agenda {
            margin-top: 2rem;
        }

        .related-item {
            padding: 1rem;
            border-bottom: 1px solid #e9ecef;
            transition: all 0.3s ease;
        }

        .related-item:last-child {
            border-bottom: none;
        }

        .related-item:hover {
            background: #f8f9fa;
        }

        .related-item h4 {
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #2c3e50;
        }

        .related-item p {
            font-size: 0.8rem;
            color: #6c757d;
            margin-bottom: 0.5rem;
        }

        .related-item .date {
            font-size: 0.8rem;
            color: #3498db;
            font-weight: 500;
        }

        .related-item a {
            text-decoration: none;
            color: inherit;
        }

        .status-badge {
            padding: 0.3rem 0.8rem;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-aktif {
            background: #e8f5e8;
            color: #388e3c;
        }

        .status-selesai {
            background: #f3e5f5;
            color: #7b1fa2;
        }

        .status-dibatalkan {
            background: #ffebee;
            color: #d32f2f;
        }

        @media (max-width: 1024px) {
            .main-content {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
        }

        @media (max-width: 768px) {
            .agenda-title {
                font-size: 1.5rem;
            }

            .agenda-meta {
                grid-template-columns: 1fr;
            }

            .share-buttons {
                flex-direction: column;
            }

            .share-btn {
                flex: none;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-container">
            <a href="{{ url('/') }}" class="navbar-brand">
                <i class="fas fa-home"></i>
                SiDesa Cibeureum
            </a>
            
            <button class="navbar-toggle" id="navbarToggle" type="button" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            
            <div class="navbar-menu" id="navbarMenu">
                <ul class="navbar-nav">
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li><a href="{{ route('agenda.public') }}" class="active">Agenda</a></li>
                    <li><a href="#pengumuman">Pengumuman</a></li>
                    <li><a href="#profil">Profil Desa</a></li>
                    <li><a href="#kontak">Kontak</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="header">
        <div class="container">
            <a href="{{ route('agenda.public') }}" class="back-link">
                <i class="fas fa-arrow-left"></i>
                Kembali ke Agenda
            </a>
        </div>
    </div>

    <div class="container">
        <div class="main-content">
            <div class="content-wrapper">
                <div class="agenda-header">
                    <div class="agenda-kategori agenda-kategori-{{ $agenda->kategori }}">
                        {{ ucfirst($agenda->kategori) }}
                    </div>
                    <div class="status-badge status-{{ $agenda->status }}">
                        {{ ucfirst($agenda->status) }}
                    </div>
                </div>

                @if($agenda->gambar)
                    <div class="agenda-image">
                        <img src="{{ Storage::url($agenda->gambar) }}" alt="{{ $agenda->judul }}">
                    </div>
                @endif

                <div class="agenda-content">
                    <h1 class="agenda-title">{{ $agenda->judul }}</h1>

                    <div class="agenda-meta">
                        <div class="meta-item">
                            <div class="meta-icon">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                            <div class="meta-text">
                                <h4>Tanggal</h4>
                                <p>{{ $agenda->tanggal_mulai->format('d F Y') }}</p>
                            </div>
                        </div>

                        <div class="meta-item">
                            <div class="meta-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="meta-text">
                                <h4>Waktu</h4>
                                <p>{{ $agenda->tanggal_mulai->format('H:i') }} - {{ $agenda->tanggal_selesai->format('H:i') }}</p>
                            </div>
                        </div>

                        <div class="meta-item">
                            <div class="meta-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="meta-text">
                                <h4>Lokasi</h4>
                                <p>{{ $agenda->lokasi }}</p>
                            </div>
                        </div>

                        <div class="meta-item">
                            <div class="meta-icon">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="meta-text">
                                <h4>Diposting oleh</h4>
                                <p>{{ $agenda->creator->name ?? 'Admin' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="agenda-actions">
                        <button onclick="addToCalendar()" class="btn btn-primary btn-calendar">
                            <i class="fas fa-calendar-plus"></i>
                            Tambah ke Kalender
                        </button>
                        <a href="{{ route('agenda.public') }}" class="btn btn-outline">
                            <i class="fas fa-list"></i>
                            Lihat Semua Agenda
                        </a>
                    </div>

                    <div class="agenda-description">
                        {!! nl2br(e($agenda->deskripsi)) !!}
                    </div>
                </div>
            </div>

            <div class="sidebar">
                <div class="sidebar-card">
                    <div class="sidebar-header">
                        <h3>
                            <i class="fas fa-share-alt"></i>
                            Bagikan Agenda
                        </h3>
                    </div>
                    <div class="sidebar-content">
                        <div class="share-buttons">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" class="share-btn share-facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($agenda->judul) }}" target="_blank" class="share-btn share-twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="https://wa.me/?text={{ urlencode($agenda->judul . ' - ' . request()->fullUrl()) }}" target="_blank" class="share-btn share-whatsapp">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                            <a href="https://t.me/share/url?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($agenda->judul) }}" target="_blank" class="share-btn share-telegram">
                                <i class="fab fa-telegram-plane"></i>
                            </a>
                        </div>
                    </div>
                </div>

                @if($relatedAgendas->count() > 0)
                <div class="sidebar-card">
                    <div class="sidebar-header">
                        <h3>
                            <i class="fas fa-calendar-check"></i>
                            Agenda Terkait
                        </h3>
                    </div>
                    <div class="sidebar-content">
                        <div class="related-agenda">
                            @foreach($relatedAgendas as $related)
                            <div class="related-item">
                                <a href="{{ route('agenda.public.show', $related->id) }}">
                                    <h4>{{ $related->judul }}</h4>
                                    <p>{{ Str::limit(strip_tags($related->deskripsi), 80) }}</p>
                                    <div class="date">
                                        <i class="fas fa-calendar-alt"></i>
                                        {{ $related->tanggal_mulai->format('d M Y') }}
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        // Navbar Toggle Functionality - Same as agenda-public
        function initializeNavbar() {
            console.log('🚀 Initializing navbar...');
            
            const navbarToggle = document.getElementById('navbarToggle');
            const navbarMenu = document.getElementById('navbarMenu');
            
            if (!navbarToggle || !navbarMenu) {
                console.error('❌ Navbar elements not found!');
                return false;
            }

            console.log('✅ Navbar elements found');

            // Remove any existing event listeners by cloning
            const newToggle = navbarToggle.cloneNode(true);
            navbarToggle.parentNode.replaceChild(newToggle, navbarToggle);

            function toggleMenu(e) {
                e.preventDefault();
                e.stopPropagation();
                
                const isOpen = navbarMenu.classList.contains('open');
                console.log(`📱 Toggle clicked! Menu is ${isOpen ? 'open' : 'closed'}`);
                
                if (isOpen) {
                    navbarMenu.classList.remove('open');
                    newToggle.innerHTML = '<i class="fas fa-bars"></i>';
                    newToggle.setAttribute('aria-expanded', 'false');
                    console.log('📴 Menu closed');
                } else {
                    navbarMenu.classList.add('open');
                    newToggle.innerHTML = '<i class="fas fa-times"></i>';
                    newToggle.setAttribute('aria-expanded', 'true');
                    console.log('📲 Menu opened');
                }
            }

            // Add event listeners
            newToggle.addEventListener('click', toggleMenu);
            newToggle.addEventListener('touchstart', toggleMenu, { passive: false });

            // Close menu when clicking nav links
            const navLinks = navbarMenu.querySelectorAll('a');
            navLinks.forEach(link => {
                link.addEventListener('click', () => {
                    navbarMenu.classList.remove('open');
                    newToggle.innerHTML = '<i class="fas fa-bars"></i>';
                    newToggle.setAttribute('aria-expanded', 'false');
                    console.log('🔗 Nav link clicked, menu closed');
                });
            });

            // Close menu when clicking outside
            document.addEventListener('click', (e) => {
                if (!newToggle.contains(e.target) && !navbarMenu.contains(e.target)) {
                    if (navbarMenu.classList.contains('open')) {
                        navbarMenu.classList.remove('open');
                        newToggle.innerHTML = '<i class="fas fa-bars"></i>';
                        newToggle.setAttribute('aria-expanded', 'false');
                        console.log('🌐 Clicked outside, menu closed');
                    }
                }
            });

            console.log('✅ Navbar initialized successfully!');
            return true;
        }

        // Initialize navbar when DOM is ready
        document.addEventListener('DOMContentLoaded', function() {
            console.log('🎯 DOM Content Loaded - Initializing navbar...');
            initializeNavbar();
        });

        // Fallback initialization
        window.addEventListener('load', initializeNavbar);
        setTimeout(initializeNavbar, 1000);

        // Add to calendar functionality
        function addToCalendar() {
            const title = "{{ $agenda->judul }}";
            const date = "{{ $agenda->tanggal }}";
            const time = "{{ $agenda->waktu }}";
            const location = "{{ $agenda->tempat }}";
            const description = "{{ strip_tags($agenda->deskripsi) }}";
            
            const startDate = new Date(`${date}T${time}`);
            const endDate = new Date(startDate.getTime() + (2 * 60 * 60 * 1000)); // 2 hours duration

            const event = {
                title: title,
                start: startDate.toISOString().replace(/[-:]/g, '').split('.')[0] + 'Z',
                end: endDate.toISOString().replace(/[-:]/g, '').split('.')[0] + 'Z',
                description: description,
                location: location
            };

            const icsContent = `BEGIN:VCALENDAR
VERSION:2.0
PRODID:-//SiDesa Cibeureum//Agenda//EN
BEGIN:VEVENT
UID:{{ $agenda->id }}-${Date.now()}@sidesa-cibeureum.com
DTSTAMP:${new Date().toISOString().replace(/[-:]/g, '').split('.')[0]}Z
DTSTART:${event.start}
DTEND:${event.end}
SUMMARY:${event.title}
DESCRIPTION:${event.description}
LOCATION:${event.location}
END:VEVENT
END:VCALENDAR`;

            const blob = new Blob([icsContent], { type: 'text/calendar' });
            const url = window.URL.createObjectURL(blob);
            const link = document.createElement('a');
            link.href = url;
            link.download = `agenda-${title.replace(/\s+/g, '-').toLowerCase()}.ics`;
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            window.URL.revokeObjectURL(url);

            console.log(`📅 Calendar event downloaded: ${title}`);
        }
    </script>
</body>
</html>
