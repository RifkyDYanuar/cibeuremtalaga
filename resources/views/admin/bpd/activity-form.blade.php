@extends('layouts.admin')

@section('title', isset($activity) ? 'Edit Kegiatan BPD' : 'Tambah Kegiatan BPD')

@section('breadcrumb')
    <span class="mx-2">/</span>
    <a href="{{ route('admin.bpd.index') }}" class="text-gray-500 hover:text-village-primary transition-colors">Manajemen BPD</a>
    <span class="mx-2">/</span>
    <a href="{{ route('admin.bpd.activities') }}" class="text-gray-500 hover:text-village-primary transition-colors">Kegiatan BPD</a>
    <span class="mx-2">/</span>
    <span class="text-village-primary">{{ isset($activity) ? 'Edit' : 'Tambah' }} Kegiatan</span>
@endsection

@section('content')

<!-- Page Header -->
<div class="mb-6 md:mb-8">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold bg-gradient-to-r from-village-primary to-village-secondary bg-clip-text text-transparent">
                {{ isset($activity) ? 'Edit' : 'Tambah' }} Kegiatan BPD
            </h1>
            <p class="text-gray-600 mt-1 md:mt-2 text-sm md:text-base">{{ isset($activity) ? 'Edit dokumentasi kegiatan yang sudah ada' : 'Tambahkan dokumentasi kegiatan baru' }}</p>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Main Form -->
    <div class="lg:col-span-2">
        <form action="{{ isset($activity) ? route('admin.bpd.activities.update', $activity->id) : route('admin.bpd.activities.store') }}" 
              method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @if(isset($activity))
                @method('PUT')
            @endif

            <!-- Basic Information -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-blue-50 to-blue-100">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center shadow-lg mr-3">
                            <i class="fas fa-info-circle text-white text-sm"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900">Informasi Kegiatan</h3>
                    </div>
                </div>
                <div class="p-6 space-y-4">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                            Judul Kegiatan <span class="text-red-500">*</span>
                        </label>
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent @error('title') border-red-300 @enderror" 
                               id="title" name="title" value="{{ old('title', $activity->title ?? '') }}" required
                               placeholder="Masukkan judul kegiatan">
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="activity_date" class="block text-sm font-medium text-gray-700 mb-2">
                                Tanggal Kegiatan <span class="text-red-500">*</span>
                            </label>
                            <input type="date" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent @error('activity_date') border-red-300 @enderror" 
                                   id="activity_date" name="activity_date" 
                                   value="{{ old('activity_date', isset($activity) ? $activity->activity_date->format('Y-m-d') : '') }}" required>
                            @error('activity_date')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                            <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent @error('category') border-red-300 @enderror" 
                                    id="category" name="category">
                                <option value="">Pilih Kategori</option>
                                @foreach(\App\Models\BpdActivity::getCategoryOptions() as $key => $label)
                                    <option value="{{ $key }}" {{ old('category', $activity->category ?? '') == $key ? 'selected' : '' }}>
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="location" class="block text-sm font-medium text-gray-700 mb-2">Lokasi Kegiatan</label>
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent @error('location') border-red-300 @enderror" 
                               id="location" name="location" value="{{ old('location', $activity->location ?? '') }}"
                               placeholder="Contoh: Balai Desa, Aula BPD, dll">
                        @error('location')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                            Deskripsi Kegiatan <span class="text-red-500">*</span>
                        </label>
                        <textarea class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent @error('description') border-red-300 @enderror" 
                                  id="description" name="description" rows="4" required 
                                  placeholder="Jelaskan tentang kegiatan ini...">{{ old('description', $activity->description ?? '') }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Photo Upload -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-green-50 to-green-100">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-gradient-to-br from-green-500 to-green-600 rounded-lg flex items-center justify-center shadow-lg mr-3">
                            <i class="fas fa-camera text-white text-sm"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900">Dokumentasi Foto</h3>
                    </div>
                </div>
                <div class="p-6">
                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                            Foto Kegiatan 
                            @if(!isset($activity))
                                <span class="text-red-500">*</span>
                            @endif
                        </label>
                        <input type="file" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent @error('image') border-red-300 @enderror" 
                               id="image" name="image" accept="image/*" onchange="previewImage(this)"
                               {{ !isset($activity) ? 'required' : '' }}>
                        <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG, JPEG. Maksimal 5MB. Resolusi disarankan: 800x600px</p>
                        @error('image')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Submit Buttons -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                    <a href="{{ route('admin.bpd.activities') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition-colors text-sm font-medium">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali
                    </a>
                    <button type="submit" class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-2 bg-village-primary text-white rounded-lg hover:bg-village-secondary transition-colors text-sm font-medium shadow-lg">
                        <i class="fas fa-save mr-2"></i>
                        {{ isset($activity) ? 'Update Kegiatan' : 'Simpan Kegiatan' }}
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Sidebar -->
    <div class="space-y-6">
        <!-- Photo Preview -->
        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-village-primary/5 to-village-secondary/5">
                <h3 class="text-lg font-semibold text-gray-900">Preview Foto</h3>
            </div>
            <div class="p-6">
                <img id="preview" 
                     src="{{ isset($activity) && $activity->image ? $activity->image_url : '/images/placeholder-activity.jpg' }}" 
                     alt="Preview" class="w-full h-48 rounded-lg object-cover shadow-sm border border-gray-200">
                <p class="mt-3 text-sm text-gray-500 text-center">Foto akan ditampilkan di halaman publik BPD</p>
            </div>
        </div>

        <!-- Tips Dokumentasi -->
        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-village-primary/5 to-village-secondary/5">
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-gradient-to-br from-village-primary to-village-secondary rounded-lg flex items-center justify-center shadow-lg mr-3">
                        <i class="fas fa-lightbulb text-white text-sm"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900">Tips Dokumentasi</h3>
                </div>
            </div>
            <div class="p-6">
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mr-3 mt-0.5 flex-shrink-0"></i>
                        <span class="text-sm text-gray-600">Gunakan foto horizontal (landscape)</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mr-3 mt-0.5 flex-shrink-0"></i>
                        <span class="text-sm text-gray-600">Pastikan pencahayaan cukup</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mr-3 mt-0.5 flex-shrink-0"></i>
                        <span class="text-sm text-gray-600">Foto menunjukkan aktivitas jelas</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mr-3 mt-0.5 flex-shrink-0"></i>
                        <span class="text-sm text-gray-600">Tulis deskripsi yang informatif</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mr-3 mt-0.5 flex-shrink-0"></i>
                        <span class="text-sm text-gray-600">Sebutkan tanggal yang akurat</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mr-3 mt-0.5 flex-shrink-0"></i>
                        <span class="text-sm text-gray-600">Cantumkan lokasi jika diperlukan</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Categories Info -->
        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-orange-50 to-orange-100">
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-gradient-to-br from-orange-500 to-orange-600 rounded-lg flex items-center justify-center shadow-lg mr-3">
                        <i class="fas fa-tags text-white text-sm"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900">Kategori Kegiatan</h3>
                </div>
            </div>
            <div class="p-6">
                <div class="space-y-2 text-sm text-gray-600">
                    <div class="flex items-center">
                        <span class="w-3 h-3 bg-blue-500 rounded-full mr-2"></span>
                        <span>Rapat - Musyawarah dan rapat rutin</span>
                    </div>
                    <div class="flex items-center">
                        <span class="w-3 h-3 bg-green-500 rounded-full mr-2"></span>
                        <span>Sosialisasi - Program dan kebijakan</span>
                    </div>
                    <div class="flex items-center">
                        <span class="w-3 h-3 bg-purple-500 rounded-full mr-2"></span>
                        <span>Pelatihan - Capacity building</span>
                    </div>
                    <div class="flex items-center">
                        <span class="w-3 h-3 bg-orange-500 rounded-full mr-2"></span>
                        <span>Kunjungan - Study banding</span>
                    </div>
                    <div class="flex items-center">
                        <span class="w-3 h-3 bg-red-500 rounded-full mr-2"></span>
                        <span>Lainnya - Kegiatan khusus</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
function previewImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview').src = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endpush
