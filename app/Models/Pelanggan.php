<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';

    protected $primaryKey = 'id_pelanggan';

    protected $fillable = [
        'nama_lengkap',
        'no_hp',
        'alamat_pelanggan',
        'pekerjaan'
    ];

    public function daftarService(): HasMany
    {
        return $this->hasMany(
            DaftarService::class,
            'id_pelanggan',
            'id_pelanggan'
        );
    }
}
