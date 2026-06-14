<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rt_users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nomor_rt', 10)->unique();
            $table->string('nomor_rw', 10);
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rt_users');
    }
};