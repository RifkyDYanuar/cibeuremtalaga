@extends('layouts.admin')

@section('title', 'Manajemen Pembangunan Desa')

@section('content')
<div class="container mx-auto px-4 py-6">
    <!-- Header -->
    <div class="bg-gradient-to-r from-village-primary to-village-secondary rounded-2xl shadow-xl p-6 mb-8">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center">
            <div class="text-white mb-4 sm:mb-0">
                <h1 class="text-2xl lg:text-3xl font-bold mb-2">
                    <i class="fas fa-hammer mr-3"></i>Manajemen Pembangunan Desa
                </h1>
                <p class="text-white/90 text-sm lg:text-base">
                    Kelola dan pantau proyek pembangunan desa secara terpadu
                </p>
            </div>
            <a href="{{ route('admin.pembangunan.create') }}" 
               class="bg-white text-village-primary px-6 py-3 rounded-xl font-semibold hover:bg-gray-50 transition-all duration-300 shadow-lg hover:shadow-xl flex items-center">
                <i class="fas fa-plus mr-2"></i>Tambah Proyek
            </a>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Proyek -->
        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 bg-gradient-to-r from-blue-50 to-blue-100">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-project-diagram text-white text-lg"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Proyek</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $totalProyek }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Proyek Selesai -->
        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 bg-gradient-to-r from-green-50 to-green-100">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-green-600 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-check-circle text-white text-lg"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600">Proyek Selesai</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $proyekSelesai }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dalam Proses -->
        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 bg-gradient-to-r from-yellow-50 to-yellow-100">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-cog text-white text-lg"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600">Dalam Proses</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $proyekProses }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Anggaran -->
        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 bg-gradient-to-r from-purple-50 to-purple-100">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-money-bill-wave text-white text-lg"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Anggaran</p>
                        <p class="text-lg font-bold text-gray-900">Rp {{ number_format($totalAnggaran, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6" role="alert">
            <div class="flex items-center">
                <i class="fas fa-check-circle mr-2"></i>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif

    <!-- Table -->
    <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-gray-100">
            <div class="flex justify-between items-center">
                <h3 class="text-lg font-semibold text-gray-900">
                    <i class="fas fa-list mr-2 text-village-primary"></i>Data Pembangunan
                </h3>
                <div id="bulkActions" class="hidden">
                    <button onclick="bulkDelete()" class="px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-md hover:bg-red-700 transition-colors">
                        <i class="fas fa-trash mr-2"></i>Hapus Terpilih
                    </button>
                </div>
            </div>
        </div>
        
        @if($pembangunan->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <input type="checkbox" id="selectAll" class="rounded border-gray-300 text-village-primary focus:ring-village-primary">
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Proyek</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Progress</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Anggaran</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Target</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($pembangunan as $item)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4">
                                    <input type="checkbox" name="selected_items[]" value="{{ $item->id }}" class="item-checkbox rounded border-gray-300 text-village-primary focus:ring-village-primary">
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <img class="h-12 w-12 rounded-lg object-cover mr-4" 
                                             src="{{ $item->main_image_url }}" 
                                             alt="{{ $item->nama_proyek }}">
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">{{ $item->nama_proyek }}</div>
                                            <div class="text-sm text-gray-500">{{ $item->lokasi }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        {{ $item->kategori_label }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $item->status_badge }}">
                                        {{ $item->status_label }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="w-16 bg-gray-200 rounded-full h-2 mr-2">
                                            <div class="bg-village-primary h-2 rounded-full" style="width: {{ $item->progress }}%"></div>
                                        </div>
                                        <span class="text-sm text-gray-900">{{ $item->progress }}%</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">Rp {{ number_format($item->anggaran, 0, ',', '.') }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">{{ $item->tanggal_target->format('d/m/Y') }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <a href="{{ route('admin.pembangunan.show', $item->id) }}" 
                                           class="text-blue-600 hover:text-blue-900 text-sm bg-blue-50 hover:bg-blue-100 px-3 py-1 rounded-lg transition-colors">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.pembangunan.edit', $item->id) }}" 
                                           class="text-yellow-600 hover:text-yellow-900 text-sm bg-yellow-50 hover:bg-yellow-100 px-3 py-1 rounded-lg transition-colors">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" onclick="deletePembangunan({{ $item->id }})" 
                                                class="text-red-600 hover:text-red-900 text-sm bg-red-50 hover:bg-red-100 px-3 py-1 rounded-lg transition-colors">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="px-6 py-4 border-t border-gray-100">
                {{ $pembangunan->links() }}
            </div>
        @else
            <div class="text-center py-12">
                <i class="fas fa-folder-open text-gray-400 text-5xl mb-4"></i>
                <h3 class="text-lg font-medium text-gray-900 mb-2">Belum Ada Data Pembangunan</h3>
                <p class="text-gray-500 mb-6">Tambahkan data proyek pembangunan desa pertama Anda.</p>
                <a href="{{ route('admin.pembangunan.create') }}" 
                   class="inline-flex items-center px-6 py-3 bg-village-primary text-white font-semibold rounded-xl hover:bg-village-secondary transition-colors">
                    <i class="fas fa-plus mr-2"></i>Tambah Proyek Pembangunan
                </a>
            </div>
        @endif
    </div>
</div>

<!-- Delete Modal -->
<div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="relative bg-white rounded-lg w-full max-w-md mx-auto">
            <!-- Modal content -->
            <div class="p-6">
                <!-- Modal header -->
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Konfirmasi Hapus</h3>
                    <button onclick="hideDeleteModal()" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                
                <!-- Modal body -->
                <div class="mb-4">
                    <p class="text-sm text-gray-500 mb-2">Apakah Anda yakin ingin menghapus proyek pembangunan ini?</p>
                    <p class="text-xs text-red-600">Semua gambar dan data proyek akan dihapus permanen.</p>
                </div>
                
                <!-- Modal footer -->
                <div class="flex justify-end space-x-3">
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
</div>

<script>
function deletePembangunan(id) {
    const form = document.getElementById('deleteForm');
    form.action = `/admin/pembangunan/${id}`;
    document.getElementById('deleteModal').classList.remove('hidden');
}

function hideDeleteModal() {
    document.getElementById('deleteModal').classList.add('hidden');
}

// Bulk delete functionality
function bulkDelete() {
    const selected = document.querySelectorAll('.item-checkbox:checked');
    if (selected.length === 0) {
        alert('Pilih setidaknya satu item untuk dihapus');
        return;
    }
    
    if (confirm(`Apakah Anda yakin ingin menghapus ${selected.length} proyek pembangunan? Semua gambar dan data akan dihapus permanen.`)) {
        const ids = Array.from(selected).map(cb => cb.value);
        
        // Create form for bulk delete
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '{{ route("admin.pembangunan.bulk-delete") }}';
        
        const csrfToken = document.createElement('input');
        csrfToken.type = 'hidden';
        csrfToken.name = '_token';
        csrfToken.value = '{{ csrf_token() }}';
        form.appendChild(csrfToken);
        
        const methodField = document.createElement('input');
        methodField.type = 'hidden';
        methodField.name = '_method';
        methodField.value = 'DELETE';
        form.appendChild(methodField);
        
        ids.forEach(id => {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'ids[]';
            input.value = id;
            form.appendChild(input);
        });
        
        document.body.appendChild(form);
        form.submit();
    }
}

// Select all functionality
document.getElementById('selectAll').addEventListener('change', function() {
    const checkboxes = document.querySelectorAll('.item-checkbox');
    checkboxes.forEach(cb => cb.checked = this.checked);
    toggleBulkActions();
});

// Individual checkbox change
document.addEventListener('change', function(e) {
    if (e.target.classList.contains('item-checkbox')) {
        toggleBulkActions();
        
        // Update select all checkbox
        const total = document.querySelectorAll('.item-checkbox').length;
        const checked = document.querySelectorAll('.item-checkbox:checked').length;
        const selectAll = document.getElementById('selectAll');
        
        selectAll.checked = checked === total;
        selectAll.indeterminate = checked > 0 && checked < total;
    }
});

function toggleBulkActions() {
    const selected = document.querySelectorAll('.item-checkbox:checked').length;
    const bulkActions = document.getElementById('bulkActions');
    
    if (selected > 0) {
        bulkActions.classList.remove('hidden');
    } else {
        bulkActions.classList.add('hidden');
    }
}

// Close modal when clicking outside
document.getElementById('deleteModal').addEventListener('click', function(e) {
    if (e.target === this) {
        hideDeleteModal();
    }
});
</script>
@endsection
