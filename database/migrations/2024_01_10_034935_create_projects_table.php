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
        Schema::create('projects', function (Blueprint $table) {
            $table->string('kode_project', 10)->primary()->unique();
            $table->string('keterangan_project');
            $table->date('tanggal_project');
            $table->unsignedBigInteger('id_customer');
            $table->float('ammount_project')->default(0);
            $table->timestamps();

            $table->foreign('id_customer')->references('id')->on('master_customers')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
