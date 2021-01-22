<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasyarakatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masyarakat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('nik');
            $table->string('email');
            $table->string('password');
            $table->enum('jenis_kelamin',['perempuan','laki-laki']);
            $table->date('tanggal_lahir');
            $table->string('alamat');
            $table->string('level');
            $table->bigInteger('pekerjaan_id')->unsigned()->index();
            $table->foreign('pekerjaan_id')->references('id')->on('pekerjaan');
            $table->rememberToken();
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
        Schema::dropIfExists('masyarakat');
    }
}
