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
        Schema::create('lowongans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('judul_lowongan');
            $table->json('kategori_lowongan');
            $table->text('deskripsi_lowongan');
            $table->text('kualifikasi');
            $table->text('lokasi');
            $table->integer('gaji_minimum');
            $table->integer('gaji_maximum');
            $table->enum('tipe_pekerjaan', ['fulltime', 'parttime', 'remote', 'freelance']);
            $table->enum('status_lowongan', ['aktif', 'nonaktif'])->default('aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lowongans');
    }
};
