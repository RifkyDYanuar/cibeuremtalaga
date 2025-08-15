@extends('layouts.public')

@section('title', 'Tentang Desa Cibeureum')
@section('meta_description', 'Visi misi, struktur organisasi, dan informasi lengkap tentang Desa Cibeureum Talaga.')

@section('content')
<div class="max-w-4xl mx-auto py-12 px-4">
    <h1 class="text-3xl font-bold mb-2 gradient-text">Tentang Desa Cibeureum</h1>
    <p class="text-lg text-gray-600 dark:text-gray-300 mb-8">Desa Cibeureum Talaga, Kecamatan Talaga, Kabupaten Majalengka, adalah desa yang berkomitmen pada pelayanan publik, transparansi, dan inovasi untuk kemajuan masyarakat.</p>

    <section class="mb-10">
        <h2 class="text-2xl font-semibold mb-2">Visi & Misi</h2>
        <p class="mb-2"><strong>Visi:</strong> "Terwujudnya Desa Cibeureum yang maju, mandiri, dan sejahtera berbasis partisipasi masyarakat dan nilai-nilai kearifan lokal."</p>
        <p class="mb-2 font-semibold">Misi:</p>
        <ul class="list-disc pl-6">
            <li>Meningkatkan kualitas pelayanan publik dan tata kelola pemerintahan desa.</li>
            <li>Mendorong partisipasi aktif masyarakat dalam pembangunan desa.</li>
            <li>Mengembangkan potensi ekonomi lokal dan UMKM.</li>
            <li>Melestarikan budaya dan lingkungan hidup desa.</li>
        </ul>
    </section>

    <section class="mb-10">
        <h2 class="text-2xl font-semibold mb-2">Struktur Organisasi</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <div class="text-center">
                <img src="/images/kades.jpg" alt="Kepala Desa" class="mx-auto rounded-full w-28 h-28 object-cover mb-2">
                <div class="font-bold">Nama Kepala Desa</div>
                <div class="text-sm text-gray-500">Kepala Desa</div>
            </div>
            <div class="text-center">
                <img src="/images/sekdes.jpg" alt="Sekretaris Desa" class="mx-auto rounded-full w-28 h-28 object-cover mb-2">
                <div class="font-bold">Nama Sekretaris</div>
                <div class="text-sm text-gray-500">Sekretaris Desa</div>
            </div>
            <div class="text-center">
                <img src="/images/bendahara.jpg" alt="Bendahara Desa" class="mx-auto rounded-full w-28 h-28 object-cover mb-2">
                <div class="font-bold">Nama Bendahara</div>
                <div class="text-sm text-gray-500">Bendahara Desa</div>
            </div>
            <!-- Tambahkan perangkat desa lain sesuai kebutuhan -->
        </div>
    </section>

    <section class="mb-10">
        <h2 class="text-2xl font-semibold mb-2">Kontak & Lokasi</h2>
        <ul class="mb-2">
            <li><strong>Alamat:</strong> Jl. Raya Desa Cibeureum, Kecamatan Talaga, Majalengka</li>
            <li><strong>Telepon:</strong> (021) 1234-5678</li>
            <li><strong>Email:</strong> info@cibeureum.id</li>
        </ul>
        <div class="mt-4">
            <iframe src="https://www.google.com/maps?q=Desa+Cibeureum+Talaga,+Majalengka&output=embed" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </section>
</div>
@endsection
