<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sub_clo = [
            [
                'id_clo' => 1,
                'indikator' => 'Kehadiran tepat waktu',
                'skor_1_20' => 'Mahasiswa hadir tepat waktu saat pembekalan KP, dan kehadiran tepat waktu di tempat KP kurang dari 20% kehadiran yang seharusnya.',
                'skor_21_40' => 'Mahasiswa hadir tepat waktu saat pembekalan KP, dan kehadiran tepat waktu di tempat KP mencapai 40% kehadiran yang seharusnya.',
                'skor_41_60' => 'Mahasiswa hadir tepat waktu saat pembekalan KP, dan kehadiran tepat waktu di tempat KP mencapai 60% kehadiran yang seharusnya.',
                'skor_61_80' => 'Mahasiswa hadir tepat waktu saat pembekalan KP, dan kehadiran tepat waktu di tempat KP mencapai 80% kehadiran yang seharusnya.',
                'skor_81_100' => 'Mahasiswa hadir tepat waktu saat pembekalan KP, dan kehadiran tepat waktu di tempat KP lebih dari 80% kehadiran yang seharusnya.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_clo' => 1,
                'indikator' => 'Kedisiplinan (kesesuaian dengan aturan)',
                'skor_1_20' => 'Mahasiswa tidak mengetahui prosedur dan peraturan lainnya yang berlaku di tempat KP serta sering tidak disiplin menjalankan penugasan dari pembimbing lapangan atau pun pembimbing akademik KP.',
                'skor_21_40' => 'Mahasiswa tidak mengetahui prosedur dan peraturan lainnya yang berlaku di tempat KP namun disiplin menjalankan penugasan dari pembimbing lapangan atau pun pembimbing akademik KP.',
                'skor_41_60' => 'Mahasiswa mengetahui sebagian kecil prosedur dan peraturan lainnya yang berlaku di tempat kerja praktek dan mematuhinya, serta disiplin menjalankan penugasan dari pembimbing lapangan atau pun pembimbing akademik KP.',
                'skor_61_80' => 'Mahasiswa mengetahui sebagian besar prosedur dan peraturan lainnya yang berlaku di tempat KP dan mematuhinya, serta disiplin menjalankan penugasan dari pembimbing lapangan atau pun pembimbing akademik KP',
                'skor_81_100' => 'Mahasiswa mengetahui sepenuhnya prosedur dan peraturan lainnya yang berlaku di tempat KP dan mematuhinya serta disiplin menjalankan penugasan dari pembimbing lapangan atau pun pembimbing akademik KP.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('sub_clo')->insert($sub_clo);
    }
}
