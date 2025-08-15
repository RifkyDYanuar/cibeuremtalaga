<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pembangunan;

class PembangunanSeeder extends Seeder
{
    public function run()
    {
        $projects = [
            [
                'nama_proyek' => 'Pembangunan Jalan Desa',
                'deskripsi' => 'Pembangunan jalan aspal sepanjang 2 kilometer untuk memperlancar akses transportasi warga desa.',
                'kategori' => 'infrastruktur',
                'status' => 'proses',
                'anggaran' => 500000000,
                'realisasi' => 300000000,
                'progress' => 60,
                'tanggal_mulai' => '2025-06-01',
                'tanggal_target' => '2025-12-31',
                'lokasi' => 'Jalan Utama Desa',
                'sumber_dana' => 'APBD Kabupaten',
                'penanggung_jawab' => 'Kepala Desa',
                'kontraktor' => 'CV. Maju Bersama',
                'keterangan' => 'Pembangunan berjalan sesuai rencana',
                'is_published' => true,
            ],
            [
                'nama_proyek' => 'Renovasi Balai Desa',
                'deskripsi' => 'Renovasi dan perluasan balai desa untuk meningkatkan pelayanan kepada masyarakat.',
                'kategori' => 'infrastruktur',
                'status' => 'selesai',
                'anggaran' => 200000000,
                'realisasi' => 195000000,
                'progress' => 100,
                'tanggal_mulai' => '2025-03-01',
                'tanggal_selesai' => '2025-05-31',
                'tanggal_target' => '2025-05-31',
                'lokasi' => 'Kantor Desa',
                'sumber_dana' => 'Dana Desa',
                'penanggung_jawab' => 'Sekretaris Desa',
                'kontraktor' => 'CV. Karya Mandiri',
                'keterangan' => 'Renovasi berhasil diselesaikan tepat waktu',
                'is_published' => true,
            ],
            [
                'nama_proyek' => 'Pembangunan Posyandu',
                'deskripsi' => 'Pembangunan gedung posyandu baru untuk meningkatkan layanan kesehatan masyarakat.',
                'kategori' => 'kesehatan',
                'status' => 'perencanaan',
                'anggaran' => 150000000,
                'realisasi' => 0,
                'progress' => 5,
                'tanggal_mulai' => '2025-09-01',
                'tanggal_target' => '2025-12-31',
                'lokasi' => 'RT 02 RW 01',
                'sumber_dana' => 'Bantuan Provinsi',
                'penanggung_jawab' => 'Kepala Dusun',
                'keterangan' => 'Sedang dalam tahap perencanaan dan perizinan',
                'is_published' => true,
            ]
        ];

        foreach ($projects as $project) {
            Pembangunan::create($project);
        }
    }
}
