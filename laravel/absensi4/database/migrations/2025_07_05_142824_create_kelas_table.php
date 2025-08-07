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
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kelas', 20)->unique();
            $table->foreignId('mata_kuliah')->constrained('matakuliahs')->onDelete('cascade')->onUpdate('cascade');
            $table->string('ruangan', 10);
            $table->date('jam_mulai');
            $table->date('jam_selesai');
            $table->string('hari');
            $table->string('qrcode');
            $table->foreignId('dosen_pengampu')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('mahasiswa')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};
