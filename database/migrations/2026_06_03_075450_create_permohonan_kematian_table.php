<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permohonan_kematian', function (Blueprint $table) {
            $table->id();

            // Data jenazah
            $table->string('nik_jenazah', 16);
            $table->string('nama_jenazah');
            $table->enum('jenis_kelamin_jenazah', ['Laki-laki', 'Perempuan']);
            $table->string('agama_jenazah');
            $table->integer('umur_jenazah');
            $table->string('pekerjaan_jenazah');
            $table->text('alamat_jenazah');

            // Data kematian
            $table->string('hari_meninggal');
            $table->date('tanggal_meninggal');
            $table->time('pukul_meninggal');
            $table->string('penyebab_kematian');

            // Data pelapor
            $table->string('nik_pelapor', 16);
            $table->string('nama_pelapor');
            $table->string('agama_pelapor');
            $table->string('pekerjaan_pelapor');
            $table->text('alamat_pelapor');
            $table->string('hubungan_pelapor');

            // Status & token
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->string('token_download')->unique()->nullable();
            $table->text('catatan_admin')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('permohonan_kematian');
    }
};