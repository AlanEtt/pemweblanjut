<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $fillable = ['tahun_akademik', 'semester'];

    public function nilai()
    {
        return $this->hasMany('App\Models\Nilai', 'id_semester');
    }
}
