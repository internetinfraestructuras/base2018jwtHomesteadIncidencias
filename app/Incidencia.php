<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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
        //$this->observacionestecnico=$request->observacionestecnico;
        //el actual user logueado es el que lo ha resuleto
        $this->user_resuelto_id=Auth::user()->id;

        if($request->checkposponer) {

            $this->pospuesto_at = date("Y-m-d h:i:s");

            if ($this->estado == "POSPUESTO") {

                //si el estado anterior era ya pospuesto, se va sumando el campo obs por lo que borro
                //de lo que viene lo que ya habia => lo que tenia almacenado y a lo que queda, le pongo la hora
                //y lo concateno
                $nuevoBloque = str_replace($this->observacionestecnico, "", $request->observacionestecnico);
                /*echo "reemplzar la cadena [[[$this->observacionestecnico ]] con vacio en la cadena [[[ $request->observacionestecnico ]]]
                ";
                echo "<br>el resultado es [[[$nuevoBloque]]<br><br>";*/
                $this->observacionestecnico = $this->observacionestecnico . "\n" . "[" . $this->pospuesto_at . "]:" . $nuevoBloque;
            }
            else {
                echo "viene a pospuesto pero no era pospuesto";
                $this->observacionestecnico = "[" . $this->pospuesto_at . "]:" . $request->observacionestecnico;
                $this->estado = "POSPUESTO";
            }


        }
        else{
            $this->estado="CERRADO";
            $this->observacionestecnico=$request->observacionestecnico;
            $this->solution_at=date("Y-m-d h:i:s");
        }

        $this->save();
        //return $nuevoBloque;

    }

    /**
     * Devuelve el usuario propietario de esta incidencia
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user(){
        return $this->belongsTo('App\User');

    }

    /**
     * Devuelve el usuario que ha resuelto esta incidencia
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function userResuelto(){
        return $this->belongsTo('App\User','user_resuelto_id');

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
