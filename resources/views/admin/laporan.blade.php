@extends('layouts.admin')

@section('content')
<div class="p-4 md:p-6 bg-gray-50 min-h-screen">
    <!-- Header Section -->
    <div class="mb-6 md:mb-8">
        <div class="flex flex-col gap-4">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-900 flex items-center gap-2 md:gap-3">
                    <div class="w-8 h-8 md:w-10 md:h-10 bg-gradient-to-r from-emerald-500 to-teal-600 rounded-lg md:rounded-xl flex items-center justify-center">
                        <i class="fas fa-chart-bar text-white text-sm md:text-base"></i>
                    </div>
                    <span class="hidden sm:inline">Laporan Pengajuan Surat</span>
                    <span class="sm:hidden">Laporan</span>
                </h1>
                <nav class="flex items-center space-x-2 text-sm text-gray-600 mt-2">
                    <a href="{{ route('admin.dashboard') }}" class="hover:text-emerald-600 transition-colors duration-200">
                        <i class="fas fa-home"></i>
                        Dashboard
                    </a>
                    <i class="fas fa-chevron-right text-gray-400"></i>
                    <span class="text-gray-800 font-medium">Laporan</span>
                </nav>
            </div>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="bg-white/80 backdrop-blur-sm rounded-xl md:rounded-2xl shadow-lg border border-white/20 overflow-hidden mb-6 md:mb-8">
        <div class="px-4 md:px-6 py-3 md:py-4 bg-gradient-to-r from-emerald-600 to-teal-600">
            <h3 class="text-base md:text-lg font-semibold text-white flex items-center gap-2">
                <i class="fas fa-filter text-sm md:text-base"></i>
                Filter Laporan
            </h3>
        </div>
        <div class="p-4 md:p-6">
            <form method="GET" action="{{ route('admin.laporan') }}" class="space-y-4 md:space-y-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
                    <div>
                        <label for="start_date" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Mulai</label>
                        <input type="date" 
                               name="start_date" 
                               id="start_date"
                               value="{{ $startDate }}" 
                               class="w-full px-3 md:px-4 py-2 md:py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200 text-sm md:text-base">
                    </div>
                    <div>
                        <label for="end_date" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Akhir</label>
                        <input type="date" 
                               name="end_date" 
                               id="end_date"
                               value="{{ $endDate }}" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200">
                    </div>
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <select name="status" 
                                id="status"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200">
                            <option value="">Semua Status</option>
                            <option value="Pending" {{ $status == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Disetujui" {{ $status == 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
                            <option value="Ditolak" {{ $status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                        </select>
                    </div>
                    <div>
                        <label for="jenis_surat" class="block text-sm font-medium text-gray-700 mb-2">Jenis Surat</label>
                        <select name="jenis_surat" 
                                id="jenis_surat"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200">
                            <option value="">Semua Jenis</option>
                            @foreach($jenisSurats as $js)
                                <option value="{{ $js->id }}" {{ $jenisSurat == $js->id ? 'selected' : '' }}>
                                    {{ $js->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200">
                    <a href="{{ route('admin.laporan') }}" 
                       class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 bg-white hover:bg-gray-50 transition-colors duration-200 flex items-center gap-2">
                        <i class="fas fa-refresh"></i>
                        Reset
                    </a>
                    <button type="submit" 
                            class="px-6 py-3 bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-medium rounded-lg hover:from-emerald-700 hover:to-teal-700 transition-all duration-200 flex items-center gap-2">
                        <i class="fas fa-search"></i>
                        Filter
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-white/20 p-6 hover:transform hover:scale-105 transition-all duration-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 mb-1">Total Pengajuan</p>
                    <p class="text-3xl font-bold text-gray-900">{{ number_format($totalPengajuan) }}</p>
                </div>
                <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-cyan-600 rounded-xl flex items-center justify-center">
                    <i class="fas fa-file-alt text-white text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-white/20 p-6 hover:transform hover:scale-105 transition-all duration-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 mb-1">Pending</p>
                    <p class="text-3xl font-bold text-gray-900">{{ number_format($pengajuanPending) }}</p>
                </div>
                <div class="w-12 h-12 bg-gradient-to-r from-yellow-500 to-orange-600 rounded-xl flex items-center justify-center">
                    <i class="fas fa-clock text-white text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-white/20 p-6 hover:transform hover:scale-105 transition-all duration-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 mb-1">Disetujui</p>
                    <p class="text-3xl font-bold text-gray-900">{{ number_format($pengajuanDisetujui) }}</p>
                </div>
                <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-emerald-600 rounded-xl flex items-center justify-center">
                    <i class="fas fa-check text-white text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-white/20 p-6 hover:transform hover:scale-105 transition-all duration-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 mb-1">Ditolak</p>
                    <p class="text-3xl font-bold text-gray-900">{{ number_format($pengajuanDitolak) }}</p>
                </div>
                <div class="w-12 h-12 bg-gradient-to-r from-red-500 to-pink-600 rounded-xl flex items-center justify-center">
                    <i class="fas fa-times text-white text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Export Section -->
    <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-white/20 overflow-hidden mb-8">
        <div class="px-6 py-4 bg-gradient-to-r from-purple-600 to-indigo-600">
            <h3 class="text-lg font-semibold text-white flex items-center gap-2">
                <i class="fas fa-download"></i>
                Export Laporan
            </h3>
        </div>
        <div class="p-6">
            <div class="flex flex-wrap gap-3">
                <form method="GET" action="{{ route('admin.laporan.export.excel') }}" class="inline-block">
                    <input type="hidden" name="start_date" value="{{ $startDate }}">
                    <input type="hidden" name="end_date" value="{{ $endDate }}">
                    <input type="hidden" name="status" value="{{ $status }}">
                    <input type="hidden" name="jenis_surat" value="{{ $jenisSurat }}">
                    <button type="submit" 
                            class="px-6 py-3 bg-gradient-to-r from-green-600 to-emerald-600 text-white font-medium rounded-lg hover:from-green-700 hover:to-emerald-700 transition-all duration-200 flex items-center gap-2">
                        <i class="fas fa-file-excel"></i>
                        Export Excel
                    </button>
                </form>
                <button onclick="window.print()" 
                        class="px-6 py-3 bg-gradient-to-r from-blue-600 to-cyan-600 text-white font-medium rounded-lg hover:from-blue-700 hover:to-cyan-700 transition-all duration-200 flex items-center gap-2">
                    <i class="fas fa-print"></i>
                    Print
                </button>
            </div>
        </div>
    </div>

    <!-- Data Table -->
    <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-white/20 overflow-hidden mb-8">
        <div class="px-6 py-4 bg-gradient-to-r from-indigo-600 to-purple-600 flex justify-between items-center">
            <h3 class="text-lg font-semibold text-white flex items-center gap-2">
                <i class="fas fa-table"></i>
                Data Pengajuan
            </h3>
            <div class="text-sm text-white/80">
                {{ $startDate }} - {{ $endDate }}
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pemohon</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Surat</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($pengajuans as $pengajuan)
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-emerald-600">
                            #{{ $pengajuan->id }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <div class="h-10 w-10 rounded-full bg-gradient-to-r from-emerald-400 to-teal-500 flex items-center justify-center">
                                        <i class="fas fa-user text-white"></i>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $pengajuan->user->name ?? 'Tidak diketahui' }}</div>
                                    <div class="text-sm text-gray-500">{{ $pengajuan->user->email ?? '-' }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $pengajuan->jenisSurat->nama ?? 'Tidak diketahui' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($pengajuan->status == 'Pending')
                                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                    <i class="fas fa-clock"></i> Pending
                                </span>
                            @elseif($pengajuan->status == 'Disetujui')
                                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    <i class="fas fa-check"></i> Disetujui
                                </span>
                            @elseif($pengajuan->status == 'Ditolak')
                                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                    <i class="fas fa-times"></i> Ditolak
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $pengajuan->created_at ? $pengajuan->created_at->format('d M Y') : '-' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('admin.pengajuan.detail', $pengajuan->id) }}" 
                               class="inline-flex items-center gap-1 px-3 py-2 bg-blue-600 text-white text-xs font-medium rounded-lg hover:bg-blue-700 transition-colors duration-200">
                                <i class="fas fa-eye"></i> Detail
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-8 text-center">
                            <div class="flex flex-col items-center justify-center text-gray-500">
                                <i class="fas fa-inbox text-4xl mb-4 text-gray-300"></i>
                                <p class="text-sm">Tidak ada data untuk periode yang dipilih</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Statistics by Document Type -->
    @if($statistikJenisSurat->count() > 0)
    <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-white/20 overflow-hidden">
        <div class="px-6 py-4 bg-gradient-to-r from-teal-600 to-green-600">
            <h3 class="text-lg font-semibold text-white flex items-center gap-2">
                <i class="fas fa-chart-pie"></i>
                Statistik per Jenis Surat
            </h3>
        </div>
        <div class="p-6">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Surat</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pending</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Disetujui</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ditolak</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($statistikJenisSurat as $stat)
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $stat['jenis_surat'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">{{ $stat['total'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                    {{ $stat['pending'] }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    {{ $stat['disetujui'] }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                    {{ $stat['ditolak'] }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
</div>

<style>
/* Print styles */
@media print {
    .bg-gradient-to-r,
    .bg-white\/80,
    .backdrop-blur-sm,
    .shadow-lg,
    button,
    form {
        background: white !important;
        box-shadow: none !important;
        backdrop-filter: none !important;
    }
    
    .hidden-print {
        display: none !important;
    }
    
    .text-white {
        color: black !important;
    }
    
    .border-white\/20 {
        border-color: #e5e7eb !important;
    }
    
    .rounded-2xl,
    .rounded-xl,
    .rounded-lg {
        border-radius: 0 !important;
    }
    
    .p-6 {
        padding: 1rem !important;
    }
    
    .mb-8 {
        margin-bottom: 1rem !important;
    }
}
</style>
@endsection
