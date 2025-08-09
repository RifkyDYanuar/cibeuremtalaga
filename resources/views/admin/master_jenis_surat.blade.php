{{-- Manajemen master data jenis surat oleh admin --}}
@extends('layouts.admin')
@section('content')
<div class="p-4 md:p-6">
    <!-- Header Section -->
    <div class="mb-4 md:mb-6">
        <div class="flex flex-col gap-4">
            <div>
                <h1 class="text-xl md:text-2xl font-bold text-gray-900 mb-1 flex items-center gap-2">
                    <i class="fas fa-file-contract text-emerald-600 text-lg md:text-xl"></i>
                    <span class="hidden sm:inline">Master Jenis Surat</span>
                    <span class="sm:hidden">Jenis Surat</span>
                </h1>
                <p class="text-xs md:text-sm text-gray-600">Kelola jenis surat desa</p>
            </div>
            <div class="bg-white/80 backdrop-blur-sm rounded-lg shadow-md border border-white/20 px-3 py-2 self-start">
                <div class="flex items-center gap-2 text-gray-700">
                    <i class="fas fa-list text-emerald-600 text-sm"></i>
                    <span class="font-medium text-xs md:text-sm">{{ $jenisSurats->count() }} Jenis</span>
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-4 md:mb-6 bg-green-50 border border-green-200 text-green-800 px-3 md:px-4 py-3 rounded-lg flex items-center text-sm md:text-base">
            <i class="fas fa-check-circle mr-2"></i>
            <span class="flex-1">{{ session('success') }}</span>
            <button type="button" class="ml-2 text-green-600 hover:text-green-800 p-1" onclick="this.parentElement.style.display='none'">
                <i class="fas fa-times"></i>
            </button>
        </div>
    @endif

    @if(session('error'))
        <div class="mb-4 md:mb-6 bg-red-50 border border-red-200 text-red-800 px-3 md:px-4 py-3 rounded-lg flex items-center text-sm md:text-base">
            <i class="fas fa-exclamation-circle mr-2"></i>
            <span class="flex-1">{{ session('error') }}</span>
            <button type="button" class="ml-2 text-red-600 hover:text-red-800 p-1" onclick="this.parentElement.style.display='none'">
                <i class="fas fa-times"></i>
            </button>
        </div>
    @endif

    <!-- Form Tambah Jenis Surat -->
    <div class="mb-4 md:mb-6 bg-white/80 backdrop-blur-sm rounded-xl shadow-lg border border-white/20 overflow-hidden">
        <div class="px-3 md:px-4 py-3 bg-gradient-to-r from-emerald-600 to-teal-600">
            <h3 class="text-base md:text-lg font-semibold text-white flex items-center gap-2">
                <i class="fas fa-plus-circle text-sm md:text-base"></i>
                <span class="hidden sm:inline">Tambah Jenis Surat</span>
                <span class="sm:hidden">Tambah</span>
            </h3>
        </div>
        <div class="p-3 md:p-4">
            <form method="POST" action="{{ url('admin/master/jenis-surat') }}" id="addForm">
                @csrf
                <div class="grid grid-cols-1 gap-3 md:gap-4 mb-3 md:mb-4">
                    <div>
                        <input type="text" name="nama" required
                               class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200" 
                               placeholder="Nama jenis surat">
                    </div>
                    <div>
                        <input type="text" name="deskripsi" 
                               class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200" 
                               placeholder="Deskripsi (opsional)">
                    </div>
                </div>
                <div class="flex flex-col sm:flex-row gap-2 justify-end">
                    <button type="submit" 
                            class="inline-flex items-center justify-center px-4 py-2 bg-gradient-to-r from-emerald-600 to-teal-600 text-white text-sm font-semibold rounded-lg hover:from-emerald-700 hover:to-teal-700 transition-all duration-200">
                        <i class="fas fa-plus mr-1"></i> 
                        <span class="hidden sm:inline">Tambah</span>
                        <span class="sm:hidden">Add</span>
                    </button>
                    <button type="reset" 
                            class="inline-flex items-center justify-center px-4 py-2 bg-gray-500 text-white text-sm font-medium rounded-lg hover:bg-gray-600 transition-all duration-200">
                        <i class="fas fa-eraser mr-1"></i> Reset
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Tabel Jenis Surat -->
    <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-lg border border-white/20 overflow-hidden">
        <div class="px-3 md:px-4 py-3 bg-gradient-to-r from-emerald-600 to-teal-600">
            <div class="flex flex-col gap-3">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                    <h3 class="text-base md:text-lg font-semibold text-white flex items-center gap-2">
                        <i class="fas fa-table text-sm md:text-base"></i>
                        <span class="hidden sm:inline">Daftar Jenis Surat</span>
                        <span class="sm:hidden">Daftar</span>
                    </h3>
                    <div class="flex bg-white/10 rounded-lg p-1">
                        <button class="toggle-btn active px-2 py-1 rounded transition-all duration-200" data-view="table">
                            <i class="fas fa-table text-xs md:text-sm"></i>
                        </button>
                        <button class="toggle-btn px-2 py-1 rounded transition-all duration-200" data-view="grid">
                            <i class="fas fa-th-large text-xs md:text-sm"></i>
                        </button>
                    </div>
                </div>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400 text-sm"></i>
                    </div>
                    <input type="text" id="searchInput" 
                           class="w-full pl-8 pr-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-white/20 focus:border-white/30 transition-all duration-200 bg-white/10 text-white placeholder-white/70" 
                           placeholder="Cari jenis surat...">
                </div>
            </div>
        </div>
        
        <!-- Table View -->
        <div id="tableView" class="p-3 md:p-4">
            @if($jenisSurats->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-2 md:px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                            <th class="px-2 md:px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Nama Jenis Surat</th>
                            <th class="px-2 md:px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase hidden sm:table-cell">Deskripsi</th>
                            <th class="px-2 md:px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase hidden md:table-cell">Tanggal</th>
                            <th class="px-2 md:px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody" class="bg-white divide-y divide-gray-200">
                        @foreach($jenisSurats as $jenis)
                        <tr class="table-row hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-2 md:px-3 py-3 whitespace-nowrap text-xs md:text-sm font-medium text-gray-900">{{ $loop->iteration }}</td>
                            <td class="px-2 md:px-3 py-3 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="w-6 h-6 md:w-8 md:h-8 rounded-lg bg-gradient-to-r from-emerald-400 to-teal-500 flex items-center justify-center mr-2 md:mr-3">
                                        <i class="fas fa-file-alt text-white text-xs md:text-sm"></i>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <div class="text-xs md:text-sm font-medium text-gray-900 document-name truncate">{{ $jenis->nama }}</div>
                                        <div class="text-xs text-gray-500 sm:hidden">ID: {{ $jenis->id }}</div>
                                        <div class="text-xs text-gray-500 hidden sm:block">ID: {{ $jenis->id }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-2 md:px-3 py-3 hidden sm:table-cell">
                                <span class="text-xs md:text-sm text-gray-900 description-text">{{ Str::limit($jenis->deskripsi ?: '-', 30) }}</span>
                            </td>
                            <td class="px-2 md:px-3 py-3 whitespace-nowrap hidden md:table-cell">
                                <div class="text-xs md:text-sm text-gray-900">{{ $jenis->created_at->format('d/m/Y') }}</div>
                                <div class="text-xs text-gray-500">{{ $jenis->created_at->format('H:i') }}</div>
                            </td>
                            <td class="px-2 md:px-3 py-3 whitespace-nowrap text-xs font-medium">
                                <div class="flex space-x-1">
                                    <button onclick="editJenis({{ $jenis->id }}, '{{ addslashes($jenis->nama) }}', '{{ addslashes($jenis->deskripsi) }}')" 
                                            class="inline-flex items-center p-1.5 text-xs text-white bg-yellow-600 hover:bg-yellow-700 rounded transition-colors duration-200">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form method="POST" action="{{ url('admin/master/jenis-surat/'.$jenis->id) }}" class="inline" onsubmit="return confirmDelete('{{ addslashes($jenis->nama) }}')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="inline-flex items-center p-1.5 text-xs text-white bg-red-600 hover:bg-red-700 rounded transition-colors duration-200">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="text-center py-6 md:py-8">
                <div class="w-12 h-12 md:w-16 md:h-16 mx-auto mb-3 bg-gray-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-inbox text-gray-400 text-xl md:text-2xl"></i>
                </div>
                <h3 class="text-sm md:text-base font-medium text-gray-900 mb-1">Belum ada jenis surat</h3>
                <p class="text-xs md:text-sm text-gray-500">Tambahkan jenis surat menggunakan form di atas</p>
            </div>
            @endif
        </div>

        <!-- Grid View -->
        <div id="gridView" class="p-3 md:p-4" style="display: none;">
            @if($jenisSurats->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 md:gap-4">
                @foreach($jenisSurats as $jenis)
                <div class="bg-white rounded-lg border border-gray-200 p-3 md:p-4 hover:shadow-lg transition-all duration-200">
                    <div class="flex items-center justify-between mb-3">
                        <div class="w-8 h-8 md:w-10 md:h-10 bg-gradient-to-r from-emerald-400 to-teal-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-file-alt text-white text-sm md:text-base"></i>
                        </div>
                        <div class="flex space-x-1">
                            <button onclick="editJenis({{ $jenis->id }}, '{{ addslashes($jenis->nama) }}', '{{ addslashes($jenis->deskripsi) }}')" 
                                    class="p-1.5 text-yellow-600 hover:bg-yellow-50 rounded transition-colors duration-200">
                                <i class="fas fa-edit text-xs md:text-sm"></i>
                            </button>
                            <form method="POST" action="{{ url('admin/master/jenis-surat/'.$jenis->id) }}" class="inline" onsubmit="return confirmDelete('{{ addslashes($jenis->nama) }}')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="p-1.5 text-red-600 hover:bg-red-50 rounded transition-colors duration-200">
                                    <i class="fas fa-trash text-xs md:text-sm"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="mb-3">
                        <h4 class="font-semibold text-gray-900 mb-1 text-xs md:text-sm truncate">{{ $jenis->nama }}</h4>
                        <p class="text-xs text-gray-600 line-clamp-2">{{ Str::limit($jenis->deskripsi ?: 'Tidak ada deskripsi', 50) }}</p>
                    </div>
                    <div class="pt-3 border-t border-gray-200">
                        <div class="flex items-center text-xs text-gray-500">
                            <i class="fas fa-calendar-alt mr-1"></i>
                            {{ $jenis->created_at->format('d M Y') }}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-6 md:py-8">
                <div class="w-12 h-12 md:w-16 md:h-16 mx-auto mb-3 bg-gray-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-inbox text-gray-400 text-xl md:text-2xl"></i>
                </div>
                <h3 class="text-sm md:text-base font-medium text-gray-900 mb-1">Belum ada jenis surat</h3>
                <p class="text-xs md:text-sm text-gray-500">Tambahkan jenis surat menggunakan form di atas</p>
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-4 md:p-5 border w-full max-w-sm md:max-w-md shadow-lg rounded-xl bg-white">
        <div class="px-3 md:px-4 py-3 bg-gradient-to-r from-yellow-500 to-orange-500 rounded-t-xl -mx-4 md:-mx-5 -mt-4 md:-mt-5 mb-4">
            <div class="flex justify-between items-center">
                <h4 class="text-base md:text-lg font-semibold text-white flex items-center gap-2">
                    <i class="fas fa-edit text-sm md:text-base"></i>
                    <span class="hidden sm:inline">Edit Jenis Surat</span>
                    <span class="sm:hidden">Edit</span>
                </h4>
                <button class="text-white hover:text-gray-200 transition-colors duration-200 p-1" onclick="closeModal()">
                    <i class="fas fa-times text-lg md:text-xl"></i>
                </button>
            </div>
        </div>
        <form method="POST" id="editForm">
            @csrf
            @method('PUT')
            <div class="space-y-3 md:space-y-4">
                <div>
                    <input type="text" name="nama" id="editNama" required
                           class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all duration-200"
                           placeholder="Nama jenis surat">
                </div>
                <div>
                    <input type="text" name="deskripsi" id="editDeskripsi"
                           class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all duration-200"
                           placeholder="Deskripsi (opsional)">
                </div>
            </div>
            <div class="flex flex-col sm:flex-row justify-end space-y-2 sm:space-y-0 sm:space-x-2 mt-4 pt-4 border-t border-gray-200">
                <button type="button" onclick="closeModal()" 
                        class="w-full sm:w-auto px-3 py-2 text-sm border border-gray-300 rounded-lg text-gray-700 bg-white hover:bg-gray-50 transition-colors duration-200">
                    Batal
                </button>
                <button type="submit" 
                        class="w-full sm:w-auto px-3 py-2 text-sm bg-gradient-to-r from-yellow-500 to-orange-500 text-white rounded-lg hover:from-yellow-600 hover:to-orange-600 transition-all duration-200">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<style>
.toggle-btn.active {
    background: rgba(255, 255, 255, 0.2);
    color: white;
}

.toggle-btn {
    color: rgba(255, 255, 255, 0.7);
}

.toggle-btn:hover {
    background: rgba(255, 255, 255, 0.1);
}

.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* Mobile optimizations */
@media (max-width: 640px) {
    .grid-cols-1.sm\\:grid-cols-2.lg\\:grid-cols-3 {
        grid-template-columns: 1fr;
    }
    
    /* Ensure modal is responsive on mobile */
    #editModal > div {
        margin: 1rem;
        width: calc(100% - 2rem);
        max-width: none;
        top: 2rem;
    }
    
    /* Better touch targets */
    button {
        min-height: 44px;
    }
    
    /* Improve table scroll on mobile */
    .overflow-x-auto {
        -webkit-overflow-scrolling: touch;
    }
}

@media (max-width: 768px) {
    /* Stack form fields on mobile */
    .grid-cols-1.gap-3.md\\:gap-4 {
        gap: 0.75rem;
    }
    
    /* Ensure buttons are touch-friendly */
    .flex.space-x-1 button {
        min-width: 36px;
        min-height: 36px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const tableBody = document.getElementById('tableBody');
    const rows = tableBody?.querySelectorAll('.table-row') || [];
    const toggleBtns = document.querySelectorAll('.toggle-btn');
    const tableView = document.getElementById('tableView');
    const gridView = document.getElementById('gridView');

    // Search functionality
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        rows.forEach(row => {
            const nama = row.querySelector('.document-name')?.textContent.toLowerCase() || '';
            const deskripsi = row.querySelector('.description-text')?.textContent.toLowerCase() || '';
            
            if (nama.includes(searchTerm) || deskripsi.includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });

    // View toggle functionality
    toggleBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const view = this.dataset.view;
            
            toggleBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            if (view === 'table') {
                tableView.style.display = 'block';
                gridView.style.display = 'none';
            } else {
                tableView.style.display = 'none';
                gridView.style.display = 'block';
            }
        });
    });
});

function editJenis(id, nama, deskripsi) {
    document.getElementById('editNama').value = nama;
    document.getElementById('editDeskripsi').value = deskripsi;
    document.getElementById('editForm').action = `/admin/master/jenis-surat/${id}`;
    document.getElementById('editModal').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('editModal').classList.add('hidden');
}

function confirmDelete(nama) {
    return confirm(`Apakah Anda yakin ingin menghapus jenis surat "${nama}"?\n\nTindakan ini tidak dapat dibatalkan.`);
}

// Close modal when clicking outside
window.onclick = function(event) {
    const modal = document.getElementById('editModal');
    if (event.target === modal) {
        closeModal();
    }
}
</script>
@endsection