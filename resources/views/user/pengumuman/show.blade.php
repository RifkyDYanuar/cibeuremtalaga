@extends('layouts.user')

@section('page-title', $pengumuman->judul)

@section('content')
<!-- Breadcrumb Navigation -->
<div class="bg-white rounded-xl shadow-lg border border-gray-100 p-4 mb-6">
    <nav class="flex items-center space-x-2 text-sm">
        <a href="{{ route('user.dashboard') }}" class="text-village-primary hover:text-village-secondary transition-colors">
            <i class="fas fa-home mr-1"></i>Dashboard
        </a>
        <i class="fas fa-chevron-right text-gray-400"></i>
        <a href="{{ route('user.pengumuman.index') }}" class="text-village-primary hover:text-village-secondary transition-colors">
            Pengumuman
        </a>
        <i class="fas fa-chevron-right text-gray-400"></i>
        <span class="text-gray-600">{{ Str::limit($pengumuman->judul, 50) }}</span>
    </nav>
    
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mt-4 pt-4 border-t border-gray-100">
        <h1 class="text-lg font-semibold text-gray-800">Detail Pengumuman</h1>
        <a href="{{ route('user.pengumuman.index') }}" 
           class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-all duration-200 mt-2 sm:mt-0">
            <i class="fas fa-arrow-left mr-2"></i>
            Kembali ke Daftar
        </a>
    </div>
</div>

<div class="content-body">
<!-- Main Announcement Detail -->
<div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden mb-8">
    <!-- Header Section -->
    <div class="bg-gradient-to-br from-village-primary to-village-secondary text-white p-6">
        <!-- Badge Section -->
        <div class="flex flex-wrap gap-2 mb-4">
            <span class="px-3 py-1 text-xs font-semibold rounded-full
                {{ $pengumuman->kategori == 'penting' ? 'bg-red-500 text-white' : 
                   ($pengumuman->kategori == 'kegiatan' ? 'bg-blue-500 text-white' : 'bg-white text-village-primary') }}">
                {{ ucfirst($pengumuman->kategori) }}
            </span>
            <span class="px-3 py-1 text-xs font-semibold rounded-full
                {{ $pengumuman->prioritas == 'tinggi' ? 'bg-red-500 text-white' : 
                   ($pengumuman->prioritas == 'sedang' ? 'bg-yellow-500 text-white' : 'bg-green-500 text-white') }}">
                Prioritas {{ ucfirst($pengumuman->prioritas) }}
            </span>
            @if($pengumuman->is_featured)
                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-yellow-500 text-white">
                    <i class="fas fa-star mr-1"></i>Diutamakan
                </span>
            @endif
        </div>
        
        <!-- Title -->
        <h1 class="text-2xl md:text-3xl font-bold mb-4 leading-tight">{{ $pengumuman->judul }}</h1>
        
        <!-- Info Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 pt-4 border-t border-village-primary-300">
            <div class="flex items-center text-village-primary-100">
                <div class="bg-village-primary-200 bg-opacity-20 p-2 rounded-lg mr-3">
                    <i class="fas fa-calendar text-white"></i>
                </div>
                <div>
                    <div class="text-xs opacity-75">Tanggal Mulai</div>
                    <div class="font-semibold">{{ $pengumuman->tanggal_mulai->format('d F Y') }}</div>
                </div>
            </div>
            
            @if($pengumuman->tanggal_selesai)
                <div class="flex items-center text-village-primary-100">
                    <div class="bg-village-primary-200 bg-opacity-20 p-2 rounded-lg mr-3">
                        <i class="fas fa-calendar-times text-white"></i>
                    </div>
                    <div>
                        <div class="text-xs opacity-75">Berlaku Sampai</div>
                        <div class="font-semibold">{{ $pengumuman->tanggal_selesai->format('d F Y') }}</div>
                    </div>
                </div>
            @endif
            
            <div class="flex items-center text-village-primary-100">
                <div class="bg-village-primary-200 bg-opacity-20 p-2 rounded-lg mr-3">
                    <i class="fas fa-user text-white"></i>
                </div>
                <div>
                    <div class="text-xs opacity-75">Dipublikasi oleh</div>
                    <div class="font-semibold">{{ $pengumuman->creator->name ?? 'Admin Desa' }}</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Section -->
    <div class="p-6">
        @if($pengumuman->gambar)
            <div class="mb-6">
                <div class="relative rounded-xl overflow-hidden shadow-lg">
                    <img src="{{ asset('storage/' . $pengumuman->gambar) }}" 
                         alt="{{ $pengumuman->judul }}" 
                         class="w-full h-64 md:h-80 object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                </div>
            </div>
        @endif
        
        <!-- Content Text -->
        <div class="prose prose-lg max-w-none">
            @if(strlen($pengumuman->konten) > 500)
                <div id="content-preview" class="text-gray-700 leading-relaxed">
                    {!! nl2br(e(Str::limit($pengumuman->konten, 500))) !!}
                    <div class="text-center mt-6 pt-6 border-t border-gray-200">
                        <button id="read-more-btn" 
                                class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-village-primary to-village-secondary text-white font-semibold rounded-lg hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                            <i class="fas fa-chevron-down mr-2"></i>
                            Baca Selengkapnya
                        </button>
                    </div>
                </div>
                
                <div id="content-full" style="display: none;" class="text-gray-700 leading-relaxed">
                    {!! nl2br(e($pengumuman->konten)) !!}
                    <div class="text-center mt-6 pt-6 border-t border-gray-200">
                        <button id="read-less-btn" 
                                class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-gray-500 to-gray-600 text-white font-semibold rounded-lg hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                            <i class="fas fa-chevron-up mr-2"></i>
                            Sembunyikan
                        </button>
                    </div>
                </div>
            @else
                <div id="content-short" class="text-gray-700 leading-relaxed">
                    {!! nl2br(e($pengumuman->konten)) !!}
                </div>
            @endif
        </div>
    </div>

    <!-- Footer Section -->
    <div class="bg-gray-50 p-6 border-t border-gray-200">
        <!-- Share Section -->
        <div class="mb-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-share-alt text-village-primary mr-2"></i>
                Bagikan Pengumuman
            </h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                <a href="https://api.whatsapp.com/send?text={{ urlencode($pengumuman->judul . ' - ' . url()->current()) }}" 
                   class="flex items-center justify-center p-3 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-all duration-200 transform hover:scale-105" 
                   target="_blank">
                    <i class="fab fa-whatsapp mr-2"></i>
                    <span class="hidden sm:inline">WhatsApp</span>
                </a>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" 
                   class="flex items-center justify-center p-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-all duration-200 transform hover:scale-105" 
                   target="_blank">
                    <i class="fab fa-facebook-f mr-2"></i>
                    <span class="hidden sm:inline">Facebook</span>
                </a>
                <a href="https://twitter.com/intent/tweet?text={{ urlencode($pengumuman->judul) }}&url={{ urlencode(url()->current()) }}" 
                   class="flex items-center justify-center p-3 bg-blue-400 text-white rounded-lg hover:bg-blue-500 transition-all duration-200 transform hover:scale-105" 
                   target="_blank">
                    <i class="fab fa-twitter mr-2"></i>
                    <span class="hidden sm:inline">Twitter</span>
                </a>
                <button onclick="copyLink()" 
                        class="flex items-center justify-center p-3 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-all duration-200 transform hover:scale-105">
                    <i class="fas fa-copy mr-2"></i>
                    <span class="hidden sm:inline">Salin Link</span>
                </button>
            </div>
        </div>

        <!-- Actions -->
        <div class="text-center pt-6 border-t border-gray-200">
            <a href="{{ route('user.pengumuman.index') }}" 
               class="inline-flex items-center px-8 py-3 bg-village-primary text-white font-semibold rounded-lg hover:bg-village-secondary transition-all duration-200 transform hover:scale-105 shadow-lg">
                <i class="fas fa-list mr-2"></i>
                Lihat Pengumuman Lainnya
            </a>
        </div>
    </div>
</div>

<!-- Related Announcements -->
@if($relatedAnnouncements->count() > 0)
    <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
        <div class="flex items-center mb-6">
            <div class="bg-village-primary-100 p-3 rounded-lg mr-4">
                <i class="fas fa-bullhorn text-village-primary text-xl"></i>
            </div>
            <div>
                <h2 class="text-xl font-bold text-gray-800">Pengumuman Terkait</h2>
                <p class="text-gray-600 text-sm">Informasi lain yang mungkin Anda minati</p>
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($relatedAnnouncements as $related)
                <div class="bg-gray-50 rounded-lg p-4 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 border border-gray-200">
                    <div class="flex items-center justify-between mb-3">
                        <span class="px-3 py-1 text-xs font-semibold rounded-full
                            {{ $related->kategori == 'penting' ? 'bg-red-100 text-red-800' : 
                               ($related->kategori == 'kegiatan' ? 'bg-blue-100 text-blue-800' : 'bg-village-primary-100 text-village-primary-800') }}">
                            {{ ucfirst($related->kategori) }}
                        </span>
                        <span class="text-xs text-gray-500 flex items-center">
                            <i class="fas fa-calendar mr-1"></i>
                            {{ $related->tanggal_mulai->format('d/m/Y') }}
                        </span>
                    </div>
                    
                    <h3 class="font-semibold text-gray-800 mb-2 line-clamp-2">{{ $related->judul }}</h3>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ Str::limit($related->konten, 100) }}</p>
                    
                    <a href="{{ route('user.pengumuman.show', $related) }}" 
                       class="inline-flex items-center text-village-primary hover:text-village-secondary transition-colors text-sm font-medium">
                        <i class="fas fa-eye mr-2"></i>
                        Lihat Detail
                        <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endif

<style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .prose {
        font-size: 1rem;
        line-height: 1.75;
    }
    
    .prose p {
        margin-bottom: 1.25em;
    }
    
    .prose p:last-child {
        margin-bottom: 0;
    }
</style>

<script>
// Function to copy link to clipboard
function copyLink() {
    const url = window.location.href;
    if (navigator.clipboard && navigator.clipboard.writeText) {
        navigator.clipboard.writeText(url).then(function() {
            // Show success message with modern styling
            showNotification('Link berhasil disalin!', 'success');
        }, function(err) {
            console.error('Gagal menyalin link: ', err);
            fallbackCopyTextToClipboard(url);
        });
    } else {
        fallbackCopyTextToClipboard(url);
    }
}

// Fallback copy method for older browsers
function fallbackCopyTextToClipboard(text) {
    const textArea = document.createElement("textarea");
    textArea.value = text;
    textArea.style.position = 'fixed';
    textArea.style.top = '0';
    textArea.style.left = '0';
    textArea.style.width = '2em';
    textArea.style.height = '2em';
    textArea.style.padding = '0';
    textArea.style.border = 'none';
    textArea.style.outline = 'none';
    textArea.style.boxShadow = 'none';
    textArea.style.background = 'transparent';
    document.body.appendChild(textArea);
    textArea.focus();
    textArea.select();
    
    try {
        const successful = document.execCommand('copy');
        if (successful) {
            showNotification('Link berhasil disalin!', 'success');
        } else {
            showNotification('Gagal menyalin link. Silakan salin manual.', 'error');
        }
    } catch (err) {
        console.error('Fallback: Gagal menyalin link', err);
        showNotification('Gagal menyalin link. Silakan salin manual.', 'error');
    }
    
    document.body.removeChild(textArea);
}

// Modern notification function
function showNotification(message, type = 'info') {
    // Remove existing notifications
    const existingNotifications = document.querySelectorAll('.notification-toast');
    existingNotifications.forEach(notification => notification.remove());
    
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `notification-toast fixed top-4 right-4 z-50 px-6 py-4 rounded-lg shadow-lg transform transition-all duration-300 ease-in-out translate-x-full`;
    
    // Set styling based on type
    if (type === 'success') {
        notification.className += ' bg-green-500 text-white';
        notification.innerHTML = `
            <div class="flex items-center">
                <i class="fas fa-check-circle mr-3"></i>
                <span>${message}</span>
            </div>
        `;
    } else if (type === 'error') {
        notification.className += ' bg-red-500 text-white';
        notification.innerHTML = `
            <div class="flex items-center">
                <i class="fas fa-exclamation-circle mr-3"></i>
                <span>${message}</span>
            </div>
        `;
    } else {
        notification.className += ' bg-blue-500 text-white';
        notification.innerHTML = `
            <div class="flex items-center">
                <i class="fas fa-info-circle mr-3"></i>
                <span>${message}</span>
            </div>
        `;
    }
    
    document.body.appendChild(notification);
    
    // Show notification
    setTimeout(() => {
        notification.classList.remove('translate-x-full');
    }, 100);
    
    // Hide notification after 3 seconds
    setTimeout(() => {
        notification.classList.add('translate-x-full');
        setTimeout(() => {
            if (notification.parentNode) {
                notification.parentNode.removeChild(notification);
            }
        }, 300);
    }, 3000);
}

// Handle read more/less functionality
document.addEventListener('DOMContentLoaded', function() {
    const readMoreBtn = document.getElementById('read-more-btn');
    const readLessBtn = document.getElementById('read-less-btn');
    const contentPreview = document.getElementById('content-preview');
    const contentFull = document.getElementById('content-full');

    if (readMoreBtn && contentPreview && contentFull) {
        readMoreBtn.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Add smooth transition
            contentPreview.style.opacity = '0';
            
            setTimeout(() => {
                contentPreview.style.display = 'none';
                contentFull.style.display = 'block';
                contentFull.style.opacity = '0';
                
                // Smooth fade in
                setTimeout(() => {
                    contentFull.style.opacity = '1';
                }, 50);
                
                // Smooth scroll to content
                setTimeout(() => {
                    const offset = 100;
                    const elementPosition = contentFull.getBoundingClientRect().top;
                    const offsetPosition = elementPosition + window.pageYOffset - offset;
                    
                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                }, 200);
            }, 150);
        });
    }

    if (readLessBtn && contentPreview && contentFull) {
        readLessBtn.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Add smooth transition
            contentFull.style.opacity = '0';
            
            setTimeout(() => {
                contentFull.style.display = 'none';
                contentPreview.style.display = 'block';
                contentPreview.style.opacity = '0';
                
                // Smooth fade in
                setTimeout(() => {
                    contentPreview.style.opacity = '1';
                }, 50);
                
                // Smooth scroll to content
                setTimeout(() => {
                    const offset = 100;
                    const elementPosition = contentPreview.getBoundingClientRect().top;
                    const offsetPosition = elementPosition + window.pageYOffset - offset;
                    
                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                }, 200);
            }, 150);
        });
    }
    
    // Add smooth transitions to content elements
    if (contentPreview) {
        contentPreview.style.transition = 'opacity 0.3s ease-in-out';
    }
    if (contentFull) {
        contentFull.style.transition = 'opacity 0.3s ease-in-out';
    }
});
</script>
@endsection
