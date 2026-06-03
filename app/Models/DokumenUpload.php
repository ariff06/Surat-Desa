<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DokumenUpload extends Model
{
    protected $table = 'dokumen_upload';

    protected $fillable = [
        'tipe_permohonan',
        'permohonan_id',
        'jenis',
        'path_file',
    ];

    public function permohonanTidakMampu()
    {
        return $this->belongsTo(PermohonanTidakMampu::class, 'permohonan_id');
    }

    public function permohonanKematian()
    {
        return $this->belongsTo(PermohonanKematian::class, 'permohonan_id');
    }
}