
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('data_service', function (Blueprint $table) {
            $table->id('id_data_service');

            $table->foreignId('id_servis_pelanggan')
                ->unique()
                ->constrained('daftar_service', 'id_servis_pelanggan')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->decimal('estimasi_service', 12, 2);
            $table->string('nama_mekanik');
            $table->text('sparepart_pengganti')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('data_service');
    }
};
