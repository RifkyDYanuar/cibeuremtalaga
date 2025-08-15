@extends('layouts.public')

@section('title', 'IDM DESA - Indeks Desa Membangun')

@section('content')
<!-- Hero Section -->
<div class="relative bg-gradient-to-r from-village-primary via-primary to-secondary min-h-[60vh] flex items-center overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-10 left-10 w-32 h-32 bg-white rounded-full"></div>
        <div class="absolute bottom-20 right-20 w-24 h-24 bg-white rounded-full"></div>
        <div class="absolute top-1/2 left-1/4 w-16 h-16 bg-white rounded-full"></div>
    </div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="flex flex-col lg:flex-row items-center gap-8">
            <div class="flex-1 text-white">
                <h1 class="text-4xl lg:text-6xl font-bold mb-6 animate-fade-in flex items-center mt-6 pt-16">
                    <i class="fas fa-chart-line mr-4"></i>
                    IDM DESA
                    @if(isset($selectedYear))
                        <span class="text-village-accent text-3xl lg:text-4xl block mt-2">Tahun {{ $selectedYear }}</span>
                    @endif
                </h1>
                <p class="text-xl lg:text-2xl mb-8 text-village-accent animate-slide-up">
                    Indeks Desa Membangun - Mengukur Kemajuan Pembangunan Desa
                    @if(isset($selectedYear))
                        <br><span class="text-lg">Data khusus tahun {{ $selectedYear }}</span>
                    @endif
                </p>
                
                @if($latestIdm)
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Current Score -->
                        <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 border border-white/20">
                            <div class="text-center">
                                <div class="mb-4">
                                    <i class="fas fa-calendar-alt text-village-accent text-3xl"></i>
                                </div>
                                <h3 class="text-village-accent text-lg font-semibold mb-2">Tahun {{ $latestIdm->tahun }}</h3>
                                <div class="text-3xl font-bold mb-3">{{ number_format($latestIdm->skor_idm, 3) }}</div>
                                <span class="inline-block px-4 py-2 rounded-full text-sm font-medium
                                    @if($latestIdm->status_idm == 'Mandiri') bg-green-500 text-white
                                    @elseif($latestIdm->status_idm == 'Maju') bg-blue-500 text-white
                                    @elseif($latestIdm->status_idm == 'Berkembang') bg-indigo-500 text-white
                                    @elseif($latestIdm->status_idm == 'Tertinggal') bg-yellow-500 text-gray-900
                                    @else bg-red-500 text-white
                                    @endif">
                                    {{ $latestIdm->status_idm }}
                                </span>
                            </div>
                        </div>
                        
                        <!-- Progress -->
                        <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 border border-white/20">
                            <div class="text-center">
                                <div class="mb-4">
                                    <i class="fas fa-chart-bar text-village-accent text-3xl"></i>
                                </div>
                                <h3 class="text-village-accent text-lg font-semibold mb-4">Progress Menuju Mandiri</h3>
                                <div class="w-full bg-white/20 rounded-full h-4 mb-3">
                                    <div class="bg-gradient-to-r from-village-accent to-white h-4 rounded-full transition-all duration-1000 ease-out"
                                    style="width: {{ $latestIdm->progress_percentage }}%"></div>
                                </div>
                                <div class="text-2xl font-bold">{{ number_format($latestIdm->progress_percentage, 1) }}%</div>
                                <small class="text-village-accent/80">dari target maksimal</small>
                            </div>
                        </div>
                        
                        <!-- Change -->
                        @if($progress !== null)
                            <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 border border-white/20">
                                <div class="text-center">
                                    <div class="mb-4">
                                        <i class="fas fa-arrow-{{ $progress >= 0 ? 'up' : 'down' }} 
                                        text-{{ $progress >= 0 ? 'green' : 'red' }}-400 text-3xl"></i>
                                    </div>
                                    <h3 class="text-village-accent text-lg font-semibold mb-4">Perubahan</h3>
                                    <div class="text-2xl font-bold text-{{ $progress >= 0 ? 'green' : 'red' }}-400">
                                        {{ $progress >= 0 ? '+' : '' }}{{ number_format($progress, 3) }}
                                    </div>
                                    <small class="text-village-accent/80">dari tahun sebelumnya</small>
                                </div>
                            </div>
                        @endif
                    </div>
                @endif
            </div>
            
            <!-- Hero Image -->
            <div class="flex-1 flex justify-center">
                <div class="relative">
                    <div class="w-64 h-64 rounded-full bg-white/10 backdrop-blur-md flex items-center justify-center">
                        <i class="fas fa-village text-8xl text-white/80"></i>
                    </div>
                    <div class="absolute -top-4 -right-4 w-16 h-16 bg-yellow-400 rounded-full flex items-center justify-center animate-bounce-slow">
                        <i class="fas fa-star text-white text-xl"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Year Navigation -->
@if($allIdmData->count() > 1)
<div class="bg-white/50 backdrop-blur-sm py-6">
    <div class="container mx-auto px-4">
        <div class="text-center mb-6">
            <h3 class="text-xl font-semibold text-gray-800 mb-2">Pilih Tahun IDM</h3>
            <p class="text-gray-600">Lihat data IDM untuk tahun tertentu</p>
        </div>
        
        <div class="flex flex-wrap justify-center gap-3">
            <a href="{{ route('public.idm.index') }}" 
               class="px-6 py-3 rounded-full transition-all duration-300 font-medium
                      {{ !isset($selectedYear) ? 'bg-village-primary text-white shadow-lg' : 'bg-white text-gray-700 hover:bg-village-primary hover:text-white border border-gray-300' }}">
                <i class="fas fa-chart-line mr-2"></i>Terkini
            </a>
            
            @foreach($allIdmData as $idm)
                <a href="{{ route('public.idm.year', $idm->tahun) }}" 
                   class="px-6 py-3 rounded-full transition-all duration-300 font-medium
                          {{ isset($selectedYear) && $selectedYear == $idm->tahun ? 'bg-village-primary text-white shadow-lg' : 'bg-white text-gray-700 hover:bg-village-primary hover:text-white border border-gray-300' }}">
                    <i class="fas fa-calendar mr-2"></i>{{ $idm->tahun }}
                </a>
            @endforeach
        </div>
    </div>
</div>
@endif

<div class="container mx-auto px-4 py-12">
    @if($latestIdm)
        <!-- Current IDM Detail -->
        <div class="mb-12">
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
                <div class="bg-gradient-to-r from-village-primary to-primary text-white p-8">
                    <h2 class="text-3xl font-bold flex items-center">
                        <i class="fas fa-trophy mr-4"></i>
                        Status IDM Terkini - {{ $latestIdm->tahun }}
                    </h2>
                </div>
                <div class="p-8">
                    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                        <!-- Main Score -->
                        <div class="lg:col-span-1 text-center">
                            <div class="bg-gradient-to-br from-village-light to-village-accent/20 rounded-2xl p-8">
                                <div class="text-6xl font-bold text-village-primary mb-4">{{ number_format($latestIdm->skor_idm, 3) }}</div>
                                <h3 class="text-xl font-semibold text-gray-700 mb-4">Skor IDM</h3>
                                <span class="inline-block px-6 py-3 rounded-full text-lg font-medium
                                    @if($latestIdm->status_idm == 'Mandiri') bg-green-500 text-white
                                    @elseif($latestIdm->status_idm == 'Maju') bg-blue-500 text-white
                                    @elseif($latestIdm->status_idm == 'Berkembang') bg-indigo-500 text-white
                                    @elseif($latestIdm->status_idm == 'Tertinggal') bg-yellow-500 text-gray-900
                                    @else bg-red-500 text-white
                                    @endif">
                                    {{ $latestIdm->status_idm }}
                                </span>
                            </div>
                        </div>

                        <!-- Component Scores -->
                        <div class="lg:col-span-3">
                            <h3 class="text-2xl font-bold text-gray-800 mb-6">Komponen Indeks</h3>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <!-- IKS -->
                                <div class="bg-gradient-to-br from-red-50 to-red-100 rounded-2xl p-6 border-l-4 border-red-500">
                                    <div class="text-center">
                                        <div class="mb-4">
                                            <i class="fas fa-home text-red-500 text-4xl"></i>
                                        </div>
                                        <h4 class="text-red-600 text-lg font-bold mb-2">IKS</h4>
                                        <div class="text-3xl font-bold text-red-700 mb-2">{{ number_format($latestIdm->skor_iks, 3) }}</div>
                                        <p class="text-sm text-gray-600">Indeks Ketahanan Sosial</p>
                                    </div>
                                </div>
                                
                                <!-- IKE -->
                                <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-6 border-l-4 border-green-500">
                                    <div class="text-center">
                                        <div class="mb-4">
                                            <i class="fas fa-coins text-green-500 text-4xl"></i>
                                        </div>
                                        <h4 class="text-green-600 text-lg font-bold mb-2">IKE</h4>
                                        <div class="text-3xl font-bold text-green-700 mb-2">{{ number_format($latestIdm->skor_ike, 3) }}</div>
                                        <p class="text-sm text-gray-600">Indeks Ketahanan Ekonomi</p>
                                    </div>
                                </div>
                                
                                <!-- IKL -->
                                <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-6 border-l-4 border-blue-500">
                                    <div class="text-center">
                                        <div class="mb-4">
                                            <i class="fas fa-leaf text-blue-500 text-4xl"></i>
                                        </div>
                                        <h4 class="text-blue-600 text-lg font-bold mb-2">IKL</h4>
                                        <div class="text-3xl font-bold text-blue-700 mb-2">{{ number_format($latestIdm->skor_ikl, 3) }}</div>
                                        <p class="text-sm text-gray-600">Indeks Ketahanan Lingkungan</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($latestIdm->target_tahun_depan)
                        <div class="mt-8 p-6 bg-village-light rounded-2xl">
                            <h4 class="text-lg font-semibold text-village-dark mb-2">Target Tahun Depan</h4>
                            <p class="text-village-dark">{{ $latestIdm->target_tahun_depan }}</p>
                        </div>
                    @endif

                    @if($latestIdm->deskripsi)
                        <div class="mt-8">
                            <h4 class="text-lg font-semibold text-gray-800 mb-4">Deskripsi</h4>
                            <p class="text-gray-600 leading-relaxed">{{ $latestIdm->deskripsi }}</p>
                        </div>
                    @endif

                    <div class="mt-8 text-center">
                        <a href="{{ route('public.idm.detail', $latestIdm->tahun) }}" 
                    class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-village-primary to-primary text-white font-semibold rounded-2xl hover:shadow-lg transform hover:-translate-y-1 transition-all duration-300">
                            <i class="fas fa-chart-bar mr-3"></i>
                            Lihat Detail Lengkap
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Historical Chart -->
        @if($allIdmData->count() > 0)
            <div class="mb-12">
                <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
                    <div class="bg-gradient-to-r from-purple-600 to-blue-600 text-white p-8">
                        <h2 class="text-3xl font-bold flex items-center">
                            <i class="fas fa-chart-line mr-4"></i>
                            Perkembangan IDM Desa
                        </h2>
                    </div>
                    <div class="p-8 bg-gray-50">
                        <canvas id="idmChart" class="w-full h-96"></canvas>
                    </div>
                </div>
            </div>
        @endif

        <!-- Historical Data Table -->
        @if($allIdmData->count() > 0)
            <div class="mb-12">
                <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
                    <div class="bg-gradient-to-r from-village-primary to-secondary text-white p-8">
                        <h2 class="text-3xl font-bold flex items-center">
                            <i class="fas fa-history mr-4"></i>
                            Riwayat IDM Desa
                        </h2>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="px-6 py-4 text-left"><i class="fas fa-calendar mr-2"></i>Tahun</th>
                                    <th class="px-6 py-4 text-center"><i class="fas fa-star mr-2"></i>Skor IDM</th>
                                    <th class="px-6 py-4 text-center"><i class="fas fa-home mr-2"></i>IKS</th>
                                    <th class="px-6 py-4 text-center"><i class="fas fa-coins mr-2"></i>IKE</th>
                                    <th class="px-6 py-4 text-center"><i class="fas fa-leaf mr-2"></i>IKL</th>
                                    <th class="px-6 py-4 text-center"><i class="fas fa-award mr-2"></i>Status</th>
                                    <th class="px-6 py-4 text-center"><i class="fas fa-cog mr-2"></i>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach($allIdmData as $idm)
                                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                                        <td class="px-6 py-4 font-bold text-gray-900">{{ $idm->tahun }}</td>
                                        <td class="px-6 py-4 text-center">
                                            <span class="inline-block px-4 py-2 bg-blue-100 text-blue-800 rounded-full font-semibold">
                                                {{ number_format($idm->skor_idm, 3) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-center text-gray-700">{{ number_format($idm->skor_iks, 3) }}</td>
                                        <td class="px-6 py-4 text-center text-gray-700">{{ number_format($idm->skor_ike, 3) }}</td>
                                        <td class="px-6 py-4 text-center text-gray-700">{{ number_format($idm->skor_ikl, 3) }}</td>
                                        <td class="px-6 py-4 text-center">
                                            <span class="inline-block px-3 py-1 rounded-full text-sm font-medium
                                                @if($idm->status_idm == 'Mandiri') bg-green-100 text-green-800
                                                @elseif($idm->status_idm == 'Maju') bg-blue-100 text-blue-800
                                                @elseif($idm->status_idm == 'Berkembang') bg-indigo-100 text-indigo-800
                                                @elseif($idm->status_idm == 'Tertinggal') bg-yellow-100 text-yellow-800
                                                @else bg-red-100 text-red-800
                                                @endif">
                                                {{ $idm->status_idm }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <a href="{{ route('public.idm.detail', $idm->tahun) }}" 
                                               class="inline-flex items-center px-4 py-2 bg-village-primary text-white rounded-lg hover:bg-village-secondary transition-colors duration-200">
                                                <i class="fas fa-eye mr-2"></i>Detail
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif

        <!-- IDM Categories -->
        <div class="mb-12">
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
                <div class="bg-gradient-to-r from-orange-500 to-red-500 text-white p-8">
                    <h2 class="text-3xl font-bold flex items-center">
                        <i class="fas fa-layer-group mr-4"></i>
                        Kategori Status IDM Desa
                    </h2>
                </div>
                <div class="p-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
                        <div class="text-center p-6 rounded-2xl border-4 border-green-200 bg-green-50">
                            <div class="mb-4">
                                <span class="inline-block px-4 py-2 bg-green-500 text-white rounded-full font-bold">Mandiri</span>
                            </div>
                            <h4 class="text-green-700 font-bold text-lg mb-2">≥ 0.815</h4>
                            <p class="text-sm text-gray-600">Desa mandiri dengan infrastruktur lengkap</p>
                        </div>
                        <div class="text-center p-6 rounded-2xl border-4 border-blue-200 bg-blue-50">
                            <div class="mb-4">
                                <span class="inline-block px-4 py-2 bg-blue-500 text-white rounded-full font-bold">Maju</span>
                            </div>
                            <h4 class="text-blue-700 font-bold text-lg mb-2">0.707 - 0.814</h4>
                            <p class="text-sm text-gray-600">Desa dengan potensi berkembang baik</p>
                        </div>
                        <div class="text-center p-6 rounded-2xl border-4 border-indigo-200 bg-indigo-50">
                            <div class="mb-4">
                                <span class="inline-block px-4 py-2 bg-indigo-500 text-white rounded-full font-bold">Berkembang</span>
                            </div>
                            <h4 class="text-indigo-700 font-bold text-lg mb-2">0.599 - 0.706</h4>
                            <p class="text-sm text-gray-600">Desa dalam tahap perkembangan</p>
                        </div>
                        <div class="text-center p-6 rounded-2xl border-4 border-yellow-200 bg-yellow-50">
                            <div class="mb-4">
                                <span class="inline-block px-4 py-2 bg-yellow-500 text-gray-900 rounded-full font-bold">Tertinggal</span>
                            </div>
                            <h4 class="text-yellow-700 font-bold text-lg mb-2">0.491 - 0.598</h4>
                            <p class="text-sm text-gray-600">Desa memerlukan perhatian khusus</p>
                        </div>
                        <div class="text-center p-6 rounded-2xl border-4 border-red-200 bg-red-50">
                            <div class="mb-4">
                                <span class="inline-block px-4 py-2 bg-red-500 text-white rounded-full font-bold">Sangat Tertinggal</span>
                            </div>
                            <h4 class="text-red-700 font-bold text-lg mb-2">< 0.491</h4>
                            <p class="text-sm text-gray-600">Desa prioritas pembangunan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @else
        <!-- No Data Section -->
        <div class="text-center py-16">
            <div class="bg-white rounded-3xl shadow-2xl p-12">
                <i class="fas fa-exclamation-triangle text-yellow-500 text-6xl mb-6"></i>
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Data IDM Belum Tersedia</h3>
                <p class="text-gray-600 mb-8">Silakan hubungi administrator untuk informasi lebih lanjut tentang data IDM desa.</p>
                <a href="{{ route('welcome') }}" 
                   class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-village-primary to-primary text-white font-semibold rounded-2xl hover:shadow-lg transform hover:-translate-y-1 transition-all duration-300">
                    <i class="fas fa-home mr-3"></i>
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    @endif
</div>

<!-- Info Section -->
<div class="bg-gradient-to-br from-village-light via-village-accent/30 to-village-light py-16">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-4xl font-bold text-village-dark mb-6">
                    <i class="fas fa-info-circle mr-4"></i>
                    Tentang IDM
                </h2>
                <p class="text-xl text-gray-700 mb-8 leading-relaxed">
                    Indeks Desa Membangun (IDM) adalah indikator untuk mengukur tingkat kemajuan desa berdasarkan tiga dimensi utama: 
                    ketahanan sosial, ekonomi, dan lingkungan.
                </p>
                <div class="grid grid-cols-2 gap-6">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-village-primary rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-chart-bar text-white"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-village-dark">Akurat</h4>
                            <p class="text-sm text-gray-600">Data tervalidasi</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-secondary rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-sync-alt text-white"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-village-dark">Terkini</h4>
                            <p class="text-sm text-gray-600">Update berkala</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <div class="relative inline-block">
                    <div class="w-64 h-64 bg-white rounded-full shadow-2xl flex items-center justify-center">
                        <i class="fas fa-village text-village-primary text-8xl"></i>
                    </div>
                    <div class="absolute -top-4 -right-4 w-16 h-16 bg-yellow-400 rounded-full flex items-center justify-center animate-bounce-slow">
                        <i class="fas fa-star text-white text-xl"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@if($allIdmData->count() > 0)
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('idmChart');
    if (ctx) {
        const chartCtx = ctx.getContext('2d');
        
        const years = @json($years);
        const scores = @json($scores);
        
        console.log('Years:', years);
        console.log('Scores:', scores);
        
        new Chart(chartCtx, {
            type: 'line',
            data: {
                labels: years,
                datasets: [{
                    label: 'Skor IDM',
                    data: scores,
                    borderColor: '#6366f1',
                    backgroundColor: 'rgba(99, 102, 241, 0.1)',
                    borderWidth: 4,
                    tension: 0.4,
                    fill: true,
                    pointBackgroundColor: '#6366f1',
                    pointBorderColor: '#ffffff',
                    pointBorderWidth: 3,
                    pointRadius: 8,
                    pointHoverRadius: 12
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        labels: {
                            font: {
                                size: 14,
                                weight: 'bold'
                            },
                            color: '#374151'
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 1.0,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.1)'
                        },
                        ticks: {
                            font: {
                                size: 12
                            },
                            color: '#6b7280'
                        }
                    },
                    x: {
                        grid: {
                            color: 'rgba(0, 0, 0, 0.1)'
                        },
                        ticks: {
                            font: {
                                size: 12
                            },
                            color: '#6b7280'
                        }
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index'
                }
            }
        });
    } else {
        console.error('Canvas element not found');
    }
});
</script>
@endpush
@endif
