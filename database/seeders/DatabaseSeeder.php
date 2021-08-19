<?php

namespace Database\Seeders;

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
            PeriodeSeeder::class,
            KelompokKeahlianSeeder::class,
            PeminatanSeeder::class,
            KelasSeeder::class,
            MahasiswaSeeder::class,
            SuratPengantarSeeder::class,
            KerjaPraktekSeeder::class,
            DokumenMahasiswaSeeder::class,
            DokumenKpSeeder::class,
            LogAktivitasSeeder::class,
            PloSeeder::class,
            CloSeeder::class,
            SubCloSeeder::class,
            BobotPembAkdSeeder::class,
            BobotPembLapSeeder::class,
            NilaiPembLapSeeder::class,
            NilaiPembAkdSeeder::class,
        ]);
    }
}
