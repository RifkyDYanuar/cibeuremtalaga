@extends('layouts.admin')

@section('page-title', 'Tambah Foto Galeri')

@section('content')
<div class="p-4 md:p-6 bg-gray-50 min-h-screen">
    <!-- Header Section -->
    <div class="mb-6 md:mb-8">
        <div class="flex flex-col gap-4">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-900 flex items-center gap-2 md:gap-3">
                    <div class="w-8 h-8 md:w-10 md:h-10 bg-gradient-to-r from-emerald-500 to-teal-600 rounded-lg md:rounded-xl flex items-center justify-center">
                        <i class="fas fa-plus text-white text-sm md:text-base"></i>
                    </div>
                    <span class="hidden sm:inline">Tambah Foto Galeri</span>
                    <span class="sm:hidden">Tambah Foto</span>
                </h1>
                <nav class="flex items-center space-x-2 text-sm text-gray-600 mt-2">
                    <a href="{{ route('admin.dashboard') }}" class="hover:text-emerald-600 transition-colors duration-200">
                        <i class="fas fa-home"></i>
                        Dashboard
                    </a>
                    <i class="fas fa-chevron-right text-gray-400"></i>
                    <a href="{{ route('admin.galeri.index') }}" class="hover:text-emerald-600 transition-colors duration-200">
                        Galeri
                    </a>
                    <i class="fas fa-chevron-right text-gray-400"></i>
                    <span class="text-gray-800 font-medium">Tambah</span>
                </nav>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.galeri.index') }}" 
                   class="inline-flex items-center px-3 md:px-4 py-2 bg-gray-500 text-white font-medium rounded-lg hover:bg-gray-600 transition-all duration-200 shadow-lg hover:shadow-xl text-sm md:text-base">
                    <i class="fas fa-arrow-left mr-2"></i>
                    <span class="hidden sm:inline">Kembali</span>
                    <span class="sm:hidden">Kembali</span>
                </a>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-4 md:mb-6 p-3 md:p-4 bg-green-50 border border-green-200 rounded-lg flex items-center gap-3">
            <div class="w-6 h-6 md:w-8 md:h-8 bg-green-500 rounded-full flex items-center justify-center">
                <i class="fas fa-check text-white text-xs md:text-sm"></i>
            </div>
            <span class="text-green-800 font-medium text-sm md:text-base">{{ session('success') }}</span>
        </div>
    @endif

    @if(session('error'))
        <div class="mb-4 md:mb-6 p-3 md:p-4 bg-red-50 border border-red-200 rounded-lg flex items-center gap-3">
            <div class="w-6 h-6 md:w-8 md:h-8 bg-red-500 rounded-full flex items-center justify-center">
                <i class="fas fa-exclamation-triangle text-white text-xs md:text-sm"></i>
            </div>
            <span class="text-red-800 font-medium text-sm md:text-base">{{ session('error') }}</span>
        </div>
    @endif

    <!-- Form -->
    <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-white/20 overflow-hidden">
        <div class="px-6 py-4 bg-gradient-to-r from-emerald-600 to-teal-600">
            <h3 class="text-lg font-semibold text-white flex items-center gap-2">
                <i class="fas fa-plus"></i>
                Form Tambah Foto Galeri
            </h3>
        </div>
        
        <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Left Column -->
                <div class="space-y-6">
                    <!-- Judul -->
                    <div>
                        <label for="judul" class="block text-sm font-medium text-gray-700 mb-2">
                            Judul Foto <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               name="judul" 
                               id="judul" 
                               value="{{ old('judul') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-200"
                               placeholder="Masukkan judul foto"
                               required>
                        @error('judul')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Kategori -->
                    <div>
                        <label for="kategori" class="block text-sm font-medium text-gray-700 mb-2">
                            Kategori <span class="text-red-500">*</span>
                        </label>
                        <select name="kategori" 
                                id="kategori" 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-200"
                                required>
                            <option value="">Pilih Kategori</option>
                            @foreach($kategoriOptions as $key => $label)
                                <option value="{{ $key }}" {{ old('kategori') == $key ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                        @error('kategori')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tanggal Foto -->
                    <div>
                        <label for="tanggal_foto" class="block text-sm font-medium text-gray-700 mb-2">
                            Tanggal Foto
                        </label>
                        <input type="date" 
                               name="tanggal_foto" 
                               id="tanggal_foto" 
                               value="{{ old('tanggal_foto') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-200">
                        @error('tanggal_foto')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Lokasi -->
                    <div>
                        <label for="lokasi" class="block text-sm font-medium text-gray-700 mb-2">
                            Lokasi
                        </label>
                        <input type="text" 
                               name="lokasi" 
                               id="lokasi" 
                               value="{{ old('lokasi') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-200"
                               placeholder="Masukkan lokasi foto">
                        @error('lokasi')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Fotografer -->
                    <div>
                        <label for="fotografer" class="block text-sm font-medium text-gray-700 mb-2">
                            Fotografer
                        </label>
                        <input type="text" 
                               name="fotografer" 
                               id="fotografer" 
                               value="{{ old('fotografer') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-200"
                               placeholder="Nama fotografer">
                        @error('fotografer')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <!-- Right Column -->
                <div class="space-y-6">
                    <!-- Upload Image -->
                    <div>
                        <label for="gambar" class="block text-sm font-medium text-gray-700 mb-2">
                            Upload Gambar <span class="text-red-500">*</span>
                        </label>
                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 hover:border-emerald-400 transition-colors duration-200">
                            <input type="file" 
                                   name="gambar" 
                                   id="gambar" 
                                   accept="image/*"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                                   onchange="previewImage(this)"
                                   required>
                            <p class="text-xs text-gray-500 mt-2">
                                Format: JPG, PNG, GIF. Maksimal 5MB.
                            </p>
                        </div>
                        <!-- Preview Image -->
                        <div id="imagePreview" class="mt-4 hidden">
                            <img id="imageDisplay" class="w-full h-64 object-cover rounded-lg">
                        </div>
                        @error('gambar')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div>
                        <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">
                            Deskripsi
                        </label>
                        <textarea name="deskripsi" 
                                  id="deskripsi" 
                                  rows="4"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-200"
                                  placeholder="Deskripsi foto (opsional)">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Settings -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Status -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Status
                            </label>
                            <div class="flex items-center space-x-4">
                                <label class="flex items-center">
                                    <input type="radio" name="status" value="1" {{ old('status', '1') == '1' ? 'checked' : '' }}
                                           class="text-emerald-600 focus:ring-emerald-500">
                                    <span class="ml-2 text-sm text-gray-700">Aktif</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="status" value="0" {{ old('status') == '0' ? 'checked' : '' }}
                                           class="text-red-600 focus:ring-red-500">
                                    <span class="ml-2 text-sm text-gray-700">Tidak Aktif</span>
                                </label>
                            </div>
                        </div>

                        <!-- Is Featured -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Foto Unggulan
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}
                                       class="rounded text-emerald-600 focus:ring-emerald-500">
                                <span class="ml-2 text-sm text-gray-700">Jadikan foto unggulan</span>
                            </label>
                        </div>
                    </div>

                    <!-- Urutan -->
                    <div>
                        <label for="urutan" class="block text-sm font-medium text-gray-700 mb-2">
                            Urutan Tampil
                        </label>
                        <input type="number" 
                               name="urutan" 
                               id="urutan" 
                               min="0"
                               value="{{ old('urutan', 0) }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-200"
                               placeholder="0">
                        <p class="text-xs text-gray-500 mt-1">Semakin kecil angka, semakin awal ditampilkan</p>
                        @error('urutan')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Submit Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 pt-8 mt-8 border-t border-gray-200">
                <button type="submit" 
                        class="flex-1 sm:flex-none px-6 py-3 bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-medium rounded-lg hover:from-emerald-700 hover:to-teal-700 transition-all duration-200 shadow-lg hover:shadow-xl">
                    <i class="fas fa-save mr-2"></i>
                    Simpan Foto
                </button>
                <a href="{{ route('admin.galeri.index') }}" 
                   class="flex-1 sm:flex-none px-6 py-3 bg-gray-500 text-white font-medium rounded-lg hover:bg-gray-600 transition-all duration-200 text-center">
                    <i class="fas fa-times mr-2"></i>
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

<script>
function previewImage(input) {
    const preview = document.getElementById('imagePreview');
    const display = document.getElementById('imageDisplay');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            display.src = e.target.result;
            preview.classList.remove('hidden');
        }
        
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.classList.add('hidden');
    }
}
</script>
@endsection
