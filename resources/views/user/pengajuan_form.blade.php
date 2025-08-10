{{-- Form pengajuan surat oleh user --}}
@extends('layouts.user')
@section('content')
<div class="min-h-screen bg-gradient-to-br from-emerald-50 via-white to-teal-50 flex items-center justify-center py-6 md:py-10">
    <div class="w-full max-w-3xl mx-auto px-2 sm:px-4 md:px-8">
        <!-- Enhanced Page Header -->
        <div class="text-center mb-8 md:mb-10">
            <div class="inline-flex items-center justify-center w-14 h-14 md:w-16 md:h-16 bg-gradient-to-r from-emerald-600 to-teal-600 text-white rounded-full mb-4 shadow-lg">
                <i class="fas fa-file-plus text-xl md:text-2xl"></i>
            </div>
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2 md:mb-3">Form Pengajuan Surat</h1>
            <p class="text-gray-600 text-base md:text-lg max-w-2xl mx-auto">
                Silakan isi form berikut dengan lengkap dan benar untuk mengajukan surat yang Anda butuhkan
            </p>
        </div>

        <!-- Alert Messages -->
        @if(session('success'))
            <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-6 py-4 rounded-xl mb-6 flex items-start space-x-3 shadow-sm">
                <i class="fas fa-check-circle mt-1 text-emerald-600"></i>
                <div>
                    <strong>Berhasil!</strong> {{ session('success') }}
                </div>
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-800 px-6 py-4 rounded-xl mb-6 flex items-start space-x-3 shadow-sm">
                <i class="fas fa-exclamation-triangle mt-1 text-red-600"></i>
                <div>
                    <strong>Terjadi kesalahan:</strong>
                    <ul class="mt-2 list-disc list-inside space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <form method="POST" action="{{ url('user/pengajuan/form') }}" enctype="multipart/form-data" id="pengajuanForm" class="space-y-6 md:space-y-8">
            @csrf
            <!-- Step 1: Data Pribadi -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-4 sm:p-6 md:p-8 mb-6 md:mb-8 hover:shadow-xl transition-all duration-300">
                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-6 mb-6 md:mb-8 pb-4 md:pb-6 border-b border-gray-200">
                    <div class="flex items-center justify-center w-10 h-10 md:w-12 md:h-12 bg-gradient-to-r from-emerald-600 to-teal-600 text-white rounded-full font-bold text-base md:text-lg flex-shrink-0 shadow-lg mb-3 sm:mb-0">
                        1
                    </div>
                    <div>
                        <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-1">Data Pribadi</h2>
                        <p class="text-gray-600 text-sm md:text-base">Masukkan data pribadi Anda dengan lengkap</p>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-user mr-2 text-emerald-600"></i>
                            Nama Lengkap
                        </label>
                        <input type="text" name="nama_lengkap" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-600 focus:border-transparent transition-all duration-200 hover:border-emerald-600/50" 
                               value="{{ old('nama_lengkap') }}" required 
                               placeholder="Masukkan nama lengkap sesuai KTP">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-map-marker-alt mr-2 text-emerald-500"></i>
                            Tempat, Tanggal Lahir
                        </label>
                        <input type="text" name="ttl" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-600 focus:border-transparent transition-all duration-200 hover:border-emerald-600/50" 
                               value="{{ old('ttl') }}" required 
                               placeholder="Contoh: Bandung, 01-01-2000">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-venus-mars mr-2 text-purple-500"></i>
                            Jenis Kelamin
                        </label>
                        <select name="jenis_kelamin" 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-600 focus:border-transparent transition-all duration-200 hover:border-emerald-600/50" 
                                required>
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-id-card mr-2 text-yellow-500"></i>
                            NIK
                        </label>
                        <input type="text" name="nik" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-600 focus:border-transparent transition-all duration-200 hover:border-emerald-600/50" 
                               value="{{ old('nik') }}" required 
                               placeholder="Masukkan NIK 16 digit" maxlength="16">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-home mr-2 text-indigo-500"></i>
                            Nomor KK
                        </label>
                        <input type="text" name="no_kk" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-600 focus:border-transparent transition-all duration-200 hover:border-emerald-600/50" 
                               value="{{ old('no_kk') }}" required 
                               placeholder="Masukkan nomor KK 16 digit" maxlength="16">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-pray mr-2 text-teal-500"></i>
                            Agama
                        </label>
                        <select name="agama" 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-600 focus:border-transparent transition-all duration-200 hover:border-emerald-600/50" 
                                required>
                            <option value="">-- Pilih Agama --</option>
                            <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                            <option value="Kristen" {{ old('agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                            <option value="Katolik" {{ old('agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                            <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                            <option value="Buddha" {{ old('agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                            <option value="Konghucu" {{ old('agama') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-briefcase mr-2 text-orange-500"></i>
                            Pekerjaan
                        </label>
                        <input type="text" name="pekerjaan" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-600 focus:border-transparent transition-all duration-200 hover:border-emerald-600/50" 
                               value="{{ old('pekerjaan') }}" required 
                               placeholder="Masukkan pekerjaan">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-ring mr-2 text-pink-500"></i>
                            Status Perkawinan
                        </label>
                        <select name="status_perkawinan" 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-600 focus:border-transparent transition-all duration-200 hover:border-emerald-600/50" 
                                required>
                            <option value="">-- Pilih Status --</option>
                            <option value="Belum Kawin" {{ old('status_perkawinan') == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                            <option value="Kawin" {{ old('status_perkawinan') == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                            <option value="Cerai Hidup" {{ old('status_perkawinan') == 'Cerai Hidup' ? 'selected' : '' }}>Cerai Hidup</option>
                            <option value="Cerai Mati" {{ old('status_perkawinan') == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-phone mr-2 text-emerald-500"></i>
                            No. Telepon/HP
                        </label>
                        <input type="tel" name="no_hp" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-600 focus:border-transparent transition-all duration-200 hover:border-emerald-600/50" 
                               value="{{ old('no_hp') }}" required 
                               placeholder="Masukkan nomor telepon aktif">
                    </div>
                    
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-map mr-2 text-red-500"></i>
                            Alamat Lengkap
                        </label>
                        <textarea name="alamat" rows="3" 
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-600 focus:border-transparent transition-all duration-200 hover:border-emerald-600/50" 
                                  required 
                                  placeholder="Masukkan alamat lengkap sesuai KTP">{{ old('alamat') }}</textarea>
                    </div>
                    
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-clipboard-list mr-2 text-cyan-500"></i>
                            Tujuan Permohonan Surat
                        </label>
                        <textarea name="tujuan_permohonan" rows="3" 
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-600 focus:border-transparent transition-all duration-200 hover:border-emerald-600/50" 
                                  required 
                                  placeholder="Jelaskan tujuan penggunaan surat yang akan dibuat">{{ old('tujuan_permohonan') }}</textarea>
                    </div>
                </div>
            </div>            <!-- Step 2: Jenis Surat -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-4 sm:p-6 md:p-8 mb-6 md:mb-8 hover:shadow-xl transition-all duration-300">
                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-6 mb-6 md:mb-8 pb-4 md:pb-6 border-b border-gray-200">
                    <div class="flex items-center justify-center w-10 h-10 md:w-12 md:h-12 bg-gradient-to-r from-emerald-500 to-emerald-600 text-white rounded-full font-bold text-base md:text-lg flex-shrink-0 shadow-lg mb-3 sm:mb-0">
                        2
                    </div>
                    <div>
                        <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-1">Jenis Surat</h2>
                        <p class="text-gray-600 text-sm md:text-base">Pilih jenis surat yang ingin Anda ajukan</p>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-file-contract mr-2 text-emerald-600"></i>
                        Jenis Surat yang Diajukan
                    </label>
                    <select name="jenis_surat_id" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-600 focus:border-transparent transition-all duration-200 hover:border-emerald-600/50" 
                            required id="jenisSuratSelect">
                        <option value="">-- Pilih Jenis Surat --</option>
                        <option value="ktp_kk" {{ old('jenis_surat_id') == 'ktp_kk' ? 'selected' : '' }}>Surat Pengantar Pembuatan KTP/KK</option>
                        <option value="domisili" {{ old('jenis_surat_id') == 'domisili' ? 'selected' : '' }}>Surat Keterangan Domisili</option>
                        <option value="sktm" {{ old('jenis_surat_id') == 'sktm' ? 'selected' : '' }}>Surat Keterangan Tidak Mampu (SKTM)</option>
                        <option value="skck" {{ old('jenis_surat_id') == 'skck' ? 'selected' : '' }}>Surat Pengantar SKCK</option>
                        <option value="penelitian" {{ old('jenis_surat_id') == 'penelitian' ? 'selected' : '' }}>Surat Izin Penelitian/Kegiatan</option>
                        @foreach($jenisSurats as $jenis)
                            @if($jenis->id > 5)
                                <option value="{{ $jenis->id }}" {{ old('jenis_surat_id') == $jenis->id ? 'selected' : '' }}>{{ $jenis->nama }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Step 3: Data Tambahan -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-4 sm:p-6 md:p-8 mb-6 md:mb-8 hover:shadow-xl transition-all duration-300" id="dataTambahanSection" style="display: none;">
                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-6 mb-6 md:mb-8 pb-4 md:pb-6 border-b border-gray-200">
                    <div class="flex items-center justify-center w-10 h-10 md:w-12 md:h-12 bg-gradient-to-r from-purple-500 to-purple-600 text-white rounded-full font-bold text-base md:text-lg flex-shrink-0 shadow-lg mb-3 sm:mb-0">
                        3
                    </div>
                    <div>
                        <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-1">Data Tambahan</h2>
                        <p class="text-gray-600 text-sm md:text-base">Lengkapi data sesuai dengan jenis surat yang dipilih</p>
                    </div>
                </div>
                <div id="dataTambahan"></div>
            </div>

            <!-- Submit Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center mt-4">
                <button type="submit" 
                        class="w-full sm:w-auto inline-flex items-center justify-center px-6 md:px-8 py-3 md:py-4 bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-medium rounded-xl hover:from-teal-600 hover:to-emerald-600 focus:ring-4 focus:ring-emerald-600/20 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 text-base md:text-lg">
                    <i class="fas fa-paper-plane mr-2"></i>
                    Ajukan Surat
                </button>
                <button type="reset" 
                        class="w-full sm:w-auto inline-flex items-center justify-center px-6 md:px-8 py-3 md:py-4 bg-gray-100 text-gray-700 font-medium rounded-xl hover:bg-gray-200 focus:ring-4 focus:ring-gray-200 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 text-base md:text-lg">
                    <i class="fas fa-undo mr-2"></i>
                    Reset Form
                </button>
            </div>
        </form>
    </div>
</div>

<script>
const dataTambahan = {
    ktp_kk: `
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-list mr-2 text-emerald-600"></i> Jenis Permohonan
                </label>
                <select name="data[jenis_permohonan]" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-600 focus:border-transparent transition-all duration-200 hover:border-emerald-600/50" required>
                    <option value="">-- Pilih Jenis Permohonan --</option>
                    <option value="Baru">Baru</option>
                    <option value="Perubahan">Perubahan</option>
                    <option value="Hilang">Hilang</option>
                    <option value="Pindah">Pindah</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-comment mr-2 text-emerald-500"></i> Alasan Pengajuan
                </label>
                <input type="text" name="data[alasan_pengajuan]" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-600 focus:border-transparent transition-all duration-200 hover:border-emerald-600/50" placeholder="Jelaskan alasan pengajuan" required>
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-paperclip mr-2 text-purple-500"></i> Lampiran Dokumen
                </label>
                <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-emerald-600/50 transition-colors duration-200">
                    <input type="file" name="data[lampiran]" id="lampiran_ktp" accept=".pdf,.jpg,.jpeg,.png" class="hidden">
                    <label for="lampiran_ktp" class="cursor-pointer flex flex-col items-center space-y-2">
                        <i class="fas fa-cloud-upload-alt text-3xl text-emerald-600"></i>
                        <span class="text-gray-600">Klik untuk upload file</span>
                        <small class="text-gray-500">Format: PDF, JPG, PNG (Max: 2MB)</small>
                    </label>
                </div>
            </div>
        </div>
    `,
    domisili: `
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-calendar mr-2 text-emerald-600"></i> Lama Tinggal
                </label>
                <input type="text" name="data[lama_tinggal]" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-600 focus:border-transparent transition-all duration-200 hover:border-emerald-600/50" placeholder="Contoh: 2 tahun" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-user mr-2 text-emerald-500"></i> Nama Pemilik Rumah
                </label>
                <input type="text" name="data[nama_pemilik_rumah]" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-600 focus:border-transparent transition-all duration-200 hover:border-emerald-600/50" placeholder="Nama pemilik rumah (jika berbeda)">
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-home mr-2 text-purple-500"></i> Status Tempat Tinggal
                </label>
                <select name="data[status_tempat_tinggal]" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-600 focus:border-transparent transition-all duration-200 hover:border-emerald-600/50" required>
                    <option value="">-- Pilih Status --</option>
                    <option value="Milik Sendiri">Milik Sendiri</option>
                    <option value="Kontrak">Kontrak</option>
                    <option value="Menumpang">Menumpang</option>
                </select>
            </div>
        </div>
    `,
    sktm: `
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-clipboard-check mr-2 text-emerald-600"></i> Penggunaan Surat
                </label>
                <select name="data[penggunaan_surat]" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-600 focus:border-transparent transition-all duration-200 hover:border-emerald-600/50" required>
                    <option value="">-- Pilih Penggunaan --</option>
                    <option value="Beasiswa">Beasiswa</option>
                    <option value="Kesehatan">Kesehatan</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-money-bill mr-2 text-emerald-500"></i> Pendapatan Per Bulan
                </label>
                <input type="text" name="data[pendapatan]" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-600 focus:border-transparent transition-all duration-200 hover:border-emerald-600/50" placeholder="Contoh: Rp 1.000.000">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-users mr-2 text-purple-500"></i> Jumlah Tanggungan Keluarga
                </label>
                <input type="number" name="data[jumlah_tanggungan]" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-600 focus:border-transparent transition-all duration-200 hover:border-emerald-600/50" placeholder="Jumlah anggota keluarga" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-paperclip mr-2 text-orange-500"></i> Lampiran Dokumen
                </label>
                <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-emerald-600/50 transition-colors duration-200">
                    <input type="file" name="data[lampiran]" id="lampiran_sktm" accept=".pdf,.jpg,.jpeg,.png" class="hidden">
                    <label for="lampiran_sktm" class="cursor-pointer flex flex-col items-center space-y-2">
                        <i class="fas fa-cloud-upload-alt text-3xl text-emerald-600"></i>
                        <span class="text-gray-600">Klik untuk upload file</span>
                        <small class="text-gray-500">Format: PDF, JPG, PNG (Max: 2MB)</small>
                    </label>
                </div>
            </div>
        </div>
    `,
    skck: `
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-bullseye mr-2 text-emerald-600"></i> Tujuan Pembuatan SKCK
                </label>
                <input type="text" name="data[tujuan_skck]" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-600 focus:border-transparent transition-all duration-200 hover:border-emerald-600/50" placeholder="Contoh: Melamar Kerja" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-building mr-2 text-emerald-500"></i> Keperluan SKCK Ditujukan ke
                </label>
                <input type="text" name="data[keperluan_skck]" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-600 focus:border-transparent transition-all duration-200 hover:border-emerald-600/50" placeholder="Contoh: PT ABC, Instansi XYZ" required>
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-map-marker-alt mr-2 text-purple-500"></i> Riwayat Tempat Tinggal 5 Tahun Terakhir
                </label>
                <textarea name="data[riwayat_tinggal]" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-600 focus:border-transparent transition-all duration-200 hover:border-emerald-600/50" rows="3" placeholder="Sebutkan alamat tempat tinggal 5 tahun terakhir" required></textarea>
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-paperclip mr-2 text-orange-500"></i> Lampiran (KTP, KK, Pas Photo)
                </label>
                <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-emerald-600/50 transition-colors duration-200">
                    <input type="file" name="data[lampiran]" id="lampiran_skck" accept=".pdf,.jpg,.jpeg,.png" class="hidden">
                    <label for="lampiran_skck" class="cursor-pointer flex flex-col items-center space-y-2">
                        <i class="fas fa-cloud-upload-alt text-3xl text-emerald-600"></i>
                        <span class="text-gray-600">Klik untuk upload file</span>
                        <small class="text-gray-500">Format: PDF, JPG, PNG (Max: 2MB)</small>
                    </label>
                </div>
            </div>
        </div>
    `,
    penelitian: `
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-university mr-2 text-emerald-600"></i> Instansi/Lembaga/Universitas
                </label>
                <input type="text" name="data[instansi]" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-600 focus:border-transparent transition-all duration-200 hover:border-emerald-600/50" placeholder="Nama instansi/universitas" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-book mr-2 text-emerald-500"></i> Judul Kegiatan/Penelitian
                </label>
                <input type="text" name="data[judul]" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-600 focus:border-transparent transition-all duration-200 hover:border-emerald-600/50" placeholder="Judul penelitian/kegiatan" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-clock mr-2 text-purple-500"></i> Waktu Pelaksanaan
                </label>
                <input type="text" name="data[waktu]" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-600 focus:border-transparent transition-all duration-200 hover:border-emerald-600/50" placeholder="Contoh: 01-08-2025 s/d 10-08-2025" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-map-marker-alt mr-2 text-orange-500"></i> Lokasi Kegiatan
                </label>
                <input type="text" name="data[lokasi]" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-600 focus:border-transparent transition-all duration-200 hover:border-emerald-600/50" placeholder="Lokasi pelaksanaan kegiatan" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-user-tie mr-2 text-cyan-500"></i> Nama Pembimbing/PIC
                </label>
                <input type="text" name="data[pembimbing]" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-600 focus:border-transparent transition-all duration-200 hover:border-emerald-600/50" placeholder="Nama pembimbing atau penanggung jawab">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-paperclip mr-2 text-pink-500"></i> Lampiran Dokumen
                </label>
                <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-emerald-600/50 transition-colors duration-200">
                    <input type="file" name="data[lampiran]" id="lampiran_penelitian" accept=".pdf,.jpg,.jpeg,.png" class="hidden">
                    <label for="lampiran_penelitian" class="cursor-pointer flex flex-col items-center space-y-2">
                        <i class="fas fa-cloud-upload-alt text-3xl text-emerald-600"></i>
                        <span class="text-gray-600">Klik untuk upload file</span>
                        <small class="text-gray-500">Format: PDF, JPG, PNG (Max: 2MB)</small>
                    </label>
                </div>
            </div>
        </div>
    `,
    default: `
        <div class="grid grid-cols-1 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-comment-alt mr-2 text-emerald-600"></i> Keterangan Tambahan
                </label>
                <textarea name="data[keterangan]" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-600 focus:border-transparent transition-all duration-200 hover:border-emerald-600/50" rows="3" placeholder="Berikan keterangan tambahan jika diperlukan"></textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-paperclip mr-2 text-emerald-500"></i> Lampiran Dokumen
                </label>
                <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-emerald-600/50 transition-colors duration-200">
                    <input type="file" name="data[lampiran]" id="lampiran_default" accept=".pdf,.jpg,.jpeg,.png" class="hidden">
                    <label for="lampiran_default" class="cursor-pointer flex flex-col items-center space-y-2">
                        <i class="fas fa-cloud-upload-alt text-3xl text-emerald-600"></i>
                        <span class="text-gray-600">Klik untuk upload file</span>
                        <small class="text-gray-500">Format: PDF, JPG, PNG (Max: 2MB)</small>
                    </label>
                </div>
            </div>
        </div>
    `
};

document.getElementById('jenisSuratSelect').addEventListener('change', function() {
    const val = this.value;
    const container = document.getElementById('dataTambahan');
    const section = document.getElementById('dataTambahanSection');
    
    // Reset container
    container.innerHTML = '';
    
    if (val) {
        // Tampilkan section
        section.style.display = 'block';
        
        // Tampilkan field sesuai jenis surat
        if (dataTambahan[val]) {
            container.innerHTML = dataTambahan[val];
        } else if (val && !isNaN(val)) {
            // Jika nilai adalah angka (ID dari database), tampilkan form default
            container.innerHTML = dataTambahan.default;
        }
    } else {
        // Sembunyikan section
        section.style.display = 'none';
    }
});

// File upload handler
document.addEventListener('change', function(e) {
    if (e.target.type === 'file') {
        const file = e.target.files[0];
        const label = e.target.nextElementSibling;
        
        if (file) {
            label.querySelector('span').textContent = file.name;
            label.style.color = '#10b981';
        } else {
            label.querySelector('span').textContent = 'Klik untuk upload file';
            label.style.color = '#64748b';
        }
    }
});

// Form validation
document.getElementById('pengajuanForm').addEventListener('submit', function(e) {
    const requiredFields = this.querySelectorAll('[required]');
    let isValid = true;
    
    requiredFields.forEach(field => {
        if (!field.value.trim()) {
            isValid = false;
            field.classList.add('border-red-500', 'ring-2', 'ring-red-200');
            field.classList.remove('border-gray-300');
        } else {
            field.classList.remove('border-red-500', 'ring-2', 'ring-red-200');
            field.classList.add('border-gray-300');
        }
    });
    
    if (!isValid) {
        e.preventDefault();
        alert('Mohon lengkapi semua field yang wajib diisi!');
    }
});
</script>
@endsection

