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
        Schema::create('transaksi_permintaan_barang', function (Blueprint $table) {
            $table->string('kode_permintaan_barang', 10)->primary()->unique();
            $table->string('kode_project')->nullable();
            $table->unsignedBigInteger('id_kategori');
            $table->date('tanggal_pr');
            $table->date('delivery_date_pr');
            $table->date('approved_date_pr');
            $table->string('checked_by', 50);
            $table->string('approved_by', 50);
            $table->text('catatan');
            $table->timestamps();
            $table->foreign('kode_project')->references('kode_project')->on('projects')->onDelete('CASCADE');
            $table->foreign('id_kategori')->references('id')->on('kategori_transaksi_permintaan_barang')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_permintaan_barang');
    }
};
