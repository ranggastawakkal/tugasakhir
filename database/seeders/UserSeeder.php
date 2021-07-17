<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => "Admin 1",
                'level' => "Admin",
                'email' => "admin@gmail.com",
                'password' => bcrypt('password'),
                'remember_token' => Str::random(60),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => "Mahasiswa 1",
                'level' => "Mahasiswa",
                'email' => "mahasiswa@gmail.com",
                'password' => bcrypt('password'),
                'remember_token' => Str::random(60),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('users')->insert($users);
    }
}
