@extends('layouts.admin')

@section('title', isset($pembangunan) ? 'Edit Pembangunan' : 'Tambah Pembangunan')

@section('content')
<div class="container mx-auto px-4 py-6">
    <!-- Header -->
    <div class="bg-gradient-to-r from-village-primary to-village-secondary rounded-2xl shadow-xl p-6 mb-8">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center">
            <div class="text-white mb-4 sm:mb-0">
                <h1 class="text-2xl lg:text-3xl font-bold mb-2">
                    <i class="fas fa-{{ isset($pembangunan) ? 'edit' : 'plus' }} mr-3"></i>
                    {{ isset($pembangunan) ? 'Edit Pembangunan' : 'Tambah Pembangunan' }}
                </h1>
                <p class="text-white/90 text-sm lg:text-base">
                    {{ isset($pembangunan) ? 'Perbarui data pembangunan desa' : 'Tambahkan proyek pembangunan desa baru' }}
                </p>
            </div>
            <a href="{{ route('admin.pembangunan.index') }}" 
               class="bg-white text-village-primary px-6 py-3 rounded-xl font-semibold hover:bg-gray-50 transition-all duration-300 shadow-lg hover:shadow-xl flex items-center">
                <i class="fas fa-arrow-left mr-2"></i>Kembali
            </a>
        </div>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
        <form action="{{ isset($pembangunan) ? route('admin.pembangunan.update', $pembangunan->id) : route('admin.pembangunan.store') }}" 
              method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf
            @if(isset($pembangunan))
                @method('PUT')
            @endif

            <!-- Basic Information -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Nama Proyek -->
                <div class="lg:col-span-2">
                    <label for="nama_proyek" class="block text-sm font-medium text-gray-700 mb-2">
                        Nama Proyek <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="nama_proyek" name="nama_proyek" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent @error('nama_proyek') border-red-300 @enderror" 
                           value="{{ old('nama_proyek', $pembangunan->nama_proyek ?? '') }}" 
                           placeholder="Contoh: Pembangunan Jalan Desa" required>
                    @error('nama_proyek')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Kategori -->
                <div>
                    <label for="kategori" class="block text-sm font-medium text-gray-700 mb-2">
                        Kategori <span class="text-red-500">*</span>
                    </label>
                    <select id="kategori" name="kategori" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent @error('kategori') border-red-300 @enderror" required>
                        <option value="">Pilih Kategori</option>
                        @foreach(\App\Models\Pembangunan::getKategoriOptions() as $key => $label)
                            <option value="{{ $key }}" {{ old('kategori', $pembangunan->kategori ?? '') == $key ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                    @error('kategori')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                        Status <span class="text-red-500">*</span>
                    </label>
                    <select id="status" name="status" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent @error('status') border-red-300 @enderror" required>
                        <option value="">Pilih Status</option>
                        @foreach(\App\Models\Pembangunan::getStatusOptions() as $key => $label)
                            <option value="{{ $key }}" {{ old('status', $pembangunan->status ?? '') == $key ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                    @error('status')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Anggaran -->
                <div>
                    <label for="anggaran" class="block text-sm font-medium text-gray-700 mb-2">
                        Anggaran <span class="text-red-500">*</span>
                    </label>
                    <input type="number" id="anggaran" name="anggaran" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent @error('anggaran') border-red-300 @enderror" 
                           value="{{ old('anggaran', $pembangunan->anggaran ?? '') }}" 
                           placeholder="0" min="0" step="0.01" required>
                    @error('anggaran')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Realisasi -->
                <div>
                    <label for="realisasi" class="block text-sm font-medium text-gray-700 mb-2">
                        Realisasi
                    </label>
                    <input type="number" id="realisasi" name="realisasi" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent @error('realisasi') border-red-300 @enderror" 
                           value="{{ old('realisasi', $pembangunan->realisasi ?? '') }}" 
                           placeholder="0" min="0" step="0.01">
                    @error('realisasi')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Sumber Dana -->
                <div>
                    <label for="sumber_dana" class="block text-sm font-medium text-gray-700 mb-2">
                        Sumber Dana <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="sumber_dana" name="sumber_dana" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent @error('sumber_dana') border-red-300 @enderror" 
                           value="{{ old('sumber_dana', $pembangunan->sumber_dana ?? '') }}" 
                           placeholder="Contoh: APBN, APBD, Swadaya" required>
                    @error('sumber_dana')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Lokasi -->
                <div>
                    <label for="lokasi" class="block text-sm font-medium text-gray-700 mb-2">
                        Lokasi <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="lokasi" name="lokasi" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent @error('lokasi') border-red-300 @enderror" 
                           value="{{ old('lokasi', $pembangunan->lokasi ?? '') }}" 
                           placeholder="Contoh: Jalan Utama Desa" required>
                    @error('lokasi')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tanggal Mulai -->
                <div>
                    <label for="tanggal_mulai" class="block text-sm font-medium text-gray-700 mb-2">
                        Tanggal Mulai <span class="text-red-500">*</span>
                    </label>
                    <input type="date" id="tanggal_mulai" name="tanggal_mulai" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent @error('tanggal_mulai') border-red-300 @enderror" 
                           value="{{ old('tanggal_mulai', isset($pembangunan) ? $pembangunan->tanggal_mulai->format('Y-m-d') : '') }}" required>
                    @error('tanggal_mulai')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tanggal Target -->
                <div>
                    <label for="tanggal_target" class="block text-sm font-medium text-gray-700 mb-2">
                        Tanggal Target <span class="text-red-500">*</span>
                    </label>
                    <input type="date" id="tanggal_target" name="tanggal_target" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent @error('tanggal_target') border-red-300 @enderror" 
                           value="{{ old('tanggal_target', isset($pembangunan) ? $pembangunan->tanggal_target->format('Y-m-d') : '') }}" required>
                    @error('tanggal_target')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tanggal Selesai -->
                <div>
                    <label for="tanggal_selesai" class="block text-sm font-medium text-gray-700 mb-2">
                        Tanggal Selesai
                    </label>
                    <input type="date" id="tanggal_selesai" name="tanggal_selesai" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent @error('tanggal_selesai') border-red-300 @enderror" 
                           value="{{ old('tanggal_selesai', isset($pembangunan) && $pembangunan->tanggal_selesai ? $pembangunan->tanggal_selesai->format('Y-m-d') : '') }}">
                    @error('tanggal_selesai')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Progress -->
                <div>
                    <label for="progress" class="block text-sm font-medium text-gray-700 mb-2">
                        Progress (%) <span class="text-red-500">*</span>
                    </label>
                    <input type="number" id="progress" name="progress" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent @error('progress') border-red-300 @enderror" 
                           value="{{ old('progress', $pembangunan->progress ?? '0') }}" 
                           min="0" max="100" required>
                    @error('progress')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Penanggung Jawab -->
                <div>
                    <label for="penanggung_jawab" class="block text-sm font-medium text-gray-700 mb-2">
                        Penanggung Jawab <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="penanggung_jawab" name="penanggung_jawab" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent @error('penanggung_jawab') border-red-300 @enderror" 
                           value="{{ old('penanggung_jawab', $pembangunan->penanggung_jawab ?? '') }}" 
                           placeholder="Nama penanggung jawab proyek" required>
                    @error('penanggung_jawab')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Kontraktor -->
                <div>
                    <label for="kontraktor" class="block text-sm font-medium text-gray-700 mb-2">
                        Kontraktor
                    </label>
                    <input type="text" id="kontraktor" name="kontraktor" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent @error('kontraktor') border-red-300 @enderror" 
                           value="{{ old('kontraktor', $pembangunan->kontraktor ?? '') }}" 
                           placeholder="Nama kontraktor (opsional)">
                    @error('kontraktor')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Deskripsi -->
            <div>
                <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">
                    Deskripsi <span class="text-red-500">*</span>
                </label>
                <textarea id="deskripsi" name="deskripsi" rows="4" 
                          class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent @error('deskripsi') border-red-300 @enderror" 
                          placeholder="Deskripsi detail proyek pembangunan..." required>{{ old('deskripsi', $pembangunan->deskripsi ?? '') }}</textarea>
                @error('deskripsi')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Keterangan -->
            <div>
                <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-2">
                    Keterangan Tambahan
                </label>
                <textarea id="keterangan" name="keterangan" rows="3" 
                          class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent @error('keterangan') border-red-300 @enderror" 
                          placeholder="Keterangan tambahan (opsional)...">{{ old('keterangan', $pembangunan->keterangan ?? '') }}</textarea>
                @error('keterangan')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Gambar -->
            <div>
                <label for="gambar" class="block text-sm font-medium text-gray-700 mb-2">
                    Gambar Proyek
                </label>
                <input type="file" id="gambar" name="gambar[]" multiple accept="image/*"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent @error('gambar.*') border-red-300 @enderror">
                <p class="mt-1 text-sm text-gray-500">Upload multiple gambar (JPEG, PNG, JPG). Maksimal 5MB per file.</p>
                @error('gambar.*')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                
                @if(isset($pembangunan) && $pembangunan->gambar)
                    <div class="mt-3">
                        <p class="text-sm font-medium text-gray-700 mb-2">Gambar saat ini:</p>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            @foreach($pembangunan->gambar_urls as $url)
                                <img src="{{ $url }}" class="w-full h-24 object-cover rounded-lg border border-gray-200">
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            <!-- Published -->
            <div class="flex items-center">
                <input type="checkbox" id="is_published" name="is_published" value="1" 
                       class="h-4 w-4 text-village-primary focus:ring-village-primary border-gray-300 rounded"
                       {{ old('is_published', $pembangunan->is_published ?? true) ? 'checked' : '' }}>
                <label for="is_published" class="ml-2 block text-sm text-gray-700">
                    Publikasikan ke halaman public
                </label>
            </div>

            <!-- Submit Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200">
                <button type="submit" 
                        class="flex-1 bg-village-primary text-white px-6 py-3 rounded-xl font-semibold hover:bg-village-secondary transition-all duration-300 shadow-lg hover:shadow-xl">
                    <i class="fas fa-save mr-2"></i>
                    {{ isset($pembangunan) ? 'Perbarui' : 'Simpan' }}
                </button>
                <a href="{{ route('admin.pembangunan.index') }}" 
                   class="flex-1 bg-gray-500 text-white px-6 py-3 rounded-xl font-semibold hover:bg-gray-600 transition-all duration-300 text-center">
                    <i class="fas fa-times mr-2"></i>Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
