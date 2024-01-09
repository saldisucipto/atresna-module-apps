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
        Schema::create('master_customers', function (Blueprint $table) {
            $table->id();
            $table->string('nama_customer', 100);
            $table->text('alamat_customer');
            $table->string('email_customer', 50)->nullable();
            $table->string('phone_customer', 13)->nullable();
            $table->string('fax_customer', 13)->nullable();
            $table->string('nama_pic_customer', 100)->nullable();
            $table->string('phone_pic_customer', 13)->nullable();
            // NOTE : TAX
            $table->string('nama_customer_tax', 100)->nullable();
            $table->text('alamat_customer_tax')->nullable();
            $table->string('npwp_customer_tax', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_customers');
    }
};
