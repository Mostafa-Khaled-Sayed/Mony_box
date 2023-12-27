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
        Schema::create('order_games', function (Blueprint $table) {
            $table->id();
            $table->string('player_id');
            $table->string('tax_rule')->default('0%');
            $table->string('game_name');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('price')->default('0');
            $table->string('total')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_games');
    }
};
