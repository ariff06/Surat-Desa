<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DokummenUpload extends Model
{
    protected $table = 'dokumen_upload';

    protected $fillabel = [
        'permohonan_id',
        'jenuh',
        'path_file',
    ];

    public function permohonan(){
        return $this->belongsTo(Permohonan::class, 'permohonan_id');
    }
}
