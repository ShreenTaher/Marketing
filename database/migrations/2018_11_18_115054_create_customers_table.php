<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('full_name');
            $table->string('phone');
            $table->text('address');
            $table->tinyInteger('is_blocked')->default(0);
            $table->string('email');
            $table->string('card_number');

            // TODO see what they will decide and change to branch_id or remain restaurant_id
            $table->integer('restaurant_id')->unsigned()->nullable();

            //TODO make email and phone unique combined with branch_id or restaurant_id when they decide

            $table->unique(['restaurant_id','phone']);
            $table->unique(['restaurant_id','email']);

            $table->integer('city_id')->unsigned()->nullable();
            $table->integer('region_id')->unsigned()->nullable();



            $table->foreign('restaurant_id')->references('id')
                ->on('restaurants')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('city_id')->references('id')
                ->on('cities')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->foreign('region_id')->references('id')
                ->on('regions')
                ->onUpdate('cascade')
                ->onDelete('set null');




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
        Schema::dropIfExists('customers');
    }
}
