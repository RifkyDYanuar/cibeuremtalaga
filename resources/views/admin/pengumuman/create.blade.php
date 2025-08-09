@extends('layouts.admin')

@section('page-title', 'Tambah Pengumuman')

@section('content')
<div class="p-6">
    <!-- Header Section -->
    <div class="mb-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 flex items-center gap-2">
                    <div class="w-8 h-8 bg-gradient-to-r from-emerald-500 to-teal-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-plus text-white text-sm"></i>
                    </div>
                    Tambah Pengumuman
                </h1>
                <p class="text-sm text-gray-600 mt-1">Buat pengumuman baru untuk warga desa</p>
            </div>
            <a href="{{ route('admin.pengumuman.index') }}" 
               class="inline-flex items-center px-4 py-2 bg-gray-500 text-white font-medium rounded-lg hover:bg-gray-600 transition-all duration-200 text-sm">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
        </div>
    </div>
    <!-- Main Form -->
    <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-lg border border-white/20 overflow-hidden">
        <div class="px-4 py-3 bg-gradient-to-r from-emerald-600 to-teal-600">
            <h3 class="text-lg font-semibold text-white flex items-center gap-2">
                <i class="fas fa-plus"></i>
                Form Tambah Pengumuman
            </h3>
        </div>
        <div class="p-6">
            @if($errors->any())
                <div class="mb-4 p-3 bg-red-50 border border-red-200 rounded-lg">
                    <div class="flex items-center gap-2 mb-2">
                        <i class="fas fa-exclamation-circle text-red-600"></i>
                        <span class="font-medium text-red-800 text-sm">Terdapat kesalahan:</span>
                    </div>
                    <ul class="text-sm text-red-700 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.pengumuman.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label for="judul" class="block text-sm font-medium text-gray-700 mb-2">
                            Judul Pengumuman <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="judul" name="judul" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200 @error('judul') border-red-500 @enderror" 
                               value="{{ old('judul') }}" required>
                        @error('judul')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="kategori" class="block text-sm font-medium text-gray-700 mb-2">
                            Kategori <span class="text-red-500">*</span>
                        </label>
                        <select id="kategori" name="kategori" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200 @error('kategori') border-red-500 @enderror" required>
                            <option value="">Pilih Kategori</option>
                            <option value="umum" {{ old('kategori') == 'umum' ? 'selected' : '' }}>Umum</option>
                            <option value="penting" {{ old('kategori') == 'penting' ? 'selected' : '' }}>Penting</option>
                            <option value="kegiatan" {{ old('kategori') == 'kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                            <option value="pembangunan" {{ old('kategori') == 'pembangunan' ? 'selected' : '' }}>Pembangunan</option>
                            <option value="kesehatan" {{ old('kategori') == 'kesehatan' ? 'selected' : '' }}>Kesehatan</option>
                            <option value="pendidikan" {{ old('kategori') == 'pendidikan' ? 'selected' : '' }}>Pendidikan</option>
                        </select>
                        @error('kategori')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="prioritas" class="block text-sm font-medium text-gray-700 mb-2">
                            Prioritas <span class="text-red-500">*</span>
                        </label>
                        <select id="prioritas" name="prioritas" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200 @error('prioritas') border-red-500 @enderror" required>
                            <option value="">Pilih Prioritas</option>
                            <option value="tinggi" {{ old('prioritas') == 'tinggi' ? 'selected' : '' }}>Tinggi</option>
                            <option value="sedang" {{ old('prioritas') == 'sedang' ? 'selected' : '' }}>Sedang</option>
                            <option value="rendah" {{ old('prioritas') == 'rendah' ? 'selected' : '' }}>Rendah</option>
                        </select>
                        @error('prioritas')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="tanggal_mulai" class="block text-sm font-medium text-gray-700 mb-2">
                            Tanggal Mulai <span class="text-red-500">*</span>
                        </label>
                        <input type="date" id="tanggal_mulai" name="tanggal_mulai" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200 @error('tanggal_mulai') border-red-500 @enderror" 
                               value="{{ old('tanggal_mulai') }}" required>
                        @error('tanggal_mulai')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="tanggal_selesai" class="block text-sm font-medium text-gray-700 mb-2">
                            Tanggal Selesai
                        </label>
                        <input type="date" id="tanggal_selesai" name="tanggal_selesai" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200 @error('tanggal_selesai') border-red-500 @enderror" 
                               value="{{ old('tanggal_selesai') }}">
                        @error('tanggal_selesai')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-6">
                    <label for="konten" class="block text-sm font-medium text-gray-700 mb-2">
                        Konten Pengumuman <span class="text-red-500">*</span>
                    </label>
                    <textarea id="konten" name="konten" rows="6" 
                              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200 @error('konten') border-red-500 @enderror" 
                              required>{{ old('konten') }}</textarea>
                    @error('konten')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                    <div>
                        <label for="gambar" class="block text-sm font-medium text-gray-700 mb-2">Gambar</label>
                        <input type="file" id="gambar" name="gambar" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200 @error('gambar') border-red-500 @enderror" 
                               accept="image/*">
                        <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG, GIF. Maksimal 2MB</p>
                        @error('gambar')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Pengaturan</label>
                        <div class="space-y-3">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" name="is_active" value="1" 
                                       class="w-4 h-4 text-emerald-600 focus:ring-emerald-500 border-gray-300 rounded" 
                                       {{ old('is_active', 1) ? 'checked' : '' }}>
                                <span class="text-sm text-gray-700">Aktif</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" name="is_featured" value="1" 
                                       class="w-4 h-4 text-emerald-600 focus:ring-emerald-500 border-gray-300 rounded" 
                                       {{ old('is_featured') ? 'checked' : '' }}>
                                <span class="text-sm text-gray-700">Featured</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="flex gap-3 justify-end mt-8 pt-6 border-t border-gray-200">
                    <a href="{{ route('admin.pengumuman.index') }}" 
                       class="inline-flex items-center px-4 py-2 bg-gray-500 text-white font-medium rounded-lg hover:bg-gray-600 transition-all duration-200 text-sm">
                        <i class="fas fa-times mr-2"></i>
                        Batal
                    </a>
                    <button type="submit" 
                            class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-medium rounded-lg hover:from-emerald-700 hover:to-teal-700 transition-all duration-200 text-sm">
                        <i class="fas fa-save mr-2"></i>
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
