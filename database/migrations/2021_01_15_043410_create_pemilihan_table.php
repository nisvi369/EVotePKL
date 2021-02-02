<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePemilihanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemilihan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('masyarakat_id')->unsigned();
            $table->string('nomor_urut');
            $table->date('jadwal');
            $table->string('foto');
            $table->timestamps();
        });

        Schema::table('pemilihan', function (Blueprint $table) {
          $table->foreign('masyarakat_id')->references('id')->on('masyarakat')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemilihan');
    }
}
