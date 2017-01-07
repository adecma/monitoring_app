<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(JurusanSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(KompetensiSeeder::class);
        $this->call(AspekSeeder::class);
        $this->call(PeriodeSeeder::class);
        $this->call(SemesterSeeder::class);
        $this->call(MatakuliahSeeder::class);
        $this->call(RegistrasiMatakuliahSeeder::class);
        $this->call(RegistrasiMahasiswaSeeder::class);
        $this->call(AspekNilaiSeeder::class);
    }
}
