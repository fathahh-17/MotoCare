<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DaftarService extends Model
{
    protected $table = 'daftar_service';

    protected $primaryKey = 'id_servis_pelanggan';

    protected $fillable = [
        'no_plat',
        'id_pelanggan',
        'keluhan_kendaraan',
        'tanggal_servis'
    ];

    public function pelanggan(): BelongsTo
    {
        return $this->belongsTo(
            Pelanggan::class,
            'id_pelanggan',
            'id_pelanggan'
        );
    }

    public function kendaraan(): BelongsTo
    {
        return $this->belongsTo(
            Kendaraan::class,
            'no_plat',
            'no_plat'
        );
    }

    public function dataService(): HasOne
    {
        return $this->hasOne(
            DataService::class,
            'id_servis_pelanggan',
            'id_servis_pelanggan'
        );
    }

    public function pembayaran(): HasOne
    {
        return $this->hasOne(
            PembayaranService::class,
            'id_servis_pelanggan',
            'id_servis_pelanggan'
        );
    }
}
