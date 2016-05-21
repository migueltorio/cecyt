<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
            /* campos comunes a toda la bd */
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            
            /* otros campos */
            $table->string('descripcion');
            $table->integer('semestre');
            $table->integer('ano');
            $table->integer('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('horarios');
    }
}
