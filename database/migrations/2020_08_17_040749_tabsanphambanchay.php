<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tabsanphambanchay extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabsanphambanchays',function(Blueprint $ship)
        {
            $ship->increments('id');
            $ship->string('tensanpham',255);
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
        Schema::drop('tabsanphambanchays');
    }
}
