<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tabdetailblog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabdetailblogs',function(Blueprint $detailblog)
        {
            $detailblog->increments('id');
            $detailblog->text('noidungchitiet');
            $detailblog->integer('id_blog');
            $detailblog->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tabdetailblogs');
    }
}
