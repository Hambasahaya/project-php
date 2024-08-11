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
        Schema::create(
            'detail_pasien',
            function (Blueprint $table) {
                $table->unsignedBigInteger("id_user");
                $table->string('alamat_lengkap');
                $table->string('Gol_darah');
                $table->integer('umur');
                $table->enum("asuransi", ["YES", "NO"])->default("NO");
                $table->bigInteger("id_asuransi");
                $table->string("no_asuransi")->nullable();
                $table->timestamps();
                $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            }
        );
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
