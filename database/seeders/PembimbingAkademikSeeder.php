<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'image' => "rangga.jpg",
                'password' => bcrypt('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('pembimbing_akademik')->insert($pembimbing_akademik);
    }
}
