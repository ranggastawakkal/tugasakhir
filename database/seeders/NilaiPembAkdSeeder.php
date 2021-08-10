<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NilaiPembAkdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nilai_pemb_akd = [
            [
                'id_mahasiswa' => 1,
                'id_bobot' => 1,
                'nilai_angka' => 90,
                'nilai' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_mahasiswa' => 1,
                'id_bobot' => 2,
                'nilai_angka' => 80,
                'nilai' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_mahasiswa' => 1,
                'id_bobot' => 3,
                'nilai_angka' => 90,
                'nilai' => 4.5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_mahasiswa' => 1,
                'id_bobot' => 4,
                'nilai_angka' => 80,
                'nilai' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_mahasiswa' => 1,
                'id_bobot' => 5,
                'nilai_angka' => 90,
                'nilai' => 13.5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_mahasiswa' => 1,
                'id_bobot' => 6,
                'nilai_angka' => 80,
                'nilai' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('nilai_pemb_akd')->insert($nilai_pemb_akd);
    }
}
