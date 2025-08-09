@extends('layouts.admin')

@section('title', 'Detail Data Penduduk')

@section('content')
<div class="p-3 md:p-6">
    <!-- Header Section -->
    <div class="mb-4 md:mb-6">
        <div class="bg-gradient-to-r from-emerald-600 to-teal-600 rounded-xl shadow-lg p-4 md:p-6">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                <div class="text-white">
                    <h1 class="text-xl md:text-2xl font-bold mb-2 flex items-center">
                        <i class="fas fa-user-circle mr-2 md:mr-3"></i>
                        Detail Data Penduduk
                    </h1>
                    <p class="text-emerald-100 text-sm md:text-base">Informasi lengkap data penduduk</p>
                </div>
                <div class="flex flex-col sm:flex-row gap-2">
                    <a href="{{ route('admin.data-kependudukan.edit', $penduduk->id) }}" 
                       class="inline-flex items-center justify-center px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white font-semibold rounded-lg transition-all duration-200 shadow-lg hover:shadow-xl text-sm md:text-base">
                        <i class="fas fa-edit mr-2"></i>Edit
                    </a>
                    <a href="{{ route('admin.data-kependudukan.index') }}" 
                       class="inline-flex items-center justify-center px-4 py-2 bg-white/20 hover:bg-white/30 text-white font-semibold rounded-lg transition-all duration-200 shadow-lg hover:shadow-xl text-sm md:text-base">
                        <i class="fas fa-arrow-left mr-2"></i>Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 md:gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-4 md:space-y-6">
            <!-- Data Pribadi -->
            <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-lg border border-white/20 overflow-hidden hover:shadow-xl transition-all duration-300">
                <div class="bg-gradient-to-r from-emerald-600 to-teal-600 p-4">
                    <h2 class="text-lg font-bold text-white flex items-center">
                        <i class="fas fa-user mr-2 md:mr-3"></i>Data Pribadi
                    </h2>
                </div>
                <div class="p-4 md:p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                        <div class="space-y-4">
                            <div class="bg-gray-50/80 rounded-lg p-4 border-l-4 border-emerald-500 hover:bg-gray-100/80 transition-colors duration-200">
                                <label class="block text-xs font-semibold text-gray-600 uppercase tracking-wide mb-2">
                                    <i class="fas fa-id-card text-emerald-600 mr-2"></i>NIK
                                </label>
                                <div class="text-gray-900 font-medium text-sm md:text-base">{{ $penduduk->nik }}</div>
                            </div>
                            
                            <div class="bg-gray-50/80 rounded-lg p-4 border-l-4 border-emerald-500 hover:bg-gray-100/80 transition-colors duration-200">
                                <label class="block text-xs font-semibold text-gray-600 uppercase tracking-wide mb-2">
                                    <i class="fas fa-user text-emerald-600 mr-2"></i>Nama Lengkap
                                </label>
                                <div class="text-gray-900 font-medium text-sm md:text-base">{{ $penduduk->nama }}</div>
                            </div>
                            
                            <div class="bg-gray-50/80 rounded-lg p-4 border-l-4 border-emerald-500 hover:bg-gray-100/80 transition-colors duration-200">
                                <label class="block text-xs font-semibold text-gray-600 uppercase tracking-wide mb-2">
                                    <i class="fas fa-venus-mars text-emerald-600 mr-2"></i>Jenis Kelamin
                                </label>
                                <div>
                                    <span class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-medium {{ $penduduk->jenis_kelamin == 'Laki-laki' ? 'bg-blue-100 text-blue-800' : 'bg-pink-100 text-pink-800' }}">
                                        <i class="fas {{ $penduduk->jenis_kelamin == 'Laki-laki' ? 'fa-mars' : 'fa-venus' }} mr-1"></i>
                                        {{ $penduduk->jenis_kelamin }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="space-y-4">
                            <div class="bg-gray-50/80 rounded-lg p-4 border-l-4 border-emerald-500 hover:bg-gray-100/80 transition-colors duration-200">
                                <label class="block text-xs font-semibold text-gray-600 uppercase tracking-wide mb-2">
                                    <i class="fas fa-map-marker-alt text-emerald-600 mr-2"></i>Tempat, Tanggal Lahir
                                </label>
                                <div class="text-gray-900 font-medium text-sm md:text-base">{{ $penduduk->tempat_lahir }}, {{ $penduduk->tanggal_lahir->format('d F Y') }}</div>
                            </div>
                            
                            <div class="bg-gray-50/80 rounded-lg p-4 border-l-4 border-emerald-500 hover:bg-gray-100/80 transition-colors duration-200">
                                <label class="block text-xs font-semibold text-gray-600 uppercase tracking-wide mb-2">
                                    <i class="fas fa-birthday-cake text-emerald-600 mr-2"></i>Usia
                                </label>
                                <div>
                                    <span class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-medium bg-cyan-100 text-cyan-800">
                                        <i class="fas fa-calendar mr-1"></i>{{ $penduduk->usia }} tahun
                                    </span>
                                </div>
                            </div>
                            
                            <div class="bg-gray-50/80 rounded-lg p-4 border-l-4 border-emerald-500 hover:bg-gray-100/80 transition-colors duration-200">
                                <label class="block text-xs font-semibold text-gray-600 uppercase tracking-wide mb-2">
                                    <i class="fas fa-pray text-emerald-600 mr-2"></i>Agama
                                </label>
                                <div class="text-gray-900 font-medium text-sm md:text-base">{{ $penduduk->agama }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Data Alamat & Keluarga -->
            <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-lg border border-white/20 overflow-hidden hover:shadow-xl transition-all duration-300">
                <div class="bg-gradient-to-r from-cyan-600 to-blue-600 p-4">
                    <h2 class="text-lg font-bold text-white flex items-center">
                        <i class="fas fa-home mr-2 md:mr-3"></i>Data Alamat & Keluarga
                    </h2>
                </div>
                <div class="p-4 md:p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                        <div class="space-y-4">
                            <div class="bg-gray-50/80 rounded-lg p-4 border-l-4 border-cyan-500 hover:bg-gray-100/80 transition-colors duration-200">
                                <label class="block text-xs font-semibold text-gray-600 uppercase tracking-wide mb-2">
                                    <i class="fas fa-map-marker-alt text-cyan-600 mr-2"></i>Alamat
                                </label>
                                <div class="text-gray-900 font-medium text-sm md:text-base">{{ $penduduk->alamat }}</div>
                            </div>
                            
                            <div class="bg-gray-50/80 rounded-lg p-4 border-l-4 border-cyan-500 hover:bg-gray-100/80 transition-colors duration-200">
                                <label class="block text-xs font-semibold text-gray-600 uppercase tracking-wide mb-2">
                                    <i class="fas fa-road text-cyan-600 mr-2"></i>RT/RW
                                </label>
                                <div class="flex flex-wrap gap-2">
                                    <span class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-medium bg-gray-100 text-gray-800">
                                        <i class="fas fa-home mr-1"></i>RT {{ $penduduk->rt }}
                                    </span>
                                    <span class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-medium bg-gray-100 text-gray-800">
                                        <i class="fas fa-building mr-1"></i>RW {{ $penduduk->rw }}
                                    </span>
                                </div>
                            </div>
                            
                            <div class="bg-gray-50/80 rounded-lg p-4 border-l-4 border-cyan-500 hover:bg-gray-100/80 transition-colors duration-200">
                                <label class="block text-xs font-semibold text-gray-600 uppercase tracking-wide mb-2">
                                    <i class="fas fa-id-card-alt text-cyan-600 mr-2"></i>No. KK
                                </label>
                                <div class="text-gray-900 font-medium text-sm md:text-base">{{ $penduduk->no_kk ?? '-' }}</div>
                            </div>
                        </div>
                        
                        <div class="space-y-4">
                            <div class="bg-gray-50/80 rounded-lg p-4 border-l-4 border-cyan-500 hover:bg-gray-100/80 transition-colors duration-200">
                                <label class="block text-xs font-semibold text-gray-600 uppercase tracking-wide mb-2">
                                    <i class="fas fa-users text-cyan-600 mr-2"></i>Status dalam Keluarga
                                </label>
                                <div>
                                    <span class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                                        <i class="fas fa-user-friends mr-1"></i>{{ $penduduk->status_dalam_keluarga }}
                                    </span>
                                </div>
                            </div>
                            
                            <div class="bg-gray-50/80 rounded-lg p-4 border-l-4 border-cyan-500 hover:bg-gray-100/80 transition-colors duration-200">
                                <label class="block text-xs font-semibold text-gray-600 uppercase tracking-wide mb-2">
                                    <i class="fas fa-male text-cyan-600 mr-2"></i>Nama Ayah
                                </label>
                                <div class="text-gray-900 font-medium text-sm md:text-base">{{ $penduduk->nama_ayah ?? '-' }}</div>
                            </div>
                            
                            <div class="bg-gray-50/80 rounded-lg p-4 border-l-4 border-cyan-500 hover:bg-gray-100/80 transition-colors duration-200">
                                <label class="block text-xs font-semibold text-gray-600 uppercase tracking-wide mb-2">
                                    <i class="fas fa-female text-cyan-600 mr-2"></i>Nama Ibu
                                </label>
                                <div class="text-gray-900 font-medium text-sm md:text-base">{{ $penduduk->nama_ibu ?? '-' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Data Pernikahan -->
            <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-lg border border-white/20 overflow-hidden hover:shadow-xl transition-all duration-300">
                <div class="bg-gradient-to-r from-purple-600 to-pink-600 p-4">
                    <h2 class="text-lg font-bold text-white flex items-center">
                        <i class="fas fa-heart mr-2 md:mr-3"></i>Status Pernikahan
                    </h2>
                </div>
                <div class="p-4 md:p-6">
                    <div class="bg-gray-50/80 rounded-lg p-4 border-l-4 border-purple-500 hover:bg-gray-100/80 transition-colors duration-200">
                        <label class="block text-xs font-semibold text-gray-600 uppercase tracking-wide mb-2">
                            <i class="fas fa-ring text-purple-600 mr-2"></i>Status Perkawinan
                        </label>
                        <div>
                            <span class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-medium bg-purple-100 text-purple-800">
                                <i class="fas fa-heart mr-1"></i>{{ $penduduk->status_perkawinan }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-4 md:space-y-6">
            <!-- Data Pendidikan & Pekerjaan -->
            <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-lg border border-white/20 overflow-hidden hover:shadow-xl transition-all duration-300">
                <div class="bg-gradient-to-r from-green-600 to-emerald-600 p-4">
                    <h2 class="text-lg font-bold text-white flex items-center">
                        <i class="fas fa-briefcase mr-2 md:mr-3"></i>Pendidikan & Pekerjaan
                    </h2>
                </div>
                <div class="p-4 md:p-6 space-y-4">
                    <div class="bg-gray-50/80 rounded-lg p-4 border-l-4 border-green-500 hover:bg-gray-100/80 transition-colors duration-200">
                        <label class="block text-xs font-semibold text-gray-600 uppercase tracking-wide mb-2">
                            <i class="fas fa-graduation-cap text-green-600 mr-2"></i>Pendidikan
                        </label>
                        <div>
                            <span class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                <i class="fas fa-book mr-1"></i>{{ $penduduk->pendidikan }}
                            </span>
                        </div>
                    </div>
                    
                    <div class="bg-gray-50/80 rounded-lg p-4 border-l-4 border-green-500 hover:bg-gray-100/80 transition-colors duration-200">
                        <label class="block text-xs font-semibold text-gray-600 uppercase tracking-wide mb-2">
                            <i class="fas fa-briefcase text-green-600 mr-2"></i>Pekerjaan
                        </label>
                        <div>
                            <span class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                <i class="fas fa-user-tie mr-1"></i>{{ $penduduk->pekerjaan }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Status & Keterangan -->
            <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-lg border border-white/20 overflow-hidden hover:shadow-xl transition-all duration-300">
                <div class="bg-gradient-to-r from-orange-600 to-yellow-600 p-4">
                    <h2 class="text-lg font-bold text-white flex items-center">
                        <i class="fas fa-info-circle mr-2 md:mr-3"></i>Status & Informasi
                    </h2>
                </div>
                <div class="p-4 md:p-6 space-y-4">
                    <div class="bg-gray-50/80 rounded-lg p-4 border-l-4 border-orange-500 hover:bg-gray-100/80 transition-colors duration-200">
                        <label class="block text-xs font-semibold text-gray-600 uppercase tracking-wide mb-2">
                            <i class="fas fa-check-circle text-orange-600 mr-2"></i>Status
                        </label>
                        <div>
                            @if($penduduk->status == 'aktif' || $penduduk->status == 'Aktif')
                                <span class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                    <i class="fas fa-check-circle mr-1"></i>Aktif
                                </span>
                            @elseif($penduduk->status == 'pindah' || $penduduk->status == 'Pindah')
                                <span class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                                    <i class="fas fa-truck mr-1"></i>Pindah
                                </span>
                            @else
                                <span class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                    <i class="fas fa-times-circle mr-1"></i>Meninggal
                                </span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="bg-gray-50/80 rounded-lg p-4 border-l-4 border-orange-500 hover:bg-gray-100/80 transition-colors duration-200">
                        <label class="block text-xs font-semibold text-gray-600 uppercase tracking-wide mb-2">
                            <i class="fas fa-flag text-orange-600 mr-2"></i>Kewarganegaraan
                        </label>
                        <div class="text-gray-900 font-medium text-sm md:text-base">{{ $penduduk->kewarganegaraan }}</div>
                    </div>
                    
                    <div class="bg-gray-50/80 rounded-lg p-4 border-l-4 border-orange-500 hover:bg-gray-100/80 transition-colors duration-200">
                        <label class="block text-xs font-semibold text-gray-600 uppercase tracking-wide mb-2">
                            <i class="fas fa-sticky-note text-orange-600 mr-2"></i>Keterangan
                        </label>
                        <div class="text-gray-900 font-medium text-sm md:text-base">{{ $penduduk->keterangan ?? '-' }}</div>
                    </div>
                    
                    <div class="bg-gray-50/80 rounded-lg p-4 border-l-4 border-orange-500 hover:bg-gray-100/80 transition-colors duration-200">
                        <label class="block text-xs font-semibold text-gray-600 uppercase tracking-wide mb-2">
                            <i class="fas fa-clock text-orange-600 mr-2"></i>Waktu Pencatatan
                        </label>
                        <div class="text-xs text-gray-600 space-y-1">
                            <div><strong>Dibuat:</strong> {{ $penduduk->created_at->format('d F Y H:i') }}</div>
                            <div><strong>Diperbarui:</strong> {{ $penduduk->updated_at->format('d F Y H:i') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
