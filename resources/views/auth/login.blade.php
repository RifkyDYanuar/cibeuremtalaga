<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#10b981">
    <title>Login - SiDesa Cibeureum</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
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
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'system-ui', '-apple-system', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #1f2937 0%, #374151 30%, #4b5563 70%, #6b7280 100%);
            min-height: 100vh;
            position: relative;
        }
        
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, rgba(5, 150, 105, 0.15) 50%, rgba(52, 211, 153, 0.1) 100%);
            z-index: 1;
        }

        .glass {
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }
        
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #10b981, #34d399);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4 relative">
    <!-- Background Pattern -->
    <div class="absolute inset-0 overflow-hidden z-0">
        <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-village-primary/20 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-village-secondary/15 rounded-full blur-3xl animate-pulse delay-1000"></div>
        <div class="absolute top-3/4 left-3/4 w-48 h-48 bg-village-accent/25 rounded-full blur-2xl animate-pulse delay-500"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-village-primary/10 rounded-full blur-3xl animate-pulse delay-700"></div>
    </div>

    <div class="relative w-full max-w-md mx-auto z-10">
        <!-- Logo Section -->
        <div class="text-center mb-8 animate-float relative z-20">
            <div class="relative inline-block">
                <img src="{{ asset('images/logo.png') }}" alt="Logo SiDesa" class="h-20 w-auto mx-auto mb-4 drop-shadow-2xl relative z-10">
                <div class="absolute inset-0 bg-village-primary/30 rounded-full blur-xl"></div>
            </div>
            <h1 class="text-4xl font-black mb-2 drop-shadow-lg">
                <span class="bg-gradient-to-r from-emerald-400 to-green-400 bg-clip-text text-transparent">Si</span><span class="text-white">Desa</span>
            </h1>
            <p class="text-white text-lg font-medium drop-shadow-md">Sistem Informasi Desa Cibeureum</p>
        </div>

        <!-- Login Card -->
        <div class="bg-white/98 backdrop-blur-xl rounded-3xl shadow-2xl border border-white/30 overflow-hidden relative z-20">
            <!-- Header -->
            <div class="bg-gradient-to-r from-village-primary to-village-secondary p-8 text-center relative">
                <div class="absolute inset-0 bg-black/10"></div>
                <div class="relative">
                    <h2 class="text-2xl font-bold text-white mb-2 drop-shadow-md">Selamat Datang Kembali</h2>
                    <p class="text-white/95 drop-shadow-sm">Masuk ke akun SiDesa Anda</p>
                </div>
                
                <!-- Floating Icon -->
                <div class="absolute -bottom-6 left-1/2 transform -translate-x-1/2">
                    <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center shadow-lg">
                        <i class="fas fa-user text-village-primary text-lg"></i>
                    </div>
                </div>
            </div>

            <!-- Form Content -->
            <div class="p-8 pt-12">
                @if(session('success'))
                    <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-3"></i>
                            <p class="text-green-700 text-sm font-medium">{{ session('success') }}</p>
                        </div>
                    </div>
                @endif

                @if($errors->any())
                    <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl">
                        <div class="flex items-start">
                            <i class="fas fa-exclamation-circle text-red-500 mr-3 mt-0.5"></i>
                            <div class="text-red-700 text-sm">
                                @foreach($errors->all() as $error)
                                    <p class="font-medium">{{ $error }}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

                <form method="POST" action="{{ route('login.process') }}" class="space-y-6">
                    @csrf
                    
                    <!-- Email Field -->
                    <div class="space-y-3">
                        <label for="email" class="block text-sm font-semibold text-gray-800">
                            Email Address
                        </label>
                        <div class="relative group">
                            <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                class="w-full px-4 py-4 pl-12 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-village-primary/20 focus:border-village-primary transition-all duration-300 bg-gray-50 focus:bg-white text-gray-900 placeholder-gray-400 text-base" 
                                placeholder="Masukkan alamat email Anda"
                                value="{{ old('email') }}"
                                required 
                                autofocus
                            >
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none group-focus-within:text-village-primary transition-colors duration-300">
                                <i class="fas fa-envelope text-gray-400 group-focus-within:text-village-primary"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Password Field -->
                    <div class="space-y-3">
                        <label for="password" class="block text-sm font-semibold text-gray-800">
                            Password
                        </label>
                        <div class="relative group">
                            <input 
                                type="password" 
                                id="password" 
                                name="password" 
                                class="w-full px-4 py-4 pl-12 pr-12 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-village-primary/20 focus:border-village-primary transition-all duration-300 bg-gray-50 focus:bg-white text-gray-900 placeholder-gray-400 text-base" 
                                placeholder="Masukkan password Anda"
                                required
                            >
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none group-focus-within:text-village-primary transition-colors duration-300">
                                <i class="fas fa-lock text-gray-400 group-focus-within:text-village-primary"></i>
                            </div>
                            <button 
                                type="button" 
                                onclick="togglePassword()" 
                                class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-village-primary transition-colors duration-300 focus:outline-none"
                            >
                                <i class="fas fa-eye" id="password-toggle-icon"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between mt-6">
                        <label class="flex items-center cursor-pointer">
                            <input 
                                type="checkbox" 
                                id="remember" 
                                name="remember" 
                                class="w-5 h-5 text-village-primary border-2 border-gray-300 rounded-md focus:ring-village-primary focus:ring-2 transition-all duration-300"
                            >
                            <span class="ml-3 text-sm text-gray-700 font-medium select-none">Ingat saya</span>
                        </label>
                    </div>

                    <!-- Login Button -->
                    <button 
                        type="submit" 
                        class="w-full bg-gradient-to-r from-village-primary to-village-secondary text-white py-4 px-6 rounded-xl font-semibold text-lg hover:from-village-secondary hover:to-village-primary focus:ring-4 focus:ring-village-primary/30 transition-all duration-300 transform hover:scale-[1.02] active:scale-[0.98] shadow-xl hover:shadow-2xl mt-8"
                    >
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Masuk ke Dashboard
                    </button>
                </form>

                <!-- Register Link -->
                <div class="mt-8 pt-6 border-t border-gray-200 text-center">
                    <p class="text-gray-700 mb-4 font-medium">Belum memiliki akun?</p>
                    <a 
                        href="{{ route('register') }}" 
                        class="inline-flex items-center px-8 py-3 border-2 border-village-primary text-village-primary rounded-xl font-semibold hover:bg-village-primary hover:text-white transition-all duration-300 transform hover:scale-[1.02] text-base"
                    >
                        <i class="fas fa-user-plus mr-2"></i>
                        Daftar Sekarang
                    </a>
                </div>
            </div>
        </div>

        <!-- Back to Home -->
        <div class="text-center mt-6 relative z-20">
            <a 
                href="{{ route('welcome') }}" 
                class="inline-flex items-center text-white hover:text-gray-200 font-medium transition-colors duration-300 bg-black/30 backdrop-blur-md px-4 py-2 rounded-full hover:bg-black/40 drop-shadow-md"
            >
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali ke Beranda
            </a>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('password-toggle-icon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        // Form validation and animation
        document.querySelector('form').addEventListener('submit', function(e) {
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            
            if (!email || !password) {
                e.preventDefault();
                
                // Show error message with animation
                const errorDiv = document.createElement('div');
                errorDiv.className = 'mb-6 p-4 bg-red-50 border border-red-200 rounded-xl animate-pulse';
                errorDiv.innerHTML = `
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-circle text-red-500 mr-3"></i>
                        <p class="text-red-700 text-sm font-medium">Mohon lengkapi semua field yang diperlukan</p>
                    </div>
                `;
                
                const form = document.querySelector('form');
                form.insertBefore(errorDiv, form.firstChild);
                
                // Remove error after 5 seconds
                setTimeout(() => {
                    errorDiv.remove();
                }, 5000);
            } else {
                // Add loading state to button
                const submitBtn = document.querySelector('button[type="submit"]');
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Sedang Masuk...';
                submitBtn.disabled = true;
            }
        });

        // Add focus animations
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('input[type="email"], input[type="password"]');
            
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.classList.add('scale-105');
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.classList.remove('scale-105');
                });
            });
        });
    </script>
</body>
</html>