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

            // Username wajib & unik
            $table->string('username')->unique();

            // Name opsional (bisa dipakai untuk tampilan)
            $table->string('name')->nullable();

            // Email opsional tapi kalau ada harus unik
            $table->string('email')->unique()->nullable();

            // Password wajib
            $table->string('password');

            // Token untuk "remember me"
            $table->rememberToken();

            // created_at & updated_at
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
