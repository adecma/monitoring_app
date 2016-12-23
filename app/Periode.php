<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    public function semesters()
    {
    	return $this->hasMany('App\Semester', 'periode_id');
    }
}
