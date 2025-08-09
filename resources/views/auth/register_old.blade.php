<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#10b981">
    <title>Register - Desa Cibeureum</title>
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
<body class="min-h-screen flex items-center justify-center p-4 relative overflow-auto">
    <!-- Background Pattern -->
    <div class="absolute inset-0 overflow-hidden z-0">
        <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-village-primary/20 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-village-secondary/15 rounded-full blur-3xl animate-pulse delay-1000"></div>
        <div class="absolute top-3/4 left-3/4 w-48 h-48 bg-village-accent/25 rounded-full blur-2xl animate-pulse delay-500"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-village-primary/10 rounded-full blur-3xl animate-pulse delay-700"></div>
    </div>

    <div class="relative w-full max-w-lg mx-auto z-10 my-8">
        <!-- Logo Section -->
        <div class="text-center mb-8 animate-float relative z-20">
            <div class="relative inline-block">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Cibeureum" class="h-16 w-auto mx-auto mb-4 drop-shadow-2xl relative z-10">
                <div class="absolute inset-0 bg-village-primary/30 rounded-full blur-xl"></div>
            </div>
            <h1 class="text-3xl font-black mb-2 drop-shadow-lg">
                <span class="bg-gradient-to-r from-emerald-400 to-green-400 bg-clip-text text-transparent">Ci</span><span class="text-white">beureum</span>
            </h1>
            <p class="text-white text-base font-medium drop-shadow-md">Daftar Akun Baru</p>
        </div>

        <!-- Register Card -->
        <div class="bg-white/98 backdrop-blur-xl rounded-3xl shadow-2xl border border-white/30 overflow-hidden relative z-20">
            <!-- Header -->
            <div class="bg-gradient-to-r from-village-primary to-village-secondary p-6 text-center relative">
                <div class="absolute inset-0 bg-black/10"></div>
                <div class="relative">
                    <h2 class="text-xl font-bold text-white mb-2 drop-shadow-md">Bergabung dengan Kami</h2>
                    <p class="text-white/95 drop-shadow-sm text-sm">Buat akun untuk mengakses layanan desa</p>
                </div>
                
                <!-- Floating Icon -->
                <div class="absolute -bottom-6 left-1/2 transform -translate-x-1/2">
                    <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center shadow-lg">
                        <i class="fas fa-user-plus text-village-primary text-lg"></i>
                    </div>
                </div>
            </div>

            <!-- Form Content -->
            <div class="p-6 pt-12">
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

                <form method="POST" action="{{ route('register.process') }}" class="space-y-5">
                    @csrf
                    
                    <!-- Name Fields Row -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- First Name -->
                        <div class="space-y-2">
                            <label for="first_name" class="block text-sm font-semibold text-gray-800">
                                Nama Depan
                            </label>
                            <div class="relative group">
                                <input 
                                    type="text" 
                                    id="first_name" 
                                    name="first_name" 
                                    class="w-full px-4 py-3 pl-10 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-village-primary/20 focus:border-village-primary transition-all duration-300 bg-gray-50 focus:bg-white text-gray-900 placeholder-gray-400 text-sm" 
                                    placeholder="Nama depan"
                                    value="{{ old('first_name') }}"
                                    required
                                >
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none group-focus-within:text-village-primary transition-colors duration-300">
                                    <i class="fas fa-user text-gray-400 group-focus-within:text-village-primary text-sm"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Last Name -->
                        <div class="space-y-2">
                            <label for="last_name" class="block text-sm font-semibold text-gray-800">
                                Nama Belakang
                            </label>
                            <div class="relative group">
                                <input 
                                    type="text" 
                                    id="last_name" 
                                    name="last_name" 
                                    class="w-full px-4 py-3 pl-10 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-village-primary/20 focus:border-village-primary transition-all duration-300 bg-gray-50 focus:bg-white text-gray-900 placeholder-gray-400 text-sm" 
                                    placeholder="Nama belakang"
                                    value="{{ old('last_name') }}"
                                    required
                                >
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none group-focus-within:text-village-primary transition-colors duration-300">
                                    <i class="fas fa-user text-gray-400 group-focus-within:text-village-primary text-sm"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Email Field -->
                    <div class="space-y-2">
                        <label for="email" class="block text-sm font-semibold text-gray-800">
                            Alamat Email
                        </label>
                        <div class="relative group">
                            <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                class="w-full px-4 py-3 pl-10 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-village-primary/20 focus:border-village-primary transition-all duration-300 bg-gray-50 focus:bg-white text-gray-900 placeholder-gray-400 text-sm" 
                                placeholder="Masukkan alamat email Anda"
                                value="{{ old('email') }}"
                                required
                            >
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none group-focus-within:text-village-primary transition-colors duration-300">
                                <i class="fas fa-envelope text-gray-400 group-focus-within:text-village-primary text-sm"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Password Fields Row -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- Password -->
                        <div class="space-y-2">
                            <label for="password" class="block text-sm font-semibold text-gray-800">
                                Password
                            </label>
                            <div class="relative group">
                                <input 
                                    type="password" 
                                    id="password" 
                                    name="password" 
                                    class="w-full px-4 py-3 pl-10 pr-10 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-village-primary/20 focus:border-village-primary transition-all duration-300 bg-gray-50 focus:bg-white text-gray-900 placeholder-gray-400 text-sm" 
                                    placeholder="Buat password"
                                    required
                                >
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none group-focus-within:text-village-primary transition-colors duration-300">
                                    <i class="fas fa-lock text-gray-400 group-focus-within:text-village-primary text-sm"></i>
                                </div>
                                <button 
                                    type="button" 
                                    onclick="togglePassword('password')" 
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-village-primary transition-colors duration-300 focus:outline-none"
                                >
                                    <i class="fas fa-eye text-xs" id="password-toggle-icon"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div class="space-y-2">
                            <label for="password_confirmation" class="block text-sm font-semibold text-gray-800">
                                Konfirmasi Password
                            </label>
                            <div class="relative group">
                                <input 
                                    type="password" 
                                    id="password_confirmation" 
                                    name="password_confirmation" 
                                    class="w-full px-4 py-3 pl-10 pr-10 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-village-primary/20 focus:border-village-primary transition-all duration-300 bg-gray-50 focus:bg-white text-gray-900 placeholder-gray-400 text-sm" 
                                    placeholder="Ulangi password"
                                    required
                                >
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none group-focus-within:text-village-primary transition-colors duration-300">
                                    <i class="fas fa-lock text-gray-400 group-focus-within:text-village-primary text-sm"></i>
                                </div>
                                <button 
                                    type="button" 
                                    onclick="togglePassword('password_confirmation')" 
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-village-primary transition-colors duration-300 focus:outline-none"
                                >
                                    <i class="fas fa-eye text-xs" id="password_confirmation-toggle-icon"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Terms Agreement -->
                    <div class="flex items-start space-x-3 mt-6">
                        <input 
                            type="checkbox" 
                            id="terms" 
                            name="terms" 
                            class="w-5 h-5 text-village-primary border-2 border-gray-300 rounded focus:ring-village-primary focus:ring-2 transition-all duration-300 mt-0.5"
                            required
                        >
                        <label for="terms" class="text-sm text-gray-700 leading-relaxed select-none">
                            Saya menyetujui <a href="#" class="text-village-primary hover:text-village-secondary font-medium underline">syarat dan ketentuan</a> serta <a href="#" class="text-village-primary hover:text-village-secondary font-medium underline">kebijakan privasi</a> yang berlaku.
                        </label>
                    </div>

                    <!-- Register Button -->
                    <button 
                        type="submit" 
                        class="w-full bg-gradient-to-r from-village-primary to-village-secondary text-white py-4 px-6 rounded-xl font-semibold text-base hover:from-village-secondary hover:to-village-primary focus:ring-4 focus:ring-village-primary/30 transition-all duration-300 transform hover:scale-[1.02] active:scale-[0.98] shadow-xl hover:shadow-2xl mt-8"
                    >
                        <i class="fas fa-user-plus mr-2"></i>
                        Daftar Sekarang
                    </button>
                </form>

                <!-- Login Link -->
                <div class="mt-8 pt-6 border-t border-gray-200 text-center">
                    <p class="text-gray-700 mb-4 font-medium">Sudah memiliki akun?</p>
                    <a 
                        href="{{ route('login') }}" 
                        class="inline-flex items-center px-8 py-3 border-2 border-village-primary text-village-primary rounded-xl font-semibold hover:bg-village-primary hover:text-white transition-all duration-300 transform hover:scale-[1.02] text-base"
                    >
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Masuk Sekarang
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

        .form-select {
            width: 100%;
            padding: 12px 12px 12px 40px;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            font-size: 14px;
            transition: all 0.3s ease;
            background: #f9fafb;
            cursor: pointer;
        }

        .form-select:focus {
            outline: none;
            border-color: #10b981;
            background: white;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            cursor: pointer;
            font-size: 16px;
            z-index: 2;
            transition: color 0.3s ease;
        }

        .password-toggle:hover {
            color: #10b981;
        }

        .register-btn {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            margin-top: 20px;
        }

        .register-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .register-btn:hover::before {
            left: 100%;
        }

        .register-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(16, 185, 129, 0.4);
        }

        .register-btn:active {
            transform: translateY(0);
        }

        .login-link {
            text-align: center;
            margin-top: 24px;
            padding-top: 24px;
            border-top: 1px solid #e5e7eb;
        }

        .login-link p {
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .login-link a {
            color: #10b981;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .login-link a:hover {
            color: #059669;
        }

        .alert {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
        }

        .alert-error {
            background: #fef2f2;
            color: #dc2626;
            border: 1px solid #fecaca;
        }

        .password-strength {
            margin-top: 8px;
            font-size: 12px;
        }

        .strength-bar {
            height: 4px;
            border-radius: 2px;
            margin-top: 4px;
            transition: all 0.3s ease;
        }

        .strength-weak { background: #ef4444; width: 25%; }
        .strength-medium { background: #f59e0b; width: 50%; }
        .strength-strong { background: #10b981; width: 75%; }
        .strength-very-strong { background: #059669; width: 100%; }

        @media (max-width: 768px) {
            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }
            
            .register-container {
                margin: 10px;
                border-radius: 16px;
            }
            
            .register-form {
                padding: 40px 20px 20px;
            }
            
            .register-header {
                padding: 30px 20px;
            }
        }
    </style>
</head>

<body>
    <div class="register-container">
        <div class="register-header">
            <h1>Buat Akun Baru</h1>
            <p>Daftar untuk bergabung dengan SiDesa</p>
            <div class="register-icon">
                <i class="fas fa-user-plus"></i>
            </div>
        </div>

        <div class="register-form">
            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-circle"></i>
                    @foreach($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('register.process') }}" id="registerForm">
                @csrf
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <div class="input-container">
                            <i class="fas fa-user input-icon"></i>
                            <input 
                                type="text" 
                                id="name" 
                                name="name" 
                                class="form-input" 
                                placeholder="Masukkan nama lengkap"
                                value="{{ old('name') }}"
                                required 
                                autofocus
                            >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <div class="input-container">
                            <i class="fas fa-envelope input-icon"></i>
                            <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                class="form-input" 
                                placeholder="Masukkan email"
                                value="{{ old('email') }}"
                                required
                            >
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <div class="input-container">
                            <i class="fas fa-id-card input-icon"></i>
                            <input 
                                type="text" 
                                id="nik" 
                                name="nik" 
                                class="form-input" 
                                placeholder="Masukkan NIK"
                                value="{{ old('nik') }}"
                                maxlength="16"
                                required
                            >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="no_kk">No. KK</label>
                        <div class="input-container">
                            <i class="fas fa-users input-icon"></i>
                            <input 
                                type="text" 
                                id="no_kk" 
                                name="no_kk" 
                                class="form-input" 
                                placeholder="Masukkan No. KK"
                                value="{{ old('no_kk') }}"
                                maxlength="16"
                                required
                            >
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <div class="input-container">
                            <i class="fas fa-map-marker-alt input-icon"></i>
                            <input 
                                type="text" 
                                id="tempat_lahir" 
                                name="tempat_lahir" 
                                class="form-input" 
                                placeholder="Masukkan tempat lahir"
                                value="{{ old('tempat_lahir') }}"
                                required
                            >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <div class="input-container">
                            <i class="fas fa-calendar input-icon"></i>
                            <input 
                                type="date" 
                                id="tanggal_lahir" 
                                name="tanggal_lahir" 
                                class="form-input" 
                                value="{{ old('tanggal_lahir') }}"
                                required
                            >
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <div class="input-container">
                            <i class="fas fa-venus-mars input-icon"></i>
                            <select 
                                id="jenis_kelamin" 
                                name="jenis_kelamin" 
                                class="form-select" 
                                required
                            >
                                <option value="">Pilih jenis kelamin</option>
                                <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="agama">Agama</label>
                        <div class="input-container">
                            <i class="fas fa-pray input-icon"></i>
                            <select 
                                id="agama" 
                                name="agama" 
                                class="form-select" 
                                required
                            >
                                <option value="">Pilih agama</option>
                                <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                <option value="Kristen" {{ old('agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                <option value="Katolik" {{ old('agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                <option value="Buddha" {{ old('agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                <option value="Konghucu" {{ old('agama') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="status_perkawinan">Status Perkawinan</label>
                        <div class="input-container">
                            <i class="fas fa-heart input-icon"></i>
                            <select 
                                id="status_perkawinan" 
                                name="status_perkawinan" 
                                class="form-select" 
                                required
                            >
                                <option value="">Pilih status</option>
                                <option value="Belum Kawin" {{ old('status_perkawinan') == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                                <option value="Kawin" {{ old('status_perkawinan') == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                                <option value="Cerai Hidup" {{ old('status_perkawinan') == 'Cerai Hidup' ? 'selected' : '' }}>Cerai Hidup</option>
                                <option value="Cerai Mati" {{ old('status_perkawinan') == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="pekerjaan">Pekerjaan</label>
                        <div class="input-container">
                            <i class="fas fa-briefcase input-icon"></i>
                            <input 
                                type="text" 
                                id="pekerjaan" 
                                name="pekerjaan" 
                                class="form-input" 
                                placeholder="Masukkan pekerjaan"
                                value="{{ old('pekerjaan') }}"
                                required
                            >
                        </div>
                    </div>
                </div>

                <div class="form-group full-width">
                    <label for="alamat">Alamat Lengkap</label>
                    <div class="input-container">
                        <i class="fas fa-home input-icon"></i>
                        <input 
                            type="text" 
                            id="alamat" 
                            name="alamat" 
                            class="form-input" 
                            placeholder="Masukkan alamat lengkap"
                            value="{{ old('alamat') }}"
                            required
                        >
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-container">
                            <i class="fas fa-lock input-icon"></i>
                            <input 
                                type="password" 
                                id="password" 
                                name="password" 
                                class="form-input" 
                                placeholder="Masukkan password"
                                required
                                minlength="8"
                            >
                            <i class="fas fa-eye password-toggle" onclick="togglePassword('password')"></i>
                        </div>
                        <div id="password-strength" class="password-strength"></div>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <div class="input-container">
                            <i class="fas fa-lock input-icon"></i>
                            <input 
                                type="password" 
                                id="password_confirmation" 
                                name="password_confirmation" 
                                class="form-input" 
                                placeholder="Konfirmasi password"
                                required
                                minlength="8"
                            >
                            <i class="fas fa-eye password-toggle" onclick="togglePassword('password_confirmation')"></i>
                        </div>
                    </div>
                </div>

                <button type="submit" class="register-btn">
                    <i class="fas fa-user-plus"></i> Daftar Akun
                </button>
            </form>

            <div class="login-link">
                <p>Sudah punya akun?</p>
                <a href="{{ route('login') }}">
                    <i class="fas fa-sign-in-alt"></i> Masuk Sekarang
                </a>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(fieldId) {
            const passwordInput = document.getElementById(fieldId);
            const toggleIcon = passwordInput.nextElementSibling;
            
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

        // Password strength checker
        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;
            const strengthDiv = document.getElementById('password-strength');
            
            let strength = 0;
            let feedback = '';
            
            if (password.length >= 8) strength++;
            if (password.match(/[a-z]/)) strength++;
            if (password.match(/[A-Z]/)) strength++;
            if (password.match(/[0-9]/)) strength++;
            if (password.match(/[^a-zA-Z0-9]/)) strength++;
            
            switch(strength) {
                case 0:
                case 1:
                    feedback = '<span style="color: #ef4444;">Password lemah</span>';
                    strengthDiv.innerHTML = feedback + '<div class="strength-bar strength-weak"></div>';
                    break;
                case 2:
                    feedback = '<span style="color: #f59e0b;">Password sedang</span>';
                    strengthDiv.innerHTML = feedback + '<div class="strength-bar strength-medium"></div>';
                    break;
                case 3:
                case 4:
                    feedback = '<span style="color: #10b981;">Password kuat</span>';
                    strengthDiv.innerHTML = feedback + '<div class="strength-bar strength-strong"></div>';
                    break;
                case 5:
                    feedback = '<span style="color: #059669;">Password sangat kuat</span>';
                    strengthDiv.innerHTML = feedback + '<div class="strength-bar strength-very-strong"></div>';
                    break;
            }
        });

        // Form validation
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            const password = document.getElementById('password').value;
            const passwordConfirm = document.getElementById('password_confirmation').value;
            
            if (password !== passwordConfirm) {
                e.preventDefault();
                alert('Password dan konfirmasi password tidak cocok!');
                return;
            }
            
            if (password.length < 8) {
                e.preventDefault();
                alert('Password minimal 8 karakter!');
                return;
            }
        });

        // NIK and No. KK validation (only numbers)
        document.getElementById('nik').addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        document.getElementById('no_kk').addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    </script>
</body>
</html>
