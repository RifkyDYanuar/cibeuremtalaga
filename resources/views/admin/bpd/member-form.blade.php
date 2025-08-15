@extends('layouts.admin')

@section('title', isset($member) ? 'Edit Anggota BPD' : 'Tambah Anggota BPD')

@section('breadcrumb')
    <span class="mx-2">/</span>
    <a href="{{ route('admin.bpd.index') }}" class="text-gray-500 hover:text-village-primary transition-colors">Manajemen BPD</a>
    <span class="mx-2">/</span>
    <a href="{{ route('admin.bpd.members') }}" class="text-gray-500 hover:text-village-primary transition-colors">Anggota BPD</a>
    <span class="mx-2">/</span>
    <span class="text-village-primary">{{ isset($member) ? 'Edit' : 'Tambah' }} Anggota</span>
@endsection

@section('content')

<!-- Page Header -->
<div class="mb-6 md:mb-8">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold bg-gradient-to-r from-village-primary to-village-secondary bg-clip-text text-transparent">
                {{ isset($member) ? 'Edit' : 'Tambah' }} Anggota BPD
            </h1>
            <p class="text-gray-600 mt-1 md:mt-2 text-sm md:text-base">{{ isset($member) ? 'Edit data anggota BPD yang sudah ada' : 'Tambahkan anggota baru ke BPD' }}</p>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Main Form -->
    <div class="lg:col-span-2">
        <form action="{{ isset($member) ? route('admin.bpd.members.update', $member->id) : route('admin.bpd.members.store') }}" 
              method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @if(isset($member))
                @method('PUT')
            @endif

            <!-- Basic Information -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-blue-50 to-blue-100">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center shadow-lg mr-3">
                            <i class="fas fa-user text-white text-sm"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900">Informasi Dasar</h3>
                    </div>
                </div>
                <div class="p-6 space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Lengkap <span class="text-red-500">*</span>
                            </label>
                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent @error('name') border-red-300 @enderror" 
                                   id="name" name="name" value="{{ old('name', $member->name ?? '') }}" required
                                   placeholder="Masukkan nama lengkap">
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="position" class="block text-sm font-medium text-gray-700 mb-2">
                                Posisi <span class="text-red-500">*</span>
                            </label>
                            <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent @error('position') border-red-300 @enderror" 
                                    id="position" name="position" required>
                                <option value="">Pilih Posisi</option>
                                @foreach(\App\Models\BpdMember::getPositionOptions() as $key => $label)
                                    <option value="{{ $key }}" {{ old('position', $member->position ?? '') == $key ? 'selected' : '' }}>
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                            @error('position')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="bio" class="block text-sm font-medium text-gray-700 mb-2">Biodata Singkat</label>
                        <textarea class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent @error('bio') border-red-300 @enderror" 
                                  id="bio" name="bio" rows="3" 
                                  placeholder="Masukkan biodata singkat anggota BPD...">{{ old('bio', $member->bio ?? '') }}</textarea>
                        @error('bio')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-green-50 to-green-100">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-gradient-to-br from-green-500 to-green-600 rounded-lg flex items-center justify-center shadow-lg mr-3">
                            <i class="fas fa-phone text-white text-sm"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900">Informasi Kontak</h3>
                    </div>
                </div>
                <div class="p-6 space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input type="email" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent @error('email') border-red-300 @enderror" 
                                   id="email" name="email" value="{{ old('email', $member->email ?? '') }}"
                                   placeholder="contoh@email.com">
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon</label>
                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent @error('phone') border-red-300 @enderror" 
                                   id="phone" name="phone" value="{{ old('phone', $member->phone ?? '') }}"
                                   placeholder="08123456789">
                            @error('phone')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Photo Upload -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-purple-50 to-purple-100">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg flex items-center justify-center shadow-lg mr-3">
                            <i class="fas fa-image text-white text-sm"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900">Foto Profil</h3>
                    </div>
                </div>
                <div class="p-6">
                    <div>
                        <label for="photo" class="block text-sm font-medium text-gray-700 mb-2">Upload Foto</label>
                        <input type="file" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent @error('photo') border-red-300 @enderror" 
                               id="photo" name="photo" accept="image/*" onchange="previewImage(this)">
                        <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG, JPEG. Maksimal 2MB.</p>
                        @error('photo')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Submit Buttons -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                    <a href="{{ route('admin.bpd.members') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition-colors text-sm font-medium">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali
                    </a>
                    <button type="submit" class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-2 bg-village-primary text-white rounded-lg hover:bg-village-secondary transition-colors text-sm font-medium shadow-lg">
                        <i class="fas fa-save mr-2"></i>
                        {{ isset($member) ? 'Update Anggota' : 'Simpan Anggota' }}
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
            <div class="p-6 text-center">
                <img id="preview" 
                     src="{{ isset($member) && $member->photo ? $member->photo_url : '/images/default-avatar.png' }}" 
                     alt="Preview" class="w-32 h-32 mx-auto rounded-full object-cover shadow-lg border-4 border-gray-100">
                <p class="mt-3 text-sm text-gray-500">Foto akan ditampilkan di halaman publik BPD</p>
            </div>
        </div>

        <!-- Information -->
        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-village-primary/5 to-village-secondary/5">
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-gradient-to-br from-village-primary to-village-secondary rounded-lg flex items-center justify-center shadow-lg mr-3">
                        <i class="fas fa-info-circle text-white text-sm"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900">Panduan Input</h3>
                </div>
            </div>
            <div class="p-6">
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mr-3 mt-0.5 flex-shrink-0"></i>
                        <span class="text-sm text-gray-600">Nama dan posisi wajib diisi</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mr-3 mt-0.5 flex-shrink-0"></i>
                        <span class="text-sm text-gray-600">Foto akan di-resize otomatis</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mr-3 mt-0.5 flex-shrink-0"></i>
                        <span class="text-sm text-gray-600">Data akan tampil di halaman publik</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mr-3 mt-0.5 flex-shrink-0"></i>
                        <span class="text-sm text-gray-600">Email dan telepon bersifat opsional</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mr-3 mt-0.5 flex-shrink-0"></i>
                        <span class="text-sm text-gray-600">Biodata ditampilkan sebagai deskripsi singkat</span>
                    </li>
                </ul>
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
