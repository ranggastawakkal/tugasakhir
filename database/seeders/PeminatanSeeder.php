<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeminatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $peminatan = [
            [
                'nama' => "System Architecture and Governance",
                'id_kk' => 3,
                'id_prodi' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => "Enterprise Infrastructure Management",
                'id_kk' => 3,
                'id_prodi' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => "Enterprise Resource Planning",
                'id_kk' => 3,
                'id_prodi' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => "Enterprise Data Engineering",
                'id_kk' => 4,
                'id_prodi' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => "Enterprise Intelligent System Development",
                'id_kk' => 4,
                'id_prodi' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => "Product Development & Ergonomic",
                'id_kk' => 1,
                'id_prodi' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => "Engineering Maintenance",
                'id_kk' => 1,
                'id_prodi' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => "Quality System Engineering",
                'id_kk' => 1,
                'id_prodi' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => "Sistem Produksi dan Otomasi",
                'id_kk' => 1,
                'id_prodi' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => "Marketing",
                'id_kk' => 2,
                'id_prodi' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => "Business Analysis",
                'id_kk' => 2,
                'id_prodi' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => "Enterpreneurship (Kewirausahaan)",
                'id_kk' => 2,
                'id_prodi' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => "Human Capital",
                'id_kk' => 2,
                'id_prodi' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => "Project Management",
                'id_kk' => 2,
                'id_prodi' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => "Logistics Optimization",
                'id_kk' => 3,
                'id_prodi' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => "Logistics Simulation",
                'id_kk' => 3,
                'id_prodi' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => "e-Logistics",
                'id_kk' => 3,
                'id_prodi' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => "Logistics Business",
                'id_kk' => 3,
                'id_prodi' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => "-",
                'id_kk' => 5,
                'id_prodi' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('peminatan')->insert($peminatan);
    }
}
