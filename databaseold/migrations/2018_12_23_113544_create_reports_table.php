<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->string('email')->nullable();
            $table->unsignedInteger('report_type_id');
            $table->text('text');
            $table->string('url');
            $table->string('section');
            $table->timestamps();

            $table->foreign('report_type_id')
                  ->references('id')
                  ->on('report_types')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
