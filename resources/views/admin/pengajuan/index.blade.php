@extends('layouts.admin')

@section('content')
<div class="p-4 md:p-6">
    <!-- Header Section -->
    <div class="mb-6 md:mb-8">
        <div class="flex flex-col gap-4">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2 flex items-center gap-2 md:gap-3">
                    <i class="fas fa-clipboard-list text-emerald-600 text-xl md:text-2xl"></i>
                    <span class="hidden sm:inline">Manajemen Pengajuan Surat</span>
                    <span class="sm:hidden">Pengajuan Surat</span>
                </h1>
                <div class="flex items-center text-sm text-gray-600 gap-2">
                    <span>Dashboard</span> 
                    <i class="fas fa-chevron-right text-xs"></i> 
                    <span class="text-emerald-600 font-medium">Manajemen Pengajuan</span>
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

    <!-- Statistics Cards -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-white rounded-lg p-4 shadow-md border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600">Total</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $pengajuans->total() }}</p>
                </div>
                <div class="bg-blue-100 p-3 rounded-full">
                    <i class="fas fa-file-alt text-blue-600"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg p-4 shadow-md border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600">Pending</p>
                    <p class="text-2xl font-bold text-yellow-600">{{ $pengajuans->where('status', 'Pending')->count() }}</p>
                </div>
                <div class="bg-yellow-100 p-3 rounded-full">
                    <i class="fas fa-clock text-yellow-600"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg p-4 shadow-md border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600">Disetujui</p>
                    <p class="text-2xl font-bold text-green-600">{{ $pengajuans->where('status', 'Disetujui')->count() }}</p>
                </div>
                <div class="bg-green-100 p-3 rounded-full">
                    <i class="fas fa-check-circle text-green-600"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg p-4 shadow-md border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600">Ditolak</p>
                    <p class="text-2xl font-bold text-red-600">{{ $pengajuans->where('status', 'Ditolak')->count() }}</p>
                </div>
                <div class="bg-red-100 p-3 rounded-full">
                    <i class="fas fa-times-circle text-red-600"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters and Search Section -->
    <div class="mb-4 md:mb-6">
        <div class="bg-white/80 backdrop-blur-sm rounded-xl md:rounded-2xl shadow-lg border border-white/20 p-4 md:p-6">
            <h3 class="text-base md:text-lg font-semibold text-gray-900 mb-3 md:mb-4">Filter & Pencarian</h3>
            <form method="GET" action="{{ route('admin.pengajuan.index') }}">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 md:gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Pencarian</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-search text-gray-400 text-sm"></i>
                            </div>
                            <input type="text" name="search" value="{{ request('search') }}"
                                   class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200 text-sm md:text-base" 
                                   placeholder="Cari nama, email, atau jenis surat...">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <select name="status"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200 text-sm md:text-base">
                            <option value="">Semua Status</option>
                            <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Diproses" {{ request('status') == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                            <option value="Disetujui" {{ request('status') == 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
                            <option value="Ditolak" {{ request('status') == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Surat</label>
                        <select name="jenis_surat_id"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200 text-sm md:text-base">
                            <option value="">Semua Jenis</option>
                            @foreach($jenisSurats as $jenis)
                                <option value="{{ $jenis->id }}" {{ request('jenis_surat_id') == $jenis->id ? 'selected' : '' }}>
                                    {{ $jenis->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex items-end gap-2">
                        <button type="submit" 
                                class="px-4 py-2 bg-emerald-600 text-white font-medium rounded-lg hover:bg-emerald-700 transition-all duration-200 shadow-md hover:shadow-lg">
                            <i class="fas fa-search mr-1"></i> Cari
                        </button>
                        <a href="{{ route('admin.pengajuan.index') }}" 
                           class="px-4 py-2 bg-gray-500 text-white font-medium rounded-lg hover:bg-gray-600 transition-all duration-200 shadow-md hover:shadow-lg">
                            <i class="fas fa-refresh mr-1"></i> Reset
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Data Table -->
    <div class="bg-white/80 backdrop-blur-sm rounded-xl md:rounded-2xl shadow-lg border border-white/20 overflow-hidden">
        <div class="px-4 md:px-6 py-3 md:py-4 bg-gradient-to-r from-emerald-600 to-teal-600">
            <div class="flex items-center justify-between">
                <h3 class="text-base md:text-lg font-semibold text-white">Daftar Pengajuan Surat</h3>
                <div class="flex items-center gap-2">
                    <button onclick="toggleBulkActions()" 
                            class="px-3 py-1 bg-white/20 text-white rounded-lg hover:bg-white/30 transition-colors text-sm">
                        <i class="fas fa-tasks mr-1"></i> Bulk Actions
                    </button>
                    <a href="{{ route('admin.pengajuan.export') }}" 
                       class="px-3 py-1 bg-white/20 text-white rounded-lg hover:bg-white/30 transition-colors text-sm">
                        <i class="fas fa-download mr-1"></i> Export
                    </a>
                </div>
            </div>
        </div>
        
        <div class="p-4 md:p-6">
            @if($pengajuans->count() > 0)
                <!-- Bulk Actions Form -->
                <div id="bulkActionsForm" class="hidden mb-4 p-4 bg-gray-50 rounded-lg">
                    <form method="POST" action="{{ route('admin.pengajuan.bulk-update') }}">
                        @csrf
                        <div class="flex items-center gap-4">
                            <select name="status" required class="px-3 py-2 border rounded-lg">
                                <option value="">Pilih Status</option>
                                <option value="Pending">Pending</option>
                                <option value="Diproses">Diproses</option>
                                <option value="Disetujui">Disetujui</option>
                                <option value="Ditolak">Ditolak</option>
                            </select>
                            <input type="text" name="catatan_admin" placeholder="Catatan (opsional)" class="px-3 py-2 border rounded-lg flex-1">
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                                <i class="fas fa-save mr-1"></i> Update Terpilih
                            </button>
                        </div>
                        <div id="selectedIds"></div>
                    </form>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-3 md:px-6 py-2 md:py-3 text-left">
                                    <input type="checkbox" id="selectAll" class="rounded">
                                </th>
                                <th class="px-3 md:px-6 py-2 md:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                                <th class="px-3 md:px-6 py-2 md:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama User</th>
                                <th class="px-3 md:px-6 py-2 md:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden sm:table-cell">Jenis Surat</th>
                                <th class="px-3 md:px-6 py-2 md:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-3 md:px-6 py-2 md:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">Tanggal</th>
                                <th class="px-3 md:px-6 py-2 md:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($pengajuans as $pengajuan)
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-3 md:px-6 py-3 md:py-4 whitespace-nowrap">
                                    <input type="checkbox" name="pengajuan_ids[]" value="{{ $pengajuan->id }}" class="pengajuan-checkbox rounded">
                                </td>
                                <td class="px-3 md:px-6 py-3 md:py-4 whitespace-nowrap text-xs md:text-sm font-medium text-gray-900">
                                    {{ ($pengajuans->currentPage() - 1) * $pengajuans->perPage() + $loop->iteration }}
                                </td>
                                <td class="px-3 md:px-6 py-3 md:py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-8 w-8 md:h-10 md:w-10">
                                            <div class="h-8 w-8 md:h-10 md:w-10 rounded-full bg-gradient-to-r from-emerald-400 to-teal-500 flex items-center justify-center">
                                                <i class="fas fa-user text-white text-xs md:text-sm"></i>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{ $pengajuan->user->name ?? '-' }}</div>
                                            <div class="text-sm text-gray-500">{{ $pengajuan->user->email ?? '-' }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap hidden sm:table-cell">
                                    <div class="flex items-center">
                                        <i class="fas fa-file-alt text-blue-500 mr-2"></i>
                                        <span class="text-sm text-gray-900">{{ $pengajuan->jenisSurat->nama ?? '-' }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($pengajuan->status == 'Pending')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                            <i class="fas fa-clock mr-1"></i> Pending
                                        </span>
                                    @elseif($pengajuan->status == 'Diproses')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            <i class="fas fa-cog mr-1"></i> Diproses
                                        </span>
                                    @elseif($pengajuan->status == 'Disetujui')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            <i class="fas fa-check mr-1"></i> Disetujui
                                        </span>
                                    @elseif($pengajuan->status == 'Ditolak')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                            <i class="fas fa-times mr-1"></i> Ditolak
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                            <i class="fas fa-question mr-1"></i> {{ $pengajuan->status }}
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap hidden md:table-cell">
                                    <div class="flex items-center text-sm text-gray-900">
                                        <i class="fas fa-calendar-alt text-gray-400 mr-2"></i>
                                        <div>
                                            <div>{{ $pengajuan->created_at->format('d M Y') }}</div>
                                            <div class="text-xs text-gray-500">{{ $pengajuan->created_at->format('H:i') }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('admin.pengajuan.show', $pengajuan->id) }}" 
                                           class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 transition-colors duration-200">
                                            <i class="fas fa-eye mr-1"></i> Detail
                                        </a>
                                        <a href="{{ route('admin.pengajuan.edit', $pengajuan->id) }}" 
                                           class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-emerald-600 hover:bg-emerald-700 transition-colors duration-200">
                                            <i class="fas fa-edit mr-1"></i> Edit
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-6">
                    {{ $pengajuans->links() }}
                </div>
            @else
                <div class="text-center py-12">
                    <div class="w-24 h-24 mx-auto mb-4 bg-gray-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-inbox text-gray-400 text-3xl"></i>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Tidak ada pengajuan</h3>
                    <p class="text-gray-500">Belum ada pengajuan surat yang masuk</p>
                </div>
            @endif
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const selectAllCheckbox = document.getElementById('selectAll');
    const pengajuanCheckboxes = document.querySelectorAll('.pengajuan-checkbox');
    const bulkActionsForm = document.getElementById('bulkActionsForm');
    const selectedIdsContainer = document.getElementById('selectedIds');

    // Select All functionality
    selectAllCheckbox?.addEventListener('change', function() {
        pengajuanCheckboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
        updateSelectedIds();
    });

    // Individual checkbox change
    pengajuanCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            updateSelectedIds();
            
            // Update select all checkbox state
            const checkedCount = document.querySelectorAll('.pengajuan-checkbox:checked').length;
            selectAllCheckbox.checked = checkedCount === pengajuanCheckboxes.length;
            selectAllCheckbox.indeterminate = checkedCount > 0 && checkedCount < pengajuanCheckboxes.length;
        });
    });

    function updateSelectedIds() {
        const checkedBoxes = document.querySelectorAll('.pengajuan-checkbox:checked');
        selectedIdsContainer.innerHTML = '';
        
        checkedBoxes.forEach(checkbox => {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'pengajuan_ids[]';
            input.value = checkbox.value;
            selectedIdsContainer.appendChild(input);
        });
    }

    window.toggleBulkActions = function() {
        bulkActionsForm.classList.toggle('hidden');
    }
});
</script>
@endsection
