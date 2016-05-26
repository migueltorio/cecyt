<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partido_Tanto extends Model
{
    //establecemos nombre de la tabla
    protected $table = 'partido_tantos';
    //protegemos los campos contra asignación masiva
    protected $guarded = ['*'];
    
    //activamos softdelete
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    //RELACIONES
     public function partidos() {
        return $this->belongsTo('Partido');
    }
    public function equipos() {
        return $this->belongsTo('Equipo');
    }
}
