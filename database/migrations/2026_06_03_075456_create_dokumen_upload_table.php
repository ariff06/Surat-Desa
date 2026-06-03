<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dokumen_upload', function (Blueprint $table) {
            $table->id();
            $table->string('tipe_permohonan'); // 'tidak_mampu' atau 'kematian'
            $table->unsignedBigInteger('permohonan_id');
            $table->enum('jenis', ['ktp', 'kk']);
            $table->string('path_file');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dokumen_upload');
    }
};