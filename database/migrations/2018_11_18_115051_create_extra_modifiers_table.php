<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExtraModifiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extra_modifiers', function (Blueprint $table) {
            $table->increments('id');
            $table->double('price')->default(5.00);
            $table->tinyInteger('has_price')->default(1);
            $table->timestamps();
        });

        Schema::create('extra_modifier_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('locale')->index();
            $table->integer('extra_modifier_id')->unsigned()->index();

            $table->unique(['extra_modifier_id','locale']);
            $table->unique(['extra_modifier_id','name']);

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
        Schema::dropIfExists('modifiers');
    }
}
