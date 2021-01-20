<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHasilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('pemilihan_id')->unsigned();
            $table->bigInteger('masyarakat_id')->unsigned();
            // $table->integer('hasil_pilihan');
            $table->timestamps();
        });

        Schema::table('hasil', function (Blueprint $table) {
          $table->foreign('pemilihan_id')->references('id')->on('pemilihan')->onDelete('cascade')->onUpdate('cascade');
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hasil');
    }
}
