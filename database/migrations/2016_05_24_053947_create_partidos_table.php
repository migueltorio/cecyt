<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partidos', function (Blueprint $table) {
            
            /*campos generales*/
            $table->increments('id');
            $table->softDeletes();
            $table->timestamps();
            
            /*campos propios de la clase*/
            $table->date('fecha');
            $table->string('lugar');
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
        Schema::drop('partidos');
    }
}
