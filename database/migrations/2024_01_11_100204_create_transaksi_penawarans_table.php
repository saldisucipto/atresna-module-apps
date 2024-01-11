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
        Schema::create('transaksi_penawaran', function (Blueprint $table) {
            $table->string('kode_penawaran', 10)->primary()->unique();
            $table->text('judul_penawarn');
            $table->date('tanggal_penawaran');
            $table->date('tanggal_penawaran_disetujui')->nullable();
            $table->enum('tax', ['TAX', 'TAX IN', 'NON TAX']);
            $table->string('tujuan_penawaran', 75);
            $table->string('cp_tujuan_penawaran', 75);
            $table->string('email_tujuan_penawaran', 75)->nullable();
            $table->string('phone_tujuan_penawaran', 75)->nullable();
            $table->text('alamat_tujuan_penawaran', 75)->nullable();
            $table->unsignedBigInteger('id_sales');
            $table->string('top')->nullable();
            $table->string('delivery_day')->nullable();
            $table->string('validity_day')->nullable();
            $table->float('subtotal')->default(0);
            $table->float('discount')->default(0);
            $table->float('dpp')->default(0);
            $table->float('ppn')->default(0);
            $table->float('total')->default(0);
            $table->timestamps();


            $table->foreign('id_sales')->references('id')->on('sales')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_penawaran');
    }
};
