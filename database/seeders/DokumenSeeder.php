<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DokumenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dokumen = [
            [
                'id_mahasiswa' => 2,
                'surat_diterima' => 'default.jpg',
                'laporan' => 'default.jpg',
                'surat_selesai' => 'default.jpg',
                'krs' => 'default.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('dokumen')->insert($dokumen);
    }
}
