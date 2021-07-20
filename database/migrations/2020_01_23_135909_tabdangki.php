<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tabdangki extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabdangkis',function(Blueprint $dangki)
        {
            $dangki->increments('id');
            $dangki->string('firstname',200);
            $dangki->string('lastname',200);
            $dangki->text('email');
            $dangki->text('diachi');
            $dangki->integer('sdt');
            $dangki->string('usename');
            $dangki->text('password');
            $dangki->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tabdangkis');
    }
}
