<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Penduduk;
use Carbon\Carbon;

class PendudukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pendudukData = [
            // Keluarga 1 - Keluarga Bapak Asep
            [
                'nik' => '3201012345670001',
                'nama' => 'Asep Suryadi',
                'jenis_kelamin' => 'Laki-laki',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '1975-03-15',
                'alamat' => 'Jl. Merdeka No. 12',
                'rt' => '001',
                'rw' => '001',
                'agama' => 'Islam',
                'status_perkawinan' => 'Kawin',
                'pekerjaan' => 'Petani',
                'pendidikan' => 'SMA/Sederajat',
                'status_dalam_keluarga' => 'Kepala Keluarga',
                'nama_ayah' => 'Deden Suryadi',
                'nama_ibu' => 'Siti Maryam',
                'kewarganegaraan' => 'WNI',
                'no_kk' => '3201012345670000',
                'status' => 'aktif',
                'keterangan' => null
            ],
            [
                'nik' => '3201012345670002',
                'nama' => 'Siti Nurhaliza',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '1978-07-20',
                'alamat' => 'Jl. Merdeka No. 12',
                'rt' => '001',
                'rw' => '001',
                'agama' => 'Islam',
                'status_perkawinan' => 'Kawin',
                'pekerjaan' => 'Ibu Rumah Tangga',
                'pendidikan' => 'SMP/Sederajat',
                'status_dalam_keluarga' => 'Istri',
                'nama_ayah' => 'Ahmad Santoso',
                'nama_ibu' => 'Rohayati',
                'kewarganegaraan' => 'WNI',
                'no_kk' => '3201012345670000',
                'status' => 'aktif',
                'keterangan' => null
            ],
            [
                'nik' => '3201012345670003',
                'nama' => 'Rina Suryadi',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '2005-12-10',
                'alamat' => 'Jl. Merdeka No. 12',
                'rt' => '001',
                'rw' => '001',
                'agama' => 'Islam',
                'status_perkawinan' => 'Belum Kawin',
                'pekerjaan' => 'Pelajar',
                'pendidikan' => 'SMA/Sederajat',
                'status_dalam_keluarga' => 'Anak',
                'nama_ayah' => 'Asep Suryadi',
                'nama_ibu' => 'Siti Nurhaliza',
                'kewarganegaraan' => 'WNI',
                'no_kk' => '3201012345670000',
                'status' => 'aktif',
                'keterangan' => null
            ],
            
            // Keluarga 2 - Keluarga Bapak Dedi
            [
                'nik' => '3201012345670004',
                'nama' => 'Dedi Kurniawan',
                'jenis_kelamin' => 'Laki-laki',
                'tempat_lahir' => 'Cimahi',
                'tanggal_lahir' => '1980-08-25',
                'alamat' => 'Jl. Sukapura No. 8',
                'rt' => '002',
                'rw' => '001',
                'agama' => 'Islam',
                'status_perkawinan' => 'Kawin',
                'pekerjaan' => 'Wiraswasta',
                'pendidikan' => 'Diploma',
                'status_dalam_keluarga' => 'Kepala Keluarga',
                'nama_ayah' => 'Usman Kurniawan',
                'nama_ibu' => 'Neneng Sumiati',
                'kewarganegaraan' => 'WNI',
                'no_kk' => '3201012345670001',
                'status' => 'aktif',
                'keterangan' => null
            ],
            [
                'nik' => '3201012345670005',
                'nama' => 'Elly Handayani',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '1985-02-14',
                'alamat' => 'Jl. Sukapura No. 8',
                'rt' => '002',
                'rw' => '001',
                'agama' => 'Islam',
                'status_perkawinan' => 'Kawin',
                'pekerjaan' => 'Guru',
                'pendidikan' => 'Sarjana',
                'status_dalam_keluarga' => 'Istri',
                'nama_ayah' => 'Ade Handayani',
                'nama_ibu' => 'Ida Farida',
                'kewarganegaraan' => 'WNI',
                'no_kk' => '3201012345670001',
                'status' => 'aktif',
                'keterangan' => null
            ],
            
            // Keluarga 3 - Keluarga Bapak Tatang (Lansia)
            [
                'nik' => '3201012345670006',
                'nama' => 'Tatang Sudrajat',
                'jenis_kelamin' => 'Laki-laki',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '1950-06-05',
                'alamat' => 'Jl. Cibeureum No. 15',
                'rt' => '003',
                'rw' => '002',
                'agama' => 'Islam',
                'status_perkawinan' => 'Kawin',
                'pekerjaan' => 'Pensiunan',
                'pendidikan' => 'SD/Sederajat',
                'status_dalam_keluarga' => 'Kepala Keluarga',
                'nama_ayah' => 'Udin Sudrajat',
                'nama_ibu' => 'Euis Kartika',
                'kewarganegaraan' => 'WNI',
                'no_kk' => '3201012345670002',
                'status' => 'aktif',
                'keterangan' => null
            ],
            [
                'nik' => '3201012345670007',
                'nama' => 'Rokayah',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '1955-11-18',
                'alamat' => 'Jl. Cibeureum No. 15',
                'rt' => '003',
                'rw' => '002',
                'agama' => 'Islam',
                'status_perkawinan' => 'Kawin',
                'pekerjaan' => 'Ibu Rumah Tangga',
                'pendidikan' => 'SD/Sederajat',
                'status_dalam_keluarga' => 'Istri',
                'nama_ayah' => 'Maman',
                'nama_ibu' => 'Fatimah',
                'kewarganegaraan' => 'WNI',
                'no_kk' => '3201012345670002',
                'status' => 'aktif',
                'keterangan' => null
            ],
            
            // Keluarga 4 - Keluarga Muda
            [
                'nik' => '3201012345670008',
                'nama' => 'Agus Riyadi',
                'jenis_kelamin' => 'Laki-laki',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '1990-04-12',
                'alamat' => 'Jl. Mawar No. 22',
                'rt' => '004',
                'rw' => '002',
                'agama' => 'Islam',
                'status_perkawinan' => 'Kawin',
                'pekerjaan' => 'Karyawan Swasta',
                'pendidikan' => 'Sarjana',
                'status_dalam_keluarga' => 'Kepala Keluarga',
                'nama_ayah' => 'Rudi Riyadi',
                'nama_ibu' => 'Yanti Sari',
                'kewarganegaraan' => 'WNI',
                'no_kk' => '3201012345670003',
                'status' => 'aktif',
                'keterangan' => null
            ],
            [
                'nik' => '3201012345670009',
                'nama' => 'Maya Sari',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '1992-09-08',
                'alamat' => 'Jl. Mawar No. 22',
                'rt' => '004',
                'rw' => '002',
                'agama' => 'Islam',
                'status_perkawinan' => 'Kawin',
                'pekerjaan' => 'Bidan',
                'pendidikan' => 'Diploma',
                'status_dalam_keluarga' => 'Istri',
                'nama_ayah' => 'Yadi Hermawan',
                'nama_ibu' => 'Lilis Sumiati',
                'kewarganegaraan' => 'WNI',
                'no_kk' => '3201012345670003',
                'status' => 'aktif',
                'keterangan' => null
            ],
            [
                'nik' => '3201012345670010',
                'nama' => 'Alif Riyadi',
                'jenis_kelamin' => 'Laki-laki',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '2020-01-15',
                'alamat' => 'Jl. Mawar No. 22',
                'rt' => '004',
                'rw' => '002',
                'agama' => 'Islam',
                'status_perkawinan' => 'Belum Kawin',
                'pekerjaan' => 'Belum Bekerja',
                'pendidikan' => 'Tidak Sekolah',
                'status_dalam_keluarga' => 'Anak',
                'nama_ayah' => 'Agus Riyadi',
                'nama_ibu' => 'Maya Sari',
                'kewarganegaraan' => 'WNI',
                'no_kk' => '3201012345670003',
                'status' => 'aktif',
                'keterangan' => null
            ],
            
            // Tambahan data untuk variasi
            [
                'nik' => '3201012345670011',
                'nama' => 'Bambang Sutrisno',
                'jenis_kelamin' => 'Laki-laki',
                'tempat_lahir' => 'Bogor',
                'tanggal_lahir' => '1965-10-30',
                'alamat' => 'Jl. Dahlia No. 5',
                'rt' => '005',
                'rw' => '003',
                'agama' => 'Kristen',
                'status_perkawinan' => 'Kawin',
                'pekerjaan' => 'Pegawai Negeri Sipil',
                'pendidikan' => 'Sarjana',
                'status_dalam_keluarga' => 'Kepala Keluarga',
                'nama_ayah' => 'Sutomo',
                'nama_ibu' => 'Sumirah',
                'kewarganegaraan' => 'WNI',
                'no_kk' => '3201012345670004',
                'status' => 'aktif',
                'keterangan' => null
            ],
            [
                'nik' => '3201012345670012',
                'nama' => 'Indra Gunawan',
                'jenis_kelamin' => 'Laki-laki',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '1988-05-22',
                'alamat' => 'Jl. Melati No. 18',
                'rt' => '006',
                'rw' => '003',
                'agama' => 'Islam',
                'status_perkawinan' => 'Belum Kawin',
                'pekerjaan' => 'Mekanik',
                'pendidikan' => 'SMA/Sederajat',
                'status_dalam_keluarga' => 'Kepala Keluarga',
                'nama_ayah' => 'Gunawan Wijaya',
                'nama_ibu' => 'Sri Mulyani',
                'kewarganegaraan' => 'WNI',
                'no_kk' => '3201012345670005',
                'status' => 'aktif',
                'keterangan' => null
            ]
        ];

        foreach ($pendudukData as $data) {
            Penduduk::create($data);
        }
    }
}
