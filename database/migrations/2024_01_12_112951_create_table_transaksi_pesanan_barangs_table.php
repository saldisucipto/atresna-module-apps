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
        Schema::create('table_transaksi_pesanan_barang', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pesanan_barang');
            $table->unsignedBigInteger('id_inventory');
            $table->integer('nomer_transaksi');
            $table->integer('quantity');
            $table->string('satuan', 50);
            $table->float('price')->default(0);
            $table->float('discount')->default(0);
            $table->float('ammount')->default(0);
            $table->string('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('id_inventory')->references('id')->on('master_inventories')->onDelete('CASCADE');
            $table->foreign('kode_pesanan_barang')->references('kode_permintaan_barang')->on('transaksi_pesanan_barang')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_transaksi_pesanan_barang');
    }
};
