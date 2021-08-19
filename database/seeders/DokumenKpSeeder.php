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
                'file' => 'PENGADAAN ASN TAHUN 2021 (CATATAN MENTRI PANRB).pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Indikator Penilaian Pembimbing Akademik',
                'deskripsi' => 'Ini File Indikator Penilaian Pembimbing Akademik',
                'aktor' => 'Pembimbing Akademik',
                'file' => '2493-Article Text-6890-1-10-20170502.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Indikator Penilaian Pembimbing Lapangan',
                'deskripsi' => 'Ini File Indikator Penilaian Pembimbing Lapangan',
                'aktor' => 'Pembimbing Lapangan',
                'file' => '21.06.024_abstraksi.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('dokumen_kp')->insert($dokumen_kp);
    }
}
