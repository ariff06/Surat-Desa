<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('permohonan_tidak_mampu', function (Blueprint $table) {
            $table->timestamp('downloaded_at')->nullable()->after('catatan_admin');
        });

        Schema::table('permohonan_kematian', function (Blueprint $table) {
            $table->timestamp('downloaded_at')->nullable()->after('catatan_admin');
        });
    }

    public function down(): void
    {
        Schema::table('permohonan_tidak_mampu', function (Blueprint $table) {
            $table->dropColumn('downloaded_at');
        });

        Schema::table('permohonan_kematian', function (Blueprint $table) {
            $table->dropColumn('downloaded_at');
        });
    }
};