<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->nullable();
            $table->integer('sort_order');
            $table->tinyInteger('is_visible')->default(0);
            $table->string('bg_photo')->nullable();

            $table->integer('menu_id')->unsigned()->nullable()->index();
            $table->foreign('menu_id')
                ->references('id')
                ->on('menus')
                ->onDelete('cascade');

            $table->timestamps();

        });

        Schema::create('section_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');

            $table->integer('section_id')->unsigned()->index();
            $table->string('locale')->index();

            //unique fields combined with section_id
            $table->unique(['section_id','locale']);
            $table->unique(['section_id','name']);

            $table->foreign('section_id')
                ->references('id')
                ->on('sections')
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
