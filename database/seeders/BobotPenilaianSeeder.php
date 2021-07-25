<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BobotPenilaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bobot_penilaian = [
            [
                'id_clo' => 1,
                'pembimbing_akademik' => 15,
                'pembimbing_lapangan' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_clo' => 2,
                'pembimbing_akademik' => 5,
                'pembimbing_lapangan' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_clo' => 3,
                'pembimbing_akademik' => 15,
                'pembimbing_lapangan' => 35,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_clo' => 4,
                'pembimbing_akademik' => 5,
                'pembimbing_lapangan' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('bobot_penilaian')->insert($bobot_penilaian);
    }
}
