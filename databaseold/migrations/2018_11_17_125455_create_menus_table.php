<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');

            $table->string('bg_photo')->nullable();
            $table->string('main_photo')->nullable();
            $table->string('text_color')->nullable();
            $table->string('bg_color')->nullable();
            $table->tinyInteger('is_visible')->default('1');
            $table->tinyInteger('is_side_menu')->default('0');

            $table->integer('branch_id')->unsigned()->index();

            $table->foreign('branch_id')
                ->references('id')
                ->on('branches')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->timestamps();
        });

        Schema::create('menu_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description')->nullable();

            $table->integer('menu_id')->unsigned()->index();
            $table->string('locale')->index();
            $table->unique(['menu_id','locale']);
            $table->unique(['menu_id','title']);

            $table->foreign('menu_id')
                ->references('id')
                ->on('menus')
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
        Schema::dropIfExists('menu');
    }
}
