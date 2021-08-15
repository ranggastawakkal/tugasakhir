<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class PembimbingAkademikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pembimbing_akademik = [
            [
                'nip' => 2000000001,
                'nama' => "Heri Prasetyo",
                'kode_dosen' => "HPT",
                'email' => "herip@example.net",
                'no_telepon' => "089517289371",
                'alamat' => "Jl. Telekomunikasi no. 1",
                'jenis_kelamin' => "Laki-laki",
                'tempat_lahir' => "Bandung",
                'tanggal_lahir' => "1979-08-12",
                'password' => bcrypt('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nip' => 2000000002,
                'nama' => "Samsul",
                'kode_dosen' => "SMS",
                'email' => "samsul@example.net",
                'no_telepon' => "0817364920",
                'alamat' => "Jl. Bunga no. 1",
                'jenis_kelamin' => "Laki-laki",
                'tempat_lahir' => "Surabaya",
                'tanggal_lahir' => "1971-09-24",
                'password' => bcrypt('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nip' => 2000000003,
                'nama' => "Endah",
                'kode_dosen' => "EDH",
                'email' => "endah@example.net",
                'no_telepon' => "0881726489",
                'alamat' => "Jl. Melati no. 1",
                'jenis_kelamin' => "Perempuan",
                'tempat_lahir' => "Serang",
                'tanggal_lahir' => "1983-11-22",
                'password' => bcrypt('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nip' => 2000000004,
                'nama' => "Siti",
                'kode_dosen' => "STI",
                'email' => "siti@example.net",
                'no_telepon' => "0818276351",
                'alamat' => "Jl. Semangka no. 1",
                'jenis_kelamin' => "Perempuan",
                'tempat_lahir' => "Banyuwangi",
                'tanggal_lahir' => "1983-09-25",
                'password' => bcrypt('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nip' => 2000000005,
                'nama' => "Jumari",
                'kode_dosen' => "JMR",
                'email' => "jumari@example.net",
                'no_telepon' => "0818273819",
                'alamat' => "Jl. Nanas no. 1",
                'jenis_kelamin' => "Laki-laki",
                'tempat_lahir' => "Malang",
                'tanggal_lahir' => "1973-07-19",
                'password' => bcrypt('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('pembimbing_akademik')->insert($pembimbing_akademik);

        $faker = Faker::create('id_ID');

        for ($i = 0; $i <= 50; $i++) {
            DB::table('pembimbing_akademik')->insert([
                'nip' => $faker->unique()->numberBetween(2000000006, 2000001111),
                'nama' => $faker->name,
                'kode_dosen' => Str::random(3),
                'email' => $faker->unique()->safeEmail,
                'no_telepon' => $faker->phoneNumber,
                'alamat' => $faker->address,
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'tempat_lahir' => $faker->city,
                'tanggal_lahir' => $faker->dateTimeBetween('-50 years', '-35 years', null)->format('Y-m-d'),
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        };
    }
}
