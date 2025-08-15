@extends('layouts.admin')

@section('title', 'Kelola Agenda')

@section('content')
<div class="p-3 md:p-6 bg-gray-50 min-h-screen">
    <!-- Header Section -->
    <div class="mb-6 md:mb-8">
        <div class="flex flex-col gap-4">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800 flex items-center gap-2 md:gap-3">
                    <div class="w-8 h-8 md:w-10 md:h-10 bg-gradient-to-r from-emerald-500 to-teal-600 rounded-lg md:rounded-xl flex items-center justify-center">
                        <i class="fas fa-calendar-alt text-white text-sm md:text-base"></i>
                    </div>
                    <span class="hidden sm:inline">Kelola Agenda Kegiatan</span>
                    <span class="sm:hidden">Agenda</span>
                </h1>
                <nav class="flex items-center space-x-2 text-sm text-gray-600 mt-2">
                    <span class="hover:text-emerald-600 transition-colors duration-200">Dashboard</span>
                    <i class="fas fa-chevron-right text-gray-400"></i>
                    <span class="text-gray-800 font-medium">Kelola Agenda</span>
                </nav>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.agenda.create') }}" 
                   class="inline-flex items-center px-3 md:px-4 py-2 bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-medium rounded-lg hover:from-emerald-700 hover:to-teal-700 transition-all duration-200 shadow-lg hover:shadow-xl text-sm md:text-base">
                    <i class="fas fa-plus mr-2"></i>
                    <span class="hidden sm:inline">Tambah Agenda</span>
                    <span class="sm:hidden">Tambah</span>
                </a>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-4 md:mb-6 p-3 md:p-4 bg-green-50 border border-green-200 rounded-lg flex items-center gap-3">
            <div class="w-6 h-6 md:w-8 md:h-8 bg-green-500 rounded-full flex items-center justify-center">
                <i class="fas fa-check text-white text-xs md:text-sm"></i>
            </div>
            <span class="text-green-800 font-medium text-sm md:text-base">{{ session('success') }}</span>
        </div>
    @endif

    <!-- Stats Cards -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 md:gap-6 mb-4 md:mb-8">
        <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-lg border border-white/20 p-3 md:p-6 hover:transform hover:scale-105 transition-all duration-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs md:text-sm font-medium text-gray-600 mb-1">Aktif</p>
                    <p class="text-xl md:text-3xl font-bold text-gray-900">{{ $agendas->where('status', 'aktif')->count() }}</p>
                    <div class="flex items-center mt-1 md:mt-2 text-xs text-green-600">
                        <i class="fas fa-calendar-check mr-1"></i>
                        <span class="hidden sm:inline">Sedang berjalan</span>
                        <span class="sm:hidden">Aktif</span>
                    </div>
                </div>
                <div class="w-8 h-8 md:w-12 md:h-12 bg-gradient-to-r from-green-500 to-emerald-600 rounded-xl flex items-center justify-center">
                    <i class="fas fa-calendar-check text-white text-sm md:text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-lg border border-white/20 p-3 md:p-6 hover:transform hover:scale-105 transition-all duration-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs md:text-sm font-medium text-gray-600 mb-1">Selesai</p>
                    <p class="text-xl md:text-3xl font-bold text-gray-900">{{ $agendas->where('status', 'selesai')->count() }}</p>
                    <div class="flex items-center mt-1 md:mt-2 text-xs text-blue-600">
                        <i class="fas fa-check-circle mr-1"></i>
                        <span class="hidden sm:inline">Diselesaikan</span>
                        <span class="sm:hidden">Selesai</span>
                    </div>
                </div>
                <div class="w-8 h-8 md:w-12 md:h-12 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center">
                    <i class="fas fa-tasks text-white text-sm md:text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-lg border border-white/20 p-3 md:p-6 hover:transform hover:scale-105 transition-all duration-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs md:text-sm font-medium text-gray-600 mb-1">Mendatang</p>
                    <p class="text-xl md:text-3xl font-bold text-gray-900">{{ $agendas->where('tanggal_mulai', '>=', now())->count() }}</p>
                    <div class="flex items-center mt-1 md:mt-2 text-xs text-purple-600">
                        <i class="fas fa-clock mr-1"></i>
                        <span class="hidden sm:inline">Akan datang</span>
                        <span class="sm:hidden">Datang</span>
                    </div>
                </div>
                <div class="w-8 h-8 md:w-12 md:h-12 bg-gradient-to-r from-purple-500 to-violet-600 rounded-xl flex items-center justify-center">
                    <i class="fas fa-clock text-white text-sm md:text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-lg border border-white/20 p-3 md:p-6 hover:transform hover:scale-105 transition-all duration-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs md:text-sm font-medium text-gray-600 mb-1">Batal</p>
                    <p class="text-xl md:text-3xl font-bold text-gray-900">{{ $agendas->where('status', 'dibatalkan')->count() }}</p>
                    <div class="flex items-center mt-1 md:mt-2 text-xs text-red-600">
                        <i class="fas fa-times-circle mr-1"></i>
                        <span class="hidden sm:inline">Dibatalkan</span>
                        <span class="sm:hidden">Batal</span>
                    </div>
                </div>
                <div class="w-8 h-8 md:w-12 md:h-12 bg-gradient-to-r from-red-500 to-rose-600 rounded-xl flex items-center justify-center">
                    <i class="fas fa-ban text-white text-sm md:text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Agenda Management Table -->
    <div class="bg-white/80 backdrop-blur-sm rounded-xl md:rounded-2xl shadow-lg border border-white/20 overflow-hidden">
        <div class="px-3 md:px-6 py-3 md:py-4 bg-gradient-to-r from-emerald-600 to-teal-600">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                <h3 class="text-sm md:text-lg font-semibold text-white flex items-center gap-2">
                    <i class="fas fa-list text-xs md:text-base"></i>
                    <span class="hidden sm:inline">Daftar Agenda Kegiatan</span>
                    <span class="sm:hidden">Agenda</span>
                </h3>
                <div class="flex gap-2">
                    <select id="filterStatus" class="px-2 md:px-3 py-1.5 md:py-2 bg-white/10 border border-white/20 rounded-lg text-white text-xs md:text-sm focus:ring-2 focus:ring-white/20 focus:border-white/30 transition-all duration-200">
                        <option value="">Semua Status</option>
                        <option value="aktif">Aktif</option>
                        <option value="selesai">Selesai</option>
                        <option value="dibatalkan">Dibatalkan</option>
                    </select>
                    <select id="filterKategori" class="px-2 md:px-3 py-1.5 md:py-2 bg-white/10 border border-white/20 rounded-lg text-white text-xs md:text-sm focus:ring-2 focus:ring-white/20 focus:border-white/30 transition-all duration-200">
                        <option value="">Semua Kategori</option>
                        <option value="rapat">Rapat</option>
                        <option value="acara">Acara</option>
                        <option value="kegiatan">Kegiatan</option>
                        <option value="musyawarah">Musyawarah</option>
                        <option value="pelatihan">Pelatihan</option>
                        <option value="lainnya">Lainnya</option>
                    </select>
                </div>
            </div>
        </div>
        
        <!-- Mobile Card Layout -->
        <div class="block md:hidden">
            @forelse($agendas as $key => $agenda)
            <div class="table-row agenda-row border-b border-gray-200 p-3 hover:bg-gray-50 transition-colors duration-200" data-status="{{ $agenda->status }}" data-kategori="{{ $agenda->kategori }}">
                <div class="flex items-start gap-3 mb-3">
                    <div class="flex-shrink-0">
                        @if($agenda->gambar)
                            <img class="h-12 w-16 rounded-lg object-cover" src="{{ Storage::url($agenda->gambar) }}" alt="Agenda">
                        @else
                            <div class="h-12 w-16 bg-gradient-to-r from-gray-200 to-gray-300 rounded-lg flex items-center justify-center">
                                <i class="fas fa-calendar-alt text-gray-500"></i>
                            </div>
                        @endif
                    </div>
                    <div class="flex-1 min-w-0">
                        <h4 class="font-semibold text-gray-900 text-sm mb-1">{{ $agenda->judul }}</h4>
                        <p class="text-xs text-gray-600 mb-2">{{ Str::limit($agenda->deskripsi, 60) }}</p>
                        <div class="flex flex-wrap gap-1 mb-2">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                <i class="fas fa-tag mr-1"></i>
                                {{ ucfirst($agenda->kategori) }}
                            </span>
                            @if($agenda->status == 'aktif')
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    <i class="fas fa-check-circle mr-1"></i>Aktif
                                </span>
                            @elseif($agenda->status == 'selesai')
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                    <i class="fas fa-flag-checkered mr-1"></i>Selesai
                                </span>
                            @else
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                    <i class="fas fa-times-circle mr-1"></i>Batal
                                </span>
                            @endif
                        </div>
                        <div class="text-xs text-gray-500 mb-2">
                            <div class="flex items-center mb-1">
                                <i class="fas fa-calendar-day text-emerald-500 mr-2"></i>
                                {{ $agenda->tanggal_mulai->format('d M Y') }}
                            </div>
                            <div class="flex items-center mb-1">
                                <i class="fas fa-clock text-gray-400 mr-2"></i>
                                {{ $agenda->tanggal_mulai->format('H:i') }} - {{ $agenda->tanggal_selesai->format('H:i') }}
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-map-marker-alt text-red-500 mr-2"></i>
                                {{ Str::limit($agenda->lokasi, 30) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end gap-1">
                    <a href="{{ route('admin.agenda.show', $agenda->id) }}" 
                       class="inline-flex items-center px-2 py-1.5 border border-transparent text-xs leading-4 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 transition-colors duration-200">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route('admin.agenda.edit', $agenda->id) }}" 
                       class="inline-flex items-center px-2 py-1.5 border border-transparent text-xs leading-4 font-medium rounded-md text-white bg-yellow-600 hover:bg-yellow-700 transition-colors duration-200">
                        <i class="fas fa-edit"></i>
                    </a>
                    <button type="button" 
                            class="inline-flex items-center px-2 py-1.5 border border-transparent text-xs leading-4 font-medium rounded-md text-white bg-red-600 hover:bg-red-700 transition-colors duration-200"
                            onclick="confirmDeleteAgenda({{ $agenda->id }}, '{{ addslashes($agenda->judul) }}')">
                        <i class="fas fa-trash"></i>
                    </button>
                    <!-- Alternative simple delete -->
                    <form method="POST" action="{{ route('admin.agenda.destroy', $agenda->id) }}" class="inline ml-1" 
                          onsubmit="return confirm('Yakin ingin menghapus agenda: {{ addslashes($agenda->judul) }}?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center px-1.5 py-1.5 text-xs font-medium text-red-600 bg-red-50 rounded hover:bg-red-100 transition-colors" title="Hapus Langsung">
                            <i class="fas fa-times"></i>
                        </button>
                    </form>
                </div>
                <form id="delete-form-{{ $agenda->id }}" action="{{ route('admin.agenda.destroy', $agenda->id) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
            @empty
            <div class="p-6 text-center">
                <div class="w-16 h-16 mx-auto mb-4 bg-gray-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-calendar-times text-gray-400 text-2xl"></i>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">Tidak ada agenda</h3>
                <p class="text-gray-500 mb-4">Belum ada agenda kegiatan yang terdaftar</p>
                <a href="{{ route('admin.agenda.create') }}" 
                   class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-medium rounded-lg hover:from-emerald-700 hover:to-teal-700 transition-all duration-200">
                    <i class="fas fa-plus mr-2"></i>
                    Tambah Agenda
                </a>
            </div>
            @endforelse
        </div>

        <!-- Desktop Table Layout -->
        <div class="hidden md:block overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Agenda</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jadwal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lokasi</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody id="tableBody" class="bg-white divide-y divide-gray-200">
                    @forelse($agendas as $key => $agenda)
                    <tr class="table-row agenda-row hover:bg-gray-50 transition-colors duration-200" data-status="{{ $agenda->status }}" data-kategori="{{ $agenda->kategori }}">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-emerald-600">{{ $agendas->firstItem() + $key }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-12 w-16">
                                    @if($agenda->gambar)
                                        <img class="h-12 w-16 rounded-lg object-cover" src="{{ Storage::url($agenda->gambar) }}" alt="Agenda">
                                    @else
                                        <div class="h-12 w-16 bg-gradient-to-r from-gray-200 to-gray-300 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-calendar-alt text-gray-500"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $agenda->judul }}</div>
                                    <div class="text-sm text-gray-500">{{ Str::limit($agenda->deskripsi, 50) }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                <i class="fas fa-tag mr-1"></i>
                                {{ ucfirst($agenda->kategori) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            <div class="flex flex-col gap-1">
                                <div class="flex items-center text-gray-900">
                                    <i class="fas fa-calendar-day text-emerald-500 mr-2"></i>
                                    {{ $agenda->tanggal_mulai->format('d M Y') }}
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <i class="fas fa-clock text-gray-400 mr-2"></i>
                                    {{ $agenda->tanggal_mulai->format('H:i') }} - {{ $agenda->tanggal_selesai->format('H:i') }}
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            <div class="flex items-center">
                                <i class="fas fa-map-marker-alt text-red-500 mr-2"></i>
                                {{ Str::limit($agenda->lokasi, 20) }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($agenda->status == 'aktif')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    <i class="fas fa-check-circle mr-1"></i>
                                    Aktif
                                </span>
                            @elseif($agenda->status == 'selesai')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                    <i class="fas fa-flag-checkered mr-1"></i>
                                    Selesai
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                    <i class="fas fa-times-circle mr-1"></i>
                                    Dibatalkan
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.agenda.show', $agenda->id) }}" 
                                   class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 transition-colors duration-200"
                                   title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.agenda.edit', $agenda->id) }}" 
                                   class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-yellow-600 hover:bg-yellow-700 transition-colors duration-200"
                                   title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" 
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-red-600 hover:bg-red-700 transition-colors duration-200"
                                        onclick="deleteAgenda({{ $agenda->id }})" 
                                        title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                            <form id="delete-form-{{ $agenda->id }}" action="{{ route('admin.agenda.destroy', $agenda->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-16 text-center">
                            <div class="w-16 h-16 mx-auto mb-4 bg-gray-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-calendar-times text-gray-400 text-2xl"></i>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Tidak ada agenda</h3>
                            <p class="text-gray-500 mb-4">Belum ada agenda kegiatan yang terdaftar</p>
                            <a href="{{ route('admin.agenda.create') }}" 
                               class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-medium rounded-lg hover:from-emerald-700 hover:to-teal-700 transition-all duration-200">
                                <i class="fas fa-plus mr-2"></i>
                                Tambah Agenda Pertama
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($agendas->hasPages())
            <div class="px-3 md:px-6 py-3 md:py-4 bg-gray-50 border-t border-gray-200">
                {{ $agendas->links() }}
            </div>
        @endif
    </div>
</div>

<script>
console.log('Agenda page loaded');

function confirmDeleteAgenda(id, title) {
    console.log('confirmDeleteAgenda called with ID:', id, 'Title:', title);
    
    const confirmed = confirm('Apakah Anda yakin ingin menghapus agenda: ' + title + '?');
    if (confirmed) {
        const form = document.getElementById('delete-form-' + id);
        if (form) {
            console.log('Submitting delete form for ID:', id);
            form.submit();
        } else {
            console.error('Delete form not found for ID:', id);
        }
    }
}

function deleteAgenda(id) {
    // Legacy function for backward compatibility
    console.log('deleteAgenda called with ID:', id);
    confirmDeleteAgenda(id, 'agenda ini');
}

// Simple Filter Functions
document.addEventListener('DOMContentLoaded', function() {
    const statusFilter = document.getElementById('filterStatus');
    const kategoriFilter = document.getElementById('filterKategori');
    
    if (statusFilter) {
        statusFilter.addEventListener('change', filterTable);
    }
    if (kategoriFilter) {
        kategoriFilter.addEventListener('change', filterTable);
    }
});

function filterTable() {
    const statusFilter = document.getElementById('filterStatus');
    const kategoriFilter = document.getElementById('filterKategori');
    
    if (!statusFilter || !kategoriFilter) return;
    
    const statusValue = statusFilter.value;
    const kategoriValue = kategoriFilter.value;
    const rows = document.querySelectorAll('.agenda-row');

    rows.forEach(row => {
        const status = row.dataset.status;
        const kategori = row.dataset.kategori;
        
        const statusMatch = !statusValue || status === statusValue;
        const kategoriMatch = !kategoriValue || kategori === kategoriValue;
        
        if (statusMatch && kategoriMatch) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}

console.log('Agenda scripts loaded successfully');
</script>
</script>
@endsection
