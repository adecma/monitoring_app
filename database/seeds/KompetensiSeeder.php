<?php

use Illuminate\Database\Seeder;
use App\Kompetensi;

class KompetensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kompetensis = [
        	[
        		'name' => 'Pedagogik',
        	],
        	[
        		'name' => 'Profesional',
        	],
        	[
        		'name' => 'Kepribadian',
        	],
        	[
        		'name' => 'Sosial',
        	],
        ];

        foreach ($kompetensis as $komp) {
        	$k = new Kompetensi;
        	$k->name = $komp['name'];
        	$k->save();
        }
    }
}
