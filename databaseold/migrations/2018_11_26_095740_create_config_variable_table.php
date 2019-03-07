<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigVariableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_variable', function (Blueprint $table) {
            $table->increments('id');
            $table->string('variable');
            $table->string('variable_translation');
            $table->string('variable_parameters_translation',1024)->nullable();
            $table->string('section');
            $table->text('value')->nullable();
            $table->text('data')->nullable();
            $table->integer('sort_order')->nullable();
            $table->enum('type',['numeric','string','text','choice','boolean'])->default('string');
            $table->enum('scope',['global','overridable','user'])->default('global');
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
        Schema::dropIfExists('config_variables');
    }
}
