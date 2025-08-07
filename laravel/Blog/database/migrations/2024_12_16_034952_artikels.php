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
        Schema::create('Artikels', function (Blueprint $table) {
            $table->id();
            $table->string('title_artikel');
            $table->string('img_artikel');
            $table->foreignId('id_category')->constrained('Category_artikel')->onDelete('cascade');
            $table->text('body_artikel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Artikels');
    }
};
