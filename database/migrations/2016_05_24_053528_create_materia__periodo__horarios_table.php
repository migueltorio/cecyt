<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMateriaPeriodoHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materia__periodo__horarios', function (Blueprint $table) {
            /*Campos generales*/
            $table->increments('id');
            $table->softDeletes();
            $table->timestamps();
            
            /*Campos propios de la clase*/
            $table->integer('mat_per_id')->unsigned();
            $table->foreign('mat_per_id')->references('id')->on('materia__periodos'); 
            $table->integer('dia_semana');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->string('aula');
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('materia__periodo__horarios');
    }
}
