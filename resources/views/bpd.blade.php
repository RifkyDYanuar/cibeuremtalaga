
@extends('layouts.public')

@section('title', 'Badan Permusyawaratan Desa (BPD)')
@section('meta_description', 'Informasi lengkap tentang Badan Permusyawaratan Desa (BPD) Cibeureum Talaga - struktur organisasi, visi misi, tugas dan wewenang.')

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-br from-village-primary to-village-secondary py-16 sm:py-20">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-4">
            Badan Permusyawaratan Desa
        </h1>
        <p class="text-lg sm:text-xl text-white/90 mb-6">
            Mitra Pemerintah Desa dalam Menampung Aspirasi Masyarakat
        </p>
        <div class="flex justify-center">
            <div class="bg-white/20 backdrop-blur-sm rounded-full px-6 py-2">
                <span class="text-white font-medium">Desa Cibeureum Talaga</span>
            </div>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="max-w-6xl mx-auto py-12 px-4">
    <!-- Profil Singkat -->
    <section class="mb-16">
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 border border-gray-100 dark:border-gray-700">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 dark:text-white mb-6 gradient-text">
                <i class="fas fa-info-circle mr-3 text-village-primary"></i>Profil Singkat BPD
            </h2>
            <div class="prose prose-lg max-w-none text-gray-600 dark:text-gray-300">
                <p class="mb-4">
                    {{ $profil ?? 'BPD adalah lembaga yang melaksanakan fungsi pemerintahan yang anggotanya merupakan wakil dari penduduk desa berdasarkan keterwakilan wilayah dan ditetapkan secara demokratis. BPD berperan sebagai mitra pemerintah desa dalam menampung dan menyalurkan aspirasi masyarakat serta melakukan pengawasan terhadap jalannya pemerintahan desa.' }}
                </p>
                <div class="bg-village-light dark:bg-gray-700 rounded-lg p-4 border-l-4 border-village-primary">
                    <p class="font-semibold text-village-dark dark:text-village-secondary mb-2">Dasar Hukum:</p>
                    <p class="text-sm">{{ $dasar_hukum ?? 'UU No. 6 Tahun 2014 tentang Desa, Peraturan Menteri Dalam Negeri No. 110 Tahun 2016 tentang BPD.' }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Struktur Organisasi -->
    <section class="mb-16">
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 border border-gray-100 dark:border-gray-700">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 dark:text-white mb-8 gradient-text">
                <i class="fas fa-users mr-3 text-village-primary"></i>Struktur Organisasi BPD
            </h2>
            @if($members->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($members as $member)
                        <div class="text-center group">
                            <div class="relative mb-4">
                                <img src="{{ $member->photo_url }}" alt="{{ $member->name }}" 
                                     class="mx-auto rounded-full w-32 h-32 object-cover border-4 border-village-primary/20 group-hover:border-village-primary transition-all duration-300 shadow-lg">
                                <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2">
                                    <div class="bg-village-primary text-white px-3 py-1 rounded-full text-xs font-semibold">
                                        {{ ucfirst($member->position) }}
                                    </div>
                                </div>
                            </div>
                            <h3 class="font-bold text-lg text-gray-900 dark:text-white">{{ $member->name }}</h3>
                            <p class="text-village-primary font-medium">
                                @php
                                    $positionOptions = \App\Models\BpdMember::getPositionOptions();
                                @endphp
                                {{ $positionOptions[$member->position] ?? ucwords(str_replace('_', ' ', $member->position)) }}
                            </p>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8">
                    <i class="fas fa-users text-gray-400 text-4xl mb-4"></i>
                    <p class="text-gray-500 dark:text-gray-400">Data anggota BPD belum tersedia.</p>
                </div>
            @endif
        </div>
    </section>

    <!-- Visi & Misi -->
    <section class="mb-16">
        <div class="grid md:grid-cols-2 gap-8">
            <!-- Visi -->
            <div class="bg-gradient-to-br from-village-primary to-village-secondary rounded-2xl p-8 text-white">
                <h2 class="text-2xl font-bold mb-6">
                    <i class="fas fa-eye mr-3"></i>Visi
                </h2>
                <p class="text-lg leading-relaxed">
                    {{ $visi ?? '"Terwujudnya BPD yang profesional, transparan, dan aspiratif dalam mewujudkan tata kelola pemerintahan desa yang baik."' }}
                </p>
            </div>
            
            <!-- Misi -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 border border-gray-100 dark:border-gray-700">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">
                    <i class="fas fa-bullseye mr-3 text-village-primary"></i>Misi
                </h2>
                @if($misi)
                    {!! $misi !!}
                @else
                    <ul class="space-y-3 text-gray-600 dark:text-gray-300">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-village-primary mr-3 mt-1 flex-shrink-0"></i>
                            <span>Menampung dan menyalurkan aspirasi masyarakat desa.</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-village-primary mr-3 mt-1 flex-shrink-0"></i>
                            <span>Meningkatkan pengawasan terhadap penyelenggaraan pemerintahan desa.</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-village-primary mr-3 mt-1 flex-shrink-0"></i>
                            <span>Mendorong partisipasi masyarakat dalam pembangunan desa.</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-village-primary mr-3 mt-1 flex-shrink-0"></i>
                            <span>Meningkatkan transparansi dan akuntabilitas BPD.</span>
                        </li>
                    </ul>
                @endif
            </div>
        </div>
    </section>

    <!-- Tugas & Wewenang -->
    <section class="mb-16">
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 border border-gray-100 dark:border-gray-700">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 dark:text-white mb-8 gradient-text">
                <i class="fas fa-gavel mr-3 text-village-primary"></i>Tugas & Wewenang
            </h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="space-y-4">
                    <div class="flex items-start p-4 bg-village-light dark:bg-gray-700 rounded-xl">
                        <i class="fas fa-file-contract text-village-primary mr-4 mt-1 text-xl"></i>
                        <span class="text-gray-700 dark:text-gray-300">Membahas dan menyepakati rancangan peraturan desa bersama kepala desa.</span>
                    </div>
                    <div class="flex items-start p-4 bg-village-light dark:bg-gray-700 rounded-xl">
                        <i class="fas fa-comments text-village-primary mr-4 mt-1 text-xl"></i>
                        <span class="text-gray-700 dark:text-gray-300">Menampung dan menyalurkan aspirasi masyarakat desa.</span>
                    </div>
                </div>
                <div class="space-y-4">
                    <div class="flex items-start p-4 bg-village-light dark:bg-gray-700 rounded-xl">
                        <i class="fas fa-search text-village-primary mr-4 mt-1 text-xl"></i>
                        <span class="text-gray-700 dark:text-gray-300">Melakukan pengawasan terhadap kinerja kepala desa.</span>
                    </div>
                    <div class="flex items-start p-4 bg-village-light dark:bg-gray-700 rounded-xl">
                        <i class="fas fa-tasks text-village-primary mr-4 mt-1 text-xl"></i>
                        <span class="text-gray-700 dark:text-gray-300">Melaksanakan tugas lain sesuai peraturan perundang-undangan.</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Kegiatan & Berita -->
    @if($activities->count() > 0)
    <section class="mb-16">
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 border border-gray-100 dark:border-gray-700">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 dark:text-white mb-8 gradient-text">
                <i class="fas fa-camera mr-3 text-village-primary"></i>Kegiatan & Dokumentasi
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($activities->take(6) as $activity)
                    <div class="group">
                        <div class="relative overflow-hidden rounded-xl">
                            <img src="{{ $activity->image_url }}" 
                                 class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300" 
                                 alt="{{ $activity->title }}">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            <div class="absolute bottom-4 left-4 right-4">
                                <h3 class="text-white font-semibold mb-1">{{ $activity->title }}</h3>
                                <p class="text-white/80 text-sm">{{ Str::limit($activity->description, 60) }}</p>
                                <p class="text-white/60 text-xs mt-1">{{ $activity->activity_date->format('d M Y') }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Kontak -->
    <section class="mb-16">
        <div class="bg-gradient-to-r from-village-primary to-village-secondary rounded-2xl p-8 text-white">
            <h2 class="text-2xl sm:text-3xl font-bold mb-8">
                <i class="fas fa-map-marker-alt mr-3"></i>Kontak & Lokasi Sekretariat
            </h2>
            <div class="grid md:grid-cols-2 gap-8">
                <div class="space-y-4">
                    <div class="flex items-center">
                        <i class="fas fa-phone mr-4 text-xl"></i>
                        <div>
                            <p class="font-semibold">Telepon</p>
                            <p class="opacity-90">{{ $contact_phone ?? '08xxxxxxxxxx' }}</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-envelope mr-4 text-xl"></i>
                        <div>
                            <p class="font-semibold">Email</p>
                            <p class="opacity-90">{{ $contact_email ?? 'bpd@desa.id' }}</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <i class="fas fa-home mr-4 text-xl mt-1"></i>
                        <div>
                            <p class="font-semibold">Alamat</p>
                            <p class="opacity-90">{{ $contact_address ?? 'Jl. Raya Desa No. 123, Desa Cibeureum Talaga' }}</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6">
                    <h3 class="font-semibold mb-4">Jam Pelayanan</h3>
                    @if($jam_pelayanan)
                        {!! $jam_pelayanan !!}
                    @else
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span>Senin - Jumat</span>
                                <span>08:00 - 16:00 WIB</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Sabtu</span>
                                <span>08:00 - 12:00 WIB</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Minggu</span>
                                <span>Tutup</span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
