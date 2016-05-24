<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMateriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materias', function (Blueprint $table) {
            
            /*campos generales*/
            $table->increments('id');
            $table->softDeletes();
            $table->timestamps();
            
            /*campos propios de la clase*/
            $table->integer('car_id')->unsigned();
            $table->foreign('car_id')->references('id')->on('carreras');
            $table->string('codigocyt');
            $table->text('descripcion');
            $table->boolean('activa');


            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('materias');
    }
}
