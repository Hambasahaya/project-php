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
        Schema::create('Rekam_medis', function (Blueprint $table) {
            $table->id("id_rekammedis");
            $table->unsignedBigInteger('pasient');
            $table->unsignedBigInteger('fasyankes');
            $table->unsignedBigInteger('dokter');
            $table->text('diagnosa awal');
            $table->text('diagnosa akhir');
            $table->timestamps();
            $table->foreign('pasient')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('fasyankes')->references('id')->on('fasyankes')->onDelete('cascade');
            $table->foreign('dokter')->references('id')->on('dokter')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
