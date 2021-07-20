<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tabdanhsachcongviec extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabdanhsachcongviecs',function(Blueprint $ship)
        {
            $ship->increments('id');
            $ship->string('tencongviec',200);
            $ship->datetime('ngaybatdau');
            $ship->datetime('ngayketthuc');
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
        Schema::drop('tabdanhsachcongviecs');
    }
}
