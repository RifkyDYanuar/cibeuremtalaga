<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Website Sedang Dalam Perbaikan - Desa Cibeureum Talaga</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom Styles -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
        }
        
        .animate-bounce-slow {
            animation: bounce 3s infinite;
        }
        
        .animate-pulse-slow {
            animation: pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
        
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        .gradient-bg {
            background: linear-gradient(-45deg, #667eea, #764ba2, #f093fb, #f5576c);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
        }
        
        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .maintenance-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
    </style>
</head>
<body class="gradient-bg min-h-screen flex items-center justify-center p-4">
    <!-- Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-white/10 rounded-full animate-float"></div>
        <div class="absolute top-3/4 right-1/4 w-48 h-48 bg-white/5 rounded-full animate-float" style="animation-delay: 2s;"></div>
        <div class="absolute top-1/2 left-1/2 w-32 h-32 bg-white/15 rounded-full animate-pulse-slow"></div>
    </div>

    <!-- Main Content -->
    <div class="relative z-10 w-full max-w-4xl mx-auto">
        <div class="maintenance-card rounded-3xl p-8 md:p-12 text-center">
            <!-- Logo/Icon -->
            <div class="mb-8">
                <div class="w-32 h-32 mx-auto bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center animate-bounce-slow">
                    <i class="fas fa-tools text-white text-4xl"></i>
                </div>
            </div>

            <!-- Main Message -->
            <div class="mb-8">
                <h1 class="text-4xl md:text-6xl font-bold text-gray-800 mb-4">
                    Website Sedang
                    <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                        Diperbaiki
                    </span>
                </h1>
                <p class="text-xl md:text-2xl text-gray-600 mb-6">
                    Kami sedang melakukan pemeliharaan untuk memberikan pengalaman yang lebih baik
                </p>
            </div>

            <!-- Features Being Updated -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="glass rounded-2xl p-6">
                    <div class="w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center">
                        <i class="fas fa-database text-white text-xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Optimasi Database</h3>
                    <p class="text-gray-600 text-sm">Meningkatkan kecepatan akses data</p>
                </div>
                
                <div class="glass rounded-2xl p-6">
                    <div class="w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center">
                        <i class="fas fa-shield-alt text-white text-xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Peningkatan Keamanan</h3>
                    <p class="text-gray-600 text-sm">Memperbarui sistem keamanan</p>
                </div>
                
                <div class="glass rounded-2xl p-6">
                    <div class="w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-purple-400 to-purple-600 rounded-full flex items-center justify-center">
                        <i class="fas fa-magic text-white text-xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Fitur Baru</h3>
                    <p class="text-gray-600 text-sm">Menambahkan layanan terbaru</p>
                </div>
            </div>

            <!-- Progress Bar -->
            <div class="mb-8">
                <div class="flex justify-between items-center mb-3">
                    <span class="text-sm font-medium text-gray-700">Progress Perbaikan</span>
                    <span class="text-sm font-medium text-blue-600" id="progress-text">75%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-3">
                    <div class="bg-gradient-to-r from-blue-500 to-purple-600 h-3 rounded-full transition-all duration-1000 ease-out" 
                         style="width: 75%" id="progress-bar"></div>
                </div>
            </div>

            <!-- Estimated Time -->
            <div class="mb-8 p-6 bg-gradient-to-r from-amber-50 to-orange-50 rounded-2xl border border-amber-200">
                <div class="flex items-center justify-center mb-3">
                    <i class="fas fa-clock text-amber-600 text-xl mr-3"></i>
                    <h3 class="text-lg font-semibold text-gray-800">Estimasi Waktu Penyelesaian</h3>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-center" id="countdown">
                    <div class="bg-white rounded-lg p-3 shadow-sm">
                        <div class="text-2xl font-bold text-gray-800" id="days">00</div>
                        <div class="text-sm text-gray-600">Hari</div>
                    </div>
                    <div class="bg-white rounded-lg p-3 shadow-sm">
                        <div class="text-2xl font-bold text-gray-800" id="hours">02</div>
                        <div class="text-sm text-gray-600">Jam</div>
                    </div>
                    <div class="bg-white rounded-lg p-3 shadow-sm">
                        <div class="text-2xl font-bold text-gray-800" id="minutes">30</div>
                        <div class="text-sm text-gray-600">Menit</div>
                    </div>
                    <div class="bg-white rounded-lg p-3 shadow-sm">
                        <div class="text-2xl font-bold text-gray-800" id="seconds">45</div>
                        <div class="text-sm text-gray-600">Detik</div>
                    </div>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Butuh Bantuan Darurat?</h3>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="tel:+62123456789" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-full hover:from-green-600 hover:to-green-700 transition-all duration-300 transform hover:scale-105">
                        <i class="fas fa-phone mr-2"></i>
                        Telepon Desa
                    </a>
                    <a href="mailto:admin@cibeureumtalaga.id" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-full hover:from-blue-600 hover:to-blue-700 transition-all duration-300 transform hover:scale-105">
                        <i class="fas fa-envelope mr-2"></i>
                        Email Admin
                    </a>
                    <a href="https://wa.me/62123456789" target="_blank" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-emerald-500 to-emerald-600 text-white rounded-full hover:from-emerald-600 hover:to-emerald-700 transition-all duration-300 transform hover:scale-105">
                        <i class="fab fa-whatsapp mr-2"></i>
                        WhatsApp
                    </a>
                </div>
            </div>

            <!-- Footer -->
            <div class="pt-6 border-t border-gray-200">
                <p class="text-gray-600 mb-2">
                    <i class="fas fa-map-marker-alt mr-2"></i>
                    Desa Cibeureum Talaga, Kecamatan Talaga, Kabupaten Majalengka
                </p>
                <p class="text-sm text-gray-500">
                    Terima kasih atas kesabaran Anda. Kami akan kembali sesegera mungkin!
                </p>
            </div>
        </div>

        <!-- Social Media -->
        <div class="text-center mt-8">
            <p class="text-white mb-4">Ikuti kami untuk update terbaru:</p>
            <div class="flex justify-center space-x-4">
                <a href="#" class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center text-white hover:bg-white/30 transition-all duration-300">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center text-white hover:bg-white/30 transition-all duration-300">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center text-white hover:bg-white/30 transition-all duration-300">
                    <i class="fab fa-youtube"></i>
                </a>
                <a href="#" class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center text-white hover:bg-white/30 transition-all duration-300">
                    <i class="fab fa-twitter"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- JavaScript for Countdown and Progress -->
    <script>
        // Countdown Timer
        function updateCountdown() {
            // Set target time (current time + 2.5 hours for demo)
            const targetTime = new Date().getTime() + (2.5 * 60 * 60 * 1000);
            
            function update() {
                const now = new Date().getTime();
                const distance = targetTime - now;
                
                if (distance < 0) {
                    // Maintenance finished
                    document.getElementById('countdown').innerHTML = '<div class="col-span-4 text-green-600 font-bold text-xl">Maintenance Selesai!</div>';
                    return;
                }
                
                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);
                
                document.getElementById('days').textContent = days.toString().padStart(2, '0');
                document.getElementById('hours').textContent = hours.toString().padStart(2, '0');
                document.getElementById('minutes').textContent = minutes.toString().padStart(2, '0');
                document.getElementById('seconds').textContent = seconds.toString().padStart(2, '0');
                
                // Update progress bar
                const totalTime = 2.5 * 60 * 60 * 1000; // 2.5 hours in milliseconds
                const elapsed = totalTime - distance;
                const progress = (elapsed / totalTime) * 100;
                
                document.getElementById('progress-bar').style.width = Math.min(95, Math.max(75, progress)) + '%';
                document.getElementById('progress-text').textContent = Math.round(Math.min(95, Math.max(75, progress))) + '%';
            }
            
            update();
            setInterval(update, 1000);
        }
        
        // Auto refresh page when maintenance is done
        function checkMaintenanceStatus() {
            fetch('/maintenance-status')
                .then(response => response.json())
                .then(data => {
                    if (!data.maintenance) {
                        window.location.href = '/';
                    }
                })
                .catch(() => {
                    // If endpoint doesn't exist, check every 5 minutes
                    setTimeout(checkMaintenanceStatus, 5 * 60 * 1000);
                });
        }
        
        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            updateCountdown();
            
            // Check maintenance status every 2 minutes
            setInterval(checkMaintenanceStatus, 2 * 60 * 1000);
        });
    </script>
</body>
</html>
