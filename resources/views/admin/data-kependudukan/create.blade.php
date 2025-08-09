@extends('layouts.admin')

@section('title', 'Tambah Data Penduduk')

@section('content')
<div class="max-w-5xl mx-auto py-8 px-2">
    <!-- Header -->
    <div class="mb-8">
        <div class="bg-gradient-to-r from-green-700 via-green-600 to-green-500 rounded-2xl shadow-xl p-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div class="flex items-center gap-4">
                <div class="flex items-center justify-center w-16 h-16 rounded-full bg-white/80 text-green-700 shadow-lg">
                    <i class="fas fa-user-plus fa-2x"></i>
                </div>
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-white mb-1">Tambah Data Penduduk</h2>
                    <p class="text-white/90 text-sm md:text-base">Lengkapi form berikut untuk menambah data penduduk baru</p>
                </div>
            </div>
            <a href="{{ route('admin.data-kependudukan.index') }}" class="inline-flex items-center gap-2 bg-white text-green-700 font-semibold px-6 py-2 rounded-full shadow hover:bg-green-50 transition">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>

    <!-- Alert untuk error -->
    @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4 flex items-center gap-2">
            <i class="fas fa-exclamation-triangle"></i>
            <span class="font-bold">Error!</span> {{ session('error') }}
        </div>
    @endif
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded-lg mb-4 flex items-center gap-2">
            <i class="fas fa-check-circle"></i>
            <span class="font-bold">Berhasil!</span> {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4">
            <div class="flex items-center gap-2 mb-2">
                <i class="fas fa-exclamation-triangle"></i>
                <span class="font-bold">Terdapat kesalahan pada input:</span>
            </div>
            <ul class="list-disc pl-6 text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form -->
    <form action="{{ route('admin.data-kependudukan.store') }}" method="POST" id="pendudukForm" class="space-y-8">
        @csrf
        <!-- Data Pribadi -->
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <div class="flex items-center gap-2 mb-6">
                <i class="fas fa-user text-green-600"></i>
                <h3 class="text-lg font-bold text-green-700">Data Pribadi</h3>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="nik" class="block font-semibold text-gray-700 mb-1">NIK <span class="text-red-500">*</span></label>
                    <input type="text" id="nik" name="nik" maxlength="16" placeholder="Masukkan 16 digit NIK" value="{{ old('nik') }}" required
                        class="w-full rounded-lg border-2 border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-200 px-4 py-3 text-base shadow-sm transition @error('nik') border-red-400 @enderror">
                    <small class="text-gray-400">Contoh: 3201012001010001</small>
                    @error('nik')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="nama" class="block font-semibold text-gray-700 mb-1">Nama Lengkap <span class="text-red-500">*</span></label>
                    <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap" value="{{ old('nama') }}" required
                        class="w-full rounded-lg border-2 border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-200 px-4 py-3 text-base shadow-sm transition @error('nama') border-red-400 @enderror">
                    @error('nama')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                <div>
                    <label for="jenis_kelamin" class="block font-semibold text-gray-700 mb-1">Jenis Kelamin <span class="text-red-500">*</span></label>
                    <select id="jenis_kelamin" name="jenis_kelamin" required
                        class="w-full rounded-lg border-2 border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-200 px-4 py-3 text-base shadow-sm transition @error('jenis_kelamin') border-red-400 @enderror">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="tempat_lahir" class="block font-semibold text-gray-700 mb-1">Tempat Lahir <span class="text-red-500">*</span></label>
                    <input type="text" id="tempat_lahir" name="tempat_lahir" placeholder="Contoh: Jakarta" value="{{ old('tempat_lahir') }}" required
                        class="w-full rounded-lg border-2 border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-200 px-4 py-3 text-base shadow-sm transition @error('tempat_lahir') border-red-400 @enderror">
                    @error('tempat_lahir')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="tanggal_lahir" class="block font-semibold text-gray-700 mb-1">Tanggal Lahir <span class="text-red-500">*</span></label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required
                        class="w-full rounded-lg border-2 border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-200 px-4 py-3 text-base shadow-sm transition @error('tanggal_lahir') border-red-400 @enderror">
                    @error('tanggal_lahir')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                <div>
                    <label for="agama" class="block font-semibold text-gray-700 mb-1">Agama <span class="text-red-500">*</span></label>
                    <select id="agama" name="agama" required
                        class="w-full rounded-lg border-2 border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-200 px-4 py-3 text-base shadow-sm transition @error('agama') border-red-400 @enderror">
                        <option value="">Pilih Agama</option>
                        <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                        <option value="Kristen" {{ old('agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                        <option value="Katolik" {{ old('agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                        <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                        <option value="Buddha" {{ old('agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                        <option value="Konghucu" {{ old('agama') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                        <option value="Lainnya" {{ old('agama') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                    @error('agama')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="status_perkawinan" class="block font-semibold text-gray-700 mb-1">Status Perkawinan <span class="text-red-500">*</span></label>
                    <select id="status_perkawinan" name="status_perkawinan" required
                        class="w-full rounded-lg border-2 border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-200 px-4 py-3 text-base shadow-sm transition @error('status_perkawinan') border-red-400 @enderror">
                        <option value="">Pilih Status</option>
                        <option value="Belum Kawin" {{ old('status_perkawinan') == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                        <option value="Kawin" {{ old('status_perkawinan') == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                        <option value="Cerai Hidup" {{ old('status_perkawinan') == 'Cerai Hidup' ? 'selected' : '' }}>Cerai Hidup</option>
                        <option value="Cerai Mati" {{ old('status_perkawinan') == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
                    </select>
                    @error('status_perkawinan')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="kewarganegaraan" class="block font-semibold text-gray-700 mb-1">Kewarganegaraan <span class="text-red-500">*</span></label>
                    <select id="kewarganegaraan" name="kewarganegaraan" required
                        class="w-full rounded-lg border-2 border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-200 px-4 py-3 text-base shadow-sm transition @error('kewarganegaraan') border-red-400 @enderror">
                        <option value="WNI" {{ old('kewarganegaraan', 'WNI') == 'WNI' ? 'selected' : '' }}>WNI</option>
                        <option value="WNA" {{ old('kewarganegaraan') == 'WNA' ? 'selected' : '' }}>WNA</option>
                    </select>
                    @error('kewarganegaraan')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Data Alamat -->
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <div class="flex items-center gap-2 mb-6">
                <i class="fas fa-map-marker-alt text-green-600"></i>
                <h3 class="text-lg font-bold text-green-700">Data Alamat</h3>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="md:col-span-2">
                    <label for="alamat" class="block font-semibold text-gray-700 mb-1">Alamat <span class="text-red-500">*</span></label>
                    <textarea id="alamat" name="alamat" rows="4" placeholder="Masukkan alamat lengkap" required
                        class="w-full rounded-lg border-2 border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-200 px-4 py-3 text-base shadow-sm transition @error('alamat') border-red-400 @enderror">{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="rt" class="block font-semibold text-gray-700 mb-1">RT <span class="text-red-500">*</span></label>
                    <input type="text" id="rt" name="rt" maxlength="3" placeholder="001" value="{{ old('rt') }}" required
                        class="w-full rounded-lg border-2 border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-200 px-4 py-3 text-base shadow-sm transition @error('rt') border-red-400 @enderror">
                    @error('rt')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="rw" class="block font-semibold text-gray-700 mb-1">RW <span class="text-red-500">*</span></label>
                    <input type="text" id="rw" name="rw" maxlength="3" placeholder="001" value="{{ old('rw') }}" required
                        class="w-full rounded-lg border-2 border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-200 px-4 py-3 text-base shadow-sm transition @error('rw') border-red-400 @enderror">
                    @error('rw')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Data Pekerjaan & Pendidikan -->
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <div class="flex items-center gap-2 mb-6">
                <i class="fas fa-briefcase text-green-600"></i>
                <h3 class="text-lg font-bold text-green-700">Data Pekerjaan & Pendidikan</h3>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="pekerjaan" class="block font-semibold text-gray-700 mb-1">Pekerjaan <span class="text-red-500">*</span></label>
                    <input type="text" id="pekerjaan" name="pekerjaan" placeholder="Contoh: Petani, PNS, Swasta" value="{{ old('pekerjaan') }}" required
                        class="w-full rounded-lg border-2 border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-200 px-4 py-3 text-base shadow-sm transition @error('pekerjaan') border-red-400 @enderror">
                    @error('pekerjaan')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="pendidikan" class="block font-semibold text-gray-700 mb-1">Pendidikan <span class="text-red-500">*</span></label>
                    <select id="pendidikan" name="pendidikan" required
                        class="w-full rounded-lg border-2 border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-200 px-4 py-3 text-base shadow-sm transition @error('pendidikan') border-red-400 @enderror">
                        <option value="">Pilih Pendidikan</option>
                        <option value="Tidak Sekolah" {{ old('pendidikan') == 'Tidak Sekolah' ? 'selected' : '' }}>Tidak Sekolah</option>
                        <option value="SD/Sederajat" {{ old('pendidikan') == 'SD/Sederajat' ? 'selected' : '' }}>SD/Sederajat</option>
                        <option value="SMP/Sederajat" {{ old('pendidikan') == 'SMP/Sederajat' ? 'selected' : '' }}>SMP/Sederajat</option>
                        <option value="SMA/Sederajat" {{ old('pendidikan') == 'SMA/Sederajat' ? 'selected' : '' }}>SMA/Sederajat</option>
                        <option value="Diploma" {{ old('pendidikan') == 'Diploma' ? 'selected' : '' }}>Diploma</option>
                        <option value="Sarjana" {{ old('pendidikan') == 'Sarjana' ? 'selected' : '' }}>Sarjana</option>
                        <option value="Pascasarjana" {{ old('pendidikan') == 'Pascasarjana' ? 'selected' : '' }}>Pascasarjana</option>
                    </select>
                    @error('pendidikan')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Data Keluarga -->
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <div class="flex items-center gap-2 mb-6">
                <i class="fas fa-users text-green-600"></i>
                <h3 class="text-lg font-bold text-green-700">Data Keluarga</h3>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="status_dalam_keluarga" class="block font-semibold text-gray-700 mb-1">Status dalam Keluarga <span class="text-red-500">*</span></label>
                    <select id="status_dalam_keluarga" name="status_dalam_keluarga" required
                        class="w-full rounded-lg border-2 border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-200 px-4 py-3 text-base shadow-sm transition @error('status_dalam_keluarga') border-red-400 @enderror">
                        <option value="">Pilih Status</option>
                        <option value="Kepala Keluarga" {{ old('status_dalam_keluarga') == 'Kepala Keluarga' ? 'selected' : '' }}>Kepala Keluarga</option>
                        <option value="Istri" {{ old('status_dalam_keluarga') == 'Istri' ? 'selected' : '' }}>Istri</option>
                        <option value="Anak" {{ old('status_dalam_keluarga') == 'Anak' ? 'selected' : '' }}>Anak</option>
                        <option value="Menantu" {{ old('status_dalam_keluarga') == 'Menantu' ? 'selected' : '' }}>Menantu</option>
                        <option value="Cucu" {{ old('status_dalam_keluarga') == 'Cucu' ? 'selected' : '' }}>Cucu</option>
                        <option value="Orangtua" {{ old('status_dalam_keluarga') == 'Orangtua' ? 'selected' : '' }}>Orangtua</option>
                        <option value="Mertua" {{ old('status_dalam_keluarga') == 'Mertua' ? 'selected' : '' }}>Mertua</option>
                        <option value="Famili Lain" {{ old('status_dalam_keluarga') == 'Famili Lain' ? 'selected' : '' }}>Famili Lain</option>
                        <option value="Pembantu" {{ old('status_dalam_keluarga') == 'Pembantu' ? 'selected' : '' }}>Pembantu</option>
                        <option value="Lainnya" {{ old('status_dalam_keluarga') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                    @error('status_dalam_keluarga')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="no_kk" class="block font-semibold text-gray-700 mb-1">No. KK</label>
                    <input type="text" id="no_kk" name="no_kk" maxlength="16" placeholder="Masukkan 16 digit nomor KK" value="{{ old('no_kk') }}"
                        class="w-full rounded-lg border-2 border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-200 px-4 py-3 text-base shadow-sm transition @error('no_kk') border-red-400 @enderror">
                    <small class="text-gray-400">Opsional - Nomor Kartu Keluarga</small>
                    @error('no_kk')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                <div>
                    <label for="nama_ayah" class="block font-semibold text-gray-700 mb-1">Nama Ayah</label>
                    <input type="text" id="nama_ayah" name="nama_ayah" placeholder="Nama lengkap ayah" value="{{ old('nama_ayah') }}"
                        class="w-full rounded-lg border-2 border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-200 px-4 py-3 text-base shadow-sm transition @error('nama_ayah') border-red-400 @enderror">
                    @error('nama_ayah')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="nama_ibu" class="block font-semibold text-gray-700 mb-1">Nama Ibu</label>
                    <input type="text" id="nama_ibu" name="nama_ibu" placeholder="Nama lengkap ibu" value="{{ old('nama_ibu') }}"
                        class="w-full rounded-lg border-2 border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-200 px-4 py-3 text-base shadow-sm transition @error('nama_ibu') border-red-400 @enderror">
                    @error('nama_ibu')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Status & Keterangan -->
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <div class="flex items-center gap-2 mb-6">
                <i class="fas fa-info-circle text-green-600"></i>
                <h3 class="text-lg font-bold text-green-700">Status & Keterangan</h3>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="status" class="block font-semibold text-gray-700 mb-1">Status <span class="text-red-500">*</span></label>
                    <select id="status" name="status" required
                        class="w-full rounded-lg border-2 border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-200 px-4 py-3 text-base shadow-sm transition @error('status') border-red-400 @enderror">
                        <option value="aktif" {{ old('status', 'aktif') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="pindah" {{ old('status') == 'pindah' ? 'selected' : '' }}>Pindah</option>
                        <option value="meninggal" {{ old('status') == 'meninggal' ? 'selected' : '' }}>Meninggal</option>
                    </select>
                    @error('status')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="keterangan" class="block font-semibold text-gray-700 mb-1">Keterangan</label>
                    <textarea id="keterangan" name="keterangan" rows="4" placeholder="Keterangan tambahan (opsional)"
                        class="w-full rounded-lg border-2 border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-200 px-4 py-3 text-base shadow-sm transition @error('keterangan') border-red-400 @enderror">{{ old('keterangan') }}</textarea>
                    @error('keterangan')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col md:flex-row gap-4 justify-between items-center mt-8">
            <button type="reset" class="inline-flex items-center gap-2 border-2 border-green-600 text-green-700 font-semibold px-6 py-3 rounded-full hover:bg-green-50 transition">
                <i class="fas fa-redo"></i> Reset Form
            </button>
            <button type="submit" class="inline-flex items-center gap-2 bg-green-600 text-white font-semibold px-8 py-3 rounded-full shadow hover:bg-green-700 transition">
                <i class="fas fa-save"></i> Simpan Data Penduduk
            </button>
        </div>
    </form>
</div>

<!-- No custom CSS, all Tailwind -->
<script>

document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('pendudukForm');
    const submitBtn = form.querySelector('button[type="submit"]');
    
    form.addEventListener('submit', function(e) {
        console.log('Form submitted');
        
        // Disable submit button to prevent double submission
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Menyimpan...';
        
        // Get all form data
        const formData = new FormData(form);
        console.log('Form data:');
        for (let [key, value] of formData.entries()) {
            console.log(key, ':', value);
        }
        
        // Check required fields
        const requiredFields = form.querySelectorAll('[required]');
        let hasEmptyRequired = false;
        
        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                console.log('Empty required field:', field.name);
                hasEmptyRequired = true;
            }
        });
        
        if (hasEmptyRequired) {
            e.preventDefault();
            submitBtn.disabled = false;
            submitBtn.innerHTML = '<i class="fas fa-save mr-2"></i>Simpan Data Penduduk';
            alert('Mohon lengkapi semua field yang wajib diisi!');
            return false;
        }
    });
    
    // Re-enable submit button if form validation fails
    setTimeout(function() {
        if (submitBtn.disabled) {
            submitBtn.disabled = false;
            submitBtn.innerHTML = '<i class="fas fa-save mr-2"></i>Simpan Data Penduduk';
        }
    }, 5000);
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('pendudukForm');
    const submitBtn = form.querySelector('button[type="submit"]');
    form.addEventListener('submit', function(e) {
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Menyimpan...';
        const requiredFields = form.querySelectorAll('[required]');
        let hasEmptyRequired = false;
        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                hasEmptyRequired = true;
            }
        });
        if (hasEmptyRequired) {
            e.preventDefault();
            submitBtn.disabled = false;
            submitBtn.innerHTML = '<i class="fas fa-save mr-2"></i>Simpan Data Penduduk';
            alert('Mohon lengkapi semua field yang wajib diisi!');
            return false;
        }
    });
});
</script>
@endsection
