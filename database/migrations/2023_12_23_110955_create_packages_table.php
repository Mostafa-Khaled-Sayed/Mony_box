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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('photo');
            $table->string('identifiedcharge');
            $table->string('status');
            $table->double('price');
            $table->string('valite');
            $table->string('samplercharge');
            $table->text('description');
            $table->text('type');
            $table->text('name');
            $table->foreignId('company_incountrie_id')->references('id')->on('company_incountries')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
