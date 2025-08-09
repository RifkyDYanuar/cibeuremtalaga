{{-- Detail pengajuan surat oleh user --}}
@extends('layouts.user')
@section('content')
<div class="min-h-screen bg-gradient-to-br from-village-light via-white to-village-accent/20">
    <div class="max-w-4xl mx-auto px-4 md:px-6 py-6 md:py-8">
        <!-- Page Header -->
        <div class="mb-6 md:mb-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold bg-gradient-to-r from-village-primary to-village-secondary bg-clip-text text-transparent flex items-center gap-3">
                        <i class="fas fa-file-contract text-village-primary"></i>
                        Detail Pengajuan Surat
                    </h1>
                    <nav class="text-sm text-gray-500 mt-2 flex items-center gap-2">
                        <a href="{{ route('user.dashboard') }}" class="hover:text-village-primary transition-colors">Dashboard</a>
                        <i class="fas fa-chevron-right text-xs"></i>
                        <a href="{{ route('user.riwayat') }}" class="hover:text-village-primary transition-colors">Riwayat Pengajuan</a>
                        <i class="fas fa-chevron-right text-xs"></i>
                        <span class="text-village-primary">Detail</span>
                    </nav>
                </div>
                <div class="flex items-center space-x-3">
                    <a href="{{ route('user.riwayat') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 font-medium rounded-lg hover:bg-gray-200 transition-colors">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali
                    </a>
                </div>
            </div>
        </div>

        @php $data = json_decode($pengajuan->data, true); @endphp

        <!-- Status Card -->
        <div class="bg-white rounded-xl md:rounded-2xl shadow-lg border border-gray-100 p-4 md:p-6 mb-6 md:mb-8 hover:shadow-xl transition-all duration-300">
            <div class="flex flex-col sm:flex-row sm:items-center gap-4 mb-4 md:mb-6">
                <div class="flex items-center justify-center w-12 h-12 md:w-16 md:h-16 rounded-full shadow-lg flex-shrink-0
                    @if($pengajuan->status == 'Pending') bg-gradient-to-br from-yellow-500 to-yellow-600
                    @elseif($pengajuan->status == 'Disetujui') bg-gradient-to-br from-green-500 to-green-600
                    @elseif($pengajuan->status == 'Ditolak') bg-gradient-to-br from-red-500 to-red-600
                    @else bg-gradient-to-br from-gray-500 to-gray-600
                    @endif">
                    @if($pengajuan->status == 'Pending')
                        <i class="fas fa-clock text-white text-lg md:text-xl"></i>
                    @elseif($pengajuan->status == 'Disetujui')
                        <i class="fas fa-check-circle text-white text-lg md:text-xl"></i>
                    @elseif($pengajuan->status == 'Ditolak')
                        <i class="fas fa-times-circle text-white text-lg md:text-xl"></i>
                    @endif
                </div>
                <div class="flex-1 text-center sm:text-left">
                    <h3 class="text-lg md:text-xl font-bold text-gray-900 mb-2">{{ $pengajuan->jenisSurat->nama ?? 'Tidak diketahui' }}</h3>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                        @if($pengajuan->status == 'Pending') bg-yellow-100 text-yellow-800
                        @elseif($pengajuan->status == 'Disetujui') bg-green-100 text-green-800
                        @elseif($pengajuan->status == 'Ditolak') bg-red-100 text-red-800
                        @else bg-gray-100 text-gray-800
                        @endif">
                        {{ $pengajuan->status }}
                    </span>
                </div>
            </div>
            <div class="flex flex-col sm:flex-row sm:items-center gap-4 text-sm text-gray-600">
                <div class="flex items-center gap-2">
                    <i class="fas fa-calendar-alt text-village-primary"></i>
                    <span>Diajukan pada {{ $pengajuan->created_at ? $pengajuan->created_at->format('d M Y, H:i') : '-' }}</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="fas fa-hashtag text-village-primary"></i>
                    <span>ID Pengajuan: #{{ $pengajuan->id }}</span>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="space-y-6 md:space-y-8">
            <!-- Personal Information -->
            <div class="bg-white rounded-xl md:rounded-2xl shadow-lg border border-gray-100 p-4 md:p-6 hover:shadow-xl transition-all duration-300">
                <div class="flex items-center gap-3 mb-4 md:mb-6 pb-4 border-b border-gray-200">
                    <div class="w-8 h-8 md:w-10 md:h-10 bg-gradient-to-br from-village-primary to-village-secondary rounded-lg flex items-center justify-center shadow-lg">
                        <i class="fas fa-user text-white text-sm md:text-base"></i>
                    </div>
                    <h3 class="text-lg md:text-xl font-bold text-gray-900">Data Pribadi</h3>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                    <div class="space-y-2">
                        <div class="text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Lengkap</div>
                        <div class="text-sm md:text-base text-gray-900 font-medium">{{ $data['nama_lengkap'] ?? '-' }}</div>
                    </div>
                    <div class="space-y-2">
                        <div class="text-xs font-medium text-gray-500 uppercase tracking-wider">Tempat, Tanggal Lahir</div>
                        <div class="text-sm md:text-base text-gray-900 font-medium">{{ $data['ttl'] ?? '-' }}</div>
                    </div>
                    <div class="space-y-2">
                        <div class="text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Kelamin</div>
                        <div class="text-sm md:text-base text-gray-900 font-medium">{{ $data['jenis_kelamin'] ?? '-' }}</div>
                    </div>
                    <div class="space-y-2">
                        <div class="text-xs font-medium text-gray-500 uppercase tracking-wider">NIK</div>
                        <div class="text-sm md:text-base text-gray-900 font-medium">{{ $data['nik'] ?? '-' }}</div>
                    </div>
                    <div class="space-y-2">
                        <div class="text-xs font-medium text-gray-500 uppercase tracking-wider">Nomor KK</div>
                        <div class="text-sm md:text-base text-gray-900 font-medium">{{ $data['no_kk'] ?? '-' }}</div>
                    </div>
                    <div class="space-y-2">
                        <div class="text-xs font-medium text-gray-500 uppercase tracking-wider">Agama</div>
                        <div class="text-sm md:text-base text-gray-900 font-medium">{{ $data['agama'] ?? '-' }}</div>
                    </div>
                    <div class="space-y-2">
                        <div class="text-xs font-medium text-gray-500 uppercase tracking-wider">Pekerjaan</div>
                        <div class="text-sm md:text-base text-gray-900 font-medium">{{ $data['pekerjaan'] ?? '-' }}</div>
                    </div>
                    <div class="space-y-2">
                        <div class="text-xs font-medium text-gray-500 uppercase tracking-wider">Status Perkawinan</div>
                        <div class="text-sm md:text-base text-gray-900 font-medium">{{ $data['status_perkawinan'] ?? '-' }}</div>
                    </div>
                    <div class="space-y-2">
                        <div class="text-xs font-medium text-gray-500 uppercase tracking-wider">No. HP</div>
                        <div class="text-sm md:text-base text-gray-900 font-medium">{{ $data['no_hp'] ?? '-' }}</div>
                    </div>
                    <div class="space-y-2 md:col-span-2">
                        <div class="text-xs font-medium text-gray-500 uppercase tracking-wider">Alamat</div>
                        <div class="text-sm md:text-base text-gray-900 font-medium">{{ $data['alamat'] ?? '-' }}</div>
                    </div>
                    <div class="space-y-2 md:col-span-2">
                        <div class="text-xs font-medium text-gray-500 uppercase tracking-wider">Tujuan Permohonan</div>
                        <div class="text-sm md:text-base text-gray-900 font-medium">{{ $data['tujuan_permohonan'] ?? '-' }}</div>
                    </div>
                </div>
            </div>

            <!-- Additional Information -->
            @php
                $additionalData = array_filter($data, function($key) {
                    return !in_array($key, ['nama_lengkap','ttl','jenis_kelamin','nik','no_kk','alamat','agama','pekerjaan','status_perkawinan','no_hp','tujuan_permohonan']);
                }, ARRAY_FILTER_USE_KEY);
            @endphp
            
            @if(!empty($additionalData))
            <div class="bg-white rounded-xl md:rounded-2xl shadow-lg border border-gray-100 p-4 md:p-6 hover:shadow-xl transition-all duration-300">
                <div class="flex items-center gap-3 mb-4 md:mb-6 pb-4 border-b border-gray-200">
                    <div class="w-8 h-8 md:w-10 md:h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center shadow-lg">
                        <i class="fas fa-info-circle text-white text-sm md:text-base"></i>
                    </div>
                    <h3 class="text-lg md:text-xl font-bold text-gray-900">Informasi Tambahan</h3>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                    @foreach($additionalData as $key => $val)
                        <div class="space-y-2 {{ str_contains($key, 'riwayat') || str_contains($key, 'keterangan') ? 'md:col-span-2' : '' }}">
                            <div class="text-xs font-medium text-gray-500 uppercase tracking-wider">{{ ucwords(str_replace('_',' ',$key)) }}</div>
                            <div class="text-sm md:text-base text-gray-900 font-medium">
                                @if(str_contains($key, 'lampiran') && $val)
                                    <a href="{{ route('storage.lampiran', basename($val)) }}" target="_blank" class="inline-flex items-center gap-2 text-village-primary hover:text-village-secondary transition-colors">
                                        <i class="fas fa-file"></i> 
                                        <span>Lihat Lampiran</span>
                                    </a>
                                @else
                                    {{ $val }}
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Response Section -->
            <div class="bg-white rounded-xl md:rounded-2xl shadow-lg border border-gray-100 p-4 md:p-6 hover:shadow-xl transition-all duration-300">
                <div class="flex items-center gap-3 mb-4 md:mb-6 pb-4 border-b border-gray-200">
                    <div class="w-8 h-8 md:w-10 md:h-10 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg flex items-center justify-center shadow-lg">
                        <i class="fas fa-comment-dots text-white text-sm md:text-base"></i>
                    </div>
                    <h3 class="text-lg md:text-xl font-bold text-gray-900">Respon Admin</h3>
                </div>
                <div class="min-h-[80px] flex items-center">
                    @if($pengajuan->catatan_admin)
                        <div class="flex flex-col sm:flex-row gap-4 items-start w-full">
                            <div class="w-10 h-10 bg-gradient-to-br from-village-primary to-village-secondary rounded-full flex items-center justify-center flex-shrink-0 shadow-lg">
                                <i class="fas fa-user-shield text-white text-sm"></i>
                            </div>
                            <div class="flex-1 bg-gray-50 rounded-xl p-4 text-gray-900 leading-relaxed">
                                {{ $pengajuan->catatan_admin }}
                            </div>
                        </div>
                    @else
                        <div class="flex items-center justify-center gap-3 text-gray-500 italic w-full">
                            <i class="fas fa-hourglass-half text-village-primary"></i>
                            <span>Belum ada respon dari admin</span>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Download Section -->
            @if($pengajuan->file_url)
            <div class="bg-white rounded-xl md:rounded-2xl shadow-lg border border-gray-100 p-4 md:p-6 hover:shadow-xl transition-all duration-300">
                <div class="flex items-center gap-3 mb-4 md:mb-6 pb-4 border-b border-gray-200">
                    <div class="w-8 h-8 md:w-10 md:h-10 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-lg flex items-center justify-center shadow-lg">
                        <i class="fas fa-download text-white text-sm md:text-base"></i>
                    </div>
                    <h3 class="text-lg md:text-xl font-bold text-gray-900">File Surat</h3>
                </div>
                <div class="flex flex-col sm:flex-row items-center gap-4 p-4 border-2 border-gray-200 rounded-xl hover:border-village-primary transition-colors">
                    <div class="w-12 h-12 md:w-16 md:h-16 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-file-pdf text-white text-lg md:text-xl"></i>
                    </div>
                    <div class="flex-1 text-center sm:text-left">
                        <h4 class="text-base md:text-lg font-semibold text-gray-900 mb-1">Surat Resmi</h4>
                        <p class="text-sm text-gray-600">File surat yang telah disetujui dan ditandatangani</p>
                    </div>
                    <a href="{{ route('storage.surat_jadi', basename($pengajuan->file_url)) }}" target="_blank" 
                       class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-village-primary to-village-secondary text-white font-medium rounded-lg hover:from-village-secondary hover:to-village-primary transition-colors shadow-lg">
                        <i class="fas fa-download mr-2"></i>
                        Download
                    </a>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection