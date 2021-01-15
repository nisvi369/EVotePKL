<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKampanyeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kampanye', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_masyarakat')->unsigned()->index();
            $table->string('judul');
            $table->string('gambar');
            $table->datetime('waktu');
            $table->string('konten');
            $table->foreign('id_masyarakat')->references('id')->on('masyarakat');
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
        Schema::dropIfExists('kampanye');
    }
}
