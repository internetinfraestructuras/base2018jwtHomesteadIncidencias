<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Facturable;
use App\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FacturableController extends Controller
{
    /*public function index()
    {
        $facturables = Facturable::all();

        return View('facturable/index')->with('facturables',$facturables);
    }*/


    public function index($idcategoria= null)
    {

        //si viene un id de categoria => filtro
        if($idcategoria!=null) {
            $facturables = Categoria::find($idcategoria)->facturable;
        }
        else
            $facturables = Facturable::all();

        return View('facturable/index')->with('facturables',$facturables);
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

        return View('facturable/create')->with('servicios',$servicios)->with('categorias',$categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $prob = new Facturable();
        $prob->facturable=$request->facturable;
        //$enunciado->save();

        //recupero la categoria que se ha seleccionado
        $cat = Categoria::find($request->categoria);

        //añado el enunciado a dicho servicio
        $cat->facturable()->save($prob);

        //obtenemos todos los facturables
        $facturables = Facturable::all();


        Session::flash('message', 'Facturable añadido con éxito');
        Session::forget('errors');
        //vamos a la vista
        return View('facturable/index')->with('facturables',$facturables);

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
        $facturable = Facturable::find($id);
        $facturable->delete();

        //obtenemos todos los facturables
        $facturables = Facturable::all();


        Session::flash('message', 'Facturable eliminado con éxito');
        Session::forget('errors');
        //vamos a la vista
        return View('facturable/index')->with('facturables',$facturables);

    }
}
