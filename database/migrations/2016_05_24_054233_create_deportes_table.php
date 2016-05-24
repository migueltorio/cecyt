<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deportes', function (Blueprint $table) {
            
            /*campos generales*/
            $table->increments('id');
            $table->softDeletes();
            $table->timestamps();
            
            /*campos propios de la clase*/
            $table->integer('par_id')->unsigned();
            $table->foreign('par_id')->references('id')->on('partidos');
            $table->text('descripcion');
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
        Schema::drop('deportes');
    }
}
