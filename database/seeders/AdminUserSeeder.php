<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        DB::table('user_login')->insert([
            'username'   => 'admin',
            'nama_user'  => 'Admin Utama',
            'password'   => md5('password123'), 
            'akses'      => 'admin,arsip',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
