<?php

namespace App\Http\Controllers;



use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;



class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;



}
/*
class DeporteController extends Controller
{
	public function index()
	{
		$deportes = Deporte::all();
		return view ('deportes.index', ['deportes' => $deportes]);
	}
	/*public function store(Request $request)
	{

	}*/
//}
