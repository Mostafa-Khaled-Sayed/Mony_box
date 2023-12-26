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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('status', ['مفعل', 'غير مفعل'])->default('مفعل');;
            $table->text('roles_name');
            $table->string('email')->unique();
            //add into register
            $table->string('phone');
            $table->integer('daliy_counter_announce')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('code_invention')->unique();
            $table->foreignId('user_id')->nullable()->references('id')->on('users')->cascadeOnDelete();
            $table->string('password');
            $table->foreignId('datanormales_id')->nullable()->references('id')->on('datanormales')->cascadeOnDelete();
            $table->float('daily_gain')->default(0.0);
            $table->boolean('subscribed')->default(true);
            $table->double('score');
            // $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
