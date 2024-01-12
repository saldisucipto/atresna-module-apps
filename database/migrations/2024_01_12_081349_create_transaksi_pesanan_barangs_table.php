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
        Schema::create('transaksi_pesanan_barang', function (Blueprint $table) {
            $table->string('kode_pesanan_barang', 10)->primary()->unique();
            $table->string('kode_permintaan_barang');
            $table->string('kode_project')->nullable();
            $table->string('referensi_supplier')->nullable();
            $table->unsignedBigInteger('id_supplier');
            $table->unsignedBigInteger('id_curency');
            $table->enum('tax', ['TAX', 'TAX IN', 'NON TAX']);
            $table->date('tanggal_po');
            $table->tinyInteger('jumlah_hari_hutang')->default(0);
            $table->date('tanggal_hutang');
            $table->float('kurs_pajak')->default(0);
            $table->float('kurs_gl')->default(0);
            $table->text('delivery_to')->nullable();
            $table->text('catatan')->nullable();
            $table->float('subtotal')->default(0);
            $table->float('discount')->default(0);
            $table->float('dpp')->default(0);
            $table->float('ppn')->default(0);
            $table->float('total')->default(0);
            $table->timestamps();

            $table->foreign('kode_permintaan_barang')->references('kode_permintaan_barang')->on('transaksi_permintaan_barang')->onDelete('CASCADE');
            $table->foreign('id_supplier')->references('id')->on('master_suppliers')->onDelete('CASCADE');
            $table->foreign('id_curency')->references('id')->on('master_valuta')->onDelete('CASCADE');
            $table->foreign('kode_project')->references('kode_project')->on('projects')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_pesanan_barang');
    }
};
