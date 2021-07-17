<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'nip' => 2001,
                'nama' => "Nurmantyo",
                'email' => "nurmantyo@gmail.com",
                'no_telepon' => "081284617829",
                'perusahaan' => "PT. Telkom",
                'posisi' => "IT Manager",
                'image' => "rangga.jpg",
                'password' => bcrypt('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('pembimbing_lapangan')->insert($pembimbing_lapangan);
    }
}
