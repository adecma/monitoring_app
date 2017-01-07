<?php

use Illuminate\Database\Seeder;
use App\Semester;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $semesters = [
        	[
        		'jenis' => 'Ganjil',
        		'status' => 'Aktif',
        		'periode_id' => 1,
        	],
        	[
        		'jenis' => 'Genap',
        		'status' => 'Non',
        		'periode_id' => 1,
        	],
        ];

        foreach ($semesters as $semes) {
        	$s = new Semester;
        	$s->jenis = $semes['jenis'];
        	$s->status = $semes['status'];
        	$s->periode_id = $semes['periode_id'];
        	$s->save();
        }
    }
}
