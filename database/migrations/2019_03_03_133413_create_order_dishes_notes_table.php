<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDishesNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_dishes_notes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_dish_id')->unsigned();
            $table->foreign('order_dish_id')
                ->references('id')
                ->on('order_dishes')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->text('note_desc');
            $table->integer('ingredient_id')->nullable();
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
        Schema::dropIfExists('order_dishes_notes');
    }
}
