<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Horarios extends Model
{
    
    //establecemos nombre de la tabla
    protected $table = 'horarios';
    //protegemos los campos contra asignación masiva
    protected $guarded = ['*'];
    
    //activamos softdelete
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    //campos ocultos que no se devuelven nunca en un array
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
        
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

}
