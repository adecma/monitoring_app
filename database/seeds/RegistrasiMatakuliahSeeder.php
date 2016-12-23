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
			['matakuliah_kd' => 'IKB225', 'semes' => 5, 'user_id' => 11, 'jurusan_kd' => 'SI', 'semester_id' => 1],
			['matakuliah_kd' => 'IKB230', 'semes' => 3, 'user_id' => 3, 'jurusan_kd' => 'SI', 'semester_id' => 1],
			['matakuliah_kd' => 'IKB357', 'semes' => 5, 'user_id' => 8, 'jurusan_kd' => 'SI', 'semester_id' => 1],
			['matakuliah_kd' => 'SKB282', 'semes' => 7, 'user_id' => 16, 'jurusan_kd' => 'SI', 'semester_id' => 1],
			['matakuliah_kd' => 'SKB323', 'semes' => 3, 'user_id' => 3, 'jurusan_kd' => 'SI', 'semester_id' => 1],
			['matakuliah_kd' => 'SKB330', 'semes' => 7, 'user_id' => 14, 'jurusan_kd' => 'SI', 'semester_id' => 1],
			['matakuliah_kd' => 'SKB351', 'semes' => 3, 'user_id' => 16, 'jurusan_kd' => 'SI', 'semester_id' => 1],
			['matakuliah_kd' => 'SKK312', 'semes' => 3, 'user_id' => 14, 'jurusan_kd' => 'SI', 'semester_id' => 1],
			['matakuliah_kd' => 'IKB226', 'semes' => 5, 'user_id' => 51, 'jurusan_kd' => 'TI', 'semester_id' => 1],
			['matakuliah_kd' => 'IKB227', 'semes' => 1, 'user_id' => 24, 'jurusan_kd' => 'TI', 'semester_id' => 1],
			['matakuliah_kd' => 'IKK206', 'semes' => 1, 'user_id' => 24, 'jurusan_kd' => 'TI', 'semester_id' => 1],
			['matakuliah_kd' => 'IKK207', 'semes' => 3, 'user_id' => 25, 'jurusan_kd' => 'TI', 'semester_id' => 1],
			['matakuliah_kd' => 'IKK214', 'semes' => 1, 'user_id' => 20, 'jurusan_kd' => 'TI', 'semester_id' => 1],
			['matakuliah_kd' => 'SKB232', 'semes' => 1, 'user_id' => 19, 'jurusan_kd' => 'TI', 'semester_id' => 1],
			['matakuliah_kd' => 'SKB316', 'semes' => 5, 'user_id' => 27, 'jurusan_kd' => 'TI', 'semester_id' => 1],
			['matakuliah_kd' => 'SKB331', 'semes' => 5, 'user_id' => 20, 'jurusan_kd' => 'TI', 'semester_id' => 1],
			['matakuliah_kd' => 'SKB352', 'semes' => 7, 'user_id' => 21, 'jurusan_kd' => 'TI', 'semester_id' => 1],
			['matakuliah_kd' => 'SKK217', 'semes' => 1, 'user_id' => 26, 'jurusan_kd' => 'TI', 'semester_id' => 1],
        	['matakuliah_kd' => 'IKB223', 'semes' => 3, 'user_id' => 21, 'jurusan_kd' => 'TI', 'semester_id' => 1],
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
