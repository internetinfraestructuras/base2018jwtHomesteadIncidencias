<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{

    protected $fillable = [
        'servicio',
    ];

    public $timestamps = false;

    /**Usuarios con ese servicio
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(){

        return $this->belongsToMany('App\User','user_servicio');
    }

    /**
     * Cada servicio tiene una serie de enunciados de problemas
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function enunciado(){

        return $this->hasMany('App\Enunciado');
    }

    /**
     * Cada servicio tiene una serie de categorias de problemas
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categoria(){

        return $this->hasMany('App\Categoria');
    }

}
