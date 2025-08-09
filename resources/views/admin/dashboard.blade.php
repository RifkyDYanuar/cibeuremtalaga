@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('breadcrumb')
    <span class="mx-2">/</span>
    <span class="text-village-primary">Dashboard</span>
@endsection

@section('content')

@php
    use App\Models\JenisSurat;
@endphp

<!-- Page Header -->
<div class="mb-6 md:mb-8">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold bg-gradient-to-r from-village-primary to-village-secondary bg-clip-text text-transparent">
                Dashboard Admin
            </h1>
            <p class="text-gray-600 mt-1 md:mt-2 text-sm md:text-base">Selamat datang di panel administrasi SIDESA Cibeureum</p>
        </div>
        <div class="flex items-center justify-between md:justify-end md:space-x-3">
            <div class="text-left md:text-right">
                <p class="text-sm text-gray-500">{{ now()->format('l, d F Y') }}</p>
                <p class="text-xs text-gray-400">{{ now()->format('H:i') }} WIB</p>
            </div>
            <div class="w-10 h-10 md:w-12 md:h-12 bg-gradient-to-br from-village-primary to-village-secondary rounded-xl flex items-center justify-center shadow-lg animate-float">
                <i class="fas fa-sun text-white text-base md:text-lg"></i>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 mb-6 md:mb-8">
    <a href="{{ route('admin.pengajuan.list') }}" class="stat-card-hover group">
        <div class="bg-white rounded-xl md:rounded-2xl p-4 md:p-6 shadow-lg border border-gray-100 hover:border-village-primary/30 transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-xl md:text-2xl font-bold text-gray-900 group-hover:text-village-primary transition-colors">
                        {{ $pengajuanPending }}
                    </div>
                    <div class="text-xs md:text-sm text-gray-600 font-medium">Perlu Diproses</div>
                    <div class="text-xs text-gray-400 mt-1">Pengajuan pending</div>
                </div>
                <div class="w-10 h-10 md:w-12 md:h-12 bg-gradient-to-br from-red-500 to-red-600 rounded-lg md:rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                    <i class="fas fa-clock text-white text-sm md:text-base"></i>
                </div>
            </div>
            <div class="mt-3 md:mt-4 flex items-center text-xs text-red-600">
                <i class="fas fa-arrow-up mr-1"></i>
                Prioritas tinggi
            </div>
        </div>
    </a>

    <a href="{{ route('admin.agenda.create') }}" class="stat-card-hover group">
        <div class="bg-white rounded-xl md:rounded-2xl p-4 md:p-6 shadow-lg border border-gray-100 hover:border-village-primary/30 transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-xs md:text-sm text-gray-600 font-medium">Tambah Agenda</div>
                    <div class="text-xs text-gray-400 mt-1">Buat agenda baru</div>
                </div>
                <div class="w-10 h-10 md:w-12 md:h-12 bg-gradient-to-br from-village-primary to-village-secondary rounded-lg md:rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                    <i class="fas fa-plus text-white text-sm md:text-base"></i>
                </div>
            </div>
            <div class="mt-3 md:mt-4 flex items-center text-xs text-village-primary">
                <i class="fas fa-calendar-plus mr-1"></i>
                Quick action
            </div>
        </div>
    </a>

    <a href="{{ route('admin.data-kependudukan.index') }}" class="stat-card-hover group">
        <div class="bg-white rounded-xl md:rounded-2xl p-4 md:p-6 shadow-lg border border-gray-100 hover:border-village-primary/30 transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-xs md:text-sm text-gray-600 font-medium">Data Penduduk</div>
                    <div class="text-xs text-gray-400 mt-1">Kelola kependudukan</div>
                </div>
                <div class="w-10 h-10 md:w-12 md:h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg md:rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                    <i class="fas fa-users text-white text-sm md:text-base"></i>
                </div>
            </div>
            <div class="mt-3 md:mt-4 flex items-center text-xs text-blue-600">
                <i class="fas fa-chart-pie mr-1"></i>
                Statistik tersedia
            </div>
        </div>
    </a>

    <button onclick="generateReport()" class="stat-card-hover group text-left">
        <div class="bg-white rounded-xl md:rounded-2xl p-4 md:p-6 shadow-lg border border-gray-100 hover:border-village-primary/30 transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-xs md:text-sm text-gray-600 font-medium">Generate Laporan</div>
                    <div class="text-xs text-gray-400 mt-1">Buat laporan bulanan</div>
                </div>
                <div class="w-10 h-10 md:w-12 md:h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg md:rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                    <i class="fas fa-chart-line text-white text-sm md:text-base"></i>
                </div>
            </div>
            <div class="mt-3 md:mt-4 flex items-center text-xs text-purple-600">
                <i class="fas fa-download mr-1"></i>
                Export data
            </div>
        </div>
    </button>
</div>

<!-- Statistics Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 mb-6 md:mb-8">
    <!-- Total Pengguna -->
    <div class="stat-card-hover">
        <div class="bg-white rounded-xl md:rounded-2xl p-4 md:p-6 shadow-lg border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-xl md:text-2xl font-bold text-gray-900">{{ number_format($totalPengguna) }}</div>
                    <div class="text-xs md:text-sm text-gray-600 font-medium">Total Pengguna</div>
                </div>
                <div class="w-10 h-10 md:w-12 md:h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg md:rounded-xl flex items-center justify-center shadow-lg">
                    <i class="fas fa-users text-white text-sm md:text-base"></i>
                </div>
            </div>
            <div class="mt-3 md:mt-4 flex items-center">
                <div class="flex items-center text-xs text-green-600">
                    <i class="fas fa-arrow-up mr-1"></i>
                    <span>Aktif dalam sistem</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Pengajuan -->
    <div class="stat-card-hover">
        <div class="bg-white rounded-xl md:rounded-2xl p-4 md:p-6 shadow-lg border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-xl md:text-2xl font-bold text-gray-900">{{ number_format($totalPengajuan) }}</div>
                    <div class="text-xs md:text-sm text-gray-600 font-medium">Total Pengajuan</div>
                </div>
                <div class="w-10 h-10 md:w-12 md:h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-lg md:rounded-xl flex items-center justify-center shadow-lg">
                    <i class="fas fa-file-alt text-white text-sm md:text-base"></i>
                </div>
            </div>
            <div class="mt-3 md:mt-4 flex items-center">
                <div class="flex items-center text-xs text-blue-600">
                    <i class="fas fa-chart-line mr-1"></i>
                    <span>Semua waktu</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Pengajuan Disetujui -->
    <div class="stat-card-hover">
        <div class="bg-white rounded-xl md:rounded-2xl p-4 md:p-6 shadow-lg border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-xl md:text-2xl font-bold text-gray-900">{{ number_format($pengajuanDisetujui) }}</div>
                    <div class="text-xs md:text-sm text-gray-600 font-medium">Disetujui</div>
                </div>
                <div class="w-10 h-10 md:w-12 md:h-12 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-lg md:rounded-xl flex items-center justify-center shadow-lg">
                    <i class="fas fa-check-circle text-white text-sm md:text-base"></i>
                </div>
            </div>
            <div class="mt-3 md:mt-4 flex items-center">
                <div class="flex items-center text-xs text-emerald-600">
                    <i class="fas fa-thumbs-up mr-1"></i>
                    <span class="hidden sm:inline">{{ number_format(($pengajuanDisetujui / max($totalPengajuan, 1)) * 100, 1) }}% rasio persetujuan</span>
                    <span class="sm:hidden">{{ number_format(($pengajuanDisetujui / max($totalPengajuan, 1)) * 100, 1) }}%</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Agenda Aktif -->
    <div class="stat-card-hover">
        <div class="bg-white rounded-xl md:rounded-2xl p-4 md:p-6 shadow-lg border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-xl md:text-2xl font-bold text-gray-900">{{ number_format($agendaAktif) }}</div>
                    <div class="text-xs md:text-sm text-gray-600 font-medium">Agenda Aktif</div>
                </div>
                <div class="w-10 h-10 md:w-12 md:h-12 bg-gradient-to-br from-orange-500 to-orange-600 rounded-lg md:rounded-xl flex items-center justify-center shadow-lg">
                    <i class="fas fa-calendar-alt text-white text-sm md:text-base"></i>
                </div>
            </div>
            <div class="mt-3 md:mt-4 flex items-center">
                <div class="flex items-center text-xs text-orange-600">
                    <i class="fas fa-calendar-check mr-1"></i>
                    <span class="hidden sm:inline">Kegiatan mendatang</span>
                    <span class="sm:hidden">Mendatang</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Charts and Tables Section -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 md:gap-8 mb-6 md:mb-8">
    <!-- Monthly Submissions Chart -->
    <div class="bg-white rounded-xl md:rounded-2xl p-4 md:p-6 shadow-lg border border-gray-100">
        <div class="flex items-center justify-between mb-4 md:mb-6">
            <div>
                <h3 class="text-base md:text-lg font-semibold text-gray-900">Pengajuan Bulanan</h3>
                <p class="text-xs md:text-sm text-gray-500">Trend pengajuan 6 bulan terakhir</p>
            </div>
            <div class="w-8 h-8 md:w-10 md:h-10 bg-gradient-to-br from-village-primary to-village-secondary rounded-lg flex items-center justify-center shadow-lg">
                <i class="fas fa-chart-line text-white text-xs md:text-sm"></i>
            </div>
        </div>
        <div class="h-48 md:h-64">
            <canvas id="monthlySubmissionsChart"></canvas>
        </div>
    </div>

    <!-- Status Distribution -->
    <div class="bg-white rounded-xl md:rounded-2xl p-4 md:p-6 shadow-lg border border-gray-100">
        <div class="flex items-center justify-between mb-4 md:mb-6">
            <div>
                <h3 class="text-base md:text-lg font-semibold text-gray-900">Distribusi Status</h3>
                <p class="text-xs md:text-sm text-gray-500">Breakdown pengajuan berdasarkan status</p>
            </div>
            <div class="w-8 h-8 md:w-10 md:h-10 bg-gradient-to-br from-village-primary to-village-secondary rounded-lg flex items-center justify-center shadow-lg">
                <i class="fas fa-chart-pie text-white text-xs md:text-sm"></i>
            </div>
        </div>
        <div class="h-48 md:h-64">
            <canvas id="statusDistributionChart"></canvas>
        </div>
    </div>
</div>

<!-- Recent Activities -->
<div class="bg-white rounded-xl md:rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
    <div class="px-4 md:px-6 py-3 md:py-4 border-b border-gray-100 bg-gradient-to-r from-village-primary/5 to-village-secondary/5">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
            <div>
                <h3 class="text-base md:text-lg font-semibold text-gray-900">Pengajuan Terbaru</h3>
                <p class="text-xs md:text-sm text-gray-500">Daftar pengajuan yang perlu ditindaklanjuti</p>
            </div>
            <a href="{{ route('admin.pengajuan.list') }}" class="inline-flex items-center justify-center px-3 md:px-4 py-2 bg-village-primary text-white rounded-lg hover:bg-village-secondary transition-colors text-xs md:text-sm font-medium">
                <i class="fas fa-eye mr-2"></i>
                <span class="hidden sm:inline">Lihat Semua</span>
                <span class="sm:hidden">Semua</span>
            </a>
        </div>
    </div>
    
    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-3 md:px-6 py-2 md:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-3 md:px-6 py-2 md:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pemohon</th>
                        <th class="px-3 md:px-6 py-2 md:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden sm:table-cell">Jenis Surat</th>
                        <th class="px-3 md:px-6 py-2 md:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">Tanggal</th>
                        <th class="px-3 md:px-6 py-2 md:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-3 md:px-6 py-2 md:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($recentPengajuans as $pengajuan)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-3 md:px-6 py-3 md:py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                #{{ $pengajuan->id }}
                            </span>
                        </td>
                        <td class="px-3 md:px-6 py-3 md:py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="w-6 h-6 md:w-8 md:h-8 bg-gradient-to-br from-village-primary to-village-secondary rounded-full flex items-center justify-center shadow-lg mr-2 md:mr-3">
                                    <i class="fas fa-user text-white text-xs"></i>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <div class="text-xs md:text-sm font-medium text-gray-900 truncate">{{ $pengajuan->user->name ?? 'User tidak ditemukan' }}</div>
                                    <div class="text-xs text-gray-500 truncate hidden sm:block">{{ $pengajuan->user->email ?? '-' }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-3 md:px-6 py-3 md:py-4 whitespace-nowrap hidden sm:table-cell">
                            <div class="flex items-center">
                                <i class="fas fa-file-alt text-gray-400 mr-2"></i>
                                <span class="text-xs md:text-sm text-gray-900 truncate max-w-32">{{ $pengajuan->jenisSurat->nama ?? 'Jenis surat tidak ditemukan' }}</span>
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
                                    <span class="hidden sm:inline">Menunggu</span>
                                    <span class="sm:hidden">Pending</span>
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
                            @else
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                    {{ ucfirst($pengajuan->status) }}
                                </span>
                            @endif
                        </td>
                        <td class="px-3 md:px-6 py-3 md:py-4 whitespace-nowrap text-xs font-medium">
                            <div class="flex items-center space-x-1 md:space-x-2">
                                <a href="{{ route('admin.pengajuan.detail', $pengajuan->id) }}" class="inline-flex items-center px-2 py-1 text-xs font-medium text-blue-600 bg-blue-100 rounded-md hover:bg-blue-200 transition-colors">
                                    <i class="fas fa-eye mr-1"></i>
                                    <span class="hidden sm:inline">Detail</span>
                                </a>
                                @if($pengajuan->status == 'Pending')
                                    <form method="POST" action="{{ url('admin/pengajuan/'.$pengajuan->id.'/update') }}" style="display: inline;">
                                        @csrf
                                        <input type="hidden" name="status" value="Disetujui">
                                        <button type="submit" class="inline-flex items-center px-2 py-1 text-xs font-medium text-green-600 bg-green-100 rounded-md hover:bg-green-200 transition-colors" onclick="return confirm('Setujui pengajuan ini?')">
                                            <i class="fas fa-check mr-1"></i>
                                            <span class="hidden md:inline">Setuju</span>
                                        </button>
                                    </form>
                                    <form method="POST" action="{{ url('admin/pengajuan/'.$pengajuan->id.'/update') }}" style="display: inline;">
                                        @csrf
                                        <input type="hidden" name="status" value="Ditolak">
                                        <button type="submit" class="inline-flex items-center px-2 py-1 text-xs font-medium text-red-600 bg-red-100 rounded-md hover:bg-red-200 transition-colors" onclick="return confirm('Tolak pengajuan ini?')">
                                            <i class="fas fa-times mr-1"></i>
                                            <span class="hidden md:inline">Tolak</span>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-4 md:px-6 py-6 md:py-8 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <div class="w-12 h-12 md:w-16 md:h-16 bg-gray-100 rounded-full flex items-center justify-center mb-3 md:mb-4">
                                    <i class="fas fa-inbox text-gray-400 text-xl md:text-2xl"></i>
                                </div>
                                <h3 class="text-base md:text-lg font-medium text-gray-900 mb-1 md:mb-2">Belum ada pengajuan</h3>
                                <p class="text-sm text-gray-500">Tidak ada pengajuan surat yang ditemukan</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Generate Report Function
    function generateReport() {
        // Show loading state
        const button = event.target.closest('button');
        const originalContent = button.innerHTML;
        button.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Generating...';
        button.disabled = true;
        
        // Simulate report generation
        setTimeout(() => {
            // Reset button
            button.innerHTML = originalContent;
            button.disabled = false;
            
            // Show success message
            alert('Laporan berhasil dibuat! File akan diunduh dalam beberapa detik.');
            
            // Here you would typically trigger the actual report download
            // window.location.href = '/admin/laporan/download';
        }, 2000);
    }

    // Monthly Submissions Chart
    const monthlyCtx = document.getElementById('monthlySubmissionsChart');
    if (monthlyCtx) {
        new Chart(monthlyCtx, {
            type: 'line',
            data: {
                labels: {!! json_encode($monthlyLabels ?? []) !!},
                datasets: [{
                    label: 'Pengajuan',
                    data: {!! json_encode($monthlyData ?? []) !!},
                    borderColor: '#10b981',
                    backgroundColor: 'rgba(16, 185, 129, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0,0,0,0.05)'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    }

    // Status Distribution Chart
    const statusCtx = document.getElementById('statusDistributionChart');
    if (statusCtx) {
        new Chart(statusCtx, {
            type: 'doughnut',
            data: {
                labels: ['Pending', 'Disetujui', 'Ditolak'],
                datasets: [{
                    data: [{{ $pengajuanPending }}, {{ $pengajuanDisetujui }}, {{ $pengajuanDitolak }}],
                    backgroundColor: [
                        '#f59e0b',
                        '#10b981',
                        '#ef4444'
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            padding: 20,
                            usePointStyle: true
                        }
                    }
                }
            }
        });
    }
</script>
@endpush
