<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\RtUser;

class RtUserSeeder extends Seeder
{
    public function run(): void
    {
        // Generate 70 akun RT
        for ($i = 1; $i <= 70; $i++) {
            $nomorRt = str_pad($i, 3, '0', STR_PAD_LEFT);
            RtUser::create([
                'name'      => 'Ketua RT ' . $nomorRt,
                'nomor_rt'  => $nomorRt,
                'nomor_rw'  => str_pad(ceil($i / 10), 3, '0', STR_PAD_LEFT),
                'email'     => 'rt' . $nomorRt . '@bengle.desa.id',
                'password'  => Hash::make('rt' . $nomorRt . 'bengle'),
            ]);
        }
    }
}