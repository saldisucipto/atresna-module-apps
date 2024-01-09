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
        Schema::create('master_suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('nama_supplier', 100);
            $table->text('alamat_supplier');
            $table->string('email_supplier', 50)->nullable();
            $table->string('phone_supplier', 13)->nullable();
            $table->string('fax_supplier', 13)->nullable();
            $table->string('nama_pic_supplier', 100)->nullable();
            $table->string('phone_pic_supplier', 13)->nullable();
            // NOTE : TAX
            $table->string('nama_supplier_tax', 100)->nullable();
            $table->text('alamat_supplier_tax')->nullable();
            $table->string('npwp_supplier_tax', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_suppliers');
    }
};
