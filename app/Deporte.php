<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deporte extends Model
{
    //establecemos nombre de la tabla
    protected $table = 'deportes';
    //protegemos los campos contra asignación masiva
    protected $guarded = ['*'];
    
    //activamos softdelete
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    //RELACIONES
     public function partido() {
        return $this->belongsTo('Partido');
    }
    
    Public function equipo() {
        return $this->hasMany('Deporte');
    }
   
    }}
