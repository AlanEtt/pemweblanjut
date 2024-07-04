<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $fillable = ['id_semester', 'id_mahasiswa', 'id_matkul', 'nilai'];

    public function semester()
    {
        return $this->belongsTo('App\Models\Semester', 'id_semester');
    }

    public function mahasiswa()
    {
        return $this->belongsTo('App\Models\Mahasiswa', 'id_mahasiswa');
    }

    public function mataKuliah()
    {
        return $this->belongsTo('App\Models\MataKuliah', 'id_matkul');
    }

    public function getBobotNilaiAttribute()
    {
        $skor = 0;
        switch ($this->nilai) {
            case 'A':
                $skor = 4.00;
                break;
            case 'AB':
                $skor = 3.50;
                break;
            case 'B':
                $skor = 3.00;
                break;
            case 'BC':
                $skor = 2.50;
                break;
            case 'C':
                $skor = 2.00;
                break;
            case 'CD':
                $skor = 1.50;
                break;
            case 'D':
                $skor = 1.00;
                break;
            case 'E':
                $skor = 0.00;
                break;
        }
        return $skor * $this->mataKuliah->sks;
    }
}

