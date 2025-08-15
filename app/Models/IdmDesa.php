<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IdmDesa extends Model
{
    use HasFactory;

    protected $table = 'idm_desa';

    protected $fillable = [
        'tahun',
        'skor_idm',
        'status_idm',
        'skor_iks',
        'skor_ike',
        'skor_ikl',
        'dimensi_sosial',
        'dimensi_ekonomi',
        'dimensi_lingkungan',
        'target_tahun_depan',
        'deskripsi',
        'is_published'
    ];

    protected $casts = [
        'skor_idm' => 'decimal:3',
        'skor_iks' => 'decimal:3',
        'skor_ike' => 'decimal:3',
        'skor_ikl' => 'decimal:3',
        'dimensi_sosial' => 'decimal:3',
        'dimensi_ekonomi' => 'decimal:3',
        'dimensi_lingkungan' => 'decimal:3',
        'target_tahun_depan' => 'decimal:3',
        'is_published' => 'boolean'
    ];

    // Scopes
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeLatest($query)
    {
        return $query->orderBy('tahun', 'desc');
    }

    // Accessors
    public function getStatusColorAttribute()
    {
        $statusColors = [
            'Sangat Tertinggal' => 'bg-red-500',
            'Tertinggal' => 'bg-orange-500',
            'Berkembang' => 'bg-yellow-500',
            'Maju' => 'bg-blue-500',
            'Mandiri' => 'bg-green-500'
        ];

        return $statusColors[$this->status_idm] ?? 'bg-gray-500';
    }

    public function getStatusDescriptionAttribute()
    {
        $descriptions = [
            'Sangat Tertinggal' => 'Desa dengan tingkat perkembangan sangat rendah',
            'Tertinggal' => 'Desa dengan tingkat perkembangan rendah',
            'Berkembang' => 'Desa dengan tingkat perkembangan sedang',
            'Maju' => 'Desa dengan tingkat perkembangan tinggi',
            'Mandiri' => 'Desa dengan tingkat perkembangan sangat tinggi'
        ];

        return $descriptions[$this->status_idm] ?? 'Status tidak diketahui';
    }

    // Helper methods
    public static function getStatusOptions()
    {
        return [
            'Sangat Tertinggal' => 'Sangat Tertinggal',
            'Tertinggal' => 'Tertinggal',
            'Berkembang' => 'Berkembang',
            'Maju' => 'Maju',
            'Mandiri' => 'Mandiri'
        ];
    }

    public function getProgressPercentageAttribute()
    {
        // IDM maksimal adalah 1.000
        return ($this->skor_idm / 1.000) * 100;
    }

    public function getIksPercentageAttribute()
    {
        return ($this->skor_iks / 1.000) * 100;
    }

    public function getIkePercentageAttribute()
    {
        return ($this->skor_ike / 1.000) * 100;
    }

    public function getIklPercentageAttribute()
    {
        return ($this->skor_ikl / 1.000) * 100;
    }
}
