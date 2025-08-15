@extends('layouts.admin')

@section('title', 'Edit Data IDM')

@section('content')
<div class="p-3 md:p-6">
    <!-- Header Section -->
    <div class="mb-4 md:mb-6">
        <nav class="flex mb-4" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('admin.idm.index') }}" 
                       class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-village-primary transition-colors">
                        <i class="fas fa-chart-line mr-2"></i>
                        IDM DESA
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                        <a href="{{ route('admin.idm.show', $idm) }}" 
                           class="text-sm font-medium text-gray-700 hover:text-village-primary transition-colors">
                            Detail {{ $idm->tahun }}
                        </a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                        <span class="text-sm font-medium text-gray-500">Edit</span>
                    </div>
                </li>
            </ol>
        </nav>
        
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
            <div>
                <h1 class="text-xl md:text-2xl font-bold text-gray-900 mb-1">
                    <i class="fas fa-edit text-amber-600 mr-2"></i>
                    Edit Data IDM DESA {{ $idm->tahun }}
                </h1>
                <p class="text-xs md:text-sm text-gray-600">
                    Perbarui data Indeks Desa Membangun untuk tahun {{ $idm->tahun }}
                </p>
            </div>
        </div>
    </div>

    <!-- Form Card -->
    <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-lg border border-white/20 overflow-hidden">
        <div class="px-3 md:px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">
                <i class="fas fa-edit mr-2 text-amber-600"></i>Form Edit Data IDM
            </h3>
        </div>
        
        <div class="p-3 md:p-6">
            @if($errors->any())
                <div class="mb-6 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg">
                    <div class="flex items-center mb-2">
                        <i class="fas fa-exclamation-triangle mr-2"></i>
                        <h6 class="font-semibold">Terdapat kesalahan:</h6>
                    </div>
                    <ul class="list-disc list-inside space-y-1">
                        @foreach($errors->all() as $error)
                            <li class="text-sm">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.idm.update', $idm) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Basic Information -->
                    <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl p-4 md:p-6 border border-blue-200">
                        <div class="mb-4">
                            <h4 class="text-lg font-semibold text-blue-800 flex items-center">
                                <i class="fas fa-info-circle mr-2"></i>
                                Informasi Dasar
                            </h4>
                        </div>
                        
                        <div class="space-y-4">
                            <div>
                                <label for="tahun" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-calendar mr-1 text-blue-600"></i>Tahun
                                </label>
                                <input type="number" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('tahun') border-red-300 @enderror" 
                                       id="tahun" 
                                       name="tahun" 
                                       value="{{ old('tahun', $idm->tahun) }}" 
                                       min="2020" 
                                       max="{{ date('Y') + 5 }}" 
                                       required>
                                @error('tahun')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="skor_idm" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-chart-bar mr-1 text-blue-600"></i>Skor IDM Total
                                </label>
                                <input type="number" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('skor_idm') border-red-300 @enderror" 
                                       id="skor_idm" 
                                       name="skor_idm" 
                                       value="{{ old('skor_idm', $idm->skor_idm) }}" 
                                       step="0.001" 
                                       min="0" 
                                       max="1000" 
                                       required>
                                @error('skor_idm')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                <p class="mt-1 text-xs text-gray-500">Masukkan skor dengan 3 digit desimal (contoh: 65.500)</p>
                            </div>

                            <div>
                                <label for="status_idm" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-flag mr-1 text-blue-600"></i>Status IDM
                                </label>
                                <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('status_idm') border-red-300 @enderror" 
                                        id="status_idm" 
                                        name="status_idm" 
                                        required>
                                    <option value="">Pilih Status</option>
                                    <option value="Sangat Tertinggal" {{ old('status_idm', $idm->status_idm) == 'Sangat Tertinggal' ? 'selected' : '' }}>Sangat Tertinggal</option>
                                    <option value="Tertinggal" {{ old('status_idm', $idm->status_idm) == 'Tertinggal' ? 'selected' : '' }}>Tertinggal</option>
                                    <option value="Berkembang" {{ old('status_idm', $idm->status_idm) == 'Berkembang' ? 'selected' : '' }}>Berkembang</option>
                                    <option value="Maju" {{ old('status_idm', $idm->status_idm) == 'Maju' ? 'selected' : '' }}>Maju</option>
                                    <option value="Mandiri" {{ old('status_idm', $idm->status_idm) == 'Mandiri' ? 'selected' : '' }}>Mandiri</option>
                                </select>
                                @error('status_idm')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="target_tahun_depan" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-bullseye mr-1 text-blue-600"></i>Target Tahun Depan
                                </label>
                                <input type="number" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('target_tahun_depan') border-red-300 @enderror" 
                                       id="target_tahun_depan" 
                                       name="target_tahun_depan" 
                                       value="{{ old('target_tahun_depan', $idm->target_tahun_depan) }}" 
                                       step="0.001" 
                                       min="0" 
                                       max="1000">
                                @error('target_tahun_depan')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                <p class="mt-1 text-xs text-gray-500">Opsional - Target skor untuk tahun berikutnya</p>
                            </div>
                        </div>
                    </div>

                    <!-- Component Scores -->
                    <div class="bg-gradient-to-br from-emerald-50 to-teal-50 rounded-xl p-4 md:p-6 border border-emerald-200">
                        <div class="mb-4">
                            <h4 class="text-lg font-semibold text-emerald-800 flex items-center">
                                <i class="fas fa-puzzle-piece mr-2"></i>
                                Komponen Indeks
                            </h4>
                        </div>
                        
                        <div class="space-y-4">
                            <div>
                                <label for="skor_iks" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-users mr-1 text-red-600"></i>Skor IKS (Indeks Ketahanan Sosial)
                                </label>
                                <input type="number" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 @error('skor_iks') border-red-300 @enderror" 
                                       id="skor_iks" 
                                       name="skor_iks" 
                                       value="{{ old('skor_iks', $idm->skor_iks) }}" 
                                       step="0.001" 
                                       min="0" 
                                       max="1000" 
                                       required>
                                @error('skor_iks')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="skor_ike" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-chart-line mr-1 text-emerald-600"></i>Skor IKE (Indeks Ketahanan Ekonomi)
                                </label>
                                <input type="number" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 @error('skor_ike') border-red-300 @enderror" 
                                       id="skor_ike" 
                                       name="skor_ike" 
                                       value="{{ old('skor_ike', $idm->skor_ike) }}" 
                                       step="0.001" 
                                       min="0" 
                                       max="1000" 
                                       required>
                                @error('skor_ike')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="skor_ikl" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-leaf mr-1 text-teal-600"></i>Skor IKL (Indeks Ketahanan Lingkungan)
                                </label>
                                <input type="number" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 @error('skor_ikl') border-red-300 @enderror" 
                                       id="skor_ikl" 
                                       name="skor_ikl" 
                                       value="{{ old('skor_ikl', $idm->skor_ikl) }}" 
                                       step="0.001" 
                                       min="0" 
                                       max="1000" 
                                       required>
                                @error('skor_ikl')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                </div>

                <!-- Optional Dimensions -->
                <div class="bg-gradient-to-br from-purple-50 to-indigo-50 rounded-xl p-4 md:p-6 border border-purple-200 mb-6">
                    <div class="mb-4">
                        <h4 class="text-lg font-semibold text-purple-800 flex items-center">
                            <i class="fas fa-layer-group mr-2"></i>
                            Dimensi Detail (Opsional)
                        </h4>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label for="dimensi_sosial" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-users mr-1 text-red-600"></i>Dimensi Sosial
                            </label>
                            <input type="number" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 @error('dimensi_sosial') border-red-500 @enderror" 
                                   id="dimensi_sosial" 
                                   name="dimensi_sosial" 
                                   value="{{ old('dimensi_sosial', $idm->dimensi_sosial) }}" 
                                   step="0.001" 
                                   min="0" 
                                   max="1000">
                            @error('dimensi_sosial')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="dimensi_ekonomi" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-chart-line mr-1 text-emerald-600"></i>Dimensi Ekonomi
                            </label>
                            <input type="number" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 @error('dimensi_ekonomi') border-red-500 @enderror" 
                                   id="dimensi_ekonomi" 
                                   name="dimensi_ekonomi" 
                                   value="{{ old('dimensi_ekonomi', $idm->dimensi_ekonomi) }}" 
                                   step="0.001" 
                                   min="0" 
                                   max="1000">
                            @error('dimensi_ekonomi')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="dimensi_lingkungan" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-leaf mr-1 text-teal-600"></i>Dimensi Lingkungan
                            </label>
                            <input type="number" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 @error('dimensi_lingkungan') border-red-500 @enderror" 
                                   id="dimensi_lingkungan" 
                                   name="dimensi_lingkungan" 
                                   value="{{ old('dimensi_lingkungan', $idm->dimensi_lingkungan) }}" 
                                   step="0.001" 
                                   min="0" 
                                   max="1000">
                            @error('dimensi_lingkungan')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="bg-gradient-to-br from-amber-50 to-orange-50 rounded-xl p-4 md:p-6 border border-amber-200 mb-6">
                    <div class="mb-4">
                        <h4 class="text-lg font-semibold text-amber-800 flex items-center">
                            <i class="fas fa-file-alt mr-2"></i>
                            Deskripsi & Publikasi
                        </h4>
                    </div>
                    
                    <div class="space-y-4">
                        <div>
                            <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-file-alt mr-1 text-amber-600"></i>Deskripsi
                            </label>
                            <textarea class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 @error('deskripsi') border-red-500 @enderror" 
                                      id="deskripsi" 
                                      name="deskripsi" 
                                      rows="4" 
                                      maxlength="2000">{{ old('deskripsi', $idm->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-xs text-gray-500">Maksimal 2000 karakter. Deskripsi akan ditampilkan di halaman publik.</p>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" 
                                   class="w-4 h-4 text-amber-600 bg-gray-100 border-gray-300 rounded focus:ring-amber-500 focus:ring-2" 
                                   id="is_published" 
                                   name="is_published" 
                                   value="1" 
                                   {{ old('is_published', $idm->is_published) ? 'checked' : '' }}>
                            <label class="ml-2 text-sm font-medium text-gray-700" for="is_published">
                                <i class="fas fa-globe mr-1 text-amber-600"></i>Publikasikan Data
                            </label>
                        </div>
                        <p class="text-xs text-gray-500 ml-6">
                            Jika dicentang, data akan ditampilkan di halaman publik
                        </p>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 pt-6 border-t border-gray-200">
                    <a href="{{ route('admin.idm.show', $idm) }}" 
                       class="inline-flex items-center px-4 py-2 bg-gray-500 text-white font-medium rounded-lg hover:bg-gray-600 transition-colors duration-200">
                        <i class="fas fa-arrow-left mr-2"></i> Kembali
                    </a>
                    <button type="submit" 
                            class="inline-flex items-center px-6 py-2 bg-gradient-to-r from-village-primary to-village-secondary text-white font-medium rounded-lg hover:from-village-secondary hover:to-village-primary transition-all duration-200 shadow-lg hover:shadow-xl">
                        <i class="fas fa-save mr-2"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto calculate IDM score based on component scores
    function calculateIDM() {
        const iks = parseFloat(document.getElementById('skor_iks').value) || 0;
        const ike = parseFloat(document.getElementById('skor_ike').value) || 0;
        const ikl = parseFloat(document.getElementById('skor_ikl').value) || 0;
        
        // Simple average calculation (adjust formula as needed)
        const idm = (iks + ike + ikl) / 3;
        
        if (idm > 0) {
            document.getElementById('skor_idm').value = idm.toFixed(3);
            updateStatusBasedOnScore(idm);
        }
    }
    
    function updateStatusBasedOnScore(score) {
        let status = '';
        if (score >= 80) {
            status = 'Mandiri';
        } else if (score >= 70) {
            status = 'Maju';
        } else if (score >= 60) {
            status = 'Berkembang';
        } else if (score >= 50) {
            status = 'Tertinggal';
        } else {
            status = 'Sangat Tertinggal';
        }
        
        document.getElementById('status_idm').value = status;
    }
    
    // Attach calculation to component score inputs
    ['skor_iks', 'skor_ike', 'skor_ikl'].forEach(id => {
        document.getElementById(id).addEventListener('input', calculateIDM);
    });
    
    // Form validation
    document.querySelector('form').addEventListener('submit', function(e) {
        const tahun = parseInt(document.getElementById('tahun').value);
        const currentYear = new Date().getFullYear();
        
        if (tahun < 2020 || tahun > currentYear + 5) {
            e.preventDefault();
            alert('Tahun harus antara 2020 dan ' + (currentYear + 5));
            return false;
        }
        
        const skor_idm = parseFloat(document.getElementById('skor_idm').value);
        if (skor_idm <= 0 || skor_idm > 1000) {
            e.preventDefault();
            alert('Skor IDM harus antara 0.001 dan 1000');
            return false;
        }
    });
});
</script>
@endpush
