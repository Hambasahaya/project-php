<?php

use App\Models\User;
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
        Schema::create('users_details', function (Blueprint $table) {
            $table->integer("user_id");
            $table->string("NIK")->unique();
            $table->string("Posisi");
            $table->enum("Direktorat", ["CONTENT", "IT", "PRODUCT", "FINANCE", "CORPORATE SERVICES", "BUSINESS"]);
            $table->string("No_WhatsApp");
            $table->timestamps();
            $table->foreign('user_id')->references('id_user')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users__details');
    }
};
