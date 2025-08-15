<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Kegiatan - SiDesa Cibeureum</title>
    <meta name="description"
        content="Agenda kegiatan, rapat, dan acara penting Desa Cibeureum. Jadwal lengkap kegiatan desa untuk masyarakat.">
    <meta name="keywords" content="agenda desa, kegiatan desa, rapat, acara, Cibeureum, jadwal">

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: '#10b981',
                        secondary: '#059669',
                        accent: '#34d399',
                        village: {
                            primary: '#10b981',
                            secondary: '#34d399',
                            accent: '#a7f3d0',
                            dark: '#064e3b',
                            light: '#ecfdf5'
                        },
                        dark: {
                            100: '#0f172a',
                            200: '#1e293b',
                            300: '#334155',
                            400: '#475569'
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'system-ui', '-apple-system', 'sans-serif'],
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.8s ease-out',
                        'slide-up': 'slideUp 0.6s ease-out',
                        'slide-down': 'slideDown 0.3s ease-out',
                        'bounce-slow': 'bounce 2s infinite',
                        'pulse-slow': 'pulse 3s infinite',
                        'float': 'float 6s ease-in-out infinite'
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        },
                        slideUp: {
                            '0%': { opacity: '0', transform: 'translateY(30px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        },
                        slideDown: {
                            '0%': { opacity: '0', transform: 'translateY(-20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-10px)' }
                        }
                    },
                    backdropBlur: {
                        'xs': '2px',
                    }
                }
            }
        }
    </script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');

        /* Glass morphism effects */
        .glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .glass-dark {
            background: rgba(15, 23, 42, 0.7);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Custom gradient text */
        .gradient-text {
            background: linear-gradient(135deg, #10b981, #34d399, #059669);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .gradient-text-fallback {
            color: #10b981;
        }

        /* Navbar styles */
        #navbar {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        #navbar.navbar-scrolled {
            backdrop-filter: blur(20px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        .navbar-scrolled {
            background: rgba(255, 255, 255, 0.98) !important;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .dark .navbar-scrolled {
            background: rgba(15, 23, 42, 0.98) !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }

        /* Ensure proper text contrast */
        .nav-link {
            transition: all 0.3s ease;
        }

        /* Mobile navbar background */
        #nav-mobile {
            backdrop-filter: blur(16px);
        }

        /* Header text improvements */
        .hero-text {
            text-shadow: 0 4px 8px rgba(0, 0, 0, 0.3), 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .hero-subtitle {
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        /* Smooth scroll */
        html {
            scroll-behavior: smooth;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #10b981, #34d399);
            border-radius: 4px;
        }

        .dark ::-webkit-scrollbar-track {
            background: #1e293b;
        }

        /* Animations */
        .animate-slideUp {
            animation: slideUp 0.6s ease-out forwards;
        }

        .animate-fadeIn {
            animation: fadeIn 0.8s ease-out forwards;
        }

        /* Hover effects */
        .hover-glow:hover {
            box-shadow: 0 10px 25px rgba(16, 185, 129, 0.2);
            transform: translateY(-2px);
        }

        /* Agenda specific styles */
        .agenda-card {
            transition: all 0.3s ease;
        }

        .agenda-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .filter-tab.active {
            background: linear-gradient(135deg, #10b981, #34d399);
        }
    </style>
</head>
<body class="font-sans overflow-x-hidden dark:bg-dark-100 dark:text-gray-200 transition-colors duration-300">
    <!-- Navigation -->
    <nav id="navbar" class="fixed top-0 w-full z-50 bg-white/95 dark:bg-gray-900/95 backdrop-blur-md shadow-lg border-b border-gray-200/50 dark:border-gray-700/50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <!-- Logo -->
                <a href="{{ route('welcome') }}"
                    class="flex items-center text-2xl font-bold text-gray-900 dark:text-white hover:scale-105 transition-transform duration-300 no-underline">
                    <div class="relative">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo SiDesa"
                            class="h-12 w-auto mr-3 drop-shadow-lg">
                    </div>
                    <span class="logo-text bg-gradient-to-r from-village-primary to-village-secondary bg-clip-text text-transparent font-black tracking-tight drop-shadow-lg">
                        SiDesa
                    </span>
                </a>

                <!-- Desktop Navigation -->
                <ul class="hidden lg:flex items-center space-x-2">
                    <li>
                        <a href="{{ route('welcome') }}"
                            class="nav-link text-gray-700 dark:text-gray-300 hover:text-village-primary dark:hover:text-village-secondary hover:bg-gray-100 dark:hover:bg-gray-800 px-6 py-3 rounded-full transition-all duration-300 font-medium">
                            <i class="fas fa-home mr-2"></i>Beranda
                        </a>
                    </li>
                    <li>
                        <a href="/tentang"
                            class="nav-link text-gray-700 dark:text-gray-300 hover:text-village-primary dark:hover:text-village-secondary hover:bg-gray-100 dark:hover:bg-gray-800 px-6 py-3 rounded-full transition-all duration-300 font-medium">
                            <i class="fas fa-info-circle mr-2"></i>Tentang
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('public.berita') }}"
                            class="nav-link text-gray-700 dark:text-gray-300 hover:text-village-primary dark:hover:text-village-secondary hover:bg-gray-100 dark:hover:bg-gray-800 px-6 py-3 rounded-full transition-all duration-300 font-medium">
                            <i class="fas fa-newspaper mr-2"></i>Berita
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('agenda.public') }}"
                            class="nav-link text-white bg-village-primary hover:bg-village-secondary px-6 py-3 rounded-full transition-all duration-300 font-medium">
                            <i class="fas fa-calendar mr-2"></i>Agenda
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('public.kontak') }}"
                            class="nav-link text-gray-700 dark:text-gray-300 hover:text-village-primary dark:hover:text-village-secondary hover:bg-gray-100 dark:hover:bg-gray-800 px-6 py-3 rounded-full transition-all duration-300 font-medium">
                            <i class="fas fa-phone mr-2"></i>Kontak
                        </a>
                    </li>
                </ul>

                <!-- Desktop Buttons -->
                <div class="hidden lg:flex items-center space-x-3">
                    <a href="{{ route('login') }}"
                        class="px-6 py-3 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary dark:hover:text-village-secondary rounded-full transition-all duration-300 font-semibold flex items-center space-x-2">
                        <i class="fas fa-sign-in-alt"></i>
                        <span>Masuk</span>
                    </a>
                    <a href="{{ route('register') }}"
                        class="px-6 py-3 bg-gradient-to-r from-village-primary to-village-secondary text-white hover:scale-105 rounded-full transition-all duration-300 font-semibold flex items-center space-x-2 shadow-md">
                        <i class="fas fa-user-plus"></i>
                        <span>Daftar</span>
                    </a>
                    <button onclick="toggleTheme()"
                        class="px-4 py-3 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary dark:hover:text-village-secondary rounded-full transition-all duration-300 flex items-center space-x-2 ml-3">
                        <i class="fas fa-moon" id="theme-icon"></i>
                        <span id="theme-text" class="text-sm font-medium">Dark</span>
                    </button>
                </div>

                <!-- Mobile Menu Button -->
                <button type="button" id="mobile-menu-toggle" 
                    class="lg:hidden border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 p-3 rounded-full text-xl focus:outline-none transition-all duration-300">
                    <i class="fas fa-bars" id="menu-icon"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div id="nav-mobile"
            class="lg:hidden fixed top-full left-0 right-0 bg-white/95 dark:bg-gray-900/95 backdrop-blur-md border-t border-gray-200 dark:border-gray-700 shadow-xl max-h-screen overflow-y-auto z-40 transform translate-y-full opacity-0 invisible transition-all duration-300 ease-in-out">
            <div class="py-6">
                <ul class="space-y-2 px-4">
                    <li>
                        <a href="{{ route('welcome') }}"
                            class="block px-6 py-4 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary dark:hover:text-village-secondary border border-gray-200 dark:border-gray-600 hover:border-village-primary dark:hover:border-village-secondary rounded-xl transition-all duration-300 font-medium">
                            <i class="fas fa-home mr-3"></i>Beranda
                        </a>
                    </li>
                    <li>
                        <a href="/tentang"
                            class="block px-6 py-4 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary dark:hover:text-village-secondary border border-gray-200 dark:border-gray-600 hover:border-village-primary dark:hover:border-village-secondary rounded-xl transition-all duration-300 font-medium">
                            <i class="fas fa-info-circle mr-3"></i>Tentang
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('public.berita') }}"
                            class="block px-6 py-4 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary dark:hover:text-village-secondary border border-gray-200 dark:border-gray-600 hover:border-village-primary dark:hover:border-village-secondary rounded-xl transition-all duration-300 font-medium">
                            <i class="fas fa-newspaper mr-3"></i>Berita
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('agenda.public') }}"
                            class="block px-6 py-4 text-white bg-village-primary border border-village-primary rounded-xl transition-all duration-300 font-medium">
                            <i class="fas fa-calendar mr-3"></i>Agenda
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('public.kontak') }}"
                            class="block px-6 py-4 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary dark:hover:text-village-secondary border border-gray-200 dark:border-gray-600 hover:border-village-primary dark:hover:border-village-secondary rounded-xl transition-all duration-300 font-medium">
                            <i class="fas fa-phone mr-3"></i>Kontak
                        </a>
                    </li>
                </ul>
                <div class="px-4 mt-6 space-y-3">
                    <a href="{{ route('login') }}"
                        class="block w-full px-6 py-3 text-center border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary dark:hover:text-village-secondary rounded-full transition-all duration-300 font-semibold">
                        <i class="fas fa-sign-in-alt mr-2"></i>Masuk
                    </a>
                    <a href="{{ route('register') }}"
                        class="block w-full px-6 py-3 text-center bg-gradient-to-r from-village-primary to-village-secondary text-white rounded-full transition-all duration-300 font-semibold shadow-md">
                        <i class="fas fa-user-plus mr-2"></i>Daftar
                    </a>
                    <button onclick="toggleTheme()"
                        class="block w-full px-6 py-3 text-center border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary dark:hover:text-village-secondary rounded-full transition-all duration-300 font-semibold">
                        <i class="fas fa-moon mr-2" id="theme-icon-mobile"></i>
                        <span id="theme-text-mobile">Mode Gelap</span>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Header -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden pt-20">
        <div class="absolute inset-0 bg-gradient-to-br from-village-primary via-village-secondary to-village-accent"></div>
        <div class="absolute inset-0 bg-black/40 backdrop-blur-[1px]"></div>
        <div class="absolute inset-0 bg-[url('{{ asset('images/cibeureum.jpg') }}')] bg-cover bg-center opacity-20"></div>
        
        <div class="relative z-10 text-center text-white px-4 max-w-4xl mx-auto">
            <div class="animate-fadeIn">
                <h1 class="text-5xl md:text-6xl lg:text-7xl font-black mb-8 leading-tight hero-text">
                    <span class="block">Agenda</span>
                    <span class="block gradient-text">Kegiatan</span>
                </h1>
            </div>
            <div class="animate-slideUp" style="animation-delay: 0.3s;">
                <p class="text-xl md:text-2xl mb-8 opacity-95 max-w-3xl mx-auto leading-relaxed hero-subtitle">
                    Jadwal lengkap kegiatan, rapat, dan acara penting Desa Cibeureum untuk masyarakat
                </p>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-20 bg-gradient-to-br from-gray-50 to-white dark:from-dark-100 dark:to-dark-200 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4">
            <!-- Filter Section -->
            <div class="bg-white dark:bg-dark-300 p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 mb-8">
                <div class="text-center mb-6">
                    <div class="inline-block px-6 py-2 bg-village-primary/10 text-village-primary rounded-full text-sm font-semibold mb-4">
                        🔍 FILTER AGENDA
                    </div>
                    <h3 class="text-2xl font-black text-gray-900 dark:text-white">
                        Pilih <span class="gradient-text">Kategori</span>
                    </h3>
                </div>
                <div class="flex flex-wrap justify-center gap-2 sm:gap-3">
                    <button class="filter-tab px-3 sm:px-6 py-2 sm:py-3 text-xs sm:text-sm border-2 border-village-primary/20 rounded-full bg-gradient-to-r from-village-primary to-village-secondary text-white font-semibold transition-all duration-300 hover:scale-105 active" onclick="filterAgenda('all')">
                        Semua
                    </button>
                    <button class="filter-tab px-3 sm:px-6 py-2 sm:py-3 text-xs sm:text-sm border-2 border-gray-200 dark:border-gray-600 rounded-full bg-white dark:bg-dark-400 text-gray-700 dark:text-gray-300 font-semibold transition-all duration-300 hover:scale-105" onclick="filterAgenda('rapat')">
                        Rapat
                    </button>
                    <button class="filter-tab px-3 sm:px-6 py-2 sm:py-3 text-xs sm:text-sm border-2 border-gray-200 dark:border-gray-600 rounded-full bg-white dark:bg-dark-400 text-gray-700 dark:text-gray-300 font-semibold transition-all duration-300 hover:scale-105" onclick="filterAgenda('acara')">
                        Acara
                    </button>
                    <button class="filter-tab px-3 sm:px-6 py-2 sm:py-3 text-xs sm:text-sm border-2 border-gray-200 dark:border-gray-600 rounded-full bg-white dark:bg-dark-400 text-gray-700 dark:text-gray-300 font-semibold transition-all duration-300 hover:scale-105" onclick="filterAgenda('kegiatan')">
                        Kegiatan
                    </button>
                    <button class="filter-tab px-3 sm:px-6 py-2 sm:py-3 text-xs sm:text-sm border-2 border-gray-200 dark:border-gray-600 rounded-full bg-white dark:bg-dark-400 text-gray-700 dark:text-gray-300 font-semibold transition-all duration-300 hover:scale-105" onclick="filterAgenda('musyawarah')">
                        Musyawarah
                    </button>
                    <button class="filter-tab px-3 sm:px-6 py-2 sm:py-3 text-xs sm:text-sm border-2 border-gray-200 dark:border-gray-600 rounded-full bg-white dark:bg-dark-400 text-gray-700 dark:text-gray-300 font-semibold transition-all duration-300 hover:scale-105" onclick="filterAgenda('pelatihan')">
                        Pelatihan
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 xl:grid-cols-3 gap-6 lg:gap-8">
                <!-- Agenda Grid -->
                <div class="xl:col-span-2">
                    <div class="space-y-4 lg:space-y-6">
                        @forelse($agendas as $agenda)
                            <div class="agenda-card bg-white dark:bg-dark-300 rounded-xl lg:rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-4 lg:p-6 border-l-4 border-village-primary" data-category="{{ $agenda->kategori }}">
                                <div class="flex flex-col sm:flex-row gap-4 lg:gap-6">
                                    <div class="flex-shrink-0 self-center sm:self-start">
                                        <div class="bg-gradient-to-br from-village-primary to-village-secondary text-white p-3 lg:p-4 rounded-xl text-center min-w-[80px] lg:min-w-[100px]">
                                            <span class="block text-lg lg:text-2xl font-bold">{{ $agenda->tanggal_mulai->format('d') }}</span>
                                            <span class="text-xs lg:text-sm opacity-90">{{ $agenda->tanggal_mulai->format('M Y') }}</span>
                                        </div>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div class="flex flex-col lg:flex-row lg:justify-between lg:items-start gap-2 lg:gap-4 mb-3 lg:mb-4">
                                            <h3 class="text-lg lg:text-xl font-bold text-gray-900 dark:text-white leading-tight">{{ $agenda->judul }}</h3>
                                            <span class="inline-block px-2 lg:px-3 py-1 rounded-full text-xs font-semibold text-white self-start
                                                @if($agenda->kategori == 'rapat') bg-red-500
                                                @elseif($agenda->kategori == 'acara') bg-orange-500
                                                @elseif($agenda->kategori == 'kegiatan') bg-green-500
                                                @elseif($agenda->kategori == 'musyawarah') bg-purple-500
                                                @elseif($agenda->kategori == 'pelatihan') bg-gray-600
                                                @else bg-village-primary
                                                @endif">
                                                {{ ucfirst($agenda->kategori) }}
                                            </span>
                                        </div>
                                        <p class="text-gray-600 dark:text-gray-300 mb-3 lg:mb-4 leading-relaxed text-sm lg:text-base">
                                            {{ Str::limit($agenda->deskripsi, 120) }}
                                        </p>
                                        <div class="flex flex-col sm:flex-row sm:flex-wrap gap-2 lg:gap-4 text-xs lg:text-sm text-gray-500 dark:text-gray-400">
                                            <div class="flex items-center gap-2">
                                                <i class="fas fa-clock text-village-primary"></i>
                                                <span>{{ $agenda->tanggal_mulai->format('H:i') }} - {{ $agenda->tanggal_selesai->format('H:i') }} WIB</span>
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <i class="fas fa-map-marker-alt text-village-primary"></i>
                                                <span class="truncate">{{ $agenda->lokasi }}</span>
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <i class="fas fa-calendar text-village-primary"></i>
                                                <span>{{ $agenda->tanggal_mulai->format('d M Y') }}</span>
                                            </div>
                                        </div>
                                        <div class="flex justify-between items-center mt-4 pt-4 border-t border-gray-200 dark:border-gray-600">
                                            <div class="flex items-center gap-2">
                                                @if($agenda->tanggal_mulai->isFuture())
                                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300">
                                                        <i class="fas fa-clock mr-1"></i>
                                                        Akan Datang
                                                    </span>
                                                @elseif($agenda->tanggal_mulai->isToday())
                                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300">
                                                        <i class="fas fa-play mr-1"></i>
                                                        Hari Ini
                                                    </span>
                                                @else
                                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">
                                                        <i class="fas fa-check mr-1"></i>
                                                        Selesai
                                                    </span>
                                                @endif
                                            </div>
                                            <a href="{{ route('agenda.show', $agenda->id) }}" 
                                               class="inline-flex items-center px-3 py-2 bg-gradient-to-r from-village-primary to-village-secondary text-white font-medium text-sm rounded-lg hover:from-village-secondary hover:to-village-primary hover:scale-105 transition-all duration-300 shadow-md hover:shadow-lg">
                                                <i class="fas fa-eye mr-2"></i>
                                                Lihat Detail
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-12 lg:py-16">
                                <div class="bg-white dark:bg-dark-300 rounded-xl lg:rounded-2xl shadow-lg p-8 lg:p-12">
                                    <div class="text-4xl lg:text-6xl text-gray-300 dark:text-gray-600 mb-4">
                                        <i class="fas fa-calendar-times"></i>
                                    </div>
                                    <h3 class="text-xl lg:text-2xl font-bold text-gray-600 dark:text-gray-400 mb-2">Belum Ada Agenda</h3>
                                    <p class="text-sm lg:text-base text-gray-500 dark:text-gray-500">Saat ini belum ada agenda kegiatan yang terjadwal. Silakan periksa kembali nanti.</p>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Sidebar -->
                <aside class="xl:space-y-4 xl:space-y-6">
                    <!-- Mobile: Horizontal scroll container -->
                    <div class="xl:hidden sidebar-scroll space-x-4">
                        <!-- Quick Stats Widget -->
                        <div class="bg-white dark:bg-dark-300 rounded-xl shadow-lg p-4 flex-shrink-0">
                            <div class="text-center mb-4">
                                <div class="inline-block px-3 py-2 bg-village-primary/10 text-village-primary rounded-full text-xs font-semibold mb-3">
                                    📊 STATISTIK
                                </div>
                                <h3 class="text-lg font-bold text-gray-900 dark:text-white">Statistik Agenda</h3>
                            </div>
                            <div class="grid grid-cols-2 gap-3">
                                <div class="text-center p-3 bg-gray-50 dark:bg-dark-400 rounded-lg">
                                    <div class="text-xl font-bold text-village-primary">{{ $agendas->count() }}</div>
                                    <div class="text-xs text-gray-600 dark:text-gray-400">Total</div>
                                </div>
                                <div class="text-center p-3 bg-gray-50 dark:bg-dark-400 rounded-lg">
                                    <div class="text-xl font-bold text-red-500">{{ $agendas->where('kategori', 'rapat')->count() }}</div>
                                    <div class="text-xs text-gray-600 dark:text-gray-400">Rapat</div>
                                </div>
                                <div class="text-center p-3 bg-gray-50 dark:bg-dark-400 rounded-lg">
                                    <div class="text-xl font-bold text-orange-500">{{ $agendas->where('kategori', 'acara')->count() }}</div>
                                    <div class="text-xs text-gray-600 dark:text-gray-400">Acara</div>
                                </div>
                                <div class="text-center p-3 bg-gray-50 dark:bg-dark-400 rounded-lg">
                                    <div class="text-xl font-bold text-green-500">{{ $agendas->where('kategori', 'kegiatan')->count() }}</div>
                                    <div class="text-xs text-gray-600 dark:text-gray-400">Kegiatan</div>
                                </div>
                            </div>
                        </div>

                        <!-- Upcoming Events Widget -->
                        <div class="bg-white dark:bg-dark-300 rounded-xl shadow-lg p-4 flex-shrink-0">
                            <div class="text-center mb-4">
                                <div class="inline-block px-3 py-2 bg-village-primary/10 text-village-primary rounded-full text-xs font-semibold mb-3">
                                    🎯 MENDATANG
                                </div>
                                <h3 class="text-lg font-bold text-gray-900 dark:text-white">Agenda Mendatang</h3>
                            </div>
                            <div class="space-y-3">
                                @foreach ($agendas->take(3) as $upcoming)
                                    <div class="p-3 bg-gray-50 dark:bg-dark-400 rounded-lg border-l-3 border-village-primary">
                                        <div class="text-xs text-village-primary font-semibold mb-1">{{ $upcoming->tanggal_mulai->format('d M Y') }}</div>
                                        <div class="text-sm font-medium text-gray-900 dark:text-white line-clamp-2">{{ $upcoming->judul }}</div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Contact Info Widget -->
                        <div class="bg-white dark:bg-dark-300 rounded-xl shadow-lg p-4 flex-shrink-0">
                            <div class="text-center mb-4">
                                <div class="inline-block px-3 py-2 bg-village-primary/10 text-village-primary rounded-full text-xs font-semibold mb-3">
                                    📞 KONTAK
                                </div>
                                <h3 class="text-lg font-bold text-gray-900 dark:text-white">Kontak</h3>
                            </div>
                            <div class="space-y-3">
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-envelope text-village-primary flex-shrink-0"></i>
                                    <span class="text-xs text-gray-600 dark:text-gray-400 break-all">agenda@cibeureum.id</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-phone text-village-primary flex-shrink-0"></i>
                                    <span class="text-xs text-gray-600 dark:text-gray-400">+62 812-3456-7890</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Desktop: Vertical stack -->
                    <div class="hidden xl:block space-y-6">
                        <!-- Calendar Widget -->
                        <div class="bg-white dark:bg-dark-300 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6">
                            <div class="text-center mb-6">
                                <div class="inline-block px-4 py-2 bg-village-primary/10 text-village-primary rounded-full text-sm font-semibold mb-3">
                                    📅 KALENDER
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white">Juli 2025</h3>
                            </div>
                            <div class="flex justify-between items-center mb-4">
                                <button onclick="previousMonth()" class="p-2 hover:bg-gray-100 dark:hover:bg-dark-400 rounded-lg transition-colors">
                                    <i class="fas fa-chevron-left text-village-primary"></i>
                                </button>
                                <button onclick="nextMonth()" class="p-2 hover:bg-gray-100 dark:hover:bg-dark-400 rounded-lg transition-colors">
                                    <i class="fas fa-chevron-right text-village-primary"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Upcoming Events Widget -->
                        <div class="bg-white dark:bg-dark-300 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6">
                            <div class="text-center mb-6">
                                <div class="inline-block px-4 py-2 bg-village-primary/10 text-village-primary rounded-full text-sm font-semibold mb-3">
                                    🎯 MENDATANG
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white">Agenda Mendatang</h3>
                            </div>
                            <div class="space-y-3">
                                @foreach ($agendas->take(4) as $upcoming)
                                    <div class="p-3 bg-gray-50 dark:bg-dark-400 rounded-lg border-l-3 border-village-primary">
                                        <div class="text-xs text-village-primary font-semibold mb-1">{{ $upcoming->tanggal_mulai->format('d M Y') }}</div>
                                        <div class="text-sm font-medium text-gray-900 dark:text-white line-clamp-2">{{ $upcoming->judul }}</div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Quick Stats Widget -->
                        <div class="bg-white dark:bg-dark-300 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6">
                            <div class="text-center mb-6">
                                <div class="inline-block px-4 py-2 bg-village-primary/10 text-village-primary rounded-full text-sm font-semibold mb-3">
                                    📊 STATISTIK
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white">Statistik Agenda</h3>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="text-center p-3 bg-gray-50 dark:bg-dark-400 rounded-lg">
                                    <div class="text-2xl font-bold text-village-primary">{{ $agendas->count() }}</div>
                                    <div class="text-xs text-gray-600 dark:text-gray-400">Total Agenda</div>
                                </div>
                                <div class="text-center p-3 bg-gray-50 dark:bg-dark-400 rounded-lg">
                                    <div class="text-2xl font-bold text-red-500">{{ $agendas->where('kategori', 'rapat')->count() }}</div>
                                    <div class="text-xs text-gray-600 dark:text-gray-400">Rapat</div>
                                </div>
                                <div class="text-center p-3 bg-gray-50 dark:bg-dark-400 rounded-lg">
                                    <div class="text-2xl font-bold text-orange-500">{{ $agendas->where('kategori', 'acara')->count() }}</div>
                                    <div class="text-xs text-gray-600 dark:text-gray-400">Acara</div>
                                </div>
                                <div class="text-center p-3 bg-gray-50 dark:bg-dark-400 rounded-lg">
                                    <div class="text-2xl font-bold text-green-500">{{ $agendas->where('kategori', 'kegiatan')->count() }}</div>
                                    <div class="text-xs text-gray-600 dark:text-gray-400">Kegiatan</div>
                                </div>
                            </div>
                        </div>

                        <!-- Contact Info Widget -->
                        <div class="bg-white dark:bg-dark-300 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6">
                            <div class="text-center mb-6">
                                <div class="inline-block px-4 py-2 bg-village-primary/10 text-village-primary rounded-full text-sm font-semibold mb-3">
                                    📞 KONTAK
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white">Informasi Kontak</h3>
                            </div>
                            <div class="space-y-3">
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-envelope text-village-primary flex-shrink-0"></i>
                                    <span class="text-sm text-gray-600 dark:text-gray-400 break-all">agenda@cibeureum.id</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-phone text-village-primary flex-shrink-0"></i>
                                    <span class="text-sm text-gray-600 dark:text-gray-400">+62 812-3456-7890</span>
                                </div>
                                <div class="flex items-start gap-3">
                                    <i class="fas fa-info-circle text-village-primary mt-0.5 flex-shrink-0"></i>
                                    <span class="text-sm text-gray-600 dark:text-gray-400">Untuk info lebih lanjut hubungi operator desa</span>
                                </div>
                            </div>
                        </div>

                        <!-- Download Widget -->
                        <div class="bg-white dark:bg-dark-300 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6">
                            <div class="text-center mb-6">
                                <div class="inline-block px-4 py-2 bg-village-primary/10 text-village-primary rounded-full text-sm font-semibold mb-3">
                                    💾 DOWNLOAD
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white">Download Kalender</h3>
                            </div>
                            <div class="space-y-3">
                                <a href="#" class="block w-full bg-gradient-to-r from-village-primary to-village-secondary text-white font-semibold py-3 px-4 rounded-lg hover:from-village-secondary hover:to-village-primary transition-all duration-300 text-center">
                                    <i class="fas fa-download mr-2"></i>
                                    Download PDF
                                </a>
                                <a href="#" class="block w-full border-2 border-village-primary text-village-primary font-semibold py-3 px-4 rounded-lg hover:bg-village-primary hover:text-white transition-all duration-300 text-center">
                                    <i class="fas fa-calendar-plus mr-2"></i>
                                    Tambah ke Kalender
                                </a>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    <script>
        console.log('=== Agenda Page Script Starting ===');

        // Global variables
        let mobileMenuOpen = false;

        // Simple and reliable mobile menu toggle
        function toggleMobileMenu() {
            console.log('toggleMobileMenu called, current state:', mobileMenuOpen);
            
            const mobileNav = document.getElementById('nav-mobile');
            const menuIcon = document.getElementById('menu-icon');
            
            console.log('Mobile nav element:', mobileNav);
            console.log('Menu icon element:', menuIcon);
            
            if (!mobileNav || !menuIcon) {
                console.error('Required elements not found!');
                return;
            }

            if (mobileMenuOpen) {
                // Close menu
                mobileNav.style.transform = 'translateY(100%)';
                mobileNav.style.opacity = '0';
                mobileNav.style.visibility = 'hidden';
                menuIcon.className = 'fas fa-bars';
                mobileMenuOpen = false;
                console.log('Menu closed');
            } else {
                // Open menu
                mobileNav.style.transform = 'translateY(0)';
                mobileNav.style.opacity = '1';
                mobileNav.style.visibility = 'visible';
                menuIcon.className = 'fas fa-times';
                mobileMenuOpen = true;
                console.log('Menu opened');
            }
        }

        // Initialize everything when DOM is ready
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM Content Loaded');

            // Mobile menu button event
            const mobileMenuButton = document.getElementById('mobile-menu-toggle');
            console.log('Mobile menu button found:', mobileMenuButton);

            if (mobileMenuButton) {
                mobileMenuButton.addEventListener('click', function(e) {
                    console.log('Mobile menu button clicked');
                    e.preventDefault();
                    e.stopPropagation();
                    toggleMobileMenu();
                });
                console.log('Click event listener added to mobile menu button');
            } else {
                console.error('Mobile menu button not found!');
            }

            // Close menu when clicking menu links
            const mobileMenuLinks = document.querySelectorAll('#nav-mobile a');
            console.log('Found mobile menu links:', mobileMenuLinks.length);
            
            mobileMenuLinks.forEach(function(link, index) {
                link.addEventListener('click', function() {
                    console.log('Mobile menu link', index, 'clicked');
                    if (mobileMenuOpen) {
                        setTimeout(function() {
                            toggleMobileMenu();
                        }, 100);
                    }
                });
            });

            // Close menu when clicking outside
            document.addEventListener('click', function(e) {
                const mobileNav = document.getElementById('nav-mobile');
                const menuButton = document.getElementById('mobile-menu-toggle');
                
                if (mobileMenuOpen && mobileNav && menuButton) {
                    if (!mobileNav.contains(e.target) && !menuButton.contains(e.target)) {
                        console.log('Clicked outside, closing menu');
                        toggleMobileMenu();
                    }
                }
            });

            // Theme toggle
            window.toggleTheme = function() {
                const html = document.documentElement;
                const currentTheme = html.classList.contains('dark') ? 'dark' : 'light';
                
                if (currentTheme === 'dark') {
                    html.classList.remove('dark');
                    localStorage.setItem('theme', 'light');
                } else {
                    html.classList.add('dark');
                    localStorage.setItem('theme', 'dark');
                }
                console.log('Theme toggled to:', currentTheme === 'dark' ? 'light' : 'dark');
            };

            // Set saved theme
            const savedTheme = localStorage.getItem('theme') || 'light';
            if (savedTheme === 'dark') {
                document.documentElement.classList.add('dark');
            }

            // Navbar scroll effect
            const navbar = document.getElementById('navbar');
            if (navbar) {
                window.addEventListener('scroll', function() {
                    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                    
                    if (scrollTop > 50) {
                        navbar.classList.add('navbar-scrolled');
                    } else {
                        navbar.classList.remove('navbar-scrolled');
                    }
                });
            }

            // Filter functionality
            window.filterAgenda = function(category) {
                console.log('Filtering agenda by category:', category);
                const cards = document.querySelectorAll('.agenda-card');
                const tabs = document.querySelectorAll('.filter-tab');

                // Update active tab
                tabs.forEach(function(tab) {
                    tab.classList.remove('active', 'bg-gradient-to-r', 'from-village-primary', 'to-village-secondary', 'text-white');
                    tab.classList.add('border-gray-200', 'bg-white', 'text-gray-700');
                });

                const activeTab = event.target;
                activeTab.classList.add('active', 'bg-gradient-to-r', 'from-village-primary', 'to-village-secondary', 'text-white');
                activeTab.classList.remove('border-gray-200', 'bg-white', 'text-gray-700');

                // Filter cards
                cards.forEach(function(card) {
                    if (category === 'all' || card.dataset.category === category) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            };

            // Calendar functions
            window.previousMonth = function() {
                console.log('Previous month clicked');
            };

            window.nextMonth = function() {
                console.log('Next month clicked');
            };

            // Global test function
            window.testMobileMenu = function() {
                console.log('=== TESTING MOBILE MENU ===');
                toggleMobileMenu();
            };

            console.log('=== All event listeners initialized ===');
        });

        console.log('=== Agenda Page Script Loaded Successfully ===');
    </script>

    <style>
        /* Village theme custom styles */
        .gradient-text {
            background: linear-gradient(135deg, #10b981, #34d399);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .animate-fade-in {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.6s ease-out forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Glass morphism effects */
        .glass-nav {
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        /* Custom scrollbar with village colors */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        ::-webkit-scrollbar-thumb {
            background: #10b981;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #059669;
        }

        .dark ::-webkit-scrollbar-track {
            background: #1e293b;
        }

        /* Hero animations */
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-slideUp {
            animation: slideUp 0.8s ease-out forwards;
        }

        .hero-title {
            background: linear-gradient(135deg, #ffffff, #f0fdf4);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-subtitle {
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .agenda-card {
                margin-bottom: 1rem;
            }
            
            .hero-text {
                font-size: 2.5rem;
                line-height: 1.1;
            }
            
            .filter-tab {
                font-size: 12px;
                padding: 8px 16px;
            }
            
            .grid.xl\\:grid-cols-3 {
                grid-template-columns: 1fr;
            }
            
            /* Stack sidebar on mobile */
            aside {
                order: -1;
                margin-bottom: 1.5rem;
            }
            
            /* Make sidebar widgets horizontal scroll on small screens */
            .sidebar-scroll {
                display: flex;
                overflow-x: auto;
                gap: 1rem;
                padding-bottom: 0.5rem;
            }
            
            .sidebar-scroll > div {
                flex: 0 0 280px;
            }
            
            /* Hide scrollbar */
            .sidebar-scroll::-webkit-scrollbar {
                height: 4px;
            }
            
            .sidebar-scroll::-webkit-scrollbar-track {
                background: #f1f5f9;
                border-radius: 2px;
            }
            
            .sidebar-scroll::-webkit-scrollbar-thumb {
                background: #10b981;
                border-radius: 2px;
            }
        }
        
        @media (max-width: 640px) {
            .hero-text {
                font-size: 2rem;
            }
            
            .filter-tab {
                font-size: 11px;
                padding: 6px 12px;
            }
            
            .agenda-card .min-w-\\[80px\\] {
                min-width: 70px;
            }
        }
        
        /* Line clamp utility */
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        /* Improved mobile touch targets */
        @media (max-width: 768px) {
            .filter-tab {
                min-height: 44px;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            
            button, a {
                min-height: 44px;
                display: flex;
                align-items: center;
                justify-content: center;
            }
        }
    </style>
</body>
</html>