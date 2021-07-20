<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tabmakhuyenmai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabmakhuyenmais',function(Blueprint $ship)
        {
            $ship->increments('id');
            $ship->integer('tenma');
            $ship->integer('magiam');
            $ship->integer('soluong');
            $ship->float('tinhnangma');
            $ship->integer('phantramgiam');
            $ship->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tabmakhuyenmais');
    }
}
