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
                'aktor' => 'Mahasiswa',
                'file' => 'Mahasiswa_Template Laporan.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Indikator Penilaian',
                'deskripsi' => 'Ini File Indikator Penilaian Pembimbing Akademik',
                'aktor' => 'Pembimbing Akademik',
                'file' => 'Pembimbing Akademik_Indikator Penilaian.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Indikator Penilaian',
                'deskripsi' => 'Ini File Indikator Penilaian Pembimbing Lapangan',
                'aktor' => 'Pembimbing Lapangan',
                'file' => 'Pembimbing Lapangan_Indikator Penilaian.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('dokumen_kp')->insert($dokumen_kp);
    }
}
