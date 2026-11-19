
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('daftar_service', function (Blueprint $table) {
            $table->id('id_servis_pelanggan');

            $table->string('no_plat');

            $table->foreignId('id_pelanggan')
                ->constrained('pelanggan', 'id_pelanggan')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->text('keluhan_kendaraan');
            $table->date('tanggal_servis');
            $table->timestamps();

            $table->foreign('no_plat')
                ->references('no_plat')
                ->on('kendaraan')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('daftar_service');
    }
};
