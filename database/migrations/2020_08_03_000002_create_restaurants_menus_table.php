<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsMenusTable extends Migration
{
    public function up()
    {
        Schema::create('restaurants_menus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('restaurant_id');
            $table->unsignedBigInteger('menu_id');
            $table->timestamps();

            $table->foreign('restaurant_id')->references('id')->on('restaurants');
            $table->foreign('menu_id')->references('id')->on('menus');
        });
    }

    public function down()
    {
        Schema::dropIfExists('restaurants_menus');
    }
}