<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('icon');
            $table->tinyInteger('active')->default(1);
            $table->timestamps();
        });

        Schema::create('payment_method_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');

            $table->integer('payment_method_id')->unsigned()->index();
            $table->string('locale')->index();

            $table->unique(['payment_method_id','locale']);
            $table->unique(['payment_method_id','name']);

            $table->foreign('payment_method_id')
                ->references('id')
                ->on('payment_methods')
                ->onDelete('cascade');

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
        Schema::dropIfExists('payment_methods');
    }
}
