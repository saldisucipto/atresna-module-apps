<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('table_transaksi_permintaan_barang', function (Blueprint $table) {
            $table->id();
            $table->string('kode_permintaan_barang');
            $table->integer('nomer_transaksi');
            $table->unsignedBigInteger('id_inventory');
            $table->integer('quantity');
            $table->string('satuan', 50);
            $table->integer('kirim_do')->nullable();
            $table->integer('oder_po')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_transaksi_permintaan_barang');
    }
};
