<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    protected $fillable = [
        'habitacion', 'tipoincidencia', 'problema','solucion','observaciones','facturable','estado','solution_at',
    ];

    public $timestamps=true;


    /**
     * actualizar
     * @param $id
     * @param $requestact
     */
    public function actualizar($request){


        $this->solucion= $request->solucion;
        $this->observaciones=$request->observaciones;
        $this->estado="CLOSED";
        $this->facturable=$request->facturable;
        $this->problemareal=$request->problemareal;
        $this->solution_at=date("Y-m-d h:i:s");
        $this->save();

    }

    /**
     * Devuelve el usuario propietario de esta incidencia
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user(){
        return $this->belongsTo('App\User','id','user_id');
    }

}
