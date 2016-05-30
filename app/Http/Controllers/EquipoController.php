<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use DB;

class EquipoController extends Controller
{
    //

    public function get ($id)
    {
    	$equipo = \App\Equipo::find($id);
    	$resultado = ['data'=> $equipo];
        return response()->json($resultado, 200);
    }

    public function get_miembros ($id)
    {
        $equipo = \App\Equipo::find($id);
        $jugadores = DB::table('jugadors')
                        ->select('jugadors.id','jugadors.nombre')
                        ->rightjoin('jugador__equipos','jugadors.id','=', 'jugador__equipos.jug_id')
                        ->where ('jugador__equipos.equ_id','=',$id,'AND','jugador__equipos.deleted_at','is','null')
                        ->whereNull('jugador__equipos.deleted_at')
                        ->groupBy('jugadors.id')
                        ->get();

        $resultado = ['data'=> $jugadores];
        return response()->json($resultado, 200);
    }

    public function post (Request $request)
    {
    	 $validator = Validator::make($request->json()->all(), [
                'dep_id' => 'required|integer',
                'nombre' => 'required|string',
            ]);
        
        if ($validator->fails()) {
            $resultado = ['status' => 'fail',
                          'message' => 'Formato de entrada incorrecto'];
            return response()->json($resultado, 400);
        }

        $equipo = new \App\Equipo;
        $equipo->dep_id = $request->json('dep_id');
        $equipo->nombre = $request->json('nombre');
        $equipo->save();
        $resultado = ['status' => 'success',
                          'data' => $equipo];
        return response()->json($resultado, 200);



    }

    public function put ($id,Request $request)
    {
    	$equipo = \App\Equipo::find($id);
    	if ($equipo==null) 
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
            ]);
        
            if ($validator->fails()) {
                $resultado = ['status' => 'fail',
                              'message' => 'Formato de entrada incorrecto'];
                return response()->json($resultado, 400);
            }

            if ($request->json('dep_id')!=null) { $equipo->dep_id = $request->json('dep_id'); }
            if ($request->json('nombre')!=null) {   $equipo->nombre = $request->json('nombre');}

            $equipo->save();
            $resultado = ['status' => 'Discusion Editada Satisfactoriamente',
                          'data' => $equipo];
            return response()->json($resultado, 200);

	    }
    }

    public function delete ($id)
    {
    	$equipo = \App\Equipo::find($id);

    	$equipo->delete();
    	$resultado = ['status' => 'success',
                          'data' => $equipo];
        return response()->json($resultado, 200);
    }
}
