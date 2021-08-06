<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KerjaPraktekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kp = [
            [
                'id_mahasiswa' => 2,
                'id_pemb_akd' => 2,
                'id_pemb_lap' => 2,
                'unit_kerja' => 'Web Design',
                'tanggal_mulai' => '2020-11-24',
                'tanggal_berakhir' => '2021-01-01',
                'target' => 'Mendesain web GIS sebaik mungkin',
                'program_kegiatan' => 'Mendesain web GIS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('kerja_praktek')->insert($kp);
    }
}