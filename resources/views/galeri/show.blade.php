@extends('layouts.public')

@section('title', $galeri->judul . ' - Galeri SiDesa Cibeureum')

@section('content')
<!-- Page Header -->
<section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-village-primary via-village-secondary to-village-accent"></div>
    <div class="absolute inset-0 bg-black/50 backdrop-blur-[1px]"></div>
    <div class="absolute inset-0 bg-[url('{{ asset('storage/galeri/' . $galeri->gambar) }}')] bg-cover bg-center opacity-30"></div>
    
    <div class="relative z-10 text-center text-white px-4 max-w-5xl mx-auto">
        <div class="animate-fadeIn">
            <span class="inline-block px-6 py-2 bg-white/20 backdrop-blur-md rounded-full text-sm font-semibold mb-4 border border-white/30">
                <i class="fas fa-image mr-2"></i>
                {{ ucfirst($galeri->kategori) }}
            </span>
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-black mb-6 leading-tight">
                {{ $galeri->judul }}
            </h1>
        </div>
        <div class="animate-slideUp" style="animation-delay: 0.3s;">
            <div class="flex flex-wrap justify-center gap-6 text-base opacity-95">
                @if($galeri->tanggal_foto)
                    <div class="flex items-center">
                        <i class="fas fa-calendar-alt mr-2"></i>
                        {{ $galeri->formatted_tanggal_foto }}
                    </div>
                @endif
                @if($galeri->lokasi)
                    <div class="flex items-center">
                        <i class="fas fa-map-marker-alt mr-2"></i>
                        {{ $galeri->lokasi }}
                    </div>
                @endif
                @if($galeri->fotografer)
                    <div class="flex items-center">
                        <i class="fas fa-camera mr-2"></i>
                        {{ $galeri->fotografer }}
                    </div>
                @endif
            </div>
        </div>
        <div class="animate-slideUp mt-8" style="animation-delay: 0.6s;">
            <a href="{{ route('galeri.public') }}" 
               class="inline-flex items-center px-6 py-3 bg-white/20 backdrop-blur-md text-white border border-white/30 rounded-xl hover:bg-white/30 transition-all duration-300">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali ke Galeri
            </a>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="py-20 bg-gradient-to-br from-gray-50 to-white dark:from-dark-100 dark:to-dark-200 transition-colors duration-300">
    <div class="max-w-6xl mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Main Image -->
            <div class="lg:col-span-2">
                <div class="bg-white dark:bg-dark-300 rounded-2xl shadow-lg overflow-hidden">
                    <div class="relative group">
                        <img src="{{ asset('storage/galeri/' . $galeri->gambar) }}" 
                             alt="{{ $galeri->judul }}"
                             class="w-full h-96 lg:h-[500px] object-cover cursor-pointer hover:scale-105 transition-transform duration-500"
                             onclick="openImageModal(this.src)">
                        <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <div class="bg-white/90 backdrop-blur-md rounded-full p-4">
                                <i class="fas fa-search-plus text-village-primary text-xl"></i>
                            </div>
                        </div>
                    </div>
                    
                    @if($galeri->deskripsi)
                        <div class="p-6">
                            <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Deskripsi</h2>
                            <div class="prose prose-gray dark:prose-invert max-w-none">
                                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                                    {{ $galeri->deskripsi }}
                                </p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Sidebar -->
            <aside class="space-y-6">
                <!-- Photo Info -->
                <div class="bg-white dark:bg-dark-300 rounded-2xl shadow-lg p-6">
                    <div class="text-center mb-6">
                        <div class="inline-block px-4 py-2 bg-village-primary/10 text-village-primary rounded-full text-sm font-semibold mb-3">
                            📸 INFO FOTO
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">Detail Informasi</h3>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="flex items-start gap-3">
                            <div class="p-2 bg-village-primary/10 rounded-lg">
                                <i class="fas fa-tag text-village-primary"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Kategori</p>
                                <p class="font-semibold text-gray-900 dark:text-white">{{ ucfirst($galeri->kategori) }}</p>
                            </div>
                        </div>
                        
                        @if($galeri->tanggal_foto)
                            <div class="flex items-start gap-3">
                                <div class="p-2 bg-village-primary/10 rounded-lg">
                                    <i class="fas fa-calendar-alt text-village-primary"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Tanggal Foto</p>
                                    <p class="font-semibold text-gray-900 dark:text-white">{{ $galeri->formatted_tanggal_foto }}</p>
                                </div>
                            </div>
                        @endif
                        
                        @if($galeri->lokasi)
                            <div class="flex items-start gap-3">
                                <div class="p-2 bg-village-primary/10 rounded-lg">
                                    <i class="fas fa-map-marker-alt text-village-primary"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Lokasi</p>
                                    <p class="font-semibold text-gray-900 dark:text-white">{{ $galeri->lokasi }}</p>
                                </div>
                            </div>
                        @endif
                        
                        @if($galeri->fotografer)
                            <div class="flex items-start gap-3">
                                <div class="p-2 bg-village-primary/10 rounded-lg">
                                    <i class="fas fa-camera text-village-primary"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Fotografer</p>
                                    <p class="font-semibold text-gray-900 dark:text-white">{{ $galeri->fotografer }}</p>
                                </div>
                            </div>
                        @endif
                        
                        <div class="flex items-start gap-3">
                            <div class="p-2 bg-village-primary/10 rounded-lg">
                                <i class="fas fa-clock text-village-primary"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Diunggah</p>
                                <p class="font-semibold text-gray-900 dark:text-white">{{ $galeri->created_at->format('d F Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Share Buttons -->
                <div class="bg-white dark:bg-dark-300 rounded-2xl shadow-lg p-6">
                    <div class="text-center mb-6">
                        <div class="inline-block px-4 py-2 bg-village-primary/10 text-village-primary rounded-full text-sm font-semibold mb-3">
                            📤 BAGIKAN
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">Bagikan Foto</h3>
                    </div>
                    
                    <div class="space-y-3">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" 
                           target="_blank"
                           class="flex items-center w-full p-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-colors duration-300">
                            <i class="fab fa-facebook-f mr-3"></i>
                            <span class="font-medium">Facebook</span>
                        </a>
                        
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($galeri->judul) }}" 
                           target="_blank"
                           class="flex items-center w-full p-3 bg-blue-400 text-white rounded-xl hover:bg-blue-500 transition-colors duration-300">
                            <i class="fab fa-twitter mr-3"></i>
                            <span class="font-medium">Twitter</span>
                        </a>
                        
                        <a href="https://wa.me/?text={{ urlencode($galeri->judul . ' - ' . request()->fullUrl()) }}" 
                           target="_blank"
                           class="flex items-center w-full p-3 bg-green-500 text-white rounded-xl hover:bg-green-600 transition-colors duration-300">
                            <i class="fab fa-whatsapp mr-3"></i>
                            <span class="font-medium">WhatsApp</span>
                        </a>
                        
                        <button onclick="copyToClipboard()" 
                                class="flex items-center w-full p-3 bg-gray-600 text-white rounded-xl hover:bg-gray-700 transition-colors duration-300">
                            <i class="fas fa-copy mr-3"></i>
                            <span class="font-medium">Salin Link</span>
                        </button>
                    </div>
                </div>

                <!-- Related Photos -->
                @if($related->count() > 0)
                    <div class="bg-white dark:bg-dark-300 rounded-2xl shadow-lg p-6">
                        <div class="text-center mb-6">
                            <div class="inline-block px-4 py-2 bg-village-primary/10 text-village-primary rounded-full text-sm font-semibold mb-3">
                                🖼️ FOTO TERKAIT
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">{{ ucfirst($galeri->kategori) }} Lainnya</h3>
                        </div>
                        
                        <div class="space-y-4">
                            @foreach($related as $item)
                                <a href="{{ route('galeri.public.show', $item) }}" 
                                   class="block group">
                                    <div class="flex gap-3 p-3 bg-gray-50 dark:bg-dark-400 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors duration-300">
                                        <img src="{{ asset('storage/galeri/' . $item->gambar) }}" 
                                             alt="{{ $item->judul }}"
                                             class="w-16 h-16 object-cover rounded-lg group-hover:scale-105 transition-transform duration-300">
                                        <div class="flex-1">
                                            <h4 class="font-semibold text-gray-900 dark:text-white text-sm line-clamp-2 group-hover:text-village-primary">
                                                {{ $item->judul }}
                                            </h4>
                                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                                {{ $item->formatted_tanggal_foto }}
                                            </p>
                                        </div>
                                        <div class="self-center">
                                            <i class="fas fa-arrow-right text-gray-400 group-hover:text-village-primary text-sm"></i>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                        
                        <div class="mt-4 text-center">
                            <a href="{{ route('galeri.public', ['kategori' => $galeri->kategori]) }}" 
                               class="inline-flex items-center px-4 py-2 text-village-primary hover:text-village-secondary font-medium text-sm">
                                Lihat Semua {{ ucfirst($galeri->kategori) }}
                                <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                @endif
            </aside>
        </div>
    </div>
</section>

<!-- Image Modal -->
<div id="imageModal" class="fixed inset-0 bg-black/90 z-50 hidden flex items-center justify-center p-4">
    <div class="relative max-w-4xl max-h-full">
        <button onclick="closeImageModal()" 
                class="absolute -top-12 right-0 text-white hover:text-gray-300 text-xl">
            <i class="fas fa-times"></i>
        </button>
        <img id="modalImage" src="" alt="" class="max-w-full max-h-full object-contain rounded-lg">
    </div>
</div>

<script>
function openImageModal(src) {
    document.getElementById('modalImage').src = src;
    document.getElementById('imageModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeImageModal() {
    document.getElementById('imageModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
}

function copyToClipboard() {
    navigator.clipboard.writeText(window.location.href).then(() => {
        alert('Link berhasil disalin ke clipboard!');
    });
}

// Close modal with Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeImageModal();
    }
});

// Close modal when clicking outside image
document.getElementById('imageModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeImageModal();
    }
});
</script>
@endsection
