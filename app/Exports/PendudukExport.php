<?php

namespace App\Exports;

use App\Models\Penduduk;
use Illuminate\Http\Request;

class PendudukExport
{
    protected $request;

    public function __construct(Request $request = null)
    {
        $this->request = $request;
    }

    public function collection()
    {
        $query = Penduduk::query();

        // Apply filters if request exists
        if ($this->request) {
            // Filter berdasarkan pencarian
            if ($this->request->filled('search')) {
                $search = $this->request->search;
                $query->where(function($q) use ($search) {
                    $q->where('nama', 'like', "%{$search}%")
                      ->orWhere('nik', 'like', "%{$search}%");
                });
            }

            // Filter berdasarkan jenis kelamin
            if ($this->request->filled('jenis_kelamin')) {
                $query->where('jenis_kelamin', $this->request->jenis_kelamin);
            }

            // Filter berdasarkan status
            if ($this->request->filled('status')) {
                $query->where('status', $this->request->status);
            }

            // Filter berdasarkan RT
            if ($this->request->filled('rt')) {
                $query->where('rt', $this->request->rt);
            }
        }

        return $query->orderBy('nama')->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'NIK',
            'Nama',
            'Jenis Kelamin',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Usia',
            'Alamat',
            'RT',
            'RW',
            'Agama',
            'Status Perkawinan',
            'Pekerjaan',
            'Pendidikan',
            'Status dalam Keluarga',
            'Nama Ayah',
            'Nama Ibu',
            'Kewarganegaraan',
            'No. KK',
            'Status',
            'Keterangan'
        ];
    }

    public function generateCSV()
    {
        $penduduk = $this->collection();
        $filename = 'data-penduduk-' . date('Y-m-d-H-i-s') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            'Cache-Control' => 'no-cache, no-store, must-revalidate',
            'Pragma' => 'no-cache',
            'Expires' => '0'
        ];

        $callback = function() use ($penduduk) {
            $file = fopen('php://output', 'w');
            
            // Add BOM for proper UTF-8 encoding in Excel
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
            
            // Headers
            fputcsv($file, $this->headings(), ';'); // Use semicolon as delimiter
            
            // Data
            $no = 1;
            foreach ($penduduk as $p) {
                $row = [
                    $no++,
                    "'" . $p->nik, // Add apostrophe to preserve leading zeros
                    $this->cleanText($p->nama),
                    $p->jenis_kelamin,
                    $this->cleanText($p->tempat_lahir),
                    $p->tanggal_lahir ? $p->tanggal_lahir->format('d/m/Y') : '',
                    $p->usia,
                    $this->cleanText($p->alamat),
                    $p->rt,
                    $p->rw,
                    $this->cleanText($p->agama),
                    $this->cleanText($p->status_perkawinan),
                    $this->cleanText($p->pekerjaan),
                    $this->cleanText($p->pendidikan),
                    $this->cleanText($p->status_dalam_keluarga),
                    $this->cleanText($p->nama_ayah),
                    $this->cleanText($p->nama_ibu),
                    $p->kewarganegaraan,
                    $p->no_kk ? "'" . $p->no_kk : '', // Add apostrophe to preserve leading zeros
                    ucfirst($p->status),
                    $this->cleanText($p->keterangan)
                ];
                
                fputcsv($file, $row, ';'); // Use semicolon as delimiter
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * Generate Excel file using HTML table format
     */
    public function generateExcel()
    {
        $penduduk = $this->collection();
        $filename = 'data-penduduk-' . date('Y-m-d-H-i-s') . '.xls';
        
        $headers = [
            'Content-Type' => 'application/vnd.ms-excel; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            'Cache-Control' => 'no-cache, no-store, must-revalidate',
            'Pragma' => 'no-cache',
            'Expires' => '0'
        ];

        $callback = function() use ($penduduk) {
            echo chr(0xEF).chr(0xBB).chr(0xBF); // BOM for UTF-8
            
            echo '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">';
            echo '<head><meta charset="UTF-8"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></head>';
            echo '<body>';
            echo '<table border="1">';
            
            // Headers
            echo '<tr style="background-color: #f2f2f2; font-weight: bold;">';
            foreach ($this->headings() as $heading) {
                echo '<th>' . htmlspecialchars($heading) . '</th>';
            }
            echo '</tr>';
            
            // Data
            $no = 1;
            foreach ($penduduk as $p) {
                echo '<tr>';
                echo '<td>' . $no++ . '</td>';
                echo '<td style="mso-number-format:\@;">' . htmlspecialchars($p->nik) . '</td>'; // Force text format for NIK
                echo '<td>' . htmlspecialchars($p->nama) . '</td>';
                echo '<td>' . htmlspecialchars($p->jenis_kelamin) . '</td>';
                echo '<td>' . htmlspecialchars($p->tempat_lahir) . '</td>';
                echo '<td>' . ($p->tanggal_lahir ? $p->tanggal_lahir->format('d/m/Y') : '') . '</td>';
                echo '<td>' . $p->usia . '</td>';
                echo '<td>' . htmlspecialchars($p->alamat) . '</td>';
                echo '<td>' . htmlspecialchars($p->rt) . '</td>';
                echo '<td>' . htmlspecialchars($p->rw) . '</td>';
                echo '<td>' . htmlspecialchars($p->agama) . '</td>';
                echo '<td>' . htmlspecialchars($p->status_perkawinan) . '</td>';
                echo '<td>' . htmlspecialchars($p->pekerjaan) . '</td>';
                echo '<td>' . htmlspecialchars($p->pendidikan) . '</td>';
                echo '<td>' . htmlspecialchars($p->status_dalam_keluarga) . '</td>';
                echo '<td>' . htmlspecialchars($p->nama_ayah) . '</td>';
                echo '<td>' . htmlspecialchars($p->nama_ibu) . '</td>';
                echo '<td>' . htmlspecialchars($p->kewarganegaraan) . '</td>';
                echo '<td style="mso-number-format:\@;">' . htmlspecialchars($p->no_kk) . '</td>'; // Force text format for No KK
                echo '<td>' . htmlspecialchars(ucfirst($p->status)) . '</td>';
                echo '<td>' . htmlspecialchars($p->keterangan) . '</td>';
                echo '</tr>';
            }
            
            echo '</table>';
            echo '</body>';
            echo '</html>';
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * Clean text to remove problematic characters for CSV
     */
    private function cleanText($text)
    {
        if (empty($text)) {
            return '';
        }
        
        // Remove or replace problematic characters
        $text = str_replace(['"', "'", "\n", "\r", "\t"], ['""', "'", ' ', ' ', ' '], $text);
        
        // Trim whitespace
        return trim($text);
    }
}
