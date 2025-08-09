<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pengumuman;
use Carbon\Carbon;

class PengumumanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cari user admin yang tersedia
        $adminUser = \App\Models\User::where('role', 'admin')->first();
        if (!$adminUser) {
            echo "Admin user tidak ditemukan. Silakan buat admin user terlebih dahulu.\n";
            return;
        }

        $pengumuman = [
            [
                'judul' => 'Pengumuman Penting: Pelayanan Surat Menyurat Online',
                'konten' => 'Diberitahukan kepada seluruh warga Desa Cibeureum bahwa pelayanan surat menyurat kini dapat dilakukan secara online melalui sistem SiDesa. Silakan mengakses portal ini untuk mengajukan berbagai jenis surat keterangan seperti surat domisili, surat keterangan usaha, dan lain-lain.',
                'kategori' => 'penting',
                'prioritas' => 'tinggi',
                'tanggal_mulai' => Carbon::now(),
                'tanggal_selesai' => Carbon::now()->addMonth(),
                'is_active' => true,
                'is_featured' => true,
                'created_by' => $adminUser->id
            ],
            [
                'judul' => 'Kegiatan Gotong Royong Desa',
                'konten' => 'Mengundang seluruh warga Desa Cibeureum untuk berpartisipasi dalam kegiatan gotong royong pembersihan lingkungan desa. Kegiatan akan dilaksanakan pada hari Minggu, 20 Juli 2025 pukul 07.00 WIB. Tempat berkumpul di Balai Desa Cibeureum.',
                'kategori' => 'kegiatan',
                'prioritas' => 'sedang',
                'tanggal_mulai' => Carbon::create(2025, 7, 20),
                'tanggal_selesai' => Carbon::create(2025, 7, 20),
                'is_active' => true,
                'is_featured' => false,
                'created_by' => $adminUser->id
            ],
            [
                'judul' => 'Pembangunan Jalan Desa Tahap 2',
                'konten' => 'Informasi kepada warga bahwa pembangunan jalan desa tahap 2 akan dimulai pada tanggal 25 Juli 2025. Pembangunan akan dilakukan di Jalan Raya Cibeureum sepanjang 2 kilometer. Mohon kesabaran dan kerjasama dari seluruh warga.',
                'kategori' => 'pembangunan',
                'prioritas' => 'tinggi',
                'tanggal_mulai' => Carbon::create(2025, 7, 25),
                'tanggal_selesai' => Carbon::create(2025, 10, 25),
                'is_active' => true,
                'is_featured' => true,
                'created_by' => $adminUser->id
            ],
            [
                'judul' => 'Pelayanan Administrasi Desa',
                'konten' => 'Pelayanan administrasi desa dibuka setiap hari Senin - Jumat pukul 08.00 - 16.00 WIB. Untuk pelayanan surat-menyurat, warga dapat menggunakan sistem online atau datang langsung ke kantor desa.',
                'kategori' => 'umum',
                'prioritas' => 'sedang',
                'tanggal_mulai' => Carbon::now(),
                'tanggal_selesai' => null,
                'is_active' => true,
                'is_featured' => false,
                'created_by' => $adminUser->id
            ],
            [
                'judul' => 'Informasi Umum Desa Cibeureum',
                'konten' => 'Selamat datang di website resmi Desa Cibeureum. Melalui portal ini, warga dapat mengakses berbagai informasi dan layanan desa. Untuk informasi lebih lanjut, silakan hubungi kantor desa atau akses menu layanan online.',
                'kategori' => 'umum',
                'prioritas' => 'rendah',
                'tanggal_mulai' => Carbon::now(),
                'tanggal_selesai' => null,
                'is_active' => true,
                'is_featured' => false,
                'created_by' => $adminUser->id
            ]
        ];

        foreach ($pengumuman as $item) {
            Pengumuman::create($item);
        }
    }
}
