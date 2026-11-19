
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pembayaran_service', function (Blueprint $table) {
            $table->id('id_pembayaran');

            $table->foreignId('id_servis_pelanggan')
                ->unique()
                ->constrained('daftar_service', 'id_servis_pelanggan')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->decimal('jumlah_biaya_servis', 12, 2);

            $table->enum('jenis_pembayaran', [
                'Cash / Tunai',
                'Non Tunai'
            ])->nullable();

            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembayaran_service');
    }
};

