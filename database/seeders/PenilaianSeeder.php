<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenilaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $penilaian = [
            [
                'id_mahasiswa' => 1,
                'id_pemb_akd' => 1,
                'komitmen' => 80,
                'log_activity' => 80,
                'bimbingan' => 80,
                'presentasi' => 80,
                'laporan' => 80,
                'formulasi_masalah' => 80,
                'nilai_pemb_akd' => 48,
                'nilai_pemb_lap' => 32,
                'nilai_total' => 32,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('penilaian')->insert($penilaian);
    }
}
