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
        Schema::create('transfer_monies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mony_send');
            $table->foreignId('user_id')->references('id')->on('users')->comment('user that send Mony');
            $table->unsignedBigInteger('mony_resive');
            $table->unsignedBigInteger('mony_after_discount');
            $table->foreignId('resive_user_id')->references('id')->on('users')->comment('User That Resive Mony');
            $table->foreignId('notification_id')->references('id')->on('notifications')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfer_monies');
    }
};
