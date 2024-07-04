<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAngkatansTable extends Migration
{
    public function up()
    {
        Schema::create('angkatans', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun_angkatan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('angkatans');
    }
}
