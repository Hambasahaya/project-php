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
        Schema::create('dokter', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_fasyankes');
            $table->string('alamat_lengkap');
            $table->string('no_SIP');
            $table->string('Gol_darah');
            $table->string('nik')->unique();
            $table->integer('umur');
            $table->unsignedBigInteger('id_spesialis');
            $table->timestamps();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_fasyankes')->references('id')->on('Fasyankes')->onDelete('cascade');
            $table->foreign('id_spesialis')->references('id')->on('spesialis')->onDelete('cascade');
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
