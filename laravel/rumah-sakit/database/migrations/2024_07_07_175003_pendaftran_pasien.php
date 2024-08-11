<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pendaftaran_pasien', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_fasyankes');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_spesialis');
            $table->text('keluhan');
            $table->integer('nomor_antrian');
            $table->enum('status', ['dalam_antrian', 'selesai']);
            $table->timestamps();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_fasyankes')->references('id')->on('Fasyankes')->onDelete('cascade');
            $table->foreign('id_spesialis')->references('id')->on('spesialis')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_pasien');
    }
};
