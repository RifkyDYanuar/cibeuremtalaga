@extends('layouts.admin')

@section('title', 'Edit Data APBDES')

@section('content')
<div class="min-h-screen bg-gray-50 dark:bg-dark-100 transition-colors duration-300">
    <div class="p-4 md:p-6 lg:p-8">
        <!-- Enhanced Header with Breadcrumb -->
        <div class="mb-8">
            <nav class="text-sm mb-4">
                <ol class="list-none p-0 inline-flex">
                    <li class="flex items-center">
                        <a href="{{ route('admin.dashboard') }}" class="text-village-primary hover:text-village-secondary transition-colors">
                            <i class="fas fa-home mr-1"></i>Dashboard
                        </a>
                        <i class="fas fa-chevron-right mx-2 text-gray-400"></i>
                    </li>
                    <li class="flex items-center">
                        <a href="{{ route('admin.apbdes.index') }}" class="text-village-primary hover:text-village-secondary transition-colors">
                            APBDES
                        </a>
                        <i class="fas fa-chevron-right mx-2 text-gray-400"></i>
                    </li>
                    <li class="text-gray-600 dark:text-gray-400">Edit Data</li>
                </ol>
            </nav>
            
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-4 sm:space-y-0">
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white flex items-center">
                        <div class="bg-village-primary/10 p-3 rounded-lg mr-4">
                            <i class="fas fa-edit text-village-primary text-xl"></i>
                        </div>
                        Edit Data APBDES
                    </h1>
                    <p class="text-gray-600 dark:text-gray-400 mt-1">Edit data anggaran pendapatan dan belanja desa</p>
                </div>
                <a href="{{ route('admin.apbdes.index') }}"
                    class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg transition-colors duration-200 flex items-center space-x-2 text-sm font-medium shadow-lg hover:shadow-xl">
                    <i class="fas fa-arrow-left"></i>
                    <span>Kembali</span>
                </a>
            </div>
        </div>

        <!-- Enhanced Form -->
        <div class="bg-white dark:bg-dark-300 rounded-xl shadow-lg border border-gray-200 dark:border-dark-400 overflow-hidden">
            <!-- Form Header -->
            <div class="bg-gradient-to-r from-village-primary to-village-secondary px-6 py-4 border-b border-gray-200 dark:border-dark-400">
                <h3 class="text-lg font-semibold text-white flex items-center">
                    <i class="fas fa-edit mr-2"></i>
                    Form Edit APBDES
                </h3>
                <p class="text-white/80 text-sm mt-1">Perbarui data anggaran sesuai kebutuhan</p>
            </div>

            <!-- Form Content -->
            <div class="p-6">
                <form method="POST" action="{{ route('admin.apbdes.update', $apbdes) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Basic Information Section -->
                    <div class="border border-gray-200 dark:border-dark-400 rounded-lg overflow-hidden">
                        <div class="bg-blue-50 dark:bg-blue-900/20 px-4 py-3 border-b border-gray-200 dark:border-dark-400">
                            <h4 class="text-base font-semibold text-blue-800 dark:text-blue-300 flex items-center">
                                <i class="fas fa-info-circle mr-2"></i>
                                Informasi Dasar
                            </h4>
                        </div>
                        <div class="p-4 space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="tahun_anggaran" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        <i class="fas fa-calendar-alt mr-1 text-blue-500"></i>
                                        Tahun Anggaran <span class="text-red-500">*</span>
                                    </label>
                                    <select name="tahun_anggaran" id="tahun_anggaran" required
                                            class="w-full px-3 py-2.5 border border-gray-300 dark:border-dark-400 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent dark:bg-dark-300 dark:text-white transition-all duration-200 @error('tahun_anggaran') border-red-500 ring-2 ring-red-200 @enderror">
                                        <option value="">Pilih Tahun Anggaran</option>
                                        @for($year = date('Y') + 5; $year >= 2020; $year--)
                                            <option value="{{ $year }}" {{ (old('tahun_anggaran', $apbdes->tahun_anggaran) == $year) ? 'selected' : '' }}>
                                                {{ $year }}
                                            </option>
                                        @endfor
                                    </select>
                                    @error('tahun_anggaran')
                                        <p class="text-red-500 text-xs mt-1 flex items-center">
                                            <i class="fas fa-exclamation-circle mr-1"></i>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="jenis" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        <i class="fas fa-tag mr-1 text-green-500"></i>
                                        Jenis <span class="text-red-500">*</span>
                                    </label>
                                    <select name="jenis" id="jenis" required onchange="updateKategori()"
                                            class="w-full px-3 py-2.5 border border-gray-300 dark:border-dark-400 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent dark:bg-dark-300 dark:text-white transition-all duration-200 @error('jenis') border-red-500 ring-2 ring-red-200 @enderror">
                                        <option value="">Pilih Jenis</option>
                                        <option value="pendapatan" {{ old('jenis', $apbdes->jenis) == 'pendapatan' ? 'selected' : '' }}>Pendapatan</option>
                                        <option value="belanja" {{ old('jenis', $apbdes->jenis) == 'belanja' ? 'selected' : '' }}>Belanja</option>
                                        <option value="pembiayaan" {{ old('jenis', $apbdes->jenis) == 'pembiayaan' ? 'selected' : '' }}>Pembiayaan</option>
                                    </select>
                                    @error('jenis')
                                        <p class="text-red-500 text-xs mt-1 flex items-center">
                                            <i class="fas fa-exclamation-circle mr-1"></i>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label for="kategori" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    <i class="fas fa-folder mr-1 text-yellow-500"></i>
                                    Kategori <span class="text-red-500">*</span>
                                </label>
                                <select name="kategori" id="kategori" required
                                        class="w-full px-3 py-2.5 border border-gray-300 dark:border-dark-400 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent dark:bg-dark-300 dark:text-white transition-all duration-200 @error('kategori') border-red-500 ring-2 ring-red-200 @enderror">
                                    <option value="">Pilih jenis terlebih dahulu</option>
                                </select>
                                @error('kategori')
                                    <p class="text-red-500 text-xs mt-1 flex items-center">
                                        <i class="fas fa-exclamation-circle mr-1"></i>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Detail Information Section -->
                    <div class="border border-gray-200 dark:border-dark-400 rounded-lg overflow-hidden">
                        <div class="bg-green-50 dark:bg-green-900/20 px-4 py-3 border-b border-gray-200 dark:border-dark-400">
                            <h4 class="text-base font-semibold text-green-800 dark:text-green-300 flex items-center">
                                <i class="fas fa-file-alt mr-2"></i>
                                Detail Informasi
                            </h4>
                        </div>
                        <div class="p-4 space-y-4">
                            <div>
                                <label for="uraian" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    <i class="fas fa-align-left mr-1 text-indigo-500"></i>
                                    Uraian <span class="text-red-500">*</span>
                                </label>
                                <textarea name="uraian" id="uraian" rows="3" required placeholder="Masukkan uraian detail anggaran..."
                                          class="w-full px-3 py-2.5 border border-gray-300 dark:border-dark-400 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent dark:bg-dark-300 dark:text-white transition-all duration-200 @error('uraian') border-red-500 ring-2 ring-red-200 @enderror">{{ old('uraian', $apbdes->uraian) }}</textarea>
                                @error('uraian')
                                    <p class="text-red-500 text-xs mt-1 flex items-center">
                                        <i class="fas fa-exclamation-circle mr-1"></i>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="jumlah_display" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        <i class="fas fa-money-bill-wave mr-1 text-emerald-500"></i>
                                        Jumlah (Rp) <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500 dark:text-gray-400 font-medium">Rp</span>
                                        <input type="text" id="jumlah_display" required placeholder="0" 
                                               oninput="formatCurrency(this)"
                                               class="w-full pl-10 pr-3 py-2.5 border border-gray-300 dark:border-dark-400 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent dark:bg-dark-300 dark:text-white transition-all duration-200 @error('jumlah') border-red-500 ring-2 ring-red-200 @enderror"
                                               value="{{ old('jumlah') ? number_format(old('jumlah'), 0, ',', '.') : number_format($apbdes->jumlah, 0, ',', '.') }}">
                                        <input type="hidden" name="jumlah" id="jumlah_hidden" value="{{ old('jumlah', $apbdes->jumlah) }}">
                                    </div>
                                    @error('jumlah')
                                        <p class="text-red-500 text-xs mt-1 flex items-center">
                                            <i class="fas fa-exclamation-circle mr-1"></i>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        <i class="fas fa-traffic-light mr-1 text-orange-500"></i>
                                        Status <span class="text-red-500">*</span>
                                    </label>
                                    <select name="status" id="status" required
                                            class="w-full px-3 py-2.5 border border-gray-300 dark:border-dark-400 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent dark:bg-dark-300 dark:text-white transition-all duration-200 @error('status') border-red-500 ring-2 ring-red-200 @enderror">
                                        <option value="">Pilih Status</option>
                                        <option value="draft" {{ old('status', $apbdes->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                                        <option value="aktif" {{ old('status', $apbdes->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                        <option value="revisi" {{ old('status', $apbdes->status) == 'revisi' ? 'selected' : '' }}>Revisi</option>
                                    </select>
                                    @error('status')
                                        <p class="text-red-500 text-xs mt-1 flex items-center">
                                            <i class="fas fa-exclamation-circle mr-1"></i>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label for="keterangan" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    <i class="fas fa-sticky-note mr-1 text-purple-500"></i>
                                    Keterangan
                                </label>
                                <textarea name="keterangan" id="keterangan" rows="2" placeholder="Keterangan tambahan (opsional)..."
                                          class="w-full px-3 py-2.5 border border-gray-300 dark:border-dark-400 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent dark:bg-dark-300 dark:text-white transition-all duration-200 @error('keterangan') border-red-500 ring-2 ring-red-200 @enderror">{{ old('keterangan', $apbdes->keterangan) }}</textarea>
                                @error('keterangan')
                                    <p class="text-red-500 text-xs mt-1 flex items-center">
                                        <i class="fas fa-exclamation-circle mr-1"></i>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Enhanced Submit Buttons -->
                    <div class="flex flex-col sm:flex-row gap-3 pt-6 border-t border-gray-200 dark:border-dark-400">
                        <button type="submit" 
                                class="flex-1 sm:flex-none bg-gradient-to-r from-village-primary to-village-secondary hover:from-village-secondary hover:to-village-primary text-white px-6 py-3 rounded-lg transition-all duration-200 font-medium shadow-md hover:shadow-lg transform hover:-translate-y-0.5 flex items-center justify-center">
                            <i class="fas fa-save mr-2"></i>
                            Update Data APBDES
                        </button>
                        <a href="{{ route('admin.apbdes.index') }}" 
                           class="flex-1 sm:flex-none bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg transition-all duration-200 font-medium text-center shadow-md hover:shadow-lg transform hover:-translate-y-0.5 flex items-center justify-center">
                            <i class="fas fa-times mr-2"></i>
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
// Data kategori
const kategoriPendapatan = @json($kategoriPendapatan);
const kategoriBelanja = @json($kategoriBelanja);
const kategoriPembiayaan = @json($kategoriPembiayaan);

function updateKategori() {
    const jenisSelect = document.getElementById('jenis');
    const kategoriSelect = document.getElementById('kategori');
    const selectedJenis = jenisSelect.value;
    const currentKategori = '{{ old('kategori', $apbdes->kategori) }}';

    // Clear existing options
    kategoriSelect.innerHTML = '<option value="">Pilih Kategori</option>';

    if (selectedJenis === 'pendapatan') {
        Object.entries(kategoriPendapatan).forEach(([key, value]) => {
            const option = document.createElement('option');
            option.value = key;
            option.textContent = value;
            if (currentKategori === key) {
                option.selected = true;
            }
            kategoriSelect.appendChild(option);
        });
    } else if (selectedJenis === 'belanja') {
        Object.entries(kategoriBelanja).forEach(([key, value]) => {
            const option = document.createElement('option');
            option.value = key;
            option.textContent = value;
            if (currentKategori === key) {
                option.selected = true;
            }
            kategoriSelect.appendChild(option);
        });
    } else if (selectedJenis === 'pembiayaan') {
        Object.entries(kategoriPembiayaan).forEach(([key, value]) => {
            const option = document.createElement('option');
            option.value = key;
            option.textContent = value;
            if (currentKategori === key) {
                option.selected = true;
            }
            kategoriSelect.appendChild(option);
        });
    }
}

function formatCurrency(input) {
    // Get the raw numeric value (remove all non-digit characters)
    let value = input.value.replace(/[^\d]/g, '');
    
    // Update the hidden field with raw numeric value
    const hiddenInput = document.getElementById('jumlah_hidden');
    hiddenInput.value = value;
    
    // Format the display value with thousand separators
    if (value) {
        const formatted = parseInt(value).toLocaleString('id-ID');
        input.value = formatted;
    } else {
        input.value = '';
    }
}

// Initialize kategori on page load
document.addEventListener('DOMContentLoaded', function() {
    const jenisSelect = document.getElementById('jenis');
    if (jenisSelect.value) {
        updateKategori();
    }
    
    // Initialize currency format
    const displayInput = document.getElementById('jumlah_display');
    if (displayInput.value) {
        formatCurrency(displayInput);
    }
});
</script>
@endsection
