<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tabdatban extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabdatbans',function(Blueprint $datban)
        {
            $datban->increments('id');
            $datban->string('firstname',200);
            $datban->string('lastname',200);
            $datban->text('ngay');
            $datban->text('thoigian');
            $datban->integer('sdt');
            $datban->string('tinnhan');
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
        Schema::drop('tabdatbans');
    }
}
