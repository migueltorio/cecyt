<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

use Validator;

use Carbon;


class NoticiaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => [
            'post',
            'put',
            'delete',
            ]]);
    }
    
    public function get($id){
        $noticia = \App\Noticia::find($id);
        $resultado = ['data'=> $noticia];
        return response()->json($resultado, 200);
    }
    
    public function post(Request $request){
        if( Auth::user()->tipo_usuario != "administrador") {
            return response()->json("no autorizado", 400);   
        }
        else {
            //validamos
            $validator = Validator::make($request->json()->all(), [
                'titulo' => 'required|max:255|string',
                'contenido' => 'required|string',
            ]);
        
            if ($validator->fails()) {
                $resultado = ['status' => 'fail',
                              'message' => 'Formato de entrada incorrecto'];
                return response()->json($resultado, 400);
            }
           $mytime = Carbon\Carbon::now();
            $mytime = $mytime->toDateTimeString();
            
            //agregamos
            $noticia = new \App\Noticia;
            $noticia->titulo = $request->json('titulo');
            $noticia->contenido = $request->json('contenido');
            $noticia->fecha_ultimo_posteo = $mytime;
            $noticia->activa = true;
            $noticia->save();
            $resultado = ['status' => 'success',
                          'data' => $noticia];
                return response()->json($resultado, 200);
        }
    }
    
    public function put ($id, Request $request) {
        
    }
    
    public function delete($id){
        
    }
    
    
}
