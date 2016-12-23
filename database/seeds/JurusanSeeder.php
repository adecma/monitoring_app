<?php

use Illuminate\Database\Seeder;
use App\Jurusan;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jurusans = [
        	[
        		'kd' => 'SI',
        		'name' => 'Sistem Informasi',
        	],
        	[
        		'kd' => 'TI',
        		'name' => 'Teknik Informatika',
        	]
        ];

        foreach ($jurusans as $jur) {
        	$j = new Jurusan;
        	$j->kd = $jur['kd'];
        	$j->name = $jur['name'];
        	$j->save();
        }
    }
}
