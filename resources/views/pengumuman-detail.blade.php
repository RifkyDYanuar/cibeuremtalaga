@extends('layouts.public')

@section('title', $pengumuman->judul . ' - SiDesa Cibeureum')

@section('content')
<!-- Page Header -->
<section class="relative min-h-[60vh] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-village-primary via-village-secondary to-village-accent"></div>
    <div class="absolute inset-0 bg-black/40 backdrop-blur-[1px]"></div>
    @if($pengumuman->gambar)
        <div class="absolute inset-0 bg-[url('{{ asset('storage/' . $pengumuman->gambar) }}')] bg-cover bg-center opacity-20"></div>
    @else
        <div class="absolute inset-0 bg-[url('{{ asset('images/cibeureum.jpg') }}')] bg-cover bg-center opacity-20"></div>
    @endif
    
    <div class="relative z-10 text-center text-white px-4 max-w-4xl mx-auto">
        <div class="animate-fadeIn">
            <span class="inline-block px-6 py-2 bg-white/20 backdrop-blur-md rounded-full text-sm font-semibold mb-4 border border-white/30">
                <i class="fas fa-bullhorn mr-2"></i>
                {{ ucfirst($pengumuman->kategori) }}
            </span>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-black mb-8 leading-tight hero-text">
                {{ $pengumuman->judul }}
            </h1>
        </div>
        <div class="animate-slideUp" style="animation-delay: 0.3s;">
            <div class="flex flex-wrap justify-center gap-6 text-lg opacity-95">
                <div class="flex items-center">
                    <i class="fas fa-calendar-alt mr-2"></i>
                    {{ $pengumuman->created_at->format('d M Y') }}
                </div>
                <div class="flex items-center">
                    <i class="fas fa-user mr-2"></i>
                    {{ $pengumuman->creator->name ?? 'Administrator' }}
                </div>
                <div class="flex items-center">
                    <i class="fas fa-clock mr-2"></i>
                    {{ $pengumuman->created_at->diffForHumans() }}
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="py-20 bg-gradient-to-br from-gray-50 to-white dark:from-dark-100 dark:to-dark-200 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="xl:col-span-2">
                <div class="bg-white dark:bg-dark-300 rounded-2xl shadow-lg p-8 mb-8">
                    <!-- Status Badges -->
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center gap-3">
                            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold
                                @if($pengumuman->kategori == 'umum') bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300
                                @elseif($pengumuman->kategori == 'penting') bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300
                                @elseif($pengumuman->kategori == 'kegiatan') bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300
                                @elseif($pengumuman->kategori == 'pembangunan') bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-orange-300
                                @elseif($pengumuman->kategori == 'kesehatan') bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-300
                                @elseif($pengumuman->kategori == 'pendidikan') bg-teal-100 text-teal-800 dark:bg-teal-900 dark:text-teal-300
                                @else bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300
                                @endif">
                                <i class="fas fa-tag mr-2"></i>
                                {{ ucfirst($pengumuman->kategori) }}
                            </span>
                            
                            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold
                                @if($pengumuman->prioritas == 'tinggi') bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300
                                @elseif($pengumuman->prioritas == 'sedang') bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300
                                @else bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300
                                @endif">
                                <i class="fas fa-exclamation-triangle mr-2"></i>
                                Prioritas {{ ucfirst($pengumuman->prioritas) }}
                            </span>
                        </div>
                        
                        <a href="{{ route('pengumuman.public') }}" 
                           class="inline-flex items-center px-4 py-2 text-village-primary hover:text-village-secondary border border-village-primary hover:border-village-secondary rounded-lg transition-all duration-300">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Kembali ke Daftar
                        </a>
                    </div>

                    <!-- Pengumuman Image -->
                    @if($pengumuman->gambar)
                        <div class="mb-8">
                            <img src="{{ asset('storage/' . $pengumuman->gambar) }}" 
                                 alt="{{ $pengumuman->judul }}"
                                 class="w-full h-64 object-cover rounded-xl shadow-lg">
                        </div>
                    @endif

                    <!-- Pengumuman Content -->
                    <div class="prose prose-lg max-w-none dark:prose-invert">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Isi Pengumuman</h2>
                        <div class="text-gray-700 dark:text-gray-300 leading-relaxed whitespace-pre-line">
                            {!! nl2br(e($pengumuman->konten)) !!}
                        </div>
                    </div>

                    <!-- Pengumuman Details -->
                    <div class="mt-8 p-6 bg-gray-50 dark:bg-dark-400 rounded-xl">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Detail Pengumuman</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="flex items-center gap-3">
                                <div class="p-3 bg-village-primary/10 rounded-lg">
                                    <i class="fas fa-calendar-alt text-village-primary"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Tanggal Publikasi</p>
                                    <p class="font-semibold text-gray-900 dark:text-white">{{ $pengumuman->created_at->format('d F Y') }}</p>
                                </div>
                            </div>
                            
                            <div class="flex items-center gap-3">
                                <div class="p-3 bg-village-primary/10 rounded-lg">
                                    <i class="fas fa-tag text-village-primary"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Kategori</p>
                                    <p class="font-semibold text-gray-900 dark:text-white">{{ ucfirst($pengumuman->kategori) }}</p>
                                </div>
                            </div>
                            
                            <div class="flex items-center gap-3">
                                <div class="p-3 bg-village-primary/10 rounded-lg">
                                    <i class="fas fa-exclamation-triangle text-village-primary"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Prioritas</p>
                                    <p class="font-semibold text-gray-900 dark:text-white">{{ ucfirst($pengumuman->prioritas) }}</p>
                                </div>
                            </div>
                            
                            <div class="flex items-center gap-3">
                                <div class="p-3 bg-village-primary/10 rounded-lg">
                                    <i class="fas fa-user text-village-primary"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Dipublikasikan oleh</p>
                                    <p class="font-semibold text-gray-900 dark:text-white">{{ $pengumuman->creator->name ?? 'Administrator' }}</p>
                                </div>
                            </div>
                        </div>
                        
                        @if($pengumuman->tanggal_selesai)
                            <div class="mt-4 p-4 bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 rounded-lg">
                                <div class="flex items-center gap-2">
                                    <i class="fas fa-clock text-yellow-600"></i>
                                    <span class="text-sm font-medium text-yellow-800 dark:text-yellow-200">
                                        Pengumuman berlaku sampai: {{ $pengumuman->tanggal_selesai->format('d F Y') }}
                                    </span>
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Share Buttons -->
                    <div class="mt-8 pt-8 border-t border-gray-200 dark:border-gray-600">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Bagikan Pengumuman</h3>
                        <div class="flex gap-3">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" 
                               target="_blank"
                               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-300">
                                <i class="fab fa-facebook-f mr-2"></i>
                                Facebook
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($pengumuman->judul) }}" 
                               target="_blank"
                               class="inline-flex items-center px-4 py-2 bg-blue-400 text-white rounded-lg hover:bg-blue-500 transition-colors duration-300">
                                <i class="fab fa-twitter mr-2"></i>
                                Twitter
                            </a>
                            <a href="https://wa.me/?text={{ urlencode($pengumuman->judul . ' - ' . request()->fullUrl()) }}" 
                               target="_blank"
                               class="inline-flex items-center px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors duration-300">
                                <i class="fab fa-whatsapp mr-2"></i>
                                WhatsApp
                            </a>
                            <button onclick="copyToClipboard()" 
                                    class="inline-flex items-center px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors duration-300">
                                <i class="fas fa-copy mr-2"></i>
                                Salin Link
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <aside class="xl:space-y-6">
                <!-- Related Pengumuman -->
                @if($relatedAnnouncements->count() > 0)
                    <div class="bg-white dark:bg-dark-300 rounded-2xl shadow-lg p-6">
                        <div class="text-center mb-6">
                            <div class="inline-block px-4 py-2 bg-village-primary/10 text-village-primary rounded-full text-sm font-semibold mb-3">
                                📢 PENGUMUMAN TERKAIT
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">Pengumuman {{ ucfirst($pengumuman->kategori) }} Lainnya</h3>
                        </div>
                        <div class="space-y-4">
                            @foreach($relatedAnnouncements as $related)
                                <div class="p-4 bg-gray-50 dark:bg-dark-400 rounded-lg border-l-4 border-village-primary hover:shadow-md transition-shadow duration-300">
                                    <div class="flex justify-between items-start mb-2">
                                        <h4 class="font-semibold text-gray-900 dark:text-white line-clamp-2">{{ $related->judul }}</h4>
                                        <span class="text-xs text-village-primary font-medium">{{ $related->created_at->format('d M') }}</span>
                                    </div>
                                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-3">{{ Str::limit(strip_tags($related->konten), 80) }}</p>
                                    <div class="flex justify-between items-center">
                                        <span class="text-xs px-2 py-1 bg-village-primary/10 text-village-primary rounded-full">
                                            {{ ucfirst($related->kategori) }}
                                        </span>
                                        <a href="{{ route('pengumuman.public.show', $related->id) }}" 
                                           class="text-xs text-village-primary hover:text-village-secondary font-medium">
                                            Baca Selengkapnya →
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Info Kontak -->
                <div class="bg-white dark:bg-dark-300 rounded-2xl shadow-lg p-6">
                    <div class="text-center mb-6">
                        <div class="inline-block px-4 py-2 bg-village-primary/10 text-village-primary rounded-full text-sm font-semibold mb-3">
                            📞 KONTAK
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">Informasi Kontak</h3>
                    </div>
                    <div class="space-y-3">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-map-marker-alt text-village-primary"></i>
                            <span class="text-sm text-gray-600 dark:text-gray-400">Jl. Desa Cibeureum, Talaga, Majalengka</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <i class="fas fa-phone text-village-primary"></i>
                            <span class="text-sm text-gray-600 dark:text-gray-400">(0233) 123-456</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <i class="fas fa-envelope text-village-primary"></i>
                            <span class="text-sm text-gray-600 dark:text-gray-400">info@cibeureum.desa.id</span>
                        </div>
                        <div class="flex items-start gap-3">
                            <i class="fas fa-clock text-village-primary mt-0.5"></i>
                            <div class="text-sm text-gray-600 dark:text-gray-400">
                                <div class="font-medium">Jam Layanan:</div>
                                <div>Senin - Jumat: 08:00 - 16:00</div>
                                <div>Sabtu: 08:00 - 12:00</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="bg-white dark:bg-dark-300 rounded-2xl shadow-lg p-6">
                    <div class="text-center mb-6">
                        <div class="inline-block px-4 py-2 bg-village-primary/10 text-village-primary rounded-full text-sm font-semibold mb-3">
                            📋 AKSI
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">Tindakan</h3>
                    </div>
                    <div class="space-y-3">
                        <button onclick="window.print()" 
                                class="w-full bg-gradient-to-r from-village-primary to-village-secondary text-white font-semibold py-3 px-4 rounded-lg hover:from-village-secondary hover:to-village-primary transition-all duration-300">
                            <i class="fas fa-print mr-2"></i>
                            Cetak Pengumuman
                        </button>
                        <a href="{{ route('pengumuman.public') }}" 
                           class="block w-full text-center border-2 border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 font-semibold py-3 px-4 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-all duration-300">
                            <i class="fas fa-list mr-2"></i>
                            Semua Pengumuman
                        </a>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>

<script>
function copyToClipboard() {
    navigator.clipboard.writeText(window.location.href).then(() => {
        alert('Link berhasil disalin ke clipboard!');
    });
}
</script>
@endsection
