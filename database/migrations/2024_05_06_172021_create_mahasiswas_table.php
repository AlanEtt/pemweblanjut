<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswasTable extends Migration
{
    public function up()
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->bigInteger('nim')->unique();
            $table->string('alamat');
            $table->string('email')->unique();
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan', 'tidak diketahui'])->default('tidak diketahui');
            $table->foreignId('id_angkatan')->constrained('angkatans')->onDelete('cascade');
            $table->foreignId('id_kelas')->constrained('kelass')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mahasiswas');
    }
}
