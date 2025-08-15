@extends('layouts.admin')

@section('title', 'Edit Konten Halaman BPD')

@section('breadcrumb')
    <span class="mx-2">/</span>
    <a href="{{ route('admin.bpd.index') }}" class="text-gray-500 hover:text-village-primary transition-colors">Manajemen BPD</a>
    <span class="mx-2">/</span>
    <span class="text-village-primary">Edit Konten Halaman</span>
@endsection

@section('content')

<!-- Page Header -->
<div class="mb-6 md:mb-8">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold bg-gradient-to-r from-village-primary to-village-secondary bg-clip-text text-transparent">
                Edit Konten Halaman BPD
            </h1>
            <p class="text-gray-600 mt-1 md:mt-2 text-sm md:text-base">Kelola konten yang ditampilkan di halaman publik BPD</p>
        </div>
        <div class="flex items-center space-x-3">
            <a href="{{ route('public.bpd') }}" target="_blank" class="inline-flex items-center px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition-colors text-sm font-medium">
                <i class="fas fa-eye mr-2"></i>
                Lihat Halaman
            </a>
        </div>
    </div>
</div>

@if(session('success'))
    <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg">
        <div class="flex items-center">
            <i class="fas fa-check-circle text-green-500 mr-3"></i>
            <span class="text-green-800 font-medium">{{ session('success') }}</span>
        </div>
    </div>
@endif

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Main Content -->
    <div class="lg:col-span-2">
        <form action="{{ route('admin.bpd.content.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Profil BPD -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-blue-50 to-blue-100">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center shadow-lg mr-3">
                            <i class="fas fa-info-circle text-white text-sm"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900">Profil Singkat BPD</h3>
                    </div>
                </div>
                <div class="p-6 space-y-4">
                    <div>
                        <label for="bpd_profil" class="block text-sm font-medium text-gray-700 mb-2">Profil Singkat BPD</label>
                        <textarea class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent @error('bpd_profil') border-red-300 @enderror" 
                                  id="bpd_profil" name="bpd_profil" rows="4"
                                  placeholder="Tuliskan profil singkat tentang BPD...">{{ old('bpd_profil', $content['bpd_profil'] ?? '') }}</textarea>
                        @error('bpd_profil')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="bpd_dasar_hukum" class="block text-sm font-medium text-gray-700 mb-2">Dasar Hukum</label>
                        <textarea class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent @error('bpd_dasar_hukum') border-red-300 @enderror" 
                                  id="bpd_dasar_hukum" name="bpd_dasar_hukum" rows="2"
                                  placeholder="Contoh: UU No. 6 Tahun 2014 tentang Desa...">{{ old('bpd_dasar_hukum', $content['bpd_dasar_hukum'] ?? '') }}</textarea>
                        @error('bpd_dasar_hukum')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Visi & Misi -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-purple-50 to-purple-100">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg flex items-center justify-center shadow-lg mr-3">
                            <i class="fas fa-eye text-white text-sm"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900">Visi & Misi BPD</h3>
                    </div>
                </div>
                <div class="p-6 space-y-4">
                    <div>
                        <label for="bpd_visi" class="block text-sm font-medium text-gray-700 mb-2">Visi BPD</label>
                        <textarea class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent @error('bpd_visi') border-red-300 @enderror" 
                                  id="bpd_visi" name="bpd_visi" rows="3"
                                  placeholder="Tuliskan visi BPD...">{{ old('bpd_visi', $content['bpd_visi'] ?? '') }}</textarea>
                        @error('bpd_visi')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="bpd_misi" class="block text-sm font-medium text-gray-700 mb-2">Misi BPD</label>
                        <textarea class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent @error('bpd_misi') border-red-300 @enderror" 
                                  id="bpd_misi" name="bpd_misi" rows="6"
                                  placeholder="Tuliskan misi BPD (bisa menggunakan HTML untuk formatting)...">{{ old('bpd_misi', $content['bpd_misi'] ?? '') }}</textarea>
                        <p class="mt-1 text-xs text-gray-500">
                            Anda bisa menggunakan HTML sederhana seperti &lt;ul&gt;&lt;li&gt; untuk list atau &lt;p&gt; untuk paragraf.
                        </p>
                        @error('bpd_misi')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Kontak & Informasi -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-green-50 to-green-100">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-gradient-to-br from-green-500 to-green-600 rounded-lg flex items-center justify-center shadow-lg mr-3">
                            <i class="fas fa-phone text-white text-sm"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900">Kontak & Informasi</h3>
                    </div>
                </div>
                <div class="p-6 space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="bpd_contact_phone" class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon</label>
                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent @error('bpd_contact_phone') border-red-300 @enderror" 
                                   id="bpd_contact_phone" name="bpd_contact_phone" 
                                   value="{{ old('bpd_contact_phone', $content['bpd_contact_phone'] ?? '') }}"
                                   placeholder="Contoh: 08123456789">
                            @error('bpd_contact_phone')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="bpd_contact_email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input type="email" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent @error('bpd_contact_email') border-red-300 @enderror" 
                                   id="bpd_contact_email" name="bpd_contact_email" 
                                   value="{{ old('bpd_contact_email', $content['bpd_contact_email'] ?? '') }}"
                                   placeholder="Contoh: bpd@desa.id">
                            @error('bpd_contact_email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="bpd_contact_address" class="block text-sm font-medium text-gray-700 mb-2">Alamat Sekretariat</label>
                        <textarea class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent @error('bpd_contact_address') border-red-300 @enderror" 
                                  id="bpd_contact_address" name="bpd_contact_address" rows="2"
                                  placeholder="Alamat lengkap sekretariat BPD...">{{ old('bpd_contact_address', $content['bpd_contact_address'] ?? '') }}</textarea>
                        @error('bpd_contact_address')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="bpd_jam_pelayanan" class="block text-sm font-medium text-gray-700 mb-2">Jam Pelayanan</label>
                        <textarea class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent @error('bpd_jam_pelayanan') border-red-300 @enderror" 
                                  id="bpd_jam_pelayanan" name="bpd_jam_pelayanan" rows="4"
                                  placeholder="Masukkan jam pelayanan (bisa menggunakan HTML)...">{{ old('bpd_jam_pelayanan', $content['bpd_jam_pelayanan'] ?? '') }}</textarea>
                        <p class="mt-1 text-xs text-gray-500">
                            Contoh: &lt;div&gt;Senin - Jumat: 08:00 - 16:00&lt;/div&gt;
                        </p>
                        @error('bpd_jam_pelayanan')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                    <a href="{{ route('admin.bpd.index') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition-colors text-sm font-medium">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali
                    </a>
                    <button type="submit" class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-2 bg-village-primary text-white rounded-lg hover:bg-village-secondary transition-colors text-sm font-medium shadow-lg">
                        <i class="fas fa-save mr-2"></i>
                        Simpan Semua Perubahan
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Sidebar -->
    <div class="space-y-6">
        <!-- Quick Actions -->
        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-village-primary/5 to-village-secondary/5">
                <h3 class="text-lg font-semibold text-gray-900">Aksi Cepat</h3>
            </div>
            <div class="p-6 space-y-3">
                <a href="{{ route('public.bpd') }}" target="_blank" class="w-full inline-flex items-center justify-center px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition-colors text-sm font-medium">
                    <i class="fas fa-external-link-alt mr-2"></i>
                    Lihat Halaman Publik
                </a>
                <button type="button" onclick="previewContent()" class="w-full inline-flex items-center justify-center px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors text-sm font-medium">
                    <i class="fas fa-eye mr-2"></i>
                    Preview Konten
                </button>
            </div>
        </div>

        <!-- Panduan -->
        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-village-primary/5 to-village-secondary/5">
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-gradient-to-br from-village-primary to-village-secondary rounded-lg flex items-center justify-center shadow-lg mr-3">
                        <i class="fas fa-question-circle text-white text-sm"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900">Panduan Editing</h3>
                </div>
            </div>
            <div class="p-6">
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mr-3 mt-0.5 flex-shrink-0"></i>
                        <span class="text-sm text-gray-600">Semua field bersifat opsional</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mr-3 mt-0.5 flex-shrink-0"></i>
                        <span class="text-sm text-gray-600">Konten kosong akan menggunakan default</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mr-3 mt-0.5 flex-shrink-0"></i>
                        <span class="text-sm text-gray-600">HTML sederhana diperbolehkan</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mr-3 mt-0.5 flex-shrink-0"></i>
                        <span class="text-sm text-gray-600">Perubahan langsung tampil di halaman publik</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mr-3 mt-0.5 flex-shrink-0"></i>
                        <span class="text-sm text-gray-600">Gunakan preview untuk melihat hasil</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
function previewContent() {
    alert('Untuk melihat preview lengkap, klik "Lihat Halaman Publik" setelah menyimpan perubahan.');
}
</script>
@endpush
