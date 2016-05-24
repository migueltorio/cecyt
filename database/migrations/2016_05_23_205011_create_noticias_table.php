<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticias', function (Blueprint $table) {
            /*Campos comunes a todas las tablas*/
            $table->increments('id');
            $table->softDeletes();
            $table->timestamps();

            /*Campos propios de la clase*/
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('not_titulo');
            $table->text('not_contenido');
            $table->dateTime('not_fecha_ultimo_posteo');
            $table->boolean('not_activa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('noticias');
    }
}
