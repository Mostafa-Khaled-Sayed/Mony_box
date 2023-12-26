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
        Schema::create('package_prices', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('company');
            $table->boolean('status');
            $table->string('imagebackground');
            $table->string('image');
            $table->string('simble_reacherage');
            $table->string('identified_code');
            $table->string('validate');
            $table->double('price');
            $table->string('description');
            $table->foreignId('company_incountrie_id')->references('id')->on('company_incountries')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_prices');
    }
};
