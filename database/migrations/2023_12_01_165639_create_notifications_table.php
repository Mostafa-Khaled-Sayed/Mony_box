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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
             $table->foreignId('user_id')->nullable()->references('id')->on('users')->cascadeOnDelete();
            $table->foreignId('admin_id')->nullable()->references('id')->on('admins')->cascadeOnDelete();
            $table->boolean('read')->default(0);
            $table->enum('type', ['register', 'send', 'withdrow', 'convert', 'another' , 'updatUser'])->default('another');
            $table->enum('status', ['جاهزه','غير جاهزه', 'قيد الانتظار' ]);
            $table->text('message')->default('..');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
