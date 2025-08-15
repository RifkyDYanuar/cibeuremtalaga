@extends('layouts.admin')

@section('title', 'Tambah Data IDM')

@section('breadcrumb')
    <span class="text-gray-400 mx-2">/</span>
    <a href="{{ route('admin.idm.index') }}" class="hover:text-village-primary transition-colors">IDM Desa</a>
    <span class="text-gray-400 mx-2">/</span>
    <span class="text-village-primary">Tambah Data</span>
@endsection

@section('content')
<div class="p-3 md:p-6">
    <!-- Header Section -->
    <div class="mb-4 md:mb-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
            <div>
                <h1 class="text-xl md:text-2xl font-bold text-gray-900 mb-1">Tambah Data IDM</h1>
                <p class="text-xs md:text-sm text-gray-600">Tambahkan data Indeks Desa Membangun (IDM) baru</p>
            </div>
            <a href="{{ route('admin.idm.index') }}" 
               class="inline-flex items-center px-3 md:px-4 py-2 bg-gray-500 text-white font-semibold rounded-lg hover:bg-gray-600 transition-all duration-200 shadow-lg text-xs md:text-sm">
                <i class="fas fa-arrow-left mr-1 md:mr-2"></i> 
                <span>Kembali</span>
            </a>
        </div>
    </div>

    <!-- Form Section -->
    <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-lg border border-white/20 overflow-hidden">
        <div class="px-4 md:px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">Form Tambah Data IDM</h3>
            <p class="text-sm text-gray-600">Isi semua field yang diperlukan dengan data yang akurat</p>
        </div>
        
        <div class="p-4 md:p-6">
            @if ($errors->any())
                <div class="mb-6 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg">
                    <div class="flex items-center mb-2">
                        <i class="fas fa-exclamation-triangle mr-2"></i>
                        <strong>Terdapat kesalahan:</strong>
                    </div>
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.idm.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <!-- Basic Information -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="tahun" class="block text-sm font-medium text-gray-700 mb-2">Tahun <span class="text-red-500">*</span></label>
                        <input type="number" 
                               name="tahun" 
                               id="tahun" 
                               min="2020" 
                               max="{{ date('Y') + 5 }}"
                               value="{{ old('tahun', date('Y')) }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-village-primary @error('tahun') border-red-500 @enderror" 
                               required>
                        @error('tahun')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="status_idm" class="block text-sm font-medium text-gray-700 mb-2">Status IDM <span class="text-red-500">*</span></label>
                        <select name="status_idm" 
                                id="status_idm" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-village-primary @error('status_idm') border-red-500 @enderror" 
                                required>
                            <option value="">Pilih Status IDM</option>
                            <option value="Sangat Tertinggal" {{ old('status_idm') == 'Sangat Tertinggal' ? 'selected' : '' }}>Sangat Tertinggal</option>
                            <option value="Tertinggal" {{ old('status_idm') == 'Tertinggal' ? 'selected' : '' }}>Tertinggal</option>
                            <option value="Berkembang" {{ old('status_idm') == 'Berkembang' ? 'selected' : '' }}>Berkembang</option>
                            <option value="Maju" {{ old('status_idm') == 'Maju' ? 'selected' : '' }}>Maju</option>
                            <option value="Mandiri" {{ old('status_idm') == 'Mandiri' ? 'selected' : '' }}>Mandiri</option>
                        </select>
                        @error('status_idm')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- IDM Scores -->
                <div class="border-t pt-6">
                    <h4 class="text-lg font-semibold text-gray-900 mb-4">Skor IDM</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="skor_idm" class="block text-sm font-medium text-gray-700 mb-2">Skor IDM <span class="text-red-500">*</span></label>
                            <input type="number" 
                                   name="skor_idm" 
                                   id="skor_idm" 
                                   step="0.01" 
                                   min="0" 
                                   max="1000"
                                   value="{{ old('skor_idm') }}" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-village-primary @error('skor_idm') border-red-500 @enderror" 
                                   required>
                            @error('skor_idm')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="target_tahun_depan" class="block text-sm font-medium text-gray-700 mb-2">Target Tahun Depan</label>
                            <input type="number" 
                                   name="target_tahun_depan" 
                                   id="target_tahun_depan" 
                                   step="0.01" 
                                   min="0" 
                                   max="1000"
                                   value="{{ old('target_tahun_depan') }}" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-village-primary @error('target_tahun_depan') border-red-500 @enderror">
                            @error('target_tahun_depan')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Dimensi Scores -->
                <div class="border-t pt-6">
                    <h4 class="text-lg font-semibold text-gray-900 mb-4">Skor Dimensi</h4>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label for="skor_iks" class="block text-sm font-medium text-gray-700 mb-2">Skor IKS (Sosial) <span class="text-red-500">*</span></label>
                            <input type="number" 
                                   name="skor_iks" 
                                   id="skor_iks" 
                                   step="0.01" 
                                   min="0" 
                                   max="1000"
                                   value="{{ old('skor_iks') }}" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-village-primary @error('skor_iks') border-red-500 @enderror" 
                                   required>
                            @error('skor_iks')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="skor_ike" class="block text-sm font-medium text-gray-700 mb-2">Skor IKE (Ekonomi) <span class="text-red-500">*</span></label>
                            <input type="number" 
                                   name="skor_ike" 
                                   id="skor_ike" 
                                   step="0.01" 
                                   min="0" 
                                   max="1000"
                                   value="{{ old('skor_ike') }}" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-village-primary @error('skor_ike') border-red-500 @enderror" 
                                   required>
                            @error('skor_ike')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="skor_ikl" class="block text-sm font-medium text-gray-700 mb-2">Skor IKL (Lingkungan) <span class="text-red-500">*</span></label>
                            <input type="number" 
                                   name="skor_ikl" 
                                   id="skor_ikl" 
                                   step="0.01" 
                                   min="0" 
                                   max="1000"
                                   value="{{ old('skor_ikl') }}" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-village-primary @error('skor_ikl') border-red-500 @enderror" 
                                   required>
                            @error('skor_ikl')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Additional Dimensions -->
                <div class="border-t pt-6">
                    <h4 class="text-lg font-semibold text-gray-900 mb-4">Dimensi Tambahan (Opsional)</h4>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label for="dimensi_sosial" class="block text-sm font-medium text-gray-700 mb-2">Dimensi Sosial</label>
                            <input type="number" 
                                   name="dimensi_sosial" 
                                   id="dimensi_sosial" 
                                   step="0.01" 
                                   min="0" 
                                   max="1000"
                                   value="{{ old('dimensi_sosial') }}" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-village-primary @error('dimensi_sosial') border-red-500 @enderror">
                            @error('dimensi_sosial')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="dimensi_ekonomi" class="block text-sm font-medium text-gray-700 mb-2">Dimensi Ekonomi</label>
                            <input type="number" 
                                   name="dimensi_ekonomi" 
                                   id="dimensi_ekonomi" 
                                   step="0.01" 
                                   min="0" 
                                   max="1000"
                                   value="{{ old('dimensi_ekonomi') }}" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-village-primary @error('dimensi_ekonomi') border-red-500 @enderror">
                            @error('dimensi_ekonomi')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="dimensi_lingkungan" class="block text-sm font-medium text-gray-700 mb-2">Dimensi Lingkungan</label>
                            <input type="number" 
                                   name="dimensi_lingkungan" 
                                   id="dimensi_lingkungan" 
                                   step="0.01" 
                                   min="0" 
                                   max="1000"
                                   value="{{ old('dimensi_lingkungan') }}" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-village-primary @error('dimensi_lingkungan') border-red-500 @enderror">
                            @error('dimensi_lingkungan')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="border-t pt-6">
                    <div>
                        <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                        <textarea name="deskripsi" 
                                  id="deskripsi" 
                                  rows="4" 
                                  maxlength="2000"
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-village-primary @error('deskripsi') border-red-500 @enderror" 
                                  placeholder="Deskripsi tambahan tentang data IDM (maksimal 2000 karakter)">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">Karakter tersisa: <span id="charCount">2000</span></p>
                    </div>
                </div>

                <!-- Publish Status -->
                <div class="border-t pt-6">
                    <div class="flex items-center">
                        <input type="checkbox" 
                               name="is_published" 
                               id="is_published" 
                               value="1"
                               {{ old('is_published') ? 'checked' : '' }}
                               class="w-4 h-4 text-village-primary bg-gray-100 border-gray-300 rounded focus:ring-village-primary focus:ring-2">
                        <label for="is_published" class="ml-2 text-sm font-medium text-gray-700">
                            Publikasikan data ini di website publik
                        </label>
                    </div>
                    <p class="mt-1 text-xs text-gray-500">Data yang dipublikasikan akan tampil di halaman publik website desa</p>
                </div>

                <!-- Submit Buttons -->
                <div class="border-t pt-6">
                    <div class="flex flex-col sm:flex-row gap-3 sm:justify-end">
                        <a href="{{ route('admin.idm.index') }}" 
                           class="px-4 py-2 bg-gray-500 text-white font-medium rounded-lg hover:bg-gray-600 transition-colors duration-200 text-center">
                            <i class="fas fa-times mr-2"></i>Batal
                        </a>
                        <button type="submit" 
                                class="px-4 py-2 bg-gradient-to-r from-village-primary to-village-secondary text-white font-medium rounded-lg hover:from-village-secondary hover:to-village-primary transition-all duration-200 shadow-lg hover:shadow-xl">
                            <i class="fas fa-save mr-2"></i>Simpan Data IDM
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// Character counter for description
document.getElementById('deskripsi').addEventListener('input', function() {
    const maxLength = 2000;
    const currentLength = this.value.length;
    const remaining = maxLength - currentLength;
    document.getElementById('charCount').textContent = remaining;
    
    if (remaining < 100) {
        document.getElementById('charCount').className = 'text-red-500 font-semibold';
    } else {
        document.getElementById('charCount').className = 'text-gray-500';
    }
});

// Auto calculate IDM score based on dimensions (optional enhancement)
function calculateIDM() {
    const iks = parseFloat(document.getElementById('skor_iks').value) || 0;
    const ike = parseFloat(document.getElementById('skor_ike').value) || 0;
    const ikl = parseFloat(document.getElementById('skor_ikl').value) || 0;
    
    if (iks > 0 && ike > 0 && ikl > 0) {
        const idm = (iks + ike + ikl) / 3;
        document.getElementById('skor_idm').value = idm.toFixed(2);
        
        // Auto set status based on score
        const statusSelect = document.getElementById('status_idm');
        if (idm < 40) statusSelect.value = 'Sangat Tertinggal';
        else if (idm < 55) statusSelect.value = 'Tertinggal';
        else if (idm < 70) statusSelect.value = 'Berkembang';
        else if (idm < 85) statusSelect.value = 'Maju';
        else statusSelect.value = 'Mandiri';
    }
}

// Add event listeners for auto calculation
['skor_iks', 'skor_ike', 'skor_ikl'].forEach(id => {
    document.getElementById(id).addEventListener('input', calculateIDM);
});
</script>
@endsection
