<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // code, from, to, percentage, value
        Schema::create('orders_discounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->datetime('from');
            $table->datetime('to');
            $table->float('percentage')->nullable();
            $table->integer('value')->nullable();
            $table->boolean('is_active');
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
        Schema::dropIfExists('orders_discounts');
    }
}
