<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Menudisplaymain extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menudisplaymains',function(Blueprint $menudisplaymain)
        {
            $menudisplaymain->increments('id');
            $menudisplaymain->text('menuheader');
            $menudisplaymain->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('menudisplaymains');
    }
}
