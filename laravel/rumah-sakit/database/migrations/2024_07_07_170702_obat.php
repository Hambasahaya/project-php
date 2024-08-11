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
        Schema::create('obat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_rumah_sakit');
            $table->string('Nama_obat');
            $table->string('dosis_obat');
            $table->string('jenis_obat');
            $table->date('exp_obat');
            $table->date('dibuat_obat');
            $table->integer('stock_obat');
            $table->float('harga_beli_obat');
            $table->float('harga_obat');
            $table->timestamps();
            $table->foreign('id_rumah_sakit')->references('id')->on('Fasyankes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
