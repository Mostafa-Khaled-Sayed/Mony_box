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
        Schema::create('offer_games', function (Blueprint $table) {
            $table->id();
            $table->foreignId('game_id')->constrained()->onDelete('cascade');
            $table->enum('status', ['0', '1'])->default(0);
            $table->string('category_name');
            $table->string('price')->default('0');
            $table->string('image');
            $table->string('background_image');
            $table->text('description');
            $table->string('game_code');
            $table->string('unified_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offer_games');
    }
};
