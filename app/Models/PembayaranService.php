<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PembayaranService extends Model
{
    protected $table = 'pembayaran_service';

    protected $primaryKey = 'id_pembayaran';

    protected $fillable = [
        'id_servis_pelanggan',
        'jumlah_biaya_servis',
        'jenis_pembayaran',
        'keterangan'
    ];

    public function daftarService(): BelongsTo
    {
        return $this->belongsTo(
            DaftarService::class,
            'id_servis_pelanggan',
            'id_servis_pelanggan'
        );
    }
}
