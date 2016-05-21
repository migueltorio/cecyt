<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    //establecemos nombre de la tabla
    protected $table = 'users';
    //protegemos los campos contra asignación masiva
    protected $guarded = ['*'];
    
    //activamos softdelete
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    //campos ocultos que no se devuelven nunca en un array
    protected $hidden = [
        'password', 
        'remember_token',
        'created_at',
        'updated_at'
    ];
    

    //relaciones del modelo con otros modelos
    public function horarios()
    {
        //este modelo tiene muchos horarios y la clave es user_id en la tabla foranea
        return $this->hasMany('App\Horarios', 'user_id');
    }
    
}
