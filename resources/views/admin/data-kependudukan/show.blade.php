@extends('layouts.admin')

@section('title', 'Detail Data Penduduk')

@section('content')
<div class="container-fluid py-4">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-lg bg-gradient-primary text-white rounded-lg">
                <div class="card-body py-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="mb-2 font-weight-bold">
                                <i class="fas fa-user-circle mr-3"></i>Detail Data Penduduk
                            </h2>
                            <p class="mb-0 text-white-75">Informasi lengkap data penduduk</p>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.data-kependudukan.edit', $penduduk->id) }}" class="btn btn-warning btn-lg shadow">
                                <i class="fas fa-edit mr-2"></i>Edit
                            </a>
                            <a href="{{ route('admin.data-kependudukan.index') }}" class="btn btn-light btn-lg shadow">
                                <i class="fas fa-arrow-left mr-2"></i>Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="row">
        <!-- Main Content -->
        <div class="col-lg-8">
            <!-- Data Pribadi -->
            <div class="card border-0 shadow-lg rounded-lg mb-4">
                <div class="card-header bg-gradient-primary text-white py-3 rounded-top">
                    <h5 class="mb-0 font-weight-bold">
                        <i class="fas fa-user mr-3"></i>Data Pribadi
                    </h5>
                </div>
                <div class="card-body p-4 bg-light">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-group mb-4">
                                <label class="info-label">
                                    <i class="fas fa-id-card text-primary mr-2"></i>NIK
                                </label>
                                <div class="info-value">{{ $penduduk->nik }}</div>
                            </div>
                            
                            <div class="info-group mb-4">
                                <label class="info-label">
                                    <i class="fas fa-user text-primary mr-2"></i>Nama Lengkap
                                </label>
                                <div class="info-value">{{ $penduduk->nama }}</div>
                            </div>
                            
                            <div class="info-group mb-4">
                                <label class="info-label">
                                    <i class="fas fa-venus-mars text-primary mr-2"></i>Jenis Kelamin
                                </label>
                                <div class="info-value">
                                    <span class="badge badge-lg {{ $penduduk->jenis_kelamin == 'Laki-laki' ? 'badge-primary' : 'badge-pink' }}">
                                        <i class="fas {{ $penduduk->jenis_kelamin == 'Laki-laki' ? 'fa-mars' : 'fa-venus' }} mr-1"></i>
                                        {{ $penduduk->jenis_kelamin }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="info-group mb-4">
                                <label class="info-label">
                                    <i class="fas fa-map-marker-alt text-primary mr-2"></i>Tempat, Tanggal Lahir
                                </label>
                                <div class="info-value">{{ $penduduk->tempat_lahir }}, {{ $penduduk->tanggal_lahir->format('d F Y') }}</div>
                            </div>
                            
                            <div class="info-group mb-4">
                                <label class="info-label">
                                    <i class="fas fa-birthday-cake text-primary mr-2"></i>Usia
                                </label>
                                <div class="info-value">
                                    <span class="badge badge-lg badge-info">
                                        <i class="fas fa-calendar mr-1"></i>{{ $penduduk->usia }} tahun
                                    </span>
                                </div>
                            </div>
                            
                            <div class="info-group mb-4">
                                <label class="info-label">
                                    <i class="fas fa-pray text-primary mr-2"></i>Agama
                                </label>
                                <div class="info-value">{{ $penduduk->agama }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Data Alamat & Keluarga -->
            <div class="card border-0 shadow-lg rounded-lg mb-4">
                <div class="card-header bg-gradient-info text-white py-3 rounded-top">
                    <h5 class="mb-0 font-weight-bold">
                        <i class="fas fa-home mr-3"></i>Data Alamat & Keluarga
                    </h5>
                </div>
                <div class="card-body p-4 bg-light">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-group mb-4">
                                <label class="info-label">
                                    <i class="fas fa-map-marker-alt text-info mr-2"></i>Alamat
                                </label>
                                <div class="info-value">{{ $penduduk->alamat }}</div>
                            </div>
                            
                            <div class="info-group mb-4">
                                <label class="info-label">
                                    <i class="fas fa-road text-info mr-2"></i>RT/RW
                                </label>
                                <div class="info-value">
                                    <span class="badge badge-lg badge-secondary mr-2">
                                        <i class="fas fa-home mr-1"></i>RT {{ $penduduk->rt }}
                                    </span>
                                    <span class="badge badge-lg badge-secondary">
                                        <i class="fas fa-building mr-1"></i>RW {{ $penduduk->rw }}
                                    </span>
                                </div>
                            </div>
                            
                            <div class="info-group mb-4">
                                <label class="info-label">
                                    <i class="fas fa-id-card-alt text-info mr-2"></i>No. KK
                                </label>
                                <div class="info-value">{{ $penduduk->no_kk ?? '-' }}</div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="info-group mb-4">
                                <label class="info-label">
                                    <i class="fas fa-users text-info mr-2"></i>Status dalam Keluarga
                                </label>
                                <div class="info-value">
                                    <span class="badge badge-lg badge-warning">
                                        <i class="fas fa-user-friends mr-1"></i>{{ $penduduk->status_dalam_keluarga }}
                                    </span>
                                </div>
                            </div>
                            
                            <div class="info-group mb-4">
                                <label class="info-label">
                                    <i class="fas fa-male text-info mr-2"></i>Nama Ayah
                                </label>
                                <div class="info-value">{{ $penduduk->nama_ayah ?? '-' }}</div>
                            </div>
                            
                            <div class="info-group mb-4">
                                <label class="info-label">
                                    <i class="fas fa-female text-info mr-2"></i>Nama Ibu
                                </label>
                                <div class="info-value">{{ $penduduk->nama_ibu ?? '-' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Data Pendidikan & Pekerjaan -->
            <div class="card border-0 shadow-lg rounded-lg mb-4">
                <div class="card-header bg-gradient-success text-white py-3 rounded-top">
                    <h5 class="mb-0 font-weight-bold">
                        <i class="fas fa-briefcase mr-3"></i>Pendidikan & Pekerjaan
                    </h5>
                </div>
                <div class="card-body p-4 bg-light">
                    <div class="info-group mb-4">
                        <label class="info-label">
                            <i class="fas fa-graduation-cap text-success mr-2"></i>Pendidikan
                        </label>
                        <div class="info-value">
                            <span class="badge badge-lg badge-success">
                                <i class="fas fa-book mr-1"></i>{{ $penduduk->pendidikan }}
                            </span>
                        </div>
                    </div>
                    
                    <div class="info-group mb-0">
                        <label class="info-label">
                            <i class="fas fa-briefcase text-success mr-2"></i>Pekerjaan
                        </label>
                        <div class="info-value">
                            <span class="badge badge-lg badge-primary">
                                <i class="fas fa-user-tie mr-1"></i>{{ $penduduk->pekerjaan }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Status & Keterangan -->
            <div class="card border-0 shadow-lg rounded-lg mb-4">
                <div class="card-header bg-gradient-warning text-white py-3 rounded-top">
                    <h5 class="mb-0 font-weight-bold">
                        <i class="fas fa-info-circle mr-3"></i>Status & Keterangan
                    </h5>
                </div>
                <div class="card-body p-4 bg-light">
                    <div class="info-group mb-4">
                        <label class="info-label">
                            <i class="fas fa-check-circle text-warning mr-2"></i>Status
                        </label>
                        <div class="info-value">
                            @if($penduduk->status == 'aktif' || $penduduk->status == 'Aktif')
                                <span class="badge badge-lg badge-success">
                                    <i class="fas fa-check-circle mr-1"></i>Aktif
                                </span>
                            @elseif($penduduk->status == 'pindah' || $penduduk->status == 'Pindah')
                                <span class="badge badge-lg badge-warning">
                                    <i class="fas fa-truck mr-1"></i>Pindah
                                </span>
                            @else
                                <span class="badge badge-lg badge-danger">
                                    <i class="fas fa-times-circle mr-1"></i>Meninggal
                                </span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="info-group mb-4">
                        <label class="info-label">
                            <i class="fas fa-sticky-note text-warning mr-2"></i>Keterangan
                        </label>
                        <div class="info-value">{{ $penduduk->keterangan ?? '-' }}</div>
                    </div>
                    
                    <div class="info-group mb-0">
                        <label class="info-label">
                            <i class="fas fa-clock text-warning mr-2"></i>Waktu Pencatatan
                        </label>
                        <div class="info-value">
                            <small class="text-muted">
                                <strong>Dibuat:</strong> {{ $penduduk->created_at->format('d F Y H:i') }}<br>
                                <strong>Diperbarui:</strong> {{ $penduduk->updated_at->format('d F Y H:i') }}
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Custom Styles for Detail Page */
    .bg-gradient-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    
    .bg-gradient-info {
        background: linear-gradient(135deg, #36d1dc 0%, #5b86e5 100%);
    }
    
    .bg-gradient-success {
        background: linear-gradient(135deg, #1cc88a 0%, #13855c 100%);
    }
    
    .bg-gradient-warning {
        background: linear-gradient(135deg, #f6c23e 0%, #e6a605 100%);
    }
    
    .text-white-75 {
        color: rgba(255, 255, 255, 0.75) !important;
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
    
    .rounded-top {
        border-top-left-radius: 20px !important;
        border-top-right-radius: 20px !important;
    }
    
    .rounded-lg {
        border-radius: 20px !important;
    }
    
    .shadow-lg {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175) !important;
    }
    
    .bg-light {
        background-color: #f8f9fc !important;
    }
    
    .font-weight-bold {
        font-weight: 700 !important;
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
    
    .gap-2 {
        gap: 0.5rem !important;
    }
    
    /* Info Groups */
    .info-group {
        background: white;
        border-radius: 15px;
        padding: 1.25rem;
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        transition: all 0.3s ease;
        border-left: 4px solid #667eea;
    }
    
    .info-group:hover {
        transform: translateY(-2px);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }
    
    .info-label {
        display: block;
        font-weight: 600;
        color: #5a5c69;
        margin-bottom: 8px;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .info-value {
        font-size: 1.1rem;
        color: #3a3b45;
        font-weight: 500;
        line-height: 1.4;
    }
    
    /* Badges */
    .badge {
        border-radius: 25px !important;
        padding: 8px 16px;
        font-size: 0.85rem;
        font-weight: 600;
    }
    
    .badge-lg {
        padding: 10px 20px;
        font-size: 0.9rem;
    }
    
    .badge-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }
    
    .badge-pink {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        color: white;
    }
    
    .badge-info {
        background: linear-gradient(135deg, #36d1dc 0%, #5b86e5 100%);
        color: white;
    }
    
    .badge-success {
        background: linear-gradient(135deg, #1cc88a 0%, #13855c 100%);
        color: white;
    }
    
    .badge-warning {
        background: linear-gradient(135deg, #f6c23e 0%, #e6a605 100%);
        color: white;
    }
    
    .badge-secondary {
        background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
        color: white;
    }
    
    .badge-danger {
        background: linear-gradient(135deg, #e74a3b 0%, #c0392b 100%);
        color: white;
    }
    
    /* Animation for cards */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .card {
        animation: fadeInUp 0.6s ease-out;
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .container-fluid {
            padding: 1rem;
        }
        
        .card-body {
            padding: 1.5rem !important;
        }
        
        .btn {
            width: 100%;
            margin-bottom: 0.5rem;
        }
        
        .d-flex {
            flex-direction: column !important;
        }
        
        .gap-2 {
            gap: 1rem !important;
        }
        
        .info-group {
            margin-bottom: 1rem;
        }
    }
</style>
@endsection
