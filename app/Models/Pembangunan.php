<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Pembangunan extends Model
{
    protected $table = 'pembangunan';
    
    protected $fillable = [
        'nama_proyek', 'deskripsi', 'kategori', 'status', 'anggaran', 
        'realisasi', 'sumber_dana', 'lokasi', 'tanggal_mulai', 
        'tanggal_selesai', 'tanggal_target', 'progress', 
        'penanggung_jawab', 'kontraktor', 'gambar', 'keterangan', 'is_published'
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
        'tanggal_target' => 'date',
        'anggaran' => 'decimal:2',
        'realisasi' => 'decimal:2',
        'gambar' => 'array',
        'is_published' => 'boolean',
    ];

    public function getGambarUrlsAttribute()
    {
        if (!$this->gambar) {
            return [];
        }
        
        $urls = [];
        foreach ($this->gambar as $image) {
            if (Storage::disk('public')->exists('pembangunan/' . $image)) {
                $urls[] = asset('storage/pembangunan/' . $image);
            }
        }
        
        return $urls;
    }

    public function getMainImageUrlAttribute()
    {
        $urls = $this->gambar_urls;
        return $urls[0] ?? asset('images/placeholder-development.svg');
    }

    public function getProgressPercentageAttribute()
    {
        return min(100, max(0, $this->progress));
    }

    public function getStatusBadgeAttribute()
    {
        $badges = [
            'perencanaan' => 'bg-blue-100 text-blue-800',
            'proses' => 'bg-yellow-100 text-yellow-800',
            'selesai' => 'bg-green-100 text-green-800',
            'ditunda' => 'bg-red-100 text-red-800'
        ];
        
        return $badges[$this->status] ?? 'bg-gray-100 text-gray-800';
    }

    public function getStatusLabelAttribute()
    {
        $labels = [
            'perencanaan' => 'Perencanaan',
            'proses' => 'Dalam Proses',
            'selesai' => 'Selesai',
            'ditunda' => 'Ditunda'
        ];
        
        return $labels[$this->status] ?? 'Unknown';
    }

    public function getKategoriLabelAttribute()
    {
        $labels = [
            'infrastruktur' => 'Infrastruktur',
            'pendidikan' => 'Pendidikan',
            'kesehatan' => 'Kesehatan',
            'ekonomi' => 'Ekonomi',
            'sosial' => 'Sosial',
            'lingkungan' => 'Lingkungan',
            'lainnya' => 'Lainnya'
        ];
        
        return $labels[$this->kategori] ?? 'Unknown';
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    public function scopeByKategori($query, $kategori)
    {
        return $query->where('kategori', $kategori);
    }

    public static function getKategoriOptions()
    {
        return [
            'infrastruktur' => 'Infrastruktur',
            'pendidikan' => 'Pendidikan',
            'kesehatan' => 'Kesehatan',
            'ekonomi' => 'Ekonomi',
            'sosial' => 'Sosial',
            'lingkungan' => 'Lingkungan',
            'lainnya' => 'Lainnya'
        ];
    }

    public static function getStatusOptions()
    {
        return [
            'perencanaan' => 'Perencanaan',
            'proses' => 'Dalam Proses',
            'selesai' => 'Selesai',
            'ditunda' => 'Ditunda'
        ];
    }
}
