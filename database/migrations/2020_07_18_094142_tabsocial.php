<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tabsocial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabsocials',function(Blueprint $datban)
        {
            $datban->increments('user_id');
            $datban->string('provider_user_id',100);
            $datban->string('provider',100);
            $datban->integer('user');
            $datban->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tabsocials');
    }
}
