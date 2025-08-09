@extends('layouts.admin')

@section('title', 'Edit Data Penduduk')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Data Penduduk - {{ $penduduk->nama }}</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.data-kependudukan.update', $penduduk->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nik">NIK <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('nik') is-invalid @enderror" 
                                           id="nik" name="nik" value="{{ old('nik', $penduduk->nik) }}" maxlength="16" required>
                                    @error('nik')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                                           id="nama" name="nama" value="{{ old('nama', $penduduk->nama) }}" required>
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin <span class="text-danger">*</span></label>
                                    <select class="form-control @error('jenis_kelamin') is-invalid @enderror" 
                                            id="jenis_kelamin" name="jenis_kelamin" required>
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki" {{ old('jenis_kelamin', $penduduk->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="Perempuan" {{ old('jenis_kelamin', $penduduk->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Lahir <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" 
                                           id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir', $penduduk->tempat_lahir) }}" required>
                                    @error('tempat_lahir')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" 
                                           id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $penduduk->tanggal_lahir->format('Y-m-d')) }}" required>
                                    @error('tanggal_lahir')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="agama">Agama <span class="text-danger">*</span></label>
                                    <select class="form-control @error('agama') is-invalid @enderror" id="agama" name="agama" required>
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
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="status_perkawinan">Status Perkawinan <span class="text-danger">*</span></label>
                                    <select class="form-control @error('status_perkawinan') is-invalid @enderror" 
                                            id="status_perkawinan" name="status_perkawinan" required>
                                        <option value="">Pilih Status</option>
                                        <option value="Belum Kawin" {{ old('status_perkawinan', $penduduk->status_perkawinan) == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                                        <option value="Kawin" {{ old('status_perkawinan', $penduduk->status_perkawinan) == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                                        <option value="Cerai Hidup" {{ old('status_perkawinan', $penduduk->status_perkawinan) == 'Cerai Hidup' ? 'selected' : '' }}>Cerai Hidup</option>
                                        <option value="Cerai Mati" {{ old('status_perkawinan', $penduduk->status_perkawinan) == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
                                    </select>
                                    @error('status_perkawinan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="alamat">Alamat <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('alamat') is-invalid @enderror" 
                                              id="alamat" name="alamat" rows="3" required>{{ old('alamat', $penduduk->alamat) }}</textarea>
                                    @error('alamat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="rt">RT <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('rt') is-invalid @enderror" 
                                           id="rt" name="rt" value="{{ old('rt', $penduduk->rt) }}" maxlength="3" required>
                                    @error('rt')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="rw">RW <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('rw') is-invalid @enderror" 
                                           id="rw" name="rw" value="{{ old('rw', $penduduk->rw) }}" maxlength="3" required>
                                    @error('rw')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pekerjaan">Pekerjaan <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" 
                                           id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan', $penduduk->pekerjaan) }}" required>
                                    @error('pekerjaan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pendidikan">Pendidikan <span class="text-danger">*</span></label>
                                    <select class="form-control @error('pendidikan') is-invalid @enderror" 
                                            id="pendidikan" name="pendidikan" required>
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
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status_dalam_keluarga">Status dalam Keluarga <span class="text-danger">*</span></label>
                                    <select class="form-control @error('status_dalam_keluarga') is-invalid @enderror" 
                                            id="status_dalam_keluarga" name="status_dalam_keluarga" required>
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
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_kk">No. KK</label>
                                    <input type="text" class="form-control @error('no_kk') is-invalid @enderror" 
                                           id="no_kk" name="no_kk" value="{{ old('no_kk', $penduduk->no_kk) }}" maxlength="16">
                                    @error('no_kk')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nama_ayah">Nama Ayah</label>
                                    <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror" 
                                           id="nama_ayah" name="nama_ayah" value="{{ old('nama_ayah', $penduduk->nama_ayah) }}">
                                    @error('nama_ayah')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nama_ibu">Nama Ibu</label>
                                    <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror" 
                                           id="nama_ibu" name="nama_ibu" value="{{ old('nama_ibu', $penduduk->nama_ibu) }}">
                                    @error('nama_ibu')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="kewarganegaraan">Kewarganegaraan <span class="text-danger">*</span></label>
                                    <select class="form-control @error('kewarganegaraan') is-invalid @enderror" 
                                            id="kewarganegaraan" name="kewarganegaraan" required>
                                        <option value="WNI" {{ old('kewarganegaraan', $penduduk->kewarganegaraan) == 'WNI' ? 'selected' : '' }}>WNI</option>
                                        <option value="WNA" {{ old('kewarganegaraan', $penduduk->kewarganegaraan) == 'WNA' ? 'selected' : '' }}>WNA</option>
                                    </select>
                                    @error('kewarganegaraan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Status <span class="text-danger">*</span></label>
                                    <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                                        <option value="aktif" {{ old('status', $penduduk->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                        <option value="pindah" {{ old('status', $penduduk->status) == 'pindah' ? 'selected' : '' }}>Pindah</option>
                                        <option value="meninggal" {{ old('status', $penduduk->status) == 'meninggal' ? 'selected' : '' }}>Meninggal</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea class="form-control @error('keterangan') is-invalid @enderror" 
                                              id="keterangan" name="keterangan" rows="3">{{ old('keterangan', $penduduk->keterangan) }}</textarea>
                                    @error('keterangan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save"></i> Update
                            </button>
                            <a href="{{ route('admin.data-kependudukan.show', $penduduk->id) }}" class="btn btn-info">
                                <i class="fas fa-eye"></i> Lihat Detail
                            </a>
                            <a href="{{ route('admin.data-kependudukan.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
