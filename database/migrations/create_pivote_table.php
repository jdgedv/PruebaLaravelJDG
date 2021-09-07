<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePivoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pivote', function (Blueprint $table) {
            $table->integer('artista_id')->unsigned();
            $table->foreign('artista_id')
            ->references('id')
            ->on('artista');
            $table->integer('album_id')->unsigned();
            $table->foreign('album_id')
            ->references('id')
            ->on('album');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pivote');
    }
}
