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
        Schema::create('absens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            $table->date('tanggal');
            $table->enum('status', ['hadir', 'izin', 'sakit', 'cuti', 'alpa'])->default('alpa');

            $table->time('jam_masuk')->nullable();
            $table->string('foto_masuk')->nullable();
            $table->decimal('lat_masuk', 10, 6)->nullable();
            $table->decimal('lon_masuk', 10, 6)->nullable();
            $table->boolean('terlambat')->default(false);
            $table->time('jam_pulang')->nullable();
            $table->string('foto_pulang')->nullable();
            $table->decimal('lat_pulang', 10, 6)->nullable();
            $table->decimal('lon_pulang', 10, 6)->nullable();
            $table->timestamps();
            $table->unique(['user_id', 'tanggal']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('absens');
    }
};
