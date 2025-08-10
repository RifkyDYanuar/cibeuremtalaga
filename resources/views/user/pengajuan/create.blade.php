@extends('layouts.user')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-village-light via-white to-village-accent/20">
    <div class="max-w-4xl mx-auto px-4 md:px-6 py-6 md:py-8">
        <!-- Page Header -->
        <div class="mb-6 md:mb-8">
            <div class="flex items-center gap-3 mb-4">
                <a href="{{ route('user.pengajuan.index') }}" 
                   class="inline-flex items-center px-3 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </a>
            </div>
            <div>
                <h1 class="text-2xl md:text-3xl font-bold bg-gradient-to-r from-village-primary to-village-secondary bg-clip-text text-transparent flex items-center gap-3">
                    <i class="fas fa-file-plus text-village-primary"></i>
                    Buat Pengajuan Surat
                </h1>
                <p class="text-gray-600 mt-1 md:mt-2 text-sm md:text-base">Lengkapi form berikut untuk mengajukan permohonan surat</p>
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

        <form method="POST" action="{{ route('user.pengajuan.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            
            <!-- Jenis Surat -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center gap-2">
                    <i class="fas fa-file-alt text-village-primary"></i>
                    Jenis Surat yang Diajukan
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($jenisSurats as $jenis)
                        <label class="flex items-center p-4 border border-gray-200 rounded-lg hover:border-village-primary hover:bg-village-primary/5 transition-all cursor-pointer">
                            <input type="radio" name="jenis_surat_id" value="{{ $jenis->id }}" 
                                   class="w-4 h-4 text-village-primary border-gray-300 focus:ring-village-primary" 
                                   {{ old('jenis_surat_id') == $jenis->id ? 'checked' : '' }} required>
                            <div class="ml-3">
                                <div class="text-sm font-medium text-gray-900">{{ $jenis->nama }}</div>
                                @if($jenis->deskripsi)
                                    <div class="text-xs text-gray-500">{{ $jenis->deskripsi }}</div>
                                @endif
                            </div>
                        </label>
                    @endforeach
                </div>
            </div>

            <!-- Data Pribadi -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center gap-2">
                    <i class="fas fa-user text-village-primary"></i>
                    Data Pribadi
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                        <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent transition-colors">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tempat, Tanggal Lahir <span class="text-red-500">*</span></label>
                        <input type="text" name="ttl" value="{{ old('ttl') }}" placeholder="Contoh: Jakarta, 01 Januari 1990" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent transition-colors">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Kelamin <span class="text-red-500">*</span></label>
                        <select name="jenis_kelamin" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent transition-colors">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">NIK <span class="text-red-500">*</span></label>
                        <input type="text" name="nik" value="{{ old('nik') }}" maxlength="16" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent transition-colors"
                               placeholder="16 digit NIK">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">No. Kartu Keluarga <span class="text-red-500">*</span></label>
                        <input type="text" name="no_kk" value="{{ old('no_kk') }}" maxlength="16" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent transition-colors"
                               placeholder="16 digit No. KK">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Agama <span class="text-red-500">*</span></label>
                        <select name="agama" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent transition-colors">
                            <option value="">Pilih Agama</option>
                            <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                            <option value="Kristen" {{ old('agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                            <option value="Katolik" {{ old('agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                            <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                            <option value="Buddha" {{ old('agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                            <option value="Konghucu" {{ old('agama') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Pekerjaan <span class="text-red-500">*</span></label>
                        <input type="text" name="pekerjaan" value="{{ old('pekerjaan') }}" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent transition-colors">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status Perkawinan <span class="text-red-500">*</span></label>
                        <select name="status_perkawinan" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent transition-colors">
                            <option value="">Pilih Status</option>
                            <option value="Belum Kawin" {{ old('status_perkawinan') == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                            <option value="Kawin" {{ old('status_perkawinan') == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                            <option value="Cerai Hidup" {{ old('status_perkawinan') == 'Cerai Hidup' ? 'selected' : '' }}>Cerai Hidup</option>
                            <option value="Cerai Mati" {{ old('status_perkawinan') == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">No. HP/WhatsApp <span class="text-red-500">*</span></label>
                        <input type="text" name="no_hp" value="{{ old('no_hp') }}" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent transition-colors"
                               placeholder="Contoh: 081234567890">
                    </div>
                    
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Alamat Lengkap <span class="text-red-500">*</span></label>
                        <textarea name="alamat" rows="3" required
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent transition-colors"
                                  placeholder="Masukkan alamat lengkap sesuai KTP">{{ old('alamat') }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Tujuan Permohonan -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center gap-2">
                    <i class="fas fa-bullseye text-village-primary"></i>
                    Tujuan Permohonan
                </h3>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Jelaskan tujuan penggunaan surat <span class="text-red-500">*</span></label>
                    <textarea name="tujuan_permohonan" rows="4" required
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent transition-colors"
                              placeholder="Contoh: Untuk persyaratan melamar pekerjaan di PT ABC">{{ old('tujuan_permohonan') }}</textarea>
                </div>
            </div>

            <!-- Lampiran -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center gap-2">
                    <i class="fas fa-paperclip text-village-primary"></i>
                    Lampiran Pendukung
                </h3>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Upload File Lampiran (opsional)</label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-village-primary transition-colors">
                        <div class="space-y-1 text-center">
                            <i class="fas fa-cloud-upload-alt text-4xl text-gray-400"></i>
                            <div class="flex text-sm text-gray-600">
                                <label for="lampiran" class="relative cursor-pointer bg-white rounded-md font-medium text-village-primary hover:text-village-secondary focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-village-primary">
                                    <span>Upload file</span>
                                    <input id="lampiran" name="lampiran" type="file" class="sr-only" accept=".pdf,.jpg,.jpeg,.png">
                                </label>
                                <p class="pl-1">atau drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, PDF hingga 2MB</p>
                        </div>
                    </div>
                    <div id="file-info" class="mt-2 text-sm text-gray-600 hidden">
                        <i class="fas fa-file mr-1"></i>
                        <span id="file-name"></span>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex items-center justify-between pt-4">
                <a href="{{ route('user.pengajuan.index') }}" 
                   class="px-6 py-3 bg-gray-500 text-white font-medium rounded-lg hover:bg-gray-600 transition-colors">
                    <i class="fas fa-times mr-2"></i>
                    Batal
                </a>
                <button type="submit" 
                        class="px-6 py-3 bg-gradient-to-r from-village-primary to-village-secondary text-white font-medium rounded-lg hover:from-village-secondary hover:to-village-primary transition-colors shadow-lg">
                    <i class="fas fa-paper-plane mr-2"></i>
                    Kirim Pengajuan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const fileInput = document.getElementById('lampiran');
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

    // NIK and No KK validation
    const nikInput = document.querySelector('input[name="nik"]');
    const noKkInput = document.querySelector('input[name="no_kk"]');

    [nikInput, noKkInput].forEach(input => {
        input.addEventListener('input', function(e) {
            // Only allow numbers
            e.target.value = e.target.value.replace(/[^0-9]/g, '');
        });
    });

    // Phone number validation
    const phoneInput = document.querySelector('input[name="no_hp"]');
    phoneInput.addEventListener('input', function(e) {
        // Only allow numbers, +, and spaces
        e.target.value = e.target.value.replace(/[^0-9+\s]/g, '');
    });
});
</script>
@endsection
