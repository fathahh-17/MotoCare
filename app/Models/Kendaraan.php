<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kendaraan extends Model
{
    protected $table = 'kendaraan';

    protected $fillable = [
        'no_plat',
        'jenis_kendaraan',
        'no_stnk',
        'tahun_pembuatan',
        'nama_pemilik',
        'warna_kendaraan'
    ];

    public function daftarService(): HasMany
    {
        return $this->hasMany(
            DaftarService::class,
            'no_plat',
            'no_plat'
        );
    }
}
