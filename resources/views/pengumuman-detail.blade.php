<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pengumuman->judul }} - SiDesa Cibeureum</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: #2c3e50;
            background-color: #f8f9fa;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* Header */
        .header {
            background: linear-gradient(135deg, #3498db, #2980b9);
            color: white;
            padding: 2rem 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: rotate 20s linear infinite;
        }
        
        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .header-content {
            position: relative;
            z-index: 2;
        }
        
        .header h1 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        
        .header p {
            font-size: 1rem;
            opacity: 0.9;
        }
        
        /* Navigation */
        .back-nav {
            background: white;
            padding: 1rem 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .back-nav a {
            color: #3498db;
            text-decoration: none;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }
        
        .back-nav a:hover {
            color: #2980b9;
            transform: translateX(-5px);
        }
        
        /* Main Content */
        .main-content {
            display: grid;
            grid-template-columns: 1fr 300px;
            gap: 3rem;
            padding: 3rem 0;
        }
        
        .article-content {
            background: white;
            border-radius: 15px;
            padding: 2.5rem;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            border: 1px solid #e9ecef;
        }
        
        .article-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #e9ecef;
        }
        
        .article-kategori {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .kategori-umum { background: #e3f2fd; color: #1976d2; }
        .kategori-penting { background: #ffebee; color: #d32f2f; }
        .kategori-kegiatan { background: #e8f5e8; color: #388e3c; }
        .kategori-pembangunan { background: #fff3e0; color: #f57c00; }
        .kategori-kesehatan { background: #f3e5f5; color: #7b1fa2; }
        .kategori-pendidikan { background: #e0f2f1; color: #00695c; }
        
        .article-prioritas {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }
        
        .prioritas-tinggi { background: #ffebee; color: #d32f2f; }
        .prioritas-sedang { background: #fff3e0; color: #f57c00; }
        .prioritas-rendah { background: #e8f5e8; color: #388e3c; }
        
        .article-title {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #2c3e50;
            line-height: 1.3;
        }
        
        .article-info {
            display: flex;
            gap: 2rem;
            margin-bottom: 2rem;
            font-size: 0.9rem;
            color: #6c757d;
        }
        
        .article-info span {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .article-info i {
            color: #3498db;
        }
        
        .article-image {
            width: 100%;
            margin-bottom: 2rem;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        
        .article-image img {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }
        
        .article-body {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #2c3e50;
        }
        
        .article-body p {
            margin-bottom: 1.5rem;
        }
        
        .article-body h2,
        .article-body h3,
        .article-body h4 {
            margin-top: 2rem;
            margin-bottom: 1rem;
            color: #2c3e50;
        }
        
        .article-body ul,
        .article-body ol {
            margin-left: 2rem;
            margin-bottom: 1.5rem;
        }
        
        .article-body li {
            margin-bottom: 0.5rem;
        }
        
        /* Sidebar */
        .sidebar {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }
        
        .sidebar-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            border: 1px solid #e9ecef;
        }
        
        .sidebar-card h3 {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #2c3e50;
        }
        
        .related-item {
            display: block;
            text-decoration: none;
            color: inherit;
            padding: 1rem;
            margin-bottom: 1rem;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .related-item:hover {
            background: #f8f9fa;
            border-color: #3498db;
            transform: translateX(5px);
        }
        
        .related-item h4 {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #2c3e50;
        }
        
        .related-item p {
            font-size: 0.85rem;
            color: #6c757d;
            margin-bottom: 0.5rem;
        }
        
        .related-item .date {
            font-size: 0.75rem;
            color: #3498db;
        }
        
        .share-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid #e9ecef;
        }
        
        .share-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            text-decoration: none;
            color: white;
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }
        
        .share-btn:hover {
            transform: translateY(-2px);
        }
        
        .share-fb { background: #1877f2; }
        .share-tw { background: #1da1f2; }
        .share-wa { background: #25d366; }
        .share-tg { background: #0088cc; }
        
        /* Responsive */
        @media (max-width: 768px) {
            .main-content {
                grid-template-columns: 1fr;
                gap: 2rem;
                padding: 2rem 0;
            }
            
            .article-content {
                padding: 1.5rem;
            }
            
            .article-title {
                font-size: 1.8rem;
            }
            
            .article-info {
                flex-direction: column;
                gap: 1rem;
            }
            
            .article-meta {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }
            
            .header h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="container">
            <div class="header-content">
                <h1>Detail Pengumuman</h1>
                <p>Informasi lengkap pengumuman dari Desa Cibeureum</p>
            </div>
        </div>
    </div>

    <!-- Back Navigation -->
    <div class="back-nav">
        <div class="container">
            <a href="{{ route('pengumuman.public') }}">
                <i class="fas fa-arrow-left"></i>
                Kembali ke Daftar Pengumuman
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <div class="main-content">
            <article class="article-content">
                <div class="article-meta">
                    <span class="article-kategori kategori-{{ $pengumuman->kategori }}">
                        {{ ucfirst($pengumuman->kategori) }}
                    </span>
                    <span class="article-prioritas prioritas-{{ $pengumuman->prioritas }}">
                        Prioritas {{ ucfirst($pengumuman->prioritas) }}
                    </span>
                </div>

                <h1 class="article-title">{{ $pengumuman->judul }}</h1>

                <div class="article-info">
                    <span>
                        <i class="fas fa-calendar-alt"></i>
                        {{ $pengumuman->created_at->format('d F Y') }}
                    </span>
                    <span>
                        <i class="fas fa-user"></i>
                        {{ $pengumuman->creator->name ?? 'Admin' }}
                    </span>
                    <span>
                        <i class="fas fa-clock"></i>
                        {{ $pengumuman->created_at->diffForHumans() }}
                    </span>
                </div>

                @if($pengumuman->gambar)
                <div class="article-image">
                    <img src="{{ asset('storage/' . $pengumuman->gambar) }}" alt="{{ $pengumuman->judul }}">
                </div>
                @endif

                <div class="article-body">
                    {!! nl2br(e($pengumuman->konten)) !!}
                </div>

                <div class="share-buttons">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" class="share-btn share-fb" target="_blank">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($pengumuman->judul) }}" class="share-btn share-tw" target="_blank">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://wa.me/?text={{ urlencode($pengumuman->judul . ' - ' . request()->fullUrl()) }}" class="share-btn share-wa" target="_blank">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <a href="https://t.me/share/url?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($pengumuman->judul) }}" class="share-btn share-tg" target="_blank">
                        <i class="fab fa-telegram"></i>
                    </a>
                </div>
            </article>

            <aside class="sidebar">
                @if($relatedAnnouncements->count() > 0)
                <div class="sidebar-card">
                    <h3><i class="fas fa-newspaper"></i> Pengumuman Terkait</h3>
                    @foreach($relatedAnnouncements as $related)
                    <a href="{{ route('pengumuman.public') }}?id={{ $related->id }}" class="related-item">
                        <h4>{{ $related->judul }}</h4>
                        <p>{{ Str::limit(strip_tags($related->konten), 80) }}</p>
                        <div class="date">{{ $related->created_at->format('d M Y') }}</div>
                    </a>
                    @endforeach
                </div>
                @endif

                <div class="sidebar-card">
                    <h3><i class="fas fa-info-circle"></i> Informasi</h3>
                    <div style="font-size: 0.9rem; color: #6c757d;">
                        <p><strong>Kategori:</strong> {{ ucfirst($pengumuman->kategori) }}</p>
                        <p><strong>Prioritas:</strong> {{ ucfirst($pengumuman->prioritas) }}</p>
                        <p><strong>Dipublikasikan:</strong> {{ $pengumuman->created_at->format('d F Y') }}</p>
                        @if($pengumuman->tanggal_selesai)
                        <p><strong>Berlaku sampai:</strong> {{ $pengumuman->tanggal_selesai->format('d F Y') }}</p>
                        @endif
                    </div>
                </div>

                <div class="sidebar-card">
                    <h3><i class="fas fa-phone"></i> Kontak</h3>
                    <div style="font-size: 0.9rem; color: #6c757d;">
                        <p><strong>Kantor Desa Cibeureum</strong></p>
                        <p><i class="fas fa-map-marker-alt"></i> Jl. Desa Cibeureum, Talaga</p>
                        <p><i class="fas fa-phone"></i> (021) 1234-5678</p>
                        <p><i class="fas fa-envelope"></i> cibeureum@gmail.com</p>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</body>
</html>
