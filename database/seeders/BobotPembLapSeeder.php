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
            // [
            //     'id_sub_clo' => 9,
            //     'bobot' => 5,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id_sub_clo' => 10,
            //     'bobot' => 5,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id_sub_clo' => 11,
            //     'bobot' => 5,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id_sub_clo' => 12,
            //     'bobot' => 5,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id_sub_clo' => 13,
            //     'bobot' => 5,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id_sub_clo' => 14,
            //     'bobot' => 5,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id_sub_clo' => 15,
            //     'bobot' => 5,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id_sub_clo' => 16,
            //     'bobot' => 5,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id_sub_clo' => 17,
            //     'bobot' => 5,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id_sub_clo' => 18,
            //     'bobot' => 5,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id_sub_clo' => 19,
            //     'bobot' => 5,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id_sub_clo' => 20,
            //     'bobot' => 5,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id_sub_clo' => 21,
            //     'bobot' => 5,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id_sub_clo' => 22,
            //     'bobot' => 5,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id_sub_clo' => 23,
            //     'bobot' => 5,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id_sub_clo' => 24,
            //     'bobot' => 5,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id_sub_clo' => 25,
            //     'bobot' => 5,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id_sub_clo' => 26,
            //     'bobot' => 5,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id_sub_clo' => 27,
            //     'bobot' => 5,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id_sub_clo' => 28,
            //     'bobot' => 5,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id_sub_clo' => 29,
            //     'bobot' => 5,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id_sub_clo' => 30,
            //     'bobot' => 5,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id_sub_clo' => 31,
            //     'bobot' => 5,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id_sub_clo' => 32,
            //     'bobot' => 5,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id_sub_clo' => 33,
            //     'bobot' => 5,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id_sub_clo' => 34,
            //     'bobot' => 5,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id_sub_clo' => 35,
            //     'bobot' => 5,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id_sub_clo' => 36,
            //     'bobot' => 5,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id_sub_clo' => 37,
            //     'bobot' => 5,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id_sub_clo' => 38,
            //     'bobot' => 5,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id_sub_clo' => 39,
            //     'bobot' => 5,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id_sub_clo' => 40,
            //     'bobot' => 5,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id_sub_clo' => 41,
            //     'bobot' => 5,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id_sub_clo' => 42,
            //     'bobot' => 5,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id_sub_clo' => 43,
            //     'bobot' => 5,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id_sub_clo' => 44,
            //     'bobot' => 5,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id_sub_clo' => 45,
            //     'bobot' => 5,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id_sub_clo' => 46,
            //     'bobot' => 5,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id_sub_clo' => 47,
            //     'bobot' => 5,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id_sub_clo' => 48,
            //     'bobot' => 5,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
        ];

        DB::table('bobot_pemb_lap')->insert($bobot_pemb_lap);
    }
}
