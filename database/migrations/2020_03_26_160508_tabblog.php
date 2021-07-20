<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tabblog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabblogs',function(Blueprint $blog)
        {
            $blog->increments('id');
            $blog->string('tenbaidang',200);
            $blog->string('noidung');
            $blog->string('hinhanh');
            $blog->float('nguoidang');
            $blog->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tabblogs');
    }
}
