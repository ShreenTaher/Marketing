<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDishIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dish_ingredients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('is_visible')->default(1);

            $table->integer('dish_id')->unsigned()->index();

            $table->foreign('dish_id')
                ->references('id')
                ->on('dishes')
                ->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('dish_ingredient_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');

            $table->integer('dish_ingredient_id')->unsigned()->index();
            $table->string('locale')->index();

            $table->unique(['dish_ingredient_id','locale']);
            $table->unique(['dish_ingredient_id','name']);

            $table->foreign('dish_ingredient_id')
                ->references('id')
                ->on('dish_ingredients')
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
