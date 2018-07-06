<?php

namespace App\Http\Controllers;

use App\Incidencia;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Redirect;

class IncidenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //crear una incidencia
        //le mando los tipos de servicios de este cliente
        $user = User::find($id);
        $servicios = $user->servicios;

        return View('incidencia/create')->with('user',$user)->with('servicios',$servicios);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $incidencia = new Incidencia();
        $incidencia->habitacion= $request->habitacion;
        $incidencia->servicio_id= $request->servicio;
        $incidencia->enunciado_id= $request->enunciado;
        $incidencia->observacionescliente= $request->observacionescliente;


        $incidencia->user_id=Auth::user()->id;
        $incidencia->estado="ABIERTO";
        $incidencia->save();



        Session::flash('message', 'Ticket abierto con éxito');
        Session::forget('errors');

        $user= User::find(Auth::user()->id);


        return Redirect('user/'.$user->id.'/incidencia');
        //->with('incidencias',$incidencias)->with('user',$user);



    }

    /**
     * Display the specified resource.
     * Uso esta vista para la visualizacion y la edicion de la incidencia
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,$idinci)
    {
        //echo "user $id, incidencia $idinci";
        $incidencia = Incidencia::find($idinci);
        $user = User::find($id);


        return View('incidencia/show')->with('incidencia',$incidencia)->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$idinci)
    {
        $incidencia = Incidencia::find($idinci);
        $user = User::find($id);

        $categorias = $incidencia->servicio->categoria;


        return View('incidencia/edit')->with('incidencia',$incidencia)->with('user',$user)->with('categorias',$categorias);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,$idinci)
    {
        //echo "updateando incidencia $idinci";
        $incidencia = Incidencia::find($idinci);

        echo $incidencia->actualizar($request);

        //echo "hecho";

        Session::flash('message', 'Ticket actualizado con éxito');
        Session::forget('errors');


        return Redirect('user/'.$id.'/incidencia');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
