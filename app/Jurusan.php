<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $primaryKey = 'kd';

    public $incrementing = false;

    public function users()
    {
        return $this->belongsToMany('App\User', 'jurusan_user', 'jurusan_kd', 'user_id');
    }

    public function registrasi_matakuliah()
    {
        return $this->hasMany('App\RegistrasiMatakuliah', 'jurusan_kd');
    }
}
