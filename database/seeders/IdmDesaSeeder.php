<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\IdmDesa;

class IdmDesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $idmData = [
            [
                'tahun' => 2020,
                'skor_idm' => 0.542,
                'status_idm' => 'Tertinggal',
                'skor_iks' => 0.498,
                'skor_ike' => 0.601,
                'skor_ikl' => 0.527,
                'dimensi_sosial' => 0.485,
                'dimensi_ekonomi' => 0.593,
                'dimensi_lingkungan' => 0.548,
                'deskripsi' => 'Data IDM tahun 2020 menunjukkan desa masih berada dalam kategori tertinggal dengan skor 0.542. Diperlukan peningkatan signifikan di bidang sosial.',
                'is_published' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tahun' => 2021,
                'skor_idm' => 0.578,
                'status_idm' => 'Tertinggal',
                'skor_iks' => 0.534,
                'skor_ike' => 0.635,
                'skor_ikl' => 0.565,
                'dimensi_sosial' => 0.521,
                'dimensi_ekonomi' => 0.628,
                'dimensi_lingkungan' => 0.585,
                'target_tahun_depan' => 0.620,
                'deskripsi' => 'Tahun 2021 menunjukkan perbaikan dengan peningkatan skor menjadi 0.578. Terdapat kemajuan di sektor ekonomi dan lingkungan.',
                'is_published' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tahun' => 2022,
                'skor_idm' => 0.612,
                'status_idm' => 'Berkembang',
                'skor_iks' => 0.589,
                'skor_ike' => 0.647,
                'skor_ikl' => 0.601,
                'dimensi_sosial' => 0.573,
                'dimensi_ekonomi' => 0.651,
                'dimensi_lingkungan' => 0.612,
                'target_tahun_depan' => 0.675,
                'deskripsi' => 'Pencapaian signifikan pada tahun 2022 dengan status berkembang. Peningkatan infrastruktur dan program pemberdayaan masyarakat mulai menunjukkan hasil.',
                'is_published' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tahun' => 2023,
                'skor_idm' => 0.654,
                'status_idm' => 'Berkembang',
                'skor_iks' => 0.628,
                'skor_ike' => 0.689,
                'skor_ikl' => 0.645,
                'dimensi_sosial' => 0.615,
                'dimensi_ekonomi' => 0.694,
                'dimensi_lingkungan' => 0.653,
                'target_tahun_depan' => 0.720,
                'deskripsi' => 'Tahun 2023 menunjukkan pertumbuhan konsisten dengan skor 0.654. Program digitalisasi desa dan peningkatan UMKM memberikan dampak positif.',
                'is_published' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tahun' => 2024,
                'skor_idm' => 0.698,
                'status_idm' => 'Berkembang',
                'skor_iks' => 0.672,
                'skor_ike' => 0.731,
                'skor_ikl' => 0.691,
                'dimensi_sosial' => 0.658,
                'dimensi_ekonomi' => 0.738,
                'dimensi_lingkungan' => 0.698,
                'target_tahun_depan' => 0.750,
                'deskripsi' => 'Pencapaian tertinggi hingga saat ini dengan skor 0.698 pada tahun 2024. Desa hampir mencapai status maju dengan peningkatan di semua sektor.',
                'is_published' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($idmData as $data) {
            IdmDesa::create($data);
        }
    }
}
