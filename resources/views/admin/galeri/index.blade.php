@extends('layouts.admin')

@section('page-title', 'Manajemen Galeri')

@section('content')
<div class="p-4 md:p-6 bg-gray-50 min-h-screen">
    <!-- Header Section -->
    <div class="mb-6 md:mb-8">
        <div class="flex flex-col gap-4">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-900 flex items-center gap-2 md:gap-3">
                    <div class="w-8 h-8 md:w-10 md:h-10 bg-gradient-to-r from-emerald-500 to-teal-600 rounded-lg md:rounded-xl flex items-center justify-center">
                        <i class="fas fa-images text-white text-sm md:text-base"></i>
                    </div>
                    <span class="hidden sm:inline">Manajemen Galeri</span>
                    <span class="sm:hidden">Galeri</span>
                </h1>
                <nav class="flex items-center space-x-2 text-sm text-gray-600 mt-2">
                    <a href="{{ route('admin.dashboard') }}" class="hover:text-emerald-600 transition-colors duration-200">
                        <i class="fas fa-home"></i>
                        Dashboard
                    </a>
                    <i class="fas fa-chevron-right text-gray-400"></i>
                    <span class="text-gray-800 font-medium">Galeri</span>
                </nav>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.galeri.create') }}" 
                   class="inline-flex items-center px-3 md:px-4 py-2 bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-medium rounded-lg hover:from-emerald-700 hover:to-teal-700 transition-all duration-200 shadow-lg hover:shadow-xl text-sm md:text-base">
                    <i class="fas fa-plus mr-2"></i>
                    <span class="hidden sm:inline">Tambah Foto</span>
                    <span class="sm:hidden">Tambah</span>
                </a>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-4 md:mb-6 p-3 md:p-4 bg-green-50 border border-green-200 rounded-lg flex items-center gap-3">
            <div class="w-6 h-6 md:w-8 md:h-8 bg-green-500 rounded-full flex items-center justify-center">
                <i class="fas fa-check text-white text-xs md:text-sm"></i>
            </div>
            <span class="text-green-800 font-medium text-sm md:text-base">{{ session('success') }}</span>
        </div>
    @endif

    @if(session('error'))
        <div class="mb-4 md:mb-6 p-3 md:p-4 bg-red-50 border border-red-200 rounded-lg flex items-center gap-3">
            <div class="w-6 h-6 md:w-8 md:h-8 bg-red-500 rounded-full flex items-center justify-center">
                <i class="fas fa-exclamation-triangle text-white text-xs md:text-sm"></i>
            </div>
            <span class="text-red-800 font-medium text-sm md:text-base">{{ session('error') }}</span>
        </div>
    @endif

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-white/20 p-6 hover:transform hover:scale-105 transition-all duration-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 mb-1">Total Foto</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $totalGaleri }}</p>
                </div>
                <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-cyan-600 rounded-xl flex items-center justify-center">
                    <i class="fas fa-images text-white text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-white/20 p-6 hover:transform hover:scale-105 transition-all duration-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 mb-1">Foto Aktif</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $galeriAktif }}</p>
                </div>
                <div class="w-12 h-12 bg-gradient-to-r from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center">
                    <i class="fas fa-eye text-white text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-white/20 p-6 hover:transform hover:scale-105 transition-all duration-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 mb-1">Foto Tidak Aktif</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $galeriTidakAktif }}</p>
                </div>
                <div class="w-12 h-12 bg-gradient-to-r from-red-500 to-pink-600 rounded-xl flex items-center justify-center">
                    <i class="fas fa-eye-slash text-white text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-white/20 p-6 mb-8">
        <h3 class="text-lg font-semibold text-gray-900 flex items-center gap-2 mb-4">
            <i class="fas fa-filter text-emerald-600"></i>
            Filter Galeri
        </h3>
        <form method="GET" action="{{ route('admin.galeri.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label for="kategori" class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                <select name="kategori" id="kategori" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-200">
                    <option value="">Semua Kategori</option>
                    @foreach($kategoris as $kategori)
                        <option value="{{ $kategori }}" {{ request('kategori') == $kategori ? 'selected' : '' }}>
                            {{ ucfirst($kategori) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                <select name="status" id="status" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-200">
                    <option value="">Semua Status</option>
                    <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="tidak_aktif" {{ request('status') == 'tidak_aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                </select>
            </div>
            <div>
                <label for="search" class="block text-sm font-medium text-gray-700 mb-2">Pencarian</label>
                <input type="text" name="search" id="search" placeholder="Cari judul foto..." value="{{ request('search') }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-200">
            </div>
            <div class="flex items-end gap-2">
                <button type="submit" class="flex-1 px-4 py-2 bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-medium rounded-lg hover:from-emerald-700 hover:to-teal-700 transition-all duration-200 shadow-lg hover:shadow-xl">
                    <i class="fas fa-search mr-2"></i>Filter
                </button>
                <a href="{{ route('admin.galeri.index') }}" class="px-4 py-2 bg-gray-500 text-white font-medium rounded-lg hover:bg-gray-600 transition-all duration-200">
                    <i class="fas fa-refresh"></i>
                </a>
            </div>
        </form>
    </div>

    <!-- Gallery Grid -->
    <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-white/20 overflow-hidden">
        <div class="px-6 py-4 bg-gradient-to-r from-emerald-600 to-teal-600">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <h3 class="text-lg font-semibold text-white flex items-center gap-2">
                    <i class="fas fa-images"></i>
                    Daftar Foto ({{ $galeris->total() }} foto)
                </h3>
                @if($galeris->count() > 0)
                    <form method="POST" action="{{ route('admin.galeri.bulk-delete') }}" id="bulkDeleteForm">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="px-4 py-2 bg-red-500 text-white font-medium rounded-lg hover:bg-red-600 transition-all duration-200 shadow-lg hover:shadow-xl" id="bulkDeleteBtn" style="display: none;">
                            <i class="fas fa-trash mr-2"></i>Hapus Terpilih
                        </button>
                    </form>
                @endif
            </div>
        </div>

        @if($galeris->count() > 0)
            <div class="p-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($galeris as $galeri)
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200 hover:shadow-xl transition-all duration-300 hover:scale-105">
                            <div class="relative">
                                @if($galeri->gambar && file_exists(public_path('storage/galeri/' . $galeri->gambar)))
                                    <img src="{{ asset('storage/galeri/' . $galeri->gambar) }}" 
                                         alt="{{ $galeri->judul }}" 
                                         class="w-full h-48 object-cover">
                                @else
                                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                        <div class="text-center">
                                            <i class="fas fa-image text-gray-400 text-3xl mb-2"></i>
                                            <p class="text-gray-500 text-sm">Gambar tidak tersedia</p>
                                            @if($galeri->gambar)
                                                <p class="text-red-500 text-xs">File: {{ $galeri->gambar }}</p>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                                
                                <!-- Checkbox -->
                                <div class="absolute top-3 left-3">
                                    <input type="checkbox" name="galeri_ids[]" value="{{ $galeri->id }}" 
                                           class="gallery-checkbox w-4 h-4 text-emerald-600 bg-white border-gray-300 rounded focus:ring-emerald-500">
                                </div>
                                
                                <!-- Status Badge -->
                                <div class="absolute top-3 right-3">
                                    @if($galeri->status)
                                        <span class="px-2 py-1 bg-green-500 text-white text-xs font-medium rounded-full">
                                            Aktif
                                        </span>
                                    @else
                                        <span class="px-2 py-1 bg-red-500 text-white text-xs font-medium rounded-full">
                                            Tidak Aktif
                                        </span>
                                    @endif
                                </div>
                                
                                <!-- Category Tag -->
                                <div class="absolute bottom-3 left-3">
                                    <span class="px-2 py-1 bg-blue-500 text-white text-xs font-medium rounded-full">
                                        {{ ucfirst($galeri->kategori) }}
                                    </span>
                                </div>
                            </div>
                            
                            <div class="p-4">
                                <h4 class="font-semibold text-gray-900 text-sm mb-2 line-clamp-2">{{ $galeri->judul }}</h4>
                                <div class="text-xs text-gray-600 mb-3">
                                    <div class="mb-1">
                                        <i class="fas fa-calendar mr-1"></i>
                                        {{ $galeri->created_at->format('d M Y') }}
                                    </div>
                                    @if($galeri->creator)
                                        <div>
                                            <i class="fas fa-user mr-1"></i>
                                            {{ $galeri->creator->name }}
                                        </div>
                                    @endif
                                </div>
                                
                                @if($galeri->deskripsi)
                                    <p class="text-gray-600 text-xs mb-3 line-clamp-2">{{ $galeri->deskripsi }}</p>
                                @endif
                                
                                <div class="flex gap-1">
                                    <a href="{{ route('admin.galeri.show', $galeri) }}" 
                                       class="flex-1 px-2 py-1.5 bg-blue-500 text-white text-xs font-medium rounded hover:bg-blue-600 transition-colors duration-200 text-center">
                                        <i class="fas fa-eye mr-1"></i>Lihat
                                    </a>
                                    <a href="{{ route('admin.galeri.edit', $galeri) }}" 
                                       class="flex-1 px-2 py-1.5 bg-yellow-500 text-white text-xs font-medium rounded hover:bg-yellow-600 transition-colors duration-200 text-center">
                                        <i class="fas fa-edit mr-1"></i>Edit
                                    </a>
                                    <form method="POST" action="{{ route('admin.galeri.destroy', $galeri) }}" 
                                          class="flex-1" onsubmit="return confirm('Yakin ingin menghapus foto ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-full px-2 py-1.5 bg-red-500 text-white text-xs font-medium rounded hover:bg-red-600 transition-colors duration-200">
                                            <i class="fas fa-trash mr-1"></i>Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-6 flex justify-center">
                    {{ $galeris->withQueryString()->links() }}
                </div>
            </div>
        @else
            <div class="p-12 text-center">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-images text-gray-400 text-2xl"></i>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada foto</h3>
                <p class="text-gray-600 mb-4">Tambahkan foto pertama Anda sekarang!</p>
                <a href="{{ route('admin.galeri.create') }}" 
                   class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-medium rounded-lg hover:from-emerald-700 hover:to-teal-700 transition-all duration-200 shadow-lg hover:shadow-xl">
                    <i class="fas fa-plus mr-2"></i>Tambah Foto
                </a>
            </div>
        @endif
    </div>
</div>

<script>
// Simple bulk delete functionality with modern approach
document.addEventListener('DOMContentLoaded', function() {
    const checkboxes = document.querySelectorAll('.gallery-checkbox');
    const bulkBtn = document.getElementById('bulkDeleteBtn');
    const bulkForm = document.getElementById('bulkDeleteForm');
    
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const checkedBoxes = document.querySelectorAll('.gallery-checkbox:checked');
            if (bulkBtn) {
                bulkBtn.style.display = checkedBoxes.length > 0 ? 'block' : 'none';
            }
        });
    });
    
    if (bulkBtn) {
        bulkBtn.addEventListener('click', function() {
            const checkedBoxes = document.querySelectorAll('.gallery-checkbox:checked');
            if (checkedBoxes.length > 0 && confirm('Yakin ingin menghapus ' + checkedBoxes.length + ' foto terpilih?')) {
                checkedBoxes.forEach(checkbox => {
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'galeri_ids[]';
                    input.value = checkbox.value;
                    bulkForm.appendChild(input);
                });
                bulkForm.submit();
            }
        });
    }
});
</script>
@endsection
