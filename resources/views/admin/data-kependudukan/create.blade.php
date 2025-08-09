@extends('layouts.admin')

@section('title', 'Tambah Data Penduduk')

@section('content')
<div class="container-fluid py-4">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-lg bg-gradient-primary text-white rounded-lg">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <div class="icon-circle bg-white text-primary shadow-sm mr-4">
                                <i class="fas fa-user-plus fa-lg"></i>
                            </div>
                            <div>
                                <h2 class="mb-1 font-weight-bold">
                                    Tambah Data Penduduk
                                </h2>
                                <p class="mb-0 text-white-75">Lengkapi form berikut untuk menambah data penduduk baru</p>
                            </div>
                        </div>
                        <a href="{{ route('admin.data-kependudukan.index') }}" class="btn btn-light btn-lg shadow-sm rounded-pill">
                            <i class="fas fa-arrow-left mr-2"></i>Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Alert untuk error -->
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-triangle mr-2"></i>
            <strong>Error!</strong> {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle mr-2"></i>
            <strong>Berhasil!</strong> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-triangle mr-2"></i>
            <strong>Terdapat kesalahan pada input:</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Form -->
    <form action="{{ route('admin.data-kependudukan.store') }}" method="POST" id="pendudukForm">
        @csrf
        
        <!-- Data Pribadi -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-primary text-white py-3">
                        <h5 class="mb-0 font-weight-bold">
                            <i class="fas fa-user mr-2"></i>Data Pribadi
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="nik" class="form-label font-weight-bold text-dark">
                                        NIK <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" 
                                           class="form-control form-control-lg @error('nik') is-invalid @enderror" 
                                           id="nik" 
                                           name="nik" 
                                           value="{{ old('nik') }}" 
                                           maxlength="16" 
                                           placeholder="Masukkan 16 digit NIK"
                                           required>
                                    <small class="text-muted">Contoh: 3201012001010001</small>
                                    @error('nik')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="nama" class="form-label font-weight-bold text-dark">
                                        Nama Lengkap <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" 
                                           class="form-control form-control-lg @error('nama') is-invalid @enderror" 
                                           id="nama" 
                                           name="nama" 
                                           value="{{ old('nama') }}" 
                                           placeholder="Masukkan nama lengkap"
                                           required>
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <div class="form-group">
                                    <label for="jenis_kelamin" class="form-label font-weight-bold text-dark">
                                        Jenis Kelamin <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control form-control-lg @error('jenis_kelamin') is-invalid @enderror" 
                                            id="jenis_kelamin" name="jenis_kelamin" required>
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-4 mb-4">
                                <div class="form-group">
                                    <label for="tempat_lahir" class="form-label font-weight-bold text-dark">
                                        Tempat Lahir <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" 
                                           class="form-control form-control-lg @error('tempat_lahir') is-invalid @enderror" 
                                           id="tempat_lahir" 
                                           name="tempat_lahir" 
                                           value="{{ old('tempat_lahir') }}" 
                                           placeholder="Contoh: Jakarta"
                                           required>
                                    @error('tempat_lahir')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-4 mb-4">
                                <div class="form-group">
                                    <label for="tanggal_lahir" class="form-label font-weight-bold text-dark">
                                        Tanggal Lahir <span class="text-danger">*</span>
                                    </label>
                                    <input type="date" 
                                           class="form-control form-control-lg @error('tanggal_lahir') is-invalid @enderror" 
                                           id="tanggal_lahir" 
                                           name="tanggal_lahir" 
                                           value="{{ old('tanggal_lahir') }}" 
                                           required>
                                    @error('tanggal_lahir')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <div class="form-group">
                                    <label for="agama" class="form-label font-weight-bold text-dark">
                                        Agama <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control form-control-lg @error('agama') is-invalid @enderror" 
                                            id="agama" name="agama" required>
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
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-4 mb-4">
                                <div class="form-group">
                                    <label for="status_perkawinan" class="form-label font-weight-bold text-dark">
                                        Status Perkawinan <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control form-control-lg @error('status_perkawinan') is-invalid @enderror" 
                                            id="status_perkawinan" name="status_perkawinan" required>
                                        <option value="">Pilih Status</option>
                                        <option value="Belum Kawin" {{ old('status_perkawinan') == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                                        <option value="Kawin" {{ old('status_perkawinan') == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                                        <option value="Cerai Hidup" {{ old('status_perkawinan') == 'Cerai Hidup' ? 'selected' : '' }}>Cerai Hidup</option>
                                        <option value="Cerai Mati" {{ old('status_perkawinan') == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
                                    </select>
                                    @error('status_perkawinan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-4 mb-4">
                                <div class="form-group">
                                    <label for="kewarganegaraan" class="form-label font-weight-bold text-dark">
                                        Kewarganegaraan <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control form-control-lg @error('kewarganegaraan') is-invalid @enderror" 
                                            id="kewarganegaraan" name="kewarganegaraan" required>
                                        <option value="WNI" {{ old('kewarganegaraan', 'WNI') == 'WNI' ? 'selected' : '' }}>WNI</option>
                                        <option value="WNA" {{ old('kewarganegaraan') == 'WNA' ? 'selected' : '' }}>WNA</option>
                                    </select>
                                    @error('kewarganegaraan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Alamat -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-info text-white py-3">
                        <h5 class="mb-0 font-weight-bold">
                            <i class="fas fa-map-marker-alt mr-2"></i>Data Alamat
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-md-8 mb-4">
                                <div class="form-group">
                                    <label for="alamat" class="form-label font-weight-bold text-dark">
                                        Alamat <span class="text-danger">*</span>
                                    </label>
                                    <textarea class="form-control @error('alamat') is-invalid @enderror" 
                                              id="alamat" 
                                              name="alamat" 
                                              rows="4" 
                                              placeholder="Masukkan alamat lengkap"
                                              required>{{ old('alamat') }}</textarea>
                                    @error('alamat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-2 mb-4">
                                <div class="form-group">
                                    <label for="rt" class="form-label font-weight-bold text-dark">
                                        RT <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" 
                                           class="form-control form-control-lg @error('rt') is-invalid @enderror" 
                                           id="rt" 
                                           name="rt" 
                                           value="{{ old('rt') }}" 
                                           maxlength="3" 
                                           placeholder="001"
                                           required>
                                    @error('rt')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-2 mb-4">
                                <div class="form-group">
                                    <label for="rw" class="form-label font-weight-bold text-dark">
                                        RW <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" 
                                           class="form-control form-control-lg @error('rw') is-invalid @enderror" 
                                           id="rw" 
                                           name="rw" 
                                           value="{{ old('rw') }}" 
                                           maxlength="3" 
                                           placeholder="001"
                                           required>
                                    @error('rw')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Pekerjaan & Pendidikan -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-success text-white py-3">
                        <h5 class="mb-0 font-weight-bold">
                            <i class="fas fa-briefcase mr-2"></i>Data Pekerjaan & Pendidikan
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="pekerjaan" class="form-label font-weight-bold text-dark">
                                        Pekerjaan <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" 
                                           class="form-control form-control-lg @error('pekerjaan') is-invalid @enderror" 
                                           id="pekerjaan" 
                                           name="pekerjaan" 
                                           value="{{ old('pekerjaan') }}" 
                                           placeholder="Contoh: Petani, PNS, Swasta"
                                           required>
                                    @error('pekerjaan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="pendidikan" class="form-label font-weight-bold text-dark">
                                        Pendidikan <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control form-control-lg @error('pendidikan') is-invalid @enderror" 
                                            id="pendidikan" name="pendidikan" required>
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
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Keluarga -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-warning text-white py-3">
                        <h5 class="mb-0 font-weight-bold">
                            <i class="fas fa-users mr-2"></i>Data Keluarga
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="status_dalam_keluarga" class="form-label font-weight-bold text-dark">
                                        Status dalam Keluarga <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control form-control-lg @error('status_dalam_keluarga') is-invalid @enderror" 
                                            id="status_dalam_keluarga" name="status_dalam_keluarga" required>
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
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="no_kk" class="form-label font-weight-bold text-dark">
                                        No. KK
                                    </label>
                                    <input type="text" 
                                           class="form-control form-control-lg @error('no_kk') is-invalid @enderror" 
                                           id="no_kk" 
                                           name="no_kk" 
                                           value="{{ old('no_kk') }}" 
                                           maxlength="16"
                                           placeholder="Masukkan 16 digit nomor KK">
                                    <small class="text-muted">Opsional - Nomor Kartu Keluarga</small>
                                    @error('no_kk')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="nama_ayah" class="form-label font-weight-bold text-dark">
                                        Nama Ayah
                                    </label>
                                    <input type="text" 
                                           class="form-control form-control-lg @error('nama_ayah') is-invalid @enderror" 
                                           id="nama_ayah" 
                                           name="nama_ayah" 
                                           value="{{ old('nama_ayah') }}"
                                           placeholder="Nama lengkap ayah">
                                    @error('nama_ayah')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="nama_ibu" class="form-label font-weight-bold text-dark">
                                        Nama Ibu
                                    </label>
                                    <input type="text" 
                                           class="form-control form-control-lg @error('nama_ibu') is-invalid @enderror" 
                                           id="nama_ibu" 
                                           name="nama_ibu" 
                                           value="{{ old('nama_ibu') }}"
                                           placeholder="Nama lengkap ibu">
                                    @error('nama_ibu')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Status & Keterangan -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-secondary text-white py-3">
                        <h5 class="mb-0 font-weight-bold">
                            <i class="fas fa-info-circle mr-2"></i>Status & Keterangan
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="status" class="form-label font-weight-bold text-dark">
                                        Status <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control form-control-lg @error('status') is-invalid @enderror" 
                                            id="status" name="status" required>
                                        <option value="aktif" {{ old('status', 'aktif') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                        <option value="pindah" {{ old('status') == 'pindah' ? 'selected' : '' }}>Pindah</option>
                                        <option value="meninggal" {{ old('status') == 'meninggal' ? 'selected' : '' }}>Meninggal</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="keterangan" class="form-label font-weight-bold text-dark">
                                        Keterangan
                                    </label>
                                    <textarea class="form-control @error('keterangan') is-invalid @enderror" 
                                              id="keterangan" 
                                              name="keterangan" 
                                              rows="4"
                                              placeholder="Keterangan tambahan (opsional)">{{ old('keterangan') }}</textarea>
                                    @error('keterangan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between">
                            <button type="reset" class="btn btn-outline-secondary btn-lg">
                                <i class="fas fa-redo mr-2"></i>Reset Form
                            </button>
                            <button type="submit" class="btn btn-success btn-lg px-5">
                                <i class="fas fa-save mr-2"></i>Simpan Data Penduduk
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<style>
    .bg-gradient-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    
    .card {
        border-radius: 20px !important;
        overflow: hidden;
        transition: all 0.3s ease;
        border: none;
    }
    
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 1rem 3rem rgba(0,0,0,.175) !important;
    }
    
    .card-header {
        border-bottom: none;
    }
    
    .rounded-lg {
        border-radius: 20px !important;
    }
    
    .shadow-lg {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175) !important;
    }
    
    .text-white-75 {
        color: rgba(255, 255, 255, 0.75) !important;
    }
    
    .icon-circle {
        height: 60px;
        width: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .rounded-pill {
        border-radius: 50rem !important;
    }
    
    .btn {
        border-radius: 25px !important;
        font-weight: 600;
        padding: 12px 24px;
        transition: all 0.3s ease;
        border: none;
    }
    
    .btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }
    
    .form-control {
        border-radius: 15px !important;
        border: 2px solid #e3e6f0;
        padding: 15px 20px;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        background-color: #fff;
    }
    
    .form-control:focus {
        border-color: #4e73df;
        box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
        transform: scale(1.02);
        background-color: #fff;
    }
    
    .form-label {
        font-weight: 600;
        color: #5a5c69;
        margin-bottom: 8px;
    }
    
    textarea.form-control {
        resize: vertical;
        min-height: 120px;
    }
    
    .bg-light {
        background-color: #f8f9fc !important;
    }
    
    .font-weight-bold {
        font-weight: 700 !important;
    }
    
    .text-danger {
        color: #e74a3b !important;
    }
    
    .alert {
        border-radius: 15px !important;
        border: none;
        padding: 1.25rem 1.5rem;
    }
    
    .alert-danger {
        background: linear-gradient(135deg, #e74a3b 0%, #c0392b 100%);
        color: white;
    }
    
    .alert-success {
        background: linear-gradient(135deg, #1cc88a 0%, #13855c 100%);
        color: white;
    }
    
    @media (max-width: 768px) {
        .d-flex.justify-content-between {
            flex-direction: column;
            align-items: flex-start !important;
            gap: 1rem;
        }
    }
</style>

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
@endsection
