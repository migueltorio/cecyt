<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.

*/




    //prueba
Route::get('/crearjugador', function () {

    //instancio el modelo
  /* $jugador = new \App\jugador;
    //le cargo los valores
    $jugador->nombre = 'Fulano de tal';
    $jugador->usu_id = null; //esto suponiendo que el jugador no es miembro del sistema
    $jugador->save();
    $jugador->id; //aca ya esta generado el id
    return json_encode($jugador);
*/

    //probar deporte
/*
    $jugador = new \App\Deporte;
    //le cargo los valores
    $jugador->descripcion = 'Futbol';
    $jugador->save();
   
    return json_encode($jugador);
*/
    //probar torneo
 /*   
     $jugador = new \App\Torneo;
    //le cargo los valores
    $jugador->nombre = 'Futbol CYT';
    $jugador->dep_id = 1;
    $jugador->campeon_id = 1;
    $jugador->descripcion = 'es un torneo de prueba 1';
    $jugador->save();
    return json_encode($jugador);
    */

    //probar equipo
    /*
    $jugador = new \App\Equipo;
    //le cargo los valores
    $jugador->nombre = 'Equipo 1 CYT';
    $jugador->dep_id = 1;
    $jugador->save();
    return json_encode($jugador);
    */

    //probar partido
    /*
    $jugador = new \App\Partido;
    //le cargo los valores
    $jugador->dep_id = 1;
    $jugador->tor_id = 1;
    $jugador->fecha = '27/02/1992';
    $jugador->lugar = 'la esquina';
    $jugador->puntaje_ganador = 2;
    $jugador->puntaje_derrotado = 1;

    $jugador->save();
    return json_encode($jugador);
    */

    //probar partido_tanto
    /*
    $jugador = new \App\Partido_Tanto;
    $jugador->jug_id = 1;
    $jugador->par_id = 3;
    $jugador->valor = 2;
    $jugador->detalle = 'gol de larga distancia';
    $jugador->save();
    return json_encode($jugador);
    */

    //probar partido equipo
    /*
    $jugador = new \App\Partido_Equipo;
    $jugador->part_id = 3;
    $jugador->equ_id = 1;
    $jugador->save();
    return json_encode($jugador);
    */
/*
    $jugador = new \App\Jugador_Equipo;
    $jugador->jug_id =1;
    $jugador->equ_id = 1;
    $jugador->save();
    return json_encode($jugador);
*/
});

Route::get('/creardeporte', function () {

    //instancio el modelo
    $jugador = new \App\jugador;
    //le cargo los valores
    $jugador->nombre = 'Fulano de tal';
    $jugador->usu_id = null; //esto suponiendo que el jugador no es miembro del sistema
    $jugador->save;

    $jugador->id; //aca ya esta generado el id
    return json_encode($jugador);


});


    //VISTAS
        Route::get('/login',function (){return view('login');});
//mio
        Route::get('/api/torneo/{id}','TorneoController@get')->where('id', '[0-9]+');;

    //API
    //
    //RUTAS 
    //  Login
        Route::post('/api/login/iniciarSesion','LoginController@iniciarSesion');
        Route::post('/api/login/crearCuenta','LoginController@crearCuenta');
        Route::get('/api/login/activarCuenta/{email}/{token}','LoginController@activarCuenta')
                ->where('email','[A-Z0-9a-z._%+-]+@[A-Za-z0-9.-]+\\.[A-Za-z]{2,6}')
                ->where('token','[A-Za-z0-9]{10,10}');
    //  Noticia
        Route::get('/api/noticias/{id}','NoticiaController@get')->where('id', '[0-9]{1,99}');;
        Route::post('/api/noticias','NoticiaController@post');
        Route::put('/api/noticias/{id}','NoticiaController@put')->where('id', '[0-9]+');;
        Route::delete('/api/noticias/{id}','NoticiaController@delete')->where('id', '[0-9]+');;
    //  NoticiaComentario
        /*
        Route::get('/api/noticiaComentario/{id}','NoticiaComentarioController@get')->where('id', '[0-9]+');;
        Route::post('/api/noticiaComentario','NoticiaComentarioController@post');
        Route::put('/api/noticiaComentario/{id}','NoticiaComentarioController@put')->where('id', '[0-9]+');;
        Route::delete('/api/noticiaComentario/{id}','NoticiaComentarioController@delete')->where('id', '[0-9]+');;
        */
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
