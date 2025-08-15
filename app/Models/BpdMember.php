<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class BpdMember extends Model
{
    protected $fillable = [
        'name', 'position', 'phone', 'email', 'bio', 'photo'
    ];

    public function getPhotoUrlAttribute()
    {
        if ($this->photo && Storage::disk('public')->exists('bpd/members/' . $this->photo)) {
            return asset('storage/bpd/members/' . $this->photo);
        }
        
        return asset('images/default-avatar.svg');
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('name', 'asc');
    }

    public static function getPositionOptions()
    {
        return [
            'ketua' => 'Ketua',
            'wakil' => 'Wakil Ketua',
            'sekretaris' => 'Sekretaris',
            'bendahara' => 'Bendahara',
            'anggota' => 'Anggota'
        ];
    }
}
