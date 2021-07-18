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
            [
                'nim' => 1202172054,
                'nama' => "Chrisheryanda Eka Saputra",
                'email' => "chrisheryanda@gmail.com",
                'tempat_lahir' => "Bengkulu",
                'tanggal_lahir' => "1999-10-19",
                'no_telepon' => "081562718291",
                'alamat' => "Jl. Sukabirus no. 1",
                'jenis_kelamin' => "Laki-laki",
                'id_kelas' => 1,
                'tahun_angkatan' => 2017,
                'image' => "chrisheryanda.jpg",
                'password' => bcrypt('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nim' => 1202174388,
                'nama' => "Candra Eka Laksana",
                'email' => "candraekalaksana@gmail.com",
                'tempat_lahir' => "Cilacap",
                'tanggal_lahir' => "1999-08-30",
                'no_telepon' => "081728192712",
                'alamat' => "Jl. Sukapura no. 1",
                'jenis_kelamin' => "Laki-laki",
                'id_kelas' => 1,
                'tahun_angkatan' => 2017,
                'image' => "candra.jpg",
                'password' => bcrypt('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('mahasiswa')->insert($mahasiswa);
    }
}
