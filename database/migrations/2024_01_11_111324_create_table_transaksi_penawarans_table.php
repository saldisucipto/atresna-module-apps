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
        Schema::create('table_transaksi_penawaran', function (Blueprint $table) {
            $table->id();
            $table->string('kode_penawaran')->unsigned();
            $table->integer('nomer_transaksi');
            $table->string('title_transaksi');
            $table->text('description')->nullable();
            $table->integer('quantity');
            $table->string('satuan', 50);
            $table->float('cost')->default(0);
            $table->float('up')->default(0);
            $table->float('price')->default(0);
            $table->float('discount')->default(0);
            $table->float('ammount')->default(0);
            $table->string('supplier_ref')->nullable();
            $table->timestamps();

            $table->foreign('kode_penawaran')->references('kode_penawaran')->on('transaksi_penawaran')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_transaksi_penawaran');
    }
};
