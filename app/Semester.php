<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    public function periode()
    {
    	return $this->belongsTo('App\Periode', 'periode_id');
    }

    public function registrasi_matakuliah()
    {
        return $this->hasMany('App\RegistrasiMatakuliah', 'semester_id');
    }
}
