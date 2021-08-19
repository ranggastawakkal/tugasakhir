<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramStudiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prodi = [
            [
                'nama_prodi' => "S1 Sistem Informasi",
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'nama_prodi' => "S1 Teknik Industri",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_prodi' => "S1 Teknik Logistik",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_prodi' => "-",
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('program_studi')->insert($prodi);
    }
}
