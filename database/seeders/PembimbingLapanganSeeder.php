<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class PembimbingLapanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pembimbing_lapangan = [
            [
                'nip' => 2000011111,
                'nama' => "Nurmantyo",
                'email' => "nurmantyo@gmail.com",
                'no_telepon' => "081284617829",
                'jabatan' => "IT Manager",
                'nama_perusahaan' => "PT. ABC",
                'alamat_perusahaan' => "Jl. Indah no. 1",
                'kota_perusahaan' => "Jakarta",
                'email_perusahaan' => "ptabc@mail.com",
                'no_telepon_perusahaan' => "716289",
                'password' => bcrypt('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nip' => 2000011112,
                'nama' => "Dadang",
                'email' => "dadang@gmail.com",
                'no_telepon' => "0817267182",
                'jabatan' => "IT Staff",
                'nama_perusahaan' => "PT. Tlkm",
                'alamat_perusahaan' => "Jl. Raya no. 1",
                'kota_perusahaan' => "Bandung",
                'email_perusahaan' => "ptjraya@mail.com",
                'no_telepon_perusahaan' => "718123",
                'password' => bcrypt('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nip' => 2000011113,
                'nama' => "Doni",
                'email' => "doni@gmail.com",
                'no_telepon' => "0817274362",
                'jabatan' => "IT Staff",
                'nama_perusahaan' => "PT. Haj",
                'alamat_perusahaan' => "Jl. Luar no. 1",
                'kota_perusahaan' => "Serang",
                'email_perusahaan' => "pthaj@mail.com",
                'no_telepon_perusahaan' => "817351",
                'password' => bcrypt('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nip' => 2000011114,
                'nama' => "Joni",
                'email' => "joni@gmail.com",
                'no_telepon' => "0892746151",
                'jabatan' => "Web Designer",
                'nama_perusahaan' => "PT. Joni",
                'alamat_perusahaan' => "Jl. Joni no. 1",
                'kota_perusahaan' => "Jogjakarta",
                'email_perusahaan' => "ptjoni@mail.com",
                'no_telepon_perusahaan' => "173541",
                'password' => bcrypt('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nip' => 2000011115,
                'nama' => "Udin",
                'email' => "udin@gmail.com",
                'no_telepon' => "0881725461",
                'jabatan' => "UI UX Designer",
                'nama_perusahaan' => "PT. Udin",
                'alamat_perusahaan' => "Jl. Udin no. 1",
                'kota_perusahaan' => "Surabaya",
                'email_perusahaan' => "ptudin@mail.com",
                'no_telepon_perusahaan' => "890173",
                'password' => bcrypt('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('pembimbing_lapangan')->insert($pembimbing_lapangan);

        $faker = Faker::create('id_ID');

        for ($i = 0; $i <= 50; $i++) {
            DB::table('pembimbing_lapangan')->insert([
                'nip' => $faker->unique()->numberBetween(2000011111, 2000111111),
                'nama' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'no_telepon' => $faker->phoneNumber,
                'jabatan' => $faker->jobTitle,
                'nama_perusahaan' => $faker->company,
                'alamat_perusahaan' => $faker->address,
                'kota_perusahaan' => $faker->city,
                'email_perusahaan' => $faker->companyEmail,
                'no_telepon_perusahaan' => $faker->phoneNumber,
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        };
    }
}
