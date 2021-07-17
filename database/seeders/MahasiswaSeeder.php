<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mahasiswa = [
            [
                'nim' => 1202170029,
                'nama' => "Rangga Sultan Tawakkal",
                'email' => "rangga.awantara@gmail.com",
                'tempat_lahir' => "Denpasar",
                'tanggal_lahir' => "1999-10-22",
                'no_telepon' => "089502551212",
                'alamat' => "Jl. Radio Palasari no. 15",
                'jenis_kelamin' => "Laki-laki",
                'id_kelas' => 1,
                'tahun_angkatan' => 2017,
                'image' => "rangga.jpg",
                'password' => bcrypt('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('mahasiswa')->insert($mahasiswa);
    }
}
