<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelasiMahasiswaMatakuliah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mahasiswa_matakuliah', function (Blueprint $table) {
            // $table->unsignedBigInteger('mahasiswa_id')->nullable(); //menambahkan kkolom kelas_id
            // $table->unsignedBigInteger('matakuliah_id')->nullable(); //menambahkan kkolom kelas_id
            $table->foreign('mahasiswa_id')->references('Nim')->on('mahasiswa'); //menambahkan foreign key di kolom kelas_id
            $table->foreign('matakuliah_id')->references('id')->on('matakuliah'); //menambahkan foreign key di kolom kelas_id
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
