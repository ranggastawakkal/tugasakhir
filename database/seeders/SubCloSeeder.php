<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sub_clo = [
            [
                'deskripsi' => 'Kehadiran tepat waktu',
                'id_clo' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'deskripsi' => 'Kedisiplinan (kesesuaian dengan aturan)',
                'id_clo' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'deskripsi' => 'Komitmen terhadap tugas/pekerjaan',
                'id_clo' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'deskripsi' => 'Logbook - tugas (ada approval dari pembimbing lapangan per hari)',
                'id_clo' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'deskripsi' => 'Frekuensi bimbingan lapangan',
                'id_clo' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'deskripsi' => 'Kualitas presentasi',
                'id_clo' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'deskripsi' => 'Kualitas laporan KP',
                'id_clo' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'deskripsi' => 'Identifikasi dan formulasi masalah',
                'id_clo' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('sub_clo')->insert($sub_clo);
    }
}
