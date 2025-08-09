{{-- Dashboard utama untuk user/masyarakat --}}

@extends('layouts.user')
@section('content')
<!-- Page Header -->
<div class="mb-6 md:mb-8">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold bg-gradient-to-r from-village-primary to-village-secondary bg-clip-text text-transparent">
                Dashboard
            </h1>
            <p class="text-gray-600 mt-1 md:mt-2 text-sm md:text-base">Selamat datang di SIDESA, {{ auth()->user()->name }}!</p>
        </div>
        <div class="flex items-center justify-between md:justify-end md:space-x-3">
            <div class="text-left md:text-right">
                <p class="text-sm text-gray-500">{{ now()->format('l, d F Y') }}</p>
                <p class="text-xs text-gray-400">{{ now()->format('H:i') }} WIB</p>
            </div>
            <div class="w-10 h-10 md:w-12 md:h-12 bg-gradient-to-br from-village-primary to-village-secondary rounded-xl flex items-center justify-center shadow-lg animate-float">
                <i class="fas fa-user text-white text-base md:text-lg"></i>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 mb-6 md:mb-8">
    <a href="{{ route('user.pengajuan.form') }}" class="stat-card-hover group">
        <div class="bg-white rounded-xl md:rounded-2xl p-4 md:p-6 shadow-lg border border-gray-100 hover:border-village-primary/30 transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-xl md:text-2xl font-bold text-gray-900 group-hover:text-village-primary transition-colors">
                        +
                    </div>
                    <div class="text-xs md:text-sm text-gray-600 font-medium">Buat Pengajuan</div>
                    <div class="text-xs text-gray-400 mt-1">Ajukan surat baru</div>
                </div>
                <div class="w-10 h-10 md:w-12 md:h-12 bg-gradient-to-br from-village-primary to-village-secondary rounded-lg md:rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                    <i class="fas fa-plus-circle text-white text-sm md:text-base"></i>
                </div>
            </div>
            <div class="mt-3 md:mt-4 flex items-center text-xs text-village-primary">
                <i class="fas fa-arrow-right mr-1"></i>
                Quick action
            </div>
        </div>
    </a>
    
    <a href="{{ route('user.riwayat') }}" class="stat-card-hover group">
        <div class="bg-white rounded-xl md:rounded-2xl p-4 md:p-6 shadow-lg border border-gray-100 hover:border-village-primary/30 transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-xs md:text-sm text-gray-600 font-medium">Riwayat Pengajuan</div>
                    <div class="text-xs text-gray-400 mt-1">Lihat status surat</div>
                </div>
                <div class="w-10 h-10 md:w-12 md:h-12 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-lg md:rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                    <i class="fas fa-history text-white text-sm md:text-base"></i>
                </div>
            </div>
            <div class="mt-3 md:mt-4 flex items-center text-xs text-emerald-600">
                <i class="fas fa-eye mr-1"></i>
                Lihat detail
            </div>
        </div>
    </a>

    <a href="{{ route('user.pengumuman.index') }}" class="stat-card-hover group">
        <div class="bg-white rounded-xl md:rounded-2xl p-4 md:p-6 shadow-lg border border-gray-100 hover:border-village-primary/30 transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-xs md:text-sm text-gray-600 font-medium">Pengumuman</div>
                    <div class="text-xs text-gray-400 mt-1">Info dari desa</div>
                </div>
                <div class="w-10 h-10 md:w-12 md:h-12 bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-lg md:rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                    <i class="fas fa-bullhorn text-white text-sm md:text-base"></i>
                </div>
            </div>
            <div class="mt-3 md:mt-4 flex items-center text-xs text-yellow-600">
                <i class="fas fa-info-circle mr-1"></i>
                Lihat semua
            </div>
        </div>
    </a>

    <div class="stat-card-hover">
        <div class="bg-white rounded-xl md:rounded-2xl p-4 md:p-6 shadow-lg border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-xs md:text-sm text-gray-600 font-medium">Bantuan</div>
                    <div class="text-xs text-gray-400 mt-1">Panduan sistem</div>
                </div>
                <div class="w-10 h-10 md:w-12 md:h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg md:rounded-xl flex items-center justify-center shadow-lg">
                    <i class="fas fa-question-circle text-white text-sm md:text-base"></i>
                </div>
            </div>
            <div class="mt-3 md:mt-4 flex items-center text-xs text-blue-600">
                <i class="fas fa-book mr-1"></i>
                Panduan tersedia
            </div>
        </div>
    </div>
</div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 mb-6 md:mb-8">
        <!-- Total Pengajuan -->
        <div class="stat-card-hover">
            <div class="bg-white rounded-xl md:rounded-2xl p-4 md:p-6 shadow-lg border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-xl md:text-2xl font-bold text-gray-900">
                            @php
                                $totalPengajuan = \App\Models\Pengajuan::where('user_id', auth()->id())->count();
                            @endphp
                            {{ number_format($totalPengajuan) }}
                        </div>
                        <div class="text-xs md:text-sm text-gray-600 font-medium">Total Pengajuan</div>
                    </div>
                    <div class="w-10 h-10 md:w-12 md:h-12 bg-gradient-to-br from-village-primary to-village-secondary rounded-lg md:rounded-xl flex items-center justify-center shadow-lg">
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

        <!-- Pengajuan Selesai -->
        <div class="stat-card-hover">
            <div class="bg-white rounded-xl md:rounded-2xl p-4 md:p-6 shadow-lg border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-xl md:text-2xl font-bold text-gray-900">
                            @php
                                $selesai = \App\Models\Pengajuan::where('user_id', auth()->id())->where('status', 'selesai')->count();
                            @endphp
                            {{ number_format($selesai) }}
                        </div>
                        <div class="text-xs md:text-sm text-gray-600 font-medium">Selesai</div>
                    </div>
                    <div class="w-10 h-10 md:w-12 md:h-12 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-lg md:rounded-xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-check-circle text-white text-sm md:text-base"></i>
                    </div>
                </div>
                <div class="mt-3 md:mt-4 flex items-center">
                    <div class="flex items-center text-xs text-emerald-600">
                        <i class="fas fa-download mr-1"></i>
                        <span>Siap diambil</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pengajuan Pending -->
        <div class="stat-card-hover">
            <div class="bg-white rounded-xl md:rounded-2xl p-4 md:p-6 shadow-lg border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-xl md:text-2xl font-bold text-gray-900">
                            @php
                                $pending = \App\Models\Pengajuan::where('user_id', auth()->id())->where('status', 'pending')->count();
                            @endphp
                            {{ number_format($pending) }}
                        </div>
                        <div class="text-xs md:text-sm text-gray-600 font-medium">Menunggu</div>
                    </div>
                    <div class="w-10 h-10 md:w-12 md:h-12 bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-lg md:rounded-xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-clock text-white text-sm md:text-base"></i>
                    </div>
                </div>
                <div class="mt-3 md:mt-4 flex items-center">
                    <div class="flex items-center text-xs text-yellow-600">
                        <i class="fas fa-hourglass-half mr-1"></i>
                        <span>Sedang diproses</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pengajuan Bulan Ini -->
        <div class="stat-card-hover">
            <div class="bg-white rounded-xl md:rounded-2xl p-4 md:p-6 shadow-lg border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-xl md:text-2xl font-bold text-gray-900">
                            @php
                                $bulanIni = \App\Models\Pengajuan::where('user_id', auth()->id())
                                    ->whereMonth('created_at', now()->month)
                                    ->whereYear('created_at', now()->year)
                                    ->count();
                            @endphp
                            {{ number_format($bulanIni) }}
                        </div>
                        <div class="text-xs md:text-sm text-gray-600 font-medium">Bulan Ini</div>
                    </div>
                    <div class="w-10 h-10 md:w-12 md:h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg md:rounded-xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-calendar-alt text-white text-sm md:text-base"></i>
                    </div>
                </div>
                <div class="mt-3 md:mt-4 flex items-center">
                    <div class="flex items-center text-xs text-blue-600">
                        <i class="fas fa-calendar-check mr-1"></i>
                        <span>{{ now()->format('F Y') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Two column layout for content -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 md:gap-8 mb-6 md:mb-8">
        <!-- Pengumuman Terbaru -->
        <div class="bg-white rounded-xl md:rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="px-4 md:px-6 py-3 md:py-4 border-b border-gray-100 bg-gradient-to-r from-village-primary/5 to-village-secondary/5">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-base md:text-lg font-semibold text-gray-900">Pengumuman Terbaru</h3>
                        <p class="text-xs md:text-sm text-gray-500">Informasi terkini dari desa</p>
                    </div>
                    <a href="{{ route('user.pengumuman.index') }}" class="inline-flex items-center justify-center px-3 md:px-4 py-2 bg-village-primary text-white rounded-lg hover:bg-village-secondary transition-colors text-xs md:text-sm font-medium">
                        <i class="fas fa-eye mr-2"></i>
                        <span class="hidden sm:inline">Lihat Semua</span>
                        <span class="sm:hidden">Semua</span>
                    </a>
                </div>
            </div>
            <div class="p-4 md:p-6 space-y-3 md:space-y-4">
                @php
                    $pengumumanTerbaru = \App\Models\Pengumuman::latest()->take(3)->get();
                @endphp
                @forelse($pengumumanTerbaru as $pengumuman)
                    <div class="flex items-start space-x-3 md:space-x-4 p-3 md:p-4 rounded-lg hover:bg-gray-50 transition-colors group">
                        <div class="w-8 h-8 md:w-10 md:h-10 bg-gradient-to-br from-village-primary to-village-secondary rounded-lg flex-shrink-0 flex items-center justify-center shadow-lg">
                            <i class="fas fa-bullhorn text-white text-xs md:text-sm"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h4 class="text-sm md:text-base font-medium text-gray-900 line-clamp-2 group-hover:text-village-primary transition-colors">
                                {{ $pengumuman->judul }}
                            </h4>
                            <p class="text-xs md:text-sm text-gray-500 mt-1 md:mt-2 line-clamp-2">
                                {{ Str::limit(strip_tags($pengumuman->konten), 80) }}
                            </p>
                            <div class="flex items-center justify-between mt-2 md:mt-3">
                                <span class="text-xs text-gray-400">{{ $pengumuman->created_at->diffForHumans() }}</span>
                                @if(isset($pengumuman->is_featured) && $pengumuman->is_featured)
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                        <i class="fas fa-star mr-1"></i>
                                        Penting
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-6 md:py-8">
                        <div class="w-12 h-12 md:w-16 md:h-16 bg-gray-100 rounded-full flex items-center justify-center mb-3 md:mb-4 mx-auto">
                            <i class="fas fa-bullhorn text-gray-400 text-xl md:text-2xl"></i>
                        </div>
                        <h3 class="text-base md:text-lg font-medium text-gray-900 mb-1 md:mb-2">Belum ada pengumuman</h3>
                        <p class="text-sm text-gray-500">Tidak ada pengumuman yang ditemukan</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Riwayat Pengajuan Terbaru -->
        <div class="bg-white rounded-xl md:rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="px-4 md:px-6 py-3 md:py-4 border-b border-gray-100 bg-gradient-to-r from-village-primary/5 to-village-secondary/5">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-base md:text-lg font-semibold text-gray-900">Pengajuan Terbaru</h3>
                        <p class="text-xs md:text-sm text-gray-500">Status pengajuan surat Anda</p>
                    </div>
                    <a href="{{ route('user.riwayat') }}" class="inline-flex items-center justify-center px-3 md:px-4 py-2 bg-village-primary text-white rounded-lg hover:bg-village-secondary transition-colors text-xs md:text-sm font-medium">
                        <i class="fas fa-eye mr-2"></i>
                        <span class="hidden sm:inline">Lihat Semua</span>
                        <span class="sm:hidden">Semua</span>
                    </a>
                </div>
            </div>
            <div class="p-4 md:p-6 space-y-3 md:space-y-4">
                @php
                    $pengajuanTerbaru = \App\Models\Pengajuan::where('user_id', auth()->id())
                        ->with('jenisSurat')
                        ->latest()
                        ->take(3)
                        ->get();
                @endphp
                @forelse($pengajuanTerbaru as $pengajuan)
                    <div class="flex items-start space-x-3 md:space-x-4 p-3 md:p-4 rounded-lg hover:bg-gray-50 transition-colors">
                        <div class="w-8 h-8 md:w-10 md:h-10 
                            @if($pengajuan->status == 'selesai') bg-gradient-to-br from-green-500 to-green-600
                            @elseif($pengajuan->status == 'pending') bg-gradient-to-br from-yellow-500 to-yellow-600
                            @else bg-gradient-to-br from-gray-400 to-gray-500
                            @endif 
                            rounded-lg flex-shrink-0 flex items-center justify-center shadow-lg">
                            <i class="fas fa-file-alt text-white text-xs md:text-sm"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h4 class="text-sm md:text-base font-medium text-gray-900">
                                {{ $pengajuan->jenisSurat->nama ?? 'Jenis Surat' }}
                            </h4>
                            <p class="text-xs md:text-sm text-gray-500 mt-1">
                                Kode: {{ $pengajuan->kode_pengajuan }}
                            </p>
                            <div class="flex items-center justify-between mt-2 md:mt-3">
                                <span class="text-xs text-gray-400">{{ $pengajuan->created_at->diffForHumans() }}</span>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium
                                    @if($pengajuan->status == 'selesai') bg-green-100 text-green-800
                                    @elseif($pengajuan->status == 'pending') bg-yellow-100 text-yellow-800
                                    @else bg-gray-100 text-gray-800
                                    @endif">
                                    @if($pengajuan->status == 'selesai')
                                        <i class="fas fa-check-circle mr-1"></i>
                                        Selesai
                                    @elseif($pengajuan->status == 'pending')
                                        <i class="fas fa-clock mr-1"></i>
                                        Pending
                                    @else
                                        <i class="fas fa-times-circle mr-1"></i>
                                        {{ ucfirst($pengajuan->status) }}
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-6 md:py-8">
                        <div class="w-12 h-12 md:w-16 md:h-16 bg-gray-100 rounded-full flex items-center justify-center mb-3 md:mb-4 mx-auto">
                            <i class="fas fa-file-alt text-gray-400 text-xl md:text-2xl"></i>
                        </div>
                        <h3 class="text-base md:text-lg font-medium text-gray-900 mb-1 md:mb-2">Belum ada pengajuan</h3>
                        <p class="text-sm text-gray-500 mb-3 md:mb-4">Anda belum memiliki riwayat pengajuan surat</p>
                        <a href="{{ route('user.pengajuan.form') }}" class="inline-flex items-center text-xs md:text-sm text-village-primary hover:text-village-secondary font-medium transition-colors">
                            <i class="fas fa-plus mr-1 md:mr-2"></i>
                            Buat Pengajuan Pertama
                        </a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
