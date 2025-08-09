<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Desa Cibeureum - SiDesa</title>
    <meta name="description" content="Profil lengkap Desa Cibeureum, Talaga, Majalengka - Visi, Misi, Sejarah, dan Potensi Desa">
    <meta name="keywords" content="profil desa cibeureum, sejarah desa, visi misi desa, potensi desa, talaga majalengka">
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

        /* Remove conflicting navbar styles and add enhanced transitions */
        #navbar {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Custom gradient text */
        .gradient-text {
            background: linear-gradient(135deg, #10b981, #34d399, #059669);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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
    </style>
</head>
<body class="font-sans overflow-x-hidden dark:bg-dark-100 dark:text-gray-200 transition-colors duration-300">
    <!-- Navigation -->
    <nav id="navbar" class="fixed top-0 w-full z-50 bg-white/95 dark:bg-gray-900/95 backdrop-blur-md shadow-lg border-b border-gray-200/50 dark:border-gray-700/50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <!-- Logo -->
                <a href="{{ route('welcome') }}"
                    class="flex items-center text-2xl font-bold text-gray-900 dark:text-white hover:text-village-primary transition-colors duration-300 no-underline">
                    <div class="relative">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo SiDesa"
                            class="h-12 w-auto mr-3 drop-shadow-lg">
                    </div>
                    <span class="bg-gradient-to-r from-village-primary to-village-secondary bg-clip-text text-transparent font-black tracking-tight drop-shadow-lg">
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
                    <li class="relative group">
                        <a href="#"
                            class="nav-link flex items-center text-gray-700 dark:text-gray-300 bg-village-primary text-white px-6 py-3 rounded-full transition-all duration-300 font-medium">
                            <i class="fas fa-info-circle mr-2"></i>
                            <span class="font-semibold">Tentang Desa</span>
                            <i class="fas fa-chevron-down ml-2 text-sm group-hover:rotate-180 transition-transform duration-300"></i>
                        </a>
                        <div class="absolute top-full left-0 mt-2 w-64 bg-white/95 dark:bg-gray-900/95 backdrop-blur-md shadow-xl rounded-xl p-3 border border-gray-200/50 dark:border-gray-700/50 transform -translate-y-2 opacity-0 invisible group-hover:translate-y-0 group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                            <a href="/tentang" class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 bg-village-primary text-white rounded-xl transition-all duration-300">
                                <i class="fas fa-building text-white mr-3 w-4 text-center"></i>
                                <span class="font-medium">Profil Desa</span>
                            </a>
                        </div>
                    </li>
                </ul>

                <!-- Desktop Buttons -->
                <div class="hidden lg:flex items-center space-x-3">
                    <a href="{{ route('login') }}"
                        class="px-6 py-3 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-full transition-all duration-300 font-semibold flex items-center space-x-2">
                        <i class="fas fa-sign-in-alt"></i>
                        <span>Masuk</span>
                    </a>
                    <a href="{{ route('register') }}"
                        class="px-6 py-3 bg-gradient-to-r from-village-primary to-village-secondary text-white hover:shadow-lg hover:scale-105 rounded-full transition-all duration-300 font-semibold flex items-center space-x-2">
                        <i class="fas fa-user-plus"></i>
                        <span>Daftar</span>
                    </a>
                    <button onclick="toggleTheme()"
                        class="px-4 py-3 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-full transition-all duration-300 flex items-center space-x-2 ml-3">
                        <i class="fas fa-moon" id="theme-icon"></i>
                        <span id="theme-text" class="text-sm font-medium">Dark</span>
                    </button>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-toggle"
                    class="lg:hidden border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 p-3 rounded-full text-xl focus:outline-none transition-all duration-300">
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
                            class="block px-6 py-4 bg-village-primary text-white border border-village-primary rounded-xl transition-all duration-300 font-medium">
                            <i class="fas fa-info-circle mr-3"></i>
                            <span class="font-semibold">Tentang Desa</span>
                        </a>
                    </li>
                </ul>
                <div class="px-4 mt-6 space-y-3">
                    <a href="{{ route('login') }}"
                        class="block w-full px-6 py-3 text-center border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-full transition-all duration-300 font-semibold">
                        <i class="fas fa-sign-in-alt mr-2"></i>Masuk
                    </a>
                    <a href="{{ route('register') }}"
                        class="block w-full px-6 py-3 text-center bg-gradient-to-r from-village-primary to-village-secondary text-white rounded-full transition-all duration-300 font-semibold">
                        <i class="fas fa-user-plus mr-2"></i>Daftar
                    </a>
                    <button onclick="toggleTheme()"
                        class="block w-full px-6 py-3 text-center border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-full transition-all duration-300 font-semibold">
                        <i class="fas fa-moon mr-2" id="theme-icon-mobile"></i>
                        <span id="theme-text-mobile">Mode Gelap</span>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden" 
             style="background-image: url('{{ asset('images/cibeureum.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <!-- Shadow Overlay -->
        <div class="absolute inset-0 bg-black/40 backdrop-blur-[1px]"></div>

        <!-- Hero Content -->
        <div class="relative z-10 max-w-7xl mx-auto px-4 text-center text-white">
            <div class="animate-slideUp">
                <div class="inline-block px-6 py-2 bg-white/10 backdrop-blur-md text-white rounded-full text-sm font-semibold mb-6 border border-white/20">
                    <i class="fas fa-info-circle mr-2"></i>PROFIL DESA
                </div>
                <h1 class="hero-text text-6xl md:text-8xl font-black mb-6 leading-tight">
                    Tentang <span class="text-village-primary drop-shadow-lg">Desa Cibeureum</span>
                </h1>
                <p class="hero-subtitle text-xl md:text-2xl text-white/90 max-w-4xl mx-auto leading-relaxed mb-12">
                    Mengenal lebih dekat dengan <span class="font-semibold">Desa Cibeureum, Talaga</span> - 
                    Desa yang terus berkembang dengan <span class="font-semibold text-village-accent">pelayanan digital terdepan</span> 
                    dan komitmen membangun <span class="font-semibold text-village-secondary">masyarakat yang sejahtera</span>
                </p>
            </div>
        </div>

        <!-- Scroll indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 text-white animate-bounce">
            <i class="fas fa-chevron-down text-2xl opacity-70"></i>
        </div>
    </section>

    <!-- Profil Desa Section -->
    <section class="py-20 bg-gradient-to-br from-gray-50 to-white dark:from-dark-100 dark:to-dark-200 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Text Content -->
                <div class="animate-slideUp">
                    <div class="inline-block px-6 py-2 bg-village-primary/10 text-village-primary rounded-full text-sm font-semibold mb-6">
                        <i class="fas fa-building mr-2"></i>PROFIL DESA
                    </div>
                    <h2 class="text-5xl font-black text-gray-900 dark:text-white mb-6">
                        Profil <span class="text-village-primary">Desa Cibeureum</span>
                    </h2>
                    <div class="space-y-6 text-lg text-gray-700 dark:text-gray-300 leading-relaxed">
                        <p>Desa Cibeureum adalah salah satu desa yang terletak di Kecamatan Talaga, Kabupaten Majalengka, Provinsi Jawa Barat. Desa ini memiliki karakteristik wilayah yang strategis dengan akses transportasi yang memadai serta potensi sumber daya alam dan manusia yang berkualitas.</p>
                        
                        <p>Dengan semangat gotong royong dan kebersamaan yang masih terjaga, masyarakat Desa Cibeureum terus berupaya membangun desanya menjadi lebih maju dan sejahtera. Berbagai program pembangunan dan pelayanan publik terus dikembangkan untuk meningkatkan kualitas hidup masyarakat.</p>
                        
                        <p>Dalam era digital ini, Desa Cibeureum berkomitmen untuk memberikan pelayanan yang lebih baik melalui sistem informasi desa yang terintegrasi dan mudah diakses oleh seluruh masyarakat.</p>
                    </div>
                </div>

                <!-- Image -->
                <div class="animate-slideUp">
                    <div class="relative group">
                        <div class="absolute inset-0 bg-gradient-to-r from-village-primary to-village-secondary rounded-3xl transform rotate-3 group-hover:rotate-6 transition-transform duration-300"></div>
                        <div class="relative bg-white dark:bg-dark-300 rounded-3xl overflow-hidden shadow-2xl transform -rotate-1 group-hover:rotate-0 transition-transform duration-300">
                            <img src="{{ asset('images/cibeureum.jpg') }}" alt="Kantor Desa Cibeureum"
                                class="w-full h-96 object-cover group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                            <div class="absolute bottom-6 left-6 right-6">
                                <div class="glass text-white rounded-2xl p-4 border border-white/20">
                                    <div class="flex items-center">
                                        <i class="fas fa-building text-village-accent text-2xl mr-3"></i>
                                        <div>
                                            <h4 class="font-bold text-lg">Kantor Desa Cibeureum</h4>
                                            <p class="text-white/80 text-sm">Pusat Pelayanan Masyarakat</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="py-20 bg-gradient-to-br from-village-light to-village-accent/30 dark:from-dark-200 dark:to-dark-300 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16 animate-slideUp">
                <div class="inline-block px-6 py-2 bg-village-primary/10 text-village-primary rounded-full text-sm font-semibold mb-6">
                    <i class="fas fa-chart-bar mr-2"></i>DATA DESA
                </div>
                <h2 class="text-5xl font-black text-gray-900 dark:text-white mb-6">
                    Data <span class="text-village-primary">Desa Cibeureum</span>
                </h2>
                <p class="text-xl text-gray-700 dark:text-gray-300 max-w-3xl mx-auto leading-relaxed">
                    Informasi statistik dan data kependudukan Desa Cibeureum
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Stat Card 1 -->
                <div class="group bg-white dark:bg-dark-300 p-8 rounded-3xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 border border-gray-100 dark:border-dark-400 hover:border-village-primary/30 animate-slideUp">
                    <div class="flex items-center justify-between mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-village-primary to-village-secondary rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <i class="fas fa-users text-white text-2xl"></i>
                        </div>
                        <div class="text-right">
                            <div class="text-3xl font-black text-gray-900 dark:text-white">3.245</div>
                            <div class="text-sm text-gray-500 dark:text-gray-400 font-medium">Total Penduduk</div>
                        </div>
                    </div>
                    <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                        <div class="bg-gradient-to-r from-village-primary to-village-secondary h-2 rounded-full" style="width: 85%"></div>
                    </div>
                </div>

                <!-- Stat Card 2 -->
                <div class="group bg-white dark:bg-dark-300 p-8 rounded-3xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 border border-gray-100 dark:border-dark-400 hover:border-village-primary/30 animate-slideUp">
                    <div class="flex items-center justify-between mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <i class="fas fa-home text-white text-2xl"></i>
                        </div>
                        <div class="text-right">
                            <div class="text-3xl font-black text-gray-900 dark:text-white">1.156</div>
                            <div class="text-sm text-gray-500 dark:text-gray-400 font-medium">Kepala Keluarga</div>
                        </div>
                    </div>
                    <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                        <div class="bg-gradient-to-r from-green-500 to-green-600 h-2 rounded-full" style="width: 70%"></div>
                    </div>
                </div>

                <!-- Stat Card 3 -->
                <div class="group bg-white dark:bg-dark-300 p-8 rounded-3xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 border border-gray-100 dark:border-dark-400 hover:border-village-primary/30 animate-slideUp">
                    <div class="flex items-center justify-between mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <i class="fas fa-chart-area text-white text-2xl"></i>
                        </div>
                        <div class="text-right">
                            <div class="text-3xl font-black text-gray-900 dark:text-white">245.8</div>
                            <div class="text-sm text-gray-500 dark:text-gray-400 font-medium">Luas (Hektar)</div>
                        </div>
                    </div>
                    <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                        <div class="bg-gradient-to-r from-purple-500 to-purple-600 h-2 rounded-full" style="width: 60%"></div>
                    </div>
                </div>

                <!-- Stat Card 4 -->
                <div class="group bg-white dark:bg-dark-300 p-8 rounded-3xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 border border-gray-100 dark:border-dark-400 hover:border-village-primary/30 animate-slideUp">
                    <div class="flex items-center justify-between mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <i class="fas fa-map-marked-alt text-white text-2xl"></i>
                        </div>
                        <div class="text-right">
                            <div class="text-3xl font-black text-gray-900 dark:text-white">8 RW</div>
                            <div class="text-sm text-gray-500 dark:text-gray-400 font-medium">Rukun Warga</div>
                        </div>
                    </div>
                    <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                        <div class="bg-gradient-to-r from-orange-500 to-orange-600 h-2 rounded-full" style="width: 40%"></div>
                    </div>
                </div>

                <!-- Stat Card 5 -->
                <div class="group bg-white dark:bg-dark-300 p-8 rounded-3xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 border border-gray-100 dark:border-dark-400 hover:border-village-primary/30 animate-slideUp">
                    <div class="flex items-center justify-between mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-red-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <i class="fas fa-flag text-white text-2xl"></i>
                        </div>
                        <div class="text-right">
                            <div class="text-3xl font-black text-gray-900 dark:text-white">24 RT</div>
                            <div class="text-sm text-gray-500 dark:text-gray-400 font-medium">Rukun Tetangga</div>
                        </div>
                    </div>
                    <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                        <div class="bg-gradient-to-r from-red-500 to-red-600 h-2 rounded-full" style="width: 90%"></div>
                    </div>
                </div>

                <!-- Stat Card 6 -->
                <div class="group bg-white dark:bg-dark-300 p-8 rounded-3xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 border border-gray-100 dark:border-dark-400 hover:border-village-primary/30 animate-slideUp">
                    <div class="flex items-center justify-between mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-village-primary to-village-secondary rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <i class="fas fa-seedling text-white text-2xl"></i>
                        </div>
                        <div class="text-right">
                            <div class="text-3xl font-black text-gray-900 dark:text-white">75%</div>
                            <div class="text-sm text-gray-500 dark:text-gray-400 font-medium">Lahan Pertanian</div>
                        </div>
                    </div>
                    <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                        <div class="bg-gradient-to-r from-village-primary to-village-secondary h-2 rounded-full" style="width: 75%"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Visi Misi Section -->
    <section class="py-20 bg-gradient-to-br from-gray-50 to-white dark:from-dark-100 dark:to-dark-200 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16 animate-slideUp">
                <div class="inline-block px-6 py-2 bg-village-primary/10 text-village-primary rounded-full text-sm font-semibold mb-6">
                    <i class="fas fa-bullseye mr-2"></i>VISI & MISI
                </div>
                <h2 class="text-5xl font-black text-gray-900 dark:text-white mb-6">
                    Visi & <span class="text-village-primary">Misi Desa</span>
                </h2>
                <p class="text-xl text-gray-700 dark:text-gray-300 max-w-3xl mx-auto leading-relaxed">
                    Arah dan tujuan pembangunan Desa Cibeureum
                </p>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Visi Card -->
                <div class="group animate-slideUp">
                    <div class="bg-white dark:bg-dark-300 p-8 rounded-3xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 border border-gray-100 dark:border-dark-400 hover:border-village-primary/30 relative overflow-hidden">
                        <!-- Background Pattern -->
                        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-village-primary/10 to-transparent rounded-full -mr-16 -mt-16"></div>
                        
                        <div class="relative">
                            <div class="flex items-center mb-6">
                                <div class="w-16 h-16 bg-gradient-to-br from-village-primary to-village-secondary rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300 shadow-lg mr-4">
                                    <i class="fas fa-eye text-white text-2xl"></i>
                                </div>
                                <h3 class="text-3xl font-bold text-gray-900 dark:text-white">Visi</h3>
                            </div>
                            
                            <div class="relative">
                                <div class="absolute left-0 top-0 w-1 h-full bg-gradient-to-b from-village-primary to-village-secondary rounded-full"></div>
                                <blockquote class="pl-6 text-lg text-gray-700 dark:text-gray-300 leading-relaxed font-medium italic">
                                    "Mewujudkan Desa Cibeureum MANTAP (Mandiri, Aman, Nyaman, Tertib, Agamis Dan Produktif)"
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Misi Card -->
                <div class="group animate-slideUp">
                    <div class="bg-white dark:bg-dark-300 p-8 rounded-3xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 border border-gray-100 dark:border-dark-400 hover:border-blue-500/30 relative overflow-hidden">
                        <!-- Background Pattern -->
                        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-village-secondary/10 to-transparent rounded-full -mr-16 -mt-16"></div>
                        
                        <div class="relative">
                            <div class="flex items-center mb-6">
                                <div class="w-16 h-16 bg-gradient-to-br from-village-secondary to-village-primary rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300 shadow-lg mr-4">
                                    <i class="fas fa-bullseye text-white text-2xl"></i>
                                </div>
                                <h3 class="text-3xl font-bold text-gray-900 dark:text-white">Misi</h3>
                            </div>
                            
                            <ul class="space-y-4">
                                <li class="flex items-start group/item">
                                    <div class="w-6 h-6 bg-gradient-to-br from-village-secondary to-village-primary rounded-full flex items-center justify-center mr-4 mt-1 flex-shrink-0 group-hover/item:scale-110 transition-transform duration-300">
                                        <i class="fas fa-check text-white text-xs"></i>
                                    </div>
                                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">Mewujudkan birokrasi pemerintahan desa yang dinamis, tata kelola pemerintahan desa yang baik (Good Village Government) serta kepemimpinan yang konstruktif dan kolaboratif</p>
                                </li>
                                
                                <li class="flex items-start group/item">
                                    <div class="w-6 h-6 bg-gradient-to-br from-village-secondary to-village-primary rounded-full flex items-center justify-center mr-4 mt-1 flex-shrink-0 group-hover/item:scale-110 transition-transform duration-300">
                                        <i class="fas fa-check text-white text-xs"></i>
                                    </div>
                                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">Mewujudkan Desa Cibeureum yang aman, sehat, cerdas dan sejahtera dengan meningkatkan peranserta dan kesadaran warga</p>
                                </li>
                                
                                <li class="flex items-start group/item">
                                    <div class="w-6 h-6 bg-gradient-to-br from-village-secondary to-village-primary rounded-full flex items-center justify-center mr-4 mt-1 flex-shrink-0 group-hover/item:scale-110 transition-transform duration-300">
                                        <i class="fas fa-check text-white text-xs"></i>
                                    </div>
                                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">Memberikan ruang kreativitas kepada masyarakat dalam mengembangkan potensi yang ada dengan didukung pengadaan modal usaha dan pelatihan wirausaha</p>
                                </li>
                                
                                <li class="flex items-start group/item">
                                    <div class="w-6 h-6 bg-gradient-to-br from-village-secondary to-village-primary rounded-full flex items-center justify-center mr-4 mt-1 flex-shrink-0 group-hover/item:scale-110 transition-transform duration-300">
                                        <i class="fas fa-check text-white text-xs"></i>
                                    </div>
                                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">Meningkatkan kesejahteraan masyarakat dalam rangka pencapaian masyarakat yang adil dan makmur</p>
                                </li>
                                
                                <li class="flex items-start group/item">
                                    <div class="w-6 h-6 bg-gradient-to-br from-village-secondary to-village-primary rounded-full flex items-center justify-center mr-4 mt-1 flex-shrink-0 group-hover/item:scale-110 transition-transform duration-300">
                                        <i class="fas fa-check text-white text-xs"></i>
                                    </div>
                                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">Mewujudkan pembangunan yang berkelanjutan dan berwawasan lingkungan</p>
                                </li>
                                
                                <li class="flex items-start group/item">
                                    <div class="w-6 h-6 bg-gradient-to-br from-village-secondary to-village-primary rounded-full flex items-center justify-center mr-4 mt-1 flex-shrink-0 group-hover/item:scale-110 transition-transform duration-300">
                                        <i class="fas fa-check text-white text-xs"></i>
                                    </div>
                                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">Mewujudkan Desa Cibeureum yang agamis, toleran, dan harmonis</p>
                                </li>
                                
                                <li class="flex items-start group/item">
                                    <div class="w-6 h-6 bg-gradient-to-br from-village-secondary to-village-primary rounded-full flex items-center justify-center mr-4 mt-1 flex-shrink-0 group-hover/item:scale-110 transition-transform duration-300">
                                        <i class="fas fa-check text-white text-xs"></i>
                                    </div>
                                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">Menumbuhkembangkan nilai-nilai religiusitas dalam diri warga masyarakat</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="py-20 bg-gradient-to-br from-village-light to-village-accent/30 dark:from-dark-200 dark:to-dark-300 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16 animate-slideUp">
                <div class="inline-block px-6 py-2 bg-village-primary/10 text-village-primary rounded-full text-sm font-semibold mb-6">
                    <i class="fas fa-map-marker-alt mr-2"></i>LOKASI DESA
                </div>
                <h2 class="text-5xl font-black text-gray-900 dark:text-white mb-6">
                    Peta <span class="text-village-primary">Lokasi Desa</span>
                </h2>
                <p class="text-xl text-gray-700 dark:text-gray-300 max-w-3xl mx-auto leading-relaxed">
                    Temukan lokasi dan informasi geografis Desa Cibeureum
                </p>
            </div>

            <div class="bg-white dark:bg-dark-300 rounded-3xl shadow-2xl overflow-hidden border border-gray-100 dark:border-dark-400">
                <!-- Map Container -->
                <div class="aspect-video rounded-t-3xl overflow-hidden">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15832.234567891!2d108.2234567!3d-6.8345678!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f1234567890ab%3A0xabcdef1234567890!2sCibeureum%2C%20Talaga%2C%20Majalengka%20Regency%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1642123456789!5m2!1sen!2sid"
                        width="100%"
                        height="100%"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        class="w-full h-full">
                    </iframe>
                </div>

                <!-- Map Info -->
                <div class="p-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex items-start group">
                            <div class="w-12 h-12 bg-gradient-to-br from-village-primary to-village-secondary rounded-xl flex items-center justify-center mr-4 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                                <i class="fas fa-map-marker-alt text-white text-lg"></i>
                            </div>
                            <div>
                                <h4 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Alamat Lengkap</h4>
                                <p class="text-gray-700 dark:text-gray-300">Desa Cibeureum, Kecamatan Talaga, Kabupaten Majalengka, Jawa Barat 45463</p>
                            </div>
                        </div>

                        <div class="flex items-start group">
                            <div class="w-12 h-12 bg-gradient-to-br from-village-secondary to-village-accent rounded-xl flex items-center justify-center mr-4 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                                <i class="fas fa-route text-white text-lg"></i>
                            </div>
                            <div>
                                <h4 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Akses Transportasi</h4>
                                <p class="text-gray-700 dark:text-gray-300">Dapat diakses melalui jalan kabupaten dari arah Majalengka atau Kuningan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Back to Top Button -->
    <button id="back-to-top"
        class="fixed bottom-8 right-8 w-14 h-14 bg-gradient-to-r from-village-primary to-village-secondary text-white rounded-full shadow-2xl hover:shadow-village-primary/25 hover:scale-110 transition-all duration-300 opacity-0 invisible z-50">
        <i class="fas fa-arrow-up text-lg"></i>
    </button>

    <!-- JavaScript -->
    <script>
        // Theme Toggle
        function toggleTheme() {
            const html = document.documentElement;
            const themeIcon = document.getElementById('theme-icon');
            const themeText = document.getElementById('theme-text');
            const themeIconMobile = document.getElementById('theme-icon-mobile');
            const themeTextMobile = document.getElementById('theme-text-mobile');
            
            if (html.classList.contains('dark')) {
                html.classList.remove('dark');
                themeIcon.className = 'fas fa-moon';
                themeText.textContent = 'Dark';
                if (themeIconMobile) {
                    themeIconMobile.className = 'fas fa-moon mr-2';
                    themeTextMobile.textContent = 'Mode Gelap';
                }
                localStorage.setItem('theme', 'light');
            } else {
                html.classList.add('dark');
                themeIcon.className = 'fas fa-sun';
                themeText.textContent = 'Light';
                if (themeIconMobile) {
                    themeIconMobile.className = 'fas fa-sun mr-2';
                    themeTextMobile.textContent = 'Mode Terang';
                }
                localStorage.setItem('theme', 'dark');
            }
        }

        // Check for saved theme
        if (localStorage.getItem('theme') === 'dark' || (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
            document.getElementById('theme-icon').className = 'fas fa-sun';
            document.getElementById('theme-text').textContent = 'Light';
            const mobileIcon = document.getElementById('theme-icon-mobile');
            const mobileText = document.getElementById('theme-text-mobile');
            if (mobileIcon && mobileText) {
                mobileIcon.className = 'fas fa-sun mr-2';
                mobileText.textContent = 'Mode Terang';
            }
        }

        // Mobile Menu Toggle
        document.getElementById('mobile-menu-toggle').addEventListener('click', function() {
            const mobileMenu = document.getElementById('nav-mobile');
            const icon = document.getElementById('mobile-menu-icon');
            const isVisible = !mobileMenu.classList.contains('invisible');
            
            if (isVisible) {
                mobileMenu.classList.add('-translate-y-full', 'opacity-0', 'invisible');
                icon.className = 'fas fa-bars';
            } else {
                mobileMenu.classList.remove('-translate-y-full', 'opacity-0', 'invisible');
                icon.className = 'fas fa-times';
            }
        });

        // Enhanced Navbar Scroll Effect
        let lastScrollTop = 0;
        function updateNavbar() {
            const navbar = document.getElementById('navbar');
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            if (navbar) {
                // Always keep navbar visible
                navbar.style.transform = 'translateY(0)';
                
                // Change background opacity based on scroll
                if (scrollTop > 50) {
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
            
            lastScrollTop = scrollTop;
        }

        let ticking = false;
        function requestTick() {
            if (!ticking) {
                requestAnimationFrame(updateNavbar);
                ticking = true;
            }
        }

        window.addEventListener('scroll', function() {
            requestTick();
            ticking = false;
            
            // Back to top button
            const backToTop = document.getElementById('back-to-top');
            if (window.scrollY > 300) {
                backToTop.classList.remove('opacity-0', 'invisible');
            } else {
                backToTop.classList.add('opacity-0', 'invisible');
            }
        });

        // Update navbar background when theme changes
        const themeObserver = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                if (mutation.attributeName === 'class') {
                    const isDark = document.documentElement.classList.contains('dark');
                    const navbar = document.getElementById('navbar');
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

        // Back to top functionality
        document.getElementById('back-to-top').addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Intersection Observer for animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animationDelay = '0s';
                    entry.target.classList.add('animate-slideUp');
                }
            });
        }, observerOptions);

        // Observe elements for animation
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.animate-slideUp').forEach(el => {
                observer.observe(el);
            });
        });
    </script>
</body>
</html>
