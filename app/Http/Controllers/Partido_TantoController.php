<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;


class Partido_TantoController extends Controller
{
    public function get($id){
        $partido_tanto = \App\Partido_Tanto::find($id);
        $resultado = ['data'=> $partido_tanto];
        return response()->json($resultado, 200);
    }

    

    public function post (Request $request)
    {
    	//validamos
            $validator = Validator::make($request->json()->all(), [
                'par_id' => 'required|integer',
                'jug_id' => 'required|integer',
                'equ_id' => 'required|integer',
                'valor' => 'required|integer',
                'detalle' => 'string',
            ]);
        
            if ($validator->fails()) {
                $resultado = ['status' => 'fail',
                              'message' => 'Formato de entrada incorrecto'];
                return response()->json($resultado, 400);
            }

            $tanto = new \App\Partido_Tanto;
            $tanto->par_id = $request->json('par_id');
            $tanto->equ_id = $request->json('equ_id');
            $tanto->jug_id = $request->json('jug_id');
            $tanto->valor=$request->json('valor');
            $tanto->detalle = $request->json('detalle');

            $tanto->save();
            $resultado = ['status' => 'success',
                          'data' => $tanto];
            return response()->json($resultado, 200);
    }

    public function put ($id, Request $request)
    {
    	$tanto = \App\Partido_Tanto::find($id);

    	  if ($tanto==null) {
                $resultado = ['status' => 'fail',
                              'message' => 'No existe ningun dato'];
                return response()->json($resultado, 400);               
             }
             else {
           
  //validamos
            $validator = Validator::make($request->json()->all(), [
                'par_id' => 'integer',
                'jug_id' => 'integer',
                'equ_id' => 'integer',
                'valor' => 'integer',
                'detalle' => 'string',
            ]);
        
            if ($validator->fails()) {
                $resultado = ['status' => 'fail',
                              'message' => 'Formato de entrada incorrecto'];
                return response()->json($resultado, 400);
            }

            if($request->json('par_id') != null) {  $tanto->par_id = $request->json('par_id');}
            if($request->json('equ_id') != null) {  $tanto->equ_id = $request->json('equ_id');}
            if($request->json('jug_id') != null) {  $tanto->jug_id = $request->json('jug_id');}
            if($request->json('valor') != null) {  $tanto->valor = $request->json('valor');}
            if($request->json('detalle') != null) {  $tanto->detalle = $request->json('detalle');}

            $tanto->save();
            $resultado = ['status' => 'Success',
                          'data' => $tanto];
			return response()->json($resultado, 200);


        }
    }

    public function delete($id)
    {
    	$tanto = \App\Partido_Tanto::find($id);

    	$tanto->delete();
    	$resultado = ['status' => 'success',
                          'data' => $tanto];
		return response()->json($resultado, 200);
    }
}
