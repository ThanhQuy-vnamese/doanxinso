<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tabchitietdonhang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabchitietdonhangs',function(Blueprint $ship)
        {
            $ship->increments('id');
            $ship->integer('iddonhang');
            $ship->integer('idsanpham');
            $ship->string('tensanpham');
            $ship->float('gia');
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
        Schema::drop('tabchitietdonhangs');
    }
}
