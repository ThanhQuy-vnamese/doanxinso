<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tabkhachhangtiemnang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabkhachhangtiemnangs',function(Blueprint $ship)
        {
            $ship->increments('id');
            $ship->string('firstname',200);
            $ship->string('lastname');
            $ship->string('diachi');
            $ship->string('thanhpho');
            $ship->string('congty');
            $ship->integer('dienthoai');
            $ship->text('email');
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
        Schema::drop('tabkhachhangtiemnangs');
    }
}
