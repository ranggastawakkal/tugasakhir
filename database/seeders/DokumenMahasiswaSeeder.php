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
                'id_mahasiswa' => 1,
                'surat_diterima' => '1202170029_Surat Diterima.pdf',
                'laporan' => '1202170029_Laporan KP.pdf',
                'surat_selesai' => '1202170029_Surat Selesai.pdf',
                'krs' => '1202170029_KRS.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_mahasiswa' => 2,
                'surat_diterima' => '1202172054_Surat Diterima.pdf',
                'laporan' => '1202172054_Laporan KP.pdf',
                'surat_selesai' => '1202172054_Surat Selesai.pdf',
                'krs' => '1202172054_KRS.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_mahasiswa' => 3,
                'surat_diterima' => '1202174388_Surat Diterima.pdf',
                'laporan' => '1202174388_Laporan KP.pdf',
                'surat_selesai' => '1202174388_Surat Selesai.pdf',
                'krs' => '1202174388_KRS.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('dokumen_mahasiswa')->insert($dokumen_mahasiswa);
    }
}
