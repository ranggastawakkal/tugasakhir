<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenilaianPembimbingLapanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $penilaian_pembimbing_lapangan = [
            [
                'id_mahasiswa' => 1,
                'id_pemb_lap' => 1,
                'kehadiran' => 80,
                'kedisiplinan' => 80,
                'komitmen' => 80,
                'log_activity' => 80,
                'bimbingan' => 80,
                'presentasi' => 80,
                'laporan' => 80,
                'formulasi_masalah' => 80,
                'total' => 32,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('penilaian_pembimbing_lapangan')->insert($penilaian_pembimbing_lapangan);
    }
}
