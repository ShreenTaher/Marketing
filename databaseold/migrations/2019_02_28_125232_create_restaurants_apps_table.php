<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestaurantsAppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants_apps', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('app_id');
            $table->unsignedInteger('restaurant_id');
            $table->timestamps();

            $table->foreign('app_id')
                ->references('id')
                ->on('app')
                ->onDelete('cascade');

            $table->foreign('restaurant_id')
                ->references('id')
                ->on('app')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurants_apps');
    }
}
