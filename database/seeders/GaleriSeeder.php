<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Galeri;
use App\Models\User;
use Carbon\Carbon;

class GaleriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil user admin yang ada
        $adminUser = User::where('name', 'Admin')->first();
        $adminId = $adminUser ? $adminUser->id : User::first()->id;

        $galleries = [
            [
                'judul' => 'Kegiatan Gotong Royong Membersihkan Jalan Desa',
                'deskripsi' => 'Warga Desa Cibeureum bergotong royong membersihkan jalan desa sebagai bentuk kepedulian terhadap lingkungan. Kegiatan ini dilakukan setiap bulan untuk menjaga kebersihan dan kenyamanan bersama.',
                'gambar' => '1755035329_HAuSYiuw7n.jpg',
                'kategori' => 'kegiatan',
                'tanggal_foto' => Carbon::parse('2025-07-13'),
                'lokasi' => 'Jalan Utama Desa Cibeureum',
                'fotografer' => 'Sekretaris Desa',
                'is_featured' => true,
                'urutan' => 1,
                'status' => true,
                'created_by' => $adminId,
            ],
            [
                'judul' => 'Festival Budaya Desa',
                'deskripsi' => 'Festival budaya tahunan yang menampilkan kesenian tradisional dan kuliner khas Desa Cibeureum. Acara ini menjadi ajang promosi potensi desa.',
                'gambar' => '1755039258_XSM1mAsRqA.jpg',
                'kategori' => 'acara',
                'tanggal_foto' => Carbon::parse('2025-05-20'),
                'lokasi' => 'Lapangan Desa Cibeureum',
                'fotografer' => 'Tim Dokumentasi',
                'is_featured' => false,
                'urutan' => 4,
                'status' => true,
                'created_by' => $adminId,
            ],
            [
                'judul' => 'Perayaan HUT RI ke-78',
                'deskripsi' => 'Perayaan Hari Ulang Tahun Kemerdekaan Republik Indonesia ke-78 di lapangan desa dengan berbagai lomba dan hiburan rakyat.',
                'gambar' => 'hut-ri.jpg',
                'kategori' => 'acara',
                'tanggal_foto' => Carbon::parse('2024-08-17'),
                'lokasi' => 'Lapangan Desa Cibeureum',
                'fotografer' => 'Karang Taruna',
                'is_featured' => true,
                'urutan' => 3,
                'status' => true,
                'created_by' => $adminId,
            ],
            [
                'judul' => 'Balai Desa Cibeureum',
                'deskripsi' => 'Gedung Balai Desa Cibeureum yang baru direnovasi. Dilengkapi dengan fasilitas modern untuk pelayanan masyarakat yang lebih baik.',
                'gambar' => 'balai-desa.jpg',
                'kategori' => 'fasilitas',
                'tanggal_foto' => Carbon::parse('2025-05-20'),
                'lokasi' => 'Pusat Desa Cibeureum',
                'fotografer' => 'Humas Desa',
                'is_featured' => false,
                'urutan' => 4,
                'status' => true,
                'created_by' => $adminId,
            ],
            [
                'judul' => 'Pemandangan Sawah di Musim Panen',
                'deskripsi' => 'Hamparan sawah hijau yang siap dipanen di Desa Cibeureum. Sebagian besar warga masih menggantungkan hidup dari sektor pertanian.',
                'gambar' => 'sawah-panen.jpg',
                'kategori' => 'lingkungan',
                'tanggal_foto' => Carbon::parse('2025-07-28'),
                'lokasi' => 'Area Persawahan Desa',
                'fotografer' => 'Kelompok Tani',
                'is_featured' => false,
                'urutan' => 5,
                'status' => true,
                'created_by' => $adminId,
            ],
            [
                'judul' => 'Posyandu Lansia',
                'deskripsi' => 'Kegiatan posyandu lansia yang rutin dilakukan setiap bulan untuk memantau kesehatan para lansia di desa.',
                'gambar' => 'posyandu.jpg',
                'kategori' => 'kegiatan',
                'tanggal_foto' => Carbon::parse('2025-08-05'),
                'lokasi' => 'Balai Desa',
                'fotografer' => 'Kader Posyandu',
                'is_featured' => false,
                'urutan' => 6,
                'status' => true,
                'created_by' => $adminId,
            ],
            [
                'judul' => 'Renovasi Masjid Al-Ikhlas',
                'deskripsi' => 'Proses renovasi Masjid Al-Ikhlas yang merupakan masjid utama di Desa Cibeureum. Renovasi dilakukan untuk meningkatkan kenyamanan ibadah.',
                'gambar' => 'masjid.jpg',
                'kategori' => 'pembangunan',
                'tanggal_foto' => Carbon::parse('2025-04-10'),
                'lokasi' => 'Masjid Al-Ikhlas',
                'fotografer' => 'Takmir Masjid',
                'is_featured' => false,
                'urutan' => 7,
                'status' => true,
                'created_by' => $adminId,
            ],
            [
                'judul' => 'Festival Budaya Desa',
                'deskripsi' => 'Festival budaya tahunan yang menampilkan kesenian tradisional dan kuliner khas Desa Cibeureum.',
                'gambar' => 'festival.jpg',
                'kategori' => 'acara',
                'tanggal_foto' => Carbon::parse('2024-12-10'),
                'lokasi' => 'Panggung Terbuka Desa',
                'fotografer' => 'Komunitas Seni',
                'is_featured' => true,
                'urutan' => 8,
                'status' => true,
                'created_by' => $adminId,
            ],
        ];

        foreach ($galleries as $gallery) {
            Galeri::create($gallery);
        }
    }
}
