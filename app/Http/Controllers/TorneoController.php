<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Validator;
use Carbon;
use DB;

class TorneoController extends Controller
{
    //
  	

    public function get($id){
        $torneo = \App\Torneo::find($id);
        $resultado = ['data'=> $torneo];
        return response()->json($resultado, 200);
    }

    public function get_todos()
    {
      $torneo = \App\Torneo::select('nombre','descripcion','dep_id')->get();
      

      $resultado = ['torneo'=>$torneo];
      return response()->json($resultado,200);

    }

    public function get_horario($id)
    {
      $torneo = DB::table('partidos')
                    ->select('partidos.fecha','partidos.lugar','deportes.id as dep_id', 'deportes.descripcion as descripcion_deporte', 'torneos.id as tor_id', 'torneos.nombre as torneo ')
                    ->rightjoin('torneos','torneos.id','=','partidos.tor_id')
                    ->rightjoin('deportes','deportes.id','=','partidos.dep_id')
                    ->where('torneos.id','=',$id)
                    ->whereNull('partidos.deleted_at')
                    ->get();
        $resultado = ['data'=> $torneo];
        return response()->json($resultado, 200);
    }

    public function get_partidos($id)
    {
      $torneo = DB::table('partido__tantos')
                  ->select('partido__tantos.equ_id', DB::raw('sum(valor)'))
                  ->leftjoin('partidos', 'partidos.id','=','partido__tantos.par_id')
                  ->leftjoin('torneos', 'partidos.tor_id', '=', 'torneos.id')
                  ->where('torneos.id', '=', $id)
                  ->whereNull('partidos.deleted_at')
                  ->groupBy('partido__tantos.par_id', 'partido__tantos.equ_id')
                  ->orderBy('partido__tantos.par_id')
                  ->get();
      $resultado = ['data'=> $torneo];
      return response()->json($resultado, 200);

    }

    public function post(Request $request){
         //validamos
            $validator = Validator::make($request->json()->all(), [
                'dep_id' => 'required|integer',
                'nombre' => 'required|string',
                'descripcion' => 'string'
            ]);
        
            if ($validator->fails()) {
                $resultado = ['status' => 'fail',
                              'message' => 'Formato de entrada incorrecto'];
                return response()->json($resultado, 400);
            }

            $torneo = new \App\Torneo;
            $torneo->dep_id = $request->json('dep_id');
            $torneo->nombre = $request->json('nombre');
            if($request->json('descripcion')!=null){$torneo->descripcion = $request->json('descripcion');}
            $torneo->save();
            $resultado = ['status' => 'success',
                          'data' => $torneo];
            return response()->json($resultado, 200);
    }

    public function put ($id, Request $request)
    {
        $torneo = \App\Torneo::find($id);
        if ($torneo==null) 
        {
            $resultado = ['status' => 'fail',
                          'message' => 'No existe ningun dato'];
            return response()->json($resultado, 400);               
        }
        else 
        {
            $validator = Validator::make($request->json()->all(), [
                'dep_id' => 'integer',
                'nombre' => 'string',
                'campeon_id' => 'integer',
                'descripcion' => 'string',
            ]);
        
            if ($validator->fails()) {
                $resultado = ['status' => 'fail',
                              'message' => 'Formato de entrada incorrecto'];
                return response()->json($resultado, 400);
            }

             if($request->json('dep_id')!=null){$torneo->dep_id = $request->json('dep_id');}
             if($request->json('nombre')!=null){$torneo->nombre = $request->json('nombre');}
             if($request->json('campeon_id')!=null){$torneo->campeon_id = $request->json('campeon_id');}
             if($request->json('descripcion')!=null){$torneo->descripcion = $request->json('descripcion');}

             $torneo->save();
             $resultado = ['status' => 'Discusion Editada Satisfactoriamente',
                          'data' => $torneo];
            return response()->json($resultado, 200);
        }
    }

    public function delete($id)
    {
        $torneo = \App\Torneo::find($id);

        $torneo->delete();
        $resultado = ['status' => 'success',
                          'data' => $torneo];
        return response()->json($resultado, 200);
    }


}
