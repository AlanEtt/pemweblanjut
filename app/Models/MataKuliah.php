<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $fillable = ['kode_matkul', 'nama_matkul', 'sks'];

    public function nilai()
    {
        return $this->hasMany('App\Models\Nilai', 'id_matkul');
    }
}
