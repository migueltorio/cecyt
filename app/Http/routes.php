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
        Route::get('/',function (){return view('welcome');});



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
        Route::get('/api/noticias/{id}','NoticiaController@get')->where('id', '[0-9]+');;
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
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
