@extends('layouts.admin')

@section('title', 'Tambah Agenda')

@section('content')
<div class="agenda-container">
    <div class="page-header">
        <div>
            <h1 class="page-title">
                <i class="fas fa-calendar-plus"></i>
                Tambah Agenda Kegiatan
            </h1>
            <div class="breadcrumb">
                <i class="fas fa-home"></i>
                Dashboard <i class="fas fa-chevron-right"></i> 
                <a href="{{ route('admin.agenda.index') }}" style="color: #3b82f6;">Kelola Agenda</a> 
                <i class="fas fa-chevron-right"></i> 
                <span>Tambah Agenda</span>
            </div>
        </div>
        <div class="header-actions">
            <a href="{{ route('admin.agenda.index') }}" class="btn-secondary">
                <i class="fas fa-arrow-left"></i>
                Kembali
            </a>
        </div>
    </div>
    @if($errors->any())
        <div class="alert alert-danger">
            <i class="fas fa-exclamation-triangle"></i>
            <strong>Terjadi kesalahan!</strong>
            <ul class="error-list">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form-container">
        <form action="{{ route('admin.agenda.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-grid">
                <!-- Main Content -->
                <div class="main-content">
                    <div class="form-card">
                        <div class="card-header">
                            <h3><i class="fas fa-edit"></i>Informasi Agenda</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="judul" class="form-label">
                                    <i class="fas fa-heading"></i>Judul Agenda 
                                    <span class="required">*</span>
                                </label>
                                <input type="text" class="form-control" id="judul" name="judul" 
                                       value="{{ old('judul') }}" placeholder="Masukkan judul agenda..." required>
                            </div>

                            <div class="form-group">
                                <label for="deskripsi" class="form-label">
                                    <i class="fas fa-align-left"></i>Deskripsi 
                                    <span class="required">*</span>
                                </label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="6" 
                                          placeholder="Jelaskan detail agenda kegiatan..." required>{{ old('deskripsi') }}</textarea>
                                <div class="form-help">Berikan deskripsi yang jelas dan detail tentang agenda kegiatan.</div>
                            </div>

                            <div class="form-group">
                                <label for="lokasi" class="form-label">
                                    <i class="fas fa-map-marker-alt"></i>Lokasi 
                                    <span class="required">*</span>
                                </label>
                                <input type="text" class="form-control" id="lokasi" name="lokasi" 
                                       value="{{ old('lokasi') }}" placeholder="Contoh: Balai Desa Cibeureum" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-card">
                        <div class="card-header">
                            <h3><i class="fas fa-clock"></i>Waktu Pelaksanaan</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="tanggal_mulai" class="form-label">
                                        <i class="fas fa-calendar-alt"></i>Tanggal & Waktu Mulai 
                                        <span class="required">*</span>
                                    </label>
                                    <input type="datetime-local" class="form-control" id="tanggal_mulai" 
                                           name="tanggal_mulai" value="{{ old('tanggal_mulai') }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_selesai" class="form-label">
                                        <i class="fas fa-calendar-check"></i>Tanggal & Waktu Selesai 
                                        <span class="required">*</span>
                                    </label>
                                    <input type="datetime-local" class="form-control" id="tanggal_selesai" 
                                           name="tanggal_selesai" value="{{ old('tanggal_selesai') }}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Sidebar -->
                <div class="sidebar-content">
                    <div class="form-card">
                        <div class="card-header">
                            <h3><i class="fas fa-cogs"></i>Pengaturan</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="kategori" class="form-label">
                                    <i class="fas fa-tags"></i>Kategori 
                                    <span class="required">*</span>
                                </label>
                                <select class="form-control" id="kategori" name="kategori" required>
                                    <option value="">Pilih Kategori</option>
                                    <option value="rapat" {{ old('kategori') == 'rapat' ? 'selected' : '' }}>Rapat</option>
                                    <option value="acara" {{ old('kategori') == 'acara' ? 'selected' : '' }}>Acara</option>
                                    <option value="kegiatan" {{ old('kategori') == 'kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                                    <option value="musyawarah" {{ old('kategori') == 'musyawarah' ? 'selected' : '' }}>Musyawarah</option>
                                    <option value="pelatihan" {{ old('kategori') == 'pelatihan' ? 'selected' : '' }}>Pelatihan</option>
                                    <option value="lainnya" {{ old('kategori') == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="status" class="form-label">
                                    <i class="fas fa-info-circle"></i>Status 
                                    <span class="required">*</span>
                                </label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="">Pilih Status</option>
                                    <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                    <option value="selesai" {{ old('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                    <option value="dibatalkan" {{ old('status') == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-card">
                        <div class="card-header">
                            <h3><i class="fas fa-image"></i>Gambar Agenda</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="gambar" class="form-label">Upload Gambar</label>
                                <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
                                <div class="form-help">
                                    <i class="fas fa-info-circle"></i>
                                    Format: JPG, PNG, GIF. Maksimal: 2MB
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-card">
                        <div class="card-body">
                            <div class="form-actions">
                                <button type="submit" class="btn-primary">
                                    <i class="fas fa-save"></i>Simpan Agenda
                                </button>
                                <a href="{{ route('admin.agenda.index') }}" class="btn-secondary">
                                    <i class="fas fa-times"></i>Batal
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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
    font-size: 24px;
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

.header-actions .btn-secondary {
    background: #f1f5f9;
    color: #475569;
    padding: 12px 20px;
    border-radius: 10px;
    border: 1px solid #e2e8f0;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 8px;
    text-decoration: none;
    transition: all 0.3s ease;
}

.header-actions .btn-secondary:hover {
    background: #e2e8f0;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.alert {
    padding: 16px 20px;
    border-radius: 12px;
    margin-bottom: 24px;
    display: flex;
    align-items: flex-start;
    gap: 12px;
    animation: slideIn 0.3s ease;
}

.alert-danger {
    background: linear-gradient(135deg, #fecaca 0%, #fca5a5 100%);
    color: #991b1b;
    border: 1px solid #f87171;
}

.error-list {
    margin: 8px 0 0 0;
    padding-left: 20px;
}

.error-list li {
    margin-bottom: 4px;
}

.form-container {
    background: white;
    border-radius: 16px;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.form-grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 24px;
    max-width: 1400px;
    margin: 0 auto;
}

.main-content {
    padding: 0;
}

.sidebar-content {
    padding: 0;
}

.form-card {
    background: white;
    border-radius: 12px;
    border: 1px solid #e5e7eb;
    margin-bottom: 24px;
    overflow: hidden;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
}

.form-card:hover {
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

.form-group {
    margin-bottom: 24px;
}

.form-group:last-child {
    margin-bottom: 0;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 24px;
    align-items: start;
}

.form-label {
    display: flex;
    align-items: center;
    gap: 8px;
    font-weight: 600;
    color: #374151;
    margin-bottom: 8px;
    font-size: 14px;
}

.form-label i {
    color: #6b7280;
    width: 16px;
}

.required {
    color: #ef4444;
}

.form-control {
    width: 100%;
    padding: 12px 16px;
    border: 2px solid #e5e7eb;
    border-radius: 8px;
    font-size: 14px;
    transition: all 0.3s ease;
    background: white;
}

.form-control:focus {
    outline: none;
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

.form-control::placeholder {
    color: #9ca3af;
}

textarea.form-control {
    resize: vertical;
    min-height: 120px;
}

select.form-control {
    cursor: pointer;
}

select.form-control option {
    padding: 8px;
}

.form-help {
    margin-top: 6px;
    font-size: 13px;
    color: #6b7280;
    display: flex;
    align-items: center;
    gap: 6px;
}

.form-actions {
    display: flex;
    flex-direction: column;
    gap: 16px;
    margin-top: 8px;
}

.btn-primary {
    background: linear-gradient(135deg, #3b82f6, #1d4ed8);
    color: white;
    padding: 14px 20px;
    border-radius: 10px;
    border: none;
    font-weight: 600;
    font-size: 14px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    text-decoration: none;
    transition: all 0.3s ease;
    box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.3);
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 15px -3px rgba(59, 130, 246, 0.4);
}

.btn-secondary {
    background: #f1f5f9;
    color: #475569;
    padding: 14px 20px;
    border-radius: 10px;
    border: 1px solid #e2e8f0;
    font-weight: 600;
    font-size: 14px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    text-decoration: none;
    transition: all 0.3s ease;
}

.btn-secondary:hover {
    background: #e2e8f0;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* File Upload Styling */
input[type="file"].form-control {
    padding: 8px 12px;
    cursor: pointer;
}

input[type="file"].form-control::-webkit-file-upload-button {
    background: linear-gradient(135deg, #3b82f6, #1d4ed8);
    color: white;
    border: none;
    padding: 6px 12px;
    border-radius: 6px;
    margin-right: 12px;
    cursor: pointer;
    font-size: 12px;
    font-weight: 500;
}

/* Responsive Design */
@media (max-width: 1200px) {
    .form-grid {
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
    
    .main-content,
    .sidebar-content {
        padding: 0;
    }
    
    .card-body {
        padding: 20px;
    }
    
    .form-row {
        grid-template-columns: 1fr;
        gap: 16px;
    }
    
    .page-title {
        font-size: 20px;
    }
    
    .form-grid {
        gap: 16px;
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

<script>
document.getElementById('tanggal_mulai').addEventListener('change', function() {
    const tanggalMulai = new Date(this.value);
    const tanggalSelesai = document.getElementById('tanggal_selesai');
    
    if (tanggalMulai) {
        tanggalSelesai.min = this.value;
        if (tanggalSelesai.value && new Date(tanggalSelesai.value) < tanggalMulai) {
            tanggalSelesai.value = this.value;
        }
    }
});

// Auto-resize textarea
document.getElementById('deskripsi').addEventListener('input', function() {
    this.style.height = 'auto';
    this.style.height = this.scrollHeight + 'px';
});
</script>
@endsection
