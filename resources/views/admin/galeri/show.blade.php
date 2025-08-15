@extends('layouts.admin')

@section('page-title', 'Detail Foto Galeri')

@section('content')
<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Detail Foto Galeri</h1>
        <nav class="flex items-center space-x-2 text-sm text-gray-600 mt-1">
            <a href="{{ route('admin.dashboard') }}" class="hover:text-blue-600">Dashboard</a>
            <span>/</span>
            <a href="{{ route('admin.galeri.index') }}" class="hover:text-blue-600">Galeri</a>
            <span>/</span>
            <span class="text-gray-400">Detail</span>
        </nav>
    </div>
    <div class="flex space-x-2">
        <a href="{{ route('admin.galeri.edit', $galeri) }}" class="inline-flex items-center px-3 py-2 bg-yellow-500 text-white text-sm font-medium rounded-lg hover:bg-yellow-600 transition-colors">
            <i class="fas fa-edit mr-2"></i> Edit
        </a>
        <a href="{{ route('galeri.public.show', $galeri) }}" target="_blank" class="inline-flex items-center px-3 py-2 bg-blue-500 text-white text-sm font-medium rounded-lg hover:bg-blue-600 transition-colors">
            <i class="fas fa-external-link-alt mr-2"></i> Lihat Publik
        </a>
        <a href="{{ route('admin.galeri.index') }}" class="inline-flex items-center px-3 py-2 bg-gray-500 text-white text-sm font-medium rounded-lg hover:bg-gray-600 transition-colors">
            <i class="fas fa-arrow-left mr-2"></i> Kembali
        </a>
    </div>
</div>

<!-- Content Body -->
<div class="bg-white rounded-lg shadow-sm border border-gray-200">
    <!-- Card Header -->
    <div class="px-6 py-4 bg-gradient-to-r from-blue-500 to-purple-600 border-b border-gray-200 rounded-t-lg">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-white">{{ $galeri->judul }}</h2>
            <div class="flex items-center space-x-2">
                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium
                    {{ $galeri->kategori == 'kegiatan' ? 'bg-blue-100 text-blue-800' : 
                       ($galeri->kategori == 'pembangunan' ? 'bg-green-100 text-green-800' : 
                       ($galeri->kategori == 'acara' ? 'bg-purple-100 text-purple-800' : 
                       ($galeri->kategori == 'fasilitas' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800'))) }}">
                    {{ ucfirst($galeri->kategori) }}
                </span>
                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium
                    {{ $galeri->status ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                    {{ $galeri->status ? 'Aktif' : 'Tidak Aktif' }}
                </span>
                @if($galeri->is_featured)
                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                        <i class="fas fa-star mr-1"></i> Unggulan
                    </span>
                @endif
            </div>
        </div>
    </div>

    <!-- Card Body -->
    <div class="p-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <!-- Image Container -->
                <div class="mb-6 bg-gray-50 rounded-lg p-4">
                    <div class="aspect-w-16 aspect-h-9 rounded-lg overflow-hidden shadow-lg">
                        <img src="{{ asset('storage/galeri/' . $galeri->gambar) }}" 
                             alt="{{ $galeri->judul }}"
                             class="w-full h-96 object-cover">
                    </div>
                </div>
                
                @if($galeri->deskripsi)
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">Deskripsi</h3>
                        <p class="text-gray-700 leading-relaxed">{{ $galeri->deskripsi }}</p>
                    </div>
                @endif
            </div>
            
            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Info Card -->
                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-lg p-4 border border-blue-200">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                        <i class="fas fa-info-circle text-blue-500 mr-2"></i>
                        Informasi Foto
                    </h3>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-sm font-medium text-gray-600">Judul:</span>
                            <span class="text-sm text-gray-900 text-right">{{ $galeri->judul }}</span>
                        </div>
                        
                        <div class="flex justify-between">
                            <span class="text-sm font-medium text-gray-600">Kategori:</span>
                            <span class="text-sm text-gray-900">{{ ucfirst($galeri->kategori) }}</span>
                        </div>

                        @if($galeri->tanggal_foto)
                            <div class="flex justify-between">
                                <span class="text-sm font-medium text-gray-600">Tanggal Foto:</span>
                                <span class="text-sm text-gray-900 text-right">{{ $galeri->formatted_tanggal_foto }}</span>
                            </div>
                        @endif

                        @if($galeri->lokasi)
                            <div class="flex justify-between">
                                <span class="text-sm font-medium text-gray-600">Lokasi:</span>
                                <span class="text-sm text-gray-900 text-right">{{ $galeri->lokasi }}</span>
                            </div>
                        @endif

                        @if($galeri->fotografer)
                            <div class="flex justify-between">
                                <span class="text-sm font-medium text-gray-600">Fotografer:</span>
                                <span class="text-sm text-gray-900 text-right">{{ $galeri->fotografer }}</span>
                            </div>
                        @endif

                        <div class="flex justify-between">
                            <span class="text-sm font-medium text-gray-600">Urutan:</span>
                            <span class="text-sm text-gray-900">{{ $galeri->urutan }}</span>
                        </div>

                        <div class="flex justify-between">
                            <span class="text-sm font-medium text-gray-600">Status:</span>
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium
                                {{ $galeri->status ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                {{ $galeri->status ? 'Aktif' : 'Tidak Aktif' }}
                            </span>
                        </div>

                        <div class="flex justify-between">
                            <span class="text-sm font-medium text-gray-600">Foto Unggulan:</span>
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium
                                {{ $galeri->is_featured ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800' }}">
                                {{ $galeri->is_featured ? 'Ya' : 'Tidak' }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Meta Info Card -->
                <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-lg p-4 border border-purple-200">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                        <i class="fas fa-clock text-purple-500 mr-2"></i>
                        Meta Informasi
                    </h3>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-sm font-medium text-gray-600">Dibuat oleh:</span>
                            <span class="text-sm text-gray-900">{{ $galeri->creator->name ?? 'Administrator' }}</span>
                        </div>

                        <div class="flex justify-between">
                            <span class="text-sm font-medium text-gray-600">Tanggal Upload:</span>
                            <span class="text-sm text-gray-900 text-right">{{ $galeri->created_at->format('d F Y, H:i') }}</span>
                        </div>

                        <div class="flex justify-between">
                            <span class="text-sm font-medium text-gray-600">Terakhir Diupdate:</span>
                            <span class="text-sm text-gray-900 text-right">{{ $galeri->updated_at->format('d F Y, H:i') }}</span>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-lg p-4 border border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                        <i class="fas fa-cogs text-gray-500 mr-2"></i>
                        Aksi
                    </h3>
                    <div class="space-y-3">
                        <a href="{{ route('admin.galeri.edit', $galeri) }}" 
                           class="w-full inline-flex items-center justify-center px-4 py-2 bg-yellow-500 text-white text-sm font-medium rounded-lg hover:bg-yellow-600 transition-colors">
                            <i class="fas fa-edit mr-2"></i> Edit Foto
                        </a>
                        <a href="{{ route('galeri.public.show', $galeri) }}" target="_blank"
                           class="w-full inline-flex items-center justify-center px-4 py-2 bg-blue-500 text-white text-sm font-medium rounded-lg hover:bg-blue-600 transition-colors">
                            <i class="fas fa-external-link-alt mr-2"></i> Lihat di Frontend
                        </a>
                        <form action="{{ route('admin.galeri.destroy', $galeri) }}" 
                              method="POST" 
                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="w-full inline-flex items-center justify-center px-4 py-2 bg-red-500 text-white text-sm font-medium rounded-lg hover:bg-red-600 transition-colors">
                                <i class="fas fa-trash mr-2"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
