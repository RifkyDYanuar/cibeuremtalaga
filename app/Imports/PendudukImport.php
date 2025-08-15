<?php

namespace App\Imports;

use App\Models\Penduduk;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Validation\Rule;

class PendudukImport implements ToModel, WithHeadingRow, WithValidation, WithBatchInserts, WithChunkReading
{
    use Importable;

    private $errors = [];
    private $imported = 0;
    private $skipped = 0;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // Normalize NIK first
        $nik = $this->normalizeNIK($row['nik'] ?? '');
        
        // Skip jika NIK kosong atau tidak valid
        if (empty($nik) || strlen($nik) !== 16) {
            $this->skipped++;
            $this->errors[] = "NIK tidak valid atau kosong: " . ($row['nik'] ?? 'kosong');
            return null;
        }

        // Cek apakah NIK sudah ada
        if (Penduduk::where('nik', $nik)->exists()) {
            $this->skipped++;
            $this->errors[] = "NIK {$nik} sudah ada dalam database";
            return null;
        }

        try {
            // Parse tanggal lahir
            $tanggalLahir = null;
            if (!empty($row['tanggal_lahir'])) {
                // Coba beberapa format tanggal
                $formats = ['Y-m-d', 'd/m/Y', 'd-m-Y', 'Y/m/d'];
                foreach ($formats as $format) {
                    try {
                        $tanggalLahir = Carbon::createFromFormat($format, $row['tanggal_lahir'])->format('Y-m-d');
                        break;
                    } catch (\Exception $e) {
                        continue;
                    }
                }
                
                // Jika masih null, coba parse dengan Carbon
                if (!$tanggalLahir) {
                    try {
                        $tanggalLahir = Carbon::parse($row['tanggal_lahir'])->format('Y-m-d');
                    } catch (\Exception $e) {
                        $tanggalLahir = null;
                    }
                }
            }

            $this->imported++;
            
            return new Penduduk([
                'nik' => $nik,
                'nama' => $row['nama'] ?? '',
                'jenis_kelamin' => $this->normalizeJenisKelamin($row['jenis_kelamin'] ?? ''),
                'tempat_lahir' => $row['tempat_lahir'] ?? '',
                'tanggal_lahir' => $tanggalLahir,
                'alamat' => $row['alamat'] ?? '',
                'rt' => $row['rt'] ?? '001',
                'rw' => $row['rw'] ?? '001',
                'agama' => $this->normalizeAgama($row['agama'] ?? ''),
                'status_perkawinan' => $this->normalizeStatusPerkawinan($row['status_perkawinan'] ?? ''),
                'pekerjaan' => $row['pekerjaan'] ?? '',
                'pendidikan' => $this->normalizePendidikan($row['pendidikan'] ?? ''),
                'status_dalam_keluarga' => $this->normalizeStatusKeluarga($row['status_dalam_keluarga'] ?? ''),
                'nama_ayah' => $row['nama_ayah'] ?? '',
                'nama_ibu' => $row['nama_ibu'] ?? '',
                'kewarganegaraan' => $this->normalizeKewarganegaraan($row['kewarganegaraan'] ?? ''),
                'no_kk' => $this->normalizeNoKK($row['no_kk'] ?? ''),
                'status' => $this->normalizeStatus($row['status'] ?? ''),
                'keterangan' => $row['keterangan'] ?? '',
            ]);

        } catch (\Exception $e) {
            $this->skipped++;
            $this->errors[] = "Error pada NIK {$nik}: " . $e->getMessage();
            return null;
        }
    }

    /**
     * Validation rules
     */
    public function rules(): array
    {
        return [
            'nik' => ['required'],
            'nama' => ['required', 'string', 'max:255'],
            'jenis_kelamin' => ['nullable', 'string'],
            'tempat_lahir' => ['nullable', 'string', 'max:255'],
            'tanggal_lahir' => ['nullable'],
            'alamat' => ['nullable', 'string'],
            'rt' => ['nullable', 'string', 'max:10'],
            'rw' => ['nullable', 'string', 'max:10'],
            'agama' => ['nullable', 'string', 'max:50'],
            'status_perkawinan' => ['nullable', 'string'],
            'pekerjaan' => ['nullable', 'string', 'max:100'],
            'pendidikan' => ['nullable', 'string'],
            'status_dalam_keluarga' => ['nullable', 'string'],
            'nama_ayah' => ['nullable', 'string', 'max:255'],
            'nama_ibu' => ['nullable', 'string', 'max:255'],
            'kewarganegaraan' => ['nullable', 'string'],
            'no_kk' => ['nullable'],
            'status' => ['nullable', 'string'],
            'keterangan' => ['nullable', 'string'],
        ];
    }

    /**
     * Custom attributes for validation errors
     */
    public function customValidationAttributes()
    {
        return [
            'nik' => 'NIK',
            'nama' => 'Nama',
            'jenis_kelamin' => 'Jenis Kelamin',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'alamat' => 'Alamat',
            'rt' => 'RT',
            'rw' => 'RW',
            'agama' => 'Agama',
            'status_perkawinan' => 'Status Perkawinan',
            'pekerjaan' => 'Pekerjaan',
            'pendidikan' => 'Pendidikan',
            'status_dalam_keluarga' => 'Status dalam Keluarga',
            'nama_ayah' => 'Nama Ayah',
            'nama_ibu' => 'Nama Ibu',
            'kewarganegaraan' => 'Kewarganegaraan',
            'no_kk' => 'No. KK',
            'status' => 'Status',
            'keterangan' => 'Keterangan',
        ];
    }

    /**
     * Batch size for processing
     */
    public function batchSize(): int
    {
        return 100;
    }

    /**
     * Chunk size for reading
     */
    public function chunkSize(): int
    {
        return 100;
    }

    /**
     * Normalize NIK (handle number format from Excel)
     */
    private function normalizeNIK($value)
    {
        if (empty($value)) {
            return '';
        }
        
        // Convert to string first
        $nik = (string) $value;
        
        // Remove any spaces or special characters
        $nik = preg_replace('/[^0-9]/', '', $nik);
        
        // If NIK is less than 16 digits, pad with leading zeros
        if (strlen($nik) < 16 && strlen($nik) > 10) {
            $nik = str_pad($nik, 16, '0', STR_PAD_LEFT);
        }
        
        return $nik;
    }

    /**
     * Normalize No KK (handle number format from Excel)
     */
    private function normalizeNoKK($value)
    {
        if (empty($value)) {
            return '';
        }
        
        // Convert to string first
        $noKK = (string) $value;
        
        // Remove any spaces or special characters
        $noKK = preg_replace('/[^0-9]/', '', $noKK);
        
        // If No KK is less than 16 digits, pad with leading zeros
        if (strlen($noKK) < 16 && strlen($noKK) > 10) {
            $noKK = str_pad($noKK, 16, '0', STR_PAD_LEFT);
        }
        
        return $noKK;
    }

    /**
     * Normalize jenis kelamin
     */
    private function normalizeJenisKelamin($value)
    {
        $value = strtolower(trim($value));
        
        if (in_array($value, ['l', 'laki-laki', 'laki', 'pria', 'male', '1'])) {
            return 'Laki-laki';
        }
        
        if (in_array($value, ['p', 'perempuan', 'wanita', 'female', '0'])) {
            return 'Perempuan';
        }
        
        return 'Laki-laki'; // Default value
    }

    /**
     * Normalize agama
     */
    private function normalizeAgama($value)
    {
        $value = strtolower(trim($value));
        $agamaMap = [
            'islam' => 'Islam',
            'kristen' => 'Kristen',
            'katolik' => 'Katolik',
            'hindu' => 'Hindu',
            'buddha' => 'Buddha',
            'konghucu' => 'Konghucu',
            'protestan' => 'Kristen',
        ];
        
        return $agamaMap[$value] ?? 'Islam'; // Default to Islam if not found
    }

    /**
     * Normalize status perkawinan
     */
    private function normalizeStatusPerkawinan($value)
    {
        $value = strtolower(trim($value));
        $statusMap = [
            'belum kawin' => 'Belum Kawin',
            'kawin' => 'Kawin',
            'cerai hidup' => 'Cerai Hidup',
            'cerai mati' => 'Cerai Mati',
            'menikah' => 'Kawin',
            'single' => 'Belum Kawin',
            'janda' => 'Cerai Mati',
            'duda' => 'Cerai Mati',
        ];
        
        return $statusMap[$value] ?? 'Belum Kawin'; // Default
    }

    /**
     * Normalize pendidikan
     */
    private function normalizePendidikan($value)
    {
        $value = strtolower(trim($value));
        $pendidikanMap = [
            'tidak sekolah' => 'Tidak Sekolah',
            'sd' => 'SD/Sederajat',
            'smp' => 'SMP/Sederajat',
            'sma' => 'SMA/Sederajat',
            'smk' => 'SMA/Sederajat',
            'd1' => 'Diploma',
            'd2' => 'Diploma',
            'd3' => 'Diploma',
            's1' => 'Sarjana',
            's2' => 'Pascasarjana',
            's3' => 'Pascasarjana',
            'diploma' => 'Diploma',
            'sarjana' => 'Sarjana',
            'magister' => 'Pascasarjana',
            'doktor' => 'Pascasarjana',
        ];
        
        return $pendidikanMap[$value] ?? 'SD/Sederajat'; // Default
    }

    /**
     * Normalize status dalam keluarga
     */
    private function normalizeStatusKeluarga($value)
    {
        $value = strtolower(trim($value));
        $statusMap = [
            'kepala keluarga' => 'Kepala Keluarga',
            'istri' => 'Istri',
            'anak' => 'Anak',
            'menantu' => 'Menantu',
            'cucu' => 'Cucu',
            'orangtua' => 'Orangtua',
            'mertua' => 'Mertua',
            'famili lain' => 'Famili Lain',
            'pembantu' => 'Pembantu',
            'lainnya' => 'Lainnya',
        ];
        
        return $statusMap[$value] ?? 'Anak'; // Default
    }

    /**
     * Normalize kewarganegaraan
     */
    private function normalizeKewarganegaraan($value)
    {
        $value = strtolower(trim($value));
        
        if (in_array($value, ['indonesia', 'wni', 'indo'])) {
            return 'WNI';
        }
        
        if (in_array($value, ['wna', 'asing'])) {
            return 'WNA';
        }
        
        return 'WNI'; // Default
    }

    /**
     * Normalize status
     */
    private function normalizeStatus($value)
    {
        $value = strtolower(trim($value));
        $statusMap = [
            'aktif' => 'Aktif',
            'pindah' => 'Pindah',
            'meninggal' => 'Meninggal',
            'mati' => 'Meninggal',
        ];
        
        return $statusMap[$value] ?? 'Aktif'; // Default
    }

    /**
     * Get import statistics
     */
    public function getStats()
    {
        return [
            'imported' => $this->imported,
            'skipped' => $this->skipped,
            'errors' => $this->errors
        ];
    }
}
