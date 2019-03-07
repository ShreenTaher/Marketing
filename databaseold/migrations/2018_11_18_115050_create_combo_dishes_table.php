<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComboDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('combo_dishes', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('dish_id')->unsigned()->index();
            $table->integer('combo_id')->unsigned()->index();

            $table->foreign('dish_id')
                ->references('id')
                ->on('dishes')
                ->onDelete('cascade');

            $table->foreign('combo_id')
                ->references('id')
                ->on('combos')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_photos');
    }
}
