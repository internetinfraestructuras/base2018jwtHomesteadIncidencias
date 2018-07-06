<?php

namespace App;

use Exception;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','tipocliente','intentoslogin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * Override create method, para hacer comprobaciones adicionales
     * @param array $attributes
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    public static function create(array $attributes = []){

        $email=$attributes['email'];
        $name=$attributes['name'];


        //chequeo si ya existe el email o el nombre de usuario
        $existe=User::where('email', $email)->first();

        if($existe){
            throw new Exception("Ya existe un usuario con email $email");
        }

        $existe=User::where('name', $name)->first();

        if($existe){
            throw new Exception("Ya existe un usuario con nombre $name");
        }

        $model = static::query()->create($attributes);
        return $model;

    }




    /**
     * @param $email
     * @throws Exception
     */
    public function setEmail($email){

        //chequeo si ya existe el email,si no, lo asigno
        $existe=User::where('email', $email)->first();

        if($existe){
            throw new Exception("Ya existe un usuario con email $email");
        }
        else
            $this->email=$email;

    }

    /**
     * @param $name
     * @throws Exception
     */
    public function setName($name1){

        //chequeo si ya existe el email,si no, lo asigno
        $existe=User::where('name', $name1)->first();

        if($existe){
            throw new Exception("Ya existe un usuario con ese nombre $name1");
        }
        else
            $this->name=$name1;

    }


    /**
     * Relacion muchos a muchos
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
     public function servicios(){

        return $this->belongsToMany('App\Servicio','user_servicio');
     }

    /**
     * Relacion 1 a muchos
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     * Devuelve las incidencias de este user
     */
    public function incidencias(){

        return $this->hasMany('App\Incidencia');
    }




}
