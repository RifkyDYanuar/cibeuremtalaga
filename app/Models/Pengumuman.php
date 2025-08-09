<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;

    protected $table = 'pengumuman';

    protected $fillable = [
        'judul',
        'konten',
        'kategori',
        'prioritas',
        'gambar',
        'is_active',
        'is_featured',
        'tanggal_mulai',
        'tanggal_selesai',
        'created_by'
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
        'is_active' => 'boolean',
        'is_featured' => 'boolean'
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopePublished($query)
    {
        return $query->where('tanggal_mulai', '<=', now())
                    ->where(function($q) {
                        $q->whereNull('tanggal_selesai')
                          ->orWhere('tanggal_selesai', '>=', now());
                    });
    }

    public function scopeByKategori($query, $kategori)
    {
        return $query->where('kategori', $kategori);
    }

    public function scopeByPrioritas($query, $prioritas)
    {
        return $query->where('prioritas', $prioritas);
    }

    public function getKategoriLabelAttribute()
    {
        $labels = [
            'umum' => 'Umum',
            'penting' => 'Penting',
            'kegiatan' => 'Kegiatan',
            'pembangunan' => 'Pembangunan',
            'kesehatan' => 'Kesehatan',
            'pendidikan' => 'Pendidikan'
        ];
        return $labels[$this->kategori] ?? 'Umum';
    }

    public function getPrioritasLabelAttribute()
    {
        $labels = [
            'rendah' => 'Rendah',
            'sedang' => 'Sedang',
            'tinggi' => 'Tinggi'
        ];
        return $labels[$this->prioritas] ?? 'Rendah';
    }

    public function getPrioritasColorAttribute()
    {
        $colors = [
            'rendah' => 'success',
            'sedang' => 'warning',
            'tinggi' => 'danger'
        ];
        return $colors[$this->prioritas] ?? 'success';
    }
}
