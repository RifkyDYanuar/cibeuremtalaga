{{-- Daftar semua pengajuan surat dari user (admin view) --}}
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

    <!-- Filters and Search Section -->
    <div class="mb-4 md:mb-6">
        <div class="bg-white/80 backdrop-blur-sm rounded-xl md:rounded-2xl shadow-lg border border-white/20 p-4 md:p-6">
            <h3 class="text-base md:text-lg font-semibold text-gray-900 mb-3 md:mb-4">Filter & Pencarian</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 md:gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Pencarian</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400 text-sm"></i>
                        </div>
                        <input type="text" id="searchInput" 
                               class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200 text-sm md:text-base" 
                               placeholder="Cari nama, email, atau jenis surat...">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <select id="statusFilter" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200 text-sm md:text-base">
                        <option value="">Semua Status</option>
                        <option value="pending">Pending</option>
                        <option value="approved">Approved</option>
                        <option value="rejected">Rejected</option>
                    </select>
                </div>
                <div class="flex items-end">
                    <button onclick="resetFilters()" 
                            class="px-4 py-2 bg-gray-500 text-white font-medium rounded-lg hover:bg-gray-600 transition-all duration-200 shadow-md hover:shadow-lg">
                        <i class="fas fa-refresh mr-1"></i> Reset
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Data Table -->
    <!-- Data Table -->
    <div class="bg-white/80 backdrop-blur-sm rounded-xl md:rounded-2xl shadow-lg border border-white/20 overflow-hidden">
        <div class="px-4 md:px-6 py-3 md:py-4 bg-gradient-to-r from-emerald-600 to-teal-600">
            <h3 class="text-base md:text-lg font-semibold text-white">Daftar Pengajuan Surat</h3>
        </div>
        
        <div class="p-4 md:p-6">
            @if($pengajuans->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-3 md:px-6 py-2 md:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                            <th class="px-3 md:px-6 py-2 md:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama User</th>
                            <th class="px-3 md:px-6 py-2 md:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden sm:table-cell">Jenis Surat</th>
                            <th class="px-3 md:px-6 py-2 md:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-3 md:px-6 py-2 md:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">Tanggal</th>
                            <th class="px-3 md:px-6 py-2 md:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody" class="bg-white divide-y divide-gray-200">
                        @foreach($pengajuans as $pengajuan)
                        <tr class="table-row hover:bg-gray-50 transition-colors duration-200" data-status="{{ $pengajuan->status }}">
                            <td class="px-3 md:px-6 py-3 md:py-4 whitespace-nowrap text-xs md:text-sm font-medium text-gray-900">{{ $loop->iteration }}</td>
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
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <i class="fas fa-file-alt text-blue-500 mr-2"></i>
                                    <span class="text-sm text-gray-900">{{ $pengajuan->jenisSurat->nama ?? '-' }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($pengajuan->status == 'pending')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                        <i class="fas fa-clock mr-1"></i> Pending
                                    </span>
                                @elseif($pengajuan->status == 'approved')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        <i class="fas fa-check mr-1"></i> Approved
                                    </span>
                                @elseif($pengajuan->status == 'rejected')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        <i class="fas fa-times mr-1"></i> Rejected
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                        <i class="fas fa-question mr-1"></i> {{ $pengajuan->status }}
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center text-sm text-gray-900">
                                    <i class="fas fa-calendar-alt text-gray-400 mr-2"></i>
                                    <div>
                                        <div>{{ $pengajuan->created_at->format('d M Y') }}</div>
                                        <div class="text-xs text-gray-500">{{ $pengajuan->created_at->format('H:i') }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('admin.pengajuan.detail', $pengajuan->id) }}" 
                                   class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 transition-colors duration-200">
                                    <i class="fas fa-eye mr-1"></i> Detail
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
    const searchInput = document.getElementById('searchInput');
    const statusFilter = document.getElementById('statusFilter');
    const tableBody = document.getElementById('tableBody');
    const rows = tableBody.querySelectorAll('.table-row');

    // Search functionality
    searchInput.addEventListener('input', function() {
        filterTable();
    });

    // Status filter functionality
    statusFilter.addEventListener('change', function() {
        filterTable();
    });

    function filterTable() {
        const searchTerm = searchInput.value.toLowerCase();
        const statusValue = statusFilter.value;

        rows.forEach(row => {
            const userName = row.querySelector('.text-sm.font-medium.text-gray-900').textContent.toLowerCase();
            const userEmail = row.querySelector('.text-sm.text-gray-500').textContent.toLowerCase();
            const documentType = row.querySelector('.text-sm.text-gray-900').textContent.toLowerCase();
            const rowStatus = row.getAttribute('data-status');

            const matchesSearch = userName.includes(searchTerm) || 
                                userEmail.includes(searchTerm) || 
                                documentType.includes(searchTerm);
            
            const matchesStatus = statusValue === '' || rowStatus === statusValue;

            if (matchesSearch && matchesStatus) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

    window.resetFilters = function() {
        searchInput.value = '';
        statusFilter.value = '';
        filterTable();
    }
});
</script>
@endsection