<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegionsTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regions_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('region_id');
            $table->string('name');
            $table->string('locale')->index();


            $table->foreign('region_id')
                  ->references('id')
                  ->on('regions')
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
        Schema::dropIfExists('regions_translations');
    }
}
