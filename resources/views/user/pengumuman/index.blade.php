@extends('layouts.user')

@section('page-title', 'Pengumuman Desa')

@section('content')
<!-- Header dengan Gradient Background -->
<div class="bg-gradient-to-br from-village-primary to-village-secondary text-white rounded-xl p-6 mb-6">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold mb-2">📢 Pengumuman Desa</h1>
            <p class="text-village-primary-100 text-sm md:text-base">Informasi dan pengumuman terkini dari Desa Cibeureum</p>
        </div>
        <div class="mt-4 md:mt-0">
            <div class="flex items-center space-x-2 text-village-primary-100">
                <i class="fas fa-bell text-yellow-300"></i>
                <span class="text-sm">Selalu update dengan informasi terbaru</span>
            </div>
        </div>
    </div>
</div>

<div class="content-body">
<!-- Filter Section -->
<div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6 mb-6">
    <form method="GET" action="{{ route('user.pengumuman.index') }}" class="space-y-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <!-- Kategori Filter -->
            <div>
                <label for="kategori" class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-tag text-village-primary mr-2"></i>Kategori
                </label>
                <select name="kategori" id="kategori" class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent transition-all duration-200">
                    <option value="">Semua Kategori</option>
                    <option value="umum" {{ request('kategori') == 'umum' ? 'selected' : '' }}>Umum</option>
                    <option value="penting" {{ request('kategori') == 'penting' ? 'selected' : '' }}>Penting</option>
                    <option value="kegiatan" {{ request('kategori') == 'kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                    <option value="pelayanan" {{ request('kategori') == 'pelayanan' ? 'selected' : '' }}>Pelayanan</option>
                    <option value="pembangunan" {{ request('kategori') == 'pembangunan' ? 'selected' : '' }}>Pembangunan</option>
                </select>
            </div>
            
            <!-- Search Filter -->
            <div class="md:col-span-2">
                <label for="search" class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-search text-village-primary mr-2"></i>Cari Pengumuman
                </label>
                <div class="relative">
                    <input type="text" name="search" id="search" 
                           placeholder="Cari judul pengumuman..." 
                           value="{{ request('search') }}" 
                           class="w-full px-4 py-3 pr-12 border border-gray-200 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent transition-all duration-200">
                    <button type="submit" class="absolute right-2 top-1/2 transform -translate-y-1/2 text-village-primary hover:text-village-secondary transition-colors">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-3 pt-4 border-t border-gray-100">
            <button type="submit" class="flex items-center justify-center px-6 py-3 bg-village-primary text-white rounded-lg hover:bg-village-secondary transition-all duration-200 transform hover:scale-105 shadow-lg">
                <i class="fas fa-search mr-2"></i>
                Cari Pengumuman
            </button>
            <a href="{{ route('user.pengumuman.index') }}" class="flex items-center justify-center px-6 py-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-all duration-200">
                <i class="fas fa-refresh mr-2"></i>
                Reset Filter
            </a>
        </div>
    </form>
</div>

    <!-- Featured Announcements -->
    @if($featuredAnnouncements->count() > 0)
        <div class="mb-8">
            <div class="flex items-center mb-6">
                <div class="flex items-center">
                    <div class="bg-yellow-100 p-3 rounded-lg mr-4">
                        <i class="fas fa-star text-yellow-600 text-xl"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-gray-800">Pengumuman Penting</h2>
                        <p class="text-gray-600 text-sm">Informasi prioritas yang perlu diketahui</p>
                    </div>
                </div>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                @foreach($featuredAnnouncements as $announcement)
                    <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                        @if($announcement->gambar)
                            <div class="relative h-48 overflow-hidden">
                                <img src="{{ asset('storage/' . $announcement->gambar) }}" alt="{{ $announcement->judul }}" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                                <div class="absolute top-4 left-4 flex gap-2">
                                    <span class="px-3 py-1 text-xs font-semibold rounded-full
                                        {{ $announcement->kategori == 'penting' ? 'bg-red-100 text-red-800' : 
                                           ($announcement->kategori == 'kegiatan' ? 'bg-blue-100 text-blue-800' : 'bg-village-primary-100 text-village-primary-800') }}">
                                        {{ ucfirst($announcement->kategori) }}
                                    </span>
                                    <span class="px-3 py-1 text-xs font-semibold rounded-full
                                        {{ $announcement->prioritas == 'tinggi' ? 'bg-red-100 text-red-800' : 
                                           ($announcement->prioritas == 'sedang' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800') }}">
                                        {{ ucfirst($announcement->prioritas) }}
                                    </span>
                                </div>
                            </div>
                        @endif
                        
                        <div class="p-6">
                            @if(!$announcement->gambar)
                                <div class="flex gap-2 mb-4">
                                    <span class="px-3 py-1 text-xs font-semibold rounded-full
                                        {{ $announcement->kategori == 'penting' ? 'bg-red-100 text-red-800' : 
                                           ($announcement->kategori == 'kegiatan' ? 'bg-blue-100 text-blue-800' : 'bg-village-primary-100 text-village-primary-800') }}">
                                        {{ ucfirst($announcement->kategori) }}
                                    </span>
                                    <span class="px-3 py-1 text-xs font-semibold rounded-full
                                        {{ $announcement->prioritas == 'tinggi' ? 'bg-red-100 text-red-800' : 
                                           ($announcement->prioritas == 'sedang' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800') }}">
                                        {{ ucfirst($announcement->prioritas) }}
                                    </span>
                                </div>
                            @endif
                            
                            <h3 class="text-lg font-bold text-gray-800 mb-3 line-clamp-2">{{ $announcement->judul }}</h3>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ Str::limit($announcement->konten, 120) }}</p>
                            
                            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                <div class="flex items-center text-gray-500 text-sm">
                                    <i class="fas fa-calendar mr-2"></i>
                                    {{ $announcement->tanggal_mulai->format('d/m/Y') }}
                                </div>
                                <a href="{{ route('user.pengumuman.show', $announcement) }}" 
                                   class="inline-flex items-center px-4 py-2 bg-village-primary text-white text-sm font-medium rounded-lg hover:bg-village-secondary transition-all duration-200 transform hover:scale-105">
                                    Baca Selengkapnya
                                    <i class="fas fa-arrow-right ml-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <!-- Regular Announcements -->
    <div>
        <div class="flex items-center mb-6">
            <div class="flex items-center">
                <div class="bg-village-primary-100 p-3 rounded-lg mr-4">
                    <i class="fas fa-bullhorn text-village-primary text-xl"></i>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-gray-800">Semua Pengumuman</h2>
                    <p class="text-gray-600 text-sm">Informasi terbaru dari Desa Cibeureum</p>
                </div>
            </div>
        </div>
        
        @if($announcements->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 mb-8">
                @foreach($announcements as $announcement)
                    <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                        <!-- Card Header -->
                        <div class="bg-gradient-to-r from-gray-50 to-gray-100 p-4 border-b border-gray-200">
                            <div class="flex gap-2 mb-3">
                                <span class="px-3 py-1 text-xs font-semibold rounded-full
                                    {{ $announcement->kategori == 'penting' ? 'bg-red-100 text-red-800' : 
                                       ($announcement->kategori == 'kegiatan' ? 'bg-blue-100 text-blue-800' : 'bg-village-primary-100 text-village-primary-800') }}">
                                    {{ ucfirst($announcement->kategori) }}
                                </span>
                                <span class="px-3 py-1 text-xs font-semibold rounded-full
                                    {{ $announcement->prioritas == 'tinggi' ? 'bg-red-100 text-red-800' : 
                                       ($announcement->prioritas == 'sedang' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800') }}">
                                    {{ ucfirst($announcement->prioritas) }}
                                </span>
                            </div>
                            <h3 class="text-lg font-bold text-gray-800 line-clamp-2">{{ $announcement->judul }}</h3>
                        </div>
                        
                        <!-- Card Body -->
                        <div class="p-4">
                            @if($announcement->gambar)
                                <div class="mb-4">
                                    <div class="relative h-40 rounded-lg overflow-hidden">
                                        <img src="{{ asset('storage/' . $announcement->gambar) }}" alt="{{ $announcement->judul }}" class="w-full h-full object-cover">
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                                    </div>
                                </div>
                            @endif
                            <p class="text-gray-600 text-sm line-clamp-3 mb-4">{{ Str::limit($announcement->konten, 150) }}</p>
                        </div>
                        
                        <!-- Card Footer -->
                        <div class="bg-gray-50 p-4 border-t border-gray-200">
                            <div class="flex items-center justify-between">
                                <div class="space-y-1">
                                    <div class="flex items-center text-gray-500 text-xs">
                                        <i class="fas fa-calendar mr-2"></i>
                                        {{ $announcement->tanggal_mulai->format('d/m/Y') }}
                                    </div>
                                    @if($announcement->tanggal_selesai)
                                        <div class="flex items-center text-gray-500 text-xs">
                                            <i class="fas fa-calendar-times mr-2"></i>
                                            {{ $announcement->tanggal_selesai->format('d/m/Y') }}
                                        </div>
                                    @endif
                                </div>
                                <a href="{{ route('user.pengumuman.show', $announcement) }}" 
                                   class="inline-flex items-center px-3 py-2 bg-village-primary text-white text-xs font-medium rounded-lg hover:bg-village-secondary transition-all duration-200 transform hover:scale-105">
                                    <i class="fas fa-eye mr-2"></i>
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="flex justify-center">
                {{ $announcements->links() }}
            </div>
        @else
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-12 text-center">
                <div class="max-w-md mx-auto">
                    <div class="bg-gray-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-bullhorn text-gray-400 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Tidak ada pengumuman</h3>
                    <p class="text-gray-600 mb-6">Belum ada pengumuman yang tersedia saat ini. Silakan cek kembali nanti untuk informasi terbaru.</p>
                    <a href="{{ route('user.pengumuman.index') }}" 
                       class="inline-flex items-center px-6 py-3 bg-village-primary text-white font-medium rounded-lg hover:bg-village-secondary transition-all duration-200">
                        <i class="fas fa-refresh mr-2"></i>
                        Muat Ulang
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>

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
@endsection
