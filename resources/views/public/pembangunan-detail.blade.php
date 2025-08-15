@extends('layouts.public')

@push('styles')
<style>
    /* Scroll Animation Styles */
    .scroll-reveal {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.6s cubic-bezier(0.16, 1, 0.3, 1);
    }
    
    .scroll-reveal.revealed {
        opacity: 1;
        transform: translateY(0);
    }
    
    .scroll-reveal-left {
        opacity: 0;
        transform: translateX(-30px);
        transition: all 0.7s cubic-bezier(0.16, 1, 0.3, 1);
    }
    
    .scroll-reveal-left.revealed {
        opacity: 1;
        transform: translateX(0);
    }
    
    .scroll-reveal-right {
        opacity: 0;
        transform: translateX(30px);
        transition: all 0.7s cubic-bezier(0.16, 1, 0.3, 1);
    }
    
    .scroll-reveal-right.revealed {
        opacity: 1;
        transform: translateX(0);
    }
    
    .scroll-reveal-scale {
        opacity: 0;
        transform: scale(0.8);
        transition: all 0.8s cubic-bezier(0.16, 1, 0.3, 1);
    }
    
    .scroll-reveal-scale.revealed {
        opacity: 1;
        transform: scale(1);
    }
    
    /* Progress bar animation */
    .progress-bar {
        transition: width 1.5s cubic-bezier(0.16, 1, 0.3, 1);
    }
    
    /* Staggered animation delays */
    .scroll-reveal:nth-child(1) { transition-delay: 0ms; }
    .scroll-reveal:nth-child(2) { transition-delay: 100ms; }
    .scroll-reveal:nth-child(3) { transition-delay: 200ms; }
    .scroll-reveal:nth-child(4) { transition-delay: 300ms; }
    .scroll-reveal:nth-child(5) { transition-delay: 400ms; }
    .scroll-reveal:nth-child(6) { transition-delay: 500ms; }
    
    /* Smooth scrolling for the whole page */
    html {
        scroll-behavior: smooth;
    }
    
    /* Image hover animations */
    .image-hover {
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    }
    
    .image-hover:hover {
        transform: scale(1.02);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    
    /* Back to top button animation */
    #backToTop {
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        transform: translateY(10px);
    }
    
    #backToTop.visible {
        transform: translateY(0);
    }
    
    #backToTop:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    }
    
    /* Loading state for images */
    .image-loading {
        background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
        background-size: 200% 100%;
        animation: loading 1.5s infinite;
    }
    
    @keyframes loading {
        0% { background-position: 200% 0; }
        100% { background-position: -200% 0; }
    }
    
    /* Enhanced focus states for accessibility */
    .focus-visible:focus {
        outline: 2px solid #3B82F6;
        outline-offset: 2px;
    }
</style>
@endpush

@section('title', $pembangunan->nama_proyek . ' - Pembangunan Desa')
@section('meta_description', 'Detail proyek pembangunan: ' . $pembangunan->nama_proyek . ' di Desa Cibeureum Talaga - ' . Str::limit($pembangunan->deskripsi, 150))

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-br from-village-primary to-village-secondary py-16 sm:py-20">
    <div class="max-w-4xl mx-auto px-4">
        <!-- Breadcrumb -->
        <nav class="flex text-sm text-white/80 mb-6" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('welcome') }}" class="hover:text-white">Beranda</a>
                </li>
                <li>
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right mx-2 text-xs"></i>
                        <a href="{{ route('public.pembangunan') }}" class="hover:text-white">Pembangunan</a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right mx-2 text-xs"></i>
                        <span class="text-white">{{ Str::limit($pembangunan->nama_proyek, 30) }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="text-center">
            <h1 class="scroll-reveal text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-4">
                {{ $pembangunan->nama_proyek }}
            </h1>
            <p class="scroll-reveal text-lg sm:text-xl text-white/90 mb-6">
                {{ $pembangunan->lokasi }}
            </p>
            <div class="scroll-reveal flex flex-wrap justify-center gap-4">
                <div class="bg-white/20 backdrop-blur-sm rounded-full px-4 py-2">
                    <span class="text-white font-medium">{{ $pembangunan->kategori_label }}</span>
                </div>
                <div class="bg-white/20 backdrop-blur-sm rounded-full px-4 py-2">
                    <span class="text-white font-medium">{{ $pembangunan->status_label }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="max-w-6xl mx-auto py-12 px-4">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Content -->
        <div class="lg:col-span-2">
            <!-- Image Gallery -->
            @if($pembangunan->gambar && count($pembangunan->gambar) > 0)
                <div class="scroll-reveal mb-8">
                    <div class="rounded-2xl overflow-hidden shadow-xl mb-4 image-hover">
                        <img id="mainImage" src="{{ $pembangunan->main_image_url }}" 
                             alt="{{ $pembangunan->nama_proyek }}" 
                             class="w-full h-96 object-cover">
                    </div>
                    @if(count($pembangunan->gambar_urls) > 1)
                        <div class="scroll-reveal grid grid-cols-4 gap-2">
                            @foreach($pembangunan->gambar_urls as $index => $url)
                                <img src="{{ $url }}" 
                                     alt="{{ $pembangunan->nama_proyek }} - {{ $index + 1 }}"
                                     class="h-20 object-cover rounded-lg cursor-pointer hover:opacity-75 transition-opacity {{ $index === 0 ? 'ring-2 ring-village-primary' : '' }}"
                                     onclick="changeMainImage('{{ $url }}', this)">
                            @endforeach
                        </div>
                    @endif
                </div>
            @endif

            <!-- Progress Section -->
            <div class="scroll-reveal bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 mb-8 border border-gray-100 dark:border-gray-700">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">
                    <i class="fas fa-chart-line mr-3 text-village-primary"></i>Progress Pembangunan
                </h2>
                
                <div class="mb-6">
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-lg font-semibold text-gray-700 dark:text-gray-300">Kemajuan Proyek</span>
                        <span class="text-2xl font-bold text-village-primary">{{ $pembangunan->progress }}%</span>
                    </div>
                    <div class="w-full bg-gray-200 dark:bg-gray-600 rounded-full h-4">
                        <div class="progress-bar bg-gradient-to-r from-village-primary to-village-secondary h-4 rounded-full" 
                             data-progress="{{ $pembangunan->progress }}"
                             style="width: 0%"></div>
                    </div>
                </div>

                <!-- Timeline -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="scroll-reveal text-center p-4 bg-blue-50 dark:bg-blue-900/20 rounded-xl">
                        <i class="fas fa-play-circle text-blue-600 text-2xl mb-2"></i>
                        <h4 class="font-semibold text-gray-800 dark:text-gray-200 mb-1">Mulai</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ $pembangunan->tanggal_mulai->format('d M Y') }}</p>
                    </div>
                    <div class="scroll-reveal text-center p-4 bg-yellow-50 dark:bg-yellow-900/20 rounded-xl">
                        <i class="fas fa-flag-checkered text-yellow-600 text-2xl mb-2"></i>
                        <h4 class="font-semibold text-gray-800 dark:text-gray-200 mb-1">Target</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ $pembangunan->tanggal_target->format('d M Y') }}</p>
                    </div>
                    <div class="scroll-reveal text-center p-4 bg-green-50 dark:bg-green-900/20 rounded-xl">
                        <i class="fas fa-check-circle text-green-600 text-2xl mb-2"></i>
                        <h4 class="font-semibold text-gray-800 dark:text-gray-200 mb-1">Selesai</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            {{ $pembangunan->tanggal_selesai ? $pembangunan->tanggal_selesai->format('d M Y') : 'Belum Selesai' }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Description -->
            <div class="scroll-reveal bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 mb-8 border border-gray-100 dark:border-gray-700">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">
                    <i class="fas fa-info-circle mr-3 text-village-primary"></i>Deskripsi Proyek
                </h2>
                <div class="prose prose-lg max-w-none text-gray-600 dark:text-gray-300">
                    {!! nl2br(e($pembangunan->deskripsi)) !!}
                </div>
                
                @if($pembangunan->keterangan)
                    <div class="mt-6 p-4 bg-village-light/20 dark:bg-village-primary/10 rounded-lg border-l-4 border-village-primary">
                        <h4 class="font-semibold text-village-dark dark:text-village-secondary mb-2">Keterangan Tambahan:</h4>
                        <p class="text-gray-700 dark:text-gray-300">{!! nl2br(e($pembangunan->keterangan)) !!}</p>
                    </div>
                @endif
            </div>

            <!-- Budget Details -->
            <div class="scroll-reveal bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 border border-gray-100 dark:border-gray-700">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">
                    <i class="fas fa-money-bill-wave mr-3 text-village-primary"></i>Detail Anggaran
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="scroll-reveal p-4 bg-blue-50 dark:bg-blue-900/20 rounded-xl">
                        <h4 class="font-semibold text-gray-800 dark:text-gray-200 mb-2">Total Anggaran</h4>
                        <p class="text-2xl font-bold text-blue-600">Rp {{ number_format($pembangunan->anggaran, 0, ',', '.') }}</p>
                    </div>
                    
                    @if($pembangunan->realisasi > 0)
                        <div class="scroll-reveal p-4 bg-green-50 dark:bg-green-900/20 rounded-xl">
                            <h4 class="font-semibold text-gray-800 dark:text-gray-200 mb-2">Realisasi</h4>
                            <p class="text-2xl font-bold text-green-600">Rp {{ number_format($pembangunan->realisasi, 0, ',', '.') }}</p>
                        </div>
                    @endif
                    
                    <div class="p-4 bg-purple-50 dark:bg-purple-900/20 rounded-xl">
                        <h4 class="font-semibold text-gray-800 dark:text-gray-200 mb-2">Sumber Dana</h4>
                        <p class="text-lg font-semibold text-purple-600">{{ $pembangunan->sumber_dana }}</p>
                    </div>
                    
                    <div class="p-4 bg-orange-50 dark:bg-orange-900/20 rounded-xl">
                        <h4 class="font-semibold text-gray-800 dark:text-gray-200 mb-2">Penanggung Jawab</h4>
                        <p class="text-lg font-semibold text-orange-600">{{ $pembangunan->penanggung_jawab }}</p>
                    </div>
                </div>
                
                @if($pembangunan->kontraktor)
                    <div class="mt-4 p-4 bg-gray-50 dark:bg-gray-700 rounded-xl">
                        <h4 class="font-semibold text-gray-800 dark:text-gray-200 mb-2">Kontraktor</h4>
                        <p class="text-lg text-gray-600 dark:text-gray-300">{{ $pembangunan->kontraktor }}</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1">
            <!-- Project Info Card -->
            <div class="scroll-reveal bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-6 mb-8 border border-gray-100 dark:border-gray-700 sticky top-8">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">
                    <i class="fas fa-info mr-2 text-village-primary"></i>Informasi Proyek
                </h3>
                
                <div class="space-y-4">
                    <div class="flex items-center justify-between py-2 border-b border-gray-100 dark:border-gray-600">
                        <span class="text-gray-600 dark:text-gray-400">Status</span>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $pembangunan->status_badge }}">
                            {{ $pembangunan->status_label }}
                        </span>
                    </div>
                    
                    <div class="flex items-center justify-between py-2 border-b border-gray-100 dark:border-gray-600">
                        <span class="text-gray-600 dark:text-gray-400">Kategori</span>
                        <span class="text-gray-900 dark:text-white font-medium">{{ $pembangunan->kategori_label }}</span>
                    </div>
                    
                    <div class="flex items-center justify-between py-2 border-b border-gray-100 dark:border-gray-600">
                        <span class="text-gray-600 dark:text-gray-400">Lokasi</span>
                        <span class="text-gray-900 dark:text-white font-medium">{{ $pembangunan->lokasi }}</span>
                    </div>
                    
                    <div class="flex items-center justify-between py-2 border-b border-gray-100 dark:border-gray-600">
                        <span class="text-gray-600 dark:text-gray-400">Progress</span>
                        <span class="text-village-primary font-bold">{{ $pembangunan->progress }}%</span>
                    </div>
                    
                    <div class="flex items-center justify-between py-2">
                        <span class="text-gray-600 dark:text-gray-400">Anggaran</span>
                        <span class="text-gray-900 dark:text-white font-bold">
                            Rp {{ number_format($pembangunan->anggaran / 1000000, 1, ',', '.') }}M
                        </span>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="scroll-reveal mt-6 space-y-3">
                    <a href="{{ route('public.pembangunan') }}" 
                       class="w-full bg-village-primary text-white px-4 py-3 rounded-xl font-semibold hover:bg-village-secondary transition-colors flex items-center justify-center">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali ke Daftar
                    </a>
                    
                    <button onclick="window.print()" 
                            class="w-full bg-gray-500 text-white px-4 py-3 rounded-xl font-semibold hover:bg-gray-600 transition-colors flex items-center justify-center">
                        <i class="fas fa-print mr-2"></i>
                        Cetak Halaman
                    </button>
                </div>
            </div>

            <!-- Related Projects -->
            @if($related->count() > 0)
                <div class="scroll-reveal bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-6 border border-gray-100 dark:border-gray-700">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">
                        <i class="fas fa-layer-group mr-2 text-village-primary"></i>Proyek Terkait
                    </h3>
                    
                    <div class="space-y-4">
                        @foreach($related as $item)
                            <div class="border border-gray-100 dark:border-gray-600 rounded-lg p-4 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                <h4 class="font-semibold text-gray-900 dark:text-white mb-2 line-clamp-2">
                                    <a href="{{ route('public.pembangunan.detail', $item->id) }}" class="hover:text-village-primary">
                                        {{ $item->nama_proyek }}
                                    </a>
                                </h4>
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-gray-600 dark:text-gray-400">{{ $item->lokasi }}</span>
                                    <span class="text-village-primary font-semibold">{{ $item->progress }}%</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Back to Top -->
<button id="backToTop" 
        class="fixed bottom-8 right-8 bg-village-primary text-white p-3 rounded-full shadow-lg hover:bg-village-secondary transition-all duration-300 opacity-0 invisible">
    <i class="fas fa-chevron-up"></i>
</button>
@endsection

@push('scripts')
<script>
    function changeMainImage(src, element) {
        document.getElementById('mainImage').src = src;
        
        // Remove ring from all thumbnails
        document.querySelectorAll('.grid img').forEach(img => {
            img.classList.remove('ring-2', 'ring-village-primary');
        });
        
        // Add ring to clicked thumbnail
        element.classList.add('ring-2', 'ring-village-primary');
    }

    // Simple scroll reveal animations
    function initScrollAnimations() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('revealed');
                }
            });
        }, observerOptions);

        // Observe all scroll reveal elements
        document.querySelectorAll('.scroll-reveal').forEach((el) => {
            observer.observe(el);
        });
    }

    // Back to top functionality
    window.addEventListener('scroll', function() {
        const backToTop = document.getElementById('backToTop');
        if (window.pageYOffset > 300) {
            backToTop.classList.remove('opacity-0', 'invisible');
            backToTop.classList.add('opacity-100', 'visible');
        } else {
            backToTop.classList.add('opacity-0', 'invisible');
            backToTop.classList.remove('opacity-100', 'visible');
        }
    });

    document.getElementById('backToTop').addEventListener('click', function() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    // Initialize animations when DOM is loaded
    document.addEventListener('DOMContentLoaded', function() {
        initScrollAnimations();
    });
</script>
@endpush
