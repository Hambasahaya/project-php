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
        Schema::create('pesanan', function (Blueprint $table) {
            $table->bigIncrements('id_pesanan');
            $table->integer("no_pesanan");
            $table->foreignId('id_cart')->constrained('carts')->references('id_cart');
            $table->string("notes");
            $table->date("tgl_pesanan");
            $table->enum("status_pesanan", ["diterima", "dibuat", "selesai"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
