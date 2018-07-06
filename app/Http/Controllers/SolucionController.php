<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Solucion;
use App\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SolucionController extends Controller
{

    public function index($idcategoria= null)
    {

        //si viene un id de categoria => filtro
        if($idcategoria!=null) {
            $soluciones = Categoria::find($idcategoria)->solucion;
        }
        else
            $soluciones = Solucion::all();

        return View('solucion/index')->with('soluciones',$soluciones);
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

        return View('solucion/create')->with('servicios',$servicios)->with('categorias',$categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $prob = new Solucion();
        $prob->solucion=$request->solucion;
        //$enunciado->save();

        //recupero la categoria que se ha seleccionado
        $cat = Categoria::find($request->categoria);

        //añado el enunciado a dicho servicio
        $cat->solucion()->save($prob);

        //obtenemos todos los problemas
        $soluciones = Solucion::all();


        Session::flash('message', 'Solucion añadido con éxito');
        Session::forget('errors');
        //vamos a la vista
        return View('solucion/index')->with('soluciones',$soluciones);

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
        $solucion = Solucion::find($id);
        $solucion->delete();

        //obtenemos todos los problemas
        $soluciones = Solucion::all();


        Session::flash('message', 'Solucion añadido con éxito');
        Session::forget('errors');
        //vamos a la vista
        return View('solucion/index')->with('soluciones',$soluciones);
    }
}
