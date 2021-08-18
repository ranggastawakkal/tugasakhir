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
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('plo')->insert($plo);
    }
}
