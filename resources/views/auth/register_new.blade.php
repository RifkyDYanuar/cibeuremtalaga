<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar - Cibeureum</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'village-primary': '#10b981',
                        'village-secondary': '#34d399',
                        'village-accent': '#059669',
                        'village-dark': '#047857',
                    },
                    fontFamily: {
                        'sans': ['Inter', 'system-ui', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    
    <style>
        body {
            font-family: 'Inter', system-ui, sans-serif;
            background: linear-gradient(135deg, #10b981 0%, #059669 25%, #047857 50%, #065f46 75%, #064e3b 100%);
            background-attachment: fixed;
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
        }
        
        @keyframes gradientShift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
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

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.5);
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

    <div class="relative w-full max-w-4xl mx-auto z-10 my-8">
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
            <div class="p-6 pt-12 max-h-[70vh] overflow-y-auto">
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

                <form method="POST" action="{{ route('register.process') }}" class="space-y-6" id="registerForm">
                    @csrf
                    
                    <!-- Personal Information Section -->
                    <div class="bg-gray-50 rounded-xl p-5 border border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-user-circle text-village-primary mr-2"></i>
                            Informasi Pribadi
                        </h3>
                        
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                            <!-- Full Name -->
                            <div class="space-y-2">
                                <label for="name" class="block text-sm font-semibold text-gray-800">
                                    Nama Lengkap
                                </label>
                                <div class="relative group">
                                    <input 
                                        type="text" 
                                        id="name" 
                                        name="name" 
                                        class="w-full px-4 py-3 pl-10 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-village-primary/20 focus:border-village-primary transition-all duration-300 bg-white text-gray-900 placeholder-gray-400 text-sm" 
                                        placeholder="Masukkan nama lengkap"
                                        value="{{ old('name') }}"
                                        required
                                        autofocus
                                    >
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none group-focus-within:text-village-primary transition-colors duration-300">
                                        <i class="fas fa-user text-gray-400 group-focus-within:text-village-primary text-sm"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="space-y-2">
                                <label for="email" class="block text-sm font-semibold text-gray-800">
                                    Alamat Email
                                </label>
                                <div class="relative group">
                                    <input 
                                        type="email" 
                                        id="email" 
                                        name="email" 
                                        class="w-full px-4 py-3 pl-10 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-village-primary/20 focus:border-village-primary transition-all duration-300 bg-white text-gray-900 placeholder-gray-400 text-sm" 
                                        placeholder="contoh@email.com"
                                        value="{{ old('email') }}"
                                        required
                                    >
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none group-focus-within:text-village-primary transition-colors duration-300">
                                        <i class="fas fa-envelope text-gray-400 group-focus-within:text-village-primary text-sm"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- NIK -->
                            <div class="space-y-2">
                                <label for="nik" class="block text-sm font-semibold text-gray-800">
                                    NIK
                                </label>
                                <div class="relative group">
                                    <input 
                                        type="text" 
                                        id="nik" 
                                        name="nik" 
                                        class="w-full px-4 py-3 pl-10 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-village-primary/20 focus:border-village-primary transition-all duration-300 bg-white text-gray-900 placeholder-gray-400 text-sm" 
                                        placeholder="16 digit NIK"
                                        value="{{ old('nik') }}"
                                        maxlength="16"
                                        required
                                    >
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none group-focus-within:text-village-primary transition-colors duration-300">
                                        <i class="fas fa-id-card text-gray-400 group-focus-within:text-village-primary text-sm"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- No. KK -->
                            <div class="space-y-2">
                                <label for="no_kk" class="block text-sm font-semibold text-gray-800">
                                    No. KK
                                </label>
                                <div class="relative group">
                                    <input 
                                        type="text" 
                                        id="no_kk" 
                                        name="no_kk" 
                                        class="w-full px-4 py-3 pl-10 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-village-primary/20 focus:border-village-primary transition-all duration-300 bg-white text-gray-900 placeholder-gray-400 text-sm" 
                                        placeholder="16 digit No. KK"
                                        value="{{ old('no_kk') }}"
                                        maxlength="16"
                                        required
                                    >
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none group-focus-within:text-village-primary transition-colors duration-300">
                                        <i class="fas fa-users text-gray-400 group-focus-within:text-village-primary text-sm"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Birth Information Section -->
                    <div class="bg-gray-50 rounded-xl p-5 border border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-birthday-cake text-village-primary mr-2"></i>
                            Informasi Kelahiran
                        </h3>
                        
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                            <!-- Place of Birth -->
                            <div class="space-y-2">
                                <label for="tempat_lahir" class="block text-sm font-semibold text-gray-800">
                                    Tempat Lahir
                                </label>
                                <div class="relative group">
                                    <input 
                                        type="text" 
                                        id="tempat_lahir" 
                                        name="tempat_lahir" 
                                        class="w-full px-4 py-3 pl-10 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-village-primary/20 focus:border-village-primary transition-all duration-300 bg-white text-gray-900 placeholder-gray-400 text-sm" 
                                        placeholder="Kota tempat lahir"
                                        value="{{ old('tempat_lahir') }}"
                                        required
                                    >
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none group-focus-within:text-village-primary transition-colors duration-300">
                                        <i class="fas fa-map-marker-alt text-gray-400 group-focus-within:text-village-primary text-sm"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Date of Birth -->
                            <div class="space-y-2">
                                <label for="tanggal_lahir" class="block text-sm font-semibold text-gray-800">
                                    Tanggal Lahir
                                </label>
                                <div class="relative group">
                                    <input 
                                        type="date" 
                                        id="tanggal_lahir" 
                                        name="tanggal_lahir" 
                                        class="w-full px-4 py-3 pl-10 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-village-primary/20 focus:border-village-primary transition-all duration-300 bg-white text-gray-900 placeholder-gray-400 text-sm" 
                                        value="{{ old('tanggal_lahir') }}"
                                        required
                                    >
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none group-focus-within:text-village-primary transition-colors duration-300">
                                        <i class="fas fa-calendar text-gray-400 group-focus-within:text-village-primary text-sm"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Gender -->
                            <div class="space-y-2">
                                <label for="jenis_kelamin" class="block text-sm font-semibold text-gray-800">
                                    Jenis Kelamin
                                </label>
                                <div class="relative group">
                                    <select 
                                        id="jenis_kelamin" 
                                        name="jenis_kelamin" 
                                        class="w-full px-4 py-3 pl-10 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-village-primary/20 focus:border-village-primary transition-all duration-300 bg-white text-gray-900 text-sm appearance-none cursor-pointer" 
                                        required
                                    >
                                        <option value="">Pilih jenis kelamin</option>
                                        <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none group-focus-within:text-village-primary transition-colors duration-300">
                                        <i class="fas fa-venus-mars text-gray-400 group-focus-within:text-village-primary text-sm"></i>
                                    </div>
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <i class="fas fa-chevron-down text-gray-400 text-xs"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Religion -->
                            <div class="space-y-2">
                                <label for="agama" class="block text-sm font-semibold text-gray-800">
                                    Agama
                                </label>
                                <div class="relative group">
                                    <select 
                                        id="agama" 
                                        name="agama" 
                                        class="w-full px-4 py-3 pl-10 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-village-primary/20 focus:border-village-primary transition-all duration-300 bg-white text-gray-900 text-sm appearance-none cursor-pointer" 
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
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none group-focus-within:text-village-primary transition-colors duration-300">
                                        <i class="fas fa-pray text-gray-400 group-focus-within:text-village-primary text-sm"></i>
                                    </div>
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <i class="fas fa-chevron-down text-gray-400 text-xs"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Information Section -->
                    <div class="bg-gray-50 rounded-xl p-5 border border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-info-circle text-village-primary mr-2"></i>
                            Informasi Tambahan
                        </h3>
                        
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                            <!-- Marital Status -->
                            <div class="space-y-2">
                                <label for="status_perkawinan" class="block text-sm font-semibold text-gray-800">
                                    Status Perkawinan
                                </label>
                                <div class="relative group">
                                    <select 
                                        id="status_perkawinan" 
                                        name="status_perkawinan" 
                                        class="w-full px-4 py-3 pl-10 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-village-primary/20 focus:border-village-primary transition-all duration-300 bg-white text-gray-900 text-sm appearance-none cursor-pointer" 
                                        required
                                    >
                                        <option value="">Pilih status</option>
                                        <option value="Belum Kawin" {{ old('status_perkawinan') == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                                        <option value="Kawin" {{ old('status_perkawinan') == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                                        <option value="Cerai Hidup" {{ old('status_perkawinan') == 'Cerai Hidup' ? 'selected' : '' }}>Cerai Hidup</option>
                                        <option value="Cerai Mati" {{ old('status_perkawinan') == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
                                    </select>
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none group-focus-within:text-village-primary transition-colors duration-300">
                                        <i class="fas fa-heart text-gray-400 group-focus-within:text-village-primary text-sm"></i>
                                    </div>
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <i class="fas fa-chevron-down text-gray-400 text-xs"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Occupation -->
                            <div class="space-y-2">
                                <label for="pekerjaan" class="block text-sm font-semibold text-gray-800">
                                    Pekerjaan
                                </label>
                                <div class="relative group">
                                    <input 
                                        type="text" 
                                        id="pekerjaan" 
                                        name="pekerjaan" 
                                        class="w-full px-4 py-3 pl-10 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-village-primary/20 focus:border-village-primary transition-all duration-300 bg-white text-gray-900 placeholder-gray-400 text-sm" 
                                        placeholder="Pekerjaan saat ini"
                                        value="{{ old('pekerjaan') }}"
                                        required
                                    >
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none group-focus-within:text-village-primary transition-colors duration-300">
                                        <i class="fas fa-briefcase text-gray-400 group-focus-within:text-village-primary text-sm"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Address -->
                            <div class="space-y-2 lg:col-span-2">
                                <label for="alamat" class="block text-sm font-semibold text-gray-800">
                                    Alamat Lengkap
                                </label>
                                <div class="relative group">
                                    <textarea 
                                        id="alamat" 
                                        name="alamat" 
                                        rows="3"
                                        class="w-full px-4 py-3 pl-10 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-village-primary/20 focus:border-village-primary transition-all duration-300 bg-white text-gray-900 placeholder-gray-400 text-sm resize-none" 
                                        placeholder="Alamat lengkap tempat tinggal"
                                        required
                                    >{{ old('alamat') }}</textarea>
                                    <div class="absolute top-3 left-0 pl-3 flex items-start pointer-events-none group-focus-within:text-village-primary transition-colors duration-300">
                                        <i class="fas fa-home text-gray-400 group-focus-within:text-village-primary text-sm mt-0.5"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Password Section -->
                    <div class="bg-gray-50 rounded-xl p-5 border border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-shield-alt text-village-primary mr-2"></i>
                            Keamanan Akun
                        </h3>
                        
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
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
                                        class="w-full px-4 py-3 pl-10 pr-10 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-village-primary/20 focus:border-village-primary transition-all duration-300 bg-white text-gray-900 placeholder-gray-400 text-sm" 
                                        placeholder="Minimal 8 karakter"
                                        required
                                        minlength="8"
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
                                <!-- Password Strength Indicator -->
                                <div id="password-strength" class="text-xs mt-1"></div>
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
                                        class="w-full px-4 py-3 pl-10 pr-10 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-village-primary/20 focus:border-village-primary transition-all duration-300 bg-white text-gray-900 placeholder-gray-400 text-sm" 
                                        placeholder="Ulangi password"
                                        required
                                        minlength="8"
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
                    </div>

                    <!-- Terms Agreement -->
                    <div class="flex items-start space-x-3 mt-6 bg-blue-50 p-4 rounded-xl border border-blue-200">
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

    <script>
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const icon = document.getElementById(fieldId + '-toggle-icon');
            
            if (field.type === 'password') {
                field.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                field.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        // Add floating animation to cards on scroll
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const rate = scrolled * -0.5;
            
            document.querySelectorAll('.animate-float').forEach(element => {
                element.style.transform = `translateY(${rate}px)`;
            });
        });

        // Form validation enhancement
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('#registerForm');
            const inputs = form.querySelectorAll('input[required], select[required], textarea[required]');
            
            // Input validation styling
            inputs.forEach(input => {
                input.addEventListener('blur', function() {
                    if (this.value.trim() === '') {
                        this.classList.add('border-red-300', 'focus:border-red-500');
                        this.classList.remove('border-gray-200', 'focus:border-village-primary');
                    } else {
                        this.classList.remove('border-red-300', 'focus:border-red-500');
                        this.classList.add('border-gray-200', 'focus:border-village-primary');
                    }
                });
            });

            // Password strength indicator
            const passwordField = document.getElementById('password');
            const confirmPasswordField = document.getElementById('password_confirmation');
            const strengthDiv = document.getElementById('password-strength');
            
            passwordField.addEventListener('input', function() {
                const password = this.value;
                const strength = getPasswordStrength(password);
                updatePasswordStrength(strength, password.length);
            });

            confirmPasswordField.addEventListener('input', function() {
                if (this.value !== passwordField.value && this.value.length > 0) {
                    this.setCustomValidity('Password tidak sama');
                    this.classList.add('border-red-300');
                    this.classList.remove('border-gray-200');
                } else {
                    this.setCustomValidity('');
                    this.classList.remove('border-red-300');
                    this.classList.add('border-gray-200');
                }
            });

            // NIK and No. KK validation (only numbers)
            document.getElementById('nik').addEventListener('input', function() {
                this.value = this.value.replace(/[^0-9]/g, '');
                if (this.value.length > 16) {
                    this.value = this.value.substring(0, 16);
                }
            });

            document.getElementById('no_kk').addEventListener('input', function() {
                this.value = this.value.replace(/[^0-9]/g, '');
                if (this.value.length > 16) {
                    this.value = this.value.substring(0, 16);
                }
            });

            // Form submission validation
            form.addEventListener('submit', function(e) {
                const password = passwordField.value;
                const confirmPassword = confirmPasswordField.value;
                
                if (password !== confirmPassword) {
                    e.preventDefault();
                    alert('Password dan konfirmasi password tidak cocok!');
                    confirmPasswordField.focus();
                    return;
                }
                
                if (password.length < 8) {
                    e.preventDefault();
                    alert('Password minimal 8 karakter!');
                    passwordField.focus();
                    return;
                }

                // Check NIK length
                const nik = document.getElementById('nik').value;
                if (nik.length !== 16) {
                    e.preventDefault();
                    alert('NIK harus 16 digit!');
                    document.getElementById('nik').focus();
                    return;
                }

                // Check No. KK length
                const no_kk = document.getElementById('no_kk').value;
                if (no_kk.length !== 16) {
                    e.preventDefault();
                    alert('No. KK harus 16 digit!');
                    document.getElementById('no_kk').focus();
                    return;
                }
            });
        });

        function getPasswordStrength(password) {
            let strength = 0;
            if (password.length >= 8) strength++;
            if (/[a-z]/.test(password)) strength++;
            if (/[A-Z]/.test(password)) strength++;
            if (/[0-9]/.test(password)) strength++;
            if (/[^A-Za-z0-9]/.test(password)) strength++;
            return strength;
        }

        function updatePasswordStrength(strength, length) {
            const strengthDiv = document.getElementById('password-strength');
            
            if (length === 0) {
                strengthDiv.innerHTML = '';
                return;
            }

            let color, text, width;
            
            switch(strength) {
                case 0:
                case 1:
                    color = 'bg-red-500';
                    text = 'Sangat Lemah';
                    width = '20%';
                    break;
                case 2:
                    color = 'bg-orange-500';
                    text = 'Lemah';
                    width = '40%';
                    break;
                case 3:
                    color = 'bg-yellow-500';
                    text = 'Sedang';
                    width = '60%';
                    break;
                case 4:
                    color = 'bg-green-500';
                    text = 'Kuat';
                    width = '80%';
                    break;
                case 5:
                    color = 'bg-green-600';
                    text = 'Sangat Kuat';
                    width = '100%';
                    break;
            }
            
            strengthDiv.innerHTML = `
                <div class="flex items-center justify-between mb-1">
                    <span class="text-gray-600">Kekuatan Password:</span>
                    <span class="font-medium text-gray-800">${text}</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="${color} h-2 rounded-full transition-all duration-300" style="width: ${width}"></div>
                </div>
            `;
        }

        // Responsive adjustments
        function adjustForMobile() {
            if (window.innerWidth < 1024) {
                document.querySelectorAll('.lg\\:grid-cols-2').forEach(grid => {
                    grid.classList.remove('lg:grid-cols-2');
                    grid.classList.add('grid-cols-1');
                });
            }
        }

        window.addEventListener('resize', adjustForMobile);
        adjustForMobile();
    </script>
</body>
</html>
