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
                'surat_diterima' => 'surat_diterima_1.pdf',
                'laporan' => 'laporan_kp_1.pdf',
                'surat_selesai' => 'surat_selesai_1.pdf',
                'krs' => 'krs_1.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_mahasiswa' => 2,
                'surat_diterima' => 'surat_diterima_2.pdf',
                'laporan' => 'laporan_kp_2.pdf',
                'surat_selesai' => 'surat_selesai_2.pdf',
                'krs' => 'krs_2.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_mahasiswa' => 8,
                'surat_diterima' => 'surat_diterima_8.pdf',
                'laporan' => 'laporan_kp_8.pdf',
                'surat_selesai' => 'surat_selesai_8.pdf',
                'krs' => 'krs_8.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_mahasiswa' => 10,
                'surat_diterima' => 'surat_diterima_10.pdf',
                'laporan' => 'laporan_kp_10.pdf',
                'surat_selesai' => 'surat_selesai_10.pdf',
                'krs' => 'krs_10.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_mahasiswa' => 3,
                'surat_diterima' => 'surat_diterima_3.pdf',
                'laporan' => 'laporan_kp_3.pdf',
                'surat_selesai' => 'surat_selesai_3.pdf',
                'krs' => 'krs_3.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_mahasiswa' => 13,
                'surat_diterima' => 'surat_diterima_13.pdf',
                'laporan' => 'laporan_kp_13.pdf',
                'surat_selesai' => 'surat_selesai_13.pdf',
                'krs' => 'krs_13.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('dokumen_mahasiswa')->insert($dokumen_mahasiswa);
    }
}
