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
        Schema::create('apoteker', function (Blueprint $table) {
            $table->id('id_apoteker');
            $table->unsignedBigInteger("id_user");
            $table->unsignedBigInteger("id_rumah_sakit");
            $table->string('alamat_lengkap');
            $table->string('no_SIPA');
            $table->string('Gol_darah');
            $table->string('nik')->unique();
            $table->integer('umur');
            $table->timestamps();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_rumah_sakit')->references('id')->on('Fasyankes')->onDelete('cascade');
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
