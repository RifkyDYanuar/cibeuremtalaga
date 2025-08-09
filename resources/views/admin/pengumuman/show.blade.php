@extends('layouts.admin')

@section('page-title', 'Detail Pengumuman')

@section('content')
<div class="content-header">
    <div class="content-header-left">
        <h1>Detail Pengumuman</h1>
        <nav class="breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <span> / </span>
            <a href="{{ route('admin.pengumuman.index') }}">Pengumuman</a>
            <span> / </span>
            <span>Detail</span>
        </nav>
    </div>
    <div class="content-header-right">
        <a href="{{ route('admin.pengumuman.edit', $pengumuman) }}" class="btn btn-warning">
            <i class="fas fa-edit"></i> Edit
        </a>
        <a href="{{ route('admin.pengumuman.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
</div>

<div class="content-body">
    <div class="card">
        <div class="card-header">
            <h5>{{ $pengumuman->judul }}</h5>
            <div class="header-meta">
                <span class="badge badge-{{ $pengumuman->kategori == 'penting' ? 'danger' : ($pengumuman->kategori == 'kegiatan' ? 'info' : 'primary') }}">
                    {{ ucfirst($pengumuman->kategori) }}
                </span>
                <span class="badge badge-{{ $pengumuman->prioritas == 'tinggi' ? 'danger' : ($pengumuman->prioritas == 'sedang' ? 'warning' : 'success') }}">
                    Prioritas {{ ucfirst($pengumuman->prioritas) }}
                </span>
                <span class="badge badge-{{ $pengumuman->is_active ? 'success' : 'secondary' }}">
                    {{ $pengumuman->is_active ? 'Aktif' : 'Tidak Aktif' }}
                </span>
                @if($pengumuman->is_featured)
                    <span class="badge badge-warning">
                        <i class="fas fa-star"></i> Diutamakan
                    </span>
                @endif
            </div>
        </div>
        <div class="card-body">
            <div class="detail-grid">
                <div class="detail-main">
                    @if($pengumuman->gambar)
                        <div class="announcement-image">
                            <img src="{{ asset('storage/' . $pengumuman->gambar) }}" alt="{{ $pengumuman->judul }}" class="img-fluid">
                        </div>
                    @endif
                    
                    <div class="announcement-content">
                        <h6>Konten Pengumuman</h6>
                        <div class="content-text">
                            {!! nl2br(e($pengumuman->konten)) !!}
                        </div>
                    </div>
                </div>

                <div class="detail-info">
                    <div class="info-section">
                        <h6>Informasi Dasar</h6>
                        <div class="info-item">
                            <strong>Kategori:</strong>
                            <span>{{ $pengumuman->kategori_label }}</span>
                        </div>
                        <div class="info-item">
                            <strong>Prioritas:</strong>
                            <span class="priority-{{ $pengumuman->prioritas }}">{{ ucfirst($pengumuman->prioritas) }}</span>
                        </div>
                        <div class="info-item">
                            <strong>Status:</strong>
                            <span class="status-{{ $pengumuman->is_active ? 'active' : 'inactive' }}">
                                {{ $pengumuman->is_active ? 'Aktif' : 'Tidak Aktif' }}
                            </span>
                        </div>
                        <div class="info-item">
                            <strong>Diutamakan:</strong>
                            <span>{{ $pengumuman->is_featured ? 'Ya' : 'Tidak' }}</span>
                        </div>
                    </div>

                    <div class="info-section">
                        <h6>Waktu & Tanggal</h6>
                        <div class="info-item">
                            <strong>Tanggal Mulai:</strong>
                            <span>{{ $pengumuman->tanggal_mulai?->format('d/m/Y') ?? '-' }}</span>
                        </div>
                        <div class="info-item">
                            <strong>Tanggal Selesai:</strong>
                            <span>{{ $pengumuman->tanggal_selesai?->format('d/m/Y') ?? '-' }}</span>
                        </div>
                        <div class="info-item">
                            <strong>Dibuat:</strong>
                            <span>{{ $pengumuman->created_at->format('d/m/Y H:i') }}</span>
                        </div>
                        <div class="info-item">
                            <strong>Diperbarui:</strong>
                            <span>{{ $pengumuman->updated_at->format('d/m/Y H:i') }}</span>
                        </div>
                    </div>

                    <div class="info-section">
                        <h6>Informasi Penulis</h6>
                        <div class="info-item">
                            <strong>Dibuat oleh:</strong>
                            <span>{{ $pengumuman->creator->name ?? 'System' }}</span>
                        </div>
                        <div class="info-item">
                            <strong>Role:</strong>
                            <span>{{ $pengumuman->creator->role ?? 'System' }}</span>
                        </div>
                    </div>

                    <div class="info-section">
                        <h6>Aksi</h6>
                        <div class="action-buttons">
                            <a href="{{ route('admin.pengumuman.edit', $pengumuman) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('admin.pengumuman.destroy', $pengumuman) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengumuman ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .header-meta {
        display: flex;
        gap: 8px;
        margin-top: 10px;
        flex-wrap: wrap;
    }

    .badge {
        padding: 4px 8px;
        border-radius: 12px;
        font-size: 11px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .badge-primary { background-color: #3498db; color: white; }
    .badge-success { background-color: #27ae60; color: white; }
    .badge-warning { background-color: #f39c12; color: white; }
    .badge-danger { background-color: #e74c3c; color: white; }
    .badge-info { background-color: #17a2b8; color: white; }
    .badge-secondary { background-color: #95a5a6; color: white; }

    .detail-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 30px;
        margin-top: 20px;
    }

    .detail-main {
        background: white;
    }

    .detail-info {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        border: 1px solid #e1e8ed;
        height: fit-content;
    }

    .announcement-image {
        margin-bottom: 25px;
        text-align: center;
    }

    .announcement-image img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .announcement-content h6 {
        color: #2c3e50;
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 15px;
        border-bottom: 2px solid #3498db;
        padding-bottom: 8px;
    }

    .content-text {
        font-size: 14px;
        line-height: 1.6;
        color: #555;
        background: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        border-left: 4px solid #3498db;
    }

    .info-section {
        margin-bottom: 25px;
        padding-bottom: 20px;
        border-bottom: 1px solid #e1e8ed;
    }

    .info-section:last-child {
        border-bottom: none;
        margin-bottom: 0;
    }

    .info-section h6 {
        color: #2c3e50;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 12px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .info-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
        padding: 8px 0;
    }

    .info-item strong {
        color: #2c3e50;
        font-size: 13px;
        min-width: 100px;
    }

    .info-item span {
        color: #555;
        font-size: 13px;
        text-align: right;
    }

    .priority-tinggi { color: #e74c3c; font-weight: 600; }
    .priority-sedang { color: #f39c12; font-weight: 600; }
    .priority-rendah { color: #27ae60; font-weight: 600; }

    .status-active { color: #27ae60; font-weight: 600; }
    .status-inactive { color: #95a5a6; font-weight: 600; }

    .action-buttons {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    .btn {
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 12px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: all 0.3s ease;
    }

    .btn-sm {
        padding: 6px 12px;
        font-size: 11px;
    }

    .btn-primary {
        background-color: #3498db;
        color: white;
    }

    .btn-primary:hover {
        background-color: #2980b9;
        transform: translateY(-1px);
    }

    .btn-warning {
        background-color: #f39c12;
        color: white;
    }

    .btn-warning:hover {
        background-color: #e67e22;
        transform: translateY(-1px);
    }

    .btn-danger {
        background-color: #e74c3c;
        color: white;
    }

    .btn-danger:hover {
        background-color: #c0392b;
        transform: translateY(-1px);
    }

    .btn-secondary {
        background-color: #95a5a6;
        color: white;
    }

    .btn-secondary:hover {
        background-color: #7f8c8d;
        transform: translateY(-1px);
    }

    .card {
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        border: 1px solid #e1e8ed;
    }

    .card-header {
        padding: 20px;
        border-bottom: 1px solid #e1e8ed;
        background: #f8f9fa;
    }

    .card-header h5 {
        margin: 0;
        color: #2c3e50;
        font-size: 18px;
        font-weight: 600;
    }

    .card-body {
        padding: 20px;
    }

    @media (max-width: 768px) {
        .detail-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }
        
        .info-item {
            flex-direction: column;
            align-items: flex-start;
            gap: 5px;
        }
        
        .info-item span {
            text-align: left;
        }
        
        .action-buttons {
            flex-direction: column;
        }
        
        .btn {
            width: 100%;
            justify-content: center;
        }
    }
</style>
@endsection
