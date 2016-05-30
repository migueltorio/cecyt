<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;

class DeporteController extends Controller
{
    //
    public function get($id){
        $ddeporte = \App\Deporte::find($id);
        $resultado = ['data'=> $deporte];
        return response()->json($resultado, 200);
    }

    public function post (Request $request)
    {
    	$validator = Validator::make($request->json()->all(), [
                'descripcion' => 'required|string',
                
            ]);
        
            if ($validator->fails()) {
                $resultado = ['status' => 'fail',
                              'message' => 'Formato de entrada incorrecto'];
                return response()->json($resultado, 400);
            }

            $deporte = new \App\Deporte;
            $deporte->descripcion = $request->json('descripcion');
            $deporte->save();
             $resultado = ['status' => 'success',
                          'data' => $deporte];
                return response()->json($resultado, 200);
    }

    public function put ($id , Request $request)
    {
    	$deporte = \App\Deporte::find($id);

    	if ($deporte == null)
    	{
    		$resultado = ['status' => 'fail',
                              'message' => 'No existe ningun dato'];
                return response()->json($resultado, 400);  
    	}
    	else
    	{
    		 $validator = Validator::make($request->json()->all(), [
                'descripcion' => 'required|max:255|string',
                
            ]);
        
            if ($validator->fails()) {
                $resultado = ['status' => 'fail',
                              'message' => 'Formato de entrada incorrecto'];
                return response()->json($resultado, 400);
            }
            $deporte->descripcion = $request->json('descripcion');
            $deporte->save();
             $resultado = ['status' => 'Discusion Editada Satisfactoriamente',
                          'data' => $deporte];
            return response()->json($resultado, 200);

                

    	}
    }

    public function delete ($id)
    {
		$deporte = \App\Deporte::find($id);
		$deporte->delete();
		$resultado = ['status' => 'success',
                          'data' => $deporte];
        return response()->json($resultado, 200);
    }

}
