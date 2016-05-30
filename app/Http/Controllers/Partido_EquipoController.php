<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;


class Partido_EquipoController extends Controller
{
    //
     public function get($id){
        $pe = \App\Partido_Equipo::find($id);
        $resultado = ['data'=> $pe];
        return response()->json($resultado, 200);
    }

    public function post (Request $request)
    {
    	$validator = Validator::make($request->json()->all(), [
                'equ_id' => 'required|integer',
                'part_id' => 'required|integer',
            ]);
        
        if ($validator->fails()) {
            $resultado = ['status' => 'fail',
                          'message' => 'Formato de entrada incorrecto'];
            return response()->json($resultado, 400);
        }

        $pe = new \App\Partido_Equipo;
        $pe->equ_id = $request->json('equ_id');
        $pe->part_id = $request->json('part_id');

        $pe->save();
        $resultado = ['status' => 'success',
                          'data' => $pe];
        return response()->json($resultado, 200);


	}

	public function put ($id, Request $request)
	{
		$pe = \App\Partido_Equipo::find($id);

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
                'part_id' => 'integer',
            ]);
        
            if ($validator->fails()) {
                $resultado = ['status' => 'fail',
                              'message' => 'Formato de entrada incorrecto'];
                return response()->json($resultado, 400);
            }


  //agregamos
            if ($request->json('part_id')!=null) { $pe->part_id = $request->json('part_id'); }
            if ($request->json('equ_id')!=null) { $pe->equ_id = $request->json('equ_id'); }
            $pe->save();
            $resultado = ['status' => 'succes',
                          'data' => $pe];
			return response()->json($resultado, 200);

        } 
	}

	public function delete($id)
	{
		$pe = \App\Partido_Equipo::find($id);

		$pe->delete();

		$resultado = ['status' => 'success',
                          'data' => $pe];
		return response()->json($resultado, 200);
	}
}
