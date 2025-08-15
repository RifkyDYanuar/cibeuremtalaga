@extends('layouts.public')

@section('title', $agenda->judul . ' - SiDesa Cibeureum')

@section('content')
<!-- Page Header -->
<section class="relative min-h-[60vh] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-village-primary via-village-secondary to-village-accent"></div>
    <div class="absolute inset-0 bg-black/40 backdrop-blur-[1px]"></div>
    @if($agenda->gambar)
        <div class="absolute inset-0 bg-[url('{{ Storage::url($agenda->gambar) }}')] bg-cover bg-center opacity-20"></div>
    @else
        <div class="absolute inset-0 bg-[url('{{ asset('images/cibeureum.jpg') }}')] bg-cover bg-center opacity-20"></div>
    @endif
    
    <div class="relative z-10 text-center text-white px-4 max-w-4xl mx-auto">
        <div class="animate-fadeIn">
            <span class="inline-block px-6 py-2 bg-white/20 backdrop-blur-md rounded-full text-sm font-semibold mb-4 border border-white/30">
                <i class="fas fa-calendar mr-2"></i>
                {{ $agenda->kategori ? ucfirst($agenda->kategori) : 'Agenda' }}
            </span>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-black mb-8 leading-tight hero-text">
                {{ $agenda->judul }}
            </h1>
        </div>
        <div class="animate-slideUp" style="animation-delay: 0.3s;">
            <div class="flex flex-wrap justify-center gap-6 text-lg opacity-95">
                <div class="flex items-center">
                    <i class="fas fa-calendar-alt mr-2"></i>
                    {{ $agenda->tanggal_mulai->format('d M Y') }}
                </div>
                <div class="flex items-center">
                    <i class="fas fa-clock mr-2"></i>
                    {{ $agenda->tanggal_mulai->format('H:i') }} - {{ $agenda->tanggal_selesai->format('H:i') }} WIB
                </div>
                <div class="flex items-center">
                    <i class="fas fa-map-marker-alt mr-2"></i>
                    {{ $agenda->lokasi }}
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
                    <!-- Status Badge -->
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center gap-3">
                            @if($agenda->tanggal_mulai->isFuture())
                                <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300">
                                    <i class="fas fa-clock mr-2"></i>
                                    Akan Datang
                                </span>
                            @elseif($agenda->tanggal_mulai->isToday())
                                <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300">
                                    <i class="fas fa-play mr-2"></i>
                                    Hari Ini
                                </span>
                            @else
                                <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">
                                    <i class="fas fa-check mr-2"></i>
                                    Selesai
                                </span>
                            @endif
                            
                            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold text-white
                                @if($agenda->kategori == 'rapat') bg-red-500
                                @elseif($agenda->kategori == 'acara') bg-orange-500
                                @elseif($agenda->kategori == 'kegiatan') bg-green-500
                                @elseif($agenda->kategori == 'musyawarah') bg-purple-500
                                @elseif($agenda->kategori == 'pelatihan') bg-gray-600
                                @else bg-village-primary
                                @endif">
                                {{ ucfirst($agenda->kategori) }}
                            </span>
                        </div>
                        
                        <a href="{{ route('agenda.public') }}" 
                           class="inline-flex items-center px-4 py-2 text-village-primary hover:text-village-secondary border border-village-primary hover:border-village-secondary rounded-lg transition-all duration-300">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Kembali ke Agenda
                        </a>
                    </div>

                    <!-- Agenda Image -->
                    @if($agenda->gambar)
                        <div class="mb-8">
                            <img src="{{ Storage::url($agenda->gambar) }}" 
                                 alt="{{ $agenda->judul }}"
                                 class="w-full h-64 object-cover rounded-xl shadow-lg">
                        </div>
                    @endif

                    <!-- Agenda Description -->
                    <div class="prose prose-lg max-w-none dark:prose-invert">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Deskripsi Agenda</h2>
                        <div class="text-gray-700 dark:text-gray-300 leading-relaxed whitespace-pre-line">
                            {{ $agenda->deskripsi }}
                        </div>
                    </div>

                    <!-- Agenda Details -->
                    <div class="mt-8 p-6 bg-gray-50 dark:bg-dark-400 rounded-xl">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Detail Agenda</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="flex items-center gap-3">
                                <div class="p-3 bg-village-primary/10 rounded-lg">
                                    <i class="fas fa-calendar-alt text-village-primary"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Tanggal</p>
                                    <p class="font-semibold text-gray-900 dark:text-white">{{ $agenda->tanggal_mulai->format('d F Y') }}</p>
                                </div>
                            </div>
                            
                            <div class="flex items-center gap-3">
                                <div class="p-3 bg-village-primary/10 rounded-lg">
                                    <i class="fas fa-clock text-village-primary"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Waktu</p>
                                    <p class="font-semibold text-gray-900 dark:text-white">{{ $agenda->tanggal_mulai->format('H:i') }} - {{ $agenda->tanggal_selesai->format('H:i') }} WIB</p>
                                </div>
                            </div>
                            
                            <div class="flex items-center gap-3">
                                <div class="p-3 bg-village-primary/10 rounded-lg">
                                    <i class="fas fa-map-marker-alt text-village-primary"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Lokasi</p>
                                    <p class="font-semibold text-gray-900 dark:text-white">{{ $agenda->lokasi }}</p>
                                </div>
                            </div>
                            
                            <div class="flex items-center gap-3">
                                <div class="p-3 bg-village-primary/10 rounded-lg">
                                    <i class="fas fa-user text-village-primary"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Dibuat oleh</p>
                                    <p class="font-semibold text-gray-900 dark:text-white">{{ $agenda->creator->name ?? 'Administrator' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <aside class="xl:space-y-6">
                <!-- Related Agendas -->
                @if($relatedAgendas->count() > 0)
                    <div class="bg-white dark:bg-dark-300 rounded-2xl shadow-lg p-6">
                        <div class="text-center mb-6">
                            <div class="inline-block px-4 py-2 bg-village-primary/10 text-village-primary rounded-full text-sm font-semibold mb-3">
                                🗓️ AGENDA TERKAIT
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">Agenda {{ ucfirst($agenda->kategori) }} Lainnya</h3>
                        </div>
                        <div class="space-y-4">
                            @foreach($relatedAgendas as $related)
                                <div class="p-4 bg-gray-50 dark:bg-dark-400 rounded-lg border-l-4 border-village-primary hover:shadow-md transition-shadow duration-300">
                                    <div class="flex justify-between items-start mb-2">
                                        <h4 class="font-semibold text-gray-900 dark:text-white line-clamp-2">{{ $related->judul }}</h4>
                                        <span class="text-xs text-village-primary font-medium">{{ $related->tanggal_mulai->format('d M') }}</span>
                                    </div>
                                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-3">{{ Str::limit($related->deskripsi, 80) }}</p>
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center text-xs text-gray-500 dark:text-gray-400">
                                            <i class="fas fa-map-marker-alt mr-1"></i>
                                            <span>{{ Str::limit($related->lokasi, 20) }}</span>
                                        </div>
                                        <a href="{{ route('agenda.show', $related->id) }}" 
                                           class="text-xs text-village-primary hover:text-village-secondary font-medium">
                                            Lihat Detail →
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

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
                            Cetak Agenda
                        </button>
                        <button onclick="shareAgenda()" 
                                class="w-full border-2 border-village-primary text-village-primary font-semibold py-3 px-4 rounded-lg hover:bg-village-primary hover:text-white transition-all duration-300">
                            <i class="fas fa-share-alt mr-2"></i>
                            Bagikan
                        </button>
                        <a href="{{ route('agenda.public') }}" 
                           class="block w-full text-center border-2 border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 font-semibold py-3 px-4 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-all duration-300">
                            <i class="fas fa-list mr-2"></i>
                            Semua Agenda
                        </a>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="bg-white dark:bg-dark-300 rounded-2xl shadow-lg p-6">
                    <div class="text-center mb-6">
                        <div class="inline-block px-4 py-2 bg-village-primary/10 text-village-primary rounded-full text-sm font-semibold mb-3">
                            📞 KONTAK
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">Informasi Kontak</h3>
                    </div>
                    <div class="space-y-3">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-envelope text-village-primary"></i>
                            <span class="text-sm text-gray-600 dark:text-gray-400">agenda@cibeureum.id</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <i class="fas fa-phone text-village-primary"></i>
                            <span class="text-sm text-gray-600 dark:text-gray-400">+62 812-3456-7890</span>
                        </div>
                        <div class="flex items-start gap-3">
                            <i class="fas fa-info-circle text-village-primary mt-0.5"></i>
                            <span class="text-sm text-gray-600 dark:text-gray-400">Untuk informasi lebih lanjut hubungi sekretariat desa</span>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>

<script>
function shareAgenda() {
    if (navigator.share) {
        navigator.share({
            title: '{{ $agenda->judul }}',
            text: 'Agenda: {{ $agenda->judul }} - {{ $agenda->tanggal_mulai->format("d M Y") }} di {{ $agenda->lokasi }}',
            url: window.location.href
        });
    } else {
        // Fallback - copy to clipboard
        navigator.clipboard.writeText(window.location.href).then(() => {
            alert('Link agenda telah disalin ke clipboard!');
        });
    }
}
</script>
@endsection
