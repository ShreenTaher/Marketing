<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComboExtraModifiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('combo_extra_modifiers', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('combo_id')->unsigned()->index();
            $table->integer('extra_modifier_id')->unsigned()->index();

            $table->foreign('combo_id')
                ->references('id')
                ->on('combos')
                ->onDelete('cascade');

            $table->foreign('extra_modifier_id')
                ->references('id')
                ->on('extra_modifiers')
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
