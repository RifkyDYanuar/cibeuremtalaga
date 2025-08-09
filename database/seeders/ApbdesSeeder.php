<?php

namespace Database\Seeders;

use App\Models\Apbdes;
use App\Models\User;
use Illuminate\Database\Seeder;

class ApbdesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::where('role', 'admin')->first();
        
        if (!$admin) {
            $this->command->warn('Admin user not found. Creating admin user first...');
            return;
        }

        $tahunSekarang = date('Y');

        // Data Pendapatan
        $pendapatan = [
            [
                'kategori' => 'PADes',
                'items' => [
                    ['uraian' => 'Hasil Usaha Desa (BUMDes)', 'jumlah' => 150000000],
                    ['uraian' => 'Hasil Aset Desa', 'jumlah' => 75000000],
                    ['uraian' => 'Swadaya, Partisipasi dan Gotong Royong', 'jumlah' => 100000000],
                ]
            ],
            [
                'kategori' => 'Dana Desa',
                'items' => [
                    ['uraian' => 'Dana Desa dari APBN', 'jumlah' => 800000000],
                ]
            ],
            [
                'kategori' => 'Bagi Hasil Pajak',
                'items' => [
                    ['uraian' => 'Bagi Hasil Pajak Bumi dan Bangunan', 'jumlah' => 120000000],
                    ['uraian' => 'Bagi Hasil Retribusi Daerah', 'jumlah' => 50000000],
                ]
            ],
            [
                'kategori' => 'Alokasi Dana Desa',
                'items' => [
                    ['uraian' => 'Alokasi Dana Desa (ADD)', 'jumlah' => 400000000],
                ]
            ],
            [
                'kategori' => 'Bantuan Keuangan',
                'items' => [
                    ['uraian' => 'Bantuan Keuangan Provinsi', 'jumlah' => 200000000],
                    ['uraian' => 'Bantuan Keuangan Kabupaten', 'jumlah' => 150000000],
                ]
            ]
        ];

        // Data Belanja
        $belanja = [
            [
                'kategori' => 'Bidang Penyelenggaraan Pemerintahan Desa',
                'items' => [
                    ['uraian' => 'Penghasilan Tetap dan Tunjangan Kepala Desa', 'jumlah' => 120000000],
                    ['uraian' => 'Penghasilan Tetap dan Tunjangan Perangkat Desa', 'jumlah' => 240000000],
                    ['uraian' => 'Operasional Perkantoran', 'jumlah' => 80000000],
                    ['uraian' => 'Operasional BPD', 'jumlah' => 30000000],
                ]
            ],
            [
                'kategori' => 'Bidang Pelaksanaan Pembangunan Desa',
                'items' => [
                    ['uraian' => 'Pembangunan Jalan Desa', 'jumlah' => 300000000],
                    ['uraian' => 'Pembangunan Irigasi Desa', 'jumlah' => 150000000],
                    ['uraian' => 'Pembangunan Sarana Air Bersih', 'jumlah' => 100000000],
                    ['uraian' => 'Pembangunan Balai Desa', 'jumlah' => 200000000],
                ]
            ],
            [
                'kategori' => 'Bidang Pembinaan Kemasyarakatan',
                'items' => [
                    ['uraian' => 'Kegiatan Pembinaan Karang Taruna', 'jumlah' => 25000000],
                    ['uraian' => 'Kegiatan Pembinaan PKK', 'jumlah' => 30000000],
                    ['uraian' => 'Kegiatan Keagamaan', 'jumlah' => 40000000],
                ]
            ],
            [
                'kategori' => 'Bidang Pemberdayaan Masyarakat',
                'items' => [
                    ['uraian' => 'Pelatihan Keterampilan Masyarakat', 'jumlah' => 75000000],
                    ['uraian' => 'Pengembangan UMKM', 'jumlah' => 100000000],
                    ['uraian' => 'Bantuan Modal Usaha Kelompok', 'jumlah' => 50000000],
                ]
            ],
            [
                'kategori' => 'Bidang Penanggulangan Bencana',
                'items' => [
                    ['uraian' => 'Tanggap Darurat Bencana', 'jumlah' => 30000000],
                    ['uraian' => 'Pemeliharaan Pos Kamling', 'jumlah' => 15000000],
                ]
            ]
        ];

        // Insert Pendapatan
        foreach ($pendapatan as $kategoriData) {
            foreach ($kategoriData['items'] as $item) {
                Apbdes::create([
                    'tahun_anggaran' => $tahunSekarang,
                    'jenis' => 'pendapatan',
                    'kategori' => $kategoriData['kategori'],
                    'uraian' => $item['uraian'],
                    'jumlah' => $item['jumlah'],
                    'keterangan' => 'Data seeder untuk tahun ' . $tahunSekarang,
                    'status' => 'aktif',
                    'created_by' => $admin->id,
                ]);
            }
        }

        // Insert Belanja
        foreach ($belanja as $kategoriData) {
            foreach ($kategoriData['items'] as $item) {
                Apbdes::create([
                    'tahun_anggaran' => $tahunSekarang,
                    'jenis' => 'belanja',
                    'kategori' => $kategoriData['kategori'],
                    'uraian' => $item['uraian'],
                    'jumlah' => $item['jumlah'],
                    'keterangan' => 'Data seeder untuk tahun ' . $tahunSekarang,
                    'status' => 'aktif',
                    'created_by' => $admin->id,
                ]);
            }
        }

        // Tambah data untuk tahun sebelumnya
        $tahunLalu = $tahunSekarang - 1;
        
        // Beberapa data untuk tahun lalu
        $pendapatanTahunLalu = [
            [
                'tahun_anggaran' => $tahunLalu,
                'jenis' => 'pendapatan',
                'kategori' => 'Dana Desa',
                'uraian' => 'Dana Desa dari APBN',
                'jumlah' => 750000000,
                'status' => 'aktif',
                'created_by' => $admin->id,
            ],
            [
                'tahun_anggaran' => $tahunLalu,
                'jenis' => 'pendapatan',
                'kategori' => 'PADes',
                'uraian' => 'Hasil Usaha Desa (BUMDes)',
                'jumlah' => 120000000,
                'status' => 'aktif',
                'created_by' => $admin->id,
            ]
        ];

        foreach ($pendapatanTahunLalu as $data) {
            Apbdes::create($data);
        }

        $this->command->info('APBDES seeder completed successfully!');
    }
}
