<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LogAktivitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $log_aktivitas = [
            [
                'id_mahasiswa' => 1,
                'id_pemb_akd' => 1,
                'id_pemb_lap' => 1,
                'tanggal' => "2020-01-02",
                'jam_datang' => "09:00",
                'jam_pulang' => "17:00",
                'aktivitas' => "belajar design web",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_mahasiswa' => 2,
                'id_pemb_akd' => 2,
                'id_pemb_lap' => 2,
                'tanggal' => "2020-03-05",
                'jam_datang' => "09:00",
                'jam_pulang' => "17:00",
                'aktivitas' => "perkenalan",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_mahasiswa' => 3,
                'id_pemb_akd' => 3,
                'id_pemb_lap' => 3,
                'tanggal' => "2020-07-06",
                'jam_datang' => "09:00",
                'jam_pulang' => "17:00",
                'aktivitas' => "perkenalan",
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('log_aktivitas')->insert($log_aktivitas);
    }
}
