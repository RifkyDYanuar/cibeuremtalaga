{{-- Detail pengajuan surat untuk admin (validasi, upload, update status) --}}
@extends('layouts.admin')
@section('content')
<div class="p-4 md:p-6">
    <!-- Header Section -->
    <div class="mb-6 md:mb-8">
        <div class="flex flex-col gap-4">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2 flex items-center gap-2 md:gap-3">
                    <i class="fas fa-file-alt text-emerald-600 text-xl md:text-2xl"></i>
                    <span class="hidden sm:inline">Detail Pengajuan Surat</span>
                    <span class="sm:hidden">Detail Pengajuan</span>
                </h1>
                <div class="flex items-center text-sm text-gray-600 gap-2">
                    <a href="{{ route('admin.dashboard') }}" class="text-emerald-600 hover:text-emerald-700 transition-colors">Dashboard</a>
                    <i class="fas fa-chevron-right text-xs"></i>
                    <a href="{{ route('admin.pengajuan.list') }}" class="text-emerald-600 hover:text-emerald-700 transition-colors">Pengajuan</a>
                    <i class="fas fa-chevron-right text-xs"></i>
                    <span class="font-medium">Detail</span>
                </div>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('admin.pengajuan.list') }}" 
                   class="inline-flex items-center px-3 md:px-4 py-2 bg-gray-500 text-white font-medium rounded-lg hover:bg-gray-600 transition-all duration-200 shadow-md hover:shadow-lg text-sm md:text-base">
                    <i class="fas fa-arrow-left mr-2"></i> 
                    <span class="hidden sm:inline">Kembali</span>
                    <span class="sm:hidden">Back</span>
                </a>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 md:gap-6 mb-4 md:mb-6">
        <!-- Informasi Pengajuan -->
        <div class="bg-white/80 backdrop-blur-sm rounded-xl md:rounded-2xl shadow-lg border border-white/20 overflow-hidden">
            <div class="px-4 md:px-6 py-3 md:py-4 bg-gradient-to-r from-emerald-600 to-teal-600 flex items-center justify-between">
                <h3 class="text-base md:text-lg font-semibold text-white flex items-center gap-2">
                    <i class="fas fa-info-circle text-sm md:text-base"></i>
                    <span class="hidden sm:inline">Informasi Pengajuan</span>
                    <span class="sm:hidden">Info</span>
                </h3>
                <div class="status-badge">
                    @if($pengajuan->status == 'Pending')
                        <span class="inline-flex items-center px-2 md:px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                            <i class="fas fa-clock mr-1"></i> 
                            <span class="hidden sm:inline">Pending</span>
                            <span class="sm:hidden">P</span>
                        </span>
                    @elseif($pengajuan->status == 'Disetujui')
                        <span class="inline-flex items-center px-2 md:px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            <i class="fas fa-check mr-1"></i> 
                            <span class="hidden sm:inline">Disetujui</span>
                            <span class="sm:hidden">OK</span>
                        </span>
                    @elseif($pengajuan->status == 'Ditolak')
                        <span class="inline-flex items-center px-2 md:px-3 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                            <i class="fas fa-times mr-1"></i> 
                            <span class="hidden sm:inline">Ditolak</span>
                            <span class="sm:hidden">NO</span>
                        </span>
                    @else
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                            <i class="fas fa-question mr-1"></i> {{ $pengajuan->status }}
                        </span>
                    @endif
                </div>
            </div>
            <div class="p-6">
                @php $data = json_decode($pengajuan->data, true); @endphp
                <div class="space-y-6">
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-file-contract text-blue-600"></i>
                            </div>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-600">Jenis Surat</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $pengajuan->jenisSurat->nama ?? '-' }}</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-calendar-alt text-green-600"></i>
                            </div>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-600">Tanggal Pengajuan</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $pengajuan->created_at->format('d M Y, H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Pemohon -->
        <!-- Data Pemohon -->
        <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-white/20 overflow-hidden">
            <div class="px-6 py-4 bg-gradient-to-r from-emerald-600 to-teal-600">
                <h3 class="text-lg font-semibold text-white flex items-center gap-2">
                    <i class="fas fa-user"></i>
                    Data Pemohon
                </h3>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-gray-50 p-4 rounded-lg border-l-4 border-emerald-500">
                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wide mb-1">Nama Lengkap</p>
                        <p class="text-sm font-semibold text-gray-900">{{ $data['nama_lengkap'] ?? '-' }}</p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg border-l-4 border-blue-500">
                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wide mb-1">Tempat, Tanggal Lahir</p>
                        <p class="text-sm font-semibold text-gray-900">{{ $data['ttl'] ?? '-' }}</p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg border-l-4 border-purple-500">
                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wide mb-1">Jenis Kelamin</p>
                        <p class="text-sm font-semibold text-gray-900">{{ $data['jenis_kelamin'] ?? '-' }}</p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg border-l-4 border-yellow-500">
                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wide mb-1">NIK</p>
                        <p class="text-sm font-semibold text-gray-900">{{ $data['nik'] ?? '-' }}</p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg border-l-4 border-red-500">
                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wide mb-1">Nomor KK</p>
                        <p class="text-sm font-semibold text-gray-900">{{ $data['no_kk'] ?? '-' }}</p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg border-l-4 border-indigo-500">
                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wide mb-1">Alamat</p>
                        <p class="text-sm font-semibold text-gray-900">{{ $data['alamat'] ?? '-' }}</p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg border-l-4 border-green-500">
                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wide mb-1">Agama</p>
                        <p class="text-sm font-semibold text-gray-900">{{ $data['agama'] ?? '-' }}</p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg border-l-4 border-pink-500">
                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wide mb-1">Pekerjaan</p>
                        <p class="text-sm font-semibold text-gray-900">{{ $data['pekerjaan'] ?? '-' }}</p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg border-l-4 border-teal-500">
                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wide mb-1">Status Perkawinan</p>
                        <p class="text-sm font-semibold text-gray-900">{{ $data['status_perkawinan'] ?? '-' }}</p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg border-l-4 border-orange-500">
                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wide mb-1">No. HP</p>
                        <p class="text-sm font-semibold text-gray-900">{{ $data['no_hp'] ?? '-' }}</p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg border-l-4 border-cyan-500 md:col-span-2">
                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wide mb-1">Tujuan Permohonan</p>
                        <p class="text-sm font-semibold text-gray-900">{{ $data['tujuan_permohonan'] ?? '-' }}</p>
                    </div>
                    
                    <!-- Data tambahan -->
                    @foreach($data as $key => $val)
                        @if(!in_array($key, ['nama_lengkap','ttl','jenis_kelamin','nik','no_kk','alamat','agama','pekerjaan','status_perkawinan','no_hp','tujuan_permohonan']))
                            <div class="bg-gray-50 p-4 rounded-lg border-l-4 border-gray-500">
                                <p class="text-xs font-medium text-gray-500 uppercase tracking-wide mb-1">{{ ucwords(str_replace('_',' ',$key)) }}</p>
                                <div class="text-sm font-semibold text-gray-900">
                                    @if(str_contains($key, 'lampiran') && $val)
                                        <a href="{{ route('storage.lampiran', basename($val)) }}" target="_blank" 
                                           class="inline-flex items-center text-blue-600 hover:text-blue-800 transition-colors">
                                            <i class="fas fa-file-download mr-1"></i> Lihat Lampiran
                                        </a>
                                    @else
                                        {{ $val }}
                                    @endif
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Form Tindakan Admin -->
    <!-- Form Tindakan Admin -->
    <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-white/20 overflow-hidden">
        <div class="px-6 py-4 bg-gradient-to-r from-emerald-600 to-teal-600">
            <h3 class="text-lg font-semibold text-white flex items-center gap-2">
                <i class="fas fa-cogs"></i>
                Tindakan Admin
            </h3>
        </div>
        <div class="p-6">
            <form method="POST" action="{{ url('admin/pengajuan/'.$pengajuan->id.'/update') }}" enctype="multipart/form-data" id="updateForm">
                @csrf
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
                            <i class="fas fa-comment-alt text-emerald-600"></i>
                            Respon/Catatan Admin
                        </label>
                        <textarea name="catatan_admin" rows="4" 
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200" 
                                  placeholder="Masukkan catatan atau respon untuk pengajuan ini...">{{ $pengajuan->catatan_admin }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
                            <i class="fas fa-upload text-emerald-600"></i>
                            Upload File Surat Jadi
                        </label>
                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-emerald-500 transition-colors duration-200">
                            <input type="file" name="file_url" accept=".pdf,.jpg,.jpeg,.png" id="fileInput" class="hidden">
                            <label for="fileInput" class="cursor-pointer">
                                <div class="space-y-2">
                                    <div class="mx-auto w-12 h-12 bg-emerald-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-cloud-upload-alt text-emerald-600 text-xl"></i>
                                    </div>
                                    <div>
                                        <span class="text-sm font-medium text-gray-900">Pilih file atau drag & drop</span>
                                        <p class="text-xs text-gray-500">Format: PDF, JPG, PNG (Max: 5MB)</p>
                                    </div>
                                </div>
                            </label>
                        </div>
                        @if($pengajuan->file_url)
                            <div class="mt-3 p-3 bg-blue-50 border border-blue-200 rounded-lg flex items-center gap-3">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-file-check text-blue-600"></i>
                                </div>
                                <div class="flex-1">
                                    <span class="text-sm font-medium text-blue-900">File saat ini:</span>
                                    <a href="{{ route('storage.surat_jadi', basename($pengajuan->file_url)) }}" target="_blank" 
                                       class="ml-2 inline-flex items-center text-blue-600 hover:text-blue-800 transition-colors">
                                        <i class="fas fa-download mr-1"></i> Download Surat Jadi
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
                            <i class="fas fa-flag text-emerald-600"></i>
                            Status Pengajuan
                        </label>
                        <select name="status" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200">
                            <option value="Pending" @if($pengajuan->status=='Pending') selected @endif>
                                🕐 Pending
                            </option>
                            <option value="Disetujui" @if($pengajuan->status=='Disetujui') selected @endif>
                                ✅ Disetujui
                            </option>
                            <option value="Ditolak" @if($pengajuan->status=='Ditolak') selected @endif>
                                ❌ Ditolak
                            </option>
                        </select>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3 pt-6 border-t border-gray-200">
                        <button type="submit" 
                                class="flex-1 inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-semibold rounded-lg hover:from-emerald-700 hover:to-teal-700 transform hover:scale-105 transition-all duration-200 shadow-lg hover:shadow-xl">
                            <i class="fas fa-save mr-2"></i> Simpan Perubahan
                        </button>
                        <button type="button" onclick="resetForm()" 
                                class="flex-1 inline-flex items-center justify-center px-6 py-3 bg-gray-500 text-white font-medium rounded-lg hover:bg-gray-600 transition-all duration-200 shadow-md hover:shadow-lg">
                            <i class="fas fa-undo mr-2"></i> Reset
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function resetForm() {
    document.getElementById('updateForm').reset();
    // Reset file input display
    const fileLabel = document.querySelector('label[for="fileInput"] span');
    fileLabel.textContent = 'Pilih file atau drag & drop';
}

// File upload preview
document.getElementById('fileInput').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const fileLabel = document.querySelector('label[for="fileInput"] span');
        fileLabel.textContent = file.name;
    }
});

// Form validation
document.getElementById('updateForm').addEventListener('submit', function(e) {
    const status = document.querySelector('select[name="status"]').value;
    const catatan = document.querySelector('textarea[name="catatan_admin"]').value;
    
    if (status === 'Ditolak' && !catatan.trim()) {
        e.preventDefault();
        alert('Catatan admin wajib diisi untuk pengajuan yang ditolak');
        return false;
    }
    
    return true;
});
</script>
@endsection
