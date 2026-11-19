<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DataService extends Model
{
    protected $table = 'data_service';

    protected $primaryKey = 'id_data_service';

    protected $fillable = [
        'id_servis_pelanggan',
        'estimasi_service',
        'nama_mekanik',
        'sparepart_pengganti'
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
