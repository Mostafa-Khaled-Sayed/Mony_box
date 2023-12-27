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
        Schema::create('withdraw_or_deposit_money', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
              $table->foreignId('admin_id')->nullable()->references('id')->on('admins')->cascadeOnDelete();
            $table->foreignId('notification_id')->references('id')->on('notifications')->cascadeOnDelete();
            $table->double('withdraw_money')->nullable();
            $table->double('deposit_money')->nullable();
            $table->double('status')->default(1);
            $table->enum('status_mony',['0','1','2','3'])->default('0');
            // if add adress of wallet
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('withdraw_or_deposit_money');
    }
};
