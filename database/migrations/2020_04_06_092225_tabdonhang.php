<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tabdonhang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabdonhangs',function(Blueprint $ship)
        {
            $ship->increments('id');
            $ship->integer('idkhachhang');
            $ship->integer('idshipping');
            $ship->integer('idpayment');
            $ship->float('tongdonhang');
            $ship->integer('trangthaidonhang');
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
        Schema::drop('tabdonhangs');
    }
}
