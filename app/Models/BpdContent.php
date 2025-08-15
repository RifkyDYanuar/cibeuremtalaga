<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BpdContent extends Model
{
    protected $table = 'bpd_content';
    
    protected $fillable = ['key', 'title', 'content', 'type'];

    public static function getValue($key, $default = null)
    {
        $content = self::where('key', $key)->first();
        return $content ? $content->content : $default;
    }

    public static function setValue($key, $content, $title = null, $type = 'text')
    {
        return self::updateOrCreate(
            ['key' => $key],
            [
                'title' => $title,
                'content' => $content,
                'type' => $type
            ]
        );
    }

    public static function getContentKeys()
    {
        return [
            'bpd_visi' => 'Visi BPD',
            'bpd_misi' => 'Misi BPD',
            'bpd_profil' => 'Profil Singkat BPD',
            'bpd_dasar_hukum' => 'Dasar Hukum',
            'bpd_contact_phone' => 'Telepon',
            'bpd_contact_email' => 'Email',
            'bpd_contact_address' => 'Alamat',
            'bpd_jam_pelayanan' => 'Jam Pelayanan'
        ];
    }
}
