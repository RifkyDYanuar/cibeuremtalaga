@extends('layouts.admin')

@section('page-title', 'Edit Foto Galeri')

@section('content')
<div class="p-4 md:p-6 bg-gray-50 min-h-screen">
    <!-- Header Section -->
    <div class="mb-6 md:mb-8">
        <div class="flex flex-col gap-4">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-900 flex items-center gap-2 md:gap-3">
                    <div class="w-8 h-8 md:w-10 md:h-10 bg-gradient-to-r from-emerald-500 to-teal-600 rounded-lg md:rounded-xl flex items-center justify-center">
                        <i class="fas fa-edit text-white text-sm md:text-base"></i>
                    </div>
                    <span class="hidden sm:inline">Edit Foto Galeri</span>
                    <span class="sm:hidden">Edit Foto</span>
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
                    <span class="text-gray-800 font-medium">Edit</span>
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
                <i class="fas fa-edit"></i>
                Form Edit Foto: {{ $galeri->judul }}
            </h3>
        </div>
        
        <form action="{{ route('admin.galeri.update', $galeri) }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            @method('PUT')
            
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
                               value="{{ old('judul', $galeri->judul) }}"
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
                                <option value="{{ $key }}" {{ old('kategori', $galeri->kategori) == $key ? 'selected' : '' }}>
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
                               value="{{ old('tanggal_foto', $galeri->tanggal_foto ? $galeri->tanggal_foto->format('Y-m-d') : '') }}"
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
                               value="{{ old('lokasi', $galeri->lokasi) }}"
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
                               value="{{ old('fotografer', $galeri->fotografer) }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-200"
                               placeholder="Nama fotografer">
                        @error('fotografer')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <!-- Right Column -->
                <div class="space-y-6">
                    <!-- Current Image -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Gambar Saat Ini
                        </label>
                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-4">
                            @if($galeri->gambar)
                                <img src="{{ asset('storage/galeri/' . $galeri->gambar) }}" 
                                     alt="{{ $galeri->judul }}" 
                                     class="w-full h-64 object-cover rounded-lg">
                            @else
                                <div class="text-center py-8">
                                    <i class="fas fa-image text-gray-400 text-3xl mb-2"></i>
                                    <p class="text-gray-500">Tidak ada gambar</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Upload New Image -->
                    <div>
                        <label for="gambar" class="block text-sm font-medium text-gray-700 mb-2">
                            Ganti Gambar (Opsional)
                        </label>
                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 hover:border-emerald-400 transition-colors duration-200">
                            <input type="file" 
                                   name="gambar" 
                                   id="gambar" 
                                   accept="image/*"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                                   onchange="previewNewImage(this)">
                            <p class="text-xs text-gray-500 mt-2">
                                Format: JPG, PNG, GIF. Maksimal 5MB.
                            </p>
                        </div>
                        <!-- Preview New Image -->
                        <div id="newImagePreview" class="mt-4 hidden">
                            <img id="newImageDisplay" class="w-full h-48 object-cover rounded-lg">
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
                                  placeholder="Deskripsi foto (opsional)">{{ old('deskripsi', $galeri->deskripsi) }}</textarea>
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
                                    <input type="radio" name="status" value="1" {{ old('status', $galeri->status) == '1' ? 'checked' : '' }}
                                           class="text-emerald-600 focus:ring-emerald-500">
                                    <span class="ml-2 text-sm text-gray-700">Aktif</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="status" value="0" {{ old('status', $galeri->status) == '0' ? 'checked' : '' }}
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
                                <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $galeri->is_featured) ? 'checked' : '' }}
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
                               value="{{ old('urutan', $galeri->urutan ?? 0) }}"
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
                    Update Foto
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

                            <!-- Lokasi -->
                            <div>
                                <label for="lokasi" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Lokasi
                                </label>
                                <input type="text" 
                                       name="lokasi" 
                                       id="lokasi" 
                                       value="{{ old('lokasi', $galeri->lokasi) }}"
                                       class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                       placeholder="Contoh: Balai Desa, Lapangan, dll">
                                @error('lokasi')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Fotografer -->
                            <div>
                                <label for="fotografer" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Fotografer
                                </label>
                                <input type="text" 
                                       name="fotografer" 
                                       id="fotografer" 
                                       value="{{ old('fotografer', $galeri->fotografer) }}"
                                       class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                       placeholder="Nama fotografer">
                                @error('fotografer')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="space-y-6">
                            <!-- Current Image -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Foto Saat Ini
                                </label>
                                <div class="relative">
                                    <img src="{{ asset('storage/galeri/' . $galeri->gambar) }}" 
                                         alt="{{ $galeri->judul }}"
                                         class="w-full h-48 object-cover rounded-lg shadow-sm">
                                    <div class="absolute top-2 right-2">
                                        @if($galeri->is_featured)
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                                <i class="fas fa-star mr-1"></i>Unggulan
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Upload Gambar Baru -->
                            <div>
                                <label for="gambar" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Ganti Foto (Opsional)
                                </label>
                                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md hover:border-gray-400 transition-colors">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex text-sm text-gray-600">
                                            <label for="gambar" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                                <span>Upload foto baru</span>
                                                <input id="gambar" name="gambar" type="file" class="sr-only" accept="image/*" onchange="previewImage(this)">
                                            </label>
                                            <p class="pl-1">atau drag and drop</p>
                                        </div>
                                        <p class="text-xs text-gray-500">PNG, JPG, GIF hingga 5MB</p>
                                    </div>
                                </div>
                                @error('gambar')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                
                                <!-- Image Preview -->
                                <div id="image-preview" class="mt-4 hidden">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Preview Foto Baru
                                    </label>
                                    <img id="preview-img" src="" alt="Preview" class="w-full h-48 object-cover rounded-lg shadow-sm">
                                </div>
                            </div>

                            <!-- Settings -->
                            <div class="space-y-4">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-white">Pengaturan</h3>
                                
                                <!-- Urutan -->
                                <div>
                                    <label for="urutan" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        Urutan Tampil
                                    </label>
                                    <input type="number" 
                                           name="urutan" 
                                           id="urutan" 
                                           value="{{ old('urutan', $galeri->urutan) }}"
                                           min="0"
                                           class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                           placeholder="0">
                                    <p class="mt-1 text-xs text-gray-500">Semakin kecil nomor, semakin depan urutan tampil</p>
                                    @error('urutan')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Foto Unggulan -->
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="is_featured" 
                                               name="is_featured" 
                                               type="checkbox" 
                                               value="1"
                                               {{ old('is_featured', $galeri->is_featured) ? 'checked' : '' }}
                                               class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="is_featured" class="font-medium text-gray-700 dark:text-gray-300">
                                            Foto Unggulan
                                        </label>
                                        <p class="text-gray-500">Foto ini akan ditampilkan di bagian unggulan</p>
                                    </div>
                                </div>

                                <!-- Status -->
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="status" 
                                               name="status" 
                                               type="checkbox" 
                                               value="1"
                                               {{ old('status', $galeri->status) ? 'checked' : '' }}
                                               class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="status" class="font-medium text-gray-700 dark:text-gray-300">
                                            Aktif
                                        </label>
                                        <p class="text-gray-500">Foto akan ditampilkan di galeri publik</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Deskripsi -->
                    <div class="mt-6">
                        <label for="deskripsi" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Deskripsi
                        </label>
                        <textarea name="deskripsi" 
                                  id="deskripsi" 
                                  rows="4"
                                  class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                  placeholder="Deskripsi atau keterangan foto...">{{ old('deskripsi', $galeri->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Buttons -->
                    <div class="mt-6 flex items-center justify-end space-x-3">
                        <a href="{{ route('admin.galeri.index') }}" 
                           class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Batal
                        </a>
                        <button type="submit" 
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <i class="fas fa-save mr-2"></i>
                            Update Foto
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function previewImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview-img').src = e.target.result;
            document.getElementById('image-preview').classList.remove('hidden');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
<script>
function previewNewImage(input) {
    const preview = document.getElementById('newImagePreview');
    const display = document.getElementById('newImageDisplay');
    
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
