<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Kegiatan - SiDesa Cibeureum</title>
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

        /* Navbar Styles */
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

        /* Container & Layout */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }

        .header {
            text-align: center;
            margin-bottom: 3rem;
            color: white;
        }

        .header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .header p {
            font-size: 1.1rem;
            opacity: 0.9;
            font-weight: 400;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: white;
            text-decoration: none;
            padding: 0.8rem 1.5rem;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50px;
            font-weight: 500;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            margin-bottom: 2rem;
        }

        .back-link:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateX(-5px);
        }

        /* Filters */
        .filter-container {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 2rem;
        }

        .filter-btn {
            padding: 0.8rem 1.5rem;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
            backdrop-filter: blur(10px);
            text-decoration: none;
            display: inline-block;
        }

        .filter-btn:hover,
        .filter-btn.active {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        /* Calendar Export Button */
        .calendar-export {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            background: #667eea;
            color: white;
            border: none;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            font-size: 1.5rem;
            cursor: pointer;
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
            transition: all 0.3s ease;
            z-index: 1000;
        }

        .calendar-export:hover {
            transform: scale(1.1);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.6);
        }

        /* Agenda Grid */
        .agenda-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .agenda-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 1.5rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .agenda-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #667eea, #764ba2);
        }

        .agenda-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .agenda-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .agenda-date-box {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 1rem;
            border-radius: 15px;
            text-align: center;
            min-width: 80px;
        }

        .agenda-date {
            font-size: 2rem;
            font-weight: 700;
            line-height: 1;
        }

        .agenda-month {
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .agenda-content h3 {
            font-size: 1.3rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 0.5rem;
            line-height: 1.3;
        }

        .agenda-content p {
            color: #666;
            margin-bottom: 1rem;
            line-height: 1.5;
        }

        .agenda-meta {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .agenda-meta span {
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .agenda-time {
            background: rgba(52, 152, 219, 0.1);
            color: #3498db;
        }

        .agenda-location {
            background: rgba(46, 204, 113, 0.1);
            color: #2ecc71;
        }

        .agenda-category {
            background: rgba(241, 196, 15, 0.1);
            color: #f1c40f;
        }

        .agenda-status {
            background: rgba(155, 89, 182, 0.1);
            color: #9b59b6;
        }

        /* Action Buttons */
        .agenda-actions {
            margin-top: 1rem;
            display: flex;
            gap: 0.5rem;
        }

        .btn {
            padding: 0.6rem 1.2rem;
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
        }

        .btn-primary {
            background: #667eea;
            color: white;
        }

        .btn-primary:hover {
            background: #5a6fd8;
            transform: translateY(-2px);
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

        /* Empty State */
        .agenda-empty {
            text-align: center;
            padding: 3rem;
            color: white;
        }

        .agenda-empty i {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        .agenda-empty h3 {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .agenda-empty p {
            opacity: 0.8;
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 2rem;
        }

        .pagination a {
            padding: 0.8rem 1rem;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            text-decoration: none;
            border-radius: 10px;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
            font-size: 0.9rem;
            min-width: 44px;
            text-align: center;
        }

        .pagination a:hover,
        .pagination .active {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 1rem 0.5rem;
            }

            .header h1 {
                font-size: 2rem;
            }

            .header p {
                font-size: 1rem;
            }

            .filter-container {
                gap: 0.5rem;
            }

            .filter-btn {
                padding: 0.6rem 1rem;
                font-size: 0.9rem;
            }

            .agenda-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .agenda-card {
                padding: 1.2rem;
            }

            .agenda-header {
                flex-direction: column;
                text-align: center;
                gap: 0.8rem;
            }

            .agenda-date-box {
                min-width: auto;
                width: 100px;
                margin: 0 auto;
            }

            .agenda-date {
                font-size: 1.8rem;
            }

            .agenda-content h3 {
                font-size: 1.1rem;
            }

            .agenda-content p {
                font-size: 0.9rem;
            }

            .agenda-meta {
                justify-content: center;
                gap: 0.5rem;
            }

            .agenda-meta span {
                font-size: 0.75rem;
                padding: 0.3rem 0.6rem;
            }

            .agenda-actions {
                flex-direction: column;
            }

            .btn {
                text-align: center;
                justify-content: center;
            }

            .calendar-export {
                bottom: 1rem;
                right: 1rem;
                width: 50px;
                height: 50px;
                font-size: 1.2rem;
            }

            .pagination {
                gap: 0.3rem;
                flex-wrap: wrap;
            }

            .pagination a {
                padding: 0.6rem 0.8rem;
                font-size: 0.8rem;
                min-width: 36px;
            }
        }

        @media (max-width: 480px) {
            .navbar-container {
                padding: 0 1rem;
            }

            .navbar-brand {
                font-size: 1rem;
            }

            .navbar-toggle {
                width: 38px;
                height: 38px;
                font-size: 1rem;
            }

            .container {
                padding: 1rem 0.3rem;
            }

            .header h1 {
                font-size: 1.8rem;
            }

            .back-link {
                padding: 0.6rem 1rem;
                font-size: 0.9rem;
            }

            .filter-btn {
                padding: 0.5rem 0.8rem;
                font-size: 0.8rem;
            }

            .agenda-card {
                padding: 1rem;
            }

            .agenda-date {
                font-size: 1.5rem;
            }

            .agenda-month {
                font-size: 0.7rem;
            }
        }

        /* Loading State */
        .loading {
            display: none;
            text-align: center;
            padding: 2rem;
            color: white;
        }

        .loading.active {
            display: block;
        }

        .spinner {
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-top: 3px solid white;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
            margin: 0 auto 1rem;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
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

    <!-- Main Content -->
    <div class="container">
        <!-- Back Link -->
        <a href="{{ url('/') }}" class="back-link">
            <i class="fas fa-arrow-left"></i>
            Kembali ke Beranda
        </a>

        <!-- Header -->
        <div class="header">
            <h1>Agenda Kegiatan Desa</h1>
            <p>Ikuti berbagai kegiatan dan acara yang akan diselenggarakan di Desa Cibeureum</p>
        </div>

        <!-- Calendar Export Button -->
        <button class="calendar-export" id="exportCalendar" title="Export ke Kalender">
            <i class="fas fa-calendar-download"></i>
        </button>

        <!-- Filter Buttons -->
        <div class="filter-container">
            <button class="filter-btn active" data-filter="all">
                <i class="fas fa-calendar"></i> Semua
            </button>
            <button class="filter-btn" data-filter="rapat">
                <i class="fas fa-users"></i> Rapat
            </button>
            <button class="filter-btn" data-filter="kegiatan">
                <i class="fas fa-tasks"></i> Kegiatan
            </button>
            <button class="filter-btn" data-filter="acara">
                <i class="fas fa-star"></i> Acara
            </button>
            <button class="filter-btn" data-filter="sosialisasi">
                <i class="fas fa-bullhorn"></i> Sosialisasi
            </button>
        </div>

        <!-- Loading State -->
        <div class="loading" id="loadingState">
            <div class="spinner"></div>
            <p>Memuat agenda...</p>
        </div>

        <!-- Agenda Grid -->
        <div class="agenda-grid" id="agendaGrid">
            @forelse($agendas as $agenda)
            <div class="agenda-card" data-kategori="{{ $agenda->kategori }}">
                <div class="agenda-header">
                    <div class="agenda-date-box">
                        <div class="agenda-date">{{ \Carbon\Carbon::parse($agenda->tanggal)->format('d') }}</div>
                        <div class="agenda-month">{{ \Carbon\Carbon::parse($agenda->tanggal)->format('M Y') }}</div>
                    </div>
                    <div class="agenda-content">
                        <h3>{{ $agenda->judul }}</h3>
                        <p>{{ Str::limit($agenda->deskripsi, 100) }}</p>
                    </div>
                </div>
                
                <div class="agenda-meta">
                    <span class="agenda-time">
                        <i class="fas fa-clock"></i>
                        {{ \Carbon\Carbon::parse($agenda->waktu)->format('H:i') }} WIB
                    </span>
                    <span class="agenda-location">
                        <i class="fas fa-map-marker-alt"></i>
                        {{ $agenda->tempat }}
                    </span>
                    <span class="agenda-category">
                        <i class="fas fa-tag"></i>
                        {{ ucfirst($agenda->kategori) }}
                    </span>
                    <span class="agenda-status">
                        <i class="fas fa-info-circle"></i>
                        {{ ucfirst($agenda->status) }}
                    </span>
                </div>

                <div class="agenda-actions">
                    <a href="{{ route('agenda.show', $agenda->id) }}" class="btn btn-primary">
                        <i class="fas fa-eye"></i>
                        Lihat Detail
                    </a>
                    <button class="btn btn-outline" onclick="addToCalendar({{ $agenda->id }}, '{{ $agenda->judul }}', '{{ $agenda->tanggal }}', '{{ $agenda->waktu }}', '{{ $agenda->tempat }}', '{{ $agenda->deskripsi }}')">
                        <i class="fas fa-calendar-plus"></i>
                        Tambah ke Kalender
                    </button>
                </div>
            </div>
            @empty
            <div class="agenda-empty">
                <i class="fas fa-calendar-times"></i>
                <h3>Belum Ada Agenda</h3>
                <p>Saat ini belum ada agenda kegiatan yang akan datang.</p>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        {{ $agendas->links() }}
    </div>

    <script>
        // Navbar Toggle Functionality
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

        // Filter Functionality
        function initializeFilters() {
            const filterBtns = document.querySelectorAll('.filter-btn');
            const agendaCards = document.querySelectorAll('.agenda-card');
            const loadingState = document.getElementById('loadingState');

            filterBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    // Show loading
                    loadingState.classList.add('active');
                    
                    // Update active filter
                    filterBtns.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');

                    const filter = this.dataset.filter;
                    console.log(`🔍 Filtering by: ${filter}`);

                    // Simulate loading delay for better UX
                    setTimeout(() => {
                        agendaCards.forEach(card => {
                            if (filter === 'all' || card.dataset.kategori === filter) {
                                card.style.display = 'block';
                                card.style.animation = 'fadeIn 0.3s ease';
                            } else {
                                card.style.display = 'none';
                            }
                        });
                        
                        loadingState.classList.remove('active');
                    }, 300);
                });
            });
        }

        // Calendar Export Functions
        function addToCalendar(id, title, date, time, location, description) {
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
UID:${id}-${Date.now()}@sidesa-cibeureum.com
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

        function exportAllCalendar() {
            const agendaCards = document.querySelectorAll('.agenda-card[style="display: block"], .agenda-card:not([style*="display: none"])');
            
            if (agendaCards.length === 0) {
                alert('Tidak ada agenda untuk diekspor!');
                return;
            }

            let icsContent = `BEGIN:VCALENDAR
VERSION:2.0
PRODID:-//SiDesa Cibeureum//Agenda//EN
CALSCALE:GREGORIAN
METHOD:PUBLISH
X-WR-CALNAME:Agenda Desa Cibeureum
X-WR-TIMEZONE:Asia/Jakarta
X-WR-CALDESC:Agenda kegiatan Desa Cibeureum
`;

            agendaCards.forEach((card, index) => {
                const title = card.querySelector('.agenda-content h3').textContent;
                const description = card.querySelector('.agenda-content p').textContent;
                const dateText = card.querySelector('.agenda-date').textContent;
                const monthYearText = card.querySelector('.agenda-month').textContent;
                const timeText = card.querySelector('.agenda-time').textContent.replace('WIB', '').trim();
                const location = card.querySelector('.agenda-location').textContent.trim();
                
                // Parse date
                const [month, year] = monthYearText.split(' ');
                const monthNum = new Date(`${month} 1, 2000`).getMonth() + 1;
                const fullDate = `${year}-${monthNum.toString().padStart(2, '0')}-${dateText.padStart(2, '0')}`;
                
                const startDate = new Date(`${fullDate}T${timeText}`);
                const endDate = new Date(startDate.getTime() + (2 * 60 * 60 * 1000));

                icsContent += `BEGIN:VEVENT
UID:agenda-${index}-${Date.now()}@sidesa-cibeureum.com
DTSTAMP:${new Date().toISOString().replace(/[-:]/g, '').split('.')[0]}Z
DTSTART:${startDate.toISOString().replace(/[-:]/g, '').split('.')[0]}Z
DTEND:${endDate.toISOString().replace(/[-:]/g, '').split('.')[0]}Z
SUMMARY:${title}
DESCRIPTION:${description}
LOCATION:${location}
END:VEVENT
`;
            });

            icsContent += 'END:VCALENDAR';

            const blob = new Blob([icsContent], { type: 'text/calendar' });
            const url = window.URL.createObjectURL(blob);
            const link = document.createElement('a');
            link.href = url;
            link.download = 'agenda-desa-cibeureum.ics';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            window.URL.revokeObjectURL(url);

            console.log('📅 All calendar events exported');
        }

        // Initialize everything when DOM is ready
        document.addEventListener('DOMContentLoaded', function() {
            console.log('🎯 DOM Content Loaded - Initializing app...');
            
            // Initialize navbar
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', initializeNavbar);
            } else {
                initializeNavbar();
            }

            // Initialize filters
            initializeFilters();

            // Calendar export button
            const exportBtn = document.getElementById('exportCalendar');
            if (exportBtn) {
                exportBtn.addEventListener('click', exportAllCalendar);
            }

            console.log('✅ App initialized successfully!');
        });

        // Fallback initialization
        window.addEventListener('load', initializeNavbar);
        setTimeout(initializeNavbar, 1000);

        // Add CSS animation keyframes
        const style = document.createElement('style');
        style.textContent = `
            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(20px); }
                to { opacity: 1; transform: translateY(0); }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>
