@extends('layouts.admin')

@section('page-title', 'Manajemen Pengumuman')

@section('content')
<div class="p-3 md:p-6">
    <!-- Header Section -->
    <div class="mb-4 md:mb-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
            <div>
                <h1 class="text-xl md:text-2xl font-bold text-gray-900 flex items-center gap-2">
                    <div class="w-6 h-6 md:w-8 md:h-8 bg-gradient-to-r from-emerald-500 to-teal-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-bullhorn text-white text-xs md:text-sm"></i>
                    </div>
                    <span class="hidden sm:inline">Pengumuman</span>
                    <span class="sm:hidden">Pengumuman</span>
                </h1>
                <p class="text-xs md:text-sm text-gray-600 mt-1 hidden sm:block">Kelola pengumuman desa</p>
            </div>
            <a href="{{ route('admin.pengumuman.create') }}" 
               class="inline-flex items-center px-3 md:px-4 py-2 bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-medium rounded-lg hover:from-emerald-700 hover:to-teal-700 transition-all duration-200 text-xs md:text-sm">
                <i class="fas fa-plus mr-1 md:mr-2"></i>
                <span class="hidden sm:inline">Tambah</span>
                <span class="sm:hidden">+</span>
            </a>
        </div>
    </div>

    <!-- Filter Section - Mobile Optimized -->
    <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-lg border border-white/20 mb-4 md:mb-6 overflow-hidden">
        <div class="px-3 md:px-4 py-2 md:py-3 bg-gradient-to-r from-emerald-600 to-teal-600">
            <h3 class="text-sm md:text-lg font-semibold text-white flex items-center gap-2">
                <i class="fas fa-filter text-xs md:text-base"></i>
                <span class="hidden sm:inline">Filter</span>
                <span class="sm:hidden">Filter</span>
            </h3>
        </div>
        <div class="p-3 md:p-4">
            <form method="GET" action="{{ route('admin.pengumuman.index') }}">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-2 md:gap-3">
                    <select name="kategori" class="w-full px-2 md:px-3 py-2 text-xs md:text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                        <option value="">Semua Kategori</option>
                        <option value="umum" {{ request('kategori') == 'umum' ? 'selected' : '' }}>Umum</option>
                        <option value="penting" {{ request('kategori') == 'penting' ? 'selected' : '' }}>Penting</option>
                        <option value="kegiatan" {{ request('kategori') == 'kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                        <option value="pembangunan" {{ request('kategori') == 'pembangunan' ? 'selected' : '' }}>Pembangunan</option>
                        <option value="kesehatan" {{ request('kategori') == 'kesehatan' ? 'selected' : '' }}>Kesehatan</option>
                        <option value="pendidikan" {{ request('kategori') == 'pendidikan' ? 'selected' : '' }}>Pendidikan</option>
                    </select>
                    <select name="prioritas" class="w-full px-2 md:px-3 py-2 text-xs md:text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                        <option value="">Semua Prioritas</option>
                        <option value="tinggi" {{ request('prioritas') == 'tinggi' ? 'selected' : '' }}>Tinggi</option>
                        <option value="sedang" {{ request('prioritas') == 'sedang' ? 'selected' : '' }}>Sedang</option>
                        <option value="rendah" {{ request('prioritas') == 'rendah' ? 'selected' : '' }}>Rendah</option>
                    </select>
                    <select name="status" class="w-full px-2 md:px-3 py-2 text-xs md:text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                        <option value="">Semua Status</option>
                        <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                        <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                    </select>
                    <div class="flex gap-2">
                        <button type="submit" class="flex-1 px-2 md:px-3 py-2 bg-gradient-to-r from-emerald-600 to-teal-600 text-white text-xs md:text-sm font-medium rounded-lg hover:from-emerald-700 hover:to-teal-700 transition-all duration-200">
                            <i class="fas fa-filter mr-1"></i> 
                            <span class="hidden sm:inline">Filter</span>
                        </button>
                        <a href="{{ route('admin.pengumuman.index') }}" class="px-2 md:px-3 py-2 bg-gray-500 text-white text-xs md:text-sm font-medium rounded-lg hover:bg-gray-600 transition-colors duration-200">
                            <i class="fas fa-refresh"></i>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-50 border border-green-200 rounded-lg flex items-center gap-2">
            <i class="fas fa-check text-green-600"></i>
            <span class="text-green-800 text-sm font-medium">{{ session('success') }}</span>
        </div>
    @endif

    <!-- Main Content -->
    <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-lg border border-white/20 overflow-hidden">
        <div class="px-3 md:px-4 py-2 md:py-3 bg-gradient-to-r from-emerald-600 to-teal-600">
            <div class="flex items-center justify-between">
                <h3 class="text-sm md:text-lg font-semibold text-white flex items-center gap-2">
                    <i class="fas fa-list text-xs md:text-base"></i>
                    <span class="hidden sm:inline">Daftar Pengumuman</span>
                    <span class="sm:hidden">Data</span>
                </h3>
                <span class="px-2 py-1 bg-white/20 rounded-full text-white text-xs font-medium">
                    {{ $pengumuman->total() }}
                </span>
            </div>
        </div>

        <!-- Mobile Card Layout -->
        <div class="block md:hidden">
            @forelse($pengumuman as $item)
            <div class="border-b border-gray-200 p-3 hover:bg-gray-50 transition-colors duration-200">
                <div class="flex items-start gap-3 mb-2">
                    @if($item->gambar)
                        <div class="w-16 h-12 rounded-lg overflow-hidden bg-gray-100 flex-shrink-0">
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="w-full h-full object-cover">
                        </div>
                    @else
                        <div class="w-16 h-12 rounded-lg bg-gray-100 flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-image text-gray-400 text-sm"></i>
                        </div>
                    @endif
                    <div class="flex-1 min-w-0">
                        <h4 class="font-semibold text-gray-900 text-sm truncate">{{ $item->judul }}</h4>
                        <p class="text-xs text-gray-600 mt-1">{{ Str::limit($item->konten, 40) }}</p>
                    </div>
                    <div class="flex gap-1 ml-2">
                        <a href="{{ route('admin.pengumuman.show', $item->id) }}" 
                           class="inline-flex items-center p-1.5 text-xs text-white bg-blue-600 hover:bg-blue-700 rounded">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.pengumuman.edit', $item->id) }}" 
                           class="inline-flex items-center p-1.5 text-xs text-white bg-yellow-600 hover:bg-yellow-700 rounded">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form method="POST" action="{{ route('admin.pengumuman.destroy', $item->id) }}" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="inline-flex items-center p-1.5 text-xs text-white bg-red-600 hover:bg-red-700 rounded"
                                    onclick="return confirm('Yakin hapus?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="flex flex-wrap gap-1 mb-2">
                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-blue-100 text-blue-800">
                        {{ $item->kategori_label }}
                    </span>
                    @if($item->prioritas == 'tinggi')
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-red-100 text-red-800">Tinggi</span>
                    @elseif($item->prioritas == 'sedang')
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-yellow-100 text-yellow-800">Sedang</span>
                    @else
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800">Rendah</span>
                    @endif
                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium {{ $item->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                        {{ $item->is_active ? 'Aktif' : 'Tidak Aktif' }}
                    </span>
                    @if($item->is_featured)
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-yellow-100 text-yellow-800">
                            <i class="fas fa-star mr-1"></i>Featured
                        </span>
                    @endif
                </div>
                <div class="text-xs text-gray-500">
                    {{ $item->tanggal_mulai->format('d/m/Y') }} 
                    @if($item->tanggal_selesai)
                        - {{ $item->tanggal_selesai->format('d/m/Y') }}
                    @endif
                    | {{ Str::limit($item->creator->name, 15) }}
                </div>
            </div>
            @empty
            <div class="p-6 text-center">
                <div class="w-12 h-12 mx-auto mb-3 bg-gray-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-bullhorn text-gray-400 text-lg"></i>
                </div>
                <h3 class="text-base font-medium text-gray-900 mb-1">Tidak ada pengumuman</h3>
                <p class="text-sm text-gray-500">Silakan tambah pengumuman baru</p>
            </div>
            @endforelse
        </div>

        <!-- Desktop Table Layout -->
        <div class="hidden md:block overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Gambar</th>
                        <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Judul</th>
                        <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Kategori</th>
                        <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Prioritas</th>
                        <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                        <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Pembuat</th>
                        <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($pengumuman as $item)
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-3 py-3 whitespace-nowrap">
                            @if($item->gambar)
                                <div class="w-16 h-12 rounded-lg overflow-hidden bg-gray-100">
                                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="w-full h-full object-cover">
                                </div>
                            @else
                                <div class="w-16 h-12 rounded-lg bg-gray-100 flex items-center justify-center">
                                    <i class="fas fa-image text-gray-400 text-sm"></i>
                                </div>
                            @endif
                        </td>
                        <td class="px-3 py-3">
                            <div>
                                <div class="font-semibold text-gray-900 text-sm">{{ Str::limit($item->judul, 30) }}</div>
                                <div class="text-xs text-gray-600 mt-1">{{ Str::limit($item->konten, 50) }}</div>
                                @if($item->is_featured)
                                    <span class="inline-flex items-center px-1.5 py-0.5 rounded text-xs font-medium bg-yellow-100 text-yellow-800 mt-1">
                                        <i class="fas fa-star mr-1"></i>
                                        Featured
                                    </span>
                                @endif
                            </div>
                        </td>
                        <td class="px-3 py-3 whitespace-nowrap">
                            <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-blue-100 text-blue-800">
                                {{ $item->kategori_label }}
                            </span>
                        </td>
                        <td class="px-3 py-3 whitespace-nowrap">
                            @if($item->prioritas == 'tinggi')
                                <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-red-100 text-red-800">Tinggi</span>
                            @elseif($item->prioritas == 'sedang')
                                <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-yellow-100 text-yellow-800">Sedang</span>
                            @else
                                <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-green-100 text-green-800">Rendah</span>
                            @endif
                        </td>
                        <td class="px-3 py-3 whitespace-nowrap">
                            <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium {{ $item->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                {{ $item->is_active ? 'Aktif' : 'Tidak Aktif' }}
                            </span>
                        </td>
                        <td class="px-3 py-3 whitespace-nowrap text-xs text-gray-900">
                            <div>{{ $item->tanggal_mulai->format('d/m/Y') }}</div>
                            @if($item->tanggal_selesai)
                                <div class="text-xs text-gray-500">s/d {{ $item->tanggal_selesai->format('d/m/Y') }}</div>
                            @endif
                        </td>
                        <td class="px-3 py-3 whitespace-nowrap text-xs text-gray-900">{{ Str::limit($item->creator->name, 15) }}</td>
                        <td class="px-3 py-3 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-1">
                                <a href="{{ route('admin.pengumuman.show', $item->id) }}" 
                                   class="inline-flex items-center p-1.5 text-xs text-white bg-blue-600 hover:bg-blue-700 rounded transition-colors duration-200"
                                   title="Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.pengumuman.edit', $item->id) }}" 
                                   class="inline-flex items-center p-1.5 text-xs text-white bg-yellow-600 hover:bg-yellow-700 rounded transition-colors duration-200"
                                   title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form method="POST" action="{{ route('admin.pengumuman.destroy', $item->id) }}" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="inline-flex items-center p-1.5 text-xs text-white bg-red-600 hover:bg-red-700 rounded transition-colors duration-200"
                                            onclick="return confirm('Yakin hapus pengumuman ini?')" 
                                            title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-6 py-12 text-center">
                            <div class="w-12 h-12 mx-auto mb-3 bg-gray-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-bullhorn text-gray-400 text-lg"></i>
                            </div>
                            <h3 class="text-base font-medium text-gray-900 mb-1">Tidak ada pengumuman</h3>
                            <p class="text-sm text-gray-500">Silakan tambah pengumuman baru</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($pengumuman->hasPages())
        <div class="px-3 md:px-4 py-3 bg-gray-50 border-t border-gray-200">
            {{ $pengumuman->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
