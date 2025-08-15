<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#10b981">
    <title>Cibeureum - Sistem Informasi Desa</title>
    
    <!-- Favicon - Multiple formats for better compatibility -->
    <link rel="icon" type="image/x-icon" href="{{ url('/favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('/favicon.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('/favicon.png') }}">
    <link rel="shortcut icon" href="{{ url('/favicon.ico') }}">
    <!-- Fallback to images folder -->
    <link rel="alternate icon" type="image/png" href="{{ asset('images/logo.png') }}">
    
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
        
        .sidebar-blur {
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }
        
        .nav-item-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .nav-item-hover:hover {
            transform: translateX(8px);
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(5, 150, 105, 0.1));
        }
        
        .stat-card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .stat-card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        /* Additional custom styles for enhanced effects */
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-village-light via-white to-village-accent/20 font-sans">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="fixed inset-y-0 left-0 z-50 w-72 bg-white/80 sidebar-blur border-r border-village-primary/20 shadow-xl transition-transform duration-300 ease-in-out lg:translate-x-0 -translate-x-full" id="sidebar">
            <!-- Sidebar Header -->
            <div class="flex items-center justify-between p-6 border-b border-village-primary/10">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-village-primary to-village-secondary rounded-xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-home text-white text-lg"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold bg-gradient-to-r from-village-primary to-village-secondary bg-clip-text text-transparent">
                            CIBEUREUM
                        </h1>
                        <p class="text-xs text-gray-500 font-medium">Portal Masyarakat</p>
                    </div>
                </div>
                <button class="lg:hidden p-2 rounded-lg hover:bg-village-primary/10 transition-colors" id="sidebarClose">
                    <i class="fas fa-times text-gray-600"></i>
                </button>
            </div>

            <!-- Navigation -->
            <nav class="p-6 space-y-2">
                <a href="{{ route('user.dashboard') }}" class="nav-item-hover flex items-center space-x-3 px-4 py-3 rounded-xl text-gray-700 hover:text-village-primary font-medium {{ request()->routeIs('user.dashboard') ? 'bg-gradient-to-r from-village-primary/10 to-village-secondary/10 text-village-primary border-r-4 border-village-primary' : '' }}">
                    <i class="fas fa-tachometer-alt w-5"></i>
                    <span>Dashboard</span>
                </a>
                
                <a href="{{ route('user.pengajuan.form') }}" class="nav-item-hover flex items-center space-x-3 px-4 py-3 rounded-xl text-gray-700 hover:text-village-primary font-medium {{ request()->routeIs('user.pengajuan.form') ? 'bg-gradient-to-r from-village-primary/10 to-village-secondary/10 text-village-primary border-r-4 border-village-primary' : '' }}">
                    <i class="fas fa-plus-circle w-5"></i>
                    <span>Buat Pengajuan</span>
                </a>
                
                <a href="{{ route('user.pengumuman.index') }}" class="nav-item-hover flex items-center space-x-3 px-4 py-3 rounded-xl text-gray-700 hover:text-village-primary font-medium {{ request()->routeIs('user.pengumuman.*') ? 'bg-gradient-to-r from-village-primary/10 to-village-secondary/10 text-village-primary border-r-4 border-village-primary' : '' }}">
                    <i class="fas fa-bullhorn w-5"></i>
                    <span>Pengumuman</span>
                </a>
                
                <a href="{{ route('user.riwayat') }}" class="nav-item-hover flex items-center space-x-3 px-4 py-3 rounded-xl text-gray-700 hover:text-village-primary font-medium {{ request()->routeIs('user.riwayat') ? 'bg-gradient-to-r from-village-primary/10 to-village-secondary/10 text-village-primary border-r-4 border-village-primary' : '' }}">
                    <i class="fas fa-history w-5"></i>
                    <span>Riwayat Pengajuan</span>
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 lg:ml-72 min-h-screen">
            <!-- Header -->
            <header class="bg-white/80 backdrop-blur-md border-b border-village-primary/10 px-6 py-4 shadow-sm sticky top-0 z-40">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <button class="lg:hidden p-2 rounded-lg hover:bg-village-primary/10 transition-colors" id="mobileMenuToggle">
                            <i class="fas fa-bars text-gray-600"></i>
                        </button>
                        <div>
                            <h2 class="text-lg font-semibold text-gray-900">@yield('title', 'Dashboard')</h2>
                            <nav class="text-sm text-gray-500">
                                <a href="{{ route('user.dashboard') }}" class="hover:text-village-primary transition-colors">Dashboard</a>
                                @if(!request()->routeIs('user.dashboard'))
                                    <span class="mx-2">/</span>
                                    <span class="text-village-primary">{{ 
                                        request()->routeIs('user.pengajuan.form') ? 'Buat Pengajuan' : 
                                        (request()->routeIs('user.riwayat') ? 'Riwayat' : 
                                        (request()->routeIs('user.pengumuman.*') ? 'Pengumuman' : 'Page'))
                                    }}</span>
                                @endif
                            </nav>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <!-- User Menu -->
                        <div class="relative">
                            <button class="flex items-center space-x-3 px-4 py-2 bg-gradient-to-r from-village-primary/10 to-village-secondary/10 rounded-xl hover:from-village-primary/20 hover:to-village-secondary/20 transition-all duration-300 border border-village-primary/20" id="userMenuButton">
                                <div class="w-8 h-8 bg-gradient-to-br from-village-primary to-village-secondary rounded-full flex items-center justify-center shadow-lg">
                                    <i class="fas fa-user text-white text-sm"></i>
                                </div>
                                <div class="text-left hidden sm:block">
                                    <div class="text-sm font-medium text-gray-900">{{ Auth::user()->name ?? 'User' }}</div>
                                    <div class="text-xs text-gray-500">Masyarakat</div>
                                </div>
                                <i class="fas fa-chevron-down text-gray-400 text-xs hidden sm:block"></i>
                            </button>
                            
                            <div class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-xl border border-gray-100 py-2 opacity-0 invisible transition-all duration-200" id="userMenuDropdown">
                                <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-village-primary/5 hover:text-village-primary transition-colors">
                                    <i class="fas fa-user-circle mr-3 text-gray-400"></i>
                                    Profile
                                </a>
                                <hr class="my-2 border-gray-100">
                                <form method="POST" action="{{ route('logout') }}" class="block">
                                    @csrf
                                    <button type="submit" class="flex items-center w-full px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors">
                                        <i class="fas fa-sign-out-alt mr-3 text-red-400"></i>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Content -->
            <main class="p-6 animate-fade-in">
                @yield('content')
            </main>

            <!-- Footer -->
            <footer class="bg-gradient-to-r from-village-dark to-village-primary text-white text-center py-6 mt-auto">
                <div class="flex flex-col sm:flex-row items-center justify-center space-y-2 sm:space-y-0 sm:space-x-4">
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-home text-village-accent"></i>
                        <span class="font-medium">Desa Cibeureum</span>
                    </div>
                    <div class="hidden sm:block w-1 h-1 bg-village-accent rounded-full"></div>
                    <p class="text-sm opacity-90">&copy; 2025 Sistem Informasi Desa. All rights reserved.</p>
                </div>
            </footer>
        </div>
    </div>

    <script>
        // Sidebar Toggle for Mobile
        document.getElementById('mobileMenuToggle')?.addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.remove('-translate-x-full');
        });

        document.getElementById('sidebarClose')?.addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.add('-translate-x-full');
        });

        // Close sidebar when clicking outside (mobile)
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const mobileToggle = document.getElementById('mobileMenuToggle');
            
            if (!sidebar.contains(event.target) && !mobileToggle?.contains(event.target)) {
                if (window.innerWidth < 1024) {
                    sidebar.classList.add('-translate-x-full');
                }
            }
        });

        // User Menu Dropdown
        document.getElementById('userMenuButton')?.addEventListener('click', function() {
            const dropdown = document.getElementById('userMenuDropdown');
            dropdown.classList.toggle('opacity-0');
            dropdown.classList.toggle('invisible');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const userMenu = document.querySelector('.relative');
            if (!userMenu?.contains(event.target)) {
                const dropdown = document.getElementById('userMenuDropdown');
                dropdown?.classList.add('opacity-0', 'invisible');
            }
        });

        // Auto-hide alerts
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert-auto-hide');
            alerts.forEach(alert => {
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 300);
            });
        }, 5000);
    </script>
</body>
</html>
