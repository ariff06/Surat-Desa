<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{
    protected $table = 'permohonan';

    protected $fillable = [
        'nama_lengkap',
        'nik',
        'no_kk',
        'jenis_surat',
        'status',
        'token_download',
        'catatan_admin',
    ];

    public function dokumen(){
        return $this->hasMany(DokumenUpload::class, 'permohonan_id');
    }
}
