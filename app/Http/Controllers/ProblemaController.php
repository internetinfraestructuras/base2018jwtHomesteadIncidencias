<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Problema;
use App\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProblemaController extends Controller
{
    public function index()
    {
        $problemas = Problema::all();

        return View('problema/index')->with('problemas',$problemas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $servicios = Servicio::all();
        $categorias = Categoria::all();

        return View('problema/create')->with('servicios',$servicios)->with('categorias',$categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $prob = new Problema();
        $prob->problema=$request->problema;
        //$enunciado->save();

        //recupero la categoria que se ha seleccionado
        $cat = Categoria::find($request->categoria);

        //añado el enunciado a dicho servicio
        $cat->problema()->save($prob);

        //obtenemos todos los problemas
        $problemas = Problema::all();


        Session::flash('message', 'Problema añadido con éxito');
        Session::forget('errors');
        //vamos a la vista
        return View('problema/index')->with('problemas',$problemas);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Problema  $problema
     * @return \Illuminate\Http\Response
     */
    public function show(Problema $problema)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Problema  $problema
     * @return \Illuminate\Http\Response
     */
    public function edit(Problema $problema)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Problema  $problema
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Problema $problema)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Problema  $problema
     * @return \Illuminate\Http\Response
     */
    public function destroy(Problema $problema)
    {
        //
    }
}
