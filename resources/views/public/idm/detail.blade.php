@extends('layouts.public')

@section('title', 'Detail IDM Desa ' . $idm->tahun . ' - Indeks Desa Membangun')

@section('content')
<!-- Hero Section -->
<div class="relative bg-gradient-to-r from-village-primary via-primary to-secondary min-h-[50vh] flex items-center overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-10 left-10 w-32 h-32 bg-white rounded-full"></div>
        <div class="absolute bottom-20 right-20 w-24 h-24 bg-white rounded-full"></div>
        <div class="absolute top-1/2 left-1/4 w-16 h-16 bg-white rounded-full"></div>
    </div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center text-white">
            <h1 class="text-4xl lg:text-6xl font-bold mb-6 animate-fade-in">
                <i class="fas fa-chart-line mr-4"></i>
                Detail IDM Desa
            </h1>
            <p class="text-xl lg:text-2xl mb-8 text-village-accent">
                Analisis Mendalam Indeks Desa Membangun Tahun {{ $idm->tahun }}
            </p>
            
            <!-- Quick Stats -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-8">
                <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 border border-white/20">
                    <div class="text-3xl font-bold mb-2">{{ number_format($idm->skor_idm, 3) }}</div>
                    <div class="text-village-accent">Skor IDM {{ $idm->tahun }}</div>
                </div>
                <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 border border-white/20">
                    <div class="text-2xl font-bold mb-2 {{ $idm->status_idm == 'Mandiri' ? 'text-green-300' : ($idm->status_idm == 'Maju' ? 'text-blue-300' : ($idm->status_idm == 'Berkembang' ? 'text-indigo-300' : 'text-yellow-300')) }}">
                        {{ $idm->status_idm }}
                    </div>
                    <div class="text-village-accent">Status IDM</div>
                </div>
                <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 border border-white/20">
                    <div class="text-3xl font-bold mb-2">{{ number_format($idm->progress_percentage, 1) }}%</div>
                    <div class="text-village-accent">Progress</div>
                </div>
                <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 border border-white/20">
                    @if($previousYear)
                        @php
                            $change = $idm->skor_idm - $previousYear->skor_idm;
                        @endphp
                        <div class="text-2xl font-bold mb-2 {{ $change >= 0 ? 'text-green-300' : 'text-red-300' }}">
                            {{ $change >= 0 ? '+' : '' }}{{ number_format($change, 3) }}
                        </div>
                        <div class="text-village-accent">Perubahan</div>
                    @else
                        <div class="text-2xl font-bold mb-2 text-gray-300">-</div>
                        <div class="text-village-accent">Perubahan</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Breadcrumb -->
<div class="bg-white/80 backdrop-blur-sm py-4 border-b">
    <div class="container mx-auto px-4">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('welcome') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-village-primary">
                        <i class="fas fa-home mr-2"></i>Beranda
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                        <a href="{{ route('public.idm.index') }}" class="text-sm font-medium text-gray-700 hover:text-village-primary">IDM Desa</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                        <span class="text-sm font-medium text-gray-500">Detail {{ $idm->tahun }}</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
</div>

<div class="container mx-auto px-4 py-12">
    <!-- Main Score Card -->
    <div class="mb-12">
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
            <div class="bg-gradient-to-r from-village-primary to-primary text-white p-8">
                <h2 class="text-3xl font-bold flex items-center">
                    <i class="fas fa-trophy mr-4"></i>
                    Skor IDM Tahun {{ $idm->tahun }}
                </h2>
                <p class="mt-2 text-village-accent">Analisis komprehensif indeks desa membangun</p>
            </div>
            <div class="p-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Skor Utama -->
                    <div class="text-center">
                        <div class="relative inline-block">
                            <div class="w-64 h-64 mx-auto">
                                <canvas id="scoreChart" class="w-full h-full"></canvas>
                            </div>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="text-center">
                                    <div class="text-5xl font-bold text-village-primary">{{ number_format($idm->skor_idm, 3) }}</div>
                                    <div class="text-lg text-gray-600 mt-2">Skor IDM</div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6">
                            <span class="inline-block px-8 py-4 rounded-full text-xl font-bold
                                @if($idm->status_idm == 'Mandiri') bg-green-500 text-white
                                @elseif($idm->status_idm == 'Maju') bg-blue-500 text-white
                                @elseif($idm->status_idm == 'Berkembang') bg-indigo-500 text-white
                                @elseif($idm->status_idm == 'Tertinggal') bg-yellow-500 text-gray-900
                                @else bg-red-500 text-white
                                @endif">
                                {{ $idm->status_idm }}
                            </span>
                        </div>
                    </div>

                    <!-- Detail Komponen -->
                    <div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-6">Komponen Penyusun IDM</h3>
                        
                        <!-- IKS -->
                        <div class="mb-6 p-6 bg-gradient-to-r from-red-50 to-red-100 rounded-2xl border-l-4 border-red-500">
                            <div class="flex justify-between items-center mb-3">
                                <div class="flex items-center">
                                    <i class="fas fa-users text-red-500 text-2xl mr-3"></i>
                                    <h4 class="text-red-600 text-lg font-bold">Indeks Ketahanan Sosial (IKS)</h4>
                                </div>
                                <span class="text-2xl font-bold text-red-700">{{ number_format($idm->skor_iks, 3) }}</span>
                            </div>
                            <div class="w-full bg-red-200 rounded-full h-3 mb-2">
                                <div class="bg-red-500 h-3 rounded-full transition-all duration-1000 ease-out" 
                                     style="width: {{ ($idm->skor_iks / 1.0) * 100 }}%"></div>
                            </div>
                            <p class="text-sm text-gray-600">Mengukur ketahanan sosial masyarakat desa melalui indikator kesehatan, pendidikan, dan modal sosial.</p>
                        </div>

                        <!-- IKE -->
                        <div class="mb-6 p-6 bg-gradient-to-r from-green-50 to-green-100 rounded-2xl border-l-4 border-green-500">
                            <div class="flex justify-between items-center mb-3">
                                <div class="flex items-center">
                                    <i class="fas fa-coins text-green-500 text-2xl mr-3"></i>
                                    <h4 class="text-green-600 text-lg font-bold">Indeks Ketahanan Ekonomi (IKE)</h4>
                                </div>
                                <span class="text-2xl font-bold text-green-700">{{ number_format($idm->skor_ike, 3) }}</span>
                            </div>
                            <div class="w-full bg-green-200 rounded-full h-3 mb-2">
                                <div class="bg-green-500 h-3 rounded-full transition-all duration-1000 ease-out" 
                                     style="width: {{ ($idm->skor_ike / 1.0) * 100 }}%"></div>
                            </div>
                            <p class="text-sm text-gray-600">Mengukur ketahanan ekonomi desa melalui keragaman produksi, tersedianya pusat perdagangan, dan akses ekonomi.</p>
                        </div>

                        <!-- IKL -->
                        <div class="mb-6 p-6 bg-gradient-to-r from-blue-50 to-blue-100 rounded-2xl border-l-4 border-blue-500">
                            <div class="flex justify-between items-center mb-3">
                                <div class="flex items-center">
                                    <i class="fas fa-leaf text-blue-500 text-2xl mr-3"></i>
                                    <h4 class="text-blue-600 text-lg font-bold">Indeks Ketahanan Lingkungan (IKL)</h4>
                                </div>
                                <span class="text-2xl font-bold text-blue-700">{{ number_format($idm->skor_ikl, 3) }}</span>
                            </div>
                            <div class="w-full bg-blue-200 rounded-full h-3 mb-2">
                                <div class="bg-blue-500 h-3 rounded-full transition-all duration-1000 ease-out" 
                                     style="width: {{ ($idm->skor_ikl / 1.0) * 100 }}%"></div>
                            </div>
                            <p class="text-sm text-gray-600">Mengukur ketahanan lingkungan desa melalui kualitas lingkungan, mitigasi bencana, dan adaptasi perubahan iklim.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Dimensi Detail -->
    <div class="mb-12">
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
            <div class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white p-8">
                <h2 class="text-3xl font-bold flex items-center">
                    <i class="fas fa-layer-group mr-4"></i>
                    Analisis Dimensi
                </h2>
                <p class="mt-2 text-purple-200">Breakdown detail per dimensi pembangunan</p>
            </div>
            <div class="p-8">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Dimensi Sosial -->
                    <div class="text-center p-6 bg-gradient-to-br from-orange-50 to-orange-100 rounded-2xl border border-orange-200">
                        <div class="w-24 h-24 mx-auto mb-4 bg-orange-500 rounded-full flex items-center justify-center">
                            <i class="fas fa-users text-white text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-orange-700 mb-3">Dimensi Sosial</h3>
                        <div class="text-4xl font-bold text-orange-600 mb-4">{{ number_format($idm->dimensi_sosial, 3) }}</div>
                        <div class="w-full bg-orange-200 rounded-full h-4 mb-4">
                            <div class="bg-orange-500 h-4 rounded-full transition-all duration-1000 ease-out" 
                                 style="width: {{ ($idm->dimensi_sosial / 1.0) * 100 }}%"></div>
                        </div>
                        <p class="text-sm text-gray-600">Mencakup aspek pendidikan, kesehatan, dan kesejahteraan sosial masyarakat desa.</p>
                    </div>

                    <!-- Dimensi Ekonomi -->
                    <div class="text-center p-6 bg-gradient-to-br from-emerald-50 to-emerald-100 rounded-2xl border border-emerald-200">
                        <div class="w-24 h-24 mx-auto mb-4 bg-emerald-500 rounded-full flex items-center justify-center">
                            <i class="fas fa-chart-line text-white text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-emerald-700 mb-3">Dimensi Ekonomi</h3>
                        <div class="text-4xl font-bold text-emerald-600 mb-4">{{ number_format($idm->dimensi_ekonomi, 3) }}</div>
                        <div class="w-full bg-emerald-200 rounded-full h-4 mb-4">
                            <div class="bg-emerald-500 h-4 rounded-full transition-all duration-1000 ease-out" 
                                 style="width: {{ ($idm->dimensi_ekonomi / 1.0) * 100 }}%"></div>
                        </div>
                        <p class="text-sm text-gray-600">Meliputi kegiatan ekonomi, keuangan, dan akses terhadap sumber daya ekonomi.</p>
                    </div>

                    <!-- Dimensi Lingkungan -->
                    <div class="text-center p-6 bg-gradient-to-br from-cyan-50 to-cyan-100 rounded-2xl border border-cyan-200">
                        <div class="w-24 h-24 mx-auto mb-4 bg-cyan-500 rounded-full flex items-center justify-center">
                            <i class="fas fa-globe text-white text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-cyan-700 mb-3">Dimensi Lingkungan</h3>
                        <div class="text-4xl font-bold text-cyan-600 mb-4">{{ number_format($idm->dimensi_lingkungan, 3) }}</div>
                        <div class="w-full bg-cyan-200 rounded-full h-4 mb-4">
                            <div class="bg-cyan-500 h-4 rounded-full transition-all duration-1000 ease-out" 
                                 style="width: {{ ($idm->dimensi_lingkungan / 1.0) * 100 }}%"></div>
                        </div>
                        <p class="text-sm text-gray-600">Mencakup kualitas lingkungan, pengelolaan sumber daya alam, dan mitigasi bencana.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Perbandingan Chart -->
    @if($comparisionData->count() > 1)
    <div class="mb-12">
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
            <div class="bg-gradient-to-r from-teal-600 to-cyan-600 text-white p-8">
                <h2 class="text-3xl font-bold flex items-center">
                    <i class="fas fa-chart-bar mr-4"></i>
                    Perbandingan dengan Tahun Lain
                </h2>
                <p class="mt-2 text-teal-200">Tren perkembangan IDM desa dari waktu ke waktu</p>
            </div>
            <div class="p-8">
                <div class="h-96">
                    <canvas id="comparisonChart" class="w-full h-full"></canvas>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Tabel Detail Lengkap -->
    <div class="mb-12">
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
            <div class="bg-gradient-to-r from-slate-700 to-slate-900 text-white p-8">
                <h2 class="text-3xl font-bold flex items-center">
                    <i class="fas fa-table mr-4"></i>
                    Data Detail IDM {{ $idm->tahun }}
                </h2>
                <p class="mt-2 text-slate-300">Breakdown lengkap semua komponen dan dimensi</p>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-slate-100">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-bold text-slate-700 uppercase tracking-wider border-b">
                                <i class="fas fa-info-circle mr-2"></i>Komponen
                            </th>
                            <th class="px-6 py-4 text-center text-sm font-bold text-slate-700 uppercase tracking-wider border-b">
                                <i class="fas fa-star mr-2"></i>Skor
                            </th>
                            <th class="px-6 py-4 text-center text-sm font-bold text-slate-700 uppercase tracking-wider border-b">
                                <i class="fas fa-percentage mr-2"></i>Persentase
                            </th>
                            <th class="px-6 py-4 text-center text-sm font-bold text-slate-700 uppercase tracking-wider border-b">
                                <i class="fas fa-chart-bar mr-2"></i>Visualisasi
                            </th>
                            <th class="px-6 py-4 text-center text-sm font-bold text-slate-700 uppercase tracking-wider border-b">
                                <i class="fas fa-award mr-2"></i>Kategori
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <!-- IDM Utama -->
                        <tr class="bg-gradient-to-r from-blue-50 to-indigo-50 hover:from-blue-100 hover:to-indigo-100 transition-all duration-200">
                            <td class="px-6 py-6">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-full flex items-center justify-center mr-4">
                                        <i class="fas fa-trophy text-white text-xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-bold text-gray-900">Indeks Desa Membangun (IDM)</h3>
                                        <p class="text-sm text-gray-600">Indeks utama pembangunan desa</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-6 text-center">
                                <span class="inline-block px-4 py-2 bg-blue-500 text-white rounded-full font-bold text-lg">
                                    {{ number_format($idm->skor_idm, 3) }}
                                </span>
                            </td>
                            <td class="px-6 py-6 text-center">
                                <span class="text-2xl font-bold text-blue-600">{{ number_format($idm->progress_percentage, 1) }}%</span>
                            </td>
                            <td class="px-6 py-6">
                                <div class="w-full bg-gray-200 rounded-full h-4">
                                    <div class="bg-gradient-to-r from-blue-500 to-indigo-500 h-4 rounded-full transition-all duration-1000 ease-out" 
                                         style="width: {{ $idm->progress_percentage }}%"></div>
                                </div>
                            </td>
                            <td class="px-6 py-6 text-center">
                                <span class="inline-block px-4 py-2 rounded-full text-sm font-bold
                                    @if($idm->status_idm == 'Mandiri') bg-green-500 text-white
                                    @elseif($idm->status_idm == 'Maju') bg-blue-500 text-white
                                    @elseif($idm->status_idm == 'Berkembang') bg-indigo-500 text-white
                                    @elseif($idm->status_idm == 'Tertinggal') bg-yellow-500 text-gray-900
                                    @else bg-red-500 text-white
                                    @endif">
                                    {{ $idm->status_idm }}
                                </span>
                            </td>
                        </tr>

                        <!-- IKS -->
                        <tr class="bg-gradient-to-r from-red-50 to-pink-50 hover:from-red-100 hover:to-pink-100 transition-all duration-200">
                            <td class="px-6 py-6">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-gradient-to-r from-red-500 to-pink-500 rounded-full flex items-center justify-center mr-4">
                                        <i class="fas fa-users text-white text-xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-bold text-gray-900">Indeks Ketahanan Sosial (IKS)</h3>
                                        <p class="text-sm text-gray-600">Ketahanan sosial masyarakat desa</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-6 text-center">
                                <span class="inline-block px-4 py-2 bg-red-500 text-white rounded-full font-bold text-lg">
                                    {{ number_format($idm->skor_iks, 3) }}
                                </span>
                            </td>
                            <td class="px-6 py-6 text-center">
                                <span class="text-2xl font-bold text-red-600">{{ number_format($idm->iks_percentage, 1) }}%</span>
                            </td>
                            <td class="px-6 py-6">
                                <div class="w-full bg-gray-200 rounded-full h-4">
                                    <div class="bg-gradient-to-r from-red-500 to-pink-500 h-4 rounded-full transition-all duration-1000 ease-out" 
                                         style="width: {{ $idm->iks_percentage }}%"></div>
                                </div>
                            </td>
                            <td class="px-6 py-6 text-center">
                                @php
                                    $iksStatus = $idm->skor_iks >= 0.815 ? 'Sangat Baik' : ($idm->skor_iks >= 0.707 ? 'Baik' : ($idm->skor_iks >= 0.599 ? 'Sedang' : ($idm->skor_iks >= 0.491 ? 'Kurang' : 'Sangat Kurang')));
                                    $iksColor = $idm->skor_iks >= 0.815 ? 'bg-green-500 text-white' : ($idm->skor_iks >= 0.707 ? 'bg-blue-500 text-white' : ($idm->skor_iks >= 0.599 ? 'bg-indigo-500 text-white' : ($idm->skor_iks >= 0.491 ? 'bg-yellow-500 text-gray-900' : 'bg-red-500 text-white')));
                                @endphp
                                <span class="inline-block px-3 py-1 rounded-full text-sm font-medium {{ $iksColor }}">
                                    {{ $iksStatus }}
                                </span>
                            </td>
                        </tr>

                        <!-- IKE -->
                        <tr class="bg-gradient-to-r from-green-50 to-emerald-50 hover:from-green-100 hover:to-emerald-100 transition-all duration-200">
                            <td class="px-6 py-6">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-emerald-500 rounded-full flex items-center justify-center mr-4">
                                        <i class="fas fa-coins text-white text-xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-bold text-gray-900">Indeks Ketahanan Ekonomi (IKE)</h3>
                                        <p class="text-sm text-gray-600">Ketahanan ekonomi desa</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-6 text-center">
                                <span class="inline-block px-4 py-2 bg-green-500 text-white rounded-full font-bold text-lg">
                                    {{ number_format($idm->skor_ike, 3) }}
                                </span>
                            </td>
                            <td class="px-6 py-6 text-center">
                                <span class="text-2xl font-bold text-green-600">{{ number_format($idm->ike_percentage, 1) }}%</span>
                            </td>
                            <td class="px-6 py-6">
                                <div class="w-full bg-gray-200 rounded-full h-4">
                                    <div class="bg-gradient-to-r from-green-500 to-emerald-500 h-4 rounded-full transition-all duration-1000 ease-out" 
                                         style="width: {{ $idm->ike_percentage }}%"></div>
                                </div>
                            </td>
                            <td class="px-6 py-6 text-center">
                                @php
                                    $ikeStatus = $idm->skor_ike >= 0.815 ? 'Sangat Baik' : ($idm->skor_ike >= 0.707 ? 'Baik' : ($idm->skor_ike >= 0.599 ? 'Sedang' : ($idm->skor_ike >= 0.491 ? 'Kurang' : 'Sangat Kurang')));
                                    $ikeColor = $idm->skor_ike >= 0.815 ? 'bg-green-500 text-white' : ($idm->skor_ike >= 0.707 ? 'bg-blue-500 text-white' : ($idm->skor_ike >= 0.599 ? 'bg-indigo-500 text-white' : ($idm->skor_ike >= 0.491 ? 'bg-yellow-500 text-gray-900' : 'bg-red-500 text-white')));
                                @endphp
                                <span class="inline-block px-3 py-1 rounded-full text-sm font-medium {{ $ikeColor }}">
                                    {{ $ikeStatus }}
                                </span>
                            </td>
                        </tr>

                        <!-- IKL -->
                        <tr class="bg-gradient-to-r from-blue-50 to-cyan-50 hover:from-blue-100 hover:to-cyan-100 transition-all duration-200">
                            <td class="px-6 py-6">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-full flex items-center justify-center mr-4">
                                        <i class="fas fa-leaf text-white text-xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-bold text-gray-900">Indeks Ketahanan Lingkungan (IKL)</h3>
                                        <p class="text-sm text-gray-600">Ketahanan lingkungan desa</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-6 text-center">
                                <span class="inline-block px-4 py-2 bg-blue-500 text-white rounded-full font-bold text-lg">
                                    {{ number_format($idm->skor_ikl, 3) }}
                                </span>
                            </td>
                            <td class="px-6 py-6 text-center">
                                <span class="text-2xl font-bold text-blue-600">{{ number_format($idm->ikl_percentage, 1) }}%</span>
                            </td>
                            <td class="px-6 py-6">
                                <div class="w-full bg-gray-200 rounded-full h-4">
                                    <div class="bg-gradient-to-r from-blue-500 to-cyan-500 h-4 rounded-full transition-all duration-1000 ease-out" 
                                         style="width: {{ $idm->ikl_percentage }}%"></div>
                                </div>
                            </td>
                            <td class="px-6 py-6 text-center">
                                @php
                                    $iklStatus = $idm->skor_ikl >= 0.815 ? 'Sangat Baik' : ($idm->skor_ikl >= 0.707 ? 'Baik' : ($idm->skor_ikl >= 0.599 ? 'Sedang' : ($idm->skor_ikl >= 0.491 ? 'Kurang' : 'Sangat Kurang')));
                                    $iklColor = $idm->skor_ikl >= 0.815 ? 'bg-green-500 text-white' : ($idm->skor_ikl >= 0.707 ? 'bg-blue-500 text-white' : ($idm->skor_ikl >= 0.599 ? 'bg-indigo-500 text-white' : ($idm->skor_ikl >= 0.491 ? 'bg-yellow-500 text-gray-900' : 'bg-red-500 text-white')));
                                @endphp
                                <span class="inline-block px-3 py-1 rounded-full text-sm font-medium {{ $iklColor }}">
                                    {{ $iklStatus }}
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Tabel Dimensi -->
    <div class="mb-12">
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
            <div class="bg-gradient-to-r from-purple-600 to-violet-600 text-white p-8">
                <h2 class="text-3xl font-bold flex items-center">
                    <i class="fas fa-layer-group mr-4"></i>
                    Breakdown Dimensi Pembangunan
                </h2>
                <p class="mt-2 text-purple-200">Analisis detail per dimensi pembangunan desa</p>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-purple-100">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-bold text-purple-700 uppercase tracking-wider border-b">
                                <i class="fas fa-cubes mr-2"></i>Dimensi
                            </th>
                            <th class="px-6 py-4 text-center text-sm font-bold text-purple-700 uppercase tracking-wider border-b">
                                <i class="fas fa-calculator mr-2"></i>Skor
                            </th>
                            <th class="px-6 py-4 text-center text-sm font-bold text-purple-700 uppercase tracking-wider border-b">
                                <i class="fas fa-percentage mr-2"></i>Persentase
                            </th>
                            <th class="px-6 py-4 text-center text-sm font-bold text-purple-700 uppercase tracking-wider border-b">
                                <i class="fas fa-chart-line mr-2"></i>Progress Bar
                            </th>
                            <th class="px-6 py-4 text-left text-sm font-bold text-purple-700 uppercase tracking-wider border-b">
                                <i class="fas fa-info mr-2"></i>Deskripsi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <!-- Dimensi Sosial -->
                        <tr class="bg-gradient-to-r from-orange-50 to-amber-50 hover:from-orange-100 hover:to-amber-100 transition-all duration-200">
                            <td class="px-6 py-6">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-gradient-to-r from-orange-500 to-amber-500 rounded-full flex items-center justify-center mr-4">
                                        <i class="fas fa-users text-white text-xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-bold text-gray-900">Dimensi Sosial</h3>
                                        <p class="text-sm text-gray-600">Aspek sosial kemasyarakatan</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-6 text-center">
                                <span class="inline-block px-4 py-2 bg-orange-500 text-white rounded-full font-bold text-lg">
                                    {{ number_format($idm->dimensi_sosial, 3) }}
                                </span>
                            </td>
                            <td class="px-6 py-6 text-center">
                                <span class="text-2xl font-bold text-orange-600">{{ number_format(($idm->dimensi_sosial / 1.0) * 100, 1) }}%</span>
                            </td>
                            <td class="px-6 py-6">
                                <div class="w-full bg-gray-200 rounded-full h-4">
                                    <div class="bg-gradient-to-r from-orange-500 to-amber-500 h-4 rounded-full transition-all duration-1000 ease-out" 
                                         style="width: {{ ($idm->dimensi_sosial / 1.0) * 100 }}%"></div>
                                </div>
                            </td>
                            <td class="px-6 py-6">
                                <p class="text-sm text-gray-700">Mencakup pendidikan, kesehatan, modal sosial, dan kesejahteraan masyarakat desa.</p>
                            </td>
                        </tr>

                        <!-- Dimensi Ekonomi -->
                        <tr class="bg-gradient-to-r from-emerald-50 to-teal-50 hover:from-emerald-100 hover:to-teal-100 transition-all duration-200">
                            <td class="px-6 py-6">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-full flex items-center justify-center mr-4">
                                        <i class="fas fa-chart-line text-white text-xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-bold text-gray-900">Dimensi Ekonomi</h3>
                                        <p class="text-sm text-gray-600">Aspek ekonomi dan keuangan</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-6 text-center">
                                <span class="inline-block px-4 py-2 bg-emerald-500 text-white rounded-full font-bold text-lg">
                                    {{ number_format($idm->dimensi_ekonomi, 3) }}
                                </span>
                            </td>
                            <td class="px-6 py-6 text-center">
                                <span class="text-2xl font-bold text-emerald-600">{{ number_format(($idm->dimensi_ekonomi / 1.0) * 100, 1) }}%</span>
                            </td>
                            <td class="px-6 py-6">
                                <div class="w-full bg-gray-200 rounded-full h-4">
                                    <div class="bg-gradient-to-r from-emerald-500 to-teal-500 h-4 rounded-full transition-all duration-1000 ease-out" 
                                         style="width: {{ ($idm->dimensi_ekonomi / 1.0) * 100 }}%"></div>
                                </div>
                            </td>
                            <td class="px-6 py-6">
                                <p class="text-sm text-gray-700">Meliputi kegiatan ekonomi produktif, akses keuangan, dan distribusi ekonomi di desa.</p>
                            </td>
                        </tr>

                        <!-- Dimensi Lingkungan -->
                        <tr class="bg-gradient-to-r from-cyan-50 to-blue-50 hover:from-cyan-100 hover:to-blue-100 transition-all duration-200">
                            <td class="px-6 py-6">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-gradient-to-r from-cyan-500 to-blue-500 rounded-full flex items-center justify-center mr-4">
                                        <i class="fas fa-globe text-white text-xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-bold text-gray-900">Dimensi Lingkungan</h3>
                                        <p class="text-sm text-gray-600">Aspek ekologi dan lingkungan</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-6 text-center">
                                <span class="inline-block px-4 py-2 bg-cyan-500 text-white rounded-full font-bold text-lg">
                                    {{ number_format($idm->dimensi_lingkungan, 3) }}
                                </span>
                            </td>
                            <td class="px-6 py-6 text-center">
                                <span class="text-2xl font-bold text-cyan-600">{{ number_format(($idm->dimensi_lingkungan / 1.0) * 100, 1) }}%</span>
                            </td>
                            <td class="px-6 py-6">
                                <div class="w-full bg-gray-200 rounded-full h-4">
                                    <div class="bg-gradient-to-r from-cyan-500 to-blue-500 h-4 rounded-full transition-all duration-1000 ease-out" 
                                         style="width: {{ ($idm->dimensi_lingkungan / 1.0) * 100 }}%"></div>
                                </div>
                            </td>
                            <td class="px-6 py-6">
                                <p class="text-sm text-gray-700">Mencakup kualitas lingkungan, pengelolaan SDA, dan mitigasi risiko bencana.</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Tabel Perbandingan dengan Tahun Lain -->
    @if($comparisionData->count() > 1)
    <div class="mb-12">
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
            <div class="bg-gradient-to-r from-indigo-600 to-blue-600 text-white p-8">
                <h2 class="text-3xl font-bold flex items-center">
                    <i class="fas fa-history mr-4"></i>
                    Perbandingan Historis IDM Desa
                </h2>
                <p class="mt-2 text-indigo-200">Data lengkap IDM dari tahun ke tahun</p>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-indigo-100">
                        <tr>
                            <th class="px-6 py-4 text-center text-sm font-bold text-indigo-700 uppercase tracking-wider border-b">
                                <i class="fas fa-calendar mr-2"></i>Tahun
                            </th>
                            <th class="px-6 py-4 text-center text-sm font-bold text-indigo-700 uppercase tracking-wider border-b">
                                <i class="fas fa-trophy mr-2"></i>IDM
                            </th>
                            <th class="px-6 py-4 text-center text-sm font-bold text-indigo-700 uppercase tracking-wider border-b">
                                <i class="fas fa-users mr-2"></i>IKS
                            </th>
                            <th class="px-6 py-4 text-center text-sm font-bold text-indigo-700 uppercase tracking-wider border-b">
                                <i class="fas fa-coins mr-2"></i>IKE
                            </th>
                            <th class="px-6 py-4 text-center text-sm font-bold text-indigo-700 uppercase tracking-wider border-b">
                                <i class="fas fa-leaf mr-2"></i>IKL
                            </th>
                            <th class="px-6 py-4 text-center text-sm font-bold text-indigo-700 uppercase tracking-wider border-b">
                                <i class="fas fa-award mr-2"></i>Status
                            </th>
                            <th class="px-6 py-4 text-center text-sm font-bold text-indigo-700 uppercase tracking-wider border-b">
                                <i class="fas fa-trending-up mr-2"></i>Perubahan
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($comparisionData as $index => $data)
                            @php
                                $isCurrentYear = $data->tahun == $idm->tahun;
                                $previousData = $index > 0 ? $comparisionData[$index - 1] : null;
                                $change = $previousData ? $data->skor_idm - $previousData->skor_idm : null;
                            @endphp
                            <tr class="{{ $isCurrentYear ? 'bg-gradient-to-r from-indigo-100 to-blue-100 border-2 border-indigo-300' : 'hover:bg-gray-50' }} transition-all duration-200">
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center">
                                        @if($isCurrentYear)
                                            <i class="fas fa-star text-yellow-500 mr-2"></i>
                                        @endif
                                        <span class="font-bold text-lg {{ $isCurrentYear ? 'text-indigo-700' : 'text-gray-900' }}">
                                            {{ $data->tahun }}
                                        </span>
                                        @if($isCurrentYear)
                                            <span class="ml-2 px-2 py-1 bg-indigo-500 text-white text-xs rounded-full">Current</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <span class="inline-block px-3 py-2 {{ $isCurrentYear ? 'bg-indigo-500' : 'bg-blue-500' }} text-white rounded-full font-bold">
                                        {{ number_format($data->skor_idm, 3) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <span class="font-semibold text-gray-700">{{ number_format($data->skor_iks, 3) }}</span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <span class="font-semibold text-gray-700">{{ number_format($data->skor_ike, 3) }}</span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <span class="font-semibold text-gray-700">{{ number_format($data->skor_ikl, 3) }}</span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <span class="inline-block px-3 py-1 rounded-full text-sm font-medium
                                        @if($data->status_idm == 'Mandiri') bg-green-100 text-green-800
                                        @elseif($data->status_idm == 'Maju') bg-blue-100 text-blue-800
                                        @elseif($data->status_idm == 'Berkembang') bg-indigo-100 text-indigo-800
                                        @elseif($data->status_idm == 'Tertinggal') bg-yellow-100 text-yellow-800
                                        @else bg-red-100 text-red-800
                                        @endif">
                                        {{ $data->status_idm }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    @if($change !== null)
                                        <div class="flex items-center justify-center">
                                            <i class="fas fa-arrow-{{ $change >= 0 ? 'up' : 'down' }} 
                                               text-{{ $change >= 0 ? 'green' : 'red' }}-500 mr-2"></i>
                                            <span class="font-bold text-{{ $change >= 0 ? 'green' : 'red' }}-600">
                                                {{ $change >= 0 ? '+' : '' }}{{ number_format($change, 3) }}
                                            </span>
                                        </div>
                                    @else
                                        <span class="text-gray-400 text-sm">-</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif

    <!-- Deskripsi dan Target -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
        <!-- Deskripsi -->
        @if($idm->deskripsi)
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
            <div class="bg-gradient-to-r from-amber-500 to-orange-500 text-white p-6">
                <h2 class="text-2xl font-bold flex items-center">
                    <i class="fas fa-file-alt mr-3"></i>
                    Deskripsi
                </h2>
            </div>
            <div class="p-6">
                <p class="text-gray-700 leading-relaxed">{{ $idm->deskripsi }}</p>
            </div>
        </div>
        @endif

        <!-- Target Tahun Depan -->
        @if($idm->target_tahun_depan)
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
            <div class="bg-gradient-to-r from-pink-500 to-rose-500 text-white p-6">
                <h2 class="text-2xl font-bold flex items-center">
                    <i class="fas fa-bullseye mr-3"></i>
                    Target Tahun Depan
                </h2>
            </div>
            <div class="p-6">
                <p class="text-gray-700 leading-relaxed">{{ $idm->target_tahun_depan }}</p>
            </div>
        </div>
        @endif
    </div>

    <!-- Kategori Status -->
    <div class="mb-12">
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
            <div class="bg-gradient-to-r from-gray-700 to-gray-900 text-white p-8">
                <h2 class="text-3xl font-bold flex items-center">
                    <i class="fas fa-info-circle mr-4"></i>
                    Referensi Kategori IDM
                </h2>
                <p class="mt-2 text-gray-300">Klasifikasi status desa berdasarkan skor IDM</p>
            </div>
            <div class="p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
                    <div class="text-center p-6 rounded-2xl border-4 {{ $idm->status_idm == 'Mandiri' ? 'border-green-500 bg-green-100' : 'border-green-200 bg-green-50' }}">
                        <div class="mb-4">
                            <span class="inline-block px-4 py-2 bg-green-500 text-white rounded-full font-bold">Mandiri</span>
                        </div>
                        <h4 class="text-green-700 font-bold text-lg mb-2">≥ 0.815</h4>
                        <p class="text-sm text-gray-600">Desa mandiri dengan infrastruktur lengkap</p>
                        @if($idm->status_idm == 'Mandiri')
                            <div class="mt-3">
                                <i class="fas fa-check-circle text-green-500 text-xl"></i>
                                <p class="text-xs text-green-600 font-semibold mt-1">Status Saat Ini</p>
                            </div>
                        @endif
                    </div>
                    
                    <div class="text-center p-6 rounded-2xl border-4 {{ $idm->status_idm == 'Maju' ? 'border-blue-500 bg-blue-100' : 'border-blue-200 bg-blue-50' }}">
                        <div class="mb-4">
                            <span class="inline-block px-4 py-2 bg-blue-500 text-white rounded-full font-bold">Maju</span>
                        </div>
                        <h4 class="text-blue-700 font-bold text-lg mb-2">0.707 - 0.814</h4>
                        <p class="text-sm text-gray-600">Desa dengan potensi berkembang baik</p>
                        @if($idm->status_idm == 'Maju')
                            <div class="mt-3">
                                <i class="fas fa-check-circle text-blue-500 text-xl"></i>
                                <p class="text-xs text-blue-600 font-semibold mt-1">Status Saat Ini</p>
                            </div>
                        @endif
                    </div>
                    
                    <div class="text-center p-6 rounded-2xl border-4 {{ $idm->status_idm == 'Berkembang' ? 'border-indigo-500 bg-indigo-100' : 'border-indigo-200 bg-indigo-50' }}">
                        <div class="mb-4">
                            <span class="inline-block px-4 py-2 bg-indigo-500 text-white rounded-full font-bold">Berkembang</span>
                        </div>
                        <h4 class="text-indigo-700 font-bold text-lg mb-2">0.599 - 0.706</h4>
                        <p class="text-sm text-gray-600">Desa dalam tahap perkembangan</p>
                        @if($idm->status_idm == 'Berkembang')
                            <div class="mt-3">
                                <i class="fas fa-check-circle text-indigo-500 text-xl"></i>
                                <p class="text-xs text-indigo-600 font-semibold mt-1">Status Saat Ini</p>
                            </div>
                        @endif
                    </div>
                    
                    <div class="text-center p-6 rounded-2xl border-4 {{ $idm->status_idm == 'Tertinggal' ? 'border-yellow-500 bg-yellow-100' : 'border-yellow-200 bg-yellow-50' }}">
                        <div class="mb-4">
                            <span class="inline-block px-4 py-2 bg-yellow-500 text-gray-900 rounded-full font-bold">Tertinggal</span>
                        </div>
                        <h4 class="text-yellow-700 font-bold text-lg mb-2">0.491 - 0.598</h4>
                        <p class="text-sm text-gray-600">Desa memerlukan perhatian khusus</p>
                        @if($idm->status_idm == 'Tertinggal')
                            <div class="mt-3">
                                <i class="fas fa-check-circle text-yellow-500 text-xl"></i>
                                <p class="text-xs text-yellow-600 font-semibold mt-1">Status Saat Ini</p>
                            </div>
                        @endif
                    </div>
                    
                    <div class="text-center p-6 rounded-2xl border-4 {{ $idm->status_idm == 'Sangat Tertinggal' ? 'border-red-500 bg-red-100' : 'border-red-200 bg-red-50' }}">
                        <div class="mb-4">
                            <span class="inline-block px-4 py-2 bg-red-500 text-white rounded-full font-bold">Sangat Tertinggal</span>
                        </div>
                        <h4 class="text-red-700 font-bold text-lg mb-2">< 0.491</h4>
                        <p class="text-sm text-gray-600">Desa prioritas pembangunan</p>
                        @if($idm->status_idm == 'Sangat Tertinggal')
                            <div class="mt-3">
                                <i class="fas fa-check-circle text-red-500 text-xl"></i>
                                <p class="text-xs text-red-600 font-semibold mt-1">Status Saat Ini</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <div class="text-center">
        <a href="{{ route('public.idm.index') }}" 
           class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-village-primary to-primary text-white font-semibold rounded-2xl hover:shadow-lg transform hover:-translate-y-1 transition-all duration-300 mr-4">
            <i class="fas fa-arrow-left mr-3"></i>
            Kembali ke IDM Desa
        </a>
        
        @if($nextYear)
        <a href="{{ route('public.idm.detail', $nextYear->tahun) }}" 
           class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-green-500 to-emerald-500 text-white font-semibold rounded-2xl hover:shadow-lg transform hover:-translate-y-1 transition-all duration-300">
            <i class="fas fa-arrow-right mr-3"></i>
            Lihat {{ $nextYear->tahun }}
        </a>
        @endif
        
        @if($previousYear)
        <a href="{{ route('public.idm.detail', $previousYear->tahun) }}" 
           class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-500 to-indigo-500 text-white font-semibold rounded-2xl hover:shadow-lg transform hover:-translate-y-1 transition-all duration-300 ml-4">
            <i class="fas fa-arrow-left mr-3"></i>
            Lihat {{ $previousYear->tahun }}
        </a>
        @endif
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Score Doughnut Chart
    const scoreCtx = document.getElementById('scoreChart');
    if (scoreCtx) {
        const score = {{ $idm->skor_idm }};
        const remaining = 1.0 - score;
        
        new Chart(scoreCtx, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [score, remaining],
                    backgroundColor: ['#10b981', '#e5e7eb'],
                    borderWidth: 0,
                    cutout: '70%'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: { enabled: false }
                }
            }
        });
    }
    
    @if($comparisionData->count() > 1)
    // Comparison Chart
    const compCtx = document.getElementById('comparisonChart');
    if (compCtx) {
        const years = @json($comparisionData->pluck('tahun'));
        const idmScores = @json($comparisionData->pluck('skor_idm'));
        const iksScores = @json($comparisionData->pluck('skor_iks'));
        const ikeScores = @json($comparisionData->pluck('skor_ike'));
        const iklScores = @json($comparisionData->pluck('skor_ikl'));
        
        new Chart(compCtx, {
            type: 'line',
            data: {
                labels: years,
                datasets: [
                    {
                        label: 'IDM',
                        data: idmScores,
                        borderColor: '#10b981',
                        backgroundColor: 'rgba(16, 185, 129, 0.1)',
                        borderWidth: 4,
                        tension: 0.4,
                        fill: true,
                        pointBackgroundColor: '#10b981',
                        pointBorderColor: '#ffffff',
                        pointBorderWidth: 3,
                        pointRadius: 8
                    },
                    {
                        label: 'IKS',
                        data: iksScores,
                        borderColor: '#ef4444',
                        backgroundColor: 'rgba(239, 68, 68, 0.1)',
                        borderWidth: 3,
                        tension: 0.4,
                        fill: false,
                        pointBackgroundColor: '#ef4444',
                        pointBorderColor: '#ffffff',
                        pointBorderWidth: 2,
                        pointRadius: 6
                    },
                    {
                        label: 'IKE',
                        data: ikeScores,
                        borderColor: '#22c55e',
                        backgroundColor: 'rgba(34, 197, 94, 0.1)',
                        borderWidth: 3,
                        tension: 0.4,
                        fill: false,
                        pointBackgroundColor: '#22c55e',
                        pointBorderColor: '#ffffff',
                        pointBorderWidth: 2,
                        pointRadius: 6
                    },
                    {
                        label: 'IKL',
                        data: iklScores,
                        borderColor: '#3b82f6',
                        backgroundColor: 'rgba(59, 130, 246, 0.1)',
                        borderWidth: 3,
                        tension: 0.4,
                        fill: false,
                        pointBackgroundColor: '#3b82f6',
                        pointBorderColor: '#ffffff',
                        pointBorderWidth: 2,
                        pointRadius: 6
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        labels: {
                            font: { size: 14, weight: 'bold' },
                            color: '#374151',
                            usePointStyle: true,
                            padding: 20
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 1.0,
                        grid: { color: 'rgba(0, 0, 0, 0.1)' },
                        ticks: { 
                            font: { size: 12 }, 
                            color: '#6b7280',
                            callback: function(value) {
                                return value.toFixed(2);
                            }
                        }
                    },
                    x: {
                        grid: { color: 'rgba(0, 0, 0, 0.1)' },
                        ticks: { font: { size: 12 }, color: '#6b7280' }
                    }
                },
                interaction: { intersect: false, mode: 'index' }
            }
        });
    }
    @endif
});
</script>
@endpush