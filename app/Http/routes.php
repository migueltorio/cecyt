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



Route::get('/', function () {
    $data = ['url'=>'/hola','nombre'=>'Miguel'];
    Mail::send('emails.activacion', $data, function ($message) {
    $message->from('no-reply@cecytuca.tk', 'prueba');

    $message->to('miguel@torbo.com.py');
});
});

Route::get('/login', function () { return view('login');});

Route::post('/iniciarSesion','LoginController@iniciarSesion');
Route::post('/crearCuenta','LoginController@crearCuenta');


//Route::auth();

//Route::get('/home', 'HomeController@index');
