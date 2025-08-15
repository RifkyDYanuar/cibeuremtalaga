@extends('layouts.admin')

@section('title', 'Detail Data IDM')

@section('breadcrumb')
    <span class="text-gray-400 mx-2">/</span>
    <a href="{{ route('admin.idm.index') }}" class="hover:text-village-primary transition-colors">IDM Desa</a>
    <span class="text-gray-400 mx-2">/</span>
    <span class="text-village-primary">Detail</span>
@endsection

@section('content')
<div class="p-3 md:p-6">
    <!-- Header Section -->
    <div class="mb-4 md:mb-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
            <div>
                <h1 class="text-xl md:text-2xl font-bold text-gray-900 mb-1">Detail Data IDM {{ $idm->tahun }}</h1>
                <p class="text-xs md:text-sm text-gray-600">Informasi lengkap data Indeks Desa Membangun (IDM)</p>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('admin.idm.edit', $idm) }}" 
                   class="inline-flex items-center px-3 md:px-4 py-2 bg-yellow-500 text-white font-semibold rounded-lg hover:bg-yellow-600 transition-all duration-200 shadow-lg text-xs md:text-sm">
                    <i class="fas fa-edit mr-1 md:mr-2"></i> 
                    <span>Edit</span>
                </a>
                <a href="{{ route('admin.idm.index') }}" 
                   class="inline-flex items-center px-3 md:px-4 py-2 bg-gray-500 text-white font-semibold rounded-lg hover:bg-gray-600 transition-all duration-200 shadow-lg text-xs md:text-sm">
                    <i class="fas fa-arrow-left mr-1 md:mr-2"></i> 
                    <span>Kembali</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Status Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <!-- IDM Score -->
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl p-4 text-white shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-blue-100 text-sm font-medium">Skor IDM</p>
                    <p class="text-2xl font-bold">{{ number_format($idm->skor_idm, 2) }}</p>
                </div>
                <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                    <i class="fas fa-chart-line text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Status -->
        <div class="bg-gradient-to-br from-{{ $idm->status_idm == 'Mandiri' ? 'green' : ($idm->status_idm == 'Maju' ? 'emerald' : ($idm->status_idm == 'Berkembang' ? 'yellow' : ($idm->status_idm == 'Tertinggal' ? 'orange' : 'red'))) }}-500 to-{{ $idm->status_idm == 'Mandiri' ? 'green' : ($idm->status_idm == 'Maju' ? 'emerald' : ($idm->status_idm == 'Berkembang' ? 'yellow' : ($idm->status_idm == 'Tertinggal' ? 'orange' : 'red'))) }}-600 rounded-xl p-4 text-white shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-white/80 text-sm font-medium">Status IDM</p>
                    <p class="text-lg font-bold">{{ $idm->status_idm }}</p>
                </div>
                <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                    <i class="fas fa-award text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Year -->
        <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl p-4 text-white shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-purple-100 text-sm font-medium">Tahun</p>
                    <p class="text-2xl font-bold">{{ $idm->tahun }}</p>
                </div>
                <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                    <i class="fas fa-calendar text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Published Status -->
        <div class="bg-gradient-to-br from-{{ $idm->is_published ? 'green' : 'gray' }}-500 to-{{ $idm->is_published ? 'green' : 'gray' }}-600 rounded-xl p-4 text-white shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-white/80 text-sm font-medium">Status Publikasi</p>
                    <p class="text-lg font-bold">{{ $idm->is_published ? 'Dipublikasi' : 'Draft' }}</p>
                </div>
                <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                    <i class="fas fa-{{ $idm->is_published ? 'eye' : 'eye-slash' }} text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Skor Dimensi -->
        <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-lg border border-white/20 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                    <i class="fas fa-chart-pie mr-2 text-village-primary"></i>
                    Skor Dimensi
                </h3>
            </div>
            
            <div class="p-6 space-y-4">
                <!-- IKS -->
                <div class="flex items-center justify-between p-4 bg-blue-50 rounded-lg">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-users text-white"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">IKS (Indeks Kapital Sosial)</p>
                            <p class="text-xs text-gray-500">Dimensi Sosial</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-xl font-bold text-blue-600">{{ number_format($idm->skor_iks, 2) }}</p>
                        @if($idm->dimensi_sosial)
                            <p class="text-xs text-gray-500">Alt: {{ number_format($idm->dimensi_sosial, 2) }}</p>
                        @endif
                    </div>
                </div>

                <!-- IKE -->
                <div class="flex items-center justify-between p-4 bg-green-50 rounded-lg">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-coins text-white"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">IKE (Indeks Kapital Ekonomi)</p>
                            <p class="text-xs text-gray-500">Dimensi Ekonomi</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-xl font-bold text-green-600">{{ number_format($idm->skor_ike, 2) }}</p>
                        @if($idm->dimensi_ekonomi)
                            <p class="text-xs text-gray-500">Alt: {{ number_format($idm->dimensi_ekonomi, 2) }}</p>
                        @endif
                    </div>
                </div>

                <!-- IKL -->
                <div class="flex items-center justify-between p-4 bg-emerald-50 rounded-lg">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-emerald-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-leaf text-white"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">IKL (Indeks Kapital Lingkungan)</p>
                            <p class="text-xs text-gray-500">Dimensi Lingkungan</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-xl font-bold text-emerald-600">{{ number_format($idm->skor_ikl, 2) }}</p>
                        @if($idm->dimensi_lingkungan)
                            <p class="text-xs text-gray-500">Alt: {{ number_format($idm->dimensi_lingkungan, 2) }}</p>
                        @endif
                    </div>
                </div>

                @if($idm->target_tahun_depan)
                <!-- Target -->
                <div class="flex items-center justify-between p-4 bg-yellow-50 rounded-lg border-2 border-dashed border-yellow-300">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-yellow-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-bullseye text-white"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">Target Tahun Depan</p>
                            <p class="text-xs text-gray-500">Proyeksi {{ $idm->tahun + 1 }}</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-xl font-bold text-yellow-600">{{ number_format($idm->target_tahun_depan, 2) }}</p>
                        @php
                            $improvement = $idm->target_tahun_depan - $idm->skor_idm;
                        @endphp
                        <p class="text-xs {{ $improvement > 0 ? 'text-green-600' : ($improvement < 0 ? 'text-red-600' : 'text-gray-500') }}">
                            {{ $improvement > 0 ? '+' : '' }}{{ number_format($improvement, 2) }}
                        </p>
                    </div>
                </div>
                @endif
            </div>
        </div>

        <!-- Detail Information -->
        <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-lg border border-white/20 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                    <i class="fas fa-info-circle mr-2 text-village-primary"></i>
                    Informasi Detail
                </h3>
            </div>
            
            <div class="p-6 space-y-6">
                <!-- Basic Info -->
                <div>
                    <h4 class="font-semibold text-gray-900 mb-3">Informasi Dasar</h4>
                    <div class="space-y-3">
                        <div class="flex justify-between items-center py-2 border-b border-gray-100">
                            <span class="text-sm text-gray-600">Tahun Data</span>
                            <span class="font-medium">{{ $idm->tahun }}</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-100">
                            <span class="text-sm text-gray-600">Skor IDM</span>
                            <span class="font-medium">{{ number_format($idm->skor_idm, 2) }}</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-100">
                            <span class="text-sm text-gray-600">Status IDM</span>
                            <span class="px-2 py-1 rounded text-xs font-medium bg-{{ $idm->status_idm == 'Mandiri' ? 'green' : ($idm->status_idm == 'Maju' ? 'emerald' : ($idm->status_idm == 'Berkembang' ? 'yellow' : ($idm->status_idm == 'Tertinggal' ? 'orange' : 'red'))) }}-100 text-{{ $idm->status_idm == 'Mandiri' ? 'green' : ($idm->status_idm == 'Maju' ? 'emerald' : ($idm->status_idm == 'Berkembang' ? 'yellow' : ($idm->status_idm == 'Tertinggal' ? 'orange' : 'red'))) }}-800">
                                {{ $idm->status_idm }}
                            </span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-100">
                            <span class="text-sm text-gray-600">Status Publikasi</span>
                            <span class="px-2 py-1 rounded text-xs font-medium {{ $idm->is_published ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                {{ $idm->is_published ? 'Dipublikasi' : 'Draft' }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Timestamps -->
                <div>
                    <h4 class="font-semibold text-gray-900 mb-3">Riwayat Data</h4>
                    <div class="space-y-3">
                        <div class="flex justify-between items-center py-2 border-b border-gray-100">
                            <span class="text-sm text-gray-600">Dibuat</span>
                            <span class="text-sm">{{ $idm->created_at->format('d M Y, H:i') }}</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-100">
                            <span class="text-sm text-gray-600">Terakhir Diubah</span>
                            <span class="text-sm">{{ $idm->updated_at->format('d M Y, H:i') }}</span>
                        </div>
                    </div>
                </div>

                @if($idm->deskripsi)
                <!-- Description -->
                <div>
                    <h4 class="font-semibold text-gray-900 mb-3">Deskripsi</h4>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-sm text-gray-700 leading-relaxed">{{ $idm->deskripsi }}</p>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Chart Visualization (Optional Enhancement) -->
    <div class="mt-6 bg-white/80 backdrop-blur-sm rounded-xl shadow-lg border border-white/20 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                <i class="fas fa-chart-bar mr-2 text-village-primary"></i>
                Visualisasi Data
            </h3>
        </div>
        
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- IKS Chart -->
                <div class="text-center">
                    <div class="relative w-32 h-32 mx-auto mb-4">
                        <svg class="w-32 h-32 transform -rotate-90">
                            <circle cx="64" cy="64" r="56" stroke="#e5e7eb" stroke-width="8" fill="none"></circle>
                            <circle cx="64" cy="64" r="56" stroke="#3b82f6" stroke-width="8" fill="none" 
                                    stroke-dasharray="{{ 2 * pi() * 56 }}" 
                                    stroke-dashoffset="{{ 2 * pi() * 56 * (1 - $idm->skor_iks/100) }}"
                                    class="transition-all duration-1000 ease-out"></circle>
                        </svg>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <span class="text-xl font-bold text-blue-600">{{ number_format($idm->skor_iks, 1) }}</span>
                        </div>
                    </div>
                    <h4 class="font-semibold text-gray-900">IKS</h4>
                    <p class="text-sm text-gray-500">Indeks Kapital Sosial</p>
                </div>

                <!-- IKE Chart -->
                <div class="text-center">
                    <div class="relative w-32 h-32 mx-auto mb-4">
                        <svg class="w-32 h-32 transform -rotate-90">
                            <circle cx="64" cy="64" r="56" stroke="#e5e7eb" stroke-width="8" fill="none"></circle>
                            <circle cx="64" cy="64" r="56" stroke="#10b981" stroke-width="8" fill="none" 
                                    stroke-dasharray="{{ 2 * pi() * 56 }}" 
                                    stroke-dashoffset="{{ 2 * pi() * 56 * (1 - $idm->skor_ike/100) }}"
                                    class="transition-all duration-1000 ease-out"></circle>
                        </svg>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <span class="text-xl font-bold text-green-600">{{ number_format($idm->skor_ike, 1) }}</span>
                        </div>
                    </div>
                    <h4 class="font-semibold text-gray-900">IKE</h4>
                    <p class="text-sm text-gray-500">Indeks Kapital Ekonomi</p>
                </div>

                <!-- IKL Chart -->
                <div class="text-center">
                    <div class="relative w-32 h-32 mx-auto mb-4">
                        <svg class="w-32 h-32 transform -rotate-90">
                            <circle cx="64" cy="64" r="56" stroke="#e5e7eb" stroke-width="8" fill="none"></circle>
                            <circle cx="64" cy="64" r="56" stroke="#059669" stroke-width="8" fill="none" 
                                    stroke-dasharray="{{ 2 * pi() * 56 }}" 
                                    stroke-dashoffset="{{ 2 * pi() * 56 * (1 - $idm->skor_ikl/100) }}"
                                    class="transition-all duration-1000 ease-out"></circle>
                        </svg>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <span class="text-xl font-bold text-emerald-600">{{ number_format($idm->skor_ikl, 1) }}</span>
                        </div>
                    </div>
                    <h4 class="font-semibold text-gray-900">IKL</h4>
                    <p class="text-sm text-gray-500">Indeks Kapital Lingkungan</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="mt-6 flex flex-col sm:flex-row gap-3 sm:justify-end">
        <a href="{{ route('admin.idm.index') }}" 
           class="px-4 py-2 bg-gray-500 text-white font-medium rounded-lg hover:bg-gray-600 transition-colors duration-200 text-center">
            <i class="fas fa-arrow-left mr-2"></i>Kembali ke Daftar
        </a>
        <a href="{{ route('admin.idm.edit', $idm) }}" 
           class="px-4 py-2 bg-yellow-500 text-white font-medium rounded-lg hover:bg-yellow-600 transition-colors duration-200 text-center">
            <i class="fas fa-edit mr-2"></i>Edit Data
        </a>
        <button onclick="confirmDelete({{ $idm->id }}, '{{ $idm->tahun }}')" 
                class="px-4 py-2 bg-red-500 text-white font-medium rounded-lg hover:bg-red-600 transition-colors duration-200">
            <i class="fas fa-trash mr-2"></i>Hapus Data
        </button>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-2xl bg-white">
        <div class="mt-3">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 mb-4">
                <i class="fas fa-exclamation-triangle text-red-600"></i>
            </div>
            <h3 class="text-lg font-medium text-gray-900 text-center mb-2">Konfirmasi Hapus</h3>
            <p class="text-sm text-gray-500 text-center mb-4">
                Apakah Anda yakin ingin menghapus data IDM tahun <strong id="yearToDelete" class="text-gray-900"></strong>?
            </p>
            <p class="text-xs text-red-600 text-center mb-6">Data yang dihapus tidak dapat dikembalikan!</p>
            <div class="flex gap-3">
                <button type="button" onclick="closeDeleteModal()" 
                        class="flex-1 px-4 py-2 bg-gray-500 text-white font-medium rounded-lg hover:bg-gray-600 transition-colors duration-200">
                    Batal
                </button>
                <form id="deleteForm" method="POST" class="flex-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="w-full px-4 py-2 bg-red-600 text-white font-medium rounded-lg hover:bg-red-700 transition-colors duration-200">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function confirmDelete(id, year) {
    document.getElementById('yearToDelete').textContent = year;
    document.getElementById('deleteForm').action = `{{ route('admin.idm.index') }}/${id}`;
    document.getElementById('deleteModal').classList.remove('hidden');
}

function closeDeleteModal() {
    document.getElementById('deleteModal').classList.add('hidden');
}

// Close modal when clicking outside
document.getElementById('deleteModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeDeleteModal();
    }
});
</script>
@endsection
