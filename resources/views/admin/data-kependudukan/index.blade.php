@extends('layouts.admin')

@section('title', 'Data Penduduk')

@section('content')
<div class="p-3 md:p-6">
    <!-- Header Section -->
    <div class="mb-4 md:mb-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
            <div>
                <h1 class="text-xl md:text-2xl font-bold text-gray-900 mb-1">Data Penduduk</h1>
                <p class="text-xs md:text-sm text-gray-600 hidden sm:block">Kelola data kependudukan desa</p>
            </div>
            <div class="flex gap-2">
                <!-- Tombol Import -->
                <a href="{{ route('admin.data-kependudukan.import-form') }}" 
                   class="inline-flex items-center px-3 md:px-4 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold rounded-lg hover:from-blue-700 hover:to-indigo-700 transition-all duration-200 shadow-lg text-xs md:text-sm">
                    <i class="fas fa-upload mr-1 md:mr-2"></i> 
                    <span class="hidden sm:inline">Import Excel/CSV</span>
                    <span class="sm:hidden">Import</span>
                </a>
                
                <!-- Tombol Tambah Data -->
                <a href="{{ route('admin.data-kependudukan.create') }}" 
                   class="inline-flex items-center px-3 md:px-4 py-2 bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-semibold rounded-lg hover:from-emerald-700 hover:to-teal-700 transition-all duration-200 shadow-lg text-xs md:text-sm">
                    <i class="fas fa-plus-circle mr-1 md:mr-2"></i> 
                    <span class="hidden sm:inline">Tambah Data</span>
                    <span class="sm:hidden">Tambah</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-2 md:gap-3 mb-4 md:mb-6">
        <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-lg border border-white/20 p-3 md:p-4 hover:shadow-xl transition-all duration-300">
            <div class="flex items-center">
                <div class="w-8 h-8 md:w-10 md:h-10 bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg flex items-center justify-center">
                    <i class="fas fa-users text-white text-sm md:text-lg"></i>
                </div>
                <div class="ml-2 md:ml-3">
                    <p class="text-xs font-medium text-gray-600">Total</p>
                    <p class="text-sm md:text-lg font-bold text-gray-900">{{ $statistik['total_penduduk'] ?? 0 }}</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-lg border border-white/20 p-3 md:p-4 hover:shadow-xl transition-all duration-300">
            <div class="flex items-center">
                <div class="w-8 h-8 md:w-10 md:h-10 bg-gradient-to-r from-emerald-500 to-emerald-600 rounded-lg flex items-center justify-center">
                    <i class="fas fa-male text-white text-sm md:text-lg"></i>
                </div>
                <div class="ml-2 md:ml-3">
                    <p class="text-xs font-medium text-gray-600">Laki-laki</p>
                    <p class="text-sm md:text-lg font-bold text-gray-900">{{ $statistik['laki_laki'] ?? 0 }}</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-lg border border-white/20 p-3 md:p-4 hover:shadow-xl transition-all duration-300">
            <div class="flex items-center">
                <div class="w-8 h-8 md:w-10 md:h-10 bg-gradient-to-r from-pink-500 to-pink-600 rounded-lg flex items-center justify-center">
                    <i class="fas fa-female text-white text-sm md:text-lg"></i>
                </div>
                <div class="ml-2 md:ml-3">
                    <p class="text-xs font-medium text-gray-600">Perempuan</p>
                    <p class="text-sm md:text-lg font-bold text-gray-900">{{ $statistik['perempuan'] ?? 0 }}</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-lg border border-white/20 p-3 md:p-4 hover:shadow-xl transition-all duration-300">
            <div class="flex items-center">
                <div class="w-8 h-8 md:w-10 md:h-10 bg-gradient-to-r from-amber-500 to-amber-600 rounded-lg flex items-center justify-center">
                    <i class="fas fa-home text-white text-sm md:text-lg"></i>
                </div>
                <div class="ml-2 md:ml-3">
                    <p class="text-xs font-medium text-gray-600">KK</p>
                    <p class="text-sm md:text-lg font-bold text-gray-900">{{ $statistik['kepala_keluarga'] ?? 0 }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="mb-4 md:mb-6">
        <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-lg border border-white/20 p-3 md:p-4">
            <h3 class="text-sm md:text-lg font-semibold text-gray-900 mb-3">Filter Data</h3>
            <form method="GET" action="{{ route('admin.data-kependudukan.index') }}">
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-2 md:gap-3">
                    <div class="md:col-span-2 xl:col-span-1">
                        <input type="text" name="search" 
                               class="w-full px-2 md:px-3 py-2 text-xs md:text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500" 
                               placeholder="Cari nama atau NIK..." value="{{ request('search') }}">
                    </div>
                    <div class="grid grid-cols-3 gap-1 md:gap-2 md:col-span-2 xl:col-span-1">
                        <select name="jenis_kelamin" 
                                class="w-full px-1 md:px-2 py-2 text-xs md:text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                            <option value="">J.Kelamin</option>
                            <option value="Laki-laki" {{ request('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>L</option>
                            <option value="Perempuan" {{ request('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>P</option>
                        </select>
                        <select name="status" 
                                class="w-full px-1 md:px-2 py-2 text-xs md:text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                            <option value="">Status</option>
                            <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="pindah" {{ request('status') == 'pindah' ? 'selected' : '' }}>Pindah</option>
                            <option value="meninggal" {{ request('status') == 'meninggal' ? 'selected' : '' }}>Meninggal</option>
                        </select>
                        <select name="rt" 
                                class="w-full px-1 md:px-2 py-2 text-xs md:text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                            <option value="">RT</option>
                            @foreach($daftarRT as $rt)
                                <option value="{{ $rt }}" {{ request('rt') == $rt ? 'selected' : '' }}>{{ $rt }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex gap-2 xl:col-span-1">
                        <button type="submit" 
                                class="flex-1 px-2 md:px-3 py-2 bg-gradient-to-r from-emerald-600 to-teal-600 text-white text-xs md:text-sm font-medium rounded-lg hover:from-emerald-700 hover:to-teal-700 transition-all duration-200">
                            <i class="fas fa-search mr-1"></i> <span class="hidden sm:inline">Cari</span>
                        </button>
                        <a href="{{ route('admin.data-kependudukan.index') }}" 
                           class="px-2 md:px-3 py-2 bg-gray-500 text-white text-xs md:text-sm font-medium rounded-lg hover:bg-gray-600 transition-all duration-200">
                            <i class="fas fa-refresh"></i>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Data Table -->
    <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-lg border border-white/20 overflow-hidden">
        <div class="px-3 md:px-4 py-3 border-b border-gray-200">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                <div class="flex items-center gap-3">
                    <h3 class="text-sm md:text-lg font-semibold text-gray-900">Daftar Penduduk</h3>
                    <!-- Bulk Actions (Initially Hidden) -->
                    <div id="bulkActions" class="hidden items-center gap-2">
                        <span id="selectedCount" class="text-sm text-gray-600">0 dipilih</span>
                        <button onclick="confirmBulkDelete()" 
                                class="inline-flex items-center px-3 py-1.5 bg-red-600 text-white text-xs font-medium rounded-lg hover:bg-red-700 transition-all duration-200">
                            <i class="fas fa-trash mr-1"></i> Hapus Terpilih
                        </button>
                        <button onclick="clearSelection()" 
                                class="inline-flex items-center px-3 py-1.5 bg-gray-500 text-white text-xs font-medium rounded-lg hover:bg-gray-600 transition-all duration-200">
                            <i class="fas fa-times mr-1"></i> Batal
                        </button>
                    </div>
                </div>
                <div class="flex gap-2">
                    <!-- Dropdown untuk Export Excel -->
                    <div class="relative">
                        <button onclick="toggleExportDropdown()" 
                                class="inline-flex items-center px-2 md:px-3 py-1.5 md:py-2 bg-green-600 text-white text-xs font-medium rounded-lg hover:bg-green-700 transition-all duration-200">
                            <i class="fas fa-file-excel mr-1"></i> <span class="hidden sm:inline">Excel</span>
                            <i class="fas fa-chevron-down ml-1 text-xs"></i>
                        </button>
                        <div id="exportDropdown" class="absolute right-0 mt-1 w-32 bg-white rounded-lg shadow-lg border border-gray-200 z-10 hidden">
                            <button onclick="exportData('excel', 'csv')" 
                                    class="block w-full text-left px-3 py-2 text-xs text-gray-700 hover:bg-gray-100 rounded-t-lg">
                                <i class="fas fa-file-csv mr-2"></i>CSV
                            </button>
                            <button onclick="exportData('excel', 'excel')" 
                                    class="block w-full text-left px-3 py-2 text-xs text-gray-700 hover:bg-gray-100 rounded-b-lg">
                                <i class="fas fa-file-excel mr-2"></i>Excel
                            </button>
                        </div>
                    </div>
                    <button onclick="exportData('pdf')" 
                            class="inline-flex items-center px-2 md:px-3 py-1.5 md:py-2 bg-red-600 text-white text-xs font-medium rounded-lg hover:bg-red-700 transition-all duration-200">
                        <i class="fas fa-file-pdf mr-1"></i> <span class="hidden sm:inline">PDF</span>
                    </button>
                </div>
            </div>
        </div>
        
        <div class="p-3 md:p-4">
            @if(session('success'))
                <div class="mb-4 bg-green-50 border border-green-200 text-green-800 px-3 py-2 rounded-lg flex items-center text-sm">
                    <i class="fas fa-check-circle mr-2"></i>
                    {{ session('success') }}
                    <button type="button" class="ml-auto text-green-600 hover:text-green-800" onclick="this.parentElement.style.display='none'">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            @endif

            @if($penduduk->count() > 0)
            <!-- Mobile Card Layout -->
            <div class="block md:hidden space-y-3">
                @foreach($penduduk as $index => $p)
                <div class="bg-gray-50 rounded-lg p-3 border border-gray-200 hover:bg-gray-100 transition-colors duration-200">
                    <div class="flex items-start justify-between mb-2">
                        <div class="flex items-start gap-2">
                            <input type="checkbox" 
                                   class="item-checkbox mt-1" 
                                   value="{{ $p->id }}" 
                                   onchange="updateBulkActions()">
                            <div class="flex-1 min-w-0">
                                <h4 class="font-semibold text-gray-900 text-sm truncate">{{ $p->nama }}</h4>
                                <p class="text-xs text-gray-600">NIK: {{ $p->nik }}</p>
                            </div>
                        </div>
                        <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium {{ $p->jenis_kelamin == 'Laki-laki' ? 'bg-blue-100 text-blue-800' : 'bg-pink-100 text-pink-800' }}">
                            {{ $p->jenis_kelamin == 'Laki-laki' ? 'L' : 'P' }}
                        </span>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-2 mb-2 text-xs">
                        <div>
                            <span class="text-gray-500">Usia:</span>
                            <span class="font-medium">{{ $p->usia }}th</span>
                        </div>
                        <div>
                            <span class="text-gray-500">RT/RW:</span>
                            <span class="font-medium">{{ $p->rt }}/{{ $p->rw }}</span>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <div class="flex gap-1">
                            @if($p->status == 'aktif' || $p->status == 'Aktif')
                                <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-green-100 text-green-800">Aktif</span>
                            @elseif($p->status == 'pindah' || $p->status == 'Pindah')
                                <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-yellow-100 text-yellow-800">Pindah</span>
                            @else
                                <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-red-100 text-red-800">Meninggal</span>
                            @endif
                        </div>
                        
                        <div class="flex gap-1">
                            <a href="{{ route('admin.data-kependudukan.show', $p->id) }}" 
                               class="inline-flex items-center p-1.5 text-xs text-white bg-blue-600 hover:bg-blue-700 rounded transition-colors duration-200">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.data-kependudukan.edit', $p->id) }}" 
                               class="inline-flex items-center p-1.5 text-xs text-white bg-yellow-600 hover:bg-yellow-700 rounded transition-colors duration-200">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button type="button" 
                                    onclick="confirmDelete({{ $p->id }}, '{{ $p->nama }}')" 
                                    class="inline-flex items-center p-1.5 text-xs text-white bg-red-600 hover:bg-red-700 rounded transition-colors duration-200">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Desktop Table Layout -->
            <div class="hidden md:block overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">
                                <input type="checkbox" 
                                       id="selectAll" 
                                       class="rounded border-gray-300 text-blue-600 focus:ring-blue-500" 
                                       onchange="toggleAllCheckboxes()">
                            </th>
                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">NO</th>
                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">NIK</th>
                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">JK</th>
                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Usia</th>
                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">RT/RW</th>
                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($penduduk as $index => $p)
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-3 py-3 whitespace-nowrap">
                                <input type="checkbox" 
                                       class="item-checkbox rounded border-gray-300 text-blue-600 focus:ring-blue-500" 
                                       value="{{ $p->id }}" 
                                       onchange="updateBulkActions()">
                            </td>
                            <td class="px-3 py-3 whitespace-nowrap text-sm text-gray-900">{{ $penduduk->firstItem() + $index }}</td>
                            <td class="px-3 py-3 whitespace-nowrap">
                                <div class="text-sm text-gray-900 font-medium">{{ Str::limit($p->nama, 20) }}</div>
                                <div class="text-xs text-gray-500">{{ $p->nik }}</div>
                            </td>
                            <td class="px-3 py-3 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $p->tempat_lahir }}</div>
                                <div class="text-xs text-gray-500">{{ $p->tanggal_lahir->format('d/m/Y') }}</div>
                            </td>
                            <td class="px-3 py-3 whitespace-nowrap">
                                <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium {{ $p->jenis_kelamin == 'Laki-laki' ? 'bg-blue-100 text-blue-800' : 'bg-pink-100 text-pink-800' }}">
                                    {{ $p->jenis_kelamin == 'Laki-laki' ? 'L' : 'P' }}
                                </span>
                            </td>
                            <td class="px-3 py-3 whitespace-nowrap text-sm text-gray-900">{{ $p->usia }}th</td>
                            <td class="px-3 py-3 whitespace-nowrap">
                                <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-gray-100 text-gray-800">{{ $p->rt }}/{{ $p->rw }}</span>
                            </td>
                            <td class="px-3 py-3 whitespace-nowrap">
                                @if($p->status == 'aktif' || $p->status == 'Aktif')
                                    <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-green-100 text-green-800">Aktif</span>
                                @elseif($p->status == 'pindah' || $p->status == 'Pindah')
                                    <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-yellow-100 text-yellow-800">Pindah</span>
                                @else
                                    <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-red-100 text-red-800">Meninggal</span>
                                @endif
                            </td>
                            <td class="px-3 py-3 whitespace-nowrap text-sm font-medium">
                                <div class="flex space-x-1">
                                    <a href="{{ route('admin.data-kependudukan.show', $p->id) }}" 
                                       class="inline-flex items-center p-1.5 text-xs text-white bg-blue-600 hover:bg-blue-700 rounded transition-colors duration-200" 
                                       title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.data-kependudukan.edit', $p->id) }}" 
                                       class="inline-flex items-center p-1.5 text-xs text-white bg-yellow-600 hover:bg-yellow-700 rounded transition-colors duration-200" 
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" 
                                            onclick="confirmDelete({{ $p->id }}, '{{ $p->nama }}')" 
                                            class="inline-flex items-center p-1.5 text-xs text-white bg-red-600 hover:bg-red-700 rounded transition-colors duration-200" 
                                            title="Hapus">
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
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mt-4 pt-4 border-t border-gray-200">
                <div class="text-xs text-gray-700 mb-2 sm:mb-0">
                    {{ $penduduk->firstItem() }} - {{ $penduduk->lastItem() }} dari {{ $penduduk->total() }} data
                </div>
                <div>
                    {{ $penduduk->appends(request()->query())->links() }}
                </div>
            </div>
            @else
            <div class="text-center py-12">
                <div class="w-24 h-24 mx-auto mb-4 bg-gray-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-users text-gray-400 text-3xl"></i>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada data penduduk</h3>
                <p class="text-gray-500 mb-6">Klik tombol "Tambah Data Penduduk" untuk menambah data baru</p>
                <a href="{{ route('admin.data-kependudukan.create') }}" 
                   class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-semibold rounded-xl hover:from-emerald-700 hover:to-teal-700 transform hover:scale-105 transition-all duration-200 shadow-lg hover:shadow-xl">
                    <i class="fas fa-plus-circle mr-2"></i> Tambah Data Penduduk
                </a>
            </div>
            @endif
        </div>
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
                Apakah Anda yakin ingin menghapus data penduduk <strong id="pendudukName" class="text-gray-900"></strong>?
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

<!-- Bulk Delete Confirmation Modal -->
<div id="bulkDeleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-2xl bg-white">
        <div class="mt-3">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 mb-4">
                <i class="fas fa-exclamation-triangle text-red-600"></i>
            </div>
            <h3 class="text-lg font-medium text-gray-900 text-center mb-2">Konfirmasi Hapus Massal</h3>
            <p class="text-sm text-gray-500 text-center mb-4">
                Apakah Anda yakin ingin menghapus <strong id="bulkDeleteCount" class="text-gray-900"></strong> data penduduk yang dipilih?
            </p>
            <p class="text-xs text-red-600 text-center mb-6">Data yang dihapus tidak dapat dikembalikan!</p>
            <div class="flex gap-3">
                <button type="button" onclick="closeBulkDeleteModal()" 
                        class="flex-1 px-4 py-2 bg-gray-500 text-white font-medium rounded-lg hover:bg-gray-600 transition-colors duration-200">
                    Batal
                </button>
                <form id="bulkDeleteForm" method="POST" action="{{ route('admin.data-kependudukan.bulk-delete') }}" class="flex-1">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="ids" id="bulkDeleteIds">
                    <button type="submit" 
                            class="w-full px-4 py-2 bg-red-600 text-white font-medium rounded-lg hover:bg-red-700 transition-colors duration-200">
                        Hapus Semua
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Import Modal -->
<div id="importModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 items-center justify-center">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-md mx-4">
        <div class="flex items-center justify-between p-4 border-b">
            <h3 class="text-lg font-semibold text-gray-900">Import Data Penduduk</h3>
            <button onclick="closeImportModal()" class="text-gray-500 hover:text-gray-700">
                <i class="fas fa-times"></i>
            </button>
        </div>
        
        <form action="{{ route('admin.data-kependudukan.import') }}" method="POST" enctype="multipart/form-data" class="p-4">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">File Excel/CSV</label>
                <input type="file" name="file" accept=".xlsx,.xls,.csv" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <p class="text-xs text-gray-500 mt-1">Format yang didukung: .xlsx, .xls, .csv (Max: 2MB)</p>
            </div>
            
            <div class="mb-4">
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-3">
                    <h4 class="text-sm font-medium text-blue-800 mb-2">Informasi Penting:</h4>
                    <ul class="text-xs text-blue-700 space-y-1">
                        <li>• Data dengan NIK yang sudah ada akan dilewati</li>
                        <li>• Pastikan format tanggal: YYYY-MM-DD atau DD/MM/YYYY</li>
                        <li>• File Excel akan otomatis dikonversi saat import</li>
                        <li>• Download template untuk format yang benar</li>
                    </ul>
                </div>
            </div>
            
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Download Template:</label>
                <div class="flex gap-2">
                    <a href="{{ route('admin.data-kependudukan.download-template') }}?format=csv" 
                       class="flex-1 inline-flex items-center justify-center px-3 py-2 text-xs border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                        <i class="fas fa-file-csv mr-1"></i>Template CSV
                    </a>
                    <a href="{{ route('admin.data-kependudukan.download-template') }}?format=excel" 
                       class="flex-1 inline-flex items-center justify-center px-3 py-2 text-xs border border-green-300 text-green-700 rounded-lg hover:bg-green-50 transition-colors duration-200">
                        <i class="fas fa-file-excel mr-1"></i>Template Excel
                    </a>
                </div>
            </div>
            
            <div class="flex gap-3">
                <button type="button" onclick="closeImportModal()" 
                        class="flex-1 inline-flex items-center justify-center px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                    <i class="fas fa-times mr-2"></i>Batal
                </button>
                <button type="submit" 
                        class="flex-1 inline-flex items-center justify-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200">
                    <i class="fas fa-upload mr-2"></i>Import Data
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function confirmDelete(id, nama) {
    document.getElementById('pendudukName').textContent = nama;
    document.getElementById('deleteForm').action = `{{ route('admin.data-kependudukan.index') }}/${id}`;
    document.getElementById('deleteModal').classList.remove('hidden');
}

function closeDeleteModal() {
    document.getElementById('deleteModal').classList.add('hidden');
}

// Bulk Actions Functions
function toggleAllCheckboxes() {
    const selectAll = document.getElementById('selectAll');
    const checkboxes = document.querySelectorAll('.item-checkbox');
    
    checkboxes.forEach(checkbox => {
        checkbox.checked = selectAll.checked;
    });
    
    updateBulkActions();
}

function updateBulkActions() {
    const checkboxes = document.querySelectorAll('.item-checkbox:checked');
    const bulkActions = document.getElementById('bulkActions');
    const selectedCount = document.getElementById('selectedCount');
    const selectAll = document.getElementById('selectAll');
    const allCheckboxes = document.querySelectorAll('.item-checkbox');
    
    // Update selected count
    selectedCount.textContent = `${checkboxes.length} dipilih`;
    
    // Show/hide bulk actions
    if (checkboxes.length > 0) {
        bulkActions.classList.remove('hidden');
        bulkActions.classList.add('flex');
    } else {
        bulkActions.classList.add('hidden');
        bulkActions.classList.remove('flex');
    }
    
    // Update select all checkbox state
    if (checkboxes.length === allCheckboxes.length) {
        selectAll.checked = true;
        selectAll.indeterminate = false;
    } else if (checkboxes.length > 0) {
        selectAll.checked = false;
        selectAll.indeterminate = true;
    } else {
        selectAll.checked = false;
        selectAll.indeterminate = false;
    }
}

function clearSelection() {
    const checkboxes = document.querySelectorAll('.item-checkbox');
    const selectAll = document.getElementById('selectAll');
    
    checkboxes.forEach(checkbox => {
        checkbox.checked = false;
    });
    selectAll.checked = false;
    selectAll.indeterminate = false;
    
    updateBulkActions();
}

function confirmBulkDelete() {
    const checkboxes = document.querySelectorAll('.item-checkbox:checked');
    const ids = Array.from(checkboxes).map(cb => cb.value);
    
    if (ids.length === 0) {
        alert('Pilih minimal satu data untuk dihapus');
        return;
    }
    
    document.getElementById('bulkDeleteCount').textContent = ids.length;
    document.getElementById('bulkDeleteIds').value = ids.join(',');
    document.getElementById('bulkDeleteModal').classList.remove('hidden');
}

function closeBulkDeleteModal() {
    document.getElementById('bulkDeleteModal').classList.add('hidden');
}

function exportData(format, subFormat = null) {
    const params = new URLSearchParams(window.location.search);
    
    let exportUrl;
    if (format === 'excel') {
        exportUrl = `{{ route('admin.data-kependudukan.export.excel') }}`;
        if (subFormat) {
            params.set('format', subFormat);
        }
    } else if (format === 'pdf') {
        exportUrl = `{{ route('admin.data-kependudukan.export.pdf') }}`;
    }
    
    if (params.toString()) {
        exportUrl += '?' + params.toString();
    }
    
    // Hide dropdown after selection
    document.getElementById('exportDropdown').classList.add('hidden');
    
    window.location.href = exportUrl;
}

function toggleExportDropdown() {
    const dropdown = document.getElementById('exportDropdown');
    dropdown.classList.toggle('hidden');
}

// Close dropdown when clicking outside
document.addEventListener('click', function(event) {
    const dropdown = document.getElementById('exportDropdown');
    const button = event.target.closest('button');
    
    if (!button || !button.onclick || button.onclick.toString().indexOf('toggleExportDropdown') === -1) {
        dropdown.classList.add('hidden');
    }
});

// Auto-submit form on filter change
document.querySelectorAll('select[name="jenis_kelamin"], select[name="status"], select[name="rt"]').forEach(function(select) {
    select.addEventListener('change', function() {
        this.closest('form').submit();
    });
});

// Close modal when clicking outside
document.getElementById('deleteModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeDeleteModal();
    }
});

document.getElementById('bulkDeleteModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeBulkDeleteModal();
    }
});

// Import Modal Functions
function openImportModal() {
    document.getElementById('importModal').classList.remove('hidden');
    document.getElementById('importModal').classList.add('flex');
}

function closeImportModal() {
    document.getElementById('importModal').classList.add('hidden');
    document.getElementById('importModal').classList.remove('flex');
}

// Close import modal when clicking outside
document.getElementById('importModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeImportModal();
    }
});

// Initialize page
document.addEventListener('DOMContentLoaded', function() {
    updateBulkActions();
});
</script>
@endsection
