<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aspek extends Model
{
    public function kompetensi()
    {
    	return $this->belongsTo('App\Kompetensi', 'kompetensi_id');
    }
}
