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
            ['matakuliah_kd' => 'TTT221', 'semes' => 1, 'user_id' => 21, 'jurusan_kd' => 'SI', 'semester_id' => 1],
            ['matakuliah_kd' => 'IKB227', 'semes' => 1, 'user_id' => 7, 'jurusan_kd' => 'SI', 'semester_id' => 1],
            ['matakuliah_kd' => 'SKK217', 'semes' => 1, 'user_id' => 20, 'jurusan_kd' => 'SI', 'semester_id' => 1],
            ['matakuliah_kd' => 'SKB351', 'semes' => 3, 'user_id' => 25, 'jurusan_kd' => 'SI', 'semester_id' => 1],
            ['matakuliah_kd' => 'IKK206', 'semes' => 3, 'user_id' => 6, 'jurusan_kd' => 'SI', 'semester_id' => 1],
            ['matakuliah_kd' => 'SKB326', 'semes' => 3, 'user_id' => 3, 'jurusan_kd' => 'SI', 'semester_id' => 1],
            ['matakuliah_kd' => 'TTT220', 'semes' => 5, 'user_id' => 12, 'jurusan_kd' => 'SI', 'semester_id' => 1],
            ['matakuliah_kd' => 'SKB242', 'semes' => 5, 'user_id' => 14, 'jurusan_kd' => 'SI', 'semester_id' => 1],
            ['matakuliah_kd' => 'SKB354', 'semes' => 5, 'user_id' => 13, 'jurusan_kd' => 'SI', 'semester_id' => 1],
            ['matakuliah_kd' => 'IKB227', 'semes' => 1, 'user_id' => 7, 'jurusan_kd' => 'TI', 'semester_id' => 1],
            ['matakuliah_kd' => 'SKB232', 'semes' => 1, 'user_id' => 5, 'jurusan_kd' => 'TI', 'semester_id' => 1],
            ['matakuliah_kd' => 'SKK217', 'semes' => 1, 'user_id' => 19, 'jurusan_kd' => 'TI', 'semester_id' => 1],
            ['matakuliah_kd' => 'SKB323', 'semes' => 3, 'user_id' => 3, 'jurusan_kd' => 'TI', 'semester_id' => 1],
            ['matakuliah_kd' => 'IKB223', 'semes' => 3, 'user_id' => 8, 'jurusan_kd' => 'TI', 'semester_id' => 1],
            ['matakuliah_kd' => 'SKB351', 'semes' => 3, 'user_id' => 15, 'jurusan_kd' => 'TI', 'semester_id' => 1],
            ['matakuliah_kd' => 'SKK313', 'semes' => 5, 'user_id' => 4, 'jurusan_kd' => 'TI', 'semester_id' => 1],
            ['matakuliah_kd' => 'IBB252', 'semes' => 5, 'user_id' => 9, 'jurusan_kd' => 'TI', 'semester_id' => 1],
            ['matakuliah_kd' => 'SKK311', 'semes' => 5, 'user_id' => 12, 'jurusan_kd' => 'TI', 'semester_id' => 1],
            ['matakuliah_kd' => 'SKK121', 'semes' => 2, 'user_id' => 19, 'jurusan_kd' => 'SI', 'semester_id' => 2],
            ['matakuliah_kd' => 'IKB126', 'semes' => 2, 'user_id' => 8, 'jurusan_kd' => 'SI', 'semester_id' => 2],
            ['matakuliah_kd' => 'SPB151', 'semes' => 2, 'user_id' => 22, 'jurusan_kd' => 'SI', 'semester_id' => 2],
            ['matakuliah_kd' => 'SKB143', 'semes' => 4, 'user_id' => 14, 'jurusan_kd' => 'SI', 'semester_id' => 2],
            ['matakuliah_kd' => 'SKB198', 'semes' => 4, 'user_id' => 10, 'jurusan_kd' => 'SI', 'semester_id' => 2],
            ['matakuliah_kd' => 'SKB505', 'semes' => 4, 'user_id' => 9, 'jurusan_kd' => 'SI', 'semester_id' => 2],
            ['matakuliah_kd' => 'IKK113', 'semes' => 6, 'user_id' => 18, 'jurusan_kd' => 'SI', 'semester_id' => 2],
            ['matakuliah_kd' => 'IKB129', 'semes' => 6, 'user_id' => 25, 'jurusan_kd' => 'SI', 'semester_id' => 2],
            ['matakuliah_kd' => 'IKB127', 'semes' => 6, 'user_id' => 16, 'jurusan_kd' => 'SI', 'semester_id' => 2],
            ['matakuliah_kd' => 'SKB315', 'semes' => 2, 'user_id' => 20, 'jurusan_kd' => 'TI', 'semester_id' => 2],
            ['matakuliah_kd' => 'IKK211', 'semes' => 2, 'user_id' => 6, 'jurusan_kd' => 'TI', 'semester_id' => 2],
            ['matakuliah_kd' => 'IKK231', 'semes' => 2, 'user_id' => 17, 'jurusan_kd' => 'TI', 'semester_id' => 2],
            ['matakuliah_kd' => 'SKB242', 'semes' => 4, 'user_id' => 14, 'jurusan_kd' => 'TI', 'semester_id' => 2],
            ['matakuliah_kd' => 'IKB224', 'semes' => 4, 'user_id' => 8, 'jurusan_kd' => 'TI', 'semester_id' => 2],
            ['matakuliah_kd' => 'SKB324', 'semes' => 4, 'user_id' => 18, 'jurusan_kd' => 'TI', 'semester_id' => 2],
            ['matakuliah_kd' => 'SKB319', 'semes' => 6, 'user_id' => 25, 'jurusan_kd' => 'TI', 'semester_id' => 2],
            ['matakuliah_kd' => 'IKB358', 'semes' => 6, 'user_id' => 15, 'jurusan_kd' => 'TI', 'semester_id' => 2],
            ['matakuliah_kd' => 'IBB253', 'semes' => 6, 'user_id' => 9, 'jurusan_kd' => 'TI', 'semester_id' => 2],
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
