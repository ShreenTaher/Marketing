<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phone');
            $table->tinyInteger('is_active')->default(1);


            $table->integer('restaurant_id')->unsigned()->nullable();
            $table->integer('city_id')->unsigned()->nullable();
            $table->integer('currency_id')->unsigned()->nullable();

            $table->foreign('restaurant_id')->references('id')
                ->on('restaurants')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('city_id')->references('id')
                ->on('cities')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->foreign('currency_id')->references('id')
                ->on('currencies')
                ->onUpdate('cascade')
                ->onDelete('set null');


            $table->timestamps();
        });

        Schema::create('branch_translations', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('address')->nullable();

            $table->unique(['branch_id','name']);
            $table->unique(['branch_id','address']);

            $table->integer('branch_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['branch_id','locale']);
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branches');
    }
}
