<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    protected $primaryKey = 'kd';

    public $incrementing = false;

    public function registrasi_matakuliah()
    {
        return $this->hasMany('App\RegistrasiMatakuliah', 'matakuliah_kd');
    }
}
