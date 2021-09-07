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
            $table->integer('artist_id')->unsigned();
            $table->foreign('artist_id')
            ->references('id')
            ->on('artist');
            $table->integer('albums_id')->unsigned();
            $table->foreign('albums_id')
            ->references('id')
            ->on('albums');

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

