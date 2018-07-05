<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
        'categoria',
    ];

    public $timestamps = false;

    /**
     * Cada categoria pertenece a un solo servicio
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function servicio(){

        return $this->belongsTo('App\Servicio');
    }

    /**
     * Devuelve listado de problemas para esta categoria
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function problema(){
         return $this->hasMany('App\Problema');
    }

    /**
     * Devuelve listado de soluciones para esta categoria
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function solucion(){
        return $this->hasMany('App\Solucion');
    }

    /**
     * Devuelve listado de facturables para esta categoria
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function facturable(){
        return $this->hasMany('App\Facturable');
    }

}
