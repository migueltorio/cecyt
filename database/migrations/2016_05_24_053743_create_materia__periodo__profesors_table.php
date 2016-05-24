<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMateriaPeriodoProfesorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materia__periodo__profesors', function (Blueprint $table) {
            
            /*campos generales*/
            $table->increments('mat_per_pro_id');
            $table->softDeletes();            
            $table->timestamps();
            
            /*campos propios de la clase*/
            $table->integer('mat_per_id')->unsigned();
            $table->foreign('mat_per_id')->references('id')->on('materia__periodos'); 
            $table->string('profesor');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('materia__periodo__profesors');
    }
}
