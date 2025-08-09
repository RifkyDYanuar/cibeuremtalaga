<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pengumuman->judul }} - SiDesa Cibeureum</title>
    <meta name="description" content="{{ Str::limit($pengumuman->konten, 160) }}">
    <meta name="keywords" content="berita desa, pengumuman, {{ $pengumuman->kategori }}, Cibeureum">
    
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
        /* Enhanced navbar transition */
        #navbar {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
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

    <!-- Breadcrumb -->
    <section class="pt-24 lg:pt-28 pb-4 bg-white dark:bg-dark-200 border-b border-gray-200 dark:border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex items-center space-x-2 text-sm text-gray-600 dark:text-gray-400">
                <a href="{{ route('welcome') }}" class="hover:text-village-primary transition-colors duration-300">
                    <i class="fas fa-home mr-1"></i>Beranda
                </a>
                <i class="fas fa-chevron-right text-gray-400"></i>
                <a href="{{ route('public.berita') }}" class="hover:text-village-primary transition-colors duration-300">Berita & Pengumuman</a>
                <i class="fas fa-chevron-right text-gray-400"></i>
                <span class="text-gray-900 dark:text-white font-medium">{{ Str::limit($pengumuman->judul, 50) }}</span>
            </nav>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-12 bg-gradient-to-br from-gray-50 to-white dark:from-dark-100 dark:to-dark-200 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8"">
                <!-- Article -->
                <article class="lg:col-span-2 bg-white dark:bg-dark-300 rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 dark:border-dark-400">
                    <!-- Article Header -->
                    <div class="p-6 lg:p-8 bg-gradient-to-br from-gray-50 to-white dark:from-dark-300 dark:to-dark-400 border-b border-gray-200 dark:border-gray-600">
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold text-white
                                @if($pengumuman->kategori == 'penting') bg-red-500
                                @elseif($pengumuman->kategori == 'kegiatan') bg-blue-500
                                @elseif($pengumuman->kategori == 'pengumuman') bg-village-primary
                                @elseif($pengumuman->kategori == 'program') bg-purple-500
                                @elseif($pengumuman->kategori == 'pembangunan') bg-orange-500
                                @else bg-gray-500
                                @endif">
                                {{ ucfirst($pengumuman->kategori) }}
                            </span>
                            @if($pengumuman->is_featured)
                                <span class="px-3 py-1 bg-yellow-500 text-white rounded-full text-xs font-semibold">
                                    <i class="fas fa-star mr-1"></i>Diutamakan
                                </span>
                            @endif
                        </div>
                        
                        <h1 class="text-2xl lg:text-4xl font-black text-gray-900 dark:text-white mb-4 leading-tight">{{ $pengumuman->judul }}</h1>
                        
                        <div class="flex flex-wrap gap-4 text-sm text-gray-600 dark:text-gray-400">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-calendar text-village-primary"></i>
                                <span>{{ $pengumuman->tanggal_mulai->format('d F Y') }}</span>
                            </div>
                            @if($pengumuman->tanggal_selesai)
                                <div class="flex items-center gap-2">
                                    <i class="fas fa-calendar-times text-village-primary"></i>
                                    <span>Berlaku sampai {{ $pengumuman->tanggal_selesai->format('d F Y') }}</span>
                                </div>
                            @endif
                            <div class="flex items-center gap-2">
                                <i class="fas fa-user text-village-primary"></i>
                                <span>{{ $pengumuman->creator->name ?? 'Admin Desa' }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Article Content -->
                    <div class="p-6 lg:p-8">
                        @if($pengumuman->gambar)
                            <div class="mb-8 text-center">
                                <img src="{{ asset('storage/' . $pengumuman->gambar) }}" 
                                     alt="{{ $pengumuman->judul }}" 
                                     class="max-w-full h-auto rounded-xl shadow-lg mx-auto">
                            </div>
                        @endif
                        
                        <div class="prose prose-lg dark:prose-invert max-w-none">
                            @if(strlen($pengumuman->konten) > 500)
                                <div id="content-preview">
                                    <div class="text-gray-700 dark:text-gray-300 leading-relaxed text-justify">
                                        {!! nl2br(e(Str::limit($pengumuman->konten, 500))) !!}
                                    </div>
                                    <div class="text-center mt-8 pt-6 border-t border-gray-200 dark:border-gray-600">
                                        <button id="read-more-btn" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-village-primary to-village-secondary text-white rounded-full hover:shadow-lg hover:scale-105 transition-all duration-300 font-semibold">
                                            <i class="fas fa-chevron-down"></i>
                                            Baca Selengkapnya
                                        </button>
                                    </div>
                                </div>
                                
                                <div id="content-full" style="display: none;">
                                    <div class="text-gray-700 dark:text-gray-300 leading-relaxed text-justify">
                                        {!! nl2br(e($pengumuman->konten)) !!}
                                    </div>
                                    <div class="text-center mt-8 pt-6 border-t border-gray-200 dark:border-gray-600">
                                        <button id="read-less-btn" class="inline-flex items-center gap-2 px-6 py-3 bg-gray-500 hover:bg-gray-600 text-white rounded-full hover:shadow-lg transition-all duration-300 font-semibold">
                                            <i class="fas fa-chevron-up"></i>
                                            Sembunyikan
                                        </button>
                                    </div>
                                </div>
                            @else
                                <div class="text-gray-700 dark:text-gray-300 leading-relaxed text-justify">
                                    {!! nl2br(e($pengumuman->konten)) !!}
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Article Footer -->
                    <div class="p-6 lg:p-8 bg-gray-50 dark:bg-dark-400 border-t border-gray-200 dark:border-gray-600">
                        <div class="mb-6">
                            <h6 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Bagikan Berita</h6>
                            <div class="flex flex-wrap gap-3">
                                <a href="https://api.whatsapp.com/send?text={{ urlencode($pengumuman->judul . ' - ' . url()->current()) }}" 
                                   class="inline-flex items-center gap-2 px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg transition-all duration-300 font-medium" target="_blank">
                                    <i class="fab fa-whatsapp"></i>
                                    WhatsApp
                                </a>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" 
                                   class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-all duration-300 font-medium" target="_blank">
                                    <i class="fab fa-facebook-f"></i>
                                    Facebook
                                </a>
                                <a href="https://twitter.com/intent/tweet?text={{ urlencode($pengumuman->judul) }}&url={{ urlencode(url()->current()) }}" 
                                   class="inline-flex items-center gap-2 px-4 py-2 bg-sky-500 hover:bg-sky-600 text-white rounded-lg transition-all duration-300 font-medium" target="_blank">
                                    <i class="fab fa-twitter"></i>
                                    Twitter
                                </a>
                                <button onclick="copyLink()" class="inline-flex items-center gap-2 px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg transition-all duration-300 font-medium">
                                    <i class="fas fa-copy"></i>
                                    Salin Link
                                </button>
                            </div>
                        </div>

                        <div class="text-center pt-6 border-t border-gray-200 dark:border-gray-600">
                            <a href="{{ route('public.berita') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-village-primary hover:bg-village-secondary text-white rounded-full transition-all duration-300 font-semibold">
                                <i class="fas fa-arrow-left"></i>
                                Kembali ke Berita
                            </a>
                        </div>
                    </div>
                </article>

                <!-- Sidebar -->
                <aside class="space-y-6">
                    <!-- Related News Widget -->
                    @if($relatedAnnouncements->count() > 0)
                        <div class="bg-white dark:bg-dark-300 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6">
                            <div class="text-center mb-6">
                                <div class="inline-block px-4 py-2 bg-village-primary/10 text-village-primary rounded-full text-sm font-semibold mb-3">
                                    📰 BERITA TERKAIT
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white">Berita Terkait</h3>
                            </div>
                            <div class="space-y-4">
                                @foreach($relatedAnnouncements as $related)
                                    <div class="flex gap-3 p-3 bg-gray-50 dark:bg-dark-400 rounded-lg hover:bg-gray-100 dark:hover:bg-dark-200 transition-colors duration-300">
                                        @if($related->gambar)
                                            <img src="{{ asset('storage/' . $related->gambar) }}" alt="{{ $related->judul }}" class="w-16 h-16 rounded-lg object-cover flex-shrink-0">
                                        @else
                                            <img src="{{ asset('images/default-news.jpg') }}" alt="{{ $related->judul }}" class="w-16 h-16 rounded-lg object-cover flex-shrink-0">
                                        @endif
                                        <div class="flex-1 min-w-0">
                                            <h4 class="text-sm font-semibold text-gray-900 dark:text-white line-clamp-2 mb-1">
                                                <a href="{{ route('public.berita.detail', $related) }}" class="hover:text-village-primary transition-colors duration-300">
                                                    {{ Str::limit($related->judul, 60) }}
                                                </a>
                                            </h4>
                                            <span class="text-xs text-gray-500 dark:text-gray-400">{{ $related->tanggal_mulai->format('d F Y') }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Navigation Widget -->
                    <div class="bg-white dark:bg-dark-300 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6">
                        <div class="text-center mb-6">
                            <div class="inline-block px-4 py-2 bg-village-primary/10 text-village-primary rounded-full text-sm font-semibold mb-3">
                                🧭 NAVIGASI
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">Menu Navigasi</h3>
                        </div>
                        <div class="space-y-3">
                            <a href="{{ route('public.berita') }}" class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-dark-400 rounded-xl hover:bg-village-primary hover:text-white transition-all duration-300 text-gray-700 dark:text-gray-300 group">
                                <i class="fas fa-list text-village-primary group-hover:text-white"></i>
                                <span class="font-medium">Semua Berita</span>
                            </a>
                            <a href="{{ route('public.layanan-detail') }}" class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-dark-400 rounded-xl hover:bg-village-primary hover:text-white transition-all duration-300 text-gray-700 dark:text-gray-300 group">
                                <i class="fas fa-concierge-bell text-village-primary group-hover:text-white"></i>
                                <span class="font-medium">Layanan Desa</span>
                            </a>
                            <a href="{{ route('agenda.public') }}" class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-dark-400 rounded-xl hover:bg-village-primary hover:text-white transition-all duration-300 text-gray-700 dark:text-gray-300 group">
                                <i class="fas fa-calendar text-village-primary group-hover:text-white"></i>
                                <span class="font-medium">Agenda Kegiatan</span>
                            </a>
                            <a href="{{ route('public.kontak') }}" class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-dark-400 rounded-xl hover:bg-village-primary hover:text-white transition-all duration-300 text-gray-700 dark:text-gray-300 group">
                                <i class="fas fa-phone text-village-primary group-hover:text-white"></i>
                                <span class="font-medium">Kontak Desa</span>
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
                            <div class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-dark-400 rounded-lg">
                                <i class="fas fa-envelope text-village-primary"></i>
                                <div>
                                    <div class="font-medium text-gray-900 dark:text-white">Email</div>
                                    <div class="text-sm text-gray-600 dark:text-gray-400">redaksi@cibeureum.id</div>
                                </div>
                            </div>
                            <div class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-dark-400 rounded-lg">
                                <i class="fas fa-phone text-village-primary"></i>
                                <div>
                                    <div class="font-medium text-gray-900 dark:text-white">Telepon</div>
                                    <div class="text-sm text-gray-600 dark:text-gray-400">+62 812-3456-7890</div>
                                </div>
                            </div>
                            <div class="flex items-start gap-3 p-3 bg-gray-50 dark:bg-dark-400 rounded-lg">
                                <i class="fas fa-clock text-village-primary mt-0.5"></i>
                                <div>
                                    <div class="font-medium text-gray-900 dark:text-white">Jam Operasional</div>
                                    <div class="text-sm text-gray-600 dark:text-gray-400">Senin - Jumat, 08:00 - 16:00</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    <script>
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

        // Copy link function
        function copyLink() {
            const url = window.location.href;
            if (navigator.clipboard && navigator.clipboard.writeText) {
                navigator.clipboard.writeText(url).then(function() {
                    alert('Link berhasil disalin!');
                }, function(err) {
                    console.error('Gagal menyalin link: ', err);
                    fallbackCopyTextToClipboard(url);
                });
            } else {
                fallbackCopyTextToClipboard(url);
            }
        }

        function fallbackCopyTextToClipboard(text) {
            const textArea = document.createElement("textarea");
            textArea.value = text;
            document.body.appendChild(textArea);
            textArea.focus();
            textArea.select();
            try {
                const successful = document.execCommand('copy');
                if (successful) {
                    alert('Link berhasil disalin!');
                } else {
                    alert('Gagal menyalin link. Silakan salin manual: ' + text);
                }
            } catch (err) {
                console.error('Fallback: Gagal menyalin link', err);
                alert('Gagal menyalin link. Silakan salin manual: ' + text);
            }
            document.body.removeChild(textArea);
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

            // Enhanced navbar scroll effect
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

            // Read more/less functionality
            const readMoreBtn = document.getElementById('read-more-btn');
            const readLessBtn = document.getElementById('read-less-btn');
            const contentPreview = document.getElementById('content-preview');
            const contentFull = document.getElementById('content-full');

            if (readMoreBtn && contentPreview && contentFull) {
                readMoreBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    contentPreview.style.display = 'none';
                    contentFull.style.display = 'block';
                    
                    setTimeout(function() {
                        const offset = 100;
                        const elementPosition = contentFull.getBoundingClientRect().top;
                        const offsetPosition = elementPosition + window.pageYOffset - offset;
                        
                        window.scrollTo({
                            top: offsetPosition,
                            behavior: 'smooth'
                        });
                    }, 100);
                });
            }

            if (readLessBtn && contentPreview && contentFull) {
                readLessBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    contentFull.style.display = 'none';
                    contentPreview.style.display = 'block';
                    
                    setTimeout(function() {
                        const offset = 100;
                        const elementPosition = contentPreview.getBoundingClientRect().top;
                        const offsetPosition = elementPosition + window.pageYOffset - offset;
                        
                        window.scrollTo({
                            top: offsetPosition,
                            behavior: 'smooth'
                        });
                    }, 100);
                });
            }

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

            // Observe animated elements
            document.querySelectorAll('.animate-fade-in').forEach(element => {
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
