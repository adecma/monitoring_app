<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistrasiMatakuliah extends Model
{
    protected $table = 'registrasi_matakuliah';

    public function matakuliah()
    {
    	return $this->belongsTo('App\Matakuliah', 'matakuliah_kd');
    }

    public function dosen()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }

    public function semester()
    {
    	return $this->belongsTo('App\Semester', 'semester_id');
    }

    public function jurusan()
    {
        return $this->belongsTo('App\jurusan', 'jurusan_kd');
    }

    public function registrasi_mahasiswa()
    {
        return $this->belongsToMany('App\User', 'registrasi_mahasiswa', 'registrasi_matakuliah_id', 'user_id')
            ->withTimestamps()
            ->withPivot('id');
    }
}
