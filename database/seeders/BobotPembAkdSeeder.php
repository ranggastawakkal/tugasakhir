<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BobotPembAkdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bobot_pemb_akd = [
            [
                'id_sub_clo' => 3,
                'bobot' => 10,
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
                'bobot' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_sub_clo' => 7,
                'bobot' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_sub_clo' => 8,
                'bobot' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // [
            //     'id_sub_clo' => 11,
            //     'bobot' => 10,
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
            //     'bobot' => 15,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id_sub_clo' => 15,
            //     'bobot' => 15,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id_sub_clo' => 16,
            //     'bobot' => 10,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id_sub_clo' => 19,
            //     'bobot' => 10,
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
            //     'bobot' => 15,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id_sub_clo' => 23,
            //     'bobot' => 15,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id_sub_clo' => 24,
            //     'bobot' => 10,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id_sub_clo' => 27,
            //     'bobot' => 10,
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
            //     'bobot' => 15,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id_sub_clo' => 31,
            //     'bobot' => 15,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id_sub_clo' => 32,
            //     'bobot' => 10,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id_sub_clo' => 35,
            //     'bobot' => 10,
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
            //     'bobot' => 15,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id_sub_clo' => 39,
            //     'bobot' => 15,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id_sub_clo' => 40,
            //     'bobot' => 10,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id_sub_clo' => 43,
            //     'bobot' => 10,
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
            //     'bobot' => 15,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id_sub_clo' => 47,
            //     'bobot' => 15,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id_sub_clo' => 48,
            //     'bobot' => 10,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
        ];

        DB::table('bobot_pemb_akd')->insert($bobot_pemb_akd);
    }
}
