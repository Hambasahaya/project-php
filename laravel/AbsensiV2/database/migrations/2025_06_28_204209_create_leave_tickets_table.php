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
        Schema::create('leave_tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->enum('jenis_tickets', ['cuti', 'izin', 'sakit']);
            $table->date('start');
            $table->date('end');
            $table->text('alasan')->nullable();
            $table->enum('status', ['Waiting List', 'Approve', 'not approved'])->default('Waiting List');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave__tickets');
    }
};
