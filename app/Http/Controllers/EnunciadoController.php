<?php

namespace App\Http\Controllers;

use App\Enunciado;
use App\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EnunciadoController extends Controller
{
    public function index($idservicio= null)
    {

        //si viene un id de servicio => filtro
        if($idservicio!=null) {
            $enunciados = Servicio::find($idservicio)->enunciado;
        }
        else
            $enunciados = Enunciado::all();

        return View('enunciado/index')->with('enunciados',$enunciados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $servicios = Servicio::all();

        return View('enunciado/create')->with('servicios',$servicios);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //echo "viene enunciado $request->enunciado --- vinculado a servicio $request->servicio";

        $enunciado = new Enunciado();
        $enunciado->enunciado=$request->enunciado;
        //$enunciado->save();

        //recupero el servicio que se ha seleccionado
        $servicio = Servicio::find($request->servicio);

        //añado el enunciado a dicho servicio
        $servicio->enunciado()->save($enunciado);

        //obtenemos todos los usuarios
        $enunciados = Enunciado::all();


        Session::flash('message', 'Enunciado añadido con éxito');
        Session::forget('errors');
        //vamos a la vista
        return View('enunciado/index')->with('enunciados',$enunciados);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
