<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    protected $fillable = [
        'habitacion', 'observacionescliente','observacionestecnico','estado','pospuesto_at','solution_at',
    ];

    public $timestamps=true;


    /**
     * actualizar
     * @param $id
     * @param $requestact
     */
    public function actualizar($request){

        $this->categoria_id= $request->categoria;
        $this->problema_id= $request->problema;
        $this->solucion_id= $request->solucion;
        $this->facturable_id= $request->facturable;
        $this->observacionestecnico=$request->observaciones;
        if($request->checkposponer)
        {
            $this->estado = "POSPUESTO";
            $this->pospuesto_at=date("Y-m-d h:i:s");
        }
        else{
            $this->estado="CERRADO";
            $this->solution_at=date("Y-m-d h:i:s");
        }

        $this->save();

    }

    /**
     * Devuelve el usuario propietario de esta incidencia
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user(){
        return $this->belongsTo('App\User');

    }

    /**
     * Devuelve el servicio de esta incidencia
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function servicio(){
        return $this->belongsTo('App\Servicio');
    }

    /**
     * Devuelve el enunciado de esta incidencia
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function enunciado(){
        return $this->belongsTo('App\Enunciado');
    }

    /**
     * Devuelve la categoria de esta incidencia
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categoria(){
        return $this->belongsTo('App\Categoria');
    }

    /**
     * Devuelve el problema de esta incidencia
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function problema(){
        return $this->belongsTo('App\Problema');
    }

    /**
     * Devuelve el solucion de esta incidencia
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function solucion(){
        return $this->belongsTo('App\Solucion');
    }

    /**
     * Devuelve el facturable de esta incidencia
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function facturable(){
        return $this->belongsTo('App\Facturable');
    }
}
