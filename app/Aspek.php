<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class Aspek extends Model
{
    public function kompetensi()
    {
    	return $this->belongsTo('App\Kompetensi', 'kompetensi_id');
    }

    public function registrasi_mahasiswa()
    {
    	return $this->belongsToMany('App\RegistrasiMahasiswa', 'aspek_nilai', 'aspek_id', 'registrasi_mahasiswa_id')
    		->withPivot('id', 'skor');
    }

    public function skor_mhs()
    {
    	return $this->registrasi_mahasiswa()
    		->select(['registrasi_mahasiswa.id', 'registrasi_mahasiswa.registrasi_matakuliah_id', 'registrasi_mahasiswa.user_id', 'aspek_nilai.skor']);
    }
}
