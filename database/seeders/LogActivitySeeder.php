<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LogActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $log_activity = [
            [
                'id_mahasiswa' => 1,
                'id_pemb_akd' => 1,
                'id_pemb_lap' => 1,
                'tanggal' => "2020-01-02",
                'jam_datang' => "09:00",
                'jam_pulang' => "17:00",
                'aktivitas' => "belajar design web",
                'evaluasi' => "",
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('log_activity')->insert($log_activity);
    }
}
