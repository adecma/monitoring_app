<?php

use Illuminate\Database\Seeder;
use App\RegistrasiMatakuliah;
use App\User;

class RegistrasiMahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $si_12 = User::whereIn('no_induk', ['310115012357', '310115012359', '310115012360', '310115012361', '310115012362', '310115012363', '310115012364', '310115012365'])->get(['id']);
        $si_34 = User::whereIn('no_induk', ['310115012366', '310115012367', '310115012368', '310115012369', '310115012371', '310115012372', '310115012373', '310115012374'])->get(['id']);
        $si_56 = User::whereIn('no_induk', ['310115012375', '310115012376', '310115012386', '310115012387', '310115012389', '310115012390', '310115012391', '310115012393', '310115012394'])->get(['id']);

        $ti_12 = User::whereIn('no_induk', ['310115022740', '310115022741', '310115022742', '310115022743', '310115022744', '310115022745', '310115022746', '310115022747'])->get(['id']);
        $ti_34 = User::whereIn('no_induk', ['310115022748', '310115022749', '310115022750', '310115022751', '310115022753', '310115022754', '310115022755', '310115022756'])->get(['id']);
        $ti_56 = User::whereIn('no_induk', ['310115022757', '310115022758', '310115022759', '310115022760', '310115022761', '310115022762', '310115022763', '310115022764', '310115022765'])->get(['id']);

        $matakuliahs = RegistrasiMatakuliah::all();

        foreach ($matakuliahs as $matkul) {
         	if ($matkul->id == 1) {
                $matkul->registrasi_mahasiswa()->attach($si_12);
            }elseif ($matkul->id == 2) {
                $matkul->registrasi_mahasiswa()->attach($si_12);
            }elseif ($matkul->id == 3) {
                $matkul->registrasi_mahasiswa()->attach($si_12);
            }elseif ($matkul->id == 4) {
                $matkul->registrasi_mahasiswa()->attach($si_34);
            }elseif ($matkul->id == 5) {
                $matkul->registrasi_mahasiswa()->attach($si_34);
            }elseif ($matkul->id == 6) {
                $matkul->registrasi_mahasiswa()->attach($si_34);
            }elseif ($matkul->id == 7) {
                $matkul->registrasi_mahasiswa()->attach($si_56);
            }elseif ($matkul->id == 8) {
                $matkul->registrasi_mahasiswa()->attach($si_56);
            }elseif ($matkul->id == 9) {
                $matkul->registrasi_mahasiswa()->attach($si_56);
            }elseif ($matkul->id == 10) {
                $matkul->registrasi_mahasiswa()->attach($ti_12);
            }elseif ($matkul->id == 11) {
                $matkul->registrasi_mahasiswa()->attach($ti_12);
            }elseif ($matkul->id == 12) {
                $matkul->registrasi_mahasiswa()->attach($ti_12);
            }elseif ($matkul->id == 13) {
                $matkul->registrasi_mahasiswa()->attach($ti_34);
            }elseif ($matkul->id == 14) {
                $matkul->registrasi_mahasiswa()->attach($ti_34);
            }elseif ($matkul->id == 15) {
                $matkul->registrasi_mahasiswa()->attach($ti_34);
            }elseif ($matkul->id == 16) {
                $matkul->registrasi_mahasiswa()->attach($ti_56);
            }elseif ($matkul->id == 17) {
                $matkul->registrasi_mahasiswa()->attach($ti_56);
            }elseif ($matkul->id == 18) {
                $matkul->registrasi_mahasiswa()->attach($ti_56);
            }elseif ($matkul->id == 19) {
                $matkul->registrasi_mahasiswa()->attach($si_12);
            }elseif ($matkul->id == 20) {
                $matkul->registrasi_mahasiswa()->attach($si_12);
            }elseif ($matkul->id == 21) {
                $matkul->registrasi_mahasiswa()->attach($si_12);
            }elseif ($matkul->id == 22) {
                $matkul->registrasi_mahasiswa()->attach($si_34);
            }elseif ($matkul->id == 23) {
                $matkul->registrasi_mahasiswa()->attach($si_34);
            }elseif ($matkul->id == 24) {
                $matkul->registrasi_mahasiswa()->attach($si_34);
            }elseif ($matkul->id == 25) {
                $matkul->registrasi_mahasiswa()->attach($si_56);
            }elseif ($matkul->id == 26) {
                $matkul->registrasi_mahasiswa()->attach($si_56);
            }elseif ($matkul->id == 27) {
                $matkul->registrasi_mahasiswa()->attach($si_56);
            }elseif ($matkul->id == 28) {
                $matkul->registrasi_mahasiswa()->attach($ti_12);
            }elseif ($matkul->id == 29) {
                $matkul->registrasi_mahasiswa()->attach($ti_12);
            }elseif ($matkul->id == 30) {
                $matkul->registrasi_mahasiswa()->attach($ti_12);
            }elseif ($matkul->id == 31) {
                $matkul->registrasi_mahasiswa()->attach($ti_34);
            }elseif ($matkul->id == 32) {
                $matkul->registrasi_mahasiswa()->attach($ti_34);
            }elseif ($matkul->id == 33) {
                $matkul->registrasi_mahasiswa()->attach($ti_34);
            }elseif ($matkul->id == 34) {
                $matkul->registrasi_mahasiswa()->attach($ti_56);
            }elseif ($matkul->id == 35) {
                $matkul->registrasi_mahasiswa()->attach($ti_56);
            }elseif ($matkul->id == 36) {
                $matkul->registrasi_mahasiswa()->attach($ti_56);
            }
         } 
    }
}
