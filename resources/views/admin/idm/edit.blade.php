@extends('layouts.admin')

@section('title', 'Edit Data IDM')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.idm.index') }}">IDM DESA</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.idm.show', $idm) }}">Detail {{ $idm->tahun }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </nav>
            <h1 class="h3 mb-0 text-gray-800">
                <i class="fas fa-edit text-warning mr-2"></i>
                Edit Data IDM DESA {{ $idm->tahun }}
            </h1>
            <p class="text-muted mb-0">Perbarui data Indeks Desa Membangun untuk tahun {{ $idm->tahun }}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-edit mr-2"></i>Form Edit Data IDM
                    </h6>
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <h6><i class="fas fa-exclamation-triangle mr-2"></i>Terdapat kesalahan:</h6>
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.idm.update', $idm) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <!-- Basic Information -->
                            <div class="col-lg-6">
                                <div class="card border-left-primary mb-4">
                                    <div class="card-header bg-light">
                                        <h6 class="m-0 font-weight-bold text-primary">Informasi Dasar</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="tahun" class="form-label font-weight-bold">
                                                <i class="fas fa-calendar mr-1"></i>Tahun
                                            </label>
                                            <input type="number" 
                                                   class="form-control @error('tahun') is-invalid @enderror" 
                                                   id="tahun" 
                                                   name="tahun" 
                                                   value="{{ old('tahun', $idm->tahun) }}" 
                                                   min="2020" 
                                                   max="{{ date('Y') + 5 }}" 
                                                   required>
                                            @error('tahun')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="skor_idm" class="form-label font-weight-bold">
                                                <i class="fas fa-chart-bar mr-1"></i>Skor IDM Total
                                            </label>
                                            <input type="number" 
                                                   class="form-control @error('skor_idm') is-invalid @enderror" 
                                                   id="skor_idm" 
                                                   name="skor_idm" 
                                                   value="{{ old('skor_idm', $idm->skor_idm) }}" 
                                                   step="0.001" 
                                                   min="0" 
                                                   max="1000" 
                                                   required>
                                            @error('skor_idm')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <small class="form-text text-muted">Masukkan skor dengan 3 digit desimal (contoh: 65.500)</small>
                                        </div>

                                        <div class="form-group">
                                            <label for="status_idm" class="form-label font-weight-bold">
                                                <i class="fas fa-flag mr-1"></i>Status IDM
                                            </label>
                                            <select class="form-control @error('status_idm') is-invalid @enderror" 
                                                    id="status_idm" 
                                                    name="status_idm" 
                                                    required>
                                                <option value="">Pilih Status</option>
                                                <option value="Sangat Tertinggal" {{ old('status_idm', $idm->status_idm) == 'Sangat Tertinggal' ? 'selected' : '' }}>Sangat Tertinggal</option>
                                                <option value="Tertinggal" {{ old('status_idm', $idm->status_idm) == 'Tertinggal' ? 'selected' : '' }}>Tertinggal</option>
                                                <option value="Berkembang" {{ old('status_idm', $idm->status_idm) == 'Berkembang' ? 'selected' : '' }}>Berkembang</option>
                                                <option value="Maju" {{ old('status_idm', $idm->status_idm) == 'Maju' ? 'selected' : '' }}>Maju</option>
                                                <option value="Mandiri" {{ old('status_idm', $idm->status_idm) == 'Mandiri' ? 'selected' : '' }}>Mandiri</option>
                                            </select>
                                            @error('status_idm')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="target_tahun_depan" class="form-label font-weight-bold">
                                                <i class="fas fa-bullseye mr-1"></i>Target Tahun Depan
                                            </label>
                                            <input type="number" 
                                                   class="form-control @error('target_tahun_depan') is-invalid @enderror" 
                                                   id="target_tahun_depan" 
                                                   name="target_tahun_depan" 
                                                   value="{{ old('target_tahun_depan', $idm->target_tahun_depan) }}" 
                                                   step="0.001" 
                                                   min="0" 
                                                   max="1000">
                                            @error('target_tahun_depan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <small class="form-text text-muted">Opsional - Target skor untuk tahun berikutnya</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Component Scores -->
                            <div class="col-lg-6">
                                <div class="card border-left-success mb-4">
                                    <div class="card-header bg-light">
                                        <h6 class="m-0 font-weight-bold text-success">Komponen Indeks</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="skor_iks" class="form-label font-weight-bold text-danger">
                                                <i class="fas fa-users mr-1"></i>Skor IKS (Indeks Ketahanan Sosial)
                                            </label>
                                            <input type="number" 
                                                   class="form-control @error('skor_iks') is-invalid @enderror" 
                                                   id="skor_iks" 
                                                   name="skor_iks" 
                                                   value="{{ old('skor_iks', $idm->skor_iks) }}" 
                                                   step="0.001" 
                                                   min="0" 
                                                   max="1000" 
                                                   required>
                                            @error('skor_iks')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="skor_ike" class="form-label font-weight-bold text-success">
                                                <i class="fas fa-chart-line mr-1"></i>Skor IKE (Indeks Ketahanan Ekonomi)
                                            </label>
                                            <input type="number" 
                                                   class="form-control @error('skor_ike') is-invalid @enderror" 
                                                   id="skor_ike" 
                                                   name="skor_ike" 
                                                   value="{{ old('skor_ike', $idm->skor_ike) }}" 
                                                   step="0.001" 
                                                   min="0" 
                                                   max="1000" 
                                                   required>
                                            @error('skor_ike')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="skor_ikl" class="form-label font-weight-bold text-info">
                                                <i class="fas fa-leaf mr-1"></i>Skor IKL (Indeks Ketahanan Lingkungan)
                                            </label>
                                            <input type="number" 
                                                   class="form-control @error('skor_ikl') is-invalid @enderror" 
                                                   id="skor_ikl" 
                                                   name="skor_ikl" 
                                                   value="{{ old('skor_ikl', $idm->skor_ikl) }}" 
                                                   step="0.001" 
                                                   min="0" 
                                                   max="1000" 
                                                   required>
                                            @error('skor_ikl')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Optional Dimensions -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card border-left-info mb-4">
                                    <div class="card-header bg-light">
                                        <h6 class="m-0 font-weight-bold text-info">Dimensi Detail (Opsional)</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="dimensi_sosial" class="form-label font-weight-bold text-danger">
                                                        <i class="fas fa-users mr-1"></i>Dimensi Sosial
                                                    </label>
                                                    <input type="number" 
                                                           class="form-control @error('dimensi_sosial') is-invalid @enderror" 
                                                           id="dimensi_sosial" 
                                                           name="dimensi_sosial" 
                                                           value="{{ old('dimensi_sosial', $idm->dimensi_sosial) }}" 
                                                           step="0.001" 
                                                           min="0" 
                                                           max="1000">
                                                    @error('dimensi_sosial')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="dimensi_ekonomi" class="form-label font-weight-bold text-success">
                                                        <i class="fas fa-chart-line mr-1"></i>Dimensi Ekonomi
                                                    </label>
                                                    <input type="number" 
                                                           class="form-control @error('dimensi_ekonomi') is-invalid @enderror" 
                                                           id="dimensi_ekonomi" 
                                                           name="dimensi_ekonomi" 
                                                           value="{{ old('dimensi_ekonomi', $idm->dimensi_ekonomi) }}" 
                                                           step="0.001" 
                                                           min="0" 
                                                           max="1000">
                                                    @error('dimensi_ekonomi')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="dimensi_lingkungan" class="form-label font-weight-bold text-info">
                                                        <i class="fas fa-leaf mr-1"></i>Dimensi Lingkungan
                                                    </label>
                                                    <input type="number" 
                                                           class="form-control @error('dimensi_lingkungan') is-invalid @enderror" 
                                                           id="dimensi_lingkungan" 
                                                           name="dimensi_lingkungan" 
                                                           value="{{ old('dimensi_lingkungan', $idm->dimensi_lingkungan) }}" 
                                                           step="0.001" 
                                                           min="0" 
                                                           max="1000">
                                                    @error('dimensi_lingkungan')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card border-left-warning mb-4">
                                    <div class="card-header bg-light">
                                        <h6 class="m-0 font-weight-bold text-warning">Deskripsi & Publikasi</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="deskripsi" class="form-label font-weight-bold">
                                                <i class="fas fa-file-alt mr-1"></i>Deskripsi
                                            </label>
                                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                                                      id="deskripsi" 
                                                      name="deskripsi" 
                                                      rows="4" 
                                                      maxlength="2000">{{ old('deskripsi', $idm->deskripsi) }}</textarea>
                                            @error('deskripsi')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <small class="form-text text-muted">Maksimal 2000 karakter. Deskripsi akan ditampilkan di halaman publik.</small>
                                        </div>

                                        <div class="form-group mb-0">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" 
                                                       class="custom-control-input" 
                                                       id="is_published" 
                                                       name="is_published" 
                                                       value="1" 
                                                       {{ old('is_published', $idm->is_published) ? 'checked' : '' }}>
                                                <label class="custom-control-label font-weight-bold" for="is_published">
                                                    <i class="fas fa-globe mr-1"></i>Publikasikan Data
                                                </label>
                                                <small class="form-text text-muted">
                                                    Jika dicentang, data akan ditampilkan di halaman publik
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <a href="{{ route('admin.idm.show', $idm) }}" class="btn btn-secondary">
                                                    <i class="fas fa-arrow-left mr-1"></i> Kembali
                                                </a>
                                            </div>
                                            <div>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fas fa-save mr-1"></i> Simpan Perubahan
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .border-left-primary {
        border-left: 0.25rem solid #4e73df !important;
    }
    
    .border-left-success {
        border-left: 0.25rem solid #1cc88a !important;
    }
    
    .border-left-info {
        border-left: 0.25rem solid #36b9cc !important;
    }
    
    .border-left-warning {
        border-left: 0.25rem solid #f6c23e !important;
    }
    
    .form-control:focus {
        border-color: #4e73df;
        box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
    }
    
    .card {
        border-radius: 0.75rem;
    }
    
    .custom-control-input:checked~.custom-control-label::before {
        background-color: #4e73df;
        border-color: #4e73df;
    }
    
    .custom-control-input:focus~.custom-control-label::before {
        box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
    }
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function() {
    // Auto calculate IDM score based on component scores
    function calculateIDM() {
        const iks = parseFloat($('#skor_iks').val()) || 0;
        const ike = parseFloat($('#skor_ike').val()) || 0;
        const ikl = parseFloat($('#skor_ikl').val()) || 0;
        
        // Simple average calculation (adjust formula as needed)
        const idm = (iks + ike + ikl) / 3;
        
        if (idm > 0) {
            $('#skor_idm').val(idm.toFixed(3));
            updateStatusBasedOnScore(idm);
        }
    }
    
    function updateStatusBasedOnScore(score) {
        let status = '';
        if (score >= 80) {
            status = 'Mandiri';
        } else if (score >= 70) {
            status = 'Maju';
        } else if (score >= 60) {
            status = 'Berkembang';
        } else if (score >= 50) {
            status = 'Tertinggal';
        } else {
            status = 'Sangat Tertinggal';
        }
        
        $('#status_idm').val(status);
    }
    
    // Attach calculation to component score inputs
    $('#skor_iks, #skor_ike, #skor_ikl').on('input', calculateIDM);
    
    // Form validation
    $('form').on('submit', function(e) {
        const tahun = parseInt($('#tahun').val());
        const currentYear = new Date().getFullYear();
        
        if (tahun < 2020 || tahun > currentYear + 5) {
            e.preventDefault();
            alert('Tahun harus antara 2020 dan ' + (currentYear + 5));
            return false;
        }
        
        const skor_idm = parseFloat($('#skor_idm').val());
        if (skor_idm <= 0 || skor_idm > 1000) {
            e.preventDefault();
            alert('Skor IDM harus antara 0.001 dan 1000');
            return false;
        }
    });
});
</script>
@endpush
