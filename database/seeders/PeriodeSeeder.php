<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeriodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $periode = [
            [
                'semester' => "GANJIL",
                'tahun_ajaran' => "2020/2021",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'semester' => "GENAP",
                'tahun_ajaran' => "2020/2021",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'semester' => "-",
                'tahun_ajaran' => "-",
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('periode')->insert($periode);
    }
}
