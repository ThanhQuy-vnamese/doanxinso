<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tabshipping extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabshippings',function(Blueprint $ship)
        {
            $ship->increments('id');
            $ship->string('firstname',200);
            $ship->string('lastname');
            $ship->string('diachi');
            $ship->string('thanhpho');
            $ship->string('congty');
            $ship->integer('postcodezip');
            $ship->integer('dienthoai');
            $ship->text('email');
            $ship->string('tinnhan',1000);
            $ship->integer('idkhachhang');
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
        Schema::drop('tabshippings');
    }
}
