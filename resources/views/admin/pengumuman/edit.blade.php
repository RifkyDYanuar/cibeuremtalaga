@extends('layouts.admin')

@section('page-title', 'Edit Pengumuman')

@section('content')
<div class="p-6">
    <!-- Header Section -->
    <div class="mb-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 flex items-center gap-2">
                    <div class="w-8 h-8 bg-gradient-to-r from-yellow-500 to-orange-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-edit text-white text-sm"></i>
                    </div>
                    Edit Pengumuman
                </h1>
                <p class="text-sm text-gray-600 mt-1">Perbarui informasi pengumuman</p>
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
        <div class="px-4 py-3 bg-gradient-to-r from-yellow-500 to-orange-600">
            <h3 class="text-lg font-semibold text-white flex items-center gap-2">
                <i class="fas fa-edit"></i>
                Form Edit Pengumuman
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

            <form action="{{ route('admin.pengumuman.update', $pengumuman) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="judul" class="block text-sm font-medium text-gray-700 mb-2">
                            Judul Pengumuman <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="judul" name="judul" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all duration-200" 
                               value="{{ old('judul', $pengumuman->judul) }}" required>
                    </div>

                    <div>
                        <label for="kategori" class="block text-sm font-medium text-gray-700 mb-2">
                            Kategori <span class="text-red-500">*</span>
                        </label>
                        <select id="kategori" name="kategori" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all duration-200" required>
                            <option value="">Pilih Kategori</option>
                            <option value="umum" {{ old('kategori', $pengumuman->kategori) == 'umum' ? 'selected' : '' }}>Umum</option>
                            <option value="penting" {{ old('kategori', $pengumuman->kategori) == 'penting' ? 'selected' : '' }}>Penting</option>
                            <option value="kegiatan" {{ old('kategori', $pengumuman->kategori) == 'kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                            <option value="pelayanan" {{ old('kategori', $pengumuman->kategori) == 'pelayanan' ? 'selected' : '' }}>Pelayanan</option>
                            <option value="pembangunan" {{ old('kategori', $pengumuman->kategori) == 'pembangunan' ? 'selected' : '' }}>Pembangunan</option>
                        </select>
                    </div>

                    <div>
                        <label for="prioritas" class="block text-sm font-medium text-gray-700 mb-2">
                            Prioritas <span class="text-red-500">*</span>
                        </label>
                        <select id="prioritas" name="prioritas" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all duration-200" required>
                            <option value="">Pilih Prioritas</option>
                            <option value="rendah" {{ old('prioritas', $pengumuman->prioritas) == 'rendah' ? 'selected' : '' }}>Rendah</option>
                            <option value="sedang" {{ old('prioritas', $pengumuman->prioritas) == 'sedang' ? 'selected' : '' }}>Sedang</option>
                            <option value="tinggi" {{ old('prioritas', $pengumuman->prioritas) == 'tinggi' ? 'selected' : '' }}>Tinggi</option>
                        </select>
                    </div>

                    <div>
                        <label for="tanggal_mulai" class="block text-sm font-medium text-gray-700 mb-2">
                            Tanggal Mulai <span class="text-red-500">*</span>
                        </label>
                        <input type="date" id="tanggal_mulai" name="tanggal_mulai" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all duration-200" 
                               value="{{ old('tanggal_mulai', $pengumuman->tanggal_mulai?->format('Y-m-d')) }}" required>
                    </div>

                    <div>
                        <label for="tanggal_selesai" class="block text-sm font-medium text-gray-700 mb-2">
                            Tanggal Selesai
                        </label>
                        <input type="date" id="tanggal_selesai" name="tanggal_selesai" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all duration-200" 
                               value="{{ old('tanggal_selesai', $pengumuman->tanggal_selesai?->format('Y-m-d')) }}">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <div class="flex gap-4">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="is_active" value="1" 
                                       class="w-4 h-4 text-yellow-600 focus:ring-yellow-500 border-gray-300" 
                                       {{ old('is_active', $pengumuman->is_active) == '1' ? 'checked' : '' }}>
                                <span class="text-sm text-gray-700">Aktif</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="is_active" value="0" 
                                       class="w-4 h-4 text-yellow-600 focus:ring-yellow-500 border-gray-300" 
                                       {{ old('is_active', $pengumuman->is_active) == '0' ? 'checked' : '' }}>
                                <span class="text-sm text-gray-700">Tidak Aktif</span>
                            </label>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Diutamakan</label>
                        <div class="flex gap-4">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="is_featured" value="1" 
                                       class="w-4 h-4 text-yellow-600 focus:ring-yellow-500 border-gray-300" 
                                       {{ old('is_featured', $pengumuman->is_featured) == '1' ? 'checked' : '' }}>
                                <span class="text-sm text-gray-700">Ya</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="is_featured" value="0" 
                                       class="w-4 h-4 text-yellow-600 focus:ring-yellow-500 border-gray-300" 
                                       {{ old('is_featured', $pengumuman->is_featured) == '0' ? 'checked' : '' }}>
                                <span class="text-sm text-gray-700">Tidak</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <label for="konten" class="block text-sm font-medium text-gray-700 mb-2">
                        Konten Pengumuman <span class="text-red-500">*</span>
                    </label>
                    <textarea id="konten" name="konten" rows="6" 
                              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all duration-200" 
                              required>{{ old('konten', $pengumuman->konten) }}</textarea>
                </div>

                <div class="mt-6">
                    <label for="gambar" class="block text-sm font-medium text-gray-700 mb-2">Gambar</label>
                    @if($pengumuman->gambar)
                        <div class="mb-4 p-3 bg-gray-50 border border-gray-200 rounded-lg">
                            <p class="text-sm font-medium text-gray-700 mb-2">Gambar saat ini:</p>
                            <img src="{{ asset('storage/' . $pengumuman->gambar) }}" alt="Current Image" 
                                 class="max-w-xs h-auto border border-gray-300 rounded-lg">
                        </div>
                    @endif
                    <input type="file" id="gambar" name="gambar" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all duration-200" 
                           accept="image/*">
                    <p class="mt-1 text-xs text-gray-500">Upload gambar baru jika ingin mengganti. Format: JPG, PNG, GIF. Maksimal 2MB.</p>
                </div>

                <div class="flex gap-3 justify-end mt-8 pt-6 border-t border-gray-200">
                    <a href="{{ route('admin.pengumuman.index') }}" 
                       class="inline-flex items-center px-4 py-2 bg-gray-500 text-white font-medium rounded-lg hover:bg-gray-600 transition-all duration-200 text-sm">
                        <i class="fas fa-times mr-2"></i>
                        Batal
                    </a>
                    <button type="submit" 
                            class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-yellow-500 to-orange-600 text-white font-medium rounded-lg hover:from-yellow-600 hover:to-orange-700 transition-all duration-200 text-sm">
                        <i class="fas fa-save mr-2"></i>
                        Update Pengumuman
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
