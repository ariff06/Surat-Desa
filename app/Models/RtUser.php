<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class RtUser extends Authenticatable
{
    protected $table = 'rt_users';

    protected $fillable = [
        'name',
        'nomor_rt',
        'nomor_rw',
        'email',
        'password',
        'is_active',
    ];

    protected $hidden = [
        'password',
    ];
}