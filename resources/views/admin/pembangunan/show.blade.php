@extends('layouts.admin')

@section('title', 'Detail Pembangunan - ' . $pembangunan->nama_proyek)

@section('content')
<div class="container mx-auto px-4 py-6">
    <!-- Header -->
    <div class="bg-gradient-to-r from-village-primary to-village-secondary rounded-2xl shadow-xl p-6 mb-8">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center">
            <div class="text-white mb-4 sm:mb-0">
                <h1 class="text-2xl lg:text-3xl font-bold mb-2">
                    <i class="fas fa-eye mr-3"></i>Detail Pembangunan
                </h1>
                <p class="text-white/90 text-sm lg:text-base">
                    Informasi lengkap proyek pembangunan desa
                </p>
            </div>
            <div class="flex flex-col sm:flex-row gap-2">
                <a href="{{ route('admin.pembangunan.edit', $pembangunan->id) }}" 
                   class="bg-white text-village-primary px-6 py-3 rounded-xl font-semibold hover:bg-gray-50 transition-all duration-300 shadow-lg hover:shadow-xl flex items-center justify-center">
                    <i class="fas fa-edit mr-2"></i>Edit
                </a>
                <a href="{{ route('admin.pembangunan.index') }}" 
                   class="bg-white/20 text-white border-2 border-white px-6 py-3 rounded-xl font-semibold hover:bg-white/30 transition-all duration-300 flex items-center justify-center">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali
                </a>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-8">
            <!-- Basic Info -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-blue-50 to-blue-100">
                    <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                        <i class="fas fa-info-circle mr-2 text-village-primary"></i>Informasi Proyek
                    </h3>
                </div>
                <div class="p-6">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">{{ $pembangunan->nama_proyek }}</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                {{ $pembangunan->kategori_label }}
                            </span>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $pembangunan->status_badge }}">
                                {{ $pembangunan->status_label }}
                            </span>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Lokasi</label>
                            <p class="text-gray-900">{{ $pembangunan->lokasi }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Progress</label>
                            <div class="flex items-center">
                                <div class="w-24 bg-gray-200 rounded-full h-2 mr-3">
                                    <div class="bg-village-primary h-2 rounded-full" style="width: {{ $pembangunan->progress }}%"></div>
                                </div>
                                <span class="text-village-primary font-bold">{{ $pembangunan->progress }}%</span>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                        <div class="prose max-w-none text-gray-700">
                            {!! nl2br(e($pembangunan->deskripsi)) !!}
                        </div>
                    </div>
                    
                    @if($pembangunan->keterangan)
                        <div class="mt-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Keterangan Tambahan</label>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                {!! nl2br(e($pembangunan->keterangan)) !!}
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Timeline -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-green-50 to-green-100">
                    <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                        <i class="fas fa-calendar-alt mr-2 text-village-primary"></i>Timeline Proyek
                    </h3>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="text-center p-4 bg-blue-50 rounded-xl">
                            <i class="fas fa-play-circle text-blue-600 text-2xl mb-2"></i>
                            <h4 class="font-semibold text-gray-800 mb-1">Tanggal Mulai</h4>
                            <p class="text-gray-600">{{ $pembangunan->tanggal_mulai->format('d M Y') }}</p>
                        </div>
                        
                        <div class="text-center p-4 bg-yellow-50 rounded-xl">
                            <i class="fas fa-flag-checkered text-yellow-600 text-2xl mb-2"></i>
                            <h4 class="font-semibold text-gray-800 mb-1">Target Selesai</h4>
                            <p class="text-gray-600">{{ $pembangunan->tanggal_target->format('d M Y') }}</p>
                        </div>
                        
                        <div class="text-center p-4 {{ $pembangunan->tanggal_selesai ? 'bg-green-50' : 'bg-gray-50' }} rounded-xl">
                            <i class="fas fa-check-circle {{ $pembangunan->tanggal_selesai ? 'text-green-600' : 'text-gray-400' }} text-2xl mb-2"></i>
                            <h4 class="font-semibold text-gray-800 mb-1">Tanggal Selesai</h4>
                            <p class="text-gray-600">
                                {{ $pembangunan->tanggal_selesai ? $pembangunan->tanggal_selesai->format('d M Y') : 'Belum Selesai' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Anggaran -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-purple-50 to-purple-100">
                    <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                        <i class="fas fa-money-bill-wave mr-2 text-village-primary"></i>Detail Anggaran
                    </h3>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="p-4 bg-blue-50 rounded-xl">
                            <h4 class="font-semibold text-gray-800 mb-2">Total Anggaran</h4>
                            <p class="text-2xl font-bold text-blue-600">Rp {{ number_format($pembangunan->anggaran, 0, ',', '.') }}</p>
                        </div>
                        
                        <div class="p-4 bg-green-50 rounded-xl">
                            <h4 class="font-semibold text-gray-800 mb-2">Realisasi</h4>
                            <p class="text-2xl font-bold text-green-600">Rp {{ number_format($pembangunan->realisasi, 0, ',', '.') }}</p>
                        </div>
                        
                        <div class="p-4 bg-orange-50 rounded-xl">
                            <h4 class="font-semibold text-gray-800 mb-2">Sumber Dana</h4>
                            <p class="text-lg font-semibold text-orange-600">{{ $pembangunan->sumber_dana }}</p>
                        </div>
                        
                        <div class="p-4 bg-purple-50 rounded-xl">
                            <h4 class="font-semibold text-gray-800 mb-2">Sisa Anggaran</h4>
                            <p class="text-lg font-semibold text-purple-600">
                                Rp {{ number_format($pembangunan->anggaran - $pembangunan->realisasi, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gambar -->
            @if($pembangunan->gambar && count($pembangunan->gambar) > 0)
                <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-gray-100">
                        <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                            <i class="fas fa-images mr-2 text-village-primary"></i>Dokumentasi Proyek
                        </h3>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($pembangunan->gambar_urls as $index => $url)
                                <div class="relative group cursor-pointer" onclick="openImageModal('{{ $url }}')">
                                    <img src="{{ $url }}" 
                                         alt="Dokumentasi {{ $pembangunan->nama_proyek }} - {{ $index + 1 }}"
                                         class="w-full h-48 object-cover rounded-lg group-hover:opacity-75 transition-opacity">
                                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 rounded-lg transition-colors flex items-center justify-center">
                                        <i class="fas fa-search-plus text-white opacity-0 group-hover:opacity-100 text-2xl transition-opacity"></i>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1">
            <!-- Penanggung Jawab -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden mb-6">
                <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-green-50 to-green-100">
                    <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                        <i class="fas fa-user-tie mr-2 text-village-primary"></i>Penanggung Jawab
                    </h3>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Penanggung Jawab</label>
                            <p class="text-gray-900 font-semibold">{{ $pembangunan->penanggung_jawab }}</p>
                        </div>
                        
                        @if($pembangunan->kontraktor)
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Kontraktor</label>
                                <p class="text-gray-900">{{ $pembangunan->kontraktor }}</p>
                            </div>
                        @endif
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Status Publikasi</label>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $pembangunan->is_published ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $pembangunan->is_published ? 'Dipublikasikan' : 'Draft' }}
                            </span>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Dibuat</label>
                            <p class="text-gray-600 text-sm">{{ $pembangunan->created_at->format('d M Y, H:i') }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Terakhir Diperbarui</label>
                            <p class="text-gray-600 text-sm">{{ $pembangunan->updated_at->format('d M Y, H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-gray-100">
                    <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                        <i class="fas fa-cogs mr-2 text-village-primary"></i>Tindakan
                    </h3>
                </div>
                <div class="p-6 space-y-3">
                    <a href="{{ route('admin.pembangunan.edit', $pembangunan->id) }}" 
                       class="w-full bg-yellow-500 text-white px-4 py-3 rounded-xl font-semibold hover:bg-yellow-600 transition-colors flex items-center justify-center">
                        <i class="fas fa-edit mr-2"></i>Edit Proyek
                    </a>
                    
                    @if($pembangunan->is_published)
                        <a href="{{ route('public.pembangunan.detail', $pembangunan->id) }}" 
                           target="_blank"
                           class="w-full bg-blue-500 text-white px-4 py-3 rounded-xl font-semibold hover:bg-blue-600 transition-colors flex items-center justify-center">
                            <i class="fas fa-external-link-alt mr-2"></i>Lihat Public
                        </a>
                    @endif
                    
                    <form action="{{ route('admin.pembangunan.destroy', $pembangunan->id) }}" method="POST" class="w-full" 
                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus proyek ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="w-full bg-red-500 text-white px-4 py-3 rounded-xl font-semibold hover:bg-red-600 transition-colors flex items-center justify-center">
                            <i class="fas fa-trash mr-2"></i>Hapus Proyek
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Image Modal -->
<div id="imageModal" class="fixed inset-0 bg-black/80 z-50 hidden items-center justify-center p-4">
    <div class="relative max-w-4xl max-h-full">
        <img id="modalImage" src="" alt="" class="max-w-full max-h-full object-contain rounded-lg">
        <button onclick="closeImageModal()" 
                class="absolute top-4 right-4 text-white bg-black/50 hover:bg-black/70 rounded-full p-2 transition-colors">
            <i class="fas fa-times text-xl"></i>
        </button>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function openImageModal(src) {
        document.getElementById('modalImage').src = src;
        document.getElementById('imageModal').classList.remove('hidden');
        document.getElementById('imageModal').classList.add('flex');
        document.body.classList.add('overflow-hidden');
    }
    
    function closeImageModal() {
        document.getElementById('imageModal').classList.add('hidden');
        document.getElementById('imageModal').classList.remove('flex');
        document.body.classList.remove('overflow-hidden');
    }
    
    // Close modal on escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeImageModal();
        }
    });
    
    // Close modal on click outside
    document.getElementById('imageModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeImageModal();
        }
    });
</script>
@endpush
