<?php

namespace Database\Seeders;

use App\Models\BobotPenilaian;
use App\Models\KelompokKeahlian;
use App\Models\Peminatan;
use App\Models\SuratPengantar;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            PembimbingAkademikSeeder::class,
            PembimbingLapanganSeeder::class,
            AdminSeeder::class,
            ProgramStudiSeeder::class,
            KelompokKeahlianSeeder::class,
            PeminatanSeeder::class,
            KelasSeeder::class,
            MahasiswaSeeder::class,
            SuratPengantarSeeder::class,
            KerjaPraktekSeeder::class,
            DokumenMahasiswaSeeder::class,
            DokumenKpSeeder::class,
            CloSeeder::class,
            SubCloSeeder::class,
            BobotPenilaianSeeder::class,
            PenilaianPembimbingLapanganSeeder::class,
            PenilaianSeeder::class,
            LogActivitySeeder::class,
        ]);
    }
}
