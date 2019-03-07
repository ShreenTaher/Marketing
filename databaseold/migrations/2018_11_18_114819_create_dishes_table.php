<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('section_id')->unsigned()->nullable()->index();
            $table->integer('branch_id')->unsigned()->nullable()->index();
            $table->integer('menu_id')->unsigned()->nullable()->index();

            $table->integer('sort_order');
            $table->tinyInteger('is_visible')->default(0);
            $table->string('bg_photo')->nullable();

            $table->foreign('section_id')
                ->references('id')
                ->on('sections')
                ->onDelete('set null');

            $table->foreign('branch_id')
                ->references('id')
                ->on('branches')
                ->onDelete('cascade');

            $table->foreign('menu_id')
                ->references('id')
                ->on('menus')
                ->onDelete('set null');

            $table->timestamps();

        });

        Schema::create('dish_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');

            $table->integer('dish_id')->unsigned()->index();
            $table->string('locale')->index();

            $table->unique(['dish_id','locale']);
            $table->unique(['dish_id','name']);

            $table->foreign('dish_id')
                ->references('id')
                ->on('dishes')
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
        Schema::dropIfExists('category');
        Schema::dropIfExists('category_translations');

    }
}
