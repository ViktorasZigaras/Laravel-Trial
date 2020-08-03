<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->smallInteger('customers');
            $table->tinyInteger('emploees');
            // $table->unsignedBigInteger('menu_id');
            $table->timestamps();

            // $table->foreign('menu_id')->references('id')->on('menus');
        });
    }

    public function down()
    {
        Schema::dropIfExists('restaurants');
    }
}
