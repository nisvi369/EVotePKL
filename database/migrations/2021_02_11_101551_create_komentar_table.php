<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKomentarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komentar', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('komen');
            $table->bigInteger('id_masyarakat')->unsigned()->index();
            $table->bigInteger('id_kampanye')->unsigned()->index();
            $table->foreign('id_masyarakat')->references('id')->on('masyarakat');
            $table->foreign('id_kampanye')->references('id')->on('kampanye');
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
        Schema::dropIfExists('komentar');
    }
}
