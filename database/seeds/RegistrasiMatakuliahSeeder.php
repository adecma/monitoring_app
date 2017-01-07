<?php

use Illuminate\Database\Seeder;
use App\RegistrasiMatakuliah;

class RegistrasiMatakuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $registrasi = [
			['matakuliah_kd' => 'IPK201', 'semes' => 1, 'user_id' => 3, 'jurusan_kd' => 'SI', 'semester_id' => 1],
			['matakuliah_kd' => 'IPK202', 'semes' => 1, 'user_id' => 4, 'jurusan_kd' => 'SI', 'semester_id' => 1],
			['matakuliah_kd' => 'IPK203', 'semes' => 3, 'user_id' => 5, 'jurusan_kd' => 'SI', 'semester_id' => 1],
			['matakuliah_kd' => 'SPK204', 'semes' => 3, 'user_id' => 6, 'jurusan_kd' => 'SI', 'semester_id' => 1],

			['matakuliah_kd' => 'IKK210', 'semes' => 1, 'user_id' => 11, 'jurusan_kd' => 'TI', 'semester_id' => 1],
			['matakuliah_kd' => 'IKK211', 'semes' => 1, 'user_id' => 12, 'jurusan_kd' => 'TI', 'semester_id' => 1],
			['matakuliah_kd' => 'IKK212', 'semes' => 3, 'user_id' => 13, 'jurusan_kd' => 'TI', 'semester_id' => 1],
			['matakuliah_kd' => 'IKK213', 'semes' => 3, 'user_id' => 14, 'jurusan_kd' => 'TI', 'semester_id' => 1],

            ['matakuliah_kd' => 'IKK206', 'semes' => 2, 'user_id' => 7, 'jurusan_kd' => 'SI', 'semester_id' => 2],
            ['matakuliah_kd' => 'IKK207', 'semes' => 2, 'user_id' => 8, 'jurusan_kd' => 'SI', 'semester_id' => 2],
            ['matakuliah_kd' => 'IKK355', 'semes' => 4, 'user_id' => 9, 'jurusan_kd' => 'SI', 'semester_id' => 2],
            ['matakuliah_kd' => 'IKK356', 'semes' => 4, 'user_id' => 10, 'jurusan_kd' => 'SI', 'semester_id' => 2],

			['matakuliah_kd' => 'SKK217', 'semes' => 2, 'user_id' => 15, 'jurusan_kd' => 'TI', 'semester_id' => 2],
			['matakuliah_kd' => 'SKK310', 'semes' => 2, 'user_id' => 16, 'jurusan_kd' => 'TI', 'semester_id' => 2],
			['matakuliah_kd' => 'SKK311', 'semes' => 4, 'user_id' => 17, 'jurusan_kd' => 'TI', 'semester_id' => 2],
			['matakuliah_kd' => 'SKK312', 'semes' => 4, 'user_id' => 18, 'jurusan_kd' => 'TI', 'semester_id' => 2],
        ];

        foreach ($registrasi as $reg) {
        	$r = new RegistrasiMatakuliah;
        	$r->semester_id = $reg['semester_id'];
        	$r->jurusan_kd = $reg['jurusan_kd'];
        	$r->semes = $reg['semes'];
        	$r->matakuliah_kd = $reg['matakuliah_kd'];
        	$r->user_id = $reg['user_id'];
        	$r->save();
        }
    }
}
