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
        Schema::create('detail_users', function (Blueprint $table) {
            $table->id();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('file_cv')->nullable();
            $table->string("alamat", 150);
            $table->date('tanggal_lahir');
            $table->string("tempat_lahir", 150);
            $table->enum("jenis_kelamin", ["Laki-Laki", "Perempuan"])->nullable();
            $table->string('tingkat_pendidikan')->nullable();
            $table->string('nama_instansi')->nullable();
            $table->string('notlp')->nullable();
            $table->string('visi')->nullable();
            $table->string('misi')->nullable();
            $table->string('link_maps')->nullable();
            $table->string('website')->nullable();
            $table->year('tahun_lulus')->nullable();
            $table->decimal('nilai_akhir', 5, 2)->nullable();
            $table->text('deskripsi_pribadi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_users');
    }
};
