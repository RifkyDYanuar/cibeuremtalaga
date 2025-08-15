<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class BpdActivity extends Model
{
    protected $fillable = [
        'title', 'description', 'category', 'activity_date', 
        'image', 'location'
    ];

    protected $casts = [
        'activity_date' => 'date',
    ];

    public function getImageUrlAttribute()
    {
        if ($this->image && Storage::disk('public')->exists('bpd/activities/' . $this->image)) {
            return asset('storage/bpd/activities/' . $this->image);
        }
        
        return asset('images/placeholder-activity.svg');
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('activity_date', 'desc');
    }

    public static function getCategoryOptions()
    {
        return [
            'rapat' => 'Rapat Koordinasi',
            'musyawarah' => 'Musyawarah Desa',
            'aspirasi' => 'Penyerapan Aspirasi',
            'monitoring' => 'Monitoring & Evaluasi',
            'sosialisasi' => 'Sosialisasi',
            'lainnya' => 'Lainnya'
        ];
    }
}
