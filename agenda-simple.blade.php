<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            background: rgba(255, 255, 255, 0.2);
            border: 2px solid white;
            color: white;
            padding: 8px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            width: 40px;
            height: 40px;
            text-align: center;
            line-height: 1;
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
            
            <button class="navbar-toggle" id="toggle">
                <i class="fas fa-bars"></i>
            </button>
            
            <div class="navbar-menu" id="menu">
                <ul class="navbar-nav">
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li><a href="{{ route('agenda.public') }}">Agenda</a></li>
                    <li><a href="#pengumuman">Pengumuman</a></li>
                    <li><a href="#profil">Profil Desa</a></li>
                    <li><a href="#kontak">Kontak</a></li>
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
        // Simple debug function
        function debug(msg) {
            const log = document.getElementById('debugLog');
            const time = new Date().toLocaleTimeString();
            log.innerHTML += `<br>[${time}] ${msg}`;
            console.log(`[${time}] ${msg}`);
        }

        // Ultra simple navbar toggle
        function setupNavbar() {
            debug('🚀 Setting up navbar...');
            
            const toggle = document.getElementById('toggle');
            const menu = document.getElementById('menu');
            
            if (!toggle || !menu) {
                debug('❌ Elements not found!');
                return;
            }
            
            debug('✅ Elements found');
            
            // Click handler
            toggle.onclick = function(e) {
                e.preventDefault();
                debug('🖱️ Toggle clicked!');
                
                if (menu.classList.contains('show')) {
                    menu.classList.remove('show');
                    toggle.innerHTML = '<i class="fas fa-bars"></i>';
                    debug('📴 Menu closed');
                } else {
                    menu.classList.add('show');
                    toggle.innerHTML = '<i class="fas fa-times"></i>';
                    debug('📱 Menu opened');
                }
            };
            
            // Close menu when clicking nav links
            const links = menu.querySelectorAll('a');
            links.forEach(link => {
                link.onclick = function() {
                    menu.classList.remove('show');
                    toggle.innerHTML = '<i class="fas fa-bars"></i>';
                    debug('🔗 Menu closed via link');
                };
            });
            
            // Close menu when clicking outside
            document.onclick = function(e) {
                if (!toggle.contains(e.target) && !menu.contains(e.target)) {
                    if (menu.classList.contains('show')) {
                        menu.classList.remove('show');
                        toggle.innerHTML = '<i class="fas fa-bars"></i>';
                        debug('🌐 Menu closed via outside click');
                    }
                }
            };
            
            debug('✅ Navbar setup complete!');
        }

        // Initialize
        debug('📄 DOM loading...');
        
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', setupNavbar);
        } else {
            setupNavbar();
        }
        
        // Window resize handler
        window.onresize = function() {
            const width = window.innerWidth;
            debug(`📐 Resized to ${width}px`);
            
            if (width > 768) {
                const menu = document.getElementById('menu');
                if (menu && menu.classList.contains('show')) {
                    menu.classList.remove('show');
                    document.getElementById('toggle').innerHTML = '<i class="fas fa-bars"></i>';
                    debug('🖥️ Auto-closed for desktop');
                }
            }
        };
        
        debug('🎬 Script ready!');
    </script>
</body>
</html>
