<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('title', 200);
            $table->decimal('price', 6, 2);
            $table->mediumInteger('weight');
            $table->mediumInteger('meat');
            $table->string('about');
            $table->unsignedBigInteger('restaurant_id');
            $table->timestamps();

            $table->foreign('restaurant_id')->references('id')->on('restaurants');
        });
    }

    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
