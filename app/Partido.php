<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    //establecemos nombre de la tabla
    protected $table = 'partidos';
    //protegemos los campos contra asignación masiva
    protected $guarded = ['*'];
    
    //activamos softdelete
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    //RELACIONES
   
    Public function deportes() {
        return $this->hasMany('Partido');
    }
    Public function partido_tantos() {
        return $this->hasMany('Partido');
    }
    public function equipos() {
        return $this->belongsToMany('Equipo', 'partido__equipos', 'par_id', 'equ_id');
    }
}
