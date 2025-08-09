<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak - SiDesa Cibeureum</title>
    <meta name="description" content="Hubungi Desa Cibeureum untuk informasi layanan, pengaduan, atau keperluan administrasi. Kami siap melayani masyarakat dengan sepenuh hati.">
    <meta name="keywords" content="kontak desa, hubungi desa, alamat desa, telepon desa, Cibeureum">
    
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

        /* Contact specific styles */
        .contact-card {
            transition: all 0.3s ease;
        }

        .contact-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .contact-icon {
            background: linear-gradient(135deg, #10b981, #34d399);
        }

        .form-input:focus {
            outline: none;
            border-color: #10b981;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
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
                            class="nav-link text-gray-700 dark:text-gray-300 hover:text-village-primary dark:hover:text-village-secondary hover:bg-gray-100 dark:hover:bg-gray-800 px-6 py-3 rounded-full transition-all duration-300 font-medium">
                            <i class="fas fa-calendar mr-2"></i>Agenda
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('public.kontak') }}"
                            class="nav-link text-white bg-village-primary hover:bg-village-secondary px-6 py-3 rounded-full transition-all duration-300 font-medium">
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
                <button id="mobile-menu-toggle"
                    class="lg:hidden border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 p-3 rounded-full text-xl focus:outline-none transition-all duration-300">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div id="nav-mobile"
            class="lg:hidden fixed top-full left-0 right-0 bg-white/95 dark:bg-gray-900/95 backdrop-blur-md border-t border-gray-200 dark:border-gray-700 shadow-xl max-h-screen overflow-y-auto z-40 transform -translate-y-full opacity-0 invisible transition-all duration-300">
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
                            class="block px-6 py-4 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary dark:hover:text-village-secondary border border-gray-200 dark:border-gray-600 hover:border-village-primary dark:hover:border-village-secondary rounded-xl transition-all duration-300 font-medium">
                            <i class="fas fa-calendar mr-3"></i>Agenda
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('public.kontak') }}"
                            class="block px-6 py-4 text-white bg-village-primary border border-village-primary rounded-xl transition-all duration-300 font-medium">
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
                    <span class="block">Hubungi</span>
                    <span class="block gradient-text">Desa Cibeureum</span>
                </h1>
            </div>
            <div class="animate-slideUp" style="animation-delay: 0.3s;">
                <p class="text-xl md:text-2xl mb-8 opacity-95 max-w-3xl mx-auto leading-relaxed hero-subtitle">
                    Sampaikan pertanyaan, saran, atau keperluan Anda kepada kami. Tim Desa Cibeureum siap membantu dengan sepenuh hati.
                </p>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-20 bg-gradient-to-br from-gray-50 to-white dark:from-dark-100 dark:to-dark-200 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-16">
                <!-- Contact Information -->
                <div class="bg-white dark:bg-dark-300 p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 contact-card">
                    <div class="text-center mb-8">
                        <div class="inline-block px-6 py-2 bg-village-primary/10 text-village-primary rounded-full text-sm font-semibold mb-4">
                            📞 INFORMASI KONTAK
                        </div>
                        <h2 class="text-3xl font-black text-gray-900 dark:text-white mb-6">
                            Hubungi <span class="gradient-text">Kami</span>
                        </h2>
                    </div>
                    
                    <div class="space-y-6">
                        <div class="flex items-start gap-4 p-4 rounded-xl hover:bg-gray-50 dark:hover:bg-dark-400 transition-all duration-300">
                            <div class="w-12 h-12 bg-gradient-to-br from-village-primary to-village-secondary rounded-full flex items-center justify-center text-white flex-shrink-0">
                                <i class="fas fa-map-marker-alt text-lg"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Alamat Kantor</h3>
                                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                                    Jl. Desa Cibeureum RT 01 RW 01<br>
                                    Desa Cibeureum, Kec. Talaga<br>
                                    Kabupaten Majalengka, Jawa Barat 45463
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4 p-4 rounded-xl hover:bg-gray-50 dark:hover:bg-dark-400 transition-all duration-300">
                            <div class="w-12 h-12 bg-gradient-to-br from-village-primary to-village-secondary rounded-full flex items-center justify-center text-white flex-shrink-0">
                                <i class="fas fa-phone text-lg"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Telepon</h3>
                                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                                    (0233) 123-456<br>
                                    +62 812-3456-7890 (WhatsApp)
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4 p-4 rounded-xl hover:bg-gray-50 dark:hover:bg-dark-400 transition-all duration-300">
                            <div class="w-12 h-12 bg-gradient-to-br from-village-primary to-village-secondary rounded-full flex items-center justify-center text-white flex-shrink-0">
                                <i class="fas fa-envelope text-lg"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Email</h3>
                                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                                    info@cibeureum.desa.id<br>
                                    kepala.desa@cibeureum.desa.id
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4 p-4 rounded-xl hover:bg-gray-50 dark:hover:bg-dark-400 transition-all duration-300">
                            <div class="w-12 h-12 bg-gradient-to-br from-village-primary to-village-secondary rounded-full flex items-center justify-center text-white flex-shrink-0">
                                <i class="fas fa-globe text-lg"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Website & Media Sosial</h3>
                                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                                    www.cibeureum.desa.id<br>
                                    @desacibeureum (Instagram)<br>
                                    Desa Cibeureum (Facebook)
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="bg-white dark:bg-dark-300 p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 contact-card">
                    <div class="text-center mb-8">
                        <div class="inline-block px-6 py-2 bg-village-primary/10 text-village-primary rounded-full text-sm font-semibold mb-4">
                            ✉️ KIRIM PESAN
                        </div>
                        <h2 class="text-3xl font-black text-gray-900 dark:text-white mb-6">
                            Hubungi <span class="gradient-text">Kami</span>
                        </h2>
                    </div>
                    
                    @if(session('success'))
                        <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg mb-6">
                            <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg mb-6">
                            <ul class="list-disc list-inside space-y-1">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form action="{{ route('public.kontak.store') }}" method="POST" id="contactForm" class="space-y-6">
                        @csrf
                        <div>
                            <label for="name" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Nama Lengkap *</label>
                            <input type="text" id="name" name="name" required
                                class="form-input w-full px-4 py-3 border-2 border-gray-200 dark:border-gray-600 rounded-lg focus:border-village-primary dark:bg-dark-400 dark:text-white transition-all duration-300">
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Email *</label>
                            <input type="email" id="email" name="email" required
                                class="form-input w-full px-4 py-3 border-2 border-gray-200 dark:border-gray-600 rounded-lg focus:border-village-primary dark:bg-dark-400 dark:text-white transition-all duration-300">
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Nomor Telepon</label>
                            <input type="tel" id="phone" name="phone"
                                class="form-input w-full px-4 py-3 border-2 border-gray-200 dark:border-gray-600 rounded-lg focus:border-village-primary dark:bg-dark-400 dark:text-white transition-all duration-300">
                        </div>

                        <div>
                            <label for="subject" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Subjek *</label>
                            <select id="subject" name="subject" required
                                class="form-input w-full px-4 py-3 border-2 border-gray-200 dark:border-gray-600 rounded-lg focus:border-village-primary dark:bg-dark-400 dark:text-white transition-all duration-300">
                                <option value="">Pilih Subjek</option>
                                <option value="layanan">Pertanyaan Layanan</option>
                                <option value="pengaduan">Pengaduan</option>
                                <option value="saran">Saran & Masukan</option>
                                <option value="administrasi">Administrasi</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Pesan *</label>
                            <textarea id="message" name="message" rows="5" placeholder="Tuliskan pesan Anda..." required
                                class="form-input w-full px-4 py-3 border-2 border-gray-200 dark:border-gray-600 rounded-lg focus:border-village-primary dark:bg-dark-400 dark:text-white transition-all duration-300 resize-none"></textarea>
                        </div>

                        <button type="submit" 
                            class="w-full bg-gradient-to-r from-village-primary to-village-secondary text-white font-semibold py-3 px-6 rounded-lg hover:from-village-secondary hover:to-village-primary transform hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-2">
                            <i class="fas fa-paper-plane"></i>
                            Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>

            <!-- Map Section -->
            <div class="bg-white dark:bg-dark-300 p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 contact-card mb-16">
                <div class="text-center mb-8">
                    <div class="inline-block px-6 py-2 bg-village-primary/10 text-village-primary rounded-full text-sm font-semibold mb-4">
                        🗺️ LOKASI KANTOR
                    </div>
                    <h2 class="text-3xl font-black text-gray-900 dark:text-white mb-6">
                        Peta <span class="gradient-text">Lokasi</span>
                    </h2>
                </div>
                <div class="relative h-96 bg-gradient-to-br from-village-primary/10 to-village-secondary/10 rounded-xl overflow-hidden">
                    <div class="absolute inset-0 flex flex-col items-center justify-center text-village-primary">
                        <i class="fas fa-map-marked-alt text-6xl mb-4"></i>
                        <h3 class="text-2xl font-bold mb-2">Peta Lokasi</h3>
                        <p class="text-lg text-center text-gray-600 dark:text-gray-400">
                            Kantor Desa Cibeureum<br>
                            Kec. Talaga, Kab. Majalengka
                        </p>
                        <small class="text-sm text-gray-500 mt-4">Google Maps akan ditampilkan di sini</small>
                    </div>
                </div>
            </div>

            <!-- Office Hours -->
            <div class="bg-white dark:bg-dark-300 p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 contact-card">
                <div class="text-center mb-8">
                    <div class="inline-block px-6 py-2 bg-village-primary/10 text-village-primary rounded-full text-sm font-semibold mb-4">
                        🕒 JAM OPERASIONAL
                    </div>
                    <h2 class="text-3xl font-black text-gray-900 dark:text-white mb-6">
                        Jam <span class="gradient-text">Pelayanan</span>
                    </h2>
                </div>
                <div class="grid gap-4">
                    <div class="flex justify-between items-center p-4 bg-gray-50 dark:bg-dark-400 rounded-xl border-l-4 border-village-primary">
                        <span class="font-semibold text-gray-900 dark:text-white">Senin - Kamis</span>
                        <span class="text-gray-600 dark:text-gray-300">08:00 - 16:00 WIB</span>
                    </div>
                    <div class="flex justify-between items-center p-4 bg-gray-50 dark:bg-dark-400 rounded-xl border-l-4 border-village-secondary">
                        <span class="font-semibold text-gray-900 dark:text-white">Jumat</span>
                        <span class="text-gray-600 dark:text-gray-300">08:00 - 11:30 WIB</span>
                    </div>
                    <div class="flex justify-between items-center p-4 bg-gray-50 dark:bg-dark-400 rounded-xl border-l-4 border-red-500">
                        <span class="font-semibold text-gray-900 dark:text-white">Sabtu - Minggu</span>
                        <span class="text-red-600 dark:text-red-400">Tutup</span>
                    </div>
                    <div class="flex justify-between items-center p-4 bg-gray-50 dark:bg-dark-400 rounded-xl border-l-4 border-yellow-500">
                        <span class="font-semibold text-gray-900 dark:text-white">Hari Libur Nasional</span>
                        <span class="text-yellow-600 dark:text-yellow-400">Tutup</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Dark mode toggle
        function toggleTheme() {
            const html = document.documentElement;
            const themeIcon = document.getElementById('theme-icon');
            const themeText = document.getElementById('theme-text');
            const themeIconMobile = document.getElementById('theme-icon-mobile');
            const themeTextMobile = document.getElementById('theme-text-mobile');
            const navbar = document.getElementById('navbar');
            
            if (html.classList.contains('dark')) {
                html.classList.remove('dark');
                themeIcon.className = 'fas fa-moon';
                themeText.textContent = 'Dark';
                if (themeIconMobile) {
                    themeIconMobile.className = 'fas fa-moon mr-2';
                    themeTextMobile.textContent = 'Mode Gelap';
                }
                localStorage.setItem('theme', 'light');
                
                // Update navbar for light mode
                setTimeout(() => {
                    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                    if (scrollTop > 50) {
                        navbar.style.backgroundColor = 'rgba(255, 255, 255, 0.98)';
                        navbar.style.borderBottom = '1px solid rgba(229, 231, 235, 0.8)';
                    } else {
                        navbar.style.backgroundColor = 'rgba(255, 255, 255, 0.95)';
                        navbar.style.borderBottom = '1px solid rgba(229, 231, 235, 0.5)';
                    }
                }, 50);
            } else {
                html.classList.add('dark');
                themeIcon.className = 'fas fa-sun';
                themeText.textContent = 'Light';
                if (themeIconMobile) {
                    themeIconMobile.className = 'fas fa-sun mr-2';
                    themeTextMobile.textContent = 'Mode Terang';
                }
                localStorage.setItem('theme', 'dark');
                
                // Update navbar for dark mode
                setTimeout(() => {
                    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                    if (scrollTop > 50) {
                        navbar.style.backgroundColor = 'rgba(17, 24, 39, 0.98)';
                        navbar.style.borderBottom = '1px solid rgba(75, 85, 99, 0.8)';
                    } else {
                        navbar.style.backgroundColor = 'rgba(17, 24, 39, 0.95)';
                        navbar.style.borderBottom = '1px solid rgba(75, 85, 99, 0.5)';
                    }
                }, 50);
            }
        }

        function updateThemeIcons(theme) {
            const themeIcon = document.getElementById('theme-icon');
            const themeText = document.getElementById('theme-text');
            const themeIconMobile = document.getElementById('theme-icon-mobile');
            const themeTextMobile = document.getElementById('theme-text-mobile');
            
            if (theme === 'dark') {
                if (themeIcon) themeIcon.className = 'fas fa-sun';
                if (themeText) themeText.textContent = 'Light';
                if (themeIconMobile) themeIconMobile.className = 'fas fa-sun mr-2';
                if (themeTextMobile) themeTextMobile.textContent = 'Mode Terang';
            } else {
                if (themeIcon) themeIcon.className = 'fas fa-moon';
                if (themeText) themeText.textContent = 'Dark';
                if (themeIconMobile) themeIconMobile.className = 'fas fa-moon mr-2';
                if (themeTextMobile) themeTextMobile.textContent = 'Mode Gelap';
            }
        }

        // Initialize theme
        document.addEventListener('DOMContentLoaded', function() {
            const savedTheme = localStorage.getItem('theme');
            const systemDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            const theme = savedTheme || (systemDark ? 'dark' : 'light');
            
            if (theme === 'dark') {
                document.documentElement.classList.add('dark');
            }
            updateThemeIcons(theme);

            // Navbar scroll effect - Always visible
            let lastScrollTop = 0;
            const navbar = document.getElementById('navbar');
            
            window.addEventListener('scroll', function() {
                let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                
                // Make navbar more opaque when scrolling
                if (scrollTop > 50) {
                    navbar.classList.add('navbar-scrolled');
                    navbar.style.backgroundColor = 'rgba(255, 255, 255, 0.98)';
                    navbar.style.backdropFilter = 'blur(20px)';
                    navbar.style.borderBottom = '1px solid rgba(229, 231, 235, 0.8)';
                } else {
                    navbar.classList.remove('navbar-scrolled');
                    navbar.style.backgroundColor = 'rgba(255, 255, 255, 0.95)';
                    navbar.style.backdropFilter = 'blur(12px)';
                    navbar.style.borderBottom = '1px solid rgba(229, 231, 235, 0.5)';
                }
                
                // Dark mode handling
                if (document.documentElement.classList.contains('dark')) {
                    if (scrollTop > 50) {
                        navbar.style.backgroundColor = 'rgba(17, 24, 39, 0.98)';
                        navbar.style.borderBottom = '1px solid rgba(75, 85, 99, 0.8)';
                    } else {
                        navbar.style.backgroundColor = 'rgba(17, 24, 39, 0.95)';
                        navbar.style.borderBottom = '1px solid rgba(75, 85, 99, 0.5)';
                    }
                }
                
                lastScrollTop = scrollTop;
            });

            // Mobile menu toggle
            const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
            const navMobile = document.getElementById('nav-mobile');

            if (mobileMenuToggle && navMobile) {
                mobileMenuToggle.addEventListener('click', function() {
                    const isVisible = navMobile.classList.contains('opacity-100');
                    
                    if (isVisible) {
                        navMobile.classList.remove('opacity-100', 'visible', 'translate-y-0');
                        navMobile.classList.add('opacity-0', 'invisible', '-translate-y-full');
                        this.querySelector('i').className = 'fas fa-bars';
                    } else {
                        navMobile.classList.remove('opacity-0', 'invisible', '-translate-y-full');
                        navMobile.classList.add('opacity-100', 'visible', 'translate-y-0');
                        this.querySelector('i').className = 'fas fa-times';
                    }
                });

                // Close mobile menu when clicking outside
                document.addEventListener('click', function(e) {
                    if (!mobileMenuToggle.contains(e.target) && !navMobile.contains(e.target)) {
                        navMobile.classList.remove('opacity-100', 'visible', 'translate-y-0');
                        navMobile.classList.add('opacity-0', 'invisible', '-translate-y-full');
                        mobileMenuToggle.querySelector('i').className = 'fas fa-bars';
                    }
                });
            }
        });

        // Smooth scrolling for anchor links
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
    </script>
</body>
</html>
