@extends('layouts.admin')

@section('page-title', 'Detail Foto Galeri')

@section('content')
<div class="content-header">
    <div class="content-header-left">
        <h1>Detail Foto Galeri</h1>
        <nav class="breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <span> / </span>
            <a href="{{ route('admin.galeri.index') }}">Galeri</a>
            <span> / </span>
            <span>Detail</span>
        </nav>
    </div>
    <div class="content-header-right">
        <a href="{{ route('admin.galeri.edit', $galeri) }}" class="btn btn-warning">
            <i class="fas fa-edit"></i> Edit
        </a>
        <a href="{{ route('galeri.public.show', $galeri) }}" class="btn btn-info" target="_blank">
            <i class="fas fa-external-link-alt"></i> Lihat Publik
        </a>
        <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
</div>

<style>
.gallery-image-container {
    margin-bottom: 20px;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.gallery-main-image {
    width: 100%;
    height: 400px;
    object-fit: cover;
    border-radius: 8px;
}

.detail-section {
    margin-bottom: 25px;
}

.detail-section h6 {
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 10px;
    color: #333;
}

.action-buttons {
    margin-top: 20px;
}

.action-buttons .btn {
    margin-right: 5px;
    margin-bottom: 10px;
}

@media (max-width: 768px) {
    .gallery-main-image {
        height: 250px;
    }
    
    .detail-grid {
        grid-template-columns: 1fr !important;
    }
    
    .action-buttons .btn {
        width: 100%;
        margin-right: 0;
    }
}
</style>

<div class="content-body">
    <div class="card">
        <div class="card-header">
            <h5>{{ $galeri->judul }}</h5>
            <div class="header-meta">
                <span class="badge badge-{{ $galeri->kategori == 'kegiatan' ? 'info' : ($galeri->kategori == 'pembangunan' ? 'primary' : ($galeri->kategori == 'acara' ? 'success' : ($galeri->kategori == 'fasilitas' ? 'warning' : 'secondary'))) }}">
                    {{ ucfirst($galeri->kategori) }}
                </span>
                <span class="badge badge-{{ $galeri->status ? 'success' : 'secondary' }}">
                    {{ $galeri->status ? 'Aktif' : 'Tidak Aktif' }}
                </span>
                @if($galeri->is_featured)
                    <span class="badge badge-warning">
                        <i class="fas fa-star"></i> Unggulan
                    </span>
                @endif
            </div>
        </div>
        <div class="card-body">
            <div class="detail-grid">
                <div class="detail-main">
                    <div class="gallery-image-container">
                        <img src="{{ asset('storage/galeri/' . $galeri->gambar) }}" 
                             alt="{{ $galeri->judul }}"
                             class="gallery-main-image">
                    </div>
                    
                    @if($galeri->deskripsi)
                        <div class="detail-section">
                            <h6>Deskripsi</h6>
                            <p class="text-justify">{{ $galeri->deskripsi }}</p>
                        </div>
                    @endif
                </div>
                
                <div class="detail-sidebar">
                    <div class="info-card">
                        <h6>Informasi Foto</h6>
                        <div class="info-list">
                            <div class="info-item">
                                <strong>Judul:</strong>
                                <span>{{ $galeri->judul }}</span>
                            </div>
                            
                            <div class="info-item">
                                <strong>Kategori:</strong>
                                <span>{{ ucfirst($galeri->kategori) }}</span>
                            </div>

                            @if($galeri->tanggal_foto)
                                <div class="info-item">
                                    <strong>Tanggal Foto:</strong>
                                    <span>{{ $galeri->formatted_tanggal_foto }}</span>
                                </div>
                            @endif

                            @if($galeri->lokasi)
                                <div class="info-item">
                                    <strong>Lokasi:</strong>
                                    <span>{{ $galeri->lokasi }}</span>
                                </div>
                            @endif

                            @if($galeri->fotografer)
                                <div class="info-item">
                                    <strong>Fotografer:</strong>
                                    <span>{{ $galeri->fotografer }}</span>
                                </div>
                            @endif

                            <div class="info-item">
                                <strong>Urutan:</strong>
                                <span>{{ $galeri->urutan }}</span>
                            </div>

                            <div class="info-item">
                                <strong>Status:</strong>
                                <span class="badge badge-{{ $galeri->status ? 'success' : 'secondary' }} badge-sm">
                                    {{ $galeri->status ? 'Aktif' : 'Tidak Aktif' }}
                                </span>
                            </div>

                            <div class="info-item">
                                <strong>Foto Unggulan:</strong>
                                <span class="badge badge-{{ $galeri->is_featured ? 'warning' : 'secondary' }} badge-sm">
                                    {{ $galeri->is_featured ? 'Ya' : 'Tidak' }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="info-card">
                        <h6>Meta Informasi</h6>
                        <div class="info-list">
                            <div class="info-item">
                                <strong>Dibuat oleh:</strong>
                                <span>{{ $galeri->creator->name ?? 'Administrator' }}</span>
                            </div>

                            <div class="info-item">
                                <strong>Tanggal Upload:</strong>
                                <span>{{ $galeri->created_at->format('d F Y, H:i') }}</span>
                            </div>

                            <div class="info-item">
                                <strong>Terakhir Diupdate:</strong>
                                <span>{{ $galeri->updated_at->format('d F Y, H:i') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="action-buttons">
                        <a href="{{ route('admin.galeri.edit', $galeri) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit Foto
                        </a>
                        <a href="{{ route('galeri.public.show', $galeri) }}" class="btn btn-info btn-sm" target="_blank">
                            <i class="fas fa-external-link-alt"></i> Lihat di Frontend
                        </a>
                        <form action="{{ route('admin.galeri.destroy', $galeri) }}" 
                              method="POST" 
                              style="display: inline-block;"
                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto ini?')">
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
@endsection
