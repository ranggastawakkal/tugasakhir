<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DokumenMahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dokumen_mahasiswa = [
            [
                'id_mahasiswa' => 2,
                'surat_diterima' => 'Curriculum Vitae_.pdf',
                'laporan' => 'Developing_Web_Applications.pdf',
                'surat_selesai' => 'CV-Rangga.pdf',
                'krs' => 'KUIS MANLAY.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('dokumen_mahasiswa')->insert($dokumen_mahasiswa);
    }
}
