<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->bigIncrements('id_cart');
            $table->enum("status_pesanan", ['cart', 'proses']);
            $table->integer('qty');
            $table->foreignId('id_product')->constrained('products')->references('id_product');
            $table->foreignId('id_user')->constrained('users')->references('id_user');
            $table->integer('sub_total');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
