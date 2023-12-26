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
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('file_name', 999);
            $table->string('Created_by', 999);
            $table->text('description')->nullable();
            $table->string('Status', 50);
            $table->unsignedBigInteger('days')->default(0);
            $table->unsignedBigInteger('value_Status')->default(0);
            $table->string('orderNumber');
            $table->float('orderTotal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('announcements');
    }
};
