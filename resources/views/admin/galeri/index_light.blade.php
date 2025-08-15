@extends('layouts.admin')

@section('page-title', 'Manajemen Galeri')

@section('content')
<div class="content-header">
    <div class="content-header-left">
        <h1>Manajemen Galeri</h1>
        <nav class="breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <span> / </span>
            <span>Galeri</span>
        </nav>
    </div>
    <div class="content-header-right">
        <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Foto
        </a>
    </div>
</div>

<style>
/* Lightweight CSS */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 15px;
    margin-bottom: 20px;
}

.stat-card {
    background: white;
    border-radius: 6px;
    padding: 16px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    border-left: 3px solid #3b82f6;
    display: flex;
    align-items: center;
    gap: 12px;
}

.stat-icon {
    width: 40px;
    height: 40px;
    border-radius: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 16px;
    background: #3b82f6;
}

.stat-content h3 {
    font-size: 18px;
    font-weight: 600;
    color: #1f2937;
    margin: 0;
}

.stat-content p {
    font-size: 12px;
    color: #6b7280;
    margin: 2px 0 0 0;
}

.filters-section {
    background: white;
    border-radius: 6px;
    padding: 16px;
    margin-bottom: 20px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
}

.filters-form {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    gap: 12px;
    align-items: end;
}

.form-group label {
    font-size: 12px;
    font-weight: 500;
    color: #374151;
    margin-bottom: 4px;
    display: block;
}

.form-control {
    padding: 6px 8px;
    border: 1px solid #d1d5db;
    border-radius: 4px;
    font-size: 12px;
}

.btn {
    padding: 6px 12px;
    border-radius: 4px;
    font-size: 12px;
    font-weight: 500;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 4px;
    border: none;
    cursor: pointer;
}

.btn-primary { background: #3b82f6; color: white; }
.btn-success { background: #10b981; color: white; }
.btn-warning { background: #f59e0b; color: white; }
.btn-danger { background: #ef4444; color: white; }
.btn:hover { opacity: 0.9; }

.gallery-section {
    background: white;
    border-radius: 6px;
    padding: 16px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
}

.gallery-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 16px;
    margin-bottom: 16px;
}

.gallery-item {
    background: white;
    border-radius: 6px;
    overflow: hidden;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    border: 1px solid #e5e7eb;
}

.gallery-image {
    width: 100%;
    height: 150px;
    object-fit: cover;
}

.gallery-content {
    padding: 12px;
}

.gallery-title {
    font-size: 14px;
    font-weight: 500;
    color: #1f2937;
    margin: 0 0 6px 0;
}

.gallery-meta {
    margin-bottom: 8px;
}

.meta-item {
    font-size: 11px;
    color: #6b7280;
    margin-bottom: 2px;
}

.gallery-description {
    font-size: 12px;
    color: #4b5563;
    margin: 0 0 8px 0;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.gallery-actions {
    display: flex;
    gap: 4px;
    justify-content: flex-end;
}

.status-badge {
    padding: 2px 6px;
    border-radius: 3px;
    font-size: 9px;
    font-weight: 500;
    text-transform: uppercase;
}

.status-aktif { background: #10b981; color: white; }
.status-tidak-aktif { background: #ef4444; color: white; }

.empty-state {
    text-align: center;
    padding: 30px;
    color: #6b7280;
}

@media (max-width: 768px) {
    .stats-grid { grid-template-columns: repeat(2, 1fr); gap: 10px; }
    .filters-form { grid-template-columns: 1fr; }
    .gallery-grid { grid-template-columns: 1fr; gap: 12px; }
}
</style>

<!-- Statistics Cards -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-images"></i>
        </div>
        <div class="stat-content">
            <h3>{{ $totalGaleri }}</h3>
            <p>Total Foto</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-eye"></i>
        </div>
        <div class="stat-content">
            <h3>{{ $galeriAktif }}</h3>
            <p>Aktif</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-eye-slash"></i>
        </div>
        <div class="stat-content">
            <h3>{{ $galeriTidakAktif }}</h3>
            <p>Tidak Aktif</p>
        </div>
    </div>
</div>

<!-- Filters -->
<div class="filters-section">
    <form method="GET" action="{{ route('admin.galeri.index') }}" class="filters-form">
        <div class="form-group">
            <label for="kategori">Kategori</label>
            <select name="kategori" id="kategori" class="form-control">
                <option value="">Semua Kategori</option>
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori }}" {{ request('kategori') == $kategori ? 'selected' : '' }}>
                        {{ ucfirst($kategori) }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="">Semua Status</option>
                <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="tidak_aktif" {{ request('status') == 'tidak_aktif' ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
        </div>
        <div class="form-group">
            <label for="search">Pencarian</label>
            <input type="text" name="search" id="search" class="form-control" 
                   placeholder="Cari judul foto..." value="{{ request('search') }}">
        </div>
        <div class="filter-actions">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-search"></i> Filter
            </button>
            <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary">
                <i class="fas fa-refresh"></i> Reset
            </a>
        </div>
    </form>
</div>

<!-- Gallery Grid -->
<div class="gallery-section">
    <div class="gallery-header">
        <h2>Daftar Foto ({{ $galeris->total() }} foto)</h2>
        @if($galeris->count() > 0)
            <form method="POST" action="{{ route('admin.galeri.bulk-destroy') }}" id="bulkDeleteForm">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-danger" id="bulkDeleteBtn" style="display: none;">
                    <i class="fas fa-trash"></i> Hapus Terpilih
                </button>
            </form>
        @endif
    </div>

    @if($galeris->count() > 0)
        <div class="gallery-grid">
            @foreach($galeris as $galeri)
                <div class="gallery-item">
                    <div class="gallery-image-container" style="position: relative;">
                        <img src="{{ asset('storage/' . $galeri->gambar) }}" 
                             alt="{{ $galeri->judul }}" class="gallery-image">
                        <div style="position: absolute; top: 6px; left: 6px;">
                            <input type="checkbox" name="galeri_ids[]" value="{{ $galeri->id }}" 
                                   class="gallery-checkbox" style="transform: scale(1.2);">
                        </div>
                        <div style="position: absolute; top: 6px; right: 6px;">
                            <span class="status-badge status-{{ $galeri->status == 'aktif' ? 'aktif' : 'tidak-aktif' }}">
                                {{ $galeri->status == 'aktif' ? 'Aktif' : 'Tidak Aktif' }}
                            </span>
                        </div>
                    </div>
                    <div class="gallery-content">
                        <h4 class="gallery-title">{{ $galeri->judul }}</h4>
                        <div class="gallery-meta">
                            <div class="meta-item">Kategori: {{ ucfirst($galeri->kategori) }}</div>
                            <div class="meta-item">{{ $galeri->created_at->format('d M Y') }}</div>
                        </div>
                        @if($galeri->deskripsi)
                            <p class="gallery-description">{{ $galeri->deskripsi }}</p>
                        @endif
                        <div class="gallery-actions">
                            <a href="{{ route('admin.galeri.show', $galeri) }}" class="btn btn-primary">
                                <i class="fas fa-eye"></i> Lihat
                            </a>
                            <a href="{{ route('admin.galeri.edit', $galeri) }}" class="btn btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form method="POST" action="{{ route('admin.galeri.destroy', $galeri) }}" 
                                  style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus foto ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div style="margin-top: 20px; display: flex; justify-content: center;">
            {{ $galeris->withQueryString()->links() }}
        </div>
    @else
        <div class="empty-state">
            <i class="fas fa-images"></i>
            <h3>Belum ada foto</h3>
            <p>Tambahkan foto pertama Anda sekarang!</p>
            <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Foto
            </a>
        </div>
    @endif
</div>

<script>
// Simple bulk delete functionality
document.addEventListener('DOMContentLoaded', function() {
    const checkboxes = document.querySelectorAll('.gallery-checkbox');
    const bulkBtn = document.getElementById('bulkDeleteBtn');
    const bulkForm = document.getElementById('bulkDeleteForm');
    
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const checkedBoxes = document.querySelectorAll('.gallery-checkbox:checked');
            bulkBtn.style.display = checkedBoxes.length > 0 ? 'block' : 'none';
        });
    });
    
    bulkBtn.addEventListener('click', function() {
        const checkedBoxes = document.querySelectorAll('.gallery-checkbox:checked');
        if (checkedBoxes.length > 0 && confirm('Yakin ingin menghapus ' + checkedBoxes.length + ' foto terpilih?')) {
            checkedBoxes.forEach(checkbox => {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'galeri_ids[]';
                input.value = checkbox.value;
                bulkForm.appendChild(input);
            });
            bulkForm.submit();
        }
    });
});
</script>
@endsection
