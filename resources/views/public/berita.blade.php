<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita & Pengumuman - SiDesa Cibeureum</title>
    <meta name="description" content="Berita terbaru, pengumuman, dan informasi penting dari Desa Cibeureum. Tetap update dengan perkembangan dan kegiatan terkini di desa.">
    <meta name="keywords" content="berita desa, pengumuman, informasi desa, Cibeureum, kegiatan desa">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        'village': {
                            'primary': '#10b981',
                            'secondary': '#34d399', 
                            'accent': '#a7f3d0'
                        },
                        'dark': {
                            '100': '#0f172a',
                            '200': '#1e293b', 
                            '300': '#334155',
                            '400': '#475569'
                        }
                    },
                    fontFamily: {
                        'sans': ['Inter', 'system-ui', 'sans-serif']
                    }
                }
            }
        }
    </script>
    
    <style>
        /* Remove glass morphism styles that might conflict */
        .glass {
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        .glass-dark {
            background: rgba(15, 23, 42, 0.9);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
        }

        /* Navbar transition */
        #navbar {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
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

        /* Hero text gradient */
        .hero-title {
            background: linear-gradient(135deg, #ffffff, #f0fdf4);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-subtitle {
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Gradient text */
        .gradient-text {
            background: linear-gradient(135deg, #10b981, #34d399);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Custom scrollbar */
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

        /* Fade in animation */
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
    </style>
</head>
<body class="bg-gray-50 dark:bg-dark-100 text-gray-900 dark:text-white transition-colors duration-300">
    <!-- Navigation -->
    <nav id="navbar" class="fixed top-0 left-0 right-0 z-50 bg-white/95 dark:bg-gray-900/95 backdrop-blur-md shadow-lg border-b border-gray-200/50 dark:border-gray-700/50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 lg:h-20">
                <!-- Logo -->
                <a href="{{ route('welcome') }}" class="flex items-center space-x-3 text-xl lg:text-2xl font-black text-gray-900 dark:text-white hover:text-village-primary transition-colors duration-300">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo SiDesa" class="h-10 lg:h-12 w-auto">
                    <span class="bg-gradient-to-r from-village-primary to-village-secondary bg-clip-text text-transparent">SiDesa</span>
                </a>

                <!-- Desktop Navigation -->
                <ul class="hidden lg:flex items-center space-x-2">
                    <li>
                        <a href="{{ route('welcome') }}"
                            class="nav-link text-gray-700 dark:text-gray-300 hover:text-village-primary dark:hover:text-village-secondary hover:bg-gray-100 dark:hover:bg-gray-800 px-4 py-2 rounded-full transition-all duration-300 font-medium">
                            <i class="fas fa-home mr-2"></i>Beranda
                        </a>
                    </li>
                    <li>
                        <a href="/tentang"
                            class="nav-link text-gray-700 dark:text-gray-300 hover:text-village-primary dark:hover:text-village-secondary hover:bg-gray-100 dark:hover:bg-gray-800 px-4 py-2 rounded-full transition-all duration-300 font-medium">
                            <i class="fas fa-info-circle mr-2"></i>Tentang
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('public.berita') }}"
                            class="nav-link bg-village-primary text-white hover:bg-village-secondary px-4 py-2 rounded-full transition-all duration-300 font-medium shadow-md">
                            <i class="fas fa-newspaper mr-2"></i>Berita
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('agenda.public') }}"
                            class="nav-link text-gray-700 dark:text-gray-300 hover:text-village-primary dark:hover:text-village-secondary hover:bg-gray-100 dark:hover:bg-gray-800 px-4 py-2 rounded-full transition-all duration-300 font-medium">
                            <i class="fas fa-calendar mr-2"></i>Agenda
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('public.layanan-detail') }}"
                            class="nav-link text-gray-700 dark:text-gray-300 hover:text-village-primary dark:hover:text-village-secondary hover:bg-gray-100 dark:hover:bg-gray-800 px-4 py-2 rounded-full transition-all duration-300 font-medium">
                            <i class="fas fa-concierge-bell mr-2"></i>Layanan
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('public.kontak') }}"
                            class="nav-link text-gray-700 dark:text-gray-300 hover:text-village-primary dark:hover:text-village-secondary hover:bg-gray-100 dark:hover:bg-gray-800 px-4 py-2 rounded-full transition-all duration-300 font-medium">
                            <i class="fas fa-phone mr-2"></i>Kontak
                        </a>
                    </li>
                </ul>

                <!-- Desktop Buttons -->
                <div class="hidden lg:flex items-center space-x-2">
                    <a href="{{ route('login') }}"
                        class="px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-full transition-all duration-300 font-semibold flex items-center space-x-2">
                        <i class="fas fa-sign-in-alt"></i>
                        <span>Masuk</span>
                    </a>
                    <a href="{{ route('register') }}"
                        class="px-4 py-2 bg-gradient-to-r from-village-primary to-village-secondary text-white hover:shadow-lg hover:scale-105 rounded-full transition-all duration-300 font-semibold flex items-center space-x-2">
                        <i class="fas fa-user-plus"></i>
                        <span>Daftar</span>
                    </a>
                    <button onclick="toggleTheme()"
                        class="px-3 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-full transition-all duration-300 flex items-center space-x-2 ml-1">
                        <i class="fas fa-moon" id="theme-icon"></i>
                        <span id="theme-text" class="text-sm font-medium">Dark</span>
                    </button>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-toggle"
                    class="lg:hidden border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 p-2 rounded-full text-lg focus:outline-none transition-all duration-300">
                    <i class="fas fa-bars" id="mobile-menu-icon"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div id="nav-mobile"
            class="lg:hidden fixed top-full left-0 right-0 bg-white/95 dark:bg-gray-900/95 backdrop-blur-md border-t border-gray-200/50 dark:border-gray-700/50 shadow-xl max-h-screen overflow-y-auto z-40 transform -translate-y-full opacity-0 invisible transition-all duration-300">
            <div class="py-6">
                <ul class="space-y-2 px-4">
                    <li>
                        <a href="{{ route('welcome') }}"
                            class="block px-6 py-4 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary border border-gray-200 dark:border-gray-700 hover:border-village-primary rounded-xl transition-all duration-300 font-medium">
                            <i class="fas fa-home mr-3"></i>Beranda
                        </a>
                    </li>
                    <li>
                        <a href="/tentang"
                            class="block px-6 py-4 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary border border-gray-200 dark:border-gray-700 hover:border-village-primary rounded-xl transition-all duration-300 font-medium">
                            <i class="fas fa-info-circle mr-3"></i>Tentang
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('public.berita') }}"
                            class="block px-6 py-4 bg-village-primary text-white border border-village-primary rounded-xl transition-all duration-300 font-medium">
                            <i class="fas fa-newspaper mr-3"></i>Berita
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('agenda.public') }}"
                            class="block px-6 py-4 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary border border-gray-200 dark:border-gray-700 hover:border-village-primary rounded-xl transition-all duration-300 font-medium">
                            <i class="fas fa-calendar mr-3"></i>Agenda
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('public.layanan-detail') }}"
                            class="block px-6 py-4 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary border border-gray-200 dark:border-gray-700 hover:border-village-primary rounded-xl transition-all duration-300 font-medium">
                            <i class="fas fa-concierge-bell mr-3"></i>Layanan
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('public.kontak') }}"
                            class="block px-6 py-4 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary border border-gray-200 dark:border-gray-700 hover:border-village-primary rounded-xl transition-all duration-300 font-medium">
                            <i class="fas fa-phone mr-3"></i>Kontak
                        </a>
                    </li>
                </ul>

                <div class="px-4 mt-6 space-y-3">
                    <a href="{{ route('login') }}"
                        class="block px-6 py-3 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-full transition-all duration-300 font-semibold text-center">
                        <i class="fas fa-sign-in-alt mr-2"></i>Masuk
                    </a>
                    <a href="{{ route('register') }}"
                        class="block px-6 py-3 bg-gradient-to-r from-village-primary to-village-secondary text-white rounded-full transition-all duration-300 font-semibold text-center">
                        <i class="fas fa-user-plus mr-2"></i>Daftar
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative pt-24 lg:pt-32 pb-20 overflow-hidden bg-gradient-to-br from-village-primary via-village-secondary to-village-accent">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><g fill="%23ffffff" fill-opacity="0.1"><circle cx="10" cy="10" r="2"/></g></svg>');"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <div class="animate-slideUp">
                <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-6 hero-title">
                    Berita & <span class="text-village-accent">Pengumuman</span>
                </h1>
            </div>
            <div class="animate-slideUp" style="animation-delay: 0.3s;">
                <p class="text-lg md:text-xl lg:text-2xl mb-8 opacity-95 max-w-3xl mx-auto leading-relaxed hero-subtitle">
                    Informasi terbaru, berita, dan pengumuman penting dari Desa Cibeureum untuk masyarakat
                </p>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-20 bg-gradient-to-br from-gray-50 to-white dark:from-dark-100 dark:to-dark-200 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Filter Section -->
            <div class="bg-white dark:bg-dark-300 p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 mb-8">
                <div class="text-center mb-6">
                    <div class="inline-block px-6 py-2 bg-village-primary/10 text-village-primary rounded-full text-sm font-semibold mb-4">
                        🔍 FILTER BERITA
                    </div>
                    <h3 class="text-2xl font-black text-gray-900 dark:text-white">
                        Pilih <span class="gradient-text">Kategori</span>
                    </h3>
                </div>
                <div class="flex flex-wrap justify-center gap-3 mb-6">
                    <button class="filter-tab px-6 py-3 border-2 border-village-primary/20 rounded-full bg-gradient-to-r from-village-primary to-village-secondary text-white font-semibold transition-all duration-300 hover:scale-105 active" onclick="filterNews('all')">
                        Semua
                    </button>
                    <button class="filter-tab px-6 py-3 border-2 border-gray-200 dark:border-gray-600 rounded-full bg-white dark:bg-dark-400 text-gray-700 dark:text-gray-300 font-semibold transition-all duration-300 hover:scale-105" onclick="filterNews('pengumuman')">
                        Pengumuman
                    </button>
                    <button class="filter-tab px-6 py-3 border-2 border-gray-200 dark:border-gray-600 rounded-full bg-white dark:bg-dark-400 text-gray-700 dark:text-gray-300 font-semibold transition-all duration-300 hover:scale-105" onclick="filterNews('kegiatan')">
                        Kegiatan
                    </button>
                    <button class="filter-tab px-6 py-3 border-2 border-gray-200 dark:border-gray-600 rounded-full bg-white dark:bg-dark-400 text-gray-700 dark:text-gray-300 font-semibold transition-all duration-300 hover:scale-105" onclick="filterNews('program')">
                        Program
                    </button>
                    <button class="filter-tab px-6 py-3 border-2 border-gray-200 dark:border-gray-600 rounded-full bg-white dark:bg-dark-400 text-gray-700 dark:text-gray-300 font-semibold transition-all duration-300 hover:scale-105" onclick="filterNews('pembangunan')">
                        Pembangunan
                    </button>
                </div>
                <div class="flex gap-3">
                    <input type="text" 
                           class="flex-1 px-4 py-3 border-2 border-gray-200 dark:border-gray-600 rounded-xl bg-white dark:bg-dark-400 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:border-village-primary focus:outline-none transition-colors duration-300" 
                           placeholder="Cari berita atau pengumuman..." 
                           id="search-input">
                    <button class="px-6 py-3 bg-gradient-to-r from-village-primary to-village-secondary text-white rounded-xl hover:scale-105 transition-all duration-300 font-semibold" 
                            id="search-btn">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- News Grid -->
                <div class="lg:col-span-2">
                    <div class="grid gap-6" id="news-grid">
                        @if($pengumuman->count() > 0)
                            @foreach($pengumuman as $news)
                                <article class="news-card bg-white dark:bg-dark-300 rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2" data-category="{{ $news->kategori }}">
                                    <div class="md:flex">
                                        <div class="md:w-1/3">
                                            @if($news->gambar)
                                                <img src="{{ asset('storage/' . $news->gambar) }}" alt="{{ $news->judul }}" class="w-full h-48 md:h-full object-cover">
                                            @else
                                                <img src="{{ asset('images/default-news.jpg') }}" alt="{{ $news->judul }}" class="w-full h-48 md:h-full object-cover">
                                            @endif
                                        </div>
                                        <div class="md:w-2/3 p-6">
                                            <div class="flex items-center gap-4 mb-4 text-sm text-gray-600 dark:text-gray-400">
                                                <span class="px-3 py-1 rounded-full text-xs font-semibold text-white
                                                    @if($news->kategori == 'pengumuman') bg-blue-500
                                                    @elseif($news->kategori == 'kegiatan') bg-green-500
                                                    @elseif($news->kategori == 'program') bg-purple-500
                                                    @elseif($news->kategori == 'pembangunan') bg-orange-500
                                                    @else bg-village-primary
                                                    @endif">
                                                    {{ ucfirst($news->kategori) }}
                                                </span>
                                                <span class="flex items-center gap-1">
                                                    <i class="fas fa-calendar text-village-primary"></i>
                                                    {{ $news->tanggal_mulai->format('d F Y') }}
                                                </span>
                                                <span class="flex items-center gap-1">
                                                    <i class="fas fa-user text-village-primary"></i>
                                                    {{ $news->creator->name ?? 'Admin Desa' }}
                                                </span>
                                            </div>
                                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3 leading-tight">{{ $news->judul }}</h3>
                                            <p class="text-gray-600 dark:text-gray-300 mb-4 leading-relaxed">
                                                {{ Str::limit($news->konten, 150) }}
                                            </p>
                                            <div class="flex justify-between items-center">
                                                <a href="{{ route('public.berita.detail', $news) }}" class="inline-flex items-center gap-2 text-village-primary hover:text-village-secondary font-semibold transition-colors duration-300">
                                                    Baca Selengkapnya 
                                                    <i class="fas fa-arrow-right"></i>
                                                </a>
                                                <span class="flex items-center gap-1 text-gray-500 dark:text-gray-400 text-sm">
                                                    <i class="fas fa-eye"></i>
                                                    {{ rand(50, 500) }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        @else
                            <div class="col-span-full text-center py-16">
                                <div class="bg-white dark:bg-dark-300 rounded-2xl shadow-lg p-12">
                                    <div class="text-6xl text-gray-300 dark:text-gray-600 mb-4">
                                        <i class="fas fa-newspaper"></i>
                                    </div>
                                    <h3 class="text-2xl font-bold text-gray-600 dark:text-gray-400 mb-2">Belum Ada Berita</h3>
                                    <p class="text-gray-500 dark:text-gray-500">Saat ini belum ada berita atau pengumuman yang tersedia.</p>
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Pagination -->
                    @if($pengumuman->hasPages())
                        <div class="mt-8 flex justify-center">
                            <div class="bg-white dark:bg-dark-300 rounded-2xl shadow-lg p-4">
                                {{ $pengumuman->links() }}
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <aside class="space-y-6">
                    <!-- Popular News Widget -->
                    <div class="bg-white dark:bg-dark-300 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6">
                        <div class="text-center mb-6">
                            <div class="inline-block px-4 py-2 bg-village-primary/10 text-village-primary rounded-full text-sm font-semibold mb-3">
                                🔥 POPULER
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">Berita Populer</h3>
                        </div>
                        <div class="space-y-4">
                            @if($popularNews->count() > 0)
                                @foreach($popularNews as $popular)
                                    <div class="flex gap-3 p-3 bg-gray-50 dark:bg-dark-400 rounded-lg hover:bg-gray-100 dark:hover:bg-dark-200 transition-colors duration-300">
                                        @if($popular->gambar)
                                            <img src="{{ asset('storage/' . $popular->gambar) }}" alt="{{ $popular->judul }}" class="w-16 h-16 rounded-lg object-cover flex-shrink-0">
                                        @else
                                            <img src="{{ asset('images/default-news.jpg') }}" alt="{{ $popular->judul }}" class="w-16 h-16 rounded-lg object-cover flex-shrink-0">
                                        @endif
                                        <div class="flex-1 min-w-0">
                                            <h4 class="text-sm font-semibold text-gray-900 dark:text-white line-clamp-2 mb-1">
                                                <a href="{{ route('public.berita.detail', $popular) }}" class="hover:text-village-primary transition-colors duration-300">
                                                    {{ Str::limit($popular->judul, 40) }}
                                                </a>
                                            </h4>
                                            <span class="text-xs text-gray-500 dark:text-gray-400">{{ $popular->tanggal_mulai->format('d F Y') }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-center text-gray-500 dark:text-gray-400 py-4">Belum ada berita populer.</p>
                            @endif
                        </div>
                    </div>

                    <!-- Categories Widget -->
                    <div class="bg-white dark:bg-dark-300 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6">
                        <div class="text-center mb-6">
                            <div class="inline-block px-4 py-2 bg-village-primary/10 text-village-primary rounded-full text-sm font-semibold mb-3">
                                🏷️ KATEGORI
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">Kategori Berita</h3>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <a href="#" class="px-3 py-2 bg-gray-100 dark:bg-dark-400 text-gray-700 dark:text-gray-300 rounded-lg text-sm font-medium hover:bg-village-primary hover:text-white transition-colors duration-300">Pengumuman</a>
                            <a href="#" class="px-3 py-2 bg-gray-100 dark:bg-dark-400 text-gray-700 dark:text-gray-300 rounded-lg text-sm font-medium hover:bg-village-primary hover:text-white transition-colors duration-300">Kegiatan</a>
                            <a href="#" class="px-3 py-2 bg-gray-100 dark:bg-dark-400 text-gray-700 dark:text-gray-300 rounded-lg text-sm font-medium hover:bg-village-primary hover:text-white transition-colors duration-300">Program</a>
                            <a href="#" class="px-3 py-2 bg-gray-100 dark:bg-dark-400 text-gray-700 dark:text-gray-300 rounded-lg text-sm font-medium hover:bg-village-primary hover:text-white transition-colors duration-300">Pembangunan</a>
                            <a href="#" class="px-3 py-2 bg-gray-100 dark:bg-dark-400 text-gray-700 dark:text-gray-300 rounded-lg text-sm font-medium hover:bg-village-primary hover:text-white transition-colors duration-300">Kesehatan</a>
                            <a href="#" class="px-3 py-2 bg-gray-100 dark:bg-dark-400 text-gray-700 dark:text-gray-300 rounded-lg text-sm font-medium hover:bg-village-primary hover:text-white transition-colors duration-300">Pendidikan</a>
                            <a href="#" class="px-3 py-2 bg-gray-100 dark:bg-dark-400 text-gray-700 dark:text-gray-300 rounded-lg text-sm font-medium hover:bg-village-primary hover:text-white transition-colors duration-300">Ekonomi</a>
                            <a href="#" class="px-3 py-2 bg-gray-100 dark:bg-dark-400 text-gray-700 dark:text-gray-300 rounded-lg text-sm font-medium hover:bg-village-primary hover:text-white transition-colors duration-300">Sosial</a>
                        </div>
                    </div>

                    <!-- Archive Widget -->
                    <div class="bg-white dark:bg-dark-300 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6">
                        <div class="text-center mb-6">
                            <div class="inline-block px-4 py-2 bg-village-primary/10 text-village-primary rounded-full text-sm font-semibold mb-3">
                                📂 ARSIP
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">Arsip Berita</h3>
                        </div>
                        <div class="space-y-2">
                            <a href="#" class="flex justify-between items-center p-3 bg-gray-50 dark:bg-dark-400 rounded-lg hover:bg-village-primary hover:text-white transition-colors duration-300 text-gray-700 dark:text-gray-300">
                                <span>Juli 2025</span>
                                <span class="text-xs bg-gray-200 dark:bg-dark-200 text-gray-600 dark:text-gray-400 px-2 py-1 rounded-full">6</span>
                            </a>
                            <a href="#" class="flex justify-between items-center p-3 bg-gray-50 dark:bg-dark-400 rounded-lg hover:bg-village-primary hover:text-white transition-colors duration-300 text-gray-700 dark:text-gray-300">
                                <span>Juni 2025</span>
                                <span class="text-xs bg-gray-200 dark:bg-dark-200 text-gray-600 dark:text-gray-400 px-2 py-1 rounded-full">8</span>
                            </a>
                            <a href="#" class="flex justify-between items-center p-3 bg-gray-50 dark:bg-dark-400 rounded-lg hover:bg-village-primary hover:text-white transition-colors duration-300 text-gray-700 dark:text-gray-300">
                                <span>Mei 2025</span>
                                <span class="text-xs bg-gray-200 dark:bg-dark-200 text-gray-600 dark:text-gray-400 px-2 py-1 rounded-full">12</span>
                            </a>
                            <a href="#" class="flex justify-between items-center p-3 bg-gray-50 dark:bg-dark-400 rounded-lg hover:bg-village-primary hover:text-white transition-colors duration-300 text-gray-700 dark:text-gray-300">
                                <span>April 2025</span>
                                <span class="text-xs bg-gray-200 dark:bg-dark-200 text-gray-600 dark:text-gray-400 px-2 py-1 rounded-full">15</span>
                            </a>
                            <a href="#" class="flex justify-between items-center p-3 bg-gray-50 dark:bg-dark-400 rounded-lg hover:bg-village-primary hover:text-white transition-colors duration-300 text-gray-700 dark:text-gray-300">
                                <span>Maret 2025</span>
                                <span class="text-xs bg-gray-200 dark:bg-dark-200 text-gray-600 dark:text-gray-400 px-2 py-1 rounded-full">10</span>
                            </a>
                        </div>
                    </div>

                    <!-- Contact Info Widget -->
                    <div class="bg-white dark:bg-dark-300 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6">
                        <div class="text-center mb-6">
                            <div class="inline-block px-4 py-2 bg-village-primary/10 text-village-primary rounded-full text-sm font-semibold mb-3">
                                📞 KONTAK
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">Kontak Redaksi</h3>
                        </div>
                        <div class="space-y-3">
                            <div class="flex items-center gap-3">
                                <i class="fas fa-envelope text-village-primary"></i>
                                <span class="text-sm text-gray-600 dark:text-gray-400">redaksi@cibeureum.id</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <i class="fas fa-phone text-village-primary"></i>
                                <span class="text-sm text-gray-600 dark:text-gray-400">+62 812-3456-7890</span>
                            </div>
                            <div class="flex items-start gap-3">
                                <i class="fas fa-clock text-village-primary mt-0.5"></i>
                                <span class="text-sm text-gray-600 dark:text-gray-400">Senin - Jumat, 08:00 - 16:00</span>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    <script>
        // Filter functionality with village theme
        function filterNews(category) {
            const tabs = document.querySelectorAll('.filter-tab');
            const cards = document.querySelectorAll('.news-card');

            // Update tab styles
            tabs.forEach(tab => {
                tab.classList.remove('active');
                tab.classList.remove('bg-gradient-to-r', 'from-village-primary', 'to-village-secondary', 'text-white');
                tab.classList.add('border-gray-200', 'dark:border-gray-600', 'bg-white', 'dark:bg-dark-400', 'text-gray-700', 'dark:text-gray-300');
            });

            event.target.classList.add('active');
            event.target.classList.remove('border-gray-200', 'dark:border-gray-600', 'bg-white', 'dark:bg-dark-400', 'text-gray-700', 'dark:text-gray-300');
            event.target.classList.add('bg-gradient-to-r', 'from-village-primary', 'to-village-secondary', 'text-white');

            // Filter cards
            cards.forEach(card => {
                if (category === 'all' || card.dataset.category === category) {
                    card.style.display = 'block';
                    card.classList.add('animate-fade-in');
                } else {
                    card.style.display = 'none';
                }
            });
        }

        // Theme toggle functionality
        function toggleTheme() {
            const html = document.documentElement;
            const isDark = html.classList.toggle('dark');
            localStorage.setItem('theme', isDark ? 'dark' : 'light');
            
            const icon = document.getElementById('theme-icon');
            const text = document.getElementById('theme-text');
            
            if (isDark) {
                icon.className = 'fas fa-sun';
                text.textContent = 'Light';
            } else {
                icon.className = 'fas fa-moon';
                text.textContent = 'Dark';
            }
        }

        // Mobile menu toggle
        function toggleMobileMenu() {
            const mobileNav = document.getElementById('nav-mobile');
            const menuButton = document.getElementById('mobile-menu-toggle');
            const icon = document.getElementById('mobile-menu-icon');
            
            // Toggle mobile menu
            mobileNav.classList.toggle('-translate-y-full');
            mobileNav.classList.toggle('opacity-0');
            mobileNav.classList.toggle('invisible');
            
            // Toggle menu icon
            if (icon.classList.contains('fa-bars')) {
                icon.className = 'fas fa-times';
            } else {
                icon.className = 'fas fa-bars';
            }
        }

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            // Set theme from localStorage
            const savedTheme = localStorage.getItem('theme') || 'light';
            const html = document.documentElement;
            const icon = document.getElementById('theme-icon');
            const text = document.getElementById('theme-text');
            
            if (savedTheme === 'dark') {
                html.classList.add('dark');
                if (icon) icon.className = 'fas fa-sun';
                if (text) text.textContent = 'Light';
            }

            // Mobile menu button event
            const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
            if (mobileMenuToggle) {
                mobileMenuToggle.addEventListener('click', toggleMobileMenu);
            }

            // Search functionality
            const searchBtn = document.getElementById('search-btn');
            const searchInput = document.getElementById('search-input');
            
            if (searchBtn && searchInput) {
                searchBtn.addEventListener('click', function() {
                    const searchTerm = searchInput.value.toLowerCase();
                    const cards = document.querySelectorAll('.news-card');
                    
                    cards.forEach(card => {
                        const title = card.querySelector('h3').textContent.toLowerCase();
                        const excerpt = card.querySelector('p').textContent.toLowerCase();
                        
                        if (title.includes(searchTerm) || excerpt.includes(searchTerm)) {
                            card.style.display = 'block';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });

                // Search on Enter key
                searchInput.addEventListener('keypress', function(e) {
                    if (e.key === 'Enter') {
                        searchBtn.click();
                    }
                });
            }

            // Enhanced navbar scroll effect with always visible behavior
            const navbar = document.getElementById('navbar');
            let lastScrollY = window.scrollY;
            
            window.addEventListener('scroll', function() {
                const currentScrollY = window.scrollY;
                
                if (navbar) {
                    // Always keep navbar visible
                    navbar.style.transform = 'translateY(0)';
                    
                    // Change background opacity based on scroll
                    if (currentScrollY > 50) {
                        navbar.classList.add('shadow-lg');
                        navbar.style.background = 'rgba(255, 255, 255, 0.98)';
                        if (document.documentElement.classList.contains('dark')) {
                            navbar.style.background = 'rgba(17, 24, 39, 0.98)';
                        }
                    } else {
                        navbar.classList.remove('shadow-lg');
                        navbar.style.background = 'rgba(255, 255, 255, 0.95)';
                        if (document.documentElement.classList.contains('dark')) {
                            navbar.style.background = 'rgba(17, 24, 39, 0.95)';
                        }
                    }
                }
                
                lastScrollY = currentScrollY;
            });

            // Update navbar background when theme changes
            const themeObserver = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    if (mutation.attributeName === 'class') {
                        const isDark = document.documentElement.classList.contains('dark');
                        const currentScrollY = window.scrollY;
                        
                        if (currentScrollY > 50) {
                            navbar.style.background = isDark ? 'rgba(17, 24, 39, 0.98)' : 'rgba(255, 255, 255, 0.98)';
                        } else {
                            navbar.style.background = isDark ? 'rgba(17, 24, 39, 0.95)' : 'rgba(255, 255, 255, 0.95)';
                        }
                    }
                });
            });
            
            themeObserver.observe(document.documentElement, { attributes: true });

            // Animation on scroll
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);

            // Observe news cards and sidebar widgets
            document.querySelectorAll('.news-card, .bg-white').forEach(element => {
                element.style.opacity = '0';
                element.style.transform = 'translateY(20px)';
                element.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(element);
            });

            // Smooth scroll for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>
