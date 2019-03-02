<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportTypeTranslationsTable extends Migration
{
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_type_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('report_type_id');
            $table->string('type');
            $table->string('locale')->index();


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
        Schema::dropIfExists('report_type_translations');
    }
}
