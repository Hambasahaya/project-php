<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->integer('nomor_Laporan');
            $table->foreignId('id_users')->constrained('users');
            $table->foreignId('kategori_laporan')->constrained('kategori_laporans');
            $table->date('tanggal_laporan');
            $table->date('tanggal_kejadian');
            $table->date('lokasi_kejadian');
            $table->boolean('saksi');
            $table->enum("statusLaporan", ["diterima", "dalam review", "diproses", "laporan selesai"])->default('diterima');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
