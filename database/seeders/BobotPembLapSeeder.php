<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BobotPembLapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bobot_pemb_lap = [
            [
                'id_indikator' => 1,
                'bobot' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_indikator' => 2,
                'bobot' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_indikator' => 3,
                'bobot' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_indikator' => 4,
                'bobot' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_indikator' => 5,
                'bobot' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_indikator' => 6,
                'bobot' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_indikator' => 7,
                'bobot' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_indikator' => 8,
                'bobot' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('bobot_pemb_lap')->insert($bobot_pemb_lap);
    }
}
