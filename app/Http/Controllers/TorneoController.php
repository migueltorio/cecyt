<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TorneoController extends Controller
{
    //
  

    public function get($id){
        $deporte = \App\Torneo::find($id);
        $resultado = ['data'=> $deporte->descripcion];
        return response()->json($resultado, 200);
    }
}
