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
        $si_3 = User::whereIn('no_induk', ['310111011793', '310111011797', '310111011807', '310111011812'])->get(['id']);
        $si_5 = User::whereIn('no_induk', ['310111011824', '310111011849', '310111011891'])->get(['id']);
        $si_7 = User::whereIn('no_induk', ['310111011895', '310112011995', '310115012315'])->get(['id']);
        $ti_1 = User::whereIn('no_induk', ['310115022821', '310115022822', '310115022823'])->get(['id']);
        $ti_3 = User::whereIn('no_induk', ['310115022824', '310115022825'])->get(['id']);
        $ti_5 = User::whereIn('no_induk', ['310115022826', '310115022827'])->get(['id']);
        $ti_7 = User::whereIn('no_induk', ['310115022828', '310115022829', '310115022830'])->get(['id']);

        $matakuliahs = RegistrasiMatakuliah::orderBy('jurusan_kd')->orderBy('semes')->get();

        foreach ($matakuliahs as $matkul) {
         	if ($matkul->jurusan_kd == 'SI') {
         		if ($matkul->semes == 3) {
         			$matkul->mahasiswa()->attach($si_3);
         		}elseif ($matkul->semes == 5) {
         			$matkul->mahasiswa()->attach($si_5);
         		}else{
         			$matkul->mahasiswa()->attach($si_7);
         		}
         	}else{
         		if ($matkul->semes == 1) {
         			$matkul->mahasiswa()->attach($ti_1);
         		}elseif ($matkul->semes == 3) {
         			$matkul->mahasiswa()->attach($ti_3);
         		}elseif ($matkul->semes == 5) {
         			$matkul->mahasiswa()->attach($ti_5);
         		}else{
         			$matkul->mahasiswa()->attach($ti_7);
         		}
         	}
         } 
    }
}
