@extends('layouts.admin')

@section('title', 'Manajemen Kegiatan BPD')

@section('breadcrumb')
    <span class="mx-2">/</span>
    <a href="{{ route('admin.bpd.index') }}" class="text-gray-500 hover:text-village-primary transition-colors">Manajemen BPD</a>
    <span class="mx-2">/</span>
    <span class="text-village-primary">Kegiatan & Dokumentasi</span>
@endsection

@section('content')

<!-- Page Header -->
<div class="mb-6 md:mb-8">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold bg-gradient-to-r from-village-primary to-village-secondary bg-clip-text text-transparent">
                Manajemen Kegiatan BPD
            </h1>
            <p class="text-gray-600 mt-1 md:mt-2 text-sm md:text-base">Kelola dokumentasi kegiatan Badan Permusyawaratan Desa</p>
        </div>
        <div class="flex items-center space-x-3">
            <a href="{{ route('admin.bpd.activities.create') }}" class="inline-flex items-center px-4 py-2 bg-village-primary text-white rounded-lg hover:bg-village-secondary transition-colors text-sm font-medium shadow-lg">
                <i class="fas fa-plus mr-2"></i>
                Tambah Kegiatan
            </a>
        </div>
    </div>
</div>

@if(session('success'))
    <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg">
        <div class="flex items-center">
            <i class="fas fa-check-circle text-green-500 mr-3"></i>
            <span class="text-green-800 font-medium">{{ session('success') }}</span>
        </div>
    </div>
@endif

<!-- Activities Grid -->
@if($activities->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        @foreach($activities as $activity)
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <!-- Activity Image -->
                <div class="relative h-48 overflow-hidden">
                    <img src="{{ $activity->image_url }}" alt="{{ $activity->title }}" 
                         class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
                    @if($activity->category)
                        <div class="absolute top-3 left-3">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium text-white bg-gradient-to-r from-village-primary to-village-secondary">
                                {{ ucfirst($activity->category) }}
                            </span>
                        </div>
                    @endif
                </div>
                
                <!-- Activity Content -->
                <div class="p-6">
                    <div class="flex items-center justify-between mb-3">
                        <div class="flex items-center text-sm text-gray-500">
                            <i class="fas fa-calendar mr-2"></i>
                            {{ $activity->activity_date->format('d M Y') }}
                        </div>
                    </div>
                    
                    <h3 class="text-lg font-semibold text-gray-900 mb-2 line-clamp-2">
                        {{ $activity->title }}
                    </h3>
                    
                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                        {{ Str::limit($activity->description, 100) }}
                    </p>
                    
                    <!-- Action Buttons -->
                    <div class="flex items-center space-x-2">
                        <a href="{{ route('admin.bpd.activities.edit', $activity->id) }}" 
                           class="flex-1 inline-flex items-center justify-center px-3 py-2 text-sm font-medium text-blue-600 bg-blue-100 rounded-md hover:bg-blue-200 transition-colors">
                            <i class="fas fa-edit mr-2"></i>
                            Edit
                        </a>
                        <button type="button" onclick="deleteActivity({{ $activity->id }})" 
                                class="flex-1 inline-flex items-center justify-center px-3 py-2 text-sm font-medium text-red-600 bg-red-100 rounded-md hover:bg-red-200 transition-colors">
                            <i class="fas fa-trash mr-2"></i>
                            Hapus
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    @if($activities->hasPages())
        <div class="flex justify-center">
            <div class="bg-white rounded-lg shadow border border-gray-100 p-4">
                {{ $activities->links() }}
            </div>
        </div>
    @endif
@else
    <!-- Empty State -->
    <div class="bg-white rounded-xl shadow-lg border border-gray-100 text-center py-12">
        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-camera text-gray-400 text-2xl"></i>
        </div>
        <h4 class="text-lg font-medium text-gray-900 mb-2">Belum Ada Kegiatan</h4>
        <p class="text-sm text-gray-500 mb-6">Tambahkan dokumentasi kegiatan BPD untuk ditampilkan di halaman publik</p>
        <a href="{{ route('admin.bpd.activities.create') }}" class="inline-flex items-center px-4 py-2 bg-village-primary text-white rounded-lg hover:bg-village-secondary transition-colors text-sm font-medium">
            <i class="fas fa-plus mr-2"></i>
            Tambah Kegiatan Pertama
        </a>
    </div>
@endif

<!-- Delete Modal -->
<div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <div class="flex items-center mb-4">
                <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                    <i class="fas fa-exclamation-triangle text-red-600"></i>
                </div>
            </div>
            <div class="text-center">
                <h3 class="text-lg leading-6 font-medium text-gray-900 mb-2">Konfirmasi Hapus</h3>
                <p class="text-sm text-gray-500 mb-2">Apakah Anda yakin ingin menghapus kegiatan ini?</p>
                <p class="text-xs text-red-600">Foto dan data kegiatan akan dihapus permanen.</p>
            </div>
            <div class="flex items-center justify-center space-x-3 mt-6">
                <button onclick="hideDeleteModal()" class="px-4 py-2 bg-gray-300 text-gray-800 text-sm font-medium rounded-md hover:bg-gray-400 transition-colors">
                    Batal
                </button>
                <form id="deleteForm" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-md hover:bg-red-700 transition-colors">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
function deleteActivity(id) {
    const form = document.getElementById('deleteForm');
    form.action = `/admin/bpd/activities/${id}`;
    document.getElementById('deleteModal').classList.remove('hidden');
}

function hideDeleteModal() {
    document.getElementById('deleteModal').classList.add('hidden');
}

// Close modal when clicking outside
document.getElementById('deleteModal').addEventListener('click', function(e) {
    if (e.target === this) {
        hideDeleteModal();
    }
});
</script>
@endpush
