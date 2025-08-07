<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('detail_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            $table->string('jurusan')->nullable();
            $table->string('fakultas')->nullable();
            $table->integer('semester')->nullable();
            $table->string('nuptk')->nullable()->unique();
            $table->text('alamat')->nullable();
            $table->string('no_hp', 20)->nullable();
            $table->string('foto', 35)->nullable();
            $table->enum('jenis_kelamin', ["Laki-laki", "perempuan"])->nullable();
            $table->string('pendidikan_terakhir', 25)->nullable();
            $table->timestamps();

            // Foreign Key
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_user');
    }
};
