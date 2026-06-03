<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permohonan_tidak_mampu', function (Blueprint $table) {
            $table->id();

            // Data pemohon (orang tua/wali)
            $table->string('nama_lengkap');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('agama');
            $table->string('kewarganegaraan')->default('WNI');
            $table->enum('status_perkawinan', ['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati']);
            $table->string('pekerjaan');
            $table->text('alamat');

            // Data anak
            $table->string('anak_nama_lengkap');
            $table->enum('anak_jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('anak_tempat_lahir');
            $table->date('anak_tanggal_lahir');
            $table->string('anak_agama');
            $table->string('anak_kewarganegaraan')->default('WNI');
            $table->enum('anak_status_perkawinan', ['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati']);
            $table->string('anak_pekerjaan');
            $table->text('anak_alamat');

            // Keperluan surat
            $table->string('keperluan');

            // Status & token
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->string('token_download')->unique()->nullable();
            $table->text('catatan_admin')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('permohonan_tidak_mampu');
    }
};