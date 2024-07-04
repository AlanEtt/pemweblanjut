<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'nim', 'alamat', 'email', 'id_angkatan', 'id_kelas', 'jenis_kelamin'];

    public function angkatan()
    {
        return $this->belongsTo('App\Models\Angkatan', 'id_angkatan');
    }

    public function nilai()
    {
        return $this->hasMany('App\Models\Nilai', 'id_mahasiswa');
    }

    public function kelas()
    {
        return $this->belongsTo('App\Models\Kelas', 'id_kelas');
    }
}


