<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type',['percent','value']);
            $table->string('value');
            $table->string('order_type');
            $table->integer('branch_id');
            $table->time('time_from');
            $table->time('time_to');
            $table->date('date_from');
            $table->date('date_to');
            $table->boolean('active')->default(1);
            $table->timestamps();
        });

        Schema::create('discounts_translations', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('discount_id')->unsigned();
            $table->string('name');
            $table->string('locale')->index();
            $table->unique(['discount_id','locale']);
            $table->foreign('discount_id')->references('id')->on('discounts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discounts');
        Schema::dropIfExists('discounts_translations');
    }
}
