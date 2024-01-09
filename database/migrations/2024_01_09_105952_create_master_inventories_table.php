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
        Schema::create('master_inventories', function (Blueprint $table) {
            $table->id();
            $table->string('nama_inventories', 100);
            $table->text('deksripsi_inventories');
            $table->unsignedBigInteger('id_kat_inventories');
            $table->unsignedBigInteger('id_sat_inventories');
            $table->unsignedBigInteger('id_type_inventories');
            $table->string('part_number_inventories')->unique();
            $table->bigInteger('stok_awal_inventories')->default(0);
            $table->bigInteger('stok_awal_inventories')->default(0);
            $table->float('modal_inventories')->default(0);
            $table->float('last_cost_inventories')->default(0);
            $table->date('date_last_cost_inventories')->nullable();
            $table->string('image_inventories');
            $table->timestamps();


            // NOTE : RELATIONS
            $table->foreign('id_kat_inventories')->references('id')->on('master_kategori_inventories')->onDelete('CASCADE');
            $table->foreign('id_sat_inventories')->references('id')->on('master_satuan_inventories')->onDelete('CASCADE');
            $table->foreign('id_type_inventories')->references('id')->on('master_type_inventories')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_inventories');
    }
};
