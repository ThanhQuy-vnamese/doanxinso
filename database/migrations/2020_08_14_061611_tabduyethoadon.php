<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tabduyethoadon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabduyethoadons',function(Blueprint $ship)
        {
            $ship->increments('id');
            $ship->integer('mahd');
            $ship->integer('tenhoadon');
            $ship->integer('tongtien');
            $ship->float('ngayxuathoadon');
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
        Schema::drop('tabduyethoadons');
    }
}
