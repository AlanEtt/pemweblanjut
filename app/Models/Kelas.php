<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelass';

    protected $fillable = ['nama_kelas'];

    public function mahasiswa()
    {
        return $this->hasMany('App\Models\Mahasiswa', 'id_kelas');
    }

}
