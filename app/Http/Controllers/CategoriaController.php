<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();

        return View('categoria/index')->with('categorias',$categorias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $servicios = Servicio::all();

        return View('categoria/create')->with('servicios',$servicios);
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

        $cat = new Categoria();
        $cat->categoria=$request->categoria;
        //$enunciado->save();

        //recupero el servicio que se ha seleccionado
        $servicio = Servicio::where('servicio', '=', $request->servicio)->first();

        //añado el enunciado a dicho servicio
        $servicio->categoria()->save($cat);

        //obtenemos todos los usuarios
        $categorias = Categoria::all();


        Session::flash('message', 'Categoria añadido con éxito');
        Session::forget('errors');
        //vamos a la vista
        return View('categoria/index')->with('categorias',$categorias);

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
