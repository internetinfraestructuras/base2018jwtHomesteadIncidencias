<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enunciado extends Model
{
    protected $fillable = [
        'enunciado',
    ];

    public $timestamps = false;

    /**
     * Cada enunciado pertenece a un solo servicio
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function servicio(){

        return $this->hasOne('App\Servicio');
    }
}
