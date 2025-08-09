<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JenisSurat;

class JenisSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenisSurats = [
            [
                'nama' => 'Surat Pengantar Pembuatan KTP/KK',
                'deskripsi' => 'Surat pengantar untuk pembuatan KTP atau Kartu Keluarga'
            ],
            [
                'nama' => 'Surat Keterangan Domisili',
                'deskripsi' => 'Surat keterangan domisili tempat tinggal'
            ],
            [
                'nama' => 'Surat Keterangan Tidak Mampu (SKTM)',
                'deskripsi' => 'Surat keterangan tidak mampu untuk berbagai keperluan'
            ],
            [
                'nama' => 'Surat Pengantar SKCK',
                'deskripsi' => 'Surat pengantar untuk pembuatan SKCK'
            ],
            [
                'nama' => 'Surat Izin Penelitian/Kegiatan',
                'deskripsi' => 'Surat izin untuk melakukan penelitian atau kegiatan'
            ],
            [
                'nama' => 'Surat Keterangan Usaha',
                'deskripsi' => 'Surat keterangan usaha untuk UMKM'
            ],
            [
                'nama' => 'Surat Keterangan Kelahiran',
                'deskripsi' => 'Surat keterangan kelahiran bayi'
            ],
            [
                'nama' => 'Surat Keterangan Kematian',
                'deskripsi' => 'Surat keterangan kematian'
            ],
            [
                'nama' => 'Surat Keterangan Pindah',
                'deskripsi' => 'Surat keterangan pindah domisili'
            ],
        ];

        foreach ($jenisSurats as $jenis) {
            JenisSurat::create($jenis);
        }
    }
}
