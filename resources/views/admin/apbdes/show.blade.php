@extends('layouts.admin')

@section('title', 'Detail Data APBDES')

@section('content')
<div class="min-h-screen bg-gray-50 dark:bg-dark-100 transition-colors duration-300">
    <div class="p-4 md:p-6 lg:p-8">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 md:mb-8 space-y-4 sm:space-y-0">
            <div>
                <h1 class="text-xl md:text-2xl font-bold text-gray-900 dark:text-white">Detail Data APBDES</h1>
                <p class="text-gray-600 dark:text-gray-400 text-sm md:text-base">Informasi lengkap data anggaran</p>
            </div>
            <div class="flex flex-col sm:flex-row gap-2">
                <a href="{{ route('admin.apbdes.edit', $apbdes) }}"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2.5 rounded-lg transition-colors duration-200 flex items-center space-x-2 text-sm md:text-base justify-center">
                    <i class="fas fa-edit"></i>
                    <span>Edit</span>
                </a>
                <a href="{{ route('admin.apbdes.index') }}"
                    class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2.5 rounded-lg transition-colors duration-200 flex items-center space-x-2 text-sm md:text-base justify-center">
                    <i class="fas fa-arrow-left"></i>
                    <span>Kembali</span>
                </a>
            </div>
        </div>

        <!-- Main Information -->
        <div class="bg-white dark:bg-dark-300 rounded-lg shadow-sm border border-gray-200 dark:border-dark-400 p-4 md:p-6 mb-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Left Column -->
                <div class="space-y-6">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Informasi Umum</h3>
                        <div class="space-y-4">
                            <div class="flex justify-between items-start">
                                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Tahun Anggaran:</span>
                                <span class="text-sm font-semibold text-gray-900 dark:text-white">{{ $apbdes->tahun_anggaran }}</span>
                            </div>
                            
                            <div class="flex justify-between items-start">
                                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Jenis:</span>
                                <span class="px-2 py-1 text-xs rounded-full {{ $apbdes->jenis == 'pendapatan' ? 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400' : 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400' }}">
                                    {{ ucfirst($apbdes->jenis) }}
                                </span>
                            </div>
                            
                            <div class="flex justify-between items-start">
                                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Status:</span>
                                <span class="px-2 py-1 text-xs rounded-full
                                    @if($apbdes->status == 'aktif') bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400
                                    @elseif($apbdes->status == 'draft') bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400
                                    @else bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400 @endif">
                                    {{ ucfirst($apbdes->status) }}
                                </span>
                            </div>
                            
                            <div class="flex justify-between items-start">
                                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Kategori:</span>
                                <span class="text-sm font-semibold text-gray-900 dark:text-white text-right max-w-xs">{{ $apbdes->kategori }}</span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Jumlah Anggaran</h3>
                        <div class="bg-gray-50 dark:bg-dark-200 rounded-lg p-4">
                            <div class="text-center">
                                <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">Total Anggaran</p>
                                <p class="text-2xl md:text-3xl font-bold {{ $apbdes->jenis == 'pendapatan' ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400' }}">
                                    {{ $apbdes->formatted_jumlah }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-6">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Uraian</h3>
                        <div class="bg-gray-50 dark:bg-dark-200 rounded-lg p-4">
                            <p class="text-sm text-gray-700 dark:text-gray-300 leading-relaxed">{{ $apbdes->uraian }}</p>
                        </div>
                    </div>

                    @if($apbdes->keterangan)
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Keterangan</h3>
                        <div class="bg-gray-50 dark:bg-dark-200 rounded-lg p-4">
                            <p class="text-sm text-gray-700 dark:text-gray-300 leading-relaxed">{{ $apbdes->keterangan }}</p>
                        </div>
                    </div>
                    @endif

                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Informasi Sistem</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between items-start">
                                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Dibuat oleh:</span>
                                <span class="text-sm font-semibold text-gray-900 dark:text-white">{{ $apbdes->creator->name ?? 'N/A' }}</span>
                            </div>
                            
                            <div class="flex justify-between items-start">
                                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Tanggal dibuat:</span>
                                <span class="text-sm text-gray-700 dark:text-gray-300">{{ $apbdes->created_at->format('d M Y, H:i') }}</span>
                            </div>
                            
                            @if($apbdes->updated_at != $apbdes->created_at)
                            <div class="flex justify-between items-start">
                                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Diupdate oleh:</span>
                                <span class="text-sm font-semibold text-gray-900 dark:text-white">{{ $apbdes->updater->name ?? 'N/A' }}</span>
                            </div>
                            
                            <div class="flex justify-between items-start">
                                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Tanggal update:</span>
                                <span class="text-sm text-gray-700 dark:text-gray-300">{{ $apbdes->updated_at->format('d M Y, H:i') }}</span>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="bg-white dark:bg-dark-300 rounded-lg shadow-sm border border-gray-200 dark:border-dark-400 p-4 md:p-6">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Aksi</h3>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="{{ route('admin.apbdes.edit', $apbdes) }}" 
                   class="flex-1 sm:flex-none bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-lg transition-colors duration-200 font-medium text-center">
                    <i class="fas fa-edit mr-2"></i>
                    Edit Data
                </a>
                
                <button onclick="deleteItem({{ $apbdes->id }})" 
                        class="flex-1 sm:flex-none bg-red-500 hover:bg-red-600 text-white px-6 py-3 rounded-lg transition-colors duration-200 font-medium">
                    <i class="fas fa-trash mr-2"></i>
                    Hapus Data
                </button>
                
                <a href="{{ route('admin.apbdes.index') }}" 
                   class="flex-1 sm:flex-none bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg transition-colors duration-200 font-medium text-center">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali ke Daftar
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white dark:bg-dark-300 rounded-lg p-6 max-w-sm mx-4 w-full">
        <div class="text-center">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 dark:bg-red-900/30 mb-4">
                <i class="fas fa-exclamation-triangle text-red-600 dark:text-red-400"></i>
            </div>
            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">Hapus Data APBDES</h3>
            <p class="text-sm text-gray-500 dark:text-gray-400 mb-6">Apakah Anda yakin ingin menghapus data ini? Tindakan ini tidak dapat dibatalkan.</p>
            <div class="flex space-x-3">
                <button onclick="closeDeleteModal()" 
                        class="flex-1 px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-dark-200 border border-gray-300 dark:border-dark-400 rounded-md hover:bg-gray-50 dark:hover:bg-dark-100 transition-colors">
                    Batal
                </button>
                <form id="deleteForm" method="POST" class="flex-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="w-full px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-md hover:bg-red-700 transition-colors">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function deleteItem(id) {
    document.getElementById('deleteForm').action = `/admin/apbdes/${id}`;
    document.getElementById('deleteModal').classList.remove('hidden');
    document.getElementById('deleteModal').classList.add('flex');
}

function closeDeleteModal() {
    document.getElementById('deleteModal').classList.add('hidden');
    document.getElementById('deleteModal').classList.remove('flex');
}

// Close modal when clicking outside
document.getElementById('deleteModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeDeleteModal();
    }
});
</script>
@endsection
