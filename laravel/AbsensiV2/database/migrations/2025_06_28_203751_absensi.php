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
        Schema::create('Abesensi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->date('tanggal_absen');
            $table->enum('status', ['hadir', 'izin', 'sakit', 'cuti', 'alpa'])->default('alpa');
            $table->time('jam_masuk')->nullable();
            $table->boolean('terlambat')->default(false);
            $table->time('jam_pulang')->nullable();
            $table->unique(['user_id', 'tanggal_absen']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Abesensi');
    }
};
