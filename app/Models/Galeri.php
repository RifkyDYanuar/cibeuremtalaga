<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'gambar',
        'kategori',
        'tanggal_foto',
        'lokasi',
        'fotografer',
        'is_featured',
        'urutan',
        'status',
        'created_by'
    ];

    protected $casts = [
        'tanggal_foto' => 'date',
        'is_featured' => 'boolean',
        'status' => 'boolean',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeByKategori($query, $kategori)
    {
        return $query->where('kategori', $kategori);
    }

    public function getFormattedTanggalFotoAttribute()
    {
        return $this->tanggal_foto ? $this->tanggal_foto->format('d F Y') : '-';
    }

    public static function getKategoriOptions()
    {
        return [
            'kegiatan' => 'Kegiatan Desa',
            'pembangunan' => 'Pembangunan',
            'acara' => 'Acara & Event',
            'fasilitas' => 'Fasilitas Desa',
            'lingkungan' => 'Lingkungan',
            'lainnya' => 'Lainnya'
        ];
    }
}
