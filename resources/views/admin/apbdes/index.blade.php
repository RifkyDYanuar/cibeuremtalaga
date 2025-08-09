@extends('layouts.admin')

@section('title', 'Kelola APBDES')

@php
use Illuminate\Support\Str;
@endphp

@section('content')
<div class="min-h-screen bg-gray-50 dark:bg-dark-100 transition-colors duration-300">
    <div class="p-4 md:p-6 lg:p-8">
        <!-- Header with Breadcrumb -->
        <div class="mb-6">
            <nav class="text-sm mb-4">
                <ol class="list-none p-0 inline-flex">
                    <li class="flex items-center">
                        <a href="{{ route('admin.dashboard') }}" class="text-village-primary hover:text-village-secondary transition-colors">
                            <i class="fas fa-home mr-1"></i>Dashboard
                        </a>
                        <i class="fas fa-chevron-right mx-2 text-gray-400"></i>
                    </li>
                    <li class="text-gray-600 dark:text-gray-400">APBDES</li>
                </ol>
            </nav>
            
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-4 sm:space-y-0">
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white flex items-center">
                        <div class="bg-village-primary/10 p-3 rounded-lg mr-4">
                            <i class="fas fa-chart-line text-village-primary text-xl"></i>
                        </div>
                        Kelola APBDES
                    </h1>
                    <p class="text-gray-600 dark:text-gray-400 mt-1">Anggaran Pendapatan dan Belanja Desa</p>
                </div>
                <div class="flex flex-col sm:flex-row gap-3">
                    <a href="{{ route('public.apbdes') }}" target="_blank"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2.5 rounded-lg transition-colors duration-200 flex items-center space-x-2 text-sm justify-center">
                        <i class="fas fa-external-link-alt"></i>
                        <span>Lihat Publik</span>
                    </a>
                    <a href="{{ route('admin.apbdes.create') }}"
                        class="bg-village-primary hover:bg-village-secondary text-white px-4 py-2.5 rounded-lg transition-colors duration-200 flex items-center space-x-2 text-sm justify-center shadow-lg hover:shadow-xl">
                        <i class="fas fa-plus"></i>
                        <span>Tambah Data APBDES</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Enhanced Statistics Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 mb-8">
            <!-- Total Pendapatan -->
            <div class="bg-white dark:bg-dark-300 rounded-xl shadow-lg border border-gray-200 dark:border-dark-400 p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-lg flex items-center justify-center shadow-lg">
                            <i class="fas fa-arrow-up text-white text-lg"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Pendapatan</p>
                            <p class="text-xl font-bold text-gray-900 dark:text-white">{{ 'Rp ' . number_format($stats['total_pendapatan'], 0, ',', '.') }}</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
                    </div>
                </div>
            </div>

            <!-- Total Belanja -->
            <div class="bg-white dark:bg-dark-300 rounded-xl shadow-lg border border-gray-200 dark:border-dark-400 p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-red-600 rounded-lg flex items-center justify-center shadow-lg">
                            <i class="fas fa-arrow-down text-white text-lg"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Belanja</p>
                            <p class="text-xs text-gray-500 dark:text-gray-500 mb-1">(Termasuk Pembiayaan)</p>
                            <p class="text-xl font-bold text-gray-900 dark:text-white">{{ 'Rp ' . number_format($stats['total_belanja_keseluruhan'], 0, ',', '.') }}</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="w-3 h-3 bg-red-500 rounded-full animate-pulse"></div>
                    </div>
                </div>
            </div>

            <!-- Saldo -->
            <div class="bg-white dark:bg-dark-300 rounded-xl shadow-lg border border-gray-200 dark:border-dark-400 p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center shadow-lg">
                            <i class="fas fa-balance-scale text-white text-lg"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Saldo</p>
                            <p class="text-xs text-gray-500 dark:text-gray-500 mb-1">(Pendapatan - Total Belanja)</p>
                            <p class="text-xl font-bold {{ ($stats['total_pendapatan'] - $stats['total_belanja_keseluruhan']) >= 0 ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400' }}">
                                {{ 'Rp ' . number_format($stats['total_pendapatan'] - $stats['total_belanja_keseluruhan'], 0, ',', '.') }}
                            </p>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="w-3 h-3 {{ ($stats['total_pendapatan'] - $stats['total_belanja_keseluruhan']) >= 0 ? 'bg-green-500' : 'bg-red-500' }} rounded-full animate-pulse"></div>
                    </div>
                </div>
            </div>

            <!-- Total Item -->
            <div class="bg-white dark:bg-dark-300 rounded-xl shadow-lg border border-gray-200 dark:border-dark-400 p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-lg flex items-center justify-center shadow-lg">
                            <i class="fas fa-list text-white text-lg"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Item</p>
                            <p class="text-xl font-bold text-gray-900 dark:text-white">{{ number_format($stats['total_item']) }}</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="w-3 h-3 bg-yellow-500 rounded-full animate-pulse"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Enhanced Filters -->
        <div class="bg-white dark:bg-dark-300 rounded-xl shadow-lg border border-gray-200 dark:border-dark-400 p-4 md:p-6 mb-8">
            <div class="flex items-center mb-4">
                <div class="w-8 h-8 bg-village-primary/10 rounded-lg flex items-center justify-center mr-3">
                    <i class="fas fa-filter text-village-primary"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Filter Data</h3>
            </div>
            
            <form method="GET" action="{{ route('admin.apbdes.index') }}" class="grid grid-cols-2 md:grid-cols-5 gap-3 md:gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Tahun</label>
                    <select name="tahun" class="w-full px-3 py-2 border border-gray-300 dark:border-dark-400 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent dark:bg-dark-200 dark:text-white text-sm transition-all duration-200">
                        <option value="all" {{ $tahun == 'all' ? 'selected' : '' }}>Semua</option>
                        @foreach($tahunList as $year)
                            <option value="{{ $year }}" {{ $tahun == $year ? 'selected' : '' }}>{{ $year }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Jenis</label>
                    <select name="jenis" class="w-full px-3 py-2 border border-gray-300 dark:border-dark-400 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent dark:bg-dark-200 dark:text-white text-sm transition-all duration-200">
                        <option value="all" {{ $jenis == 'all' ? 'selected' : '' }}>Semua</option>
                        <option value="pendapatan" {{ $jenis == 'pendapatan' ? 'selected' : '' }}>Pendapatan</option>
                        <option value="belanja" {{ $jenis == 'belanja' ? 'selected' : '' }}>Belanja</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Status</label>
                    <select name="status" class="w-full px-3 py-2 border border-gray-300 dark:border-dark-400 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent dark:bg-dark-200 dark:text-white text-sm transition-all duration-200">
                        <option value="all" {{ $status == 'all' ? 'selected' : '' }}>Semua</option>
                        <option value="draft" {{ $status == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="aktif" {{ $status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="revisi" {{ $status == 'revisi' ? 'selected' : '' }}>Revisi</option>
                    </select>
                </div>

                <div class="flex items-end">
                    <button type="submit" class="w-full bg-village-primary hover:bg-village-secondary text-white px-3 py-2 rounded-lg transition-colors duration-200 text-sm font-medium shadow-md hover:shadow-lg">
                        <i class="fas fa-search mr-1"></i>Filter
                    </button>
                </div>

                <div class="flex items-end">
                    <a href="{{ route('admin.apbdes.index') }}" class="w-full bg-gray-500 hover:bg-gray-600 text-white px-3 py-2 rounded-lg transition-colors duration-200 text-sm font-medium text-center shadow-md hover:shadow-lg">
                        <i class="fas fa-undo mr-1"></i>Reset
                    </a>
                </div>
            </form>
        </div>

        <!-- Enhanced Data Table -->
        <div class="bg-white dark:bg-dark-300 rounded-xl shadow-lg border border-gray-200 dark:border-dark-400 overflow-hidden">
            <!-- Table Header -->
            <div class="bg-gray-50 dark:bg-dark-200 px-6 py-4 border-b border-gray-200 dark:border-dark-400">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                        <i class="fas fa-table mr-2 text-village-primary"></i>
                        Data APBDES
                    </h3>
                    <div class="flex items-center space-x-2 text-sm text-gray-500 dark:text-gray-400">
                        <i class="fas fa-info-circle"></i>
                        <span>Total: {{ $apbdes->total() }} data</span>
                    </div>
                </div>
            </div>
            <!-- Enhanced Mobile View -->
            <div class="block md:hidden">
                @forelse($apbdes as $item)
                <div class="p-4 border-b border-gray-200 dark:border-dark-400 last:border-b-0 hover:bg-gray-50 dark:hover:bg-dark-200 transition-colors">
                    <div class="space-y-3">
                        <div class="flex justify-between items-start">
                            <div class="flex-1 pr-3">
                                <h3 class="font-semibold text-gray-900 dark:text-white text-sm leading-tight">{{ Str::limit($item->uraian, 50) }}</h3>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1 flex items-center">
                                    <i class="fas fa-tag mr-1"></i>
                                    {{ Str::limit($item->kategori, 30) }}
                                </p>
                                <p class="text-xs text-gray-400 dark:text-gray-500 mt-1 flex items-center">
                                    <i class="fas fa-calendar mr-1"></i>
                                    {{ $item->tahun_anggaran }} • {{ $item->created_at->format('d/m/Y H:i') }}
                                </p>
                            </div>
                            <div class="flex flex-col items-end space-y-1">
                                <span class="px-2 py-1 text-xs rounded-full font-medium {{ $item->jenis == 'pendapatan' ? 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400' : 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400' }}">
                                    {{ ucfirst($item->jenis) }}
                                </span>
                                <span class="px-2 py-1 text-xs rounded-full font-medium
                                    @if($item->status == 'aktif') bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400
                                    @elseif($item->status == 'draft') bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400
                                    @else bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400 @endif">
                                    {{ ucfirst($item->status) }}
                                </span>
                            </div>
                        </div>
                        
                        <div class="bg-gray-50 dark:bg-dark-200 rounded-lg p-3">
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600 dark:text-gray-400">Jumlah:</span>
                                <span class="text-lg font-bold text-gray-900 dark:text-white">{{ $item->formatted_jumlah }}</span>
                            </div>
                        </div>
                        
                        <div class="flex justify-between items-center pt-3 border-t border-gray-100 dark:border-dark-400">
                            <span class="text-xs text-gray-500 dark:text-gray-400 flex items-center">
                                <i class="fas fa-user mr-1"></i>
                                {{ Str::limit($item->creator->name ?? 'Unknown', 15) }}
                            </span>
                            <div class="flex space-x-3">
                                <a href="{{ route('admin.apbdes.show', $item) }}" 
                                   class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 transition-colors">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.apbdes.edit', $item) }}" 
                                   class="text-yellow-600 dark:text-yellow-400 hover:text-yellow-800 dark:hover:text-yellow-300 transition-colors">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button onclick="deleteItem({{ $item->id }})" 
                                        class="text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300 transition-colors">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="p-12 text-center">
                    <div class="text-gray-400 dark:text-gray-500 mb-6">
                        <i class="fas fa-inbox text-6xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">Belum ada data APBDES</h3>
                    <p class="text-gray-500 dark:text-gray-400 mb-6 max-w-md mx-auto">Mulai dengan menambahkan data APBDES pertama untuk mengelola anggaran desa</p>
                    <a href="{{ route('admin.apbdes.create') }}" 
                       class="inline-flex items-center px-6 py-3 bg-village-primary text-white rounded-lg hover:bg-village-secondary transition-colors shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                        <i class="fas fa-plus mr-2"></i>
                        Tambah Data APBDES
                    </a>
                </div>
                @endforelse
            </div>

            <!-- Enhanced Desktop View -->
            <div class="hidden md:block">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-dark-400">
                    <thead class="bg-gray-50 dark:bg-dark-200">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider w-16">
                                <div class="flex items-center">
                                    <i class="fas fa-calendar-alt mr-1"></i>
                                    Tahun
                                </div>
                            </th>
                            <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider w-20">
                                <div class="flex items-center">
                                    <i class="fas fa-tag mr-1"></i>
                                    Jenis
                                </div>
                            </th>
                            <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                <div class="flex items-center">
                                    <i class="fas fa-file-alt mr-1"></i>
                                    Uraian & Kategori
                                </div>
                            </th>
                            <th class="px-4 py-3 text-right text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider w-32">
                                <div class="flex items-center justify-end">
                                    <i class="fas fa-money-bill-wave mr-1"></i>
                                    Jumlah
                                </div>
                            </th>
                            <th class="px-4 py-3 text-center text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider w-20">
                                <div class="flex items-center justify-center">
                                    <i class="fas fa-traffic-light mr-1"></i>
                                    Status
                                </div>
                            </th>
                            <th class="px-4 py-3 text-center text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider w-24">
                                <div class="flex items-center justify-center">
                                    <i class="fas fa-cogs mr-1"></i>
                                    Aksi
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-dark-300 divide-y divide-gray-200 dark:divide-dark-400">
                        @forelse($apbdes as $item)
                        <tr class="hover:bg-gray-50 dark:hover:bg-dark-200 transition-colors duration-200">
                            <td class="px-4 py-3 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-village-primary/10 rounded-lg flex items-center justify-center mr-2">
                                        <i class="fas fa-calendar text-village-primary text-xs"></i>
                                    </div>
                                    <span class="text-sm font-medium text-gray-900 dark:text-white">{{ $item->tahun_anggaran }}</span>
                                </div>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium {{ $item->jenis == 'pendapatan' ? 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400' : 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400' }}">
                                    <i class="fas fa-{{ $item->jenis == 'pendapatan' ? 'arrow-up' : 'arrow-down' }} mr-1"></i>
                                    {{ ucfirst($item->jenis) }}
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                <div>
                                    <p class="text-sm font-medium text-gray-900 dark:text-white leading-tight">{{ Str::limit($item->uraian, 60) }}</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">{{ Str::limit($item->kategori, 40) }}</p>
                                    <p class="text-xs text-gray-400 dark:text-gray-500 mt-1">
                                        <i class="fas fa-clock mr-1"></i>
                                        {{ $item->created_at->format('d/m/Y H:i') }}
                                    </p>
                                </div>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-right">
                                <div class="text-sm font-bold text-gray-900 dark:text-white">{{ $item->formatted_jumlah }}</div>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-center">
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium
                                    @if($item->status == 'aktif') bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400
                                    @elseif($item->status == 'draft') bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400
                                    @else bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400 @endif">
                                    <i class="fas fa-circle mr-1 text-xs"></i>
                                    {{ ucfirst($item->status) }}
                                </span>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-center">
                                <div class="flex justify-center space-x-1">
                                    <a href="{{ route('admin.apbdes.show', $item) }}" 
                                       class="inline-flex items-center px-2 py-1 text-xs font-medium text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-900/30 rounded hover:bg-blue-100 dark:hover:bg-blue-900/50 transition-colors"
                                       title="Lihat Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.apbdes.edit', $item) }}" 
                                       class="inline-flex items-center px-2 py-1 text-xs font-medium text-yellow-600 dark:text-yellow-400 bg-yellow-50 dark:bg-yellow-900/30 rounded hover:bg-yellow-100 dark:hover:bg-yellow-900/50 transition-colors"
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button onclick="deleteItem({{ $item->id }})" 
                                            class="inline-flex items-center px-2 py-1 text-xs font-medium text-red-600 dark:text-red-400 bg-red-50 dark:bg-red-900/30 rounded hover:bg-red-100 dark:hover:bg-red-900/50 transition-colors"
                                            title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-16 text-center">
                                <div class="text-gray-400 dark:text-gray-500 mb-6">
                                    <i class="fas fa-inbox text-6xl"></i>
                                </div>
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">Belum ada data APBDES</h3>
                                <p class="text-gray-500 dark:text-gray-400 mb-6 max-w-md mx-auto">Mulai dengan menambahkan data APBDES pertama untuk mengelola anggaran desa</p>
                                <a href="{{ route('admin.apbdes.create') }}" 
                                   class="inline-flex items-center px-6 py-3 bg-village-primary text-white rounded-lg hover:bg-village-secondary transition-colors shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                                    <i class="fas fa-plus mr-2"></i>
                                    Tambah Data APBDES
                                </a>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Enhanced Pagination -->
            @if($apbdes->hasPages())
            <div class="bg-gray-50 dark:bg-dark-200 px-6 py-4 border-t border-gray-200 dark:border-dark-400">
                <div class="flex items-center justify-between">
                    <div class="text-sm text-gray-500 dark:text-gray-400">
                        Menampilkan {{ $apbdes->firstItem() ?? 0 }} sampai {{ $apbdes->lastItem() ?? 0 }} dari {{ $apbdes->total() }} data
                    </div>
                    <div class="pagination-wrapper">
                        {{ $apbdes->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Enhanced Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 backdrop-blur-sm">
    <div class="bg-white dark:bg-dark-300 rounded-xl shadow-2xl p-6 max-w-md mx-4 w-full transform transition-all duration-300 scale-95">
        <div class="text-center">
            <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-red-100 dark:bg-red-900/30 mb-6 animate-pulse">
                <i class="fas fa-exclamation-triangle text-red-600 dark:text-red-400 text-2xl"></i>
            </div>
            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Hapus Data APBDES</h3>
            <p class="text-sm text-gray-500 dark:text-gray-400 mb-8 leading-relaxed">
                Apakah Anda yakin ingin menghapus data ini? <br>
                <span class="font-medium text-red-600 dark:text-red-400">Tindakan ini tidak dapat dibatalkan.</span>
            </p>
            <div class="flex space-x-4">
                <button onclick="closeDeleteModal()" 
                        class="flex-1 px-6 py-3 text-sm font-medium text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-dark-200 border border-gray-300 dark:border-dark-400 rounded-lg hover:bg-gray-200 dark:hover:bg-dark-100 transition-colors focus:outline-none focus:ring-2 focus:ring-gray-500">
                    <i class="fas fa-times mr-2"></i>
                    Batal
                </button>
                <form id="deleteForm" method="POST" class="flex-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="w-full px-6 py-3 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 transition-colors focus:outline-none focus:ring-2 focus:ring-red-500 shadow-lg hover:shadow-xl">
                        <i class="fas fa-trash mr-2"></i>
                        Hapus Data
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Success/Error Message -->
@if(session('success'))
<div id="successMessage" class="fixed top-4 right-4 z-50 bg-green-500 text-white px-6 py-4 rounded-lg shadow-lg transform transition-all duration-300">
    <div class="flex items-center">
        <i class="fas fa-check-circle mr-2"></i>
        {{ session('success') }}
    </div>
</div>
@endif

@if(session('error'))
<div id="errorMessage" class="fixed top-4 right-4 z-50 bg-red-500 text-white px-6 py-4 rounded-lg shadow-lg transform transition-all duration-300">
    <div class="flex items-center">
        <i class="fas fa-exclamation-circle mr-2"></i>
        {{ session('error') }}
    </div>
</div>
@endif

<script>
function deleteItem(id) {
    document.getElementById('deleteForm').action = `/admin/apbdes/${id}`;
    const modal = document.getElementById('deleteModal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    
    // Add animation
    setTimeout(() => {
        modal.querySelector('.transform').classList.remove('scale-95');
        modal.querySelector('.transform').classList.add('scale-100');
    }, 10);
}

function closeDeleteModal() {
    const modal = document.getElementById('deleteModal');
    modal.querySelector('.transform').classList.remove('scale-100');
    modal.querySelector('.transform').classList.add('scale-95');
    
    setTimeout(() => {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }, 150);
}

// Close modal when clicking outside
document.getElementById('deleteModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeDeleteModal();
    }
});

// Auto-hide messages
document.addEventListener('DOMContentLoaded', function() {
    const successMessage = document.getElementById('successMessage');
    const errorMessage = document.getElementById('errorMessage');
    
    if (successMessage) {
        setTimeout(() => {
            successMessage.style.transform = 'translateX(100%)';
            setTimeout(() => successMessage.remove(), 300);
        }, 5000);
    }
    
    if (errorMessage) {
        setTimeout(() => {
            errorMessage.style.transform = 'translateX(100%)';
            setTimeout(() => errorMessage.remove(), 300);
        }, 5000);
    }
});

// Enhanced keyboard navigation
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeDeleteModal();
    }
});
</script>
@endsection
