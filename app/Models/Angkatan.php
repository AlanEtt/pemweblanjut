<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Angkatan extends Model
{
    protected $table = 'angkatans';
    protected $fillable = ['tahun_angkatan'];

    public function mahasiswas()
    {
        return $this->hasMany('App\Models\Mahasiswa', 'id_angkatan');
    }

}
