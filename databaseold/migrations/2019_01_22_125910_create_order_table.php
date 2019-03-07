<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('branch_id');
            $table->integer('cashier_id');
            $table->integer('waiter_id')->nullable();
            $table->integer('table_id')->nullable();
            $table->enum('type',['table','delivery','takeaway','fastfood'])->default('table');
            $table->enum('status',['new','pending','inprogress','served','paid','unpaid'])->default('new');
            $table->text('notes')->nullable();
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onDelete('cascade')
                ->onUpdate('cascade');

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
        Schema::dropIfExists('order');
    }
}
