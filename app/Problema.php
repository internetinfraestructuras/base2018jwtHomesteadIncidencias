<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Problema extends Model
{
    protected $fillable = [
        'problema',
    ];

    public $timestamps = false;

    /**
     * Cada problema pertenece a un solo servicio
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoria(){

        return $this->hasOne('App\Categoria');
    }
}
