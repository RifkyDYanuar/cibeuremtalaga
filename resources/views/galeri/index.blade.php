@extends('layouts.public')

@section('title', 'Galeri Foto - SiDesa Cibeureum')

@section('content')
<!-- Page Header -->
<section class="relative min-h-[60vh] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-village-primary via-village-secondary to-village-accent"></div>
    <div class="absolute inset-0 bg-black/40 backdrop-blur-[1px]"></div>
    <div class="absolute inset-0 bg-[url('{{ asset('images/cibeureum.jpg') }}')] bg-cover bg-center opacity-20"></div>
    
    <div class="relative z-10 text-center text-white px-4 max-w-4xl mx-auto">
        <div class="animate-fadeIn">
            <span class="inline-block px-6 py-2 bg-white/20 backdrop-blur-md rounded-full text-sm font-semibold mb-4 border border-white/30">
                <i class="fas fa-images mr-2"></i>
                GALERI FOTO
            </span>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-black mb-8 leading-tight hero-text">
                Dokumentasi
                <span class="block text-village-accent">Kegiatan Desa</span>
            </h1>
        </div>
        <div class="animate-slideUp" style="animation-delay: 0.3s;">
            <p class="text-lg md:text-xl opacity-95 max-w-2xl mx-auto leading-relaxed">
                Kumpulan foto dan dokumentasi kegiatan, pembangunan, dan kehidupan sehari-hari masyarakat Desa Cibeureum
            </p>
        </div>
    </div>
</section>

<!-- Galeri Content -->
<section class="py-20 bg-gradient-to-br from-gray-50 to-white dark:from-dark-100 dark:to-dark-200 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4">
        
        <!-- Featured Photos -->
        @if($featured->count() > 0)
            <div class="mb-16">
                <div class="text-center mb-12">
                    <div class="inline-block px-4 py-2 bg-village-primary/10 text-village-primary rounded-full text-sm font-semibold mb-3">
                        ⭐ FOTO UNGGULAN
                    </div>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">Galeri Pilihan</h2>
                    <p class="text-gray-600 dark:text-gray-400 mt-4 max-w-2xl mx-auto">
                        Koleksi foto terbaik yang memperlihatkan keindahan dan aktivitas Desa Cibeureum
                    </p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($featured as $foto)
                        <div class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                            <div class="aspect-w-16 aspect-h-12 bg-gray-200 dark:bg-gray-700">
                                <img src="{{ asset('storage/galeri/' . $foto->gambar) }}" 
                                     alt="{{ $foto->judul }}"
                                     class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="absolute bottom-0 left-0 right-0 p-6 text-white transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                                <div class="mb-2">
                                    <span class="inline-block px-3 py-1 bg-village-primary rounded-full text-xs font-semibold">
                                        {{ ucfirst($foto->kategori) }}
                                    </span>
                                </div>
                                <h3 class="text-lg font-bold mb-2">{{ $foto->judul }}</h3>
                                @if($foto->deskripsi)
                                    <p class="text-sm opacity-90 line-clamp-2">{{ Str::limit($foto->deskripsi, 80) }}</p>
                                @endif
                                <div class="mt-3 flex items-center justify-between">
                                    <span class="text-xs opacity-75">{{ $foto->formatted_tanggal_foto }}</span>
                                    <a href="{{ route('galeri.public.show', $foto) }}" 
                                       class="inline-flex items-center px-3 py-1 bg-white/20 backdrop-blur-md rounded-full text-xs font-medium hover:bg-white/30 transition-colors">
                                        Lihat Detail <i class="fas fa-arrow-right ml-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Filter & Search -->
        <div class="mb-8">
            <div class="bg-white dark:bg-dark-300 rounded-2xl shadow-lg p-6">
                <form method="GET" class="space-y-4 md:space-y-0 md:flex md:items-center md:space-x-4">
                    <!-- Search -->
                    <div class="flex-1">
                        <div class="relative">
                            <input type="text" 
                                   name="search" 
                                   value="{{ $search }}"
                                   placeholder="Cari foto berdasarkan judul, deskripsi, atau lokasi..."
                                   class="w-full pl-12 pr-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-village-primary focus:border-transparent dark:bg-dark-400 dark:text-white">
                            <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>
                    </div>
                    
                    <!-- Category Filter -->
                    <div class="md:w-64">
                        <select name="kategori" 
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-village-primary focus:border-transparent dark:bg-dark-400 dark:text-white">
                            <option value="">Semua Kategori</option>
                            @foreach($kategoriOptions as $key => $label)
                                <option value="{{ $key }}" {{ $kategori == $key ? 'selected' : '' }}>
                                    {{ $label }} ({{ $kategoriCounts[$key] }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <!-- Submit Button -->
                    <button type="submit" 
                            class="w-full md:w-auto px-6 py-3 bg-gradient-to-r from-village-primary to-village-secondary text-white rounded-xl hover:from-village-secondary hover:to-village-primary transition-all duration-300 font-semibold">
                        <i class="fas fa-filter mr-2"></i>
                        Filter
                    </button>
                </form>
            </div>
        </div>

        <!-- Results Info -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div class="text-gray-600 dark:text-gray-400">
                    @if($search || $kategori)
                        <p>
                            Menampilkan {{ $galeris->total() }} foto
                            @if($search)
                                untuk pencarian "<strong>{{ $search }}</strong>"
                            @endif
                            @if($kategori)
                                dalam kategori "<strong>{{ $kategoriOptions[$kategori] }}</strong>"
                            @endif
                        </p>
                        <a href="{{ route('galeri.public') }}" class="text-village-primary hover:text-village-secondary font-medium">
                            <i class="fas fa-times mr-1"></i>Hapus filter
                        </a>
                    @else
                        <p>Menampilkan {{ $galeris->total() }} foto dari galeri desa</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Photo Grid -->
        @if($galeris->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-12">
                @foreach($galeris as $foto)
                    <div class="group relative overflow-hidden rounded-xl shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                        <div class="aspect-w-4 aspect-h-3 bg-gray-200 dark:bg-gray-700">
                            <img src="{{ asset('storage/galeri/' . $foto->gambar) }}" 
                                 alt="{{ $foto->judul }}"
                                 class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="absolute top-3 left-3">
                            <span class="inline-block px-2 py-1 bg-village-primary text-white rounded-full text-xs font-semibold">
                                {{ ucfirst($foto->kategori) }}
                            </span>
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 p-4 text-white transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                            <h3 class="font-bold text-sm mb-1 line-clamp-2">{{ $foto->judul }}</h3>
                            <div class="flex items-center justify-between">
                                <span class="text-xs opacity-90">{{ $foto->formatted_tanggal_foto }}</span>
                                <a href="{{ route('galeri.public.show', $foto) }}" 
                                   class="inline-flex items-center px-2 py-1 bg-white/20 backdrop-blur-md rounded-full text-xs hover:bg-white/30 transition-colors">
                                    Detail <i class="fas fa-eye ml-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="flex justify-center">
                {{ $galeris->appends(request()->query())->links() }}
            </div>
        @else
            <!-- No Results -->
            <div class="text-center py-16">
                <div class="mx-auto w-24 h-24 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-images text-gray-400 text-3xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Tidak Ada Foto</h3>
                <p class="text-gray-600 dark:text-gray-400 mb-6">
                    @if($search || $kategori)
                        Tidak ditemukan foto yang sesuai dengan filter yang dipilih.
                    @else
                        Belum ada foto yang tersedia di galeri.
                    @endif
                </p>
                @if($search || $kategori)
                    <a href="{{ route('galeri.public') }}" 
                       class="inline-flex items-center px-6 py-3 bg-village-primary text-white rounded-xl hover:bg-village-secondary transition-colors">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Lihat Semua Foto
                    </a>
                @endif
            </div>
        @endif
    </div>
</section>
@endsection
