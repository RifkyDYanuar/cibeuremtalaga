<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Penduduk extends Model
{
    use HasFactory;
    
    protected $table = 'data_kependudukan';

    protected $fillable = [
        'nik',
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'rt',
        'rw',
        'agama',
        'status_perkawinan',
        'pekerjaan',
        'pendidikan',
        'status_dalam_keluarga',
        'nama_ayah',
        'nama_ibu',
        'kewarganegaraan',
        'no_kk',
        'status',
        'keterangan'
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    // Accessor untuk menghitung usia
    public function getUsiaAttribute()
    {
        return Carbon::parse($this->tanggal_lahir)->age;
    }

    // Accessor untuk kelompok usia
    public function getKelompokUsiaAttribute()
    {
        $usia = $this->usia;
        
        if ($usia <= 10) return '0-10 tahun';
        if ($usia <= 20) return '11-20 tahun';
        if ($usia <= 30) return '21-30 tahun';
        if ($usia <= 40) return '31-40 tahun';
        if ($usia <= 50) return '41-50 tahun';
        if ($usia <= 60) return '51-60 tahun';
        return '60+ tahun';
    }

    // Scope untuk data aktif
    public function scopeAktif($query)
    {
        return $query->where('status', 'aktif');
    }

    // Scope untuk kepala keluarga
    public function scopeKepalaKeluarga($query)
    {
        return $query->where('status_dalam_keluarga', 'Kepala Keluarga');
    }
}
