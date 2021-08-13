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
            // [
            //     'deskripsi' => 'Kehadiran tepat waktu',
            //     'id_clo' => 5,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'deskripsi' => 'Kedisiplinan (kesesuaian dengan aturan)',
            //     'id_clo' => 5,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'deskripsi' => 'Komitmen terhadap tugas/pekerjaan',
            //     'id_clo' => 5,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'deskripsi' => 'Logbook - tugas (ada approval dari pembimbing lapangan per hari)',
            //     'id_clo' => 6,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'deskripsi' => 'Frekuensi bimbingan lapangan',
            //     'id_clo' => 7,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'deskripsi' => 'Kualitas presentasi',
            //     'id_clo' => 7,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'deskripsi' => 'Kualitas laporan KP',
            //     'id_clo' => 7,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'deskripsi' => 'Identifikasi dan formulasi masalah',
            //     'id_clo' => 8,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'deskripsi' => 'Kehadiran tepat waktu',
            //     'id_clo' => 9,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'deskripsi' => 'Kedisiplinan (kesesuaian dengan aturan)',
            //     'id_clo' => 9,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'deskripsi' => 'Komitmen terhadap tugas/pekerjaan',
            //     'id_clo' => 9,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'deskripsi' => 'Logbook - tugas (ada approval dari pembimbing lapangan per hari)',
            //     'id_clo' => 10,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'deskripsi' => 'Frekuensi bimbingan lapangan',
            //     'id_clo' => 11,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'deskripsi' => 'Kualitas presentasi',
            //     'id_clo' => 11,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'deskripsi' => 'Kualitas laporan KP',
            //     'id_clo' => 11,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'deskripsi' => 'Identifikasi dan formulasi masalah',
            //     'id_clo' => 12,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'deskripsi' => 'Kehadiran tepat waktu',
            //     'id_clo' => 13,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'deskripsi' => 'Kedisiplinan (kesesuaian dengan aturan)',
            //     'id_clo' => 13,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'deskripsi' => 'Komitmen terhadap tugas/pekerjaan',
            //     'id_clo' => 13,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'deskripsi' => 'Logbook - tugas (ada approval dari pembimbing lapangan per hari)',
            //     'id_clo' => 14,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'deskripsi' => 'Frekuensi bimbingan lapangan',
            //     'id_clo' => 15,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'deskripsi' => 'Kualitas presentasi',
            //     'id_clo' => 15,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'deskripsi' => 'Kualitas laporan KP',
            //     'id_clo' => 15,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'deskripsi' => 'Identifikasi dan formulasi masalah',
            //     'id_clo' => 16,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'deskripsi' => 'Kehadiran tepat waktu',
            //     'id_clo' => 17,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'deskripsi' => 'Kedisiplinan (kesesuaian dengan aturan)',
            //     'id_clo' => 17,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'deskripsi' => 'Komitmen terhadap tugas/pekerjaan',
            //     'id_clo' => 17,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'deskripsi' => 'Logbook - tugas (ada approval dari pembimbing lapangan per hari)',
            //     'id_clo' => 18,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'deskripsi' => 'Frekuensi bimbingan lapangan',
            //     'id_clo' => 19,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'deskripsi' => 'Kualitas presentasi',
            //     'id_clo' => 19,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'deskripsi' => 'Kualitas laporan KP',
            //     'id_clo' => 19,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'deskripsi' => 'Identifikasi dan formulasi masalah',
            //     'id_clo' => 20,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'deskripsi' => 'Kehadiran tepat waktu',
            //     'id_clo' => 21,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'deskripsi' => 'Kedisiplinan (kesesuaian dengan aturan)',
            //     'id_clo' => 21,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'deskripsi' => 'Komitmen terhadap tugas/pekerjaan',
            //     'id_clo' => 21,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'deskripsi' => 'Logbook - tugas (ada approval dari pembimbing lapangan per hari)',
            //     'id_clo' => 22,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'deskripsi' => 'Frekuensi bimbingan lapangan',
            //     'id_clo' => 23,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'deskripsi' => 'Kualitas presentasi',
            //     'id_clo' => 23,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'deskripsi' => 'Kualitas laporan KP',
            //     'id_clo' => 23,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'deskripsi' => 'Identifikasi dan formulasi masalah',
            //     'id_clo' => 24,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
        ];

        DB::table('sub_clo')->insert($sub_clo);
    }
}
