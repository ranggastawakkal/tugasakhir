<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TemplateLaporanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $template_laporan = [
            [
                'file' => 'default.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('template_laporan')->insert($template_laporan);
    }
}
