<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaisTable extends Migration
{
    public function up()
    {
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_semester')->constrained('semesters');
            $table->foreignId('id_mahasiswa')->constrained('mahasiswas');
            $table->foreignId('id_matkul')->constrained('mata_kuliahs');
            $table->string('nilai'); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nilais');
    }
}
