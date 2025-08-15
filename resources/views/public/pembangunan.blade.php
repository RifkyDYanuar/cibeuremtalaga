@extends('layouts.public')

@section('title', 'Pembangunan Desa')
@section('meta_description', 'Informasi lengkap tentang proyek pembangunan di Desa Cibeureum Talaga - progress, anggaran, dan dokumentasi pembangunan desa.')

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-br from-village-primary to-village-secondary py-16 sm:py-20">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-4">
            Pembangunan Desa
        </h1>
        <p class="text-lg sm:text-xl text-white/90 mb-6">
            Transparansi dan Akuntabilitas Proyek Pembangunan Desa Cibeureum Talaga
        </p>
        <div class="flex justify-center">
            <div class="bg-white/20 backdrop-blur-sm rounded-full px-6 py-2">
                <span class="text-white font-medium">Update Terkini</span>
            </div>
        </div>
    </div>
</div>

<!-- Statistics Section -->
<section class="py-12 bg-gray-50 dark:bg-gray-800">
    <div class="max-w-6xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Total Proyek -->
            <div class="bg-white dark:bg-gray-700 rounded-xl shadow-lg p-6 text-center border border-gray-100 dark:border-gray-600">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-project-diagram text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">{{ $stats['total'] }}</h3>
                <p class="text-gray-600 dark:text-gray-300 text-sm">Total Proyek</p>
            </div>

            <!-- Proyek Selesai -->
            <div class="bg-white dark:bg-gray-700 rounded-xl shadow-lg p-6 text-center border border-gray-100 dark:border-gray-600">
                <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-check-circle text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">{{ $stats['selesai'] }}</h3>
                <p class="text-gray-600 dark:text-gray-300 text-sm">Proyek Selesai</p>
            </div>

            <!-- Dalam Proses -->
            <div class="bg-white dark:bg-gray-700 rounded-xl shadow-lg p-6 text-center border border-gray-100 dark:border-gray-600">
                <div class="w-16 h-16 bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-cog text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">{{ $stats['proses'] }}</h3>
                <p class="text-gray-600 dark:text-gray-300 text-sm">Dalam Proses</p>
            </div>

            <!-- Total Anggaran -->
            <div class="bg-white dark:bg-gray-700 rounded-xl shadow-lg p-6 text-center border border-gray-100 dark:border-gray-600">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-money-bill-wave text-white text-2xl"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Rp {{ number_format($stats['total_anggaran'] / 1000000, 0, ',', '.') }}M</h3>
                <p class="text-gray-600 dark:text-gray-300 text-sm">Total Anggaran</p>
            </div>
        </div>
    </div>
</section>

<!-- Projects Section -->
<section class="py-16">
    <div class="max-w-6xl mx-auto px-4">
        @if($pembangunan->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($pembangunan as $item)
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden border border-gray-100 dark:border-gray-700 hover:shadow-2xl transition-all duration-300 group">
                        <!-- Image -->
                        <div class="relative h-48 overflow-hidden">
                            <img src="{{ $item->main_image_url }}" 
                                 alt="{{ $item->nama_proyek }}" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                            <div class="absolute top-4 left-4">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {{ $item->status_badge }}">
                                    {{ $item->status_label }}
                                </span>
                            </div>
                            <div class="absolute top-4 right-4">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    {{ $item->kategori_label }}
                                </span>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-6">
                            <h3 class="font-bold text-xl text-gray-900 dark:text-white mb-2 line-clamp-2">
                                {{ $item->nama_proyek }}
                            </h3>
                            
                            <p class="text-gray-600 dark:text-gray-300 text-sm mb-4 line-clamp-3">
                                {{ $item->deskripsi }}
                            </p>

                            <!-- Progress Bar -->
                            <div class="mb-4">
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Progress</span>
                                    <span class="text-sm font-medium text-village-primary">{{ $item->progress }}%</span>
                                </div>
                                <div class="w-full bg-gray-200 dark:bg-gray-600 rounded-full h-2">
                                    <div class="bg-gradient-to-r from-village-primary to-village-secondary h-2 rounded-full transition-all duration-300" 
                                         style="width: {{ $item->progress }}%"></div>
                                </div>
                            </div>

                            <!-- Details -->
                            <div class="space-y-2 mb-4">
                                <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                    <i class="fas fa-map-marker-alt w-4 mr-2"></i>
                                    <span>{{ $item->lokasi }}</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                    <i class="fas fa-calendar w-4 mr-2"></i>
                                    <span>Target: {{ $item->tanggal_target->format('d M Y') }}</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                    <i class="fas fa-money-bill-wave w-4 mr-2"></i>
                                    <span>Rp {{ number_format($item->anggaran, 0, ',', '.') }}</span>
                                </div>
                            </div>

                            <!-- Action Button -->
                            <a href="{{ route('public.pembangunan.detail', $item->id) }}" 
                               class="inline-flex items-center justify-center w-full px-4 py-2 bg-gradient-to-r from-village-primary to-village-secondary text-white font-semibold rounded-xl hover:shadow-lg transition-all duration-300 group-hover:shadow-xl">
                                <span>Lihat Detail</span>
                                <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                {{ $pembangunan->links() }}
            </div>
        @else
            <div class="text-center py-16">
                <div class="w-24 h-24 mx-auto mb-6 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center">
                    <i class="fas fa-hammer text-gray-400 text-3xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Belum Ada Data Pembangunan</h3>
                <p class="text-gray-600 dark:text-gray-400 max-w-md mx-auto">
                    Informasi proyek pembangunan desa akan ditampilkan di sini setelah data tersedia.
                </p>
            </div>
        @endif
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-gradient-to-br from-village-primary to-village-secondary">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-white mb-4">
            Partisipasi Masyarakat dalam Pembangunan
        </h2>
        <p class="text-xl text-white/90 mb-8">
            Mari bersama-sama membangun desa yang lebih maju dan sejahtera
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="#" class="bg-white text-village-primary px-8 py-3 rounded-xl font-semibold hover:bg-gray-50 transition-colors inline-flex items-center justify-center">
                <i class="fas fa-comments mr-2"></i>
                Sampaikan Aspirasi
            </a>
            <a href="#" class="bg-white/10 text-white border-2 border-white px-8 py-3 rounded-xl font-semibold hover:bg-white/20 transition-colors inline-flex items-center justify-center">
                <i class="fas fa-download mr-2"></i>
                Download Laporan
            </a>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
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
@endpush
