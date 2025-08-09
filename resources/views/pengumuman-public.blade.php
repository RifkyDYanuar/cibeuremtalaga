<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengumuman Desa - SiDesa Cibeureum</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
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
    <style>
        /* Glass morphism base styles */
        .glass {
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        .glass-dark {
            background: rgba(15, 23, 42, 0.9);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
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
    <!-- Hero Section -->
    <section class="relative py-32 overflow-hidden bg-gradient-to-br from-village-primary via-village-secondary to-village-accent">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><g fill="%23ffffff" fill-opacity="0.1"><circle cx="10" cy="10" r="2"/></g></svg>');"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto px-4 text-center text-white">
            <div class="animate-slideUp">
                <h1 class="text-5xl md:text-7xl font-black mb-6 hero-title">
                    Pengumuman <span class="text-village-accent">Desa</span>
                </h1>
            </div>
            <div class="animate-slideUp" style="animation-delay: 0.3s;">
                <p class="text-xl md:text-2xl mb-8 opacity-95 max-w-3xl mx-auto leading-relaxed hero-subtitle">
                    Informasi terbaru dan pengumuman resmi dari Desa Cibeureum
                </p>
            </div>
        </div>
    </section>

    <!-- Navigation -->
    <nav class="glass-nav fixed top-0 left-0 right-0 z-50 glass border-b border-white/10 transition-all duration-300" style="background: rgba(255, 255, 255, 0.95);">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-center justify-between h-16">
                <a href="{{ route('welcome') }}" 
                   class="flex items-center space-x-3 text-village-primary hover:text-village-secondary transition-colors duration-300 font-semibold">
                    <i class="fas fa-arrow-left text-lg"></i>
                    <span>Kembali ke Beranda</span>
                </a>
                
                <button onclick="toggleTheme()"
                    class="px-4 py-2 glass border border-village-primary/30 text-village-primary hover:bg-village-primary/20 rounded-full transition-all duration-300 flex items-center space-x-2">
                    <i class="fas fa-moon" id="theme-icon"></i>
                    <span id="theme-text" class="text-sm font-medium">Dark</span>
                </button>
            </div>
        </div>
    </nav>
        
    <!-- Filter Section -->
    <section class="py-8 bg-gradient-to-r from-gray-50 to-white dark:from-dark-100 dark:to-dark-200 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4">
            <div class="bg-white dark:bg-dark-300 p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                <div class="text-center mb-6">
                    <div class="inline-block px-6 py-2 bg-village-primary/10 text-village-primary rounded-full text-sm font-semibold mb-4">
                        🔍 FILTER PENGUMUMAN
                    </div>
                    <h3 class="text-2xl font-black text-gray-900 dark:text-white">
                        Cari <span class="gradient-text">Pengumuman</span>
                    </h3>
                </div>
                <form class="flex flex-col md:flex-row gap-4" method="GET">
                    <input type="text" 
                           name="search" 
                           placeholder="Cari pengumuman..." 
                           value="{{ request('search') }}"
                           class="flex-1 px-4 py-3 border-2 border-gray-200 dark:border-gray-600 rounded-xl bg-white dark:bg-dark-400 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:border-village-primary focus:outline-none transition-colors duration-300">
                    <select name="kategori" 
                            class="px-4 py-3 border-2 border-gray-200 dark:border-gray-600 rounded-xl bg-white dark:bg-dark-400 text-gray-900 dark:text-white focus:border-village-primary focus:outline-none transition-colors duration-300">
                        <option value="">Semua Kategori</option>
                        <option value="umum" {{ request('kategori') == 'umum' ? 'selected' : '' }}>Umum</option>
                        <option value="penting" {{ request('kategori') == 'penting' ? 'selected' : '' }}>Penting</option>
                        <option value="kegiatan" {{ request('kategori') == 'kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                        <option value="pembangunan" {{ request('kategori') == 'pembangunan' ? 'selected' : '' }}>Pembangunan</option>
                        <option value="kesehatan" {{ request('kategori') == 'kesehatan' ? 'selected' : '' }}>Kesehatan</option>
                        <option value="pendidikan" {{ request('kategori') == 'pendidikan' ? 'selected' : '' }}>Pendidikan</option>
                    </select>
                    <button type="submit" 
                            class="px-6 py-3 bg-gradient-to-r from-village-primary to-village-secondary text-white rounded-xl hover:scale-105 transition-all duration-300 font-semibold flex items-center gap-2">
                        <i class="fas fa-search"></i>
                        <span>Cari</span>
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-20 bg-gradient-to-br from-gray-50 to-white dark:from-dark-100 dark:to-dark-200 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4">
            <!-- Featured Announcements -->
            @if($featuredAnnouncements->count() > 0)
            <div class="mb-16">
                <div class="text-center mb-12">
                    <div class="inline-block px-6 py-2 bg-village-primary/10 text-village-primary rounded-full text-sm font-semibold mb-4">
                        ⭐ UNGGULAN
                    </div>
                    <h2 class="text-4xl font-black text-gray-900 dark:text-white">
                        Pengumuman <span class="gradient-text">Unggulan</span>
                    </h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($featuredAnnouncements as $announcement)
                    <div class="bg-white dark:bg-dark-300 rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border-l-4 border-village-primary">
                        <div class="flex justify-between items-center p-4 bg-gray-50 dark:bg-dark-400 border-b border-gray-200 dark:border-gray-600">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold text-white
                                @if($announcement->kategori == 'umum') bg-blue-500
                                @elseif($announcement->kategori == 'penting') bg-red-500
                                @elseif($announcement->kategori == 'kegiatan') bg-green-500
                                @elseif($announcement->kategori == 'pembangunan') bg-orange-500
                                @elseif($announcement->kategori == 'kesehatan') bg-purple-500
                                @elseif($announcement->kategori == 'pendidikan') bg-teal-500
                                @else bg-village-primary
                                @endif">
                                {{ ucfirst($announcement->kategori) }}
                            </span>
                            <div class="w-8 h-8 rounded-full flex items-center justify-center text-xs font-bold
                                @if($announcement->prioritas == 'tinggi') bg-red-100 text-red-600
                                @elseif($announcement->prioritas == 'sedang') bg-orange-100 text-orange-600
                                @else bg-green-100 text-green-600
                                @endif">
                                @if($announcement->prioritas == 'tinggi') !
                                @elseif($announcement->prioritas == 'sedang') !!
                                @else !!!
                                @endif
                            </div>
                        </div>
                        
                        @if($announcement->gambar)
                        <div class="h-48 overflow-hidden">
                            <img src="{{ asset('storage/' . $announcement->gambar) }}" 
                                 alt="{{ $announcement->judul }}" 
                                 class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
                        </div>
                        @endif
                        
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3 leading-tight">
                                {{ $announcement->judul }}
                            </h3>
                            <p class="text-gray-600 dark:text-gray-300 mb-4 leading-relaxed">
                                {{ Str::limit(strip_tags($announcement->konten), 120) }}
                            </p>
                            
                            <div class="mb-4">
                                <a href="{{ route('pengumuman.public') }}?id={{ $announcement->id }}" 
                                   class="inline-flex items-center gap-2 px-4 py-2 border-2 border-village-primary text-village-primary hover:bg-village-primary hover:text-white rounded-lg transition-all duration-300 font-semibold">
                                    <i class="fas fa-eye"></i>
                                    Baca Selengkapnya
                                </a>
                            </div>
                            
                            <div class="flex justify-between items-center pt-4 border-t border-gray-200 dark:border-gray-600 text-sm text-gray-500 dark:text-gray-400">
                                <span class="flex items-center gap-2">
                                    <i class="fas fa-calendar text-village-primary"></i>
                                    {{ $announcement->created_at->format('d M Y') }}
                                </span>
                                <span class="flex items-center gap-2">
                                    <i class="fas fa-user text-village-primary"></i>
                                    {{ $announcement->creator->name ?? 'Admin' }}
                                </span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
            
            <!-- All Announcements -->
            <div>
                <div class="text-center mb-12">
                    <div class="inline-block px-6 py-2 bg-village-primary/10 text-village-primary rounded-full text-sm font-semibold mb-4">
                        📢 SEMUA
                    </div>
                    <h2 class="text-4xl font-black text-gray-900 dark:text-white">
                        Semua <span class="gradient-text">Pengumuman</span>
                    </h2>
                </div>
                
                @if($announcements->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                    @foreach($announcements as $announcement)
                    <div class="bg-white dark:bg-dark-300 rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                        <div class="flex justify-between items-center p-4 bg-gray-50 dark:bg-dark-400 border-b border-gray-200 dark:border-gray-600">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold text-white
                                @if($announcement->kategori == 'umum') bg-blue-500
                                @elseif($announcement->kategori == 'penting') bg-red-500
                                @elseif($announcement->kategori == 'kegiatan') bg-green-500
                                @elseif($announcement->kategori == 'pembangunan') bg-orange-500
                                @elseif($announcement->kategori == 'kesehatan') bg-purple-500
                                @elseif($announcement->kategori == 'pendidikan') bg-teal-500
                                @else bg-village-primary
                                @endif">
                                {{ ucfirst($announcement->kategori) }}
                            </span>
                            <div class="w-8 h-8 rounded-full flex items-center justify-center text-xs font-bold
                                @if($announcement->prioritas == 'tinggi') bg-red-100 text-red-600
                                @elseif($announcement->prioritas == 'sedang') bg-orange-100 text-orange-600
                                @else bg-green-100 text-green-600
                                @endif">
                                @if($announcement->prioritas == 'tinggi') !
                                @elseif($announcement->prioritas == 'sedang') !!
                                @else !!!
                                @endif
                            </div>
                        </div>
                        
                        @if($announcement->gambar)
                        <div class="h-48 overflow-hidden">
                            <img src="{{ asset('storage/' . $announcement->gambar) }}" 
                                 alt="{{ $announcement->judul }}" 
                                 class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
                        </div>
                        @endif
                        
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3 leading-tight">
                                {{ $announcement->judul }}
                            </h3>
                            <p class="text-gray-600 dark:text-gray-300 mb-4 leading-relaxed">
                                {{ Str::limit(strip_tags($announcement->konten), 120) }}
                            </p>
                            
                            <div class="mb-4">
                                <a href="{{ route('pengumuman.public') }}?id={{ $announcement->id }}" 
                                   class="inline-flex items-center gap-2 px-4 py-2 border-2 border-village-primary text-village-primary hover:bg-village-primary hover:text-white rounded-lg transition-all duration-300 font-semibold">
                                    <i class="fas fa-eye"></i>
                                    Baca Selengkapnya
                                </a>
                            </div>
                            
                            <div class="flex justify-between items-center pt-4 border-t border-gray-200 dark:border-gray-600 text-sm text-gray-500 dark:text-gray-400">
                                <span class="flex items-center gap-2">
                                    <i class="fas fa-calendar text-village-primary"></i>
                                    {{ $announcement->created_at->format('d M Y') }}
                                </span>
                                <span class="flex items-center gap-2">
                                    <i class="fas fa-user text-village-primary"></i>
                                    {{ $announcement->creator->name ?? 'Admin' }}
                                </span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <!-- Pagination -->
                @if($announcements->hasPages())
                <div class="flex justify-center">
                    <div class="bg-white dark:bg-dark-300 rounded-2xl shadow-lg p-6">
                        {{ $announcements->links() }}
                    </div>
                </div>
                @endif
                @else
                <div class="text-center py-16">
                    <div class="bg-white dark:bg-dark-300 rounded-2xl shadow-lg p-12">
                        <div class="text-6xl text-gray-300 dark:text-gray-600 mb-4">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-600 dark:text-gray-400 mb-2">Tidak ada pengumuman</h3>
                        <p class="text-gray-500 dark:text-gray-500">Belum ada pengumuman yang tersedia saat ini.</p>
                    </div>
                </div>
                @endif
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

            // Navbar scroll effect with village colors
            window.addEventListener('scroll', function() {
                const nav = document.querySelector('.glass-nav');
                if (nav) {
                    if (window.scrollY > 100) {
                        nav.style.background = 'rgba(16, 185, 129, 0.95)';
                        nav.style.boxShadow = '0 2px 20px rgba(0, 0, 0, 0.1)';
                    } else {
                        nav.style.background = 'rgba(255, 255, 255, 0.95)';
                        nav.style.boxShadow = 'none';
                    }
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

            // Observe announcement cards
            document.querySelectorAll('.bg-white').forEach(element => {
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

            // Enhanced hover effects for cards
            document.querySelectorAll('.bg-white').forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-10px)';
                    this.style.boxShadow = '0 20px 40px rgba(16, 185, 129, 0.15)';
                });

                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                    this.style.boxShadow = '';
                });
            });
        });
    </script>
</body>
</html>
