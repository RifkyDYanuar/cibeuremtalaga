<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <meta name="theme-color" content="#10b981">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    
    <!-- SEO Meta Tags -->
    <title>Desa Cibeureum Talaga - Sistem Informasi Desa Terpadu | Portal Resmi</title>
    <meta name="description" content="Portal resmi Desa Cibeureum Talaga, Kecamatan Talaga, Kabupaten Majalengka. Layanan informasi desa, pengumuman, agenda, APBDES, data kependudukan, dan pelayanan surat online.">
    <meta name="keywords" content="desa cibeureum talaga, sistem informasi desa, pengumuman desa, agenda desa, apbdes, data kependudukan, layanan surat online, talaga majalengka, pemerintah desa">
    <meta name="author" content="Desa Cibeureum Talaga">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://cibeureumtalaga.id">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="Desa Cibeureum Talaga - Portal Resmi Sistem Informasi Desa">
    <meta property="og:description" content="Portal resmi Desa Cibeureum Talaga dengan layanan informasi dan pelayanan online untuk masyarakat. Akses pengumuman, agenda, APBDES, dan layanan surat online.">
    <meta property="og:url" content="https://cibeureumtalaga.id">
    <meta property="og:image" content="{{ asset('logo.svg') }}">
    <meta property="og:site_name" content="Desa Cibeureum Talaga">
    <meta property="og:locale" content="id_ID">
    
    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Desa Cibeureum Talaga - Portal Resmi Sistem Informasi Desa">
    <meta name="twitter:description" content="Portal resmi Desa Cibeureum Talaga dengan layanan informasi dan pelayanan online untuk masyarakat.">
    <meta name="twitter:image" content="{{ asset('logo.svg') }}">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('logo.svg') }}">
    
    <!-- JSON-LD Structured Data -->
    {{-- <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "WebSite",
            "name": "Desa Cibeureum Talaga",
            "url": "https://cibeureumtalaga.id",
            "description": "Portal resmi Desa Cibeureum Talaga, Kecamatan Talaga, Kabupaten Majalengka.",
            "potentialAction": {
                "@type": "SearchAction",
                "target": "https://cibeureumtalaga.id/?s={search_term_string}",
                "query-input": "required name=search_term_string"
            }
        }
    </script> --}}

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
                            '0%': {
                                opacity: '0',
                                transform: 'translateY(20px)'
                            },
                            '100%': {
                                opacity: '1',
                                transform: 'translateY(0)'
                            }
                        },
                        slideUp: {
                            '0%': {
                                opacity: '0',
                                transform: 'translateY(30px)'
                            },
                            '100%': {
                                opacity: '1',
                                transform: 'translateY(0)'
                            }
                        },
                        slideDown: {
                            '0%': {
                                opacity: '0',
                                transform: 'translateY(-20px)'
                            },
                            '100%': {
                                opacity: '1',
                                transform: 'translateY(0)'
                            }
                        },
                        float: {
                            '0%, 100%': {
                                transform: 'translateY(0px)'
                            },
                            '50%': {
                                transform: 'translateY(-10px)'
                            }
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

        /* Custom animations and utilities */
        .animate-fadeIn {
            animation: fadeIn 0.8s ease-out forwards;
        }

        .animate-slideUp {
            animation: slideUp 0.6s ease-out forwards;
        }

        /* Navbar scroll effects */
        #navbar {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        #navbar.navbar-scrolled {
            backdrop-filter: blur(20px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        /* Ensure proper text contrast */
        .nav-link {
            transition: all 0.3s ease;
        }

        /* Mobile navbar background */
        #nav-mobile {
            backdrop-filter: blur(16px);
        }

        /* Hero background dengan parallax effect */
        .hero-bg {
            background-image: url('{{ asset('images/cibeureum.jpg') }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        /* Mobile optimization for hero background */
        @media (max-width: 768px) {
            .hero-bg {
                background-attachment: scroll;
                min-height: 100vh;
            }
            
            /* Improve text readability on mobile */
            .hero-bg h1 {
                line-height: 1.2;
            }
            
            .hero-bg p {
                line-height: 1.5;
            }
        }

        /* Glassmorphism effect */
        .glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .glass-dark {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        /* Improved contrast for green text */
        .text-village-secondary {
            color: rgb(16, 185, 129);
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }

        /* Ensure good contrast on dark backgrounds */
        .dark .text-village-secondary,
        .bg-gray-900 .text-village-secondary,
        .hero-bg .text-village-secondary {
            color: rgb(52, 211, 153) !important;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
        }

        /* Ensure good contrast on light backgrounds */
        .bg-white .text-village-secondary,
        .bg-gray-50 .text-village-secondary {
            color: rgb(5, 150, 105) !important;
            text-shadow: none;
        }

        /* Line clamp utility for text overflow */
        .line-clamp-2 {
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
            line-height: 1.4;
            max-height: 2.8em;
        }

        /* Enhanced card hover effects */
        .hover-glow:hover {
            box-shadow: 0 25px 50px -12px rgba(16, 185, 129, 0.25);
        }

        /* Konsisten card styling untuk struktur desa */
        #struktur .grid>div:not(.max-w-md) {
            /* Override untuk semua card perangkat desa kecuali kepala desa */
        }

        #struktur .grid>div:not(.max-w-md) img {
            height: 12rem !important;
            /* 48 = h-48 */
        }

        #struktur .grid>div:not(.max-w-md) .p-6 {
            padding: 1rem !important;
            /* p-4 */
        }

        #struktur .grid>div:not(.max-w-md) h3 {
            font-size: 1rem !important;
            /* text-base */
            margin-bottom: 0.25rem !important;
        }

        #struktur .grid>div:not(.max-w-md) .mb-4 {
            margin-bottom: 0.75rem !important;
            /* mb-3 */
            font-size: 0.75rem !important;
            /* text-xs */
        }

        #struktur .grid>div:not(.max-w-md) .space-y-2 {
            gap: 0.25rem !important;
            /* space-y-1 */
        }

        #struktur .grid>div:not(.max-w-md) .space-y-2 div {
            font-size: 0.75rem !important;
            /* text-xs */
        }

        #struktur .grid>div:not(.max-w-md) .top-4 {
            top: 0.75rem !important;
            /* top-3 */
        }

        #struktur .grid>div:not(.max-w-md) .right-4 {
            right: 0.75rem !important;
            /* right-3 */
        }

        #struktur .grid>div:not(.max-w-md) .text-sm {
            font-size: 0.75rem !important;
            /* text-xs */
        }

        /* Navbar styles */
        .navbar-scrolled {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .dark .navbar-scrolled {
            background: rgba(15, 23, 42, 0.95) !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }

        /* Navbar scrolled text colors */
        .navbar-scrolled .nav-link {
            color: #1f2937 !important;
        }

        .navbar-scrolled .nav-link:hover {
            color: #10b981 !important;
            background: rgba(16, 185, 129, 0.1) !important;
        }

        .dark .navbar-scrolled .nav-link {
            color: #f8fafc !important;
        }

        .dark .navbar-scrolled .nav-link:hover {
            color: #34d399 !important;
        }

        .navbar-scrolled .logo-text {
            background: linear-gradient(135deg, #10b981, #34d399, #059669) !important;
            -webkit-background-clip: text !important;
            -webkit-text-fill-color: transparent !important;
            background-clip: text !important;
        }

        /* Smooth scroll behavior */
        html {
            scroll-behavior: smooth;
        }

        /* Custom gradient text */
        .gradient-text {
            background: linear-gradient(135deg, #10b981, #34d399, #059669);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        /* Fallback for better visibility */
        .gradient-text-fallback {
            color: #10b981;
            transition: all 0.3s ease;
        }

        /* Ensure visibility on all backgrounds */
        @supports not (-webkit-background-clip: text) {
            .gradient-text {
                color: #10b981 !important;
                text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            }
        }

        /* Hover glow effect */
        .hover-glow {
            transition: all 0.3s ease;
        }

        .hover-glow:hover {
            box-shadow: 0 20px 40px rgba(16, 185, 129, 0.3);
            transform: translateY(-5px);
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

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #059669, #10b981);
        }

        /* Dark mode scrollbar */
        .dark ::-webkit-scrollbar-track {
            background: #1e293b;
        }

        /* Animated background particles */
        .particles {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .particle {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }

        .particle:nth-child(1) {
            left: 10%;
            width: 4px;
            height: 4px;
            animation-delay: 0s;
        }

        .particle:nth-child(2) {
            left: 20%;
            width: 6px;
            height: 6px;
            animation-delay: 1s;
        }

        .particle:nth-child(3) {
            left: 30%;
            width: 3px;
            height: 3px;
            animation-delay: 2s;
        }

        .particle:nth-child(4) {
            left: 40%;
            width: 5px;
            height: 5px;
            animation-delay: 3s;
        }

        .particle:nth-child(5) {
            left: 50%;
            width: 4px;
            height: 4px;
            animation-delay: 4s;
        }

        .particle:nth-child(6) {
            left: 60%;
            width: 6px;
            height: 6px;
            animation-delay: 5s;
        }

        .particle:nth-child(7) {
            left: 70%;
            width: 3px;
            height: 3px;
            animation-delay: 6s;
        }

        .particle:nth-child(8) {
            left: 80%;
            width: 5px;
            height: 5px;
            animation-delay: 7s;
        }

        .particle:nth-child(9) {
            left: 90%;
            width: 4px;
            height: 4px;
            animation-delay: 8s;
        }

        /* Mobile dropdown styles */
        .mobile-dropdown .overflow-hidden {
            transition: max-height 0.3s ease-out;
        }

        .mobile-dropdown .transition-transform {
            transition: transform 0.3s ease;
        }

        /* Ensure mobile menu is clickable */
        #nav-mobile {
            pointer-events: auto;
        }

        #nav-mobile.invisible {
            pointer-events: none;
        }

        #nav-mobile.visible {
            pointer-events: auto;
        }

        /* Dark mode improvements */
        .dark {
            color-scheme: dark;
        }

        .dark body {
            background-color: #0f172a;
            color: #e2e8f0;
        }

        .dark #navbar {
            background-color: rgba(17, 24, 39, 0.95);
            border-bottom-color: rgba(75, 85, 99, 0.5);
        }

        .dark #nav-mobile {
            background-color: rgba(17, 24, 39, 0.95);
            border-top-color: rgba(75, 85, 99, 1);
        }

        /* Ensure theme transitions are smooth */
        html {
            transition: color-scheme 0.3s ease;
        }

        body {
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        #navbar, #nav-mobile {
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        /* Fix theme button text visibility */
        .dark #theme-text {
            color: #e2e8f0 !important;
        }

        .dark #theme-text-mobile {
            color: #e2e8f0 !important;
        }
    </style>
</head>

<body class="font-sans overflow-x-hidden dark:bg-dark-100 dark:text-gray-200 transition-colors duration-300">
    <!-- Navigation -->
    <nav id="navbar" class="fixed top-0 w-full z-50 bg-white/95 dark:bg-gray-900/95 backdrop-blur-md shadow-lg border-b border-gray-200/50 dark:border-gray-700/50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-3 sm:py-4">
                <!-- Logo dengan animasi -->
                <a href="{{ route('welcome') }}"
                    class="flex items-center text-xl sm:text-2xl font-bold text-gray-900 dark:text-white hover:scale-105 transition-transform duration-300 no-underline">
                    <div class="relative">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo SiDesa"
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
                            class="nav-link text-gray-700 dark:text-gray-300 hover:text-village-primary dark:hover:text-village-secondary hover:bg-gray-100 dark:hover:bg-gray-800 px-4 xl:px-6 py-3 rounded-full transition-all duration-300 font-medium text-sm xl:text-base">
                            <i class="fas fa-home mr-1 xl:mr-2"></i>Beranda
                        </a>
                    </li>
                    <li class="relative group">
                        <a href="#"
                            class="nav-link flex items-center text-gray-700 dark:text-gray-300 hover:text-village-primary dark:hover:text-village-secondary hover:bg-gray-100 dark:hover:bg-gray-800 px-4 xl:px-6 py-3 rounded-full transition-all duration-300 font-medium text-sm xl:text-base">
                            Tentang Desa
                            <i class="fas fa-chevron-down ml-1 xl:ml-2 text-sm group-hover:rotate-180 transition-transform duration-300"></i>
                        </a>
                        <div class="absolute top-full left-0 mt-2 w-64 bg-white dark:bg-gray-800 shadow-xl rounded-xl p-3 border border-gray-200 dark:border-gray-600 transform -translate-y-2 opacity-0 invisible group-hover:translate-y-0 group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                            <a href="/tentang" class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-700 rounded-xl transition-all duration-300 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-village-primary dark:hover:text-village-secondary">
                                <i class="fas fa-building text-village-primary mr-3 w-4 text-center"></i>
                                <span class="font-medium">Profil Desa</span>
                            </a>
                            <a href="#struktur" class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-700 rounded-xl transition-all duration-300 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-village-primary dark:hover:text-village-secondary mt-2">
                                <i class="fas fa-users text-village-primary mr-3 w-4 text-center"></i>
                                <span class="font-medium">Struktur Organisasi</span>
                            </a>
                            <a href="{{ route('public.bpd') }}" class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-700 rounded-xl transition-all duration-300 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-village-primary dark:hover:text-village-secondary mt-2">
                                <i class="fas fa-users-cog text-village-primary mr-3 w-4 text-center"></i>
                                <span class="font-medium">BPD</span>
                            </a>
                            <a href="{{ route('public.pembangunan') }}" class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-700 rounded-xl transition-all duration-300 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-village-primary dark:hover:text-village-secondary mt-2">
                                <i class="fas fa-hammer text-village-primary mr-3 w-4 text-center"></i>
                                <span class="font-medium">Pembangunan</span>
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
                                <i class="fas fa-file-alt text-village-primary mr-3 w-4 text-center"></i>
                                <span class="font-medium">Pengajuan Surat</span>
                            </a>
                            <a href="{{ route('public.kontak') }}" class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-700 rounded-xl transition-all duration-300 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-village-primary dark:hover:text-village-secondary mt-2">
                                <i class="fas fa-phone text-village-primary mr-3 w-4 text-center"></i>
                                <span class="font-medium">Kontak</span>
                            </a>
                        </div>
                    </li>
                    <li class="relative group">
                        <a href="#"
                            class="nav-link flex items-center text-gray-700 dark:text-gray-300 hover:text-village-primary dark:hover:text-village-secondary hover:bg-gray-100 dark:hover:bg-gray-800 px-4 xl:px-6 py-3 rounded-full transition-all duration-300 font-medium text-sm xl:text-base">
                            Informasi
                            <i class="fas fa-chevron-down ml-1 xl:ml-2 text-sm group-hover:rotate-180 transition-transform duration-300"></i>
                        </a>
                        <div class="absolute top-full left-0 mt-2 w-64 bg-white dark:bg-gray-800 shadow-xl rounded-xl p-3 border border-gray-200 dark:border-gray-600 transform -translate-y-2 opacity-0 invisible group-hover:translate-y-0 group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                            <a href="{{ route('pengumuman.public') }}" class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-700 rounded-xl transition-all duration-300 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-village-primary dark:hover:text-village-secondary">
                                <i class="fas fa-bullhorn text-village-primary mr-3 w-4 text-center"></i>
                                <span class="font-medium">Pengumuman</span>
                            </a>
                            <a href="{{ route('agenda.public') }}" class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-700 rounded-xl transition-all duration-300 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-village-primary dark:hover:text-village-secondary mt-2">
                                <i class="fas fa-calendar-alt text-village-primary mr-3 w-4 text-center"></i>
                                <span class="font-medium">Agenda</span>
                            </a>
                            <a href="{{ route('public.berita') }}" class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-700 rounded-xl transition-all duration-300 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-village-primary dark:hover:text-village-secondary mt-2">
                                <i class="fas fa-newspaper text-village-primary mr-3 w-4 text-center"></i>
                                <span class="font-medium">Berita</span>
                            </a>
                            <a href="{{ route('public.data-kependudukan') }}" class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-700 rounded-xl transition-all duration-300 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-village-primary dark:hover:text-village-secondary mt-2">
                                <i class="fas fa-users text-village-primary mr-3 w-4 text-center"></i>
                                <span class="font-medium">Data Kependudukan</span>
                            </a>
                            <a href="{{ route('public.apbdes') }}" class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-700 rounded-xl transition-all duration-300 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-village-primary dark:hover:text-village-secondary mt-2">
                                <i class="fas fa-money-bill-wave text-village-primary mr-3 w-4 text-center"></i>
                                <span class="font-medium">APBDES</span>
                            </a>
                            <a href="{{ route('galeri.public') }}" class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-700 rounded-xl transition-all duration-300 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-village-primary dark:hover:text-village-secondary mt-2">
                                <i class="fas fa-images text-village-primary mr-3 w-4 text-center"></i>
                                <span class="font-medium">Galeri</span>
                            </a>
                        </div>
                    </li>
                </ul>

                <!-- Desktop Buttons -->
                <div class="hidden lg:flex items-center space-x-2 xl:space-x-3">
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
                        <button onclick="toggleMobileDropdown('tentang')"
                            class="w-full flex items-center justify-between px-4 sm:px-6 py-3 sm:py-4 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary dark:hover:text-village-secondary border border-gray-200 dark:border-gray-600 hover:border-village-primary dark:hover:border-village-secondary rounded-xl transition-all duration-300 font-medium text-sm sm:text-base">
                            <span><i class="fas fa-building mr-3"></i>Tentang Desa</span>
                            <i class="fas fa-chevron-down transition-transform duration-300" id="tentang-icon"></i>
                        </button>
                        <div id="tentang-dropdown" class="overflow-hidden max-h-0 transition-all duration-300">
                            <div class="mt-2 space-y-1 pl-2 sm:pl-4">
                                <a href="/tentang"
                                    class="block px-4 sm:px-6 py-2 sm:py-3 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary dark:hover:text-village-secondary border-l-2 border-village-primary/50 hover:border-village-primary rounded-r-lg transition-all duration-300 text-sm sm:text-base">
                                    <i class="fas fa-info-circle mr-3 text-village-primary"></i>Profil Desa
                                </a>
                                <a href="#struktur"
                                    class="block px-4 sm:px-6 py-2 sm:py-3 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary dark:hover:text-village-secondary border-l-2 border-village-primary/50 hover:border-village-primary rounded-r-lg transition-all duration-300 text-sm sm:text-base">
                                    <i class="fas fa-users mr-3 text-village-primary"></i>Struktur Organisasi
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
                        <button onclick="toggleMobileDropdown('pelayanan')"
                            class="w-full flex items-center justify-between px-4 sm:px-6 py-3 sm:py-4 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary dark:hover:text-village-secondary border border-gray-200 dark:border-gray-600 hover:border-village-primary dark:hover:border-village-secondary rounded-xl transition-all duration-300 font-medium text-sm sm:text-base">
                            <span><i class="fas fa-hands-helping mr-3"></i>Pelayanan</span>
                            <i class="fas fa-chevron-down transition-transform duration-300" id="pelayanan-icon"></i>
                        </button>
                        <div id="pelayanan-dropdown" class="overflow-hidden max-h-0 transition-all duration-300">
                            <div class="mt-2 space-y-1 pl-2 sm:pl-4">
                                <a href="{{ route('public.layanan-detail') }}"
                                    class="block px-4 sm:px-6 py-2 sm:py-3 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary dark:hover:text-village-secondary border-l-2 border-village-primary/50 hover:border-village-primary rounded-r-lg transition-all duration-300 text-sm sm:text-base">
                                    <i class="fas fa-file-alt mr-3 text-village-primary"></i>Pengajuan Surat
                                </a>
                                <a href="#services"
                                    class="block px-4 sm:px-6 py-2 sm:py-3 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary dark:hover:text-village-secondary border-l-2 border-village-primary/50 hover:border-village-primary rounded-r-lg transition-all duration-300 text-sm sm:text-base">
                                    <i class="fas fa-calendar-check mr-3 text-village-primary"></i>Jadwal Pelayanan
                                </a>
                                <a href="#contact"
                                    class="block px-4 sm:px-6 py-2 sm:py-3 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary dark:hover:text-village-secondary border-l-2 border-village-primary/50 hover:border-village-primary rounded-r-lg transition-all duration-300 text-sm sm:text-base">
                                    <i class="fas fa-phone mr-3 text-village-primary"></i>Kontak
                                </a>
                            </div>
                        </div>
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
                              
                                <a href="{{ route('public.idm.index') }}"
                                    class="block px-4 sm:px-6 py-2 sm:py-3 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary dark:hover:text-village-secondary border-l-2 border-village-primary/50 hover:border-village-primary rounded-r-lg transition-all duration-300 text-sm sm:text-base">
                                    <i class="fas fa-chart-line mr-3 text-village-primary"></i>IDM DESA
                                </a>
                                <a href="{{ route('galeri.public') }}"
                                    class="block px-4 sm:px-6 py-2 sm:py-3 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary dark:hover:text-village-secondary border-l-2 border-village-primary/50 hover:border-village-primary rounded-r-lg transition-all duration-300 text-sm sm:text-base">
                                    <i class="fas fa-images mr-3 text-village-primary"></i>Galeri
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="px-4 mt-4 sm:mt-6 space-y-3">
                    <a href="{{ route('login') }}"
                        class="block w-full px-4 sm:px-6 py-3 text-center border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary dark:hover:text-village-secondary rounded-full transition-all duration-300 font-semibold text-sm sm:text-base">
                        <i class="fas fa-sign-in-alt mr-2"></i>Masuk
                    </a>
                    <a href="{{ route('register') }}"
                        class="block w-full px-4 sm:px-6 py-3 text-center bg-gradient-to-r from-village-primary to-village-secondary text-white rounded-full transition-all duration-300 font-semibold shadow-md text-sm sm:text-base">
                        <i class="fas fa-user-plus mr-2"></i>Daftar
                    </a>
                    <button onclick="toggleTheme()"
                        class="block w-full px-4 sm:px-6 py-3 text-center border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary dark:hover:text-village-secondary rounded-full transition-all duration-300 font-semibold text-sm sm:text-base">
                        <i class="fas fa-moon mr-2" id="theme-icon-mobile"></i>
                        <span id="theme-text-mobile">Mode Gelap</span>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-bg min-h-screen flex items-center relative overflow-hidden pt-20">
        <!-- Animated particles -->
        <div class="particles">
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
        </div>

        <div
            class="absolute inset-0 bg-black/40 backdrop-blur-[1px]">
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center text-white">
                <div class="animate-fadeIn">
                    <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-black mb-6 sm:mb-8 leading-tight">
                        <span class="block">Sistem Informasi</span>
                        <span class="block text-white drop-shadow-2xl">Desa Cibeureum</span>
                    </h1>
                </div>
                <div class="animate-slideUp" style="animation-delay: 0.3s;">
                    <p
                        class="text-lg sm:text-xl md:text-2xl lg:text-3xl mb-8 sm:mb-10 lg:mb-12 opacity-95 max-w-5xl mx-auto leading-relaxed px-2 sm:px-4 font-light">
                        Portal digital modern yang menghadirkan
                        <span class="font-semibold text-white drop-shadow-md">transparansi</span>,
                        <span class="font-semibold text-white drop-shadow-md">kemudahan</span>, dan
                        <span class="font-semibold text-white drop-shadow-md">inovasi</span>
                        dalam pelayanan masyarakat Desa Cibeureum
                    </p>
                </div>
                <div class="animate-slideUp flex flex-col sm:flex-row gap-4 sm:gap-6 justify-center items-center px-4 sm:px-6"
                    style="animation-delay: 0.6s;">
                    <a href="{{ route('register') }}"
                        class="group w-full sm:w-auto px-6 sm:px-8 lg:px-10 py-4 sm:py-5 bg-white text-village-dark hover:bg-village-primary hover:text-white border-2 border-white rounded-2xl transition-all duration-500 font-bold text-base sm:text-lg flex items-center justify-center space-x-2 sm:space-x-3 transform hover:-translate-y-2 hover:shadow-2xl shadow-village-primary/20">
                        <span class="whitespace-nowrap">Mulai Layanan Digital</span>
                        <i class="fas fa-rocket group-hover:rotate-12 transition-transform duration-300"></i>
                    </a>
                    <a href="#services"
                        class="group w-full sm:w-auto px-6 sm:px-8 lg:px-10 py-4 sm:py-5 glass border-2 border-white text-white hover:bg-white hover:text-village-dark rounded-2xl transition-all duration-500 font-bold text-base sm:text-lg flex items-center justify-center space-x-2 sm:space-x-3 transform hover:-translate-y-2">
                        <span class="whitespace-nowrap">Jelajahi Layanan</span>
                        <i class="fas fa-compass group-hover:rotate-45 transition-transform duration-300"></i>
                    </a>
                </div>

                <!-- Stats Cards -->
                <div class="animate-slideUp grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-6 mt-12 sm:mt-16 max-w-4xl mx-auto px-2 sm:px-0"
                    style="animation-delay: 0.9s;">
                    <div class="glass rounded-2xl p-4 sm:p-6 border border-white/20 hover-glow">
                        <div class="text-2xl sm:text-3xl font-bold text-white drop-shadow-md mb-2">1000+</div>
                        <div class="text-white/80 text-sm sm:text-base">Warga Terlayani</div>
                    </div>
                    <div class="glass rounded-2xl p-4 sm:p-6 border border-white/20 hover-glow">
                        <div class="text-2xl sm:text-3xl font-bold text-white drop-shadow-md mb-2">15</div>
                        <div class="text-white/80 text-sm sm:text-base">Jenis Layanan</div>
                    </div>
                    <div class="glass rounded-2xl p-4 sm:p-6 border border-white/20 hover-glow">
                        <div class="text-2xl sm:text-3xl font-bold text-white drop-shadow-md mb-2">24/7</div>
                        <div class="text-white/80 text-sm sm:text-base">Akses Online</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 text-white animate-bounce-slow">
            <i class="fas fa-chevron-down text-2xl opacity-70"></i>
        </div>
    </section>

    <!-- IDM DESA Section -->
    @if($latestIdm)
    <section class="py-16 sm:py-20 bg-gradient-to-br from-village-primary/5 to-village-secondary/5 dark:from-village-primary/10 dark:to-village-secondary/10 transition-colors duration-300" id="idm">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 sm:mb-16 animate-slideUp">
                <div class="inline-block px-4 sm:px-6 py-2 bg-village-primary/10 text-village-primary rounded-full text-sm font-semibold mb-4">
                    📊 INDEKS DESA MEMBANGUN
                </div>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-gray-900 dark:text-white mb-4 sm:mb-6">
                    Status <span class="gradient-text">IDM</span> Desa
                </h2>
                <p class="text-lg sm:text-xl text-gray-700 dark:text-gray-300 max-w-3xl mx-auto leading-relaxed px-4">
                    Indeks Desa Membangun menunjukkan tingkat kemajuan desa berdasarkan aspek sosial, ekonomi, dan lingkungan
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center">
                <!-- IDM Score Card -->
                <div class="order-2 lg:order-1">
                    <div class="bg-white dark:bg-dark-300 rounded-3xl shadow-2xl hover:shadow-3xl transform hover:-translate-y-1 transition-all duration-500 overflow-hidden border border-gray-100 dark:border-dark-400 p-8">
                        <div class="text-center mb-6">
                            <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-village-primary to-village-secondary rounded-full mb-4">
                                <i class="fas fa-chart-line text-white text-2xl"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">IDM {{ $latestIdm->tahun }}</h3>
                        </div>

                        <!-- Main Score -->
                        <div class="text-center mb-8">
                            <div class="text-6xl font-black text-transparent bg-clip-text bg-gradient-to-r from-village-primary to-village-secondary mb-2">
                                {{ number_format($latestIdm->skor_idm, 3) }}
                            </div>
                            <div class="inline-block px-6 py-3 rounded-full text-white font-bold text-lg
                                @if($latestIdm->status_idm == 'Mandiri') bg-gradient-to-r from-green-500 to-green-600
                                @elseif($latestIdm->status_idm == 'Maju') bg-gradient-to-r from-blue-500 to-blue-600
                                @elseif($latestIdm->status_idm == 'Berkembang') bg-gradient-to-r from-cyan-500 to-cyan-600
                                @elseif($latestIdm->status_idm == 'Tertinggal') bg-gradient-to-r from-yellow-500 to-yellow-600
                                @else bg-gradient-to-r from-red-500 to-red-600
                                @endif">
                                {{ $latestIdm->status_idm }}
                            </div>
                        </div>

                        <!-- Components -->
                        <div class="grid grid-cols-3 gap-4 mb-6">
                            <div class="text-center p-4 bg-red-50 dark:bg-red-900/20 rounded-xl">
                                <div class="w-10 h-10 bg-red-500 rounded-full flex items-center justify-center mx-auto mb-2">
                                    <i class="fas fa-home text-white text-sm"></i>
                                </div>
                                <div class="text-sm font-semibold text-red-600 dark:text-red-400 mb-1">IKS</div>
                                <div class="text-lg font-bold text-gray-900 dark:text-white">{{ number_format($latestIdm->skor_iks, 3) }}</div>
                            </div>
                            <div class="text-center p-4 bg-green-50 dark:bg-green-900/20 rounded-xl">
                                <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-2">
                                    <i class="fas fa-coins text-white text-sm"></i>
                                </div>
                                <div class="text-sm font-semibold text-green-600 dark:text-green-400 mb-1">IKE</div>
                                <div class="text-lg font-bold text-gray-900 dark:text-white">{{ number_format($latestIdm->skor_ike, 3) }}</div>
                            </div>
                            <div class="text-center p-4 bg-blue-50 dark:bg-blue-900/20 rounded-xl">
                                <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-2">
                                    <i class="fas fa-leaf text-white text-sm"></i>
                                </div>
                                <div class="text-sm font-semibold text-blue-600 dark:text-blue-400 mb-1">IKL</div>
                                <div class="text-lg font-bold text-gray-900 dark:text-white">{{ number_format($latestIdm->skor_ikl, 3) }}</div>
                            </div>
                        </div>

                        <!-- Action Button -->
                        <div class="text-center">
                            <a href="{{ route('public.idm.index') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-village-primary to-village-secondary text-white font-semibold rounded-xl hover:from-village-primary/90 hover:to-village-secondary/90 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl">
                                <i class="fas fa-chart-bar mr-2"></i>
                                Lihat Detail IDM
                            </a>
                        </div>
                    </div>
                </div>

                <!-- IDM Info -->
                <div class="order-1 lg:order-2">
                    <div class="space-y-6">
                        <div class="bg-white dark:bg-dark-300 rounded-2xl p-6 shadow-xl border border-gray-100 dark:border-dark-400">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 bg-red-100 dark:bg-red-900/20 rounded-xl flex items-center justify-center mr-4">
                                    <i class="fas fa-home text-red-500 text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="text-lg font-bold text-gray-900 dark:text-white">Indeks Ketahanan Sosial</h4>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Pendidikan, kesehatan, modal sosial</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white dark:bg-dark-300 rounded-2xl p-6 shadow-xl border border-gray-100 dark:border-dark-400">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 bg-green-100 dark:bg-green-900/20 rounded-xl flex items-center justify-center mr-4">
                                    <i class="fas fa-coins text-green-500 text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="text-lg font-bold text-gray-900 dark:text-white">Indeks Ketahanan Ekonomi</h4>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Keragaman produksi, akses ekonomi</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white dark:bg-dark-300 rounded-2xl p-6 shadow-xl border border-gray-100 dark:border-dark-400">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/20 rounded-xl flex items-center justify-center mr-4">
                                    <i class="fas fa-leaf text-blue-500 text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="text-lg font-bold text-gray-900 dark:text-white">Indeks Ketahanan Lingkungan</h4>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Kualitas lingkungan, infrastruktur</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Struktur Perangkat Desa Section -->
    <section
        class="py-16 sm:py-20 bg-gradient-to-br from-gray-50 to-white dark:from-dark-100 dark:to-dark-200 transition-colors duration-300"
        id="struktur">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 sm:mb-16 animate-slideUp">
                <div
                    class="inline-block px-4 sm:px-6 py-2 bg-village-primary/10 text-village-primary rounded-full text-sm font-semibold mb-4">
                    👥 PERANGKAT DESA
                </div>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-gray-900 dark:text-white mb-4 sm:mb-6">
                    Struktur <span class="gradient-text">Organisasi</span> Desa
                </h2>
                <p class="text-lg sm:text-xl text-gray-700 dark:text-gray-300 max-w-3xl mx-auto leading-relaxed px-4">
                    Berkenalan dengan perangkat desa yang siap melayani masyarakat Desa Cibeureum dengan penuh dedikasi
                    dan profesionalisme
                </p>
            </div>

            <!-- Kepala Desa - Featured -->
            <div class="mb-12 sm:mb-16 flex justify-center">
                <div
                    class="w-full max-w-md bg-white dark:bg-dark-300 rounded-3xl shadow-2xl hover:shadow-3xl transform hover:-translate-y-2 transition-all duration-500 overflow-hidden border border-gray-100 dark:border-dark-400 hover:border-village-primary/30 text-center p-6 sm:p-8">
                    <div class="relative group mb-6">
                        <img src="{{ asset('images/pakkuwu.png') }}" alt="Kepala Desa"
                            class="w-48 h-48 sm:w-60 sm:h-60 lg:w-72 lg:h-72 object-cover group-hover:scale-105 transition-transform duration-500 rounded-full mx-auto border-4 border-yellow-500 shadow-xl">
                        <div
                            class="absolute top-3 sm:top-6 right-3 sm:right-6 bg-gradient-to-r from-yellow-500 to-amber-600 text-white rounded-full p-2 sm:p-3 shadow-xl border-2 border-white">
                            <i class="fas fa-crown text-base sm:text-xl"></i>
                        </div>
                        <div class="absolute bottom-3 sm:bottom-6 left-1/2 transform -translate-x-1/2 text-white">
                            <div
                                class="bg-gradient-to-r from-yellow-500/90 to-amber-600/90 backdrop-blur-sm rounded-full px-3 sm:px-4 py-1 sm:py-2 border border-white/20">
                                <span class="text-xs sm:text-sm font-semibold">KEPALA DESA</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <h3 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white mb-2">Agus Sopar Sodik. S.IP</h3>
                        <p class="text-village-primary dark:text-village-secondary font-semibold mb-2 text-base sm:text-lg">Kepala
                            Desa</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mb-4 sm:mb-6">Periode 2020-2027</p>
                    </div>
                </div>
            </div>

            <!-- Perangkat Desa Lainnya -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-6">
                <!-- Sekretaris Desa -->
                <div
                    class="bg-white dark:bg-dark-300 rounded-2xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 overflow-hidden border border-gray-100 dark:border-dark-400 hover:border-village-primary/30">
                    <div class="relative group">
                        <img src="{{ asset('images/sekdes.png') }}" alt="Sekretaris Desa"
                            class="w-full h-56 object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <div
                            class="absolute top-3 right-3 bg-gradient-to-r from-green-600 to-emerald-700 text-white rounded-full p-2 shadow-lg">
                            <i class="fas fa-user-tie text-xs"></i>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="text-base font-bold text-gray-900 dark:text-white mb-1 line-clamp-2">Arif Hidayat.
                            M.Pd</h3>
                        <p class="text-village-primary dark:text-village-secondary font-semibold mb-3 text-xs">
                            Sekretaris Desa</p>
                    </div>
                </div>

                <!-- Kaur Keuangan -->
                <div
                    class="bg-white dark:bg-dark-300 rounded-2xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 overflow-hidden border border-gray-100 dark:border-dark-400 hover:border-village-primary/30">
                    <div class="relative group">
                        <img src="{{ asset('images/staff2.jpeg') }}" alt="Kaur Keuangan"
                            class="w-full h-56 object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <div
                            class="absolute top-3 right-3 bg-gradient-to-r from-village-primary to-village-secondary text-white rounded-full p-2 shadow-lg">
                            <i class="fas fa-calculator text-xs"></i>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="text-base font-bold text-gray-900 dark:text-white mb-1 line-clamp-2">Imanudin Soleh,
                            SS.</h3>
                        <p class="text-village-primary dark:text-village-secondary font-semibold mb-3 text-xs">Kaur
                            Keuangan</p>
                    </div>
                </div>

                <!-- Kaur Umum -->
                <div
                    class="bg-white dark:bg-dark-300 rounded-2xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 overflow-hidden border border-gray-100 dark:border-dark-400 hover:border-village-primary/30">
                    <div class="relative group">
                        <img src="{{ asset('images/staff1.jpeg') }}" alt="Kaur Tata Usaha dan Umum"
                            class="w-full h-56 object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <div
                            class="absolute top-3 right-3 bg-gradient-to-r from-purple-600 to-violet-700 text-white rounded-full p-2 shadow-lg">
                            <i class="fas fa-file-alt text-xs"></i>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="text-base font-bold text-gray-900 dark:text-white mb-1 line-clamp-2">Rd. Dini Hajah
                            Purnama Dewi, SE.</h3>
                        <p class="text-village-primary dark:text-village-secondary font-semibold mb-3 text-xs">Kaur
                            Tata Usaha dan Umum</p>
                    </div>
                </div>

                <!-- Kaur Perencanaan -->
                <div
                    class="bg-white dark:bg-dark-300 rounded-2xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 overflow-hidden border border-gray-100 dark:border-dark-400 hover:border-village-primary/30">
                    <div class="relative group">
                        <img src="{{ asset('images/staff10.jpg') }}" alt="Kaur Perencanaan"
                            class="w-full h-56 object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <div
                            class="absolute top-3 right-3 bg-gradient-to-r from-cyan-600 to-sky-700 text-white rounded-full p-2 shadow-lg">
                            <i class="fas fa-chart-line text-xs"></i>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="text-base font-bold text-gray-900 dark:text-white mb-1 line-clamp-2">Hilda Fitriani,
                            S.Pd</h3>
                        <p class="text-village-primary dark:text-village-secondary font-semibold mb-3 text-xs">Kaur
                            Perencanaan</p>
                    </div>
                </div>

                <!-- Kasi Pemerintahan -->
                <div
                    class="bg-white dark:bg-dark-300 rounded-2xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 overflow-hidden border border-gray-100 dark:border-dark-400 hover:border-village-primary/30">
                    <div class="relative group">
                        <img src="{{ asset('images/staff4.jpg') }}" alt="Kasi Pemerintahan"
                            class="w-full h-56 object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <div
                            class="absolute top-3 right-3 bg-gradient-to-r from-red-600 to-rose-700 text-white rounded-full p-2 shadow-lg">
                            <i class="fas fa-building text-xs"></i>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="text-base font-bold text-gray-900 dark:text-white mb-1 line-clamp-2">Iwan Mulyawan
                            RD</h3>
                        <p class="text-village-primary dark:text-village-secondary font-semibold mb-3 text-xs">Kasi
                            Pemerintahan</p>
                    </div>
                </div>

                <!-- Kasi Kesejahteraan -->
                <div
                    class="bg-white dark:bg-dark-300 rounded-2xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 overflow-hidden border border-gray-100 dark:border-dark-400 hover:border-village-primary/30">
                    <div class="relative group">
                        <img src="{{ asset('images/staff5.jpeg') }}" alt="Kasi Kesejahteraan"
                            class="w-full h-56 object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <div
                            class="absolute top-3 right-3 bg-gradient-to-r from-pink-600 to-rose-700 text-white rounded-full p-2 shadow-lg">
                            <i class="fas fa-heart text-xs"></i>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="text-base font-bold text-gray-900 dark:text-white mb-1 line-clamp-2">Dede Satria
                            Darajat</h3>
                        <p class="text-village-primary dark:text-village-secondary font-semibold mb-3 text-xs">Kasi
                            Kesejahteraan</p>
                    </div>
                </div>

                <!-- Kasi Pelayanan -->
                <div
                    class="bg-white dark:bg-dark-300 rounded-2xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 overflow-hidden border border-gray-100 dark:border-dark-400 hover:border-village-primary/30">
                    <div class="relative group">
                        <img src="{{ asset('images/staff6.jpeg') }}" alt="Kasi Pelayanan"
                            class="w-full h-56 object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <div
                            class="absolute top-3 right-3 bg-gradient-to-r from-village-secondary to-village-accent text-white rounded-full p-2 shadow-lg">
                            <i class="fas fa-handshake text-xs"></i>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="text-base font-bold text-gray-900 dark:text-white mb-1 line-clamp-2">Ade Iskandar
                        </h3>
                        <p class="text-village-primary dark:text-village-secondary font-semibold mb-3 text-xs">Kasi
                            Pelayanan</p>
                    </div>
                </div>

                <!-- Kadus 1 -->
                <div
                    class="bg-white dark:bg-dark-300 rounded-2xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 overflow-hidden border border-gray-100 dark:border-dark-400 hover:border-village-primary/30">
                    <div class="relative group">
                        <img src="{{ asset('images/staff7.jpeg') }}" alt="Kadus 1"
                            class="w-full h-56 object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <div
                            class="absolute top-3 right-3 bg-gradient-to-r from-orange-600 to-amber-700 text-white rounded-full p-2 shadow-lg">
                            <i class="fas fa-users text-xs"></i>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="text-base font-bold text-gray-900 dark:text-white mb-1 line-clamp-2">Ahmad Alkusaeri
                        </h3>
                        <p class="text-village-primary dark:text-village-secondary font-semibold mb-3 text-xs">Kepala
                            Dusun 1</p>
                    </div>
                </div>

                <!-- Kadus 2 -->
                <div
                    class="bg-white dark:bg-dark-300 rounded-2xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 overflow-hidden border border-gray-100 dark:border-dark-400 hover:border-village-primary/30">
                    <div class="relative group">
                        <img src="{{ asset('images/staff8.jpeg') }}" alt="Kadus 2"
                            class="w-full h-56 object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <div
                            class="absolute top-3 right-3 bg-gradient-to-r from-emerald-600 to-green-700 text-white rounded-full p-2 shadow-lg">
                            <i class="fas fa-users text-xs"></i>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="text-base font-bold text-gray-900 dark:text-white mb-1 line-clamp-2">Aceng Mulyana
                        </h3>
                        <p class="text-village-primary dark:text-village-secondary font-semibold mb-3 text-xs">Kepala
                            Dusun 2</p>
                    </div>
                </div>

                <!-- Kadus 3 -->
                <div
                    class="bg-white dark:bg-dark-300 rounded-2xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 overflow-hidden border border-gray-100 dark:border-dark-400 hover:border-village-primary/30">
                    <div class="relative group">
                        <img src="{{ asset('images/staff9.jpeg') }}" alt="Kadus 3"
                            class="w-full h-56 object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <div
                            class="absolute top-3 right-3 bg-gradient-to-r from-teal-600 to-cyan-700 text-white rounded-full p-2 shadow-lg">
                            <i class="fas fa-users text-xs"></i>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="text-base font-bold text-gray-900 dark:text-white mb-1 line-clamp-2">Didin Saepudin
                        </h3>
                        <p class="text-village-primary dark:text-village-secondary font-semibold mb-3 text-xs">Kepala
                            Dusun 3</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- CSS untuk memastikan konsistensi card -->
        <style>
            /* Card Kepala Desa */
            #struktur .mb-16 .max-w-md {
                width: 100%;
                max-width: 420px;
                min-height: 580px;
            }

            #struktur .mb-16 .h-80 {
                height: 300px !important;
                object-fit: cover;
                object-position: center;
                border-radius: 50%;
                width: 300px !important;
                margin: 0 auto 2rem auto;
            }

            /* Konsistensi ukuran card perangkat desa - Layout Bulat */
            #struktur .grid>div {
                height: auto;
                min-height: 400px;
                display: flex;
                flex-direction: column;
                align-items: center;
                text-align: center;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                transition: all 0.3s ease;
                border-radius: 2rem;
                padding: 2rem 1.5rem;
                background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(255, 255, 255, 1) 100%);
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.2);
            }

            #struktur .grid>div:hover {
                transform: translateY(-10px) scale(1.02);
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            }

            #struktur .grid>div img {
                height: 180px !important;
                width: 180px !important;
                object-fit: cover;
                object-position: center;
                border-radius: 50% !important;
                margin: 0 auto 1.5rem auto;
                transition: transform 0.3s ease;
                border: 4px solid #fff;
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            }

            #struktur .grid>div:hover img {
                transform: scale(1.1);
                box-shadow: 0 12px 35px rgba(0, 0, 0, 0.2);
            }

            #struktur .grid>div .relative {
                position: relative;
                margin-bottom: 1.5rem;
                border-radius: 50%;
                overflow: visible;
            }

            /* Remove gradient overlay for cleaner circular look */
            #struktur .grid>div .absolute.inset-0 {
                display: none;
            }

            /* Icon badge positioning for circular layout */
            #struktur .grid>div .absolute.top-3 {
                position: absolute;
                top: 10px;
                right: 10px;
                background: linear-gradient(135deg, var(--badge-from), var(--badge-to));
                border-radius: 50%;
                padding: 0.5rem;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
                border: 2px solid #fff;
            }

            #struktur .grid>div .p-4 {
                flex: 1;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                padding: 0;
                min-height: auto;
                text-align: center;
            }

            #struktur .grid>div h3 {
                font-size: 1.1rem;
                line-height: 1.3rem;
                font-weight: 700;
                margin-bottom: 0.5rem;
                min-height: auto;
                text-align: center;
                color: #1f2937;
                display: block;
                overflow: visible;
                -webkit-line-clamp: unset;
                -webkit-box-orient: unset;
            }

            #struktur .grid>div .text-xs:first-of-type {
                font-size: 0.85rem;
                margin-bottom: 1.5rem;
                min-height: auto;
                font-weight: 600;
                color: var(--village-primary);
                text-transform: uppercase;
                letter-spacing: 0.5px;
            }

            #struktur .grid>div .space-y-1 {
                margin-top: auto;
                display: flex;
                flex-direction: column;
                gap: 0.75rem;
                width: 100%;
            }

            #struktur .grid>div .space-y-1>div {
                justify-content: center;
                font-size: 0.8rem;
                padding: 0.5rem 1rem;
                background: rgba(255, 255, 255, 0.8);
                border-radius: 25px;
                border: 1px solid rgba(0, 0, 0, 0.1);
                transition: all 0.3s ease;
            }

            #struktur .grid>div .space-y-1>div:hover {
                background: rgba(255, 255, 255, 1);
                transform: translateY(-2px);
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            }

            /* Badge color variables */
            #struktur .grid>div:nth-child(1) {
                --badge-from: #059669;
                --badge-to: #047857;
            }

            #struktur .grid>div:nth-child(2) {
                --badge-from: #2563eb;
                --badge-to: #1d4ed8;
            }

            #struktur .grid>div:nth-child(3) {
                --badge-from: #7c3aed;
                --badge-to: #6d28d9;
            }

            #struktur .grid>div:nth-child(4) {
                --badge-from: #0891b2;
                --badge-to: #0e7490;
            }

            #struktur .grid>div:nth-child(5) {
                --badge-from: #dc2626;
                --badge-to: #b91c1c;
            }

            #struktur .grid>div:nth-child(6) {
                --badge-from: #ec4899;
                --badge-to: #db2777;
            }

            #struktur .grid>div:nth-child(7) {
                --badge-from: #4338ca;
                --badge-to: #3730a3;
            }

            #struktur .grid>div:nth-child(8) {
                --badge-from: #ea580c;
                --badge-to: #c2410c;
            }

            #struktur .grid>div:nth-child(9) {
                --badge-from: #059669;
                --badge-to: #047857;
            }

            #struktur .grid>div:nth-child(10) {
                --badge-from: #0d9488;
                --badge-to: #0f766e;
            }

            /* Responsive adjustments for circular layout */
            @media (max-width: 640px) {
                #struktur .mb-12.sm\\:mb-16 .w-full.max-w-md {
                    max-width: 100%;
                    margin: 0 auto;
                }

                #struktur .w-48 {
                    width: 160px !important;
                    height: 160px !important;
                }

                #struktur .grid>div {
                    min-height: 320px;
                    padding: 1rem;
                }

                #struktur .grid>div img {
                    height: 120px !important;
                    width: 120px !important;
                }
                
                /* Improve text sizes on mobile */
                #struktur .grid>div h3 {
                    font-size: 0.9rem;
                    line-height: 1.2;
                }
                
                #struktur .grid>div .text-xs {
                    font-size: 0.75rem;
                }
            }

            @media (min-width: 641px) and (max-width: 768px) {
                #struktur .w-48 {
                    width: 180px !important;
                    height: 180px !important;
                }
                
                #struktur .grid>div img {
                    height: 140px !important;
                    width: 140px !important;
                }
            }

            @media (min-width: 768px) and (max-width: 1023px) {
                #struktur .grid>div img {
                    height: 160px !important;
                    width: 160px !important;
                }
            }

            @media (min-width: 1024px) {
                #struktur .grid>div {
                    min-height: 420px;
                }

                #struktur .grid>div img {
                    height: 190px !important;
                    width: 190px !important;
                }
            }

            @media (min-width: 1280px) {
                #struktur .grid>div img {
                    height: 200px !important;
                    width: 200px !important;
                }
            }

            /* Ensure all images maintain proper aspect ratio and positioning */
            #struktur img {
                object-fit: cover !important;
                object-position: center !important;
            }

            /* Smooth transitions for hover effects */
            #struktur .grid>div .relative {
                overflow: visible;
                border-radius: 50%;
            }

            /* Dark mode support */
            .dark #struktur .grid>div {
                background: linear-gradient(135deg, rgba(31, 41, 55, 0.95) 0%, rgba(17, 24, 39, 1) 100%);
                border: 1px solid rgba(75, 85, 99, 0.3);
            }

            .dark #struktur .grid>div h3 {
                color: #f9fafb;
            }

            .dark #struktur .grid>div .space-y-1>div {
                background: rgba(31, 41, 55, 0.8);
                border: 1px solid rgba(75, 85, 99, 0.3);
            }

            .dark #struktur .grid>div .space-y-1>div:hover {
                background: rgba(31, 41, 55, 1);
            }
            
            /* Additional mobile optimizations */
            @media (max-width: 640px) {
                /* Improve button sizing on mobile */
                .hero-bg .px-6 {
                    padding-left: 1rem;
                    padding-right: 1rem;
                }
                
                /* Better mobile spacing */
                .hero-bg .space-x-2 > * + * {
                    margin-left: 0.5rem;
                }
                
                /* Improve service cards on mobile */
                .group .p-6 {
                    padding: 1.25rem;
                }
                
                /* Better mobile navigation */
                #nav-mobile {
                    max-height: calc(100vh - 80px);
                }
                
                /* Improve footer on mobile */
                footer .grid {
                    gap: 2rem;
                }
                
                /* Better text wrapping on mobile */
                .break-words {
                    word-wrap: break-word;
                }
            }
            
            /* Tablet specific optimizations */
            @media (min-width: 641px) and (max-width: 1024px) {
                .hero-bg h1 {
                    line-height: 1.1;
                }
                
                .hero-bg .space-x-2 {
                    gap: 1rem;
                }
            }
        </style>
    </section>

    <!-- Services Section -->
    <section
        class="py-16 sm:py-20 bg-gradient-to-br from-gray-50 to-white dark:from-dark-100 dark:to-dark-200 transition-colors duration-300"
        id="services">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 sm:mb-16 animate-slideUp">
                <div
                    class="inline-block px-4 sm:px-6 py-2 bg-village-primary/10 text-village-primary rounded-full text-sm font-semibold mb-4">
                    🚀 LAYANAN UNGGULAN
                </div>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-gray-900 dark:text-white mb-4 sm:mb-6">
                    Layanan <span class="gradient-text">Digital</span> Terdepan
                </h2>
                <p class="text-lg sm:text-xl text-gray-700 dark:text-gray-300 max-w-3xl mx-auto leading-relaxed px-4">
                    Transformasi digital yang menghadirkan kemudahan, kecepatan, dan transparansi dalam setiap layanan
                    untuk masyarakat Desa Cibeureum
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                <!-- Service Card 1 -->
                <div
                    class="group bg-white dark:bg-dark-300 p-6 sm:p-8 rounded-3xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 border border-gray-100 dark:border-dark-400 hover:border-village-primary/30 relative overflow-hidden">
                    <div
                        class="absolute top-0 right-0 w-24 h-24 sm:w-32 sm:h-32 bg-gradient-to-br from-village-primary/10 to-transparent rounded-full -mr-12 sm:-mr-16 -mt-12 sm:-mt-16">
                    </div>
                    <div class="relative">
                        <div
                            class="w-16 h-16 sm:w-20 sm:h-20 mx-auto mb-4 sm:mb-6 bg-gradient-to-br from-village-primary to-village-secondary rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <i class="fas fa-file-alt text-white text-xl sm:text-2xl"></i>
                        </div>
                        <h3 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white mb-3 sm:mb-4 text-center">Administrasi
                            Digital</h3>
                        <p class="text-gray-700 dark:text-gray-300 text-center leading-relaxed text-sm sm:text-base">Pembuatan surat dan
                            dokumen administrasi secara online dengan proses yang cepat dan mudah</p>
                        <div class="mt-4 sm:mt-6 text-center">
                            <a href="{{ route('public.layanan-detail') }}"
                                class="inline-flex items-center text-village-primary font-semibold hover:text-village-secondary transition-colors group-hover:translate-x-1 duration-300 text-sm sm:text-base">
                                Pelajari Lebih Lanjut <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Service Card 2 -->
                <div
                    class="group bg-white dark:bg-dark-300 p-8 rounded-3xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 border border-gray-100 dark:border-dark-400 hover:border-village-primary/30 relative overflow-hidden">
                    <div
                        class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-village-secondary/10 to-transparent rounded-full -mr-16 -mt-16">
                    </div>
                    <div class="relative">
                        <div
                            class="w-20 h-20 mx-auto mb-6 bg-gradient-to-br from-village-secondary to-village-accent rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <i class="fas fa-bullhorn text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4 text-center">Informasi
                            Real-time</h3>
                        <p class="text-gray-700 dark:text-gray-300 text-center leading-relaxed">Dapatkan update terbaru
                            tentang kegiatan, program, dan pengumuman penting dari desa</p>
                        <div class="mt-6 text-center">
                            <a href="{{ route('pengumuman.public') }}"
                                class="inline-flex items-center text-village-secondary font-semibold hover:text-village-primary transition-colors group-hover:translate-x-1 duration-300">
                                Lihat Pengumuman <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Service Card 3 -->
                <div
                    class="group bg-white dark:bg-dark-300 p-8 rounded-3xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 border border-gray-100 dark:border-dark-400 hover:border-village-primary/30 relative overflow-hidden">
                    <div
                        class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-village-primary/15 to-transparent rounded-full -mr-16 -mt-16">
                    </div>
                    <div class="relative">
                        <div
                            class="w-20 h-20 mx-auto mb-6 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <i class="fas fa-users text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4 text-center">Data Kependudukan
                        </h3>
                        <p class="text-gray-700 dark:text-gray-300 text-center leading-relaxed">Akses data demografi
                            dan statistik desa untuk perencanaan pembangunan yang tepat sasaran</p>
                        <div class="mt-6 text-center">
                            <a href="/tentang"
                                class="inline-flex items-center text-village-primary font-semibold hover:text-village-secondary transition-colors group-hover:translate-x-1 duration-300">
                                Akses Data <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Service Card 4 -->
                <div
                    class="group bg-white dark:bg-dark-300 p-8 rounded-3xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 border border-gray-100 dark:border-dark-400 hover:border-village-primary/30 relative overflow-hidden">
                    <div
                        class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-village-secondary/15 to-transparent rounded-full -mr-16 -mt-16">
                    </div>
                    <div class="relative">
                        <div
                            class="w-20 h-20 mx-auto mb-6 bg-gradient-to-br from-teal-500 to-teal-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <i class="fas fa-map-marked-alt text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4 text-center">Profil Wilayah
                        </h3>
                        <p class="text-gray-700 dark:text-gray-300 text-center leading-relaxed">Informasi komprehensif
                            tentang geografis, demografi, dan potensi unggulan Desa Cibeureum</p>
                        <div class="mt-6 text-center">
                            <a href="/tentang"
                                class="inline-flex items-center text-teal-600 font-semibold hover:text-village-secondary transition-colors group-hover:translate-x-1 duration-300">
                                Jelajahi Wilayah <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Service Card 5 -->
                <div
                    class="group bg-white dark:bg-dark-300 p-8 rounded-3xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 border border-gray-100 dark:border-dark-400 hover:border-village-primary/30 relative overflow-hidden">
                    <div
                        class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-village-accent/15 to-transparent rounded-full -mr-16 -mt-16">
                    </div>
                    <div class="relative">
                        <div
                            class="w-20 h-20 mx-auto mb-6 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <i class="fas fa-calendar-alt text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4 text-center">Agenda Terpadu
                        </h3>
                        <p class="text-gray-700 dark:text-gray-300 text-center leading-relaxed">Pantau jadwal kegiatan,
                            rapat, dan acara penting desa dalam satu platform terintegrasi</p>
                        <div class="mt-6 text-center">
                            <a href="{{ route('agenda.public') }}"
                                class="inline-flex items-center text-village-primary font-semibold hover:text-village-secondary transition-colors group-hover:translate-x-1 duration-300">
                                Lihat Agenda <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Service Card 6 -->
                <div
                    class="group bg-white dark:bg-dark-300 p-8 rounded-3xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 border border-gray-100 dark:border-dark-400 hover:border-village-primary/30 relative overflow-hidden">
                    <div
                        class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-village-light/15 to-transparent rounded-full -mr-16 -mt-16">
                    </div>
                    <div class="relative">
                        <div
                            class="w-20 h-20 mx-auto mb-6 bg-gradient-to-br from-village-dark to-village-primary rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <i class="fas fa-headset text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4 text-center">Support 24/7</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-center leading-relaxed">Layanan bantuan dan
                            konsultasi yang siap membantu masyarakat kapan saja dibutuhkan</p>
                        <div class="mt-6 text-center">
                            <a href="#contact"
                                class="inline-flex items-center text-village-dark font-semibold hover:text-village-primary transition-colors group-hover:translate-x-1 duration-300">
                                Hubungi Support <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="py-12 sm:py-16 bg-gray-50 dark:bg-gray-800 transition-colors duration-300" id="process">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8 sm:mb-12">
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-800 dark:text-white mb-4">Cara Menggunakan Sistem</h2>
                <p class="text-base sm:text-lg text-gray-600 dark:text-gray-300 max-w-3xl mx-auto px-4">Panduan mudah untuk mengakses dan
                    menggunakan berbagai layanan Sistem Informasi Desa Cibeureum.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                <div
                    class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                    <div class="flex items-start mb-4">
                        <div
                            class="w-12 h-12 bg-gradient-to-r from-village-primary to-village-secondary rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-user-plus text-white text-lg"></i>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-gray-800 dark:text-white">1. Daftar Akun</h4>
                            <p class="text-village-primary dark:text-village-secondary font-semibold">Langkah Pertama
                            </p>
                        </div>
                    </div>
                    <div class="text-gray-600 dark:text-gray-300">
                        Buat akun baru dengan mengisi formulir pendaftaran menggunakan data diri yang valid. Pastikan
                        email dan nomor telepon yang digunakan aktif untuk proses verifikasi.
                    </div>
                </div>

                <div
                    class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                    <div class="flex items-start mb-4">
                        <div
                            class="w-12 h-12 bg-gradient-to-r from-village-secondary to-village-accent rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-sign-in-alt text-white text-lg"></i>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-gray-800 dark:text-white">2. Login Sistem</h4>
                            <p class="text-village-primary dark:text-village-secondary font-semibold">Akses Masuk</p>
                        </div>
                    </div>
                    <div class="text-gray-600 dark:text-gray-300">
                        Masuk ke sistem menggunakan email dan password yang telah didaftarkan. Sistem akan
                        mengverifikasi identitas Anda untuk keamanan data dan privasi.
                    </div>
                </div>

                <div
                    class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                    <div class="flex items-start mb-4">
                        <div
                            class="w-12 h-12 bg-gradient-to-r from-emerald-500 to-emerald-600 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-file-alt text-white text-lg"></i>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-gray-800 dark:text-white">3. Pilih Layanan</h4>
                            <p class="text-village-primary dark:text-village-secondary font-semibold">Jenis Pelayanan
                            </p>
                        </div>
                    </div>
                    <div class="text-gray-600 dark:text-gray-300">
                        Pilih jenis surat atau layanan yang dibutuhkan dari menu yang tersedia. Setiap layanan memiliki
                        persyaratan dan proses yang berbeda sesuai kebutuhan.
                    </div>
                </div>

                <div
                    class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                    <div class="flex items-start mb-4">
                        <div
                            class="w-12 h-12 bg-gradient-to-r from-teal-500 to-teal-600 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-upload text-white text-lg"></i>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-gray-800 dark:text-white">4. Upload Dokumen</h4>
                            <p class="text-village-primary dark:text-village-secondary font-semibold">Lampiran Berkas
                            </p>
                        </div>
                    </div>
                    <div class="text-gray-600 dark:text-gray-300">
                        Unggah dokumen pendukung yang diperlukan sesuai dengan jenis layanan yang dipilih. Pastikan file
                        dalam format yang didukung dan ukuran tidak melebihi batas.
                    </div>
                </div>

                <div
                    class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                    <div class="flex items-start mb-4">
                        <div
                            class="w-12 h-12 bg-gradient-to-r from-green-600 to-green-700 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-clock text-white text-lg"></i>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-gray-800 dark:text-white">5. Tunggu Proses</h4>
                            <p class="text-village-primary dark:text-village-secondary font-semibold">Verifikasi Admin
                            </p>
                        </div>
                    </div>
                    <div class="text-gray-600 dark:text-gray-300">
                        Tunggu proses verifikasi dan pembuatan surat oleh petugas desa. Anda akan mendapat notifikasi
                        melalui email dan dapat memantau status pengajuan di dashboard.
                    </div>
                </div>

                <div
                    class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                    <div class="flex items-start mb-4">
                        <div
                            class="w-12 h-12 bg-gradient-to-r from-village-dark to-village-primary rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-download text-white text-lg"></i>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-gray-800 dark:text-white">6. Download Surat</h4>
                            <p class="text-village-primary dark:text-village-secondary font-semibold">Hasil Akhir</p>
                        </div>
                    </div>
                    <div class="text-gray-600 dark:text-gray-300">
                        Setelah surat selesai diproses, Anda dapat mengunduh file surat dalam format PDF atau
                        mengambilnya langsung di kantor desa sesuai pilihan yang dipilih.
                    </div>
                </div>
            </div>
        </div>
    </section> 
    
    <!-- Trust indicators -->
    <section class="py-12 sm:py-16 bg-village-primary">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 sm:gap-8 text-white/80">
                <div class="flex items-center justify-center space-x-3 text-center sm:text-left">
                    <i class="fas fa-shield-alt text-xl sm:text-2xl text-village-light"></i>
                    <span class="font-semibold text-sm sm:text-base">Keamanan Data Terjamin</span>
                </div>
                <div class="flex items-center justify-center space-x-3 text-center sm:text-left">
                    <i class="fas fa-clock text-xl sm:text-2xl text-village-accent"></i>
                    <span class="font-semibold text-sm sm:text-base">Layanan 24/7</span>
                </div>
                <div class="flex items-center justify-center space-x-3 text-center sm:text-left">
                    <i class="fas fa-award text-xl sm:text-2xl text-village-secondary"></i>
                    <span class="font-semibold text-sm sm:text-base">Terpercaya & Resmi</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact" class="bg-gray-900 text-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8">
                <div class="col-span-1 lg:col-span-1">
                    <h3 class="text-lg sm:text-xl font-bold mb-4">SiDesa - Sistem Informasi Desa</h3>
                    <p class="text-gray-300 mb-4 text-sm sm:text-base">Portal resmi Desa Cibeureum yang menyediakan informasi lengkap,
                        layanan digital, dan kemudahan akses untuk seluruh masyarakat desa.</p>
                </div>

                <div>
                    <h3 class="text-lg sm:text-xl font-bold mb-4">Layanan Utama</h3>
                    <ul class="space-y-2 text-gray-300 text-sm sm:text-base">
                        <li><a href="#services" class="hover:text-village-secondary transition-colors">Layanan
                                Administrasi</a></li>
                        <li><a href="#services" class="hover:text-village-secondary transition-colors">Informasi
                                Desa</a></li>
                        <li><a href="#struktur" class="hover:text-village-secondary transition-colors">Perangkat
                                Desa</a></li>
                        <li><a href="{{ route('agenda.public') }}" class="hover:text-village-secondary transition-colors">Agenda
                                Kegiatan</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg sm:text-xl font-bold mb-4">Halaman Lainnya</h3>
                    <ul class="space-y-2 text-gray-300 text-sm sm:text-base">
                        <li><a href="{{ route('public.tentang') }}" class="hover:text-village-secondary transition-colors">Tentang Desa</a>
                        </li>
                        <li><a href="{{ route('public.berita') }}" class="hover:text-village-secondary transition-colors">Berita &
                                Pengumuman</a></li>
                        <li><a href="{{ route('agenda.public') }}" class="hover:text-village-secondary transition-colors">Agenda</a></li>
                        <li><a href="#process" class="hover:text-village-secondary transition-colors">Cara
                                Menggunakan</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg sm:text-xl font-bold mb-4">Hubungi Kami</h3>
                    <div class="space-y-3 text-gray-300 text-sm sm:text-base">
                        <div class="flex items-start">
                            <i class="fas fa-map-marker-alt text-village-secondary mr-3 mt-0.5 flex-shrink-0"></i>
                            <span>Jl. Desa Cibeureum, Talaga, Majalengka</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-phone-alt text-village-secondary mr-3 flex-shrink-0"></i>
                            <span>(0233) 123-456</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-envelope text-village-secondary mr-3 flex-shrink-0"></i>
                            <span class="break-all">info@cibeureum.desa.id</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-700 pt-8 mt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-300 mb-4 md:mb-0">&copy; 2025 SiDesa - Desa Cibeureum. Semua hak cipta dilindungi.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-300 hover:text-village-secondary transition-colors text-xl">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-gray-300 hover:text-village-secondary transition-colors text-xl">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-300 hover:text-village-secondary transition-colors text-xl">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="text-gray-300 hover:text-village-secondary transition-colors text-xl">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu functionality
        function toggleMobileMenu() {
            const navMobile = document.getElementById('nav-mobile');
            const menuToggle = document.getElementById('mobile-menu-toggle');
            const icon = menuToggle.querySelector('i');

            if (navMobile.classList.contains('translate-y-0')) {
                // Close menu
                navMobile.classList.remove('translate-y-0', 'opacity-100', 'visible');
                navMobile.classList.add('-translate-y-full', 'opacity-0', 'invisible');
                icon.className = 'fas fa-bars';
            } else {
                // Open menu
                navMobile.classList.remove('-translate-y-full', 'opacity-0', 'invisible');
                navMobile.classList.add('translate-y-0', 'opacity-100', 'visible');
                icon.className = 'fas fa-times';
            }
        }

        // Mobile dropdown functionality
        function toggleMobileDropdown(dropdownId) {
            const dropdown = document.getElementById(dropdownId + '-dropdown');
            const icon = document.getElementById(dropdownId + '-icon');
            
            if (dropdown && icon) {
                const isOpen = dropdown.style.maxHeight && dropdown.style.maxHeight !== '0px';
                
                if (isOpen) {
                    dropdown.style.maxHeight = '0px';
                    icon.style.transform = 'rotate(0deg)';
                } else {
                    dropdown.style.maxHeight = dropdown.scrollHeight + 'px';
                    icon.style.transform = 'rotate(180deg)';
                }
            }
        }

        // Theme toggle functionality
        function toggleTheme() {
            const html = document.documentElement;
            const themeIcon = document.getElementById('theme-icon');
            const themeText = document.getElementById('theme-text');
            const themeIconMobile = document.getElementById('theme-icon-mobile');
            const themeTextMobile = document.getElementById('theme-text-mobile');
            
            if (html.classList.contains('dark')) {
                // Switch to light mode
                html.classList.remove('dark');
                if (themeIcon) {
                    themeIcon.className = 'fas fa-moon';
                }
                if (themeText) {
                    themeText.textContent = 'Dark';
                }
                if (themeIconMobile) {
                    themeIconMobile.className = 'fas fa-moon mr-2';
                }
                if (themeTextMobile) {
                    themeTextMobile.textContent = 'Mode Gelap';
                }
                localStorage.setItem('theme', 'light');
            } else {
                // Switch to dark mode
                html.classList.add('dark');
                if (themeIcon) {
                    themeIcon.className = 'fas fa-sun';
                }
                if (themeText) {
                    themeText.textContent = 'Light';
                }
                if (themeIconMobile) {
                    themeIconMobile.className = 'fas fa-sun mr-2';
                }
                if (themeTextMobile) {
                    themeTextMobile.textContent = 'Mode Terang';
                }
                localStorage.setItem('theme', 'dark');
            }
            
            // Update navbar background based on current scroll position and theme
            updateNavbarBackground();
        }

        // Function to update navbar background
        function updateNavbarBackground() {
            const navbar = document.getElementById('navbar');
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            const isDark = document.documentElement.classList.contains('dark');
            
            if (scrollTop > 50) {
                navbar.classList.add('navbar-scrolled');
                if (isDark) {
                    navbar.style.backgroundColor = 'rgba(17, 24, 39, 0.98)';
                    navbar.style.borderBottom = '1px solid rgba(75, 85, 99, 0.8)';
                } else {
                    navbar.style.backgroundColor = 'rgba(255, 255, 255, 0.98)';
                    navbar.style.borderBottom = '1px solid rgba(229, 231, 235, 0.8)';
                }
                navbar.style.backdropFilter = 'blur(20px)';
            } else {
                navbar.classList.remove('navbar-scrolled');
                if (isDark) {
                    navbar.style.backgroundColor = 'rgba(17, 24, 39, 0.95)';
                    navbar.style.borderBottom = '1px solid rgba(75, 85, 99, 0.5)';
                } else {
                    navbar.style.backgroundColor = 'rgba(255, 255, 255, 0.95)';
                    navbar.style.borderBottom = '1px solid rgba(229, 231, 235, 0.5)';
                }
                navbar.style.backdropFilter = 'blur(12px)';
            }
        }

        // Initialize theme and mobile menu
        document.addEventListener('DOMContentLoaded', function() {
            // Load saved theme or use system preference
            const savedTheme = localStorage.getItem('theme');
            const html = document.documentElement;
            const themeIcon = document.getElementById('theme-icon');
            const themeText = document.getElementById('theme-text');
            const mobileThemeIcon = document.getElementById('theme-icon-mobile');
            const mobileThemeText = document.getElementById('theme-text-mobile');

            // Initialize theme
            if (savedTheme === 'dark' || (!savedTheme && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                html.classList.add('dark');
                if (themeIcon) {
                    themeIcon.className = 'fas fa-sun';
                }
                if (themeText) {
                    themeText.textContent = 'Light';
                }
                if (mobileThemeIcon) {
                    mobileThemeIcon.className = 'fas fa-sun mr-2';
                }
                if (mobileThemeText) {
                    mobileThemeText.textContent = 'Mode Terang';
                }
                localStorage.setItem('theme', 'dark');
            } else {
                html.classList.remove('dark');
                if (themeIcon) {
                    themeIcon.className = 'fas fa-moon';
                }
                if (themeText) {
                    themeText.textContent = 'Dark';
                }
                if (mobileThemeIcon) {
                    mobileThemeIcon.className = 'fas fa-moon mr-2';
                }
                if (mobileThemeText) {
                    mobileThemeText.textContent = 'Mode Gelap';
                }
                localStorage.setItem('theme', 'light');
            }

            // Initial navbar background update
            updateNavbarBackground();

            // Navbar scroll effect
            window.addEventListener('scroll', function() {
                updateNavbarBackground();
            });

            // Listen for system theme changes
            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', function(e) {
                if (!localStorage.getItem('theme')) {
                    if (e.matches) {
                        document.documentElement.classList.add('dark');
                        if (themeIcon) themeIcon.className = 'fas fa-sun';
                        if (themeText) themeText.textContent = 'Light';
                        if (mobileThemeIcon) mobileThemeIcon.className = 'fas fa-sun mr-2';
                        if (mobileThemeText) mobileThemeText.textContent = 'Mode Terang';
                    } else {
                        document.documentElement.classList.remove('dark');
                        if (themeIcon) themeIcon.className = 'fas fa-moon';
                        if (themeText) themeText.textContent = 'Dark';
                        if (mobileThemeIcon) mobileThemeIcon.className = 'fas fa-moon mr-2';
                        if (mobileThemeText) mobileThemeText.textContent = 'Mode Gelap';
                    }
                    updateNavbarBackground();
                }
            });

            // Mobile menu toggle
            const menuToggle = document.getElementById('mobile-menu-toggle');
            if (menuToggle) {
                menuToggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    toggleMobileMenu();
                });
            }

            // Close mobile menu when clicking on links
            document.querySelectorAll('#nav-mobile a:not([onclick])').forEach(link => {
                link.addEventListener('click', function() {
                    setTimeout(() => {
                        const navMobile = document.getElementById('nav-mobile');
                        const menuToggle = document.getElementById('mobile-menu-toggle');

                        if (navMobile && menuToggle) {
                            navMobile.classList.remove('translate-y-0', 'opacity-100', 'visible');
                            navMobile.classList.add('-translate-y-full', 'opacity-0', 'invisible');
                            menuToggle.querySelector('i').className = 'fas fa-bars';
                        }
                    }, 100);
                });
            });

            // Close mobile menu when clicking outside
            document.addEventListener('click', function(event) {
                const navMobile = document.getElementById('nav-mobile');
                const menuToggle = document.getElementById('mobile-menu-toggle');

                if (navMobile && menuToggle && navMobile.classList.contains('translate-y-0')) {
                    const isClickInsideMenu = navMobile.contains(event.target);
                    const isClickOnToggle = menuToggle.contains(event.target);
                    
                    if (!isClickInsideMenu && !isClickOnToggle) {
                        navMobile.classList.remove('translate-y-0', 'opacity-100', 'visible');
                        navMobile.classList.add('-translate-y-full', 'opacity-0', 'invisible');
                        menuToggle.querySelector('i').className = 'fas fa-bars';
                    }
                }
            });
            
            // Handle window resize for mobile menu
            window.addEventListener('resize', function() {
                const navMobile = document.getElementById('nav-mobile');
                const menuToggle = document.getElementById('mobile-menu-toggle');
                
                if (window.innerWidth >= 1024 && navMobile && menuToggle) {
                    navMobile.classList.remove('translate-y-0', 'opacity-100', 'visible');
                    navMobile.classList.add('-translate-y-full', 'opacity-0', 'invisible');
                    const icon = menuToggle.querySelector('i');
                    if (icon) icon.className = 'fas fa-bars';
                }
            });

            // Initialize mobile dropdown max-heights
            const dropdowns = ['tentang-dropdown', 'pelayanan-dropdown', 'informasi-dropdown'];
            dropdowns.forEach(id => {
                const dropdown = document.getElementById(id);
                if (dropdown) {
                    dropdown.style.maxHeight = '0px';
                }
            });
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
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
    </script>
</body>

</html>
