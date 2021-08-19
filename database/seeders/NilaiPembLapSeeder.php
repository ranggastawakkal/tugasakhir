<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NilaiPembLapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nilai_pemb_lap = [
            [
                'id_mahasiswa' => 1,
                'id_bobot' => 1,
                'nilai_angka' => 80,
                'nilai' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_mahasiswa' => 1,
                'id_bobot' => 2,
                'nilai_angka' => 75,
                'nilai' => 3.75,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_mahasiswa' => 1,
                'id_bobot' => 3,
                'nilai_angka' => 80,
                'nilai' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_mahasiswa' => 1,
                'id_bobot' => 4,
                'nilai_angka' => 75,
                'nilai' => 3.75,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_mahasiswa' => 1,
                'id_bobot' => 5,
                'nilai_angka' => 80,
                'nilai' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_mahasiswa' => 1,
                'id_bobot' => 6,
                'nilai_angka' => 75,
                'nilai' => 3.75,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_mahasiswa' => 1,
                'id_bobot' => 7,
                'nilai_angka' => 80,
                'nilai' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_mahasiswa' => 1,
                'id_bobot' => 8,
                'nilai_angka' => 75,
                'nilai' => 3.75,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('nilai_pemb_lap')->insert($nilai_pemb_lap);
    }
}
