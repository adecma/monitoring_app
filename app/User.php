<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use LaratrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function jurusan()
    {
        return $this->belongsToMany('App\Jurusan', 'jurusan_user', 'user_id', 'jurusan_kd');
    }

    public function registrasi_matakuliah()
    {
        return $this->hasMany('App\RegistrasiMatakuliah', 'user_id');
    }

    public function registrasi_mahasiswa()
    {
        return $this->belongsToMany('App\RegistrasiMatakuliah', 'registrasi_mahasiswa', 'user_id', 'registrasi_matakuliah_id')
            ->withTimestamps()
            ->withPivot('id');
    }
}
