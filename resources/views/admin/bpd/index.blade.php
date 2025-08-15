@extends('layouts.admin')

@section('title', 'Manajemen BPD')

@section('breadcrumb')
    <span class="mx-2">/</span>
    <span class="text-village-primary">Manajemen BPD</span>
@endsection

@section('content')

<!-- Page Header -->
<div class="mb-6 md:mb-8">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold bg-gradient-to-r from-village-primary to-village-secondary bg-clip-text text-transparent">
                Manajemen BPD
            </h1>
            <p class="text-gray-600 mt-1 md:mt-2 text-sm md:text-base">Kelola data Badan Permusyawaratan Desa</p>
        </div>
        <div class="flex items-center justify-between md:justify-end md:space-x-3">
            <div class="text-left md:text-right">
                <p class="text-sm text-gray-500">{{ now()->format('l, d F Y') }}</p>
                <p class="text-xs text-gray-400">{{ now()->format('H:i') }} WIB</p>
            </div>
            <div class="w-10 h-10 md:w-12 md:h-12 bg-gradient-to-br from-village-primary to-village-secondary rounded-xl flex items-center justify-center shadow-lg animate-float">
                <i class="fas fa-building text-white text-base md:text-lg"></i>
            </div>
        </div>
    </div>
</div>

<!-- Statistics Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 mb-6 md:mb-8">
    <!-- Total Anggota BPD -->
    <div class="stat-card-hover">
        <div class="bg-white rounded-xl md:rounded-2xl p-4 md:p-6 shadow-lg border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-xl md:text-2xl font-bold text-gray-900">{{ number_format(\App\Models\BpdMember::count()) }}</div>
                    <div class="text-xs md:text-sm text-gray-600 font-medium">Total Anggota BPD</div>
                </div>
                <div class="w-10 h-10 md:w-12 md:h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg md:rounded-xl flex items-center justify-center shadow-lg">
                    <i class="fas fa-users text-white text-sm md:text-base"></i>
                </div>
            </div>
            <div class="mt-3 md:mt-4 flex items-center">
                <div class="flex items-center text-xs text-blue-600">
                    <i class="fas fa-user-tie mr-1"></i>
                    <span>Anggota aktif</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Kegiatan -->
    <div class="stat-card-hover">
        <div class="bg-white rounded-xl md:rounded-2xl p-4 md:p-6 shadow-lg border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-xl md:text-2xl font-bold text-gray-900">{{ number_format(\App\Models\BpdActivity::count()) }}</div>
                    <div class="text-xs md:text-sm text-gray-600 font-medium">Total Kegiatan</div>
                </div>
                <div class="w-10 h-10 md:w-12 md:h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-lg md:rounded-xl flex items-center justify-center shadow-lg">
                    <i class="fas fa-calendar-alt text-white text-sm md:text-base"></i>
                </div>
            </div>
            <div class="mt-3 md:mt-4 flex items-center">
                <div class="flex items-center text-xs text-green-600">
                    <i class="fas fa-chart-line mr-1"></i>
                    <span>Kegiatan terdokumentasi</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Konten Halaman -->
    <div class="stat-card-hover">
        <div class="bg-white rounded-xl md:rounded-2xl p-4 md:p-6 shadow-lg border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-xl md:text-2xl font-bold text-gray-900">{{ number_format(\App\Models\BpdContent::count()) }}</div>
                    <div class="text-xs md:text-sm text-gray-600 font-medium">Konten Halaman</div>
                </div>
                <div class="w-10 h-10 md:w-12 md:h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg md:rounded-xl flex items-center justify-center shadow-lg">
                    <i class="fas fa-edit text-white text-sm md:text-base"></i>
                </div>
            </div>
            <div class="mt-3 md:mt-4 flex items-center">
                <div class="flex items-center text-xs text-purple-600">
                    <i class="fas fa-file-alt mr-1"></i>
                    <span>{{ \App\Models\BpdContent::count() > 0 ? 'Sudah diatur' : 'Perlu diatur' }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Halaman Publik -->
    <a href="{{ route('public.bpd') }}" target="_blank" class="stat-card-hover group">
        <div class="bg-white rounded-xl md:rounded-2xl p-4 md:p-6 shadow-lg border border-gray-100 hover:border-village-primary/30 transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-xs md:text-sm text-gray-600 font-medium">Halaman Publik</div>
                    <div class="text-xs text-gray-400 mt-1">Lihat hasil publikasi</div>
                </div>
                <div class="w-10 h-10 md:w-12 md:h-12 bg-gradient-to-br from-orange-500 to-orange-600 rounded-lg md:rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                    <i class="fas fa-eye text-white text-sm md:text-base"></i>
                </div>
            </div>
            <div class="mt-3 md:mt-4 flex items-center">
                <div class="flex items-center text-xs text-orange-600">
                    <i class="fas fa-external-link-alt mr-1"></i>
                    <span>Buka di tab baru</span>
                </div>
            </div>
        </div>
    </a>
</div>

<!-- Management Cards -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 md:gap-8 mb-6 md:mb-8">
    <!-- Quick Actions -->
    <div class="bg-white rounded-xl md:rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-village-primary/5 to-village-secondary/5">
            <div class="flex items-center">
                <div class="w-8 h-8 bg-gradient-to-br from-village-primary to-village-secondary rounded-lg flex items-center justify-center shadow-lg mr-3">
                    <i class="fas fa-plus text-white text-sm"></i>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Aksi Cepat</h3>
                    <p class="text-sm text-gray-500">Tambah data baru dengan cepat</p>
                </div>
            </div>
        </div>
        <div class="p-6">
            <div class="space-y-3">
                <a href="{{ route('admin.bpd.members.create') }}" class="group w-full inline-flex items-center px-4 py-3 bg-gradient-to-r from-blue-50 to-blue-100 hover:from-blue-100 hover:to-blue-200 rounded-lg transition-all duration-300">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center shadow-lg mr-4 group-hover:scale-110 transition-transform">
                        <i class="fas fa-user-plus text-white text-sm"></i>
                    </div>
                    <div class="flex-1">
                        <div class="text-sm font-medium text-gray-900 group-hover:text-blue-700 transition-colors">Tambah Anggota BPD</div>
                        <div class="text-xs text-gray-500">Daftarkan anggota baru</div>
                    </div>
                    <i class="fas fa-arrow-right text-blue-500 group-hover:translate-x-1 transition-transform"></i>
                </a>

                <a href="{{ route('admin.bpd.activities.create') }}" class="group w-full inline-flex items-center px-4 py-3 bg-gradient-to-r from-green-50 to-green-100 hover:from-green-100 hover:to-green-200 rounded-lg transition-all duration-300">
                    <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-green-600 rounded-lg flex items-center justify-center shadow-lg mr-4 group-hover:scale-110 transition-transform">
                        <i class="fas fa-calendar-plus text-white text-sm"></i>
                    </div>
                    <div class="flex-1">
                        <div class="text-sm font-medium text-gray-900 group-hover:text-green-700 transition-colors">Tambah Kegiatan</div>
                        <div class="text-xs text-gray-500">Dokumentasi kegiatan baru</div>
                    </div>
                    <i class="fas fa-arrow-right text-green-500 group-hover:translate-x-1 transition-transform"></i>
                </a>

                <a href="{{ route('admin.bpd.content') }}" class="group w-full inline-flex items-center px-4 py-3 bg-gradient-to-r from-purple-50 to-purple-100 hover:from-purple-100 hover:to-purple-200 rounded-lg transition-all duration-300">
                    <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg flex items-center justify-center shadow-lg mr-4 group-hover:scale-110 transition-transform">
                        <i class="fas fa-edit text-white text-sm"></i>
                    </div>
                    <div class="flex-1">
                        <div class="text-sm font-medium text-gray-900 group-hover:text-purple-700 transition-colors">Edit Konten Halaman</div>
                        <div class="text-xs text-gray-500">Visi, misi, dan profil</div>
                    </div>
                    <i class="fas fa-arrow-right text-purple-500 group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Recent Activities -->
    <div class="bg-white rounded-xl md:rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-village-primary/5 to-village-secondary/5">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-gradient-to-br from-village-primary to-village-secondary rounded-lg flex items-center justify-center shadow-lg mr-3">
                        <i class="fas fa-calendar-alt text-white text-sm"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Kegiatan Terbaru</h3>
                        <p class="text-sm text-gray-500">Dokumentasi kegiatan terkini</p>
                    </div>
                </div>
                <a href="{{ route('admin.bpd.activities') }}" class="text-sm font-medium text-village-primary hover:text-village-secondary transition-colors">
                    Lihat Semua
                </a>
            </div>
        </div>
        <div class="p-6">
            @if(\App\Models\BpdActivity::count() > 0)
                <div class="space-y-4">
                    @foreach(\App\Models\BpdActivity::latest()->take(3)->get() as $activity)
                        <div class="flex items-center p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                            <img src="{{ $activity->image_url }}" alt="{{ $activity->title }}" 
                                 class="w-12 h-12 rounded-lg object-cover shadow-sm mr-4">
                            <div class="flex-1 min-w-0">
                                <div class="text-sm font-medium text-gray-900 truncate">{{ $activity->title }}</div>
                                <div class="text-xs text-gray-500 flex items-center mt-1">
                                    <i class="fas fa-calendar mr-1"></i>
                                    {{ $activity->activity_date->format('d M Y') }}
                                </div>
                            </div>
                            <div class="text-xs text-gray-400">
                                <i class="fas fa-eye"></i>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <a href="{{ route('admin.bpd.activities') }}" class="w-full inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-village-primary bg-village-primary/10 hover:bg-village-primary/20 rounded-lg transition-colors">
                        <i class="fas fa-list mr-2"></i>
                        Lihat Semua Kegiatan
                    </a>
                </div>
            @else
                <div class="text-center py-8">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-calendar-alt text-gray-400 text-2xl"></i>
                    </div>
                    <h4 class="text-lg font-medium text-gray-900 mb-2">Belum ada kegiatan</h4>
                    <p class="text-sm text-gray-500 mb-4">Mulai dokumentasikan kegiatan BPD pertama</p>
                    <a href="{{ route('admin.bpd.activities.create') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-village-primary hover:bg-village-secondary rounded-lg transition-colors">
                        <i class="fas fa-plus mr-2"></i>
                        Tambah Kegiatan Pertama
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Main Actions -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
    <!-- Manajemen Anggota -->
    <a href="{{ route('admin.bpd.members') }}" class="stat-card-hover group">
        <div class="bg-white rounded-xl md:rounded-2xl p-6 md:p-8 shadow-lg border border-gray-100 hover:border-village-primary/30 transition-all duration-300 text-center">
            <div class="w-16 h-16 md:w-20 md:h-20 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl md:rounded-2xl flex items-center justify-center shadow-lg mx-auto mb-4 md:mb-6 group-hover:scale-110 transition-transform">
                <i class="fas fa-users text-white text-xl md:text-2xl"></i>
            </div>
            <h3 class="text-lg md:text-xl font-semibold text-gray-900 mb-2 md:mb-3 group-hover:text-village-primary transition-colors">
                Manajemen Anggota
            </h3>
            <p class="text-sm md:text-base text-gray-600 mb-4 md:mb-6">
                Kelola data anggota BPD, tambah anggota baru, edit profil dan jabatan
            </p>
            <div class="inline-flex items-center text-sm font-medium text-village-primary group-hover:text-village-secondary transition-colors">
                <span>Kelola Anggota</span>
                <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
            </div>
        </div>
    </a>

    <!-- Manajemen Kegiatan -->
    <a href="{{ route('admin.bpd.activities') }}" class="stat-card-hover group">
        <div class="bg-white rounded-xl md:rounded-2xl p-6 md:p-8 shadow-lg border border-gray-100 hover:border-village-primary/30 transition-all duration-300 text-center">
            <div class="w-16 h-16 md:w-20 md:h-20 bg-gradient-to-br from-green-500 to-green-600 rounded-xl md:rounded-2xl flex items-center justify-center shadow-lg mx-auto mb-4 md:mb-6 group-hover:scale-110 transition-transform">
                <i class="fas fa-calendar-alt text-white text-xl md:text-2xl"></i>
            </div>
            <h3 class="text-lg md:text-xl font-semibold text-gray-900 mb-2 md:mb-3 group-hover:text-village-primary transition-colors">
                Manajemen Kegiatan
            </h3>
            <p class="text-sm md:text-base text-gray-600 mb-4 md:mb-6">
                Kelola kegiatan dan dokumentasi BPD, upload foto dan laporan kegiatan
            </p>
            <div class="inline-flex items-center text-sm font-medium text-village-primary group-hover:text-village-secondary transition-colors">
                <span>Kelola Kegiatan</span>
                <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
            </div>
        </div>
    </a>

    <!-- Edit Konten -->
    <a href="{{ route('admin.bpd.content') }}" class="stat-card-hover group">
        <div class="bg-white rounded-xl md:rounded-2xl p-6 md:p-8 shadow-lg border border-gray-100 hover:border-village-primary/30 transition-all duration-300 text-center">
            <div class="w-16 h-16 md:w-20 md:h-20 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl md:rounded-2xl flex items-center justify-center shadow-lg mx-auto mb-4 md:mb-6 group-hover:scale-110 transition-transform">
                <i class="fas fa-edit text-white text-xl md:text-2xl"></i>
            </div>
            <h3 class="text-lg md:text-xl font-semibold text-gray-900 mb-2 md:mb-3 group-hover:text-village-primary transition-colors">
                Edit Konten Halaman
            </h3>
            <p class="text-sm md:text-base text-gray-600 mb-4 md:mb-6">
                Edit visi, misi, profil singkat, dan informasi kontak BPD
            </p>
            <div class="inline-flex items-center text-sm font-medium text-village-primary group-hover:text-village-secondary transition-colors">
                <span>Edit Konten</span>
                <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
            </div>
        </div>
    </a>
</div>

@endsection
