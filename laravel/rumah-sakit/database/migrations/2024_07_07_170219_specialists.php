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
        Schema::create('spesialis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_rumah_sakit");
            $table->string('nama');
            $table->timestamps();
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
