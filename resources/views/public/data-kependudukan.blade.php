<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kependudukan - Desa Pakkuwu</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --village-primary: #10b981;
            --village-secondary: #34d399;
            --village-accent: #a7f3d0;
        }
        
        .bg-village-primary { background-color: var(--village-primary); }
        .bg-village-secondary { background-color: var(--village-secondary); }
        .text-village-primary { color: var(--village-primary); }
        .text-village-secondary { color: var(--village-secondary); }
        .border-village-primary { border-color: var(--village-primary); }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }

        /* Progressive bars animation */
        .bg-green-500, .bg-blue-500, .bg-orange-500, .bg-purple-500 {
            animation: expandWidth 1s ease-out;
        }

        @keyframes expandWidth {
            from {
                width: 0%;
            }
        }
    </style>
</head>
<body class="bg-gray-50 dark:bg-gray-900">
    <!-- Navbar -->
    <nav class="bg-white dark:bg-gray-800 shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="{{ route('welcome') }}" class="flex items-center space-x-3">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo Desa" class="h-10 w-10">
                        <div class="flex flex-col">
                            <span class="text-lg font-bold text-gray-900 dark:text-white">SiDesa</span>
                            <span class="text-xs text-gray-600 dark:text-gray-300">Cibeureum</span>
                        </div>
                    </a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('welcome') }}" 
                       class="px-4 py-2 bg-village-primary hover:bg-green-700 text-white rounded-lg transition-colors duration-200">
                        <i class="fas fa-home mr-2"></i>Beranda
                    </a>
                </div>
            </div>
        </div>
    </nav>
<div class="min-h-screen bg-gray-50 dark:bg-gray-900 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">
                Data Kependudukan
            </h1>
            <p class="text-lg text-gray-600 dark:text-gray-300">
                Informasi statistik penduduk Desa Cibeureum
            </p>
            <div class="mt-4 h-1 w-20 bg-green-500 mx-auto rounded"></div>
        </div>

        <!-- Summary Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 text-center">
                <div class="text-3xl font-bold text-green-600 dark:text-green-400 mb-2">
                    {{ number_format($data['total_penduduk']) }}
                </div>
                <div class="text-gray-600 dark:text-gray-300 font-medium">Total Penduduk</div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 text-center">
                <div class="text-3xl font-bold text-blue-600 dark:text-blue-400 mb-2">
                    {{ number_format($data['jenis_kelamin']['laki_laki']) }}
                </div>
                <div class="text-gray-600 dark:text-gray-300 font-medium">Laki-laki</div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 text-center">
                <div class="text-3xl font-bold text-pink-600 dark:text-pink-400 mb-2">
                    {{ number_format($data['jenis_kelamin']['perempuan']) }}
                </div>
                <div class="text-gray-600 dark:text-gray-300 font-medium">Perempuan</div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 text-center">
                <div class="text-3xl font-bold text-purple-600 dark:text-purple-400 mb-2">
                    {{ number_format($data['kepala_keluarga']) }}
                </div>
                <div class="text-gray-600 dark:text-gray-300 font-medium">Kepala Keluarga</div>
            </div>
        </div>

        <!-- Demographics Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
            <!-- Age Groups -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                    <i class="fas fa-users text-green-500 mr-3"></i>
                    Kelompok Usia
                </h2>
                <div class="space-y-4">
                    @foreach($data['kelompok_usia'] as $kelompok => $jumlah)
                        @php
                            $percentage = $data['total_penduduk'] > 0 ? ($jumlah / $data['total_penduduk']) * 100 : 0;
                        @endphp
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <div class="flex justify-between text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    <span>{{ $kelompok }}</span>
                                    <span>{{ number_format($jumlah) }} orang ({{ number_format($percentage, 1) }}%)</span>
                                </div>
                                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                                    <div class="bg-green-500 h-2 rounded-full transition-all duration-300" style="width: {{ $percentage }}%"></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Education Levels -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                    <i class="fas fa-graduation-cap text-blue-500 mr-3"></i>
                    Tingkat Pendidikan
                </h2>
                <div class="space-y-4">
                    @foreach($data['pendidikan'] as $tingkat => $jumlah)
                        @php
                            $percentage = $data['total_penduduk'] > 0 ? ($jumlah / $data['total_penduduk']) * 100 : 0;
                        @endphp
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <div class="flex justify-between text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    <span>{{ $tingkat }}</span>
                                    <span>{{ number_format($jumlah) }} orang ({{ number_format($percentage, 1) }}%)</span>
                                </div>
                                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                                    <div class="bg-blue-500 h-2 rounded-full transition-all duration-300" style="width: {{ $percentage }}%"></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Occupation and Religion Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
            <!-- Occupations -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                    <i class="fas fa-briefcase text-orange-500 mr-3"></i>
                    Mata Pencaharian
                </h2>
                <div class="space-y-4">
                    @foreach($data['pekerjaan'] as $pekerjaan => $jumlah)
                        @php
                            $percentage = $data['total_penduduk'] > 0 ? ($jumlah / $data['total_penduduk']) * 100 : 0;
                        @endphp
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <div class="flex justify-between text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    <span>{{ $pekerjaan }}</span>
                                    <span>{{ number_format($jumlah) }} orang ({{ number_format($percentage, 1) }}%)</span>
                                </div>
                                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                                    <div class="bg-orange-500 h-2 rounded-full transition-all duration-300" style="width: {{ $percentage }}%"></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Religion -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                    <i class="fas fa-praying-hands text-purple-500 mr-3"></i>
                    Agama
                </h2>
                <div class="space-y-4">
                    @foreach($data['agama'] as $agama => $jumlah)
                        @php
                            $percentage = $data['total_penduduk'] > 0 ? ($jumlah / $data['total_penduduk']) * 100 : 0;
                        @endphp
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <div class="flex justify-between text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    <span>{{ $agama }}</span>
                                    <span>{{ number_format($jumlah) }} orang ({{ number_format($percentage, 1) }}%)</span>
                                </div>
                                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                                    <div class="bg-purple-500 h-2 rounded-full transition-all duration-300" style="width: {{ $percentage }}%"></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Additional Info Section -->
        <div class="bg-gradient-to-r from-green-500 to-blue-600 rounded-lg shadow-lg p-8 text-white text-center">
            <h2 class="text-3xl font-bold mb-4">Informasi Tambahan</h2>
            <p class="text-lg opacity-90 mb-6">
                Data kependudukan ini diperbarui secara berkala oleh perangkat desa untuk memastikan keakuratan informasi statistik penduduk Desa Cibeureum.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-center">
                <div class="bg-white bg-opacity-20 rounded-lg p-4">
                    <h3 class="font-bold text-lg mb-2">Data Terkini</h3>
                    <p class="text-sm opacity-90">Pembaruan terakhir: {{ date('d F Y') }}</p>
                </div>
                <div class="bg-white bg-opacity-20 rounded-lg p-4">
                    <h3 class="font-bold text-lg mb-2">Sumber Data</h3>
                    <p class="text-sm opacity-90">Kantor Desa Cibeureum</p>
                </div>
                <div class="bg-white bg-opacity-20 rounded-lg p-4">
                    <h3 class="font-bold text-lg mb-2">Wilayah</h3>
                    <p class="text-sm opacity-90">Kec. Talaga, Kab. Majalengka</p>
                </div>
            </div>
        </div>

        <!-- Back to Home Button -->
        <div class="text-center mt-12">
            <a href="{{ route('welcome') }}" 
               class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg shadow-lg transition-colors duration-200">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali ke Beranda
            </a>
        </div>
    </div>
</div>

<script>
    // Add scroll animations
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.bg-white, .bg-gradient-to-r');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fade-in-up');
                }
            });
        }, {
            threshold: 0.1
        });

        cards.forEach(card => {
            observer.observe(card);
        });
    });
</script>

</body>
</html>
