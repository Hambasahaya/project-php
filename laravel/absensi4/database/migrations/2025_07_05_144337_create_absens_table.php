<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('absens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('kelas_id')->constrained('kelas')->onDelete('cascade');
            $table->date('tanggal_absen');
            $table->time('waktu_masuk')->nullable();
            $table->time('waktu_keluar')->nullable();
            $table->string('keterangan')->default('masuk');
            $table->boolean('status')->default(true);
            $table->boolean('terlambat')->default(true);
            $table->unique(['user_id', 'tanggal_absen']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('absens');
    }
};
