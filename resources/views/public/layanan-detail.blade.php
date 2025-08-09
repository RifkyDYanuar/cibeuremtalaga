<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Layanan - SiDesa Cibeureum</title>
    <meta name="description" content="Detail lengkap layanan administrasi dan pelayanan publik Desa Cibeureum. Informasi persyaratan, prosedur, dan cara mengakses setiap layanan.">
    <meta name="keywords" content="layanan desa, administrasi, pelayanan publik, Cibeureum, surat keterangan, prosedur">
    
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
        /* Remove conflicting navbar styles and add enhanced transitions */
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
                            class="nav-link text-gray-700 dark:text-gray-300 hover:text-village-primary dark:hover:text-village-secondary hover:bg-gray-100 dark:hover:bg-gray-800 px-4 py-2 rounded-full transition-all duration-300 font-medium">
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
                        <a href="#"
                            class="nav-link bg-village-primary text-white hover:bg-village-secondary px-4 py-2 rounded-full transition-all duration-300 font-medium shadow-md">
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
                            class="block px-6 py-4 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-village-primary border border-gray-200 dark:border-gray-700 hover:border-village-primary rounded-xl transition-all duration-300 font-medium">
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
                        <a href="#"
                            class="block px-6 py-4 bg-village-primary text-white border border-village-primary rounded-xl transition-all duration-300 font-medium">
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
            <div class="animate-fade-in">
                <div class="inline-block px-6 py-2 bg-white/10 backdrop-blur-md text-white rounded-full text-sm font-semibold mb-6 border border-white/20">
                    <i class="fas fa-concierge-bell mr-2"></i>LAYANAN DESA
                </div>
                <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-6 leading-tight">
                    Detail <span class="text-village-accent">Layanan</span>
                </h1>
            </div>
            <div class="animate-fade-in" style="animation-delay: 0.3s;">
                <p class="text-lg md:text-xl lg:text-2xl mb-8 opacity-95 max-w-3xl mx-auto leading-relaxed">
                    Informasi lengkap tentang berbagai layanan administrasi dan pelayanan publik Desa Cibeureum
                </p>
            </div>
        </div>
    </section>

    <!-- Breadcrumb -->
    <section class="py-4 bg-white dark:bg-dark-200 border-b border-gray-200 dark:border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex items-center space-x-2 text-sm text-gray-600 dark:text-gray-400">
                <a href="{{ route('welcome') }}" class="hover:text-village-primary transition-colors duration-300">
                    <i class="fas fa-home mr-1"></i>Beranda
                </a>
                <i class="fas fa-chevron-right text-gray-400"></i>
                <span class="text-gray-900 dark:text-white font-medium">Detail Layanan</span>
            </nav>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-20 bg-gradient-to-br from-gray-50 to-white dark:from-dark-100 dark:to-dark-200 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Service Categories -->
                <div class="lg:col-span-2">
                    <div class="grid gap-6">
                        <!-- Kategori Administrasi Kependudukan -->
                        <div class="bg-white dark:bg-dark-300 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 border border-gray-100 dark:border-dark-400 animate-fade-in">
                            <div class="flex items-center gap-4 mb-6">
                                <div class="w-16 h-16 bg-gradient-to-br from-village-primary to-village-secondary rounded-2xl flex items-center justify-center shadow-lg">
                                    <i class="fas fa-id-card text-white text-2xl"></i>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Administrasi Kependudukan</h3>
                            </div>
                            <div class="grid gap-4">
                                <div class="bg-gray-50 dark:bg-dark-400 p-4 rounded-xl border border-gray-200 dark:border-gray-600 hover:border-village-primary hover:bg-village-primary/5 transition-all duration-300 cursor-pointer" onclick="openModal('ktp')">
                                    <div class="flex justify-between items-start mb-3">
                                        <h4 class="font-semibold text-gray-900 dark:text-white text-lg">Kartu Tanda Penduduk (KTP)</h4>
                                        <i class="fas fa-arrow-right text-village-primary"></i>
                                    </div>
                                    <p class="text-gray-600 dark:text-gray-300 mb-3">Pengurusan KTP baru, perpanjangan, dan perubahan data</p>
                                    <div class="flex justify-between items-center text-sm">
                                        <span class="flex items-center text-green-600 dark:text-green-400 font-medium">
                                            <i class="fas fa-clock mr-1"></i>3-5 hari kerja
                                        </span>
                                    </div>
                                </div>

                                <div class="bg-gray-50 dark:bg-dark-400 p-4 rounded-xl border border-gray-200 dark:border-gray-600 hover:border-village-primary hover:bg-village-primary/5 transition-all duration-300 cursor-pointer" onclick="openModal('kk')">
                                    <div class="flex justify-between items-start mb-3">
                                        <h4 class="font-semibold text-gray-900 dark:text-white text-lg">Kartu Keluarga (KK)</h4>
                                        <i class="fas fa-arrow-right text-village-primary"></i>
                                    </div>
                                    <p class="text-gray-600 dark:text-gray-300 mb-3">Pembuatan KK baru, perubahan data, dan penambahan anggota keluarga</p>
                                    <div class="flex justify-between items-center text-sm">
                                        <span class="flex items-center text-green-600 dark:text-green-400 font-medium">
                                            <i class="fas fa-clock mr-1"></i>3-7 hari kerja
                                        </span>
                                    </div>
                                </div>

                                <div class="bg-gray-50 dark:bg-dark-400 p-4 rounded-xl border border-gray-200 dark:border-gray-600 hover:border-village-primary hover:bg-village-primary/5 transition-all duration-300 cursor-pointer" onclick="openModal('akta')">
                                    <div class="flex justify-between items-start mb-3">
                                        <h4 class="font-semibold text-gray-900 dark:text-white text-lg">Akta Kelahiran</h4>
                                        <i class="fas fa-arrow-right text-village-primary"></i>
                                    </div>
                                    <p class="text-gray-600 dark:text-gray-300 mb-3">Pengurusan akta kelahiran untuk bayi baru lahir</p>
                                    <div class="flex justify-between items-center text-sm">
                                        <span class="flex items-center text-green-600 dark:text-green-400 font-medium">
                                            <i class="fas fa-clock mr-1"></i>7-14 hari kerja
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Kategori Surat Keterangan -->
                        <div class="bg-white dark:bg-dark-300 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 border border-gray-100 dark:border-dark-400 animate-fade-in">
                            <div class="flex items-center gap-4 mb-6">
                                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center shadow-lg">
                                    <i class="fas fa-file-alt text-white text-2xl"></i>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Surat Keterangan</h3>
                            </div>
                            <div class="grid gap-4">
                                <div class="bg-gray-50 dark:bg-dark-400 p-4 rounded-xl border border-gray-200 dark:border-gray-600 hover:border-village-primary hover:bg-village-primary/5 transition-all duration-300 cursor-pointer" onclick="openModal('skd')">
                                    <div class="flex justify-between items-start mb-3">
                                        <h4 class="font-semibold text-gray-900 dark:text-white text-lg">Surat Keterangan Domisili</h4>
                                        <i class="fas fa-arrow-right text-village-primary"></i>
                                    </div>
                                    <p class="text-gray-600 dark:text-gray-300 mb-3">Keterangan tempat tinggal untuk berbagai keperluan</p>
                                    <div class="flex justify-between items-center text-sm">
                                        <span class="flex items-center text-green-600 dark:text-green-400 font-medium">
                                            <i class="fas fa-clock mr-1"></i>1-2 hari kerja
                                        </span>
                                    </div>
                                </div>

                                <div class="bg-gray-50 dark:bg-dark-400 p-4 rounded-xl border border-gray-200 dark:border-gray-600 hover:border-village-primary hover:bg-village-primary/5 transition-all duration-300 cursor-pointer" onclick="openModal('sktm')">
                                    <div class="flex justify-between items-start mb-3">
                                        <h4 class="font-semibold text-gray-900 dark:text-white text-lg">Surat Keterangan Tidak Mampu</h4>
                                        <i class="fas fa-arrow-right text-village-primary"></i>
                                    </div>
                                    <p class="text-gray-600 dark:text-gray-300 mb-3">Keterangan kondisi ekonomi untuk bantuan sosial</p>
                                    <div class="flex justify-between items-center text-sm">
                                        <span class="flex items-center text-green-600 dark:text-green-400 font-medium">
                                            <i class="fas fa-clock mr-1"></i>2-3 hari kerja
                                        </span>
                                    </div>
                                </div>

                                <div class="bg-gray-50 dark:bg-dark-400 p-4 rounded-xl border border-gray-200 dark:border-gray-600 hover:border-village-primary hover:bg-village-primary/5 transition-all duration-300 cursor-pointer" onclick="openModal('sku')">
                                    <div class="flex justify-between items-start mb-3">
                                        <h4 class="font-semibold text-gray-900 dark:text-white text-lg">Surat Keterangan Usaha</h4>
                                        <i class="fas fa-arrow-right text-village-primary"></i>
                                    </div>
                                    <p class="text-gray-600 dark:text-gray-300 mb-3">Keterangan untuk mendukung kegiatan usaha mikro</p>
                                    <div class="flex justify-between items-center text-sm">
                                        <span class="flex items-center text-green-600 dark:text-green-400 font-medium">
                                            <i class="fas fa-clock mr-1"></i>2-3 hari kerja
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Kategori Perizinan -->
                        <div class="bg-white dark:bg-dark-300 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 border border-gray-100 dark:border-dark-400 animate-fade-in">
                            <div class="flex items-center gap-4 mb-6">
                                <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center shadow-lg">
                                    <i class="fas fa-certificate text-white text-2xl"></i>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Perizinan</h3>
                            </div>
                            <div class="grid gap-4">
                                <div class="bg-gray-50 dark:bg-dark-400 p-4 rounded-xl border border-gray-200 dark:border-gray-600 hover:border-village-primary hover:bg-village-primary/5 transition-all duration-300 cursor-pointer" onclick="openModal('imb')">
                                    <div class="flex justify-between items-start mb-3">
                                        <h4 class="font-semibold text-gray-900 dark:text-white text-lg">Izin Mendirikan Bangunan (IMB)</h4>
                                        <i class="fas fa-arrow-right text-village-primary"></i>
                                    </div>
                                    <p class="text-gray-600 dark:text-gray-300 mb-3">Perizinan untuk pembangunan rumah dan bangunan</p>
                                    <div class="flex justify-between items-center text-sm">
                                        <span class="flex items-center text-green-600 dark:text-green-400 font-medium">
                                            <i class="fas fa-clock mr-1"></i>14-21 hari kerja
                                        </span>
                                    </div>
                                </div>

                                <div class="bg-gray-50 dark:bg-dark-400 p-4 rounded-xl border border-gray-200 dark:border-gray-600 hover:border-village-primary hover:bg-village-primary/5 transition-all duration-300 cursor-pointer" onclick="openModal('iumk')">
                                    <div class="flex justify-between items-start mb-3">
                                        <h4 class="font-semibold text-gray-900 dark:text-white text-lg">Izin Usaha Mikro Kecil (IUMK)</h4>
                                        <i class="fas fa-arrow-right text-village-primary"></i>
                                    </div>
                                    <p class="text-gray-600 dark:text-gray-300 mb-3">Perizinan untuk usaha mikro dan kecil</p>
                                    <div class="flex justify-between items-center text-sm">
                                        <span class="flex items-center text-green-600 dark:text-green-400 font-medium">
                                            <i class="fas fa-clock mr-1"></i>7-10 hari kerja
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Kategori Layanan Sosial -->
                        <div class="bg-white dark:bg-dark-300 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 border border-gray-100 dark:border-dark-400 animate-fade-in">
                            <div class="flex items-center gap-4 mb-6">
                                <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center shadow-lg">
                                    <i class="fas fa-hands-helping text-white text-2xl"></i>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Layanan Sosial</h3>
                            </div>
                            <div class="grid gap-4">
                                <div class="bg-gray-50 dark:bg-dark-400 p-4 rounded-xl border border-gray-200 dark:border-gray-600 hover:border-village-primary hover:bg-village-primary/5 transition-all duration-300 cursor-pointer" onclick="openModal('bantuan')">
                                    <div class="flex justify-between items-start mb-3">
                                        <h4 class="font-semibold text-gray-900 dark:text-white text-lg">Bantuan Sosial</h4>
                                        <i class="fas fa-arrow-right text-village-primary"></i>
                                    </div>
                                    <p class="text-gray-600 dark:text-gray-300 mb-3">Pendaftaran dan informasi bantuan sosial</p>
                                    <div class="flex justify-between items-center text-sm">
                                        <span class="flex items-center text-green-600 dark:text-green-400 font-medium">
                                            <i class="fas fa-clock mr-1"></i>Sesuai jadwal
                                        </span>
                                    </div>
                                </div>

                                <div class="bg-gray-50 dark:bg-dark-400 p-4 rounded-xl border border-gray-200 dark:border-gray-600 hover:border-village-primary hover:bg-village-primary/5 transition-all duration-300 cursor-pointer" onclick="openModal('pkh')">
                                    <div class="flex justify-between items-start mb-3">
                                        <h4 class="font-semibold text-gray-900 dark:text-white text-lg">Program Keluarga Harapan (PKH)</h4>
                                        <i class="fas fa-arrow-right text-village-primary"></i>
                                    </div>
                                    <p class="text-gray-600 dark:text-gray-300 mb-3">Pendaftaran dan verifikasi data PKH</p>
                                    <div class="flex justify-between items-center text-sm">
                                        <span class="flex items-center text-green-600 dark:text-green-400 font-medium">
                                            <i class="fas fa-clock mr-1"></i>Sesuai jadwal
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <aside class="space-y-6">
                    <!-- Quick Access Widget -->
                    <div class="bg-white dark:bg-dark-300 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6">
                        <div class="text-center mb-6">
                            <div class="inline-block px-4 py-2 bg-village-primary/10 text-village-primary rounded-full text-sm font-semibold mb-3">
                                🚀 AKSES CEPAT
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">Akses Cepat</h3>
                        </div>
                        <div class="space-y-3">
                            <a href="{{ route('register') }}" class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-dark-400 rounded-xl hover:bg-village-primary hover:text-white transition-all duration-300 text-gray-700 dark:text-gray-300">
                                <i class="fas fa-user-plus text-village-primary group-hover:text-white"></i>
                                <span class="font-medium">Daftar Akun</span>
                            </a>
                            <a href="{{ route('login') }}" class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-dark-400 rounded-xl hover:bg-village-primary hover:text-white transition-all duration-300 text-gray-700 dark:text-gray-300">
                                <i class="fas fa-sign-in-alt text-village-primary group-hover:text-white"></i>
                                <span class="font-medium">Login Sistem</span>
                            </a>
                            <a href="#" class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-dark-400 rounded-xl hover:bg-village-primary hover:text-white transition-all duration-300 text-gray-700 dark:text-gray-300">
                                <i class="fas fa-book text-village-primary group-hover:text-white"></i>
                                <span class="font-medium">Panduan Penggunaan</span>
                            </a>
                            <a href="{{ route('public.kontak') }}" class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-dark-400 rounded-xl hover:bg-village-primary hover:text-white transition-all duration-300 text-gray-700 dark:text-gray-300">
                                <i class="fas fa-phone text-village-primary group-hover:text-white"></i>
                                <span class="font-medium">Hubungi Petugas</span>
                            </a>
                        </div>
                    </div>

                    <!-- Operating Hours Widget -->
                    <div class="bg-white dark:bg-dark-300 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6">
                        <div class="text-center mb-6">
                            <div class="inline-block px-4 py-2 bg-village-primary/10 text-village-primary rounded-full text-sm font-semibold mb-3">
                                🕒 JAM OPERASIONAL
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">Jam Pelayanan</h3>
                        </div>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center p-3 bg-gray-50 dark:bg-dark-400 rounded-lg">
                                <span class="text-gray-600 dark:text-gray-400">Senin - Kamis</span>
                                <span class="font-semibold text-gray-900 dark:text-white">08:00 - 15:00</span>
                            </div>
                            <div class="flex justify-between items-center p-3 bg-gray-50 dark:bg-dark-400 rounded-lg">
                                <span class="text-gray-600 dark:text-gray-400">Jumat</span>
                                <span class="font-semibold text-gray-900 dark:text-white">08:00 - 11:00</span>
                            </div>
                            <div class="flex justify-between items-center p-3 bg-gray-50 dark:bg-dark-400 rounded-lg">
                                <span class="text-gray-600 dark:text-gray-400">Sabtu - Minggu</span>
                                <span class="font-semibold text-red-500">Tutup</span>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Info Widget -->
                    <div class="bg-white dark:bg-dark-300 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6">
                        <div class="text-center mb-6">
                            <div class="inline-block px-4 py-2 bg-village-primary/10 text-village-primary rounded-full text-sm font-semibold mb-3">
                                📞 KONTAK
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">Kontak Pelayanan</h3>
                        </div>
                        <div class="space-y-3">
                            <div class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-dark-400 rounded-lg">
                                <i class="fas fa-phone text-village-primary"></i>
                                <div>
                                    <div class="font-medium text-gray-900 dark:text-white">Telepon</div>
                                    <div class="text-sm text-gray-600 dark:text-gray-400">+62 812-3456-7890</div>
                                </div>
                            </div>
                            <div class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-dark-400 rounded-lg">
                                <i class="fas fa-envelope text-village-primary"></i>
                                <div>
                                    <div class="font-medium text-gray-900 dark:text-white">Email</div>
                                    <div class="text-sm text-gray-600 dark:text-gray-400">pelayanan@cibeureum.id</div>
                                </div>
                            </div>
                            <div class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-dark-400 rounded-lg">
                                <i class="fas fa-map-marker-alt text-village-primary"></i>
                                <div>
                                    <div class="font-medium text-gray-900 dark:text-white">Alamat</div>
                                    <div class="text-sm text-gray-600 dark:text-gray-400">Jl. Raya Cibeureum No. 123</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Requirements Widget -->
                    <div class="bg-white dark:bg-dark-300 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6">
                        <div class="text-center mb-6">
                            <div class="inline-block px-4 py-2 bg-village-primary/10 text-village-primary rounded-full text-sm font-semibold mb-3">
                                📋 DOKUMEN
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">Dokumen Umum</h3>
                        </div>
                        <div class="space-y-2">
                            <div class="flex items-center gap-2 text-sm">
                                <i class="fas fa-check text-green-500"></i>
                                <span class="text-gray-700 dark:text-gray-300">Fotokopi KTP</span>
                            </div>
                            <div class="flex items-center gap-2 text-sm">
                                <i class="fas fa-check text-green-500"></i>
                                <span class="text-gray-700 dark:text-gray-300">Fotokopi KK</span>
                            </div>
                            <div class="flex items-center gap-2 text-sm">
                                <i class="fas fa-check text-green-500"></i>
                                <span class="text-gray-700 dark:text-gray-300">Pas foto terbaru</span>
                            </div>
                            <div class="flex items-center gap-2 text-sm">
                                <i class="fas fa-check text-green-500"></i>
                                <span class="text-gray-700 dark:text-gray-300">Surat pengantar RT/RW</span>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    <!-- Service Detail Modals -->
    <!-- KTP Modal -->
    <div id="ktpModal" class="modal fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
        <div class="bg-white dark:bg-dark-300 rounded-2xl max-w-4xl w-full max-h-screen overflow-y-auto shadow-2xl">
            <div class="sticky top-0 bg-white dark:bg-dark-300 border-b border-gray-200 dark:border-gray-600 p-6 rounded-t-2xl">
                <div class="flex items-center justify-between">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Kartu Tanda Penduduk (KTP)</h2>
                    <button onclick="closeModal('ktpModal')" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 text-2xl">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="p-6">
                <div class="mb-8">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Informasi Layanan</h3>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        <div class="bg-gray-50 dark:bg-dark-400 p-4 rounded-xl text-center">
                            <div class="text-sm text-gray-600 dark:text-gray-400">Waktu Proses</div>
                            <div class="font-semibold text-gray-900 dark:text-white">3-5 Hari Kerja</div>
                        </div>
                        <div class="bg-gray-50 dark:bg-dark-400 p-4 rounded-xl text-center">
                            <div class="text-sm text-gray-600 dark:text-gray-400">Masa Berlaku</div>
                            <div class="font-semibold text-gray-900 dark:text-white">Seumur Hidup</div>
                        </div>
                        <div class="bg-gray-50 dark:bg-dark-400 p-4 rounded-xl text-center">
                            <div class="text-sm text-gray-600 dark:text-gray-400">Jenis Layanan</div>
                            <div class="font-semibold text-blue-600">Online/Offline</div>
                        </div>
                    </div>
                </div>

                <div class="mb-8">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Persyaratan</h3>
                    <div class="space-y-3">
                        <div class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-dark-400 rounded-lg">
                            <i class="fas fa-file-alt text-village-primary"></i>
                            <span class="text-gray-700 dark:text-gray-300">Fotokopi Kartu Keluarga (KK) yang masih berlaku</span>
                        </div>
                        <div class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-dark-400 rounded-lg">
                            <i class="fas fa-file-alt text-village-primary"></i>
                            <span class="text-gray-700 dark:text-gray-300">Fotokopi Akta Kelahiran atau Ijazah terakhir</span>
                        </div>
                        <div class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-dark-400 rounded-lg">
                            <i class="fas fa-camera text-village-primary"></i>
                            <span class="text-gray-700 dark:text-gray-300">Pas foto berwarna ukuran 4x6 cm (2 lembar)</span>
                        </div>
                        <div class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-dark-400 rounded-lg">
                            <i class="fas fa-file-alt text-village-primary"></i>
                            <span class="text-gray-700 dark:text-gray-300">Surat pengantar dari RT/RW setempat</span>
                        </div>
                        <div class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-dark-400 rounded-lg">
                            <i class="fas fa-id-card text-village-primary"></i>
                            <span class="text-gray-700 dark:text-gray-300">KTP lama (untuk perpanjangan atau perubahan data)</span>
                        </div>
                    </div>
                </div>

                <div class="mb-8">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Prosedur Pelayanan</h3>
                    <div class="space-y-4">
                        <div class="flex gap-4">
                            <div class="flex-shrink-0 w-8 h-8 bg-village-primary text-white rounded-full flex items-center justify-center font-bold">1</div>
                            <div>
                                <div class="font-semibold text-gray-900 dark:text-white">Persiapan Dokumen</div>
                                <div class="text-gray-600 dark:text-gray-400">Siapkan semua dokumen persyaratan yang telah ditentukan</div>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="flex-shrink-0 w-8 h-8 bg-village-primary text-white rounded-full flex items-center justify-center font-bold">2</div>
                            <div>
                                <div class="font-semibold text-gray-900 dark:text-white">Datang ke Kantor Desa</div>
                                <div class="text-gray-600 dark:text-gray-400">Kunjungi kantor desa sesuai jam pelayanan yang telah ditentukan</div>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="flex-shrink-0 w-8 h-8 bg-village-primary text-white rounded-full flex items-center justify-center font-bold">3</div>
                            <div>
                                <div class="font-semibold text-gray-900 dark:text-white">Verifikasi Dokumen</div>
                                <div class="text-gray-600 dark:text-gray-400">Petugas akan memverifikasi kelengkapan dan keabsahan dokumen</div>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="flex-shrink-0 w-8 h-8 bg-village-primary text-white rounded-full flex items-center justify-center font-bold">4</div>
                            <div>
                                <div class="font-semibold text-gray-900 dark:text-white">Pengajuan ke Disdukcapil</div>
                                <div class="text-gray-600 dark:text-gray-400">Dokumen akan diteruskan ke Dinas Kependudukan dan Catatan Sipil</div>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="flex-shrink-0 w-8 h-8 bg-village-primary text-white rounded-full flex items-center justify-center font-bold">5</div>
                            <div>
                                <div class="font-semibold text-gray-900 dark:text-white">Pengambilan KTP</div>
                                <div class="text-gray-600 dark:text-gray-400">KTP dapat diambil sesuai jadwal yang telah ditentukan</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <a href="{{ route('register') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-village-primary text-white rounded-full hover:bg-village-secondary transition-all duration-300 font-semibold">
                        <i class="fas fa-paper-plane"></i>
                        Ajukan Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- SKTM Modal -->
    <div id="sktmModal" class="modal fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
        <div class="bg-white dark:bg-dark-300 rounded-2xl max-w-4xl w-full max-h-screen overflow-y-auto shadow-2xl">
            <div class="sticky top-0 bg-white dark:bg-dark-300 border-b border-gray-200 dark:border-gray-600 p-6 rounded-t-2xl">
                <div class="flex items-center justify-between">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Surat Keterangan Tidak Mampu (SKTM)</h2>
                    <button onclick="closeModal('sktmModal')" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 text-2xl">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="p-6">
                <div class="mb-8">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Informasi Layanan</h3>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        <div class="bg-gray-50 dark:bg-dark-400 p-4 rounded-xl text-center">
                            <div class="text-sm text-gray-600 dark:text-gray-400">Waktu Proses</div>
                            <div class="font-semibold text-gray-900 dark:text-white">2-3 Hari Kerja</div>
                        </div>
                        <div class="bg-gray-50 dark:bg-dark-400 p-4 rounded-xl text-center">
                            <div class="text-sm text-gray-600 dark:text-gray-400">Masa Berlaku</div>
                            <div class="font-semibold text-gray-900 dark:text-white">6 Bulan</div>
                        </div>
                        <div class="bg-gray-50 dark:bg-dark-400 p-4 rounded-xl text-center">
                            <div class="text-sm text-gray-600 dark:text-gray-400">Jenis Layanan</div>
                            <div class="font-semibold text-blue-600">Offline</div>
                        </div>
                    </div>
                </div>

                <div class="mb-8">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Persyaratan</h3>
                    <div class="space-y-3">
                        <div class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-dark-400 rounded-lg">
                            <i class="fas fa-file-alt text-village-primary"></i>
                            <span class="text-gray-700 dark:text-gray-300">Fotokopi KTP dan Kartu Keluarga</span>
                        </div>
                        <div class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-dark-400 rounded-lg">
                            <i class="fas fa-file-alt text-village-primary"></i>
                            <span class="text-gray-700 dark:text-gray-300">Surat pengantar dari RT/RW</span>
                        </div>
                        <div class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-dark-400 rounded-lg">
                            <i class="fas fa-file-alt text-village-primary"></i>
                            <span class="text-gray-700 dark:text-gray-300">Surat pernyataan tidak mampu bermaterai</span>
                        </div>
                        <div class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-dark-400 rounded-lg">
                            <i class="fas fa-file-alt text-village-primary"></i>
                            <span class="text-gray-700 dark:text-gray-300">Dokumen pendukung (slip gaji, dll)</span>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <a href="{{ route('register') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-village-primary text-white rounded-full hover:bg-village-secondary transition-all duration-300 font-semibold">
                        <i class="fas fa-paper-plane"></i>
                        Ajukan Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Kartu Keluarga Modal -->
    <div id="kkModal" class="modal fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
        <div class="bg-white dark:bg-dark-300 rounded-2xl max-w-4xl w-full max-h-screen overflow-y-auto shadow-2xl">
            <div class="sticky top-0 bg-white dark:bg-dark-300 border-b border-gray-200 dark:border-gray-600 p-6 rounded-t-2xl">
                <div class="flex items-center justify-between">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Kartu Keluarga (KK)</h2>
                    <button onclick="closeModal('kkModal')" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 text-2xl">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="p-6">
                <div class="mb-8">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Informasi Layanan</h3>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        <div class="bg-gray-50 dark:bg-dark-400 p-4 rounded-xl text-center">
                            <div class="text-sm text-gray-600 dark:text-gray-400">Waktu Proses</div>
                            <div class="font-semibold text-gray-900 dark:text-white">3-7 Hari Kerja</div>
                        </div>
                        <div class="bg-gray-50 dark:bg-dark-400 p-4 rounded-xl text-center">
                            <div class="text-sm text-gray-600 dark:text-gray-400">Masa Berlaku</div>
                            <div class="font-semibold text-gray-900 dark:text-white">Selamanya</div>
                        </div>
                        <div class="bg-gray-50 dark:bg-dark-400 p-4 rounded-xl text-center">
                            <div class="text-sm text-gray-600 dark:text-gray-400">Jenis Layanan</div>
                            <div class="font-semibold text-blue-600">Online/Offline</div>
                        </div>
                    </div>
                </div>

                <div class="mb-8">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Persyaratan</h3>
                    <div class="space-y-3">
                        <div class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-dark-400 rounded-lg">
                            <i class="fas fa-file-alt text-village-primary"></i>
                            <span class="text-gray-700 dark:text-gray-300">Fotokopi KK lama (jika ada)</span>
                        </div>
                        <div class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-dark-400 rounded-lg">
                            <i class="fas fa-file-alt text-village-primary"></i>
                            <span class="text-gray-700 dark:text-gray-300">Fotokopi KTP semua anggota keluarga</span>
                        </div>
                        <div class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-dark-400 rounded-lg">
                            <i class="fas fa-file-alt text-village-primary"></i>
                            <span class="text-gray-700 dark:text-gray-300">Surat pengantar dari RT/RW</span>
                        </div>
                        <div class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-dark-400 rounded-lg">
                            <i class="fas fa-file-alt text-village-primary"></i>
                            <span class="text-gray-700 dark:text-gray-300">Buku nikah (untuk pasangan suami istri)</span>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <a href="{{ route('register') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-village-primary text-white rounded-full hover:bg-village-secondary transition-all duration-300 font-semibold">
                        <i class="fas fa-paper-plane"></i>
                        Ajukan Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Surat Keterangan Domisili Modal -->
    <div id="skdModal" class="modal fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
        <div class="bg-white dark:bg-dark-300 rounded-2xl max-w-4xl w-full max-h-screen overflow-y-auto shadow-2xl">
            <div class="sticky top-0 bg-white dark:bg-dark-300 border-b border-gray-200 dark:border-gray-600 p-6 rounded-t-2xl">
                <div class="flex items-center justify-between">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Surat Keterangan Domisili</h2>
                    <button onclick="closeModal('skdModal')" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 text-2xl">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="p-6">
                <div class="mb-8">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Informasi Layanan</h3>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        <div class="bg-gray-50 dark:bg-dark-400 p-4 rounded-xl text-center">
                            <div class="text-sm text-gray-600 dark:text-gray-400">Waktu Proses</div>
                            <div class="font-semibold text-gray-900 dark:text-white">1-2 Hari Kerja</div>
                        </div>
                        <div class="bg-gray-50 dark:bg-dark-400 p-4 rounded-xl text-center">
                            <div class="text-sm text-gray-600 dark:text-gray-400">Masa Berlaku</div>
                            <div class="font-semibold text-gray-900 dark:text-white">6 Bulan</div>
                        </div>
                        <div class="bg-gray-50 dark:bg-dark-400 p-4 rounded-xl text-center">
                            <div class="text-sm text-gray-600 dark:text-gray-400">Jenis Layanan</div>
                            <div class="font-semibold text-blue-600">Offline</div>
                        </div>
                    </div>
                </div>

                <div class="mb-8">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Persyaratan</h3>
                    <div class="space-y-3">
                        <div class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-dark-400 rounded-lg">
                            <i class="fas fa-file-alt text-village-primary"></i>
                            <span class="text-gray-700 dark:text-gray-300">Fotokopi KTP dan Kartu Keluarga</span>
                        </div>
                        <div class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-dark-400 rounded-lg">
                            <i class="fas fa-file-alt text-village-primary"></i>
                            <span class="text-gray-700 dark:text-gray-300">Surat pengantar dari RT/RW</span>
                        </div>
                        <div class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-dark-400 rounded-lg">
                            <i class="fas fa-file-alt text-village-primary"></i>
                            <span class="text-gray-700 dark:text-gray-300">Surat keterangan dari instansi (jika diperlukan)</span>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <a href="{{ route('register') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-village-primary text-white rounded-full hover:bg-village-secondary transition-all duration-300 font-semibold">
                        <i class="fas fa-paper-plane"></i>
                        Ajukan Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>

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

        // Modal functions
        function openModal(serviceType) {
            const modalMap = {
                'ktp': 'ktpModal',
                'kk': 'kkModal',
                'akta': 'aktaModal',
                'skd': 'skdModal',
                'sktm': 'sktmModal',
                'sku': 'skuModal',
                'imb': 'imbModal',
                'iumk': 'iumkModal',
                'bantuan': 'bantuanModal',
                'pkh': 'pkhModal'
            };
            
            const modalId = modalMap[serviceType];
            if (modalId) {
                const modal = document.getElementById(modalId);
                if (modal) {
                    modal.style.display = 'flex';
                    document.body.style.overflow = 'hidden';
                } else {
                    // For services without detailed modals, show basic info
                    alert(`Detail untuk layanan ${serviceType.toUpperCase()} akan segera tersedia. Silakan hubungi kantor desa untuk informasi lebih lanjut.`);
                }
            }
        }

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.style.display = 'none';
                document.body.style.overflow = 'auto';
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

            // Close modal when clicking outside
            window.onclick = function(event) {
                if (event.target.classList.contains('modal')) {
                    event.target.style.display = 'none';
                    document.body.style.overflow = 'auto';
                }
            }

            // Close modal with Escape key
            document.addEventListener('keydown', function(event) {
                if (event.key === 'Escape') {
                    const modals = document.querySelectorAll('.modal');
                    modals.forEach(modal => {
                        if (modal.style.display === 'flex') {
                            modal.style.display = 'none';
                            document.body.style.overflow = 'auto';
                        }
                    });
                }
            });

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
