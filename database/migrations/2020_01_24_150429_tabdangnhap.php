<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tabdangnhap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabdangnhaps',function(Blueprint $dangnhap)
        {
            $dangnhap->increments('id');
            $dangnhap->string('username',200);
            $dangnhap->string('password',200);
            $dangnhap->text('email');
            $dangnhap->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tabdangnhaps');
    }
}
