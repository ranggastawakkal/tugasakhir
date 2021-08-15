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
                'id_sub_clo' => 1,
                'bobot' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_sub_clo' => 2,
                'bobot' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_sub_clo' => 3,
                'bobot' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_sub_clo' => 4,
                'bobot' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_sub_clo' => 5,
                'bobot' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_sub_clo' => 6,
                'bobot' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_sub_clo' => 7,
                'bobot' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_sub_clo' => 8,
                'bobot' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('bobot_pemb_lap')->insert($bobot_pemb_lap);
    }
}
