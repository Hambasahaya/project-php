<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('matakuliahs', function (Blueprint $table) {
            $table->string('foto_matakuliah')->nullable()->after('nama_matakuliah');
        });
    }

    public function down(): void
    {
        Schema::table('matakuliahs', function (Blueprint $table) {
            $table->dropColumn('foto_matakuliah');
        });
    }
};
