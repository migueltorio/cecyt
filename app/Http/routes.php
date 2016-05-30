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

    //VISTAS
        Route::get('/login',function (){return view('login');});
//mio
        //deportes
        Route::get('/api/deporte/{id}','DeporteController@get');
        Route::post('api/deporte', 'DeporteController@post');
        Route::delete('api/deporte/{id}','DeporteController@delete');
        Route::put('api/deporte/{id}','DeporteController@put');
        //jugador
        Route::get('/api/jugador/{id}','JugadorController@get');
        Route::get('/api/jugadorEquipo/{id}','JugadorController@get_equipo'); //devuelve el equipo en el que se encuentra el jugador, recibe el id del jugador
        Route::post('/api/jugador','JugadorController@post');
        Route::put('/api/jugador/{id}','JugadorController@put');
        Route::delete('/api/jugador/{id}','JugadorController@delete');
        //equipo
        Route::get('/api/equipo/{id}','EquipoController@get');
        Route::post('/api/equipo','EquipoController@post');
        Route::put('/api/equipo/{id}','EquipoController@put');
        Route::delete('/api/equipo/{id}','EquipoController@delete');
        //ver miembros del equipo
        Route::get('/api/equipoMiembros/{id}','EquipoController@get_miembros');
        //torneo
        Route::get('/api/torneo/{id}','TorneoController@get');
        Route::get('/api/torneolista','TorneoController@get_todos');
        Route::post('/api/torneo','TorneoController@post');
        Route::put('/api/torneo/{id}','TorneoController@put');
        Route::delete('/api/torneo/{id}','TorneoController@delete');
        //ver horario torneos
        Route::get('/api/torneoHorario/{id}','TorneoController@get_horario');
        Route::get('/api/torneoPartido/{id}','TorneoController@get_partidos');
        //recibe el id del torneo y devuelve el horario de los partidos
        //partido
        Route::get('/api/partido/{id}','PartidoController@get');
        Route::post('/api/partido','PartidoController@post');
        Route::put('/api/partido/{id}','PartidoController@put');
        Route::delete('/api/partido/{id}','PartidoController@delete');
        //devuelve los tantos el partido
        Route::get('/api/partidoTantos/{id}','PartidoController@get_tantos');
        Route::get('/api/partidoTantosEquipo/{id}','PartidoController@get_tanto_equipo');
        Route::get('/api/partidoTantosEquipo','PartidoController@get_tanto_equipos');
        //partido tanto
        Route::get('/api/partido_tanto/{id}','Partido_TantoController@get');
        Route::post('/api/partido_tanto','Partido_TantoController@post');
        Route::put('/api/partido_tanto/{id}','Partido_TantoController@put');
        Route::delete('/api/partido_tanto/{id}','Partido_TantoController@delete');
        //partido equipo
        Route::get('/api/partido_equipo/{id}','Partido_EquipoController@get');
        Route::post('/api/partido_equipo','Partido_EquipoController@post');
        Route::put('/api/partido_equipo/{id}','Partido_EquipoController@put');
        Route::delete('/api/partido_equipo/{id}','Partido_EquipoController@delete');
        //jugador equipo
        Route::get('/api/jugador_equipo/{id}','Jugador_EquipoController@get');
        Route::post('/api/jugador_equipo','Jugador_EquipoController@post');
        Route::put('/api/jugador_equipo/{id}','Jugador_EquipoController@put');
        Route::delete('/api/jugador_equipo/{id}','Jugador_EquipoController@delete');
        //





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
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
