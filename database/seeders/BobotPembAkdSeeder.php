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
        ];

        DB::table('bobot_pemb_akd')->insert($bobot_pemb_akd);
    }
}
