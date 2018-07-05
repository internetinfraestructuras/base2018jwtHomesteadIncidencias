<?php

namespace App\Http\Controllers;

use App\Enunciado;
use App\Servicio;
use Illuminate\Http\Request;

class EnunciadoController extends Controller
{
    public function index()
    {
        $enunciados = Enunciado::all();

        echo "hola";
        $enun= Enunciado::find(1);
        echo "el uno es $enun->enunciado";

        $srv= $enun->servicio;

        echo "el servicio es $srv->servicio";

        //return View('enunciado/index')->with('enunciados',$enunciados);
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
        $servicio = Servicio::create($request->all());

        //obtenemos todos los usuarios
        $servicios = Servicio::all();


        Session::flash('message', 'Servicio añadido con éxito');
        Session::forget('errors');
        //vamos a la vista
        return View('servicio/index')->with('servicios', $servicios);

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
