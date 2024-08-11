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
        Schema::create('Fasyankes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_users');
            $table->string('nama_fasyankes');
            $table->string('email_fasyankes');
            $table->string('nomor_fasyankes');
            $table->string('alamat_fasyankes');
            $table->string('No_NIP');
            $table->enum('Kategori_Fasyankes', ['RUMAH SAKIT', 'KLINIK', 'PUSKESMAS']);
            $table->enum('Status_Fasyankes', ['SWASTA', 'NEGERI']);
            $table->integer('rating')->default(0);
            $table->timestamp('Tanggal_bergabung')->nullable();
            $table->time('jam_buka')->nullable();
            $table->time('jam_tutup')->nullable();
            $table->string('barcode')->unique();
            $table->timestamps();
            $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade');
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
