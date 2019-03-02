<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean("is_active")->default(0);
            $table->timestamps();
        });

        Schema::create('position_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('position_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['position_id','locale']);
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('positions');
    }
}
