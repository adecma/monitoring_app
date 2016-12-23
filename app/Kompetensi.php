<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kompetensi extends Model
{
    public function aspeks()
    {
    	return $this->hasMany('App\Aspek', 'kompetensi_id');
    }
}
