<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

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
                'id_kelas' => 1,
                'id_peminatan' => 5,
                'email' => "rangga.awantara@gmail.com",
                'no_telepon' => "089502551212",
                'alamat' => "Jl. Radio Palasari no. 15",
                'jenis_kelamin' => "Laki-laki",
                'tempat_lahir' => "Denpasar",
                'tanggal_lahir' => "1999-10-22",
                'password' => bcrypt('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nim' => 1202172054,
                'nama' => "Chrisheryanda Eka Saputra",
                'id_kelas' => 3,
                'id_peminatan' => 6,
                'email' => "chrisheryanda@gmail.com",
                'no_telepon' => "081562718291",
                'alamat' => "Jl. Sukabirus no. 1",
                'jenis_kelamin' => "Laki-laki",
                'tempat_lahir' => "Bengkulu",
                'tanggal_lahir' => "1999-10-19",
                'password' => bcrypt('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nim' => 1202174388,
                'nama' => "Candra Eka Laksana",
                'id_kelas' => 3,
                'id_peminatan' => 15,
                'email' => "candraekalaksana@gmail.com",
                'no_telepon' => "081728192712",
                'alamat' => "Jl. Sukapura no. 1",
                'jenis_kelamin' => "Laki-laki",
                'tempat_lahir' => "Cilacap",
                'tanggal_lahir' => "1999-08-30",
                'password' => bcrypt('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('mahasiswa')->insert($mahasiswa);

        $faker = Faker::create('id_ID');

        for ($i = 0; $i <= 50; $i++) {
            DB::table('mahasiswa')->insert([
                'nim' => $faker->unique()->numberBetween(1202170000, 1202189999),
                'nama' => $faker->name,
                'id_kelas' => $faker->numberBetween(1, 6),
                'id_peminatan' => $faker->numberBetween(1, 15),
                'email' => $faker->unique()->safeEmail,
                'no_telepon' => $faker->phoneNumber,
                'alamat' => $faker->address,
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'tempat_lahir' => $faker->city,
                'tanggal_lahir' => $faker->dateTimeBetween('-22 years', '-18 years', null)->format('Y-m-d'),
                'password' => '$2b$10$zi4/A4nayjuwORlMah.IQuGZpHLUtfiMdEOI.0UXS6ucL8VSbFVpe',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        };
    }
}
