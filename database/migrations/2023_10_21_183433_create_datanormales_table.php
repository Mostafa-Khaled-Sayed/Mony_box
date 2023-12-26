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
        Schema::create('datanormales', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('type')->default('Normal');
             $table->string('photo')->nullable();
            $table->text('desc');
            $table->float('starting_price');
            $table->float('final_price');
            $table->float('starting_income');
            $table->float('income');
            $table->float('final_income');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datanormales');
    }
};
