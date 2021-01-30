<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petugas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('NIK');
            $table->string('nama');
            $table->enum('jenisKelamin',['Laki-laki','Perempuan']);
            $table->date('tanggalLahir');
            $table->string('alamat');
            $table->string('email');
            $table->string('password');
            $table->string('level');
            $table->bigInteger('id_kecamatan')->unsigned()->index();
            $table->foreign('id_kecamatan')->references('id')->on('kecamatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('petugas');
    }
}
