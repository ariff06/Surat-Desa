<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('permohonan_tidak_mampu', function (Blueprint $table) {
            $table->string('nomor_rt', 10)->nullable()->after('keperluan');
            $table->enum('rt_status', ['pending', 'approved', 'rejected'])->default('pending')->after('nomor_rt');
            $table->text('rt_catatan')->nullable()->after('rt_status');
        });

        Schema::table('permohonan_kematian', function (Blueprint $table) {
            $table->string('nomor_rt', 10)->nullable()->after('hubungan_pelapor');
            $table->enum('rt_status', ['pending', 'approved', 'rejected'])->default('pending')->after('nomor_rt');
            $table->text('rt_catatan')->nullable()->after('rt_status');
        });
    }

    public function down(): void
    {
        Schema::table('permohonan_tidak_mampu', function (Blueprint $table) {
            $table->dropColumn(['nomor_rt', 'rt_status', 'rt_catatan']);
        });

        Schema::table('permohonan_kematian', function (Blueprint $table) {
            $table->dropColumn(['nomor_rt', 'rt_status', 'rt_catatan']);
        });
    }
};