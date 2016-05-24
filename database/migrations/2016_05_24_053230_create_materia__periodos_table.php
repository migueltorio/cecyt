<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMateriaPeriodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materia__periodos', function (Blueprint $table) {
            $table->increments('id');
            $table->softDeletes();
            $table->timestamps();  
            
            $table->integer('mat_id')->unsigned();
            $table->foreign('mat_id')->references('id')->on('materias');
            $table->integer('per_id')->unsigned();
            $table->foreign('per_id')->references('id')->on('periodos');           
            $table->boolean('activo');           

            

            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('materia__periodos');
    }
}
