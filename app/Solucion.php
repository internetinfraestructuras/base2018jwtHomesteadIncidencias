<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solucion extends Model
{
    protected $fillable = [
        'solucion',
    ];

    public $timestamps = false;

    /**
     * Cada solucion pertenece a un solo servicio
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoria(){

        return $this->hasOne('App\Categoria');
    }
}
