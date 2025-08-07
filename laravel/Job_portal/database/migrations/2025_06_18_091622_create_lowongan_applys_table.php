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
        Schema::create('lowongan_applys', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('perusahaan_id');
            $table->unsignedBigInteger('pelamar_id');
            $table->unsignedBigInteger('lowongan_id');
            $table->foreign('perusahaan_id')->references('user_id')->on('lowongans')->onDelete('cascade');
            $table->foreign('pelamar_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('lowongan_id')->references('id')->on('lowongans')->onDelete('cascade');
            $table->enum('status_lamaran', ['pending', 'diterima', 'ditolak'])->default('pending');
            $table->date('tanggal_melamar')->useCurrent();
            $table->string('file_cv')->nullable();
            $table->text('pelamar_deskripsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lowongan_applys');
    }
};
