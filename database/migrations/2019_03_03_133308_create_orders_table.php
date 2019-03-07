<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_number');
            $table->integer('order_type_id');
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->float('discount_price')->default(0);
            $table->float('delivery_charges')->default(0);
            $table->float('total_cost');
            $table->integer('cashier_id');
            $table->integer('waiter_id')->nullable();
            $table->integer('pilot_id')->nullable();
            $table->date('order_date');
            $table->time('order_time');
            $table->integer('table_id')->nullable();
            $table->integer('payment_method_id')->unsigned();
            $table->foreign('payment_method_id')
                ->references('id')
                ->on('payment_methods')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->double('transaction_id')->nullable();
            $table->enum('status',['new','pending','inprogress','served','paid','unpaid'])->default('new');
            $table->float('paid');
            $table->float('remaining');
            $table->integer('restaurant_id')->unsigned();
            $table->foreign('restaurant_id')
                ->references('id')
                ->on('restaurants')
                ->onDelete('cascade');
            $table->text('order_note');
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
        Schema::dropIfExists('orders');
    }
}
