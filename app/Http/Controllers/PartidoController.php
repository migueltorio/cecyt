<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use DB;

class PartidoController extends Controller
{
    //
    public function get($id){
        $partido = \App\Partido::find($id);
        $resultado = ['data'=> $partido];
        return response()->json($resultado, 200);
    }

    public function get_tantos($id)
    {
        $partido = DB::table('jugadors')
                        ->select('jugadors.id as jug_id', 'jugadors.nombre', 'partido__tantos.detalle','partido__tantos.valor', 'partidos.dep_id as dep_id','deportes.descripcion as deporte')
                        ->rightjoin('partido__tantos', 'partido__tantos.jug_id', '=', 'jugadors.id')
                        ->leftjoin('partidos','partidos.id', '=', 'partido__tantos.par_id')
                        ->leftjoin('deportes','deportes.id','=','partidos.dep_id')
                        ->where('partidos.id','=', $id)
                        ->whereNull('partido__tantos.deleted_at')
                       ->get();
        $resultado = ['data'=> $partido];
        return response()->json($resultado, 200);
    }

    public function get_tanto_equipo($id)
    {
        $partido = DB::table('partido__tantos')
                        ->select('equ_id',DB::raw('sum( valor)'))
                        ->from ('partido__tantos')
                        ->groupBy('par_id','equ_id')
                        ->orderBy('par_id')
                        ->whereNUll('deleted_at')
                        ->where('par_id','=',$id)
                        ->get();
        $resultado = ['data'=> $partido];
        return response()->json($resultado, 200);

    }

     public function get_tanto_equipos()
    {
        $partido = DB::table('partido__tantos')
                        ->select('equ_id',DB::raw('sum( valor)'))
                        ->from ('partido__tantos')
                        ->groupBy('par_id','equ_id')
                        ->orderBy('par_id')
                        ->whereNUll('deleted_at')
                        ->get();
        $resultado = ['data'=> $partido];
        return response()->json($resultado, 200);

    }



    public function post (Request $request)
    {
    	 $validator = Validator::make($request->json()->all(), [
                'dep_id' => 'required|integer',
                'tor_id' => 'required|integer',
                'fecha'=> 'required|date',
                'lugar'=>'required|string',
                'puntaje_ganador'=>'integer',
                'puntaje_derrotado' => 'integer'
            ]);
        
            if ($validator->fails()) {
                $resultado = ['status' => 'fail',
                              'message' => 'Formato de entrada incorrecto'];
                return response()->json($resultado, 400);
            }

            $partido = new \App\Partido;
            $partido->puntaje_ganador = $request->json('puntaje_ganador');
            $partido->puntaje_derrotado = $request->json('puntaje_derrotado');
            $partido->dep_id = $request->json('dep_id');
            $partido->tor_id = $request->json('tor_id');
            $partido->fecha = $request->json('fecha');
            $partido->lugar = $request->json('lugar');

            $partido->save();
            $resultado = ['status' => 'success',
                          'data' => $partido];
            return response()->json($resultado, 200);
    }

    public function put ($id, Request $request)
    {
    	$partido = \App\Partido::find($id);

    	 if ($partido==null) {
            $resultado = ['status' => 'fail',
                          'message' => 'No existe ningun dato'];
            return response()->json($resultado, 400);               
         }
         else {
       
//validamos
	        $validator = Validator::make($request->json()->all(), [
	           'dep_id' => 'integer',
                'tor_id' => 'integer',
                'fecha'=> 'date',
                'lugar'=>'string',
                'puntaje_ganador'=>'integer',
                'puntaje_derrotado' => 'integer'
	        ]);
	    
	        if ($validator->fails()) {
	            $resultado = ['status' => 'fail',
	                          'message' => 'Formato de entrada incorrecto'];
	            return response()->json($resultado, 400);
	        }

	        if($request->json('puntaje_ganador') != null)
	        {
	        	 $partido->puntaje_ganador = $request->json('puntaje_ganador');	
	        }
	         if($request->json('puntaje_derrotado') != null)
	        {
	        	 $partido->puntaje_ganador = $request->json('puntaje_derrotado');	
	        }

	        if($request->json('dep_id') != null)
	        {
	        	$partido->dep_id = $request->json('dep_id');	
	        }

	        if($request->json('tor_id') != null)
	        {
	        	$partido->tor_id = $request->json('tor_id');
	        	
	        }

	        if($request->json('fecha') != null)
	        {
	        	$partido->fecha = $request->json('fecha');
	        }
	        if($request->json('lugar') != null)
	        {
	        	$partido->lugar = $request->json('lugar');
	        }
	        $partido->save();
	        $resultado = ['status' => 'Partido Editado Satisfactoriamente',
                          'data' => $partido];
			return response()->json($resultado, 200);
    	}
    }

    public function delete ($id)
    {
    	$partido = \App\partido::find($id);

    	$partido->delete();
    	$resultado = ['status' => 'success',
                          'data' => $partido];
		return response()->json($resultado, 200);
    }
}
