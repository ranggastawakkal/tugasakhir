<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plo = [
            [
                'kode_plo' => "PLO-1",
                'deskripsi' => "Ini adalah PLO 1",
                'id_periode' => 3,
                'id_prodi' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // [
            //     'kode_plo' => "PLO-1",
            //     'deskripsi' => "Ini adalah PLO 1 untuk prodi S1 Sistem Informasi GENAP 2020/2021",
            //     'id_periode' => 2,
            //     'id_prodi' => 1,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'kode_plo' => "PLO-2",
            //     'deskripsi' => "Ini adalah PLO 2 untuk prodi S1 Teknik Industri GANJIL 2020/2021",
            //     'id_periode' => 1,
            //     'id_prodi' => 2,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'kode_plo' => "PLO-2",
            //     'deskripsi' => "Ini adalah PLO 2 untuk prodi S1 Teknik Industri GENAP 2020/2021",
            //     'id_periode' => 2,
            //     'id_prodi' => 2,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'kode_plo' => "PLO-3",
            //     'deskripsi' => "Ini adalah PLO 3 untuk prodi S1 Teknik Logistik GANJIL 2020/2021",
            //     'id_periode' => 1,
            //     'id_prodi' => 3,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'kode_plo' => "PLO-3",
            //     'deskripsi' => "Ini adalah PLO 3 untuk prodi S1 Teknik Logistik GENAP 2020/2021",
            //     'id_periode' => 2,
            //     'id_prodi' => 3,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
        ];

        DB::table('plo')->insert($plo);
    }
}
