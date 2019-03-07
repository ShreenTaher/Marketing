<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComboPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('combo_photos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('photo');
            $table->integer('is_main_photo')->default(0);

            $table->integer('combo_id')->unsigned()->index();

            $table->foreign('combo_id')
                ->references('id')
                ->on('combos')
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
        Schema::dropIfExists('menu_photos');
    }
}
