<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('katgori_laporans', function (Blueprint $table) {
            $table->id();
            $table->string("kategori_laporan");
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('katgori_laporans');
    }
};
