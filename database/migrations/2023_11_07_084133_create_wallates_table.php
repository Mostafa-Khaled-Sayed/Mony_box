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
        Schema::create('wallates', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->string('password');
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->integer('phone')->unique();
            $table->unique(['user_id', 'address']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wallates');
    }
};
