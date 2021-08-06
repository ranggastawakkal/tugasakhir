<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DokumenKpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dokumen_kp = [
            [
                'nama' => 'Template Laporan',
                'deskripsi' => 'Ini File Template Laporan',
                'file' => 'PENGADAAN ASN TAHUN 2021 (CATATAN MENTRI PANRB).pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('dokumen_kp')->insert($dokumen_kp);
    }
}
