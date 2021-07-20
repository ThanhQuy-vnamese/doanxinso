<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tabbinhluan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabbinhluans',function(Blueprint $binhluan)
        {
            $binhluan->increments('id');
            $binhluan->string('hoten',200);
            $binhluan->text('email');
            $binhluan->string('chude',200);
            $binhluan->string('tinnhan');
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
        Schema::drop('tabbinhluans');
    }
}
