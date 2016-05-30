<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;


class Jugador_EquipoController extends Controller
{
    //
    public function get($id){
        $pe = \App\Jugador_Equipo::find($id);
        $resultado = ['data'=> $pe];
        return response()->json($resultado, 200);
    }

    public function post (Request $request)
    {
    	$validator = Validator::make($request->json()->all(), [
                'jug_id' => 'required|integer',
                'equ_id' => 'required|integer',
            ]);
        
        if ($validator->fails()) {
            $resultado = ['status' => 'fail',
                          'message' => 'Formato de entrada incorrecto'];
            return response()->json($resultado, 400);
        }

        $pe = new \App\Jugador_Equipo;
        $pe->equ_id = $request->json('equ_id');
        $pe->jug_id = $request->json('jug_id');

        $pe->save();
        $resultado = ['status' => 'success',
                          'data' => $pe];
        return response()->json($resultado, 200);


	}

	public function put ($id, Request $request)
	{
		$pe = \App\Jugador_Equipo::find($id);

		if ($pe==null) 
		{
			
			$resultado = ['status' => 'fail',
						  'message' => 'No existe ningun dato'];
			return response()->json($resultado, 400);               
		 }
		 else 
		 {
           
  //validamos
            $validator = Validator::make($request->json()->all(), [
                'equ_id' => 'integer',
                'jug_id' => 'integer',
            ]);
        
            if ($validator->fails()) {
                $resultado = ['status' => 'fail',
                              'message' => 'Formato de entrada incorrecto'];
                return response()->json($resultado, 400);
            }


  //agregamos
            if ($request->json('jug_id')!=null) { $pe->jug_id = $request->json('jug_id'); }
            if ($request->json('equ_id')!=null) { $pe->equ_id = $request->json('equ_id'); }
            $pe->save();
            $resultado = ['status' => 'succes',
                          'data' => $pe];
			return response()->json($resultado, 200);

        } 
	}

	public function delete($id)
	{
		$pe = \App\Jugador_Equipo::find($id);

		$pe->delete();

		$resultado = ['status' => 'success',
                          'data' => $pe];
		return response()->json($resultado, 200);
	}
}
