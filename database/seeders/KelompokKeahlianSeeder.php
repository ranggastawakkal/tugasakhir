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
            ],
            [
                'nama_kk' => "Engineering Management System",
            ],
            [
                'nama_kk' => "Enterprise and Industrial System",
            ],
            [
                'nama_kk' => "Cybernetics",
            ],
        ];

        DB::table('kelompok_keahlian')->insert($kk);
    }
}
