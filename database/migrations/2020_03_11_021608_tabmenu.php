<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tabmenu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabmenus',function(Blueprint $binhluan)
        {
            $binhluan->increments('id');
            $binhluan->string('tenmonan',200);
            $binhluan->string('mota');
            $binhluan->float('gia');
            $binhluan->string('hinhanh');
            $binhluan->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tabmenus');
    }
}
