<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apbdes extends Model
{
    use HasFactory;

    protected $table = 'apbdes';

    protected $fillable = [
        'tahun_anggaran',
        'jenis', // 'pendapatan', 'belanja', atau 'pembiayaan'
        'kategori',
        'uraian',
        'jumlah',
        'keterangan',
        'status',
        'created_by',
        'updated_by'
    ];

    protected $casts = [
        'jumlah' => 'decimal:2',
        'tahun_anggaran' => 'integer'
    ];

    // Relasi ke User (admin yang membuat/mengupdate)
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    // Scope untuk filter berdasarkan jenis
    public function scopePendapatan($query)
    {
        return $query->where('jenis', 'pendapatan');
    }

    public function scopeBelanja($query)
    {
        return $query->where('jenis', 'belanja');
    }

    public function scopePembiayaan($query)
    {
        return $query->where('jenis', 'pembiayaan');
    }

    // Scope untuk filter berdasarkan tahun
    public function scopeTahun($query, $tahun)
    {
        return $query->where('tahun_anggaran', $tahun);
    }

    // Method untuk format rupiah
    public function getFormattedJumlahAttribute()
    {
        return 'Rp ' . number_format($this->jumlah, 0, ',', '.');
    }

    // Method untuk mendapatkan total pendapatan per tahun
    public static function getTotalPendapatan($tahun = null)
    {
        $query = self::where('jenis', 'pendapatan');
        if ($tahun) {
            $query->where('tahun_anggaran', $tahun);
        }
        return $query->sum('jumlah');
    }

    // Method untuk mendapatkan total belanja per tahun
    public static function getTotalBelanja($tahun = null)
    {
        $query = self::where('jenis', 'belanja');
        if ($tahun) {
            $query->where('tahun_anggaran', $tahun);
        }
        return $query->sum('jumlah');
    }

    // Method untuk mendapatkan total pembiayaan per tahun
    public static function getTotalPembiayaan($tahun = null)
    {
        $query = self::where('jenis', 'pembiayaan');
        if ($tahun) {
            $query->where('tahun_anggaran', $tahun);
        }
        return $query->sum('jumlah');
    }

    // Method untuk mendapatkan saldo (Pendapatan - Belanja, tanpa pembiayaan)
    public static function getSaldo($tahun = null)
    {
        $pendapatan = self::getTotalPendapatan($tahun);
        $belanja = self::getTotalBelanja($tahun);
        
        return $pendapatan - $belanja;
    }

    // Method untuk mendapatkan saldo dengan pembiayaan (jika diperlukan untuk laporan khusus)
    public static function getSaldoDenganPembiayaan($tahun = null)
    {
        $pendapatan = self::getTotalPendapatan($tahun);
        $belanja = self::getTotalBelanja($tahun);
        $pembiayaan = self::getTotalPembiayaan($tahun);
        
        return $pendapatan - $belanja + $pembiayaan;
    }

    // Method untuk mendapatkan pembiayaan masuk dan keluar terpisah
    public static function getPembiayaanMasuk($tahun = null)
    {
        $kategoriMasuk = ['penerimaan_pembiayaan', 'silpa', 'pencairan_dana_cadangan', 'hasil_penjualan_aset_desa', 'pinjaman'];
        
        $query = self::where('jenis', 'pembiayaan')
                    ->whereIn('kategori', $kategoriMasuk);
        
        if ($tahun) {
            $query->where('tahun_anggaran', $tahun);
        }
        
        return $query->sum('jumlah');
    }

    public static function getPembiayaanKeluar($tahun = null)
    {
        $kategoriKeluar = ['pengeluaran_pembiayaan', 'pembentukan_dana_cadangan', 'penyertaan_modal_desa', 'pembayaran_pokok_utang'];
        
        $query = self::where('jenis', 'pembiayaan')
                    ->whereIn('kategori', $kategoriKeluar);
        
        if ($tahun) {
            $query->where('tahun_anggaran', $tahun);
        }
        
        return $query->sum('jumlah');
    }

    // Method untuk mendapatkan saldo akhir (termasuk pembiayaan bersih)
    public static function getSaldoAkhir($tahun = null)
    {
        $saldoOperasional = self::getSaldo($tahun); // Pendapatan - Belanja
        $pembiayaanMasuk = self::getPembiayaanMasuk($tahun);
        $pembiayaanKeluar = self::getPembiayaanKeluar($tahun);
        
        return $saldoOperasional + $pembiayaanMasuk - $pembiayaanKeluar;
    }

    // Kategori default untuk pendapatan
    public static function getKategoriPendapatan()
    {
        return [
            'PADes' => 'Pendapatan Asli Desa',
            'Dana Desa' => 'Dana Desa dari APBN',
            'Bagi Hasil Pajak' => 'Bagi Hasil Pajak dan Retribusi',
            'Alokasi Dana Desa' => 'Alokasi Dana Desa (ADD)',
            'Bantuan Keuangan' => 'Bantuan Keuangan Provinsi/Kabupaten',
            'Hibah dan Sumbangan' => 'Hibah dan Sumbangan Pihak Ketiga',
            'Lain-lain' => 'Pendapatan Lain-lain yang Sah'
        ];
    }

    // Kategori default untuk belanja
    public static function getKategoriBelanja()
    {
        return [
            'Bidang Penyelenggaraan Pemerintahan Desa' => 'Bidang Penyelenggaraan Pemerintahan Desa',
            'Bidang Pelaksanaan Pembangunan Desa' => 'Bidang Pelaksanaan Pembangunan Desa',
            'Bidang Pembinaan Kemasyarakatan' => 'Bidang Pembinaan Kemasyarakatan',
            'Bidang Pemberdayaan Masyarakat' => 'Bidang Pemberdayaan Masyarakat',
            'Bidang Penanggulangan Bencana' => 'Bidang Penanggulangan Bencana, Darurat dan Mendesak'
        ];
    }

    // Kategori default untuk pembiayaan
    public static function getKategoriPembiayaan()
    {
        return [
            'penerimaan_pembiayaan' => 'Penerimaan Pembiayaan',
            'silpa' => 'SILPA (Sisa Lebih Pembiayaan Anggaran)',
            'pencairan_dana_cadangan' => 'Pencairan Dana Cadangan',
            'hasil_penjualan_aset_desa' => 'Hasil Penjualan Aset Desa',
            'pinjaman' => 'Pinjaman',
            'pengeluaran_pembiayaan' => 'Pengeluaran Pembiayaan',
            'pembentukan_dana_cadangan' => 'Pembentukan Dana Cadangan',
            'penyertaan_modal_desa' => 'Penyertaan Modal Desa',
            'pembayaran_pokok_utang' => 'Pembayaran Pokok Utang'
        ];
    }
}
