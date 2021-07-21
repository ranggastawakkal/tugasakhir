<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

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
                'nip' => 1001,
                'nama' => "Heri Prasetyo",
                'email' => "herip@gmail.com",
                'kode_dosen' => "HPT",
                'tempat_lahir' => "Bandung",
                'tanggal_lahir' => "1979-08-12",
                'no_telepon' => "089517289371",
                'alamat' => "Jl. Telekomunikasi no. 1",
                'jenis_kelamin' => "Laki-laki",
                'image' => "herip.jpg",
                'password' => bcrypt('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('pembimbing_akademik')->insert($pembimbing_akademik);

        $faker = Faker::create('id_ID');

        for ($i = 0; $i <= 100; $i++) {
            DB::table('pembimbing_akademik')->insert([
                'nip' => $faker->unique()->numberBetween(2000000001, 2111111111),
                'nama' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'kode_dosen' => Str::random(3),
                'tempat_lahir' => $faker->city,
                'tanggal_lahir' => $faker->dateTimeBetween('-22 years', '-18 years', null)->format('Y-m-d'),
                'no_telepon' => $faker->phoneNumber,
                'alamat' => $faker->address,
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'image' => null,
                'password' => '$2b$10$zi4/A4nayjuwORlMah.IQuGZpHLUtfiMdEOI.0UXS6ucL8VSbFVpe',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        };
    }
}
