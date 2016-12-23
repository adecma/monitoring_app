<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistrasiMahasiswa extends Model
{
    protected $table = 'registrasi_mahasiswa';

    public function aspeks()
    {
    	return $this->belongsToMany('App\Aspek', 'aspek_nilai', 'registrasi_mahasiswa_id', 'aspek_id')
    		->withTimestamps()
    		->withPivot('id', 'skor');
    }

    public function registrasi_matakuliah()
    {
    	return $this->belongsTo('App\RegistrasiMatakuliah', 'registrasi_matakuliah_id');
    }

    public function mahasiswa()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }
}
