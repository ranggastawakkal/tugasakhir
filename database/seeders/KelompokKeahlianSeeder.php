<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelompokKeahlianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kk = [
            [
                'nama_kk' => "Production and Manufacturing System",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kk' => "Engineering Management System",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kk' => "Enterprise and Industrial System",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kk' => "Cybernetics",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kk' => "-",
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('kelompok_keahlian')->insert($kk);
    }
}
