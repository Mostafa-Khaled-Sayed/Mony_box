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
        Schema::create('rchagesusers', function (Blueprint $table) {
            $table->id();
            $table->boolean('type');
            $table->enum('status', ['غير جاهزه', 'جاهزه', 'قيد الانتظار', 'الغاء'])->default('غير جاهزه');
            $table->string('message')->nullable();
            $table->foreignId('package_id')->nullable()->references('id')->on('packages')->cascadeOnDelete();
            $table->foreignId('package_price_id')->nullable()->references('id')->on('package_prices')->cascadeOnDelete();
            $table->foreignId('notification_id')->references('id')->on('notifications')->cascadeOnDelete();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rchagesusers');
    }
};
