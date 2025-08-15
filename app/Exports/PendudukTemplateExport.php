<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Font;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class PendudukTemplateExport implements FromArray, WithHeadings, WithStyles, WithColumnWidths
{
    /**
     * @return array
     */
    public function array(): array
    {
        return [
            // Header instruksi
            [
                'PETUNJUK PENGISIAN:',
                '1. NIK harus 16 digit (jika di Excel muncul scientific notation, format kolom sebagai TEXT)',
                '2. Tanggal lahir format: YYYY-MM-DD, DD/MM/YYYY, atau DD-MM-YYYY',
                '3. Hapus baris ini sebelum import',
                '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''
            ],
            // Spasi
            ['', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''],
            // Contoh data untuk template
            [
                "'3201234567890123", // Tambah tanda kutip untuk memaksa format text
                'John Doe',
                'Laki-laki',
                'Jakarta',
                '1990-01-15',
                'Jl. Contoh No. 123',
                '001',
                '002',
                'Islam',
                'Kawin',
                'Pegawai Swasta',
                'S1',
                'Kepala Keluarga',
                'Budi Doe',
                'Siti Doe',
                'Indonesia',
                "'1234567890123456", // Tambah tanda kutip untuk memaksa format text
                'aktif',
                'Contoh data'
            ],
            [
                "'3201234567890124", // Tambah tanda kutip untuk memaksa format text
                'Jane Doe',
                'Perempuan',
                'Jakarta',
                '1992-05-20',
                'Jl. Contoh No. 123',
                '001',
                '002',
                'Islam',
                'Kawin',
                'Ibu Rumah Tangga',
                'SMA',
                'Istri',
                'Ahmad Smith',
                'Fatimah Smith',
                'Indonesia',
                "'1234567890123456", // Tambah tanda kutip untuk memaksa format text
                'aktif',
                'Contoh data'
            ]
        ];
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'nik',
            'nama',
            'jenis_kelamin',
            'tempat_lahir',
            'tanggal_lahir',
            'alamat',
            'rt',
            'rw',
            'agama',
            'status_perkawinan',
            'pekerjaan',
            'pendidikan',
            'status_dalam_keluarga',
            'nama_ayah',
            'nama_ibu',
            'kewarganegaraan',
            'no_kk',
            'status',
            'keterangan'
        ];
    }

    /**
     * @param Worksheet $sheet
     * @return array
     */
    public function styles(Worksheet $sheet)
    {
        return [
            // Style untuk header
            1 => [
                'font' => [
                    'bold' => true,
                    'color' => ['rgb' => 'FFFFFF'],
                ],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => ['rgb' => '4472C4'],
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical' => Alignment::VERTICAL_CENTER,
                ],
            ],
            // Style untuk data
            '2:1000' => [
                'alignment' => [
                    'vertical' => Alignment::VERTICAL_CENTER,
                ],
            ],
        ];
    }

    /**
     * @return array
     */
    public function columnWidths(): array
    {
        return [
            'A' => 20, // NIK
            'B' => 25, // Nama
            'C' => 15, // Jenis Kelamin
            'D' => 20, // Tempat Lahir
            'E' => 15, // Tanggal Lahir
            'F' => 30, // Alamat
            'G' => 8,  // RT
            'H' => 8,  // RW
            'I' => 12, // Agama
            'J' => 15, // Status Perkawinan
            'K' => 20, // Pekerjaan
            'L' => 15, // Pendidikan
            'M' => 20, // Status dalam Keluarga
            'N' => 25, // Nama Ayah
            'O' => 25, // Nama Ibu
            'P' => 15, // Kewarganegaraan
            'Q' => 20, // No. KK
            'R' => 10, // Status
            'S' => 25, // Keterangan
        ];
    }
}
