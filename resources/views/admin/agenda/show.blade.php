@extends('layouts.admin')

@section('title', 'Detail Agenda')

@section('content')
<div class="agenda-container">
    <div class="page-header">
        <div>
            <h1 class="page-title">
                <i class="fas fa-eye"></i>
                Detail Agenda Kegiatan
            </h1>
            <div class="breadcrumb">
                <i class="fas fa-home"></i>
                Dashboard <i class="fas fa-chevron-right"></i> 
                <a href="{{ route('admin.agenda.index') }}" style="color: #3b82f6;">Kelola Agenda</a> 
                <i class="fas fa-chevron-right"></i> 
                <span>Detail Agenda</span>
            </div>
        </div>
        <div class="header-actions">
            <a href="{{ route('admin.agenda.index') }}" class="btn-secondary">
                <i class="fas fa-arrow-left"></i>
                Kembali
            </a>
            <a href="{{ route('admin.agenda.edit', $agenda->id) }}" class="btn-warning">
                <i class="fas fa-edit"></i>
                Edit
            </a>
            <a href="{{ route('agenda.public.show', $agenda->id) }}" class="btn-info" target="_blank">
                <i class="fas fa-external-link-alt"></i>
                Lihat Publik
            </a>
        </div>
    </div>
    <div class="detail-container">
        <div class="detail-grid">
            <!-- Main Content -->
            <div class="main-content">
                <div class="detail-card">
                    <div class="card-header">
                        <h3><i class="fas fa-info-circle"></i>Informasi Utama</h3>
                    </div>
                    <div class="card-body">
                        <div class="agenda-title-section">
                            <h2 class="agenda-title">{{ $agenda->judul }}</h2>
                            <div class="badge-group">
                                <span class="status-badge status-{{ $agenda->kategori }}">
                                    <i class="fas fa-tag"></i>
                                    {{ ucfirst($agenda->kategori) }}
                                </span>
                                <span class="status-badge status-{{ $agenda->status == 'aktif' ? 'approved' : ($agenda->status == 'selesai' ? 'pending' : 'rejected') }}">
                                    <i class="fas fa-{{ $agenda->status == 'aktif' ? 'check-circle' : ($agenda->status == 'selesai' ? 'flag-checkered' : 'times-circle') }}"></i>
                                    {{ ucfirst($agenda->status) }}
                                </span>
                            </div>
                        </div>

                        @if($agenda->gambar)
                            <div class="agenda-image-section">
                                <img src="{{ Storage::url($agenda->gambar) }}" alt="{{ $agenda->judul }}" class="agenda-image">
                            </div>
                        @endif

                        <div class="description-section">
                            <h4 class="section-title">
                                <i class="fas fa-align-left"></i>
                                Deskripsi Agenda
                            </h4>
                            <div class="description-content">
                                {!! nl2br(e($agenda->deskripsi)) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="sidebar-content">
                <div class="detail-card">
                    <div class="card-header">
                        <h3><i class="fas fa-calendar-alt"></i>Detail Agenda</h3>
                    </div>
                    <div class="card-body">
                        <div class="info-item">
                            <div class="info-label">
                                <i class="fas fa-calendar-alt"></i>
                                Tanggal Mulai
                            </div>
                            <div class="info-value">
                                <strong>{{ $agenda->tanggal_mulai->format('d F Y') }}</strong>
                                <small>{{ $agenda->tanggal_mulai->format('H:i') }} WIB</small>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-label">
                                <i class="fas fa-calendar-check"></i>
                                Tanggal Selesai
                            </div>
                            <div class="info-value">
                                <strong>{{ $agenda->tanggal_selesai->format('d F Y') }}</strong>
                                <small>{{ $agenda->tanggal_selesai->format('H:i') }} WIB</small>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-label">
                                <i class="fas fa-map-marker-alt"></i>
                                Lokasi
                            </div>
                            <div class="info-value">
                                <strong>{{ $agenda->lokasi }}</strong>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-label">
                                <i class="fas fa-user"></i>
                                Dibuat oleh
                            </div>
                            <div class="info-value">
                                <strong>{{ $agenda->creator->name ?? 'Admin' }}</strong>
                                <small>{{ $agenda->created_at->format('d M Y, H:i') }}</small>
                            </div>
                        </div>

                        @if($agenda->updated_at != $agenda->created_at)
                            <div class="info-item">
                                <div class="info-label">
                                    <i class="fas fa-clock"></i>
                                    Terakhir diperbarui
                                </div>
                                <div class="info-value">
                                    <strong>{{ $agenda->updated_at->format('d M Y, H:i') }}</strong>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="detail-card">
                    <div class="card-header">
                        <h3><i class="fas fa-cogs"></i>Aksi</h3>
                    </div>
                    <div class="card-body">
                        <div class="action-buttons">
                            <a href="{{ route('admin.agenda.edit', $agenda->id) }}" class="btn-warning">
                                <i class="fas fa-edit"></i>Edit Agenda
                            </a>
                            <a href="{{ route('agenda.public.show', $agenda->id) }}" class="btn-info" target="_blank">
                                <i class="fas fa-external-link-alt"></i>Lihat di Publik
                            </a>
                            <form action="{{ route('admin.agenda.destroy', $agenda->id) }}" method="POST" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus agenda ini?')">
                                    <i class="fas fa-trash"></i>Hapus Agenda
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
.agenda-container {
    padding: 20px;
    background: #f8fafc;
    min-height: 100vh;
}

.page-header {
    margin-bottom: 30px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 20px;
    background: white;
    padding: 24px;
    border-radius: 12px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
}

.page-title {
    font-size: 24px;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 0;
    display: flex;
    align-items: center;
    gap: 12px;
}

.page-title i {
    color: #3b82f6;
    font-size: 20px;
}

.breadcrumb {
    color: #64748b;
    font-size: 14px;
    display: flex;
    align-items: center;
    gap: 8px;
    margin-top: 4px;
}

.breadcrumb i {
    font-size: 12px;
}

.header-actions {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
}

.btn-secondary, .btn-warning, .btn-info, .btn-danger {
    padding: 12px 20px;
    border-radius: 10px;
    border: none;
    font-weight: 600;
    font-size: 14px;
    display: flex;
    align-items: center;
    gap: 8px;
    text-decoration: none;
    transition: all 0.3s ease;
    cursor: pointer;
}

.btn-secondary {
    background: #f1f5f9;
    color: #475569;
    border: 1px solid #e2e8f0;
}

.btn-secondary:hover {
    background: #e2e8f0;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.btn-warning {
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: white;
    box-shadow: 0 4px 6px -1px rgba(245, 158, 11, 0.3);
}

.btn-warning:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 15px -3px rgba(245, 158, 11, 0.4);
}

.btn-info {
    background: linear-gradient(135deg, #06b6d4, #0891b2);
    color: white;
    box-shadow: 0 4px 6px -1px rgba(6, 182, 212, 0.3);
}

.btn-info:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 15px -3px rgba(6, 182, 212, 0.4);
}

.btn-danger {
    background: linear-gradient(135deg, #ef4444, #dc2626);
    color: white;
    box-shadow: 0 4px 6px -1px rgba(239, 68, 68, 0.3);
    width: 100%;
    justify-content: center;
}

.btn-danger:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 15px -3px rgba(239, 68, 68, 0.4);
}

.detail-container {
    background: white;
    border-radius: 16px;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.detail-grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 24px;
    max-width: 1400px;
    margin: 0 auto;
}

.main-content, .sidebar-content {
    padding: 0;
}

.detail-card {
    background: white;
    border-radius: 12px;
    border: 1px solid #e5e7eb;
    margin-bottom: 24px;
    overflow: hidden;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
}

.detail-card:hover {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.08);
    transform: translateY(-1px);
}

.card-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 20px;
    border-bottom: none;
}

.card-header h3 {
    font-size: 16px;
    font-weight: 600;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 8px;
}

.card-body {
    padding: 28px;
}

.agenda-title-section {
    margin-bottom: 24px;
}

.agenda-title {
    font-size: 28px;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 16px;
    line-height: 1.3;
}

.badge-group {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
}

.status-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 13px;
    font-weight: 600;
}

.status-rapat {
    background: linear-gradient(135deg, #dbeafe, #bfdbfe);
    color: #1e40af;
}

.status-acara {
    background: linear-gradient(135deg, #dcfce7, #bbf7d0);
    color: #166534;
}

.status-kegiatan {
    background: linear-gradient(135deg, #fef3c7, #fde68a);
    color: #92400e;
}

.status-musyawarah {
    background: linear-gradient(135deg, #ede9fe, #ddd6fe);
    color: #6b21a8;
}

.status-pelatihan {
    background: linear-gradient(135deg, #fce7f3, #fbcfe8);
    color: #be185d;
}

.status-lainnya {
    background: linear-gradient(135deg, #f1f5f9, #e2e8f0);
    color: #475569;
}

.status-approved {
    background: linear-gradient(135deg, #dcfce7, #bbf7d0);
    color: #166534;
}

.status-pending {
    background: linear-gradient(135deg, #fef3c7, #fde68a);
    color: #92400e;
}

.status-rejected {
    background: linear-gradient(135deg, #fecaca, #fca5a5);
    color: #991b1b;
}

.agenda-image-section {
    margin-bottom: 32px;
    text-align: center;
}

.agenda-image {
    max-width: 100%;
    max-height: 400px;
    border-radius: 12px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    object-fit: cover;
    transition: all 0.3s ease;
}

.agenda-image:hover {
    transform: scale(1.02);
    box-shadow: 0 12px 35px rgba(0, 0, 0, 0.15);
}

.description-section {
    margin-bottom: 24px;
}

.section-title {
    font-size: 18px;
    font-weight: 600;
    color: #1e293b;
    margin-bottom: 16px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.section-title i {
    color: #3b82f6;
}

.description-content {
    background: #f8fafc;
    border-left: 4px solid #3b82f6;
    padding: 20px;
    border-radius: 8px;
    line-height: 1.7;
    color: #374151;
    font-size: 15px;
}

.info-item {
    margin-bottom: 24px;
    padding-bottom: 16px;
    border-bottom: 1px solid #f1f5f9;
}

.info-item:last-child {
    margin-bottom: 0;
    padding-bottom: 0;
    border-bottom: none;
}

.info-label {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 14px;
    font-weight: 600;
    color: #64748b;
    margin-bottom: 8px;
}

.info-label i {
    color: #3b82f6;
    width: 16px;
}

.info-value {
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.info-value strong {
    color: #1e293b;
    font-size: 15px;
}

.info-value small {
    color: #64748b;
    font-size: 13px;
}

.action-buttons {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.delete-form {
    margin: 0;
}

/* Responsive Design */
@media (max-width: 1200px) {
    .detail-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
}

@media (max-width: 768px) {
    .agenda-container {
        padding: 16px;
    }
    
    .page-header {
        flex-direction: column;
        align-items: stretch;
        gap: 16px;
    }
    
    .header-actions {
        justify-content: stretch;
    }
    
    .header-actions > * {
        flex: 1;
        justify-content: center;
    }
    
    .card-body {
        padding: 20px;
    }
    
    .agenda-title {
        font-size: 24px;
    }
    
    .page-title {
        font-size: 20px;
    }
    
    .detail-grid {
        gap: 16px;
    }
    
    .badge-group {
        flex-direction: column;
        align-items: flex-start;
    }
}

@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
@endsection
