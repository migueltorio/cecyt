<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

use Auth;

use GuzzleHttp\Exception\RequestException;



class LoginController extends Controller
{
    public function iniciarSesion(Request $request)
    {

        //validamos
        $validator = Validator::make($request->json()->all(), [
            'email' => 'required|max:255|email',
            'password' => 'required|max:255|string',
        ]);
        
        if ($validator->fails()) {
            $resultado = ['status' => 'fail',
                          'message' => 'Debe propocionar un email y una contraseña'];
            return response()->json($resultado, 400);
        }
        
        //responder
        if (Auth::attempt(['email' => $request->json('email'), 
                           'password' => $request->json('password')])) 
            {
            $resultado = ['status' => 'success',
                          'redirect' => 'index'];
            return response()->json($resultado, 200);
            }
        else 
            {
            $resultado = ['status' => 'error',
                          'message' => 'Email y/o contraseña incorrectos'];
            return response()->json($resultado, 400);
            }
        
    }



    public function crearCuenta(Request $request)
    {
        //validamos entrada
        $validator = Validator::make($request->json()->all(), [
            'email' => 'required|max:255|email',
            'password' => 'required|max:255|string',
            'tipo_documento' => 'required|max:255|string',
            'pais_documento' => 'required|max:255|string',
            'numero_documento' => 'required|max:255|string',
        ]);
                
        if ($validator->fails()) {
            $resultado = ['status' => 'fail',
                          'message' => 'Faltan datos para procesar la petición'];
            return response()->json($resultado, 400);
        }
        
        //obtenemos los datos de api.sapientia.tk/v1/alumnos
        $client = new \GuzzleHttp\Client(['verify'=>false]);
        try 
        {
            $alumnos = $client->get('http://api.sapientia.tk/v1/alumnos?tipo_documento=' . $request->json('tipo_documento') . '&numero_documento=' . $request->json('numero_documento') . '&pais_documento=' . $request->json('pais_documento') . '&email=' . $request->json('email'));
        } 
        catch (RequestException $e) 
        {        
            $resultado = ['status' => 'error',
                          'message' => 'Error al intentarse conectarse con SAPIENTIA'];
            return response()->json($resultado, 500);
        }
        
        $alumnos = json_decode($alumnos->getBody(),true);

        //verificamos que haya algun alumno
        if (count($alumnos["data"]["alumnos"])==0) 
        {
            $resultado = ['status' => 'fail',
                          'message' => 'Los datos que ingreso no corresponden a un alumno'];
            return response()->json($resultado, 200);
        }
        
        //verificamos que el alumno ya no exista
        $user =  \App\User::where('email', $request->json('email'))->first();
        if ($user!=null)
        {
            $resultado = ['status' => 'fail',
                          'message' => 'El alumno ya existe en el sistema'];
            return response()->json($resultado, 200);
        }
        
        
        try 
        {
            //agregamos el usuario al sistema
            $user = new \App\User;
            $user->email = $request->json('email');
            $user->numero_documento = $request->json('numero_documento');
            $user->tipo_documento = $request->json('tipo_documento');
            $user->pais_documento = $request->json('pais_documento');
            $user->nombre = $alumnos["data"]["alumnos"][0]["nombre"];
            $user->password= bcrypt($request->json('pais_documento'));
            $user->tipo_usuario= 'alumno';
            $user->estado= 'inactivo';
            $user->save();
            
            //enviamos el mail de confirmacion
            

        } catch (\Exception $e) {
               return $e;
        }
            
  
        
        
     
    
}
}
