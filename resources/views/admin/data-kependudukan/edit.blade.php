@extends('layouts.admin')

@section('title', 'Edit Data Penduduk')

@push('style')
<style>
    /* Custom animations yang tidak tersedia di Tailwind */
    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-5px); }
        75% { transform: translateX(5px); }
    }
    .shake-animation { animation: shake 0.5s ease-in-out; }
</style>
@endpush

@section('content')
<div class="max-w-7xl mx-auto py-8 px-4">
    <!-- Header -->
    <div class="mb-8">
        <div class="bg-gradient-to-r from-green-700 via-green-600 to-green-500 rounded-2xl shadow-xl p-6 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
            <div class="flex items-center gap-4">
                <div class="flex items-center justify-center w-16 h-16 rounded-full bg-white/80 text-green-700 shadow-lg">
                    <i class="fas fa-user-edit fa-2x"></i>
                </div>
                <div>
                    <h1 class="text-2xl lg:text-3xl font-bold text-white mb-1">Edit Data Penduduk</h1>
                    <p class="text-white/90 text-sm lg:text-base">Perbarui informasi penduduk: <strong>{{ $penduduk->nama }}</strong></p>
                </div>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('admin.data-kependudukan.show', $penduduk->id) }}" class="inline-flex items-center gap-2 bg-blue-600 text-white font-semibold px-4 py-2 rounded-full shadow hover:bg-blue-700 transition">
                    <i class="fas fa-eye"></i> Detail
                </a>
                <a href="{{ route('admin.data-kependudukan.index') }}" class="inline-flex items-center gap-2 bg-white text-green-700 font-semibold px-6 py-2 rounded-full shadow hover:bg-green-50 transition">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>

    <!-- Form untuk Edit Data -->
    <form id="editPendudukForm" action="{{ route('admin.data-kependudukan.update', $penduduk->id) }}" method="POST" class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        @csrf
        @method('PUT')

        <!-- Kolom Kiri: Data Pribadi & Alamat -->
        <div class="lg:col-span-2 space-y-8">
            <!-- Data Pribadi -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex items-center gap-3 mb-6">
                    <i class="fas fa-user text-green-600 text-lg"></i>
                    <h3 class="text-lg font-bold text-green-700">Data Pribadi</h3>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="nik" class="block font-semibold text-gray-700 mb-1">
                            <i class="fas fa-id-card text-green-600 mr-1"></i>NIK <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="nik" name="nik" maxlength="16" placeholder="Masukkan 16 digit NIK" value="{{ old('nik', $penduduk->nik) }}" required
                            class="w-full rounded-lg border-2 border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-200 px-4 py-3 text-base shadow-sm transition @error('nik') border-red-400 @enderror">
                        @error('nik')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="nama" class="block font-semibold text-gray-700 mb-1">
                            <i class="fas fa-signature text-green-600 mr-1"></i>Nama Lengkap <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap" value="{{ old('nama', $penduduk->nama) }}" required
                            class="w-full rounded-lg border-2 border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-200 px-4 py-3 text-base shadow-sm transition @error('nama') border-red-400 @enderror">
                        @error('nama')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                    <div>
                        <label for="tempat_lahir" class="block font-semibold text-gray-700 mb-1">
                            <i class="fas fa-map-marker-alt text-green-600 mr-1"></i>Tempat Lahir <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan tempat lahir" value="{{ old('tempat_lahir', $penduduk->tempat_lahir) }}" required
                            class="w-full rounded-lg border-2 border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-200 px-4 py-3 text-base shadow-sm transition @error('tempat_lahir') border-red-400 @enderror">
                        @error('tempat_lahir')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="tanggal_lahir" class="block font-semibold text-gray-700 mb-1">
                            <i class="fas fa-calendar-alt text-green-600 mr-1"></i>Tanggal Lahir <span class="text-red-500">*</span>
                        </label>
                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $penduduk->tanggal_lahir->format('Y-m-d')) }}" required
                            class="w-full rounded-lg border-2 border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-200 px-4 py-3 text-base shadow-sm transition @error('tanggal_lahir') border-red-400 @enderror">
                        @error('tanggal_lahir')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="jenis_kelamin" class="block font-semibold text-gray-700 mb-1">
                            <i class="fas fa-venus-mars text-green-600 mr-1"></i>Jenis Kelamin <span class="text-red-500">*</span>
                        </label>
                        <select id="jenis_kelamin" name="jenis_kelamin" required
                            class="w-full rounded-lg border-2 border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-200 px-4 py-3 text-base shadow-sm transition @error('jenis_kelamin') border-red-400 @enderror">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki" {{ old('jenis_kelamin', $penduduk->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ old('jenis_kelamin', $penduduk->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                    <div>
                        <label for="agama" class="block font-semibold text-gray-700 mb-1">
                            <i class="fas fa-pray text-green-600 mr-1"></i>Agama <span class="text-red-500">*</span>
                        </label>
                        <select id="agama" name="agama" required
                            class="w-full rounded-lg border-2 border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-200 px-4 py-3 text-base shadow-sm transition @error('agama') border-red-400 @enderror">
                            <option value="">Pilih Agama</option>
                            <option value="Islam" {{ old('agama', $penduduk->agama) == 'Islam' ? 'selected' : '' }}>Islam</option>
                            <option value="Kristen" {{ old('agama', $penduduk->agama) == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                            <option value="Katolik" {{ old('agama', $penduduk->agama) == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                            <option value="Hindu" {{ old('agama', $penduduk->agama) == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                            <option value="Buddha" {{ old('agama', $penduduk->agama) == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                            <option value="Konghucu" {{ old('agama', $penduduk->agama) == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                            <option value="Lainnya" {{ old('agama', $penduduk->agama) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                        @error('agama')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="status_perkawinan" class="block font-semibold text-gray-700 mb-1">
                            <i class="fas fa-heart text-green-600 mr-1"></i>Status Perkawinan <span class="text-red-500">*</span>
                        </label>
                        <select id="status_perkawinan" name="status_perkawinan" required
                            class="w-full rounded-lg border-2 border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-200 px-4 py-3 text-base shadow-sm transition @error('status_perkawinan') border-red-400 @enderror">
                            <option value="">Pilih Status</option>
                            <option value="Belum Kawin" {{ old('status_perkawinan', $penduduk->status_perkawinan) == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                            <option value="Kawin" {{ old('status_perkawinan', $penduduk->status_perkawinan) == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                            <option value="Cerai Hidup" {{ old('status_perkawinan', $penduduk->status_perkawinan) == 'Cerai Hidup' ? 'selected' : '' }}>Cerai Hidup</option>
                            <option value="Cerai Mati" {{ old('status_perkawinan', $penduduk->status_perkawinan) == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
                        </select>
                        @error('status_perkawinan')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Data Alamat & Keluarga -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex items-center gap-3 mb-6">
                    <i class="fas fa-home text-green-600 text-lg"></i>
                    <h3 class="text-lg font-bold text-green-700">Data Alamat & Keluarga</h3>
                </div>
                <div class="space-y-6">
                    <div>
                        <label for="alamat" class="block font-semibold text-gray-700 mb-1">
                            <i class="fas fa-map-marked-alt text-green-600 mr-1"></i>Alamat Lengkap <span class="text-red-500">*</span>
                        </label>
                        <textarea id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat lengkap" required
                            class="w-full rounded-lg border-2 border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-200 px-4 py-3 text-base shadow-sm transition @error('alamat') border-red-400 @enderror">{{ old('alamat', $penduduk->alamat) }}</textarea>
                        @error('alamat')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="rt" class="block font-semibold text-gray-700 mb-1">
                                <i class="fas fa-road text-green-600 mr-1"></i>RT <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="rt" name="rt" placeholder="001" value="{{ old('rt', $penduduk->rt) }}" required
                                class="w-full rounded-lg border-2 border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-200 px-4 py-3 text-base shadow-sm transition @error('rt') border-red-400 @enderror">
                            @error('rt')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="rw" class="block font-semibold text-gray-700 mb-1">
                                <i class="fas fa-road text-green-600 mr-1"></i>RW <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="rw" name="rw" placeholder="001" value="{{ old('rw', $penduduk->rw) }}" required
                                class="w-full rounded-lg border-2 border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-200 px-4 py-3 text-base shadow-sm transition @error('rw') border-red-400 @enderror">
                            @error('rw')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="no_kk" class="block font-semibold text-gray-700 mb-1">
                                <i class="fas fa-id-card-alt text-green-600 mr-1"></i>No. Kartu Keluarga
                            </label>
                            <input type="text" id="no_kk" name="no_kk" maxlength="16" placeholder="Masukkan nomor KK" value="{{ old('no_kk', $penduduk->no_kk) }}"
                                class="w-full rounded-lg border-2 border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-200 px-4 py-3 text-base shadow-sm transition @error('no_kk') border-red-400 @enderror">
                            @error('no_kk')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="status_dalam_keluarga" class="block font-semibold text-gray-700 mb-1">
                                <i class="fas fa-users text-green-600 mr-1"></i>Status dalam Keluarga <span class="text-red-500">*</span>
                            </label>
                            <select id="status_dalam_keluarga" name="status_dalam_keluarga" required
                                class="w-full rounded-lg border-2 border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-200 px-4 py-3 text-base shadow-sm transition @error('status_dalam_keluarga') border-red-400 @enderror">
                                <option value="">Pilih Status</option>
                                <option value="Kepala Keluarga" {{ old('status_dalam_keluarga', $penduduk->status_dalam_keluarga) == 'Kepala Keluarga' ? 'selected' : '' }}>Kepala Keluarga</option>
                                <option value="Istri" {{ old('status_dalam_keluarga', $penduduk->status_dalam_keluarga) == 'Istri' ? 'selected' : '' }}>Istri</option>
                                <option value="Anak" {{ old('status_dalam_keluarga', $penduduk->status_dalam_keluarga) == 'Anak' ? 'selected' : '' }}>Anak</option>
                                <option value="Menantu" {{ old('status_dalam_keluarga', $penduduk->status_dalam_keluarga) == 'Menantu' ? 'selected' : '' }}>Menantu</option>
                                <option value="Cucu" {{ old('status_dalam_keluarga', $penduduk->status_dalam_keluarga) == 'Cucu' ? 'selected' : '' }}>Cucu</option>
                                <option value="Orangtua" {{ old('status_dalam_keluarga', $penduduk->status_dalam_keluarga) == 'Orangtua' ? 'selected' : '' }}>Orangtua</option>
                                <option value="Mertua" {{ old('status_dalam_keluarga', $penduduk->status_dalam_keluarga) == 'Mertua' ? 'selected' : '' }}>Mertua</option>
                                <option value="Famili Lain" {{ old('status_dalam_keluarga', $penduduk->status_dalam_keluarga) == 'Famili Lain' ? 'selected' : '' }}>Famili Lain</option>
                                <option value="Pembantu" {{ old('status_dalam_keluarga', $penduduk->status_dalam_keluarga) == 'Pembantu' ? 'selected' : '' }}>Pembantu</option>
                                <option value="Lainnya" {{ old('status_dalam_keluarga', $penduduk->status_dalam_keluarga) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                            @error('status_dalam_keluarga')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="nama_ayah" class="block font-semibold text-gray-700 mb-1">
                                <i class="fas fa-male text-green-600 mr-1"></i>Nama Ayah
                            </label>
                            <input type="text" id="nama_ayah" name="nama_ayah" placeholder="Masukkan nama ayah" value="{{ old('nama_ayah', $penduduk->nama_ayah) }}"
                                class="w-full rounded-lg border-2 border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-200 px-4 py-3 text-base shadow-sm transition @error('nama_ayah') border-red-400 @enderror">
                            @error('nama_ayah')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="nama_ibu" class="block font-semibold text-gray-700 mb-1">
                                <i class="fas fa-female text-green-600 mr-1"></i>Nama Ibu
                            </label>
                            <input type="text" id="nama_ibu" name="nama_ibu" placeholder="Masukkan nama ibu" value="{{ old('nama_ibu', $penduduk->nama_ibu) }}"
                                class="w-full rounded-lg border-2 border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-200 px-4 py-3 text-base shadow-sm transition @error('nama_ibu') border-red-400 @enderror">
                            @error('nama_ibu')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan: Data Tambahan & Aksi -->
        <div class="space-y-6">
            <!-- Data Tambahan -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex items-center gap-3 mb-6">
                    <i class="fas fa-plus-circle text-green-600 text-lg"></i>
                    <h3 class="text-lg font-bold text-green-700">Data Tambahan</h3>
                </div>
                <div class="space-y-6">
                    <div>
                        <label for="pendidikan" class="block font-semibold text-gray-700 mb-1">
                            <i class="fas fa-graduation-cap text-green-600 mr-1"></i>Pendidikan <span class="text-red-500">*</span>
                        </label>
                        <select id="pendidikan" name="pendidikan" required
                            class="w-full rounded-lg border-2 border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-200 px-4 py-3 text-base shadow-sm transition @error('pendidikan') border-red-400 @enderror">
                            <option value="">Pilih Pendidikan</option>
                            <option value="Tidak Sekolah" {{ old('pendidikan', $penduduk->pendidikan) == 'Tidak Sekolah' ? 'selected' : '' }}>Tidak Sekolah</option>
                            <option value="SD/Sederajat" {{ old('pendidikan', $penduduk->pendidikan) == 'SD/Sederajat' ? 'selected' : '' }}>SD/Sederajat</option>
                            <option value="SMP/Sederajat" {{ old('pendidikan', $penduduk->pendidikan) == 'SMP/Sederajat' ? 'selected' : '' }}>SMP/Sederajat</option>
                            <option value="SMA/Sederajat" {{ old('pendidikan', $penduduk->pendidikan) == 'SMA/Sederajat' ? 'selected' : '' }}>SMA/Sederajat</option>
                            <option value="Diploma" {{ old('pendidikan', $penduduk->pendidikan) == 'Diploma' ? 'selected' : '' }}>Diploma</option>
                            <option value="Sarjana" {{ old('pendidikan', $penduduk->pendidikan) == 'Sarjana' ? 'selected' : '' }}>Sarjana</option>
                            <option value="Pascasarjana" {{ old('pendidikan', $penduduk->pendidikan) == 'Pascasarjana' ? 'selected' : '' }}>Pascasarjana</option>
                        </select>
                        @error('pendidikan')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="pekerjaan" class="block font-semibold text-gray-700 mb-1">
                            <i class="fas fa-briefcase text-green-600 mr-1"></i>Pekerjaan <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="pekerjaan" name="pekerjaan" placeholder="Masukkan pekerjaan" value="{{ old('pekerjaan', $penduduk->pekerjaan) }}" required
                            class="w-full rounded-lg border-2 border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-200 px-4 py-3 text-base shadow-sm transition @error('pekerjaan') border-red-400 @enderror">
                        @error('pekerjaan')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="kewarganegaraan" class="block font-semibold text-gray-700 mb-1">
                            <i class="fas fa-flag text-green-600 mr-1"></i>Kewarganegaraan <span class="text-red-500">*</span>
                        </label>
                        <select id="kewarganegaraan" name="kewarganegaraan" required
                            class="w-full rounded-lg border-2 border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-200 px-4 py-3 text-base shadow-sm transition @error('kewarganegaraan') border-red-400 @enderror">
                            <option value="WNI" {{ old('kewarganegaraan', $penduduk->kewarganegaraan) == 'WNI' ? 'selected' : '' }}>WNI</option>
                            <option value="WNA" {{ old('kewarganegaraan', $penduduk->kewarganegaraan) == 'WNA' ? 'selected' : '' }}>WNA</option>
                        </select>
                        @error('kewarganegaraan')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="status" class="block font-semibold text-gray-700 mb-1">
                            <i class="fas fa-check-circle text-green-600 mr-1"></i>Status Kependudukan <span class="text-red-500">*</span>
                        </label>
                        <select id="status" name="status" required
                            class="w-full rounded-lg border-2 border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-200 px-4 py-3 text-base shadow-sm transition @error('status') border-red-400 @enderror">
                            <option value="aktif" {{ old('status', $penduduk->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="pindah" {{ old('status', $penduduk->status) == 'pindah' ? 'selected' : '' }}>Pindah</option>
                            <option value="meninggal" {{ old('status', $penduduk->status) == 'meninggal' ? 'selected' : '' }}>Meninggal</option>
                        </select>
                        @error('status')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="keterangan" class="block font-semibold text-gray-700 mb-1">
                            <i class="fas fa-sticky-note text-green-600 mr-1"></i>Keterangan
                        </label>
                        <textarea id="keterangan" name="keterangan" rows="3" placeholder="Masukkan keterangan tambahan (opsional)"
                            class="w-full rounded-lg border-2 border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-200 px-4 py-3 text-base shadow-sm transition @error('keterangan') border-red-400 @enderror">{{ old('keterangan', $penduduk->keterangan) }}</textarea>
                        @error('keterangan')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="space-y-4">
                    <button type="submit" id="submitButton" class="w-full inline-flex items-center justify-center gap-2 bg-green-600 text-white font-semibold px-6 py-4 rounded-lg shadow hover:bg-green-700 transition">
                        <i class="fas fa-save"></i>
                        <span>PERBARUI DATA PENDUDUK</span>
                        <div class="hidden animate-spin">
                            <i class="fas fa-spinner"></i>
                        </div>
                    </button>
                    <div class="text-center text-sm text-gray-500">
                        <i class="fas fa-info-circle mr-1"></i>
                        Pastikan semua data telah diisi dengan benar
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@push('script')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('editPendudukForm');
    const submitButton = document.getElementById('submitButton');
    const buttonText = submitButton.querySelector('span');
    const spinner = submitButton.querySelector('.animate-spin');

    // Form submission with loading state
    form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
            
            // Find first invalid field and scroll to it
            const firstInvalidField = form.querySelector(':invalid');
            if (firstInvalidField) {
                firstInvalidField.scrollIntoView({ 
                    behavior: 'smooth', 
                    block: 'center' 
                });
                firstInvalidField.focus();
            }
            
            // Highlight all invalid fields with animation
            Array.from(form.elements).forEach(element => {
                if (!element.checkValidity()) {
                    element.classList.remove('border-gray-200');
                    element.classList.add('border-red-400', 'shake-animation');
                    setTimeout(() => element.classList.remove('shake-animation'), 500);
                }
            });
            
            alert('Harap isi semua field yang wajib diisi dengan benar.');
        } else {
            // Show loading state
            submitButton.disabled = true;
            buttonText.textContent = 'MENYIMPAN PERUBAHAN...';
            spinner.classList.remove('hidden');
            
            // Add loading class to form
            form.classList.add('opacity-70', 'pointer-events-none');
        }
    }, false);

    // Real-time validation
    Array.from(form.elements).forEach(element => {
        element.addEventListener('input', () => {
            element.classList.remove('shake-animation');
            
            if (element.checkValidity()) {
                element.classList.remove('border-red-400');
                element.classList.add('border-gray-200');
            } else {
                element.classList.remove('border-gray-200');
                element.classList.add('border-red-400');
            }
        });

        // Enhanced focus effects
        element.addEventListener('focus', () => {
            element.style.transform = 'translateY(-2px)';
        });

        element.addEventListener('blur', () => {
            element.style.transform = '';
        });
    });
});
</script>
@endpush
