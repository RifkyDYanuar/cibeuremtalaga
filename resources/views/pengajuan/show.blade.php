@extends(Auth::user()->role === 'admin' ? 'layouts.admin' : 'layouts.user')

@section('content')
<div class="p-4 md:p-6">
    <!-- Header Section -->
    <div class="mb-6 md:mb-8">
        <div class="flex items-center gap-3 mb-4">
            @if(Auth::user()->role === 'admin')
                <a href="{{ route('admin.pengajuan.index') }}" 
                   class="inline-flex items-center px-3 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali ke Daftar
                </a>
            @else
                <a href="{{ route('user.pengajuan.index') }}" 
                   class="inline-flex items-center px-3 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali ke Riwayat
                </a>
            @endif
        </div>
        <div>
            <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2 flex items-center gap-2 md:gap-3">
                <i class="fas fa-file-alt text-emerald-600 text-xl md:text-2xl"></i>
                Detail Pengajuan #{{ $pengajuan->id }}
            </h1>
            <div class="flex items-center text-sm text-gray-600 gap-2">
                <span>Dashboard</span> 
                <i class="fas fa-chevron-right text-xs"></i> 
                <span>{{ Auth::user()->role === 'admin' ? 'Manajemen' : 'Riwayat' }} Pengajuan</span>
                <i class="fas fa-chevron-right text-xs"></i>
                <span class="text-emerald-600 font-medium">Detail #{{ $pengajuan->id }}</span>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-4 md:mb-6 bg-green-50 border border-green-200 text-green-800 px-3 md:px-4 py-3 rounded-lg flex items-center text-sm md:text-base">
            <i class="fas fa-check-circle mr-2"></i>
            <span class="flex-1">{{ session('success') }}</span>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Status & Basic Info -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 flex items-center gap-2">
                        <i class="fas fa-info-circle text-emerald-600"></i>
                        Informasi Pengajuan
                    </h3>
                    @if($pengajuan->status == 'Pending')
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                            <i class="fas fa-clock mr-2"></i> Pending
                        </span>
                    @elseif($pengajuan->status == 'Diproses')
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                            <i class="fas fa-cog mr-2"></i> Diproses
                        </span>
                    @elseif($pengajuan->status == 'Disetujui')
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                            <i class="fas fa-check mr-2"></i> Disetujui
                        </span>
                    @elseif($pengajuan->status == 'Ditolak')
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                            <i class="fas fa-times mr-2"></i> Ditolak
                        </span>
                    @endif
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Jenis Surat</label>
                        <p class="text-gray-900 font-medium">{{ $pengajuan->jenisSurat->nama ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Tanggal Pengajuan</label>
                        <p class="text-gray-900">{{ $pengajuan->created_at->format('d F Y, H:i') }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Pemohon</label>
                        <p class="text-gray-900 font-medium">{{ $pengajuan->user->name ?? 'N/A' }}</p>
                        <p class="text-sm text-gray-600">{{ $pengajuan->user->email ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Terakhir Diupdate</label>
                        <p class="text-gray-900">{{ $pengajuan->updated_at->format('d F Y, H:i') }}</p>
                    </div>
                </div>

                @if($pengajuan->catatan_admin)
                    <div class="mt-6 p-4 bg-gray-50 rounded-lg">
                        <label class="block text-sm font-medium text-gray-500 mb-2">Catatan Admin</label>
                        <p class="text-gray-900">{{ $pengajuan->catatan_admin }}</p>
                    </div>
                @endif
            </div>

            <!-- Data Pribadi -->
            @php
                $data = json_decode($pengajuan->data, true);
            @endphp
            
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-6 flex items-center gap-2">
                    <i class="fas fa-user text-emerald-600"></i>
                    Data Pribadi Pemohon
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Nama Lengkap</label>
                        <p class="text-gray-900 font-medium">{{ $data['nama_lengkap'] ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Tempat, Tanggal Lahir</label>
                        <p class="text-gray-900">{{ $data['ttl'] ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Jenis Kelamin</label>
                        <p class="text-gray-900">{{ $data['jenis_kelamin'] ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">NIK</label>
                        <p class="text-gray-900 font-mono">{{ $data['nik'] ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">No. Kartu Keluarga</label>
                        <p class="text-gray-900 font-mono">{{ $data['no_kk'] ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Agama</label>
                        <p class="text-gray-900">{{ $data['agama'] ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Pekerjaan</label>
                        <p class="text-gray-900">{{ $data['pekerjaan'] ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Status Perkawinan</label>
                        <p class="text-gray-900">{{ $data['status_perkawinan'] ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">No. HP/WhatsApp</label>
                        <p class="text-gray-900">{{ $data['no_hp'] ?? 'N/A' }}</p>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-500 mb-1">Alamat Lengkap</label>
                        <p class="text-gray-900">{{ $data['alamat'] ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>

            <!-- Tujuan Permohonan -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center gap-2">
                    <i class="fas fa-bullseye text-emerald-600"></i>
                    Tujuan Permohonan
                </h3>
                <div class="p-4 bg-gray-50 rounded-lg">
                    <p class="text-gray-900">{{ $data['tujuan_permohonan'] ?? 'N/A' }}</p>
                </div>
            </div>

            <!-- Lampiran -->
            @if(isset($data['lampiran']) && $data['lampiran'])
                <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center gap-2">
                        <i class="fas fa-paperclip text-emerald-600"></i>
                        Lampiran Pendukung
                    </h3>
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                        <div class="flex items-center">
                            <i class="fas fa-file text-gray-400 text-2xl mr-3"></i>
                            <div>
                                <p class="text-gray-900 font-medium">{{ basename($data['lampiran']) }}</p>
                                <p class="text-sm text-gray-500">Lampiran pendukung</p>
                            </div>
                        </div>
                        <a href="{{ route('storage.lampiran', basename($data['lampiran'])) }}" target="_blank"
                           class="inline-flex items-center px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors">
                            <i class="fas fa-download mr-2"></i>
                            Download
                        </a>
                    </div>
                </div>
            @endif
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Quick Actions -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center gap-2">
                    <i class="fas fa-bolt text-emerald-600"></i>
                    Aksi Cepat
                </h3>
                <div class="space-y-3">
                    @if(Auth::user()->role === 'admin')
                        <a href="{{ route('admin.pengajuan.edit', $pengajuan->id) }}" 
                           class="w-full inline-flex items-center justify-center px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors">
                            <i class="fas fa-edit mr-2"></i>
                            Edit Pengajuan
                        </a>
                        
                        @if($pengajuan->file_url)
                            <a href="{{ route('admin.pengajuan.download', $pengajuan->id) }}" 
                               class="w-full inline-flex items-center justify-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                                <i class="fas fa-download mr-2"></i>
                                Download Surat
                            </a>
                        @endif
                        
                        <form method="POST" action="{{ route('admin.pengajuan.destroy', $pengajuan->id) }}" 
                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengajuan ini?')" class="w-full">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="w-full inline-flex items-center justify-center px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                                <i class="fas fa-trash mr-2"></i>
                                Hapus Pengajuan
                            </button>
                        </form>
                    @else
                        @if($pengajuan->file_url)
                            <a href="{{ route('user.pengajuan.download', $pengajuan->id) }}" 
                               class="w-full inline-flex items-center justify-center px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors">
                                <i class="fas fa-download mr-2"></i>
                                Download Surat
                            </a>
                        @endif
                        
                        <a href="{{ route('user.pengajuan.create') }}" 
                           class="w-full inline-flex items-center justify-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                            <i class="fas fa-plus mr-2"></i>
                            Pengajuan Baru
                        </a>
                    @endif
                </div>
            </div>

            <!-- Status Timeline -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center gap-2">
                    <i class="fas fa-history text-emerald-600"></i>
                    Timeline Status
                </h3>
                <div class="space-y-4">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 w-3 h-3 bg-green-500 rounded-full"></div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-900">Pengajuan Dibuat</p>
                            <p class="text-xs text-gray-500">{{ $pengajuan->created_at->format('d M Y, H:i') }}</p>
                        </div>
                    </div>
                    
                    @if($pengajuan->status !== 'Pending')
                        <div class="flex items-center">
                            <div class="flex-shrink-0 w-3 h-3 bg-blue-500 rounded-full"></div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-900">Status: {{ $pengajuan->status }}</p>
                                <p class="text-xs text-gray-500">{{ $pengajuan->updated_at->format('d M Y, H:i') }}</p>
                            </div>
                        </div>
                    @endif
                    
                    @if($pengajuan->file_url)
                        <div class="flex items-center">
                            <div class="flex-shrink-0 w-3 h-3 bg-purple-500 rounded-full"></div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-900">Surat Tersedia</p>
                                <p class="text-xs text-gray-500">File surat dapat diunduh</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- File Download -->
            @if($pengajuan->file_url)
                <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center gap-2">
                        <i class="fas fa-file-pdf text-emerald-600"></i>
                        File Surat
                    </h3>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-file-pdf text-red-600 text-2xl"></i>
                        </div>
                        <p class="text-sm text-gray-600 mb-4">Surat siap untuk diunduh</p>
                        @if(Auth::user()->role === 'admin')
                            <a href="{{ route('admin.pengajuan.download', $pengajuan->id) }}" 
                               class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                                <i class="fas fa-download mr-2"></i>
                                Download PDF
                            </a>
                        @else
                            <a href="{{ route('user.pengajuan.download', $pengajuan->id) }}" 
                               class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                                <i class="fas fa-download mr-2"></i>
                                Download PDF
                            </a>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
