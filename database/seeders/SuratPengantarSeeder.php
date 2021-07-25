<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuratPengantarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $surat_pengantar = [
            [
                'id_mahasiswa' => 1,
                'tanggal' => '2020-11-24',
                'tujuan_surat' => 'Direktur',
                'nama_instansi' => 'PT. Telkom',
                'alamat_instansi' => 'Jl. Kota',
                'kota_instansi' => 'Bandung',
                'kontak_instansi' => '8712674',
                'bidang_minat' => 'Enterprise Intelligent System Development',
                'status' => '',
                'file' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('surat_pengantar')->insert($surat_pengantar);
    }
}
