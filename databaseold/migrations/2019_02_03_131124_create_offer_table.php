<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type',['promotion','mixandmatch'])->default('promotion');
            $table->integer('branch_id');
            $table->time('time_from');
            $table->time('time_to');
            $table->date('date_from');
            $table->date('date_to');
            $table->boolean('active')->default(1);
            $table->timestamps();
        });

        Schema::create('offers_translations', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('offer_id')->unsigned();
            $table->string('name');
            $table->string('locale')->index();
            $table->unique(['offer_id','locale']);
            $table->foreign('offer_id')->references('id')->on('offers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offers');
        Schema::dropIfExists('offers_translations');
    }
}
