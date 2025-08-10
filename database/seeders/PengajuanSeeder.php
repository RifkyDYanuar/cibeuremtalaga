<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pengajuan;
use App\Models\User;
use App\Models\JenisSurat;

class PengajuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil user dan jenis surat yang ada
        $users = User::all();
        $jenisSurats = JenisSurat::all();

        if ($users->isEmpty() || $jenisSurats->isEmpty()) {
            $this->command->warn('Tidak ada user atau jenis surat. Pastikan seeder User dan JenisSurat sudah dijalankan.');
            return;
        }

        // Contoh data pengajuan
        $samplePengajuans = [
            [
                'user_id' => $users->first()->id,
                'jenis_surat_id' => $jenisSurats->where('nama', 'LIKE', '%KTP%')->first()?->id ?? 1,
                'data' => json_encode([
                    'nama_lengkap' => 'Ahmad Sutarno',
                    'ttl' => 'Bandung, 15 Januari 1985',
                    'jenis_kelamin' => 'Laki-laki',
                    'nik' => '3273041501850001',
                    'no_kk' => '3273040101000001',
                    'alamat' => 'Jl. Merdeka No. 123, RT 01/RW 05, Cibereum Talaga',
                    'agama' => 'Islam',
                    'pekerjaan' => 'Petani',
                    'status_perkawinan' => 'Kawin',
                    'no_hp' => '081234567890',
                    'tujuan_permohonan' => 'Untuk membuat KTP baru karena hilang'
                ]),
                'status' => 'Pending',
                'created_at' => now()->subDays(3),
                'updated_at' => now()->subDays(3),
            ],
            [
                'user_id' => $users->first()->id,
                'jenis_surat_id' => $jenisSurats->where('nama', 'LIKE', '%Domisili%')->first()?->id ?? 2,
                'data' => json_encode([
                    'nama_lengkap' => 'Siti Nurhaliza',
                    'ttl' => 'Bandung, 20 Maret 1990',
                    'jenis_kelamin' => 'Perempuan',
                    'nik' => '3273042003900002',
                    'no_kk' => '3273040101000002',
                    'alamat' => 'Jl. Raya Cibereum No. 45, RT 02/RW 03, Cibereum Talaga',
                    'agama' => 'Islam',
                    'pekerjaan' => 'Ibu Rumah Tangga',
                    'status_perkawinan' => 'Kawin',
                    'no_hp' => '081987654321',
                    'tujuan_permohonan' => 'Untuk pendaftaran sekolah anak'
                ]),
                'status' => 'Diproses',
                'created_at' => now()->subDays(5),
                'updated_at' => now()->subDays(1),
            ],
            [
                'user_id' => $users->count() > 1 ? $users->skip(1)->first()->id : $users->first()->id,
                'jenis_surat_id' => $jenisSurats->where('nama', 'LIKE', '%SKTM%')->first()?->id ?? 3,
                'data' => json_encode([
                    'nama_lengkap' => 'Budi Santoso',
                    'ttl' => 'Bandung, 10 Agustus 1980',
                    'jenis_kelamin' => 'Laki-laki',
                    'nik' => '3273041008800003',
                    'no_kk' => '3273040101000003',
                    'alamat' => 'Jl. Mawar No. 67, RT 03/RW 04, Cibereum Talaga',
                    'agama' => 'Islam',
                    'pekerjaan' => 'Buruh Harian',
                    'status_perkawinan' => 'Kawin',
                    'no_hp' => '082345678901',
                    'tujuan_permohonan' => 'Untuk bantuan sosial dari pemerintah'
                ]),
                'status' => 'Selesai',
                'file_url' => 'surat_jadi/sktm_budi_santoso.pdf',
                'catatan_admin' => 'Surat telah selesai dibuat dan dapat diambil di kantor desa.',
                'created_at' => now()->subDays(10),
                'updated_at' => now()->subDays(2),
            ],
            [
                'user_id' => $users->first()->id,
                'jenis_surat_id' => $jenisSurats->where('nama', 'LIKE', '%SKCK%')->first()?->id ?? 4,
                'data' => json_encode([
                    'nama_lengkap' => 'Dewi Sartika',
                    'ttl' => 'Bandung, 25 Juni 1992',
                    'jenis_kelamin' => 'Perempuan',
                    'nik' => '3273042506920004',
                    'no_kk' => '3273040101000004',
                    'alamat' => 'Jl. Melati No. 89, RT 04/RW 02, Cibereum Talaga',
                    'agama' => 'Islam',
                    'pekerjaan' => 'Karyawan Swasta',
                    'status_perkawinan' => 'Belum Kawin',
                    'no_hp' => '083456789012',
                    'tujuan_permohonan' => 'Untuk melamar pekerjaan sebagai PNS'
                ]),
                'status' => 'Diproses',
                'catatan_admin' => 'Berkas sedang dalam tahap verifikasi.',
                'created_at' => now()->subDays(7),
                'updated_at' => now()->subHours(6),
            ],
            [
                'user_id' => $users->count() > 1 ? $users->skip(1)->first()->id : $users->first()->id,
                'jenis_surat_id' => $jenisSurats->where('nama', 'LIKE', '%Penelitian%')->first()?->id ?? 5,
                'data' => json_encode([
                    'nama_lengkap' => 'Andi Pratama',
                    'ttl' => 'Jakarta, 12 November 1995',
                    'jenis_kelamin' => 'Laki-laki',
                    'nik' => '3173051211950005',
                    'no_kk' => '3173050101000005',
                    'alamat' => 'Jl. Peneliti No. 12, RT 05/RW 01, Cibereum Talaga',
                    'agama' => 'Islam',
                    'pekerjaan' => 'Mahasiswa',
                    'status_perkawinan' => 'Belum Kawin',
                    'no_hp' => '084567890123',
                    'tujuan_permohonan' => 'Untuk penelitian skripsi tentang pemberdayaan masyarakat desa',
                    'universitas' => 'Universitas Padjajaran',
                    'jurusan' => 'Sosiologi',
                    'periode_penelitian' => '1 Februari - 30 April 2024'
                ]),
                'status' => 'Pending',
                'created_at' => now()->subDays(1),
                'updated_at' => now()->subDays(1),
            ]
        ];

        foreach ($samplePengajuans as $pengajuanData) {
            Pengajuan::create($pengajuanData);
        }

        $this->command->info('Sample pengajuan data has been seeded successfully.');
    }
}
