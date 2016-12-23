<?php

use Illuminate\Database\Seeder;
use App\Periode;

class PeriodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p = new Periode;
        $p->name = '2015/2016';
        $p->save();
    }
}
