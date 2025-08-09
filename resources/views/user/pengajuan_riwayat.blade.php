{{-- Riwayat pengajuan surat oleh user --}}
@extends('layouts.user')
@section('content')
<div class="min-h-screen bg-gradient-to-br from-village-light via-white to-village-accent/20">
    <div class="max-w-7xl mx-auto px-4 md:px-6 py-6 md:py-8">
        <!-- Page Header -->
        <div class="mb-6 md:mb-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold bg-gradient-to-r from-village-primary to-village-secondary bg-clip-text text-transparent flex items-center gap-3">
                        <i class="fas fa-history text-village-primary"></i>
                        Riwayat Pengajuan
                    </h1>
                    <p class="text-gray-600 mt-1 md:mt-2 text-sm md:text-base">Lihat semua pengajuan surat yang pernah Anda ajukan beserta statusnya</p>
                </div>
                <div class="flex items-center space-x-3">
                    <a href="{{ route('user.pengajuan.form') }}" 
                       class="inline-flex items-center px-4 md:px-6 py-2 md:py-3 bg-gradient-to-r from-village-primary to-village-secondary text-white font-medium rounded-lg md:rounded-xl hover:from-village-secondary hover:to-village-primary focus:ring-4 focus:ring-village-primary/20 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                        <i class="fas fa-plus mr-2"></i>
                        <span class="hidden sm:inline">Buat Pengajuan Baru</span>
                        <span class="sm:hidden">Buat Baru</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Alert Messages -->
        @if(session('success'))
            <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 md:px-6 py-4 rounded-xl mb-6 flex items-start space-x-3 shadow-sm">
                <i class="fas fa-check-circle mt-1 text-emerald-600"></i>
                <div>
                    <strong>Berhasil!</strong> {{ session('success') }}
                </div>
            </div>
        @endif

        <!-- Statistics Cards -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 mb-6 md:mb-8">
            <!-- Total Pengajuan -->
            <div class="stat-card-hover">
                <div class="bg-white rounded-xl md:rounded-2xl p-4 md:p-6 shadow-lg border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-xl md:text-2xl font-bold text-gray-900">{{ number_format($pengajuans->count()) }}</div>
                            <div class="text-xs md:text-sm text-gray-600 font-medium">Total</div>
                        </div>
                        <div class="w-8 h-8 md:w-10 md:h-10 bg-gradient-to-br from-village-primary to-village-secondary rounded-lg md:rounded-xl flex items-center justify-center shadow-lg">
                            <i class="fas fa-file-alt text-white text-xs md:text-sm"></i>
                        </div>
                    </div>
                    <div class="mt-2 md:mt-3 flex items-center">
                        <div class="flex items-center text-xs text-blue-600">
                            <i class="fas fa-chart-line mr-1"></i>
                            <span class="hidden sm:inline">Semua pengajuan</span>
                            <span class="sm:hidden">Semua</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending -->
            <div class="stat-card-hover">
                <div class="bg-white rounded-xl md:rounded-2xl p-4 md:p-6 shadow-lg border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-xl md:text-2xl font-bold text-gray-900">{{ number_format($pengajuans->where('status', 'Pending')->count()) }}</div>
                            <div class="text-xs md:text-sm text-gray-600 font-medium">Pending</div>
                        </div>
                        <div class="w-8 h-8 md:w-10 md:h-10 bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-lg md:rounded-xl flex items-center justify-center shadow-lg">
                            <i class="fas fa-clock text-white text-xs md:text-sm"></i>
                        </div>
                    </div>
                    <div class="mt-2 md:mt-3 flex items-center">
                        <div class="flex items-center text-xs text-yellow-600">
                            <i class="fas fa-hourglass-half mr-1"></i>
                            <span class="hidden sm:inline">Sedang diproses</span>
                            <span class="sm:hidden">Proses</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Disetujui -->
            <div class="stat-card-hover">
                <div class="bg-white rounded-xl md:rounded-2xl p-4 md:p-6 shadow-lg border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-xl md:text-2xl font-bold text-gray-900">{{ number_format($pengajuans->where('status', 'Disetujui')->count()) }}</div>
                            <div class="text-xs md:text-sm text-gray-600 font-medium">Disetujui</div>
                        </div>
                        <div class="w-8 h-8 md:w-10 md:h-10 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-lg md:rounded-xl flex items-center justify-center shadow-lg">
                            <i class="fas fa-check-circle text-white text-xs md:text-sm"></i>
                        </div>
                    </div>
                    <div class="mt-2 md:mt-3 flex items-center">
                        <div class="flex items-center text-xs text-emerald-600">
                            <i class="fas fa-thumbs-up mr-1"></i>
                            <span class="hidden sm:inline">Berhasil disetujui</span>
                            <span class="sm:hidden">Berhasil</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ditolak -->
            <div class="stat-card-hover">
                <div class="bg-white rounded-xl md:rounded-2xl p-4 md:p-6 shadow-lg border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-xl md:text-2xl font-bold text-gray-900">{{ number_format($pengajuans->where('status', 'Ditolak')->count()) }}</div>
                            <div class="text-xs md:text-sm text-gray-600 font-medium">Ditolak</div>
                        </div>
                        <div class="w-8 h-8 md:w-10 md:h-10 bg-gradient-to-br from-red-500 to-red-600 rounded-lg md:rounded-xl flex items-center justify-center shadow-lg">
                            <i class="fas fa-times-circle text-white text-xs md:text-sm"></i>
                        </div>
                    </div>
                    <div class="mt-2 md:mt-3 flex items-center">
                        <div class="flex items-center text-xs text-red-600">
                            <i class="fas fa-times mr-1"></i>
                            <span class="hidden sm:inline">Tidak disetujui</span>
                            <span class="sm:hidden">Tidak</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if($pengajuans->count() > 0)
        <!-- Table Section -->
        <div class="bg-white rounded-xl md:rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="px-4 md:px-6 py-3 md:py-4 border-b border-gray-100 bg-gradient-to-r from-village-primary/5 to-village-secondary/5">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                    <div>
                        <h3 class="text-base md:text-lg font-semibold text-gray-900 flex items-center gap-2">
                            <i class="fas fa-list text-village-primary"></i>
                            Daftar Pengajuan
                        </h3>
                        <p class="text-xs md:text-sm text-gray-500">Kelola dan pantau status pengajuan Anda</p>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="relative">
                            <input type="text" placeholder="Cari pengajuan..." id="searchInput" 
                                   class="w-full sm:w-64 px-4 py-2 pl-10 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent transition-colors">
                            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 text-sm"></i>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-3 md:px-6 py-2 md:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                            <th class="px-3 md:px-6 py-2 md:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Surat</th>
                            <th class="px-3 md:px-6 py-2 md:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">Tanggal</th>
                            <th class="px-3 md:px-6 py-2 md:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-3 md:px-6 py-2 md:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden lg:table-cell">Catatan</th>
                            <th class="px-3 md:px-6 py-2 md:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($pengajuans as $pengajuan)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-3 md:px-6 py-3 md:py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                    #{{ $loop->iteration }}
                                </span>
                            </td>
                            <td class="px-3 md:px-6 py-3 md:py-4">
                                <div class="flex items-center">
                                    <div class="w-6 h-6 md:w-8 md:h-8 bg-gradient-to-br from-village-primary to-village-secondary rounded-full flex items-center justify-center shadow-lg mr-2 md:mr-3">
                                        <i class="fas fa-file-contract text-white text-xs"></i>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <div class="text-xs md:text-sm font-medium text-gray-900 truncate">{{ $pengajuan->jenisSurat->nama ?? 'N/A' }}</div>
                                        <div class="text-xs text-gray-500 truncate md:hidden">{{ $pengajuan->created_at->format('d M Y') }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-3 md:px-6 py-3 md:py-4 whitespace-nowrap text-xs md:text-sm text-gray-900 hidden md:table-cell">
                                <div>
                                    <div class="font-medium">{{ $pengajuan->created_at->format('d M Y') }}</div>
                                    <div class="text-gray-500">{{ $pengajuan->created_at->format('H:i') }}</div>
                                </div>
                            </td>
                            <td class="px-3 md:px-6 py-3 md:py-4 whitespace-nowrap">
                                @if($pengajuan->status == 'Pending')
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                        <i class="fas fa-clock mr-1"></i>
                                        <span class="hidden sm:inline">Pending</span>
                                        <span class="sm:hidden">P</span>
                                    </span>
                                @elseif($pengajuan->status == 'Disetujui')
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        <i class="fas fa-check-circle mr-1"></i>
                                        <span class="hidden sm:inline">Disetujui</span>
                                        <span class="sm:hidden">OK</span>
                                    </span>
                                @elseif($pengajuan->status == 'Ditolak')
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        <i class="fas fa-times-circle mr-1"></i>
                                        <span class="hidden sm:inline">Ditolak</span>
                                        <span class="sm:hidden">NO</span>
                                    </span>
                                @endif
                            </td>
                            <td class="px-3 md:px-6 py-3 md:py-4 hidden lg:table-cell">
                                <div class="max-w-xs">
                                    @if($pengajuan->catatan_admin)
                                        <span class="text-xs md:text-sm text-gray-900 truncate">{{ Str::limit($pengajuan->catatan_admin, 50) }}</span>
                                    @else
                                        <span class="text-xs md:text-sm text-gray-400 italic">-</span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-3 md:px-6 py-3 md:py-4 whitespace-nowrap text-xs font-medium">
                                <div class="flex items-center space-x-1 md:space-x-2">
                                    <a href="{{ route('user.pengajuan.detail', $pengajuan->id) }}" 
                                       class="inline-flex items-center px-2 py-1 text-xs font-medium text-blue-600 bg-blue-100 rounded-md hover:bg-blue-200 transition-colors">
                                        <i class="fas fa-eye mr-1"></i>
                                        <span class="hidden sm:inline">Detail</span>
                                    </a>
                                    @if($pengajuan->file_url)
                                        <a href="{{ route('storage.surat_jadi', basename($pengajuan->file_url)) }}" target="_blank" 
                                           class="inline-flex items-center px-2 py-1 text-xs font-medium text-green-600 bg-green-100 rounded-md hover:bg-green-200 transition-colors">
                                            <i class="fas fa-download mr-1"></i>
                                            <span class="hidden md:inline">Download</span>
                                        </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @else
        <!-- Empty State -->
        <div class="bg-white rounded-xl md:rounded-2xl shadow-lg border border-gray-100 text-center py-12 md:py-16">
            <div class="w-16 h-16 md:w-20 md:h-20 bg-gray-100 rounded-full flex items-center justify-center mb-4 md:mb-6 mx-auto">
                <i class="fas fa-inbox text-gray-400 text-2xl md:text-3xl"></i>
            </div>
            <h3 class="text-lg md:text-xl font-semibold text-gray-900 mb-2 md:mb-3">Belum Ada Pengajuan</h3>
            <p class="text-gray-600 text-sm md:text-base mb-6 md:mb-8 max-w-md mx-auto">Anda belum membuat pengajuan surat apapun. Mulai dengan membuat pengajuan pertama Anda!</p>
            <a href="{{ route('user.pengajuan.form') }}" 
               class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-village-primary to-village-secondary text-white font-medium rounded-lg hover:from-village-secondary hover:to-village-primary transition-colors shadow-lg">
                <i class="fas fa-plus mr-2"></i> 
                Buat Pengajuan Pertama
            </a>
        </div>
        @endif
    </div>
</div>

<script>
// Search functionality
document.getElementById('searchInput')?.addEventListener('input', function() {
    const searchTerm = this.value.toLowerCase();
    const rows = document.querySelectorAll('tbody tr');
    
    rows.forEach(row => {
        const jenisSurat = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
        const status = row.querySelector('td:nth-child(4)').textContent.toLowerCase();
        
        if (jenisSurat.includes(searchTerm) || status.includes(searchTerm)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});
</script>
@endsection