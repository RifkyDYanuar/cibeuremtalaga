<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="            .navbar-menu.show {
                display: block !important;
                opacity: 1 !important;
                visibility: visible !important;
                transform: translateY(0) !important;
            }

            .navbar-menu {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: white;
                border-radius: 0 0 10px 10px;
                box-shadow: 0 5px 15px rgba(0,0,0,0.2);
                z-index: 1000;
                opacity: 0;
                visibility: hidden;
                transform: translateY(-10px);
                transition: all 0.3s ease;
            }dth, initial-scale=1.0">
    <title>Agenda Kegiatan - SiDesa Cibeureum</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: #2c3e50;
        }

        /* Simple Navbar */
        .navbar {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 1rem;
        }

        .navbar-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
        }

        .navbar-brand {
            color: white;
            text-decoration: none;
            font-size: 1.2rem;
            font-weight: bold;
        }

        .navbar-toggle {
            display: none;
            background: rgba(255, 255, 255, 0.3) !important;
            border: 2px solid white !important;
            color: white !important;
            padding: 8px !important;
            border-radius: 5px !important;
            cursor: pointer !important;
            font-size: 18px !important;
            width: 44px !important;
            height: 44px !important;
            text-align: center !important;
            line-height: 1.2 !important;
            position: relative !important;
            z-index: 9999 !important;
            outline: none !important;
            user-select: none !important;
            -webkit-tap-highlight-color: transparent !important;
            -webkit-touch-callout: none !important;
            -webkit-user-select: none !important;
            -khtml-user-select: none !important;
            -moz-user-select: none !important;
            -ms-user-select: none !important;
            transition: all 0.2s ease !important;
        }

        .navbar-toggle:hover,
        .navbar-toggle:focus,
        .navbar-toggle:active {
            background: rgba(255, 255, 255, 0.4) !important;
            transform: scale(1.05) !important;
            outline: none !important;
        }

        .navbar-toggle i {
            pointer-events: none !important;
            display: block !important;
            line-height: 1 !important;
        }

        .navbar-menu {
            display: flex;
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
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .navbar-nav a:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        /* Mobile Styles */
        @media (max-width: 768px) {
            .navbar-toggle {
                display: block !important;
            }

            .navbar-menu {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: white;
                border-radius: 0 0 10px 10px;
                box-shadow: 0 5px 15px rgba(0,0,0,0.2);
                z-index: 1000;
            }

            .navbar-menu.show {
                display: block !important;
            }

            .navbar-nav {
                flex-direction: column;
                padding: 1rem 0;
                gap: 0;
            }

            .navbar-nav a {
                color: #333 !important;
                padding: 1rem 1.5rem;
                border-bottom: 1px solid #eee;
                border-radius: 0;
            }

            .navbar-nav a:hover {
                background: #f5f5f5;
            }

            .navbar-nav li:last-child a {
                border-bottom: none;
            }
        }

        /* Content */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }

        .header {
            text-align: center;
            color: white;
            margin-bottom: 3rem;
        }

        .header h1 {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }

        .back-link {
            display: inline-block;
            color: white;
            text-decoration: none;
            background: rgba(255, 255, 255, 0.1);
            padding: 0.8rem 1.5rem;
            border-radius: 25px;
            margin-bottom: 2rem;
            transition: background 0.3s;
        }

        .back-link:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .agenda-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
        }

        .agenda-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }

        .agenda-card:hover {
            transform: translateY(-5px);
        }

        .agenda-date {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 1rem;
            border-radius: 10px;
            text-align: center;
            margin-bottom: 1rem;
        }

        .agenda-title {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
            color: #2c3e50;
        }

        .agenda-desc {
            color: #666;
            margin-bottom: 1rem;
        }

        .agenda-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .meta-badge {
            background: #f0f0f0;
            padding: 0.3rem 0.8rem;
            border-radius: 15px;
            font-size: 0.8rem;
            color: #666;
        }

        .btn {
            background: #667eea;
            color: white;
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 25px;
            text-decoration: none;
            display: inline-block;
            transition: background 0.3s;
            cursor: pointer;
        }

        .btn:hover {
            background: #5a6fd8;
        }

        .empty-state {
            text-align: center;
            color: white;
            padding: 3rem;
        }

        .debug-panel {
            position: fixed;
            bottom: 20px;
            left: 20px;
            background: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 1rem;
            border-radius: 10px;
            font-family: monospace;
            font-size: 12px;
            max-width: 300px;
            z-index: 10000;
        }

        @media (max-width: 768px) {
            .container { padding: 1rem 0.5rem; }
            .header h1 { font-size: 2rem; }
            .agenda-grid { grid-template-columns: 1fr; gap: 1rem; }
            .debug-panel { position: relative; margin: 1rem; }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-container">
            <a href="{{ url('/') }}" class="navbar-brand">
                <i class="fas fa-home"></i> SiDesa Cibeureum
            </a>
            
            <button class="navbar-toggle" id="toggle" onclick="toggleMobileMenu()">
                <i class="fas fa-bars"></i>
            </button>
            
            <div class="navbar-menu" id="menu">
                <ul class="navbar-nav">
                    <li><a href="{{ url('/') }}" onclick="closeMobileMenu()">Beranda</a></li>
                    <li><a href="{{ route('agenda.public') }}" onclick="closeMobileMenu()">Agenda</a></li>
                    <li><a href="#pengumuman" onclick="closeMobileMenu()">Pengumuman</a></li>
                    <li><a href="#profil" onclick="closeMobileMenu()">Profil Desa</a></li>
                    <li><a href="#kontak" onclick="closeMobileMenu()">Kontak</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container">
        <a href="{{ url('/') }}" class="back-link">
            <i class="fas fa-arrow-left"></i> Kembali ke Beranda
        </a>

        <div class="header">
            <h1>Agenda Kegiatan Desa</h1>
            <p>Ikuti berbagai kegiatan dan acara yang akan diselenggarakan di Desa Cibeureum</p>
        </div>

        <!-- Debug Panel -->
        <div class="debug-panel" id="debug">
            <div><strong>🐛 Debug Info:</strong></div>
            <div id="debugLog">Ready...</div>
        </div>

        <!-- Agenda Grid -->
        <div class="agenda-grid">
            @forelse($agendas as $agenda)
            <div class="agenda-card">
                <div class="agenda-date">
                    <div style="font-size: 2rem; font-weight: bold;">
                        {{ \Carbon\Carbon::parse($agenda->tanggal)->format('d') }}
                    </div>
                    <div>{{ \Carbon\Carbon::parse($agenda->tanggal)->format('M Y') }}</div>
                </div>
                
                <div class="agenda-title">{{ $agenda->judul }}</div>
                <div class="agenda-desc">{{ Str::limit($agenda->deskripsi, 100) }}</div>
                
                <div class="agenda-meta">
                    <span class="meta-badge">
                        <i class="fas fa-clock"></i> {{ \Carbon\Carbon::parse($agenda->waktu)->format('H:i') }} WIB
                    </span>
                    <span class="meta-badge">
                        <i class="fas fa-map-marker-alt"></i> {{ $agenda->tempat }}
                    </span>
                    <span class="meta-badge">
                        <i class="fas fa-tag"></i> {{ ucfirst($agenda->kategori) }}
                    </span>
                </div>

                <a href="{{ route('agenda.show', $agenda->id) }}" class="btn">
                    <i class="fas fa-eye"></i> Lihat Detail
                </a>
            </div>
            @empty
            <div class="empty-state">
                <i class="fas fa-calendar-times" style="font-size: 4rem; margin-bottom: 1rem; opacity: 0.5;"></i>
                <h3>Belum Ada Agenda</h3>
                <p>Saat ini belum ada agenda kegiatan yang akan datang.</p>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        {{ $agendas->links() }}
    </div>

    <script>
        // Debug function
        function debug(msg) {
            const log = document.getElementById('debugLog');
            const time = new Date().toLocaleTimeString();
            const logMsg = `[${time}] ${msg}`;
            if (log) {
                log.innerHTML += `<br>${logMsg}`;
            }
            console.log(logMsg);
        }

        // Global variable untuk state menu
        window.isMenuOpen = false;

        // Fungsi toggle yang dipanggil langsung dari onclick
        function toggleMobileMenu() {
            debug('�️ toggleMobileMenu called');
            
            const menu = document.getElementById('menu');
            const toggle = document.getElementById('toggle');
            
            if (!menu || !toggle) {
                debug('❌ Menu or toggle not found!');
                return;
            }
            
            window.isMenuOpen = !window.isMenuOpen;
            debug(`Menu state changed to: ${window.isMenuOpen ? 'OPEN' : 'CLOSED'}`);
            
            if (window.isMenuOpen) {
                menu.style.display = 'block';
                menu.classList.add('show');
                toggle.innerHTML = '<i class="fas fa-times"></i>';
                debug('� Menu OPENED');
            } else {
                menu.style.display = 'none';
                menu.classList.remove('show');
                toggle.innerHTML = '<i class="fas fa-bars"></i>';
                debug('� Menu CLOSED');
            }
        }

        // Fungsi untuk menutup menu saat link diklik
        function closeMobileMenu() {
            debug('� closeMobileMenu called');
            
            const menu = document.getElementById('menu');
            const toggle = document.getElementById('toggle');
            
            if (menu && toggle) {
                window.isMenuOpen = false;
                menu.style.display = 'none';
                menu.classList.remove('show');
                toggle.innerHTML = '<i class="fas fa-bars"></i>';
                debug('� Menu closed via link click');
            }
        }

        // Setup awal saat page load
        function initNavbar() {
            debug('🚀 Initializing navbar...');
            
            const menu = document.getElementById('menu');
            const toggle = document.getElementById('toggle');
            
            if (menu && toggle) {
                // Pastikan menu tertutup di mobile saat load
                if (window.innerWidth <= 768) {
                    menu.style.display = 'none';
                    menu.classList.remove('show');
                    window.isMenuOpen = false;
                    debug('� Mobile view - menu hidden');
                } else {
                    menu.style.display = 'flex';
                    menu.classList.remove('show');
                    window.isMenuOpen = false;
                    debug('🖥️ Desktop view - menu shown');
                }
                
                debug('✅ Navbar initialized successfully');
            } else {
                debug('❌ Failed to find navbar elements');
            }
        }

        // Handle resize
        function handleResize() {
            const width = window.innerWidth;
            debug(`📐 Window resized to ${width}px`);
            
            const menu = document.getElementById('menu');
            if (menu) {
                if (width > 768) {
                    menu.style.display = 'flex';
                    menu.classList.remove('show');
                    window.isMenuOpen = false;
                    const toggle = document.getElementById('toggle');
                    if (toggle) {
                        toggle.innerHTML = '<i class="fas fa-bars"></i>';
                    }
                    debug('🖥️ Switched to desktop view');
                } else if (!window.isMenuOpen) {
                    menu.style.display = 'none';
                    menu.classList.remove('show');
                    debug('📱 Switched to mobile view - menu hidden');
                }
            }
        }

        // Initialize when DOM loads
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initNavbar);
        } else {
            initNavbar();
        }

        // Handle window resize
        window.addEventListener('resize', handleResize);

        debug('🎬 Script loaded successfully');
    </script>
</body>
</html>
