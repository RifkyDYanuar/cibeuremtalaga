<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Agenda;
use App\Models\User;
use Carbon\Carbon;

class AgendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil user admin untuk created_by
        $admin = User::where('role', 'admin')->first();
        
        if (!$admin) {
            // Jika belum ada admin, buat dulu
            $admin = User::create([
                'name' => 'Admin SiDesa',
                'email' => 'admin@sidesa.com',
                'password' => bcrypt('password123'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]);
        }

        $agendas = [
            [
                'judul' => 'Rapat Koordinasi Bulanan RT/RW',
                'deskripsi' => 'Rapat koordinasi bulanan untuk membahas berbagai program pembangunan desa dan permasalahan yang ada di masyarakat. Agenda rapat meliputi:

1. Pembahasan program kerja bulan ini
2. Evaluasi pelaksanaan program sebelumnya
3. Pembahasan usulan warga
4. Koordinasi kegiatan antar RT/RW

Seluruh Ketua RT dan RW diharapkan hadir tepat waktu. Bagi yang berhalangan hadir, mohon mengirimkan perwakilan.',
                'tanggal_mulai' => Carbon::now()->addDays(3)->setTime(9, 0),
                'tanggal_selesai' => Carbon::now()->addDays(3)->setTime(12, 0),
                'lokasi' => 'Balai Desa Cibeureum',
                'kategori' => 'rapat',
                'status' => 'aktif',
                'created_by' => $admin->id,
            ],
            [
                'judul' => 'Pelatihan Keterampilan Ibu-Ibu PKK',
                'deskripsi' => 'Pelatihan keterampilan membuat kerajinan tangan untuk ibu-ibu PKK. Kegiatan ini bertujuan untuk:

• Meningkatkan keterampilan ibu-ibu dalam membuat kerajinan
• Memberikan peluang usaha sampingan
• Memanfaatkan barang bekas menjadi produk yang bernilai
• Mempererat tali silaturahmi antar ibu-ibu

Peserta diharapkan membawa bahan-bahan yang sudah disiapkan panitia. Akan ada sertifikat untuk semua peserta yang mengikuti pelatihan hingga selesai.',
                'tanggal_mulai' => Carbon::now()->addDays(7)->setTime(13, 0),
                'tanggal_selesai' => Carbon::now()->addDays(7)->setTime(16, 0),
                'lokasi' => 'Pos Pelayanan Terpadu (Posyandu) Desa',
                'kategori' => 'pelatihan',
                'status' => 'aktif',
                'created_by' => $admin->id,
            ],
            [
                'judul' => 'Gotong Royong Pembersihan Saluran Air',
                'deskripsi' => 'Kegiatan gotong royong membersihkan saluran air dan selokan di seluruh wilayah desa. Kegiatan ini meliputi:

→ Pembersihan saluran air utama
→ Perbaikan saluran yang rusak
→ Penanaman tanaman di sekitar saluran
→ Edukasi pentingnya menjaga kebersihan lingkungan

Diharapkan seluruh warga berpartisipasi aktif. Bawa peralatan seperti cangkul, sapu, dan karung untuk sampah. Konsumsi disediakan panitia.',
                'tanggal_mulai' => Carbon::now()->addDays(10)->setTime(7, 0),
                'tanggal_selesai' => Carbon::now()->addDays(10)->setTime(11, 0),
                'lokasi' => 'Seluruh Wilayah Desa Cibeureum',
                'kategori' => 'kegiatan',
                'status' => 'aktif',
                'created_by' => $admin->id,
            ],
            [
                'judul' => 'Musyawarah Desa Penyusunan APBDes 2024',
                'deskripsi' => 'Musyawarah Desa untuk membahas dan menyusun Anggaran Pendapatan dan Belanja Desa (APBDes) tahun 2024. Agenda musyawarah:

1. Laporan pelaksanaan APBDes tahun sebelumnya
2. Pembahasan prioritas pembangunan tahun 2024
3. Alokasi anggaran untuk setiap program
4. Penetapan APBDes 2024
5. Pembentukan tim pengawas

Musyawarah ini terbuka untuk seluruh warga desa. Partisipasi aktif sangat diharapkan untuk kemajuan desa bersama.',
                'tanggal_mulai' => Carbon::now()->addDays(14)->setTime(9, 0),
                'tanggal_selesai' => Carbon::now()->addDays(14)->setTime(15, 0),
                'lokasi' => 'Aula Balai Desa Cibeureum',
                'kategori' => 'musyawarah',
                'status' => 'aktif',
                'created_by' => $admin->id,
            ],
            [
                'judul' => 'Festival Budaya Desa Cibeureum',
                'deskripsi' => 'Festival budaya tahunan Desa Cibeureum yang menampilkan berbagai kesenian dan budaya lokal. Acara meliputi:

🎭 Pertunjukan seni tradisional
🎵 Musik daerah dan modern
🍽️ Bazar kuliner khas desa
🎨 Pameran kerajinan tangan
🏆 Lomba-lomba untuk semua usia

Festival ini bertujuan untuk melestarikan budaya lokal dan memperkenalkan potensi desa kepada masyarakat luas. Semua warga diundang untuk berpartisipasi, baik sebagai peserta maupun penonton.',
                'tanggal_mulai' => Carbon::now()->addDays(21)->setTime(16, 0),
                'tanggal_selesai' => Carbon::now()->addDays(21)->setTime(21, 0),
                'lokasi' => 'Lapangan Desa Cibeureum',
                'kategori' => 'acara',
                'status' => 'aktif',
                'created_by' => $admin->id,
            ],
            [
                'judul' => 'Rapat Evaluasi Program Pembangunan',
                'deskripsi' => 'Rapat evaluasi pelaksanaan program pembangunan desa semester pertama dan perencanaan program semester kedua.',
                'tanggal_mulai' => Carbon::now()->subDays(5)->setTime(9, 0),
                'tanggal_selesai' => Carbon::now()->subDays(5)->setTime(12, 0),
                'lokasi' => 'Ruang Rapat Balai Desa',
                'kategori' => 'rapat',
                'status' => 'selesai',
                'created_by' => $admin->id,
            ],
        ];

        foreach ($agendas as $agenda) {
            Agenda::create($agenda);
        }
    }
}
