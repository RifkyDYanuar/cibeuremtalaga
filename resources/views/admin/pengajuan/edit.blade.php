@extends('layouts.admin')

@section('content')
<div class="p-4 md:p-6">
    <!-- Header Section -->
    <div class="mb-6 md:mb-8">
        <div class="flex items-center gap-3 mb-4">
            <a href="{{ route('admin.pengajuan.show', $pengajuan->id) }}" 
               class="inline-flex items-center px-3 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali ke Detail
            </a>
        </div>
        <div>
            <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2 flex items-center gap-2 md:gap-3">
                <i class="fas fa-edit text-emerald-600 text-xl md:text-2xl"></i>
                Edit Pengajuan #{{ $pengajuan->id }}
            </h1>
            <div class="flex items-center text-sm text-gray-600 gap-2">
                <span>Dashboard</span> 
                <i class="fas fa-chevron-right text-xs"></i> 
                <span>Manajemen Pengajuan</span>
                <i class="fas fa-chevron-right text-xs"></i>
                <span class="text-emerald-600 font-medium">Edit #{{ $pengajuan->id }}</span>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-800 px-4 md:px-6 py-4 rounded-xl mb-6">
            <div class="flex items-start space-x-3">
                <i class="fas fa-exclamation-triangle mt-1 text-red-600"></i>
                <div>
                    <strong>Terjadi kesalahan:</strong>
                    <ul class="mt-2 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.pengajuan.update', $pengajuan->id) }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Status & Basic Info -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-6 flex items-center gap-2">
                        <i class="fas fa-info-circle text-emerald-600"></i>
                        Update Status Pengajuan
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Status Pengajuan <span class="text-red-500">*</span></label>
                            <select name="status" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-colors">
                                <option value="Pending" {{ $pengajuan->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Diproses" {{ $pengajuan->status === 'Diproses' ? 'selected' : '' }}>Diproses</option>
                                <option value="Disetujui" {{ $pengajuan->status === 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
                                <option value="Ditolak" {{ $pengajuan->status === 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Surat</label>
                            <p class="px-4 py-2 bg-gray-50 rounded-lg text-gray-900 font-medium">{{ $pengajuan->jenisSurat->nama ?? 'N/A' }}</p>
                        </div>
                    </div>

                    <div class="mt-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Catatan Admin</label>
                        <textarea name="catatan_admin" rows="4"
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-colors"
                                  placeholder="Berikan catatan atau keterangan terkait pengajuan ini...">{{ old('catatan_admin', $pengajuan->catatan_admin) }}</textarea>
                    </div>
                </div>

                <!-- Upload Surat -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-6 flex items-center gap-2">
                        <i class="fas fa-file-upload text-emerald-600"></i>
                        Upload Surat Jadi
                    </h3>
                    
                    @if($pengajuan->file_url)
                        <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <i class="fas fa-file-pdf text-green-600 text-2xl mr-3"></i>
                                    <div>
                                        <p class="text-green-800 font-medium">File surat sudah tersedia</p>
                                        <p class="text-sm text-green-600">{{ basename($pengajuan->file_url) }}</p>
                                    </div>
                                </div>
                                <a href="{{ route('admin.pengajuan.download', $pengajuan->id) }}" target="_blank"
                                   class="inline-flex items-center px-3 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                                    <i class="fas fa-download mr-2"></i>
                                    Download
                                </a>
                            </div>
                        </div>
                    @endif

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            {{ $pengajuan->file_url ? 'Ganti File Surat (PDF)' : 'Upload File Surat (PDF)' }}
                        </label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-emerald-500 transition-colors">
                            <div class="space-y-1 text-center">
                                <i class="fas fa-cloud-upload-alt text-4xl text-gray-400"></i>
                                <div class="flex text-sm text-gray-600">
                                    <label for="file_surat" class="relative cursor-pointer bg-white rounded-md font-medium text-emerald-600 hover:text-emerald-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-emerald-500">
                                        <span>Upload file PDF</span>
                                        <input id="file_surat" name="file_surat" type="file" class="sr-only" accept=".pdf">
                                    </label>
                                    <p class="pl-1">atau drag and drop</p>
                                </div>
                                <p class="text-xs text-gray-500">PDF hingga 5MB</p>
                            </div>
                        </div>
                        <div id="file-info" class="mt-2 text-sm text-gray-600 hidden">
                            <i class="fas fa-file-pdf mr-1"></i>
                            <span id="file-name"></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar - Data Pengajuan -->
            <div class="space-y-6">
                <!-- Informasi Pemohon -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center gap-2">
                        <i class="fas fa-user text-emerald-600"></i>
                        Informasi Pemohon
                    </h3>
                    <div class="space-y-3">
                        <div>
                            <label class="block text-sm font-medium text-gray-500 mb-1">Nama</label>
                            <p class="text-gray-900 font-medium">{{ $pengajuan->user->name ?? 'N/A' }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 mb-1">Email</label>
                            <p class="text-gray-900">{{ $pengajuan->user->email ?? 'N/A' }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 mb-1">Tanggal Pengajuan</label>
                            <p class="text-gray-900">{{ $pengajuan->created_at->format('d F Y, H:i') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Data Pribadi Singkat -->
                @php
                    $data = json_decode($pengajuan->data, true);
                @endphp
                
                <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center gap-2">
                        <i class="fas fa-id-card text-emerald-600"></i>
                        Data Pribadi
                    </h3>
                    <div class="space-y-3 text-sm">
                        <div>
                            <label class="block font-medium text-gray-500 mb-1">Nama Lengkap</label>
                            <p class="text-gray-900">{{ $data['nama_lengkap'] ?? 'N/A' }}</p>
                        </div>
                        <div>
                            <label class="block font-medium text-gray-500 mb-1">NIK</label>
                            <p class="text-gray-900 font-mono">{{ $data['nik'] ?? 'N/A' }}</p>
                        </div>
                        <div>
                            <label class="block font-medium text-gray-500 mb-1">No. HP</label>
                            <p class="text-gray-900">{{ $data['no_hp'] ?? 'N/A' }}</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('admin.pengajuan.show', $pengajuan->id) }}" 
                           class="text-emerald-600 hover:text-emerald-700 text-sm font-medium">
                            <i class="fas fa-eye mr-1"></i>
                            Lihat Detail Lengkap
                        </a>
                    </div>
                </div>

                <!-- Quick Status -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center gap-2">
                        <i class="fas fa-tachometer-alt text-emerald-600"></i>
                        Status Cepat
                    </h3>
                    <div class="space-y-2">
                        <button type="button" onclick="setStatus('Diproses')" 
                                class="w-full text-left px-3 py-2 text-sm bg-blue-50 text-blue-700 rounded-lg hover:bg-blue-100 transition-colors">
                            <i class="fas fa-cog mr-2"></i>
                            Set Diproses
                        </button>
                        <button type="button" onclick="setStatus('Disetujui')" 
                                class="w-full text-left px-3 py-2 text-sm bg-green-50 text-green-700 rounded-lg hover:bg-green-100 transition-colors">
                            <i class="fas fa-check mr-2"></i>
                            Set Disetujui
                        </button>
                        <button type="button" onclick="setStatus('Ditolak')" 
                                class="w-full text-left px-3 py-2 text-sm bg-red-50 text-red-700 rounded-lg hover:bg-red-100 transition-colors">
                            <i class="fas fa-times mr-2"></i>
                            Set Ditolak
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Submit Buttons -->
        <div class="flex items-center justify-between pt-6 border-t border-gray-200">
            <div class="flex items-center space-x-3">
                <a href="{{ route('admin.pengajuan.show', $pengajuan->id) }}" 
                   class="px-6 py-3 bg-gray-500 text-white font-medium rounded-lg hover:bg-gray-600 transition-colors">
                    <i class="fas fa-times mr-2"></i>
                    Batal
                </a>
            </div>
            <div class="flex items-center space-x-3">
                <button type="submit" 
                        class="px-6 py-3 bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-medium rounded-lg hover:from-emerald-700 hover:to-teal-700 transition-colors shadow-lg">
                    <i class="fas fa-save mr-2"></i>
                    Simpan Perubahan
                </button>
            </div>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const fileInput = document.getElementById('file_surat');
    const fileInfo = document.getElementById('file-info');
    const fileName = document.getElementById('file-name');

    fileInput.addEventListener('change', function(e) {
        if (e.target.files.length > 0) {
            fileName.textContent = e.target.files[0].name;
            fileInfo.classList.remove('hidden');
        } else {
            fileInfo.classList.add('hidden');
        }
    });

    window.setStatus = function(status) {
        document.querySelector('select[name="status"]').value = status;
        
        // Auto-fill catatan based on status
        const catatanTextarea = document.querySelector('textarea[name="catatan_admin"]');
        const currentCatatan = catatanTextarea.value;
        
        if (!currentCatatan.trim()) {
            switch(status) {
                case 'Diproses':
                    catatanTextarea.value = 'Pengajuan sedang dalam proses verifikasi dan pembuatan surat.';
                    break;
                case 'Disetujui':
                    catatanTextarea.value = 'Pengajuan telah disetujui. Surat dapat diambil atau diunduh.';
                    break;
                case 'Ditolak':
                    catatanTextarea.value = 'Pengajuan ditolak karena data tidak lengkap atau tidak memenuhi syarat.';
                    break;
            }
        }
    }
});
</script>
@endsection
