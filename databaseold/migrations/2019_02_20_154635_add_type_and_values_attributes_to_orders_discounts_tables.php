<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeAndValuesAttributesToOrdersDiscountsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders_discounts', function (Blueprint $table) {
            $table->dropColumn('percentage');
            $table->enum('type', ['percent', 'value'])->after('to');
            $table->float('value', 8, 2)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders_discounts', function (Blueprint $table) {
            
        });
    }
}
