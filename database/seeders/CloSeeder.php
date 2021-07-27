<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clo = [
            [
                'kode_clo' => 'CLO 1',
                'deskripsi' => 'Mahasiswa mampu menunjukkan etos kerja yang baik dan bersikap profesional dalam melaksanakan tugas-tugas atau pekerjaan selama KP',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_clo' => 'CLO 2',
                'deskripsi' => 'Mahasiswa mampu merencanakan penyelesaian tugas atau pekerjaan, bekerja efektif, mandiri dan bekerja sama di dalam tim organisasi/ perusahaan selama KP',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_clo' => 'CLO 3',
                'deskripsi' => 'Mahasiswa mampu mengkomunikasikan hasil pelaksanaan tugas-tugas atau pekerjaan selama KP secara lisan dan tulisan dalam bentuk laporan KP yang terstruktur',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_clo' => 'CLO 4',
                'deskripsi' => 'Mahasiswa mampu mengidentifikasikan dan memformulasikan masalah dengan baik yang didukung oleh data-data sebagai sebuah pengetahuan baru untuk mahasiswa yang diperoleh selama KP.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('clo')->insert($clo);
    }
}
