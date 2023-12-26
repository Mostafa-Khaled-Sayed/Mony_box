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
        Schema::create('announcement_datanormal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('datanormale_id')->nullable()->references('id')->on('data')->onDelete('cascade');
            $table->foreignId('announcement_id')->nullable()->references('id')->on('announcements')->onDelete('cascade'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('announcement_datanormal');
    }
};
