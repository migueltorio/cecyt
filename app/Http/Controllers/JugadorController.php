<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use DB;


class JugadorController extends Controller
{
    //
    public function get ($id)
    {
    	$jugador = \App\Jugador::find($id);
    	$resultado = ['data'=> $jugador];
        return response()->json($resultado, 200);

    }

    public function get_equipo($id)
    {
        $jugador = \App\Jugador::find($id);
        $ideq = \App\Jugador_Equipo::select('equ_id')->where('jug_id','=',$id)->get();

        $equipo = DB::table('equipos')
                            ->select('equipos.id', 'nombre')
                            ->rightJoin('jugador__equipos','equipos.id','=', 'jugador__equipos.equ_id')
                            ->where('jugador__equipos.jug_id','=',$id, 'AND', 'jugador__equipos.deleted_at','is','null')
                            ->whereNull('jugador__equipos.deleted_at')
                            ->get();
        $resultado = ['data'=> $equipo];
        return response()->json($resultado, 200);
    }

    public function post (Request $request)
    {
    	//validamos
            $validator = Validator::make($request->json()->all(), [
                'usu_id' => 'integer',
                'nombre' =>'required|string',
            ]);
        //return json_encode($request->json()->all());
        
            if ($validator->fails()) {
                $resultado = ['status' => 'fail',
                              'message' => 'Formato de entrada incorrecto'];
                return response()->json($resultado, 400);
            }

            $jugador =  new \App\Jugador;
            if ($request->json('usu_id')!= null){ $jugador->usu_id = $request->json('usu_id');};
            $jugador->nombre = $request->json('nombre');
            $jugador->save();
            $resultado = ['status' => 'Jugador Agregado Exitosamente',
                          'data' => $jugador];
            return response()->json($resultado, 200);
    }

    public function put ($id, Request $request)
    {
    	$jugador = \App\Jugador::find($id);

    	if($jugador == null)
    	{

    		$resultado = ['status' => 'fail',
                              'message' => 'No existe ningun dato'];
            return response()->json($resultado, 400);               
         }
         else
         {
         	$validator = Validator::make($request->json()->all(), [
                'usu_id' => 'integer',
                'nombre' => 'string',
            ]);
        
            if ($validator->fails()) {
                $resultado = ['status' => 'fail',
                              'message' => 'Formato de entrada incorrecto'];
                return response()->json($resultado, 400);
            }

            if($request->json('usu_id') != null){ $jugador->usu_id = $request->json('usu_id');};
            if($request->json('nombre') != null){ $jugador->nombre = $request->json('nombre');};
            $jugador->save();
            $resultado = ['status' => 'Jugador Editado Satisfactoriamente',
                          'data' => $jugador];
            return response()->json($resultado, 200);

                
         }

    }

    public function delete ($id)
    {
    	$jugador = \App\Jugador::find($id);

    	$jugador->delete();
    	$resultado = ['status' => 'success',
                          'data' => $jugador];
        return response()->json($resultado, 200);
    }

}
