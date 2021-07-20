<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tabproductordertoday extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabproductordertodays',function(Blueprint $ship)
        {
            $ship->increments('id');
            $ship->integer('mahd');
            $ship->integer('tensanpham');
            $ship->integer('soluong');
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
        Schema::drop('tabproductordertodays');
    }
}
