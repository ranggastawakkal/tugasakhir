<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kelas = [
            [
                'nama_kelas' => "SI-41-01",
                'id_prodi' => "1",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kelas' => "TI-41-02",
                'id_prodi' => "2",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kelas' => "TL-41-03",
                'id_prodi' => "3",
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('kelas')->insert($kelas);
    }
}
