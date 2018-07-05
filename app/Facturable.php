<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facturable extends Model
{
    protected $fillable = [
        'facturable',
    ];

    public $timestamps = false;

    /**
     * Cada facturable pertenece a un solo servicio
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoria(){

        return $this->belongsTo('App\Categoria');
    }
}
