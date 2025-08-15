<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#10b981">
    
    <!-- SEO Meta Tags -->
    <title>@yield('title', 'Desa Cibeureum Talaga - Sistem Informasi Desa Terpadu')</title>
    <meta name="description" content="@yield('meta_description', 'Sistem Informasi Desa Cibeureum Talaga - Portal resmi desa dengan layanan pengumuman, agenda, APBDES, data kependudukan, dan pelayanan surat online.')">
    <meta name="keywords" content="@yield('meta_keywords', 'desa cibeureum talaga, sistem informasi desa, pengumuman desa, agenda desa, apbdes, data kependudukan, layanan surat online, talaga, majalengka')">
    <meta name="author" content="Desa Cibeureum Talaga">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="@yield('canonical', request()->url())">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('og_title', 'Desa Cibeureum Talaga - Sistem Informasi Desa')">
    <meta property="og:description" content="@yield('og_description', 'Portal resmi Desa Cibeureum Talaga dengan layanan informasi dan pelayanan online untuk masyarakat.')">
    <meta property="og:url" content="@yield('og_url', request()->url())">
    <meta property="og:image" content="@yield('og_image', asset('logo.svg'))">
    <meta property="og:site_name" content="Desa Cibeureum Talaga">
    <meta property="og:locale" content="id_ID">
    
    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title', 'Desa Cibeureum Talaga - Sistem Informasi Desa')">
    <meta name="twitter:description" content="@yield('twitter_description', 'Portal resmi Desa Cibeureum Talaga dengan layanan informasi dan pelayanan online untuk masyarakat.')">
    <meta name="twitter:image" content="@yield('twitter_image', asset('logo.svg'))">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicon.png') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    
    <!-- JSON-LD Structured Data -->
    {{-- <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "Desa Cibeureum Talaga",
        "url": "https://cibeureumtalaga.id",
        "logo": "{{ asset('logo.svg') }}",
        "description": "Sistem Informasi Desa Cibeureum Talaga - Portal resmi desa dengan layanan informasi dan pelayanan online",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Desa Cibeureum",
            "addressLocality": "Talaga",
            "addressRegion": "Majalengka",
            "addressCountry": "ID"
        },
        "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "+62-xxx-xxxx-xxxx",
            "contactType": "customer service"
        },
        "sameAs": [
            "https://cibeureumtalaga.id"
        ]
    }
    </script> --}}
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
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
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        
        .animate-fadeIn {
            animation: fadeIn 0.8s ease-out forwards;
        }
        
        .glass {
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }
        
        .hover-glow:hover {
            box-shadow: 0 0 30px rgba(16, 185, 129, 0.2);
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #10b981, #34d399);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .nav-link {
            position: relative;
            transition: all 0.3s ease;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(135deg, #10b981, #34d399);
            transition: width 0.3s ease;
        }
        
        .nav-link:hover::after {
            width: 100%;
        }
    </style>
</head>
<body class="font-sans overflow-x-hidden dark:bg-dark-100 dark:text-gray-200 transition-colors duration-300">
    <!-- Maintenance Notice Banner -->
    @if(session('maintenance_notice'))
    <div class="bg-gradient-to-r from-orange-500 to-red-500 text-white p-3 text-center relative z-50">
        <div class="flex items-center justify-center">
            <i class="fas fa-tools mr-2"></i>
            <span class="font-semibold">{{ session('maintenance_notice') }}</span>
            <a href="/maintenance-preview" class="ml-4 bg-white/20 px-3 py-1 rounded-full text-sm hover:bg-white/30 transition-colors">
                Preview Halaman Maintenance
            </a>
        </div>
    </div>
    @endif

    <!-- Navigation -->
    <nav id="navbar" class="fixed top-0 w-full z-50 bg-white/95 dark:bg-gray-900/95 backdrop-blur-md shadow-lg border-b border-gray-200/50 dark:border-gray-700/50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-3 sm:py-4">
                <!-- Logo -->
                <a href="{{ route('welcome') }}"
                    class="flex items-center text-xl sm:text-2xl font-bold text-gray-900 dark:text-white hover:scale-105 transition-transform duration-300 no-underline">
                    <div class="relative">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo Cibeureum"
                            class="h-10 sm:h-12 w-auto mr-2 sm:mr-3 drop-shadow-lg animate-pulse-slow">
                        <div class="absolute inset-0 bg-village-primary/20 rounded-full blur-lg"></div>
                    </div>
                    <span
                        class="bg-gradient-to-r from-village-primary to-village-secondary bg-clip-text text-transparent font-black tracking-tight drop-shadow-lg">SiDesa</span>
                </a>

                <!-- Desktop Navigation -->
                <ul class="hidden lg:flex items-center space-x-1 xl:space-x-2">
                    <li>
                        <a href="{{ route('welcome') }}"
                           class="nav-link flex items-center text-gray-700 dark:text-gray-300 hover:text-village-primary dark:hover:text-village-secondary hover:bg-gray-100 dark:hover:bg-gray-800 px-4 xl:px-6 py-3 rounded-full transition-all duration-300 font-medium text-sm xl:text-base">
                            <i class="fas fa-home mr-1 xl:mr-2 text-sm"></i>Beranda
                        </a>
                    </li>
                    <li class="relative group">
                        <a href="#"
                           class="nav-link flex items-center text-gray-700 dark:text-gray-300 hover:text-village-primary dark:hover:text-village-secondary hover:bg-gray-100 dark:hover:bg-gray-800 px-4 xl:px-6 py-3 rounded-full transition-all duration-300 font-medium text-sm xl:text-base">
                            Informasi
                            <i class="fas fa-chevron-down ml-1 xl:ml-2 text-sm group-hover:rotate-180 transition-transform duration-300"></i>
                        </a>
                        <div class="absolute top-full left-0 mt-2 w-64 bg-white dark:bg-gray-800 shadow-xl rounded-xl p-3 border border-gray-200 dark:border-gray-600 transform -translate-y-2 opacity-0 invisible group-hover:translate-y-0 group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                            <a href="{{ route('pengumuman.public') }}" class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-700 rounded-xl transition-all duration-300 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-village-primary dark:hover:text-village-secondary">
                                <i class="fas fa-bullhorn mr-3 text-village-primary"></i>
                                <div>
                                    <div class="font-medium">Pengumuman</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">Info terbaru desa</div>
                                </div>
                            </a>
                            <a href="{{ route('agenda.public') }}" class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-700 rounded-xl transition-all duration-300 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-village-primary dark:hover:text-village-secondary mt-2">
                                <i class="fas fa-calendar-alt mr-3 text-village-primary"></i>
                                <div>
                                    <div class="font-medium">Agenda</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">Kegiatan desa</div>
                                </div>
                            </a>
                            <a href="{{ route('public.berita') }}" class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-700 rounded-xl transition-all duration-300 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-village-primary dark:hover:text-village-secondary mt-2">
                                <i class="fas fa-newspaper mr-3 text-village-primary"></i>
                                <div>
                                    <div class="font-medium">Berita</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">Berita desa</div>
                                </div>
                            </a>
                            <a href="{{ route('public.data-kependudukan') }}" class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-700 rounded-xl transition-all duration-300 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-village-primary dark:hover:text-village-secondary mt-2">
                                <i class="fas fa-users mr-3 text-village-primary"></i>
                                <div>
                                    <div class="font-medium">Data Kependudukan</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">Statistik penduduk</div>
                                </div>
                            </a>
                            <a href="{{ route('public.apbdes') }}" class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-700 rounded-xl transition-all duration-300 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-village-primary dark:hover:text-village-secondary mt-2">
                                <i class="fas fa-money-bill-wave mr-3 text-village-primary"></i>
                                <div>
                                    <div class="font-medium">APBDES</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">Anggaran desa</div>
                                </div>
                            </a>
                            <a href="{{ route('galeri.public') }}" class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-700 rounded-xl transition-all duration-300 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-village-primary dark:hover:text-village-secondary mt-2">
                                <i class="fas fa-images mr-3 text-village-primary"></i>
                                <div>
                                    <div class="font-medium">Galeri</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">Foto kegiatan</div>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="relative group">
                        <a href="#"
                           class="nav-link flex items-center text-gray-700 dark:text-gray-300 hover:text-village-primary dark:hover:text-village-secondary hover:bg-gray-100 dark:hover:bg-gray-800 px-4 xl:px-6 py-3 rounded-full transition-all duration-300 font-medium text-sm xl:text-base">
                            Tentang Desa
                            <i class="fas fa-chevron-down ml-1 xl:ml-2 text-sm group-hover:rotate-180 transition-transform duration-300"></i>
                        </a>
                        <div class="absolute top-full left-0 mt-2 w-64 bg-white dark:bg-gray-800 shadow-xl rounded-xl p-3 border border-gray-200 dark:border-gray-600 transform -translate-y-2 opacity-0 invisible group-hover:translate-y-0 group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                            <a href="{{ route('public.tentang-desa') }}" class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-700 rounded-xl transition-all duration-300 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-village-primary dark:hover:text-village-secondary">
                                <i class="fas fa-info-circle mr-3 text-village-primary"></i>
                                <div>
                                    <div class="font-medium">Profil Desa</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">Info lengkap desa</div>
                                </div>
                            </a>
                            <a href="#" class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-700 rounded-xl transition-all duration-300 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-village-primary dark:hover:text-village-secondary mt-2">
                                <i class="fas fa-sitemap mr-3 text-village-primary"></i>
                                <div>
                                    <div class="font-medium">Struktur Organisasi</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">Susunan pemerintahan</div>
                                </div>
                            </a>
                            <a href="{{ route('public.bpd') }}" class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-700 rounded-xl transition-all duration-300 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-village-primary dark:hover:text-village-secondary mt-2">
                                <i class="fas fa-users-cog mr-3 text-village-primary"></i>
                                <div>
                                    <div class="font-medium">BPD</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">Badan Permusyawaratan Desa</div>
                                </div>
                            </a>
                            <a href="{{ route('public.pembangunan') }}" class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-700 rounded-xl transition-all duration-300 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-village-primary dark:hover:text-village-secondary mt-2">
                                <i class="fas fa-hammer mr-3 text-village-primary"></i>
                                <div>
                                    <div class="font-medium">Pembangunan</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">Proyek pembangunan desa</div>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="relative group">
                        <a href="#"
                           class="nav-link flex items-center text-gray-700 dark:text-gray-300 hover:text-village-primary dark:hover:text-village-secondary hover:bg-gray-100 dark:hover:bg-gray-800 px-4 xl:px-6 py-3 rounded-full transition-all duration-300 font-medium text-sm xl:text-base">
                            IDM DESA
                            <i class="fas fa-chevron-down ml-1 xl:ml-2 text-sm group-hover:rotate-180 transition-transform duration-300"></i>
                        </a>
                        <div class="absolute top-full left-0 mt-2 w-64 bg-white dark:bg-gray-800 shadow-xl rounded-xl p-3 border border-gray-200 dark:border-gray-600 transform -translate-y-2 opacity-0 invisible group-hover:translate-y-0 group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                            <a href="{{ route('public.idm.index') }}" class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-700 rounded-xl transition-all duration-300 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-village-primary dark:hover:text-village-secondary">
                                <i class="fas fa-chart-line mr-3 text-village-primary"></i>
                                <div>
                                    <div class="font-medium">IDM Terkini</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">Status IDM desa saat ini</div>
                                </div>
                            </a>
                            <a href="{{ route('public.idm.year', 2024) }}" class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-700 rounded-xl transition-all duration-300 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-village-primary dark:hover:text-village-secondary mt-2">
                                <i class="fas fa-calendar mr-3 text-village-primary"></i>
                                <div>
                                    <div class="font-medium">IDM 2024</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">Data IDM tahun 2024</div>
                                </div>
                            </a>
                            <a href="{{ route('public.idm.year', 2023) }}" class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-700 rounded-xl transition-all duration-300 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-village-primary dark:hover:text-village-secondary mt-2">
                                <i class="fas fa-calendar mr-3 text-village-primary"></i>
                                <div>
                                    <div class="font-medium">IDM 2023</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">Data IDM tahun 2023</div>
                                </div>
                            </a>
                            <a href="{{ route('public.idm.year', 2022) }}" class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-700 rounded-xl transition-all duration-300 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-village-primary dark:hover:text-village-secondary mt-2">
                                <i class="fas fa-calendar mr-3 text-village-primary"></i>
                                <div>
                                    <div class="font-medium">IDM 2022</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">Data IDM tahun 2022</div>
                                </div>
                            </a>
                            <a href="{{ route('public.idm.year', 2021) }}" class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-700 rounded-xl transition-all duration-300 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-village-primary dark:hover:text-village-secondary mt-2">
                                <i class="fas fa-calendar mr-3 text-village-primary"></i>
                                <div>
                                    <div class="font-medium">IDM 2021</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">Data IDM tahun 2021</div>
                                </div>
                            </a>
                            <a href="{{ route('public.idm.year', 2020) }}" class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-700 rounded-xl transition-all duration-300 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-village-primary dark:hover:text-village-secondary mt-2">
                                <i class="fas fa-calendar mr-3 text-village-primary"></i>
                                <div>
                                    <div class="font-medium">IDM 2020</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">Data IDM tahun 2020</div>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="relative group">
                        <a href="#"
                           class="nav-link flex items-center text-gray-700 dark:text-gray-300 hover:text-village-primary dark:hover:text-village-secondary hover:bg-gray-100 dark:hover:bg-gray-800 px-4 xl:px-6 py-3 rounded-full transition-all duration-300 font-medium text-sm xl:text-base">
                            Pelayanan
                            <i class="fas fa-chevron-down ml-1 xl:ml-2 text-sm group-hover:rotate-180 transition-transform duration-300"></i>
                        </a>
                        <div class="absolute top-full left-0 mt-2 w-64 bg-white dark:bg-gray-800 shadow-xl rounded-xl p-3 border border-gray-200 dark:border-gray-600 transform -translate-y-2 opacity-0 invisible group-hover:translate-y-0 group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                            <a href="{{ route('public.layanan-detail') }}" class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-700 rounded-xl transition-all duration-300 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-village-primary dark:hover:text-village-secondary">
                                <i class="fas fa-file-alt mr-3 text-village-primary"></i>
                                <div>
                                    <div class="font-medium">Layanan Surat</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">Pengajuan surat online</div>
                                </div>
                            </a>
                            <a href="{{ route('public.kontak') }}" class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-700 rounded-xl transition-all duration-300 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-village-primary dark:hover:text-village-secondary mt-2">
                                <i class="fas fa-phone mr-3 text-village-primary"></i>
                                <div>
                                    <div class="font-medium">Kontak</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">Hubungi kami</div>
                                </div>
                            </a>
                        </div>
                    </li>
                </ul>

                <!-- Desktop Buttons -->
                <div class="hidden lg:flex items-center space-x-2 xl:space-x-3">
                    @auth
                        @if(Auth::user()->role === 'admin')
                            <a href="{{ route('admin.dashboard') }}"
                                class="px-4 xl:px-6 py-3 bg-gradient-to-r from-village-primary to-village-secondary text-white hover:scale-105 rounded-full transition-all duration-300 font-semibold flex items-center space-x-1 xl:space-x-2 shadow-md text-sm xl:text-base">
                                <i class="fas fa-tachometer-alt"></i>
                                <span>Dashboard</span>
                            </a>
                        @else
                            <a href="{{ route('user.dashboard') }}"
                                class="px-4 xl:px-6 py-3 bg-gradient-to-r from-village-primary to-village-secondary text-white hover:scale-105 rounded-full transition-all duration-300 font-semibold flex items-center space-x-1 xl:space-x-2 shadow-md text-sm xl:text-base">
                                <i class="fas fa-user"></i>
                                <span>Dashboard</span>
                            </a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit"
                                class="px-4 xl:px-6 py-3 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary dark:hover:text-village-secondary rounded-full transition-all duration-300 font-semibold flex items-center space-x-1 xl:space-x-2 text-sm xl:text-base">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}"
                            class="px-4 xl:px-6 py-3 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary dark:hover:text-village-secondary rounded-full transition-all duration-300 font-semibold flex items-center space-x-1 xl:space-x-2 text-sm xl:text-base">
                            <i class="fas fa-sign-in-alt"></i>
                            <span>Masuk</span>
                        </a>
                        <a href="{{ route('register') }}"
                            class="px-4 xl:px-6 py-3 bg-gradient-to-r from-village-primary to-village-secondary text-white hover:scale-105 rounded-full transition-all duration-300 font-semibold flex items-center space-x-1 xl:space-x-2 shadow-md text-sm xl:text-base">
                            <i class="fas fa-user-plus"></i>
                            <span>Daftar</span>
                        </a>
                    @endauth
                    <button onclick="toggleTheme()"
                        class="px-3 xl:px-4 py-3 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary dark:hover:text-village-secondary rounded-full transition-all duration-300 flex items-center space-x-1 xl:space-x-2">
                        <i class="fas fa-moon" id="theme-icon"></i>
                        <span id="theme-text" class="text-sm font-medium hidden xl:inline">Dark</span>
                    </button>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-toggle"
                    class="lg:hidden border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 p-2.5 sm:p-3 rounded-full text-lg sm:text-xl focus:outline-none transition-all duration-300">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div id="nav-mobile"
            class="lg:hidden fixed top-full left-0 right-0 bg-white/95 dark:bg-gray-900/95 backdrop-blur-md border-t border-gray-200 dark:border-gray-700 shadow-xl max-h-[calc(100vh-4rem)] overflow-y-auto z-40 transform -translate-y-full opacity-0 invisible transition-all duration-300">
            <div class="py-4 sm:py-6">
                <ul class="space-y-2 px-4">
                    <li>
                        <a href="{{ route('welcome') }}"
                            class="block px-4 sm:px-6 py-3 sm:py-4 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary dark:hover:text-village-secondary border border-gray-200 dark:border-gray-600 hover:border-village-primary dark:hover:border-village-secondary rounded-xl transition-all duration-300 font-medium text-sm sm:text-base">
                            <i class="fas fa-home mr-3"></i>Beranda
                        </a>
                    </li>
                    <li class="mobile-dropdown">
                        <button onclick="toggleMobileDropdown('informasi')"
                            class="w-full flex items-center justify-between px-4 sm:px-6 py-3 sm:py-4 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary dark:hover:text-village-secondary border border-gray-200 dark:border-gray-600 hover:border-village-primary dark:hover:border-village-secondary rounded-xl transition-all duration-300 font-medium text-sm sm:text-base">
                            <span><i class="fas fa-info mr-3"></i>Informasi</span>
                            <i class="fas fa-chevron-down transition-transform duration-300" id="informasi-icon"></i>
                        </button>
                        <div id="informasi-dropdown" class="overflow-hidden max-h-0 transition-all duration-300">
                            <div class="mt-2 space-y-1 pl-2 sm:pl-4">
                                <a href="{{ route('pengumuman.public') }}"
                                    class="block px-4 sm:px-6 py-2 sm:py-3 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary dark:hover:text-village-secondary border-l-2 border-village-primary/50 hover:border-village-primary rounded-r-lg transition-all duration-300 text-sm sm:text-base">
                                    <i class="fas fa-bullhorn mr-3 text-village-primary"></i>Pengumuman
                                </a>
                                <a href="{{ route('agenda.public') }}"
                                    class="block px-4 sm:px-6 py-2 sm:py-3 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary dark:hover:text-village-secondary border-l-2 border-village-primary/50 hover:border-village-primary rounded-r-lg transition-all duration-300 text-sm sm:text-base">
                                    <i class="fas fa-calendar-alt mr-3 text-village-primary"></i>Agenda
                                </a>
                                <a href="{{ route('public.berita') }}"
                                    class="block px-4 sm:px-6 py-2 sm:py-3 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary dark:hover:text-village-secondary border-l-2 border-village-primary/50 hover:border-village-primary rounded-r-lg transition-all duration-300 text-sm sm:text-base">
                                    <i class="fas fa-newspaper mr-3 text-village-primary"></i>Berita
                                </a>
                                <a href="{{ route('public.data-kependudukan') }}"
                                    class="block px-4 sm:px-6 py-2 sm:py-3 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary dark:hover:text-village-secondary border-l-2 border-village-primary/50 hover:border-village-primary rounded-r-lg transition-all duration-300 text-sm sm:text-base">
                                    <i class="fas fa-users mr-3 text-village-primary"></i>Data Kependudukan
                                </a>
                                <a href="{{ route('public.apbdes') }}"
                                    class="block px-4 sm:px-6 py-2 sm:py-3 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary dark:hover:text-village-secondary border-l-2 border-village-primary/50 hover:border-village-primary rounded-r-lg transition-all duration-300 text-sm sm:text-base">
                                    <i class="fas fa-money-bill-wave mr-3 text-village-primary"></i>APBDES
                                </a>
                                <a href="{{ route('galeri.public') }}"
                                    class="block px-4 sm:px-6 py-2 sm:py-3 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary dark:hover:text-village-secondary border-l-2 border-village-primary/50 hover:border-village-primary rounded-r-lg transition-all duration-300 text-sm sm:text-base">
                                    <i class="fas fa-images mr-3 text-village-primary"></i>Galeri
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="mobile-dropdown">
                        <button onclick="toggleMobileDropdown('tentang-desa')"
                            class="w-full flex items-center justify-between px-4 sm:px-6 py-3 sm:py-4 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary dark:hover:text-village-secondary border border-gray-200 dark:border-gray-600 hover:border-village-primary dark:hover:border-village-secondary rounded-xl transition-all duration-300 font-medium text-sm sm:text-base">
                            <span><i class="fas fa-building mr-3"></i>Tentang Desa</span>
                            <i class="fas fa-chevron-down transition-transform duration-300" id="tentang-desa-icon"></i>
                        </button>
                        <div id="tentang-desa-dropdown" class="overflow-hidden max-h-0 transition-all duration-300">
                            <div class="mt-2 space-y-1 pl-2 sm:pl-4">
                                <a href="{{ route('public.tentang-desa') }}"
                                    class="block px-4 sm:px-6 py-2 sm:py-3 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary dark:hover:text-village-secondary border-l-2 border-village-primary/50 hover:border-village-primary rounded-r-lg transition-all duration-300 text-sm sm:text-base">
                                    <i class="fas fa-info-circle mr-3 text-village-primary"></i>Profil Desa
                                </a>
                                <a href="#"
                                    class="block px-4 sm:px-6 py-2 sm:py-3 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary dark:hover:text-village-secondary border-l-2 border-village-primary/50 hover:border-village-primary rounded-r-lg transition-all duration-300 text-sm sm:text-base">
                                    <i class="fas fa-sitemap mr-3 text-village-primary"></i>Struktur Organisasi
                                </a>
                                <a href="{{ route('public.bpd') }}"
                                    class="block px-4 sm:px-6 py-2 sm:py-3 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary dark:hover:text-village-secondary border-l-2 border-village-primary/50 hover:border-village-primary rounded-r-lg transition-all duration-300 text-sm sm:text-base">
                                    <i class="fas fa-users-cog mr-3 text-village-primary"></i>BPD
                                </a>
                                <a href="{{ route('public.pembangunan') }}"
                                    class="block px-4 sm:px-6 py-2 sm:py-3 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary dark:hover:text-village-secondary border-l-2 border-village-primary/50 hover:border-village-primary rounded-r-lg transition-all duration-300 text-sm sm:text-base">
                                    <i class="fas fa-hammer mr-3 text-village-primary"></i>Pembangunan
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="mobile-dropdown">
                        <button onclick="toggleMobileDropdown('idm-desa')"
                            class="w-full flex items-center justify-between px-4 sm:px-6 py-3 sm:py-4 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary dark:hover:text-village-secondary border border-gray-200 dark:border-gray-600 hover:border-village-primary dark:hover:border-village-secondary rounded-xl transition-all duration-300 font-medium text-sm sm:text-base">
                            <span><i class="fas fa-chart-line mr-3"></i>IDM DESA</span>
                            <i class="fas fa-chevron-down transition-transform duration-300" id="idm-desa-icon"></i>
                        </button>
                        <div id="idm-desa-dropdown" class="overflow-hidden max-h-0 transition-all duration-300">
                            <div class="mt-2 space-y-1 pl-2 sm:pl-4">
                                <a href="{{ route('public.idm.index') }}"
                                    class="block px-4 sm:px-6 py-2 sm:py-3 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary dark:hover:text-village-secondary border-l-2 border-village-primary/50 hover:border-village-primary rounded-r-lg transition-all duration-300 text-sm sm:text-base">
                                    <i class="fas fa-chart-line mr-3 text-village-primary"></i>IDM Terkini
                                </a>
                                <a href="{{ route('public.idm.year', 2024) }}"
                                    class="block px-4 sm:px-6 py-2 sm:py-3 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary dark:hover:text-village-secondary border-l-2 border-village-primary/50 hover:border-village-primary rounded-r-lg transition-all duration-300 text-sm sm:text-base">
                                    <i class="fas fa-calendar mr-3 text-village-primary"></i>IDM 2024
                                </a>
                                <a href="{{ route('public.idm.year', 2023) }}"
                                    class="block px-4 sm:px-6 py-2 sm:py-3 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary dark:hover:text-village-secondary border-l-2 border-village-primary/50 hover:border-village-primary rounded-r-lg transition-all duration-300 text-sm sm:text-base">
                                    <i class="fas fa-calendar mr-3 text-village-primary"></i>IDM 2023
                                </a>
                                <a href="{{ route('public.idm.year', 2022) }}"
                                    class="block px-4 sm:px-6 py-2 sm:py-3 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary dark:hover:text-village-secondary border-l-2 border-village-primary/50 hover:border-village-primary rounded-r-lg transition-all duration-300 text-sm sm:text-base">
                                    <i class="fas fa-calendar mr-3 text-village-primary"></i>IDM 2022
                                </a>
                                <a href="{{ route('public.idm.year', 2021) }}"
                                    class="block px-4 sm:px-6 py-2 sm:py-3 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary dark:hover:text-village-secondary border-l-2 border-village-primary/50 hover:border-village-primary rounded-r-lg transition-all duration-300 text-sm sm:text-base">
                                    <i class="fas fa-calendar mr-3 text-village-primary"></i>IDM 2021
                                </a>
                                <a href="{{ route('public.idm.year', 2020) }}"
                                    class="block px-4 sm:px-6 py-2 sm:py-3 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary dark:hover:text-village-secondary border-l-2 border-village-primary/50 hover:border-village-primary rounded-r-lg transition-all duration-300 text-sm sm:text-base">
                                    <i class="fas fa-calendar mr-3 text-village-primary"></i>IDM 2020
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="mobile-dropdown">
                        <button onclick="toggleMobileDropdown('pelayanan')"
                            class="w-full flex items-center justify-between px-4 sm:px-6 py-3 sm:py-4 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary dark:hover:text-village-secondary border border-gray-200 dark:border-gray-600 hover:border-village-primary dark:hover:border-village-secondary rounded-xl transition-all duration-300 font-medium text-sm sm:text-base">
                            <span><i class="fas fa-hands-helping mr-3"></i>Pelayanan</span>
                            <i class="fas fa-chevron-down transition-transform duration-300" id="pelayanan-icon"></i>
                        </button>
                        <div id="pelayanan-dropdown" class="overflow-hidden max-h-0 transition-all duration-300">
                            <div class="mt-2 space-y-1 pl-2 sm:pl-4">
                                <a href="{{ route('public.layanan-detail') }}"
                                    class="block px-4 sm:px-6 py-2 sm:py-3 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary dark:hover:text-village-secondary border-l-2 border-village-primary/50 hover:border-village-primary rounded-r-lg transition-all duration-300 text-sm sm:text-base">
                                    <i class="fas fa-file-alt mr-3 text-village-primary"></i>Layanan Surat
                                </a>
                                <a href="{{ route('public.kontak') }}"
                                    class="block px-4 sm:px-6 py-2 sm:py-3 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary dark:hover:text-village-secondary border-l-2 border-village-primary/50 hover:border-village-primary rounded-r-lg transition-all duration-300 text-sm sm:text-base">
                                    <i class="fas fa-phone mr-3 text-village-primary"></i>Kontak
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="px-4 mt-4 sm:mt-6 space-y-3">
                    @auth
                        @if(Auth::user()->role === 'admin')
                            <a href="{{ route('admin.dashboard') }}"
                                class="block w-full px-4 sm:px-6 py-3 text-center bg-gradient-to-r from-village-primary to-village-secondary text-white rounded-full transition-all duration-300 font-semibold shadow-md text-sm sm:text-base">
                                <i class="fas fa-tachometer-alt mr-2"></i>Dashboard Admin
                            </a>
                        @else
                            <a href="{{ route('user.dashboard') }}"
                                class="block w-full px-4 sm:px-6 py-3 text-center bg-gradient-to-r from-village-primary to-village-secondary text-white rounded-full transition-all duration-300 font-semibold shadow-md text-sm sm:text-base">
                                <i class="fas fa-user mr-2"></i>Dashboard
                            </a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="block w-full px-4 sm:px-6 py-3 text-center border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary dark:hover:text-village-secondary rounded-full transition-all duration-300 font-semibold text-sm sm:text-base">
                                <i class="fas fa-sign-out-alt mr-2"></i>Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}"
                            class="block w-full px-4 sm:px-6 py-3 text-center border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary dark:hover:text-village-secondary rounded-full transition-all duration-300 font-semibold text-sm sm:text-base">
                            <i class="fas fa-sign-in-alt mr-2"></i>Masuk
                        </a>
                        <a href="{{ route('register') }}"
                            class="block w-full px-4 sm:px-6 py-3 text-center bg-gradient-to-r from-village-primary to-village-secondary text-white rounded-full transition-all duration-300 font-semibold shadow-md text-sm sm:text-base">
                            <i class="fas fa-user-plus mr-2"></i>Daftar
                        </a>
                    @endauth
                    <button onclick="toggleTheme()"
                        class="block w-full px-4 sm:px-6 py-3 text-center border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary dark:hover:text-village-secondary rounded-full transition-all duration-300 font-semibold text-sm sm:text-base">
                        <i class="fas fa-moon mr-2" id="theme-icon-mobile"></i>
                        <span id="theme-text-mobile">Mode Gelap</span>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12 mt-16">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <div class="flex items-center mb-6">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo Cibeureum" class="h-10 w-auto mr-3">
                        <span class="text-xl font-bold">Desa Cibeureum</span>
                    </div>
                    <p class="text-gray-300 leading-relaxed">
                        Sistem Informasi Desa Cibeureum hadir untuk memberikan pelayanan terbaik kepada masyarakat melalui platform digital yang modern dan transparan.
                    </p>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold mb-6">Tautan Cepat</h3>
                    <ul class="space-y-3">
                        <li><a href="{{ route('welcome') }}" class="text-gray-300 hover:text-village-primary transition-colors">Beranda</a></li>
                        <li><a href="{{ route('pengumuman.public') }}" class="text-gray-300 hover:text-village-primary transition-colors">Pengumuman</a></li>
                        <li><a href="{{ route('agenda.public') }}" class="text-gray-300 hover:text-village-primary transition-colors">Agenda</a></li>
                        <li><a href="{{ route('galeri.public') }}" class="text-gray-300 hover:text-village-primary transition-colors">Galeri</a></li>
                        <li><a href="{{ route('public.data-kependudukan') }}" class="text-gray-300 hover:text-village-primary transition-colors">Data Kependudukan</a></li>
                        <li><a href="{{ route('public.apbdes') }}" class="text-gray-300 hover:text-village-primary transition-colors">APBDES</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold mb-6">Kontak</h3>
                    <div class="space-y-3">
                        <div class="flex items-center">
                            <i class="fas fa-map-marker-alt text-village-primary mr-3"></i>
                            <span class="text-gray-300">Desa Cibeureum, Kecamatan Talaga</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-phone text-village-primary mr-3"></i>
                            <span class="text-gray-300">(021) 1234-5678</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-envelope text-village-primary mr-3"></i>
                            <span class="text-gray-300">info@cibeureum.id</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-700 mt-8 pt-8 text-center">
                <p class="text-gray-300">
                    © {{ date('Y') }} Desa Cibeureum. Semua hak cipta dilindungi.
                </p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-toggle').addEventListener('click', function() {
            const navMobile = document.getElementById('nav-mobile');
            navMobile.classList.toggle('-translate-y-full');
            navMobile.classList.toggle('opacity-0');
            navMobile.classList.toggle('invisible');
        });

        // Mobile dropdown toggle
        function toggleMobileDropdown(dropdownName) {
            const dropdown = document.getElementById(dropdownName + '-dropdown');
            const icon = document.getElementById(dropdownName + '-icon');
            
            if (dropdown.style.maxHeight === '0px' || dropdown.style.maxHeight === '') {
                dropdown.style.maxHeight = dropdown.scrollHeight + 'px';
                icon.classList.add('rotate-180');
            } else {
                dropdown.style.maxHeight = '0px';
                icon.classList.remove('rotate-180');
            }
        }

        // Theme toggle
        function toggleTheme() {
            const html = document.documentElement;
            const themeIcon = document.getElementById('theme-icon');
            const themeText = document.getElementById('theme-text');
            const themeIconMobile = document.getElementById('theme-icon-mobile');
            const themeTextMobile = document.getElementById('theme-text-mobile');
            
            if (html.classList.contains('dark')) {
                html.classList.remove('dark');
                themeIcon.classList.remove('fa-sun');
                themeIcon.classList.add('fa-moon');
                themeText.textContent = 'Dark';
                themeIconMobile.classList.remove('fa-sun');
                themeIconMobile.classList.add('fa-moon');
                themeTextMobile.textContent = 'Mode Gelap';
                localStorage.setItem('theme', 'light');
            } else {
                html.classList.add('dark');
                themeIcon.classList.remove('fa-moon');
                themeIcon.classList.add('fa-sun');
                themeText.textContent = 'Light';
                themeIconMobile.classList.remove('fa-moon');
                themeIconMobile.classList.add('fa-sun');
                themeTextMobile.textContent = 'Mode Terang';
                localStorage.setItem('theme', 'dark');
            }
        }

        // Initialize theme
        document.addEventListener('DOMContentLoaded', function() {
            const theme = localStorage.getItem('theme');
            if (theme === 'dark' || (!theme && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
                const themeIcon = document.getElementById('theme-icon');
                const themeText = document.getElementById('theme-text');
                const themeIconMobile = document.getElementById('theme-icon-mobile');
                const themeTextMobile = document.getElementById('theme-text-mobile');
                
                themeIcon.classList.remove('fa-moon');
                themeIcon.classList.add('fa-sun');
                themeText.textContent = 'Light';
                themeIconMobile.classList.remove('fa-moon');
                themeIconMobile.classList.add('fa-sun');
                themeTextMobile.textContent = 'Mode Terang';
            }
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(e) {
            const navMobile = document.getElementById('nav-mobile');
            const mobileToggle = document.getElementById('mobile-menu-toggle');
            
            if (!navMobile.contains(e.target) && !mobileToggle.contains(e.target)) {
                navMobile.classList.add('-translate-y-full');
                navMobile.classList.add('opacity-0');
                navMobile.classList.add('invisible');
            }
        });
    </script>
    
    @stack('scripts')
</body>
</html>
